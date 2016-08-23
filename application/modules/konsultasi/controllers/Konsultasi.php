<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsultasi extends Auth_CI {
    
    private $kd_konsul;
    
    function __construct(){
        parent::__construct();
        $this->load->helper('string');
        $this->load->model(array('M_konsul','M_diagnosa'));
    }
	public function index(){
		$this->load->view('page_daftar');
	}
    
    function daftar(){
        $this->session->sess_destroy();
        $this->load->view('page_daftar');
    }
    
    private function get_kd_konsul(){
        return $this->kd_konsul;
    }
    
    function do_daftar(){
        if($this->input->method() == 'post'){
            $nama=$this->input->post('nama');
            $umur=$this->input->post('umur');
            $jk=$this->input->post('jk');
            $alamat=$this->input->post('alamat');
            $this->kd_konsul=random_string('numeric', 10);
            $dt=array(
                'nama'=>$nama,
                'umur'=>$umur,
                'jk'=>$jk,
                'alamat'=>$alamat,
                'tgl_periksa'=>date('Y-m-d'),
                'kode_konsultasi'=>$this->kd_konsul
            );
            
            $this->M_konsul->insert_daftar($dt);
            //$curent_user=$this->M_konsul->get_current_user($this->db->insert_id());
            //$dt['kode_konsultasi']=$curent_user->kode_konsultasi;
            $dt['log_tahap']=true;
            $this->session->set_userdata($dt);
            
            redirect('konsultasi/diagnosa');
        }else{
            show_404();
        }
    }
    
    function diagnosa(){
        if($this->session->log_tahap){
            $data['dt_gejala']=$this->M_diagnosa->get_gejala();
            $this->load->view('page_diagnosa',$data);
        }else{
            redirect('konsultasi/daftar');
        }
    }
    
    function view_gejala(){
        if($this->input->method() == 'post'){
            $gejala=$this->input->post('gejala');
            $penyakit=$this->M_diagnosa->get_relasi($gejala);
            $id_penyakit_terbesar = '';
            $nama_penyakit_terbesar = '';
            $id_penyakit='';
            $nama_penyakit='';
            $dftr_penyakit=array();
            $dftr_cf=array();
            $mb='';
            $md='';
            $cf='';
            $cf_terbesar='';
            $c = 0;
            $i='';
            
            if($penyakit){
                foreach($penyakit as $p){
                    $row_penyakit=$this->M_diagnosa->get_penyakit($p->id_penyakit);
                    $id_penyakit=$p->id_penyakit;
                    $nama_penyakit=$row_penyakit->nama_penyakit;
                    $dftr_penyakit[$c]=$id_penyakit;
                    
                    $relasi_b=$this->M_diagnosa->get_relasi_b($gejala,$id_penyakit);
                    if($relasi_b->num_rows() == 1){
                        $dt_relasi_b=$relasi_b->row();
                        $mb=$dt_relasi_b->mb;
                        $md=$dt_relasi_b->md;
                        $cf=$mb-$md;
                        $dftr_cf[$c]=$cf;
                        
                        if(($id_penyakit_terbesar=='') || ($cf_terbesar < $cf)){
                            $cf_terbesar=$cf;
                            $id_penyakit_terbesar=$id_penyakit;
                            $nama_penyakit_terbesar=$nama_penyakit;
                        }
                    }else if($relasi_b->num_rows() > 1){
                        $i=1;
                        foreach($relasi_b->result() as $r){
                            if($i == 1){
                                $mblama=$r->mb;
                                $mdlama=$r->md;
                            }else if($i == 2){
                                $mbbaru=$r->mb;
                                $mdbaru=$r->md;
                                $mbsementara = $mblama + ($mbbaru * (1 - $mblama));
		                        $mdsementara = $mdlama + ($mdbaru * (1 - $mdlama));
                                
                                if($relasi_b->num_rows() == 2){
                                    $mb=$mbsementara;
                                    $md=$mdsementara;
                                    $cf=$mb-$md;
                                    $dftr_cf[$c]=$cf;
                                    if (($id_penyakit_terbesar == '') || ($cf_terbesar < $cf)){
        								$cf_terbesar = $cf;
        								$id_penyakit_terbesar = $id_penyakit;
        								$nama_penyakit_terbesar = $nama_penyakit;
        							}
                                }else if ($i >= 3){
            						$mblama = $mbsementara;
            						$mdlama = $mdsementara;
            						//echo "mblama = mbsementara = ".$mblama."<br/>";
            						//echo "mdlama = mdsementara = ".$mdlama."<br/>";
            						$mbbaru = $r->mb;
            						$mdbaru = $r->md;
            						//echo "mbbaru = ".$mbbaru."<br/>";
            						//echo "mdbaru = ".$mdbaru."<br/>";
            						$mbsementara = $mblama + ($mbbaru * (1 - $mblama));
            						$mdsementara = $mdlama + ($mdbaru * (1 - $mdlama));
            						//echo "mbsementara = (mblama + mbbaru) * (1 - mblama) = ($mblama + $mbbaru) * (1 - $mblama) = ".$mbsementara."<br/>";
            						//echo "mdsementara = (mblama + mbbaru) * (1 - mblama) = ($mblama + $mbbaru) * (1 - $mblama) = ".$mdsementara."<br/>";
            						//jika ini adalah gejala terakhir berarti CF ketemu
            						if ($relasi_b->num_rows() == $i){
            							$mb = $mbsementara;
            							$md = $mdsementara;
            							$cf = $mb - $md;
            							//echo "mb = mbsementara = ".$mb."<br/>";
            							//echo "md = mdsementara = ".$md."<br/>";
            							//echo "cf = mb - md = ".$mb." - ".$md." = ".$cf."<br/><br/><br/>";
            							$daftar_cf[$c] = $cf;
            							//cek apakah penyakit ini adalah penyakit dgn CF terbesar ?
            							if (($id_penyakit_terbesar == '') || ($cf_terbesar < $cf)){
            								$cf_terbesar = $cf;
            								$id_penyakit_terbesar = $id_penyakit;
            								$nama_penyakit_terbesar = $nama_penyakit;
            							}
            						}
            					}
                                $i++;
                            }
                        }
                    }
                    $c++;
                }
            }
            for ($i = 0; $i < count($dftr_penyakit); $i++)
        	{
        		for ($j = $i + 1; $j < count($dftr_penyakit); $j++)
        		{
        			if ($dftr_cf[$j] > $dftr_cf[$i])
        			{
        				$t = $dftr_cf[$i];
        				$dftr_cf[$i] = $dftr_cf[$j];
        				$dftr_cf[$j] = $t;
        				
        				$t = $dftr_penyakit[$i];
        				$dftr_penyakit[$i] = $dftr_penyakit[$j];
        				$dftr_penyakit[$j] = $t;
        			}
        		}
        	}
            
            $get_penyakit=$this->M_diagnosa->get_penyakit($id_penyakit_terbesar);
            //echo_pre($get_penyakit);
            //echo_pre($dftr_penyakit);
            $data['dt_penyakit']=$dftr_penyakit;
            $data['dt_gejala']=$gejala;
            $data['dt_cf']=$dftr_cf;
            $data['h_penyakit']=$get_penyakit;
            $this->load->view('page_hasil',$data);
            
        }else{
            redirect('konsultasi/diagnosa');
        }
    }
    
    function tes(){
        $this->load->view('page_hasil');
    }
}