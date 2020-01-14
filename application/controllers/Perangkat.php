<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perangkat extends CI_Controller {

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
		$data['judul'] = "Regulasi Keamanan Perangkat";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('perangkat/index', $data);
		$this->load->view('templates/footer', $data);
	}

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
		$data['akses_menu'] = $this->admin->akses_menu($id_menu, $user)->num_rows();

		// KHUSUS
		$data['judul'] = "SOP Keamanan Perangkat";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('perangkat/sop/index', $data);
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
		$data['judul'] = "SK Koordinator Perangkat";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('perangkat/sk/index', $data);
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
			$data['judul'] = "Form Keamanan Perangkat";
			$data['perangkat_jenis'] = $this->keamanan->perangkat_jenis();
			$data['perangkat'] = $this->keamanan->perangkat();
			$data['fasilitas'] = $this->keamanan->perangkat_fasilitas();
			$data['server'] = $this->keamanan->perangkat_server();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('perangkat/form/index', $data);
			$this->load->view('templates/footer', $data);
		}else if($opsi=='tambah'){
			$data = [
				'id_ijin_perangkat'=>$this->input->post('id_ijin_perangkat'),
				'id_perangkat_jenis'=>$this->input->post('id_perangkat_jenis'),
				'nama'=>$this->input->post('nama'),
				'identitas'=>$this->input->post('identitas'),
				'jenis_identitas'=>$this->input->post('jenis_identitas'),
				'instansi'=>$this->input->post('instansi'),
				'alamat'=>$this->input->post('alamat'),
				'no_badge'=>'--',
				'tujuan'=>$this->input->post('tujuan'),
				'status_ijin'=>'Tunda',
				'updated'=>time()
			];
			$this->db->insert('perangkat', $data);
			$this->session->set_flashdata('info', '<div class="alert alert-success shadow-sm alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-info-circle"></i> Ijin Keamanan Perangkat telah ditambahkan!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('perangkat/form');
		}else if($opsi=='ubah'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger shadow-sm alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak Ada Ijin yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('perangkat/form');
			}else{
				$this->form_validation->set_rules('id_perangkat_jenis', 'Jenis Perijinan', 'required',[
					'required' => 'Jenis Perijinan Harus Diisi!'
				]);
				$this->form_validation->set_rules('nama', 'Nama', 'required',[
					'required' => 'Nama Harus Diisi!'
				]);
				$this->form_validation->set_rules('identitas', 'No. Identitas', 'required',[
					'required' => 'No. Identitas Harus Diisi!'
				]);
				$this->form_validation->set_rules('jenis_identitas', 'Jenis Identitas', 'required',[
					'required' => 'Jenis Identitas Harus Diisi!'
				]);
				$this->form_validation->set_rules('instansi', 'Instansi', 'required',[
					'required' => 'Instansi Harus Diisi!'
				]);
				$this->form_validation->set_rules('alamat', 'Alamat', 'required',[
					'required' => 'Alamat Harus Diisi!'
				]);
				$this->form_validation->set_rules('tujuan', 'Tujuan Perijinan', 'required',[
					'required' => 'Tujuan Perijinan Harus Diisi!'
				]);

				if ($this->form_validation->run() == FALSE){
					$data['judul'] = "Form Keamanan Perangkat";
					$data['perangkat_jenis'] = $this->keamanan->perangkat_jenis();
					$data['perangkat'] = $this->keamanan->perangkat($id);
					$this->load->view('templates/header', $data);
					$this->load->view('templates/sidebar', $data);
					$this->load->view('templates/topbar', $data);
					$this->load->view('perangkat/form/ubah', $data);
					$this->load->view('templates/footer', $data);
				}else{
					$data = [
						'id_perangkat_jenis'=> $this->input->post('id_perangkat_jenis'),
						'nama'=> $this->input->post('nama'),
						'identitas'=> $this->input->post('identitas'),
						'jenis_identitas'=> $this->input->post('jenis_identitas'),
						'instansi'=> $this->input->post('instansi'),
						'alamat'=> $this->input->post('alamat'),
						'tujuan'=> $this->input->post('tujuan'),
						'updated'=> time()
					];
					$this->db->set($data);
					$this->db->where('id_ijin_perangkat', $id);
					$this->db->update('perangkat');
					$this->session->set_flashdata('info', '<div class="alert alert-success shadow-sm alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info-circle"></i> Permohonan Ijin Penggunaan Perangkat telah diperbarui!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('perangkat/form');
				}
			}
		}else if($opsi=='persetujuan'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger shadow-sm alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak Ada Ijin yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('perangkat/form');
			}else{
				$id_perangkat_detail = 'IPD'.time();
				$status_ijin = $this->input->post('status_ijin');
				$no_badge = $this->input->post('no_badge');
				$data_status = [
					'no_badge'=>$no_badge,
					'status_ijin'=>$status_ijin
				];

				$data_detail = [
					'id_perangkat_detail'=>$id_perangkat_detail,
					'id_ijin_perangkat'=>$id
				];

				$this->db->set($data_status);
				$this->db->where('id_ijin_perangkat', $id);
				$this->db->update('perangkat');

				if($status_ijin=="Setuju"){
					$this->db->insert('perangkat_detail', $data_detail);
				}

				$this->session->set_flashdata('info', '<div class="alert alert-success shadow-sm alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Ijin Penggunaan Perangkat diperbarui!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('perangkat/form');
			}
		}else if($opsi=='detail'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger shadow-sm alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak Ada Ijin yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('perangkat/form');
			}else{
				$this->form_validation->set_rules('tanggal_pelaksanaan', 'Tanggal Pelaksanaan', 'required',[
					'required' => 'Tanggal Pelaksanaan Harus Diisi!'
				]);
				$this->form_validation->set_rules('jam_masuk', 'Jam Masuk', 'required',[
					'required' => 'Jam Masuk Harus Diisi!'
				]);
				$this->form_validation->set_rules('jam_keluar', 'Jam Keluar', 'required',[
					'required' => 'Jam Keluar Harus Diisi!'
				]);
				$this->form_validation->set_rules('jenis_fasilitas', 'Jenis Fasilitas', 'required',[
					'required' => 'Jenis Fasilitas Harus Diisi!'
				]);
				$this->form_validation->set_rules('seri_fasilitas', 'No. Seri Fasilitas', 'required',[
					'required' => 'No. Seri Fasilitas Harus Diisi!'
				]);

				if ($this->form_validation->run() == FALSE){
					$data['judul'] = "Form Keamanan Perangkat";
					$data['perangkat_jenis'] = $this->keamanan->perangkat_jenis();
					$data['perangkat'] = $this->keamanan->perangkat($id);
					$data['perangkat_detail'] = $this->keamanan->perangkat_detail($id);
					$this->load->view('templates/header', $data);
					$this->load->view('templates/sidebar', $data);
					$this->load->view('templates/topbar', $data);
					$this->load->view('perangkat/form/detail', $data);
					$this->load->view('templates/footer', $data);
				}else{
					$data = [
						'tanggal_pelaksanaan'=> $this->input->post('tanggal_pelaksanaan'),
						'jam_masuk'=> $this->input->post('jam_masuk'),
						'jam_keluar'=> $this->input->post('jam_keluar'),
						'jenis_fasilitas'=> $this->input->post('jenis_fasilitas'),
						'seri_fasilitas'=> $this->input->post('seri_fasilitas')
					];
					$this->db->set($data);
					$this->db->where('id_ijin_perangkat', $id);
					$this->db->update('perangkat_detail');
					$this->session->set_flashdata('info', '<div class="alert alert-success shadow-sm alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info-circle"></i> Detail Ijin Penggunaan Perangkat telah disimpan!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('perangkat/form/detail/'.$id);
				}
			}
		}else if($opsi=='hapus'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger shadow-sm alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak Ada Ijin yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('perangkat/form');
			}else{
				$this->db->where('id_ijin_perangkat', $id);
				$this->db->delete('perangkat');

				$this->db->delete('perangkat_detail', ['id_ijin_perangkat'=>$id]);
				$this->session->set_flashdata('info', '<div class="alert alert-success shadow-sm alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Ijin Penggunaan Perangkat telah dihapus!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('perangkat/form');
			}
		}else if($opsi=='cetak'){
			$data['judul'] = "Form Keamanan Perangkat";
			$data['perangkat_jenis'] = $this->keamanan->perangkat_jenis();
			$data['perangkat'] = $this->keamanan->perangkat();
			$data['fasilitas'] = $this->keamanan->perangkat_fasilitas();
			$data['server'] = $this->keamanan->perangkat_server();
			$this->load->view('perangkat/form/cetak', $data);
		}
	}
}
