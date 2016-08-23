<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_diagnosa extends CI_Model{
    
    function get_gejala(){
        $this->db->order_by('nama_gejala','ASC');
        $dt=$this->db->get('tbl_gejala');
        return $dt->result();
    }
    
    function get_relasi(array $id_gejala){
        $this->db->select('id_penyakit');
        $this->db->where_in('id_gejala',$id_gejala);
        $this->db->group_by('id_penyakit');
        $dt=$this->db->get('tbl_relasi');
        return $dt->result();
    }
    
    function get_penyakit($id_penyakit){
        $this->db->where('id_penyakit',$id_penyakit);
        $dt=$this->db->get('tbl_penyakit');
        return $dt->row();
    }
    
    function get_relasi_b(array $gejala,$id_penyakit){
        $this->db->select('id_penyakit, mb, md, id_gejala');
        $this->db->where_in('id_gejala',$gejala);
        $this->db->where('id_penyakit',$id_penyakit);
        $this->db->group_by('id_penyakit');
        $dt=$this->db->get('tbl_relasi');
        return $dt;
    }
    
    //function get
}