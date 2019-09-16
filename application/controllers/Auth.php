<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
		
	public function masuk(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$cek_pengguna = $this->admin->cek_pengguna($username);
		$pengguna = $cek_pengguna->row_array();
		if($cek_pengguna->num_rows()>0){
			if($password == $pengguna['password']){
				if($pengguna['status']=='Aktif'){
					$this->session->set_userdata('user_masuk', $username);
					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info-circle"></i> Selamat Datang <strong>'.$pengguna['nama_lengkap'].'</strong> ! Kami Senang Melihat Anda Kembali.
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect(base_url());
				} else {
					$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-ban"></i> Pengguna <strong>'.$pengguna['nama_lengkap'].'</strong> belum aktif! Silahkan hubungi <strong>Administrator</strong> untuk aktivasi Akun Anda!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect(base_url());
				}
			} else {
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Kata Sandi Salah!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect(base_url());
			}
		} else {
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Nama Pengguna Salah!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect(base_url());
		}
	}

	public function daftar(){
		$username = $this->input->post('username');
		$pass1 = $this->input->post('pass1');
		$pass2 = $this->input->post('pass2');
		$email = $this->input->post('email');
		$nama_lengkap = $this->input->post('nama_lengkap');

		$cek_pengguna = $this->admin->cek_pengguna($username);
		if($cek_pengguna->num_rows()>0){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> <strong>Pendaftaran Gagal!</strong><br>Nama Pengguna sudah digunakan!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect(base_url());
		} else {
			$cek_email = $this->admin->cek_email($email);
			if($cek_email->num_rows()>0){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> <strong>Pendaftaran Gagal!</strong><br>Email sudah digunakan!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect(base_url());
			}else{
				if($pass2!=$pass1){
					$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-ban"></i> <strong>Pendaftaran Gagal!</strong><br>Kata Sandi tidak sama!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect(base_url());
				}else{
					$data = [
						'username'=>$username,
						'password'=>$pass2,
						'email'=>$email,
						'nama_lengkap'=>$nama_lengkap,
						'id_level'=>2,
						'status'=>'Belum Aktif',
						'foto'=>'user.png',
						'foto'=>'user.png',
						'tgl_daftar'=>time(),
						'tgl_update'=>time()
					];

					$this->db->insert('pengguna', $data);
					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info-circle"></i> <strong>Pendaftaran Berhasil!</strong><br>Silahkan hubungi Administrator untuk mengaktifkan akun anda!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect(base_url());
				}
			}
		}
	}

	public function keluar()
	{
		$this->session->unset_userdata('user_masuk');
		$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
												  <i class="fa fa-fw fa-info-circle"></i> Anda Telah Keluar!
												  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												    <span aria-hidden="true">&times;</span>
												  </button>
												</div>');
		redirect(base_url());
	}
}
