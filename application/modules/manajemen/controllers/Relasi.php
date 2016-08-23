<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relasi extends Auth_CI {
    
    function __construct(){
        parent::__construct();
        $this->load->model(array('M_relasi'));
    }
	public function index(){
        $data['dt_result']=$this->M_relasi->get_data();
		$this->load->view('relasi/page_index',$data);
	}
    
    function add(){
        $data['dt_penyakit']=$this->M_relasi->get_penyakit();
        $data['dt_gejala']=$this->M_relasi->get_gejala();
        $this->load->view('relasi/page_add',$data);
    }
    
    function do_add(){
        if($this->input->method() == 'post'){
            $id_penyakit=$this->input->post('id_penyakit');
            $id_gejala=$this->input->post('id_gejala');
            $mb=$this->input->post('mb');
            $md=$this->input->post('md');
            $dt=array(
                'id_penyakit'=>$id_penyakit,
                'id_gejala'=>$id_gejala,
                'mb'=>$mb,
                'md'=>$md
            );
            $this->db->insert('tbl_relasi',$dt);
            $this->session->set_flashdata('notif',alert('success','Data berhasil disimpan'));
            redirect('manajemen/relasi');
        }else{
            show_404();
        }
    }
    
    function update($pk=''){
        $data['dt_row']=$this->M_relasi->get_row($pk);
        $data['dt_penyakit']=$this->M_relasi->get_penyakit();
        $data['dt_gejala']=$this->M_relasi->get_gejala();
        $this->load->view('relasi/page_upd',$data);
    }
    
    function do_upd(){
        if($this->input->method() == 'post'){
            $id_penyakit=$this->input->post('id_penyakit');
            $id_gejala=$this->input->post('id_gejala');
            $mb=$this->input->post('mb');
            $md=$this->input->post('md');
            $pk=$this->input->post('pk');
            $dt=array(
                'id_penyakit'=>$id_penyakit,
                'id_gejala'=>$id_gejala,
                'mb'=>$mb,
                'md'=>$md
            );
            $this->M_relasi->upd_relasi($pk,$dt);
            redirect('manajemen/relasi');
        }else{
            show_404();
        }
    }
    
    function do_delete(){
        if($this->input->method() == 'post'){
            $pk=$this->input->post('pk');
            $this->M_relasi->del_relasi($pk);
            $this->session->set_flashdata('notif',alert('success','Data berhasil dihapus'));
            redirect('manajemen/relasi');
        }else{
            show_404();
        }
    }
    
    function tes(){
        $this->load->view('relasi/tes');
    }
}