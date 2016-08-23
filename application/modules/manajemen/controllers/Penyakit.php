<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyakit extends Auth_CI {
    
    function __construct(){
        parent::__construct();
        $this->load->model('M_penyakit');
    }
	public function index(){
        $data['dt_penyakit']=$this->M_penyakit->get_data();
		$this->load->view('penyakit/page_index',$data);
	}
    
    function add(){
        $this->load->view('penyakit/page_add');
    }
    
    function do_add(){
        if($this->input->method() == 'post'){
            $nm_penyakit=$this->input->post('nm_penyakit');
            $ket=$this->input->post('ket');
            $solusi=$this->input->post('solusi');
            $dt=array(
                'nama_penyakit'=>$nm_penyakit,
                'ket'=>$ket,
                'solusi'=>$solusi
            );
            $this->db->insert('tbl_penyakit',$dt);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('notif',alert('success','Data berhasil disimpan'));
            }
            redirect('manajemen/penyakit');
        }else{
            show_404();
        }
    }
    
    function update($pk=''){
        $data['dt_row']=$this->M_penyakit->get_row($pk);
        $this->load->view('penyakit/page_upd',$data);
    }
    
    function do_update(){
        if($this->input->method() == 'post'){
            $pk=$this->input->post('pk');
            $nm_penyakit=$this->input->post('nm_penyakit');
            $ket=$this->input->post('ket');
            $solusi=$this->input->post('solusi');
            $dt=array(
                'nama_penyakit'=>$nm_penyakit,
                'ket'=>$ket,
                'solusi'=>$solusi
            );
            $this->M_penyakit->upd_row($pk,$dt);
            $this->session->set_flashdata('notif',alert('success','Update data penyakit berhasil'));
            redirect('manajemen/penyakit');
        }else{
            show_404();
        }
    }
    
    function do_delete(){
        if($this->input->method() == 'post'){
            $pk=$this->input->post('pk');
            $nm=$this->input->post('nm');
            $this->M_penyakit->del_row($pk);
            $this->session->set_flashdata('notif',alert('success','Hapus data penyakit '.$nm.' berhasil'));
            redirect('manajemen/penyakit');
        }else{
            show_404();
        }
    }
}