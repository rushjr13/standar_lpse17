<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {

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
		$menu_segmen = $this->admin->menu_segmen($link)->row_array();
		$id_menu = $menu_segmen['id_menu'];
		if($id_menu!=''){
			$data['akses_menu'] = $this->admin->akses_menu($id_menu, $user)->num_rows();
		}

		// KHUSUS
		$data['judul'] = "SOP Keamanan Layanan";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('layanan/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function sk(){
		// UMUM
		$user = $this->session->userdata('user_masuk');
		$data['pengguna_masuk'] = $this->admin->pengguna($user);
		$data['pengaturan'] = $this->admin->pengaturan();
		$data['tgl_sekarang'] = $this->admin->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->admin->hari(date('l'));
		$data['menu'] = $this->admin->menu();
		$data['pengumuman'] = $this->admin->pengumuman5();
		$link = $this->uri->segment('1');
		$menu_segmen = $this->admin->menu_segmen($link)->row_array();
		$id_menu = $menu_segmen['id_menu'];
		if($id_menu!=''){
			$data['akses_menu'] = $this->admin->akses_menu($id_menu, $user)->num_rows();
		}

		// KHUSUS
		$data['judul'] = "SK Koordinator Layanan";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('layanan/sk/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function form($opsi=null, $id=null){
		// UMUM
		$user = $this->session->userdata('user_masuk');
		$data['pengguna_masuk'] = $this->admin->pengguna($user);
		$data['pengaturan'] = $this->admin->pengaturan();
		$data['tgl_sekarang'] = $this->admin->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->admin->hari(date('l'));
		$data['menu'] = $this->admin->menu();
		$data['pengumuman'] = $this->admin->pengumuman5();
		$link = $this->uri->segment('1');
		$menu_segmen = $this->admin->menu_segmen($link)->row_array();
		$id_menu = $menu_segmen['id_menu'];
		if($id_menu!=''){
			$data['akses_menu'] = $this->admin->akses_menu($id_menu, $user)->num_rows();
		}

		// KHUSUS
		if($opsi==null){
			$data['judul'] = "Form Keamanan Layanan";
			$data['layanan'] = $this->layanan->layanan();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('layanan/form/index', $data);
			$this->load->view('templates/footer', $data);
		}else if($opsi=='tambah'){
			if($data['akses_menu']>0){
				$this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required|is_unique[layanan.no_surat]',[
					'required' => 'Nomor Surat Harus Diisi!',
					'is_unique' => 'Nomor Surat Sudah Digunakan!',
				]);
				$this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required',[
					'required' => 'Tanggal Surat Harus Diisi!',
				]);
				$this->form_validation->set_rules('asal_surat', 'Asal Surat', 'required',[
					'required' => 'Asal Surat Harus Diisi!',
				]);
				$this->form_validation->set_rules('perihal_surat', 'Perihal Surat', 'required',[
					'required' => 'Perihal Surat Harus Diisi!',
				]);
				$this->form_validation->set_rules('nama_pemohon', 'Nama Pemohon', 'required',[
					'required' => 'Nama Pemohon Harus Diisi!',
				]);
				$this->form_validation->set_rules('instansi_pemohon', 'Instansi Pemohon', 'required',[
					'required' => 'Instansi Pemohon Harus Diisi!',
				]);
				$this->form_validation->set_rules('tujuan_pemohon', 'Tujuan Pemohon', 'required',[
					'required' => 'Tujuan Pemohon Harus Diisi!',
				]);
				$this->form_validation->set_rules('status_layanan', 'Status Layanan', 'required',[
					'required' => 'Status Layanan Harus Dipilih!',
				]);

				if ($this->form_validation->run() == FALSE){
					$data['judul'] = "Form Keamanan Layanan";
					$this->load->view('templates/header', $data);
					$this->load->view('templates/sidebar', $data);
					$this->load->view('templates/topbar', $data);
					$this->load->view('layanan/form/tambah', $data);
					$this->load->view('templates/footer', $data);
				}else{
					$post = $this->input->post(null, TRUE);

					$dok_upload = $_FILES['dokumen_surat']['name'];
					if($dok_upload){
						$config['allowed_types']	= 'pdf';
						$config['upload_path']		= './uploads/pdf/layanan/';
						$this->load->library('upload', $config);
						if($this->upload->do_upload('dokumen_surat')){
							$post['dokumen_surat'] = $this->upload->data('file_name');
							$this->layanan->tambah_form($post);
							$this->session->set_flashdata('info', '<div class="alert alert-success shadow-sm alert-dismissible fade show" role="alert">
																	  <i class="fa fa-fw fa-info-circle"></i> Form pencatatan keamanan layanan telah ditambahkan!
																	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																	    <span aria-hidden="true">&times;</span>
																	  </button>
																	</div>');
							redirect('layanan/form');
						} else {
							echo $this->upload->display_errors();
						}
					}
				}
			}else{
				$this->session->set_flashdata('info', '<div class="alert alert-danger shadow-sm alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Maaf. Anda bukan koordinator menu ini!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('layanan/form');
			}
		}else if($opsi=='surat'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger shadow-sm alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak ada layanan yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('layanan/form');
			}else{
				$data['judul'] = "Form Keamanan Layanan";
				$data['layanan'] = $this->layanan->layanan($id);
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('layanan/form/surat', $data);
				$this->load->view('templates/footer', $data);
			}
		}
	}
}
