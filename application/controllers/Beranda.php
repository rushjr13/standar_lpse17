<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function index(){
		date_default_timezone_set('Asia/Makassar');
		// UMUM
		$user = $this->session->userdata('user_masuk');
		$data['pengguna_masuk'] = $this->admin->pengguna($user);
		$data['pengaturan'] = $this->admin->pengaturan();
		$data['tgl_sekarang'] = $this->admin->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->admin->hari(date('l'));
		$data['menu'] = $this->admin->menu();
		$data['pengumuman'] = $this->admin->pengumuman5();

		// KHUSUS
		$data['judul'] = "Beranda";
		$data['regulasi_update'] = $this->admin->regulasi_update();
		foreach ($data['regulasi_update'] as $regup) {
			$data['tglregup'] = $regup['tgl_update'];
			$data['tglregupindo'] = $this->admin->tgl_indo2($regup['tgl_update']);
		}
		$data['regulasi_perka_update'] = $this->admin->regulasi_perka_update();
		foreach ($data['regulasi_perka_update'] as $regperkaup) {
			$data['tglregperkaup'] = $regperkaup['tgl_ubah'];
			$data['tglregperkaupindo'] = $this->admin->tgl_indo2($regperkaup['tgl_ubah']);
		}
		$data['organisasi_tujuan_update'] = $this->admin->organisasi_tujuan_update();
		foreach ($data['organisasi_tujuan_update'] as $ortu) {
			$data['tglortu'] = $ortu['tgl_update'];
			$data['tglortuindo'] = $this->admin->tgl_indo2($ortu['tgl_update']);
		}
		$data['organisasi_sk_update'] = $this->admin->organisasi_sk_update();
		foreach ($data['organisasi_sk_update'] as $osk) {
			$data['tglosk'] = $osk['tgl_update'];
			$data['tgloskindo'] = $this->admin->tgl_indo2($osk['tgl_update']);
		}
		$data['sop_aset_update'] = $this->admin->sop_aset_update();
		foreach ($data['sop_aset_update'] as $sopset) {
			$data['tglsopset'] = $sopset['tgl_update'];
			$data['tglsopsetindo'] = $this->admin->tgl_indo2($sopset['tgl_update']);
		}
		$data['aset_sk_update'] = $this->admin->aset_sk_update();
		foreach ($data['aset_sk_update'] as $skset) {
			$data['tglskset'] = $skset['tgl_update'];
			$data['tglsksetindo'] = $this->admin->tgl_indo2($skset['tgl_update']);
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('index', $data);
		$this->load->view('templates/footer', $data);
	}
}
