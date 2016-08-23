<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_relasi extends CI_Model{
    
    private $tbl='tbl_relasi';
    private $pk='id_relasi';
    
    function get_data(){
        $this->db->join('tbl_penyakit','tbl_penyakit.id_penyakit=tbl_relasi.id_penyakit','LEFT');
        $this->db->join('tbl_gejala','tbl_gejala.id_gejala=tbl_relasi.id_gejala','LEFT');
        //$this->db->group_by('tbl_penyakit.id_penyakit');
        $this->db->order_by($this->pk,'DESC');
        $dt=$this->db->get($this->tbl);
        return $dt->result();
    }
    
    function get_penyakit(){
        $this->db->order_by('nama_penyakit','ASC');
        $dt=$this->db->get('tbl_penyakit');
        return $dt->result();
    }
    
    function get_gejala(){
        $this->db->order_by('nama_gejala','ASC');
        $dt=$this->db->get('tbl_gejala');
        return $dt->result();
    }
    
    function get_list_gejala($id_penyakit){
        $html='';
        $this->db->select('tbl_gejala.nama_gejala');
        $this->db->where('tbl_relasi.id_penyakit',$id_penyakit);
        $this->db->join('tbl_gejala','tbl_gejala.id_gejala=tbl_relasi.id_gejala');
        $dt=$this->db->get($this->tbl)->result();
        if($dt != null){
            $html .="<ol>";
            foreach($dt as $val){
                $html .="<li>".$val->nama_gejala."</li>";
            }
            $html .="</ol>";
        }
        return $html;
    }
    
    function get_row_penyakit($id_penyakit){
        $this->db->where('id_penyakit',$id_penyakit);
        $dt=$this->db->get('tbl_penyakit');
        return $dt->row();
    }
    function get_upd_gejala($id_penyakit){
        $result='';
        $js=array();
        $this->db->select('id_gejala');
        $this->db->where('id_penyakit',$id_penyakit);
        $dt=$this->db->get($this->tbl)->result();
        if($dt){
            foreach($dt as $v){
                $js[]=$v->id_gejala;
            }
            $result=json_encode($js);
        }
        return $result;
    }
    
    function del_relasi($id_penyakit){
        $this->db->where('id_penyakit',$id_penyakit);
        $this->db->delete($this->tbl);
    }
    
    function upd_relasi($pk,$dt){
        $this->db->where($this->pk,$pk);
        $this->db->update($this->tbl,$dt);
    }
    
    function get_row($pk){
        $this->db->where($this->pk,$pk);
        $dt=$this->db->get($this->tbl);
        return $dt->row();
    }        
}