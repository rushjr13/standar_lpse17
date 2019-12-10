<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gangguan_model extends CI_Model {

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

    // GANGGUAN TIPE
    function gangguan_tipe($id=null){
        if($id==null){
            return $this->db->get('gangguan_tipe')->result_array();
        } else {
            return $this->db->get_where('gangguan_tipe', ['id_tipe'=>$id])->row_array();
        }
    }

    // GANGGUAN KATEGORI
    function gangguan_kategori($id=null){
        if($id==null){
            return $this->db->get('gangguan_kategori')->result_array();
        } else {
            return $this->db->get_where('gangguan_kategori', ['id_kategori'=>$id])->row_array();
        }
    }

    // GANGGUAN USER
    function gangguan_user($id=null){
        if($id==null){
            return $this->db->get('gangguan_user')->result_array();
        } else {
            return $this->db->get_where('gangguan_user', ['id_user'=>$id])->row_array();
        }
    }

    // GANGGUAN JENIS
    function gangguan_jenis($id=null){
        if($id==null){
            return $this->db->get('gangguan_jenis')->result_array();
        } else {
            return $this->db->get_where('gangguan_jenis', ['id_jenis'=>$id])->row_array();
        }
    }

    // GANGGUAN URGENSI
    function gangguan_urgensi($id=null){
        if($id==null){
            return $this->db->get('gangguan_urgensi')->result_array();
        } else {
            return $this->db->get_where('gangguan_urgensi', ['id_urgensi'=>$id])->row_array();
        }
    }

    // GANGGUAN DAMPAK
    function gangguan_dampak($id=null){
        if($id==null){
            return $this->db->get('gangguan_dampak')->result_array();
        } else {
            return $this->db->get_where('gangguan_dampak', ['id_dampak'=>$id])->row_array();
        }
    }

    // GANGGUAN PRIORITAS
    function gangguan_prioritas($id=null){
        if($id==null){
            return $this->db->get('gangguan_prioritas')->result_array();
        } else {
            return $this->db->get_where('gangguan_prioritas', ['id_prioritas'=>$id])->row_array();
        }
    }

    // SEMUA GANGGUAN
    function gangguan($id=null){
        if($id==null){
            $this->db->join('gangguan_tipe', 'gangguan_tipe.id_tipe = gangguan.id_tipe');
            $this->db->join('gangguan_kategori', 'gangguan_kategori.id_kategori = gangguan.id_kategori');
            $this->db->join('gangguan_user', 'gangguan_user.id_user = gangguan.id_user');
            $this->db->join('gangguan_jenis', 'gangguan_jenis.id_jenis = gangguan.id_jenis');
            $this->db->join('gangguan_urgensi', 'gangguan_urgensi.id_urgensi = gangguan.id_urgensi');
            $this->db->join('gangguan_dampak', 'gangguan_dampak.id_dampak = gangguan.id_dampak');
            $this->db->join('gangguan_prioritas', 'gangguan_prioritas.id_prioritas = gangguan.id_prioritas');
            $this->db->order_by('gangguan.id_gangguan', 'DESC');
            return $this->db->get('gangguan')->result_array();
        } else {
            $this->db->join('gangguan_tipe', 'gangguan_tipe.id_tipe = gangguan.id_tipe');
            $this->db->join('gangguan_kategori', 'gangguan_kategori.id_kategori = gangguan.id_kategori');
            $this->db->join('gangguan_user', 'gangguan_user.id_user = gangguan.id_user');
            $this->db->join('gangguan_jenis', 'gangguan_jenis.id_jenis = gangguan.id_jenis');
            $this->db->join('gangguan_urgensi', 'gangguan_urgensi.id_urgensi = gangguan.id_urgensi');
            $this->db->join('gangguan_dampak', 'gangguan_dampak.id_dampak = gangguan.id_dampak');
            $this->db->join('gangguan_prioritas', 'gangguan_prioritas.id_prioritas = gangguan.id_prioritas');
            return $this->db->get_where('gangguan', ['id_gangguan'=>$id])->row_array();
        }
    }

    // GANGGUAN TERCATAT
    function gangguan_tercatat($id=null){
        if($id==null){
            $this->db->join('gangguan_tipe', 'gangguan_tipe.id_tipe = gangguan.id_tipe');
            $this->db->join('gangguan_kategori', 'gangguan_kategori.id_kategori = gangguan.id_kategori');
            $this->db->join('gangguan_user', 'gangguan_user.id_user = gangguan.id_user');
            $this->db->join('gangguan_jenis', 'gangguan_jenis.id_jenis = gangguan.id_jenis');
            $this->db->join('gangguan_urgensi', 'gangguan_urgensi.id_urgensi = gangguan.id_urgensi');
            $this->db->join('gangguan_dampak', 'gangguan_dampak.id_dampak = gangguan.id_dampak');
            $this->db->join('gangguan_prioritas', 'gangguan_prioritas.id_prioritas = gangguan.id_prioritas');
            $this->db->order_by('gangguan.id_gangguan', 'ASC');
            $this->db->where('gangguan.status_gangguan', 'Tercatat');
            return $this->db->get('gangguan')->result_array();
        } else {
            return $this->db->get_where('gangguan', ['id_gangguan'=>$id])->row_array();
        }
    }

    // GANGGUAN PENANGANAN
    function gangguan_penanganan($id=null){
        if($id==null){
            $this->db->join('gangguan_tipe', 'gangguan_tipe.id_tipe = gangguan.id_tipe');
            $this->db->join('gangguan_kategori', 'gangguan_kategori.id_kategori = gangguan.id_kategori');
            $this->db->join('gangguan_user', 'gangguan_user.id_user = gangguan.id_user');
            $this->db->join('gangguan_jenis', 'gangguan_jenis.id_jenis = gangguan.id_jenis');
            $this->db->join('gangguan_urgensi', 'gangguan_urgensi.id_urgensi = gangguan.id_urgensi');
            $this->db->join('gangguan_dampak', 'gangguan_dampak.id_dampak = gangguan.id_dampak');
            $this->db->join('gangguan_prioritas', 'gangguan_prioritas.id_prioritas = gangguan.id_prioritas');
            $this->db->order_by('gangguan.id_gangguan', 'ASC');
            $this->db->where('gangguan.status_gangguan', 'Penanganan');
            return $this->db->get('gangguan')->result_array();
        } else {
            return $this->db->get_where('gangguan', ['id_gangguan'=>$id])->row_array();
        }
    }

    // GANGGUAN PENYELESAIAN
    function gangguan_penyelesaian($id=null){
        if($id==null){
            $this->db->join('gangguan_tipe', 'gangguan_tipe.id_tipe = gangguan.id_tipe');
            $this->db->join('gangguan_kategori', 'gangguan_kategori.id_kategori = gangguan.id_kategori');
            $this->db->join('gangguan_user', 'gangguan_user.id_user = gangguan.id_user');
            $this->db->join('gangguan_jenis', 'gangguan_jenis.id_jenis = gangguan.id_jenis');
            $this->db->join('gangguan_urgensi', 'gangguan_urgensi.id_urgensi = gangguan.id_urgensi');
            $this->db->join('gangguan_dampak', 'gangguan_dampak.id_dampak = gangguan.id_dampak');
            $this->db->join('gangguan_prioritas', 'gangguan_prioritas.id_prioritas = gangguan.id_prioritas');
            $this->db->order_by('gangguan.id_gangguan', 'ASC');
            $this->db->where('gangguan.status_gangguan', 'Penyelesaian');
            return $this->db->get('gangguan')->result_array();
        } else {
            return $this->db->get_where('gangguan', ['id_gangguan'=>$id])->row_array();
        }
    }
}