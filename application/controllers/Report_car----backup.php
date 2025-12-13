<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Report_car extends CI_Controller

{

	function __construct()

	{

		parent::__construct();

		//$this->load->model('User_model');

		//$this->load->model('Control_model');

		//$this->load->model('Download_model');

	}

	public function report_invoice_agent()

	{

		$this->load->view('report_invoice_agent');

	}

	public function report_invoice_agent_print()

	{

		$this->load->view('report_invoice_agent_print');

	}

	public function report_payment_insurance()

	{

		$this->load->view('report_payment_insurance');

	}

	public function report_payment_insurance_print()

	{

		$this->load->view('report_payment_insurance_print');

	}

	public function report_income_agent()

	{

		$this->load->view('report_income_agent');

	}

	public function report_income_agent_print()

	{

		$this->load->view('report_income_agent_print');

	}

	///// รายงานลูกค้าค้างจ่าย /////	

	public function report_accrual_customer()

	{

		$this->load->view('report_accrual_customer');

	}

	///// รายงานลูกค้าค้างจ่าย -พิมพ์ ///	

	public function report_accrual_customer_print()

	{

		$this->load->view('report_accrual_customer_print');

	}




	///////// ข้อมูลรายวัน //////////

	public function report_daily_data()

	{

		$this->load->view('report_daily_data');

	}

	public function report_daily_data_print()

	{

		$this->load->view('report_daily_data_print');

	}



	

	///// ทะเบียนคุมงานประกัน และ พรบ. /////		

	public function report_audit_insurance()

	{

		$this->load->view('report_audit_insurance');

	}

	///// ชำระค่างวด ///////

	public function report_pay_installment()

	{

		$this->load->view('report_pay_installment');

	}

	

	public function report_pay_installment_print()

	{

		$this->load->view('report_pay_installment_print');

	}

	

	/////// รายรับ ////////

	

	public function report_receipt()

	{

		$this->load->view('report_receipt');

	}
	
	public function report_receipt_print()

	{

		$this->load->view('report_receipt_print');

	}

	

	/////// ค่าคอมมิชชั่นตัวแทน ////////

	

	public function report_agent_commission()

	{

		$this->load->view('report_agent_commission');

	}
	
	public function report_agent_commission_print()

	{

		$this->load->view('report_agent_commission_print');

	}
	

	/////// ยกเลิกกรมธรรม์ ////////	

	public function report_policy_cancle()

	{

		$this->load->view('report_policy_cancle');

	}

	

	public function report_policy_cancle_print()

	{

		$this->load->view('report_policy_cancle_print');

	}

	

		

	/////// แจ้งเตือนหมดอายุ ////////	

	public function report_warning_data()

	{

		$this->load->view('report_warning_data');

	}

	

	public function report_warning_data_print()

	{

		$this->load->view('report_warning_data_print');

	}	

		

	

}

