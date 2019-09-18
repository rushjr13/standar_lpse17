<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset extends CI_Controller {

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
		$data['menu_akses'] = $this->admin->menu_akses($user);

		// KHUSUS
		$data['judul'] = "SOP Aset Layanan";
		$data['istilah'] = $this->admin->istilah();
		$data['sop_aset'] = $this->admin->sop_aset();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('aset/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambah(){
		$nama = $this->input->post('nama');
		$isi = $this->input->post('isi');

		$data = [
			'id'=>time(),
			'nama'=>$nama,
			'isi'=>$isi
		];

		$this->db->insert('aset_sop', $data);

		$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
												  <i class="fa fa-fw fa-info-circle"></i> SOP <strong>'.$nama.'</strong> telah ditambahkan!
												  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												    <span aria-hidden="true">&times;</span>
												  </button>
												</div>');
		redirect('aset');
	}

	public function edit($id=null){
		if($id==null){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Tidak ada sop yang dipilih!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('aset');
		}else{
			// UMUM
			$user = $this->session->userdata('user_masuk');
			$data['pengguna_masuk'] = $this->admin->pengguna($user);
			$data['pengaturan'] = $this->admin->pengaturan();
			$data['tgl_sekarang'] = $this->admin->tgl_indo(date('Y-m-d'));
			$data['hari_sekarang'] = $this->admin->hari(date('l'));
			$data['menu_akses'] = $this->admin->menu_akses($user);

			// KHUSUS
			$data['judul'] = "SOP Aset Layanan";
			$data['sop_aset'] = $this->admin->sop_aset($id);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('aset/edit', $data);
			$this->load->view('templates/footer', $data);
		}
	}

	public function ubah($id=null){
		if($id==null){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Tidak ada istilah yang dipilih!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('aset');
		}else{
			$nama = $this->input->post('nama');
			$isi = $this->input->post('isi');

			$data = [
				'nama'=>$nama,
				'isi'=>$isi
			];

			$this->db->set($data);
			$this->db->where('id', $id);
			$this->db->update('aset_sop');

			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-info-circle"></i> Daftar istilah telah diperbarui!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('aset');
		}
	}

	public function hapus($id=null){
		if($id==null){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Tidak ada sop yang dipilih!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('aset');
		}else{
			$nama = $this->input->post('nama');

			$this->db->where('id', $id);
			$this->db->delete('aset_sop');

			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-info-circle"></i> SOP <strong>'.$nama.'</strong> telah dihapus!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('aset');
		}
	}

	public function sk(){
		// UMUM
		$user = $this->session->userdata('user_masuk');
		$data['pengguna_masuk'] = $this->admin->pengguna($user);
		$data['pengaturan'] = $this->admin->pengaturan();
		$data['tgl_sekarang'] = $this->admin->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->admin->hari(date('l'));
		$data['menu_akses'] = $this->admin->menu_akses($user);

		// KHUSUS
		$data['judul'] = "SK Koordinator Aset";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('aset/sk/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function form(){
		// UMUM
		$user = $this->session->userdata('user_masuk');
		$data['pengguna_masuk'] = $this->admin->pengguna($user);
		$data['pengaturan'] = $this->admin->pengaturan();
		$data['tgl_sekarang'] = $this->admin->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->admin->hari(date('l'));
		$data['menu_akses'] = $this->admin->menu_akses($user);

		// KHUSUS
		$data['judul'] = "Pencatatan Aset Layanan";
		$data['aset_informasi'] = $this->admin->aset_informasi();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('aset/form/index', $data);
		$this->load->view('templates/footer', $data);
	}
}
