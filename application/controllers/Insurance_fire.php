<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Insurance_fire extends CI_Controller {

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

		

	public function insurance_fire(){

		$this->load->view('insurance_fire');

	}

		

	public function work_fire_all(){

		$this->load->view('work_fire_all');

	}

	public function work_fire_fireyment_print(){

		$this->load->view('work_fire_fireyment_print');

	}

	

	public function work_fire_address_print(){

		$this->load->view('work_fire_address_print');

	}

	public function work_fire_summary_print(){

		$this->load->view('work_fire_summary_print');

	}

	

	public function work_fire_invoice_print(){

		$this->load->view('work_fire_invoice_print');

	}

	public function work_fire_add_receipt(){

		$this->load->view('work_fire_add_receipt');

	}

	public function work_fire_receipt_print(){

		$this->load->view('work_fire_receipt_print');

	}

	
	

}

	