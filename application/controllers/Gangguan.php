<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gangguan extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->admin->cek_masuk();
    }
		
	public function index(){
		// UMUM
		$user = $this->session->userdata('user_masuk');
		$data['pengguna_masuk'] = $this->admin->pengguna($user);
		$data['pengaturan'] = $this->admin->pengaturan();
		$data['tgl_sekarang'] = $this->admin->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->admin->hari(date('l'));
		$data['menu'] = $this->admin->menu();
		$data['pengumuman'] = $this->admin->pengumuman5();
		$link = $this->uri->segment('1');
		$menu_segmen = $this->admin->menu_segmen($link)->row_array();
		$id_menu = $menu_segmen['id_menu'];
		if($id_menu!=''){
			$data['akses_menu'] = $this->admin->akses_menu($id_menu, $user)->num_rows();
		}

		// KHUSUS
		$data['judul'] = "SOP Gangguan Layanan";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('gangguan/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function sk(){
		// UMUM
		$user = $this->session->userdata('user_masuk');
		$data['pengguna_masuk'] = $this->admin->pengguna($user);
		$data['pengaturan'] = $this->admin->pengaturan();
		$data['tgl_sekarang'] = $this->admin->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->admin->hari(date('l'));
		$data['menu'] = $this->admin->menu();
		$data['pengumuman'] = $this->admin->pengumuman5();
		$link = $this->uri->segment('1');
		$menu_segmen = $this->admin->menu_segmen($link)->row_array();
		$id_menu = $menu_segmen['id_menu'];
		if($id_menu!=''){
			$data['akses_menu'] = $this->admin->akses_menu($id_menu, $user)->num_rows();
		}

		// KHUSUS
		$data['judul'] = "SK Koordinator Gangguan";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('gangguan/sk/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function form($opsi=null, $id=null){
		// UMUM
		$user = $this->session->userdata('user_masuk');
		$data['pengguna_masuk'] = $this->admin->pengguna($user);
		$data['pengaturan'] = $this->admin->pengaturan();
		$data['tgl_sekarang'] = $this->admin->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->admin->hari(date('l'));
		$data['menu'] = $this->admin->menu();
		$data['pengumuman'] = $this->admin->pengumuman5();
		$link = $this->uri->segment('1');
		$menu_segmen = $this->admin->menu_segmen($link)->row_array();
		$id_menu = $menu_segmen['id_menu'];
		if($id_menu!=''){
			$data['akses_menu'] = $this->admin->akses_menu($id_menu, $user)->num_rows();
		}

		// KHUSUS
		if($opsi==null){
			$data['judul'] = "Pencatatan Gangguan Layanan";
			$data['gangguan'] = $this->gangguan->gangguan();
			$data['gangguan_tipe'] = $this->gangguan->gangguan_tipe();
			$data['gangguan_kategori'] = $this->gangguan->gangguan_kategori();
			$data['gangguan_user'] = $this->gangguan->gangguan_user();
			$data['gangguan_jenis'] = $this->gangguan->gangguan_jenis();
			$data['gangguan_urgensi'] = $this->gangguan->gangguan_urgensi();
			$data['gangguan_dampak'] = $this->gangguan->gangguan_dampak();
			$data['gangguan_prioritas'] = $this->gangguan->gangguan_prioritas();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('gangguan/form/index', $data);
			$this->load->view('templates/footer', $data);
		}else if($opsi=='cetak'){
			if($id==null){
				$data['judul'] = "Pencatatan Gangguan Layanan";
				$data['gangguan'] = $this->gangguan->gangguan();
				$this->load->view('gangguan/form/cetak', $data);
			}else{
				$data['judul'] = "Pencatatan Gangguan Layanan";
				$data['gangguan'] = $this->gangguan->gangguan($id);
				$this->load->view('gangguan/form/cetakid', $data);
			}
		}else if($opsi=='tambah'){
			$id_gangguan = $this->input->post('id_gangguan');
			$nama_pengguna = $this->input->post('nama_pengguna');
			$kontak_pengguna = $this->input->post('kontak_pengguna');
			$media_pelaporan = $this->input->post('media_pelaporan');
			$tgl_pelaporan = $this->input->post('tgl_pelaporan');
			$deskripsi_gangguan = $this->input->post('deskripsi_gangguan');
			$id_tipe = $this->input->post('id_tipe');
			$id_kategori = $this->input->post('id_kategori');
			$id_user = $this->input->post('id_user');
			$id_jenis = $this->input->post('id_jenis');
			$id_urgensi = $this->input->post('id_urgensi');
			$id_dampak = $this->input->post('id_dampak');
			$id_prioritas = $this->input->post('id_prioritas');

			$data = [
				'id_gangguan'=>$id_gangguan,
				'nama_pengguna'=>$nama_pengguna,
				'kontak_pengguna'=>$kontak_pengguna,
				'media_pelaporan'=>$media_pelaporan,
				'tgl_pelaporan'=>$tgl_pelaporan,
				'deskripsi_gangguan'=>$deskripsi_gangguan,
				'id_tipe'=>$id_tipe,
				'id_kategori'=>$id_kategori,
				'id_user'=>$id_user,
				'id_jenis'=>$id_jenis,
				'id_urgensi'=>$id_urgensi,
				'id_dampak'=>$id_dampak,
				'id_prioritas'=>$id_prioritas,
				'petugas_penanganan'=>'Admin',
				'status_penanganan'=>'-',
				'ket_penanganan'=>'-',
				'tgl_penanganan'=>date('Y-m-d',time()),
				'solusi_penyelesaian'=>'-',
				'tgl_penyelesaian'=>date('Y-m-d',time()),
				'status_konfirmasi'=>'Belum Diinformasikan',
				'status_gangguan'=>'Tercatat'
			];

			$this->db->insert('gangguan', $data);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-info-circle"></i> Pencatatan Gangguan Telah ditambahkan!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('gangguan/form');
		}else if($opsi=='tangani'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak Ada Pencatatan Gangguan yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('gangguan/form');
			}else{
				$petugas_penanganan = $this->input->post('petugas_penanganan');
				$status_penanganan = $this->input->post('status_penanganan');
				$ket_penanganan = $this->input->post('ket_penanganan');
				$tgl_penanganan = $this->input->post('tgl_penanganan');

				$data = [
					'petugas_penanganan'=>$petugas_penanganan,
					'status_penanganan'=>$status_penanganan,
					'ket_penanganan'=>$ket_penanganan,
					'tgl_penanganan'=>$tgl_penanganan,
					'status_gangguan'=>'Penanganan'
				];

				$this->db->set($data);
				$this->db->where('id_gangguan', $id);
				$this->db->update('gangguan', $data);
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Pencatatan Gangguan '.$id.' Telah ditangani!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('gangguan/form');
			}
		}else if($opsi=='selesaikan'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak Ada Pencatatan Gangguan yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('gangguan/form');
			}else{
				$solusi_penyelesaian = $this->input->post('solusi_penyelesaian');
				$tgl_penyelesaian = $this->input->post('tgl_penyelesaian');
				$status_konfirmasi = $this->input->post('status_konfirmasi');

				$data = [
					'solusi_penyelesaian'=>$solusi_penyelesaian,
					'tgl_penyelesaian'=>$tgl_penyelesaian,
					'status_konfirmasi'=>$status_konfirmasi,
					'status_gangguan'=>'Penyelesaian'
				];

				$this->db->set($data);
				$this->db->where('id_gangguan', $id);
				$this->db->update('gangguan', $data);
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Pencatatan Gangguan '.$id.' Telah diselesaikan!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('gangguan/form');
			}
		}
	}

	public function faq(){
		// UMUM
		$user = $this->session->userdata('user_masuk');
		$data['pengguna_masuk'] = $this->admin->pengguna($user);
		$data['pengaturan'] = $this->admin->pengaturan();
		$data['tgl_sekarang'] = $this->admin->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->admin->hari(date('l'));
		$data['menu'] = $this->admin->menu();
		$data['pengumuman'] = $this->admin->pengumuman5();
		$link = $this->uri->segment('1');
		$menu_segmen = $this->admin->menu_segmen($link)->row_array();
		$id_menu = $menu_segmen['id_menu'];
		if($id_menu!=''){
			$data['akses_menu'] = $this->admin->akses_menu($id_menu, $user)->num_rows();
		}

		// KHUSUS
		$data['judul'] = "FAQ Gangguan Layanan";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('gangguan/faq/index', $data);
		$this->load->view('templates/footer', $data);
	}
}
