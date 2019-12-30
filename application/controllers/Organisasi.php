<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organisasi extends CI_Controller {

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
		$data['akses_menu'] = $this->admin->akses_menu($id_menu);

		// KHUSUS
		$data['judul'] = "Struktur Organisasi";
		$data['struktur_organisasi'] = $this->admin->struktur_organisasi();
		$data['tujuan_organisasi'] = $this->admin->tujuan_organisasi();
		$data['gambar_organisasi'] = $this->admin->gambar_organisasi();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('organisasi/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tupoksi($id_su=null){
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
		$data['akses_menu'] = $this->admin->akses_menu($id_menu);

		// KHUSUS
		if($id_su==null){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Tidak ada Jabatan yang dipilih!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('organisasi');
		}else{
			$this->form_validation->set_rules('jabatan_su', 'Nama Jabatan', 'required',[
				'required' => 'Nama Jabatan Harus Diisi!'
			]);
			$this->form_validation->set_rules('tugas_su', 'Tugas & Tanggung Jawab', 'required',[
				'required' => 'Tugas & Tanggung Jawab Harus Diisi!'
			]);

			if ($this->form_validation->run() == FALSE){
				$data['judul'] = "Struktur Organisasi";
				$data['struktur_organisasi'] = $this->admin->struktur_organisasi($id_su);
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('organisasi/ubah_su', $data);
				$this->load->view('templates/footer', $data);
			}else{
				$jabatan_su = $this->input->post('jabatan_su');
				$tugas_su = $this->input->post('tugas_su');

				$data = [
					'jabatan_su'=>$jabatan_su,
					'tugas_su'=>$tugas_su
				];

				$this->db->set($data);
				$this->db->where('id_su', $id_su);
				$this->db->update('organisasi_struktur');

				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-check"></i> Tugas & Tanggung Jawab <strong>'.$jabatan_su.'</strong> telah diperbarui!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('organisasi');
			}
		}
	}

	public function tupoksitambahan($id_su=null, $id_st=null){
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
		$data['akses_menu'] = $this->admin->akses_menu($id_menu);

		// KHUSUS
		if($id_su==null){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Tidak ada Jabatan yang dipilih!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('organisasi');
		}else{
			if($id_st==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak ada tugas tambahan yang dipilih yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('organisasi');
			}else{
				$this->form_validation->set_rules('jabatan_st', 'Nama Jabatan', 'required',[
					'required' => 'Nama Jabatan Harus Diisi!'
				]);
				$this->form_validation->set_rules('tugas_st', 'Tugas & Tanggung Jawab', 'required',[
					'required' => 'Tugas & Tanggung Jawab Harus Diisi!'
				]);

				if ($this->form_validation->run() == FALSE){
					$data['judul'] = "Struktur Organisasi";
					$data['struktur_organisasi'] = $this->admin->struktur_organisasi($id_su);
					$data['tugas_tambahan'] = $this->admin->tugas_tambahan($id_st);
					$this->load->view('templates/header', $data);
					$this->load->view('templates/sidebar', $data);
					$this->load->view('templates/topbar', $data);
					$this->load->view('organisasi/ubah_st', $data);
					$this->load->view('templates/footer', $data);
				}else{
					$jabatan_st = $this->input->post('jabatan_st');
					$tugas_st = $this->input->post('tugas_st');

					$data = [
						'jabatan_st'=>$jabatan_st,
						'tugas_st'=>$tugas_st
					];

					$this->db->set($data);
					$this->db->where('id_st', $id_st);
					$this->db->update('organisasi_st');

					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-check"></i> Tugas & Tanggung Jawab Tambahan <strong>'.$jabatan_st.'</strong> telah diperbarui!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('organisasi');
				}
			}
		}
	}

	public function tambah_tupoksitambahan($id_su=null){
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
		$data['akses_menu'] = $this->admin->akses_menu($id_menu);

		// KHUSUS
		if($id_su==null){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Tidak ada Jabatan yang dipilih!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('organisasi');
		}else{
			$this->form_validation->set_rules('jabatan_st', 'Nama Jabatan', 'required',[
				'required' => 'Nama Jabatan Tambahan Harus Diisi!'
			]);
			$this->form_validation->set_rules('tugas_st', 'Tugas & Tanggung Jawab', 'required',[
				'required' => 'Tugas & Tanggung Jawab Tambahan Harus Diisi!'
			]);

			if ($this->form_validation->run() == FALSE){
				$data['judul'] = "Struktur Organisasi";
				$data['struktur_organisasi'] = $this->admin->struktur_organisasi($id_su);
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('organisasi/tambah_st', $data);
				$this->load->view('templates/footer', $data);
			}else{
				$jabatan_st = $this->input->post('jabatan_st');
				$tugas_st = $this->input->post('tugas_st');

				$data = [
					'id_st'=>time(),
					'id_su'=>$id_su,
					'jabatan_st'=>$jabatan_st,
					'tugas_st'=>$tugas_st
				];

				$this->db->insert('organisasi_st', $data);
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-check"></i> Tugas & Tanggung Jawab Tambahan <strong>'.$jabatan_st.'</strong> telah ditambahkan!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('organisasi');
			}
		}
	}

	public function hapus_tupoksitambahan($id_su=null, $id_st=null){
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
		$data['akses_menu'] = $this->admin->akses_menu($id_menu);

		// KHUSUS
		if($id_su==null){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Tidak ada Jabatan yang dipilih!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('organisasi');
		}else{
			if($id_st==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak ada tugas tambahan yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('organisasi');
			}else{
				$jabatan_st = $this->input->post('jabatan_st');

				$this->db->where('id_st', $id_st);
				$this->db->delete('organisasi_st');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-check"></i> Tugas & Tanggung Jawab Tambahan <strong>'.$jabatan_st.'</strong> telah dihapus!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('organisasi');
			}
		}
	}

	public function tambah_tupoksi(){
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
		$data['akses_menu'] = $this->admin->akses_menu($id_menu);

		// KHUSUS
		$this->form_validation->set_rules('jabatan_su', 'Nama Jabatan', 'required',[
			'required' => 'Nama Jabatan Harus Diisi!'
		]);
		$this->form_validation->set_rules('tugas_su', 'Tugas & Tanggung Jawab', 'required',[
			'required' => 'Tugas & Tanggung Jawab Harus Diisi!'
		]);

		if ($this->form_validation->run() == FALSE){
			$data['judul'] = "Struktur Organisasi";
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('organisasi/tambah_su', $data);
			$this->load->view('templates/footer', $data);
		}else{
			$jabatan_su = $this->input->post('jabatan_su');
			$tugas_su = $this->input->post('tugas_su');

			$data = [
				'id_su'=>time(),
				'jabatan_su'=>$jabatan_su,
				'tugas_su'=>$tugas_su
			];

			$this->db->insert('organisasi_struktur', $data);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-check"></i> Tugas & Tanggung Jawab <strong>'.$jabatan_su.'</strong> telah ditambahkan!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('organisasi');
		}
	}

	public function hapus_tupoksi($id_su=null){
		if($id_su==null){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Tidak ada Jabatan yang dipilih!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('organisasi');
		}else{
			$jabatan_su = $this->input->post('jabatan_su');

			$this->db->where('id_su', $id_su);
			$this->db->delete('organisasi_struktur');

			$this->db->where('id_su', $id_su);
			$this->db->delete('organisasi_st');
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-check"></i> Jabatan <strong>'.$jabatan_su.'</strong> telah dihapus!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('organisasi');
		}
	}

	public function tujuan_organisasi($id=null){
		if($id==null){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Gagal mengubah tujuan organisasi!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('organisasi');
		}else if($id=='tujuan'){
			$data = [
				'isi_ot'=>$this->input->post('isi_ot')
			];
			$this->db->set($data);
			$this->db->where('id_ot', 'tujuan');
			$this->db->update('organisasi_tujuan');
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-check"></i> Tujuan organisasi telah diperbarui!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('organisasi');
		}else if($id=='gambar'){
			// Cek foto_calon yang diupload
			$isi_ot_upload = $_FILES['isi_ot']['name'];

			if($isi_ot_upload){
				$config['allowed_types']	= 'jpg|jpeg|png';
				$config['upload_path']		= './assets/img/';
				$this->load->library('upload', $config);
				if($this->upload->do_upload('isi_ot')){
					$isi_ot_lama = $this->input->post('isi_ot_lama');
					if($isi_ot_lama!='strukturorganisasi.png'){
						unlink(FCPATH.'assets/img/'.$isi_ot_lama);
					}
					$isi_ot_baru = $this->upload->data('file_name');
					$this->db->set('isi_ot', $isi_ot_baru);
					$this->db->where('id_ot', 'gambar');
					$this->db->update('organisasi_tujuan');
					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-check"></i> Struktur organisasi telah diperbarui!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('organisasi');
				} else {
					echo $this->upload->display_errors();
				}
			}
		}
	}

	// SOP
	public function sop(){
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
		$data['akses_menu'] = $this->admin->akses_menu($id_menu);

		// KHUSUS
		$data['judul'] = "SOP Organisasi";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('organisasi/sop/index', $data);
		$this->load->view('templates/footer', $data);
	}

	// SK
	public function sk($opsi=null, $id=null){
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
		$data['akses_menu'] = $this->admin->akses_menu($id_menu);

		// KHUSUS
		if($opsi==null){
			$data['judul'] = "SK Organisasi";
			$data['sk_organisasi'] = $this->admin->sk_organisasi();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('organisasi/sk/index', $data);
			$this->load->view('templates/footer', $data);
		}else if($opsi=='tambah'){
			$this->form_validation->set_rules('nomor_sko', 'Nomor SK', 'required',[
				'required' => 'Nomor SK Harus Diisi!'
			]);
			$this->form_validation->set_rules('tanggal_sko', 'Tanggal SK', 'required',[
				'required' => 'Tanggal SK Harus Diisi!'
			]);
			$this->form_validation->set_rules('nama_sko', 'Nama SK', 'required',[
				'required' => 'Nama SK Harus Diisi!'
			]);
			$this->form_validation->set_rules('tentang_sko', 'SK Tentang', 'required',[
				'required' => 'SK Tentang Harus Diisi!'
			]);

			if ($this->form_validation->run() == FALSE){
				$data['judul'] = "SK Organisasi";
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('organisasi/sk/tambah', $data);
				$this->load->view('templates/footer', $data);
			}else{
				$nomor_sko = $this->input->post('nomor_sko');
				$tanggal_sko = $this->input->post('tanggal_sko');
				$nama_sko = $this->input->post('nama_sko');
				$tentang_sko = $this->input->post('tentang_sko');

				// Cek foto_calon yang diupload
				$file_sko_upload = $_FILES['file_sko']['name'];

				if($file_sko_upload){
					$config['allowed_types']	= 'pdf';
					$config['upload_path']		= './uploads/pdf/sk_organisasi/';
					$this->load->library('upload', $config);
					if($this->upload->do_upload('file_sko')){
						$file_sko = $this->upload->data('file_name');
						$data = [
							'id_sko'=>time(),
							'nomor_sko'=>$nomor_sko,
							'tanggal_sko'=>$tanggal_sko,
							'nama_sko'=>$nama_sko,
							'tentang_sko'=>$tentang_sko,
							'file_sko'=>$file_sko,
							'tgl_update'=>time()
						];
					} else {
						echo $this->upload->display_errors();
					}
				}
				$this->db->insert('organisasi_sk', $data);
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> <strong>'.$nama_sko.'</strong> telah ditambahkan!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('organisasi/sk');
			}
		}else if($opsi=='ubah'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak SK yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('organisasi/sk');
			}else{
				$this->form_validation->set_rules('nomor_sko', 'Nomor SK', 'required',[
					'required' => 'Nomor SK Harus Diisi!'
				]);
				$this->form_validation->set_rules('tanggal_sko', 'Tanggal SK', 'required',[
					'required' => 'Tanggal SK Harus Diisi!'
				]);
				$this->form_validation->set_rules('nama_sko', 'Nama SK', 'required',[
					'required' => 'Nama SK Harus Diisi!'
				]);
				$this->form_validation->set_rules('tentang_sko', 'SK Tentang', 'required',[
					'required' => 'SK Tentang Harus Diisi!'
				]);

				if ($this->form_validation->run() == FALSE){
					$data['judul'] = "SK Organisasi";
					$data['sk_organisasi'] = $this->admin->sk_organisasi($id);
					$this->load->view('templates/header', $data);
					$this->load->view('templates/sidebar', $data);
					$this->load->view('templates/topbar', $data);
					$this->load->view('organisasi/sk/ubah', $data);
					$this->load->view('templates/footer', $data);
				}else{
					$nomor_sko = $this->input->post('nomor_sko');
					$tanggal_sko = $this->input->post('tanggal_sko');
					$nama_sko = $this->input->post('nama_sko');
					$tentang_sko = $this->input->post('tentang_sko');
					$file_lama_sko = $this->input->post('file_lama_sko');

					$file_sko_upload = $_FILES['file_sko']['name'];

					if($file_sko_upload){
						$config['allowed_types']	= 'pdf';
						$config['upload_path']		= './uploads/pdf/sk_organisasi/';
						$this->load->library('upload', $config);
						if($this->upload->do_upload('file_sko')){
							$file_sko = $this->upload->data('file_name');
							unlink(FCPATH.'uploads/pdf/sk_organisasi/'.$file_lama_sko);
							$data = [
								'nomor_sko'=>$nomor_sko,
								'tanggal_sko'=>$tanggal_sko,
								'nama_sko'=>$nama_sko,
								'tentang_sko'=>$tentang_sko,
								'file_sko'=>$file_sko,
								'tgl_update'=>time()
							];
						} else {
							echo $this->upload->display_errors();
						}
					}else{
						$data = [
							'nomor_sko'=>$nomor_sko,
							'tanggal_sko'=>$tanggal_sko,
							'nama_sko'=>$nama_sko,
							'tentang_sko'=>$tentang_sko,
							'tgl_update'=>time()
						];
					}
					$this->db->set($data);
					$this->db->where('id_sko', $id);
					$this->db->update('organisasi_sk');
					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info-circle"></i> <strong>'.$nama_sko.'</strong> telah diperbarui!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('organisasi/sk');
				}
			}
		} else if($opsi=='hapus'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak SK yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('organisasi/sk');
			}else{
				$nama_sko = $this->input->post('nama_sko');
				$file_sko = $this->input->post('file_sko');

				unlink(FCPATH.'uploads/pdf/sk_organisasi/'.$file_sko);

				$this->db->where('id_sko', $id);
				$this->db->delete('organisasi_sk');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> <strong>'.$nama_sko.'</strong> telah diperbarui!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('organisasi/sk');
			}
		}
	}
}
