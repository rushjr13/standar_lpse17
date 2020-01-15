<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan_model extends CI_Model {

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

    // SEMUA LAYANAN
    function layanan($id=null){
        if($id==null){
            $this->db->order_by('layanan.id_layanan', 'ASC');
            return $this->db->get('layanan')->result_array();
        } else {
            return $this->db->get_where('layanan', ['id_layanan'=>$id])->row_array();
        }
    }
}