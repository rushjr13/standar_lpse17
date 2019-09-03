<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {
		
	public function index(){
		// UMUM
		$user = $this->session->userdata('user_masuk');
		$data['pengguna_masuk'] = $this->admin->pengguna($user);
		$data['pengaturan'] = $this->admin->pengaturan();
		$data['daftarpengguna'] = $this->admin->daftarpengguna($user);

		// KHUSUS
		$data['judul'] = "Pengguna";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pengguna/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambah(){
		// UMUM
		$user = $this->session->userdata('user_masuk');
		$data['pengguna_masuk'] = $this->admin->pengguna($user);
		$data['pengaturan'] = $this->admin->pengaturan();

		// KHUSUS
		$this->form_validation->set_rules('username', 'Nama Pengguna', 'required|is_unique[pengguna.username]',[
			'required' => 'Nama Pengguna Harus Diisi!',
			'is_unique' => 'Nama Pengguna Sudah Ada!'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email',[
			'required' => 'Email Harus Diisi!',
			'valid_email' => 'Email Salah!'
		]);
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required',[
			'required' => 'Nama Lengkap Harus Diisi!'
		]);
		$this->form_validation->set_rules('password', 'Kata Sandi', 'required|min_length[6]',[
			'required' => 'Kata Sandi Harus Diisi!',
			'min_length' => 'Kata Sandi Terlalu Pendek! Minimal 6 Karakter!'
		]);
		$this->form_validation->set_rules('id_level', 'Level', 'required',[
			'required' => 'Level Harus Dipilih!'
		]);
		$this->form_validation->set_rules('status', 'Status', 'required',[
			'required' => 'Status Harus Dipilih!'
		]);

		if ($this->form_validation->run() == FALSE){
			$data['judul'] = "Pengguna";
			$data['subjudul'] = "Tambah Pengguna";
			$data['level'] = $this->admin->level();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('pengguna/tambah', $data);
			$this->load->view('templates/footer', $data);
		}else{
			echo "proses tambah pengguna";
		}
	}

	public function ubah($username=null){
		// UMUM
		$user = $this->session->userdata('user_masuk');
		$data['pengguna_masuk'] = $this->admin->pengguna($user);
		$data['pengaturan'] = $this->admin->pengaturan();

		if($username==null){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Tidak ada pengguna yang dipilih!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('pengguna');
		}else{
			// KHUSUS
			$data['judul'] = "Pengguna";
			$data['subjudul'] = "Detail Pengguna";
			$data['pengguna'] = $this->admin->pengguna($username);
			$data['level'] = $this->admin->level();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('pengguna/ubah', $data);
			$this->load->view('templates/footer', $data);

		}
	}

	public function status($username=null){
		if($username==null){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Tidak ada pengguna yang dipilih!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('pengguna');
		}else{
			$nama = $this->input->post('nama');
			$status = $this->input->post('status');
			$judul = $this->input->post('judul');

			$this->db->set('status', $status);
			$this->db->where('username', $username);
			$this->db->update('pengguna');

			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-check"></i> '. $nama .' telah di-'.$judul.'!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('pengguna');
		}
	}

	public function hapus($username=null){
		if($username==null){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Tidak ada pengguna yang dipilih!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect(base_url());
		}else{
			$nama = $this->input->post('nama');
			$foto = $this->input->post('foto');

			$this->db->where('username', $username);
			$this->db->delete('pengguna');

			if($foto!='user.png'){
				unlink(FCPATH.'assets/img/pengguna/'.$foto);
			}

			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-check"></i> '. $nama .' telah dihapus!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('pengguna');
		}
	}
}
