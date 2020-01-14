<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regulasi extends CI_Controller {

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
		$data['akses_menu'] = $this->admin->akses_menu($id_menu, $user)->num_rows();

		// KHUSUS
		$data['judul'] = "Informasi";
		$data['kebijakan_umum'] = $this->admin->regulasiid('kebijakan_umum');
		$data['kebijakan_layanan'] = $this->admin->regulasiid('kebijakan_layanan');
		$data['kebijakan_keamanan_informasi'] = $this->admin->regulasiid('kebijakan_keamanan_informasi');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('regulasi/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function edit($id_regulasi=null){
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
		if($id_regulasi==null){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Tidak ada regulasi yang dipilih!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('regulasi');
		}else{
			$this->form_validation->set_rules('isi_regulasi', 'Isi Regulasi', 'required',[
				'required' => 'Isi Regulasi Harus Diisi!'
			]);

			if ($this->form_validation->run() == FALSE){
				$data['judul'] = "Informasi";
				$data['regulasi'] = $this->admin->regulasiid($id_regulasi);
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('regulasi/ubah', $data);
				$this->load->view('templates/footer', $data);
			}else{
				$nama_regulasi = $this->input->post('nama_regulasi');
				$isi_regulasi = $this->input->post('isi_regulasi');

				$this->db->set('isi_regulasi', $isi_regulasi);
				$this->db->where('id_regulasi', $id_regulasi);
				$this->db->update('regulasi');

				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-check"></i> Regulasi <strong>'.$nama_regulasi.'</strong> telah diperbarui!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('regulasi');
			}
		}
	}

	public function perka(){
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
		$data['judul'] = "Regulasi";
		$data['perka'] = $this->admin->perka();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('regulasi/perka', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambahperka(){
		$id = uniqid(10);
		$nomor = htmlspecialchars($this->input->post('nomor'));
		$tahun = htmlspecialchars($this->input->post('tahun'));
		$nama = htmlspecialchars($this->input->post('nama'));
		$tentang = htmlspecialchars($this->input->post('tentang'));
		$berlaku = htmlspecialchars($this->input->post('berlaku'));
		$berakhir = htmlspecialchars($this->input->post('berakhir'));
		$tgl_ubah = time();

		// Cek file yang diupload
		$file_upload = $_FILES['file']['name'];

		if($file_upload){
			$config['allowed_types']	= 'pdf';
			$config['max_size']			= '2048';
			$config['upload_path']		= './uploads/pdf/perka/';
			$this->load->library('upload', $config);
			if($this->upload->do_upload('file')){
				$file = $this->upload->data('file_name');
				$data = [
					'id'=>$id,
					'nomor'=>$nomor,
					'tahun'=>$tahun,
					'nama'=>$nama,
					'tentang'=>$tentang,
					'berlaku'=>$berlaku,
					'berakhir'=>$berakhir,
					'file'=>$file,
					'tgl_ubah'=>$tgl_ubah
				];
			} else {
				echo $this->upload->display_errors();
			}
		}

		$this->db->insert('regulasi_perka', $data);
		$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
												  <i class="fa fa-fw fa-check"></i> Regulasi <strong>'.$nama.'</strong> telah ditambahkan!
												  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												    <span aria-hidden="true">&times;</span>
												  </button>
												</div>');
		redirect('regulasi/perka');
	}

	public function ubahperka($id=null){
		if($id==null){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Tidak ada peraturan yang dipilih!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('regulasi/perka');
		}else{
			$nomor = htmlspecialchars($this->input->post('nomor'));
			$tahun = htmlspecialchars($this->input->post('tahun'));
			$nama = htmlspecialchars($this->input->post('nama'));
			$tentang = htmlspecialchars($this->input->post('tentang'));
			$berlaku = $this->input->post('berlaku');
			$berakhir = $this->input->post('berakhir');
			$filelama = $this->input->post('filelama');
			$tgl_ubah = time();

			// Cek file yang diupload
			$file_upload = $_FILES['file']['name'];

			if($file_upload){
				$config['allowed_types']	= 'pdf';
				$config['max_size']			= '2048';
				$config['upload_path']		= './uploads/pdf/perka/';
				$this->load->library('upload', $config);
				if($this->upload->do_upload('file')){
					$file = $this->upload->data('file_name');
					unlink(FCPATH.'uploads/pdf/perka/'.$filelama);
					$data = [
						'nomor'=>$nomor,
						'tahun'=>$tahun,
						'nama'=>$nama,
						'tentang'=>$tentang,
						'berlaku'=>$berlaku,
						'berakhir'=>$berakhir,
						'file'=>$file,
						'tgl_ubah'=>$tgl_ubah
					];
				} else {
					echo $this->upload->display_errors();
				}
			}else{
				$data = [
					'nomor'=>$nomor,
					'tahun'=>$tahun,
					'nama'=>$nama,
					'tentang'=>$tentang,
					'berlaku'=>$berlaku,
					'berakhir'=>$berakhir,
					'tgl_ubah'=>$tgl_ubah
				];
			}

			$this->db->set($data);
			$this->db->where('id', $id);
			$this->db->update('regulasi_perka');

			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-check"></i> Regulasi <strong>'.$nama.'</strong> telah diperbarui!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('regulasi/perka');
		}
	}

	public function hapusperka($id=null){
		if($id==null){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Tidak ada peraturan yang dipilih!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('regulasi/perka');
		}else{
			$nomor = $this->input->post('nomor');
			$tahun = $this->input->post('tahun');
			$nama = $this->input->post('nama');
			$file = $this->input->post('file');

			unlink(FCPATH.'uploads/pdf/perka/'.$file);

			$this->db->where('id', $id);
			$this->db->delete('regulasi_perka');

			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-check"></i> <strong>'.$nama.'</strong> Nomor <strong>'.$nomor.'</strong> Tahun <strong>'.$tahun.'</strong> telah dihapus!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('regulasi/perka');
		}
	}
}
