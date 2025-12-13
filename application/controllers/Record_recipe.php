<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Record_recipe extends CI_Controller {
	function __construct()
    {
        parent::__construct();
		$this->load->model('user_model');
        $this->load->model('setting_model');
        $this->load->model('insurance_model');
        $this->load->model('insurance_other_model');
        $this->load->model('receive_model');
		if($this->session->userdata('user_id')==''){
			redirect(base_url().'login', 'refresh');
		}
    }
    //-------------------------------
	public function index(){
		$data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
		$data['currMonth']=date('m');
		$data['startYear']='2023';
		$data['currYear']=date("Y");
		$data['currDate']=date("d");
		$data['selectBranch1']='1';
		$data['selectBranch2']='0';
		$data['data_status']='1';
		$data['bookbankList'] = $this->setting_model->listBookBank($data);
		//$data['listData'] = $this->setting_model->listBookBank($data);
		$this->load->view('record_recipe_main',$data);
		$this->load->view('record_recipe_main_script',$data);
	}
    //-------------------------------
	public function printRevieve(){
		$data=array();
		$RecieveID = $this->input->post('RecieveID');
		$data['getPrint']=$this->receive_model->GetPrintRevieve($RecieveID);
		$this->load->view('recieve_print',$data);
	}
    //-------------------------------  installment_period,installment_amt
	public function updateRecieveDetail(){
		$data=array();
		$data['carcheck']='0';
		$data['carcheck_amt'] = 0;
		$data['tax']='0';
		$data['tax_amt'] = 0;
		$data['tax_service']='0';
		$data['tax_service_amt'] = 0;
		$data['act']='0';
		$data['act_amt']=0;
		$data['insurance']='0';
		$data['insurance_amt'] =0;
		$data['date_recieve'] =0;
		$data['insurance_id'] =0;
		$data['pay_type'] =0;
		
		$data['bank_id'] =0;
		$data['reCieveID'] =0;
		$data['reCieveDetailID'] =0;
		$data['dc_cost'] =0;
		
		$dataPreview = $this->input->post('inputData');
		//print_r($dataPreview);
		// [carcheck_amt, tax_amt , tax_service_amt ,act_amt,insurance_amt,installment_period,installment_amt ] ins_data_type
		$data['carcheck_amt'] = $dataPreview[0];
		$data['tax_amt'] = $dataPreview[1];
		$data['tax_service_amt'] = $dataPreview[2];
		$data['act_amt'] = $dataPreview[3];
		$data['insurance_amt'] = $dataPreview[4];
		$data['installment_period'] = $dataPreview[5];
		$data['installment_amt'] = $dataPreview[6];
		$data['reCieveID'] = $dataPreview[7];
		$data['date_recieve'] = $dataPreview[8];
		$data['insurance_id'] =  $dataPreview[9];
		$data['pay_type'] =  $dataPreview[10];
		$data['bank_id'] =  $dataPreview[11];
		$data['reCieveDetailID'] =  $dataPreview[12];
		$data['ins_data_type'] =  $dataPreview[13];
		$data['dc_cost'] =  $dataPreview[14];
		//-----set value --------------//
		if($data['carcheck_amt']>0){
			$data['carcheck']='1';
		}
		if($data['tax_amt']>0){
			$data['tax']='1';
		}
		if($data['tax_service_amt']>0){
			$data['tax_service']='1';
		}
		if($data['act_amt']>0){
			$data['act']='1';
		}
		if($data['insurance_amt']>0){
			$data['insurance']='1';
		}
		if($data['dc_cost']>0){
			$data['dc_cost_check']='1';
		}
		//print_r($data);
		if($data['dc_cost']==0){ $data['dc_cost_check'] =0; }else{ $data['dc_cost_check'] =1; }
		$result = $this->receive_model->updateRecieveDetail($data);
		echo json_encode($result);
	}
    //-------------------------------insID, insType , dataID
	public function getValue(){
		$data=array();
		$dataPreview = $this->input->post('inputData');
		//print_r($dataPreview);
		$data['insID'] = $dataPreview[0];
		$data['insType'] = $dataPreview[1];
		$data['dataID'] = $dataPreview[2];
		$data['gettype'] = $dataPreview[3];
		$getData =  $this->receive_model->getValuePayment($data);
		echo json_encode($getData);
	}
    //-------------------------------
	public function getInstallmentOne(){
		$data=array();
		$dataPreview = $this->input->post('inputData');
		$data['insurance_id'] = $dataPreview[0];
		$data['period'] = $dataPreview[1];
		$getData =  $this->receive_model->getInstallmentOne($data);
		echo json_encode($getData);
	}
    //------------------------------- upateVale:upateVale, mainID:mainID
	public function updateCheckPayment(){
       $param=array();
	   $param = $this->input->post();
	   $resultData = $this->receive_model->updateCheckPayment($param);
	   echo json_encode($resultData);
	}
    //-------------------------------
	public function getRecieveList(){
		$data=array();
		$data = $this->input->post();
		
		$data['dataStaus'] =1;
		$data['resultData'] = $this->receive_model->getRecieveList($data);
		//print_r($data['resultData']);
		//-----get user cheakpaymet---
		$data['audit']=$this->receive_model->cancheckPayment($this->session->userdata('user_id'));
		//----------------------------
		$this->load->view('recieve_list',$data);
	}
    //-------------------------------
	public function report_recieve(){
		$data['data_status']='1';
		if($this->session->userdata('user_branch')=='2'){
			$data['selectBranch1']='0';
			$data['selectBranch2']='1';
		}else if($this->session->userdata('user_branch')=='1'){
			$data['selectBranch1']='1';
			$data['selectBranch2']='0';
		}
		$data['bookbankList'] = $this->setting_model->listBookBank($data);
		$data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
		$data['currMonth']=date('m');
		$data['startYear']='2023';
		$data['currYear']=date("Y");
		$this->load->view('record_recipe_index',$data);
		$this->load->view('record_recipe_index_script',$data);
	}
    //-------------------------------
	public function getRecieveReport(){
		$data=array();
		$data = $this->input->post();
		$data['resultData'] = $this->receive_model->getRecieveReport($data);
		$this->load->view('recieve_index_sub',$data);
	}
    //-------------------------------
	public function updateRecieveData(){
		$data=array();
		$data = $this->input->post();
		$resultData = $this->receive_model->updateRecieveData($data);
		echo json_encode($resultData);
	}
    //-------------------------------
	public function getPaymentForm($insurance_data_type,$CountInstallment){
	    //echo $insurance_data_type."<<>>>".$CountInstallment;
	}
    //-------------------------------
	public function DeleteRecieveIns(){
		$data=array();
		$data = $this->input->post();
		$resultData = $this->receive_model->DeleteRecieveIns($data);
		echo json_encode($resultData);
	}
    //-------------------------------getDb
    //-------------------------------getDb
	public function listRecievePaymentArea(){
		$data['postData'] = $this->input->post();
		//print_r($this->input->post());
		$data['RecieveID']= $this->input->post('RecieveID');
		$data['getDb']=$this->receive_model->listRecievePaymentArea($data['postData']);
		$data['data_status']='1';
		if($this->session->userdata('user_branch')=='2'){
			$data['selectBranch1']='0';
			$data['selectBranch2']='1';
		}else if($this->session->userdata('user_branch')=='1'){
			$data['selectBranch1']='1';
			$data['selectBranch2']='0';
		}
		//$data['bookbankList'] = $this->setting_model->listBookBank($data);
		//-----get user cheakpaymet---
        $data['audit']=$this->receive_model->cancheckPayment($this->session->userdata('user_id'));

		$this->load->view('recieve_payement_area',$data);
	}
    //-------------------------------inputData date_recieve, transfer_amt, remark ,paytype, bank_transfer_id, RecieveID , workID , insType
	public function addRecieveChild(){
		// [date_recieve, amp_recieve, remark ,paytype, bank_transfer_id, RecieveID , workID , insType ]
		$data=array();
		$dataPreview = $this->input->post('inputData');
		//print_r($dataPreview);
		$data['date_transfer'] = $this->insurance_model->translateDateToEng($dataPreview[0]);
		$data['transfer_amt'] =  $this->insurance_model->removeComma($dataPreview[1]);
		$data['remark'] = $dataPreview[2];
		$data['paytype'] = $dataPreview[3];
		$data['bank_id'] = $dataPreview[4];
		$data['RecieveID'] = $dataPreview[5];
		$data['workID'] = $dataPreview[6];
		$data['insType'] = $dataPreview[7];
		$data['payment_by'] = $dataPreview[8];
		$data['other_payment'] = $dataPreview[9];
		$data['recieve_normal'] = $dataPreview[10];
	    //print_r($data);
		$resultData = $this->receive_model->addRecieveChild($data);
		echo json_encode($resultData);
		//print_r($data);
	}
    //-------------------------------
	public function deleteReciveList(){
		$data=array();
		$data = $this->input->post();
		$resultData = $this->receive_model->deleteReciveList($data);
		echo json_encode($resultData);
	}
    //-------------------------------$RecieveID
	public function deleteAllRecieve(){
		$data=array();
		$data = $this->input->post();
		$result = $this->receive_model->deleteAllRecieve($data);
		echo json_encode($result);
	}
    //-------------------------------
	public function showCustSearch(){
		$data=array();
		$data = $this->input->post();
		$data['getDb'] =$this->receive_model->showCustSearch($data);
		$this->load->view('recieve_search',$data);
	}
    //-------------------------------date_recieve date_recieve
	public function record_recipe_add($recieveID=NULL){
		$data=array();
		$data['data_status']='1';
		if($this->session->userdata('user_branch')=='2'){
			$data['selectBranch1']='0';
			$data['selectBranch2']='1';
		}else if($this->session->userdata('user_branch')=='1'){
			$data['selectBranch1']='1';
			$data['selectBranch2']='0';
		}
		$data['bookbankList'] = $this->setting_model->listBookBank($data);
		//------set value -----------------// paytype date_recieve amp_recieve bank_transfer_id  remark
		if($recieveID==''){
			$data['payment_by']='';
			$data['pay_type']='';
			$data['date_transfer']='';
			$data['transfer_amt']='';
			$data['bank_transfer_id']='0';
			$data['remark']='';
			$data['RecieveID']='0';
			$data['bank_id']='x';
			$data['other_payment']='';
			$data['recieve_normal']='';
		}else{
			$getData = $this->receive_model->getRecieveOne($recieveID);
			if(!isset($getData['DataID'])){
				echo "<center>Error 404 ไม่พบข้อมูล</center>";
				exit();
			}
			//print_r($getData);
		    $data['date_transfer']=$this->insurance_model->translateDateToThai($getData['date_transfer']);;
			$data['transfer_amt']=$getData['transfer_amt'];
			$data['bank_id']=$getData['bank_id'];
			$data['remark']=$getData['remark'];
			$data['RecieveID']=$getData['DataID'];
			$data['pay_type']=$getData['pay_type'];
			$data['payment_by']=$getData['payment_by'];
			$data['other_payment']=$getData['other_payment'];
			$data['recieve_normal']=$getData['recieve_normal'];
		}

		//-----get user cheakpaymet---
        $data['audit']=$this->receive_model->cancheckPayment($this->session->userdata('user_id'));

		$this->load->view('record_recipe_add',$data);
		$this->load->view('record_recipe_add_script',$data);
	}
}