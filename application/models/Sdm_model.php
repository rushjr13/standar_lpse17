<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sdm_model extends CI_Model {

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

    // SDM
    function sdm($id=null){
        if($id==null){
            return $this->db->get('sdm')->result_array();
        } else {
            return $this->db->get_where('sdm', ['id_sdm'=>$id])->row_array();
        }
    }

    // PELATIHAN SDM
    function sdm_pelatihan($id){
        $this->db->join('sdm', 'sdm.id_sdm = sdm_pelatihan.id_sdm');
        $this->db->where('sdm_pelatihan.id_sdm', $id);
        return $this->db->get('sdm_pelatihan')->result_array();
    }

    // DOKUMEN SDM
    function sdm_dokumen($id){
        $this->db->join('sdm', 'sdm.id_sdm = sdm_dokumen.id_sdm');
        $this->db->where('sdm_dokumen.id_sdm', $id);
        return $this->db->get('sdm_dokumen')->result_array();
    }

}