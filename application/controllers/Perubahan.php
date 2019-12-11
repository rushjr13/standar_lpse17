<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perubahan extends CI_Controller {

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
		$data['judul'] = "SOP Perubahan";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('perubahan/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function form($opsi=null, $id=null){
		// UMUM
		$user = $this->session->userdata('user_masuk');
		$data['pengguna_masuk'] = $this->admin->pengguna($user);
		$data['pengaturan'] = $this->admin->pengaturan();
		$data['tgl_sekarang'] = $this->admin->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->admin->hari(date('l'));
		$data['menu_akses'] = $this->admin->menu_akses($user);

		// KHUSUS
		if($opsi==null){
			$data['judul'] = "Pencatatan Perubahan";
			$data['perubahan'] = $this->perubahan->perubahan();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('perubahan/form/index', $data);
			$this->load->view('templates/footer', $data);
		}else if($opsi=='tambah'){
			$data = [
				'id_perubahan'=>$this->input->post('id_perubahan'),
				'tgl_permohonanperubahan'=>$this->input->post('tgl_permohonanperubahan'),
				'nama_pemohon'=>$this->input->post('nama_pemohon'),
				'kontak_pemohon'=>$this->input->post('kontak_pemohon'),
				'instansi_pemohon'=>$this->input->post('instansi_pemohon'),
				'deskripsi_perubahan'=>$this->input->post('deskripsi_perubahan'),
				'tgl_berlakuperubahan'=>$this->input->post('tgl_berlakuperubahan'),
				'mt_perubahan'=>$this->input->post('mt_perubahan'),
				'jenis_perubahan'=>null,
				'kategori_perubahan'=>null,
				'dampak_lingkungan'=>null,
				'sumber'=>null,
				'deskripsi_ujicoba'=>null,
				'deskripsi_rollback'=>null,
				'status_permintaan'=>null,
				'ket_statuspermintaan'=>null,
				'jadwal_perubahan'=>date('Y-m-d', time()),
				'petugas_implementasi'=>null,
				'test_perubahan'=>null,
				'implementasi_perubahan'=>null,
				'tgl_implementasi'=>date('Y-m-d', time()),
				'status_perubahan'=>'Tercatat',
				'pengelola_perubahan'=>$user,
				'tgl_update'=>time()
			];
			$this->db->insert('perubahan', $data);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-info-circle"></i> Pencatatan Perubahan Telah ditambahkan!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('perubahan/form');
		}else if($opsi=='hapus'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak ada Pencatatan Perubahan yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('perubahan/form');
			}else{
				$this->db->where('id_perubahan', $id);
				$this->db->delete('perubahan');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Pencatatan Perubahan <strong>'.$id.'</strong> Telah dihapus!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('perubahan/form');
			}
		}else if($opsi=='ubah_permohonan'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak ada Pencatatan Perubahan yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('perubahan/form');
			}else{
				$data = [
					'tgl_permohonanperubahan'=>$this->input->post('tgl_permohonanperubahan'),
					'nama_pemohon'=>$this->input->post('nama_pemohon'),
					'kontak_pemohon'=>$this->input->post('kontak_pemohon'),
					'instansi_pemohon'=>$this->input->post('instansi_pemohon'),
					'deskripsi_perubahan'=>$this->input->post('deskripsi_perubahan'),
					'tgl_berlakuperubahan'=>$this->input->post('tgl_berlakuperubahan'),
					'mt_perubahan'=>$this->input->post('mt_perubahan'),
					'pengelola_perubahan'=>$user,
					'tgl_update'=>time()
				];
				$this->db->set($data);
				$this->db->where('id_perubahan', $id);
				$this->db->update('perubahan');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Data Permohonan Perubahan <strong>'.$id.'</strong> Telah diperbarui!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('perubahan/form');
			}
		}
	}
}
