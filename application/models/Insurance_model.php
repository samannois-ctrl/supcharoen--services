<?php
 class Insurance_model extends CI_Model
 {
   function __construct()
    {
        parent::__construct();
    }
	//----------------------------------
	 function translateDateToEng($date){
		if($date!=''){
		 $dateArray = explode("/",$date);
		 $dateArray[2] = $dateArray[2]-543;
		 $showDate = $dateArray[2]."-".$dateArray[1]."-".$dateArray[0];
		 }else{
			$showDate = "0000-00-00";
		}
		 return $showDate;
	 }	
	 function translateDateToThai($date){
		if(($date!='0000-00-00')&&($date!='')){
		 $dateArray = explode("-",$date);
		 $dateArray[0] = $dateArray[0]+543;
		 $showDate = $dateArray[2]."/".$dateArray[1]."/".$dateArray[0];
		 }else{
			$showDate ='';	
		 }
		 return $showDate;
	 }
	  function translateDateToThai2($date){
		if(($date!='0000-00-00')&&($date!='')){
		 $dateArray = explode("-",$date);
		 $dateArray[0] = $dateArray[0];
		 $showDate = $dateArray[2]."/".$dateArray[1]."/".$dateArray[0];
		 }else{
			$showDate ='';	
		 }
		 return $showDate;
	 }
	//----------------------------------
	 function removeComma($theValue){
		$NewValue = str_replace(",","",$theValue);
		return $NewValue;
  	}
	 //----------------------------
	 function getnerateKeyGroup($length = 8) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}	
	 //----------------------------
	 public function num2wordsThai2($amount_number)
    {
    $amount_number = number_format($amount_number, 2, ".","");
    $pt = strpos($amount_number , ".");
    $number = $fraction = "";
    if ($pt === false) 
        $number = $amount_number;
    else
    {
        $number = substr($amount_number, 0, $pt);
        $fraction = substr($amount_number, $pt + 1);
    }
    $ret = "";
    $baht = $this->ReadNumber2($number);
    if ($baht != "")
        $ret .= $baht . "บาท";
    $satang = $this->ReadNumber2($fraction);
    if ($satang != "")
        $ret .=  $satang . "สตางค์";
    else 
        $ret .= "ถ้วน";
    return $ret;
   }
public function ReadNumber2($number)
{
    $position_call = array("แสน", "หมื่น", "พัน", "ร้อย", "สิบ", "");
    $number_call = array("", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
    $number = $number + 0;
    $ret = "";
    if ($number == 0) return $ret;
    if ($number > 1000000)
    {
        $ret .= $this->ReadNumber(intval($number / 1000000)) . "ล้าน";
        $number = intval(fmod($number, 1000000));
    }
    $divider = 100000;
    $pos = 0;
    while($number > 0)
    {
        $d = intval($number / $divider);
        $ret .= (($divider == 10) && ($d == 2)) ? "ยี่" : 
            ((($divider == 10) && ($d == 1)) ? "" :
            ((($divider == 1) && ($d == 1) && ($ret != "")) ? "เอ็ด" : $number_call[$d]));
        $ret .= ($d ? $position_call[$pos] : "");
        $number = $number % $divider;
        $divider = $divider / 10;
        $pos++;
    }
    return $ret;
}
	 function getPermisssion($menuField,$userID){
		 $returnValue=array();
		 $returnValue['psermission']=0;
		 $sql="SELECT id, name_sname , $menuField FROM tbl_user_data WHERE $menuField= ".$menuField." AND id='".$userID."'  ";
		 //$returnValue['sql']=$sql;
		 $result = $this->db->query($sql)->result();
		 foreach($result AS $data){
			 $returnValue['psermission']=$data->$menuField;
		 }
		 return $returnValue;
	 }
	//################################################################################################
	 //----------------------------------insurance
	 function getPaymentType($workType=NULL,$insID=NULL,$OtherInsID=NULL){
		  $returnValue = array();
		 $txtCash =''; $txtTransfer = ''; $txtCredit = '';$txtCheck = '';
		 if($workType=='1'){ //insurance
			 	$tbl = "  tbl_insurance_data ";
				     $sql="SELECT amt_recieve_carcheck, car_check_pay_type , amt_recieve_tax ,tax_pay_type , amt_recieve_act , act_pay_type , amt_recieve_ins , ins_pay_type FROM $tbl WHERE id = '".$insID."' ";
				     $result = $this->db->query($sql)->result();
				  	 foreach($result AS $data){
						 $returnValue['amt_recieve_carcheck']  =  $data->amt_recieve_carcheck;
						 $returnValue['car_check_pay_type']  =  $data->car_check_pay_type;
						 $returnValue['tax_pay_type']  =  $data->tax_pay_type;
						 $returnValue['amt_recieve_act']  =  $data->amt_recieve_act;
						 $returnValue['act_pay_type']  =  $data->act_pay_type;
						 $returnValue['amt_recieve_ins']  =  $data->amt_recieve_ins;
						 $returnValue['ins_pay_type']  =  $data->ins_pay_type;
					 }
				  switch($returnValue['car_check_pay_type']){
					  case "1" :
						  $txtCash ='ธนบัตร ';
					  break;
					  case "2" :
						  $txtTransfer = 'โอน ';
					  break;
					  case "3" :
						  $txtCredit = 'บัตรเครดิต ';
					  break;
					  case "4" :
						  $txtCheck = 'เข็ค ';
					  break;						  
				  }
			   switch($returnValue['tax_pay_type']){
					  case "1" :
						  $txtCash ='ธนบัตร ';
					  break;
					  case "2" :
						  $txtTransfer = 'โอน ';
					  break;
					  case "3" :
						  $txtCredit = 'บัตรเครดิต ';
					  break;
					  case "4" :
						  $txtCheck = 'เข็ค ';
					  break;						  
				  }				  
		   		switch($returnValue['act_pay_type']){
					  case "1" :
						  $txtCash ='ธนบัตร ';
					  break;
					  case "2" :
						  $txtTransfer = 'โอน ';
					  break;
					  case "3" :
						  $txtCredit = 'บัตรเครดิต ';
					  break;
					  case "4" :
						  $txtCheck = 'เข็ค ';
					  break;						  
				  }	 
				 switch($returnValue['ins_pay_type']){
					  case "1" :
						  $txtCash ='ธนบัตร ';
					  break;
					  case "2" :
						  $txtTransfer = 'โอน ';
					  break;
					  case "3" :
						  $txtCredit = 'บัตรเครดิต ';
					  break;
					  case "4" :
						  $txtCheck = 'เข็ค ';
					  break;						  
				  }	
				  $returnValue['showPay'] = $txtCash.$txtTransfer.$txtCredit.$txtCheck;
		 }else if($workType > 1){
		  switch($workType){
				 case "5" :
					 $tbl = "  tbl_insurance_home_data ";
				 break;	
				 case "4" :
				   $tbl = " tbl_insurance_accident_data ";
				 break;
				 case "3" :
					  $tbl = "  tbl_insurance_shpping_data ";
				 break;	 
				 case "2" :
					 $tbl = "  tbl_insurance_travel_data ";
				 break;	
		 	 }
		 		 $sql="SELECT ins_pay_type , amt_recieve_ins FROM $tbl WHERE id = '".$OtherInsID."' ";
				 $result = $this->db->query($sql)->result();
				  	 foreach($result AS $data){
						 $returnValue['amt_recieve_ins']  =  $data->amt_recieve_ins;
						 $returnValue['ins_pay_type']  =  $data->ins_pay_type;
					 }
				   switch($returnValue['ins_pay_type']){
					  case "1" :
						  $txtCash ='ธนบัตร ';
					  break;
					  case "2" :
						  $txtTransfer = 'โอน ';
					  break;
					  case "3" :
						  $txtCredit = 'บัตรเครดิต ';
					  break;
					  case "4" :
						  $txtCheck = 'เข็ค ';
					  break;						  
				  }	
				  $returnValue['showPay'] = $txtCash.$txtTransfer.$txtCredit.$txtCheck;
		  } //end if ==1
		return $returnValue;		  
	 }
	 //----------------------------------
	 function deleteImages($imagesID){
	 	 $returnValue = array();
		 $returnValue['doDb']=0;
		 $sql="UPDATE tbl_insurance_images SET data_status='0'  WHERE id = '".$imagesID."' ";
		 if($this->db->query($sql)){
			 $returnValue['doDb']=1;
		 }
		 //$returnValue['updateSql']=$sql;
		 return $returnValue; 
	 }	
	 //----------------------------------
	 function list_insurance_images_file($work_id){
		 $sql="SELECT * FROM tbl_insurance_images WHERE work_id = '".$work_id."'  AND  data_status='1' ";
		 $result = $this->db->query($sql)->result();
		 return $result;
	 }
	 //----------------------------------
	 function updateInsuranceImagesFiles($insuranceID,$newName){
		 $returnValue = array();
		 $returnValue['updateDb']=0;
		 $sql="INSERT INTO `tbl_insurance_images` (`id`, `image_name`, `work_id`, `date_add`, `user_id`, `data_status`) VALUES ('', '".$newName."', '".$insuranceID."', current_timestamp(), '".$this->session->userdata('user_id')."', '1') ";
		 if($this->db->query($sql)){
			 $returnValue['updateDb']=1;
		 }
		 //$returnValue['updateSql']=$sql;
		 return $returnValue; 
	 }
	 //-------------------------------------
	 function getInstallmentDuedate($work_id){
		 $returnValue=array();
		 $returnValue['getDueDate'] = 'null';
		 $sql="SELECT due_date FROM tbl_insurance_payment WHERE work_id = '".$work_id."' AND is_payment = '0' ORDER BY period  ASC LIMIT 0,1 ";
		 $result = $this->db->query($sql)->result();
		 foreach($result AS $data){
			 $returnValue['getDueDate'] = $data->due_date;
		 }
		 if($returnValue['getDueDate'] != 'null'){
			 $returnValue['getDueDate'] = $this->translateDateToThai2($returnValue['getDueDate']);
		 }
		 return $returnValue;
	 }
	 //-------------------------------------
	 function updatePaymentAmount($data){
		  $returnValue=array();
		  $returnValue['Dodb']=0;
		 $theValue = $this->removeComma($data['theValue']);
		 $sql="UPDATE tbl_insurance_data SET payment_amount='".$theValue."' WHERE id = '".$data['insWorkID']."'  ";
		 if($this->db->query($sql)){
			  $returnValue['Dodb'] ='1';
		 }else{
			 $returnValue['Dodb'] ='Error';
		 }
		 return $returnValue;
	 }
	 //-------------------------------------
	 function findCashDueDate($insuranceType,$insuranceID){
		 if($insuranceType=='insurance'){
			 $sql="SELECT cash_duedate FROM tbl_insurance_data WHERE id = '".$insuranceID."' AND pay_cash_status <>'1' ";
			 $resultData=$this->db->query($sql)->result();
			 $cash_duedate='';
			 foreach($resultData AS $data){
				 $cash_duedate = $data->cash_duedate;
			 }
			 if($cash_duedate!=''){
				  $cash_duedate = $this->translateDateToThai($cash_duedate);;
			 }
			 return $cash_duedate;
		 }
		 //------- insurance other --->
	 }
	 //-------------------------------------
	 function findInstallmentDueDate($insuranceType,$insuranceID){
		  if($insuranceType=='insurance'){
			  $sql="SELECT due_date FROM tbl_insurance_payment WHERE is_payment ='0' AND work_id='".$insuranceID."' ORDER BY period ASC LIMIT 0,1 ";	
			  //echo $sql;
			  $resultData=$this->db->query($sql)->result();
			  $Installment_duedate='';
			 foreach($resultData AS $data){
				 if(isset($data->due_date)){
					  $Installment_duedate = $data->due_date;
				 }
			 }
			 if($Installment_duedate!=''){
				  $Installment_duedate = $this->translateDateToThai($Installment_duedate);;
			 }
			 return $Installment_duedate;
		  }
	 }
	 //-------------------------------------
	 function UpdateCashDuedate($data){
		 $returnValue=array();
		 $returnValue['Dodb']=0;
		 $cash_duedate = $this->translateDateToEng($data['cash_duedate']);
		 $sql="UPDATE tbl_insurance_data SET cash_duedate = '".$cash_duedate."' , pay_cash_status = '".$data['pay_cash_status']."' WHERE id = '".$data['insWorkID']."'  ";
		 if($this->db->query($sql)){
			  $returnValue['Dodb'] ='1';
		 }else{
			 $returnValue['Dodb'] ='Error';
		 }
		 return $returnValue;
	 }
	 //--------------------------------------field:field,theValue:theValue,insWorkID:insWorkID
	 function UpdatePayType($data){
		 $returnValue=array();
		 $returnValue['Dodb']=0;
		 $field = $data['field'];
		 //-   amt_recieve_tax amt_recieve_act amt_recieve_ins amt_recieve_tax
		 if(($field=='amt_recieve_carcheck') ||($field=='amt_recieve_act') ||($field=='amt_recieve_ins')||($field=='amt_recieve_tax')){
			 $data['theValue'] = $this->removeComma($data['theValue']);
		 }
		 $sql="UPDATE tbl_insurance_data SET $field = '".$data['theValue']."' WHERE id = '".$data['insWorkID']."' ";
		 if($this->db->query($sql)){
			  $returnValue['Dodb'] ='ok';
		 }else{
			 $returnValue['Dodb'] ='Error';
		 }
		  $returnValue['sql']=$sql;
		  return $returnValue;
	 }
	 //--------------------------------------
	 function DeleteInsurance($data){
		 $returnValue=array();
		 $returnValue['doDb']=0;
		 $sql="UPDATE  tbl_insurance_data SET data_status = '".$data['data_status']."' , remark_delete = '".$data['remark_delete']."' , user_delete ='".$this->session->userdata('user_id')."' , date_delete = now() WHERE id = '".$data['dataID']."' ";
		 if($this->db->query($sql)){
			 $returnValue['doDb']=1;
		 }
		  return $returnValue;
	 }
	 //--------------------------------------
	 function deleteDedug($dataID){
		 $returnValue=array();
		 $returnValue['doDb']=0;
		 $sql = "UPDATE tbl_insurance_billing_deduct SET  data_status='0' WHERE id = '".$dataID."' ";
		 if($this->db->query($sql)){
			 $returnValue['doDb']=1;
		 }
		  return $returnValue;
	 }
	 //-------------------------------------- 
	 function getBillDedugData($keygroup){
		 $sql="SELECT * FROM tbl_insurance_billing_deduct WHERE keygroup = '".$keygroup."' AND data_status='1'  AND act_type='2'  ORDER BY id ASC ";
		 $resultData['plus']=$this->db->query($sql)->result();
		  $sql="SELECT * FROM tbl_insurance_billing_deduct WHERE keygroup = '".$keygroup."' AND data_status='1'  AND act_type='1'  ORDER BY id ASC ";
		 $resultData['delete']=$this->db->query($sql)->result();
		 return $resultData;
	 }
	 //-------------------------------------- 
	 function addDedug($data){
		 $returnValue=array();
		 $returnValue['doDb']=0;
		 if($data['actType']=='delete'){
			 $act_type = 1;
		 }else if($data['actType']=='plus'){
			  $act_type = 2;
		 }
		 $sql="INSERT INTO `tbl_insurance_billing_deduct` (`id`, `dedug_text`, `dedug_amount`, `keygroup`, `billing_id`, `data_status`, `user_add`, `date_add`, `act_type`) "
			 ." VALUES ('', '".$data['dedug_text']."', '".$data['dedug_amount']."', '".$data['keygroup']."', '".$data['billID']."', '1', '".$this->session->userdata('user_id')."', now(), '".$act_type."'); ";
		 if($this->db->query($sql)){
			 $returnValue['doDb']=1;
		 }
		 $returnValue['sql']=$sql;
		 return $returnValue;
	 }
	 //-------------------------------------- 
	 function callPremiumValue($data){
		$returnValue=array();
	 	$sql="SELECT * FROM tbl_insurance_car_type_premium WHERE tbl_car_type_id = '".$data['car_type_id']."' AND id = '".$data['type_premium_id']."' ";
		$resultData = $this->db->query($sql)->result();
		foreach($resultData AS $data){
			$returnValue['insurance_premium'] = $data->insurance_premium;
			$returnValue['vat'] = $data->vat;
			$returnValue['tax'] = $data->tax;
			$returnValue['total_premium'] = $data->total_premium;
			$returnValue['insurance_premium_rent'] = $data->insurance_premium_rent;
			$returnValue['vat_rent'] = $data->vat_rent;
			$returnValue['tax_rent'] = $data->tax_rent;
			$returnValue['total_premium_rent'] = $data->total_premium_rent;
		}
		$returnValue['sql']=$sql;
		return $returnValue;
	 }
	 //--------------------------------------status newID act_date_start insurance_end insurance_no
	 function renew_customer_by_id($data){
		  	$returnValue=array();
		    $returnValue['status']=0;
		 	$returnValue['status2']=0; 
		    $returnValue['newID']=0;
		     $sql=" INSERT INTO `tbl_insurance_data` (`id`, `date_work`, `cust_name`, `cust_nickname`, `cust_telephone_1`, `cust_telephone_2`, `is_corporation`, `vehicle_regis`"
					 .", `province_regis`, `year_car`, `vin_no`, `engine_size`, `car_brand`, `car_model`, `car_type_id`, `ins_date_work` "
					 .", `work_id`, `agent_id`, `ins_code_id`, `insurance_no`, `insurance_date_contract`, `date_insurance`, `insurance_start`, `insurance_end`, `insurance_corp_id`, `insurance_type_id`"
					 .", `fix_type`, `job_notification_date`, `work_ins_type`, `ins_follow`, `ins_data_status`, `insurance_renew`, `insurance_fix_garace`, `sum_insured`"
					 .", `date_send_document`, `act_no`, `dedug`, `insurance_price`, `insurance_discount`, `insurance_duty`, `insurance_tax`, `insurance_total_net`, `insurance_total`"
					 .", `ins_cancel_no`, `ins_cancel_date`, `ins_cancel_reason`, `insurance_remark`, `paid_date`, `ins_paid_remark`, `ins_paid`, `payment_due_date` "
					 .", `date_insurance_notifi_endorse`, `date_insurance_document_endorse`, `insurance_number_endorse`, `insurance_remark_endorse`, `followDocIns`"
					 .", `act_paid`, `corp_id`, `act_type_id`, `act_date_start`, `act_date_end`, `act_price`, `act_discount`, `act_tax`, `act_vat`, `act_price_net`, `act_price_total`, `act_price_total_full`, `act_payment_remark`, `brand_id`, `date_regist` "
					 ." ,taxID , tax_price , tax_recall , tax_pay_date , date_registration_end , have_manual , do_register , tax_remark , tax_paid , tax_service "
					 ." , car_check_date , car_check_time , car_check_price , car_check_paid , do_check_car , car_check_discount , car_check_total , registration_book , car_check_remark , free_cancel ,check_pass , recieve_warning , not_recieve_warning , recieve_warning_yes "
					 ." ) "
					 . " SELECT  '',  DATE_ADD(`date_work` , INTERVAL 1 YEAR), `cust_name`, `cust_nickname`, `cust_telephone_1`, `cust_telephone_2`, `is_corporation`, `vehicle_regis`"
					 ." , `province_regis`, `year_car`, `vin_no`, `engine_size`, `car_brand`, `car_model`, `car_type_id`, `ins_date_work` "
					 ." , `work_id`, `agent_id`, `ins_code_id`, '', `insurance_date_contract`, `date_insurance`"
				     ." , CASE WHEN `insurance_start` !='0000-00-00' THEN  DATE_ADD(`insurance_end` , INTERVAL 0 YEAR)  ELSE `insurance_start` END "
				     ." , CASE WHEN `insurance_end` !='0000-00-00' THEN  DATE_ADD(`insurance_end` , INTERVAL 1 YEAR)  ELSE `insurance_end` END  "
				     ." , `insurance_corp_id`, `insurance_type_id`"
					 ." , `fix_type`, `job_notification_date`, `work_ins_type`, `ins_follow`, `ins_data_status`, `insurance_renew`, `insurance_fix_garace`, `sum_insured`"
					 ." , `date_send_document`, `act_no`, `dedug`, `insurance_price`, `insurance_discount`, `insurance_duty`, `insurance_tax`, `insurance_total_net`, `insurance_total`"
					 ." , `ins_cancel_no`, `ins_cancel_date`, `ins_cancel_reason`, `insurance_remark`, `paid_date`, `ins_paid_remark`, `ins_paid`, `payment_due_date` "
					 ." , `date_insurance_notifi_endorse`, `date_insurance_document_endorse`, `insurance_number_endorse`, `insurance_remark_endorse`, `followDocIns`"
					 ." , `act_paid`, `corp_id`, `act_type_id`"
				     ." , CASE WHEN `act_date_start` !='0000-00-00' THEN  DATE_ADD(`act_date_end` , INTERVAL 0 YEAR)  ELSE `act_date_start` END "
				     ." , CASE WHEN `act_date_end` !='0000-00-00' THEN  DATE_ADD(`act_date_end` , INTERVAL 1 YEAR)  ELSE `act_date_end` END "
				     ." , `act_price`, `act_discount`, `act_tax`, `act_vat`, `act_price_net`, `act_price_total`, `act_price_total_full`, `act_payment_remark`, `brand_id`, `date_regist` "
					 ." ,taxID , tax_price , tax_recall , tax_pay_date "
				     ." , CASE WHEN `date_registration_end` !='0000-00-00' THEN  DATE_ADD(`date_registration_end` , INTERVAL 1 YEAR)  ELSE `date_registration_end` END "
				     ." , have_manual , do_register , tax_remark , tax_paid , tax_service "
					 ." , car_check_date , car_check_time , car_check_price , car_check_paid , do_check_car , car_check_discount , car_check_total , registration_book , car_check_remark , free_cancel ,check_pass , recieve_warning , '0' , '0' "
				     ." FROM tbl_insurance_data WHERE id = '".$data['insID']."' "			 
					 ." ";
		 if($this->db->query($sql)){
				  $returnValue['status']="ok";
			      //------get value from work
			 	  $returnValue['newID'] = $this->db->insert_id();
			 	  $sql="UPDATE tbl_insurance_data SET  reference_id  = '".$data['insID']."' ";
			 	  if($this->db->query($sql)){
				  	 $returnValue['status2']="ok";
				  }
		   }
		 $returnValue['sql']=$sql;
		 return $returnValue;
	 }
	 //--------------------------------------tax_pay_date date_registration_end not_recieve_warning
	 function SearchAllCustomer($data){
		 //cust_name cust_telephone:cust_telephone,vehicle_regis:vehicle_regis,workType:workType,agent_id:agent_id ,overdue:overdue 
		$WhereCustname = '';
		$WherePhone = '';
		$WhereRegis = '';
		$WhereworkType = '';
		$Whereoverdue= "";
		$WhereoAgent= "";
		$txtWhereWorkType= "";
		if($data['cust_name']!=''){
			$WhereCustname = " AND a.cust_name LIKE '%".trim($data['cust_name'])."%' ";
		}
		 if($data['cust_telephone']!=''){
			$WherePhone = " AND (a.cust_telephone_1 LIKE '%".trim($data['cust_telephone'])."%' OR a.cust_telephone_2 LIKE '%".trim($data['cust_telephone'])."%') ";
		} 
		 if($data['vehicle_regis']!=''){
			 $WhereRegis = " AND a.vehicle_regis LIKE '%".trim($data['vehicle_regis'])."%' ";
		 }
		 if($data['workType']!='0'){
			 switch($data['workType']){
				 case "1" :
					 $txtWhereWorkType = " AND a.insurance_total > '0' ";
				 break;
				  case "2" :
					 $txtWhereWorkType = " AND a.act_price_total > '0' ";
				 break;
				  case "3" :
					 $txtWhereWorkType = " AND a.tax_price > '0' ";
				 break;
				   case "4" :
					 $txtWhereWorkType = " AND a.car_check_price > '0' ";
				 break;			 
			 }
		 }
		 if($data['agent_id'] > 0){
			  $WhereoAgent  = " AND a.agent_id = '".$data['agent_id']."' ";
		 }
		 if($data['overdue'] > 0){
			 // switch($data['overdue']){
			//	  case "1" : 
				//	   
			//		   $Whereoverdue= " HAVING countInstallment = '0' ";
			//	  break;
			//	  case "2" :
			//		  $Whereoverdue= " HAVING countInstallment > '0' ";
			//	  break;
			//  }
		 }
		 $whereYear = " ((YEAR(a.insurance_start) = '".$data['selectYear']."') OR (YEAR(a.act_date_start)= '".$data['selectYear']."')) ";
		  //--------------------- selectYear txtWhereWorkType
		 	 $sql="SELECT a.* , b.province_name , c.company_name , e.insurance_type_name , f.agent_name "
			 .",  (SELECT COUNT(id) FROM tbl_insurance_payment WHERE work_id = a.id) AS countInstallment  "
			 ." FROM tbl_insurance_data AS a "
			 ." LEFT JOIN  tbl_province AS b ON a.province_regis=b.id "
			 ." LEFT JOIN  tbl_insurance_company AS c ON a.insurance_corp_id  = c.id "
			 ." LEFT JOIN  tbl_insurance_income AS d ON a.insurance_type_id  = d.id "
			 ." LEFT JOIN  tbl_insurance_type AS e ON d.ins_type_id  = e.id "
			 ." LEFT JOIN  tbl_agent_data AS f ON a.agent_id = f.id "
			 ." WHERE $whereYear "
			 ." $WhereCustname $WherePhone $WhereRegis $txtWhereWorkType $WhereoAgent $Whereoverdue ORDER BY id DESC  ";
		 $returnValue['resultData'] = $this->db->query($sql)->result();
		 $returnValue['sql']=$sql;
		  return $returnValue;
	 }
	 //----------------------------
	 function get_control_monthly($data){
		    $returnValue=array();
		    $returnValue['doDb']=0;
		 	/*$sql="SELECT a.id AS insID , a.* , b.company_name , c.conde_name , d.* , d.id AS boardID "
				  ." FROM tbl_insurance_control_board AS d  "
				  ." LEFT JOIN tbl_insurance_billing AS a ON d.keygroup = a.keygroup " 
				  ." LEFT JOIN tbl_insurance_company AS b ON a.company_id=b.id "
				  ." LEFT JOIN tbl_code_data AS c ON a.code_id =c.id "
				  ." WHERE MONTH(a.date_add) = '".$data['monthIndex']."'  AND YEAR(a.date_add)='".$data['selectYear']."'  ";*/
		    //$sql="SELECT d.* " select_ins_bill
			//	  ." FROM tbl_insurance_control_board AS d  "
			//	  ." WHERE d.control_month = '".$data['monthIndex']."'  AND d.control_year='".$data['selectYear']."' ORDER BY d.id ASC  "; insurance_total_net
		     $sql="SELECT a.id AS CtrlID , a.check_payment_date , a.control_month, a.control_year, a.delivery_allowance , a.control_section , a.keygroup ,a.revieve_date , a.act_delivery_allowance , a.act_check_payment_date , a.act_revieve_date , a.select_ins_bill , a.select_act_bill  "
					  ." ,b.id AS workID, b.* , c.insurance_type_name , d.company_name "
					  ." , e.insurance_type_name AS actTypeName , f.company_name  AS actCorpName , g.province_name  " //act data
					  ." , h.agent_name "
					  ." FROM tbl_insurance_control_board AS a "
					  ." LEFT JOIN tbl_insurance_data AS b ON a.work_id=b.id "
					  ." LEFT JOIN tbl_insurance_type AS c ON b.insurance_type_id=c.id "
					  ." LEFT JOIN tbl_insurance_company AS d ON b.insurance_corp_id=d.id "
					  ." LEFT JOIN tbl_insurance_type AS e ON b.act_type_id =e.id "
					  ." LEFT JOIN tbl_insurance_company AS f ON b.corp_id =f.id "					  
					  ." LEFT JOIN tbl_province AS g ON b.province_regis =g.id "
					  ." LEFT JOIN tbl_agent_data AS h ON b.agent_id = h.id "
					  ." WHERE a.control_month = '".$data['monthIndex']."'  AND a.control_year='".$data['selectYear']."' AND a.is_tex_customer='0'  ORDER BY a.keygroup ASC , a.id ASC "; 
		    $returnValue['resultData'] =  $this->db->query($sql)->result();
		    $returnValue['sql']=$sql;
		  //----other-----------data
		 $sqlCaption="SELECT id AS CtrlID , text_caption , amount, amount_delivery , work_id AS insurance_id  , control_month, control_year, keygroup FROM tbl_insurance_control_board  "
			 ."  WHERE control_month = '".$data['monthIndex']."'  AND control_year='".$data['selectYear']."' AND is_tex_customer='1'  ORDER BY id ASC  ";
		 $returnValue['resultDataCaption'] = $this->db->query($sqlCaption)->result();
		 $returnValue['sql'] = $sql;
		 $returnValue['sqlCaption'] = $sqlCaption;
		    return $returnValue;
	 }
	 //----------------------------------
	 function hide_anticipate_customer($data){
		 $sql="UPDATE tbl_anticipate_customer SET cust_status='0' WHERE id = '".$data['dataID']."' ";
		 if($this->db->query($sql)){
				  $returnValue['doDb']=1;
			}
		 $returnValue['sql']=$sql;
		 return $returnValue;
	 }
	 //----------------------------------
	 function updateAnticipateRemark($data){
		  $returnValue=array();
		 $returnValue['doDb']=0;
		 $data['changeValue'] = htmlspecialchars($data['changeValue']);
		 $sql="UPDATE tbl_anticipate_customer SET anticipate_remark='".$data['changeValue']."' WHERE id = '".$data['dataID']."' ";
		 if($this->db->query($sql)){
				  $returnValue['doDb']=1;
			}
		 $returnValue['sql']=$sql;
		 return $returnValue;
	 }
	 //----------------------------------
	 function list_anticipate_customer($status){
		 $sql="SELECT a.* , b.car_brand_name , c.province_name , d.type_name "
			 ." FROM tbl_anticipate_customer AS a "
			 ." LEFT JOIN tbl_car_brand AS b ON a.brand_id = b.id "
			 ." LEFT JOIN  tbl_province AS c ON a.province_regis  = c.id "
			 ." LEFT JOIN  tbl_car_type AS d ON a.car_type_id  = d.id "
			 ." WHERE cust_status='".$status."' ";
		 $result = $this->db->query($sql)->result();
		 return $result;
	 }
	 //----------------------------------car_type_id
	 function add_anticipate_customer($data){
		 $returnValue=array();
		 $returnValue['doDb']=0;
		 $sql="INSERT INTO tbl_anticipate_customer (`id`, `cust_name`, `cust_nickname`, `cust_telephone_1`, `cust_telephone_2`, `is_corporation`, `user_update`, `cust_status`, `anticipate_remark`, `brand_id`, `vehicle_regis`, `province_regis`, `date_regist`, `year_car`, `vin_no`, `car_model`, `car_type_id`, `type_premium_id`, `month_regist`, `date_add`) VALUES ('', '".$data['cust_name']."', '".$data['cust_nickname']."', '".$data['cust_telephone_1']."', '".$data['cust_telephone_2']."', '0', '".$this->session->userdata('user_id')."', '1', '".$data['anticipate_remark']."', '".$data['brand_id']."', '".$data['vehicle_regis']."', '".$data['province_regis']."', '".$data['date_regist']."', '".$data['year_car']."', '".$data['vin_no']."', '".$data['car_model']."', '".$data['car_type_id']."', '".$data['type_premium_id']."', '".$data['month_regist']."', now() ) ";
		 if($this->db->query($sql)){
				  $returnValue['doDb']=1;
			}
		 $returnValue['sql']=$sql;
		 return $returnValue;
	 }
	 //----------------------------------
	 function getAnticipateReference($anticipate_reference){
		 $returnValue=array();
		 $sql="SELECT * FROM tbl_anticipate_customer WHERE id = '".$anticipate_reference."' ";
		 $result = $this->db->query($sql)->result();
		 $returnValue['sql']=$sql;
		 foreach($result AS $data){
			 $returnValue['getData'] = $data;
		 }
		 return $returnValue;
	 }
	 //---------------------------------theValue  control_month control_year
	 function updateDateControlBoard($data){
		 $returnValue=array();
		 $returnValue['DoDb']=0;
		 //print_r($data);
		 $field = $data['field'];
		$sql="UPDATE tbl_insurance_control_board SET $field  = '".$data['theValue']."' WHERE keygroup = '".$data['keygroup']."' "; 
			if($this->db->query($sql)){
				  $returnValue['DoDb']=1;
			}
		 $returnValue['sql']=$sql;
		  return $returnValue;
	 }
	 //---------------------------------act_receipt_date  act_delivery_allowance ins_receipt_date tbl_insurance_control_board 
	 function UpdateBoardControl($data){
		 $returnValue=array();
		 $returnValue['DoDb']=0;
		 $field = $data['field'];
		 if(($field=='amt_recieve_act')||($field=='amt_recieve_ins')||($field=='delivery_allowance')||($field=='amount')||($field=='amount_delivery')||($field=='amount_delivery')||($field=='act_delivery_allowance')){
			 $data['changeValue'] = $this->removeComma($data['changeValue']);
		 }
		if(($field=='amt_recieve_act')||($field=='amt_recieve_ins')){
			$sql="UPDATE tbl_insurance_data SET  $field = '".$data['changeValue']."' WHERE id = '".$data['insurance_id']."' ";
			if($this->db->query($sql)){
				  $returnValue['DoDb']=1;
			}
		}else {
			$sql="UPDATE tbl_insurance_control_board SET  $field = '".$data['changeValue']."' WHERE work_id = '".$data['insurance_id']."' AND id = '".$data['dataID']."' ";
			if($this->db->query($sql)){
				  $returnValue['DoDb']=1;
			}
		}
		 // act_check_payment_date check_payment_date
		 if(($field=='check_payment_date')||($field=='act_check_payment_date')){
			  $data['changeValue'] = $this->translateDateToEng($data['changeValue']);
			 $sql="UPDATE tbl_insurance_control_board SET check_payment_date = '".$data['changeValue']."' ,act_check_payment_date = '".$data['changeValue']."' WHERE keygroup = '".$data['keygroup']."'  ";
			 //$sql="UPDATE tbl_insurance_control_board SET $field = '".$data['changeValue']."'  WHERE keygroup = '".$data['keygroup']."'  ";
			// $sql="UPDATE tbl_insurance_control_board SET $field = '".$data['changeValue']."'  WHERE  id = '".$data['dataID']."'  ";
			 if($this->db->query($sql)){
				  $returnValue['DoDb']=1;
			}
		 }
		  if(($field=='act_receipt_date')||($field=='ins_receipt_date')){
			   $data['changeValue'] = $this->translateDateToEng($data['changeValue']);
			   $sql="UPDATE tbl_insurance_data SET $field =  '".$data['changeValue']."' WHERE id = '".$data['insurance_id']."'  ";
			  if($this->db->query($sql)){
				  $returnValue['DoDb']=1;
			} 
		  }
		 $returnValue['sql']=$sql;
		 return $returnValue;
	 } 
	 //----------------------------------UpdateBoardControl($data); // field:field , dataID:dataID changeValue
	 function DeleteControl($data){
		 $returnValue=array();
		 $returnValue['DoDb']=0;
		 $sql="DELETE FROM  tbl_insurance_control_board  WHERE id = '".$data['dataID']."' ";
		 if($this->db->query($sql)){
				  $returnValue['DoDb']=1;
			}
		 $returnValue['sql']=$sql;
		 return $returnValue;
	 }
	 //----------------------------------//dataID:dataID,fname:fname,chVal:chVal
	 function updateBillAmt($data){
		$returnValue=array();
		$returnValue['DoDb']=0;
	 	$sql="UPDATE tbl_insurance_billing SET ".$data['fname']." = '".$data['chVal']."' WHERE id = '".$data['dataID']."'  ";
		if($this->db->query($sql)){
				  $returnValue['DoDb']=1;
			}
		 $returnValue['sql']=$sql;
		 return $returnValue;
	 } 
	 //----------------------------------
	 function saveBilling($data){
		 //  keygroup:keygroup , bill_company_id:bill_company_id , blii_code_id:blii_code_id , select_day_bill:select_day_bill, select_month_bill:select_month_bill,select_year_bill:select_year_bill
		 //-check keygroup 
		 $returnValue=array();
		 $returnValue['DoDb']=0;
		 $select_day_bill = sprintf("%02d", $data['select_day_bill']);
		 $select_month_bill = sprintf("%02d", $data['select_month_bill']);
		 // select_month_start:select_month_start ,select_day_end:select_day_end,select_month_end:select_month_end,select_year:select_year
		 $bill_date = $data['select_year_bill']."-".$select_month_bill."-".$select_day_bill;
		 $bill_date_start = $data['select_year']."-".$data['select_month_start']."-".$data['select_day_start'];
		 $bill_date_end = $data['select_year']."-".$data['select_month_end']."-".$data['select_day_end'];
		 if(isset($data['transfer_money'])){
			 $data['transfer_money'] = $this->removeComma($data['transfer_money']);
		 }
		$data['select_year_bill']=$data['select_year'];
		 $sql="SELECT id FROM  tbl_insurance_billing  WHERE keygroup = '".$data['keygroup']."' ";
		 $result =$this->db->query($sql)->result();
		 $checkID = '';
		 foreach($result AS $check){
		 	 $checkID = $check->id;
		 }
		 if($checkID !=''){ //--------updatre date_payment check_no pay_type paid_bye period_bill_start
			  $sql="UPDATE tbl_insurance_billing SET bill_date = '".$bill_date."' , period_year  = '".$data['select_year_bill']."' , company_id  = '".$data['bill_company_id']."' , code_id = '".$data['blii_code_id']."' "
				  ." ,pay_type='".$data['pay_type']."',  transfer_money='".$data['transfer_money']."', check_no='".$data['check_no']."', check_bank_name='".$data['check_bank_name']."' , date_payment='".$data['date_payment']."'  "
				  ." , paid_bye='".$data['paid_bye']."', paid_bye_date='".$data['paid_bye_date']."', approve_by='".$data['approve_by']."',approve_by_date='".$data['approve_by_date']."', collector='".$data['collector']."', collector_date='".$data['collector_date']."' , period_bill_start = '".$bill_date."' , period_bill_end='".$bill_date_end."' , credit_card='".$data['credit_card']."', check_data='".$data['check_data']."'"
				  ." WHERE id = '".$check->id."'  ";
			if($this->db->query($sql)){
				  $returnValue['DoDb']=1;
			}
		 }else{ //insert
			 $dateAdd = date("Y-m-d");
			 $sql="INSERT INTO tbl_insurance_billing (id,bill_date,period_year,company_id,code_id,date_add,keygroup,pay_type,transfer_money,check_no,check_bank_name, date_payment, paid_bye, paid_bye_date ,approve_by,approve_by_date , collector , collector_date, period_bill_start, period_bill_end,credit_card,check_data ) VALUES('', '".$bill_date."','".$data['select_year_bill']."','".$data['bill_company_id']."' , '".$data['blii_code_id']."', '".$dateAdd."' , '".$data['keygroup']."', '".$data['pay_type']."', '".$data['transfer_money']."', '".$data['check_no']."', '".$data['check_bank_name']."' ,'".$data['date_payment']."' , '".$data['paid_bye']."' , '".$data['paid_bye_date']."' , '".$data['approve_by']."' , '".$data['approve_by_date']."' , '".$data['collector']."' , '".$data['collector_date']."' , '".$bill_date."' , '".$bill_date_end."' , '".$data['credit_card']."' , '".$data['check_data']."'  )";
			 if($this->db->query($sql)){
				  $returnValue['DoDb']=1;
			}
		 }
		  $returnValue['sql']=$sql;
		 /*
		  $returnValue['paid_bye']=$data->paid_bye;
		     $returnValue['paid_bye_date']=$data->paid_bye_date;
		     $returnValue['approve_by']=$data->approve_by;
		     $returnValue['approve_by_date']=$data->approve_by_date;
		     $returnValue['collector']=$data->collector;
		     $returnValue['collector_date']=$data->collector_date;
		 */
		  return $returnValue;
	 }
	 //----------------------------------
	 function getBillData($keygroup){
		 $returnValue=array();
		 $returnValue['pay_transfer']=''; $returnValue['pay_check']=''; 
		  $returnValue['transfer_money']='';
		  $returnValue['check_no']='';
		  $returnValue['check_bank_name']='';
		  $returnValue['date_payment']='';
		  $returnValue['collector']='';
		  $returnValue['collector_date']='';
		  $returnValue['paid_bye']='';
		  $returnValue['paid_bye_date']='';
		  $returnValue['approve_by']='';
		  $returnValue['approve_by_date']='';
		  $returnValue['credit_card']='';
		  $returnValue['check_data']='';
		 $sql="SELECT a.*  , b.company_name , c.conde_name  , d.amt_recieve_act, d.amt_recieve_ins , d.insurance_start ,d.act_date_start" 
              ." FROM tbl_insurance_billing AS a "
			  ." LEFT JOIN tbl_insurance_company AS b ON a.company_id  = b.id "
			  ." LEFT JOIN tbl_code_data AS c ON a.code_id   = c.id "
			  ." LEFT JOIN tbl_insurance_data AS d ON a.insurance_id   = d.id "
			 ." WHERE a.keygroup = '".$keygroup."' ";
		 $resultData = $this->db->query($sql)->result();
		 foreach($resultData AS $data){
			 $returnValue['company_id']=$data->company_id;
			 $bankID=$data->company_id;
			 $returnValue['code_id']=$data->code_id;
			 $billDateArray = explode("-",$data->bill_date);
			 $returnValue['bill_date']=$billDateArray[2];
			 $returnValue['select_month_bill']=$billDateArray[1];
			 $returnValue['select_year_bill']=$billDateArray[0];
			 $returnValue['company_id']=$data->company_id;
			 $returnValue['company_name']=$data->company_name;
			 $returnValue['conde_name']=$data->conde_name;
			 $returnValue['paid_bye']=$data->paid_bye;
		     $returnValue['paid_bye_date']=$data->paid_bye_date;
		     $returnValue['approve_by']=$data->approve_by;
		     $returnValue['approve_by_date']=$data->approve_by_date;
		     $returnValue['collector']=$data->collector;
		     $returnValue['collector_date']=$data->collector_date;
		     $returnValue['period_bill_start']=$data->period_bill_start;
		     $returnValue['period_bill_end']=$data->period_bill_end;
		     $returnValue['keygroup']=$data->keygroup;
		     $returnValue['billID']=$data->id;
		     $returnValue['billDate']=$data->bill_date;
		     $returnValue['credit_card']=$data->credit_card;
		     $returnValue['check_data']=$data->check_data;
			 //$returnValue['pay_type']=$data->pay_type;
			 if($data->pay_type=='2'){
				 $returnValue['pay_transfer']="checked";
			 }
			  if($data->pay_type=='3'){
				 $returnValue['pay_check']="checked";
			 }
			 $returnValue['transfer_money']=$data->transfer_money;
			 $returnValue['check_no']=$data->check_no;
			 $returnValue['check_bank_name']=$data->check_bank_name;
			 $returnValue['date_payment']=$data->date_payment;
		 }
		 //-------get bank data--- transfer_money
		 $returnValue['bank_name']="";
		 $returnValue['bank_acc_branch']="";
		 $returnValue['bank_acc_no']="";
		 $returnValue['bank_acc_name']="";
		 if(isset($returnValue['company_id'])){
			 $sql="SELECT * FROM tbl_insurance_company WHERE use_branch='1' AND id = '".$returnValue['company_id']."' ";
			 $resultData = $this->db->query($sql)->result();
			 foreach($resultData AS $corp){
				  $returnValue['bank_name']=$corp->bank_name;
				  $returnValue['bank_acc_branch']=$corp->bank_acc_branch;
				  $returnValue['bank_acc_no']=$corp->bank_acc_no;
				  $returnValue['bank_acc_name']=$corp->bank_acc_name;
			 }
		 }
		 $returnValue['sql']=$sql;   // 
		return $returnValue;
	 }
	 //----------------------------------
	 function DeleteFromBill($dataID){
		 $returnValue=array();
		 $returnValue['DoDb']=0;
		 $sql="DELETE FROM tbl_insurance_billing WHERE id = '".$dataID."' ";
		 if($this->db->query($sql)){
				  $returnValue['DoDb']=1;
			}
		 $returnValue['sql']=$sql;
		 return $returnValue;
	 }
	 //----------------------------------dataID:dataID,field:field,updateValue:updateValue
	 function updateSelectTobill($data){
		 $returnValue=array();
		 $field = $data['field'];
		 $sql = "UPDATE tbl_insurance_control_board SET $field = '".$data['updateValue']."' WHERE id = '".$data['dataID']."'  ";
		 if($this->db->query($sql)){
				  $returnValue['DoDb']=1;
		  }
		 $returnValue['sql']=$sql;
		 return $returnValue;
	 }
	 //---------------------------------- 
	 function listBilling($data){
		  $returnValue=array();
		  $billdate = $data['selectYear']."-".$data['selectMonth']."-".$data['selectDate'];
		  $sql="SELECT a.* , b.cust_name , b.vehicle_regis, b.insurance_no , b.act_no , b.insurance_total, b.act_price_total  "
			   ." FROM tbl_insurance_billing AS a "
			   ." LEFT JOIN tbl_insurance_data AS b ON a.insurance_id  = b.id "
			   ." WHERE a.bill_date = '".$billdate."' ";
		  $returnValue['resultData'] = $this->db->query($sql)->result();
		  $returnValue['sql']=$sql;
		  return $returnValue;
	 }
	 //----------------------------------currentMonth currentYear
	 function getMonthYearControl($data){
		  $returnValue=array();
		  $returnValue['currentMonth'] = date("m");
		  $returnValue['currentYear'] = date("Y");
		  $sql = "SELECT control_month , control_year FROM tbl_insurance_control_board WHERE  keygroup= '".$data['keygroup']."' GROUP BY keygroup ";
		  $result = $this->db->query($sql)->result();
		  foreach($result AS $data){
			  $returnValue['currentMonth'] = $data->control_month;
			  $returnValue['currentYear'] = $data->control_year;
		  }
		  return $returnValue;
	 }
	 //----------------------------------
	 function getOtherInsID($insurance_data_type,$workID){
		 $getID = array();
		 switch($insurance_data_type){
			 case "4" :
				 $tbl = " tbl_insurance_accident_data ";
				 $sql="SELECT id, work_id , payment_amount , totalprice_installment FROM $tbl WHERE work_id ='".$workID."' ";
			 break;
			 case "5" :
				 $tbl = "  tbl_insurance_home_data ";
				 $sql="SELECT id, work_id , payment_amount , totalprice_installment FROM $tbl WHERE work_id ='".$workID."' ";
			 break;	
			 case "3" :
				  $tbl = "  tbl_insurance_shpping_data ";
				 $sql="SELECT id, work_id , payment_amount , premium AS  totalprice_installment FROM $tbl WHERE work_id ='".$workID."' ";
			 break;	 
			case "2" :
				 $tbl = "  tbl_insurance_travel_data ";
				 $sql="SELECT id, work_id , payment_amount , Insurance_price AS  totalprice_installment FROM $tbl WHERE work_id ='".$workID."' ";
			 break;	 	 
		 }
		  $result = $this->db->query($sql)->result();
		  $getID['sql']=$sql;
		  foreach($result AS $data){
			  $getID['ins_id'] = $data->id;
			  $getID['work_id'] = $data->work_id;
			  $getID['payment_amount'] = $data->payment_amount;
			  $getID['totalprice_installment'] = $data->totalprice_installment;
		  }
		 return $getID;
	 }
	 //---------------------------------pay_cash_status-  ins_pay_type  
	 function  getPaymentDetail($countInstallment,$rowType,$workID,$insurance_data_type){
		$returnValue=array(); 
		$returnValue['receipt_date'] = array();
		$returnValue['recieve_amount'] = array();
		$returnValue['is_credit_card'] = 0;
		if($countInstallment==0){
			switch($rowType){
				 case "insurance" :
					$sql="SELECT a.ins_pay_type, a.ins_pay_bank_id , a.ins_receipt_date , a.pay_cash_status, a.amt_recieve_ins , b.bank_name,b.bank_acc_name FROM tbl_insurance_data AS a LEFT JOIN  tbl_bookbank_data AS b ON a.ins_pay_bank_id = b.id WHERE a.id = '".$workID."' ";
					$resultData = $this->db->query($sql)->result();
					$returnValue['sql1-ins'] = $sql;
					foreach($resultData AS $data){
						//if($data->ins_pay_type=='2'){
						//	$returnValue['bankName']=$data->bank_name." ".$data->bank_acc_name;
						//}else{
							switch($data->ins_pay_type){
								case "1" :
									$returnValue['bankName']='เงินสด';
								break;
								case "2" :
									$returnValue['bankName']=$data->bank_name." ".$data->bank_acc_name;
								break;
								case "3" :
									//$returnValue['bankName']='บัตรเครดิต'." ".$data->bank_name;
									$returnValue['bankName']='บัตรเครดิต';
									$returnValue['is_credit_card']=1;
								break;
								case "4" :
									$returnValue['bankName']='เช็ค'." ".$data->bank_name;;
								break;	
								case "0":
									$returnValue['bankName']='ไม่ระบุ';
								break;
							//}
						}
						$returnValue['ins_pay_type'][] = $data->ins_pay_type;	
						$returnValue['recieve_amount'][]=$data->amt_recieve_ins;
						$returnValue['recieve_amount_txt']=number_format($data->amt_recieve_ins,2);
						$returnValue['receipt_date'][]=$this->translateDateToThai($data->ins_receipt_date);
					}
				 break;
				 case "act" :
					$sql="SELECT a.ins_pay_type, a.act_pay_type , a.act_receipt_date , a.act_pay_bank_id, a.amt_recieve_act , b.bank_name,b.bank_acc_name FROM tbl_insurance_data AS a LEFT JOIN  tbl_bookbank_data AS b ON a.act_pay_bank_id = b.id WHERE a.id = '".$workID."' ";
					$resultData = $this->db->query($sql)->result();
					$returnValue['sql-act'] = $sql;
					foreach($resultData AS $data){
						//if($data->ins_pay_type=='2'){
						//	$returnValue['bankName']=$data->bank_name." ".$data->bank_acc_name;
						//}else{
							switch($data->act_pay_type){
								case "1" :
									$returnValue['bankName']='เงินสด';
								break;
								case "2" :
									$returnValue['bankName']=$data->bank_name." ".$data->bank_acc_name;
								break;
								case "3" :
									//$returnValue['bankName']='บัตรเครดิต'." ".$data->bank_name;;
									$returnValue['bankName']='บัตรเครดิต';
									$returnValue['is_credit_card']=1;
								break;
								case "4" :
									$returnValue['bankName']='เช็ค'." ".$data->bank_name;;
								break;	
								case "0":
									$returnValue['bankName']='ไม่ระบุ';
								break;
							}
						//}
						$returnValue['ins_pay_type'][] = $data->act_pay_type;	
						$returnValue['recieve_amount'][]=$data->amt_recieve_act;
						$returnValue['recieve_amount_txt']=number_format($data->amt_recieve_act,2);
						$returnValue['receipt_date'][]=$this->translateDateToThai($data->act_receipt_date);
					}
				 break;
				 case "insuranceOther" :
					 switch($insurance_data_type){
						 case "4" :
							$sql="SELECT a.ins_pay_type , z.ins_receipt_date , a.pay_cash_status, a.ins_pay_bank_id, z.amt_recieve_ins , b.bank_name,b.bank_acc_name "
								." FROM tbl_insurance_accident_data AS z "
								." LEFT JOIN tbl_insurance_data AS a ON z.work_id = a.id "
								." LEFT JOIN  tbl_bookbank_data AS b ON a.ins_pay_bank_id = b.id WHERE a.id = '".$workID."' ";
							$resultData = $this->db->query($sql)->result();
							$returnValue['sqlOther4'] = $sql;
								foreach($resultData AS $data){
										switch($data->ins_pay_type){
											case "1" :
												$returnValue['bankName']='เงินสด';
											break;	
											case "2" :
												$returnValue['bankName']=$data->bank_name." ".$data->bank_acc_name;
											break;
											case "3" :
												$returnValue['bankName']='บัตรเครดิต';
												$returnValue['is_credit_card']=1;
											break;
											case "4" :
												$returnValue['bankName']='เช็ค'." ".$data->bank_name;;
											break;
											case "0":
											$returnValue['bankName']='ไม่ระบุ';
											break;	
									}
									if(!isset($data->amt_recieve_ins)){ $data->amt_recieve_ins=0; }
									$returnValue['recieve_amount'][]=$data->amt_recieve_ins;
									$returnValue['recieve_amount_txt']=number_format($data->amt_recieve_ins,2);
									$returnValue['receipt_date'][]=$this->translateDateToThai($data->ins_receipt_date);
									$returnValue['ins_pay_type'][] = $data->ins_pay_type;
								}
						 break;
						 case "5" :
							 $sql="SELECT a.ins_pay_type , z.ins_receipt_date , a.pay_cash_status, a.ins_pay_bank_id, z.amt_recieve_ins , b.bank_name,b.bank_acc_name "
								." FROM tbl_insurance_home_data AS z "
								." LEFT JOIN tbl_insurance_data AS a ON z.work_id = a.id "
								." LEFT JOIN  tbl_bookbank_data AS b ON a.ins_pay_bank_id = b.id WHERE a.id = '".$workID."' ";
							$resultData = $this->db->query($sql)->result();
							$returnValue['sqlOther5'] = $sql;
								foreach($resultData AS $data){
										switch($data->ins_pay_type){
											case "1" :
												$returnValue['bankName']='เงินสด';
											break;
											case "2" :
												$returnValue['bankName']=$data->bank_name." ".$data->bank_acc_name;
											break;
											case "3" :
												$returnValue['bankName']='บัตรเครดิต';
												$returnValue['is_credit_card']=1;
											break;
											case "4" :
												$returnValue['bankName']='เช็ค'." ".$data->bank_name;;
											break;
											case "0":
											$returnValue['bankName']='ไม่ระบุ';
											break;	
									}
									if(!isset($data->amt_recieve_ins)){ 
										$data->amt_recieve_ins=0; 
									}
									$returnValue['recieve_amount'][]=$data->amt_recieve_ins;
									$returnValue['recieve_amount_txt']=number_format($data->amt_recieve_ins,2);
									$returnValue['receipt_date'][]=$this->translateDateToThai($data->ins_receipt_date);
									$returnValue['ins_pay_type'][]=$data->ins_pay_type;
								}
						 break;	
						 case "3" :
							 $sql="SELECT a.ins_pay_type , z.ins_receipt_date, a.pay_cash_status, a.ins_pay_bank_id, z.amt_recieve_ins , b.bank_name,b.bank_acc_name "
								." FROM tbl_insurance_shpping_data AS z "
								." LEFT JOIN tbl_insurance_data AS a ON z.work_id = a.id "
								." LEFT JOIN  tbl_bookbank_data AS b ON a.ins_pay_bank_id = b.id WHERE a.id = '".$workID."' ";
							$resultData = $this->db->query($sql)->result();
							$returnValue['sqlOther4'] = $sql;
								foreach($resultData AS $data){
										switch($data->ins_pay_type){
											case "1" :
												$returnValue['bankName']='เงินสด';
											break;
											case "2" :
												$returnValue['bankName']=$data->bank_name." ".$data->bank_acc_name;
											break;
											case "3" :
												$returnValue['bankName']='บัตรเครดิต';
												$returnValue['is_credit_card']=1;
											break;
											case "4" :
												$returnValue['bankName']='เช็ค'." ".$data->bank_name;;
											break;
											case "0":
											$returnValue['bankName']='ไม่ระบุ';
											break;	
									}
									if(!isset($data->amt_recieve_ins)){ $data->amt_recieve_ins=0; }
									$returnValue['recieve_amount'][]=$data->amt_recieve_ins;
									$returnValue['recieve_amount_txt']=number_format($data->amt_recieve_ins,2);
									$returnValue['receipt_date'][]=$this->translateDateToThai($data->ins_receipt_date);
									$returnValue['ins_pay_type'][]=$data->ins_pay_type;
								}
						 break;	
						 case "2" :
							 $sql="SELECT a.ins_pay_type , z.ins_receipt_date, a.pay_cash_status, a.ins_pay_bank_id, z.amt_recieve_ins , b.bank_name,b.bank_acc_name "
								." FROM tbl_insurance_travel_data AS z "
								." LEFT JOIN tbl_insurance_data AS a ON z.work_id = a.id "
								." LEFT JOIN  tbl_bookbank_data AS b ON a.ins_pay_bank_id = b.id WHERE a.id = '".$workID."' ";
							$resultData = $this->db->query($sql)->result();
							$returnValue['sqlOther4'] = $sql;
								foreach($resultData AS $data){
										switch($data->ins_pay_type){
											case "1" :
												$returnValue['bankName']='เงินสด';
											break;
											case "2" :
												$returnValue['bankName']=$data->bank_name." ".$data->bank_acc_name;
											break;
											case "3" :
												$returnValue['bankName']='บัตรเครดิต';
												$returnValue['is_credit_card']=1;
											break;
											case "4" :
												$returnValue['bankName']='เช็ค'." ".$data->bank_name;;
											break;
											case "0":
											$returnValue['bankName']='ไม่ระบุ';
											break;	
									}
									if(!isset($data->amt_recieve_ins)){ $data->amt_recieve_ins=0; }
									$returnValue['recieve_amount'][]=$data->amt_recieve_ins;
									$returnValue['recieve_amount_txt']=number_format($data->amt_recieve_ins,2);
									$returnValue['receipt_date'][]=$this->translateDateToThai($data->ins_receipt_date);
									$returnValue['ins_pay_type'][]=$data->ins_pay_type;
								}
						 break;							 
					 }
				 break;				 
			 }
		}else if($countInstallment > 0){
			 switch($rowType){
				 case "insurance" :
					 $sql="SELECT a.* ,  b.bank_name ,b.bank_acc_name FROM tbl_insurance_payment AS a LEFT JOIN  tbl_bookbank_data AS b ON a.bank_id  = b.id WHERE a.work_id = '".$workID."' AND a.is_payment='1' ";
					 $returnValue['sql-ins-installment'] = $sql;
					 $returnValue['bankName']=''; 
					 $returnValue['recieve_amount_txt']='';
					 $sum_recieve_amount = 0;
					 $resultData = $this->db->query($sql)->result();
					 foreach($resultData AS $data){
						 switch($data->pay_type){
								case "1" :
									$data->bank_name='เงินสด';
								break;
							 	case "2" :
									$data->bank_name=$data->bank_name." ".$data->bank_acc_name;
								break;										 
								case "3" :
									$data->bank_name='บัตรเครดิต';
									$returnValue['is_credit_card']=1;
								break;
								case "4" :
									$data->bank_name='เช็ค'." ".$data->bank_acc_name;;
								break;										
							}
						 $returnValue['bankName']=$returnValue['bankName'].$data->bank_name."<br>";
						 $returnValue['recieve_amount_txt']=$returnValue['recieve_amount_txt'].number_format($data->amount-$data->discount,2)."<br>";
						 $returnValue['receipt_date'][]=$this->translateDateToThai($data->receipt_date)."<br>";
						 $returnValue['recieve_amount'][] = ($data->amount-$data->discount);
						 $returnValue['ins_pay_type'][]=$data->pay_type;
					 }
				 break;
				 case "act" :
					 $sql="SELECT a.* ,  b.bank_name ,b.bank_acc_name FROM tbl_insurance_payment AS a LEFT JOIN  tbl_bookbank_data AS b ON a.bank_id  = b.id WHERE a.work_id = '".$workID."' AND a.is_payment='1' ";
					 $returnValue['sql-ins-installment'] = $sql;
					 $returnValue['bankName']=''; 
					 $returnValue['recieve_amount_txt']='';
					 $sum_recieve_amount = 0;
					 $resultData = $this->db->query($sql)->result();
					 foreach($resultData AS $data){
						 switch($data->pay_type){
								case "1" :
									$data->bank_name='เงินสด';
								break;
								case "2" :
									$data->bank_name=$data->bank_name." ".$data->bank_acc_name;
								break;								
							    case "3" :
									$data->bank_name='บัตรเครดิต';
									//$data->bank_name='บัตรเครดิต'." ".$data->bank_acc_name;
									$returnValue['is_credit_card']=1;
								break;
								case "4" :
									$data->bank_name='เช็ค';
								break;										
							}
						 $returnValue['bankName']=$returnValue['bankName'].$data->bank_name."<br>";
						 $returnValue['recieve_amount_txt']=$returnValue['recieve_amount_txt'].number_format($data->amount-$data->discount,2)."<br>";
						 $returnValue['receipt_date'][]=$this->translateDateToThai($data->receipt_date)."<br>";
						 $returnValue['recieve_amount'][] = ($data->amount-$data->discount);
						 $returnValue['ins_pay_type'][]=$data->pay_type;
					 }
				 break;
				 case "insuranceOther" :
					  $sql="SELECT a.* ,  b.bank_name ,b.bank_acc_name FROM tbl_insurance_payment AS a LEFT JOIN  tbl_bookbank_data AS b ON a.bank_id  = b.id WHERE a.work_id = '".$workID."' AND a.is_payment='1' ";
					 $returnValue['sql-ins-installment'] = $sql;
					 $returnValue['bankName']=''; 
					 $returnValue['recieve_amount_txt']='';
					 $sum_recieve_amount = 0;
					 $resultData = $this->db->query($sql)->result();
					 foreach($resultData AS $data){
						 switch($data->pay_type){
								case "1" :
									$data->bank_name='เงินสด';
								break;
							 	case "2" :
									$data->bank_name=$data->bank_name." ".$data->bank_acc_name;
								break;										 
								case "3" :
									$data->bank_name='บัตรเครดิต';
									$returnValue['is_credit_card']=1;
									//$data->bank_name='บัตรเครดิต'." ".$data->bank_acc_name;
								break;
								case "4" :
									$data->bank_name='เช็ค';
								break;										
							}
						 $returnValue['bankName']=$returnValue['bankName'].$data->bank_name."<br>";
						 $returnValue['recieve_amount_txt']=$returnValue['recieve_amount_txt'].number_format($data->amount-$data->discount,2)."<br>";
						 $returnValue['receipt_date'][]=$this->translateDateToThai($data->receipt_date)."<br>";
						 $returnValue['recieve_amount'][] = ($data->amount-$data->discount);
						 $returnValue['ins_pay_type'][]=$data->pay_type;
					 }
				 break;				 
			 }
		}
	   return $returnValue; 
	 }
	 //----------------------------------bank_name AND a.is_tex_customer='0'  a.
	 function updateNetBalance($fieldName, $insurance_total_net,$CtrlID){
		 $returnValue=array();
		 $returnValue['doDb']=0;
		 $sql="UPDATE tbl_insurance_control_board SET $fieldName = '".$insurance_total_net."' WHERE id = '".$CtrlID."' ";
		 if($this->db->query($sql)){
			 $returnValue['doDb']=1;
		 }
		 return $returnValue;
	 }
	 //----------------------------------bank_name AND a.is_tex_customer='0'  a. net
	 function listcontrolByKey($data){
		 $returnValue=array();
		  $sql="SELECT a.id AS CtrlID, a.work_id AS insurance_id , a.check_payment_date , a.control_month, a.control_year , a.net_balance, a.net_balance_act, a.delivery_allowance , a.control_section ,a.agent_name , a.keygroup ,a.revieve_date , a.act_delivery_allowance , a.act_check_payment_date , a.act_revieve_date , a.select_ins_bill , a.select_act_bill "
					  ." ,b.id AS workID, b.* , c.insurance_type_name , d.company_name "
					  ." , e.insurance_type_name AS actTypeName , f.company_name  AS actCorpName , g.province_name  " //act data
					  ." , h.agent_name AS agentTbName "
			          ." ,(SELECT COUNT(id) FROM tbl_insurance_payment WHERE work_id=b.id) AS countInstallment"
					  ." FROM tbl_insurance_control_board AS a "
					  ." LEFT JOIN tbl_insurance_data AS b ON a.work_id=b.id "
					  ." LEFT JOIN tbl_insurance_type AS c ON b.insurance_type_id=c.id "
					  ." LEFT JOIN tbl_insurance_company AS d ON b.insurance_corp_id=d.id "
					  ." LEFT JOIN tbl_insurance_type AS e ON b.act_type_id =e.id "
					  ." LEFT JOIN tbl_insurance_company AS f ON b.corp_id =f.id "					  
					  ." LEFT JOIN tbl_province AS g ON b.province_regis =g.id "
					  ." LEFT JOIN tbl_agent_data AS h ON b.agent_id = h.id "
					  ." WHERE a.keygroup= '".$data['keygroup']."'  ORDER BY a.id ASC "; 
		 $returnValue['resultData'] = $this->db->query($sql)->result();
		 //------------control month------------ ,control_month , control_year
		 $sqlHead="SELECT control_month , control_year FROM tbl_insurance_control_board  WHERE keygroup= '".$data['keygroup']."' GROUP BY  keygroup ";
		 $returnValue['control_month']=date("m");
		 $returnValue['control_year']=date("Y");
		 $resultHead = $this->db->query($sqlHead)->result();
		 foreach($resultHead AS $head){
			 $returnValue['control_month']=$head->control_month;
		 	 $returnValue['control_year']=$head->control_year;
		 }
		 //----other-----------data
		 $sqlCaption="SELECT id AS CtrlID , text_caption , amount, amount_delivery , work_id AS insurance_id  FROM tbl_insurance_control_board  "
			 ."  WHERE keygroup= '".$data['keygroup']."' AND is_tex_customer='1'  ORDER BY id ASC  ";
		 $returnValue['resultDataCaption'] = $this->db->query($sqlCaption)->result();
		 $returnValue['sql'] = $sql;
		 $returnValue['sqlCaption'] = $sqlCaption;
		 return $returnValue;
	 }
	 //---------------------------------- keygroup dataID keygroup control_month data_type
	 function addToBControlboard($data){
		 	if(($data['keygroup']=='')){
				$data['keygroup'] =	$this->getnerateKeyGroup(10);
			}
		 $returnValue=array();
		 $returnValue['DoDb']=0;
		 $returnValue['keygroup']=$data['keygroup'];
		 $period_date_start = $data['select_year']."-".$data['select_month_start']."-".$data['select_day_start'];
		 $period_date_end = $data['select_year']."-".$data['select_month_end']."-".$data['select_day_end'];
		 if($data['addType']=='0'){ 
		 //---------------------agent name
		 $sql="SELECT a.id , a.agent_id , b.agent_name FROM tbl_insurance_data AS a LEFT JOIN tbl_agent_data AS b ON a.agent_id=b.id WHERE a.id = '".$data['dataID']."' ";
		 $resultAgent = $this->db->query($sql)->result();
		 foreach($resultAgent AS $agent);
		 $angentName = $agent->agent_name;
		 //--------------------- ,:,:,:select_month_end,select_year:select_year
		 $sql="INSERT INTO `tbl_insurance_control_board` (`id`, `work_id`,`agent_name`, `delivery_allowance`, `check_payment_date`, `control_month`, `control_year`, `control_section`, `keygroup`, `seq`, `period_date_start`, `period_date_end`) VALUES ( '', '".$data['dataID']."','".$angentName."', '0', '', '".$data['control_month']."',  '".$data['control_year']."', '0', '".$data['keygroup']."' ,'1',  '".$period_date_start."',  '".$period_date_end."'); ";
		 if($this->db->query($sql)){
				  $returnValue['DoDb']=1;
			      //------get value from work
			 	  $lastInsertId = $this->db->insert_id();
		  }
		}else  if($data['addType']=='1'){
			$sql="INSERT INTO `tbl_insurance_control_board` (`id`, `work_id`,`agent_name`, `delivery_allowance`, `check_payment_date`, `control_month`, `control_year`, `control_section`, `keygroup`, `seq`, `text_caption`, `is_tex_customer`, `period_date_start`, `period_date_end`) VALUES ( '', '0','', '0', '', '".$data['control_month']."',  '".$data['control_year']."', '0', '".$data['keygroup']."' ,'2','".$data['text_caption']."','1' ,  '".$period_date_start."',  '".$period_date_end."'); ";
			if($this->db->query($sql)){
				  $returnValue['DoDb']=1;
			      //------get value from work
			 	  $lastInsertId = $this->db->insert_id();
		   }
		} 
		if($data['data_type']>1){ //update recieve_amt
			 switch($data['data_type']){
				 case "4" :
				 $tbl = " tbl_insurance_accident_data ";
			 break;
			 case "5" :
				 $tbl = "  tbl_insurance_home_data ";
			 break;	
			 case "3" :
				  $tbl = "  tbl_insurance_shpping_data ";
			 break;	 
			case "2" :
				 $tbl = "  tbl_insurance_travel_data ";
			 break;	
			 }	
			$amt_recieve_act = 0;
			$sql="SELECT id, amt_recieve_ins FROM $tbl WHERE work_id ='".$data['dataID']."' ";
			$result=$this->db->query($sql)->result();
			foreach($result AS $getDb){
				$amt_recieve_act = $getDb->amt_recieve_ins;
			}
			$sql="UPDATE  tbl_insurance_data SET amt_recieve_act='".$amt_recieve_act."' WHERE id ='".$data['dataID']."' ";
			$this->db->query($sql);
		}
		 /*
		 */
		 $returnValue['keygroup']=$data['keygroup'];
		// $returnValue['sql']=$sql;
		 return $returnValue;
	 }
	 //---------------------------------- 
	 function countPayment($workID){
		 $returnValue = 0;
		 $sql="SELECT COUNT(id) AS countRow FROM tbl_insurance_payment WHERE work_id = '".$workID."' ";
		 $result=$this->db->query($sql)->result();
		 foreach($result AS $data){
			  $returnValue = $data->countRow;
		 }
		  return $returnValue;
	 }
	 //---------------------------------- 
	 function addToBilling($data){
		  $returnValue=array();
		  $returnValue['DoDb']=0;
		    $billdate = $data['selectYear']."-".$data['selectMonth']."-".$data['selectDate'];
		    $dateAdd = date("Y-m-d");
	 		$sql="INSERT INTO `tbl_insurance_billing` "
				."(`id`, `insurance_id`, `period_bill`, `bill_date`, `period_year`, `company_id`, `agent_id`, `insurane_amount`, `act_amount`, `date_add`, `date_update`, `user_update`) "
				." VALUES "
				."('', '".$data['insurance_id']."', '0', '".$billdate."', '".$data['selectYear']."', '".$data['company_id']."', '".$data['agent_id']."', '0', '0', '".$dateAdd."', current_timestamp(), '".$this->session->userdata('user_id')."')";
		 if($this->db->query($sql)){
				  $returnValue['DoDb']=1;
			 	  $lastInsertId = $this->db->insert_id();
			      $Sql="SELECT a.*  FROM tbl_insurance_billing AS a ";
			}
		 $returnValue['sql']=$sql;
		 return $returnValue;
	 }
	 //---------------------------------- 
	 function updateAmountInstallment($data){
		  $returnValue=array();
		  $returnValue['DoDb']=0;
		  $data['amount_installment'] = $this->removeComma($data['amount_installment']);
		  $sql="UPDATE tbl_insurance_data SET amount_installment ='".$data['amount_installment']."'  WHERE id = '".$data['insWorkID']."'  ";
		  if($this->db->query($sql)){
				  $returnValue['DoDb']=1;
			}
		 $returnValue['sql']=$sql;
		 return $returnValue;
	 }
	 //----------------------------------  fieldCash:fieldCash,cash_type:cash_type,amt_revieve:amt_revieve cash_collection_feild,tran_collection_feild cash_collection_value,tran_collection_value
	 function updateCashPayment($data){
		  $returnValue=array();
		  $returnValue['DoDb']=0;
		  $returnValue['allData']=$data;
		  if(!isset($data['sumToAmtTotal'])){ $data['sumToAmtTotal'] ="Yes";}
		  $payType = $data['pay_type'];		
		  $bank_id = $data['bank_id'];		
		  $receipt_date = $this->translateDateToEng($data['receipt_date']);	
		  if($data['amt_revieve']==""){ $data['amt_revieve']=0; }
		  $data['amt_revieve'] = $this->removeComma($data['amt_revieve']);
		  $data['cash_collection_value'] = $this->removeComma($data['cash_collection_value']);
		  $data['tran_collection_value'] = $this->removeComma($data['tran_collection_value']);
		  $cash_collection_feild = $data['cash_collection_feild'];
		  $tran_collection_feild = $data['tran_collection_feild'];
		  // id_recieve_record,field_recieve_record  -- recieve_id
		  $txtRecord = '';
		  $data['recieve_id_ins'] = 0;
		  if($data['id_recieve_record']>0){
			    $fieldRecord = $data['field_recieve_record'];
			    $ValueRecord = $data['id_recieve_record'];
			  $txtRecord = " , $fieldRecord = '".$ValueRecord."' ";
			  $data['recieve_id_ins']=$data['id_recieve_record'];  //set recieve_id_ins recieve_id_carcheck 
		  }
		 $txtUpdateCashTran = " , $cash_collection_feild = '".$data['cash_collection_value']."' , $tran_collection_feild='".$data['tran_collection_value']."' ";
		  if($data['section']=='car_check'){
			  $sql = "UPDATE tbl_insurance_data SET car_check_pay_type = '".$payType."' , car_check_pay_bank_id = '".$bank_id."' , car_check_receipt_date = '".$receipt_date."' , ".$data['fieldCash']." = '".$data['cash_type']."' , amt_recieve_carcheck ='".$data['amt_revieve']."' $txtUpdateCashTran $txtRecord WHERE id = '".$data['insWorkID']."'  ";
		  }else if($data['section']=='act'){
			  $sql = "UPDATE tbl_insurance_data SET act_pay_type = '".$payType."' , act_pay_bank_id = '".$bank_id."' , act_receipt_date = '".$receipt_date."' , ".$data['fieldCash']." = '".$data['cash_type']."'  , amt_recieve_act ='".$data['amt_revieve']."' $txtUpdateCashTran $txtRecord WHERE id = '".$data['insWorkID']."'  ";			  
		  }else if($data['section']=='ins'){
			  $sql = "UPDATE tbl_insurance_data SET ins_pay_type = '".$payType."' , ins_pay_bank_id = '".$bank_id."' , ins_receipt_date = '".$receipt_date."' , ".$data['fieldCash']." = '".$data['cash_type']."'  , amt_recieve_ins ='".$data['amt_revieve']."' $txtUpdateCashTran $txtRecord WHERE id = '".$data['insWorkID']."'  ";	
		  }else if($data['section']=='tax'){
			  $sql = "UPDATE tbl_insurance_data SET tax_pay_type = '".$payType."' , tax_pay_bank_id = '".$bank_id."' , tax_receipt_date = '".$receipt_date."' , ".$data['fieldCash']." = '".$data['cash_type']."'  , amt_recieve_tax ='".$data['amt_revieve']."' $txtUpdateCashTran $txtRecord WHERE id = '".$data['insWorkID']."'  ";	
		  }
		 $returnValue['DoSql']=$sql;
		 if($this->db->query($sql)){
				$returnValue['DoDb']=1;
			    //------------update Recieve Reccord---------//
			 /*if($data['sumToAmtTotal']=='Yes'){ //กรณีป้อนข้อมูลจากหน้าบันทึกรับเงินแล้ว มาแก้ไขในหน้ารายละเอียดย่อย ยอดเงินรวมจะเพิ่มขี้น
			 	 $sql = "SELECT "
					 ."   SUM(CASE WHEN recieve_id_carcheck = '".$data['recieve_id_ins']."' THEN cash_collection_carcheck ELSE 0 END) AS sum_cash_collection_carcheck "
					 ."  , SUM(CASE WHEN recieve_id_carcheck = '".$data['recieve_id_ins']."' THEN tran_collection_carcheck ELSE 0 END) AS sum_tran_collection_carcheck "
					 ." , SUM(CASE WHEN recieve_id_tax = '".$data['recieve_id_ins']."' THEN cash_collection_tax ELSE 0 END) AS sum_cash_collection_tax "
					 ." , SUM(CASE WHEN recieve_id_tax = '".$data['recieve_id_ins']."' THEN tran_collection_tax ELSE 0 END) AS sum_tran_collection_tax "
					 ." , SUM(CASE WHEN recieve_id_act  = '".$data['recieve_id_ins']."' THEN cash_collection_act ELSE 0 END) AS sum_cash_collection_act "
					 ." , SUM(CASE WHEN recieve_id_act  = '".$data['recieve_id_ins']."' THEN tran_collection_act ELSE 0 END) AS sum_tran_collection_act "
					 ." , SUM(CASE WHEN recieve_id_ins  = '".$data['recieve_id_ins']."' THEN cash_collection_ins ELSE 0 END) AS sum_cash_collection_ins "
					 ." , SUM(CASE WHEN recieve_id_ins  = '".$data['recieve_id_ins']."' THEN tran_collection_ins ELSE 0 END) AS sum_tran_collection_ins "
					 ."  FROM tbl_insurance_data ";
			     $result = $this->db->query($sql)->result();
				 $sumTotal = 0;
				 foreach($result AS $sumData){
					  $sumTotal =  $sumTotal+$sumData->sum_cash_collection_carcheck+$sumData->sum_tran_collection_carcheck;
					  $sumTotal =  $sumTotal+$sumData->sum_cash_collection_tax+$sumData->sum_tran_collection_tax;
					  $sumTotal =  $sumTotal+$sumData->sum_cash_collection_act+$sumData->sum_tran_collection_act;
					  $sumTotal =  $sumTotal+$sumData->sum_cash_collection_ins+$sumData->sum_tran_collection_ins;
				 }
				 $sql = "UPDATE tb_recieve_record SET amp_recieve = '".$sumTotal."' WHERE id = '".$data['recieve_id_ins']."' ";
				 if($this->db->query($sql)){
					 $returnValue['DodbRecord'] ='ok';
				 }
				 //$returnValue['sql']=$sql;
			  }*/
			}
		 ////$returnValue['sql']=$sql;
		 return $returnValue;
		/* if(section=='car_check'){
			var pay_type = $('#car_check_pay_type option:selected').val();
			var bank_id = $('#car_check_pay_bank_id option:selected').val();
			var receipt_date  = $('#car_check_receipt_date').val();
		}else if(section=='act'){
			var pay_type = $('#act_pay_type option:selected').val();
			var bank_id = $('#act_pay_bank_id option:selected').val();
			var receipt_date  = $('#act_receipt_date').val();
		}else if(section=='ins'){
			var pay_type = $('#ins_pay_type option:selected').val();
			var bank_id = $('#ins_pay_bank_id option:selected').val();
			var receipt_date  = $('#ins_receipt_date').val();
		}else if(section=='tax'){
			var pay_type = $('#tax_pay_type option:selected').val();
			var bank_id = $('#tax_pay_bank_id option:selected').val();
			var receipt_date  = $('#tax_receipt_date').val();
		} */
	 }
	 //---------------------------------- 
	 function calculateInsuranceRemainPayment($insWorkID=NULL){
		  $returnValue=array();
		  $sum_not_paid =0; 
		  $sum_paid =0; 
		   //-discount------------
		    $getDiscount = 0;
		    $sql="SELECT SUM(discount) AS SumDiscount FROM tbl_insurance_payment WHERE work_id = '".$insWorkID."' GROUP BY work_id ";
		    $resultData = $this->db->query($sql)->result();
		    foreach($resultData AS $data){
				$getDiscount = $data->SumDiscount;
			}
			$sql="SELECT 	is_payment,
				SUM(CASE WHEN is_payment = '0' THEN amount ELSE 0 END) AS sum_not_paid,
				SUM(CASE WHEN is_payment = '1' THEN amount ELSE 0 END) AS sum_paid
			FROM 
				tbl_insurance_payment
			WHERE work_id = '".$insWorkID."'
			GROUP BY 
				work_id;
			";
		  $resultData = $this->db->query($sql)->result();
		  foreach($resultData AS $data){
			  $sum_not_paid = $data->sum_not_paid;
			  $sum_paid = $data->sum_paid;
		  }
		  $returnValue['sum_not_paid'] = $sum_not_paid;
		  $returnValue['sum_paid'] = $sum_paid;
		 if( $returnValue['sum_not_paid']!='0.00'){
			  $returnValue['sum_not_paid'] = $sum_not_paid-$getDiscount;
		 }else if( $returnValue['sum_not_paid']=='0.00'){
			 $returnValue['sum_paid'] = $sum_paid-$getDiscount;;
		 }
		 //$returnValue['sql'] = $sql;
		  return $returnValue;
	 }
	 //---------------------------------- ;  dataID theValue
	 function updatePeroidInsurancePayment($data){
		 	$returnValue=array();
		 	$returnValue['DoDb']=0;
		 	$data['theValue']=$this->removeComma($data['theValue']);
		    $field = $data['field'];   
		    $sql="UPDATE tbl_insurance_payment SET $field = '".$data['theValue']."'  WHERE id = '".$data['dataID']."'  ";
		    if($this->db->query($sql)){
					  $returnValue['DoDb']=1;
			}
		    return $returnValue;
	 }
	 //---------------------------------- dataID duedate childNo 
	 function updateInsuranceDuedatePayment($data){
		 	$returnValue=array();
		 	$returnValue['DoDb']=0;
	 		$data['duedate'] = $this->translateDateToEng($data['duedate']);
		    $sql="UPDATE tbl_insurance_payment SET due_date = '".$data['duedate']."'  WHERE id = '".$data['dataID']."'  ";
		    if($this->db->query($sql)){
					  $returnValue['DoDb']=1;
			}
		 	// childNo , periodInstamment:totallInstallment, work_id
		 	if($data['curr_period']=='2'){
				//for($i=1;$i<$data['periodInstamment'];$i++){}
				$sql="SELECT * FROM tbl_insurance_payment WHERE period > '".$data['curr_period']."'  AND work_id = '".$data['work_id']."' ORDER BY period ASC ";
				$returnValue['sql_select']=$sql;
				$result = $this->db->query($sql)->result();
				$dueDateArray = explode("-",$data['duedate']);
				$i=1;
				$month = $dueDateArray[1];
				$year = $dueDateArray[0];
				foreach($result AS $data){
					$month = $month+1;
					if($month > 12){
						$month = 1;
						$year= $year+1;
					}
					if($month < 10){  $monthTxt = "0".$month; }else{ $monthTxt = $month; }
					$dudate = $year."-".$monthTxt."-".$dueDateArray[2];
					$sql="UPDATE tbl_insurance_payment SET due_date = '".$dudate."'  WHERE id = '".$data->id."'  ";
					$this->db->query($sql);
					//$returnValue['sql'][$i]=$sql;
					$returnValue['i'][$i]=$i." month ".$month." ".$dudate;
				$i++;	
				}
			}
		    return $returnValue;
	 } 
	 //---------------------------------- isPayment
	 function UpdateInsurancePayment($data){
		  // dataID:dataID,receipt_date:receipt_date,remark:remark,pay_type:pay_type,bank_id:bank_id,payStatus:payStatus  old_recieve_id:old_recieve_id , recieve_id:recieve_id
		  $returnValue=array();
		  $returnValue['DoDb']=0;
		  if(!isset($data['discount'])){ $data['discount']=0; }
		  $tranSactionDate = date("Y-m-d");
		  $data['receipt_date'] = $this->translateDateToEng($data['receipt_date']);
		  if($data['pay_type']==0){
			  $is_payment = 0;
			  $returnValue['isPayment']=0;
		  }else if($data['pay_type'] > 0){
			  $is_payment = 1;
			  $returnValue['isPayment']=1;
		  }
		 $txtUpdateRecieveID = "";
		  if(isset($data['recieve_id']) || ($data['recieve_id']>0)){
			  $txtUpdateRecieveID = " , recieve_id = '".$data['recieve_id']."' "; 
		  }
		  $sql="UPDATE  tbl_insurance_payment SET transaction_date = '".$tranSactionDate."' , receipt_date = '".$data['receipt_date']."' , is_payment= '".$is_payment."' "
			   ." , pay_type = '".$data['pay_type']."' , remark = '".$data['remark']."' , bank_id = '".$data['bank_id']."' , discount = '".$data['discount']."' $txtUpdateRecieveID "
			   ." WHERE id = '".$data['dataID']."'  ";
		  if($this->db->query($sql)){
					  $returnValue['DoDb']=1;
			}
		  //$returnValue['sql1']=$sql;
		  return $returnValue;
	 }
	 //---------------------------------- 
	 function setInsuranceInstallment($data){
		    $returnValue=array();
		    $returnValue['DoDb1']=0;
		    $returnValue['DoDb2']=0;
		    $returnValue['DoDb3']=0;
		 	$returnValue['DoDbAll']=0;
		 if($data['installment_peroid']=='0'){
			 //----delte all-------//
			 $sql="DELETE FROM tbl_insurance_payment WHERE work_id = '".$data['insWorkID']."' ";
			 if($this->db->query($sql)){
					  $returnValue['DoDb1']=1;
					  $returnValue['DoDbAll']=1;
				  }
		 }else{
		    $per_period = $data['insurance_total']/$data['installment_peroid'];
		 	/*
				check if have old
				count row old 
				   if new > old 
				        insert  new-old loop
					    update $per_period where work_id='xxx'
				    else new < old 
					    delete row old 
					    update $per_period where work_id='xxx'
			*/
		   $sql="SELECT COUNT(id) AS countRowPayment FROM tbl_insurance_payment WHERE work_id='".$data['insWorkID']."' ";
		   $returnValue['sql_count']=$sql;
		   $resultCount = $this->db->query($sql)->result();
		   foreach($resultCount AS $cw){
			   $countPaymentRow = $cw->countRowPayment;
		   }
		 if($data['installment_peroid'] > $countPaymentRow){
			  for($i=1;$i<=($data['installment_peroid']-$countPaymentRow);$i++){
				  $sql="INSERT INTO `tbl_insurance_payment` (`id`, `work_id`, `period`, `transaction_date`, `receipt_date`, `amount`, `is_payment`, `pay_type`, `bank_id`, `recipe_no`, `due_date`, `remark`, `date_update`)"
					  ." VALUES "
					  ."('', '".$data['insWorkID']."', '".$i."', '', '', '".$per_period."', '0', '0', '', '', '', '', current_timestamp()); ";
				  if($this->db->query($sql)){
					  $returnValue['DoDb1']=1;
				  }
				  $returnValue['sql_insert'][$i]=$sql;
				  $sql="UPDATE tbl_insurance_payment SET amount = '".$per_period."' , discount='0' WHERE work_id='".$data['insWorkID']."'  ";
					 if($this->db->query($sql)){
						 $returnValue['DoDb3.1']=1;
					 }
			  }
			  $returnValue['DoDb2']=1;
			  $returnValue['DoDb3']=1;
		 }else{
			 $returnValue['DoDb1']=1;
			 $rowDelete = $countPaymentRow-$data['installment_peroid'];
			 $sql="DELETE FROM tbl_insurance_payment WHERE work_id='".$data['insWorkID']."' ORDER BY id DESC LIMIT  $rowDelete  ";
			 if($this->db->query($sql)){
				  $returnValue['DoDb2']=1;
			 }
			 $returnValue['sql_delete']=$sql;
			 $sql="UPDATE tbl_insurance_payment SET amount = '".$per_period."' , discount='0' WHERE work_id='".$data['insWorkID']."'  ";
			 if($this->db->query($sql)){
				 $returnValue['DoDb3']=1;
			 }
			 $returnValue['sql_update']=$sql;
		 }
		 //---------update period-------//
		  $sql="SELECT id FROM  tbl_insurance_payment WHERE work_id='".$data['insWorkID']."' ORDER BY id ASC ";
		  $resultData=$this->db->query($sql)->result();
		  $n=1;
		  foreach($resultData AS $sort){
			  $sql="UPDATE tbl_insurance_payment  SET period ='".$n."' WHERE id = '".$sort->id."' ";
			  $this->db->query($sql);
			  $n++;
		  }
	 }
		//-----------end 
		 if($data['installment_peroid'] > 1){
			 $is_installment = 1;
		 }else{
			$is_installment = 0; 
		 }
		 $sql="UPDATE tbl_insurance_data SET is_installment = '".$is_installment."' WHERE id='".$data['insWorkID']."'  ";
		 $this->db->query($sql);
		 //------------select list ------------------
		 // $sql="SELECT * FROM tbl_insurance_payment WHERE work_id='".$data['insWorkID']."' ";
		 // $resultData = $this->db->query($sql)->result();
		 // return $resultData;
		 if(($returnValue['DoDb1']=='1')&&($returnValue['DoDb2']=='1')&&($returnValue['DoDb3']=='1')){
			 $returnValue['DoDbAll']=1;
		 }
		 return $returnValue;
	 }
	 //---------------------------------- 
	 function getWorkPayment($insuranceID){
		 $sql="SELECT * FROM `tbl_insurance_payment` WHERE work_id='".$insuranceID."' ORDER BY id ASC ";
		 $resultData = $this->db->query($sql)->result();
		 return $resultData;
	 }
	 //---------------------------------- startDate endDate	
	 function showTextPayment($data){
		 $returnValue=array();
		 $returnValue['countInstallment'] = 0;
		 $sql = "SELECT COUNT(id) AS countInstallment FROM tbl_insurance_payment WHERE work_id ='".$data['insWorkID']."' ";
		 $resultData = $this->db->query($sql)->result();
		 foreach($resultData AS $data2){
			   $returnValue['countInstallment'] = $data2->countInstallment;
		 }
		 $sql2 = "SELECT * FROM tbl_insurance_payment WHERE work_id ='".$data['insWorkID']."' ";
		 $returnValue['getData'] = $this->db->query($sql2)->result();
		 return $returnValue;
	 }
	 //---------------------------------- 
	 function listInsOther($data){
		 $returnValue=array();
		 $returnValue['maxPeriod']=0;
		 $startDate=$this->translateDateToEng($data['startDate']);
		 $endDate=$this->translateDateToEng($data['endDate']);
		  $txtWhereRegis = '';
		  $txtWhereWorkType= '';
		  $txtWherePayType= '';
		 if($data['payType'] > 0){
			  switch($data['payType']){
				  case "1" : 
					   $txtWherePayType= " HAVING countInstallment = '0' ";
				  break;
				  case "2" :
					  $txtWherePayType= " HAVING countInstallment > '0' ";
				  break;
			  }
		 }
		 /*
		 	<option value="0">- ทั้งหมด -</option>
																		<option value="1">ประกันรถ</option>
																		<option value="2">พ.ร.บ.</option>
																		<option value="3">ภาษี</option>
																		<option value="4">ตรอ.</option>
																		<option value="5">ประกันอัคคีภัย</option>
																		<option value="6">ประกันขนส่ง</option>
																		<option value="7">ประกันอุบัติเหตุ (PA)</option>
																		<option value="8">ประกันท่องเที่ยว</option>
		 */
		 $sql="SELECT a.* , b.province_name , c.company_name , e.insurance_type_name , f.agent_name "
			 .",  (SELECT COUNT(id) FROM tbl_insurance_payment WHERE work_id = a.id) AS countInstallment  "
			 ." FROM tbl_insurance_data AS a "
			 ." LEFT JOIN  tbl_province AS b ON a.province_regis=b.id "
			 ." LEFT JOIN  tbl_insurance_company AS c ON a.insurance_corp_id  = c.id "
			 ." LEFT JOIN  tbl_insurance_income AS d ON a.insurance_type_id  = d.id "
			 ." LEFT JOIN  tbl_insurance_type AS e ON d.ins_type_id  = e.id "
			 ." LEFT JOIN  tbl_agent_data AS f ON a.agent_id = f.id "
			 ." WHERE ((a.insurance_start BETWEEN '".$startDate."' AND '".$endDate."') OR (a.act_date_start BETWEEN '".$startDate."' AND '".$endDate."'))  $txtWherePayType AND a.insurance_data_type='".$data['SelectType']."'  ORDER BY id ASC  ";
		 $returnValue['resultData'] = $this->db->query($sql)->result();
		 //$returnValue['sql']=$sql;
		 //----find max period----------
		/* $sql="SELECT MAX(period) AS maxPeriod "
			 ." FROM tbl_insurance_payment "
			 ." WHERE work_id IN (SELECT id FROM tbl_insurance_data WHERE date_work BETWEEN '".$startDate."' AND '".$endDate."')";
		 $resultMax =  $this->db->query($sql)->result();
		 foreach($resultMax AS $max){
			 $returnValue['maxPeriod'] = $max->maxPeriod;
		 }*/
		 //-------installment data
		 $sql=" SELECT a.* , b.bank_name, b.bank_acc_name , b.bank_number FROM tbl_insurance_payment AS a  "
			 ." LEFT JOIN tbl_bookbank_data AS b ON a.bank_id = b.id"
			 ." WHERE  a.work_id IN (SELECT id FROM tbl_insurance_data WHERE date_work BETWEEN '".$startDate."' AND '".$endDate."') ORDER BY a.work_id ASC , a.period ASC ";
		 $resultPayment = $this->db->query($sql)->result();
		 foreach($resultPayment AS $payment){
			 $returnValue['payment']['amount'][$payment->work_id][$payment->period] = $payment->amount;
			 $returnValue['payment']['pay_type'][$payment->work_id][$payment->period] = $payment->pay_type;
			 $returnValue['payment']['receipt_date'][$payment->work_id][$payment->period] = $payment->receipt_date;
			if($payment->bank_id > 0){
				 $returnValue['payment']['bank'][$payment->work_id][$payment->period] = $payment->bank_name." <br>".$payment->bank_acc_name." <br>".$payment->bank_number;
			}else{
				$returnValue['payment']['bank'][$payment->work_id][$payment->period] = '';
			} 
		 }
		 return $returnValue;
	 }
	 //---------------------------------- startDate endDate	
	 function ListInsurance($data){
		 $returnValue=array();
		 $returnValue['maxPeriod']=0;
		 //$startDate=$this->translateDateToEng($data['startDate']);
		 //$endDate=$this->translateDateToEng($data['endDate']);
		  $txtWhereRegis = '';
		  $txtWhereWorkType= '';
		  $txtWherePayType= '';
		 if(trim($data['vehicle_regis'])!=''){
			 $txtWhereRegis =  " AND a.vehicle_regis LIKE  '%".$data['vehicle_regis']."%' ";
		 }
		 if($data['workType']!='0'){
			 switch($data['workType']){
				 case "1" :
					 $txtWhereWorkType = " AND a.insurance_total > '0' ";
				 break;
				  case "2" :
					 $txtWhereWorkType = " AND a.act_price_total > '0' ";
				 break;
				  case "3" :
					 $txtWhereWorkType = " AND a.tax_price > '0' ";
				 break;
				   case "4" :
					 $txtWhereWorkType = " AND a.car_check_price > '0' ";
				 break;
			 }
		 }
		 if($data['payType'] > 0){
			  switch($data['payType']){
				  case "1" : 
					   $txtWherePayType= " HAVING countInstallment = '0' ";
				  break;
				  case "2" :
					  $txtWherePayType= " HAVING countInstallment > '0' ";
				  break;
			  }
		 }
		 // selectMonth , selectYear startDate
		 if($data['selectMonth']=='all'){
			 $txtWhereMonth = '';
			 $txtWhereMonthIns = '';
		 }else{
			 $txtWhereMonth = " AND MONTH(a.act_date_start)='".$data['selectMonth']."' ";
			 $txtWhereMonthIns = " AND MONTH(a.insurance_start)='".$data['selectMonth']."' ";
		 }
		 $sql="SELECT a.* , b.province_name , c.company_name , e.insurance_type_name , f.agent_name "
			 .",  (SELECT COUNT(id) FROM tbl_insurance_payment WHERE work_id = a.id) AS countInstallment  "
			 ." FROM tbl_insurance_data AS a "
			 ." LEFT JOIN  tbl_province AS b ON a.province_regis=b.id "
			 ." LEFT JOIN  tbl_insurance_company AS c ON a.insurance_corp_id  = c.id "
			 ." LEFT JOIN  tbl_insurance_income AS d ON a.insurance_type_id  = d.id "
			 ." LEFT JOIN  tbl_insurance_type AS e ON d.ins_type_id  = e.id "
			 ." LEFT JOIN  tbl_agent_data AS f ON a.agent_id = f.id "
			 ." WHERE ((YEAR(a.insurance_start)='".$data['selectYear']."' $txtWhereMonthIns) OR (YEAR(a.act_date_start)='".$data['selectYear']."' $txtWhereMonth))"
			 ."  $txtWhereRegis   $txtWhereWorkType $txtWherePayType AND a.insurance_data_type='1' AND data_status IN (".$data['data_status'].")  ORDER BY a.id ASC   ";
			 //." WHERE ((a.insurance_start BETWEEN '".$startDate."' AND '".$endDate."') OR (a.act_date_start BETWEEN '".$startDate."' AND '".$endDate."')) $txtWhereRegis   $txtWhereWorkType $txtWherePayType AND a.insurance_data_type='1'  ORDER BY id ASC  ";
		 $returnValue['resultData'] = $this->db->query($sql)->result();
		 //$returnValue['sql']=$sql;
		 //----find max period----------
		/* $sql="SELECT MAX(period) AS maxPeriod "
			 ." FROM tbl_insurance_payment "
			 ." WHERE work_id IN (SELECT id FROM tbl_insurance_data WHERE date_work BETWEEN '".$startDate."' AND '".$endDate."')";
		 $resultMax =  $this->db->query($sql)->result();
		 foreach($resultMax AS $max){
			 $returnValue['maxPeriod'] = $max->maxPeriod;
		 }
		 //-------installment data
		 $sql=" SELECT a.* , b.bank_name, b.bank_acc_name , b.bank_number FROM tbl_insurance_payment AS a  "
			 ." LEFT JOIN tbl_bookbank_data AS b ON a.bank_id = b.id"
			 ." WHERE  a.work_id IN (SELECT id FROM tbl_insurance_data WHERE date_work BETWEEN '".$startDate."' AND '".$endDate."') ORDER BY a.work_id ASC , a.period ASC ";
		 */
		 $sql=" SELECT c.* , b.bank_name, b.bank_acc_name , b.bank_number FROM tbl_insurance_payment AS c  "
			 ." LEFT JOIN tbl_bookbank_data AS b ON c.bank_id = b.id"
			 ." WHERE  c.work_id IN (SELECT a.id FROM tbl_insurance_data AS a WHERE ((YEAR(a.insurance_start)='".$data['selectYear']."' $txtWhereMonthIns) OR (YEAR(a.act_date_start)='".$data['selectYear']."' $txtWhereMonth))) ORDER BY c.work_id ASC , c.period ASC ";
		 $resultPayment = $this->db->query($sql)->result();
		 foreach($resultPayment AS $payment){
			 $returnValue['payment']['amount'][$payment->work_id][$payment->period] = $payment->amount;
			 $returnValue['payment']['pay_type'][$payment->work_id][$payment->period] = $payment->pay_type;
			 $returnValue['payment']['receipt_date'][$payment->work_id][$payment->period] = $payment->receipt_date;
			if($payment->bank_id > 0){
				 $returnValue['payment']['bank'][$payment->work_id][$payment->period] = $payment->bank_name." <br>".$payment->bank_acc_name." <br>".$payment->bank_number;
			}else{
				$returnValue['payment']['bank'][$payment->work_id][$payment->period] = '';
			} 
		 }
		 return $returnValue;
	 }
	 //----------------------------------date_regist workID insurance_fix_garace	dedug 
	 function SaveInsurance($data){
		 $returnValue=array();
		  $returnValue['doDb']='0';
		  if(!isset($data['is_corporation'])){ $data['is_corporation']=0; }
		  if(!isset($data['cust_type'])){ $data['cust_type']='customer'; }
		  if(!isset($data['year_car'])){ $data['year_car']="";}
		  if(!isset($data['month_regist'])){ $data['month_regist']="";}
		  if(!isset($data['date_regist'])){ $data['date_regist']="";}
		  $data['date_regist'] = $data['year_car']."-".$data['month_regist']."-".$data['date_regist'];
		 if(!isset($data['pay_transfer_date'])){ $data['pay_transfer_date']='';}else{ $data['pay_transfer_date'] =$this->translateDateToEng($data['pay_transfer_date']);  }
		 if(!isset($data['date_work'])){ $data['date_work']='';}else{ $data['date_work'] =$this->translateDateToEng($data['date_work']);  }
		 if(!isset($data['ins_date_work'])){ $data['ins_date_work']='';}else{ $data['ins_date_work'] =$this->translateDateToEng($data['ins_date_work']);  }
		 if(!isset($data['insurance_date_contract'])){ $data['insurance_date_contract']='';}else{ $data['insurance_date_contract'] =$this->translateDateToEng($data['insurance_date_contract']);  }
		 if(!isset($data['insurance_start'])){ $data['insurance_start']='';}else{ $data['insurance_start'] =$this->translateDateToEng($data['insurance_start']);  }
		 if(!isset($data['insurance_end'])){ $data['insurance_end']='';}else{ $data['insurance_end'] =$this->translateDateToEng($data['insurance_end']);  }
		 if(!isset($data['date_insurance'])){ $data['date_insurance']='';}else{ $data['date_insurance'] =$this->translateDateToEng($data['date_insurance']);  }
		 if(!isset($data['date_send_document'])){ $data['date_send_document']='';}else{ $data['date_send_document'] =$this->translateDateToEng($data['date_send_document']);  }
		 if(!isset($data['date_insurance_notifi_endorse'])){ $data['date_insurance_notifi_endorse']='';}else{ $data['date_insurance_notifi_endorse'] =$this->translateDateToEng($data['date_insurance_notifi_endorse']);  }
		 if(!isset($data['date_insurance_document_endorse'])){ $data['date_insurance_document_endorse']='';}else{ $data['date_insurance_document_endorse'] =$this->translateDateToEng($data['date_insurance_document_endorse']);  }
		 if(!isset($data['job_notification_date'])){ $data['job_notification_date']='';}else{ $data['job_notification_date'] =$this->translateDateToEng($data['job_notification_date']);  }
		 if(!isset($data['act_date_start'])){ $data['act_date_start']='';}else{ $data['act_date_start'] =$this->translateDateToEng($data['act_date_start']);  }
		 if(!isset($data['act_date_end'])){ $data['act_date_end']='';}else{ $data['act_date_end'] =$this->translateDateToEng($data['act_date_end']);  }
		 if(!isset($data['work_id'])){ $data['work_id']=0;}
		 //if(!isset($data['agent_id'])){ $data['agent_id']=0;}
		 if(!isset($data['fix_type'])){ $data['fix_type']=0;}
		 if(!isset($data['work_ins_type'])){ $data['work_ins_type']=0;}
		 if(!isset($data['ins_follow'])){ $data['ins_follow']=0;}
		 if(!isset($data['ins_data_status'])){ $data['ins_data_status']=0;}
		 if(!isset($data['followDocIns'])){ $data['followDocIns']=0;}
		 if(!isset($data['ins_paid'])){ $data['ins_paid']=0;}
		 if(!isset($data['insurance_renew'])){ $data['insurance_renew']=0;}
		 if(!isset($data['insurance_fix_garace'])){ $data['insurance_fix_garace']=0;}
		 if(!isset($data['act_for_rent'])){ $data['act_for_rent']=0;}
		if(!isset($data['taxID'])){ $data['taxID'] = 0; }
		if(!isset($data['have_manual'])){ $data['have_manual'] = 2; } 
		if(!isset($data['do_register'])){ $data['do_register'] = 0; } 
		if(!isset($data['tax_paid'])){ $data['tax_paid'] = 0; } 
		if(!isset($data['check_pass'])){ $data['check_pass'] = 0; } 
		if(!isset($data['free_cancel'])){ $data['free_cancel'] = 0; } 
		if(!isset($data['registration_book'])){ $data['registration_book'] = 0; } 
		if(!isset($data['car_check_paid'])){ $data['car_check_paid'] = 0; } 
		if(!isset($data['do_check_car'])){ $data['do_check_car'] = 2; } 
		//if(!isset($data['car_check_time'])){ $data['car_check_time'] = "00:00:00"; } 
		if(!isset($data['recieve_warning'])){ $data['recieve_warning'] = 0; } 
		if(!isset($data['not_recieve_warning'])){ $data['not_recieve_warning'] = 0; } 
		if(!isset($data['recieve_warning_yes'])){ $data['recieve_warning_yes'] = 0; } 
		if(!isset($data['car_type_id'])){ $data['car_type_id'] = 0; } 
		if(!isset($data['type_premium_id'])){ $data['type_premium_id'] = 0; } 
		if(!isset($data['recieve_warning_yes'])){ $data['recieve_warning_yes'] = 0; } 
		if(!isset($data['line_id'])){ $data['line_id'] = ''; } 
		$data['car_check_time']  = $data['hr'].":".$data['minute'].":".$data['second'];
		$data['tax_pay_date'] = $this->translateDateToEng($data['tax_pay_date']);
		$data['date_registration_end'] = $this->translateDateToEng($data['date_registration_end']);
		$data['car_check_date'] = $this->translateDateToEng($data['car_check_date']);
		//$returnValue['returnTaxDate']= "tax_pay_date>".$data['tax_pay_date']." date_registration_end>".$data['date_registration_end']; have_manual do_check_car
		 $data['act_price']=$this->removeComma($data['act_price']);
		 $data['act_discount']=$this->removeComma($data['act_discount']);
		 $data['act_tax']=$this->removeComma($data['act_tax']);
		 $data['act_vat']=$this->removeComma($data['act_vat']);
		 $data['act_price_net']=$this->removeComma($data['act_price_net']);
		 $data['act_price_total']=$this->removeComma($data['act_price_total']);
		 $data['act_price_total_full']=$this->removeComma($data['act_price_total_full']);
		 $data['tax_service']=$this->removeComma($data['tax_service']);
		 $data['tax_price']=$this->removeComma($data['tax_price']);
		 $data['tax_recall']=$this->removeComma($data['tax_recall']);
		 $data['sum_insured']=$this->removeComma($data['sum_insured']);
		 $data['insurance_price']=$this->removeComma($data['insurance_price']);
		 $data['insurance_discount']=$this->removeComma($data['insurance_discount']);
		 $data['insurance_duty']=$this->removeComma($data['insurance_duty']);
		 $data['insurance_tax']=$this->removeComma($data['insurance_tax']);
		 $data['insurance_total_net']=$this->removeComma($data['insurance_total_net']);
		 $data['insurance_total']=$this->removeComma($data['insurance_total']);
		 $data['car_check_price']=$this->removeComma($data['car_check_price']);
		 $data['car_check_discount']=$this->removeComma($data['car_check_discount']);
		 $data['car_check_total']=$this->removeComma($data['car_check_total']);
		 $data['dedug']=$this->removeComma($data['dedug']);
		 //print_r($data['data_status'][0]);
		  if($data['insWorkID']=='0'){ 
			   		// car_type_id act_for_rent recieve_warning  act_agent_id		act_code_id data_status
			     $sql=" INSERT INTO `tbl_insurance_data` (`id`, `date_work`, `cust_name`, `cust_nickname`, `cust_telephone_1`, `cust_telephone_2`, `is_corporation`, `vehicle_regis`"
					 .", `province_regis`, `year_car`, `vin_no`, `engine_size`, `car_brand`, `car_model`, `car_type_id`, `type_premium_id`, `ins_date_work` "
					 .", `work_id`, `agent_id`, `ins_code_id`, `insurance_no`, `insurance_date_contract`, `date_insurance`, `insurance_start`, `insurance_end`, `insurance_corp_id`, `insurance_type_id`"
					 .", `fix_type`, `job_notification_date`, `work_ins_type`, `ins_follow`, `ins_data_status`, `insurance_renew`, `insurance_fix_garace`, `sum_insured`"
					 .", `date_send_document`, `act_no`, `dedug`, `insurance_price`, `insurance_discount`, `insurance_duty`, `insurance_tax`, `insurance_total_net`, `insurance_total`"
					 .", `ins_cancel_no`, `ins_cancel_date`, `ins_cancel_reason`, `insurance_remark`, `paid_date`, `ins_paid_remark`, `ins_paid`, `payment_due_date` "
					 .", `date_insurance_notifi_endorse`, `date_insurance_document_endorse`, `insurance_number_endorse`, `insurance_remark_endorse`, `followDocIns`"
					 .", `act_paid`, `corp_id`, `act_type_id`, `act_date_start`, `act_date_end`, `act_price`, `act_discount`, `act_tax`, `act_vat`, `act_price_net`, `act_price_total`, `act_price_total_full`, `act_payment_remark`,`act_for_rent`, `brand_id`, `date_regist` "
					 ." ,taxID , tax_price , tax_recall , tax_pay_date , date_registration_end , have_manual , do_register , tax_remark , tax_paid , tax_service "
					 ." , car_check_date , car_check_time , car_check_price , car_check_paid , do_check_car , car_check_discount , car_check_total , registration_book , car_check_remark , free_cancel ,check_pass , recieve_warning , not_recieve_warning , recieve_warning_yes, act_agent_id, act_code_id, data_status , line_id"
					 ." ) "
					 . " VALUES "
					 ."('', '".$data['date_work']."', '".$data['cust_name']."', '".$data['cust_nickname']."', '".$data['cust_telephone_1']."', '".$data['cust_telephone_2']."', '".$data['is_corporation']."', '".$data['vehicle_regis']."' "
					 .", '".$data['province_regis']."', '".$data['year_car']."', '".$data['vin_no']."', '".$data['engine_size']."', '".$data['car_brand']."', '".$data['car_model']."', '".$data['car_type_id']."', '".$data['type_premium_id']."', '".$data['ins_date_work']."'"
					 .", '".$data['work_id']."', '".$data['Xagent_id']."', '".$data['ins_code_id']."', '".$data['insurance_no']."', '".$data['insurance_date_contract']."', '".$data['date_insurance']."', '".$data['insurance_start']."', '".$data['insurance_end']."', '".$data['insurance_corp_id']."', '".$data['insurance_type_id']."'"
					 .", '".$data['fix_type']."', '".$data['job_notification_date']."', '".$data['work_ins_type']."', '".$data['ins_follow']."', '".$data['ins_data_status']."', '".$data['insurance_renew']."', '".$data['insurance_fix_garace']."', '".$data['sum_insured']."'"
					 .", '".$data['date_send_document']."', '".$data['act_no']."', '".$data['dedug']."', '".$data['insurance_price']."', '".$data['insurance_discount']."', '".$data['insurance_duty']."', '".$data['insurance_tax']."', '".$data['insurance_total_net']."', '".$data['insurance_total']."'"
					 .", '".$data['ins_cancel_no']."', '".$data['ins_cancel_date']."', '".$data['ins_cancel_reason']."', '".$data['insurance_remark']."', '".$data['paid_date']."', '".$data['ins_paid_remark']."', '".$data['ins_paid']."', '".$data['payment_due_date']."' "
					 .", '".$data['date_insurance_notifi_endorse']."', '".$data['date_insurance_document_endorse']."', '".$data['insurance_number_endorse']."', '".$data['insurance_remark_endorse']."', '".$data['followDocIns']."', '".$data['act_paid']."', '".$data['corp_id']."', '".$data['act_type_id']."', '".$data['act_date_start']."', '".$data['act_date_end']."', '".$data['act_price']."', '".$data['act_discount']."', '".$data['act_tax']."', '".$data['act_vat']."', '".$data['act_price_net']."', '".$data['act_price_total']."', '".$data['act_price_total_full']."', '".$data['act_payment_remark']."','".$data['act_for_rent']."', '".$data['brand_id']."', '".$data['date_regist']."'   "
					 ." , '".$data['taxID']."' ,'".$data['tax_price']."' , '".$data['tax_recall']."','".$data['tax_pay_date']."','".$data['date_registration_end']."','".$data['have_manual']."','".$data['do_register']."', '".$data['tax_remark']."', '".$data['tax_paid']."','".$data['tax_service']."' "
					 ." ,'".$data['car_check_date']."','".$data['car_check_time']."' ,'".$data['car_check_price']."','".$data['car_check_paid']."','".$data['do_check_car']."','".$data['car_check_discount']."','".$data['car_check_total']."' ,'".$data['registration_book']."','".$data['car_check_remark']."','".$data['free_cancel']."','".$data['check_pass']."','".$data['recieve_warning']."','".$data['not_recieve_warning']."','".$data['recieve_warning_yes']."','".$data['act_agent_id']."','".$data['act_code_id']."','".$data['data_status'][0]."' ,'".$data['line_id']."'"
					 . " ) ";
			  	if($this->db->query($sql)){
					 $returnValue['doDb']='1';
					 $returnValue['workID']=$this->db->insert_id(); 
				}else{
					$returnValue['doDb']='0';
					$returnValue['workID']="ErrorInsert";  // date_registration_end brand_id    
				}
		  }else{
			   $sql="UPDATE tbl_insurance_data  SET "
				     ." `date_work`= '".$data['date_work']."' , `cust_name`= '".$data['cust_name']."', `cust_nickname`='".$data['cust_nickname']."', `cust_telephone_1`='".$data['cust_telephone_1']."', `cust_telephone_2`='".$data['cust_telephone_2']."', `is_corporation`='".$data['is_corporation']."', `vehicle_regis`='".$data['vehicle_regis']."'"
				     .", `province_regis`= '".$data['province_regis']."', `year_car`= '".$data['year_car']."' , `vin_no` =  '".$data['vin_no']."', `engine_size` = '".$data['engine_size']."', `car_brand` = '".$data['car_brand']."', `car_model` = '".$data['car_model']."', `car_type_id` = '".$data['car_type_id']."',`type_premium_id` = '".$data['type_premium_id']."', `ins_date_work` =  '".$data['ins_date_work']."'" 
					 .", `work_id`= '".$data['work_id']."' , `agent_id` = '".$data['Xagent_id']."', `ins_code_id` = '".$data['ins_code_id']."', `insurance_no` = '".$data['insurance_no']."', `insurance_date_contract` =  '".$data['insurance_date_contract']."', `date_insurance` = '".$data['date_insurance']."', `insurance_start`='".$data['insurance_start']."', `insurance_end` = '".$data['insurance_end']."', `insurance_corp_id`='".$data['insurance_corp_id']."', `insurance_type_id`='".$data['insurance_type_id']."'"
					 .", `fix_type`='".$data['fix_type']."', `job_notification_date`='".$data['job_notification_date']."', `work_ins_type` =  '".$data['work_ins_type']."', `ins_follow`='".$data['ins_follow']."', `ins_data_status`='".$data['ins_data_status']."', `insurance_renew`='".$data['insurance_renew']."', `insurance_fix_garace` = '".$data['insurance_fix_garace']."', `sum_insured` = '".$data['sum_insured']."' "
					 .", `date_send_document` =  '".$data['date_send_document']."', `act_no` = '".$data['act_no']."', `dedug` = '".$data['dedug']."', `insurance_price` ='".$data['insurance_price']."' , `insurance_discount` = '".$data['insurance_discount']."' , `insurance_duty` = '".$data['insurance_duty']."', `insurance_tax` =  '".$data['insurance_tax']."', `insurance_total_net`='".$data['insurance_total_net']."', `insurance_total`='".$data['insurance_total']."' "
					 .", `ins_cancel_no` = '".$data['ins_cancel_no']."' , `ins_cancel_date` = '".$data['ins_cancel_date']."' , `ins_cancel_reason` = '".$data['ins_cancel_reason']."', `insurance_remark`='".$data['insurance_remark']."', `paid_date` = '".$data['paid_date']."', `ins_paid_remark` = '".$data['ins_paid_remark']."', `ins_paid` = '".$data['ins_paid']."', `payment_due_date` = '".$data['payment_due_date']."' "
					 .", `date_insurance_notifi_endorse` = '".$data['date_insurance_notifi_endorse']."' , `date_insurance_document_endorse` = '".$data['date_insurance_document_endorse']."', `insurance_number_endorse` = '".$data['insurance_number_endorse']."', `insurance_remark_endorse` =  '".$data['insurance_remark_endorse']."' , `followDocIns` =  '".$data['followDocIns']."'"
					 .", `act_paid` = '".$data['act_paid']."', `corp_id` = '".$data['corp_id']."', `act_type_id`= '".$data['act_type_id']."', `act_date_start`='".$data['act_date_start']."', `act_date_end`='".$data['act_date_end']."', `act_price`='".$data['act_price']."', `act_discount` = '".$data['act_discount']."', `act_tax` = '".$data['act_tax']."', `act_vat` = '".$data['act_vat']."', `act_price_net` = '".$data['act_price_net']."', `act_payment_remark`='".$data['act_payment_remark']."' , `act_for_rent`='".$data['act_for_rent']."' , `brand_id`= '".$data['brand_id']."' , `date_regist`='".$data['date_regist']."' , `act_price_total`='".$data['act_price_total']."' ,`act_price_total_full` = '".$data['act_price_total_full']."' "
				     ." ,`taxID` ='".$data['taxID']."' , `tax_price`='".$data['tax_price']."' , `tax_recall` ='".$data['tax_recall']."' , `tax_pay_date` ='".$data['tax_pay_date']."' , `date_registration_end` = '".$data['date_registration_end']."', `have_manual` = '".$data['have_manual']."' , `do_register` = '".$data['do_register']."' , `tax_remark` = '".$data['tax_remark']."' , `tax_paid` = '".$data['tax_paid']."' , `tax_service` ='".$data['tax_service']."' "
			         ." , car_check_date = '".$data['car_check_date']."' , car_check_time = '".$data['car_check_time']."' , car_check_price= '".$data['car_check_price']."' , car_check_paid= '".$data['car_check_paid']."' , do_check_car =  '".$data['do_check_car']."' , car_check_discount= '".$data['car_check_discount']."'  , car_check_total= '".$data['car_check_total']."' , registration_book= '".$data['registration_book']."'  , car_check_remark= '".$data['car_check_remark']."'  , free_cancel= '".$data['free_cancel']."' ,check_pass = '".$data['check_pass']."'  , recieve_warning='".$data['recieve_warning']."' , not_recieve_warning ='".$data['not_recieve_warning']."' , recieve_warning_yes = '".$data['recieve_warning_yes']."' , act_agent_id='".$data['act_agent_id']."', act_code_id ='".$data['act_code_id']."' , data_status='".$data['data_status'][0]."' , line_id='".$data['line_id']."'   "
					." WHERE id = '".$data['insWorkID']."' ";
			  //   '".$data['recieve_warning']."','".$data['not_recieve_warning']."','".$data['recieve_warning_yes']."'
			  //----------add post address----/ 
			  if($this->db->query($sql)){
					 $returnValue['doDb']='1';
					 $returnValue['workID']=$data['insWorkID'];
				}else{
					$returnValue['doDb']='0';
					$returnValue['workID']="ErrorUpdate";
				}
		  }
		  if(!isset($data['referID'])){ $data['referID'] = '';}
		  if($data['referID']!=''){
				$sql = "SELECT * FROM tbl_work_post_address WHERE work_id = '".$data['referID']."'";
				$result = $this->db->query($sql)->result();
				foreach($result AS $addr){
						$data['postCustID'] = $addr->cust_id;
						$data['post_name'] = $addr->post_name;
						$data['telephone'] = $addr->telephone;
						$data['corp_name'] = $addr->corp_name;
						$data['house_number'] = $addr->house_number;
						$data['home_group'] = $addr->home_group;
						$data['alley'] = $addr->alley;
						$data['road'] = $addr->road;
						$data['subdistric'] = $addr->subdistric;
						$data['distric'] = $addr->distric;
						$data['province'] = $addr->province;
						$data['post_code'] = $addr->post_code;
						$data['delivery_of_documents'] = $addr->delivery_of_documents;
						$data['use_address'] = $addr->use_address;
						$data['date_of_submission'] = $addr->date_of_submission;
						$data['remark'] = $addr->remark;
				}
                 $sql=" INSERT INTO `tbl_work_post_address` (`id`, `work_id`, `cust_id`, `post_name`, `telephone`, `corp_name`, `house_number`, `home_group`, `alley`, `road`, `subdistric`, `distric`, `province`, `post_code`, `delivery_of_documents`, `use_address`, `date_of_submission`, `remark`) "
				 ." VALUES "
				 ."('', '".$returnValue['workID']."', '0', '".$data['post_name']."', '".$data['telephone']."', '".$data['corp_name']."', '".$data['house_number']."', '".$data['home_group']."', '".$data['alley']."', '".$data['road']."', '".$data['subdistric']."', '".$data['distric']."', '".$data['province']."', '".$data['post_code']."', '".$data['delivery_of_documents']."', '".$data['use_address']."', '".$data['date_of_submission']."', '".$data['remark']."') ";
				if($this->db->query($sql)){
						$returnVale['doDbAddress']='1';
						$returnVale['taxDbAddress']='insert';
						$returnVale['postIDAddress']=$this->db->insert_id();
					}else{
						$returnVale['postIDAddress']='no insert';
					}

			  }
		 //$returnValue['sql']=$sql;
		 return $returnValue;
	 }
	 //----------------------------------work_id
	 function setCutomerType($param){
		 //-------insWorkID:insWorkID,insType:insType,cust_type:TypeValue , insurance_total_net:insurance_total_net
		 $returnValue = array();
		 $returnValue['getResultCom']=0;
		 $returnValue['insurance_total_net']=$this->removeComma($param['insurance_total_net']);
		 $returnValue['insurance_total']=$this->removeComma($param['insurance_total']);
		 $returnValue['updateType']='not set';
		 //-----get agent %
		 if(($param['Xagent_id']!='x')&&($param['cust_type']=='agent')){
			   $returnValue['agentCom'] = 0; $returnValue['agentTax']=0;
			  $sql="SELECT * FROM tbl_agent_data WHERE id = '".$param['Xagent_id']."' ";
			  $result = $this->db->query($sql)->result();
			  foreach($result AS $data){
				  $returnValue['agentCom'] = $data->agent_com; 
				  $returnValue['agentTax']= $data->agent_tax;
			  }
		 	  $returnValue['ResultCom'] = ($returnValue['insurance_total']*$returnValue['agentCom'])/100;
			  $returnValue['ResultTax'] = ($returnValue['ResultCom'] * $returnValue['agentTax'])/100;
			  $returnValue['getResultCom'] = ceil(($returnValue['insurance_total']-$returnValue['ResultCom']) + $returnValue['ResultTax']);
		 }else{
			  $returnValue['getResultCom'] = $returnValue['insurance_total'];
		 }
		 $sql = "UPDATE tbl_insurance_data  SET cust_type = '".$param['cust_type']."' WHERE id = '".$param['insWorkID']."' ";
		 if($this->db->query($sql)){
			 $returnValue['updateType']='OK';
		 }
		 $returnValue['getResultCom'] = number_format($returnValue['getResultCom'],2);
		 return $returnValue;
	 }
	 //----------------------------------work_id
	 function getInsuranceDetail($insuranceID){
		 $returnValue = array(); 
		 $sql="SELECT * FROM  tbl_insurance_data WHERE id='".$insuranceID."' ";
		 $resultData= $this->db->query($sql)->result();
		 //$returnValue['sql']=$sql;
		 $resultData = $this->db->query($sql)->result();
		 return $resultData;
	 } 
	 //----------------------------------work_id 
	 function getInsuranceDetail2($insuranceID){
		 $returnValue = array(); 
		 $sql="SELECT a.* , b.province_name , d.insurance_type_name ,  e.insurance_type_name AS actTypeName , f.agent_name "
			 ." FROM  tbl_insurance_data AS a "
			 ." LEFT JOIN tbl_province AS b ON a.province_regis = b.id "
			 ." LEFT JOIN tbl_insurance_income AS c ON a.insurance_type_id  = c.id "
			 ." LEFT JOIN tbl_insurance_type AS d ON a.insurance_type_id  = d.id "
			 ." LEFT JOIN tbl_insurance_type AS e ON a.act_type_id  = e.id "
			 ." LEFT JOIN tbl_agent_data AS f ON a.agent_id   = f.id "
			 ." WHERE a.id='".$insuranceID."' ";
		 $resultData= $this->db->query($sql)->result();
		 //$returnValue['sql']=$sql;
		 return $resultData;
	 }
	 //----------------------------------changeValue,workID
	 function UpdateAlertRemark($data){
		 $returnValue = array(); 
		 $returnValue['doDb']=0;
		 $sql="UPDATE tbl_work_data SET remark_follow = '".$data['changeValue']."' WHERE id = '".$data['workID']."' ";
		 if($this->db->query($sql)){
			 $returnValue['doDb']=1;
		 }
		 //$returnValue['sql']=$sql;
		 return $returnValue;
	 }	
	 //----------------------------------changeValue,workID
	 function updateFollowIns($data){
		 $returnValue = array(); 
		 $returnValue['doDb']=0;
		 $sql="UPDATE tbl_work_data SET follow_insurance = '".$data['changeValue']."' WHERE id = '".$data['workID']."' ";
		 if($this->db->query($sql)){
			 $returnValue['doDb']=1;
		 }
		 //$returnValue['sql']=$sql;
		 return $returnValue;
	 }	
	 //----------------------------------changeValue,workID
	 function updateAlert($data){
		 $returnValue = array(); 
		 $returnValue['doDb']=0;
		 $sql="UPDATE tbl_work_data SET alert_success = '".$data['changeValue']."' WHERE id = '".$data['workID']."' ";
		 if($this->db->query($sql)){
			 $returnValue['doDb']=1;
		 }
		 //$returnValue['sql']=$sql;
		 return $returnValue;
	 }
	 //---------------------------------- ivalue:ivalue,field:field,dataID:dataID 
	 function updateExpireNote($param){
		 $returnValue = array();
		 $returnValue['doDb'] = 0;
		 $field = $param['field'];
		 $sql = "UPDATE tbl_work_data SET $field = '".$param['ivalue']."' WHERE id = '".$param['dataID']."' ";
		 if($this->db->query($sql)){
			 $returnValue['doDb'] = 1;
		 }
		  return $returnValue;
	 }
	 //----------------------------------workID,changeValue
	 function UpdateExpireAlert($param){
		 $returnValue = array();
		 $returnValue['doDb']='0';
		 $sql="UPDATE tbl_work_data SET close_alert = '".$param['changeValue']."' WHERE id = '".$param['workID']."'  ";
		 if($this->db->query($sql)){
			 $returnValue['doDb']='1';
		 }
		 //$returnValue['sql']=$sql;
		 return $returnValue;
	 }
	 //---------------------------------- year  select_year:select_year,select_range:select_range,select_type:select_type,car_type_id:car_type_id,select_type_text:select_type_text, selectMonthName:selectMonthName , selectMonth:selectMonth,search_custname:search_custname,search_vRegis:search_vRegis
	 function getExpireList($data){
		 $returnValue = array(); 
		 $returnValue['param']=$data;
		 if($data['car_type_id']=='allcar'){
			 $CarCondition=' AND d.car_type_id IN (1,2,3)';
		 }else{
			  $CarCondition=' AND d.car_type_id IN ('.$data['car_type_id'].')';
		 }
		 $condition = '';
		 if($data['selectMonth']=='all'){
			  $Wdate1 = " AND YEAR(f.act_date_end) = '".$data['select_year']."'   ";
			  $Wdate2 = " AND YEAR(h.date_registration_end) = '".$data['select_year']."'     ";
		 }else{
			  $Wdate1 = " AND MONTH(f.act_date_end) = '".$data['selectMonth']."' AND YEAR(f.act_date_end) = '".$data['select_year']."'    ";
			  $Wdate2 = " AND MONTH(h.date_registration_end) = '".$data['selectMonth']."'  AND YEAR(h.date_registration_end) = '".$data['select_year']."'   ";			 
		 }
		 if($data['select_type']=='1'){  //act   
			 $condition = $Wdate1 ;
			 $orderBy ="ORDER BY f.act_date_end ASC";
		 }else if($data['select_type']=='2'){ //tax
			 $condition = $Wdate2 ;
			 $orderBy ="ORDER BY h.date_registration_end ASC";
		 }
		 if($data['search_vRegis']!=''){
			 $W_regis = " AND d.vehicle_regis  LIKE '%".$data['search_vRegis']."%'  ";
		 }else{
			 $W_regis = " ";
		 }
		  if($data['search_custname']!=''){
			 $W_cust = " AND c.cust_name LIKE '%".$data['search_custname']."%'  ";
		 }else{
			 $W_cust = " ";
		 }
		 $sql="SELECT  b.id AS workID, b.close_alert , b.pay_cash , b.pay_transfer , b.alert_success , b.follow_insurance , b.remark_follow , c.id AS custID , c.cust_name , c.cust_nickname , CONCAT(c.cust_telephone_1,' ',c.cust_telephone_2) AS custTelephoneNo , b.note_expire_1 , b.note_expire_2 , b.note_expire_3    "
			  ." , d.id AS  carID , d.vehicle_regis , d.date_regist, d.year_car , e.province_name , f.act_date_end,  f.other_paid , f.act_price_total  , h.tax_price , h.tax_service"
			  ." , j.initials_name , j.type_name , j.car_type_group , h.date_registration_end  "
			  ." FROM tbl_work_data AS b "
			  ." LEFT JOIN tbl_customer_data AS c ON b.cust_id  =  c.id "
			  ." LEFT JOIN tbl_car_data AS d ON b.car_id  =  d.id "
			  ." LEFT JOIN tbl_province AS e ON d.province_regis   =  e.id "
			  ." LEFT JOIN tbl_car_act_data AS f ON f.work_id   =  b.id "
			  ." LEFT JOIN tbl_car_tax_data AS h ON h.work_id   =  b.id "
			  ." LEFT JOIN tbl_car_type AS j ON d.car_type_id   =  j.id "
			  ." WHERE 1 $condition $CarCondition $W_regis $W_cust  AND b.close_alert='0'  $orderBy ";
		 $returnValue['resultData']=$this->db->query($sql)->result();
		 $returnValue['sql']=$sql;
		  return $returnValue;
	 }
	 //----------------------------------bank_acc_id:bank_acc_id,select_year:select_year
	 function loadReportBankTransfer($data){
		 $returnValue = array(); 
		 if($data['bank_acc_id']==0){
			 $txtWhereBank ='';
		 }else{
			 $txtWhereBank =" AND a.bank_acc_id = '".$data['bank_acc_id']."' "; 
		 }
		 // ,start_date:start_date,select_month_start:select_month_start,end_date:end_date,select_month_end:select_month_end,select_year:select_year select_month_start
		       $dateStart= $data['select_year']."-".$data['select_month_start']."-".$data['start_date'];
		       $dateEnd= $data['select_year']."-".$data['select_month_end']."-".$data['end_date'];
			  $txtMonth = " AND a.pay_transfer_date  BETWEEN '".$dateStart."' AND  '".$dateEnd."' ";
			  $txtMonth2 = " AND a.pay_transfer_date2  BETWEEN '".$dateStart."' AND  '".$dateEnd."' ";
		 $sql="SELECT a.id AS workID, a.pay_transfer, a.bank_acc_id, a.pay_transfer_date, b.cust_name, c.bank_name, c.bank_acc_name, c.bank_number, d.vehicle_regis, e.province_name 
				FROM tbl_work_data AS a 
				LEFT JOIN tbl_customer_data AS b ON a.cust_id = b.id 
				LEFT JOIN tbl_bookbank_data AS c ON a.bank_acc_id = c.id 
				LEFT JOIN tbl_car_data AS d ON a.car_id = d.id 
				LEFT JOIN tbl_province AS e ON d.province_regis = e.id 
				WHERE 1 $txtMonth  $txtWhereBank  
				UNION 
				SELECT a.id AS workID, a.pay_transfer2 AS pay_transfer, a.bank_acc_id, a.pay_transfer_date2, b.cust_name, c.bank_name, c.bank_acc_name, c.bank_number, d.vehicle_regis, e.province_name 
				FROM tbl_work_data AS a 
				LEFT JOIN tbl_customer_data AS b ON a.cust_id = b.id 
				LEFT JOIN tbl_bookbank_data AS c ON a.bank_acc_id = c.id 
				LEFT JOIN tbl_car_data AS d ON a.car_id = d.id 
				LEFT JOIN tbl_province AS e ON d.province_regis = e.id 
				WHERE 1 $txtMonth2  $txtWhereBank 
				ORDER BY pay_transfer_date DESC;";
		 $returnValue['result'] = $this->db->query($sql)->result();
		 //$returnValue['sql']=$sql;
		 return $returnValue;
	 }
	 //---------------------------------
	 function setdecardedug($car_type_id,$type_premium_id){
		 $returnValue = array(); 
		 $sql="SELECT * FROM tbl_car_type WHERE id = '".$car_type_id."' ";
		 $result = $this->db->query($sql)->result();
		 foreach($result AS $data){
		     $returnValue['dedugVal']=$data->deduct_percent; 
		     $returnValue['dedugType']=$data->car_type_group; 
		 }
		 $sql="SELECT * FROM tbl_car_type_premium  WHERE id = '".$type_premium_id."' ";
		 $result = $this->db->query($sql)->result();
		 foreach($result AS $premium){
			 $returnValue['premium']=$premium->premium;
			 $returnValue['total_premium']=$premium->total_premium;			 
		 }
		 return $returnValue;
	 }
	 //----------------------------------
	 function deleteExpense($data){
		 $returnValue = array(); 
		 $returnValue['doDb']=0;
		 $sql="UPDATE expenses_data SET data_status='0' WHERE id = '".$data['dataID']."'  ";
		 if($this->db->query($sql)){
			 $returnValue['doDb']=1;
		 }
		  //$returnValue['sql']=$sql;
		 return $returnValue;
	 }
	 //----------------------------------
	 function saveExpense($data){
		 /*
		 $data['expenses_date']=$this->input->post('expenses_date');
		$data['expenses_name']=$this->input->post('expenses_name');
		$data['expenses_price']=$this->input->post('expenses_price');
		 */
		 $returnValue = array(); 
		 $returnValue['doDb']=0;
		 $data['expenses_date']=$this->translateDateToEng($data['expenses_date']);
		 $sql="INSERT INTO expenses_data (id,expenses_name,expenses_price,expenses_date,user_add) VALUES ('','".$data['expenses_name']."','".$data['expenses_price']."','".$data['expenses_date']."','".$this->session->userdata('user_id')."')";
		 if($this->db->query($sql)){
			 $returnValue['doDb']=1;
		 }
		  //$returnValue['sql']=$sql;
		 return $returnValue;
	 }
	 //---------------------------------- 
	 function listExpenses($data){
		 $returnValue = array(); 
		 $sql="SELECT * FROM expenses_data WHERE expenses_date BETWEEN '".$data['start']."' AND '".$data['end']."' AND data_status='1' ORDER BY id ASC ";
		 $returnValue['resultData']  = $this->db->query($sql)->result();
		 //$returnValue['sql']=$sql;
		return $returnValue;
	 }
	 //----------------------------------brand_id
	 function getRenewData($param){
		  $returnValue = array(); 
		      $returnValue['cust_id']="";
			   $returnValue['car_id']="";
			   $returnValue['agent_id']="";
			   $returnValue['cust_name']="";
			   $returnValue['cust_nickname']="";
			   $returnValue['cust_telephone_1']="";
			   $returnValue['cust_telephone_2']="";
			   $returnValue['is_corporation']="";
			   $returnValue['car_type_id']="";
			   $returnValue['type_premium_id']="";
			   $returnValue['vehicle_regis']="";
			   $returnValue['province_regis']="";
			   $returnValue['date_regist']="";
			   $returnValue['date_regist_day']="";
			   $returnValue['date_regist_month']="";
			   $returnValue['date_regist_year']="";
			   $returnValue['year_car']="";
			   $returnValue['vin_no']="";
			   $returnValue['engine_size']="";
			   $returnValue['car_brand']="";
			   $returnValue['car_model']="";
			   $returnValue['car_type_id']="";
			   $returnValue['type_premium_id']="";
			   $returnValue['brand_id']="";
		 $sql="SELECT a.cust_id , a.car_id ,a.agent_id , b.cust_name , b.cust_nickname , b.cust_telephone_1 , b.cust_telephone_2 , b.is_corporation "
		    ." , c.brand_id , c.vehicle_regis , c.province_regis , c.date_regist , c.year_car , c.vin_no , c.engine_size , c.car_brand , c.car_model , c.car_type_id , c.type_premium_id  "
		    ." FROM tbl_work_data AS a "
			. " LEFT JOIN tbl_customer_data AS b ON a.cust_id=b.id "
			. " LEFT JOIN  tbl_car_data AS c ON a.car_id=c.id "
			."  WHERE a.id ='".$param['GetWorkID']."' ";
		 $resultData= $this->db->query($sql)->result();
		 foreach($resultData AS $data){
			   $returnValue['cust_id']=$data->cust_id;
			   $returnValue['car_id']=$data->car_id;
			   $returnValue['agent_id']=$data->agent_id;
			   $returnValue['cust_name']=$data->cust_name;
			   $returnValue['cust_nickname']=$data->cust_nickname;
			   $returnValue['cust_telephone_1']=$data->cust_telephone_1;
			   $returnValue['cust_telephone_2']=$data->cust_telephone_2;
			   $returnValue['is_corporation']=$data->is_corporation;
			   $returnValue['car_type_id']=$data->car_type_id;
			   $returnValue['type_premium_id']=$data->type_premium_id;
			   $returnValue['vehicle_regis']=$data->vehicle_regis;
			   $returnValue['province_regis']=$data->province_regis;
			   $returnValue['date_regist']=$data->date_regist;
			   $date_regist_array=explode("-",$data->date_regist);
			   $returnValue['date_regist_day']=$date_regist_array['2'];
			   $returnValue['date_regist_month']=$date_regist_array['1'];
			   $returnValue['date_regist_year']=$date_regist_array['0'];
			   $returnValue['year_car']=$data->year_car;
			   $returnValue['vin_no']=$data->vin_no;
			   $returnValue['engine_size']=$data->engine_size;
			   $returnValue['car_brand']=$data->car_brand;
			   $returnValue['car_model']=$data->car_model;
			   $returnValue['car_type_id']=$data->car_type_id;
			   $returnValue['type_premium_id']=$data->type_premium_id;
			   $returnValue['brand_id']=$data->brand_id;
		 }
		 $returnValue['sql']=$sql;
		 return $returnValue;
	 }
	 //---------------------------------- 
	 function searchCustomer_inspection($data){
		/*$data['custname']=$this->input->post('custname');
		$data['cust_nickname']=$this->input->post('cust_nickname');
		$data['phone']=$this->input->post('phone');
		$data['registration']=$this->input->post('registration');
		$data['workType']=$this->input->post('workType');
		$data['workTypeName']=$this->input->post('workTypeName');*/
		 $returnValue = array(); 
		 $whereAct ='';
		 $whereTax ='';
		 $whereInspect ='';
		 $WhereName ='';
		 $WherePhone ='';
		 $WhereCarRegis ='';
		 $WhereNickName ='';
		 $whereActPayment='';
		 $whereTaxPayment='';
		 $whereInspectPayment='';
		  $WherePaymentAllType = "";
		 $data['registration']=trim($data['registration']);
		 $data['custname']=trim($data['custname']);
		 $data['cust_nickname']=trim($data['cust_nickname']);
		 if($data['payment']!='all'){
			 $whereActPayment=" AND b.act_paid='".$data['payment']."' ";
			 $whereTaxPayment=" AND d.tax_paid='".$data['payment']."' ";
			 $whereInspecPayment=" AND c.car_check_paid='".$data['payment']."' ";
		 }
		 if($data['workType']=='act'){
			 $whereAct .=" AND b.id <>'' ".$whereActPayment;
		 }
		 if($data['workType']=='tax'){
			 $whereTax .=" AND d.id <>'' ".$whereTaxPayment;
		 }
		 if($data['workType']=='inspect'){
		 	 $whereInspect .=" AND c.id <>'' ".$whereInspecPayment;
		 }
		  if(($data['workType']=='all')&&($data['payment']!='all')){
		  	  $WherePaymentAllType = " AND (b.act_paid='".$data['payment']."' OR d.tax_paid='".$data['payment']."' OR c.car_check_paid='".$data['payment']."' ) ";
		  }
		 if($data['custname']!=''){
			 $WhereName =  " AND f.cust_name LIKE '%".$data['custname']."%' ";
		 }
		 if($data['cust_nickname']!=''){
			 $WhereNickName =  " AND f.cust_nickname LIKE '%".$data['cust_nickname']."%' ";
		 }
		 if($data['phone']!=''){
			 $WherePhone =  " AND ( f.cust_telephone_1 LIKE '%".$data['phone']."%' OR  f.cust_telephone_2 LIKE '%".$data['phone']."%' ) ";
		 }
		 if($data['registration']!=''){
			 $WhereCarRegis = " AND  g.vehicle_regis LIKE '%".$data['registration']."%' ";
		 }
		 //- YEAR(a.date_add) = ''  cust_nickname 
		$txtWhereDate ="";
		if($data['selectYear']!=''){
			$txtWhereDate =" AND YEAR(a.date_add) = '".$data['selectYear']."' ";  
		}
		$sql="SELECT a.date_add ,  a.id AS workID , a.date_add AS workDate , a.car_id  "
			 ." , b.id AS actID , b.act_date_start , b.act_date_end ,b.act_price,b.act_price_total, b.act_paid "
			 ." , c.id AS checkID , c.car_check_total,  c.car_check_price, c.car_check_paid"
			 ." , d.id AS taxID , d.tax_price , d.tax_paid "
			 ." , e.car_check_price_service "
			 ." , f.id AS CustID , f.cust_name , f.cust_nickname , f.cust_telephone_2 , f.cust_telephone_1 "
			 ." , g.id AS CarID , g.vehicle_regis ,g.province_regis  "
			 ." , h.province_name , h.id AS provinceID , i.type_name "
			 ." FROM tbl_work_data AS a "
			 ." LEFT JOIN  tbl_car_act_data AS b ON b.work_id = a.id "
			 ." LEFT JOIN  tbl_car_check AS c ON c.work_id = a.id "
			 ." LEFT JOIN  tbl_car_tax_data AS d ON d.work_id = a.id "
			 ." LEFT JOIN  tbl_car_service AS e ON e.work_id = a.id "
			 ." LEFT JOIN  tbl_customer_data AS f ON a.cust_id = f.id "
			 ." LEFT JOIN  tbl_car_data AS g ON a.car_id  = g.id "
			 ." LEFT JOIN  tbl_province AS h ON g.province_regis  = h.id "
			 ." LEFT JOIN  tbl_car_type AS i ON g.car_type_id  = i.id "
			." WHERE 1 $whereAct $whereTax $whereInspect $WhereName $WhereNickName $WherePhone $WhereCarRegis $WherePaymentAllType $txtWhereDate ORDER BY a.id ASC ";
		 $returnValue['resultData']=$this->db->query($sql)->result();
		 $returnValue['sql']=$sql;
		 $returnValue['dataField']=$data;
		 return $returnValue;
	 }
	 //---------------------------------- 
	 function selectWorkMinYear(){
		 $minYear = date("Y");
		 $sql="SELECT MIN(YEAR(date_add)) AS minYear FROM `tbl_work_data` ";
		 $resultData =$this->db->query($sql)->result();
		 foreach($resultData AS $data);
		 $minYear = $data->minYear;
		 return $minYear;
	 }
	 //---------------------------------- 
	 function deleteWork($data){
		 $returnValue = array();
		 $returnValue['delAct'] = 0; 
		 $returnValue['delCarCheck'] = 0; 
		 $returnValue['delIns'] = 0; 
		 $returnValue['delService'] = 0; 
		 $returnValue['deltax'] = 0; 
		 $returnValue['delWork'] = 0; 
		 $sql="DELETE FROM tbl_car_act_data WHERE work_id  = '".$data['workID']."' ";
		 if($this->db->query($sql)){
			 $returnValue['delAct']=1; 
		 }
		 $sql="DELETE FROM tbl_car_check WHERE work_id  = '".$data['workID']."' ";
		 if($this->db->query($sql)){
			 $returnValue['delCarCheck']=1; 
		 }
		 $sql="DELETE FROM tbl_car_insurance_data WHERE work_id  = '".$data['workID']."' ";
		 if($this->db->query($sql)){
			 $returnValue['delIns']=1; 
		 }
		 $sql="DELETE FROM tbl_car_service WHERE work_id  = '".$data['workID']."' ";
		 if($this->db->query($sql)){
			 $returnValue['delService']=1; 
		 }
		 $sql="DELETE FROM tbl_car_tax_data WHERE work_id  = '".$data['workID']."' ";
		 if($this->db->query($sql)){
			 $returnValue['deltax']=1; 
		 }
		 $sql="DELETE FROM tbl_work_data WHERE id  = '".$data['workID']."' ";
		 if($this->db->query($sql)){
			 $returnValue['delWork']=1; 
		 }	
		 return $returnValue;
	 }
	 //---------------------------------- 
	 function updateCarcheckTime($data){
		 $returnValue = array();
		 $returnValue['doUpdate']=0; 
		 $sql="UPDATE tbl_car_check SET car_check_time = '".$data['changeVal']."' , user_update_time_check='".$this->session->userdata('user_id')."' WHERE id = '".$data['dataID']."' ";
		 if($this->db->query($sql)){
			 $returnValue['doUpdate']=1; 
		 }
		 //$returnValue['sql']=$sql;
		 return $returnValue;
	 }
	 //----------------------------------  
	 function inspect_summary($data){
		 $returnValue = array();
		 $returnValue['countInspectCar'] = 0;
		  $returnValue['countInspectBike']=0;
		 //------count car inspect -----------
		 $sql="SELECT COUNT(id) AS NumCar FROM tbl_car_check WHERE car_type='1' AND car_check_date = '".$data['workDate']."' ";
		 $resultCountCar = $this->db->query($sql)->result();
		 foreach($resultCountCar AS $coutCar);
		 if(isset($coutCar->NumCar)){
			 $returnValue['countInspectCar']=$coutCar->NumCar;
		 }
	  //------count bike inspect -----------
		 $sql="SELECT COUNT(id) AS NumBike FROM tbl_car_check WHERE car_type='2' AND car_check_date = '".$data['workDate']."' ";
		 $resultCountCar = $this->db->query($sql)->result();
		 foreach($resultCountCar AS $coutCar);
		 if(isset($coutCar->NumBike)){
			 $returnValue['countInspectBike']=$coutCar->NumBike;
		 }		 
		 return $returnValue;
	 }
	 //----------------------------------
	 //---------------------------------- car_type_id insurance_corp_id
	 function inspection_act_report($data){
		  $returnValue = array();		
		 $data['startDate'] = $this->translateDateToEng($data['startDate']);
		 $data['endDate'] = $this->translateDateToEng($data['endDate']);
		 $whereCartype = ''; 
		 $wherecCompany = ''; 
		 $whereCartype = "";
		 if($data['car_type_id']=='allcar'){
			 $carWhere = " AND d.car_type_id IN ('1','2','3') ";
		 }else if($data['car_type_id']=='x'){
			 $carWhere = "";
		 }else if($data['car_type_id']!='x'){
			 $carWhere = " AND d.car_type_id IN ('".$data['car_type_id']."') ";
		 }
		 $whereCartype = $carWhere; 
		  if($data['insurance_corp_id']!='x'){
			 $wherecCompany = " AND a.corp_id = '".$data['insurance_corp_id']."' "; 
		 }
		 $sql="SELECT a.* , b.id AS workID  ,c.cust_name , c.cust_nickname , CONCAT(c.cust_telephone_1,' ',c.cust_telephone_2) AS custTelephoneNo  "
			 ." , d.vehicle_regis , e.province_name ,d.car_type_id , f.id AS carTypeID , f.type_name , b.work_overdue , g.company_name "
			 ." FROM  tbl_car_act_data AS a "
			 ." LEFT JOIN tbl_work_data AS b ON a.work_id = b.id "
			 ." LEFT JOIN tbl_customer_data AS c ON b.cust_id  =  c.id "
			  ." LEFT JOIN tbl_car_data AS d ON b.car_id  =  d.id "
			 ." LEFT JOIN tbl_province AS e ON d.province_regis   =  e.id "
			 ." LEFT JOIN tbl_car_type AS f ON d.car_type_id = f.id  "
			 ." LEFT JOIN tbl_insurance_company AS g ON a.corp_id  = g.id  "
			 ." WHERE act_price_total >0 AND b.do_act='0' AND a.date_work BETWEEN  '".$data['startDate']."'  AND   '".$data['endDate']."' $whereCartype $wherecCompany ORDER BY  a.act_date_start ";
		    $returnValue['resultData']=$this->db->query($sql)->result();
		 	//$returnValue['sql']=$sql;
		     return $returnValue;   
	 }
	 //---------------------------------- ) = resultCarCheck resultAct resultCarCheckFree dedugPrice  
	 function loadActDaily($data){
		 $returnValue = array();
		  $data['select_day'] = sprintf("%02d", $data['select_day']);
		  $data['select_day_end'] = sprintf("%02d", $data['select_day_end']);
		  $dayCheck = $data['select_year']."-".$data['select_month']."-".$data['select_day'];
		  $dayCheck_end = $data['select_year']."-".$data['select_month_end']."-".$data['select_day_end'];
		  $txtWhereDayMonthYear  =" WHERE a.car_check_date BETWEEN '".$dayCheck."' AND  '".$dayCheck_end."' ";
		  if($data['GetdataType']=='daily'){
			  $groupByCarcheck = " , a.car_check_date ";
			  $OrderByCarcheck = "  ORDER BY a.car_check_date ASC ";
		  }else{
			  $groupByCarcheck = "  ";
			  $OrderByCarcheck = " ORDER BY a.car_check_price ASC , a.car_check_price ASC;";
		  }
		 $sql="SELECT a.id AS CheckID , a.car_check_date , count(a.id) AS countN , a.car_type, a.car_check_price ,  SUM(CASE WHEN w.work_overdue = '0' THEN a.car_check_total ELSE 0 END) AS totalCarCheckPrice , b.id AS carTypeID , c.car_type_group "
			 ." FROM tbl_car_check AS a "
			 ." LEFT JOIN tbl_work_data AS w ON a.work_id = w.id "
			 ." LEFT JOIN tbl_car_data AS b ON w.car_id = b.id "
			 ." LEFT JOIN tbl_car_type AS c ON b.car_type_id = c.id  "
			 ." $txtWhereDayMonthYear  AND a.car_check_price > 0 AND a.free_cancel = '0' GROUP BY (a.car_check_price) $groupByCarcheck $OrderByCarcheck";
		 $returnValue['sql1']=$sql;
		 $returnValue['resultCarCheck']=$this->db->query($sql)->result();
		 //------ค่าตรวจ  ตรอ. จยย 
		 //$sql="SELECT a.id AS CheckID , count(a.id) AS countN ,  a.car_type, a.car_check_price , SUM(a.car_check_total) AS totalCarCheckPrice , b.id AS carTypeID , c.car_type_group " act_price_total >0
		 $sql="SELECT a.id AS CheckID , count(a.id) AS countN ,  a.car_type, a.car_check_price ,  SUM(CASE WHEN w.work_overdue = '0' THEN a.car_check_total ELSE 0 END) AS totalCarCheckPrice , b.id AS carTypeID , c.car_type_group "
			  ." FROM tbl_car_check AS a "
			 ." LEFT JOIN tbl_work_data AS w ON a.work_id = w.id "
			 ." LEFT JOIN tbl_car_data AS b ON w.car_id = b.id "
			 ." LEFT JOIN tbl_car_type AS c ON b.car_type_id = c.id "
			 ." $txtWhereDayMonthYear AND c.car_type_group ='2' AND a.car_check_price > 0 AND a.free_cancel = '0'  "
			 ." GROUP BY (a.car_check_price) ORDER BY a.car_check_price ASC  "
			 ." ";
		 $returnValue['sql2']=$sql;
		 $returnValue['resultBikeCheck']=$this->db->query($sql)->result();
		 //---------รถยนต์ พรี/ยกเลิก ไม่ผ่าน  totalTaxRecieve
		 $sql="SELECT  b.car_type_group,
			  COUNT(CASE WHEN a.free_cancel = '1' THEN 1 END) AS count_free_cancel,
			  COUNT(CASE WHEN a.check_pass = '0' THEN 1 END) AS count_check_pass		  			 
			FROM 
			  tbl_car_check AS a "
			."  LEFT JOIN tbl_work_data AS w ON a.work_id = w.id "
			."  LEFT JOIN tbl_car_data AS c ON w.car_id = c.id "
			."  LEFT JOIN tbl_car_type AS b ON c.car_type_id = b.id "
			 ." $txtWhereDayMonthYear  "
			 ." GROUP BY b.car_type_group ORDER BY b.car_type_group ASC ";
		 $returnValue['sql3']=$sql;
		 $returnValue['resultCarCheckFree']=$this->db->query($sql)->result();
		  //---------TAX
		 // $txtWhereDayMonthYear  =" WHERE a.date_tax_work BETWEEN '".$dayCheck."' AND '".$dayCheck_end."'  AND w.work_overdue = '0'";
		  $txtWhereDayMonthYear  =" WHERE w.date_add BETWEEN '".$dayCheck."' AND '".$dayCheck_end."'  AND w.work_overdue = '0'";
		  if($data['GetdataType']=='daily'){
			  $groupByTax = " GROUP BY (w.date_add)";
			  $OrderByTax = "  ";
		  }else{
			  $groupByTax = " ";
			  $OrderByTax = " ";
		  }
		 //$sql="SELECT SUM(tax_price) AS totalTax FROM tbl_car_tax_data AS a " totalTaxService totalTaxRecieve countRenewTax resultTax
		 $sql="SELECT w.date_add, COUNT(a.id) AS countRenewTax , SUM(a.tax_service) AS sumTaxService FROM tbl_car_tax_data AS a "
			 ." LEFT JOIN tbl_work_data AS w ON a.work_id = w.id "
			 ." $txtWhereDayMonthYear AND a.tax_service > 0 $groupByTax ";
		 $returnValue['resultTax']=$this->db->query($sql)->result();
		 $returnValue['sql4']=$sql;
		 $returnValue['resultTax1']= $returnValue['resultTax'];
		 foreach($returnValue['resultTax'] AS $tax);
		 if(isset($tax->countRenewTax)){
			 //$returnValue['totalTaxRecieve']=$tax->countRenewTax*80;
			 $returnValue['totalTaxRecieve']=$tax->sumTaxService;
			 $returnValue['countRenewTax']=$tax->countRenewTax;
		 }else{
			 $returnValue['totalTaxRecieve']=0;
			 $returnValue['countRenewTax']=0;
		 }
		 $sql="SELECT SUM(a.tax_price) AS totalTaxAll  "
			 ." FROM tbl_car_tax_data AS a "
			 ." LEFT JOIN tbl_work_data AS w ON a.work_id = w.id "
			 ."$txtWhereDayMonthYear ";
		 $returnValue['sql42']=$sql;
		 $returnValue['resultTax']=$this->db->query($sql)->result();
		 foreach($returnValue['resultTax'] AS $tax);
		 if(isset($tax->totalTaxAll)){
			 $returnValue['totalTaxAll']=$tax->totalTaxAll;
		 }else{
			 $returnValue['totalTaxAll']=0;
		 }
		 $sql="SELECT SUM(a.tax_service) AS sumSerTaxService  "
			 ." FROM tbl_car_tax_data AS a "
			 ." LEFT JOIN tbl_work_data AS w ON a.work_id = w.id "
			 ." $txtWhereDayMonthYear    ";
		 $returnValue['sql41']=$sql;
		 $returnValue['resultTax']=$this->db->query($sql)->result();
		 foreach($returnValue['resultTax'] AS $tax);
		 if(isset($tax->sumSerTaxService)){
			 $returnValue['totalTaxService']=$tax->sumSerTaxService;
		 }else{
			 $returnValue['totalTaxService']=0;
		 }
		 //--------พรบ.-----------/resultAct  
		  if($data['GetdataType']=='daily'){
			  $groupByAct = " , a.date_work ";
			  $groupByAct2 = " GROUP BY a.date_work ";
			  $OrderByAct = "  ORDER BY a.date_work ASC ";
		  }else{
			  $groupByAct = " ";
			  $groupByAct2 = " ";
			  $OrderByAct = "  ORDER BY c.car_type_group ASC";
		  }
		 $txtWhereDayMonthYear  =" WHERE (a.date_work BETWEEN '".$dayCheck."' AND '".$dayCheck_end."') AND w.work_overdue = '0' AND a.act_price_total > 0 ";
		    $sql = "SELECT  SUM(a.act_price_total) AS act_total , SUM(a.act_price_total) AS act_price_total2 "
			 .", CASE 
			 	 WHEN c.car_type_group = '1' THEN  SUM(a.act_price_total - FLOOR((a.act_price_net*0.24))) 
				 WHEN c.car_type_group = '2' THEN  SUM(ceil(a.act_price))
				 END AS dedugPrice
			 "
			 //." CASE  WHEN c.car_type_group = '1' THEN  SUM(a.act_price_net*0.24) ELSE 0  END AS reciveAct  "
			 ." , a.act_price_total , a.act_price_net , a.deduct_percent  AS deduct_total "
			 ."  , c.car_type_group ,c.deduct_percent , a.date_work "
			 ." FROM tbl_car_act_data AS a "
			 ." LEFT JOIN tbl_work_data AS w ON a.work_id = w.id "
			 ." LEFT JOIN tbl_car_data AS b ON w.car_id = b.id "
			 ." LEFT JOIN tbl_car_type AS c ON b.car_type_id = c.id "
			 ." $txtWhereDayMonthYear "
			 ."  GROUP BY c.car_type_group $groupByAct $OrderByAct ";
		  $returnValue['sql5']=$sql;
		  $returnValue['resultAct']=$this->db->query($sql)->result();
		 //-------count bike act--
		 $sql="SELECT COUNT(a.id) AS countBikeAct , a.date_work "
			 ." FROM  tbl_car_act_data AS a "
			 ." LEFT JOIN tbl_work_data AS b ON a.work_id = b.id "
			  ." LEFT JOIN tbl_car_data AS d ON b.car_id  =  d.id "
			 ." LEFT JOIN tbl_car_type AS f ON d.car_type_id = f.id  "
			 ." WHERE act_price_total >0 AND b.do_act='0'  AND (a.date_work BETWEEN '".$dayCheck."' AND '".$dayCheck_end."') AND d.car_type_id IN ('4') $groupByAct2 ";
		    $countBikeAct=$this->db->query($sql)->result();
		 	$returnValue['ResultcountBikeAct']=$countBikeAct;
		 	foreach($countBikeAct AS $cc);
			 if(isset($cc->countBikeAct)){
				 $returnValue['countBikeAct']=$cc->countBikeAct;
			 }else{
				 $returnValue['countBikeAct']=0; 
			 }
		 	$returnValue['sql5.1']=$sql;
		 //-----------อื่นๆ---// 
		   if($data['GetdataType']=='daily'){
			  $groupByOther = " GROUP BY b.date_add ";
		  }else{
			  $groupByOther = " ";
		  }
		 $txtWhereDayMonthYear  =" WHERE b.date_add BETWEEN '".$dayCheck."' AND '".$dayCheck_end."' ";
		 $sql = "SELECT CAST(FORMAT(SUM(a.car_check_price_service), 2) AS DECIMAL(10,2)) AS car_check_price_service  "
			  ." , CAST(FORMAT(SUM(a.service_other_price), 2) AS DECIMAL(10,2)) AS service_other_price ,b.date_add  "
			 ." FROM  tbl_car_service AS a "
			 ." LEFT JOIN tbl_work_data AS b ON a.work_id = b.id "
			 ." $txtWhereDayMonthYear  AND b.work_overdue = '0' $groupByOther ";
		  $returnValue['sql6']=$sql;
		  $returnValue['resultOther']=$this->db->query($sql)->result();
		 if($this->db->query($sql)->num_rows() > 0){
			 foreach($returnValue['resultOther'] AS $other);
			  $car_check_price_service =$other->car_check_price_service;
			  $service_other_price =$other->service_other_price; 
		 }else{
			  $car_check_price_service =0;
			  $service_other_price =0; 
		 }
		 if(!isset($other)){
		 }
		  $returnValue['sumOther'] =  $car_check_price_service+$service_other_price;
		 //---------ค่าใช้จ่าย----------//
		  $txtWhereDayMonthYear  =" WHERE expenses_date BETWEEN '".$dayCheck."' AND '".$dayCheck_end."' ";
		 $sql = "SELECT * FROM expenses_data $txtWhereDayMonthYear AND data_status='1' ORDER BY id DESC ";
		 $returnValue['sql7']=$sql;
		 $returnValue['resultExpense']=$this->db->query($sql)->result();
		 //--------------
		 return $returnValue;
	 }
	 //---------------------------------- ) = '".$data['select_month']."' AND YEAR(a.car_check_date) = '".$data['select_year']."'
	 function loadCarCheckMonthly($data){
		 $returnValue = array();		
		// if($data['select_day']=='all'){
		//	$txtWhereDayMonthYear  =" AND  MONTH(a.car_check_date) = '".$data['select_month']."' AND YEAR(a.car_check_date) = '".$data['select_year']."' ";
		// }else{
			 $data['select_day'] = sprintf("%02d", $data['select_day']);
			 $data['select_day_end'] = sprintf("%02d", $data['select_day_end']);
			 $dayCheck = $data['select_year']."-".$data['select_month']."-".$data['select_day'];
			 $dayCheck_end = $data['select_year_end']."-".$data['select_month_end']."-".$data['select_day_end'];
			 $txtWhereDayMonthYear  =" AND  a.car_check_date BETWEEN '".$dayCheck."' AND '".$dayCheck_end."' ";
		// }
		 $sql="SELECT a.* , b.id AS workID , c.cust_name , c.cust_nickname , CONCAT(c.cust_telephone_1,' ',c.cust_telephone_2) AS custTelephoneNo "
			  ." , d.vehicle_regis , e.province_name , f.act_price_total , g.car_check_price_service , g.service_other_price , h.tax_price"
			  ." , j.initials_name , j.type_name , k.name_sname "
			  ." FROM tbl_car_check AS a "
			  ." LEFT JOIN tbl_work_data AS b ON a.work_id = b.id "
			  ." LEFT JOIN tbl_customer_data AS c ON b.cust_id  =  c.id "
			  ." LEFT JOIN tbl_car_data AS d ON b.car_id  =  d.id "
			  ." LEFT JOIN tbl_province AS e ON d.province_regis   =  e.id "
			  ." LEFT JOIN tbl_car_act_data AS f ON f.work_id   =  b.id "
			  ." LEFT JOIN tbl_car_service AS g ON g.work_id   =  b.id "
			  ." LEFT JOIN tbl_car_tax_data AS h ON h.work_id   =  b.id "
			  ." LEFT JOIN tbl_car_type AS j ON d.car_type_id   =  j.id "
			  ." LEFT JOIN tbl_user_data AS k ON a.user_update_time_check   =  k.id "
			  ." WHERE ((car_check_price > 0) OR ((free_cancel='1')&&(car_check_price=0))) $txtWhereDayMonthYear ORDER BY a.car_check_date ASC ";
		 $returnValue['resultData']=$this->db->query($sql);
		 //$returnValue['sql']=$sql;
		  return $returnValue;
	 }  //select_month,select_year
	 //---------------------------------- car_check_price other_paid date_work pay_transfer2
	 function load_inspection_daily_report($data){
		 $returnValue = array();		
		 //$date_work = $this->translateDateToEng($date_work);  
		 $dayCheck = $data['select_year']."-".$data['select_month']."-".$data['select_day'];
		 $dayCheck_end = $data['select_year_end']."-".$data['select_month_end']."-".$data['select_day_end'];
		 $sql="SELECT a.* , b.id AS workID , b.pay_cash , b.pay_transfer, b.pay_transfer2, b.do_act ,b.work_overdue  , c.cust_name , c.cust_nickname , CONCAT(c.cust_telephone_1,' ',c.cust_telephone_2) AS custTelephoneNo , b.date_add "
			  ." , d.vehicle_regis , e.province_name , f.other_paid, f.act_discount , f.act_price_total, g.car_check_price_service , g.service_other_price , h.tax_price , h.tax_service, h.date_tax_work "
			  ." , j.initials_name , j.type_name , j.car_type_group , b.pay_cash_overdue , b.pay_transfer_overdue , b.pay_transfer2_overdue , b.work_overdue "
			  ." FROM  tbl_work_data AS b  "
			  ." LEFT JOIN tbl_car_check AS a ON a.work_id = b.id "
			  ." LEFT JOIN tbl_customer_data AS c ON b.cust_id  =  c.id "
			  ." LEFT JOIN tbl_car_data AS d ON b.car_id  =  d.id "
			  ." LEFT JOIN tbl_province AS e ON d.province_regis   =  e.id "
			  ." LEFT JOIN tbl_car_act_data AS f ON f.work_id   =  b.id "
			  ." LEFT JOIN tbl_car_service AS g ON g.work_id   =  b.id "
			  ." LEFT JOIN tbl_car_tax_data AS h ON h.work_id   =  b.id "
			  ." LEFT JOIN tbl_car_type AS j ON d.car_type_id   =  j.id "
			  ." WHERE b.date_add BETWEEN '".$dayCheck."' AND '".$dayCheck_end."'  ORDER BY b.date_add ASC ";
		 $returnValue['resultData']=$this->db->query($sql);
		 //$returnValue['sql']=$sql;
		  return $returnValue;
	 }
	 //---------------------------------- 
	 function callLastData($workID){
		 $returnVale = array();		
		  //-------select cust id-------//
		  $sql="SELECT * FROM tbl_work_data WHERE id = '".$workID."' ";
		  $resultWork = $this->db->query($sql)->result();
		  foreach($resultWork AS $work);
		  $custID = $work->cust_id;
		  //--------select last work --------//
		  $returnVale['last_insurance_price'] = "0";
		  $returnVale['last_act_price'] = "0";
		  $returnVale['last_total'] = "0";
		  $returnVale['insurance_end'] = "";
		   $sql="SELECT * FROM `tbl_work_data` WHERE cust_id ='".$custID."' AND date_add < DATE_SUB(NOW(),INTERVAL 1 YEAR) ORDER BY `date_add` DESC  LIMIT 0,1; ";
		  // echo $sql;
		   $resultPreviousWork = $this->db->query($sql)->result();
		   foreach($resultPreviousWork AS $PreViousWork){
			   $LastWorkID =$PreViousWork->id;
		   }
		   if(isset($PreViousWork->id)){ 
			   $sql="SELECT * FROM `tbl_car_insurance_data` WHERE work_id  = '".$PreViousWork->id."' ";
			 //  echo "<br>".$sql."<br>";
			   $resultLastIns = $this->db->query($sql)->result();
			  // print_r($resultLastIns);
			   foreach($resultLastIns AS $lastIns);
			   if(isset($lastIns->insurance_price)){
				    $returnVale['last_insurance_price'] = $lastIns->insurance_price;
				    $returnVale['insurance_end'] = $lastIns->insurance_end;
			   }
			   $sql="SELECT * FROM `tbl_car_act_data` WHERE work_id  = '".$PreViousWork->id."' ";
			  //echo "<br>".$sql."<br>";
			   $resultLastAct = $this->db->query($sql)->result();
			   foreach($resultLastAct AS $lastAct);
			   if(isset($lastAct->act_price)){
				    $returnVale['last_act_price']=$lastAct->act_price;
			   }
		   }
		 $returnVale['last_total']=$returnVale['last_insurance_price']+$returnVale['last_act_price'];
		 return $returnVale;
	 }
	 //---------------------------------- last_insurance_price
	 function SaveCarApplication($data){   /// ึ ค้างไว้ก่อน เนื่องจากฟิลด์กับข้อมูลไม่ตรงกัน เช็ค input กับข้อมูลที่ป้อนให้ตรงกัน
		 $data['notification_date'] = $this->translateDateToEng($data['notification_date']);  
		 $data['birthday_driver_1'] = $this->translateDateToEng($data['birthday_driver_1']);  
		 $data['birthday_driver_2'] = $this->translateDateToEng($data['birthday_driver_2']);  
		 $data['start_protect_date'] = $this->translateDateToEng($data['start_protect_date']);  
		 $data['end_protect_date'] = $this->translateDateToEng($data['end_protect_date']);  
		 $data['do_action_date'] = $this->translateDateToEng($data['do_action_date']);  
		  $data['protect_accsories'] =$this->removeComma($data['protect_accsories']); 
		  $data['third_party_liability_person'] =$this->removeComma($data['third_party_liability_person']); 
		  $data['third_party_liability_time'] =$this->removeComma($data['third_party_liability_time']); 
		  $data['property_damage'] =$this->removeComma($data['property_damage']); 
		  $data['first_damage'] =$this->removeComma($data['first_damage']); 
		  $data['app_ins_price'] =$this->removeComma($data['app_ins_price']); 
		  $data['car_fire_damage'] =$this->removeComma($data['car_fire_damage']); 
		  $data['first_portion_of_damage'] =$this->removeComma($data['first_portion_of_damage']); 
		  $data['car_loss_fire'] =$this->removeComma($data['car_loss_fire']); 
		  $data['car_flood'] =$this->removeComma($data['car_flood']); 
		  $data['app_act_price'] =$this->removeComma($data['app_act_price']); 
		  $data['total_premium'] =$this->removeComma($data['total_premium']); 
		  $data['dismemberment_driver_person'] =$this->removeComma($data['dismemberment_driver_person']); 
		  $data['dismemberment_person_price'] =$this->removeComma($data['dismemberment_person_price']); 
		  $data['dismemberment_passenger_person'] =$this->removeComma($data['dismemberment_passenger_person']); 
		  $data['dismemberment_passenger_price'] =$this->removeComma($data['dismemberment_passenger_price']); 
		  $data['temporary_dirver_disability_person'] =$this->removeComma($data['temporary_dirver_disability_person']); 
		  $data['temporary_dirver_disability_price'] =$this->removeComma($data['temporary_dirver_disability_price']); 
		  $data['temporary_passenger_disability_person'] =$this->removeComma($data['temporary_passenger_disability_person']); 
		  $data['temporary_passenger_disability_price'] =$this->removeComma($data['temporary_passenger_disability_price']); 
		  $data['medical_expenses_person'] =$this->removeComma($data['medical_expenses_person']); 
		  $data['expenses_person_price'] =$this->removeComma($data['expenses_person_price']); 
		 $returnVale = array();		
		 $returnVale['doDb']='0';
		 $today =date("Y-m-d");
		 if($data['appID']==""){
			 $sql=" INSERT INTO `work_car_application` "
				 ."(`id`, `work_id`, `date_create`, `insuranec_name`, `id_card`, `app_address`, `app_telephone`, `application_type`, `notification_date`, `agent_code`, `ins_corp_id`, `ins_type_id`, `car_fix_type`, `ins_define_name`, `driver_name_1`, `birthday_driver_1`, `occupation_1`, `driver_name_2`, `birthday_driver_2`, `occupation_2`, `start_protect_date`, `end_protect_date`, `do_action_date`, `do_action_time`, `protect_accsories`, `protect_accsories_remark`, `third_party_liability_person`, `third_party_liability_time`, `property_damage`, `first_damage`, `car_fire_damage`, `first_portion_of_damage`, `car_loss_fire`, `car_flood`, `app_ins_price`, `total_premium`, `dismemberment_driver_person`, `dismemberment_person_price`, `dismemberment_passenger_person`, `dismemberment_passenger_price`, `temporary_dirver_disability_person`, `temporary_dirver_disability_price`, `temporary_passenger_disability_person`, `temporary_passenger_disability_price`, `expenses_person`, `expenses_person_price`, `app_act_price`) "
				 ." VALUES "
				 ."('', '1', '2022-12-16', 'insuranec_name', 'id_card', 'app_address', '1', '2', '2022-12-16', 'agent_code', '1111', '9999', 'car_fix_type', '1', 'driver_name_1', '2022-12-10', 'occupation_1', 'driver_name_2', '2022-12-11', 'occupation_2', '2022-12-12', '2022', '2022-12-12', '12:33', 'protect_accsories', 'protect_accsories_remark', 'third_party_liability_person', 'third_party_liability_time', 'property_damage', 'first_damage', 'car_fire_damage', 'first_portion_of_damage', 'car_loss_fire', 'car_flood', 'app_ins_price', 'total_premium', '5', 'dismemberment_person_price', '6', 'dismemberment_passenger_price', '7', 'temporary_dirver_disability_price', '8', 'temporary_passenger_disability_price', '9', 'expenses_person_price', '10') ";
		 }else{
		 }
	 }
	 //---------------------------------- tbl_car_tax_data
	 function callSummaryData($workID){
$data =array();
		 $sql="SELECT a.*, a.id AS workID , b.id AS custID, b.cust_name , b.cust_nickname , CONCAT(cust_telephone_1,' ', cust_telephone_2) AS custTelephone , c.id AS CarID, c.* , e.* , f.* , g.* , h.*  , d.province_name  , j.company_name AS insCompany_name  , k.company_name AS actCompany_name , l.* , ct.*"
			 ." FROM tbl_work_data AS a "
			 ." LEFT JOIN tbl_customer_data AS b ON a.cust_id = b.id "
			 ." LEFT JOIN tbl_car_data AS c ON a.car_id = c.id "
			 ." LEFT JOIN tbl_province AS d ON c.province_regis  = d.id "
			 ." LEFT JOIN tbl_car_act_data AS e ON a.id  = e.work_id "
			 ." LEFT JOIN tbl_car_insurance_data AS f ON a.id  = f.work_id "
			 ." LEFT JOIN tbl_car_check AS g ON a.id  = g.work_id "
			 ." LEFT JOIN tbl_car_service AS h ON a.id  = h.work_id "
			 ." LEFT JOIN tbl_insurance_company AS j ON f.insurance_corp_id   = j.id "
			 ." LEFT JOIN tbl_insurance_company AS k ON e.corp_id    = k.id "
			 ." LEFT JOIN tbl_work_post_address AS l ON a.id  = l.work_id  "
			 ." LEFT JOIN tbl_car_tax_data AS ct ON a.id  = ct.work_id  "
			 ." WHERE a.id = '".$workID."' ";
		 $resultData =$this->db->query($sql)->result();
		 foreach($resultData AS $data);
		 return $data;
	 }
	 //----------------------------------startDate endDate  date_add
	 function listWork($data){
		 $data['startDate'] = $this->translateDateToEng($data['startDate']); 
		 $data['endDate'] = $this->translateDateToEng($data['endDate']); 
		 /*$sql="SELECT a.*, a.id AS workID , b.id AS custID, b.cust_name , b.cust_nickname , CONCAT(cust_telephone_1,' ', cust_telephone_2) AS custTelephone , c.id AS CarID, c.vehicle_regis , d.province_name ,e.act_no  "
			 ." FROM tbl_work_data AS a "
			 ." LEFT JOIN tbl_customer_data AS b ON a.cust_id = b.id "
			 ." LEFT JOIN tbl_car_data AS c ON a.car_id = c.id "
			 ." LEFT JOIN tbl_province AS d ON c.province_regis  = d.id "
			 ." LEFT JOIN tbl_car_act_data AS e ON a.id  = e.work_id "
			 ." LEFT JOIN  tbl_car_insurance_data AS f ON a.id  = f.work_id "
			 ." WHERE a.work_status ='1' AND (a.date_add BETWEEN '".$data['startDate']."' AND '".$data['endDate']."')"
			 ." ORDER BY a.date_add DESC, a.id ASC ";  car_check_price , b.id AS custID  */
		 $sql="SELECT a.id AS workID , a.date_add AS workDate , a.car_id ,a.date_add "
			 ." , b.id AS actID , b.act_date_start , b.act_date_end ,b.act_price,b.act_price_total, b.act_paid "
			 ." , c.id AS checkID , c.car_check_total,  c.car_check_price, c.car_check_paid"
			 ." , d.id AS taxID , d.tax_price , d.tax_paid "
			 ." , e.car_check_price_service "
			 ." , f.id AS custID , f.cust_name , f.cust_nickname , f.cust_telephone_2 , f.cust_telephone_1 "
			 ." , g.id AS CarID , g.vehicle_regis ,g.province_regis , g.date_regist  "
			 ." , h.province_name , h.id AS provinceID , k.type_name "
			 ." FROM tbl_work_data AS a "
			 ." LEFT JOIN  tbl_car_act_data AS b ON b.work_id = a.id "
			 ." LEFT JOIN  tbl_car_check AS c ON c.work_id = a.id "
			 ." LEFT JOIN  tbl_car_tax_data AS d ON d.work_id = a.id "
			 ." LEFT JOIN  tbl_car_service AS e ON e.work_id = a.id "
			 ." LEFT JOIN  tbl_customer_data AS f ON a.cust_id = f.id "
			 ." LEFT JOIN  tbl_car_data AS g ON a.car_id  = g.id "
			 ." LEFT JOIN  tbl_province AS h ON g.province_regis  = h.id "
			 ." LEFT JOIN  tbl_car_type AS k ON g.car_type_id  = k.id "
			." WHERE  (a.date_add BETWEEN '".$data['startDate']."' AND '".$data['endDate']."') ORDER BY a.id ASC ";
		 $resultData =$this->db->query($sql)->result();
		 return $resultData;
	 }
	 //----------------------------------
	 function addNewWork(){
		 $date_work = date("Y-m-d");
		 $sql="INSERT INTO `tbl_work_data` (`id`, `date_add`, `work_status`) VALUES ('', '".$date_work."', '1') ";
		 $this->db->query($sql);
		 $returnVale = $this->db->insert_id();
		 return $returnVale;
	 }
	//---------------------------------- 
	 function getPostData($workID){
		 $data = array();
		 $sql="SELECT * FROM   tbl_work_post_address  WHERE work_id = '".$workID."' ";
		 $resultData = $this->db->query($sql)->result();
		 foreach($resultData AS $data);
		 return $data;				 
	 }
	//---------------------------------- 
	 function getServiceDetail($workID){
		 $data = array();
		 $sql="SELECT * FROM  tbl_car_service  WHERE work_id = '".$workID."' ";
		 $resultData = $this->db->query($sql)->result();
		 foreach($resultData AS $data);
		 return $data;		
	 }
	//---------------------------------- 
	 function getInsDetail($workID){
		 $data = array();
		 $sql="SELECT * FROM  tbl_car_insurance_data  WHERE work_id = '".$workID."' ";
		 $resultData = $this->db->query($sql)->result();
		 foreach($resultData AS $data);
		 return $data;		
	 }
	//---------------------------------- 
	 function getActDetail($workID){
		 $data=array();
		 $sql="SELECT * FROM tbl_car_act_data WHERE work_id = '".$workID."' ";
		 $resultData = $this->db->query($sql)->result();
		 $resultData = $this->db->query($sql)->result();
		 foreach($resultData AS $data);
		 return $data;		
	 }
	//----------------------------------
	 function getTaxDetail($workID){
		  $data=array();
		 $sql="SELECT * FROM tbl_car_tax_data WHERE work_id = '".$workID."' ";
		 $resultData = $this->db->query($sql)->result();
		 foreach($resultData AS $data);
		 return $data;		 
	 }
	//---------------------------------- corp_id selectType
	 function getChainSelect($data){
	 	 $sql="SELECT a.*,b.insurance_type_name, b.insurance_type FROM tbl_insurance_income AS a "
			 ." LEFT JOIN tbl_insurance_type AS b ON a.ins_type_id=b.id "
			 ." WHERE a.ins_company ='".$data['corp_id']."' AND b.insurance_type = '".$data['selectType']."' ";
		 $resultData = $this->db->query($sql)->result();
		 return $resultData;
	 }
	//----------------------------------
	 function removeTransport($dataID){
		 $returnVale = array();		
		 $returnVale['doDb']='0';
		 $sql = "UPDATE work_car_transport SET data_status ='0' WHERE id='".$dataID."' ";
		 if($this->db->query($sql)){ 
			 $returnVale['doDb']='1';
		 }
		 $returnVale['sql']=$sql;
		 return $returnVale;
	 }
	//----------------------------------
	 function listTransportWork($workID){
		 $sql="SELECT a.* , b.work_type_name , "
			 ." ( CASE 
					WHEN transport_payment = '1' THEN 'เงินสด'
					WHEN transport_payment = '2' THEN 'เงินโอน'
				END) AS paymentName"
			  ." FROM work_car_transport AS a "
			  ." LEFT JOIN  tbl_work_type AS b ON a.work_type_id  = b.id "
			  ." WHERE a.work_id  = '".$workID."' AND a.data_status ='1' ORDER BY id ASC";
		 $resultData = $this->db->query($sql)->result();
		  return $resultData;
	 }
	//----------------------------------
	//----------------------------------
	 function SavePostAddr($data){
		 $returnVale = array();		
		 $returnVale['doDb']='0';
		 $data['date_of_submission'] =$this->translateDateToEng($data['date_of_submission']); 
		 if(!isset($data['delivery_of_documents'])){ $data['delivery_of_documents']=0;}
		 if(!isset($data['use_address'])){ $data['use_address']=0;}
		 if(!isset($data['date_of_submission'])){ $data['date_of_submission']='';}
		 if($data['postID']==''){
			 $sql=" INSERT INTO `tbl_work_post_address` (`id`, `work_id`, `cust_id`, `post_name`, `telephone`, `corp_name`, `house_number`, `home_group`, `alley`, `road`, `subdistric`, `distric`, `province`, `post_code`, `delivery_of_documents`, `use_address`, `date_of_submission`, `remark`) "
				 ." VALUES "
				 ."('', '".$data['postWorkID']."', '".$data['postCustID']."', '".$data['post_name']."', '".$data['telephone']."', '".$data['corp_name']."', '".$data['house_number']."', '".$data['home_group']."', '".$data['alley']."', '".$data['road']."', '".$data['subdistric']."', '".$data['distric']."', '".$data['province']."', '".$data['post_code']."', '".$data['delivery_of_documents']."', '".$data['use_address']."', '".$data['date_of_submission']."', '".$data['remark']."') ";
			 if($this->db->query($sql)){
					$returnVale['doDb']='1';
					$returnVale['taxDb']='insert';
					$returnVale['postID']=$this->db->insert_id();
				}else{
					$returnVale['serviceworkID']='no insert';
				}
		 }else{  // delivery_of_documents
			 $sql="UPDATE tbl_work_post_address SET  `post_name`='".$data['post_name']."', `telephone`='".$data['telephone']."', `corp_name`='".$data['corp_name']."', `house_number`='".$data['house_number']."', `home_group`='".$data['home_group']."', `alley`= '".$data['alley']."', `road`= '".$data['road']."', `subdistric`='".$data['subdistric']."', `distric`='".$data['distric']."', `province`='".$data['province']."', `post_code`= '".$data['post_code']."', `delivery_of_documents`='".$data['delivery_of_documents']."', `use_address`='".$data['use_address']."', `date_of_submission`='".$data['date_of_submission']."', `remark`='".$data['remark']."' "
				 ." WHERE id = '".$data['postID']."' ";
			 if($this->db->query($sql)){
					$returnVale['doDb']='1';
					$returnVale['taxDb']='update';
					$returnVale['postID']=$data['postID'];
				}else{
					$returnVale['serviceworkID']='no insert';
				}
		 }
		  $returnVale['sql']=$sql;
		  return $returnVale;
	 }
	//----------------------------------
	 function savetransport($data){
		 $returnVale = array();		
		 $data['date_transport'] =$this->translateDateToEng($data['date_transport']); 
		 $data['transport_price'] =$this->removeComma($data['transport_price']); 
		 $data['transport_discount_price'] =$this->removeComma($data['transport_discount_price']); 
		 $data['transport_discount_total'] =$this->removeComma($data['transport_discount_total']); 
		 if($data['transportID']==''){
			 $sql="INSERT INTO `work_car_transport` (`id`,`work_id`, `work_type_id`, `date_transport`, `transport_price`, `transport_discount_price`, `transport_discount_total`, `transport_payment`, `transport_remark`, `user_update`) VALUES ('', '".$data['transportWorkID']."', '".$data['work_type_id']."', '".$data['date_transport']."', '".$data['transport_price']."', '".$data['transport_discount_price']."', '".$data['transport_discount_total']."', '".$data['transport_payment']."', '".$data['transport_remark']."', '".$this->session->userdata('user_id')."');";
			 if($this->db->query($sql)){
					$returnVale['doDb']='1';
					$returnVale['taxDb']='insert';
					//$returnVale['serviceworkID']=$this->db->insert_id();
				}else{
					$returnVale['serviceworkID']='no insert';
				}
		 }else{
			 $sql="UPDATE work_car_transport SET `date_transport`= '".$data['date_transport']."', `transport_price` = '".$data['transport_price']."', `transport_discount_price` = '".$data['transport_discount_price']."' , `transport_discount_total` = '".$data['transport_discount_total']."' , `transport_payment` = '".$data['transport_payment']."' , `transport_remark`= '".$data['transport_remark']."' , `user_update` = '".$this->session->userdata('user_id')."' WHERE id = '".$data['transportID']."' ";
			 if($this->db->query($sql)){
					$returnVale['doDb']='1';
					$returnVale['taxDb']='update';
					//$returnVale['transportWorkID']=$data['transportWorkID'];
				}else{
					$returnVale['transportWorkID']='no update';
				}
		 }
		  $returnVale['sql']=$sql;
		  return $returnVale;
	 }
	//----------------------------------
	 function SaveService($data){
		 $returnVale = array();		
		 $data['car_check_price_service'] =$this->removeComma($data['car_check_price_service']); 
		 $data['service_other_price'] =$this->removeComma($data['service_other_price']);
		  if($data['service_id']==''){ 
			  $sql="INSERT INTO `tbl_car_service` (`id`, `work_id`, `car_check_price_service`, `service_other_price`, `service_remark`, `user_update`) VALUES ('', '".$data['serviceworkID']."', '".$data['car_check_price_service']."', '".$data['service_other_price']."', '".$data['service_remark']."', '".$this->session->userdata('user_id')."');";
			   if($this->db->query($sql)){
					$returnVale['doDb']='1';
					$returnVale['taxDb']='insert';
					$returnVale['serviceworkID']=$this->db->insert_id();
				}else{
					$returnVale['serviceworkID']='no insert';
				}
		  }else{
			   $sql=" UPDATE tbl_car_service SET `car_check_price_service`='".$data['car_check_price_service']."', `service_other_price` = '".$data['service_other_price']."', `service_remark` = '".$data['service_remark']."' , `user_update` = '".$this->session->userdata('user_id')."' "
				   ." WHERE id = '".$data['service_id']."' ";
			   if($this->db->query($sql)){
					$returnVale['doDb']='1';
					$returnVale['taxDb']='update';
					$returnVale['serviceworkID']=$data['serviceworkID'];
				}else{
					$returnVale['serviceworkID']='no update';
				}
		  }
		  $returnVale['sql']=$sql;
		  $returnVale['serviceworkID']=$data['serviceworkID'];
		 return $returnVale;
	 }
	//-----------****************************workIDis_corporation
	 function SaveToRoOr($data){
		 $returnVale = array();		
		 $date_work = date("Y-m-d");
		 $returnVale['workID']=$data['workID'];
		 $dateAdd = date("Y-m-d"); 
		  //----if customer---------custID//dateAdd
		  if($data['custID']==''){
			   $returnVale=array();
			   $returnVale['doDb']='0';
				 $sql="INSERT INTO `tbl_customer_data` (`id`, `cust_name`, `cust_nickname`, `cust_telephone_1`, `cust_telephone_2`, `is_corporation`, `user_update`, `cust_status`, `date_add`) VALUES ('', '".$data['cust_name']."', '".$data['cust_nickname']."', '".$data['cust_telephone_1']."', '".$data['cust_telephone_2']."', '".$data['is_corporation']."', '".$this->session->userdata('user_id')."', '1', '".$dateAdd."') ";
				 if($this->db->query($sql)){
					 $returnVale['doDb']='1';
					 $returnVale['custID']=$this->db->insert_id();
					 $data['custID']=$returnVale['custID'];
				 }
				 $returnVale['sqlCust']=$sql;
		  }else{
			  $sql="UPDATE tbl_customer_data SET `cust_name`='".$data['cust_name']."', `cust_nickname`='".$data['cust_nickname']."', `cust_telephone_1`='".$data['cust_telephone_1']."', `cust_telephone_2`='".$data['cust_telephone_2']."', `is_corporation`='".$data['is_corporation']."' WHERE id = '".$data['custID']."' ";
			   if($this->db->query($sql)){
					 $returnVale['doDb']='1';
					 $returnVale['custID']=$data['custID'];
				 }
				 $returnVale['sqlCust']=$sql;
		  } 
		  //----if car data---------// date_regist month_regist year_car pay_transfer_date2
		  if($data['carID']==''){
			 $date_regist = $data['year_car']."-".$data['month_regist']."-".$data['date_regist'];
			 $sql="INSERT INTO `tbl_car_data` (`id`, `brand_id`, `cust_id`, `vehicle_regis`, `province_regis`, `date_regist`, `year_car`, `vin_no`, `engine_size`, `car_brand`, `car_model`, `car_type_id`, `date_add`, `car_status`, `user_update`, `type_premium_id`) "
			 ." VALUES "
			 ." ('', '".$data['brand_id']."', '".$data['custID']."', '".$data['vehicle_regis']."',  '".$data['province_regis']."' , '".$date_regist."', '".$data['year_car']."', '".$data['vin_no']."', '".$data['engine_size']."', '".$data['car_brand']."', '".$data['car_model']."', '".$data['car_type_id']."', '".$dateAdd."', '1', '".$this->session->userdata('user_id')."', '".$data['type_premium_id']."'); ";
		  if($this->db->query($sql)){
			 $returnVale['doDb']='1';
			 $returnVale['carID']=$this->db->insert_id();
			 $data['carID']=$returnVale['carID'];
		   }
		 }else{
			$date_regist = $data['year_car']."-".$data['month_regist']."-".$data['date_regist'];
			$sql="UPDATE tbl_car_data SET   `cust_id`='".$data['custID']."' ,`brand_id`='".$data['brand_id']."' , `vehicle_regis` = '".$data['vehicle_regis']."' , `province_regis` = '".$data['province_regis']."' , `date_regist` = '".$date_regist."' , `year_car` = '".$data['year_car']."' , `vin_no` = '".$data['vin_no']."' , `engine_size` = '".$data['engine_size']."' , `car_brand` = '".$data['car_brand']."' , `car_model` = '".$data['car_model']."' , `car_type_id` = '".$data['car_type_id']."' , `user_update` = '".$this->session->userdata('user_id')."'  , `type_premium_id` = '".$data['type_premium_id']."' WHERE id = '".$data['carID']."' ";
			   if($this->db->query($sql)){
			 $returnVale['doDb']='1';
			 $returnVale['carID']=$data['carID'];
		   }
		 }
		  //-------save Work-------------//
		 		   //-----------save work---//  pay_cash_check pay_transfer_check car_id
		 $returnVale['doWorkTable']='0';
		 if(!isset($data['work_overdue'])){
			 $data['work_overdue'] = 0;
			 //$data['date_pay_overdue']='';
		 }
		 if(!isset($data['pay_transfer_date'])){ $data['pay_transfer_date']='';}else{ $data['pay_transfer_date'] =$this->translateDateToEng($data['pay_transfer_date']);  }
		 if(!isset($data['pay_transfer_date2'])){ $data['pay_transfer_date2']='';}else{ $data['pay_transfer_date2'] =$this->translateDateToEng($data['pay_transfer_date2']);  }
		 if(!isset($data['date_pay_overdue'])){ $data['date_pay_overdue']='';}else{ $data['date_pay_overdue'] =$this->translateDateToEng($data['date_pay_overdue']);  }
		 if(!isset($data['pay_cash'])){$data['pay_cash']=0; }else{  $data['pay_cash'] =$this->removeComma($data['pay_cash']);  }
		 if(!isset($data['pay_transfer'])){$data['pay_transfer']=0; }else{  $data['pay_transfer'] =$this->removeComma($data['pay_transfer']); }
		 if(!isset($data['pay_transfer2'])){$data['pay_transfer2']=0; }else{  $data['pay_transfer2'] =$this->removeComma($data['pay_transfer2']); }
		 if(!isset($data['pay_transfer_check'])){$data['pay_transfer_check']=0; }else{  $data['pay_transfer_check'] = $data['pay_transfer_check']; }
		 if(!isset($data['pay_transfer_check2'])){$data['pay_transfer_check2']=0; }else{  $data['pay_transfer_check2'] = $data['pay_transfer_check2']; }
		 if(!isset($data['pay_cash_check'])){$data['pay_cash_check']=0; }else{  $data['pay_cash_check'] = $data['pay_cash_check']; }
		  $data['total_work_price'] =$this->removeComma($data['total_work_price']); 
		 if(!isset($data['pay_type'])){ $data['pay_type']=0; }
		 if(!isset($data['do_act'])){ $data['do_act']=0; }
		 //pay_transfer2_overdue pay_transfer_overdue pay_cash_overdue 
		 if(!isset($data['pay_cash_overdue'])){ $data['pay_cash_overdue']=0;}
		 if(!isset($data['pay_transfer_overdue'])){ $data['pay_transfer_overdue']=0;}
		 if(!isset($data['pay_transfer2_overdue'])){ $data['pay_transfer2_overdue']=0;}
		 if($data['workID']==''){
			  $sql="INSERT INTO `tbl_work_data` "
				  ."(id,cust_id,car_id, date_add, work_status, do_act, total_work_price , pay_type , bank_acc_id ,  pay_cash "
				  ." , pay_transfer ,  pay_transfer_date , pay_cash_check , pay_transfer_check , pay_transfer_check2  , pay_transfer_date2 , bank_acc_id2 , pay_transfer2 , pay_cash_overdue , pay_transfer_overdue, pay_transfer2_overdue, work_overdue, date_pay_overdue)"
				  ."VALUES ('','".$data['custID']."','".$data['carID']."', '".$date_work."', '1','".$data['do_act']."' , '".$data['total_work_price']."' ,'".$data['pay_type']."','".$data['bank_acc_id']."' , '".$data['pay_cash']."' "
				  ." , '".$data['pay_transfer']."' , '".$data['pay_transfer_date']."' , '".$data['pay_cash_check']."' ,'".$data['pay_transfer_check']."' , '".$data['pay_transfer_check2']."' , '".$data['pay_transfer_date2']."' , '".$data['bank_acc_id2']."' , '".$data['pay_transfer2']."', '".$data['pay_cash_overdue']."', '".$data['pay_transfer_overdue']."' , '".$data['pay_transfer2_overdue']."', '".$data['work_overdue']."', '".$data['date_pay_overdue']."' ) ";
		 	  $this->db->query($sql);
		 	  $data['workID'] = $this->db->insert_id();
		 }else{
			 $sql="UPDATE  tbl_work_data SET total_work_price = '".$data['total_work_price']."' , pay_type = '".$data['pay_type']."' , bank_acc_id = '".$data['bank_acc_id']."' , pay_cash ='".$data['pay_cash']."', pay_transfer ='".$data['pay_transfer']."' , pay_transfer_date ='".$data['pay_transfer_date']."', pay_cash_check ='".$data['pay_cash_check']."' , pay_transfer_check ='".$data['pay_transfer_check']."' , pay_transfer_check2 ='".$data['pay_transfer_check2']."' , `do_act`='".$data['do_act']."' , pay_transfer_date2 ='".$data['pay_transfer_date2']."' , bank_acc_id2 = '".$data['bank_acc_id2']."' , pay_transfer2 ='".$data['pay_transfer2']."'   , pay_cash_overdue= '".$data['pay_cash_overdue']."' , pay_transfer_overdue='".$data['pay_transfer_overdue']."' , pay_transfer2_overdue='".$data['pay_transfer2_overdue']."' , work_overdue = '".$data['work_overdue']."', date_pay_overdue = '".$data['date_pay_overdue']."'  WHERE id = '".$data['workID']."' ";
		 	if($this->db->query($sql)){ 
			 $returnVale['doWorkTable']='1'; 
			 $returnVale['sqlUpdateWork']=$sql;
			 $returnVale['workID']=$data['workID'];
		   }
	    }
		  //----if carcheck---------//
		 if($data['car_check_price']!=''){
			 $data['car_check_date'] =$this->translateDateToEng($data['car_check_date']); 
			 $data['car_check_price'] =$this->removeComma($data['car_check_price']); 
			 $data['car_check_discount'] =$this->removeComma($data['car_check_discount']); 
			 $data['car_check_total'] =$this->removeComma($data['car_check_total']); 
			 if(!isset($data['free_cancel'])){ $data['free_cancel']=0; }
			 if(!isset($data['registration_book'])){ $data['registration_book']=0; }
			 if(!isset($data['check_pass'])){ $data['check_pass']=0; }
			 if(!isset($data['car_check_paid'])){ $data['car_check_paid']=0; }
			 $data['car_check_time']  = $data['hr'].":".$data['minute'].":".$data['second'];
			 if($data['inspecID']==''){
			 $sql="INSERT INTO `tbl_car_check` (`id`, `car_type`, `work_id`, `car_check_date`, `car_check_time`, `car_check_price`, `car_check_discount`, `car_check_total`, `registration_book`, `car_check_remark`, `user_update`, `free_cancel`, `check_pass`, `car_check_paid`) VALUES ('', '".$data['car_type']."', '".$data['workID']."', '".$data['car_check_date']."', '".$data['car_check_time']."',  '".$data['car_check_price']."' , '".$data['car_check_discount']."'  ,   '".$data['car_check_total']."' , '".$data['registration_book']."', '".$data['car_check_remark']."'  , '".$this->session->userdata('user_id')."', '".$data['free_cancel']."', '".$data['check_pass']."', '".$data['car_check_paid']."') ";
			  if($this->db->query($sql)){
					$returnVale['doDb']='1';
					$returnVale['taxDb']='insert';
					$returnVale['inspecID']=$this->db->insert_id();
				}else{
					$returnVale['inspecID']='no insert';
				}
		 	}else{
			$sql=" UPDATE  tbl_car_check SET   `car_type` ='".$data['car_type']."', `car_check_date` = '".$data['car_check_date']."', `car_check_time`='".$data['car_check_time']."' , `car_check_price` = '".$data['car_check_price']."' , `car_check_discount` = '".$data['car_check_discount']."', `car_check_total`='".$data['car_check_total']."' , `registration_book` =  '".$data['registration_book']."', `car_check_remark` = '".$data['car_check_remark']."', `user_update` = '".$this->session->userdata('user_id')."' , `free_cancel`='".$data['free_cancel']."' , `check_pass`='".$data['check_pass']."' , `car_check_paid`='".$data['car_check_paid']."'  "
			." WHERE id = '".$data['inspecID']."'  ";
			 if($this->db->query($sql)){
					$returnVale['doDb']='1';
					$returnVale['taxDb']='update';
					$returnVale['inspecID']=$data['inspecID'];
				}else{
					$returnVale['inspecID']='no update';
				}
		 	}
		  $returnVale['sqlinspec']=$sql;
		  $returnVale['inspecworkID']=$data['workID'];
		 }
		  //----end if carcheck--------act_discount-//
		  //---- if act---------// 
		  //if($data['act_price_total']!=''){
		    if(!isset($data['act_no'])){ $data['act_no']==''; }
			if(!isset($data['act_discount'])){ $data['act_discount']='0'; }
			if(!isset($data['act_cancel_no'])){ $data['act_cancel_no']=''; }
			if(!isset($data['act_cancel_date'])){ $data['act_cancel_date']=''; }
			if(!isset($data['act_cancel_reason'])){ $data['act_cancel_reason']=''; }
			if(!isset($data['act_remark'])){ $data['act_remark']==''; }
			if(!isset($data['act_payment_duedate'])){ $data['act_payment_duedate']=''; }
			if(!isset($data['act_payment_remark'])){ $data['act_payment_remark']=''; }
			if(!isset($data['act_date_notify'])){ $data['act_date_notify']=''; }
			if(!isset($data['back_act_remark'])){ $data['back_act_remark']=''; }
			if(!isset($data['act_remark'])){ $data['act_remark']=''; }
			if(!isset($data['actID'])){ $data['actID']=''; }
			if(!isset($data['act_paid'])){ $data['act_paid']='0'; }
		$data['act_date_start'] =  $this->translateDateToEng($data['act_date_start']);
		$data['act_date_end']   =  $this->translateDateToEng($data['act_date_end']);
		$data['act_date_notify'] =  $this->translateDateToEng($data['act_date_notify']);
		$data['act_cancel_date'] =  $this->translateDateToEng($data['act_cancel_date']);
		$data['act_payment_duedate'] =  $this->translateDateToEng($data['act_payment_duedate']);
		$data['back_act_notify_date'] =  $this->translateDateToEng($data['back_act_notify_date']);
		$data['back_act_recieve_date'] =  $this->translateDateToEng($data['back_act_recieve_date']);
		$data['act_paid_day'] =  $this->translateDateToEng($data['act_paid_day']);
		$data['act_tax'] =$this->removeComma($data['act_tax']); 
		$data['act_price'] =$this->removeComma($data['act_price']); 
		$data['act_discount'] =$this->removeComma($data['act_discount']); 
		$data['act_price_total'] =$this->removeComma($data['act_price_total']); 
		$data['act_price_net'] =$this->removeComma($data['act_price_net']); 
		$data['act_vat'] =$this->removeComma($data['act_vat']); 
		$data['act_tax'] =$this->removeComma($data['act_tax']); 
		 if(!isset($data['act_follow'])){ $data['act_follow']=0;}
		 if(!isset($data['act_recieve'])){ $data['act_recieve']=0;}
		 if(!isset($data['deduct_percent'])){ $data['deduct_percent']=0;}
		 if(!isset($data['other_paid'])){ $data['other_paid']=0;}
		 // , `deduct_percent` = '".$data['deduct_percent']."' date_tax_work
				if($data['actID']==''){
						$sql="INSERT INTO `tbl_car_act_data` (`id`, `date_work`, `work_id`, `agent_id`, `code_id`, `act_no`, `corp_id`, `act_type_id`, `act_date_start`, `act_date_end`, `act_date_notify` "
						 .", `act_follow`, `act_recieve`, `act_price`, `act_discount`, `act_tax`, `act_vat`, `act_price_net`, `act_price_total`, `act_price_total_full` "
						 . ", `act_cancel_no`, `act_cancel_date`, `act_cancel_reason`, `act_remark`, `act_paid`, `act_payment_duedate`, `act_payment_remark`, `back_act_notify_date`, `back_act_recieve_date`, `back_act_no`, `back_act_remark`, `user_update`, `act_paid_day`, `deduct_percent`, `other_paid`) "
						 ." VALUES "
						 ."('', '".$date_work."', '".$data['workID']."', '".$data['actagentID']."', '".$data['code_id']."', '".$data['act_no']."', '".$data['corp_id']."', '".$data['act_type_id']."', '".$data['act_date_start']."', '".$data['act_date_end']."', '".$data['act_date_notify']."' "
						 .", '".$data['act_follow']."', '".$data['act_recieve']."', '".$data['act_price']."', '".$data['act_discount']."', '".$data['act_tax']."', '".$data['act_vat']."', '".$data['act_price_net']."', '".$data['act_price_total']."' , '".$data['act_price_total_full']."' "
						 .", '".$data['act_cancel_no']."', '".$data['act_cancel_date']."', '".$data['act_cancel_reason']."', '".$data['act_remark']."', '".$data['act_paid']."', '".$data['act_payment_duedate']."', '".$data['act_payment_remark']."', '".$data['back_act_notify_date']."', '".$data['back_act_recieve_date']."', '".$data['back_act_no']."', '".$data['back_act_remark']."' , '".$this->session->userdata('user_id')."' , '".$data['act_paid_day']."', '".$data['deduct_percent']."', '".$data['other_paid']."'  ) ";
						if($this->db->query($sql)){
							$returnVale['doDb']='1';
							$returnVale['actDb']='insert';
							$returnVale['actID']=$this->db->insert_id();
						}else{
							$returnVale['actID']='no insert';
						}
				}else{
					 $sql="UPDATE tbl_car_act_data SET "
						 ." `agent_id` = '".$data['actagentID']."' , `code_id` = '".$data['code_id']."' , `act_no` = '".$data['act_no']."' , `corp_id` = '".$data['corp_id']."' , `act_type_id`='".$data['act_type_id']."' , `act_date_start`='".$data['act_date_start']."', `act_date_end` = '".$data['act_date_end']."' , `act_date_notify` = '".$data['act_date_notify']."' "
						 ." , `act_follow` = '".$data['act_follow']."' , `act_recieve` = '".$data['act_recieve']."' , `act_price` = '".$data['act_price']."' , `act_discount` = '".$data['act_discount']."' , `act_tax` = '".$data['act_tax']."' , `act_vat` =  '".$data['act_vat']."' , `act_price_net` = '".$data['act_price_net']."' , `act_price_total` = '".$data['act_price_total']."', `act_price_total_full` = '".$data['act_price_total_full']."' "
						 . ", `act_cancel_no` = '".$data['act_cancel_no']."' , `act_cancel_date` = '".$data['act_cancel_date']."' , `act_cancel_reason` = '".$data['act_cancel_reason']."', `act_remark` = '".$data['act_remark']."' , `act_paid` = '".$data['act_paid']."' , `act_payment_duedate` = '".$data['act_payment_duedate']."' , `act_payment_remark` = '".$data['act_payment_remark']."' , `back_act_notify_date` = '".$data['back_act_notify_date']."' , `back_act_recieve_date` = '".$data['back_act_recieve_date']."', `back_act_no` =  '".$data['back_act_no']."' , `back_act_remark` =  '".$data['back_act_remark']."' , `user_update`='".$this->session->userdata('user_id')."' , `act_paid_day` ='".$data['act_paid_day']."'   , `deduct_percent`='".$data['deduct_percent']."' , `other_paid` ='".$data['other_paid']."'   " 
						 ." WHERE id = '".$data['actID']."'  ";
						if($this->db->query($sql)){
							$returnVale['doDb']='1';
							$returnVale['actDb']='update';
							$returnVale['actID']=$data['actID'];
						}else{
							$returnVale['actID']='no update';
						}
				}
			   $returnVale['sqlAct']=$sql;
		 		//$returnVale['actWorkID']=$data['actWorkID'];
		 		$returnVale['actWorkID']=$data['workID'];
		  //}
		  //----end if carcheck---------//act_remark 
		  //---- if tax---------// 
		 	//if($data['tax_price']!=''){
			 $date_work = date("Y-m-d");
				 $data['tax_price'] =$this->removeComma($data['tax_price']); 
				 $data['tax_recall'] =$this->removeComma($data['tax_recall']); 
				 $data['tax_pay_date'] =  $this->translateDateToEng($data['tax_pay_date']);
				 $data['date_registration_end'] =  $this->translateDateToEng($data['date_registration_end']);
				 $data['date_registration_start']='';
				 if(!isset($data['have_manual'])){ $data['have_manual']=0;}
				 if(!isset($data['do_register'])){ $data['do_register']=0;}
				 if(!isset($data['tax_paid'])){ $data['tax_paid']=0;}
				 if($data['taxID']==''){
					  $sql="INSERT INTO `tbl_car_tax_data` (`id`, `date_tax_work`, `work_id`, `date_registration_start`, `date_registration_end`, `have_manual`, `do_register`, `tax_price`, `tax_recall`, `tax_pay_date`, `tax_remark`, `do_tax`, `user_update`, `tax_paid`, `tax_service`) "
						  ." VALUES "
						  ." ('', '".$date_work."', '".$data['workID']."', '".$data['date_registration_start']."', '".$data['date_registration_end']."', '".$data['have_manual']."', '".$data['do_register']."', '".$data['tax_price']."', '".$data['tax_recall']."', '".$data['tax_pay_date']."', '".$data['tax_remark']."', '0' , '".$this->session->userdata('user_id')."', '".$data['tax_paid']."', '".$data['tax_service']."') ";
						if($this->db->query($sql)){ 
							$returnVale['doDb']='1';
							$returnVale['taxDb']='insert';
							$returnVale['taxID']=$this->db->insert_id();
						}else{
							$returnVale['taxID']='no insert';
						}
				 }else{
					 $sql="UPDATE tbl_car_tax_data SET  `date_registration_end` = '".$data['date_registration_end']."' , `have_manual` = '".$data['have_manual']."', `do_register` = '".$data['do_register']."', `tax_price`='".$data['tax_price']."', `tax_recall`='".$data['tax_recall']."' , `tax_pay_date` =  '".$data['tax_pay_date']."' , `tax_remark`='".$data['tax_remark']."' , `user_update`= '".$this->session->userdata('user_id')."'  , `tax_paid`='".$data['tax_paid']."' , `tax_service`='".$data['tax_service']."' "
						 ." WHERE id = '".$data['taxID']."' ";
					 if($this->db->query($sql)){
							$returnVale['doDb']='1';
							$returnVale['taxDb']='update';
							$returnVale['taxID']=$data['taxID'];
						}else{
							$returnVale['taxID']='no update';
						}
				 }
				$returnVale['sqlTax']=$sql;
		 	    //$returnVale['taxWorkID']=$data['taxWorkID'];
		 	    $returnVale['taxWorkID']=$data['workID'];
			//}
		 	 //---- end if tax---------// 
		  //----  if service---------// 
		if($data['service_other_price']!=''){ 
		 $data['car_check_price_service'] =$this->removeComma($data['car_check_price_service']); 
		 $data['service_other_price'] =$this->removeComma($data['service_other_price']);
		  if($data['service_id']==''){ 
			  $sql="INSERT INTO `tbl_car_service` (`id`, `work_id`, `car_check_price_service`, `service_other_price`, `service_remark`, `user_update`) VALUES ('', '".$data['workID']."', '".$data['car_check_price_service']."', '".$data['service_other_price']."', '".$data['service_remark']."', '".$this->session->userdata('user_id')."');";
			   if($this->db->query($sql)){
					$returnVale['doDb']='1';
					$returnVale['taxDb']='insert';
					$returnVale['service_id']=$this->db->insert_id();
				}else{
					$returnVale['service_id']='no insert';
				}
		  }else{
			   $sql=" UPDATE tbl_car_service SET `car_check_price_service`='".$data['car_check_price_service']."', `service_other_price` = '".$data['service_other_price']."', `service_remark` = '".$data['service_remark']."' , `user_update` = '".$this->session->userdata('user_id')."' "
				   ." WHERE id = '".$data['service_id']."' ";
			   if($this->db->query($sql)){
					$returnVale['doDb']='1';
					$returnVale['taxDb']='update';
					$returnVale['service_id']=$data['service_id'];
				   	$returnVale['serviceworkID']=$data['workID'];
				}else{
					$returnVale['serviceworkID']='no update';
				}
		  }
		  $returnVale['sqlService']=$sql;
		}
		  //---- end if serivice---------// is_corporation
		  return $returnVale;	 
	 }
	//----------------------------------SaveCarCheck
	 function SaveCarCheck($data){
		 $returnVale = array();		
		 $data['car_check_date'] =$this->translateDateToEng($data['car_check_date']); 
		 //$data['car_check_date'] = $data['car_check_date']." ".$data['car_check_time'].":00";
		 $data['car_check_price'] =$this->removeComma($data['car_check_price']); 
		 $data['car_check_discount'] =$this->removeComma($data['car_check_discount']); 
		 $data['car_check_total'] =$this->removeComma($data['car_check_total']); 
		 if(!isset($data['free_cancel'])){ $data['free_cancel']=0; }
		 if(!isset($data['registration_book'])){ $data['registration_book']=0; }
		 if(!isset($data['check_pass'])){ $data['check_pass']=0; }
		 if(!isset($data['car_check_paid'])){ $data['car_check_paid']=0; }
		 $data['car_check_time']  = $data['hr'].":".$data['minute'].":".$data['second'];
		 if($data['inspecID']==''){
			 $sql="INSERT INTO `tbl_car_check` (`id`, `car_type`, `work_id`, `car_check_date`, `car_check_time`, `car_check_price`, `car_check_discount`, `car_check_total`, `registration_book`, `car_check_remark`, `user_update`, `free_cancel`, `check_pass`, `car_check_paid`) VALUES ('', '".$data['car_type']."', '".$data['inspecworkID']."', '".$data['car_check_date']."', '".$data['car_check_time']."',  '".$data['car_check_price']."' , '".$data['car_check_discount']."'  ,   '".$data['car_check_total']."' , '".$data['registration_book']."', '".$data['car_check_remark']."'  , '".$this->session->userdata('user_id')."', '".$data['free_cancel']."', '".$data['check_pass']."', '".$data['car_check_paid']."') ";
			  if($this->db->query($sql)){
					$returnVale['doDb']='1';
					$returnVale['taxDb']='insert';
					$returnVale['inspecID']=$this->db->insert_id();
				}else{
					$returnVale['inspecID']='no insert';
				}
		 }else{
			$sql=" UPDATE  tbl_car_check SET   `car_type` ='".$data['car_type']."', `car_check_date` = '".$data['car_check_date']."', `car_check_time`='".$data['car_check_time']."' , `car_check_price` = '".$data['car_check_price']."' , `car_check_discount` = '".$data['car_check_discount']."', `car_check_total`='".$data['car_check_total']."' , `registration_book` =  '".$data['registration_book']."', `car_check_remark` = '".$data['car_check_remark']."', `user_update` = '".$this->session->userdata('user_id')."' , `free_cancel`='".$data['free_cancel']."' , `check_pass`='".$data['check_pass']."' , `car_check_paid`='".$data['car_check_paid']."'  "
			." WHERE id = '".$data['inspecID']."'  ";
			 if($this->db->query($sql)){
					$returnVale['doDb']='1';
					$returnVale['taxDb']='update';
					$returnVale['inspecID']=$data['inspecID'];
				}else{
					$returnVale['inspecID']='no update';
				}
		 }
		  $returnVale['sql']=$sql;
		  $returnVale['inspecworkID']=$data['inspecworkID'];
		 return $returnVale;
	 }
	//---------------------------------- 
	 function SaveIns($data){
		 $date_work = date("Y-m-d");
		 $returnVale=array();
		 $returnVale['doDb']='0';
		 $returnVale['actDb']='x';
		 $data['insurance_price'] =$this->removeComma($data['insurance_price']); 
		 $data['insurance_discount'] =$this->removeComma($data['insurance_discount']); 
		 $data['insurance_duty'] =$this->removeComma($data['insurance_duty']); 
		 $data['insurance_tax'] =$this->removeComma($data['insurance_tax']); 
		 $data['insurance_total_net'] =$this->removeComma($data['insurance_total_net']); 
		 $data['insurance_total'] =$this->removeComma($data['insurance_total']); 
		 $data['sum_insured'] =$this->removeComma($data['sum_insured']); 
		 $data['insurance_date_contract'] =$this->translateDateToEng($data['insurance_date_contract']); 
		 $data['insurance_start'] =$this->translateDateToEng($data['insurance_start']); 
		 $data['insurance_end'] =$this->translateDateToEng($data['insurance_end']); 
		 $data['ins_cancel_date'] =$this->translateDateToEng($data['ins_cancel_date']); 
		 $data['paid_date'] =$this->translateDateToEng($data['paid_date']); 
		 $data['payment_due_date'] =$this->translateDateToEng($data['payment_due_date']); 
		 $data['date_insurance_notifi_endorse'] =$this->translateDateToEng($data['date_insurance_notifi_endorse']); 
		 $data['date_insurance_document_endorse'] =$this->translateDateToEng($data['date_insurance_document_endorse']); 
		 $data['date_send_document'] =$this->translateDateToEng($data['date_send_document']); 
		 $data['job_notification_date'] = '0000-00-00'; 
		 $data['work_ins_type'] = '0'; 
		 $data['ins_follow'] = '0'; 
		 if($data['insID']==''){
			 $sql="INSERT INTO `tbl_car_insurance_data` (`id`, `ins_date_work`, `work_id`, `agent_id`, `ins_code_id`, `insurance_no`, `insurance_date_contract`, `insurance_start`, `insurance_end` "
				 .", `insurance_corp_id`, `insurance_type_id`, `insurance_fix_garace`, `insurance_renew`, `followDocIns`, `ins_data_status` "
				 .",`sum_insured`,`insurance_price`, `insurance_discount`, `insurance_duty`, `insurance_tax`, `insurance_total_net`, `insurance_total`, `ins_cancel_no`, `ins_cancel_date`, `ins_cancel_reason`, `insurance_remark`,`ins_paid` "
				 .", `paid_date`, `payment_due_date`, `date_insurance_notifi_endorse`, `date_insurance_document_endorse`, `insurance_number_endorse`, `insurance_remark_endorse`, `date_send_document`, `ins_paid_remark`, `user_update`, `dedug`) "
				 ." VALUES "
				 ."('', '".$date_work."', '".$data['insWorkID']."', '0', '0', '".$data['insurance_no']."', '".$data['insurance_date_contract']."', '".$data['insurance_start']."', '".$data['insurance_end']."' "
				 .", '".$data['insurance_corp_id']."', '".$data['insurance_type_id']."', '".$data['insurance_fix_garace']."', '".$data['insurance_renew']."', '".$data['followDocIns']."', '1' "
				 .", '".$data['sum_insured']."', '".$data['insurance_price']."', '".$data['insurance_discount']."', '".$data['insurance_duty']."', '".$data['insurance_tax']."', '".$data['insurance_total_net']."', '".$data['insurance_total']."', '".$data['ins_cancel_no']."', '".$data['ins_cancel_date']."', '".$data['ins_cancel_reason']."', '".$data['insurance_remark']."', '".$data['ins_paid']."' "
				 .", '".$data['paid_date']."', '".$data['payment_due_date']."', '".$data['date_insurance_notifi_endorse']."', '".$data['date_insurance_document_endorse']."', '".$data['insurance_number_endorse']."', '".$data['insurance_remark_endorse']."', '".$data['date_send_document']."', '".$data['ins_paid_remark']."','".$this->session->userdata('user_id')."', '".$data['dedug']."');"
				 ."";
			 if($this->db->query($sql)){
					$returnVale['doDb']='1';
					$returnVale['taxDb']='insert';
					$returnVale['insID']=$this->db->insert_id();
				}else{
					$returnVale['insID']='no insert';
				}
		 }else{  // back_act_remark 
			 $sql=" UPDATE tbl_car_insurance_data SET `insurance_no` = '".$data['insurance_no']."', `insurance_date_contract` = '".$data['insurance_date_contract']."' , `insurance_start` = '".$data['insurance_start']."', `insurance_end` = '".$data['insurance_end']."'   "
				 .", `insurance_corp_id` = '".$data['insurance_corp_id']."', `insurance_type_id`='".$data['insurance_type_id']."', `insurance_fix_garace`='".$data['insurance_fix_garace']."', `insurance_renew`='".$data['insurance_renew']."', `followDocIns`='".$data['followDocIns']."' "
				  .",`insurance_price` = '".$data['insurance_price']."', `insurance_discount` ='".$data['insurance_discount']."' , `insurance_duty` = '".$data['insurance_duty']."', `insurance_tax` = '".$data['insurance_tax']."', `insurance_total_net` = '".$data['insurance_total_net']."', `insurance_total` = '".$data['insurance_total']."', `ins_cancel_no` = '".$data['ins_cancel_no']."', `ins_cancel_date` = '".$data['ins_cancel_date']."' , `ins_cancel_reason` = '".$data['ins_cancel_reason']."', `insurance_remark` ='".$data['insurance_remark']."', `ins_paid` ='".$data['ins_paid']."' "
				  .", `paid_date` = '".$data['paid_date']."', `payment_due_date` = '".$data['payment_due_date']."', `date_insurance_notifi_endorse` = '".$data['date_insurance_notifi_endorse']."', `date_insurance_document_endorse` = '".$data['date_insurance_document_endorse']."', `insurance_number_endorse` = '".$data['insurance_number_endorse']."' , `insurance_remark_endorse` ='".$data['insurance_remark_endorse']."' , `date_send_document` ='".$data['date_send_document']."', `ins_paid_remark` ='".$data['ins_paid_remark']."' , `dedug`='".$data['dedug']."' , `user_update` = '".$this->session->userdata('user_id')."' , `sum_insured` ='".$data['sum_insured']."' "
				 ." WHERE id = '".$data['insID']."' ";
			 if($this->db->query($sql)){
					$returnVale['doDb']='1';
					$returnVale['taxDb']='update';
					$returnVale['insID']=$data['insID'];
				}else{
					$returnVale['insID']='no update';
				}
		 }
		  $returnVale['sql']=$sql;
		  $returnVale['insWorkID']=$data['insWorkID'];
	     return $returnVale;	 
	 }
	//---------------------------------- 
	 function SaveTax($data){
     $date_work = date("Y-m-d");
	 $returnVale=array();
     $returnVale['doDb']='0';
	 $returnVale['actDb']='x';
		 $data['tax_price'] =$this->removeComma($data['tax_price']); 
		 $data['tax_recall'] =$this->removeComma($data['tax_recall']); 
		 $data['tax_pay_date'] =  $this->translateDateToEng($data['tax_pay_date']);
		 $data['date_registration_end'] =  $this->translateDateToEng($data['date_registration_end']);
		 $data['date_registration_start']='';
		 if(!isset($data['have_manual'])){ $data['have_manual']=0;}
		 if(!isset($data['do_register'])){ $data['do_register']=0;}
		 if(!isset($data['tax_paid'])){ $data['tax_paid']=0;}
		 if($data['taxID']==''){
			  $sql="INSERT INTO `tbl_car_tax_data` (`id`, `date_tax_work`, `work_id`, `date_registration_start`, `date_registration_end`, `have_manual`, `do_register`, `tax_price`, `tax_recall`, `tax_pay_date`, `tax_remark`, `do_tax`, `user_update`, `tax_paid`) "
				  ." VALUES "
				  ." ('', '".$date_work."', '".$data['taxWorkID']."', '".$data['date_registration_start']."', '".$data['date_registration_end']."', '".$data['have_manual']."', '".$data['do_register']."', '".$data['tax_price']."', '".$data['tax_recall']."', '".$data['tax_pay_date']."', '".$data['tax_remark']."', '0' , '".$this->session->userdata('user_id')."', '".$data['tax_paid']."') ";
				if($this->db->query($sql)){ 
					$returnVale['doDb']='1';
					$returnVale['taxDb']='insert';
					$returnVale['taxID']=$this->db->insert_id();
				}else{
					$returnVale['actID']='no insert';
				}
		 }else{
			 $sql="UPDATE tbl_car_tax_data SET  `date_registration_end` = '".$data['date_registration_end']."' , `have_manual` = '".$data['have_manual']."', `do_register` = '".$data['do_register']."', `tax_price`='".$data['tax_price']."', `tax_recall`='".$data['tax_recall']."' , `tax_pay_date` =  '".$data['tax_pay_date']."' , `tax_remark`='".$data['tax_remark']."' , `user_update`= '".$this->session->userdata('user_id')."'  , `tax_paid`='".$data['tax_paid']."'  "
				 ." WHERE id = '".$data['taxID']."' ";
			 if($this->db->query($sql)){
					$returnVale['doDb']='1';
					$returnVale['taxDb']='update';
					$returnVale['taxID']=$data['taxID'];
				}else{
					$returnVale['actID']='no update';
				}
		 }
		 $returnVale['sql']=$sql;
		 $returnVale['taxWorkID']=$data['taxWorkID'];
	  return $returnVale;	 
	 }
	//---------------------------------- 
	 function saveCompulsory($data){
	 $returnVale =array(); 
     $date_work = date("Y-m-d");
	if(!isset($data['act_no'])){ $data['act_no']==''; }
	if(!isset($data['act_discount'])){ $data['act_discount']='0'; }
	if(!isset($data['act_cancel_no'])){ $data['act_cancel_no']=''; }
	if(!isset($data['act_cancel_date'])){ $data['act_cancel_date']=''; }
	if(!isset($data['act_cancel_reason'])){ $data['act_cancel_reason']=''; }
	if(!isset($data['act_remark'])){ $data['act_remark']==''; }
	if(!isset($data['act_payment_duedate'])){ $data['act_payment_duedate']=''; }
	if(!isset($data['act_payment_remark'])){ $data['act_payment_remark']=''; }
	if(!isset($data['act_date_notify'])){ $data['act_date_notify']=''; }
	if(!isset($data['back_act_remark'])){ $data['back_act_remark']=''; }
	if(!isset($data['act_remark'])){ $data['act_remark']=''; }
	if(!isset($data['actID'])){ $data['actID']=''; }
	if(!isset($data['act_paid'])){ $data['act_paid']='0'; }
    $returnVale=array();
    $returnVale['doDb']='0';
	$returnVale['actDb']='x';
		$data['act_date_start'] =  $this->translateDateToEng($data['act_date_start']);
		$data['act_date_end']   =  $this->translateDateToEng($data['act_date_end']);
		$data['act_date_notify'] =  $this->translateDateToEng($data['act_date_notify']);
		$data['act_cancel_date'] =  $this->translateDateToEng($data['act_cancel_date']);
		$data['act_payment_duedate'] =  $this->translateDateToEng($data['act_payment_duedate']);
		$data['back_act_notify_date'] =  $this->translateDateToEng($data['back_act_notify_date']);
		$data['back_act_recieve_date'] =  $this->translateDateToEng($data['back_act_recieve_date']);
		$data['act_paid_day'] =  $this->translateDateToEng($data['act_paid_day']);
		$data['act_tax'] =$this->removeComma($data['act_tax']); 
		$data['act_price'] =$this->removeComma($data['act_price']); 
		$data['act_discount'] =$this->removeComma($data['act_discount']); 
		$data['act_price_total'] =$this->removeComma($data['act_price_total']); 
		$data['act_price_net'] =$this->removeComma($data['act_price_net']); 
		$data['act_vat'] =$this->removeComma($data['act_vat']); 
		$data['act_tax'] =$this->removeComma($data['act_tax']); 
		 if(!isset($data['act_follow'])){ $data['act_follow']=0;}
		 if(!isset($data['act_recieve'])){ $data['act_recieve']=0;}
		 if(!isset($data['deduct_percent'])){ $data['deduct_percent']=0;}
		 if(!isset($data['other_paid'])){ $data['other_paid']=0;}
		 // , `deduct_percent` = '".$data['deduct_percent']."' 
	if($data['actID']==''){
			$sql="INSERT INTO `tbl_car_act_data` (`id`, `date_work`, `work_id`, `agent_id`, `code_id`, `act_no`, `corp_id`, `act_type_id`, `act_date_start`, `act_date_end`, `act_date_notify` "
			 .", `act_follow`, `act_recieve`, `act_price`, `act_discount`, `act_tax`, `act_vat`, `act_price_net`, `act_price_total` "
			 . ", `act_cancel_no`, `act_cancel_date`, `act_cancel_reason`, `act_remark`, `act_paid`, `act_payment_duedate`, `act_payment_remark`, `back_act_notify_date`, `back_act_recieve_date`, `back_act_no`, `back_act_remark`, `user_update`, `act_paid_day`, `deduct_percent`, `other_paid`) "
			 ." VALUES "
			 ."('', '".$date_work."', '".$data['actWorkID']."', '".$data['actagentID']."', '".$data['code_id']."', '".$data['act_no']."', '".$data['corp_id']."', '".$data['act_type_id']."', '".$data['act_date_start']."', '".$data['act_date_end']."', '".$data['act_date_notify']."' "
			 .", '".$data['act_follow']."', '".$data['act_recieve']."', '".$data['act_price']."', '".$data['act_discount']."', '".$data['act_tax']."', '".$data['act_vat']."', '".$data['act_price_net']."', '".$data['act_price_total']."' "
			 .", '".$data['act_cancel_no']."', '".$data['act_cancel_date']."', '".$data['act_cancel_reason']."', '".$data['act_remark']."', '".$data['act_paid']."', '".$data['act_payment_duedate']."', '".$data['act_payment_remark']."', '".$data['back_act_notify_date']."', '".$data['back_act_recieve_date']."', '".$data['back_act_no']."', '".$data['back_act_remark']."' , '".$this->session->userdata('user_id')."' , '".$data['act_paid_day']."', '".$data['deduct_percent']."', '".$data['other_paid']."'  ) ";
			if($this->db->query($sql)){
				$returnVale['doDb']='1';
				$returnVale['actDb']='insert';
				$returnVale['actID']=$this->db->insert_id();
			}else{
				$returnVale['actID']='no insert';
			}
	}else{
		 $sql="UPDATE tbl_car_act_data SET "
			 ." `agent_id` = '".$data['actagentID']."' , `code_id` = '".$data['code_id']."' , `act_no` = '".$data['act_no']."' , `corp_id` = '".$data['corp_id']."' , `act_type_id`='".$data['act_type_id']."' , `act_date_start`='".$data['act_date_start']."', `act_date_end` = '".$data['act_date_end']."' , `act_date_notify` = '".$data['act_date_notify']."' "
			 ." , `act_follow` = '".$data['act_follow']."' , `act_recieve` = '".$data['act_recieve']."' , `act_price` = '".$data['act_price']."' , `act_discount` = '".$data['act_discount']."' , `act_tax` = '".$data['act_tax']."' , `act_vat` =  '".$data['act_vat']."' , `act_price_net` = '".$data['act_price_net']."' , `act_price_total` = '".$data['act_price_total']."' "
			 . ", `act_cancel_no` = '".$data['act_cancel_no']."' , `act_cancel_date` = '".$data['act_cancel_date']."' , `act_cancel_reason` = '".$data['act_cancel_reason']."', `act_remark` = '".$data['act_remark']."' , `act_paid` = '".$data['act_paid']."' , `act_payment_duedate` = '".$data['act_payment_duedate']."' , `act_payment_remark` = '".$data['act_payment_remark']."' , `back_act_notify_date` = '".$data['back_act_notify_date']."' , `back_act_recieve_date` = '".$data['back_act_recieve_date']."', `back_act_no` =  '".$data['back_act_no']."' , `back_act_remark` =  '".$data['back_act_remark']."' , `user_update`='".$this->session->userdata('user_id')."' , `act_paid_day` ='".$data['act_paid_day']."'   , `deduct_percent`='".$data['deduct_percent']."' , `other_paid` ='".$data['other_paid']."'   " 
			 ." WHERE id = '".$data['actID']."'  ";
			if($this->db->query($sql)){
				$returnVale['doDb']='1';
				$returnVale['actDb']='update';
				$returnVale['actID']=$data['actID'];
			}else{
				$returnVale['actID']='no update';
			}
	}	 
		 $returnVale['sql']=$sql;
		 $returnVale['actWorkID']=$data['actWorkID'];
	  return $returnVale;	 
  }
	//----------------------------------   ins_date_work
	 function updateWorkData($data){
		 $returnValue = 0;
		 $data['ins_date_work'] = $this->translateDateToEng($data['ins_date_work']);
		 $sql="UPDATE tbl_work_data SET cust_id   = '".$data['custID']."'  , agent_id ='".$data['agent_id']."' , car_id ='".$data['carID']."' , date_add = '".$data['ins_date_work']."' WHERE id = '".$data['workID']."' ";
		 if($this->db->query($sql)){
			$returnValue = 1; 
		 }
		 return $returnValue;
	 }
	//---------------------------------- 
	 function getInspectDetail($workID){
		 $sql="SELECT * FROM tbl_car_check WHERE work_id = '".$workID."'  ";
		 $resultData = $this->db->query($sql)->result();
		 foreach($resultData AS $data);
		 if(!isset($data->id)){
			 return "x";
		 }else{
			  return $data;
		 }
	 }	
	 //---------------------------------- 
	 function getWorkDetail($workID){
		 $sql="SELECT * FROM tbl_work_data WHERE id = '".$workID."'  ";
		 $resultData = $this->db->query($sql)->result();
		 foreach($resultData AS $data);
		 if(!isset($data->id)){
			 return "x";
		 }else{
			  return $data;
		 }
	 }
	//---------------------------------- 
	 function getCustDetail($custID){
		 $sql="SELECT * FROM tbl_customer_data WHERE id = '".$custID."' ";
		 $resultData =$this->db->query($sql)->result();
		 foreach($resultData AS $data);
		 return $data;
	 }
	//----------------------------------car_type_id
	 function addCar($data){
		 $dateAdd = date("Y-m-d");
		 $returnVale=array();
		 $returnVale['doDb']='0';
		 $returnVale['carID']=0;
		 if($data['carID']==''){
			 $sql="INSERT INTO `tbl_car_data` (`id`, `cust_id`, `vehicle_regis`, `province_regis`, `date_regist`, `year_car`, `vin_no`, `engine_size`, `car_brand`, `car_model`, `car_type_id`, `date_add`, `car_status`, `user_update`) "
			 ." VALUES "
			 ." ('', '".$data['custID']."', '".$data['vehicle_regis']."',  '".$data['province_regis']."' , '".$data['date_regist']."', '".$data['year_car']."', '".$data['vin_no']."', '".$data['engine_size']."', '".$data['car_brand']."', '".$data['car_model']."', '".$data['car_type_id']."', '".$dateAdd."', '1', '".$this->session->userdata('user_id')."'); ";
		  if($this->db->query($sql)){
			 $returnVale['doDb']='1';
			 $returnVale['carID']=$this->db->insert_id();
		   }
		 }else{
			$sql="UPDATE tbl_car_data SET  `vehicle_regis` = '".$data['vehicle_regis']."' , `province_regis` = '".$data['province_regis']."' , `date_regist` = '".$data['date_regist']."' , `year_car` = '".$data['year_car']."' , `vin_no` = '".$data['vin_no']."' , `engine_size` = '".$data['engine_size']."' , `car_brand` = '".$data['car_brand']."' , `car_model` = '".$data['car_model']."' , `car_type_id` = '".$data['car_type_id']."' , `user_update` = '".$this->session->userdata('user_id')."' WHERE id = '".$data['carID']."' ";
			   if($this->db->query($sql)){
			 $returnVale['doDb']='1';
			 $returnVale['carID']=$data['carID'];
		   }
		 }
		 $returnVale['sql']=$sql;
		 return $returnVale;
	 }
	//----------------------------------
	 function carDetail($carID){
		$data=array();
		$sql="SELECT a.* , b.province_name  FROM tbl_car_data AS a "
			 ." LEFT JOIN tbl_province AS b ON a.province_regis =b.id "
			 ." WHERE a.id  = '".$carID."' ";
		 $resultData = $this->db->query($sql)->result();
		 foreach($resultData AS $carData);
		 return $carData;
	 }
	//----------------------------------
	 function listSearchCar($txtSearch,$custID){
		 $sql="SELECT a.* , b.province_name  FROM tbl_car_data AS a "
			 ." LEFT JOIN tbl_province AS b ON a.province_regis =b.id "
			 ." WHERE a.vehicle_regis LIKE '%".$txtSearch."%' AND a.cust_id  = '".$custID."' ORDER BY id DESC LIMIT 0,10 ";
		 $resultData = $this->db->query($sql)->result();
		 return $resultData;
	 }
	//----------------------------------
	 function listSearchCust($txtSearch){
			$sql = "SELECT * FROM tbl_customer_data WHERE cust_name LIKE '%".$txtSearch."%' ORDER BY id DESC LIMIT 0,10  ";
		    $resultData = $this->db->query($sql)->result();
		 	return $resultData;
	 }
	//----------------------------------
	 function listCarType(){
		 $sql="SELECT * FROM `tbl_car_type` ORDER BY `id` ASC";
		 $resultData = $this->db->query($sql)->result();
		 return $resultData;
	 }	
	 //----------------------------------
	 function listCarTypeForInsurance($dataStatus){
		 $sql="SELECT * FROM `tbl_insurance_car_type` WHERE type_status='".$dataStatus."' ORDER BY `id` ASC";
		 $resultData = $this->db->query($sql)->result();
		 return $resultData;
	 }	
	 //----------------------------------
	 function listCarTypeInsurancePremium($data){
		 $sql="SELECT * FROM tbl_insurance_car_type_premium WHERE tbl_car_type_id = '".$data['car_type_id']."' ";
		 $resultData = $this->db->query($sql)->result();
		 return $resultData;
	 } 
	 //----------------------------------
	 function CarTypeDetail($typeID){
		 $sql="SELECT * FROM `tbl_car_type`  WHERE id='".$typeID."' ";
		 $resultData = $this->db->query($sql)->result();
		 foreach($resultData AS $detail);
		 $returnVale =array();
		 $returnVale['type_name']=$detail->type_name;
		 $returnVale['type_id']=$detail->id;
		 return $returnVale;
	 }
	//----------------------------------
	 function addCustomer($data){
		 $dataAdd = date("Y-m-d"); 
		 $returnVale=array();
		 $returnVale['doDb']='0';
		 $sql="INSERT INTO `tbl_customer_data` (`id`, `cust_name`, `cust_nickname`, `cust_telephone_1`, `cust_telephone_2`, `is_corporation`, `user_update`, `cust_status`, `date_add`) VALUES ('', '".$data['cust_name']."', '".$data['cust_nickname']."', '".$data['cust_telephone_1']."', '".$data['cust_telephone_2']."', '".$data['is_corporation']."', '".$this->session->userdata('user_id')."', '1', '".$dataAdd."') ";
		 if($this->db->query($sql)){
			 $returnVale['doDb']='1';
			 $returnVale['custID']=$this->db->insert_id();
		 }
		 $returnVale['sql']=$sql;
		 return $returnVale;
	 }
	//----------------------------------
 }