<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perubahan_model extends CI_Model {

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

    // PERUBAHAN
    function perubahan($id=null){
        if($id==null){
            return $this->db->get('perubahan')->result_array();
        } else {
            return $this->db->get_where('perubahan', ['id_perubahan'=>$id])->row_array();
        }
    }
}