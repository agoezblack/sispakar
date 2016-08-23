<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_konsul extends CI_Model{
    
    private $tbl='tbl_pasien';
    private $pk='id_pasien';
    
    function insert_daftar($dt){
        $this->db->insert($this->tbl,$dt);
        return $this->db->affected_rows();
    }
    
    function get_current_user($pk){
        $this->db->where($this->pk,$pk);
        $dt=$this->db->get($this->tbl);
        return $dt->row();
    }
    
    function cek_temp_analisa(){
        $this->db->where('kode_konsultasi',$this->session->kode_konsultasi);
        $dt=$this->db->get('tmp_analisa');
        return $dt->num_rows();
    }
    
    function get_pertanyaan(){
        $cek=$this->cek_temp_analisa();
        if($cek){
            $query="
            SELECT a.* FROM tbl_gejala a, tmp_analisa b
			WHERE a.id_gejala=b.id_gejala
			AND b.id_gejala NOT IN(SELECT c.id_gejala FROM tmp_gejala c )
			GROUP BY b.id_gejala
			ORDER BY a.id_gejala ASC";
        }else{
            $query ="SELECT * FROM tbl_gejala b ORDER BY b.id_gejala ASC";
        }
        $dt=$this->db->query($query);
        return $dt->row();
    }
}