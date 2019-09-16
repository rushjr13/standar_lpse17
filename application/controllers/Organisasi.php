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
		$data['menu_akses'] = $this->admin->menu_akses($user);

		// KHUSUS
		$data['judul'] = "Struktur Organisasi";
		$data['struktur_organisasi'] = $this->admin->struktur_organisasi();
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
		$data['menu_akses'] = $this->admin->menu_akses($user);

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
		$data['menu_akses'] = $this->admin->menu_akses($user);

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
		$data['menu_akses'] = $this->admin->menu_akses($user);

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
}
