<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
		
	public function index(){
		// UMUM
		$user = $this->session->userdata('user_masuk');
		$data['pengguna_masuk'] = $this->admin->pengguna($user);
		$data['pengaturan'] = $this->admin->pengaturan();
		$data['menu_akses'] = $this->admin->menu_akses($user);

		// KHUSUS
		$data['judul'] = "Beranda";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('index', $data);
		$this->load->view('templates/footer', $data);
	}
}
