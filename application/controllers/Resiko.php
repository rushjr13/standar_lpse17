<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resiko extends CI_Controller {

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
		$data['judul'] = "SOP Resiko Layanan";
		$data['istilah'] = $this->resiko->istilah();
		$data['sop_resiko'] = $this->resiko->sop_resiko();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('resiko/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function edit($id=null){
		if($id==null){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Tidak ada sop yang dipilih!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('resiko');
		}else{
			// UMUM
			$user = $this->session->userdata('user_masuk');
			$data['pengguna_masuk'] = $this->admin->pengguna($user);
			$data['pengaturan'] = $this->admin->pengaturan();
			$data['tgl_sekarang'] = $this->admin->tgl_indo(date('Y-m-d'));
			$data['hari_sekarang'] = $this->admin->hari(date('l'));
			$data['menu_akses'] = $this->admin->menu_akses($user);

			// KHUSUS
			$data['judul'] = "SOP Resiko Layanan";
			$data['sop_resiko'] = $this->resiko->sop_resiko($id);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('resiko/edit', $data);
			$this->load->view('templates/footer', $data);
		}
	}

	public function ubah($id=null){
		if($id==null){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Tidak ada istilah yang dipilih!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('resiko');
		}else{
			$nama = $this->input->post('nama');
			$isi = $this->input->post('isi');

			$data = [
				'nama'=>$nama,
				'isi'=>$isi
			];

			$this->db->set($data);
			$this->db->where('id', $id);
			$this->db->update('resiko_sop');

			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-info-circle"></i> <strong>'.$nama.'</strong> telah diperbarui!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('resiko');
		}
	}

	public function sk($opsi=null, $id=null){
		// UMUM
		$user = $this->session->userdata('user_masuk');
		$data['pengguna_masuk'] = $this->admin->pengguna($user);
		$data['pengaturan'] = $this->admin->pengaturan();
		$data['tgl_sekarang'] = $this->admin->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->admin->hari(date('l'));
		$data['menu_akses'] = $this->admin->menu_akses($user);

		// KHUSUS
		if($opsi==null){
			$data['judul'] = "SK Koordinator Resiko Layanan";
			$data['resiko_sk'] = $this->resiko->resiko_sk();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('resiko/sk/index', $data);
			$this->load->view('templates/footer', $data);
		}else if($opsi=='tambah'){
			$id = $this->input->post('id');
			$nomor = $this->input->post('nomor');
			$tanggal = $this->input->post('tanggal');
			$nama = $this->input->post('nama');
			$tentang = $this->input->post('tentang');
			$berlaku = $this->input->post('berlaku');
			$berakhir = $this->input->post('berakhir');

			// Cek file upload yang diupload
			$file_upload = $_FILES['file_upload']['name'];

			if($file_upload){
				$config['allowed_types']	= 'pdf';
				$config['upload_path']		= './assets/file/pdf/sk/';
				$this->load->library('upload', $config);
				if($this->upload->do_upload('file_upload')){
					$file_name = $this->upload->data('file_name');
					$data = [
						'id'=>$id,
						'nomor'=>$nomor,
						'tanggal'=>$tanggal,
						'nama'=>$nama,
						'tentang'=>$tentang,
						'berlaku'=>$berlaku,
						'berakhir'=>$berakhir,
						'file'=>$file_name,
						'username'=>$user,
						'tgl_update'=>time()
					];
					$this->db->insert('resiko_sk',$data);
					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info-circle"></i> <strong>'.$nama.'</strong> telah ditambahkan!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('resiko/sk');
				} else {
					echo $this->upload->display_errors();
				}
			}
		}else if($opsi=='ubah'){
			$id = $this->input->post('id');
			$nomor = $this->input->post('nomor');
			$tanggal = $this->input->post('tanggal');
			$nama = $this->input->post('nama');
			$tentang = $this->input->post('tentang');
			$berlaku = $this->input->post('berlaku');
			$berakhir = $this->input->post('berakhir');
			$file_lama = $this->input->post('file_lama');

			$data = [
				'nomor'=>$nomor,
				'tanggal'=>$tanggal,
				'nama'=>$nama,
				'tentang'=>$tentang,
				'berlaku'=>$berlaku,
				'berakhir'=>$berakhir,
				'username'=>$user,
				'tgl_update'=>time()
			];

			// Cek file upload yang diupload
			$file_upload = $_FILES['file_upload']['name'];

			if($file_upload){
				$config['allowed_types']	= 'pdf';
				$config['upload_path']		= './assets/file/pdf/sk/';
				$this->load->library('upload', $config);
				if($this->upload->do_upload('file_upload')){
					$file_name = $this->upload->data('file_name');
					unlink(FCPATH.'assets/file/pdf/sk/'.$file_lama);
					$this->db->set('file', $file_name);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set($data);
			$this->db->where('id', $id);
			$this->db->update('resiko_sk');

			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-info-circle"></i> <strong>'.$nama.'</strong> nomor <strong>'.$nomor.'</strong> telah diperbarui!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('resiko/sk');
		}else if($opsi=='hapus'){
			$id = $this->input->post('id');
			$nomor = $this->input->post('nomor');
			$tanggal = $this->input->post('tanggal');
			$nama = $this->input->post('nama');
			$file = $this->input->post('file');

			unlink(FCPATH.'assets/file/pdf/sk/'.$file);
			$this->db->where('id', $id);
			$this->db->delete('resiko_sk');
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-info-circle"></i> <strong>'.$nama.'</strong> nomor <strong>'.$nomor.'</strong> tanggal <strong>'.$tanggal.'</strong> telah dihapus!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('resiko/sk');
		}
	}

	public function form($resiko=null, $opsi=null, $id=null){
		// UMUM
		$user = $this->session->userdata('user_masuk');
		$data['pengguna_masuk'] = $this->admin->pengguna($user);
		$data['pengaturan'] = $this->admin->pengaturan();
		$data['tgl_sekarang'] = $this->admin->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->admin->hari(date('l'));
		$data['menu_akses'] = $this->admin->menu_akses($user);

		// KHUSUS
		if($resiko==null){
			$data['judul'] = "Pencatatan Resiko Layanan";
			$data['klasifikasi_informasi'] = $this->resiko->klasifikasi_informasi();
			$data['resiko_dampak'] = $this->resiko->dampak();
			$data['resiko_pengancam'] = $this->resiko->pengancam();
			$data['resiko_rentan'] = $this->resiko->resiko_rentan_nilai();
			$data['resiko_paparan'] = $this->resiko->resiko_paparan();
			$data['resiko_informasi'] = $this->resiko->resiko_informasi();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('resiko/form/index', $data);
			$this->load->view('templates/footer', $data);
		}else if($resiko=='informasi'){
			if($opsi==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak ada opsi yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('resiko/form');
			}else if($opsi=='tambah'){
				$id = $this->input->post('id');
				$klasifikasi = $this->input->post('klasifikasi');
				$dampak = $this->input->post('dampak');
				$pengancam = $this->input->post('pengancam');
				$kerentanan = $this->input->post('kerentanan');
				$paparan = $this->input->post('paparan');

				$data = [
					'id'=>$id,
					'id_ki'=>$klasifikasi,
					'dampak'=>$dampak,
					'pengancam'=>$pengancam,
					'kerentanan'=>$kerentanan,
					'paparan'=>$paparan,
				];

				$this->db->insert('resiko_informasi', $data);
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Resiko Informasi telah ditambahkan!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('resiko/form');
			}else if($opsi=='ubah'){
				if($id==null){
					$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-ban"></i> Tidak ada resiko informasi yang dipilih!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('resiko/form');
				}else{
					$this->form_validation->set_rules('klasifikasi', 'Sub Klasifikasi', 'required',[
						'required' => 'Sub Klasifikasi Harus Dipilih!'
					]);
					$this->form_validation->set_rules('dampak', 'Dampak', 'required',[
						'required' => 'Dampak Harus Dipilih!'
					]);
					$this->form_validation->set_rules('pengancam', 'Pengancam', 'required',[
						'required' => 'Pengancam Harus Dipilih!'
					]);
					$this->form_validation->set_rules('kerentanan', 'Tingkat Kerentanan', 'required',[
						'required' => 'Tingkat Kerentanan Harus Dipilih!'
					]);
					$this->form_validation->set_rules('paparan', 'Tingkat Paparan', 'required',[
						'required' => 'Tingkat Paparan Harus Dipilih!'
					]);

					if ($this->form_validation->run() == FALSE){
						$data['judul'] = "Resiko Informasi";
						$data['klasifikasi_informasi'] = $this->resiko->klasifikasi_informasi();
						$data['resiko_dampak'] = $this->resiko->dampak();
						$data['resiko_pengancam'] = $this->resiko->pengancam();
						$data['resiko_informasi'] = $this->resiko->resiko_informasi($id);
						$data['resiko_rentan'] = $this->resiko->resiko_rentan_nilai();
						$data['resiko_paparan'] = $this->resiko->resiko_paparan();
						$this->load->view('templates/header', $data);
						$this->load->view('templates/sidebar', $data);
						$this->load->view('templates/topbar', $data);
						$this->load->view('resiko/form/informasi/ubah', $data);
						$this->load->view('templates/footer', $data);
					}else{
						$klasifikasi = $this->input->post('klasifikasi');
						$dampak = $this->input->post('dampak');
						$pengancam = $this->input->post('pengancam');
						$kerentanan = $this->input->post('kerentanan');
						$paparan = $this->input->post('paparan');

						$data = [
							'id_ki'=>$klasifikasi,
							'dampak'=>$dampak,
							'pengancam'=>$pengancam,
							'kerentanan'=>$kerentanan,
							'paparan'=>$paparan,
						];

						$this->db->set($data);
						$this->db->where('id', $id);
						$this->db->update('resiko_informasi');
						$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
																  <i class="fa fa-fw fa-info-circle"></i> Resiko Informasi : <strong>'.$id.'</strong> telah diperbarui!
																  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																    <span aria-hidden="true">&times;</span>
																  </button>
																</div>');
						redirect('resiko/form');
					}
				}
			}else if($opsi=='hapus'){
				if($id==null){
					$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-ban"></i> Tidak ada resiko informasi yang dipilih!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('resiko/form');
				}else{
					$this->db->where('id', $id);
					$this->db->delete('resiko_informasi');
					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info-circle"></i> Resiko Informasi : <strong>'.$id.'</strong> telah dihapus!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('resiko/form');
				}
			}else if($opsi=='cetak'){
				$data['judul'] = "Resiko Informasi";
				$data['klasifikasi_informasi'] = $this->resiko->klasifikasi_informasi();
				$data['resiko_dampak'] = $this->resiko->dampak();
				$data['resiko_pengancam'] = $this->resiko->pengancam();
				$data['resiko_informasi'] = $this->resiko->resiko_informasi();
				$data['resiko_rentan'] = $this->resiko->resiko_rentan_nilai();
				$data['resiko_paparan'] = $this->resiko->resiko_paparan();
				$this->load->view('resiko/form/informasi/cetak', $data);
			}
		}
	}
}
