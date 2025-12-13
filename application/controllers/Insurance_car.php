<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Insurance_car extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        //$this->load->model('User_model');
        //$this->load->model('Control_model');
        //$this->load->model('Download_model');
		$this->load->model('user_model');
        $this->load->model('setting_model');
        $this->load->model('insurance_model');
        $this->load->model('report_model');
		if($this->session->userdata('user_id')==''){
			redirect(base_url().'login', 'refresh');
		}
    }	
	//------------------------------------------
	public function deleteImages(){
		$imagesID=$this->input->post('imagesID');
		$resultData = $this->insurance_model->deleteImages($imagesID);	
		echo json_encode($resultData);
	}
	//------------------------------------------
	public function list_insurance_images_file(){
		$work_id=$this->input->post('workID');
		$data['list_file']=$this->insurance_model->list_insurance_images_file($work_id);	
		$this->load->view('insurance_list_images',$data);
	}
	//------------------------------------------
	public function SaveInsFile(){
		$pass = array();
		$upload_path = './uploadfile/insurance_images/';
		$upload_pathName = 'uploadfile/insurance_images/';
		$config['upload_path'] = $upload_path;
		//allowed file types. * means all types
		$config['allowed_types'] = 'jpg|png|gif|jpeg';
		//allowed max file size. 0 means unlimited file size
		$config['max_size'] = '0';
		//max file name size
		$config['max_filename'] = '20';
		//whether file name should be encrypted or not
		$config['encrypt_name'] = TRUE;
		//store image info once uploaded
		$image_data = array();
		//check for errors
		$is_file_error = FALSE;
		 if(isset($_FILES) && count($_FILES)>0){
				$pass['checkif'] = '2';
				$this->load->library('upload', $config);
 				$this->load->library('image_lib');
			    $pass['ErrorImg'] = '';
				$pass['imgNameUpdate'] = [];
				$slip_colname_index = 0;
				foreach ($_FILES as $input_file_name => $each_input_file) {
				if($each_input_file['error']==0){ //have file
					if (!$this->upload->do_upload($input_file_name)) {
						$pass['ErrorImg'] .= "ErrorUpload - ".$each_input_file['name']." / ".$this->upload->display_errors() ."\n";
					}else{
						$image_data = $this->upload->data();
						$config_img = [];
	                    $config_img['image_library'] = 'gd2';
	                    $config_img['source_image'] = $image_data['full_path']; //get original image
	                    $config_img['maintain_ratio'] = TRUE;
	                    $config_img['width'] = 1024;
	                    $config_img['height'] = 1024;
	                    $this->image_lib->initialize($config_img);
						if (!$this->image_lib->resize()) {
	                       $pass['ErrorImg'] .=  "ErrorResize - ".$each_input_file['name'] ."\n";
	                    }else{
							$pass['imgNameUpdate'][] = $upload_pathName.$this->upload->data('file_name');
					    	//$data[$arr_deposit_slip_col[$slip_colname_index]] = $upload_pathName.$this->upload->data('file_name');;
							$slip_colname_index++;
						}
						$this->image_lib->clear();
						//---------------update db----------
						$insuranceID = $this->input->post('workID');
						$pass['SqlStatus']=$this->insurance_model->updateInsuranceImagesFiles($insuranceID,$this->upload->data('file_name'));
						//----------------------------------
					}
				}
			}
		}
		echo json_encode($pass);
    }
	//------------------------------------------
	public function updatePaymentAmount(){
		$data = $this->input->post();
		$resultData=$this->insurance_model->updatePaymentAmount($data);
		echo json_encode($resultData);
	}
	//------------------------------------------
	public function UpdateCashDuedate(){
		$data = $this->input->post();
		$resultData=$this->insurance_model->UpdateCashDuedate($data);
		echo json_encode($resultData);
	}
	//------------------------------------------
	public function UpdatePayType(){
		$data = $this->input->post();
		$resultData=$this->insurance_model->UpdatePayType($data);
		echo json_encode($resultData);
	}
	//------------------------------------------
	public function DeleteInsurance(){
		$data = $this->input->post();
		$resultData=$this->insurance_model->DeleteInsurance($data);
		echo json_encode($resultData);
	}
	//------------------------------------------
	public function callPremium(){
		$data = $this->input->post();
		$resultData=$this->insurance_model->callPremiumValue($data);
		echo json_encode($resultData);
	} 
	//------------------------------------------ 
	public function SearchAllCustomer(){
		$data = $this->input->post();
		$data['getData'] = $this->insurance_model->SearchAllCustomer($data);
		$this->load->view('search_customer_data',$data);
	}
	//------------------------------------------ 
	public function search_customer_insurance(){
		 $data=array();
		 $data['startYear']="2023";
		 $data['currentYear'] = date("Y");
		 $agentStatus = '1';
		 $data['listAgent'] = $this->setting_model->listAgent($agentStatus); 
		 $this->load->view('search_customer',$data);
		 $this->load->view('search_customer_script');
	}
	//------------------------------------------ bookbankList
	public function insurance_billing($keygroup=null,$month=null,$year=null){
		  $data['keygroup'] = $keygroup;
		  $data['currentDate'] = date("d");
		//------get control--data 
		 $dataControl = $this->insurance_model->getMonthYearControl($data);
		 //print_r($dataControl);
		 $data['currentMonth']  = $dataControl['currentMonth'];
		 $data['currentYear']  =  $dataControl['currentYear'];
		  $data['startYear'] = 2022;
		  $data['startday']=date("d");
		  $data['currYear'] = date("Y");
		  $data['rangeYear']=($data['currYear']-$data['startYear'])+1;
		  $data['currMonth']=date('m'); 
		  $data['rangeYear']  = $data['currentYear'] - $data['startYear'];
		  $dataStatus =1;
		  $data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
		  $data['currMonth']=date('m');
		  $dataStatus ='1';$use_branch=1;
		  $data['listInsCorp'] = $this->setting_model->listCompany($dataStatus,$use_branch);  
		  $agentStatus = '1';
		  $data['listAgent'] = $this->setting_model->listAgent($agentStatus); 
		  $data['listCode'] = $this->setting_model->listCode($dataStatus); 
		  $data['periodDateStart'] = $data['startday'];
		  $data['periodMonthStart'] = $data['currMonth'];
		  $data['periodDateEnd'] = $data['startday'];
		  $data['periodMonthEnd'] = $data['currMonth'];
		  $data['periodYear'] = $data['currYear'];
		  if(isset($keygroup)){
			  $data['BillData'] = $this->insurance_model->getBillData($keygroup);
			  if(isset($data['BillData']['period_bill_start'])){
				  $dateBillStartAraay = explode("-",$data['BillData']['period_bill_start']);
				  $data['periodDateStart'] = $dateBillStartAraay[2];
			  	  $data['periodMonthStart'] = $dateBillStartAraay[1];
			  }
			   if(isset($data['BillData']['period_bill_end'])){
				  $dateBillEndArray = explode("-",$data['BillData']['period_bill_end']);
				  $data['periodDateEnd'] = $dateBillEndArray[2];
			  	  $data['periodMonthEnd'] = $dateBillEndArray[1];
			      $data['periodYearperiodYear'] = $dateBillEndArray[0];
			  }
		  }
		  $this->load->view('insurance_billing',$data);
		  $this->load->view('insurance_billing_script');
	}
	//------------------------------------------ 
	public function updateAmountInstallment(){
		$data = $this->input->post();
		$resultData = $this->insurance_model->updateAmountInstallment($data); 
	    echo json_encode($resultData);
	}
	//------------------------------------------ 
	public function updateCashPayment(){
		$data = $this->input->post();
		$resultData = $this->insurance_model->updateCashPayment($data); 
	    echo json_encode($resultData);
	}
	//------------------------------------------ calculateRemainPayment insWorkID
	public function calculateRemainPayment(){
		$insWorkID = $this->input->post('insWorkID');
		$resultData = $this->insurance_model->calculateInsuranceRemainPayment($insWorkID); 
	    echo json_encode($resultData);
	}
	//------------------------------------------ updatePeroidPayment dataID theValue
	public function updatePeroidPayment(){
		$data = array();
		$data = $this->input->post();
		$resultData = $this->insurance_model->updatePeroidInsurancePayment($data);  
	    echo json_encode($resultData);
	}
	//------------------------------------------ updateDuedatePayment  dataID duedate
	public function updateDuedatePayment(){
		$data = array();
		$data = $this->input->post();
		$resultData = $this->insurance_model->updateInsuranceDuedatePayment($data); 
	    echo json_encode($resultData);
	}
	//------------------------------------------
	 public function UpdatePayment(){  
		 //  dataID:dataID,receipt_date:receipt_date,remark:remark,pay_type:pay_type,bank_id:bank_id,payStatus:payStatus
		$data = array();
		$data = $this->input->post();
		$resultData = $this->insurance_model->UpdateInsurancePayment($data);
	    echo json_encode($resultData);
   }
	//------------------------------------------
	public function calculateInstallment(){
		$data = array();
		$data = $this->input->post();
		$resultData = $this->insurance_model->setInsuranceInstallment($data);
		echo json_encode($resultData);
	} 
	//------------------------------------------insWorkID
	public function listInstallment(){
		$insuranceID = $this->input->post('insWorkID');
		$data['insurancePayment'] = $this->insurance_model->getWorkPayment($insuranceID);
		$CustData  = $this->insurance_model->getInsuranceDetail2($insuranceID);
		foreach($CustData AS $custDetail){ }
		$data['insurance_total']=number_format($custDetail->insurance_total,2);
		$data['data_status']='1';
		if($this->session->userdata('user_branch')=='2'){
			$data['selectBranch1']='0';
			$data['selectBranch2']='1';
		}else if($this->session->userdata('user_branch')=='1'){ 
			$data['selectBranch1']='1';
			$data['selectBranch2']='0';
		}
		$data['bookbankList'] = $this->setting_model->listBookBank($data);
		$this->load->view('insurance_installment_talble', $data);
	}  
	//------------------------------------------
	public function print_cover_insurance(){
	}
	//------------------------------------------is_installment  cash_duedate insurance_type_name
	public function printInsurancePayment(){
		$insuranceID = $this->input->post('insWorkID');
		$actionType = $this->input->post('actionType');
		$data['installment_peroid'] = $this->input->post('installment_peroid');
		$data['insurancePayment'] = $this->insurance_model->getWorkPayment($insuranceID); 
		$CustData  = $this->insurance_model->getInsuranceDetail2($insuranceID);
		foreach($CustData AS $custDetail){ }
		$data['cust_name']=$custDetail->cust_name;
		$data['cust_nickname']=$custDetail->cust_nickname;
		$data['cust_telephone_1']=$custDetail->cust_telephone_1;
		$data['cust_telephone_2']=$custDetail->cust_telephone_2;
		$data['is_corporation']=$custDetail->is_corporation;
		$data['insurance_type_name']=$custDetail->insurance_type_name;
		$data['actTypeName']=$custDetail->actTypeName;
		$data['insurance_start']=$this->insurance_model->translateDateToThai($custDetail->insurance_start);
		$data['insurance_price']=$custDetail->insurance_price;
		$data['insurance_total']=$custDetail->insurance_total;
		$data['act_price_total']=$custDetail->act_price_total;  
		$data['tax_price']=$custDetail->tax_price;
		$data['tax_service']=$custDetail->tax_service;
		$data['car_check_price']=$custDetail->car_check_price;
		$data['act_cash']=$custDetail->act_cash;
		$data['ins_cash']=$custDetail->ins_cash;
		$data['payment_amount']=$custDetail->payment_amount;
		$data['agent_name']=$custDetail->agent_name;
		$data['amt_recieve_carcheck']=$custDetail->amt_recieve_carcheck;
		$data['amt_recieve_tax']=$custDetail->amt_recieve_tax;
		$data['amt_recieve_act']=$custDetail->amt_recieve_act;
		$data['amt_recieve_ins']=$custDetail->amt_recieve_ins;
		if(isset($custDetail->cash_duedate)){ $data['cash_duedate']=$this->insurance_model->translateDateToThai($custDetail->cash_duedate); }else{  $data['cash_duedate']='x'; }
		$data['totalPriceWork']= $data['insurance_total']+$data['act_price_total']+$data['tax_price']+$data['tax_service']+$data['car_check_price'];
		$data['vehicle_regis']=$custDetail->vehicle_regis;
		$data['province_regis']=$custDetail->province_regis;
		$data['province_name']=$custDetail->province_name;
		$data['is_installment']=$custDetail->is_installment;
		$data['amount_installment']=$custDetail->amount_installment;
		if($custDetail->act_date_start!='0000-00-00'){
			$data['act_date_start']=$this->insurance_model->translateDateToThai($custDetail->act_date_start);
		}else{
			$data['act_date_start']="";
		}
		if($custDetail->insurance_start!='0000-00-00'){
			$data['insurance_start']=$this->insurance_model->translateDateToThai($custDetail->insurance_start);
		}else{
			$data['insurance_start']="";
		}
		$data['StartCover']=$data['insurance_start'];
		if(($custDetail->insurance_start!='0000-00-00')&&($custDetail->act_date_start!='0000-00-00')){
			$data['StartCover']=$data['insurance_start'];
		}else if(($custDetail->insurance_start=='0000-00-00')&&($custDetail->act_date_start!='0000-00-00')){
			$data['StartCover']=$data['act_date_start'];
		}else if(($custDetail->insurance_start=='0000-00-00')&&($custDetail->act_date_start=='0000-00-00')){
			$data['StartCover'] = '';
		}
		//$data['sql']=$CustData['sql']; insurance_total totalPriceWork
		$resultData = $this->insurance_model->calculateInsuranceRemainPayment($insuranceID); 
		$data['isNotPaid']=number_format($resultData['sum_not_paid'],2);
		$data['isPaid']=number_format($resultData['sum_paid'],2);
		$data['insurancePayment'] = $this->insurance_model->getWorkPayment($insuranceID); 
		if($actionType=='normal'){
			$this->load->view('insurance_installment_print', $data);
		}else if($actionType=='cover'){
			$this->load->view('insurance_installment_cover', $data);
		}
	}
	//------------------------------------------ insurancePayment
	public function SaveInsurance(){
		$data = array();
		$data = $this->input->post();
		$resultData = $this->insurance_model->SaveInsurance($data);
		echo json_encode($resultData);
	}
	//------------------------------------------
	public function setCutomerType(){
		$param = array();
		$param = $this->input->post();
		$result = $this->insurance_model->setCutomerType($param);
		echo json_encode($result);
	}
	//------------------------------------------
	public function listIns(){
		$data=$this->input->post();
		$data['data']=$this->insurance_model->ListInsurance($data);
		$this->load->view('list_insurance',$data);
	}
	//------------------------------------------act_type_id dateWork car_check_time listCarType date_work
	public function work_insurance_add($insuranceID=NULL,$anticipate_reference=NULL,$referID=NULL){
		$data=array();
		$data['workID'] = $insuranceID;
		$data['PostworkID'] = $insuranceID;
		//-----get bookbank----// brand_id listCode
		$data['data_status']='1';
		if($this->session->userdata('user_branch')=='2'){
			$data['selectBranch1']='0';
			$data['selectBranch2']='1';
		}else if($this->session->userdata('user_branch')=='1'){ 
			$data['selectBranch1']='1';
			$data['selectBranch2']='0';
		}
		$data['bookbankList'] = $this->setting_model->listBookBank($data);
		$brand_status ='1';
		$data['listCarBrand'] = $this->setting_model->listCarBrandInsurance($brand_status);
		$data['checkCusttype1']='';
		$data['checkCusttype2']='';
		if((isset($insuranceID))&&($anticipate_reference!='anticipate')&&($anticipate_reference!='renew')){
			///if($anticipate_reference=='renew'){ $insuranceID = $referID;  }
			$CustData  = $this->insurance_model->getInsuranceDetail($insuranceID);
			foreach($CustData AS $custDetail){ }
			//print_r($custDetail);
			//echo act_price_total
			$data['custID']=$custDetail->id;
			$data['cust_name']=$custDetail->cust_name;
			$data['cust_nickname']=$custDetail->cust_nickname;
			$data['cust_telephone_1']=$custDetail->cust_telephone_1;
			$data['cust_telephone_2']=$custDetail->cust_telephone_2;
			$data['is_corporation']=$custDetail->is_corporation;
			$data['line_id']=$custDetail->line_id;
			$data['vehicle_regis']=$custDetail->vehicle_regis;
			$data['province_regis']=$custDetail->province_regis;
			$data['date_regist']=$custDetail->date_regist;
			$data['year_car']=$custDetail->year_car;
			$data['vin_no']=$custDetail->vin_no;
			$data['car_brand']=$custDetail->car_brand;
			$data['car_model']=$custDetail->car_model;
			$data['car_type_id']=$custDetail->car_type_id;
			$data['type_premium_id']=$custDetail->type_premium_id;
			//$data['type_premium_id']=$custDetail->type_premium_id; brand_id act_price_total_full
			$data['engine_size']=$custDetail->engine_size;
			$data['showCarBt']='0';
			$data['carID']=$custDetail->id;
			$data['brand_id']=$custDetail->brand_id;
			$data['car_check_pay_type']=$custDetail->car_check_pay_type;
			$data['car_check_pay_bank_id']=$custDetail->car_check_pay_bank_id;
			$data['act_for_rent']=$custDetail->act_for_rent;
			if(isset($data['car_check_receipt_date'])){
				$data['car_check_receipt_date']= $this->insurance_model->translateDateToThai($custDetail->car_check_receipt_date);
			}else{
				$data['car_check_receipt_date']='';
			}
			$data['cash_duedate']=$this->insurance_model->translateDateToThai($custDetail->cash_duedate);;
			$data['pay_cash_status']=$custDetail->pay_cash_status;
			$data['act_pay_type']=$custDetail->act_pay_type;
			$data['act_pay_bank_id']=$custDetail->act_pay_bank_id;
			//if(isset($data['act_receipt_date'])){
				$data['act_receipt_date']=$this->insurance_model->translateDateToThai($custDetail->act_receipt_date);
			//}else{
			//	$data['act_receipt_date']='';	
			//}
			$data['ins_pay_type']=$custDetail->ins_pay_type;
			$data['ins_pay_bank_id']=$custDetail->ins_pay_bank_id;
			//if(isset($data['ins_receipt_date'])){
				$data['ins_receipt_date']=$this->insurance_model->translateDateToThai($custDetail->ins_receipt_date);
			//}else{
			//	$data['ins_receipt_date']='';
			//}
			$data['tax_pay_type']=$custDetail->tax_pay_type;
			$data['tax_pay_bank_id']=$custDetail->tax_pay_bank_id;
			//if(isset($data['tax_receipt_date'])){
				$data['tax_receipt_date']=$this->insurance_model->translateDateToThai($custDetail->tax_receipt_date);
			//}else{
			//	$data['tax_receipt_date']='';
			//}
			$data['amount_installment']=$custDetail->amount_installment;
			if($custDetail->is_corporation==1){
				$data['chkCorp']="checked";
			}else{
				$data['chkCorp']="";
			}
			if($custDetail->date_regist!=''){
				$dateArray = explode("-",$custDetail->date_regist);
				$data['date_regist']=$dateArray[2];
				$data['month_regist']=$dateArray[1];
				$data['year_car']=$dateArray[0];
			}else{
				$data['date_regist']='';
				$data['month_regist']='';
				$data['year_car']='';
			}
			//--------warning---not_recieve_warning check_recieve_warning
			$data['check_recieve_warning'] = "";
			$data['check_not_recieve_warning'] = "";
			$data['recieve_warning_yes'] = "";
			if($custDetail->recieve_warning=='1'){
				$data['check_recieve_warning']= "checked";
				$data['check_not_recieve_warning'] = "";
			}
			if($custDetail->not_recieve_warning=='1'){
				$data['check_not_recieve_warning'] = "checked";
			}
			if($custDetail->recieve_warning_yes=='1'){
				$data['recieve_warning_yes'] = "checked";
			}
			// agent_id act_date_start insurance_type_id  agent_id code_id insurance_total dateWork amount_installment car_check_receipt_date
			$data['insID']= $custDetail->id;
			$data['ins_code_id']= $custDetail->ins_code_id ;
			$data['agent_id']= $custDetail->agent_id ;
			$data['insurance_no']= $custDetail->insurance_no ;
			$data['insurance_date_contract']= $this->insurance_model->translateDateToThai($custDetail->insurance_date_contract);
			$data['insurance_start']= $this->insurance_model->translateDateToThai($custDetail->insurance_start);
			$data['insurance_end']= $this->insurance_model->translateDateToThai($custDetail->insurance_end);
			$data['insurance_corp_id'] = $custDetail->insurance_corp_id ;
			$data['insurance_type_id'] = $custDetail->insurance_type_id ;
			$data['insurance_fix_garace'] = $custDetail->insurance_fix_garace ;
			$data['insurance_renew'] = $custDetail->insurance_renew ;
			$data['date_send_document'] =$this->insurance_model->translateDateToThai($custDetail->date_send_document);
			$data['sum_insured'] = $custDetail->sum_insured ;
			$data['dedug'] = $custDetail->dedug ;
			$data['insurance_price'] = $custDetail->insurance_price ;
			$data['insurance_discount'] = $custDetail->insurance_discount ;
			$data['insurance_duty'] = $custDetail->insurance_duty ;
			$data['insurance_tax'] = $custDetail->insurance_tax ;
			$data['insurance_total_net'] = $custDetail->insurance_total_net ;
			$data['insurance_total'] = $custDetail->insurance_total ;
			$data['ins_cancel_no'] = $custDetail->ins_cancel_no ;
			$data['followDocIns'] = $custDetail->followDocIns ;
			$data['ins_cancel_date'] = $this->insurance_model->translateDateToThai($custDetail->ins_cancel_date);
			$data['ins_cancel_reason'] = $custDetail->ins_cancel_reason ;
			$data['insurance_remark'] = $custDetail->insurance_remark ;
			$data['paid_date'] = $this->insurance_model->translateDateToThai($custDetail->paid_date);
			$data['insurance_remark'] = $custDetail->insurance_remark ;
			$data['ins_paid'] = $custDetail->ins_paid ;
			$data['ins_paid_remark']  = $custDetail->ins_paid_remark ;
			$data['payment_due_date'] = $this->insurance_model->translateDateToThai($custDetail->payment_due_date);
			$data['date_insurance_notifi_endorse'] = $this->insurance_model->translateDateToThai($custDetail->date_insurance_notifi_endorse) ;
			$data['date_insurance_document_endorse'] =$this->insurance_model->translateDateToThai($custDetail->date_insurance_document_endorse) ;
			$data['ins_date_work'] =$this->insurance_model->translateDateToThai($custDetail->ins_date_work) ;
			$data['car_check_receipt_date'] =$this->insurance_model->translateDateToThai($custDetail->car_check_receipt_date) ;
			$data['insurance_number_endorse'] = $custDetail->insurance_number_endorse ;
			$data['insurance_remark_endorse'] = $custDetail->insurance_remark_endorse ;
			$data['is_installment'] = $custDetail->is_installment ;
			$data['payment_amount'] = $custDetail->payment_amount ;
			$data['data_status'] = $custDetail->data_status ;
			 $dWorkArray = explode("-", $custDetail->date_work);
			 $data['dateWork']=$dWorkArray[2]."/".$dWorkArray[1]."/".($dWorkArray[0]+543);
			$data['amt_recieve_carcheck'] = $custDetail->amt_recieve_carcheck ;
			$data['amt_recieve_tax'] = $custDetail->amt_recieve_tax ;
			$data['amt_recieve_act'] = $custDetail->amt_recieve_act ;
			$data['amt_recieve_ins'] = $custDetail->amt_recieve_ins ; 
			$data['carcheck_cash'] = $custDetail->carcheck_cash ;
			$data['tax_cash'] = $custDetail->tax_cash ;
			$data['act_cash'] = $custDetail->act_cash ;
			$data['ins_cash'] = $custDetail->ins_cash ;
			//------payment---case
			$data['cash_collection_carcheck'] = $custDetail->cash_collection_carcheck ;
			$data['cash_collection_act'] = $custDetail->cash_collection_act ;
			$data['cash_collection_tax'] = $custDetail->cash_collection_tax ;
			$data['cash_collection_ins'] = $custDetail->cash_collection_ins ;
			$data['tran_collection_carcheck'] = $custDetail->cash_collection_carcheck ;
			$data['tran_collection_act'] = $custDetail->tran_collection_act ;
			$data['tran_collection_tax'] = $custDetail->cash_collection_tax ;
			$data['tran_collection_ins'] = $custDetail->tran_collection_ins ;
			$data['recieve_id_carcheck'] = $custDetail->recieve_id_carcheck ;
			$data['recieve_id_act'] = $custDetail->recieve_id_act ;
			$data['recieve_id_tax'] = $custDetail->recieve_id_tax ;
			$data['recieve_id_ins'] = $custDetail->recieve_id_ins ;
			// act_remark act_date_start
			$data['act_no'] = $custDetail->act_no ;
			$data['corp_id'] = $custDetail->corp_id ;
			$data['ins_code_id'] = $custDetail->ins_code_id ;
			$data['act_type_id'] = $custDetail->act_type_id ;
			$data['act_price'] = $custDetail->act_price ;
			$data['act_discount'] = $custDetail->act_discount ;
			$data['act_tax'] = $custDetail->act_tax ;
			$data['act_vat'] = $custDetail->act_vat ;
			$data['act_price_net'] = $custDetail->act_price_net ;
			$data['act_price_total'] = $custDetail->act_price_total ;
			$data['act_agent_id'] = $custDetail->act_agent_id ;
			$data['act_code_id'] = $custDetail->act_code_id ;
			 if($data['act_price_total'] != '0.00'){
				$data['doAct'] ='1';
			}else{
				$data['doAct'] ='0';
			}
			$data['act_payment_remark'] = $custDetail->act_payment_remark ;
			$data['act_paid'] = $custDetail->act_paid ;
			$data['act_date_start'] = $this->insurance_model->translateDateToThai($custDetail->act_date_start) ;
			$data['act_date_end'] = $this->insurance_model->translateDateToThai($custDetail->act_date_end) ;
			$data['act_price_total_full'] = $custDetail->act_price_total_full ;
			//-----tax
			$data['taxID'] = $custDetail->id;
			$data['tax_price'] = $custDetail->tax_price;
			$data['tax_recall'] = $custDetail->tax_recall;
			$data['tax_pay_date'] = $this->insurance_model->translateDateToThai($custDetail->tax_pay_date);
			$data['date_registration_end'] = $this->insurance_model->translateDateToThai($custDetail->date_registration_end);
			$data['have_manual'] = $custDetail->have_manual;
			$data['do_register'] = $custDetail->do_register;
			$data['tax_remark'] = $custDetail->tax_remark;
			$data['tax_paid'] = $custDetail->tax_paid;
			$data['tax_service'] = $custDetail->tax_service;
			//-----inspection--/car_type_id
			  $data['inspecID'] =$custDetail->id;
		      $data['car_check_date'] =$this->insurance_model->translateDateToThai($custDetail->car_check_date);
		      if(isset($custDetail->car_check_time)){ 
			   $data['car_check_time'] =$custDetail->car_check_time;
		     }else{
				 $data['car_check_time'] ="00:00:00"; 
			  }
			  $data['car_check_price'] =$custDetail->car_check_price;
		      $data['car_check_discount'] =$custDetail->car_check_discount;
		      $data['car_check_total'] =$custDetail->car_check_total;
		      $data['registration_book'] =$custDetail->registration_book;
		      $data['car_check_remark'] =$custDetail->car_check_remark;
		      $data['free_cancel'] =$custDetail->free_cancel;
		      $data['check_pass'] =$custDetail->check_pass;
		      $data['car_check_paid'] =$custDetail->car_check_paid;
		      $data['do_check_car'] =$custDetail->do_check_car;
			 //------customer type----//
			if($custDetail->cust_type=='customer'){
				$data['checkCusttype1']='checked';	
			}else if($custDetail->cust_type=='agent'){
				$data['checkCusttype2']='checked';					
			}
		}else {
			$data['custID']='';
			$data['cust_name']='';
			$data['cust_nickname']='';
			$data['cust_telephone_1']='';
			$data['cust_telephone_2']='';
			$data['is_corporation']='';
			$data['line_id']='';
			$data['chkCorp']="";
			$data['vehicle_regis']='';
			$data['province_regis']='';
			$data['date_regist']='';
			$data['year_car']='';
			$data['vin_no']='';
			$data['car_brand']='';
			$data['car_model']='';
			$data['car_type_id']='';
			$data['type_premium_id']='';
			$data['engine_size']='';
			$data['showCarBt']='0';
			$data['carID']='';
			$data['brand_id']='';
			$data['cash_duedate']='';
			$data['pay_cash_status']=0;
			$data['car_check_pay_type']=0;
			$data['car_check_pay_bank_id']='x';
			$data['act_for_rent']='';
			$data['car_check_receipt_date']= '';
			$data['act_pay_type']=0;
			$data['act_pay_bank_id']='x';
			$data['act_receipt_date']='';
			$data['ins_pay_type']=0;
			$data['ins_pay_bank_id']='x';
			$data['ins_receipt_date']='';
			$data['tax_pay_type']='';
			$data['tax_pay_bank_id']=0;
			$data['tax_receipt_date']='';
			$data['amount_installment']='';
			$data['data_status'] = 1;
			$data['ins_code_id'] = "";
			$data['insurance_no'] = "";
			$data['insurance_date_contract'] = "";
			$data['insurance_start'] = "";
			$data['insurance_end'] = "";
			$data['insurance_corp_id'] = "x";
			$data['insurance_type_id'] = "x";
			$data['insurance_fix_garace'] = "";
			$data['insurance_renew'] = "";
			$data['date_send_document'] = "";
			$data['ins_code_id'] = "x";
			$data['sum_insured'] = "";
			$data['dedug'] = "";
			$data['insurance_price'] = "";
			$data['insurance_discount'] = "";
			$data['insurance_duty'] = "";
			$data['insurance_tax'] = "";
			$data['insurance_total_net'] = "";
			$data['insurance_total'] = "0";
			$data['ins_cancel_no'] = "";
			$data['ins_cancel_date'] = "";
			$data['ins_cancel_reason'] = "";
			$data['ins_cancel_no'] = "";
			$data['insurance_remark'] = "";
			$data['paid_date'] = "";
			$data['ins_paid_remark'] = "";
			$data['insurance_remark'] = "";
			$data['ins_paid'] = "";
			$data['payment_due_date'] = "";
			$data['date_insurance_notifi_endorse'] = "";
			$data['date_insurance_document_endorse'] = "";
			$data['insurance_number_endorse'] = "";
			$data['insurance_remark_endorse'] = "";
			$data['car_check_receipt_date'] ="" ;
			$data['is_installment'] = "";
			$data['payment_amount'] = '' ;
			$data['followDocIns'] = "";
			$data['agent_id']='x';			 
			//----act data-- dateWork   act_agent_id act_code_id		
			$data['act_no'] = "";
			$data['corp_id'] = "x";
			$data['code_id'] = "x";
			$data['act_type_id'] = "x";
			$data['act_price'] = "";
			$data['act_discount'] = "";
			$data['act_tax'] = "";
			$data['act_vat'] = "";
			$data['act_price_net'] = "";
			$data['act_price_total'] = "0";
			$data['act_agent_id'] = "";
			$data['act_code_id'] = "";
			$data['act_payment_remark'] = "";
			$data['act_payment_remark'] = "";
			$data['act_paid'] = "";
			$data['act_date_start'] = "";
			$data['act_date_end'] = "";
			$data['act_price_total_full'] = '0' ;
			$data['doAct'] ='0';
			$data['month_regist']='x';
			$data['workID']='0';
			$data['agent_id'] ='x';
			$date=date("d");
			$month=date("m");
			$year=date("Y");
			$data['dateWork']=$date."/".$month."/".($year+543);
			//--------warning---car_type_id
			$data['check_recieve_warning'] = "";
			$data['check_not_recieve_warning'] = "";
			$data['recieve_warning_yes'] = "";
			//-----tax
			$data['taxID'] = '';
			$data['tax_price'] = '0';
			$data['tax_recall'] = '';
			$data['tax_pay_date'] = '';
			$data['date_registration_end'] = '';
			$data['have_manual'] = '';
			$data['do_register'] = '';
			$data['tax_remark'] = '';
			$data['tax_paid'] = '';
			$data['tax_service'] = '0';
			//-----inspection--/
			  $data['inspecID'] = '';
		      $data['car_check_date'] = '';
		      $data['car_check_time'] ="00:00:00";
		      $data['car_check_price'] = '0';
		      $data['car_check_discount'] = '0';
		      $data['car_check_total'] = '0';
		      $data['registration_book'] = '';
		      $data['car_check_remark']= '';
		      $data['car_type'] = '';
		      $data['free_cancel'] = '';
		      $data['check_pass']= '';
		      $data['car_check_paid'] = '';
		      $data['do_check_car'] = '';
			$data['amt_recieve_carcheck'] ='0';
			$data['amt_recieve_tax']  ='0';
			$data['amt_recieve_act']  ='0';
			$data['amt_recieve_ins']  ='0';
			$data['carcheck_cash'] ='0';
			$data['tax_cash'] ='0';
			$data['act_cash'] ='0';
			$data['ins_cash'] ='0';
				//------payment---casetran_collection_act tran_collection_tax
			$data['cash_collection_carcheck'] = '';
			$data['cash_collection_act'] = '';
			$data['cash_collection_tax'] = '';
			$data['cash_collection_ins'] = '';
			$data['tran_collection_carcheck'] = '';
			$data['tran_collection_act'] = '';
			$data['tran_collection_tax'] = '';
			$data['tran_collection_ins'] = '';
			$data['recieve_id_carcheck'] = '0';
			$data['recieve_id_act'] = '0';
			$data['recieve_id_tax'] = '0';
			$data['recieve_id_ins'] = '0';
			$insuranceID=0;
		}
		//------Renew Data-----//
		$data['getCarCode']='0';
			if($anticipate_reference=='anticipate'){
				$anticipate_data = $this->insurance_model->getAnticipateReference($referID);
				$data['cust_name']=$anticipate_data['getData']->cust_name;
				$data['cust_nickname']=$anticipate_data['getData']->cust_nickname;
				$data['cust_telephone_1']=$anticipate_data['getData']->cust_telephone_1;
				$data['cust_telephone_2']=$anticipate_data['getData']->cust_telephone_2;
				$data['vehicle_regis']=$anticipate_data['getData']->vehicle_regis;
				$data['province_regis']=$anticipate_data['getData']->province_regis;
				$data['date_regist']=$anticipate_data['getData']->date_regist;
				$data['month_regist']=$anticipate_data['getData']->month_regist;
				$data['year_car']=$anticipate_data['getData']->year_car;
				$data['vin_no']=$anticipate_data['getData']->vin_no;
				$data['brand_id']=$anticipate_data['getData']->brand_id;
				$data['car_model']=$anticipate_data['getData']->car_model;
				$data['car_type_id']=$anticipate_data['getData']->car_type_id;
				$data['type_premium_id']=$anticipate_data['getData']->type_premium_id;
				$data['getCarCode']='1';
				$data['workID'] = "0";
			}
		$data['doCaculateIns']=0;
		if($anticipate_reference=='renew'){
			///if($anticipate_reference=='renew'){ $insuranceID = $referID;  }  date_regist month_regist  year_car date_registration_end delivery_of_documents date_registration_end
			$CustData  = $this->insurance_model->getInsuranceDetail($referID);
			foreach($CustData AS $custDetail){ }
			$data['custID']=$custDetail->id;
			$data['cust_name']=$custDetail->cust_name;
			$data['cust_nickname']=$custDetail->cust_nickname;
			$data['cust_telephone_1']=$custDetail->cust_telephone_1;
			$data['cust_telephone_2']=$custDetail->cust_telephone_2;
			$data['is_corporation']=$custDetail->is_corporation;
			$data['vehicle_regis']=$custDetail->vehicle_regis;
			$data['province_regis']=$custDetail->province_regis;
			$data['date_registration_end'] =$custDetail->date_registration_end;
			//echo ">>>".$data['date_registration_end']."<br>";
			//$dateExplodeArray = explode("-",$custDetail->date_regist);
			$dateExplodeArray = explode("-",$custDetail->date_registration_end);
			//print_r($dateExplodeArray);
			$data['date_regist']=$dateExplodeArray[2];
			$data['year_car']=$dateExplodeArray[0];
			$data['month_regist']=$dateExplodeArray[1];
			$varX = $dateExplodeArray[0];
			$newYear='';
			if(($varX!='x')&&($varX!='')){
				$newYear = $dateExplodeArray[0]+1;
			}
			//print_r($dateExplodeArray);
			//echo date("Y-m-d");
			if(($dateExplodeArray[1]!='x')&&($dateExplodeArray[2]!='x')){
				//$newYear = date("Y")+1;
				$newYear = $dateExplodeArray[0]+1;
				$newRegistEnd = $newYear."-".$dateExplodeArray[1]."-".$dateExplodeArray[2];
				$data['date_registration_end']=$this->insurance_model->translateDateToThai($newRegistEnd);
			}
			//echo ">>".$data['date_registration_end'];
			$data['vin_no']=$custDetail->vin_no;
			$data['car_brand']=$custDetail->car_brand;
			$data['car_model']=$custDetail->car_model;
			$data['car_type_id']=$custDetail->car_type_id;
			$data['type_premium_id']=$custDetail->type_premium_id;
			//$data['type_premium_id']=$custDetail->type_premium_id; brand_id act_price_total_full **insurance_price  insurance_total_net
			$data['engine_size']=$custDetail->engine_size;
			$data['showCarBt']='0';
			$data['carID']=$custDetail->id;
			$data['brand_id']=$custDetail->brand_id;
			$data['car_check_pay_type']=$custDetail->car_check_pay_type;
			$data['car_check_pay_bank_id']=$custDetail->car_check_pay_bank_id;
			$data['act_for_rent']=$custDetail->act_for_rent;
			$data['insurance_remark']=$custDetail->insurance_remark;
			$data['insurance_remark_endorse']=$custDetail->insurance_remark_endorse;
			$data['insurance_no']='';
			$data['insurance_date_contract']='';
			$data['insurance_start']='';
			$data['insurance_end']='';
			$data['ins_cancel_no']='';
			$data['ins_cancel_date']='';
			$data['date_insurance_notifi_endorse']='';
			$data['insurance_number_endorse']='';
			$data['act_date_start']='';
			$data['act_date_end']='';
			$data['tax_pay_date']='';
			$data['recieve_warning']='';
			$data['not_recieve_warning']='';
			$data['recieve_warning_yes']='';
			$data['inspecworkID']='';
			$data['getCarCode']='1';
			$data['workID'] = "0";	
			//-------get follow------//
			$returnValue  = $this->report_model->getFollowData($referID);
			$data['sum_insured'] = $returnValue['follow']['follow_sum_insured'];
			$data['insurance_price'] = $returnValue['follow']['follow_insurance_price'];
			$data['act_price'] = $returnValue['follow']['follow_act_price'];
			$data['doAct'] = '';
			//-------calculate _net
			//$Result1 =  ($data['insurance_price'] * 6.9144)/100;
			/*$Result1 =  ($data['insurance_price'] * 6.9144)/100;
			$InsTotalNet = $data['insurance_price']-$Result1;
			$data['insurance_total_net']=$InsTotalNet;
			$dutyValue =($InsTotalNet *0.4)/100;
			$data['insurance_duty']=$dutyValue;
			$x1 = $InsTotalNet;
		    $x2 = $dutyValue;
		    $taxvalue = (($x1+$x2)*7)/100;
			$data['insurance_tax'] = number_format($taxvalue,2); */
			$data['doCaculateIns']=1;
		}
		//----------------car_check_date   $carCC
	    //$data['carTypePremiumList'] = $this->insurance_model->listCarPremium($data['car_type_id']);  
		$dataStatus =1;$use_branch=1;
		$data['listAgent'] = $this->setting_model->listAgent($dataStatus); 
		$data['listCode'] = $this->setting_model->listCode($dataStatus);  
		$data['listInsCorp'] = $this->setting_model->listCompany($dataStatus,$use_branch);  
		$data['listCarType'] = $this->insurance_model->listCarTypeForInsurance($dataStatus);  
		$data['ProvinceList'] = $this->setting_model->ProvinceList(); 
		$data['workType'] = $this->setting_model->getWorkType($dataStatus); 
		$data['insurancePayment'] = $this->insurance_model->getWorkPayment($insuranceID); 
		$data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
		$data['currMonth']=date('m');
		//$this->load->view('work_car_all',$data);$this->load->view('work_car_all_script',$data);	
		//------get package act , insurance------//
		$data['listInsType']=$this->setting_model->listInsuranceType(1,1);
		$data['listActType']=$this->setting_model->listInsuranceType(2,1);
		//$data['bg_red1']="#FF8486;";
		//$data['fontWhite1']="#FFF"; 
		//$data['hilightRed'] ='background-color:#FF8486;color:white';
		$data['bg_red1']="";
		$data['fontWhite1']=""; 
		$data['hilightRed'] ='';
		$data['referID'] = $referID;
		$this->load->view('insurance_add',$data);
		$this->load->view('insurance_add_script',$data);
	}
	//------------------------------------------car_type_id:car_type_id,type_premium_id_temp:type_premium_id_temp type_premium_id_temp
	public function listCarTypePremium(){
		$data = $this->input->post();
		/*if(!isset($data['insurance_personal'])){
			 $insurance_personal = 1; // 1 personal 2 rent
		 }else{
			 $insurance_personal = $data['insurance_personal'];
		 }*/
		$resultData = $this->insurance_model->listCarTypeInsurancePremium($data);
		    echo "<option value='x'>--เลือก--</option>";
		    $txtSelect='';
		foreach($resultData AS $premium){
			if($data['type_premium_id_temp']==$premium->id){ $txtSelect="selected"; }else{ $txtSelect=''; }
			/*if($insurance_personal=='2'){
				$premium->car_type_code = $premium->car_type_code_rent;
			}*/
			echo "<option value='".$premium->id."' ".$txtSelect.">".$premium->car_type_code."&nbsp;&nbsp;&nbsp;".$premium->cc."</option>";
		}
	} 
	//------------------------------------------	
	public function UpdateAlertRemark(){
		$data = $this->input->post();
		$resultData = $this->insurance_model->UpdateAlertRemark($data);
		echo json_encode($resultData);
	}	
	//------------------------------------------	
	public function updateFollowIns(){
		$data = $this->input->post();
		$resultData = $this->insurance_model->updateFollowIns($data);
		echo json_encode($resultData);
	}
	//------------------------------------------
	public function updateAlert(){
		$data = $this->input->post();
		$resultData = $this->insurance_model->updateAlert($data);
		echo json_encode($resultData);
	}
	//------------------------------------------
	public function UpdateExpireAlert(){
		$param = $this->input->post();
		$result = $this->insurance_model->UpdateExpireAlert($param);
		echo json_encode($result);
	}
	//------------------------------------------
	public function updateExpireNote(){
		$param = $this->input->post();
		$result = $this->insurance_model->updateExpireNote($param);
		echo json_encode($result);
	}
	//------------------------------------------select_year_name,select_year
	public function getExpireList(){
		// select_year select_year_name
		$data = $this->input->post();
		$data['resultData'] = $this->insurance_model->getExpireList($data);
		$this->load->view('expire_list',$data);
	} 
	//------------------------------------------
	public function report_act_tax_expire(){
		$data['listCarType'] = $this->insurance_model->listCarType();  
		$data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
		$data['startYear']='2023';
		$data['currYear']=date("Y");
		$data['startday']=date("d");
		$data['startYear']=2022;
		$data['currYear'] = date("Y");
		$data['rangeYear']=($data['currYear']-$data['startYear'])+1;
		$data['currMonth']=date('m');  
		$this->load->view('report_act_tax_expire',$data);
		$this->load->view('report_act_tax_expire_script');
	}
	//------------------------------------------bank_acc_id:bank_acc_id,start_date:start_date,select_month_start:select_month_start,end_date:end_date,select_month_end:select_month_end,select_year:select_year
	public function loadReportBankTransfer(){
		$data = array();
		$data = $this->input->post();
		$data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");;
		$data['resultData'] = $this->insurance_model->loadReportBankTransfer($data);
		$this->load->view('transfer_report_data',$data);
	}
	//-------------------------------------------start_date select_month_start end_date select_month_end
	public function transfer_report(){
		$data['data_status']='1';
		if($this->session->userdata('user_branch')=='2'){
			$data['selectBranch1']='0';
			$data['selectBranch2']='1';
		}else if($this->session->userdata('user_branch')=='2'){ 
			$data['selectBranch1']='1';
			$data['selectBranch2']='0';
		}
		$data['bookbankList'] = $this->setting_model->listBookBank($data);
		$data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");;
		$data['startday']=date("d");
		//$data['startday']="1";
		$data['endday']=date("d");
		$data['startYear']=2022;
		$data['currYear'] = date("Y");
		$data['rangeYear']=($data['currYear']-$data['startYear'])+1;
		$data['currMonth']=date('m');  
		$this->load->view('transfer_report',$data);
		$this->load->view('transfer_report_script');
	}
	//-------------------------------------------
	public function SaveToRoOr(){
		$data = array();
		$data = $this->input->post();
		if($this->input->post('workID2')==''){
		   $data['workID'] = $this->getWorkID();
		}else{
			$data['workID']=$this->input->post('workID2');
		}
		  $data['inspecworkID'] = $data['workID'] ;
		  $data['taxWorkID'] = $data['workID'] ;
		  $data['actWorkID'] = $data['workID'] ;
		if(!isset($data['is_corporation'])){ $data['is_corporation'] = 0;}
		$resultData = $this->insurance_model->SaveToRoOr($data);
		echo json_encode($resultData);
	}
	//-------------------------------------------car_type_id
	public function setdecardedug(){
		$car_type_id=$this->input->post('car_type_id');
		$type_premium_id=$this->input->post('type_premium_id');
		$resultData=$this->insurance_model->setdecardedug($car_type_id,$type_premium_id);
		echo json_encode($resultData);
	}
	//-------------------------------------------
	public function showExpenseReport(){
		$data['start']=$this->insurance_model->translateDateToEng($this->input->post('expenses_date_start'));
		$data['end']=$this->insurance_model->translateDateToEng($this->input->post('expenses_date_end'));
		$data['showDelete']='0';
		if($data['start']==$data['end']){
			$data['txtDate']=$data['start'];
		}else{
			$data['txtDate']=$data['start']." ถึงวันที่ ".$data['end'];
		}
		$data['listExpenses']=$this->insurance_model->listExpenses($data);
		$this->load->view('list_expenses',$data);
	}
	//-------------------------------------------
	public function showExpense(){
		$data['showDelete']='1';
		$data['txtDate']='';
		$data['start']=$this->insurance_model->translateDateToEng($this->input->post('expenses_date_select'));
		$data['end']=$this->insurance_model->translateDateToEng($this->input->post('expenses_date_select'));
		$data['listExpenses']=$this->insurance_model->listExpenses($data);
		$this->load->view('list_expenses',$data);
	}
	//-------------------------------------------
	public function deleteExpense(){
		$data['dataID']=$this->input->post('dataID');
		$resultData = $this->insurance_model->deleteExpense($data);
		echo json_encode($resultData);
	}
	//-------------------------------------------
	public function saveExpense(){
		$data['expenses_date']=$this->input->post('expenses_date');
		$data['expenses_name']=$this->input->post('expenses_name');
		$data['expenses_price']=$this->input->post('expenses_price');
		$resultData = $this->insurance_model->saveExpense($data);
		echo json_encode($resultData);
	}
	//-------------------------------------------	
	public function expenses_add(){
		$data['start']=date("Y-m-d");
		$data['end']=date("Y-m-d");
		//$data['listExpenses']=$this->insurance_model->listExpenses($data);
		$data['startDay']=$this->insurance_model->translateDateToThai($data['start']);
		$this->load->view('expenses_add',$data);
		$this->load->view('expenses_add_script');
	}
	//-------------------------------------------	
	public function search_customer_inspection(){
		$data['MinYear']=$this->insurance_model->selectWorkMinYear(); 
		$data['currentYear'] = date("Y");
		$data['RangeYear']=$data['currentYear']-$data['MinYear'];
		if($data['RangeYear']==0){
			$data['RangeYear']=1;
		}
		$this->load->view('search_customer_inspection',$data);
		$this->load->view('search_customer_inspection_script');
	}	
	//------------------------------------------- 
	public function searchCustomer_inspection2(){
		$data['custname']=$this->input->post('custname');
		$data['cust_nickname']=$this->input->post('cust_nickname');
		$data['phone']=$this->input->post('phone');
		$data['registration']=$this->input->post('registration');
		$data['workType']=$this->input->post('workType');
		$data['workTypeName']=$this->input->post('workTypeName');
		$data['selectYear']=$this->input->post('selectYear');
		$data['selectYearName']=$this->input->post('selectYearName');
		$data['payment']=$this->input->post('payment');
		$data['resultSearch'] = $this->insurance_model->searchCustomer_inspection($data);
		//echo json_encode($data['resultSearch']);
		$this->load->view('search_inspect_data2',$data);
	}
	//------------------------------------------- 
	public function searchCustomer_inspection(){
		$data['custname']=$this->input->post('custname');
		$data['cust_nickname']=$this->input->post('cust_nickname');
		$data['phone']=$this->input->post('phone');
		$data['registration']=$this->input->post('registration');
		$data['workType']=$this->input->post('workType');
		$data['workTypeName']=$this->input->post('workTypeName');
		$data['selectYear']=$this->input->post('selectYear');
		$data['selectYearName']=$this->input->post('selectYearName');
		$data['payment']=$this->input->post('payment');
		$data['resultSearch'] = $this->insurance_model->searchCustomer_inspection($data);
		//echo json_encode($data['resultSearch']);
		$this->load->view('search_inspect_data',$data);
	}
	//--------------------------,
	public function listWork(){
		$data['startDate']=$this->input->post('startDate');
		$data['endDate']=$this->input->post('endDate');
		$data['resultData'] = $this->insurance_model->listWork($data);
		$this->load->view('insurance_list_work',$data);
	}
	//--------------------------
	public function deleteWork(){
		$data['workID']=$this->input->post('workID');
		$resultData = $this->insurance_model->deleteWork($data);
		echo json_encode($resultData);
	}
	//--------------------------
	public function index(){
		$startDay = date("Y-m");
		$startDay = $startDay."-01";
		//echo $startDay;
		//$data['startday'] = $this->insurance_model->translateDateToThai(date("Y-m")."-01");
		$data['startday'] = $this->insurance_model->translateDateToThai(date("Y-m-d"));
		$data['endday'] = $this->insurance_model->translateDateToThai(date("Y-m-d"));
		//------------------
		$data['currMonth'] = date('m');
		$data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
		$data['currMonth']=date('m');
		$data['startYear']='2023';
		$data['currYear']=date("Y");
		//-----------------
	    $this->load->view('insurance_car',$data);
		if($this->session->userdata('user_branch')=='1'){  //ประกันภัย
			$this->load->view('insurance_car_script');
		}else if($this->session->userdata('user_branch')=='2'){ //ตรอ
			$this->load->view('act_car_script');
		}
	}	
	//----------------------------------------
	public function work_car_summary_print($workID=NULL){
		//$this->load->view('work_car_summary_print');
		$data['allData'] = $this->insurance_model->callSummaryData($workID);
		$data['totalPrice']=0;
		$data['totalDiscount']=0;
		$data['totalNet']=0;
		$this->load->view('work_car_summary_print',$data);
	}
	//----------------------------------------	
	 public function callSummaryData(){
		 $workID = $this->input->post('workID');
		 $data['allData'] = $this->insurance_model->callSummaryData($workID);
		 if(!isset($data['allData'])){
			 $data['allData'] =array();
		 }
		 $data['totalPrice']=0;
		 $data['totalDiscount']=0;
		 $data['totalNet']=0;
		 $this->load->view('work_car_summary_detail',$data);
	 } 
	//----------------------------------------	
	public function getWorkID(){
		$resultData=$this->insurance_model->addNewWork();
		return($resultData);
	}
	//----------------------------------------	
	public function insurance_car(){
		$this->load->view('insurance_car');
	}
	//----------------------------------------	dataID
	public function  removeTransport(){
		$dataID = $this->input->post('dataID');
		$resultData  = $this->insurance_model->removeTransport($dataID); 
		echo json_encode($resultData);
	} 
	//----------------------------------------	
	public function getCarPremiumListX(){
		$car_type_id=$this->input->post('car_type_id');
		$type_premium_id=$this->input->post('type_premium_id');
		$carCC = $this->setting_model->listPremium2($car_type_id);
		$txtSelect = '';
		echo '<select name="type_premium_id" class="form-select carInput" id="type_premium_id" aria-label="" onChange="setdecardedug();">';
		echo '<option value="x">--เลือก---</option>';
		foreach($carCC AS $cc){
			if($type_premium_id==$cc->id){ $txtSelect = 'selected'; }
			echo '<option value="'.$cc->id.'" '.$txtSelect.'>'.$cc->cc.'</option>';
			$txtSelect = '';
		}
		echo '<select>';
	}
	//----------------------------------------	
	public function getCarPremiumList(){
		$car_type_id=$this->input->post('car_type_id');
		$carCC = $this->setting_model->listPremium2($car_type_id);
		echo '<select name="type_premium_id" class="form-select carInput" id="type_premium_id" aria-label="" onChange="setdecardedug();">';
		echo '<option value="x">--เลือก---</option>';
		foreach($carCC AS $cc){
			echo '<option value="'.$cc->id.'">'.$cc->cc.'</option>';
		}
		echo '<select>';
	}
	//----------------------------------------	
	public function renewME(){
		$param=array();
		$param=$this->input->post();
		$result = $this->insurance_model->getRenewData($param);
		echo json_encode($result);
	}
	//----------------------------------------	
	public function work_car_all($custID=NULL,$carID=NULL,$workID=NULL,$action=NULL){
		$data=array();
		//-----get bookbank----//
		$data['data_status']='1';
		if($this->session->userdata('user_branch')=='2'){
			$data['selectBranch1']='0';
			$data['selectBranch2']='1';
		}else if($this->session->userdata('user_branch')=='2'){ 
			$data['selectBranch1']='1';
			$data['selectBranch2']='0';
		}
		$data['bookbankList'] = $this->setting_model->listBookBank($data);
		$brand_status ='1';
		$data['listCarBrand'] = $this->setting_model->listCarBrand($brand_status);
		//----------------car_check_date
		if(isset($custID)){
			$custDetail  = $this->insurance_model->getCustDetail($custID); 
			$data['custID']=$custDetail->id;
			$data['cust_name']=$custDetail->cust_name;
			$data['cust_nickname']=$custDetail->cust_nickname;
			$data['cust_telephone_1']=$custDetail->cust_telephone_1;
			$data['cust_telephone_2']=$custDetail->cust_telephone_2;
			$data['is_corporation']=$custDetail->is_corporation;
			if($custDetail->is_corporation==1){
				$data['chkCorp']="checked";
			}else{
				$data['chkCorp']="";
			}
			$data['showBtnCust']="0";
			//$data['readonlyCustNane']="readonly"; act_price_total_full
			$data['readonlyCustNane']="";
		}else{
			$data['custID']='';
			$data['cust_name']='';
			$data['cust_nickname']='';
			$data['cust_telephone_1']='';
			$data['cust_telephone_2']='';
			$data['is_corporation']='0';
			$data['chkCorp']="";
			$data['showBtnCust']="1";
			$data['readonlyCustNane']="";
		} 
		if(isset($carID)){
			$carData= $this->insurance_model->carDetail($carID); 
			$data['vehicle_regis']=$carData->vehicle_regis;
			$data['province_regis']=$carData->province_regis;
			$data['date_regist']=$carData->date_regist;
			$data['year_car']=$carData->year_car;
			$data['vin_no']=$carData->vin_no;
			$data['car_brand']=$carData->car_brand;
			$data['car_model']=$carData->car_model;
			$data['car_type_id']=$carData->car_type_id;
			$data['type_premium_id']=$carData->type_premium_id;
			$data['engine_size']=$carData->engine_size;
			$data['showCarBt']='0';
			$data['carID']=$carData->id;
			$data['brand_id']=$carData->brand_id;
			$data['carCC'] = $this->setting_model->listPremium2($carData->car_type_id);
			$dateArray = explode("-",$carData->date_regist);
			if(!isset($dateArray[2])){ $dateArray[2]= '';}
			if(!isset($dateArray[1])){ $dateArray[1]= '';}
			$data['date_regist']=$dateArray[2];
			$data['month_regist']=$dateArray[1];
			$data['year_car']=$dateArray[0];
			// month_regist date_regist year_car
		}else{
			$data['vehicle_regis']='';
			$data['brand_id']='0';
			$data['province_regis']='';
			$data['date_regist']='';
			$data['year_car']='';
			$data['vin_no']='';
			$data['car_brand']='';
			$data['car_model']='';
			$data['engine_size']='';
			$data['car_type_id']='x';
			$data['type_premium_id']='';
			$data['showCarBt']='1';
			$data['carID']='';
			$data['carCC'] = array();
			$data['date_regist']="";
			$data['month_regist']="x";
			$data['year_car']="";
		}
		//---------set dafault data---------//tax_paid car_check_date
		//-ins -----------
			$data['insID'] = "";
			$data['ins_code_id'] = "";
			$data['insurance_no'] = "";
			$data['insurance_date_contract'] = "";
			$data['insurance_start'] = "";
			$data['insurance_end'] = "";
			$data['insurance_corp_id'] = "x";
			$data['insurance_type_id'] = "x";
			$data['insurance_fix_garace'] = "";
			$data['insurance_renew'] = "";
			$data['date_send_document'] = "";
			$data['ins_code_id'] = "x";
			$data['sum_insured'] = "";
			$data['dedug'] = "";
			$data['insurance_price'] = "";
			$data['insurance_discount'] = "";
			$data['insurance_duty'] = "";
			$data['insurance_tax'] = "";
			$data['insurance_total_net'] = "";
			$data['insurance_total'] = "0";
			$data['ins_cancel_no'] = "";
			$data['ins_cancel_date'] = "";
			$data['ins_cancel_reason'] = "";
			$data['ins_cancel_no'] = "";
			$data['insurance_remark'] = "";
			$data['paid_date'] = "";
			$data['ins_paid_remark'] = "";
			$data['insurance_remark'] = "";
			$data['ins_paid'] = "";
			$data['payment_due_date'] = "";
			$data['date_insurance_notifi_endorse'] = "";
			$data['date_insurance_document_endorse'] = "";
			$data['insurance_number_endorse'] = "";
			$data['insurance_remark_endorse'] = "";
			$data['followDocIns'] = "";
		//----act data--
			$data['actID'] = "";
			$data['act_no'] = "";
			$data['corp_id'] = "x";
			$data['act_follow'] = "";
			$data['code_id'] = "x";
			$data['act_type_id'] = "x";
			$data['act_recieve'] = "";
			$data['act_price'] = "";
			$data['act_discount'] = "";
			$data['act_tax'] = "";
			$data['act_vat'] = "";
			$data['act_price_net'] = "";
			$data['act_price_total'] = "";
			$data['act_cancel_no'] = "";
			$data['act_cancel_reason'] = "";
			$data['act_remark'] = "";
			$data['back_act_remark'] = "";
			$data['act_payment_remark'] = "";
			$data['act_payment_remark'] = "";
			$data['act_paid'] = "";
			$data['back_act_no'] = "";
			$data['act_date_start'] = "";
			$data['act_date_end'] = "";
			$data['act_date_notify'] = "";
			$data['act_cancel_date'] = "";
			$data['act_payment_duedate'] = "";
			$data['back_act_notify_date'] = "";
			$data['back_act_recieve_date'] = "";
			$data['act_paid_day'] = "";
			$data['deduct_percent'] = "";
			$data['other_paid'] = "";
			$data['do_act'] = "";
			$data['do_act_check']="";
			$data['act_price_total_full']="";
		//--taxdata tax_pay_date
			$data['taxID'] ='';
			$data['tax_price']  = "";
			$data['tax_recall']  = "";
			$data['tax_pay_date']  = "";
			$data['date_registration_end']  = "";
			$data['have_manual']  = "";
			$data['do_register'] = "";
			$data['tax_remark']  = "";
			$data['tax_paid']  = "";
			$data['tax_service']  = "";
	  //-----inspect id----------translateDateToThai
		  $data['inspecID'] ='';
		  $data['car_check_date'] = $this->insurance_model->translateDateToThai(date("Y-m-d"));
		  //$data['car_check_time'] =date("H:i:s");
		  $data['car_check_time'] ="00:00:00";
		  $data['car_check_price'] ='';
		  $data['car_check_discount'] ='';
		  $data['car_check_total'] ='';
		  $data['registration_book'] ='';
		  $data['car_check_remark'] ='';
		  $data['car_type'] ='x';
		  $data['free_cancel'] ='';
		  $data['check_pass'] ='';
		  $data['car_check_paid'] ='';
	  //-----service----------
		$data['service_id'] ='';
		$data['car_check_price_service'] ='';
		$data['service_other_price'] ='';
		$data['service_remark'] ='';
		//----------Work detail----------
		$data['total_work_price'] = 0;
		$data['pay_type'] = 0;
		$data['bank_acc_id'] = 0;
		$data['pay_cash'] = 0;
		$data['pay_transfer'] = 0;
		$data['pay_transfer_date'] = '';
		$data['pay_cash_check'] = 0;
		$data['bank_acc_id2'] = 0;
		$data['pay_transfer_check'] = 0;
		$data['pay_transfer_check2'] = 0;
		$data['pay_transfer2'] = 0;
		$data['pay_transfer_date2'] = '';
		$data['pay_cash_overdue'] = '0';
		$data['pay_transfer_overdue'] = '0';
		$data['pay_transfer2_overdue'] = '0';
		$data['work_overdue'] = '';
		$data['date_pay_overdue'] = '';
		//-------------------- 
		if(isset($workID)){
			$data['workID']=$workID;
			  $workDetail= $this->insurance_model->getWorkDetail($workID); 
			if($workDetail=='x'){
				redirect(base_url().'Insurance_car', 'refresh');
			}
			$data['cust_id'] =$workDetail->cust_id;
			$data['agent_id'] =$workDetail->agent_id ;
			$data['car_id'] =$workDetail->car_id;
			$data['total_work_price'] =$workDetail->total_work_price;
			$data['pay_type'] =$workDetail->pay_type;
			$data['bank_acc_id'] =$workDetail->bank_acc_id;
			$data['pay_cash'] =$workDetail->pay_cash;
			$data['pay_transfer'] =$workDetail->pay_transfer;
			$data['pay_transfer_date'] =$this->insurance_model->translateDateToThai($workDetail->pay_transfer_date);
			$data['pay_cash_check'] =$workDetail->pay_cash_check;
			$data['pay_transfer_check'] =$workDetail->pay_transfer_check; // 
			$data['bank_acc_id2'] =$workDetail->bank_acc_id2;
			$data['pay_transfer_check2'] = $workDetail->pay_transfer_check2; // 
			$data['pay_transfer2'] =$workDetail->pay_transfer2;
			$data['pay_transfer_date2'] = $this->insurance_model->translateDateToThai($workDetail->pay_transfer_date2);
			$data['pay_cash_overdue'] = $workDetail->pay_cash_overdue;
		    $data['pay_transfer_overdue'] = $workDetail->pay_transfer_overdue;
		    $data['pay_transfer2_overdue'] = $workDetail->pay_transfer2_overdue;
			$data['work_overdue'] = $workDetail->work_overdue;;
			$data['date_pay_overdue'] = $this->insurance_model->translateDateToThai($workDetail->date_pay_overdue);;
			$data['do_act'] = $workDetail->do_act;
				if($data['do_act']=='1'){
					$data['do_act_check']="checked";
				}
			$date=date("d");
			$month=date("m");
			$year=date("Y")+543;
			$dateWork = $workDetail->date_add;
			$dateArray = explode("-",$dateWork);
			$year = $dateArray[0]+543;
			$data['dateWork']=$dateArray[2]."/".$dateArray[1]."/".$year;
			//-----check data---//
			$workDetail->cust_id;
			$workDetail->car_id;
			if(($carID!=$workDetail->car_id)||($custID!=$workDetail->cust_id)){
				echo "<script>";
				echo " alert('ข้อมูลไม่ถูกต้องกรุณาเลือกข้อใหม่');";
				echo " window.location.href='".base_url('Insurance_car/')."'";
				echo "</script>";
				exit();
			}
			//------get-act----------act_price_total  insurance_date_contract
			$ActData = $this->insurance_model->getActDetail($workID); 
			 if(isset($ActData->id)){  
				$data['actID'] = $ActData->id;
				$data['act_no'] = $ActData->act_no;
				$data['corp_id'] = $ActData->corp_id;
				$data['act_type_id'] = $ActData->act_type_id;
				$data['act_follow'] = $ActData->act_follow;
				$data['code_id'] = $ActData->code_id;
				$data['act_recieve'] = $ActData->act_recieve;
				$data['act_price'] = $ActData->act_price;
				$data['act_discount'] = $ActData->act_discount;
				$data['act_tax'] = $ActData->act_tax;
				$data['act_vat'] = $ActData->act_vat;
				$data['act_price_net'] = $ActData->act_price_net;
				$data['act_price_total'] = $ActData->act_price_total;
				$data['act_cancel_no'] = $ActData->act_cancel_no;
				$data['act_cancel_reason'] = $ActData->act_cancel_reason;
				$data['act_remark'] = $ActData->act_remark;
				$data['back_act_remark'] = $ActData->back_act_remark;
				$data['act_payment_remark'] = $ActData->act_payment_remark;
				$data['act_payment_remark'] = $ActData->act_payment_remark;
				$data['act_paid'] = $ActData->act_paid;
				$data['back_act_no'] = $ActData->back_act_no;
				$data['act_date_start'] = $this->insurance_model->translateDateToThai($ActData->act_date_start);
				$data['act_date_end'] = $this->insurance_model->translateDateToThai($ActData->act_date_end);
				$data['act_date_notify'] = $this->insurance_model->translateDateToThai($ActData->act_date_notify);
				$data['act_cancel_date'] = $this->insurance_model->translateDateToThai($ActData->act_cancel_date);
				$data['act_payment_duedate'] = $this->insurance_model->translateDateToThai($ActData->act_payment_duedate);
				$data['back_act_notify_date'] = $this->insurance_model->translateDateToThai($ActData->back_act_notify_date);
				$data['back_act_recieve_date'] = $this->insurance_model->translateDateToThai($ActData->back_act_recieve_date);
				$data['act_paid_day'] = $this->insurance_model->translateDateToThai($ActData->act_paid_day);
				$data['deduct_percent'] = $ActData->deduct_percent;
				$data['other_paid'] = $ActData->other_paid;
				$data['act_price_total_full'] = $ActData->act_price_total_full;
			}
			//---------tax-----------------tax_service
			$taxData = $this->insurance_model->getTaxDetail($workID); 	// 	tax_price	tax_recall	tax_pay_date date_registration_end have_manual	do_register	tax_remark
			 if(isset($taxData->id)){
				$data['taxID'] = $taxData->id;
				$data['tax_price'] = $taxData->tax_price;
				$data['tax_recall'] = $taxData->tax_recall;
				$data['tax_pay_date'] = $this->insurance_model->translateDateToThai($taxData->tax_pay_date);
				$data['date_registration_end'] = $this->insurance_model->translateDateToThai($taxData->date_registration_end);
				$data['have_manual'] = $taxData->have_manual;
				$data['do_register'] = $taxData->do_register;
				$data['tax_remark'] = $taxData->tax_remark;
				$data['tax_paid'] = $taxData->tax_paid;
				$data['tax_service'] = $taxData->tax_service;
			 }
			//-------insurance----------//insurance_discount
			$insData = $this->insurance_model->getInsDetail($workID);
			 if(isset($insData->id)){
				$data['insID']= $insData->id;
				$data['ins_code_id']= $insData->ins_code_id ;
				$data['insurance_no']= $insData->insurance_no ;
				$data['insurance_date_contract']= $this->insurance_model->translateDateToThai($insData->insurance_date_contract);
				$data['insurance_start']= $this->insurance_model->translateDateToThai($insData->insurance_start);
				$data['insurance_end']= $this->insurance_model->translateDateToThai($insData->insurance_end);
				$data['insurance_corp_id'] = $insData->insurance_corp_id ;
				$data['insurance_type_id'] = $insData->insurance_type_id ;
				$data['insurance_fix_garace'] = $insData->insurance_fix_garace ;
				$data['insurance_renew'] = $insData->insurance_renew ;
				$data['date_send_document'] =$this->insurance_model->translateDateToThai($insData->date_send_document);
				$data['sum_insured'] = $insData->sum_insured ;
				$data['dedug'] = $insData->dedug ;
				$data['insurance_price'] = $insData->insurance_price ;
				$data['insurance_discount'] = $insData->insurance_discount ;
				$data['insurance_duty'] = $insData->insurance_duty ;
				$data['insurance_tax'] = $insData->insurance_tax ;
				$data['insurance_total_net'] = $insData->insurance_total_net ;
				$data['insurance_total'] = $insData->insurance_total ;
				$data['ins_cancel_no'] = $insData->ins_cancel_no ;
				$data['followDocIns'] = $insData->followDocIns ;
				$data['ins_cancel_date'] = $this->insurance_model->translateDateToThai($insData->ins_cancel_date);
				$data['ins_cancel_reason'] = $insData->ins_cancel_reason ;
				$data['insurance_remark'] = $insData->insurance_remark ;
				$data['paid_date'] = $this->insurance_model->translateDateToThai($insData->paid_date);
				$data['insurance_remark'] = $insData->insurance_remark ;
				$data['ins_paid'] = $insData->ins_paid ;
				$data['ins_paid_remark']  = $insData->ins_paid_remark ;
				$data['payment_due_date'] = $this->insurance_model->translateDateToThai($insData->payment_due_date);
				$data['date_insurance_notifi_endorse'] = $this->insurance_model->translateDateToThai($insData->date_insurance_notifi_endorse) ;
				$data['date_insurance_document_endorse'] =$this->insurance_model->translateDateToThai($insData->date_insurance_document_endorse) ;
				$data['insurance_number_endorse'] = $insData->insurance_number_endorse ;
				$data['insurance_remark_endorse'] = $insData->insurance_remark_endorse ;
			}
			//----------inspect data-----//listInsCorp
			$inspectData = $this->insurance_model->getInspectDetail($workID);
			 if(isset($inspectData->id)){	 
			  $data['inspecID'] =$inspectData->id;
		      $data['car_check_date'] =$this->insurance_model->translateDateToThai($inspectData->car_check_date);
		      $data['car_check_time'] =$inspectData->car_check_time;
		      $data['car_check_price'] =$inspectData->car_check_price;
		      $data['car_check_discount'] =$inspectData->car_check_discount;
		      $data['car_check_total'] =$inspectData->car_check_total;
		      $data['registration_book'] =$inspectData->registration_book;
		      $data['car_check_remark'] =$inspectData->car_check_remark;
		      $data['car_type'] =$inspectData->car_type;
		      $data['free_cancel'] =$inspectData->free_cancel;
		      $data['check_pass'] =$inspectData->check_pass;
		      $data['car_check_paid'] =$inspectData->car_check_paid;
			 }
			  //-----service----------
			$serviceData = $this->insurance_model->getServiceDetail($workID);
			 if(isset($serviceData->id)){	 
		   		$data['service_id'] =$serviceData->id;
				$data['car_check_price_service'] =$serviceData->car_check_price_service;
		   		$data['service_other_price'] =$serviceData->service_other_price;
		   		$data['service_remark'] =$serviceData->service_remark;
			 }
			//-------------------
		}else{
			$data['workID']='';
			$data['taxID']='';
			$data['agent_id'] ='x';
			$date=date("d");
			$month=date("m");
			$year=date("Y")+543;
			$data['dateWork']=$date."/".$month."/".$year;
		}
		$dataStatus =1;$use_branch=2;
		$data['listAgent'] = $this->setting_model->listAgent($dataStatus); 
		$data['listCode'] = $this->setting_model->listCode($dataStatus);  
		$data['listInsCorp'] = $this->setting_model->listCompany($dataStatus,$use_branch);  
		$data['listCarType'] = $this->insurance_model->listCarType();  
		$data['ProvinceList'] = $this->setting_model->ProvinceList(); 
		$data['workType'] = $this->setting_model->getWorkType($dataStatus); 
		$data['workID'] = $workID;
		$data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
		$data['currMonth']=date('m');
		//$this->load->view('work_car_all',$data);$this->load->view('work_car_all_script',$data);
		/*
		  $('#actID').val(obj.actID);
					    $('#inspecID').val(obj.inspecID);
					    $('#taxID').val(obj.taxID);
					    $('#serviceworkID').val(obj.workID);
					    $('#inspecID').val(obj.inspecID);
					    $('#service_id').val(obj.service_id);
					 	$('#custID').val(obj.custID);
						$('#carID').val(obj.carID);
		*/
		//-------ต่ออายุ date_registration_end date_registration_end
		if($action=='renew'){
			//--------set id = 0;
			$data['workID']='';
			$data['custID']='';
			$data['workID2']='';
			$data['carID']='';
			$data['taxID'] ='';
			$data['actID'] ='';
			$data['serviceworkID'] ='';
			$data['service_id'] ='';
			$data['inspecID'] ='';
			$data['agent_id'] ='x';
			$data['car_check_date'] ='';
			$data['act_no'] ='';
			$data['corp_id'] ='';
			$data['check_pass'] ='';
			$data['free_cancel'] ='';
			$data['act_date_start'] ='';
			$data['act_date_end'] ='';
			$data['tax_pay_date'] ='';
			//----------
			echo 'date_registration_end>>'.$taxData->date_registration_end;
			$newRegisDateExpire='';
			if($taxData->date_registration_end!='0000-00-00'){
				$dateExplode = explode("-",$taxData->date_registration_end);
				$newYear  = $dateExplode[0]+1;
				$newDate = $newYear."-".$dateExplode[1]."-".$dateExplode[2];
				$newRegisDateExpire = $this->insurance_model->translateDateToThai($newDate);
			}
			//----------year_car
			echo '<br>newRegisDateExpire>>'.$newRegisDateExpire;
			$data['date_registration_end'] =$newRegisDateExpire;
			$data['date_registration_end2'] =$newRegisDateExpire;
			$data['tax_remark'] ='';
			$data['service_other_price'] ='';
			$data['service_remark'] ='';
			$data['pay_cash_check'] ='';
			$data['pay_transfer'] ='';
			$data['bank_acc_id'] ='';
			$data['pay_transfer'] ='';
			$data['pay_transfer2'] ='';
			$data['bank_acc_id2'] ='';
			$data['work_overdue'] ='';
			$data['pay_transfer_check'] ='';
			$data['pay_transfer_check2'] ='';
			$data['pay_transfer_date2'] ='';
			$data['pay_transfer2_overdue'] ='';
			$data['act_price']='';
			$data['act_tax']='';
			$data['act_discount']='';
			$data['act_vat']='';
			$data['act_price_net']='';
			$data['deduct_percent']='';
			$data['other_paid']='';
			$data['act_payment_remark']='';
			$data['act_follow']='';
			$data['act_recieve']='';
			$data['total_work_price']='';
			$data['car_check_time']='00:00:00';
			$data['pay_cash']='';
			$data['car_check_price']='';
			$data['car_check_total']='';
			$data['tax_price']='';
			$data['tax_service']='';
			$data['tax_pay_date']='';
			$data['have_manual']='';
			$data['do_register']='';
			$date=date("d");
			$month=date("m");
			$year=date("Y")+543;
			$data['dateWork']=$date."/".$month."/".$year;
		}
		$this->load->view('work_car_check_all',$data);
		$this->load->view('work_car_check_all_script',$data);
	}
	//----------------------------------------insurance_corp_id:insurance_corp_id,insurance_type_id:insurance_type_id selectedValue
	public function getInsuranceSelect(){
	   $data=array();
	   $data=$this->input->post();
	   $resultData = $this->insurance_model->getChainSelect($data); 
	   //echo " >> ".$this->input->post('insurance_type_id')." << ";
	   echo "<option value='x'>--เลือกประเภท--</option>";
	   foreach($resultData AS $list){
		   if($this->input->post('insurance_type_id')==$list->ins_type_id){ $txtSelected = "selected";}else{  $txtSelected = ""; }
		   echo "<option value='".$list->ins_type_id."' ".$txtSelected.">".$list->insurance_type_name."</option>";
	   }
	}
	//----------------------------------------corp_id:SelectValue,selectType selectedIndex
   public function getChainSelect(){
	   $data=array();
	   $data=$this->input->post();
	   $resultData = $this->insurance_model->getChainSelect($data); 
	   echo "<option value='x'>--เลือกประเภท--</option>";
	   foreach($resultData AS $list){
		   if($data['selectedValue']==$list->ins_type_id){ $txtSelected = "selected";}else{  $txtSelected = ""; }
		   echo "<option value='".$list->ins_type_id."' ".$txtSelected.">".$list->insurance_type_name."</option>";
	   }
   } 
	//----------------------------------------	
   public function listSearchCar(){
		$txtSearch = $this->input->post('theVal');
		$custID = $this->input->post('custID');
		$data['listCar'] = $this->insurance_model->listSearchCar($txtSearch,$custID);
		$this->load->view('list_search_car',$data);	   
   }
	//----------------------------------------	
	public function listSearchCust(){
		$txtSearch = $this->input->post('theVal');
		$data['listCust'] = $this->insurance_model->listSearchCust($txtSearch);
		$this->load->view('list_search_cust',$data);
	}
	//----------------------------------------	
	public function addCustomer(){
		$data['custID'] = $this->input->post('custID');
		$data['cust_name'] = $this->input->post('cust_name');
		$data['cust_telephone_1'] = $this->input->post('cust_telephone_1');
		$data['cust_telephone_2'] = $this->input->post('cust_telephone_2');
		$data['cust_nickname'] = $this->input->post('cust_nickname');
		$data['is_corporation'] = $this->input->post('is_corporation');
		$resultData = $this->insurance_model->addCustomer($data);
		echo json_encode($resultData);
	}
	//--------------------------------
	public function listTransportWork(){
		$workID =$this->input->post('workID');
		$data['transportList']=$this->insurance_model->listTransportWork($workID);
		$this->load->view('work_transport_list',$data);
	}
	//--------------------------------
	public function callInsCover(){
		$data =array();
		$workID = $this->input->post('workID');
		$data['LasData'] = $this->insurance_model->callLastData($workID);
		$data['InsDetail'] = $this->insurance_model->callSummaryData($workID);
		$this->load->view('work_car_ins_cover_detail',$data);
	}
	//--------------------------------
	public function work_car_insurance_cover_print($workID=NULL){
		$data['LasData'] = $this->insurance_model->callLastData($workID);
		$data['InsDetail'] = $this->insurance_model->callSummaryData($workID);
		$this->load->view('work_car_insurance_cover_print',$data);
	}
	//--------------------------------
	public function SaveCarApplication(){
		$data =array();
		$data = $this->input->post();
		//print_r($data);
		//$resultData = $this->insurance_model->SaveCarApplication($data);
		//echo json_encode($resultData);
	}
	//--------------------------------
	public function SavePostAddr(){
		$data =array();
		$data = $this->input->post();
		//print_r($data);
		$resultData = $this->insurance_model->SavePostAddr($data);
		echo json_encode($resultData);
	}	
	//--------------------------------
	public function savetransport(){
		$data =array();
		$data = $this->input->post();
		//print_r($data);
		$resultData = $this->insurance_model->savetransport($data);
		echo json_encode($resultData);
	}		
	//--------------------------------
	public function SaveService(){
		$data =array();
		$data = $this->input->post();
		if($this->input->post('serviceworkID')==''){
		  $data['serviceworkID'] = $this->getWorkID();
		}
		//print_r($data);
		$resultData = $this->insurance_model->SaveService($data);
		echo json_encode($resultData);
	}	
	//--------------------------------
	public function SaveCarCheck(){
		$data =array();
		$data = $this->input->post();
		if($this->input->post('inspecworkID')==''){
		  $data['inspecworkID'] = $this->getWorkID();
		}
		//print_r($data);
		$resultData = $this->insurance_model->SaveCarCheck($data);
		echo json_encode($resultData);
	}
	//--------------------------------
	public function SaveIns(){
		$data =array();
		$data = $this->input->post();
		if($this->input->post('insWorkID')==''){
		  $data['insWorkID'] = $this->getWorkID();
		}
		//print_r($data);
		$resultData = $this->insurance_model->SaveIns($data);
		echo json_encode($resultData);
	}	
	//--------------------------------
	public function SaveTax(){
		$data =array();
		$data = $this->input->post();
		if($this->input->post('taxWorkID')==''){
		  $data['taxWorkID'] = $this->getWorkID();
		}
		//print_r($data);
		$resultData = $this->insurance_model->SaveTax($data);
		echo json_encode($resultData);
	}
	//--------------------------------
	public function saveCompulsory(){
		$data =array();
		$data = $this->input->post();
		if($this->input->post('actWorkID')==''){
		  $data['actWorkID'] = $this->getWorkID();
		}
		$resultData = $this->insurance_model->saveCompulsory($data);
		echo json_encode($resultData);
	}
	//-------------------------------- 
	public function updateWorkData(){
		$data =array();
		$data = $this->input->post();
		$resultData = $this->insurance_model->updateWorkData($data);
		echo $resultData;
	} 
	//--------------------------------
	public function addCar(){
		$data['vehicle_regis'] = $this->input->post('vehicle_regis');		
		$data['province_regis'] = $this->input->post('province_regis');
		$data['date_regist'] = $this->input->post('date_regist');
		$data['year_car'] = $this->input->post('year_car');
		$data['vin_no'] = $this->input->post('vin_no');
		$data['engine_size'] = $this->input->post('engine_size');
		$data['engine_size'] = $this->input->post('engine_size');
		$data['car_brand'] = $this->input->post('car_brand');
		$data['car_model'] = $this->input->post('car_model');
		$data['custID'] = $this->input->post('custID');
		$data['car_type_id'] = $this->input->post('car_type_id');
		$data['carID'] = $this->input->post('carID');
		$data['workID'] = $this->input->post('workID');
		$resultData = $this->insurance_model->addCar($data);
		echo json_encode($resultData);
	}
	//--------------------------------
	public function work_car_payment_print(){
		$this->load->view('work_car_payment_print');
	}
	public function work_car_inspection_cover_print(){
		$this->load->view('work_car_inspection_cover_print');
	}
	public function work_car_address_print(){
		$data['selectedValue']=$this->input->post('selectedValue');
		$data['insWorkID']=$this->input->post('insWorkID');
		if($data['selectedValue']=='1'){
			$data['size']='a4';
		}else if($data['selectedValue']=='2'){
			$data['size']='a5';
		}
		$data['addrData']=$this->insurance_model->getPostData($data['insWorkID']);
		$this->load->view('work_car_address_print',$data);
	}
	public function work_car_application_print(){
		$this->load->view('work_car_application_print');
	}
	public function work_car_invoice_print(){
		$this->load->view('work_car_invoice_print');
	}
	public function work_car_add_receipt(){
		$this->load->view('work_car_add_receipt');
	}
	public function work_car_receipt_print(){
		$this->load->view('work_car_receipt_print');
	}
	public function search_customer(){
		$this->load->view('search_customer');
	}	
}
	