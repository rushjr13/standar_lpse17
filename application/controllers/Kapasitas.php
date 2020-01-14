<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kapasitas extends CI_Controller {

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
		$data['judul'] = "SOP Kapasitas Layanan";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kapasitas/index', $data);
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
		$link = $this->uri->segment('1');
		$menu_segmen = $this->admin->menu_segmen($link);
		$id_menu = $menu_segmen['id_menu'];
		$data['akses_menu'] = $this->admin->akses_menu($id_menu, $user)->num_rows();

		// KHUSUS
		$data['judul'] = "SK Koordinator Kapasitas";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kapasitas/sk/index', $data);
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
		$link = $this->uri->segment('1');
		$menu_segmen = $this->admin->menu_segmen($link);
		$id_menu = $menu_segmen['id_menu'];
		$data['akses_menu'] = $this->admin->akses_menu($id_menu, $user)->num_rows();

		// KHUSUS
		if($opsi==null){
			$data['judul'] = "Pencatatan Kapasitas Layanan";
			$data['kapasitas_kategori'] = $this->kapasitas->kapasitas_kategori();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('kapasitas/form/index', $data);
			$this->load->view('templates/footer', $data);
		}else if($opsi=='tambah'){
			$this->form_validation->set_rules('id_kk', 'Kategori', 'required',[
				'required' => 'Kategori Harus Dipilih!'
			]);
			$this->form_validation->set_rules('item', 'Item', 'required',[
				'required' => 'Item Harus Diisi!'
			]);
			$this->form_validation->set_rules('batasan', 'Batasan', 'required',[
				'required' => 'Batasan Harus Diisi!'
			]);
			$this->form_validation->set_rules('waktu_pantau', 'Waktu Pemantauan', 'required',[
				'required' => 'Waktu Pemantauan Harus Diisi!'
			]);
			$this->form_validation->set_rules('utilitas', 'Utilitas', 'required',[
				'required' => 'Utilitas Harus Diisi!'
			]);
			$this->form_validation->set_rules('perkiraan_resource', 'Perkiraan Resource', 'required',[
				'required' => 'Perkiraan Resource Harus Diisi!'
			]);
			$this->form_validation->set_rules('tindak_lanjut', 'Tindak Lanjut', 'required',[
				'required' => 'Tindak Lanjut Harus Diisi!'
			]);
			$this->form_validation->set_rules('kondisi_p1', 'Parameter', 'required',[
				'required' => 'Parameter Harus Diisi!'
			]);
			$this->form_validation->set_rules('perkiraan_p1', 'Parameter', 'required',[
				'required' => 'Parameter Harus Diisi!'
			]);

			if ($this->form_validation->run() == FALSE){
				$data['judul'] = "Pencatatan Kapasitas Layanan";
				$data['kapasitas_kategori'] = $this->kapasitas->kapasitas_kategori();
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('kapasitas/form/tambah', $data);
				$this->load->view('templates/footer', $data);
			}else{
				$id_kapasitas = 'KL'.time();
				$data = [
					'id_kapasitas'=>$id_kapasitas,
					'item'=>$this->input->post('item'),
					'id_kk'=>$this->input->post('id_kk'),
					'batasan'=>$this->input->post('batasan'),
					'waktu_pantau'=>$this->input->post('waktu_pantau'),
					'utilitas'=>$this->input->post('utilitas'),
					'kondisi_p1'=>$this->input->post('kondisi_p1'),
					'kondisi_p2'=>$this->input->post('kondisi_p2'),
					'kondisi_p3'=>$this->input->post('kondisi_p3'),
					'kondisi_p4'=>$this->input->post('kondisi_p4'),
					'perkiraan_p1'=>$this->input->post('perkiraan_p1'),
					'perkiraan_p2'=>$this->input->post('perkiraan_p2'),
					'perkiraan_p3'=>$this->input->post('perkiraan_p3'),
					'perkiraan_p4'=>$this->input->post('perkiraan_p4'),
					'perkiraan_resource'=>$this->input->post('perkiraan_resource'),
					'tindak_lanjut'=>$this->input->post('tindak_lanjut')
				];

				$datalaporan = ['id_kapasitas'=>$id_kapasitas];

				$this->db->insert('kapasitas', $data);
				$this->db->insert('kapasitas_laporan', $datalaporan);
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Pencatatan Kapasitas Layanan Telah ditambahkan!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('kapasitas/form');
			}
		}else if($opsi=='ubah'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak Ada Kapasitas Layanan yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('kapasitas/form');
			}else{
				$this->form_validation->set_rules('id_kk', 'Kategori', 'required',[
					'required' => 'Kategori Harus Dipilih!'
				]);
				$this->form_validation->set_rules('item', 'Item', 'required',[
					'required' => 'Item Harus Diisi!'
				]);
				$this->form_validation->set_rules('batasan', 'Batasan', 'required',[
					'required' => 'Batasan Harus Diisi!'
				]);
				$this->form_validation->set_rules('waktu_pantau', 'Waktu Pemantauan', 'required',[
					'required' => 'Waktu Pemantauan Harus Diisi!'
				]);
				$this->form_validation->set_rules('utilitas', 'Utilitas', 'required',[
					'required' => 'Utilitas Harus Diisi!'
				]);
				$this->form_validation->set_rules('perkiraan_resource', 'Perkiraan Resource', 'required',[
					'required' => 'Perkiraan Resource Harus Diisi!'
				]);
				$this->form_validation->set_rules('tindak_lanjut', 'Tindak Lanjut', 'required',[
					'required' => 'Tindak Lanjut Harus Diisi!'
				]);
				$this->form_validation->set_rules('kondisi_p1', 'Parameter', 'required',[
					'required' => 'Parameter Harus Diisi!'
				]);
				$this->form_validation->set_rules('perkiraan_p1', 'Parameter', 'required',[
					'required' => 'Parameter Harus Diisi!'
				]);

				if ($this->form_validation->run() == FALSE){
					$data['judul'] = "Pencatatan Kapasitas Layanan";
					$data['kapasitas'] = $this->kapasitas->kapasitas($id);
					$data['kapasitas_kategori'] = $this->kapasitas->kapasitas_kategori();
					$this->load->view('templates/header', $data);
					$this->load->view('templates/sidebar', $data);
					$this->load->view('templates/topbar', $data);
					$this->load->view('kapasitas/form/ubah', $data);
					$this->load->view('templates/footer', $data);
				}else{
					$data = [
						'item'=>$this->input->post('item'),
						'id_kk'=>$this->input->post('id_kk'),
						'batasan'=>$this->input->post('batasan'),
						'waktu_pantau'=>$this->input->post('waktu_pantau'),
						'utilitas'=>$this->input->post('utilitas'),
						'kondisi_p1'=>$this->input->post('kondisi_p1'),
						'kondisi_p2'=>$this->input->post('kondisi_p2'),
						'kondisi_p3'=>$this->input->post('kondisi_p3'),
						'kondisi_p4'=>$this->input->post('kondisi_p4'),
						'perkiraan_p1'=>$this->input->post('perkiraan_p1'),
						'perkiraan_p2'=>$this->input->post('perkiraan_p2'),
						'perkiraan_p3'=>$this->input->post('perkiraan_p3'),
						'perkiraan_p4'=>$this->input->post('perkiraan_p4'),
						'perkiraan_resource'=>$this->input->post('perkiraan_resource'),
						'tindak_lanjut'=>$this->input->post('tindak_lanjut')
					];
					$this->db->set($data);
					$this->db->where('id_kapasitas', $id);
					$this->db->update('kapasitas');
					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info-circle"></i> Kapasitas Layanan <strong>'.$this->input->post('item').'</strong> Telah diperbarui!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('kapasitas/form');
				}
			}
		}else if($opsi=='laporan'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak Ada Kapasitas Layanan yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('kapasitas/form');
			}else{
				$this->form_validation->set_rules('latar_belakang', 'Latar Belakang', 'required',[
					'required' => 'Latar Belakang Harus Diisi!'
				]);
				$this->form_validation->set_rules('ruang_lingkup', 'Ruang Lingkup', 'required',[
					'required' => 'Ruang Lingkup Harus Diisi!'
				]);
				$this->form_validation->set_rules('metode', 'Metode', 'required',[
					'required' => 'Metode Harus Diisi!'
				]);
				$this->form_validation->set_rules('asumsi', 'Asumsi Yang Digunakan', 'required',[
					'required' => 'Asumsi Yang Digunakan Harus Diisi!'
				]);
				$this->form_validation->set_rules('laporan_saat_ini', 'Laporan Layanan Saat Ini', 'required',[
					'required' => 'Laporan Layanan Saat Ini Harus Diisi!'
				]);
				$this->form_validation->set_rules('prediksi_akan_datang', 'Prediksi Layanan Yang Akan Datang', 'required',[
					'required' => 'Prediksi Layanan Yang Akan Datang Harus Diisi!'
				]);
				$this->form_validation->set_rules('laporan_pakai_komponen', 'Laporan Penggunaan Komponen Pendukung', 'required',[
					'required' => 'Laporan Penggunaan Komponen Pendukung Harus Diisi!'
				]);
				$this->form_validation->set_rules('analisis_trend', 'Analisis Trend Penggunaan Komponen Pendukung', 'required',[
					'required' => 'Analisis Trend Penggunaan Komponen Pendukung Harus Diisi!'
				]);
				$this->form_validation->set_rules('prediksi_kebutuhan', 'Prediksi Kebutuhan Komponen Pendukung', 'required',[
					'required' => 'Prediksi Kebutuhan Komponen Pendukung Harus Diisi!'
				]);
				$this->form_validation->set_rules('pilihan_peningkatan_layanan', 'Pilihan Peningkatan Layanan', 'required',[
					'required' => 'Pilihan Peningkatan Layanan Harus Diisi!'
				]);
				$this->form_validation->set_rules('prediksi_pembiayaan', 'Prediksi Pembiayaan', 'required',[
					'required' => 'Prediksi Pembiayaan Harus Diisi!'
				]);
				$this->form_validation->set_rules('rekomendasi_kapasitas', 'Rekomendasi Kapasitas Layanan', 'required',[
					'required' => 'Rekomendasi Kapasitas Layanan Harus Diisi!'
				]);

				if ($this->form_validation->run() == FALSE){
					$data['judul'] = "Pencatatan Kapasitas Layanan";
					$data['kapasitas'] = $this->kapasitas->kapasitas($id);
					$data['kapasitas_laporan'] = $this->kapasitas->kapasitas_laporan($id);
					$this->load->view('templates/header', $data);
					$this->load->view('templates/sidebar', $data);
					$this->load->view('templates/topbar', $data);
					$this->load->view('kapasitas/form/laporan', $data);
					$this->load->view('templates/footer', $data);
				}else{
					$data = [
						'latar_belakang'=>$this->input->post('latar_belakang'),
						'ruang_lingkup'=>$this->input->post('ruang_lingkup'),
						'metode'=>$this->input->post('metode'),
						'asumsi'=>$this->input->post('asumsi'),
						'laporan_saat_ini'=>$this->input->post('laporan_saat_ini'),
						'prediksi_akan_datang'=>$this->input->post('prediksi_akan_datang'),
						'laporan_pakai_komponen'=>$this->input->post('laporan_pakai_komponen'),
						'analisis_trend'=>$this->input->post('analisis_trend'),
						'prediksi_kebutuhan'=>$this->input->post('prediksi_kebutuhan'),
						'pilihan_peningkatan_layanan'=>$this->input->post('pilihan_peningkatan_layanan'),
						'prediksi_pembiayaan'=>$this->input->post('prediksi_pembiayaan'),
						'rekomendasi_kapasitas'=>$this->input->post('rekomendasi_kapasitas')
					];
					$this->db->set($data);
					$this->db->where('id_kapasitas', $id);
					$this->db->update('kapasitas_laporan');
					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info-circle"></i> Laporan Kapasitas Layanan Telah disimpan!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('kapasitas/form/laporan/'.$id);
				}
			}
		}else if($opsi=='cetak'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak Ada Kapasitas Layanan yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('kapasitas/form');
			}else{
				$data['judul'] = "Pencatatan Kapasitas Layanan";
				$data['kapasitas'] = $this->kapasitas->kapasitas($id);
				$data['kapasitas_laporan'] = $this->kapasitas->kapasitas_laporan($id);
				$this->load->view('kapasitas/form/cetak', $data);
			}
		}else if($opsi=='hapus'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak Ada Kapasitas Layanan yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('kapasitas/form');
			}else{
				$item=$this->input->post('item');
				$this->db->where('id_kapasitas', $id);
				$this->db->delete('kapasitas');

				$this->db->where('id_kapasitas', $id);
				$this->db->delete('kapasitas_laporan');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Kapasitas Layanan <strong>'.$item.'</strong> telah dihapus!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('kapasitas/form');
			}
		}
	}
}
