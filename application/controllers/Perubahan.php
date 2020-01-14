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
		$data['menu'] = $this->admin->menu();
		$data['pengumuman'] = $this->admin->pengumuman5();
		$link = $this->uri->segment('1');
		$menu_segmen = $this->admin->menu_segmen($link);
		$id_menu = $menu_segmen['id_menu'];
		if($id_menu!=''){
			$data['akses_menu'] = $this->admin->akses_menu($id_menu, $user)->num_rows();
		}
		

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
		$data['menu'] = $this->admin->menu();
		$data['pengumuman'] = $this->admin->pengumuman5();
		$link = $this->uri->segment('1');
		$menu_segmen = $this->admin->menu_segmen($link);
		$id_menu = $menu_segmen['id_menu'];
		if($id_menu!=''){
			$data['akses_menu'] = $this->admin->akses_menu($id_menu, $user)->num_rows();
		}

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
				'pengelola_perubahan'=>$data['pengguna_masuk']['nama_lengkap'],
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
					'pengelola_perubahan'=>$data['pengguna_masuk']['nama_lengkap'],
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
		}else if($opsi=='evaluasi'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak ada Pencatatan Perubahan yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('perubahan/form');
			}else{
				$this->form_validation->set_rules('jenis_perubahan', 'Jenis Perubahan', 'required',[
					'required' => 'Jenis Perubahan Harus Dipilih!'
				]);
				$this->form_validation->set_rules('kategori_perubahan', 'Kategori Perubahan', 'required',[
					'required' => 'Kategori Perubahan Harus Dipilih!'
				]);
				$this->form_validation->set_rules('dampak_lingkungan', 'Dampak Lingkungan', 'required',[
					'required' => 'Dampak Lingkungan Harus Diisi!'
				]);
				$this->form_validation->set_rules('sumber', 'Sumber Yang Dibutuhkan', 'required',[
					'required' => 'Sumber Yang Dibutuhkan Harus Diisi!'
				]);
				$this->form_validation->set_rules('deskripsi_ujicoba', 'Deskripsi Uji Coba', 'required',[
					'required' => 'Deskripsi Uji Coba Harus Diisi!'
				]);
				$this->form_validation->set_rules('deskripsi_rollback', 'Deskripsi Roll Back', 'required',[
					'required' => 'Deskripsi Roll Back Harus Diisi!'
				]);

				if ($this->form_validation->run() == FALSE){
					$data['judul'] = "Pencatatan Perubahan";
					$data['perubahan'] = $this->perubahan->perubahan($id);
					$this->load->view('templates/header', $data);
					$this->load->view('templates/sidebar', $data);
					$this->load->view('templates/topbar', $data);
					$this->load->view('perubahan/form/evaluasi', $data);
					$this->load->view('templates/footer', $data);
				}else{
					$data = [
						'jenis_perubahan'=>$this->input->post('jenis_perubahan'),
						'kategori_perubahan'=>$this->input->post('kategori_perubahan'),
						'dampak_lingkungan'=>$this->input->post('dampak_lingkungan'),
						'sumber'=>$this->input->post('sumber'),
						'deskripsi_ujicoba'=>$this->input->post('deskripsi_ujicoba'),
						'deskripsi_rollback'=>$this->input->post('deskripsi_rollback'),
						'status_perubahan'=>'Evaluasi',
						'pengelola_perubahan'=>$data['pengguna_masuk']['nama_lengkap'],
						'tgl_update'=>time()
					];
					$this->db->set($data);
					$this->db->where('id_perubahan', $id);
					$this->db->update('perubahan');
					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info-circle"></i> Data Permohonan Perubahan <strong>'.$id.'</strong> Telah di Evaluasi!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('perubahan/form');
				}
			}
		}else if($opsi=='ubah_evaluasi'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak ada Pencatatan Perubahan yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('perubahan/form');
			}else{
				$this->form_validation->set_rules('jenis_perubahan', 'Jenis Perubahan', 'required',[
					'required' => 'Jenis Perubahan Harus Dipilih!'
				]);
				$this->form_validation->set_rules('kategori_perubahan', 'Kategori Perubahan', 'required',[
					'required' => 'Kategori Perubahan Harus Dipilih!'
				]);
				$this->form_validation->set_rules('dampak_lingkungan', 'Dampak Lingkungan', 'required',[
					'required' => 'Dampak Lingkungan Harus Diisi!'
				]);
				$this->form_validation->set_rules('sumber', 'Sumber Yang Dibutuhkan', 'required',[
					'required' => 'Sumber Yang Dibutuhkan Harus Diisi!'
				]);
				$this->form_validation->set_rules('deskripsi_ujicoba', 'Deskripsi Uji Coba', 'required',[
					'required' => 'Deskripsi Uji Coba Harus Diisi!'
				]);
				$this->form_validation->set_rules('deskripsi_rollback', 'Deskripsi Roll Back', 'required',[
					'required' => 'Deskripsi Roll Back Harus Diisi!'
				]);

				if ($this->form_validation->run() == FALSE){
					$data['judul'] = "Pencatatan Perubahan";
					$data['perubahan'] = $this->perubahan->perubahan($id);
					$this->load->view('templates/header', $data);
					$this->load->view('templates/sidebar', $data);
					$this->load->view('templates/topbar', $data);
					$this->load->view('perubahan/form/evaluasi_ubah', $data);
					$this->load->view('templates/footer', $data);
				}else{
					$data = [
						'jenis_perubahan'=>$this->input->post('jenis_perubahan'),
						'kategori_perubahan'=>$this->input->post('kategori_perubahan'),
						'dampak_lingkungan'=>$this->input->post('dampak_lingkungan'),
						'sumber'=>$this->input->post('sumber'),
						'deskripsi_ujicoba'=>$this->input->post('deskripsi_ujicoba'),
						'deskripsi_rollback'=>$this->input->post('deskripsi_rollback'),
						'status_perubahan'=>'Evaluasi',
						'pengelola_perubahan'=>$data['pengguna_masuk']['nama_lengkap'],
						'tgl_update'=>time()
					];
					$this->db->set($data);
					$this->db->where('id_perubahan', $id);
					$this->db->update('perubahan');
					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info-circle"></i> Data Evaluasi Perubahan <strong>'.$id.'</strong> Telah diperbarui!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('perubahan/form');
				}
			}
		}else if($opsi=='persetujuan'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak ada Pencatatan Perubahan yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('perubahan/form');
			}else{
				$this->form_validation->set_rules('status_permintaan', 'Status Permintaan', 'required',[
					'required' => 'Status Permintaan Harus Dipilih!'
				]);
				$this->form_validation->set_rules('ket_statuspermintaan', 'Keterangan', 'required',[
					'required' => 'Keterangan Harus Diisi!'
				]);
				$this->form_validation->set_rules('jadwal_perubahan', 'Jadwal Perubahan', 'required',[
					'required' => 'Jadwal Perubahan Harus Diisi!'
				]);
				$this->form_validation->set_rules('petugas_implementasi', 'Penugasan Untuk Implementasi', 'required',[
					'required' => 'Penugasan Untuk Implementasi Harus Diisi!'
				]);

				if ($this->form_validation->run() == FALSE){
					$data['judul'] = "Pencatatan Perubahan";
					$data['perubahan'] = $this->perubahan->perubahan($id);
					$this->load->view('templates/header', $data);
					$this->load->view('templates/sidebar', $data);
					$this->load->view('templates/topbar', $data);
					$this->load->view('perubahan/form/persetujuan', $data);
					$this->load->view('templates/footer', $data);
				}else{
					$data = [
						'status_permintaan'=>$this->input->post('status_permintaan'),
						'ket_statuspermintaan'=>$this->input->post('ket_statuspermintaan'),
						'jadwal_perubahan'=>$this->input->post('jadwal_perubahan'),
						'petugas_implementasi'=>$this->input->post('petugas_implementasi'),
						'status_perubahan'=>'Persetujuan',
						'pengelola_perubahan'=>$data['pengguna_masuk']['nama_lengkap'],
						'tgl_update'=>time()
					];
					$this->db->set($data);
					$this->db->where('id_perubahan', $id);
					$this->db->update('perubahan');
					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info-circle"></i> Data Permohonan Perubahan <strong>'.$id.'</strong> di <strong>'.$this->input->post('status_permintaan').'i</strong>!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('perubahan/form');
				}
			}
		}else if($opsi=='ubah_persetujuan'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak ada Pencatatan Perubahan yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('perubahan/form');
			}else{
				$this->form_validation->set_rules('status_permintaan', 'Status Permintaan', 'required',[
					'required' => 'Status Permintaan Harus Dipilih!'
				]);
				$this->form_validation->set_rules('ket_statuspermintaan', 'Keterangan', 'required',[
					'required' => 'Keterangan Harus Diisi!'
				]);
				$this->form_validation->set_rules('jadwal_perubahan', 'Jadwal Perubahan', 'required',[
					'required' => 'Jadwal Perubahan Harus Diisi!'
				]);
				$this->form_validation->set_rules('petugas_implementasi', 'Penugasan Untuk Implementasi', 'required',[
					'required' => 'Penugasan Untuk Implementasi Harus Diisi!'
				]);

				if ($this->form_validation->run() == FALSE){
					$data['judul'] = "Pencatatan Perubahan";
					$data['perubahan'] = $this->perubahan->perubahan($id);
					$this->load->view('templates/header', $data);
					$this->load->view('templates/sidebar', $data);
					$this->load->view('templates/topbar', $data);
					$this->load->view('perubahan/form/persetujuan_ubah', $data);
					$this->load->view('templates/footer', $data);
				}else{
					$data = [
						'status_permintaan'=>$this->input->post('status_permintaan'),
						'ket_statuspermintaan'=>$this->input->post('ket_statuspermintaan'),
						'jadwal_perubahan'=>$this->input->post('jadwal_perubahan'),
						'petugas_implementasi'=>$this->input->post('petugas_implementasi'),
						'status_perubahan'=>'Persetujuan',
						'pengelola_perubahan'=>$data['pengguna_masuk']['nama_lengkap'],
						'tgl_update'=>time()
					];
					$this->db->set($data);
					$this->db->where('id_perubahan', $id);
					$this->db->update('perubahan');
					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info-circle"></i> Data Persetujuan Perubahan <strong>'.$id.'</strong> telah diperbarui</strong>!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('perubahan/form');
				}
			}
		}else if($opsi=='implementasi'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak ada Pencatatan Perubahan yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('perubahan/form');
			}else{
				$this->form_validation->set_rules('test_perubahan', 'Hasil Test Perubahan', 'required',[
					'required' => 'Hasil Test Perubahan Harus Diisi!'
				]);
				$this->form_validation->set_rules('implementasi_perubahan', 'Implementasi Perubahan', 'required',[
					'required' => 'Implementasi Perubahan Harus Diisi!'
				]);
				$this->form_validation->set_rules('tgl_implementasi', 'Tanggal Implementasi', 'required',[
					'required' => 'Tanggal Implementasi Harus Diisi!'
				]);
				$this->form_validation->set_rules('petugas_implementasi', 'Penugasan Untuk Implementasi', 'required',[
					'required' => 'Penugasan Untuk Implementasi Harus Diisi!'
				]);

				if ($this->form_validation->run() == FALSE){
					$data['judul'] = "Pencatatan Perubahan";
					$data['perubahan'] = $this->perubahan->perubahan($id);
					$this->load->view('templates/header', $data);
					$this->load->view('templates/sidebar', $data);
					$this->load->view('templates/topbar', $data);
					$this->load->view('perubahan/form/implementasi', $data);
					$this->load->view('templates/footer', $data);
				}else{
					$data = [
						'test_perubahan'=>$this->input->post('test_perubahan'),
						'implementasi_perubahan'=>$this->input->post('implementasi_perubahan'),
						'tgl_implementasi'=>$this->input->post('tgl_implementasi'),
						'petugas_implementasi'=>$this->input->post('petugas_implementasi'),
						'status_perubahan'=>'Implementasi',
						'pengelola_perubahan'=>$data['pengguna_masuk']['nama_lengkap'],
						'tgl_update'=>time()
					];
					$this->db->set($data);
					$this->db->where('id_perubahan', $id);
					$this->db->update('perubahan');
					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info-circle"></i> Data Permohonan Perubahan <strong>'.$id.'</strong> di Implemetasikan</strong>!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('perubahan/form');
				}
			}
		}else if($opsi=='ubah_implementasi'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak ada Pencatatan Perubahan yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('perubahan/form');
			}else{
				$this->form_validation->set_rules('test_perubahan', 'Hasil Test Perubahan', 'required',[
					'required' => 'Hasil Test Perubahan Harus Diisi!'
				]);
				$this->form_validation->set_rules('implementasi_perubahan', 'Implementasi Perubahan', 'required',[
					'required' => 'Implementasi Perubahan Harus Diisi!'
				]);
				$this->form_validation->set_rules('tgl_implementasi', 'Tanggal Implementasi', 'required',[
					'required' => 'Tanggal Implementasi Harus Diisi!'
				]);
				$this->form_validation->set_rules('petugas_implementasi', 'Penugasan Untuk Implementasi', 'required',[
					'required' => 'Penugasan Untuk Implementasi Harus Diisi!'
				]);

				if ($this->form_validation->run() == FALSE){
					$data['judul'] = "Pencatatan Perubahan";
					$data['perubahan'] = $this->perubahan->perubahan($id);
					$this->load->view('templates/header', $data);
					$this->load->view('templates/sidebar', $data);
					$this->load->view('templates/topbar', $data);
					$this->load->view('perubahan/form/implementasi_ubah', $data);
					$this->load->view('templates/footer', $data);
				}else{
					$data = [
						'test_perubahan'=>$this->input->post('test_perubahan'),
						'implementasi_perubahan'=>$this->input->post('implementasi_perubahan'),
						'tgl_implementasi'=>$this->input->post('tgl_implementasi'),
						'petugas_implementasi'=>$this->input->post('petugas_implementasi'),
						'status_perubahan'=>'Implementasi',
						'pengelola_perubahan'=>$data['pengguna_masuk']['nama_lengkap'],
						'tgl_update'=>time()
					];
					$this->db->set($data);
					$this->db->where('id_perubahan', $id);
					$this->db->update('perubahan');
					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info-circle"></i> Data Implementasi Perubahan <strong>'.$id.'</strong> diperbarui</strong>!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('perubahan/form');
				}
			}
		}else if($opsi=='data_perubahan'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak ada Pencatatan Perubahan yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('perubahan/form');
			}else{
				$data['judul'] = "Pencatatan Perubahan";
				$data['perubahan'] = $this->perubahan->perubahan($id);
				$this->load->view('perubahan/form/data_perubahan', $data);
			}
		}
	}
}
