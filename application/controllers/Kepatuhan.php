<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepatuhan extends CI_Controller {

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
		$link = $this->uri->segment('1');
		$menu_segmen = $this->admin->menu_segmen($link);
		$id_menu = $menu_segmen['id_menu'];
		$data['akses_menu'] = $this->admin->akses_menu($id_menu, $user)->num_rows();

		// KHUSUS
		$data['judul'] = "Buku Induk Kebijakan";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kepatuhan/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function software(){
		// UMUM
		$user = $this->session->userdata('user_masuk');
		$data['pengguna_masuk'] = $this->admin->pengguna($user);
		$data['pengaturan'] = $this->admin->pengaturan();
		$data['tgl_sekarang'] = $this->admin->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->admin->hari(date('l'));
		$data['menu'] = $this->admin->menu();
		$link = $this->uri->segment('1');
		$menu_segmen = $this->admin->menu_segmen($link);
		$id_menu = $menu_segmen['id_menu'];
		$data['akses_menu'] = $this->admin->akses_menu($id_menu, $user)->num_rows();

		// KHUSUS
		$data['judul'] = "Software dan Lisensi";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kepatuhan/software/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function form(){
		// UMUM
		$user = $this->session->userdata('user_masuk');
		$data['pengguna_masuk'] = $this->admin->pengguna($user);
		$data['pengaturan'] = $this->admin->pengaturan();
		$data['tgl_sekarang'] = $this->admin->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->admin->hari(date('l'));
		$data['menu'] = $this->admin->menu();
		$link = $this->uri->segment('1');
		$menu_segmen = $this->admin->menu_segmen($link);
		$id_menu = $menu_segmen['id_menu'];
		$data['akses_menu'] = $this->admin->akses_menu($id_menu, $user)->num_rows();

		// KHUSUS
		$data['judul'] = "Wawancara";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kepatuhan/form/index', $data);
		$this->load->view('templates/footer', $data);
	}
}
