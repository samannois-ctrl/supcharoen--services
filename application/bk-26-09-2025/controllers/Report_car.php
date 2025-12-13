<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Report_car extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		 
        $this->load->model('user_model');

        $this->load->model('setting_model');
        $this->load->model('insurance_model');
        $this->load->model('insurance_other_model');
        $this->load->model('report_model');

        //$this->load->model('Download_model');

		if($this->session->userdata('user_id')==''){

			redirect(base_url().'login', 'refresh');

		}
	}
	
	//-----------------------------------------------------------
	public function addCodeIncome(){
		$param=array();
		$param=$this->input->post();
		$result = $this->report_model->addCodeIncome($param);
		echo json_encode($result);
	}
	//-----------------------------------------------------------
	public function updateFollow(){
		$param=array();
		$param=$this->input->post();
		$result = $this->report_model->updateFollow($param);
		
		echo json_encode($result);
		
	}
	//-----------------------------------------------------------
	public function updateNote(){
		$param=array();
		$param=$this->input->post();
		$result = $this->report_model->updateNote($param);
		echo json_encode($result);
	}
	//-----------------------------------------------------------
	public function GetAlertRemark(){
		$param=array();
		$param=$this->input->post();
		$param['result'] = $this->report_model->GetAlertRemark($param);
		$param['listInsType']=$this->setting_model->listInsuranceType(1,1);
		$this->load->view('follow_up_customer',$param);
	}
	//-----------------------------------------------------------
	public function DoUpdateAlerRemark(){
		$param=array();
		$param=$this->input->post();
		$result = $this->report_model->DoUpdateAlerRemark($param);
		echo json_encode($result);
	}
	//-----------------------------------------------------------
	public function updateAlertExpire(){
		$param=array();
		$param=$this->input->post();
		$result = $this->report_model->updateAlertExpire($param);
		echo json_encode($result);
	}
	//-----------------------------------------------------------
	public function getReportExpire(){
		$param=array();
		$param=$this->input->post();
		//print_r($param);
		$data['getData']=$this->report_model->getReportExpire($param);
		$this->load->view('report_car_warning_data_sub',$data);
	}
	//-----------------------------------------------------------

	public function report_car_warning_data()
	{
		$data['currMonth'] = date('m');
		$data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
		$data['currMonth']=date('m');
		
		$data['startYear']='2023';
		$data['currYear']=date("Y");
		
		$dataStatus =1;$use_branch=1;
		$data['listInsCorp'] = $this->setting_model->listCompany($dataStatus,$use_branch);  
		
		$this->load->view('report_car_warning_data',$data);
		$this->load->view('report_car_warning_script');
	}
	
	//-----------------------------------------------------------
	public function report_car_warning_data_print()
	{
		$this->load->view('report_car_warning_data_print');
	}	
	//-----------------------------------------------------------
	public function report_ins_delete(){
		$data['data_status']='0';
		$data['GetData']=$this->report_model->ListInsuranceDelete($data);
		$this->load->view('report_ins_delete',$data);
	}
	//-----------------------------------------------------------
	public function list_overdue(){
		$data=array();
		$data=$this->input->post();
		//echo 'readConfig>>'.$this->input->post('readConfig');
		$data['getData']=$this->report_model->list_overdue($data);
		
		$this->load->view('report_overdue',$data);
	}
	//-----------------------------------------------------------
	public function report_payment_installment(){
		$data['currentMonth'] = date("m");
		$data['currentYear'] = date("Y");
		$data['startYear']='2023';
		$data['currYear']=date("Y");
		$data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
		$data['permission'] = $this->insurance_model->getPermisssion('report_other_pay_installment',$this->session->userdata('user_id'));
		$data['getConfig']=$this->report_model->get_overdue_conf();
		$this->load->view('report_payment_installment',$data);
		$this->load->view('report_payment_installment_script',$data);
	}
	//----------------------------------------------------------- 
	public function additional_income_report(){
		$data=array();
		
		$data['startMonth']  = "01";
		$data['currentMonth']  = date("m");
		$data['currentYear']  =  date("Y");
		
		$data['startYear'] = 2022;
		$data['DateStart']="1";
		$data['DateEnd']=date("d");
		$data['currYear'] = date("Y");
		$data['rangeYear']=($data['currYear']-$data['startYear'])+1;
		$data['currMonth']=date('m'); 
		$data['rangeYear']  = $data['currentYear'] - $data['startYear'];

		$data['currentPage'] = 'incomePage'; 
		$data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
		  $data['currMonth']=date('m');
		
		
		$dataStatus =1;$use_branch=1;
 		$data['listInsCorp'] = $this->setting_model->listCompany($dataStatus,$use_branch);  
		$data['listCode'] = $this->setting_model->listCode($dataStatus); 
	
		$parm['status'] = $dataStatus;
		$data['listInstype']= $this->setting_model->listInstype($parm);
		
		$this->load->view('additional_income_report',$data);
		$this->load->view('additional_income_report_script',$data);
		
	}
	//---------------------------------------------------------- 
	public function getCodeList(){
		 $data=array();
		 $data=$this->input->post();
		 $data['getData'] = $this->report_model->getCodeForInsuranceCorp($data);
		 
		 //print_r($data['getData']);
		// echo "<br>";
		 if($data['getData']['countID'] > 0){
			 foreach($data['getData']['resultGetCode'] AS $data){
				 echo "<input type='checkbox' class='CodeFromCorp' value ='".$data->id."' checked> ".$data->conde_name."&nbsp;&nbsp;&nbsp;";
			 }
		 }else{
			echo "ไม่มีข้อมูลโค้ด";
		 }
	}
	//---------------------------------------------------------- 
	public function GetCorpIncomeList(){
		 $data=array();
		 $data=$this->input->post();
		 $data['getData'] = $this->report_model->GetCorpIncomeList($data);
		 $this->load->view('additional_income_report_sub',$data);
	}
	//----------------------------------------------------------- 
	public function report_code_income(){
		  $data=array();
		  
		  $data['startMonth']  = "01";
		  $data['currentMonth']  = date("m");
		  $data['currentYear']  =  date("Y");
			
		  $data['startYear'] = 2022;
		  $data['DateStart']="1";
		  $data['DateEnd']=date("d");
		  $data['currYear'] = date("Y");
		  $data['rangeYear']=($data['currYear']-$data['startYear'])+1;
		  $data['currMonth']=date('m'); 
		  $data['rangeYear']  = $data['currentYear'] - $data['startYear'];

		  $data['currentPage'] = 'incomePage'; 
		
		 $dataStatus =1;$use_branch=1;
 		 $data['listInsCorp'] = $this->setting_model->listCompany($dataStatus,$use_branch);  
		
		
		  $dataStatus =1;
		  $data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
		  $data['currMonth']=date('m');
		
		  $dataStatus ='1';$use_branch=1;
		  //$data['listInsCorp'] = $this->setting_model->listCompany($dataStatus,$use_branch);  
		  $agentStatus = '1';
		  //$data['listAgent'] = $this->setting_model->listAgent($agentStatus); 
		  $data['listCode'] = $this->setting_model->listCode($dataStatus); 
		  
		$data['isMainPage']='1';
		$this->load->view('report_code_income',$data);
		$this->load->view('report_code_income_script',$data);
	}
	
	//-----------------------------------------------------------  
	public function GetCodeIncomeDetail(){
		$param = $this->input->post();
		
		if($param['select_day_start']<10){ $param['select_day_start']= "0".$param['select_day_start']; }
		if($param['select_day_end']<10){ $param['select_day_end']= "0".$param['select_day_end']; }
		 
		$data['dateStart'] = $param['select_year']."-".$param['select_month_start']."-".$param['select_day_start'];
		$data['dateEnd'] = $param['select_year']."-".$param['select_month_end']."-".$param['select_day_end'];
		
		$param['dateStart'] = $data['dateStart'];
		$param['dateEnd'] = $data['dateEnd'];
				
		//print_r($param); 
		$data['company_id']=$param['company_id'];
		
		$data['getData'] = $this->report_model->GetCodeIncomeDetail($param);
		$data['ins_code_id']=$this->input->post('ins_code_id');
		$data['ins_code_id_text']=$this->input->post('ins_code_id_text');
		
		$data['isDetail']=1;
		
		$this->load->view('report_code_income_sub',$data);
	}
	//-----------------------------------------------------------  
	public function removeOtherIncome(){
		$data=array();
		$param = $this->input->post();
		$resultData = $this->report_model->removeOtherIncome($param);
		echo json_encode($resultData);
	}
	//-----------------------------------------------------------  isDetail
	public function GetCodeIncome(){
		$param = $this->input->post();
		
		if($param['select_day_start']<10){ $param['select_day_start']= "0".$param['select_day_start']; }
		if($param['select_day_end']<10){ $param['select_day_end']= "0".$param['select_day_end']; }
		 
		$data['dateStart'] = $param['select_year']."-".$param['select_month_start']."-".$param['select_day_start'];
		$data['dateEnd'] = $param['select_year']."-".$param['select_month_end']."-".$param['select_day_end'];
		
		$param['dateStart'] = $data['dateStart'];
		$param['dateEnd'] = $data['dateEnd'];
				
		//print_r($param); 
		
		$data['getData'] = $this->report_model->GetCodeIncome($param);
		$data['ins_code_id']=$this->input->post('ins_code_id');
		$data['ins_code_id_text']=$this->input->post('ins_code_id_text');
		// $dataStatus ='1';$use_branch=1;
		 //$data['listCode'] = $this->setting_model->listCode($dataStatus);  ins_code_id_text:ins_code_id_text
		
		$data['isDetail']=0;
		$data['currentPage']=$param['currentPage'];
		$this->load->view('report_code_income_sub',$data);
	}
	//-----------------------------------------------------------
	public function report_code_detail($codeID=NULL,$dateStart=NULL,$dateEnd=NULL){
		 
		 $data=array();
		 $data['codeID']=$codeID;
		 $data['dateStart']=$dateStart; 
		 $data['dateEnd']=$dateEnd;
		 $data['getCodeDetail']=$this->report_model->report_code_income_detail($data);
		
	
		 $dateStartArray = explode("-",$dateStart);
		 $dateEndtArray = explode("-",$dateEnd);
		
		  $data['getStartDate']   = $dateStartArray[2]; 
		  $data['getstartMonth']  = $dateStartArray[1];
		  $data['getsEndate']  = $dateEndtArray[2];
		  $data['getEndMonth']  = $dateEndtArray[1];
		
		  $data['currYear'] = $dateStartArray[0];
		
		  $data['currentMonth']  = date("m");
		  $data['currentYear']  =  date("Y");
			
		  $data['startYear'] = 2022;
  
		  $data['rangeYear']=($data['currYear']-$data['startYear'])+1;

		  $data['rangeYear']  = $data['currentYear'] - $data['startYear'];

		  $dataStatus =1;
		  $data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
		  $data['currMonth']=date('m');
		
		  $dataStatus ='1';$use_branch=1;
		  //$data['listInsCorp'] = $this->setting_model->listCompany($dataStatus,$use_branch);  
		  $agentStatus = '1';
		  //$data['listAgent'] = $this->setting_model->listAgent($agentStatus); 
		  $data['listCode'] = $this->setting_model->listCode($dataStatus); 
		
		 $data['isMainPage']='0';
		 $this->load->view('report_code_income_detail',$data);
		 $this->load->view('report_code_income_script',$data);
	}
	//--------------------------------------------------------
	public function report_code_detailX(){
		// codeID:codeID,dateStart:dateStart,dateEnd:dateEnd
		 $param = array();
		 $param = $this->input->post();
		 $data['getCodeDetail']=$this->report_model->report_code_income_detail($param);
		 $this->load->view('report_code_income_detail_sub',$data);
	}
	//-----------------------------------------------------------
	public function report_car_invoice_agent()
	{
		$this->load->view('report_car_invoice_agent');
	}
	public function report_car_invoice_agent_print()
	{
		$this->load->view('report_car_invoice_agent_print');
	}
	public function report_car_payment_insurance()
	{
		$this->load->view('report_car_payment_insurance');
	}
	public function report_car_payment_insurance_print()
	{
		$this->load->view('report_car_payment_insurance_print');
	}
	public function report_car_income_agent()
	{
		$this->load->view('report_car_income_agent');
	}
	public function report_car_income_agent_print()
	{
		$this->load->view('report_car_income_agent_print');
	}
	///// รายงานลูกค้าค้างจ่าย /////	
	public function report_car_accrual_customer()
	{
		$this->load->view('report_car_accrual_customer');
	}
	///// รายงานลูกค้าค้างจ่าย -พิมพ์ ///	
	public function report_car_accrual_customer_print()
	{
		$this->load->view('report_car_accrual_customer_print');
	}
	///////// ข้อมูลรายวัน //////////
	public function report_car_daily_data()
	{
		$this->load->view('report_car_daily_data');
	}
	public function report_car_daily_data_print()
	{
		$this->load->view('report_car_daily_data_print');
	}
	
	///// ทะเบียนคุมงานประกัน และ พรบ. /////		
	public function report_car_audit_insurance()
	{
		$this->load->view('report_car_audit_insurance');
	}
	///// ชำระค่างวด ///////
	public function report_car_pay_installment()
	{
		$this->load->view('report_car_pay_installment');
	}
	
	public function report_car_pay_installment_print()
	{
		$this->load->view('report_car_pay_installment_print');
	}
	
	/////// รายรับ ////////
	
	public function report_car_receipt()
	{
		$this->load->view('report_car_receipt');
	}
	
	public function report_car_receipt_print()
	{
		$this->load->view('report_car_receipt_print');
	}
	
	/////// ค่าคอมมิชชั่นตัวแทน ////////
	
	public function report_car_agent_commission()
	{
		$this->load->view('report_car_agent_commission');
	}
	
	public function report_car_agent_commission_print()
	{
		$this->load->view('report_car_agent_commission_print');
	}
	
	/////// ยกเลิกกรมธรรม์ ////////	
	public function report_car_policy_cancle()
	{
		$this->load->view('report_car_policy_cancle');
	}
	
	public function report_car_policy_cancle_print()
	{
		$this->load->view('report_car_policy_cancle_print');
	}
	
		
	
		
	
}
