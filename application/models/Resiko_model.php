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

    // RESIKO SDM
    function resiko_sdm($id=null){
        if($id==null){
            $this->db->join('resiko_kerahasiaan', 'resiko_kerahasiaan.id_rahasia = resiko_sdm.kerahasiaan');
            $this->db->join('resiko_integritas', 'resiko_integritas.id_integritas = resiko_sdm.integritas');
            $this->db->join('resiko_ketersediaan', 'resiko_ketersediaan.id_sedia = resiko_sdm.ketersediaan');
            $this->db->order_by('resiko_sdm.id', 'ASC');
            return $this->db->get('resiko_sdm')->result_array();
        } else {
            return $this->db->get_where('resiko_sdm', ['id'=>$id])->row_array();
        }
    }

    // KLASIFIKASI INFORMASI
    function klasifikasi_informasi(){
        return $this->db->get('klasifikasi_informasi')->result_array();
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
}