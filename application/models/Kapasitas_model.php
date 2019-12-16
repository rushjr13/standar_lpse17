<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kapasitas_model extends CI_Model {

    // ISTILAH
    // function istilah(){
    //     $this->db->where('id', 'istilah');
    //     return $this->db->get('gangguan_sop')->row_array();
    // }

    // SOP GANGGUAN
    // function sop_gangguan($id=null){
    //     if($id==null){
    //         $this->db->order_by('id', 'DESC');
    //         $this->db->where('id !=', 'istilah');
    //         return $this->db->get('gangguan_sop')->result_array();
    //     } else {
    //         return $this->db->get_where('gangguan_sop', ['id'=>$id])->row_array();
    //     }
    // }

    // KAPASITAS
    function kapasitas($id=null){
        if($id==null){
            $this->db->join('kapasitas_kategori', 'kapasitas_kategori.id_kk = kapasitas.id_kk');
            return $this->db->get('kapasitas')->result_array();
        } else {
            return $this->db->get_where('kapasitas', ['id_kapasitas'=>$id])->row_array();
        }
    }

    // LAPORAN KAPASITAS
    function kapasitas_laporan($id=null){
        if($id==null){
            return $this->db->get('kapasitas_laporan')->result_array();
        } else {
            return $this->db->get_where('kapasitas_laporan', ['id_kapasitas'=>$id])->row_array();
        }
    }

    // KATEGORI KAPASITAS
    function kapasitas_kategori($id=null){
        if($id==null){
            return $this->db->get('kapasitas_kategori')->result_array();
        } else {
            return $this->db->get_where('kapasitas_kategori', ['id_kk'=>$id])->row_array();
        }
    }
}