<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Insurance_travel extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');

        $this->load->model('setting_model');

        //$this->load->model('Download_model');

		if($this->session->userdata('user_id')==''){

			redirect(base_url().'login', 'refresh');

		}

    }
	//---------------------------------------
		
	public function insurance_travel(){
		$this->load->view('insurance_travel');
	}
		
	public function work_travel_all(){
		$this->load->view('work_travel_all');
	}
	public function work_travel_travelyment_print(){
		$this->load->view('work_travel_travelyment_print');
	}
	
	public function work_travel_address_print(){
		$this->load->view('work_travel_address_print');
	}
	public function work_travel_summary_print(){
		$this->load->view('work_travel_summary_print');
	}
	
	public function work_travel_invoice_print(){
		$this->load->view('work_travel_invoice_print');
	}
	public function work_travel_add_receipt(){
		$this->load->view('work_travel_add_receipt');
	}
	public function work_travel_receipt_print(){
		$this->load->view('work_travel_receipt_print');
	}
	
	
}
	