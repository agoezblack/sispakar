<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gejala extends CI_Model{
    
    private $tbl='tbl_gejala';
    private $pk='id_gejala';
    
    function get_penyakit(){
        $this->db->order_by('id_penyakit','DESC');
        $dt=$this->db->get('tbl_penyakit');
        return $dt->result();
    }
    
    function get_data(){
        //$this->db->join('tbl_penyakit','tbl_penyakit.id_penyakit=tbl_gejala.id_penyakit','LEFT');
        $this->db->order_by($this->pk,'DESC');
        $dt=$this->db->get($this->tbl);
        return $dt->result();
    }
    
    function get_row($pk){
        $this->db->where($this->pk,$pk);
        $dt=$this->db->get($this->tbl);
        return $dt->row();
    }
    
    function upd_row($pk,$dt){
        $this->db->where($this->pk,$pk);
        $this->db->update($this->tbl,$dt);
    }
    
    function del_row($pk){
        $this->db->where($this->pk,$pk);
        $this->db->delete($this->tbl);
    }
    
    function getID_relasi($penyakit,$gejala){
        $this->db->where('id_penyakit',$penyakit);
        $this->db->where($this->pk,$gejala);
        $dt=$this->db->get('tbl_relasi');
        return $dt->row();
    }
    function upd_relasi($pk,$dt){
        //$this->db->where('id_penyakit',$penyakit);
        $this->db->where('id_relasi',$pk);
        $this->db->update('tbl_relasi',$dt);
    }
    function del_row_relasi($pk){
        $this->db->where($this->pk,$pk);
        $this->db->delete('tbl_relasi');
    }
}