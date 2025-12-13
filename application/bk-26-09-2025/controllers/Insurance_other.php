<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insurance_other extends CI_Controller {

		function __construct()

    {

        parent::__construct();

        //$this->load->model('User_model');
        //$this->load->model('Control_model');
        //$this->load->model('Download_model');

		$this->load->model('user_model');
        $this->load->model('setting_model');
        $this->load->model('insurance_model');
        $this->load->model('insurance_other_model');
		
		if($this->session->userdata('user_id')==''){
			redirect(base_url().'login', 'refresh');  
		}
    }	
	
		
	public function index(){ 
		redirect(base_url());
	}
		
	//---------------------------insurancePayment  total_price
	
	public function printInsuranceOtherPayment(){
		// Insurance_otherID:Insurance_otherID,installment_peroid:installment_peroid,actionType:actionType,selectType:selectType
		
		$Insurance_otherID = $this->input->post('Insurance_otherID');
		$workID = $this->input->post('workID');
		$actionType = $this->input->post('actionType');
		$data['selectType'] = $this->input->post('selectType');
		$selectType= $this->input->post('selectType');
		$Insurance_otherID = $this->input->post('Insurance_otherID');
		
		$data['installment_peroid'] = $this->input->post('installment_peroid');
		$data['insurancePayment'] = $this->insurance_model->getWorkPayment($workID); 
		
		$resultOtherData = $this->insurance_other_model->getOtherInsuranceDetail($selectType,$Insurance_otherID);
		include('insurance_other_prepea_value.php'); //จัดเตรียม value form
		
		$resultData = $this->insurance_model->calculateInsuranceRemainPayment($workID); 
		$data['isNotPaid']=number_format($resultData['sum_not_paid'],2);
		$data['isPaid']=number_format($resultData['sum_paid'],2);
		
	    $data['insurance_total']=$this->input->post('amount_installment');
		
		
		if($actionType=='normal'){
			$this->load->view('insurance_installment_other_print', $data);
		}else if($actionType=='cover'){
			$this->load->view('insurance_installment_other_cover', $data);
		}
		
	}
	//---------------------------
	public function UpdatePotherPayType(){
		$data = $this->input->post();
		$resultData=$this->insurance_other_model->UpdatePotherPayType($data);
		echo json_encode($resultData);
	}
	//---------------------------
	public function updateOtherAmountInstallment(){
		$data = $this->input->post();
		$resultData = $this->insurance_other_model->updateOtherAmountInstallment($data); 
	    echo json_encode($resultData);
	}
	//---------------------------
	public function UpdateCashOtherDuedate(){
		$data = $this->input->post();
		$resultData=$this->insurance_other_model->UpdateCashOtherDuedate($data);
		echo json_encode($resultData);
	}
	//---------------------------
	public function updatePaymentAmount(){
		$data = $this->input->post();
		$resultData=$this->insurance_other_model->updateOtherPaymentAmount($data);
		echo json_encode($resultData);
	}
	//---------------------------
	public function DeleteInsuranceOther(){
		$data = $this->input->post();
		$resultData=$this->insurance_other_model->DeleteInsuranceOther($data);
		echo json_encode($resultData);
	}
	//---------------------------
	public function updateCashInsOtherPayment(){
		 $data = array();
		 $data = $this->input->post();
		 $resultData = array();
		 $resultData = $this->insurance_other_model->updateCashInsOtherPayment($data);
		 echo json_encode($resultData);		
	}
	//---------------------------
	public function calculateInstallmentOther(){
		$data = array();
		$data = $this->input->post();
		$resultData = $this->insurance_model->setInsuranceInstallment($data);
		echo json_encode($resultData);
	}
	//---------------------------
	public function SaveInsuranceOther(){
		$data['inputData'] = $this->input->post();
		$resultData =$this->insurance_other_model->SaveInsuranceOther($data);
		echo json_encode($resultData);
	}
	//---------------------------
	public function listInsOther(){
		$data =array();
		$inputData = $this->input->post();$data['SelectType']=$this->input->post('SelectType');
		//echo "<br>xxxxx>".$this->input->post('SelectType')."<br>";
		$data['data'] = $this->insurance_other_model->listInsOther($inputData);
		$data['SelectType']=$this->input->post('SelectType');
		$this->load->view('list_ins_other',$data);
	}
	
	//--------------------------- workID
	public function work_insurance_other_add($selectType=null,$insuranceID=null,$Insurance_otherID=null,$referID=NULL){
		$array = array(0 => '2', 1 => '3', 2 => '4', 3 => '5');
		if((!isset($selectType)) || (!in_array($selectType, $array, TRUE))){
			redirect(base_url().'insurance_other/PlaseSelectType', 'refresh');
		}
		
		if(isset($insuranceID)){
			$CustData  = $this->insurance_model->getInsuranceDetail($insuranceID);
			
			foreach($CustData AS $custDetail){ }
			
			//echo act_price_total   `not_recieve_warning` , `recieve_warning_yes`, `insurance_remark`
			$data['custID']=$custDetail->id;
			$data['cust_name']=$custDetail->cust_name;
			$data['cust_nickname']=$custDetail->cust_nickname;
			$data['insurance_remark']=$custDetail->insurance_remark;
			$data['not_recieve_warning']=$custDetail->not_recieve_warning;
			$data['recieve_warning_yes']=$custDetail->recieve_warning_yes;
			$data['recieve_warning']=$custDetail->recieve_warning;
			$data['insurance_remark']=$custDetail->insurance_remark;
	
			$data['recieve_id_ins']=$custDetail->recieve_id_ins;
			//--------warning---
			
			$dWorkArray = explode("-", $custDetail->date_work);
			$data['ins_date_work'] = $data['dateWork']=$dWorkArray[2]."/".$dWorkArray[1]."/".($dWorkArray[0]+543);
			// agent_id act_date_start insurance_type_id  agent_id code_id insurance_total policy_old_number renew
			
			
		}else{
			
			$data['custID']='';
			$data['cust_name']='';
			$data['cust_nickname']='';
			$data['cust_telephone_1']='';
			
			$date = date("d");
			$month =date("m");
			$year =date("Y");
			
			$data['dateWork']=$date."/".$month."/".($year+543);
			$data['insurance_remark']='';
			$data['not_recieve_warning']=0;
			$data['recieve_warning_yes']=0;
			$data['recieve_warning']=0;
			$data['insurance_remark']='';
			$data['recieve_id_ins']='0';
	
			$insuranceID=0;
			
		}
	
		
		$resultOtherData = $this->insurance_other_model->getOtherInsuranceDetail($selectType,$Insurance_otherID);
		include('insurance_other_prepea_value.php'); //จัดเตรียม value form
			
		
		
		//----get other data insurance_end contract_startdate contract_startdate insurance_start pay_cash_status insurance_discount
		$dataStatus =1;$use_branch=1;
		$data['listAgent'] = $this->setting_model->listAgent($dataStatus); 
		$data['listCode'] = $this->setting_model->listCode($dataStatus);  
		$data['listInsCorp'] = $this->setting_model->listCompany($dataStatus,$use_branch);   
		
		$data['workType'] = $this->setting_model->getWorkType($dataStatus); 
		$data['insurancePayment'] = $this->insurance_model->getWorkPayment($insuranceID); 
		$data['insurancePayment'] = $this->insurance_model->getWorkPayment($insuranceID); 
			
		$data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
		$data['currMonth']=date('m');
		
		
		$data['bg_red1']="";
		$data['fontWhite1']=""; 
		$data['hilightRed'] ='';
		
		
		$data['workID']=$insuranceID;
		$data['Insurance_otherID']=$Insurance_otherID;
		//--------ต่ออายุ set = ''; $recieve_warning $recieve_warning_yes $not_recieve_warning
		if($referID=='renew'){ 
			$data['workID']='0'; 
			$data['Insurance_otherID']=''; 
			$data['recieve_warning']=''; 
			$data['recieve_warning_yes']=''; 
			$data['not_recieve_warning']=''; 
		}
		
		
		$data['selectType']=$selectType;
		
		switch($data['selectType']){
			case "2" :
				$data['insuranceTitle'] = "ประกันท่องเทียว";
			break;
			case "3" :
				$data['insuranceTitle'] = "ประกันขนส่ง";
			break;
			case "4" :
				$data['insuranceTitle'] = "ประกันอุบัติเหตุ";
			break;	
			case "5" :
				$data['insuranceTitle'] = "ประกันอัคคีภัย";
			break;				
		}
		
		$data['data_status']='1';$data['bookbankList'] = $this->setting_model->listBookBank($data);
		$data['bookbankList'] = $this->setting_model->listBookBank($data);
		
		$this->load->view('work_insurance_other_add',$data);
		$this->load->view('work_insurance_other_add_script');
	}
	//---------------------------
	public function insurance_other($selectType=null){
		$array = array(0 => '2', 1 => '3', 2 => '4', 3 => '5');
		if((!isset($selectType)) || (!in_array($selectType, $array, TRUE))){
			redirect(base_url().'insurance_other/PlaseSelectType', 'refresh');
		}
		
	
		$startDay = date("Y-m");
		$startDay = $startDay."-01";
		$startDay = $startDay."-01";
		//echo $startDay;
		$data['startday'] = $this->insurance_model->translateDateToThai(date("Y-m")."-01");
		//$data['endday']= $this->insurance_model->translateDateToThai(date("Y-m-t", strtotime($startDay)));
		
		//$data['startday'] = $this->insurance_model->translateDateToThai(date("Y-m-d"));
		$data['endday'] = $this->insurance_model->translateDateToThai(date("Y-m-t"));
		//------------------
		$data['currMonth'] = date('m');
		$data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
		$data['currMonth']=date('m');
		
		$data['startYear']='2023';
		$data['currYear']=date("Y");
				
		$data['titleOtherInsurance']=$this->insurance_other_model->getOtherInsuranceTitle();
		
		// 	1 car_insurance , 2 travel insurance, 3 transport insurance , 4 PA , 5 home insurance
		$data['selectType']=$selectType;
		$footer['selectType']=$selectType;
		$this->load->view('insurance_other_index',$data);
		$this->load->view('insurance_other_script',$footer);
	}
	//------------------------------
	public function PlaseSelectType(){
		$this->load->view('select_insurance_other');
	}
	
}
	