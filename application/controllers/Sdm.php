<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sdm extends CI_Controller {

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
		$data['judul'] = "Regulasi SDM";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('sdm/index', $data);
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
		$data['judul'] = "SK Koordinator SDM";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('sdm/sk/index', $data);
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
			$data['judul'] = "Pencatatan SDM";
			$data['sdm'] = $this->sdm->sdm();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('sdm/form/index', $data);
			$this->load->view('templates/footer', $data);
		}else if($opsi=='tambah'){
			$data=[
				'id_sdm'=>'SDM'.time(),
				'nama'=>$this->input->post('nama'),
				'jabatan'=>$this->input->post('jabatan'),
				'kompetensi_kebutuhan'=>$this->input->post('kompetensi_kebutuhan'),
				'tingkatan_kebutuhan'=>$this->input->post('tingkatan_kebutuhan'),
				'kompetensi_saat_ini'=>$this->input->post('kompetensi_saat_ini'),
				'tingkatan_saat_ini'=>$this->input->post('tingkatan_saat_ini'),
				'kebutuhan_pelatihan'=>$this->input->post('kebutuhan_pelatihan'),
			];
			$this->db->insert('sdm', $data);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-info-circle"></i> Pencatatan SDM Telah ditambahkan!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('sdm/form');
		}else if($opsi=='ubah'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak Ada SDM yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('sdm/form');
			}else{
				$data=[
					'nama'=>$this->input->post('nama'),
					'jabatan'=>$this->input->post('jabatan'),
					'kompetensi_kebutuhan'=>$this->input->post('kompetensi_kebutuhan'),
					'tingkatan_kebutuhan'=>$this->input->post('tingkatan_kebutuhan'),
					'kompetensi_saat_ini'=>$this->input->post('kompetensi_saat_ini'),
					'tingkatan_saat_ini'=>$this->input->post('tingkatan_saat_ini'),
					'kebutuhan_pelatihan'=>$this->input->post('kebutuhan_pelatihan'),
				];
				$this->db->set($data);
				$this->db->where('id_sdm', $id);
				$this->db->update('sdm');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Pencatatan SDM Telah diperbarui!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('sdm/form');
			}
		}else if($opsi=='hapus'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak Ada SDM yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('sdm/form');
			}else{
				$this->db->delete('sdm', ['id_sdm'=>$id]);
				$this->db->delete('sdm_dokumen', ['id_sdm'=>$id]);
				$this->db->delete('sdm_pelatihan', ['id_sdm'=>$id]);
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Pencatatan SDM telah dihapus!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('sdm/form');
			}
		}else if($opsi=='detail'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak Ada SDM yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('sdm/form');
			}else{
				$data['judul'] = "Pencatatan SDM";
				$data['sdm'] = $this->sdm->sdm($id);
				$data['sdm_pelatihan'] = $this->sdm->sdm_pelatihan($id);
				$data['sdm_dokumen'] = $this->sdm->sdm_dokumen($id);
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('sdm/form/detail', $data);
				$this->load->view('templates/footer', $data);
			}
		}else if($opsi=='tambahpelatihan'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak Ada SDM yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('sdm/form');
			}else{
				$data=[
					'id_pelatihan'=>'SL'.time(),
					'id_sdm'=>$id,
					'pelatihan'=>$this->input->post('pelatihan'),
					'tingkatan'=>$this->input->post('tingkatan'),
					'waktu'=>$this->input->post('waktu')
				];
				$this->db->insert('sdm_pelatihan', $data);
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Pelatihan SDM Telah ditambahkan!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('sdm/form/detail/'.$id);
			}
		}else if($opsi=='ubahpelatihan'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak Ada SDM yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('sdm/form');
			}else{
				$id_sdm=$this->input->post('idsdm');
				$data=[
					'pelatihan'=>$this->input->post('pelatihan'),
					'tingkatan'=>$this->input->post('tingkatan'),
					'waktu'=>$this->input->post('waktu')
				];
				$this->db->set($data);
				$this->db->where('id_pelatihan', $id);
				$this->db->update('sdm_pelatihan');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Pelatihan SDM Telah diperbarui!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('sdm/form/detail/'.$id_sdm);
			}
		}else if($opsi=='hapuspelatihan'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak Ada SDM yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('sdm/form');
			}else{
				$id_sdm=$this->input->post('idsdm');
				$this->db->where('id_pelatihan', $id);
				$this->db->delete('sdm_pelatihan');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Pelatihan SDM Telah dihapus!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('sdm/form/detail/'.$id_sdm);
			}
		}else if($opsi=='tambahdokumen'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak Ada SDM yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('sdm/form');
			}else{
				$judul_dokumen=$this->input->post('judul_dokumen');
				// Cek file yang diupload
				$file_upload = $_FILES['file_dokumen']['name'];

				if($file_upload){
					$config['allowed_types']	= 'pdf';
					$config['upload_path']		= './uploads/pdf/sdm/';
					$this->load->library('upload', $config);
					if($this->upload->do_upload('file')){
						$file = $this->upload->data('file_name');
						$data = [
							'id_dokumen'=>'SDOK'.time(),
							'id_sdm'=>$id,
							'judul_dokumen'=>$judul_dokumen,
							'file_dokumen'=>$file
						];
					} else {
						echo $this->upload->display_errors();
					}
				}
				$this->db->insert('sdm_dokumen', $data);
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Dokumen SDM Telah ditambahkan!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('sdm/form/detail/'.$id);
			}
		}
	}
}
