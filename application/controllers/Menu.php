<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

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
		$data['judul'] = "Menu";
		$data['menu'] = $this->admin->menu();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambah(){
		$id_menu = uniqid(10);
		$nama_menu = htmlspecialchars($this->input->post('nama_menu'));

		$data = [
			'id_menu'=>$id_menu,
			'nama_menu'=>$nama_menu
		];
		$this->db->insert('menu', $data);
		$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
												  <i class="fa fa-fw fa-check"></i> '. $nama_menu .' telah ditambahkan!
												  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												    <span aria-hidden="true">&times;</span>
												  </button>
												</div>');
		redirect('menu');
	}

	public function ubah($id_menu=null){
		if($id_menu==null){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Tidak ada menu yang dipilih!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('menu');
		}else{
			$nama_menu = htmlspecialchars($this->input->post('nama_menu'));

			$this->db->set('nama_menu', $nama_menu);
			$this->db->where('id_menu', $id_menu);
			$this->db->update('menu');
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-check"></i> '. $nama_menu .' telah diperbarui!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('menu');

		}
	}

	public function hapus($id_menu=null){
		if($id_menu==null){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Tidak ada menu yang dipilih!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect(base_url());
		}else{
			$nama_menu = $this->input->post('nama_menu');

			$this->db->where('id_menu', $id_menu);
			$this->db->delete('menu');

			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-check"></i> '. $nama_menu .' telah dihapus!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('menu');
		}
	}

	public function submenu($id_menu=null){
		// UMUM
		$user = $this->session->userdata('user_masuk');
		$data['pengguna_masuk'] = $this->admin->pengguna($user);
		$data['pengaturan'] = $this->admin->pengaturan();
		$data['tgl_sekarang'] = $this->admin->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->admin->hari(date('l'));
		$data['menu_akses'] = $this->admin->menu_akses($user);

		// KHUSUS
		if($id_menu==null){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Tidak ada menu yang dipilih!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('menu');
		}else{
			$data['judul'] = "Menu";
			$data['subjudul'] = "Sub Menu";
			$data['menudata'] = $this->admin->menu($id_menu);
			$data['submenubymenu'] = $this->admin->submenubymenu($id_menu);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/submenu', $data);
			$this->load->view('templates/footer', $data);
		}
	}

	public function tambahsubmenu($id_menu=null){
		if($id_menu==null){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Tidak ada menu yang dipilih!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('menu');
		}else{
			$id_submenu = uniqid(10);
			$nama_submenu = htmlspecialchars($this->input->post('nama_submenu'));
			$link = htmlspecialchars($this->input->post('link'));
			$icon = htmlspecialchars($this->input->post('icon'));

			$data = [
				'id_submenu'=>$id_submenu,
				'id_menu'=>$id_menu,
				'nama_submenu'=>$nama_submenu,
				'link'=>$link,
				'icon'=>$icon
			];
			$this->db->insert('submenu', $data);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-check"></i> '. $nama_submenu .' telah ditambahkan!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('menu/submenu/'.$id_menu);
		}
	}

	public function ubahsubmenu($id_menu=null, $id_submenu=null){
		if($id_menu==null){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Tidak ada menu yang dipilih!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('menu');
		}else{
			if($id_submenu==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak ada sub menu yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('menu/submenu/'.$id_menu);
			}else{
				$nama_submenu = htmlspecialchars($this->input->post('nama_submenu'));
				$link = htmlspecialchars($this->input->post('link'));
				$icon = htmlspecialchars($this->input->post('icon'));

				$data = [
					'id_menu'=>$id_menu,
					'nama_submenu'=>$nama_submenu,
					'link'=>$link,
					'icon'=>$icon
				];

				$this->db->set($data);
				$this->db->where('id_submenu', $id_submenu);
				$this->db->update('submenu');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-check"></i> '. $nama_submenu .' telah diperbarui!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('menu/submenu/'.$id_menu);
			}
		}
	}

	public function hapussubmenu($id_menu=null, $id_submenu=null){
		if($id_menu==null){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Tidak ada menu yang dipilih!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('menu');
		}else{
			if($id_submenu==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak ada sub menu yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('menu/submenu/'.$id_menu);
			}else{
				$nama_submenu = htmlspecialchars($this->input->post('nama_submenu'));

				$this->db->where('id_submenu', $id_submenu);
				$this->db->delete('submenu');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-check"></i> '. $nama_submenu .' telah dihapus!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('menu/submenu/'.$id_menu);
			}
		}
	}

	public function akses($username=null, $id_menu=null, $ket=null){
		if($username==null){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Tidak ada pengguna yang dipilih!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect(base_url('pengguna'));
		}else{
			if($id_menu==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak ada menu yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect(base_url('pengguna'));
			}else{
				if($ket==null){
					$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-ban"></i> Tidak ada akses yang dipilih!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect(base_url('pengguna'));
				}else{
					if($ket=='on'){
						$data = [
							'id_am'=>time(),
							'username'=>$username,
							'id_menu'=>$id_menu,
						];

						$this->db->insert('akses_menu', $data);
						$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
																  <i class="fa fa-fw fa-ban"></i> Akses Telah Diberikan!
																  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																    <span aria-hidden="true">&times;</span>
																  </button>
																</div>');
						redirect(base_url('pengguna/akses/'.$username));
					}else if($ket=='off'){
						$this->db->where('username', $username);
						$this->db->where('id_menu', $id_menu);
						$this->db->delete('akses_menu');
						$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
																  <i class="fa fa-fw fa-ban"></i> Akses Telah Dibatalkan!
																  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																    <span aria-hidden="true">&times;</span>
																  </button>
																</div>');
						redirect(base_url('pengguna/akses/'.$username));
					}
				}
			}
		}
	}
}
