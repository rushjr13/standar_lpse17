<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {


	// Tanggal Indonesia Berdasarkan Fungsi date() - 2019-12-13
    function tgl_indo($tanggal){
		date_default_timezone_set('Asia/Makassar');
        $tgl = substr($tanggal, 8, 2);
        $bln = substr($tanggal, 5, 2);
        $thn = substr($tanggal, 0, 4);

        if($bln=='01'){
            $bulan='Januari';
        } else if($bln=='02'){
            $bulan='Februari';
        } else if($bln=='03'){
            $bulan='Maret';
        } else if($bln=='04'){
            $bulan='April';
        } else if($bln=='05'){
            $bulan='Mei';
        } else if($bln=='06'){
            $bulan='Juni';
        } else if($bln=='07'){
            $bulan='Juli';
        } else if($bln=='08'){
            $bulan='Agustus';
        } else if($bln=='09'){
            $bulan='September';
        } else if($bln=='10'){
            $bulan='Oktober';
        } else if($bln=='11'){
            $bulan='November';
        } else if($bln=='12'){
            $bulan='Desember';
        }

        return $tgl.' '.$bulan.' '.$thn;
    }

    // Hari Indonesia Berdasarkan Fungsi date() - l
    function hari($hari){

        if($hari=='Sunday'){
        	$hr='Minggu';
        } else if($hari=='Monday'){
        	$hr='Senin';
        } else if($hari=='Tuesday'){
        	$hr='Selasa';
        } else if($hari=='Wednesday'){
        	$hr='Rabu';
        } else if($hari=='Thursday'){
        	$hr='Kamis';
        } else if($hari=='Friday'){
        	$hr='Jumat';
        } else if($hari=='Saturday'){
        	$hr='Sabtu';
        }
        return $hr;
    }

    // Tanggal Indonesia Berdasarkan Fungsi time() - 1560990566
    function tgl_indo2($tanggal){
		date_default_timezone_set('Asia/Makassar');
        $tgl = date('d', $tanggal);
        $bln = date('F', $tanggal);
        $thn = date('Y', $tanggal);

        if($bln=='January'){
            $bulan='Januari';
        } else if($bln=='February'){
            $bulan='Februari';
        } else if($bln=='March'){
            $bulan='Maret';
        } else if($bln=='April'){
            $bulan='April';
        } else if($bln=='May'){
            $bulan='Mei';
        } else if($bln=='June'){
            $bulan='Juni';
        } else if($bln=='July'){
            $bulan='Juli';
        } else if($bln=='August'){
            $bulan='Agustus';
        } else if($bln=='September'){
            $bulan='September';
        } else if($bln=='October'){
            $bulan='Oktober';
        } else if($bln=='November'){
            $bulan='November';
        } else if($bln=='December'){
            $bulan='Desember';
        }

        return $tgl.' '.$bulan.' '.$thn;
    }

    // Hari Indonesia Berdasarkan Fungsi time() - l
    function hari2($hari){
    	date_default_timezone_set('Asia/Makassar');
        $tgl = date('l', $tanggal);

        if($hari=='Sunday'){
        	$hr='Minggu';
        } else if($hari=='Monday'){
        	$hr='Senin';
        } else if($hari=='Tuesday'){
        	$hr='Selasa';
        } else if($hari=='Wednesday'){
        	$hr='Rabu';
        } else if($hari=='Thursday'){
        	$hr='Kamis';
        } else if($hari=='Friday'){
        	$hr='Jumat';
        } else if($hari=='Saturday'){
        	$hr='Sabtu';
        }
        return $hr;
    }

	// CEK PENGGUNA MASUK
	function cek_masuk(){
		if(!$this->session->userdata('user_masuk')){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Akses Ditolak! Anda Harus Masuk Dulu!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('beranda');
		}
	}

	// PENGATURAN
	function pengaturan(){
		$this->db->where('id', 'atur');
		return $this->db->get('pengaturan')->row_array();
	}

	// DETAIL PENGGUNA
    function pengguna($username){
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->where('username', $username);
        return $this->db->get()->row_array();
    }

    // DAFTAR PENGGUNA
    function daftarpengguna($username){
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->join('level', 'level.id_level = pengguna.id_level');
        $this->db->order_by('pengguna.id_level', 'ASC');
        $this->db->order_by('pengguna.tgl_daftar', 'DESC');
        $this->db->where('pengguna.username !=', $username);
        return $this->db->get()->result_array();
    }

    // LEVEL
    function level($id_level=null){
        if($id_level==null){
            return $this->db->get('level')->result_array();
        } else {
            return $this->db->get_where('level', ['id_level'=>$id_level])->row_array();
        }
    }

	// CEK PENGGUNA
	function cek_pengguna($username){
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->where('username', $username);
		return $this->db->get();
	}

    // CEK PENGGUNA MELALUI EMAIL
    function cek_email($email){
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->where('email', $email);
        return $this->db->get();
    }

	// MENU
	function menu($id_menu=null){
		if($id_menu==null){
			$this->db->select('*');
			$this->db->from('menu');
			$this->db->order_by('id_menu', 'ASC');
			return $this->db->get()->result_array();
		} else {
			$this->db->select('*');
			$this->db->from('menu');
			$this->db->where('id_menu', $id_menu);
			return $this->db->get()->row_array();
		}
	}

    // AKSES MENU
    function cek_akses($username, $id_menu){
        $this->db->select('*');
        $this->db->from('akses_menu');
        $this->db->where('username', $username);
        $this->db->where('id_menu', $id_menu);
        return $this->db->get();
    }

    // MENU AKSES
    function menu_akses($username){
        $this->db->select('*');
        $this->db->from('akses_menu');
		$this->db->join('menu', 'menu.id_menu = akses_menu.id_menu');
        $this->db->where('akses_menu.username', $username);
        $this->db->order_by('akses_menu.id_menu', 'ASC');
        return $this->db->get()->result_array();
    }

    // SUB MENU BY MENU
    function submenubymenu($id_menu){
        $this->db->select('*');
        $this->db->from('submenu');
        $this->db->where('id_menu', $id_menu);
        $this->db->order_by('id_menu', 'ASC');
        $this->db->order_by('id_submenu', 'ASC');
        return $this->db->get()->result_array();
    }

	// SUB MENU
	function submenu($id_submenu){
		$this->db->select('*');
		$this->db->from('submenu');
		$this->db->where('id_submenu', $id_submenu);
		return $this->db->get()->row_array();
	}

    // PERKA
    function perka($id=null){
        if($id==null){
            $this->db->select('*');
            $this->db->from('regulasi_perka');
            $this->db->order_by('nomor', 'ASC');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('regulasi_perka');
            $this->db->where('id', $id);
            return $this->db->get()->row_array();
        }
    }

    // REGULASI
    function regulasi(){
        $this->db->select('*');
        $this->db->from('regulasi');
        return $this->db->get()->result_array();
    }

    // REGULASI BY ID
    function regulasiid($id_regulasi){
        $this->db->select('*');
        $this->db->from('regulasi');
        $this->db->where('id_regulasi', $id_regulasi);
        return $this->db->get()->row_array();
    }

    // STRUKTUR ORGANISASI
    function struktur_organisasi($id_su=null){
        if($id_su==null){
            $this->db->select('*');
            $this->db->from('organisasi_struktur');
            $this->db->order_by('id_su', 'ASC');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('organisasi_struktur');
            $this->db->where('id_su', $id_su);
            return $this->db->get()->row_array();
        }
    }

    // STRUKTUR ORGANISASI
    function tugas_tambahan($id_st=null){
        if($id_st==null){
            $this->db->select('*');
            $this->db->from('organisasi_st');
            $this->db->order_by('id_st', 'ASC');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('organisasi_st');
            $this->db->where('id_st', $id_st);
            return $this->db->get()->row_array();
        }
    }

    // STRUKTUR ORGANISASI SUB TUGAS
    function subtugas_su($id_st=null){
        if($id_st==null){
            $this->db->select('*');
            $this->db->from('organisasi_st');
            $this->db->order_by('id_st', 'ASC');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('organisasi_st');
            $this->db->where('id_st', $id_st);
            return $this->db->get()->row_array();
        }
    }

    // TUJUAN ORGANISASI
    function tujuan_organisasi(){
        $this->db->select('*');
        $this->db->from('organisasi_tujuan');
        $this->db->where('id_ot', 'tujuan');
        return $this->db->get()->row_array();
    }

    // GAMBAR ORGANISASI
    function gambar_organisasi(){
        $this->db->select('*');
        $this->db->from('organisasi_tujuan');
        $this->db->where('id_ot', 'gambar');
        return $this->db->get()->row_array();
    }

    // SK ORGANISASI
    function sk_organisasi($id_sko=null){
        if($id_sko==null){
            $this->db->order_by('id_sko', 'ASC');
            return $this->db->get('organisasi_sk')->result_array();
        } else {
            return $this->db->get_where('organisasi_sk', ['id_sko'=>$id_sko])->row_array();
        }
    }

    // ISTILAH ASET
    function istilah(){
        $this->db->where('id', 'istilah');
        return $this->db->get('aset_sop')->row_array();
    }

    // SOP ASET
    function sop_aset($id=null){
        if($id==null){
            $this->db->order_by('id', 'ASC');
            $this->db->where('id !=', 'istilah');
            return $this->db->get('aset_sop')->result_array();
        } else {
            return $this->db->get_where('aset_sop', ['id'=>$id])->row_array();
        }
    }

    // ASET INFORMASI
    function aset_informasi($id=null){
        if($id==null){
            $this->db->order_by('id', 'ASC');
            return $this->db->get('aset_informasi')->result_array();
        } else {
            return $this->db->get_where('aset_informasi', ['id'=>$id])->row_array();
        }
    }

	// PEMBERITAHUAN
	function pemberitahuan($id_pemberitahuan=null){
		if($id_pemberitahuan==null){
			$this->db->select('*');
			$this->db->from('pemberitahuan');
            $this->db->join('pengguna', 'pengguna.id_pengguna = pemberitahuan.id_pengguna');
			$this->db->order_by('pemberitahuan.id_pemberitahuan', 'DESC');
			return $this->db->get()->result_array();
		} else {
			$this->db->select('*');
			$this->db->from('pemberitahuan');
			$this->db->join('pengguna', 'pengguna.id_pengguna = pemberitahuan.id_pengguna');
			$this->db->where('pemberitahuan.id_pemberitahuan', $id_pemberitahuan);
			return $this->db->get()->row_array();
		}
	}

    // PROGRAM
    function program($id_program=null){
        if($id_program==null){
            $this->db->select('*');
            $this->db->from('program');
            $this->db->order_by('id_program', 'ASC');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('program');
            $this->db->where('id_program', $id_program);
            return $this->db->get()->row_array();
        }
    }

    // KEGIATAN
    function kegiatan($id_kegiatan=null){
        if($id_kegiatan==null){
            $this->db->select('*');
            $this->db->from('kegiatan');
            $this->db->join('program', 'program.id_program = kegiatan.id_program');
            $this->db->order_by('kegiatan.id_program', 'ASC');
            $this->db->order_by('kegiatan.id_kegiatan', 'ASC');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('kegiatan');
            $this->db->join('program', 'program.id_program = kegiatan.id_program');
            $this->db->where('kegiatan.id_kegiatan', $id_kegiatan);
            return $this->db->get()->row_array();
        }
    }

    // MENU LANDING
    function menulanding($id_ml=null){
        if($id_ml==null){
            $this->db->select('*');
            $this->db->from('menu_landing');
            $this->db->order_by('id_ml', 'ASC');
            $this->db->where('status_ml', 1);
            return $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('menu_landing');
            $this->db->where('menu_landing.id_ml', $id_ml);
            return $this->db->get()->row_array();
        }
    }

    // MENU LANDING
    function menulandingaktif(){
        $this->db->select('*');
        $this->db->from('menu_landing');
        $this->db->where('status_ml', 1);
        $this->db->order_by('id_ml', 'ASC');
        return $this->db->get()->result_array();
    }

    // PROFIL
    function profil($id_profil=null){
        if($id_profil==null){
            $this->db->select('*');
            $this->db->from('profil');
            $this->db->order_by('id_profil', 'ASC');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('profil');
            $this->db->where('id_profil', $id_profil);
            return $this->db->get()->row_array();
        }
    }

    // LAYANAN UTAMA
    function layanan_utama(){
        $this->db->select('*');
        $this->db->from('layanan');
        $this->db->order_by('id_layanan', 'ASC');
        $this->db->where('kategori', 1);
        return $this->db->get()->result_array();
    }

    // LAYANAN PENDUKUNG
    function layanan_pendukung(){
        $this->db->select('*');
        $this->db->from('layanan');
        $this->db->order_by('id_layanan', 'ASC');
        $this->db->where('kategori', 2);
        return $this->db->get()->result_array();
    }

    // LAYANAN DETAIL
    function layanan_detail($id_layanan){
        $this->db->select('*');
        $this->db->from('layanan');
        $this->db->where('id_layanan', $id_layanan);
        return $this->db->get()->row_array();
    }

    // PENGADUAN
    function pengaduan($id=null){
        if($id==null){
            $this->db->select('*');
            $this->db->from('pengaduan');
            $this->db->join('layanan', 'layanan.id_layanan = pengaduan.id_layanan');
            $this->db->order_by('pengaduan.tanggal', 'DESC');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('pengaduan');
            $this->db->join('layanan', 'layanan.id_layanan = pengaduan.id_layanan');
            $this->db->where('pengaduan.id', $id);
            return $this->db->get()->row_array();
        }
    }

    // KRITIK & SARAN
    function kds($id=null){
        if($id==null){
            $this->db->select('*');
            $this->db->from('kds');
            $this->db->order_by('tanggal', 'DESC');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('kds');
            $this->db->where('id', $id);
            return $this->db->get()->row_array();
        }
    }

    // KOMENTAR GALERI
    function komentar_galeri($id){
        $this->db->select('*');
        $this->db->from('komentar_galeri');
        $this->db->where('id_gk', $id);
        $this->db->order_by('tgl_komentar', 'DESC');
        return $this->db->get()->result_array();
    }

    // JUMLAH KOMENTAR GALERI
    function jlh_komentar_galeri($id){
        $this->db->where('id_gk', $id);
        return $this->db->get('komentar_galeri')->num_rows();
    }

    // GALERI KEGIATAN
    function galeri_kegiatan($id_gk=null){
        if($id_gk==null){
            $this->db->select('*');
            $this->db->from('galeri_kegiatan');
            $this->db->order_by('tgl_gk', 'DESC');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('galeri_kegiatan');
            $this->db->where('id_gk', $id_gk);
            return $this->db->get()->row_array();
        }
    }

    // JUMLAH DOKUMENTASI GALERI
    function jlh_dk($id){
        $this->db->where('id_gk', $id);
        return $this->db->get('dok_kegiatan')->num_rows();
    }

    // DOKUMENTASI GALERI
    function dok_kegiatan($id){
        $this->db->select('*');
        $this->db->from('dok_kegiatan');
        $this->db->where('dok_kegiatan.id_gk', $id);
        $this->db->order_by('dok_kegiatan.id_dk', 'ASC');
        return $this->db->get()->result_array();
    }

    // MONEV
    function monev(){
        $this->db->where('id', 'ksi');
        return $this->db->get('monev')->row_array();
    }

    // OBROLAN
    function obrolan_pengguna($id=null){
        $this->db->select('*');
        $this->db->from('obrolan');
        $this->db->join('pengguna', 'pengguna.id_pengguna = obrolan.id_pengirim');
        $this->db->order_by('obrolan.id_obrolan', 'ASC');
        $this->db->where('obrolan.id_pengirim !=', $id);
        return $this->db->get()->result_array();
    }

    function obrolan_id($id=null){
        $this->db->select('*');
        $this->db->from('obrolan');
        $this->db->join('pengguna', 'pengguna.id_pengguna = obrolan.id_pengirim');
        $this->db->order_by('obrolan.id_obrolan', 'DESC');
        $this->db->where('obrolan.id_obrolan', $id);
        return $this->db->get()->row_array();
    }

    // MISI
    function misi($id_misi=null){
        if($id_misi==null){
            $this->db->select('*');
            $this->db->from('misi');
            $this->db->order_by('misi.id_misi', 'ASC');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('misi');
            $this->db->where('misi.id_misi', $id_misi);
            return $this->db->get()->row_array();
        }
    }

    // SIAPA KAMI
    function siapa_kami(){
        $this->db->where('id', 'siapa');
        return $this->db->get('siapa_kami')->row_array();
    }

    // VISI
    function visi(){
        $this->db->where('id', 'visi');
        return $this->db->get('visi')->row_array();
    }

    // PEGAWAI
    function pegawai($id_pegawai=null){
        if($id_pegawai==null){
            $this->db->select('*');
            $this->db->from('pegawai');
            $this->db->order_by('pegawai.id_pegawai', 'ASC');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('pegawai');
            $this->db->where('pegawai.id_pegawai', $id_pegawai);
            return $this->db->get()->row_array();
        }
    }

}