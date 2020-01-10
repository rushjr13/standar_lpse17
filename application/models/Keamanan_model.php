<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keamanan_model extends CI_Model {

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

    // JENIS KEAMANAN
    function perangkat_jenis($id=null){
        if($id==null){
            return $this->db->get('perangkat_jenis')->result_array();
        } else {
            return $this->db->get_where('perangkat_jenis', ['id_perangkat_jenis'=>$id])->row_array();
        }
    }

    // SEMUA PERANGKAT
    function perangkat($id=null){
        if($id==null){
            $this->db->join('perangkat_jenis', 'perangkat_jenis.id_perangkat_jenis = perangkat.id_perangkat_jenis');
            $this->db->order_by('perangkat.id_ijin_perangkat', 'ASC');
            return $this->db->get('perangkat')->result_array();
        } else {
            $this->db->join('perangkat_jenis', 'perangkat_jenis.id_perangkat_jenis = perangkat.id_perangkat_jenis');
            return $this->db->get_where('perangkat', ['id_ijin_perangkat'=>$id])->row_array();
        }
    }

    // SEMUA PERANGKAT DETAIL
    function perangkat_detail($id){
        return $this->db->get_where('perangkat_detail', ['id_ijin_perangkat'=>$id])->row_array();
    }

    // PENGGUNAAN FASILITAS
    function perangkat_fasilitas($id=null){
        if($id==null){
            $this->db->join('perangkat_jenis', 'perangkat_jenis.id_perangkat_jenis = perangkat.id_perangkat_jenis');
            $this->db->order_by('perangkat.id_ijin_perangkat', 'ASC');
            $this->db->where('perangkat.id_perangkat_jenis', 1);
            return $this->db->get('perangkat')->result_array();
        } else {
            $this->db->join('perangkat_jenis', 'perangkat_jenis.id_perangkat_jenis = perangkat.id_perangkat_jenis');
            return $this->db->get_where('perangkat', ['id_ijin_perangkat'=>$id])->row_array();
        }
    }

    // AKSES RUANG SERVER
    function perangkat_server($id=null){
        if($id==null){
            $this->db->join('perangkat_jenis', 'perangkat_jenis.id_perangkat_jenis = perangkat.id_perangkat_jenis');
            $this->db->order_by('perangkat.id_ijin_perangkat', 'ASC');
            $this->db->where('perangkat.id_perangkat_jenis', 2);
            return $this->db->get('perangkat')->result_array();
        } else {
            $this->db->join('perangkat_jenis', 'perangkat_jenis.id_perangkat_jenis = perangkat.id_perangkat_jenis');
            return $this->db->get_where('perangkat', ['id_ijin_perangkat'=>$id])->row_array();
        }
    }
}