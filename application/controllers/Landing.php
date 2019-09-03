<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {
		
	public function index(){
		// UMUM
		$id_pengguna = $this->session->userdata('id_user_masuk');
		$data['pengguna_masuk'] = $this->admin->pengguna($id_pengguna);
		$data['pengaturan'] = $this->admin->pengaturan();

		// KHUSUS
		$data['judul'] = "Beranda";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('landing/index', $data);
		$this->load->view('templates/footer', $data);
	}
}
