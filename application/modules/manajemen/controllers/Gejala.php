<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gejala extends Auth_CI {
    
    function __construct(){
        parent::__construct();
        $this->load->model(array('M_gejala'));
    }
	public function index(){
        $data['dt_result']=$this->M_gejala->get_data();
		$this->load->view('gejala/page_index',$data);
	}
    
    function add(){
        //$data['dt_penyakit']=$this->M_gejala->get_penyakit();
        $this->load->view('gejala/page_add');
    }
    
    function do_add(){
        if($this->input->method() == 'post'){
            //$nm_penyakit=$this->input->post('nm_penyakit');
            $nm_gejala=$this->input->post('nm_gejala');
            $dt=array(
                //'id_penyakit'=>$nm_penyakit,
                'nama_gejala'=>$nm_gejala
            );
            $this->db->insert('tbl_gejala',$dt);
            $dt_relasi=array(
                'id_gejala'=>$this->db->insert_id(),
                //'id_penyakit'=>$nm_penyakit
            );
            //$this->db->insert('tbl_relasi',$dt_relasi);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('notif',alert('success','Data berhasil disimpan'));
            }
            redirect('manajemen/gejala');
        }else{
            show_404();
        }
    }
    
    function update($pk=''){
        $dt_row=$this->M_gejala->get_row($pk);
        //$data['dt_penyakit']=$this->M_gejala->get_penyakit();;
        $data['dt_row']=$dt_row;
        //$data['pk_relasi']=$this->M_gejala->getID_relasi($dt_row->id_penyakit,$pk);
        $this->load->view('gejala/page_upd',$data);
    }
    
    function do_update(){
        if($this->input->method() == 'post'){
            $pk=$this->input->post('pk');
            $pk_relasi=$this->input->post('pk_relasi');
            //$nm_penyakit=$this->input->post('nm_penyakit');
            $nm_gejala=$this->input->post('nm_gejala');
            $dt=array(
                //'id_penyakit'=>$nm_penyakit,
                'nama_gejala'=>$nm_gejala
            );
            $this->M_gejala->upd_row($pk,$dt);
            $dt_relasi=array(
                'id_gejala'=>$pk,
                //'id_penyakit'=>$nm_penyakit
            );
            //$this->M_gejala->upd_relasi($pk_relasi,$dt_relasi);
            $this->session->set_flashdata('notif',alert('success','Update data penyakit berhasil'));
            redirect('manajemen/gejala');
        }else{
            show_404();
        }
    }
    
    function do_delete(){
        if($this->input->method() == 'post'){
            $pk=$this->input->post('pk');
            $nm=$this->input->post('nm');
            $this->M_gejala->del_row($pk);
            //$this->M_gejala->del_row_relasi($pk);
            $this->session->set_flashdata('notif',alert('success','Hapus data gejala '.$nm.' berhasil'));
            redirect('manajemen/gejala');
        }else{
            show_404();
        }
    }
}