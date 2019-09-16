<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

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
		$data['menu_akses'] = $this->admin->menu_akses($user);

		// KHUSUS
		$this->form_validation->set_rules('nama_web', 'Nama Aplikasi / Website', 'required',[
			'required' => 'Nama Aplikasi / Website Harus Diisi!'
		]);
		$this->form_validation->set_rules('alias', 'Inisial Aplikasi / Website', 'required',[
			'required' => 'Inisial Aplikasi / Website Harus Diisi!'
		]);
		$this->form_validation->set_rules('info', 'Informasi Aplikasi / Website', 'required',[
			'required' => 'Informasi Aplikasi / Website Harus Diisi!'
		]);
		$this->form_validation->set_rules('email', 'Alamat Email Pengembang', 'required|valid_email',[
			'required' => 'Alamat Email Pengembang Harus Diisi!',
			'valid_email' => 'Alamat Email Salah!'
		]);
		$this->form_validation->set_rules('telpon', 'No. Telepon Pengembang', 'required',[
			'required' => 'No. Telepon Pengembang Harus Diisi!'
		]);
		$this->form_validation->set_rules('jam_kerja', 'Jam Pelayanan Pengembang', 'required',[
			'required' => 'Jam Pelayanan Pengembang Harus Diisi!'
		]);
		$this->form_validation->set_rules('alamat', 'Alamat Lengkap Pengembang', 'required',[
			'required' => 'Alamat Lengkap Pengembang Harus Diisi!'
		]);
		$this->form_validation->set_rules('map', 'URL/Link Map Google Lokasi Pengembang', 'required',[
			'required' => 'URL/Link Map Google Lokasi Pengembang Harus Diisi!'
		]);

		if ($this->form_validation->run() == FALSE){
			$data['judul'] = "Pengaturan";
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('pengaturan', $data);
			$this->load->view('templates/footer', $data);
		}else{
			$nama_web = htmlspecialchars($this->input->post('nama_web'));
			$alias = htmlspecialchars($this->input->post('alias'));
			$url = htmlspecialchars($this->input->post('url'));
			$alamat = $this->input->post('alamat');
			$telpon = htmlspecialchars($this->input->post('telpon'));
			$email = htmlspecialchars($this->input->post('email'));
			$jam_kerja = htmlspecialchars($this->input->post('jam_kerja'));
			$facebook = htmlspecialchars($this->input->post('facebook'));
			$instagram = htmlspecialchars($this->input->post('instagram'));
			$twitter = htmlspecialchars($this->input->post('twitter'));
			$map = htmlspecialchars($this->input->post('map'));
			$info = $this->input->post('info');

			$data = [
				'nama_web'=>$nama_web,
				'alias'=>$alias,
				'url'=>$url,
				'alamat'=>$alamat,
				'telpon'=>$telpon,
				'email'=>$email,
				'jam_kerja'=>$jam_kerja,
				'facebook'=>$facebook,
				'instagram'=>$instagram,
				'twitter'=>$twitter,
				'map'=>$map,
				'info'=>$info,
			];

			$this->db->set($data);
			$this->db->where('id', 'atur');
			$this->db->update('pengaturan');
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-info-circle"></i> Pengaturan telah diperbarui!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('pengaturan');
		}
	}
}
