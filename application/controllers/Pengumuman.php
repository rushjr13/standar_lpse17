<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->admin->cek_masuk();
    }

	public function index(){
		date_default_timezone_set('Asia/Makassar');
		// UMUM
		$user = $this->session->userdata('user_masuk');
		$data['pengguna_masuk'] = $this->admin->pengguna($user);
		$data['pengaturan'] = $this->admin->pengaturan();
		$data['tgl_sekarang'] = $this->admin->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->admin->hari(date('l'));
		$data['menu'] = $this->admin->menu();
		$data['pengumuman'] = $this->admin->pengumuman5();
		$level_pengguna = $data['pengguna_masuk']['id_level'];

		// KHUSUS
		if($level_pengguna==1){
			$data['judul'] = "Pengumuman";
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('pengumuman', $data);
			$this->load->view('templates/footer', $data);
		}else{
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Akses Ditolak. Hanya Admnistrator yang dapat mengakses halaman ini!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('beranda');
		}
	}

	public function tambah(){
		// UMUM
		$user = $this->session->userdata('user_masuk');
		$data['pengguna_masuk'] = $this->admin->pengguna($user);
		$level_pengguna = $data['pengguna_masuk']['id_level'];

		// KHUSUS
		if($level_pengguna==1){
			$isi_pengumuman = $this->input->post('isi_pengumuman');
			$data = [
				'id_pengumuman'=>time(),
				'isi_pengumuman'=>$isi_pengumuman,
				'penulis'=>$this->input->post('penulis'),
				'tgl_pengumuman'=>time(),
				'status_pengumuman'=>0
			];
			$this->db->insert('pengumuman', $data);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
													  <i class="fa fa-fw fa-info-circle"></i> Pengumuman telah ditambahkan!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('pengumuman');
		}else{
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Akses Ditolak. Hanya Admnistrator yang dapat mengakses halaman ini!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('beranda');
		}
	}

	public function status($id=null){
		// UMUM
		$user = $this->session->userdata('user_masuk');
		$data['pengguna_masuk'] = $this->admin->pengguna($user);
		$level_pengguna = $data['pengguna_masuk']['id_level'];

		// KHUSUS
		if($level_pengguna==1){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak ada pengumuman yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('pengumuman');
			}else{
				$id_pengumuman = $this->input->post('id_pengumuman');
				$ket_pengumuman = $this->input->post('ket_pengumuman');
				$status_pengumuman = $this->input->post('status_pengumuman');

				$this->db->set('status_pengumuman', $status_pengumuman);
				$this->db->where('id_pengumuman', $id_pengumuman);
				$this->db->update('pengumuman');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Pengumuman telah di-<strong>'.$ket_pengumuman.'</strong>!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('pengumuman');
			}
		}else{
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Akses Ditolak. Hanya Admnistrator yang dapat mengakses halaman ini!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('beranda');
		}
	}

	public function ubah($id=null){
		// UMUM
		$user = $this->session->userdata('user_masuk');
		$data['pengguna_masuk'] = $this->admin->pengguna($user);
		$level_pengguna = $data['pengguna_masuk']['id_level'];

		// KHUSUS
		if($level_pengguna==1){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak ada pengumuman yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('pengumuman');
			}else{
				$isi_pengumuman = $this->input->post('isi_pengumuman');
				$data = [
					'isi_pengumuman'=>$isi_pengumuman,
					'penulis'=>$this->input->post('penulis'),
					'tgl_pengumuman'=>time()
				];
				$this->db->set($data);
				$this->db->where('id_pengumuman', $id);
				$this->db->update('pengumuman');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Pengumuman telah diperbarui!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('pengumuman');
			}
		}else{
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Akses Ditolak. Hanya Admnistrator yang dapat mengakses halaman ini!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('beranda');
		}
	}

	public function hapus($id=null){
		// UMUM
		$user = $this->session->userdata('user_masuk');
		$data['pengguna_masuk'] = $this->admin->pengguna($user);
		$level_pengguna = $data['pengguna_masuk']['id_level'];

		// KHUSUS
		if($level_pengguna==1){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak ada pengumuman yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('pengumuman');
			}else{
				$this->db->where('id_pengumuman', $id);
				$this->db->delete('pengumuman');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Pengumuman telah dihapus!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('pengumuman');
			}
		}else{
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Akses Ditolak. Hanya Admnistrator yang dapat mengakses halaman ini!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('beranda');
		}
	}
}
