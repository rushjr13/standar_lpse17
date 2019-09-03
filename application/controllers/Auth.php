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
