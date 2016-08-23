<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_CI extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        /*
        $login=$this->session->userdata('logged_in');
        if($login != 1){
            redirect('/');
        }else{
            if($this->session->status != 1){
                //redirect('auth/aktivasi');
            }
        }
        */
    }
}