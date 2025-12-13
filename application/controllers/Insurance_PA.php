<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Insurance_PA extends CI_Controller {
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
		
	public function insurance_pa(){
		$this->load->view('insurance_pa');
	}
		
	public function work_pa_all(){
		$this->load->view('work_pa_all');
	}
	public function work_pa_payment_print(){
		$this->load->view('work_pa_payment_print');
	}
	
	public function work_pa_address_print(){
		$this->load->view('work_pa_address_print');
	}
	public function work_pa_summary_print(){
		$this->load->view('work_pa_summary_print');
	}
	
	public function work_pa_invoice_print(){
		$this->load->view('work_pa_invoice_print');
	}
	public function work_pa_add_receipt(){
		$this->load->view('work_pa_add_receipt');
	}
	public function work_pa_receipt_print(){
		$this->load->view('work_pa_receipt_print');
	}
	
	
}
	