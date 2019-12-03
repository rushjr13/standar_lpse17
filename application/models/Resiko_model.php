<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resiko_model extends CI_Model {

    // ISTILAH
    function istilah(){
        $this->db->where('id', 'istilah');
        return $this->db->get('resiko_sop')->row_array();
    }

    // SOP RESIKO
    function sop_resiko($id=null){
        if($id==null){
            $this->db->order_by('id', 'DESC');
            $this->db->where('id !=', 'istilah');
            return $this->db->get('resiko_sop')->result_array();
        } else {
            return $this->db->get_where('resiko_sop', ['id'=>$id])->row_array();
        }
    }

    // RESIKO SK
    function resiko_sk($id=null){
        if($id==null){
            $this->db->order_by('tanggal', 'DESC');
            return $this->db->get('resiko_sk')->result_array();
        } else {
            return $this->db->get_where('resiko_sk', ['id'=>$id])->row_array();
        }
    }

    // RESIKO DAMPAK
    function resiko_dampak(){
        $this->db->order_by('nilai', 'DESC');
        return $this->db->get('resiko_dampak')->result_array();
    }

    // RESIKO PENGANCAM
    function resiko_pengancam(){
        $this->db->order_by('nilai', 'DESC');
        return $this->db->get('resiko_pengancam')->result_array();
    }

    // RESIKO KERENTANAN ORANG
    function resiko_orang(){
        $this->db->order_by('id', 'ASC');
        $this->db->where('id_rentan_kategori', '1');
        return $this->db->get('resiko_rentan')->result_array();
    }

    // RESIKO KERENTANAN ADMINISTRATIF
    function resiko_administratif(){
        $this->db->order_by('id', 'ASC');
        $this->db->where('id_rentan_kategori', '2');
        return $this->db->get('resiko_rentan')->result_array();
    }

    // RESIKO KERENTANAN LOGIS
    function resiko_logis(){
        $this->db->order_by('id', 'ASC');
        $this->db->where('id_rentan_kategori', '3');
        return $this->db->get('resiko_rentan')->result_array();
    }

    // RESIKO KERENTANAN FISIK
    function resiko_fisik(){
        $this->db->order_by('id', 'ASC');
        $this->db->where('id_rentan_kategori', '4');
        return $this->db->get('resiko_rentan')->result_array();
    }

    // RESIKO KERENTANAN NILAI
    function resiko_rentan_nilai(){
        $this->db->order_by('nilai', 'ASC');
        return $this->db->get('resiko_rentan_nilai')->result_array();
    }

    // RESIKO PAPARAN
    function resiko_paparan(){
        $this->db->order_by('nilai', 'ASC');
        return $this->db->get('resiko_paparan')->result_array();
    }

    // KLASIFIKASI INFORMASI
    function klasifikasi_informasi(){
        return $this->db->get('klasifikasi_informasi')->result_array();
    }

    // KLASIFIKASI SDM
    function klasifikasi_sdm(){
        return $this->db->get('klasifikasi_sdm')->result_array();
    }

    // KLASIFIKASI ASET SDM
    function klasifikasi_aset_fisik(){
        return $this->db->get('klasifikasi_aset_fisik')->result_array();
    }

    // KLASIFIKASI SOFTWARE
    function klasifikasi_software(){
        return $this->db->get('klasifikasi_software')->result_array();
    }

    // KLASIFIKASI LAYANAN
    function klasifikasi_layanan(){
        return $this->db->get('klasifikasi_layanan')->result_array();
    }

    // KLASIFIKASI INTANGIBLE
    function klasifikasi_intangible(){
        return $this->db->get('klasifikasi_intangible')->result_array();
    }

    // RESIKO DAMPAK
    function dampak(){
        return $this->db->get('resiko_dampak')->result_array();
    }

    // RESIKO PENGANCAM
    function pengancam(){
        return $this->db->get('resiko_pengancam')->result_array();
    }

    // RESIKO INFORMASI
    function resiko_informasi($id=null){
        if($id==null){
            $this->db->join('klasifikasi_informasi', 'klasifikasi_informasi.id_ki = resiko_informasi.id_ki');
            $this->db->join('resiko_dampak', 'resiko_dampak.nilai = resiko_informasi.dampak');
            $this->db->join('resiko_pengancam', 'resiko_pengancam.nilai = resiko_informasi.pengancam');
            $this->db->join('resiko_rentan_nilai', 'resiko_rentan_nilai.nilai = resiko_informasi.kerentanan');
            $this->db->join('resiko_paparan', 'resiko_paparan.nilai = resiko_informasi.paparan');
            $this->db->order_by('resiko_informasi.id', 'ASC');
            return $this->db->get('resiko_informasi')->result_array();
        } else {
            return $this->db->get_where('resiko_informasi', ['id'=>$id])->row_array();
        }
    }

    // RESIKO SDM
    function resiko_sdm($id=null){
        if($id==null){
            $this->db->join('klasifikasi_sdm', 'klasifikasi_sdm.id_ksdm = resiko_sdm.id_ksdm');
            $this->db->join('resiko_dampak', 'resiko_dampak.nilai = resiko_sdm.dampak');
            $this->db->join('resiko_pengancam', 'resiko_pengancam.nilai = resiko_sdm.pengancam');
            $this->db->join('resiko_rentan_nilai', 'resiko_rentan_nilai.nilai = resiko_sdm.kerentanan');
            $this->db->join('resiko_paparan', 'resiko_paparan.nilai = resiko_sdm.paparan');
            $this->db->order_by('resiko_sdm.id', 'ASC');
            return $this->db->get('resiko_sdm')->result_array();
        } else {
            return $this->db->get_where('resiko_sdm', ['id'=>$id])->row_array();
        }
    }

    // RESIKO FISIK
    function resiko_fisikform($id=null){
        if($id==null){
            $this->db->join('klasifikasi_aset_fisik', 'klasifikasi_aset_fisik.id = resiko_fisik.id_kfisik');
            $this->db->join('resiko_dampak', 'resiko_dampak.nilai = resiko_fisik.dampak');
            $this->db->join('resiko_pengancam', 'resiko_pengancam.nilai = resiko_fisik.pengancam');
            $this->db->join('resiko_rentan_nilai', 'resiko_rentan_nilai.nilai = resiko_fisik.kerentanan');
            $this->db->join('resiko_paparan', 'resiko_paparan.nilai = resiko_fisik.paparan');
            $this->db->order_by('resiko_fisik.id_rfisik', 'ASC');
            return $this->db->get('resiko_fisik')->result_array();
        } else {
            return $this->db->get_where('resiko_fisik', ['id_rfisik'=>$id])->row_array();
        }
    }

    // RESIKO FISIK
    function resiko_software($id=null){
        if($id==null){
            $this->db->join('klasifikasi_software', 'klasifikasi_software.id_ksw = resiko_software.id_ksoftware');
            $this->db->join('resiko_dampak', 'resiko_dampak.nilai = resiko_software.dampak');
            $this->db->join('resiko_pengancam', 'resiko_pengancam.nilai = resiko_software.pengancam');
            $this->db->join('resiko_rentan_nilai', 'resiko_rentan_nilai.nilai = resiko_software.kerentanan');
            $this->db->join('resiko_paparan', 'resiko_paparan.nilai = resiko_software.paparan');
            $this->db->order_by('resiko_software.id', 'ASC');
            return $this->db->get('resiko_software')->result_array();
        } else {
            return $this->db->get_where('resiko_software', ['id'=>$id])->row_array();
        }
    }

    // RESIKO LAYANAN
    function resiko_layanan($id=null){
        if($id==null){
            $this->db->join('klasifikasi_layanan', 'klasifikasi_layanan.id_kl = resiko_layanan.id_kl');
            $this->db->join('resiko_dampak', 'resiko_dampak.nilai = resiko_layanan.dampak');
            $this->db->join('resiko_pengancam', 'resiko_pengancam.nilai = resiko_layanan.pengancam');
            $this->db->join('resiko_rentan_nilai', 'resiko_rentan_nilai.nilai = resiko_layanan.kerentanan');
            $this->db->join('resiko_paparan', 'resiko_paparan.nilai = resiko_layanan.paparan');
            $this->db->order_by('resiko_layanan.id', 'ASC');
            return $this->db->get('resiko_layanan')->result_array();
        } else {
            return $this->db->get_where('resiko_layanan', ['id'=>$id])->row_array();
        }
    }

    // RESIKO INTANGIBLE
    function resiko_intangible($id=null){
        if($id==null){
            $this->db->join('klasifikasi_intangible', 'klasifikasi_intangible.id_in = resiko_intangible.id_in');
            $this->db->join('resiko_dampak', 'resiko_dampak.nilai = resiko_intangible.dampak');
            $this->db->join('resiko_pengancam', 'resiko_pengancam.nilai = resiko_intangible.pengancam');
            $this->db->join('resiko_rentan_nilai', 'resiko_rentan_nilai.nilai = resiko_intangible.kerentanan');
            $this->db->join('resiko_paparan', 'resiko_paparan.nilai = resiko_intangible.paparan');
            $this->db->order_by('resiko_intangible.id', 'ASC');
            return $this->db->get('resiko_intangible')->result_array();
        } else {
            return $this->db->get_where('resiko_intangible', ['id'=>$id])->row_array();
        }
    }
}