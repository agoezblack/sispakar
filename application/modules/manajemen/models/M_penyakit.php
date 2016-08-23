<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penyakit extends CI_Model{
    
    private $tbl='tbl_penyakit';
    private $pk='id_penyakit';
    
    function get_data(){
        $this->db->order_by('id_penyakit','DESC');
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
}