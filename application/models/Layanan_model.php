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

    function tambah_form($post)
    {
        $data = [
            'id_layanan'=>"LYN".time(),
            'no_surat'=>$post['no_surat'],
            'tgl_surat'=>$post['tgl_surat'],
            'asal_surat'=>$post['asal_surat'],
            'perihal_surat'=>$post['perihal_surat'],
            'dokumen_surat'=>$post['dokumen_surat'],
            'nama_pemohon'=>$post['nama_pemohon'],
            'instansi_pemohon'=>$post['instansi_pemohon'],
            'tujuan_pemohon'=>$post['tujuan_pemohon'],
            'user_akses'=>null,
            'hak_akses'=>null,
            'tgl_buka'=>date('Y-m-d', time()),
            'jam_buka'=>date('H:i', time()),
            'tgl_tutup'=>date('Y-m-d', time()),
            'jam_tutup'=>date('H:i', time()),
            'status_layanan'=>$post['status_layanan'],
            'tgl_update'=>time(),
        ];
        return $this->db->insert('layanan', $data);
    }
}