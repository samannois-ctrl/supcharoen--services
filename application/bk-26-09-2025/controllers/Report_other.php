<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Report_other extends CI_Controller
{
		function __construct()

    {

        parent::__construct();

        //$this->load->model('User_model');
        //$this->load->model('Control_model');
        //$this->load->model('Download_model');

		$this->load->model('user_model');
        $this->load->model('setting_model');
        $this->load->model('insurance_model');
		
		if($this->session->userdata('user_id')==''){
			redirect(base_url().'login', 'refresh');
		}
    }
	
	//-----------------------------------
	
	public function report_expenses(){
		$today = date("Y-m-d");
		
		//echo $startDay; 
		//$data['startday'] = $this->insurance_model->translateDateToThai(date("Y-m")."-01");
		//$data['endday']= $this->insurance_model->translateDateToThai(date("Y-m-t", strtotime($startDay)));
		
		$data['startday'] = $this->insurance_model->translateDateToThai($today);
		$data['endday']= $this->insurance_model->translateDateToThai($today);
		
		$this->load->view('report_expenses',$data);
		$this->load->view('report_expenses_script');
	}
	
	public function report_other_income_agent()
	{
		$this->load->view('report_other_income_agent');
	}
	public function report_other_income_agent_print()
	{
		$this->load->view('report_other_income_agent_print');
	}
	///// รายงานลูกค้าค้างจ่าย /////	
	public function report_other_accrual_customer()
	{
		$this->load->view('report_other_accrual_customer');
	}
	///// รายงานลูกค้าค้างจ่าย -พิมพ์ ///	
	public function report_other_accrual_customer_print()
	{
		$this->load->view('report_other_accrual_customer_print');
	}
	///////// ข้อมูลรายวัน //////////
	public function report_other_daily_data()
	{
		$this->load->view('report_other_daily_data');
	}
	public function report_other_daily_data_print()
	{
		$this->load->view('report_other_daily_data_print');
	}
	
	///// ทะเบียนคุมงานประกัน และ พรบ. /////		
	public function report_other_audit_insurance()
	{
		$this->load->view('report_other_audit_insurance');
	}
	///// ชำระค่างวด ///////
	public function report_other_pay_installment()
	{
		$this->load->view('report_other_pay_installment');
	}
	
	public function report_other_pay_installment_print()
	{
		$this->load->view('report_other_pay_installment_print');
	}
	
	/////// รายรับ ////////
	
	public function report_other_receipt()
	{
		$this->load->view('report_other_receipt');
	}
	
	public function report_other_receipt_print()
	{
		$this->load->view('report_other_receipt_print');
	}
	
	/////// ค่าคอมมิชชั่นตัวแทน ////////
	
	public function report_other_agent_commission()
	{
		$this->load->view('report_other_agent_commission');
	}
	
	public function report_other_agent_commission_print()
	{
		$this->load->view('report_other_agent_commission_print');
	}
	
	
		
	/////// แจ้งเตือนหมดอายุ ////////	
	public function report_other_warning_data()
	{
		$this->load->view('report_other_warning_data');
	}
	
	public function report_other_warning_data_print()
	{
		$this->load->view('report_other_warning_data_print');
	}	
		
	
}
