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
		$data['menu'] = $this->admin->menu();
		$data['pengumuman'] = $this->admin->pengumuman5();
		$link = $this->uri->segment('1');
		$menu_segmen = $this->admin->menu_segmen($link);
		$id_menu = $menu_segmen['id_menu'];
		if($id_menu!=''){
			$data['akses_menu'] = $this->admin->akses_menu($id_menu, $user)->num_rows();
		}

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
			$data['menu'] = $this->admin->menu();
			$link = $this->uri->segment('1');
			$menu_segmen = $this->admin->menu_segmen($link);
			$id_menu = $menu_segmen['id_menu'];
			$data['akses_menu'] = $this->admin->akses_menu($id_menu, $user)->num_rows();

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
				$config['upload_path']		= './uploads/pdf/sk/';
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
				$config['upload_path']		= './uploads/pdf/sk/';
				$this->load->library('upload', $config);
				if($this->upload->do_upload('file_upload')){
					$file_name = $this->upload->data('file_name');
					unlink(FCPATH.'uploads/pdf/sk/'.$file_lama);
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

			unlink(FCPATH.'uploads/pdf/sk/'.$file);
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
		$data['menu'] = $this->admin->menu();
		$data['pengumuman'] = $this->admin->pengumuman5();
		$link = $this->uri->segment('1');
		$menu_segmen = $this->admin->menu_segmen($link);
		$id_menu = $menu_segmen['id_menu'];
		if($id_menu!=''){
			$data['akses_menu'] = $this->admin->akses_menu($id_menu, $user)->num_rows();
		}

		// KHUSUS
		if($resiko==null){
			$data['judul'] = "Pencatatan Resiko Layanan";
			$data['klasifikasi_informasi'] = $this->resiko->klasifikasi_informasi();
			$data['klasifikasi_sdm'] = $this->resiko->klasifikasi_sdm();
			$data['klasifikasi_aset_fisik'] = $this->resiko->klasifikasi_aset_fisik();
			$data['klasifikasi_software'] = $this->resiko->klasifikasi_software();
			$data['klasifikasi_layanan'] = $this->resiko->klasifikasi_layanan();
			$data['klasifikasi_intangible'] = $this->resiko->klasifikasi_intangible();
			$data['resiko_dampak'] = $this->resiko->dampak();
			$data['resiko_pengancam'] = $this->resiko->pengancam();
			$data['resiko_rentan'] = $this->resiko->resiko_rentan_nilai();
			$data['resiko_paparan'] = $this->resiko->resiko_paparan();
			$data['resiko_informasi'] = $this->resiko->resiko_informasi();
			$data['resiko_sdm'] = $this->resiko->resiko_sdm();
			$data['resiko_fisik'] = $this->resiko->resiko_fisikform();
			$data['resiko_software'] = $this->resiko->resiko_software();
			$data['resiko_layanan'] = $this->resiko->resiko_layanan();
			$data['resiko_intangible'] = $this->resiko->resiko_intangible();
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
		}else if($resiko=='sdm'){
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
					'id_ksdm'=>$klasifikasi,
					'dampak'=>$dampak,
					'pengancam'=>$pengancam,
					'kerentanan'=>$kerentanan,
					'paparan'=>$paparan,
				];

				$this->db->insert('resiko_sdm', $data);
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Resiko Sumber Daya Manusia (SDM) telah ditambahkan!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('resiko/form');
			}else if($opsi=='ubah'){
				if($id==null){
					$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-ban"></i> Tidak ada resiko SDM yang dipilih!
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
						$data['judul'] = "Resiko SDM";
						$data['klasifikasi_sdm'] = $this->resiko->klasifikasi_sdm();
						$data['resiko_dampak'] = $this->resiko->dampak();
						$data['resiko_pengancam'] = $this->resiko->pengancam();
						$data['resiko_sdm'] = $this->resiko->resiko_sdm($id);
						$data['resiko_rentan'] = $this->resiko->resiko_rentan_nilai();
						$data['resiko_paparan'] = $this->resiko->resiko_paparan();
						$this->load->view('templates/header', $data);
						$this->load->view('templates/sidebar', $data);
						$this->load->view('templates/topbar', $data);
						$this->load->view('resiko/form/sdm/ubah', $data);
						$this->load->view('templates/footer', $data);
					}else{
						$klasifikasi = $this->input->post('klasifikasi');
						$dampak = $this->input->post('dampak');
						$pengancam = $this->input->post('pengancam');
						$kerentanan = $this->input->post('kerentanan');
						$paparan = $this->input->post('paparan');

						$data = [
							'id_ksdm'=>$klasifikasi,
							'dampak'=>$dampak,
							'pengancam'=>$pengancam,
							'kerentanan'=>$kerentanan,
							'paparan'=>$paparan,
						];

						$this->db->set($data);
						$this->db->where('id', $id);
						$this->db->update('resiko_sdm');
						$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
																  <i class="fa fa-fw fa-info-circle"></i> Resiko SDM : <strong>'.$id.'</strong> telah diperbarui!
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
															  <i class="fa fa-fw fa-ban"></i> Tidak ada resiko SDM yang dipilih!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('resiko/form');
				}else{
					$this->db->where('id', $id);
					$this->db->delete('resiko_sdm');
					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info-circle"></i> Resiko SDM : <strong>'.$id.'</strong> telah dihapus!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('resiko/form');
				}
			}else if($opsi=='cetak'){
				$data['judul'] = "Resiko SDM";
				$data['klasifikasi_sdm'] = $this->resiko->klasifikasi_sdm();
				$data['resiko_dampak'] = $this->resiko->dampak();
				$data['resiko_pengancam'] = $this->resiko->pengancam();
				$data['resiko_sdm'] = $this->resiko->resiko_sdm();
				$data['resiko_rentan'] = $this->resiko->resiko_rentan_nilai();
				$data['resiko_paparan'] = $this->resiko->resiko_paparan();
				$this->load->view('resiko/form/sdm/cetak', $data);
			}
		}else if($resiko=='fisik'){
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
					'id_rfisik'=>$id,
					'id_kfisik'=>$klasifikasi,
					'dampak'=>$dampak,
					'pengancam'=>$pengancam,
					'kerentanan'=>$kerentanan,
					'paparan'=>$paparan,
				];

				$this->db->insert('resiko_fisik', $data);
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Resiko Fisik telah ditambahkan!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('resiko/form');
			}else if($opsi=='ubah'){
				if($id==null){
					$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-ban"></i> Tidak ada resiko fisik yang dipilih!
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
						$data['judul'] = "Resiko Fisik";
						$data['klasifikasi_fisik'] = $this->resiko->klasifikasi_aset_fisik();
						$data['resiko_dampak'] = $this->resiko->dampak();
						$data['resiko_pengancam'] = $this->resiko->pengancam();
						$data['resiko_fisik'] = $this->resiko->resiko_fisikform($id);
						$data['resiko_rentan'] = $this->resiko->resiko_rentan_nilai();
						$data['resiko_paparan'] = $this->resiko->resiko_paparan();
						$this->load->view('templates/header', $data);
						$this->load->view('templates/sidebar', $data);
						$this->load->view('templates/topbar', $data);
						$this->load->view('resiko/form/fisik/ubah', $data);
						$this->load->view('templates/footer', $data);
					}else{
						$klasifikasi = $this->input->post('klasifikasi');
						$dampak = $this->input->post('dampak');
						$pengancam = $this->input->post('pengancam');
						$kerentanan = $this->input->post('kerentanan');
						$paparan = $this->input->post('paparan');

						$data = [
							'id_kfisik'=>$klasifikasi,
							'dampak'=>$dampak,
							'pengancam'=>$pengancam,
							'kerentanan'=>$kerentanan,
							'paparan'=>$paparan,
						];

						$this->db->set($data);
						$this->db->where('id_rfisik', $id);
						$this->db->update('resiko_fisik');
						$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
																  <i class="fa fa-fw fa-info-circle"></i> Resiko Fisik : <strong>'.$id.'</strong> telah diperbarui!
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
															  <i class="fa fa-fw fa-ban"></i> Tidak ada resiko fisik yang dipilih!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('resiko/form');
				}else{
					$this->db->where('id_rfisik', $id);
					$this->db->delete('resiko_fisik');
					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info-circle"></i> Resiko Fisik : <strong>'.$id.'</strong> telah dihapus!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('resiko/form');
				}
			}else if($opsi=='cetak'){
				$data['judul'] = "Resiko Fisik";
				$data['klasifikasi_aset_fisik'] = $this->resiko->klasifikasi_aset_fisik();
				$data['resiko_dampak'] = $this->resiko->dampak();
				$data['resiko_pengancam'] = $this->resiko->pengancam();
				$data['resiko_fisik'] = $this->resiko->resiko_fisikform();
				$data['resiko_rentan'] = $this->resiko->resiko_rentan_nilai();
				$data['resiko_paparan'] = $this->resiko->resiko_paparan();
				$this->load->view('resiko/form/fisik/cetak', $data);
			}
		}else if($resiko=='software'){
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
					'id_ksoftware'=>$klasifikasi,
					'dampak'=>$dampak,
					'pengancam'=>$pengancam,
					'kerentanan'=>$kerentanan,
					'paparan'=>$paparan,
				];

				$this->db->insert('resiko_software', $data);
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Resiko Software telah ditambahkan!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('resiko/form');
			}else if($opsi=='ubah'){
				if($id==null){
					$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-ban"></i> Tidak ada resiko software yang dipilih!
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
						$data['judul'] = "Resiko Software";
						$data['klasifikasi_software'] = $this->resiko->klasifikasi_software();
						$data['resiko_dampak'] = $this->resiko->dampak();
						$data['resiko_pengancam'] = $this->resiko->pengancam();
						$data['resiko_software'] = $this->resiko->resiko_software($id);
						$data['resiko_rentan'] = $this->resiko->resiko_rentan_nilai();
						$data['resiko_paparan'] = $this->resiko->resiko_paparan();
						$this->load->view('templates/header', $data);
						$this->load->view('templates/sidebar', $data);
						$this->load->view('templates/topbar', $data);
						$this->load->view('resiko/form/software/ubah', $data);
						$this->load->view('templates/footer', $data);
					}else{
						$klasifikasi = $this->input->post('klasifikasi');
						$dampak = $this->input->post('dampak');
						$pengancam = $this->input->post('pengancam');
						$kerentanan = $this->input->post('kerentanan');
						$paparan = $this->input->post('paparan');

						$data = [
							'id_ksoftware'=>$klasifikasi,
							'dampak'=>$dampak,
							'pengancam'=>$pengancam,
							'kerentanan'=>$kerentanan,
							'paparan'=>$paparan,
						];

						$this->db->set($data);
						$this->db->where('id', $id);
						$this->db->update('resiko_software');
						$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
																  <i class="fa fa-fw fa-info-circle"></i> Resiko Software : <strong>'.$id.'</strong> telah diperbarui!
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
															  <i class="fa fa-fw fa-ban"></i> Tidak ada resiko software yang dipilih!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('resiko/form');
				}else{
					$this->db->where('id', $id);
					$this->db->delete('resiko_software');
					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info-circle"></i> Resiko Software : <strong>'.$id.'</strong> telah dihapus!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('resiko/form');
				}
			}else if($opsi=='cetak'){
				$data['judul'] = "Resiko Software";
				$data['klasifikasi_aset_software'] = $this->resiko->klasifikasi_software();
				$data['resiko_dampak'] = $this->resiko->dampak();
				$data['resiko_pengancam'] = $this->resiko->pengancam();
				$data['resiko_software'] = $this->resiko->resiko_software();
				$data['resiko_rentan'] = $this->resiko->resiko_rentan_nilai();
				$data['resiko_paparan'] = $this->resiko->resiko_paparan();
				$this->load->view('resiko/form/software/cetak', $data);
			}
		}else if($resiko=='layanan'){
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
					'id_kl'=>$klasifikasi,
					'dampak'=>$dampak,
					'pengancam'=>$pengancam,
					'kerentanan'=>$kerentanan,
					'paparan'=>$paparan,
				];

				$this->db->insert('resiko_layanan', $data);
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Resiko Layanan telah ditambahkan!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('resiko/form');
			}else if($opsi=='ubah'){
				if($id==null){
					$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-ban"></i> Tidak ada resiko layanan yang dipilih!
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
						$data['judul'] = "Resiko Layanan";
						$data['klasifikasi_layanan'] = $this->resiko->klasifikasi_layanan();
						$data['resiko_dampak'] = $this->resiko->dampak();
						$data['resiko_pengancam'] = $this->resiko->pengancam();
						$data['resiko_layanan'] = $this->resiko->resiko_layanan($id);
						$data['resiko_rentan'] = $this->resiko->resiko_rentan_nilai();
						$data['resiko_paparan'] = $this->resiko->resiko_paparan();
						$this->load->view('templates/header', $data);
						$this->load->view('templates/sidebar', $data);
						$this->load->view('templates/topbar', $data);
						$this->load->view('resiko/form/layanan/ubah', $data);
						$this->load->view('templates/footer', $data);
					}else{
						$klasifikasi = $this->input->post('klasifikasi');
						$dampak = $this->input->post('dampak');
						$pengancam = $this->input->post('pengancam');
						$kerentanan = $this->input->post('kerentanan');
						$paparan = $this->input->post('paparan');

						$data = [
							'id_kl'=>$klasifikasi,
							'dampak'=>$dampak,
							'pengancam'=>$pengancam,
							'kerentanan'=>$kerentanan,
							'paparan'=>$paparan,
						];

						$this->db->set($data);
						$this->db->where('id', $id);
						$this->db->update('resiko_layanan');
						$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
																  <i class="fa fa-fw fa-info-circle"></i> Resiko Layanan : <strong>'.$id.'</strong> telah diperbarui!
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
															  <i class="fa fa-fw fa-ban"></i> Tidak ada resiko layanan yang dipilih!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('resiko/form');
				}else{
					$this->db->where('id', $id);
					$this->db->delete('resiko_layanan');
					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info-circle"></i> Resiko Layanan : <strong>'.$id.'</strong> telah dihapus!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('resiko/form');
				}
			}else if($opsi=='cetak'){
				$data['judul'] = "Resiko Layanan";
				$data['klasifikasi_layanan'] = $this->resiko->klasifikasi_layanan();
				$data['resiko_dampak'] = $this->resiko->dampak();
				$data['resiko_pengancam'] = $this->resiko->pengancam();
				$data['resiko_layanan'] = $this->resiko->resiko_layanan();
				$data['resiko_rentan'] = $this->resiko->resiko_rentan_nilai();
				$data['resiko_paparan'] = $this->resiko->resiko_paparan();
				$this->load->view('resiko/form/layanan/cetak', $data);
			}
		}else if($resiko=='intangible'){
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
					'id_in'=>$klasifikasi,
					'dampak'=>$dampak,
					'pengancam'=>$pengancam,
					'kerentanan'=>$kerentanan,
					'paparan'=>$paparan,
				];

				$this->db->insert('resiko_intangible', $data);
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Resiko Intangible telah ditambahkan!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('resiko/form');
			}else if($opsi=='ubah'){
				if($id==null){
					$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-ban"></i> Tidak ada resiko intangible yang dipilih!
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
						$data['judul'] = "Resiko Intangible";
						$data['klasifikasi_intangible'] = $this->resiko->klasifikasi_intangible();
						$data['resiko_dampak'] = $this->resiko->dampak();
						$data['resiko_pengancam'] = $this->resiko->pengancam();
						$data['resiko_intangible'] = $this->resiko->resiko_intangible($id);
						$data['resiko_rentan'] = $this->resiko->resiko_rentan_nilai();
						$data['resiko_paparan'] = $this->resiko->resiko_paparan();
						$this->load->view('templates/header', $data);
						$this->load->view('templates/sidebar', $data);
						$this->load->view('templates/topbar', $data);
						$this->load->view('resiko/form/intangible/ubah', $data);
						$this->load->view('templates/footer', $data);
					}else{
						$klasifikasi = $this->input->post('klasifikasi');
						$dampak = $this->input->post('dampak');
						$pengancam = $this->input->post('pengancam');
						$kerentanan = $this->input->post('kerentanan');
						$paparan = $this->input->post('paparan');

						$data = [
							'id_in'=>$klasifikasi,
							'dampak'=>$dampak,
							'pengancam'=>$pengancam,
							'kerentanan'=>$kerentanan,
							'paparan'=>$paparan,
						];

						$this->db->set($data);
						$this->db->where('id', $id);
						$this->db->update('resiko_intangible');
						$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
																  <i class="fa fa-fw fa-info-circle"></i> Resiko Intangible : <strong>'.$id.'</strong> telah diperbarui!
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
															  <i class="fa fa-fw fa-ban"></i> Tidak ada resiko intangible yang dipilih!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('resiko/form');
				}else{
					$this->db->where('id', $id);
					$this->db->delete('resiko_intangible');
					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info-circle"></i> Resiko Intangible : <strong>'.$id.'</strong> telah dihapus!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('resiko/form');
				}
			}else if($opsi=='cetak'){
				$data['judul'] = "Resiko Intangible";
				$data['klasifikasi_intangible'] = $this->resiko->klasifikasi_intangible();
				$data['resiko_dampak'] = $this->resiko->dampak();
				$data['resiko_pengancam'] = $this->resiko->pengancam();
				$data['resiko_intangible'] = $this->resiko->resiko_intangible();
				$data['resiko_rentan'] = $this->resiko->resiko_rentan_nilai();
				$data['resiko_paparan'] = $this->resiko->resiko_paparan();
				$this->load->view('resiko/form/intangible/cetak', $data);
			}
		}
	}
}
