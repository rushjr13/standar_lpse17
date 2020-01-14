<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Internal extends CI_Controller {

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
		$menu_segmen = $this->admin->menu_segmen($link);
		$id_menu = $menu_segmen['id_menu'];
		if($id_menu!=''){
			$data['akses_menu'] = $this->admin->akses_menu($id_menu, $user)->num_rows();
		}

		// KHUSUS
		$data['judul'] = "SOP Penilaian Internal";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('internal/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function penilaian(){
		// UMUM
		$user = $this->session->userdata('user_masuk');
		$data['pengguna_masuk'] = $this->admin->pengguna($user);
		$data['pengaturan'] = $this->admin->pengaturan();
		$data['tgl_sekarang'] = $this->admin->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->admin->hari(date('l'));
		$data['menu'] = $this->admin->menu();
		$data['pengumuman'] = $this->admin->pengumuman5();
		$link = $this->uri->segment('1');
		$menu_segmen = $this->admin->menu_segmen($link);
		$id_menu = $menu_segmen['id_menu'];
		if($id_menu!=''){
			$data['akses_menu'] = $this->admin->akses_menu($id_menu, $user)->num_rows();
		}

		// KHUSUS
		$data['judul'] = "Penilaian Mandiri Internal";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('internal/penilaian/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function dokumen(){
		// UMUM
		$user = $this->session->userdata('user_masuk');
		$data['pengguna_masuk'] = $this->admin->pengguna($user);
		$data['pengaturan'] = $this->admin->pengaturan();
		$data['tgl_sekarang'] = $this->admin->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->admin->hari(date('l'));
		$data['menu'] = $this->admin->menu();
		$data['pengumuman'] = $this->admin->pengumuman5();
		$link = $this->uri->segment('1');
		$menu_segmen = $this->admin->menu_segmen($link);
		$id_menu = $menu_segmen['id_menu'];
		if($id_menu!=''){
			$data['akses_menu'] = $this->admin->akses_menu($id_menu, $user)->num_rows();
		}

		// KHUSUS
		$data['judul'] = "Dokumen Penilaian Internal";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('internal/dokumen/index', $data);
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
		$data['pengumuman'] = $this->admin->pengumuman5();
		$link = $this->uri->segment('1');
		$menu_segmen = $this->admin->menu_segmen($link);
		$id_menu = $menu_segmen['id_menu'];
		if($id_menu!=''){
			$data['akses_menu'] = $this->admin->akses_menu($id_menu, $user)->num_rows();
		}

		// KHUSUS
		$data['judul'] = "Pencatatan Internal";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('internal/form/index', $data);
		$this->load->view('templates/footer', $data);
	}
}
