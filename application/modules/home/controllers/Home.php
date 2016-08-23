<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Auth_CI {
    
    function __construct(){
        parent::__construct();
        $this->load->helper('string');
    }
	public function index(){
		$this->load->view('page_index');
	}
}