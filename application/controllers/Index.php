<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        //$this->load->model('User_model');
        //$this->load->model('Control_model');
        //$this->load->model('Download_model');
    }
		
	public function index(){
		$this->load->view('index');
	}
		
	
	
}
	