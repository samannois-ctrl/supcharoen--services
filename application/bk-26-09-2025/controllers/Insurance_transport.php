<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Insurance_transport extends CI_Controller {
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
		
	public function insurance_transport(){
		$this->load->view('insurance_transport');
	}
		
	public function work_transport_all(){
		$this->load->view('work_transport_all');
	}
	public function work_transport_transportyment_print(){
		$this->load->view('work_transport_transportyment_print');
	}
	
	public function work_transport_address_print(){
		$this->load->view('work_transport_address_print');
	}
	public function work_transport_summary_print(){
		$this->load->view('work_transport_summary_print');
	}
	
	public function work_transport_invoice_print(){
		$this->load->view('work_transport_invoice_print');
	}
	public function work_transport_add_receipt(){
		$this->load->view('work_transport_add_receipt');
	}
	public function work_transport_receipt_print(){
		$this->load->view('work_transport_receipt_print');
	}
	
	
}
	