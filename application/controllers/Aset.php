<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->admin->cek_masuk();
        // $this->load->library('pdf');
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
		$menu_segmen = $this->admin->menu_segmen($link)->row_array();
		$id_menu = $menu_segmen['id_menu'];
		if($id_menu!=''){
			$data['akses_menu'] = $this->admin->akses_menu($id_menu, $user)->num_rows();
		}

		// KHUSUS
		$data['judul'] = "SOP Aset Layanan";
		$data['istilah'] = $this->admin->istilah();
		$data['sop_aset'] = $this->admin->sop_aset();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('aset/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambah(){
		$nama = $this->input->post('nama');
		$isi = $this->input->post('isi');

		$data = [
			'id'=>time(),
			'nama'=>$nama,
			'isi'=>$isi,
			'tgl_update'=>time()
		];

		$this->db->insert('aset_sop', $data);

		$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
												  <i class="fa fa-fw fa-info-circle"></i> SOP <strong>'.$nama.'</strong> telah ditambahkan!
												  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												    <span aria-hidden="true">&times;</span>
												  </button>
												</div>');
		redirect('aset');
	}

	public function tambah_klasifikasi(){

		$this->db->insert('klasifikasi_aset_fisik', ['nama_klasifikasi'=>$this->input->post('nama_klasifikasi')]);
		redirect('aset/form/fisik/tambah');
	}

	public function tambah_jenisaset(){

		$this->db->insert('jenis_aset_fisik', ['nama_jenisaset'=>$this->input->post('nama_jenisaset')]);
		redirect('aset/form/fisik/tambah');
	}

	public function edit($id=null){
		if($id==null){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Tidak ada sop yang dipilih!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('aset');
		}else{
			// UMUM
			$user = $this->session->userdata('user_masuk');
			$data['pengguna_masuk'] = $this->admin->pengguna($user);
			$data['pengaturan'] = $this->admin->pengaturan();
			$data['tgl_sekarang'] = $this->admin->tgl_indo(date('Y-m-d'));
			$data['hari_sekarang'] = $this->admin->hari(date('l'));
			$data['menu'] = $this->admin->menu();
			$link = $this->uri->segment('1');
			$menu_segmen = $this->admin->menu_segmen($link)->row_array();
			$id_menu = $menu_segmen['id_menu'];
			$data['akses_menu'] = $this->admin->akses_menu($id_menu, $user)->num_rows();

			// KHUSUS
			$data['judul'] = "SOP Aset Layanan";
			$data['sop_aset'] = $this->admin->sop_aset($id);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('aset/edit', $data);
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
			redirect('aset');
		}else{
			$nama = $this->input->post('nama');
			$isi = $this->input->post('isi');

			$data = [
				'nama'=>$nama,
				'isi'=>$isi,
				'tgl_update'=>time()
			];

			$this->db->set($data);
			$this->db->where('id', $id);
			$this->db->update('aset_sop');

			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-info-circle"></i> Daftar istilah telah diperbarui!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('aset');
		}
	}

	public function hapus($id=null){
		if($id==null){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Tidak ada sop yang dipilih!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('aset');
		}else{
			$nama = $this->input->post('nama');

			$this->db->where('id', $id);
			$this->db->delete('aset_sop');

			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-info-circle"></i> SOP <strong>'.$nama.'</strong> telah dihapus!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('aset');
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
		$link = $this->uri->segment('1');
		$menu_segmen = $this->admin->menu_segmen($link)->row_array();
		$id_menu = $menu_segmen['id_menu'];
		if($id_menu!=''){
			$data['akses_menu'] = $this->admin->akses_menu($id_menu, $user)->num_rows();
		}

		// KHUSUS
		if($opsi==null){
			$data['judul'] = "SK Koordinator Aset";
			$data['aset_sk'] = $this->admin->aset_sk();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('aset/sk/index', $data);
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
					$this->db->insert('aset_sk',$data);
					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info-circle"></i> <strong>'.$nama.'</strong> telah ditambahkan!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('aset/sk');
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
			$this->db->update('aset_sk');

			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-info-circle"></i> <strong>'.$nama.'</strong> nomor <strong>'.$nomor.'</strong> telah diperbarui!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('aset/sk');
		}else if($opsi=='hapus'){
			$id = $this->input->post('id');
			$nomor = $this->input->post('nomor');
			$tanggal = $this->input->post('tanggal');
			$nama = $this->input->post('nama');
			$file = $this->input->post('file');

			unlink(FCPATH.'uploads/pdf/sk/'.$file);
			$this->db->where('id', $id);
			$this->db->delete('aset_sk');
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-info-circle"></i> <strong>'.$nama.'</strong> nomor <strong>'.$nomor.'</strong> tanggal <strong>'.$tanggal.'</strong> telah dihapus!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('aset/sk');
		}
	}

	public function form($aset=null, $opsi=null, $id=null){
		// UMUM
		$user = $this->session->userdata('user_masuk');
		$data['pengguna_masuk'] = $this->admin->pengguna($user);
		$data['pengaturan'] = $this->admin->pengaturan();
		$data['tgl_sekarang'] = $this->admin->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->admin->hari(date('l'));
		$data['menu'] = $this->admin->menu();
		$link = $this->uri->segment('1');
		$menu_segmen = $this->admin->menu_segmen($link)->row_array();
		$id_menu = $menu_segmen['id_menu'];
		if($id_menu!=''){
			$data['akses_menu'] = $this->admin->akses_menu($id_menu, $user)->num_rows();
		}

		// KHUSUS
		if($aset==null){
			$data['judul'] = "Pencatatan Aset Layanan";
			$data['aset_informasi'] = $this->admin->aset_informasi();
			$data['aset_sdm'] = $this->admin->aset_sdm();
			$data['aset_fisik'] = $this->admin->aset_fisik();
			$data['aset_software'] = $this->admin->aset_software();
			$data['aset_layanan'] = $this->admin->aset_layanan();
			$data['aset_intangible'] = $this->admin->aset_intangible();
			$data['aset_kerahasiaan'] = $this->admin->aset_kerahasiaan();
			$data['aset_integritas'] = $this->admin->aset_integritas();
			$data['aset_ketersediaan'] = $this->admin->aset_ketersediaan();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('aset/form/index', $data);
			$this->load->view('templates/footer', $data);
		}else if($aset=='informasi'){
			if($opsi==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak ada metode yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('aset/form');
			}else if($opsi=='tambah'){
				$data = [
					'id'=>$this->input->post('id'),
					'nama'=>$this->input->post('nama'),
					'klasifikasi'=>$this->input->post('klasifikasi'),
					'format'=>$this->input->post('format'),
					'pemilik'=>$this->input->post('pemilik'),
					'berlaku'=>$this->input->post('berlaku'),
					'kerahasiaan'=>$this->input->post('kerahasiaan'),
					'integritas'=>$this->input->post('integritas'),
					'ketersediaan'=>$this->input->post('ketersediaan'),
					'keterangan'=>$this->input->post('keterangan'),
					'username'=>$user,
					'tgl_update'=>time()
				];
				$this->db->insert('aset_informasi', $data);
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Aset Informasi <strong>'.$this->input->post('nama').'</strong> telah ditambahkan!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('aset/form');
			}else if($opsi=='ubah'){
				if($id==null){
					$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-ban"></i> Tidak ada Aset Informasi yang dipilih!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('aset/form');
				}else{
					$this->form_validation->set_rules('nama', 'Nama Aset', 'required',[
						'required' => 'Nama Aset Harus Diisi!'
					]);
					$this->form_validation->set_rules('klasifikasi', 'Sub Klasifikasi', 'required',[
						'required' => 'Sub Klasifikasi Harus Dipilih!'
					]);
					$this->form_validation->set_rules('format', 'Format Penyimpanan', 'required',[
						'required' => 'Format Penyimpanan Harus Diisi!'
					]);
					$this->form_validation->set_rules('pemilik', 'Pemilik Aset', 'required',[
						'required' => 'Pemilik Aset Harus Diisi!'
					]);
					$this->form_validation->set_rules('kerahasiaan', 'Tingkat Kerahasiaan', 'required',[
						'required' => 'Harus Dipilih!'
					]);
					$this->form_validation->set_rules('integritas', 'Tingkat Integritas', 'required',[
						'required' => 'Harus Dipilih!'
					]);
					$this->form_validation->set_rules('ketersediaan', 'Tingkat Ketersediaan', 'required',[
						'required' => 'Harus Dipilih!'
					]);

					if ($this->form_validation->run() == FALSE){
						$data['judul'] = "Pencatatan Aset Layanan";
						$data['aset_informasi'] = $this->admin->aset_informasi($id);
						$data['aset_kerahasiaan'] = $this->admin->aset_kerahasiaan();
						$data['aset_integritas'] = $this->admin->aset_integritas();
						$data['aset_ketersediaan'] = $this->admin->aset_ketersediaan();
						$this->load->view('templates/header', $data);
						$this->load->view('templates/sidebar', $data);
						$this->load->view('templates/topbar', $data);
						$this->load->view('aset/form/informasi/ubah', $data);
						$this->load->view('templates/footer', $data);
					}else{
						$data = [
							'nama'=>$this->input->post('nama'),
							'klasifikasi'=>$this->input->post('klasifikasi'),
							'format'=>$this->input->post('format'),
							'pemilik'=>$this->input->post('pemilik'),
							'berlaku'=>$this->input->post('berlaku'),
							'kerahasiaan'=>$this->input->post('kerahasiaan'),
							'integritas'=>$this->input->post('integritas'),
							'ketersediaan'=>$this->input->post('ketersediaan'),
							'keterangan'=>$this->input->post('keterangan'),
							'username'=>$user,
							'tgl_update'=>time()
						];
						$this->db->set($data);
						$this->db->where('id',$id);
						$this->db->update('aset_informasi');

						$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
																  <i class="fa fa-fw fa-info-circle"></i> Aset Informasi <strong>'.$this->input->post('nama').'</strong> telah diperbarui!
																  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																    <span aria-hidden="true">&times;</span>
																  </button>
																</div>');
						redirect('aset/form');
					}
				}
			}else if($opsi=='hapus'){
				$nama = $this->input->post('nama');

				$this->db->where('id', $id);
				$this->db->delete('aset_informasi');

				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Aset Informasi <strong>'.$nama.'</strong> telah dihapus!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('aset/form');
			}else if($opsi=='cetak'){

				// CARA 1
				$data['judul'] = "Pencatatan Aset Informasi";
				$data['aset_informasi'] = $this->admin->aset_informasi();
				$this->load->view('aset/form/informasi/cetak', $data);


				// CARA 2 (FPDF)
				// $pdf = new FPDF('L','mm',array(310,215));
		  //       // membuat halaman baru
		  //       $pdf->AddPage();
		  //       // setting jenis font yang akan digunakan
		  //       $pdf->SetFont('Arial','B',16);
		  //       // mencetak string 
		  //       $pdf->Cell(190,7,'LAYANAN PENGADAAN SECARA ELEKTRONIK',0,1,'C');
		  //       $pdf->SetFont('Arial','B',12);
		  //       $pdf->Cell(190,7,'DAFTAR ASET INFORMASI',0,1,'C');
		  //       // Memberikan space kebawah agar tidak terlalu rapat
		  //       $pdf->Cell(10,7,'',0,1);
		  //       $pdf->SetFont('Arial','B',10);
		  //       $pdf->Cell(10,6,'NO',1,0);
		  //       $pdf->Cell(25,6,'KODE',1,0);
		  //       $pdf->Cell(50,6,'NAMA ASET',1,0);
		  //       $pdf->Cell(25,6,'SUB KLASIFIKASI',1,0);
		  //       $pdf->Cell(25,6,'FORMAT PENYIMPANAN',1,0);
		  //       $pdf->Cell(25,6,'PEMILIK ASET',1,0);
		  //       $pdf->Cell(25,6,'MASA BERLAKU',1,0);
		  //       $pdf->Cell(25,6,'KERAHASIAAN',1,0);
		  //       $pdf->Cell(25,6,'INTEGRITAS',1,0);
		  //       $pdf->Cell(25,6,'KETERSEDIAAN',1,0);
		  //       $pdf->Cell(25,6,'NILAI',1,0);
		  //       $pdf->Cell(25,6,'KETERANGAN',1,1);
		  //       $pdf->SetFont('Arial','',10);
		  //       $no=1;
		  //       $aset_informasi = $this->db->get('aset_informasi')->result_array();
		  //       foreach ($aset_informasi as $row){
		  //           $pdf->Cell(10,6,$no++,1,0);
		  //           $pdf->Cell(25,6,$row['id'],1,0);
		  //           $pdf->Cell(50,6,$row['nama'],1,0);
		  //           $pdf->Cell(25,6,$row['klasifikasi'],1,0); 
		  //           $pdf->Cell(25,6,$row['format'],1,0); 
		  //           $pdf->Cell(25,6,$row['pemilik'],1,0); 
		  //           $pdf->Cell(25,6,$row['berlaku'],1,0); 
		  //           $pdf->Cell(25,6,$row['kerahasiaan'],1,0); 
		  //           $pdf->Cell(25,6,$row['integritas'],1,0); 
		  //           $pdf->Cell(25,6,$row['ketersediaan'],1,0); 
		  //           $pdf->Cell(25,6,'0',1,0); 
		  //           $pdf->Cell(25,6,$row['keterangan'],1,1); 
		  //       }
		  //       $pdf->Output();
			}
		}else if($aset=='sdm'){
			if($opsi==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak ada metode yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('aset/form');
			}else if($opsi=='tambah'){
				$data = [
					'id'=>$this->input->post('id'),
					'nama'=>$this->input->post('nama'),
					'klasifikasi'=>$this->input->post('klasifikasi'),
					'identitas'=>$this->input->post('identitas'),
					'pemilik_fungsi'=>$this->input->post('pemilik_fungsi'),
					'pemilik_subfungsi'=>$this->input->post('pemilik_subfungsi'),
					'pemilik_unit'=>$this->input->post('pemilik_unit'),
					'jabatan'=>$this->input->post('jabatan'),
					'kontrak'=>$this->input->post('kontrak'),
					'atasan'=>$this->input->post('atasan'),
					'kerahasiaan'=>$this->input->post('kerahasiaan'),
					'integritas'=>$this->input->post('integritas'),
					'ketersediaan'=>$this->input->post('ketersediaan'),
					'keterangan'=>$this->input->post('keterangan'),
					'username'=>$user,
					'tgl_update'=>time()
				];
				$this->db->insert('aset_sdm', $data);
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Aset SDM a.n. <strong>'.$this->input->post('nama').'</strong> telah ditambahkan!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('aset/form');
			}else if($opsi=='ubah'){
				if($id==null){
					$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-ban"></i> Tidak ada Aset SDM yang dipilih!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('aset/form');
				}else{
					$this->form_validation->set_rules('nama', 'Nama Aset', 'required',[
						'required' => 'Nama Aset Harus Diisi!'
					]);
					$this->form_validation->set_rules('klasifikasi', 'Sub Klasifikasi', 'required',[
						'required' => 'Sub Klasifikasi Harus Dipilih!'
					]);
					$this->form_validation->set_rules('identitas', 'No. Identitas / NIP', 'required',[
						'required' => 'No. Identitas / NIP Harus Diisi!'
					]);
					$this->form_validation->set_rules('pemilik_fungsi', 'Fungsi Pemilik Aset', 'required',[
						'required' => 'Fungsi Pemilik Aset Harus Diisi!'
					]);
					$this->form_validation->set_rules('pemilik_subfungsi', 'Sub Fungsi Pemilik Aset', 'required',[
						'required' => 'Sub Fungsi Pemilik Aset Harus Diisi!'
					]);
					$this->form_validation->set_rules('pemilik_unit', 'Unit Pemilik Aset', 'required',[
						'required' => 'Unit Pemilik Aset Harus Diisi!'
					]);
					$this->form_validation->set_rules('jabatan', 'Jabatan', 'required',[
						'required' => 'Jabatan Harus Diisi!'
					]);
					$this->form_validation->set_rules('kontrak', 'No. Kontrak / NDA', 'required',[
						'required' => 'No. Kontrak / NDA Harus Diisi!'
					]);
					$this->form_validation->set_rules('atasan', 'Atasan Langsung', 'required',[
						'required' => 'Atasan Langsung Harus Diisi!'
					]);
					$this->form_validation->set_rules('kerahasiaan', 'Tingkat Kerahasiaan', 'required',[
						'required' => 'Tingkat Kerahasiaan Harus Dipilih!'
					]);
					$this->form_validation->set_rules('integritas', 'Tingkat Integritas', 'required',[
						'required' => 'Tingkat Integritas Harus Dipilih!'
					]);
					$this->form_validation->set_rules('ketersediaan', 'Tingkat Ketersediaan', 'required',[
						'required' => 'Tingkat Ketersediaan Harus Dipilih!'
					]);

					if ($this->form_validation->run() == FALSE){
						$data['judul'] = "Pencatatan Aset Layanan";
						$data['aset_sdm'] = $this->admin->aset_sdm($id);
						$data['aset_kerahasiaan'] = $this->admin->aset_kerahasiaan();
						$data['aset_integritas'] = $this->admin->aset_integritas();
						$data['aset_ketersediaan'] = $this->admin->aset_ketersediaan();
						$this->load->view('templates/header', $data);
						$this->load->view('templates/sidebar', $data);
						$this->load->view('templates/topbar', $data);
						$this->load->view('aset/form/sdm/ubah', $data);
						$this->load->view('templates/footer', $data);
					}else{
						$data = [
							'nama'=>$this->input->post('nama'),
							'klasifikasi'=>$this->input->post('klasifikasi'),
							'identitas'=>$this->input->post('identitas'),
							'pemilik_fungsi'=>$this->input->post('pemilik_fungsi'),
							'pemilik_subfungsi'=>$this->input->post('pemilik_subfungsi'),
							'pemilik_unit'=>$this->input->post('pemilik_unit'),
							'jabatan'=>$this->input->post('jabatan'),
							'kontrak'=>$this->input->post('kontrak'),
							'atasan'=>$this->input->post('atasan'),
							'kerahasiaan'=>$this->input->post('kerahasiaan'),
							'integritas'=>$this->input->post('integritas'),
							'ketersediaan'=>$this->input->post('ketersediaan'),
							'keterangan'=>$this->input->post('keterangan'),
							'username'=>$user,
							'tgl_update'=>time()
						];
						$this->db->set($data);
						$this->db->where('id',$id);
						$this->db->update('aset_sdm');

						$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
																  <i class="fa fa-fw fa-info-circle"></i> Aset SDM a.n. <strong>'.$this->input->post('nama').'</strong> telah diperbarui!
																  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																    <span aria-hidden="true">&times;</span>
																  </button>
																</div>');
						redirect('aset/form');
					}
				}
			}else if($opsi=='hapus'){
				$nama = $this->input->post('nama');

				$this->db->where('id', $id);
				$this->db->delete('aset_sdm');

				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Aset SDM a.n.  <strong>'.$nama.'</strong> telah dihapus!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('aset/form');
			}else if($opsi=='cetak'){
				$data['judul'] = "Pencatatan Aset Sumber Daya Alam (SDM)";
				$data['aset_sdm'] = $this->admin->aset_sdm();
				$this->load->view('aset/form/sdm/cetak', $data);
			}
		}else if($aset=='fisik'){
			if($opsi==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak ada metode yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('aset/form');
			}else if($opsi=='tambah'){
				$this->form_validation->set_rules('nama', 'Nama Aset', 'required',[
					'required' => 'Nama Aset Harus Diisi!'
				]);
				$this->form_validation->set_rules('id_klasifikasiaset', 'Sub Klasifikasi', 'required',[
					'required' => 'Sub Klasifikasi Harus Dipilih!'
				]);
				$this->form_validation->set_rules('id_jenisaset', 'Jenis Aset', 'required',[
					'required' => 'Jenis Aset Harus Dipilih!'
				]);
				$this->form_validation->set_rules('spesifikasi', 'Spesifikasi', 'required',[
					'required' => 'Spesifikasi Harus Diisi!'
				]);
				$this->form_validation->set_rules('pemilik', 'Pemilik Aset', 'required',[
					'required' => 'Pemilik Aset Harus Diisi!'
				]);
				$this->form_validation->set_rules('penyedia', 'Penyedia Aset', 'required',[
					'required' => 'Penyedia Aset Harus Diisi!'
				]);
				$this->form_validation->set_rules('pemegang', 'Pemegang Aset', 'required',[
					'required' => 'Pemegang Aset Harus Diisi!'
				]);
				$this->form_validation->set_rules('lokasi', 'Lokasi Aset', 'required',[
					'required' => 'Lokasi Aset Harus Diisi!'
				]);
				$this->form_validation->set_rules('berlaku', 'Masa Berlaku Aset', 'required',[
					'required' => 'Masa Berlaku Aset Harus Diisi!'
				]);
				$this->form_validation->set_rules('kerahasiaan', 'Tingkat Kerahasiaan', 'required',[
					'required' => 'Tingkat Kerahasiaan Harus Dipilih!'
				]);
				$this->form_validation->set_rules('integritas', 'Tingkat Integritas', 'required',[
					'required' => 'Tingkat Integritas Harus Dipilih!'
				]);
				$this->form_validation->set_rules('ketersediaan', 'Tingkat Ketersediaan', 'required',[
					'required' => 'Tingkat Ketersediaan Harus Dipilih!'
				]);

				if ($this->form_validation->run() == FALSE){
					$data['judul'] = "Pencatatan Aset Layanan";
					$data['jenis_aset_fisik'] = $this->admin->jenis_aset_fisik();
					$data['klasifikasi_aset_fisik'] = $this->admin->klasifikasi_aset_fisik();
					$data['aset_kerahasiaan'] = $this->admin->aset_kerahasiaan();
					$data['aset_integritas'] = $this->admin->aset_integritas();
					$data['aset_ketersediaan'] = $this->admin->aset_ketersediaan();
					$this->load->view('templates/header', $data);
					$this->load->view('templates/sidebar', $data);
					$this->load->view('templates/topbar', $data);
					$this->load->view('aset/form/fisik/tambah', $data);
					$this->load->view('templates/footer', $data);
				}else{
					$data = [
						'idf'=>$this->input->post('idf'),
						'nama'=>$this->input->post('nama'),
						'id_klasifikasiaset'=>$this->input->post('id_klasifikasiaset'),
						'id_jenisaset'=>$this->input->post('id_jenisaset'),
						'spesifikasi'=>$this->input->post('spesifikasi'),
						'pemilik'=>$this->input->post('pemilik'),
						'penyedia'=>$this->input->post('penyedia'),
						'pemegang'=>$this->input->post('pemegang'),
						'lokasi'=>$this->input->post('lokasi'),
						'berlaku'=>$this->input->post('berlaku'),
						'kerahasiaan'=>$this->input->post('kerahasiaan'),
						'integritas'=>$this->input->post('integritas'),
						'ketersediaan'=>$this->input->post('ketersediaan'),
						'keterangan'=>$this->input->post('keterangan'),
						'username'=>$user,
						'tgl_update'=>time()
					];
					$this->db->insert('aset_fisik', $data);

					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info-circle"></i> Aset Fisik <strong>'.$this->input->post('nama').'</strong> telah ditambahkan!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('aset/form');
				}
			}else if($opsi=='ubah'){
				if($id==null){
					$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-ban"></i> Tidak ada Aset Fisik yang dipilih!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('aset/form');
				}else{
					$this->form_validation->set_rules('nama', 'Nama Aset', 'required',[
					'required' => 'Nama Aset Harus Diisi!'
				]);
				$this->form_validation->set_rules('id_klasifikasiaset', 'Sub Klasifikasi', 'required',[
					'required' => 'Sub Klasifikasi Harus Dipilih!'
				]);
				$this->form_validation->set_rules('id_jenisaset', 'Jenis Aset', 'required',[
					'required' => 'Jenis Aset Harus Dipilih!'
				]);
				$this->form_validation->set_rules('spesifikasi', 'Spesifikasi', 'required',[
					'required' => 'Spesifikasi Harus Diisi!'
				]);
				$this->form_validation->set_rules('pemilik', 'Pemilik Aset', 'required',[
					'required' => 'Pemilik Aset Harus Diisi!'
				]);
				$this->form_validation->set_rules('penyedia', 'Penyedia Aset', 'required',[
					'required' => 'Penyedia Aset Harus Diisi!'
				]);
				$this->form_validation->set_rules('pemegang', 'Pemegang Aset', 'required',[
					'required' => 'Pemegang Aset Harus Diisi!'
				]);
				$this->form_validation->set_rules('lokasi', 'Lokasi Aset', 'required',[
					'required' => 'Lokasi Aset Harus Diisi!'
				]);
				$this->form_validation->set_rules('berlaku', 'Masa Berlaku Aset', 'required',[
					'required' => 'Masa Berlaku Aset Harus Diisi!'
				]);
				$this->form_validation->set_rules('kerahasiaan', 'Tingkat Kerahasiaan', 'required',[
					'required' => 'Tingkat Kerahasiaan Harus Dipilih!'
				]);
				$this->form_validation->set_rules('integritas', 'Tingkat Integritas', 'required',[
					'required' => 'Tingkat Integritas Harus Dipilih!'
				]);
				$this->form_validation->set_rules('ketersediaan', 'Tingkat Ketersediaan', 'required',[
					'required' => 'Tingkat Ketersediaan Harus Dipilih!'
				]);

				if ($this->form_validation->run() == FALSE){
						$data['judul'] = "Pencatatan Aset Layanan";
						$data['aset_fisik'] = $this->admin->aset_fisik($id);
						$data['jenis_aset_fisik'] = $this->admin->jenis_aset_fisik();
						$data['klasifikasi_aset_fisik'] = $this->admin->klasifikasi_aset_fisik();
						$data['aset_kerahasiaan'] = $this->admin->aset_kerahasiaan();
						$data['aset_integritas'] = $this->admin->aset_integritas();
						$data['aset_ketersediaan'] = $this->admin->aset_ketersediaan();
						$this->load->view('templates/header', $data);
						$this->load->view('templates/sidebar', $data);
						$this->load->view('templates/topbar', $data);
						$this->load->view('aset/form/fisik/ubah', $data);
						$this->load->view('templates/footer', $data);
					}else{
						$data = [
							'nama'=>$this->input->post('nama'),
							'id_klasifikasiaset'=>$this->input->post('id_klasifikasiaset'),
							'id_jenisaset'=>$this->input->post('id_jenisaset'),
							'spesifikasi'=>$this->input->post('spesifikasi'),
							'pemilik'=>$this->input->post('pemilik'),
							'penyedia'=>$this->input->post('penyedia'),
							'pemegang'=>$this->input->post('pemegang'),
							'lokasi'=>$this->input->post('lokasi'),
							'berlaku'=>$this->input->post('berlaku'),
							'kerahasiaan'=>$this->input->post('kerahasiaan'),
							'integritas'=>$this->input->post('integritas'),
							'ketersediaan'=>$this->input->post('ketersediaan'),
							'keterangan'=>$this->input->post('keterangan'),
							'username'=>$user,
							'tgl_update'=>time()
						];
						$this->db->set($data);
						$this->db->where('idf',$id);
						$this->db->update('aset_fisik');

						$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
																  <i class="fa fa-fw fa-info-circle"></i> Aset Fisik <strong>'.$this->input->post('nama').'</strong> telah diperbarui!
																  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																    <span aria-hidden="true">&times;</span>
																  </button>
																</div>');
						redirect('aset/form');
					}
				}
			}else if($opsi=='hapus'){
				$nama = $this->input->post('nama');

				$this->db->where('idf', $id);
				$this->db->delete('aset_fisik');

				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Aset Fisik <strong>'.$nama.'</strong> telah dihapus!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('aset/form');
			}else if($opsi=='cetak'){
				$data['judul'] = "Pencatatan Aset Fisik";
				$data['aset_fisik'] = $this->admin->aset_fisik();
				$this->load->view('aset/form/fisik/cetak', $data);
			}
		}else if($aset=='software'){
			if($opsi==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak ada metode yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('aset/form');
			}else if($opsi=='tambah'){
				$data = [
					'ids'=>$this->input->post('id'),
					'nama'=>$this->input->post('nama'),
					'klasifikasi'=>$this->input->post('klasifikasi'),
					'pemilik'=>$this->input->post('pemilik'),
					'pemegang'=>$this->input->post('pemegang'),
					'lokasi'=>$this->input->post('lokasi'),
					'berlaku'=>$this->input->post('berlaku'),
					'hapus'=>$this->input->post('hapus'),
					'kerahasiaan'=>$this->input->post('kerahasiaan'),
					'integritas'=>$this->input->post('integritas'),
					'ketersediaan'=>$this->input->post('ketersediaan'),
					'keterangan'=>$this->input->post('keterangan'),
					'username'=>$user,
					'tgl_update'=>time()
				];
				$this->db->insert('aset_software', $data);
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Aset Software <strong>'.$this->input->post('nama').'</strong> telah ditambahkan!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('aset/form');
			}else if($opsi=='ubah'){
				if($id==null){
					$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-ban"></i> Tidak ada Aset Perangkat Lunak (Software) yang dipilih!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('aset/form');
				}else{
					$this->form_validation->set_rules('nama', 'Nama Aset', 'required',[
						'required' => 'Nama Aset Harus Diisi!'
					]);
					$this->form_validation->set_rules('klasifikasi', 'Sub Klasifikasi', 'required',[
						'required' => 'Sub Klasifikasi Harus Dipilih!'
					]);
					$this->form_validation->set_rules('pemilik', 'Pemilik Aset', 'required',[
						'required' => 'Pemilik Aset Harus Diisi!'
					]);
					$this->form_validation->set_rules('pemegang', 'Pemegang Aset', 'required',[
						'required' => 'Pemegang Aset Harus Diisi!'
					]);
					$this->form_validation->set_rules('lokasi', 'Lokasi Aset', 'required',[
						'required' => 'Lokasi Aset Harus Diisi!'
					]);
					$this->form_validation->set_rules('berlaku', 'Masa Berlaku', 'required',[
						'required' => 'Masa Berlaku Harus Diisi!'
					]);
					$this->form_validation->set_rules('hapus', 'Metode Penghapusan', 'required',[
						'required' => 'Metode Penghapusan Harus Dipilih!'
					]);
					$this->form_validation->set_rules('kerahasiaan', 'Tingkat Kerahasiaan', 'required',[
						'required' => 'Tingkat Kerahasiaan Harus Dipilih!'
					]);
					$this->form_validation->set_rules('integritas', 'Tingkat Integritas', 'required',[
						'required' => 'Tingkat Integritas Harus Dipilih!'
					]);
					$this->form_validation->set_rules('ketersediaan', 'Tingkat Ketersediaan', 'required',[
						'required' => 'Tingkat Ketersediaan Harus Dipilih!'
					]);

					if ($this->form_validation->run() == FALSE){
						$data['judul'] = "Pencatatan Aset Layanan";
						$data['aset_software'] = $this->admin->aset_software($id);
						$data['aset_kerahasiaan'] = $this->admin->aset_kerahasiaan();
						$data['aset_integritas'] = $this->admin->aset_integritas();
						$data['aset_ketersediaan'] = $this->admin->aset_ketersediaan();
						$this->load->view('templates/header', $data);
						$this->load->view('templates/sidebar', $data);
						$this->load->view('templates/topbar', $data);
						$this->load->view('aset/form/software/ubah', $data);
						$this->load->view('templates/footer', $data);
					}else{
						$data = [
							'nama'=>$this->input->post('nama'),
							'klasifikasi'=>$this->input->post('klasifikasi'),
							'pemilik'=>$this->input->post('pemilik'),
							'pemegang'=>$this->input->post('pemegang'),
							'lokasi'=>$this->input->post('lokasi'),
							'berlaku'=>$this->input->post('berlaku'),
							'hapus'=>$this->input->post('hapus'),
							'kerahasiaan'=>$this->input->post('kerahasiaan'),
							'integritas'=>$this->input->post('integritas'),
							'ketersediaan'=>$this->input->post('ketersediaan'),
							'keterangan'=>$this->input->post('keterangan'),
							'username'=>$user,
							'tgl_update'=>time()
						];
						$this->db->set($data);
						$this->db->where('ids',$id);
						$this->db->update('aset_software');

						$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
																  <i class="fa fa-fw fa-info-circle"></i> Aset Software <strong>'.$this->input->post('nama').'</strong> telah diperbarui!
																  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																    <span aria-hidden="true">&times;</span>
																  </button>
																</div>');
						redirect('aset/form');
					}
				}
			}else if($opsi=='hapus'){
				$nama = $this->input->post('nama');

				$this->db->where('ids', $id);
				$this->db->delete('aset_software');

				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Aset Software  <strong>'.$nama.'</strong> telah dihapus!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('aset/form');
			}else if($opsi=='cetak'){
				$data['judul'] = "Pencatatan Aset Perangkat Lunak (Software)";
				$data['aset_software'] = $this->admin->aset_software();
				$this->load->view('aset/form/software/cetak', $data);
			}
		}else if($aset=='layanan'){
			if($opsi==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak ada metode yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('aset/form');
			}else if($opsi=='tambah'){
				$data = [
					'idl'=>$this->input->post('id'),
					'nama'=>$this->input->post('nama'),
					'klasifikasi'=>$this->input->post('klasifikasi'),
					'pemilik'=>$this->input->post('pemilik'),
					'pemegang'=>$this->input->post('pemegang'),
					'penyedia'=>$this->input->post('penyedia'),
					'kontrak_no'=>$this->input->post('nomor'),
					'kontrak_deskripsi'=>$this->input->post('deskripsi'),
					'kontrak_berlaku'=>$this->input->post('berlaku'),
					'kerahasiaan'=>$this->input->post('kerahasiaan'),
					'integritas'=>$this->input->post('integritas'),
					'ketersediaan'=>$this->input->post('ketersediaan'),
					'keterangan'=>$this->input->post('keterangan'),
					'username'=>$user,
					'tgl_update'=>time()
				];
				$this->db->insert('aset_layanan', $data);
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Aset Layanan <strong>'.$this->input->post('nama').'</strong> telah ditambahkan!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('aset/form');
			}else if($opsi=='ubah'){
				if($id==null){
					$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-ban"></i> Tidak ada Aset Layanan yang dipilih!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('aset/form');
				}else{
					$this->form_validation->set_rules('nama', 'Nama Aset', 'required',[
						'required' => 'Nama Aset Harus Diisi!'
					]);
					$this->form_validation->set_rules('klasifikasi', 'Sub Klasifikasi', 'required',[
						'required' => 'Sub Klasifikasi Harus Dipilih!'
					]);
					$this->form_validation->set_rules('pemilik', 'Pemilik Aset', 'required',[
						'required' => 'Pemilik Aset Harus Diisi!'
					]);
					$this->form_validation->set_rules('pemegang', 'Pemegang Aset', 'required',[
						'required' => 'Pemegang Aset Harus Diisi!'
					]);
					$this->form_validation->set_rules('penyedia', 'Penyedia Aset', 'required',[
						'required' => 'Penyedia Aset Harus Diisi!'
					]);
					$this->form_validation->set_rules('kontrak_no', 'No. Kontrak / SLA', 'required',[
						'required' => 'No. Kontrak / SLA Harus Diisi!'
					]);
					$this->form_validation->set_rules('kontrak_deskripsi', 'Deskripsi Layanan', 'required',[
						'required' => 'Deskripsi Layanan Harus Diisi!'
					]);
					$this->form_validation->set_rules('kontrak_berlaku', 'Masa Berlaku', 'required',[
						'required' => 'Masa Berlaku Harus Diisi!'
					]);
					$this->form_validation->set_rules('kerahasiaan', 'Tingkat Kerahasiaan', 'required',[
						'required' => 'Tingkat Kerahasiaan Harus Dipilih!'
					]);
					$this->form_validation->set_rules('integritas', 'Tingkat Integritas', 'required',[
						'required' => 'Tingkat Integritas Harus Dipilih!'
					]);
					$this->form_validation->set_rules('ketersediaan', 'Tingkat Ketersediaan', 'required',[
						'required' => 'Tingkat Ketersediaan Harus Dipilih!'
					]);

					if ($this->form_validation->run() == FALSE){
						$data['judul'] = "Pencatatan Aset Layanan";
						$data['aset_layanan'] = $this->admin->aset_layanan($id);
						$data['aset_kerahasiaan'] = $this->admin->aset_kerahasiaan();
						$data['aset_integritas'] = $this->admin->aset_integritas();
						$data['aset_ketersediaan'] = $this->admin->aset_ketersediaan();
						$this->load->view('templates/header', $data);
						$this->load->view('templates/sidebar', $data);
						$this->load->view('templates/topbar', $data);
						$this->load->view('aset/form/layanan/ubah', $data);
						$this->load->view('templates/footer', $data);
					}else{
						$data = [
							'nama'=>$this->input->post('nama'),
							'klasifikasi'=>$this->input->post('klasifikasi'),
							'pemilik'=>$this->input->post('pemilik'),
							'pemegang'=>$this->input->post('pemegang'),
							'penyedia'=>$this->input->post('penyedia'),
							'kontrak_no'=>$this->input->post('kontrak_no'),
							'kontrak_deskripsi'=>$this->input->post('kontrak_deskripsi'),
							'kontrak_berlaku'=>$this->input->post('kontrak_berlaku'),
							'kerahasiaan'=>$this->input->post('kerahasiaan'),
							'integritas'=>$this->input->post('integritas'),
							'ketersediaan'=>$this->input->post('ketersediaan'),
							'keterangan'=>$this->input->post('keterangan'),
							'username'=>$user,
							'tgl_update'=>time()
						];
						$this->db->set($data);
						$this->db->where('idl',$id);
						$this->db->update('aset_layanan');

						$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
																  <i class="fa fa-fw fa-info-circle"></i> Aset Layanan <strong>'.$this->input->post('nama').'</strong> telah diperbarui!
																  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																    <span aria-hidden="true">&times;</span>
																  </button>
																</div>');
						redirect('aset/form');
					}
				}
			}else if($opsi=='hapus'){
				$nama = $this->input->post('nama');

				$this->db->where('idl', $id);
				$this->db->delete('aset_layanan');

				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Aset Layanan  <strong>'.$nama.'</strong> telah dihapus!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('aset/form');
			}else if($opsi=='cetak'){
				$data['judul'] = "Pencatatan Aset Layanan";
				$data['aset_layanan'] = $this->admin->aset_layanan();
				$this->load->view('aset/form/layanan/cetak', $data);
			}
		}else if($aset=='intangible'){
			if($opsi==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak ada metode yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('aset/form');
			}else if($opsi=='tambah'){
				$data = [
					'idi'=>$this->input->post('id'),
					'nama'=>$this->input->post('nama'),
					'klasifikasi'=>$this->input->post('klasifikasi'),
					'pemilik'=>$this->input->post('pemilik'),
					'kerahasiaan'=>$this->input->post('kerahasiaan'),
					'integritas'=>$this->input->post('integritas'),
					'ketersediaan'=>$this->input->post('ketersediaan'),
					'keterangan'=>$this->input->post('keterangan'),
					'username'=>$user,
					'tgl_update'=>time()
				];
				$this->db->insert('aset_intangible', $data);
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Aset Intangible <strong>'.$this->input->post('nama').'</strong> telah ditambahkan!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('aset/form');
			}else if($opsi=='ubah'){
				if($id==null){
					$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-ban"></i> Tidak ada Aset Intangible yang dipilih!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('aset/form');
				}else{
					$this->form_validation->set_rules('nama', 'Nama Aset', 'required',[
						'required' => 'Nama Aset Harus Diisi!'
					]);
					$this->form_validation->set_rules('klasifikasi', 'Sub Klasifikasi', 'required',[
						'required' => 'Sub Klasifikasi Harus Dipilih!'
					]);
					$this->form_validation->set_rules('pemilik', 'Pemilik Aset', 'required',[
						'required' => 'Pemilik Aset Harus Diisi!'
					]);
					$this->form_validation->set_rules('kerahasiaan', 'Tingkat Kerahasiaan', 'required',[
						'required' => 'Tingkat Kerahasiaan Harus Dipilih!'
					]);
					$this->form_validation->set_rules('integritas', 'Tingkat Integritas', 'required',[
						'required' => 'Tingkat Integritas Harus Dipilih!'
					]);
					$this->form_validation->set_rules('ketersediaan', 'Tingkat Ketersediaan', 'required',[
						'required' => 'Tingkat Ketersediaan Harus Dipilih!'
					]);

					if ($this->form_validation->run() == FALSE){
						$data['judul'] = "Pencatatan Aset Layanan";
						$data['aset_intangible'] = $this->admin->aset_intangible($id);
						$data['aset_kerahasiaan'] = $this->admin->aset_kerahasiaan();
						$data['aset_integritas'] = $this->admin->aset_integritas();
						$data['aset_ketersediaan'] = $this->admin->aset_ketersediaan();
						$this->load->view('templates/header', $data);
						$this->load->view('templates/sidebar', $data);
						$this->load->view('templates/topbar', $data);
						$this->load->view('aset/form/intangible/ubah', $data);
						$this->load->view('templates/footer', $data);
					}else{
						$data = [
							'nama'=>$this->input->post('nama'),
							'klasifikasi'=>$this->input->post('klasifikasi'),
							'pemilik'=>$this->input->post('pemilik'),
							'kerahasiaan'=>$this->input->post('kerahasiaan'),
							'integritas'=>$this->input->post('integritas'),
							'ketersediaan'=>$this->input->post('ketersediaan'),
							'keterangan'=>$this->input->post('keterangan'),
							'username'=>$user,
							'tgl_update'=>time()
						];
						$this->db->set($data);
						$this->db->where('idi',$id);
						$this->db->update('aset_intangible');

						$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
																  <i class="fa fa-fw fa-info-circle"></i> Aset Intangible <strong>'.$this->input->post('nama').'</strong> telah diperbarui!
																  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																    <span aria-hidden="true">&times;</span>
																  </button>
																</div>');
						redirect('aset/form');
					}
				}
			}else if($opsi=='hapus'){
				$nama = $this->input->post('nama');

				$this->db->where('idi', $id);
				$this->db->delete('aset_intangible');

				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Aset Intangible  <strong>'.$nama.'</strong> telah dihapus!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('aset/form');
			}else if($opsi=='cetak'){
				$data['judul'] = "Pencatatan Aset Layanan";
				$data['aset_intangible'] = $this->admin->aset_intangible();
				$this->load->view('aset/form/intangible/cetak', $data);
			}
		}
	}
}
