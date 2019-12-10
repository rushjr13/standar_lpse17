<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

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
		$data['judul'] = "Pengguna";
		$data['daftarpengguna'] = $this->admin->daftarpengguna($user);
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
		$data['tgl_sekarang'] = $this->admin->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->admin->hari(date('l'));
		$data['menu_akses'] = $this->admin->menu_akses($user);

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
			$username = htmlspecialchars($this->input->post('username'));
			$password = htmlspecialchars($this->input->post('password'));
			$email = $this->input->post('email');
			$nama_lengkap = htmlspecialchars($this->input->post('nama_lengkap'));
			$id_level = $this->input->post('id_level');
			$status = $this->input->post('status');

			// Cek foto_calon yang diupload
			$foto_upload = $_FILES['foto']['name'];

			if($foto_upload){
				$config['allowed_types']	= 'jpg|jpeg|png';
				$config['max_size']			= '1024';
				$config['upload_path']		= './assets/img/pengguna/';
				$this->load->library('upload', $config);
				if($this->upload->do_upload('foto')){
					$foto = $this->upload->data('file_name');
					$data = [
						'username'=>$username,
						'password'=>$password,
						'email'=>$email,
						'nama_lengkap'=>$nama_lengkap,
						'id_level'=>$id_level,
						'status'=>$status,
						'foto'=>$foto,
						'tgl_daftar'=>time(),
						'tgl_update'=>time()
					];
				} else {
					echo $this->upload->display_errors();
				}
			}else{
				$data = [
					'username'=>$username,
					'password'=>$password,
					'email'=>$email,
					'nama_lengkap'=>$nama_lengkap,
					'id_level'=>$id_level,
					'status'=>$status,
					'foto'=>'user.png',
					'tgl_daftar'=>time(),
					'tgl_update'=>time()
				];
			}

			$this->db->insert('pengguna', $data);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-info-circle"></i> <strong>'.$nama_lengkap.'</strong> telah ditambahkan!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('pengguna');
		}
	}

	public function ubah($username=null){
		// UMUM
		$user = $this->session->userdata('user_masuk');
		$data['pengguna_masuk'] = $this->admin->pengguna($user);
		$data['pengaturan'] = $this->admin->pengaturan();
		$data['tgl_sekarang'] = $this->admin->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->admin->hari(date('l'));
		$data['menu_akses'] = $this->admin->menu_akses($user);

		// KHUSUS
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
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email',[
				'required' => 'Email Harus Diisi!',
				'valid_email' => 'Email Salah!'
			]);
			$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required',[
				'required' => 'Nama Lengkap Harus Diisi!'
			]);
			$this->form_validation->set_rules('id_level', 'Level', 'required',[
				'required' => 'Level Harus Dipilih!'
			]);
			$this->form_validation->set_rules('status', 'Status', 'required',[
				'required' => 'Status Harus Dipilih!'
			]);

			if ($this->form_validation->run() == FALSE){
				$data['judul'] = "Pengguna";
				$data['subjudul'] = "Detail Pengguna";
				$data['pengguna'] = $this->admin->pengguna($username);
				$data['level'] = $this->admin->level();
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('pengguna/ubah', $data);
				$this->load->view('templates/footer', $data);
			}else{
				$password = htmlspecialchars($this->input->post('password'));
				$email = $this->input->post('email');
				$nama_lengkap = htmlspecialchars($this->input->post('nama_lengkap'));
				$id_level = $this->input->post('id_level');
				$status = $this->input->post('status');

				// Cek foto_calon yang diupload
				$foto_upload = $_FILES['foto']['name'];

				if($foto_upload){
					$config['allowed_types']	= 'jpg|jpeg|png';
					$config['upload_path']		= './assets/img/pengguna/';
					$this->load->library('upload', $config);
					if($this->upload->do_upload('foto')){
						$foto = $this->upload->data('file_name');
						if($password){
							$data = [
								'password'=>$password,
								'email'=>$email,
								'nama_lengkap'=>$nama_lengkap,
								'id_level'=>$id_level,
								'status'=>$status,
								'foto'=>$foto,
								'tgl_update'=>time()
							];
						}else{
							$data = [
								'email'=>$email,
								'nama_lengkap'=>$nama_lengkap,
								'id_level'=>$id_level,
								'status'=>$status,
								'foto'=>$foto,
								'tgl_update'=>time()
							];
						}
					} else {
						echo $this->upload->display_errors();
					}
				}else{
					if($password){
						$data = [
							'password'=>$password,
							'email'=>$email,
							'nama_lengkap'=>$nama_lengkap,
							'id_level'=>$id_level,
							'status'=>$status,
							'tgl_update'=>time()
						];
					}else{
						$data = [
							'email'=>$email,
							'nama_lengkap'=>$nama_lengkap,
							'id_level'=>$id_level,
							'status'=>$status,
							'tgl_update'=>time()
						];
					}
				}

				$this->db->set($data);
				$this->db->where('username', $username);
				$this->db->update('pengguna');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Data Pengguna <strong>'.$nama_lengkap.'</strong> telah diperbarui!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('pengguna');
			}

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

	public function akses($username=null){
		// UMUM
		$user = $this->session->userdata('user_masuk');
		$data['pengguna_masuk'] = $this->admin->pengguna($user);
		$data['pengaturan'] = $this->admin->pengaturan();
		$data['tgl_sekarang'] = $this->admin->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->admin->hari(date('l'));
		$data['menu_akses'] = $this->admin->menu_akses($user);

		// KHUSUS
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
			$data['subjudul'] = "Akses Menu Pengguna";
			$data['pengguna'] = $this->admin->pengguna($username);
			$data['menu'] = $this->admin->menu();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('pengguna/akses', $data);
			$this->load->view('templates/footer', $data);

		}
	}

	public function profil($username=null){
		// UMUM
		$user = $this->session->userdata('user_masuk');
		$data['pengguna_masuk'] = $this->admin->pengguna($user);
		$data['pengaturan'] = $this->admin->pengaturan();
		$data['tgl_sekarang'] = $this->admin->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->admin->hari(date('l'));
		$data['menu_akses'] = $this->admin->menu_akses($user);

		// KHUSUS
		if($username==null){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Tidak ada pengguna yang dipilih!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('beranda');
		}else{
			// KHUSUS
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email',[
				'required' => 'Email Harus Diisi!',
				'valid_email' => 'Email Salah!'
			]);
			$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required',[
				'required' => 'Nama Lengkap Harus Diisi!'
			]);

			if ($this->form_validation->run() == FALSE){
				$data['judul'] = "Profil";
				$data['subjudul'] = "Detail Pengguna";
				$data['level'] = $this->admin->level();
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('pengguna/profil', $data);
				$this->load->view('templates/footer', $data);
			}else{
				$password = htmlspecialchars($this->input->post('password'));
				$email = $this->input->post('email');
				$nama_lengkap = htmlspecialchars($this->input->post('nama_lengkap'));

				// Cek foto_calon yang diupload
				$foto_upload = $_FILES['foto']['name'];

				if($foto_upload){
					$config['allowed_types']	= 'jpg|jpeg|png';
					$config['upload_path']		= './assets/img/pengguna/';
					$this->load->library('upload', $config);
					if($this->upload->do_upload('foto')){
						$foto = $this->upload->data('file_name');
						if($password){
							$data = [
								'password'=>$password,
								'email'=>$email,
								'nama_lengkap'=>$nama_lengkap,
								'foto'=>$foto
							];
						}else{
							$data = [
								'email'=>$email,
								'nama_lengkap'=>$nama_lengkap,
								'foto'=>$foto
							];
						}
					} else {
						echo $this->upload->display_errors();
					}
				}else{
					if($password){
						$data = [
							'password'=>$password,
							'email'=>$email,
							'nama_lengkap'=>$nama_lengkap
						];
					}else{
						$data = [
							'email'=>$email,
							'nama_lengkap'=>$nama_lengkap
						];
					}
				}

				$this->db->set($data);
				$this->db->where('username', $username);
				$this->db->update('pengguna');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Data Anda telah diperbarui!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('pengguna/profil/'.$username);
			}

		}
	}
}
