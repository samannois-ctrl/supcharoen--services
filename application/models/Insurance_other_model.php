<?php
	 class Insurance_other_model extends CI_Model
 {
 
   function __construct()
    {
        parent::__construct();
    }
	//----------------------------------
	function getOtherID($selectType,$work_id){
		$returnValue = array();
		$returnValue['selectType'] = $selectType;
		$returnValue['work_id'] = $work_id;
		$returnValue['insuranceOtherID'] = 0;
		$returnValue['work_id'] = 0;
		
		switch($selectType){
			case "2" :
				$tbl="  tbl_insurance_travel_data ";
			break;
			case "3" :
				$tbl=" tbl_insurance_shpping_data ";
			break;
			case "4" :
				$tbl=" tbl_insurance_accident_data ";
			break;
			case "5" :
				$tbl=" tbl_insurance_home_data ";
			break;	
		}
		 $sql = "SELECT id , work_id FROM $tbl WHERE work_id = '".$work_id."' ";
			  $returnValue['sql']=$sql;
			  $result = $this->db->query($sql)->result();
			 
			  foreach($result AS $data){
				  $returnValue['insuranceOtherID'] = $data->id;
				  $returnValue['work_id']=$data->work_id;
			  }
		return $returnValue;
	}
	//----------------------------------
	function getOtherInsuranceTitle(){
		$returnValue = 	array("4"=>"ประกันอุบัติเหตุ","5"=>"ประกันอัคคีภัย","2"=>"ประกันท่องเที่ยว","3"=>"ประกันขนส่ง");
		return $returnValue;
	}
		 //----------------------------------
	 function translateDateToEng($date){
		if (!empty($date)) {
				$dateObject = DateTime::createFromFormat('d/m/Y', $date);
				if ($dateObject !== false) {
					$dateObject->modify('-543 years');
					$showDate = $dateObject->format('Y-m-d');
				} else {
					// Handle invalid date format
					$showDate = "0000-00-00";
				}
			} else {
				$showDate = "0000-00-00";
			}
		 return $showDate;
	 }	
	 function translateDateToThai2($date){
		 
		 if (!empty($date)) {
				$dateObject = DateTime::createFromFormat('Y-m-d', $date);
				if ($dateObject !== false) {
					$dateObject->modify('+543 years');
					$showDate = $dateObject->format('d/m/Y');
				} else {
					// Handle invalid date format
					$showDate = "0000-00-00";
				}
			} else {
				$showDate = "0000-00-00";
			}
		 
		 
		 return $showDate;
	 }
	  function translateDateToThai222($date){
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
	 function removeComma2($theValue){
		$NewValue = str_replace(",","",$theValue);
		return $NewValue;
  	}
	 //----------------------------
	 function getnerateKeyGroup2($length = 8) {
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

	//################################################################################################ 
		 
		
	//------------------------------ins_pay_type cash_collection_value,tran_collection_value ins_pay_type recieve_id
	function updateCashInsOtherPayment($data){
		 $returnValue=array();
		 $returnValue['Dodb']=0;
		 $returnValue['DodbMain'] =0;	
		 $returnValue['DodbRecord'] =0;
		  //-   
		 $payType = $data['ins_pay_type'];		
		 $bank_id = $data['ins_pay_bank_id'];		
		 $receipt_date = $this->translateDateToEng($data['receipt_date']);	
		 
		 if($data['amt_revieve']==""){ $data['amt_revieve']=0; }
		 $data['amt_revieve'] = $this->removeComma2($data['amt_revieve']);
		 $data['cash_collection_value'] = $this->removeComma2($data['cash_collection_value']);
		 $data['tran_collection_value'] = $this->removeComma2($data['tran_collection_value']);
		
		 switch($data['insType']){ //ins_pay_bank_id 
			case "2" :
				$tbl = " tbl_insurance_travel_data ";
			break;	
			 case "3" :
				$tbl = " tbl_insurance_shpping_data ";
			break;				 
		 	 case "4" :
				$tbl = " tbl_insurance_accident_data "; 
			 break;
			 case "5" :
				 $tbl = " tbl_insurance_home_data "; 
			 break;
		 }  
		
		
		
		$sql = "UPDATE  $tbl  SET ins_pay_type = '".$payType."' , ins_pay_bank_id = '".$bank_id."' , ins_receipt_date = '".$receipt_date."'  , ins_cash  ='".$data['cash_type']."' , amt_recieve_ins='".$data['amt_revieve']."' , cash_collection = '".$data['cash_collection_value']."' , tran_collection = '".$data['tran_collection_value']."'  WHERE id = '".$data['insWorkID']."'  ";	
		 if($this->db->query($sql)){
			  $returnValue['Dodb'] ='ok';
			 
			 //-------------set main insurance cash payment AND recieve_id---// amt_revieve
			 
			 /*if(!isset($data['recieve_id_carcheck'])){ $data['recieve_id_carcheck']=0; }
			 if(!isset($data['recieve_id_tax'])){ $data['recieve_id_tax']=0; }
			 if(!isset($data['recieve_id_act'])){ $data['recieve_id_act']=0; }*/
			 if(!isset($data['recieve_id_ins'])){ $data['recieve_id_ins']=0; }
			 
			 $sql="UPDATE tbl_insurance_data SET ins_pay_bank_id = '".$bank_id."' , ins_receipt_date = '".$receipt_date."' , ins_pay_type = '".$payType."', cash_collection_ins = '".$data['cash_collection_value']."' , tran_collection_ins = '".$data['tran_collection_value']."' , amt_recieve_ins='".$data['amt_revieve']."' "
				
				 ."  , recieve_id_ins= '".$data['recieve_id_ins']."' "
				 ." WHERE id = '".$data['insurance_id']."' ";
			 if($this->db->query($sql)){
			 	$returnValue['DodbMain'] ='ok';
			 }
			 
			 //----------update sumTotal Recieve---------//
			 if($data['insurance_id'] > 0){
				  //$sql="SELECT SUM(cash_collection_carcheck+cash_collection_tax+cash_collection_act+cash_collection_ins+tran_collection_carcheck+tran_collection_tax+tran_collection_act+tran_collection_ins+) ";
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
			 
		 }else{
			 $returnValue['Dodb'] ='Error';
		 }
		 
		
		 //$returnValue['sql']=$sql;
		 
		
		  return $returnValue;
		}
	}
		//----------------------------------
	/*function updateCashInsOtherPayment(){
		  $returnValue=array();
		  $returnValue['Dodb']=0;
		  $field = $data['field'];
		  if(($field=='amt_recieve_carcheck') ||($field=='amt_recieve_act') ||($field=='amt_recieve_ins')||($field=='amt_recieve_tax')){
			 $data['theValue'] = $this->removeComma2($data['theValue']);
		 }
		switch($data['insType']){ //update by insurance type
			  case "4" :
			  break;
		  }
		
		
		
		 //-   amt_recieve_tax amt_recieve_act amt_recieve_ins amt_recieve_tax
		 
		 $sql="UPDATE tbl_insurance_accident_data SET $field = '".$data['theValue']."' WHERE id = '".$data['insWorkID']."' ";
		 if($this->db->query($sql)){
			  $returnValue['Dodb'] ='ok';
		 }else{
			 $returnValue['Dodb'] ='Error';
		 }
		  $returnValue['sql']=$sql;
		  return $returnValue;
		
	 } */
	 //---
	//------------------------------insType
	 function UpdatePotherPayType($data){
		 $returnValue=array();
		 $returnValue['Dodb']=0;
		 $field = $data['field'];
		 //-   amt_recieve_tax amt_recieve_act amt_recieve_ins amt_recieve_tax
		 if(($field=='amt_recieve_carcheck') ||($field=='amt_recieve_act') ||($field=='amt_recieve_ins')||($field=='amt_recieve_tax')){
			 $data['theValue'] = $this->removeComma2($data['theValue']);
		 }
		  switch($data['insType']){ //update by insurance type
			case "2" :
				$tbl = " tbl_insurance_travel_data ";
			break;	
			case "3" :
				$tbl = " tbl_insurance_shpping_data ";
			break;				 
			case "4" : 
				 $tbl = " tbl_insurance_accident_data ";
			break;
			case "5" :
				 $tbl = " tbl_insurance_home_data ";  
			break;
		  }
		 
		  $sql="UPDATE $tbl SET $field = '".$data['theValue']."' WHERE id = '".$data['insWorkID']."' ";
		 if($this->db->query($sql)){
			  $returnValue['Dodb'] ='ok';
		 }else{
			 $returnValue['Dodb'] ='Error';
		 }
		  $returnValue['sql']=$sql;
		  return $returnValue;
	 }
	//------------------------------insType
		
	 function updateOtherAmountInstallment($data){
		  $returnValue=array();
		  $returnValue['DoDb']=0;
		  switch($data['insType']){
			case "2" :
				$tbl = " tbl_insurance_travel_data ";
			break;	
			case "3" :
				$tbl = " tbl_insurance_shpping_data ";
			break;				 
			case "4" :
				$tbl = " tbl_insurance_accident_data ";
			break;			
			case "5" :
				$tbl = " tbl_insurance_home_data ";
			break;	 
		
		 } 
		 
		  $data['amount_installment'] = $this->removeComma2($data['amount_installment']);
		  $sql="UPDATE $tbl SET amount_installment ='".$data['amount_installment']."'  WHERE id = '".$data['insWorkID']."'  ";
		  if($this->db->query($sql)){
				  $returnValue['DoDb']=1;
			}
		 $returnValue['sql']=$sql;
		 return $returnValue;
	 }
	//------------------------------insType
	function UpdateCashOtherDuedate($data){
		 $returnValue=array();
		 $returnValue['Dodb']=0;
		 
		 $cash_duedate = $this->translateDateToEng($data['cash_duedate']);

		 switch($data['insType']){
			case "2" :
				$tbl = " tbl_insurance_travel_data ";
			break;	
            case "3" :
				$tbl = " tbl_insurance_shpping_data ";
			break;				 
			case "4" :
				$tbl = " tbl_insurance_accident_data ";
			break;			
			case "5" :
				$tbl = " tbl_insurance_home_data ";
			break;	 
		
		 } 
		$sql="UPDATE $tbl SET cash_duedate = '".$cash_duedate."' , pay_cash_status = '".$data['pay_cash_status']."' WHERE id = '".$data['insWorkID']."'  ";

			 if($this->db->query($sql)){
				  $returnValue['Dodb'] ='1';
			 }else{
				 $returnValue['Dodb'] ='Error';
			 }
		//-------------------------------------------
		 //------update-main insurance_data
		 $returnValue['workID']=0;
		 $sql="SELECT work_id FROM $tbl WHERE id = '".$data['insWorkID']."'  ";
		 $result = $this->db->query($sql)->result();
		 foreach($result AS $dataS){
			  $returnValue['workID'] = $dataS->work_id;
		 }
		 //$getWorkId = $this->getOtherID($selectType,$work_id);
		 if($returnValue['workID']>0){
			  $sql="UPDATE tbl_insurance_data SET cash_duedate = '".$cash_duedate."' , pay_cash_status = '".$data['pay_cash_status']."'  WHERE id = '".$returnValue['workID']."'  ";
			  $this->db->query($sql);
		 }
		//-------------------------------------------
		
		 return $returnValue;
	}
	//------------------------------insType
	function updateOtherPaymentAmount($data){
		$returnValue =array();
		$returnValue['doDb']='0';
		$data['theValue'] = $this->removeComma2($data['theValue']);
		switch($data['insType']){
			case "2" :
				$tbl = " tbl_insurance_travel_data ";
			break;				
			case "3" :
				$tbl = " tbl_insurance_shpping_data ";
			break;				 
			case "4" :
				$tbl = " tbl_insurance_accident_data ";
			break;			
			case "5" :
				$tbl = " tbl_insurance_home_data ";
			break;
		}
		    $sql="UPDATE $tbl SET cash_payment_amount = '".$data['theValue']."' WHERE id = '".$data['insWorkID']."'  ";
					if($this->db->query($sql)){
					$returnValue['doDb']=1;
					$returnValue['sql']=$sql;
		 }
		 //------update-main insurance_data
		 $returnValue['workID']=0;
		 $sql="SELECT work_id FROM $tbl WHERE id = '".$data['insWorkID']."'  ";
		 $result = $this->db->query($sql)->result();
		 foreach($result AS $dataS){
			  $returnValue['workID'] = $dataS->work_id;
		 }
		 //$getWorkId = $this->getOtherID($selectType,$work_id);
		 if($returnValue['workID']>0){
			  $sql="UPDATE tbl_insurance_data SET payment_amount = '".$data['theValue']."' WHERE id = '".$returnValue['workID']."'  ";
			  $this->db->query($sql);
		 }
		 //---------------------
		 return $returnValue;
	}
	//------------------------------insType
	function DeleteInsuranceOther($data){
		$returnValue =array();
		$returnValue['doDb']='0';
		if($data['insType']=='pa'){
			$sql="UPDATE  tbl_insurance_accident_data SET data_status = '".$data['data_status']."' , remark_delete = '".$data['remark_delete']."' , user_delete ='".$this->session->userdata('user_id')."' , date_delete = now() WHERE id = '".$data['dataID']."' ";
		}

		
		 if($this->db->query($sql)){
			 $returnValue['doDb']=1;
		 }
		  return $returnValue;
	}
		 
		
	
	//-----------------------------payType
	function listInsOther($param){
		$returnValue =array();
		//$param['startDate'] = $this->translateDateToEng($param['startDate']);	
		//$param['endDate'] = $this->translateDateToEng($param['endDate']);	
		$returnValue['maxPeriod']=0;
		
		 $txtWherePayType="";
		if($param['payType'] > 0){
			  switch($param['payType']){
				  case "1" : 
					   $txtWherePayType= " HAVING countInstallment <= '1' ";
				  break;
				  case "2" :
					  $txtWherePayType= " HAVING countInstallment > '1' ";
				  break;
			  }
		 }
		
		if($param['selectMonth']!='all'){
			$txtWhereMonth = " AND MONTH(a.insurance_start) = '".$param['selectMonth']."' ";
		}else{
			$txtWhereMonth = " ";
		}
		
		
		switch($param['SelectType']){
			case "4" :
				$sql="SELECT a.* "
					." , b.recieve_warning , b.not_recieve_warning , b.recieve_warning_yes , b.insurance_remark "
					.",  (SELECT COUNT(id) FROM tbl_insurance_payment WHERE work_id = a.work_id) AS countInstallment "
					." FROM tbl_insurance_accident_data AS a "
					." LEFT JOIN tbl_insurance_data AS b ON a.work_id = b.id "
					." WHERE 1 $txtWhereMonth AND YEAR(a.insurance_start) = '".$param['selectYear']."' AND a.data_status = '".$param['data_status']."' $txtWherePayType ORDER BY a.insurance_start ASC   ";
				$result = $this->db->query($sql)->result();
				$returnValue['sql']=$sql;
				$returnValue['resultData']=$result;
				
			break;
			case "5" :
			$sql="SELECT a.* "
					." , b.recieve_warning , b.not_recieve_warning , b.recieve_warning_yes , b.insurance_remark "
					.",  (SELECT COUNT(id) FROM tbl_insurance_payment WHERE work_id = a.work_id) AS countInstallment "
					." FROM tbl_insurance_home_data AS a "
					." LEFT JOIN tbl_insurance_data AS b ON a.work_id = b.id "
					." WHERE 1 $txtWhereMonth AND YEAR(a.insurance_start) = '".$param['selectYear']."' AND a.data_status = '".$param['data_status']."' $txtWherePayType ORDER BY a.insurance_start ASC   ";
				$result = $this->db->query($sql)->result();
				$returnValue['sql']=$sql;
				$returnValue['resultData']=$result;				
			break;
			case "3" :
			$sql="SELECT a.* "
					." , b.recieve_warning , b.not_recieve_warning , b.recieve_warning_yes , b.insurance_remark "
					.",  (SELECT COUNT(id) FROM tbl_insurance_payment WHERE work_id = a.work_id) AS countInstallment "
					." FROM tbl_insurance_shpping_data AS a "
					." LEFT JOIN tbl_insurance_data AS b ON a.work_id = b.id "
					." WHERE 1 $txtWhereMonth AND YEAR(a.insurance_start) = '".$param['selectYear']."' AND a.data_status = '".$param['data_status']."' $txtWherePayType ORDER BY a.insurance_start ASC   ";
				$result = $this->db->query($sql)->result();
				$returnValue['sql']=$sql;
				$returnValue['resultData']=$result;				
			break;
			case "2" :
			$sql="SELECT a.* "
					." , b.recieve_warning , b.not_recieve_warning , b.recieve_warning_yes , b.insurance_remark "
					.",  (SELECT COUNT(id) FROM tbl_insurance_payment WHERE work_id = a.work_id) AS countInstallment "
					." FROM tbl_insurance_travel_data AS a "
					." LEFT JOIN tbl_insurance_data AS b ON a.work_id = b.id "
					." WHERE 1 $txtWhereMonth AND YEAR(a.insurance_start) = '".$param['selectYear']."' AND a.data_status = '".$param['data_status']."' $txtWherePayType ORDER BY a.insurance_start ASC   ";
				$result = $this->db->query($sql)->result();
				$returnValue['sql']=$sql;
				$returnValue['resultData']=$result;				
			break;
			
		}
		return $returnValue;
	}
	//-----------------------------
	function setInsuranceInstallmentOTher($data){
		
	}
	//-----------------------------
	function getOtherInsuranceDetail($selectType,$Insurance_otherID){
		$extend = "";
		switch($selectType){
			case"4":
				//$sql="SELECT a.* FROM tbl_insurance_accident_data AS a WHERE id = '".$Insurance_otherID."' ";
			    //$resultData= $this->db->query($sql)->result();
				//return $resultData;
				$tbl = " tbl_insurance_accident_data ";
			break;
			case "5" :
				//$sql="SELECT a.* FROM tbl_insurance_home_data AS a LEFT JOIN tbl_insurance_data AS b WHERE id = '".$Insurance_otherID."' ";
			    //$resultData= $this->db->query($sql)->result();
				//return $resultData;
				$tbl = " tbl_insurance_home_data ";
			break;
			case "3" : 
				$tbl = " tbl_insurance_shpping_data ";
			break;
			case "2" : 
				$tbl = " tbl_insurance_travel_data ";
				$extend = " , a.Insurance_price_total  AS total_price  ";
			break;
		}
		
		$sql="SELECT a.*, b.is_installment, b.insurance_total $extend , c.agent_name , c.id AS agentID  "
			." FROM $tbl AS a "
			." LEFT JOIN tbl_insurance_data AS b ON a.work_id = b.id "
			." LEFT JOIN  tbl_agent_data AS c ON a.agent_id = c.id "
			." WHERE a.id = '".$Insurance_otherID."' ";
		
		$resultData= $this->db->query($sql)->result();
		return $resultData;
		
	}
	//-----------------------------type_work  contract_enddate agent
	function SaveInsuranceOther($data){
		$param = $data['inputData'];
		//print_r($param);
		$today = date("Y-m-d");
		$returnValue = array();
		$returnValue['doDb']='0';
		
		if(!isset($param['get_ins_date_work'])){ $data['get_ins_date_work']='';}else{ $param['get_ins_date_work'] = $this->translateDateToEng($param['get_ins_date_work']);  }
		if(!isset($param['renewal'])){ $param['renewal']=0; }
		if(!isset($param['insurance_price'])){ $param['insurance_price']=0; }
		if(!isset($param['installment'])){ $param['installment']=0; }
		if(!isset($param['address_sendtype'])){ $param['address_sendtype']=0; }
		if(!isset($param['address_use_type'])){ $param['address_use_type']=0; }
		if(!isset($param['payment_type'])){ $param['payment_type']=0; }
		if(!isset($param['not_recieve_warning'])){ $param['not_recieve_warning']=0; }
		if(!isset($param['recieve_warning_yes'])){ $param['recieve_warning_yes']=0; }
		if(!isset($param['recieve_warning'])){ $param['recieve_warning']=0; }
		if(!isset($param['type'])){ $param['type']=0; }
		if(!isset($param['type_work'])){ $param['type_work']=0; } 
		
		if(isset($param['totalprice_installment'])){  $param['totalprice_installment'] =  $this->removeComma2($param['totalprice_installment']);}else{ $param['totalprice_installment'] = '';}	
		if(isset($param['revenue_stamp'])){  $param['revenue_stamp'] =  $this->removeComma2($param['revenue_stamp']);}else{ $param['revenue_stamp'] = '0';}	
		if(isset($param['tax'])){  $param['tax'] =  $this->removeComma2($param['tax']);}else{ $param['tax'] = '0';}	
		if(isset($param['total_price'])){  $param['total_price'] =  $this->removeComma2($param['total_price']);}else{ $param['tatotal_pricex'] = '0';}	
		if(isset($param['attach'])){  $param['attach'] =  $this->removeComma2($param['attach']);}else{ $param['attach'] = '0';}	
		if(isset($param['payment_amount'])){  $param['payment_amount'] =  $this->removeComma2($param['payment_amount']);}else{ $param['payment_amount'] = '0';}	
		if(isset($param['insurance_discount'])){  $param['insurance_discount'] =  $this->removeComma2($param['insurance_discount']);}else{ $param['insurance_discount'] = '0';}	
		if(isset($param['insurance_limit'])){  $param['insurance_limit'] =  $this->removeComma2($param['insurance_limit']);}else{ $param['insurance_limit'] = '0';}	
		
		 if(!isset($param['address_org'])){ $param['address_org']=''; }
		 if(!isset($param['address_name'])){ $param['address_name']=''; }
		 if(!isset($param['address_no'])){ $param['address_no']=''; }
		 if(!isset($param['address_moo'])){ $param['address_moo']=''; }
		 if(!isset($param['address_alley'])){ $param['address_alley']=''; }
		 if(!isset($param['address_road'])){ $param['address_road']=''; }
		 if(!isset($param['address_road'])){ $param['address_road']=''; }
		 if(!isset($param['address_subdistric'])){ $param['address_subdistric']=''; }
		 if(!isset($param['address_disctric'])){ $param['address_disctric']=''; }
		 if(!isset($param['address_disctric'])){ $param['address_disctric']=''; }
		 if(!isset($param['address_province'])){ $param['address_province']=''; }
		 if(!isset($param['address_postcode'])){ $param['address_postcode']=''; }
		 if(!isset($param['address_postcode'])){ $param['address_postcode']=''; }
		 if(!isset($param['address_sendtype'])){ $param['address_sendtype']=''; }
		 if(!isset($param['address_remark'])){ $param['address_remark']=''; }
		 if(!isset($param['address_use_type'])){ $param['address_use_type']=''; }
		 if(!isset($param['post_date'])){ $param['post_date']=''; }
		 if(!isset($param['post_no'])){ $param['post_no']=''; }
		
		if(isset($param['contract_startdate'])){
			$param['contract_startdate']=$this->translateDateToEng($param['contract_startdate']);
		}else { $param['contract_startdate']=''; }
		if(isset($param['contract_enddate'])){
			$param['contract_enddate']=$this->translateDateToEng($param['contract_enddate']); 	
		}else{ $param['contract_enddate']=""; }
		if(isset($param['insurance_start'])){
			$param['insurance_start']=$this->translateDateToEng($param['insurance_start']);
		}else { $param['insurance_start']=""; }
		if(isset($param['insurance_end'])){
			$param['insurance_end']=$this->translateDateToEng($param['insurance_end']);
		}else { $param['insurance_end']=""; }
        
		
		$param['adminID'] = $this->session->userdata('user_id');
		
		switch($param['selectType']){  //  insurance_contract_date  contract_startdate insurance_total_net Insurance_price Insurance_price_total insurance_premiums
			case "2" :
				 if(!isset($param['agent'])){ $param['agent']=0;}
				 if(!isset($param['life_cost'])){ $param['life_cost']=''; }
				 if(!isset($param['medical_accident'])){ $param['medical_accident']=''; }
				 if(!isset($param['medical_accident'])){ $param['medical_accident']=''; }
		
				 if(!isset($param['renewal'])){ $param['renewal']=''; }
				
				if(isset($param['Insurance_price'])){  $param['Insurance_price'] =  $this->removeComma2($param['Insurance_price']);}else{ $param['Insurance_price'] = '0';}	
				if(isset($param['Insurance_price_total'])){  $param['Insurance_price_total'] =  $this->removeComma2($param['Insurance_price_total']);}else{ $param['Insurance_price_total'] = '0';}	
				if(isset($param['vat'])){  $param['vat'] =  $this->removeComma2($param['vat']);}else{ $param['vat'] = '0';}	
				if(isset($param['duty'])){  $param['duty'] =  $this->removeComma2($param['duty']);}else{ $param['duty'] = '0';}	
				if(isset($param['insurance_premiums'])){  $param['insurance_premiums'] =  $this->removeComma2($param['insurance_premiums']);}else{ $param['insurance_premiums'] = '';}	
				
				if(isset($param['insurance_contract_date'])){
						$param['insurance_contract_date']=$this->translateDateToEng($param['insurance_contract_date']);
				}else { $param['insurance_contract_date']=""; }
				
					if(isset($param['policy_date'])){
						$param['policy_date']=$this->translateDateToEng($param['policy_date']);
				}else { $param['policy_date']=""; }
				
				if($param['workID']=='0'){   
					$sql=" INSERT INTO `tbl_insurance_data` (`id`, `date_work`, `cust_name`, `cust_nickname`, `cust_telephone_1`, `insurance_data_type` , `recieve_warning` , `not_recieve_warning` , `recieve_warning_yes`, `insurance_remark`, `insurance_corp_id` , `insurance_start`, `agent_id`, `insurance_no`, `insurance_total_net`, `insurance_total`, `payment_amount`, `ins_code_id`) "
			   . " VALUES "
			   ."('', '".$param['get_ins_date_work']."' ,'".$param['cust_name']."','".$param['cust_nickname']."','".$param['tel1']."','".$param['selectType']."' , '".$param['recieve_warning']."','".$param['not_recieve_warning']."','".$param['recieve_warning_yes']."' ,'".$param['insurance_remark']."', '".$param['corp_id']."' , '".$param['insurance_start']."', '".$param['agent_id']."' ,'".$param['policy_number']."' , '".$param['Insurance_price']."', '".$param['payment_amount']."' , '".$param['renewal']."' ,   '".$param['code_id']."'  )"
			   ." ";
				if($this->db->query($sql)){
					 $returnValue['doDb']='1';
					 $returnValue['workID']=$this->db->insert_id();
					 $query="INSERT INTO `tbl_insurance_travel_data`(`id`,`work_id`, `company_id`, `policy_number`, `policyholder`, `assured`, `insurance_period`, `insurance_start`, `insurance_end`, `travel_route`, `amount`, `life_cost`, `medical_accident`, `insurance_premiums`, `Insurance_price`, `duty`, `vat`, `Insurance_price_total`, `protection_agreement`, `agent`, `agent_name`, `license_number`, `insurance_contract_date`, `policy_date`, `date_add`, `user_update`, `insurance_start_time`, `insurance_end_time` ,  `payment_type`, `corp_id`, `code_id`, `cust_name`, `agent_id`, `cust_nickname`, `tel1`, `insurance_limit`, `payment_amount` , `Insurance_discount` , `renewal`) "
						." VALUES "
						."('','".$returnValue['workID']."', '".$param['company_id']."','".$param['policy_number']."','".$param['policyholder']."','".$param['assured']."','".$param['insurance_period']."','".$param['insurance_start']."','".$param['insurance_end']."','".$param['travel_route']."','".$param['amount']."','".$param['life_cost']."','".$param['medical_accident']."','".$param['insurance_premiums']."','".$param['Insurance_price']."','".$param['duty']."','".$param['vat']."','".$param['Insurance_price_total']."','".$param['protection_agreement']."','".$param['agent']."','".$param['agent_name']."','".$param['license_number']."','".$param['insurance_contract_date']."','".$param['policy_date']."','".$today."','".$param['adminID']."','".$param['insurance_start_time']."','".$param['insurance_end_time']."',   '".$param['payment_type']."',   '".$param['corp_id']."',   '".$param['code_id']."',   '".$param['cust_name']."', '".$param['agent_id']."', '".$param['cust_nickname']."', '".$param['tel1']."', '".$param['insurance_limit']."', '".$param['payment_amount']."' , '".$param['Insurance_discount']."', '".$param['renewal']."')";
					if($this->db->query($query)){
							 $returnValue['doDbOther']='1';
					 		 $returnValue['Insurance_otherID']=$this->db->insert_id(); 
						}else{
							 $returnValue['doDbOther']='1';
					 		 $returnValue['Insurance_otherID']="ErrorInsertInsuranceOther 2";
						}
				}
					
			}else{ // if($param['workID']=='0')
					$sql = "UPDATE tbl_insurance_data SET `date_work` = '".$param['get_ins_date_work']."' , `cust_name`='".$param['cust_name']."', `cust_nickname`='".$param['cust_nickname']."', `cust_telephone_1`='".$param['tel1']."'  , `recieve_warning`='".$param['recieve_warning']."' , `not_recieve_warning` ='".$param['not_recieve_warning']."' , `recieve_warning_yes` = '".$param['recieve_warning_yes']."'  , `insurance_remark` = '".$param['insurance_remark']."' , `insurance_corp_id`='".$param['corp_id']."' , `insurance_start` = '".$param['insurance_start']."' ,`agent_id`='".$param['agent_id']."' ,`insurance_no`='".$param['policy_number']."' , `insurance_total_net` = '".$param['Insurance_price']."' ,`insurance_total`=  '".$param['payment_amount']."' , `insurance_renew`='".$param['renewal']."'  , `ins_code_id` = '".$param['code_id']."' "
				." WHERE id = '".$param['workID']."' ";
				 $returnValue['sql-update-insurance']=$sql;	
				if($this->db->query($sql)){
				   $returnValue['doDb']='1';
				   $returnValue['workID']=$param['workID'];	  // adminID agent 
					
					 $query="UPDATE `tbl_insurance_travel_data` SET `company_id`= '".$param['company_id']."',`policy_number`= '".$param['policy_number']."',`policyholder`='".$param['policyholder']."',`assured`='".$param['assured']."',`insurance_period`='".$param['insurance_period']."',`insurance_start`='".$param['insurance_start']."',`insurance_end`='".$param['insurance_end']."',`travel_route`='".$param['travel_route']."',`amount`='".$param['amount']."',`life_cost`='".$param['life_cost']."',`medical_accident`='".$param['medical_accident']."',`insurance_premiums`='".$param['insurance_premiums']."',`Insurance_price`='".$param['Insurance_price']."',`duty`='".$param['duty']."',`vat`='".$param['vat']."',`Insurance_price_total`='".$param['Insurance_price_total']."',`protection_agreement`='".$param['protection_agreement']."',`agent`='".$param['agent']."',`agent_name`='".$param['agent_name']."',`license_number`='".$param['license_number']."',`insurance_contract_date`='".$param['insurance_contract_date']."',`policy_date`='".$param['policy_date']."',`date_add`='".$today."',`user_update`='".$param['adminID']."',`insurance_start_time`='".$param['insurance_start_time']."',`insurance_end_time`='".$param['insurance_end_time']."',  `payment_type` ='".$param['payment_type']."', `corp_id` ='".$param['corp_id']."', `code_id` ='".$param['code_id']."', `cust_name` ='".$param['cust_name']."', `agent_id` ='".$param['agent_id']."', `cust_nickname` ='".$param['cust_nickname']."', `tel1` ='".$param['tel1']."', `insurance_limit` ='".$param['insurance_limit']."', `payment_amount` ='".$param['payment_amount']."' , Insurance_discount='".$param['Insurance_discount']."' , renewal='".$param['renewal']."' ,  `insurance_premiums` = '".$param['insurance_premiums']."'  WHERE `id`= '".$param['Insurance_otherID']."'";
					
					if($this->db->query($query)){
							 $returnValue['doDbOther']='1';
					 		 $returnValue['Insurance_otherID']=$param['Insurance_otherID']; 
						}else{
							 $returnValue['doDbOther']='1';
					 		 $returnValue['Insurance_otherID']="ErrorUpdateInsuranceOther 2";
						}
					
					
				}
					
			} //else if($param['workID']=='0')
				
			break;
			case "3" :
				//-----Prepare value--/// insurance_total_net premium
				if(!isset($param['agent'])){ $param['agent']=0;}
				if(isset($param['price'])){  $param['price'] =  $this->removeComma2($param['price']);}else{ $param['price'] = '0';}	
				if(isset($param['priceaccident'])){  $param['priceaccident'] =  $this->removeComma2($param['priceaccident']);}else{ $param['priceaccident'] = '0';}	
				if(isset($param['pricevehicle'])){  $param['pricevehicle'] =  $this->removeComma2($param['pricevehicle']);}else{ $param['pricevehicle'] = '0';}	
				if(isset($param['priceclaim'])){  $param['priceclaim'] =  $this->removeComma2($param['priceclaim']);}else{ $param['priceclaim'] = '0';}	
				if(isset($param['premium_rate'])){  $param['premium_rate'] =  $this->removeComma2($param['premium_rate']);}else{ $param['premium_rate'] = '0';}	
				if(isset($param['premium'])){  $param['premium'] =  $this->removeComma2($param['premium']);}else{ $param['premium'] = '0';}	

				if(!isset($param['insurance_period_ch'])){ $param['insurance_period_ch']=0; }
				if(!isset($param['extra_danger'])){ $param['extra_danger']=0; }
				if(!isset($param['renewal'])){ $param['renewal']=0; }
				
				if($param['workID']=='0'){  
					$sql=" INSERT INTO `tbl_insurance_data` (`id`, `date_work`, `cust_name`, `cust_nickname`, `cust_telephone_1`, `insurance_data_type` , `recieve_warning` , `not_recieve_warning` , `recieve_warning_yes`, `insurance_remark`, `insurance_corp_id` , `insurance_start`, `agent_id`, `insurance_no`, `insurance_total_net`, `insurance_total`, `payment_amount`,  `ins_code_id`) "
			   . " VALUES "
			   ."('', '".$param['get_ins_date_work']."' ,'".$param['cust_name']."','".$param['cust_nickname']."','".$param['tel1']."','".$param['selectType']."' , '".$param['recieve_warning']."','".$param['not_recieve_warning']."','".$param['recieve_warning_yes']."' ,'".$param['insurance_remark']."', '".$param['corp_id']."' , '".$param['insurance_start']."', '".$param['agent_id']."' ,'".$param['policy_number']."' , '".$param['premium']."', '".$param['payment_amount']."' , '".$param['renewal']."' , '".$param['code_id']."')"
			   ." ";
				if($this->db->query($sql)){
					 $returnValue['doDb']='1';
					 $returnValue['workID']=$this->db->insert_id();
					 $query="INSERT INTO `tbl_insurance_shpping_data`(`id`,`work_id`, `register`, `policy_number`, `corp_id`, `code_id`, `policyholder`, `vehicle_type`, `registration_number`, `insurance_period_ch`, `insurance_start`, `insurance_start_time`, `scope`, `route`, `transportation_insurance`, `price`, `priceaccident`, `pricevehicle`, `priceclaim`, `extra_danger`, `premium_rate`, `premium`, `revenue_stamp`, `tax`, `total_price`, `agent`, `agent_name`, `license_number`, `contract_startdate`, `contract_enddate`,  `date_add`, `user_update`,`insurance_end`,`insurance_end_time`,`cust_name`, `agent_id`, `cust_nickname`, `tel1`, `insurance_limit`, `payment_amount` , `insurance_discount`, `renewal`) "
				
						." VALUES "
						."('','".$returnValue['workID']."','".$param['register']."','".$param['policy_number']."','".$param['corp_id']."','".$param['code_id']."','".$param['policyholder']."','".$param['vehicle_type']."','".$param['registration_number']."','".$param['insurance_period_ch']."', '".$param['insurance_start']."'  ,  '".$param['insurance_start_time']."',   '".$param['scope']."',   '".$param['route']."',   '".$param['transportation_insurance']."',   '".$param['price']."',   '".$param['priceaccident']."',   '".$param['pricevehicle']."',   '".$param['priceclaim']."',   '".$param['extra_danger']."',   '".$param['premium_rate']."',   '".$param['premium']."',   '".$param['revenue_stamp']."',   '".$param['tax']."',   '".$param['total_price']."',   '".$param['agent']."',   '".$param['agent_name']."',   '".$param['license_number']."',   '".$param['contract_startdate']."',   '".$param['contract_enddate']."',  '".$today."',  '".$param['adminID']."', '".$param['insurance_end']."', '".$param['insurance_end_time']."', '".$param['cust_name']."', '".$param['agent_id']."', '".$param['cust_nickname']."', '".$param['tel1']."', '".$param['insurance_limit']."', '".$param['payment_amount']."' , '".$param['insurance_discount']."', '".$param['renewal']."')";
					if($this->db->query($query)){
							 $returnValue['doDbOther']='1';
					 		 $returnValue['Insurance_otherID']=$this->db->insert_id(); 
						}else{
							 $returnValue['doDbOther']='1';
					 		 $returnValue['Insurance_otherID']="ErrorInsertInsuranceOther 3";
						}
					}
				
				}else{
					$sql = "UPDATE tbl_insurance_data SET `date_work` = '".$param['get_ins_date_work']."' , `cust_name`='".$param['cust_name']."', `cust_nickname`='".$param['cust_nickname']."', `cust_telephone_1`='".$param['tel1']."'  , `recieve_warning`='".$param['recieve_warning']."' , `not_recieve_warning` ='".$param['not_recieve_warning']."' , `recieve_warning_yes` = '".$param['recieve_warning_yes']."'  , `insurance_remark` = '".$param['insurance_remark']."' , `insurance_corp_id`='".$param['corp_id']."' , `insurance_start` = '".$param['insurance_start']."' ,`agent_id`='".$param['agent_id']."' ,`insurance_no`='".$param['policy_number']."' , `insurance_total_net` = '".$param['premium']."' ,`insurance_total`=  '".$param['payment_amount']."' , `insurance_renew`='".$param['renewal']."' , `ins_code_id` = '".$param['code_id']."'  "
				." WHERE id = '".$param['workID']."' ";
				 $returnValue['sql-update-insurance']=$sql;	
				if($this->db->query($sql)){
				   $returnValue['doDb']='1';
				   $returnValue['workID']=$param['workID'];	  // adminID agent  ins_pay_type
					
					 $query="UPDATE `tbl_insurance_shpping_data` SET `register`='".$param['register']."',`policy_number`='".$param['policy_number']."',`corp_id`='".$param['corp_id']."',`code_id`='".$param['code_id']."',`policyholder`='".$param['policyholder']."',`vehicle_type`='".$param['vehicle_type']."',`registration_number`='".$param['registration_number']."',`insurance_period_ch`='".$param['insurance_period_ch']."',`insurance_start`='".$param['insurance_start']."',`insurance_start_time`='".$param['insurance_start_time']."',`scope`='".$param['scope']."',`route`='".$param['route']."',`transportation_insurance`='".$param['transportation_insurance']."',`price`='".$param['price']."',`priceaccident`='".$param['priceaccident']."',`pricevehicle`='".$param['pricevehicle']."',`priceclaim`='".$param['priceclaim']."',`extra_danger`='".$param['extra_danger']."',`premium_rate`='".$param['premium_rate']."',`premium`='".$param['premium']."',`revenue_stamp`='".$param['revenue_stamp']."',`tax`='".$param['tax']."',`total_price`='".$param['total_price']."',`agent`='".$param['agent']."',`agent_name`='".$param['agent_name']."',`license_number`='".$param['license_number']."',`contract_startdate`='".$param['contract_startdate']."',`contract_enddate`='".$param['contract_enddate']."',`corp_id`='".$param['corp_id']."',`date_add`='".$today."',`user_update`='".$param['adminID']."',`insurance_end`='".$param['insurance_end']."', `insurance_end_time`='".$param['insurance_end_time']."', `cust_name`='".$param['cust_name']."', `agent_id` ='".$param['agent_id']."', `cust_nickname` ='".$param['cust_nickname']."', `tel1` ='".$param['tel1']."', `insurance_limit` ='".$param['insurance_limit']."', `payment_amount` ='".$param['payment_amount']."', `insurance_discount` ='".$param['insurance_discount']."' , `renewal` ='".$param['renewal']."'  WHERE `id`= '".$param['Insurance_otherID']."'";
					if($this->db->query($query)){
							 $returnValue['doDbOther']='1';
					 		 $returnValue['Insurance_otherID']=$param['Insurance_otherID']; 
						}else{
							 $returnValue['doDbOther']='1';
					 		 $returnValue['Insurance_otherID']="ErrorUpdateInsuranceOther 3";
						}
					}
				}//end if if($param['workID']=='0'){  
				
			break;
			case "5" :
				if(isset($param['totalprice_installment'])){  $param['totalprice_installment'] =  $this->removeComma2($param['totalprice_installment']);}else{ $param['totalprice_installment'] = '0';}	
				//------------case 5---------------------payment_amount_home payment_amount_home totalprice_installment
			  if($param['workID']=='0'){  
				 $sql=" INSERT INTO `tbl_insurance_data` (`id`, `date_work`, `cust_name`, `cust_nickname`, `cust_telephone_1`, `insurance_data_type` , `recieve_warning` , `not_recieve_warning` , `recieve_warning_yes`, `insurance_remark`, `insurance_corp_id` , `insurance_start`, `agent_id`, `insurance_no`, `insurance_total_net`, `insurance_total`, `payment_amount` ,`ins_code_id`  ) "
			   . " VALUES "
			   ."('', '".$param['get_ins_date_work']."' ,'".$param['cust_name']."','".$param['cust_nickname']."','".$param['tel1']."','".$param['selectType']."' , '".$param['recieve_warning']."','".$param['not_recieve_warning']."','".$param['recieve_warning_yes']."' ,'".$param['insurance_remark']."', '".$param['corp_id']."' , '".$param['insurance_start']."', '".$param['agent_id']."' ,'".$param['policy_number']."' , '".$param['totalprice_installment']."', '".$param['payment_amount']."' , '".$param['renewal']."' , '".$param['code_id']."')"
			   ." ";
				if($this->db->query($sql)){
					 $returnValue['doDb']='1';
					 $returnValue['workID']=$this->db->insert_id();
					 
					  $sql="INSERT INTO `tbl_insurance_home_data`(`id`,`work_id`, `company_id`, `renewal`, `policy_old_number`, `policy_number`, `corp_id`, `code_id`, `policyholder`, `location_insured`, `beneficiary`, `insurance_period`, `insurance_start`, `insurance_start_time`, `insurance_end`, `insurance_end_time`, `totalprice_installment`, `revenue_stamp`, `tax`, `total_price`, `attach`, `contract_startdate`, `contract_enddate`, `type_work`, `broker_name`, `license_number`, `address_name`, `address_org`, `address_no`, `address_moo`, `address_alley`, `address_road`, `address_subdistric`, `address_disctric`, `address_province`, `address_postcode`, `address_sendtype`, `address_remark`, `address_use_type`, `post_date`, `post_no`, `payment_type`, `date_add`, `user_update`, `cust_name`, `agent_id`, `cust_nickname`, `tel1`, `insurance_limit`, `payment_amount`, `insurance_discount`) "
						." VALUES "
						."('','".$returnValue['workID']."','".$param['company_id']."','".$param['renewal']."','".$param['policy_old_number']."','".$param['policy_number']."','".$param['corp_id']."','".$param['code_id']."','".$param['policyholder']."','".$param['location_insured']."','".$param['beneficiary']."',  '".$param['insurance_period']."'  ,  '".$param['insurance_start']."'  ,  '".$param['insurance_start_time']."',  '".$param['insurance_end']."',  '".$param['insurance_end_time']."',   '".$param['totalprice_installment']."',   '".$param['revenue_stamp']."',   '".$param['tax']."',   '".$param['total_price']."',   '".$param['attach']."',   '".$param['contract_startdate']."',   '".$param['contract_enddate']."',   '".$param['type_work']."',   '".$param['broker_name']."',   '".$param['license_number']."',   '".$param['address_name']."',   '".$param['address_org']."',   '".$param['address_no']."',   '".$param['address_moo']."',   '".$param['address_alley']."',   '".$param['address_road']."',  '".$param['address_subdistric']."'  ,  '".$param['address_disctric']."'  ,  '".$param['address_province']."',  '".$param['address_postcode']."',  '".$param['address_sendtype']."',  '".$param['address_remark']."',  '".$param['address_use_type']."',  '".$param['post_date']."'  ,  '".$param['post_no']."'  ,  '".$param['payment_type']."',  '".$today."',  '".$param['adminID']."',  '".$param['cust_name']."', '".$param['agent_id']."', '".$param['cust_nickname']."', '".$param['tel1']."', '".$param['insurance_limit']."', '".$param['payment_amount']."', '".$param['insurance_discount']."')";
					    if($this->db->query($sql)){
							 $returnValue['doDbOther']='1';
					 		 $returnValue['Insurance_otherID']=$this->db->insert_id(); 
						}else{
							 $returnValue['doDbOther']='1';
					 		 $returnValue['Insurance_otherID']="ErrorInsertInsuranceOther 5";
						}
					
					
				}else{
					$returnValue['doDbOther']='0';
					$returnValue['workID']="ErrorInsertInsuranceHome"; 
				}
				  
			  }else{  //else if  $param['workID']=='0' Insurance_otherID Insurance_otherID insurance_total
				  $sql = "UPDATE tbl_insurance_data SET `date_work` = '".$param['get_ins_date_work']."' , `cust_name`='".$param['cust_name']."', `cust_nickname`='".$param['cust_nickname']."', `cust_telephone_1`='".$param['tel1']."'  , `recieve_warning`='".$param['recieve_warning']."' , `not_recieve_warning` ='".$param['not_recieve_warning']."' , `recieve_warning_yes` = '".$param['recieve_warning_yes']."'  , `insurance_remark` = '".$param['insurance_remark']."' , `insurance_corp_id`='".$param['corp_id']."' , `insurance_start` = '".$param['insurance_start']."' ,`agent_id`='".$param['agent_id']."' ,`insurance_no`='".$param['policy_number']."' , `insurance_total_net` = '".$param['totalprice_installment']."' ,`insurance_total`=  '".$param['payment_amount']."' , `insurance_renew`='".$param['renewal']."' , `ins_code_id` = '".$param['code_id']."' "
				." WHERE id = '".$param['workID']."' ";
			  if($this->db->query($sql)){
				   $returnValue['doDb']='1';
				   $returnValue['workID']=$param['workID'];
				  
				   $sql="UPDATE `tbl_insurance_home_data` SET `company_id`='".$param['company_id']."',`renewal`='".$param['renewal']."',`policy_old_number`='".$param['policy_old_number']."',`policy_number`='".$param['policy_number']."',`corp_id`='".$param['corp_id']."',`code_id`='".$param['code_id']."',`policyholder`='".$param['policyholder']."',`location_insured`='".$param['location_insured']."',`beneficiary`='".$param['beneficiary']."',`insurance_period`='".$param['insurance_period']."',`insurance_start`='".$param['insurance_start']."',`insurance_start_time`='".$param['insurance_start_time']."',`insurance_end`='".$param['insurance_end']."',`insurance_end_time`='".$param['insurance_end_time']."',`totalprice_installment`='".$param['totalprice_installment']."',`revenue_stamp`='".$param['revenue_stamp']."',`tax`='".$param['tax']."',`total_price`='".$param['total_price']."',`attach`='".$param['attach']."',`contract_startdate`='".$param['contract_startdate']."',`contract_enddate`='".$param['contract_enddate']."',`type_work`='".$param['type_work']."',`broker_name`='".$param['broker_name']."',`license_number`='".$param['license_number']."',`address_name`='".$param['address_name']."',`address_org`='".$param['address_org']."',`address_no`='".$param['address_no']."',`address_moo`='".$param['address_moo']."',`address_alley`='".$param['address_alley']."',`address_road`='".$param['address_road']."',`address_subdistric`='".$param['address_subdistric']."',`address_disctric`='".$param['address_disctric']."',`address_province`='".$param['address_province']."',`address_postcode`='".$param['address_postcode']."',`address_sendtype`='".$param['address_sendtype']."',`address_remark`='".$param['address_remark']."',`address_use_type`='".$param['address_use_type']."',`post_date`='".$param['post_date']."',`post_no`='".$param['post_no']."',`payment_type`='".$param['payment_type']."',`corp_id`='".$param['corp_id']."',`date_add`='".$today."',`user_update`='".$param['adminID']."',`cust_name`='".$param['cust_name']."', `agent_id` ='".$param['agent_id']."', `cust_nickname` ='".$param['cust_nickname']."', `tel1` ='".$param['tel1']."', `insurance_limit` ='".$param['insurance_limit']."', `payment_amount` ='".$param['payment_amount']."', `insurance_discount` ='".$param['insurance_discount']."' WHERE `id`= '".$param['Insurance_otherID']."'";
			  	   		
				  		if($this->db->query($sql)){
							 $returnValue['doDb']='1';
							 $returnValue['doDbOther']='1';
					 		 $returnValue['Insurance_otherID']=$param['Insurance_otherID']; 
						}else{
							 $returnValue['doDbOther']='1';
					 		 $returnValue['Insurance_otherID']="ErrorUpdateInsuranceOther 4";
						}
			  	}
			  }//end if  $param['workID']=='0'
				//------------end case 5-------------------
			break;	
			case "4" :
				//------------case 4-----------------------doDb
				$param['protected_date1']=$this->translateDateToEng($param['protected_date1']);
				$param['protected_date2']=$this->translateDateToEng($param['protected_date2']);
				$param['protected_date3']=$this->translateDateToEng($param['protected_date3']);
				
				$param['protected_date3']=$this->translateDateToEng($param['protected_date3']);

				
				 if(isset($param['assured1'])){ $param['assured1'] =  $this->removeComma2($param['assured1']); }else{ $param['assured1'] = '';}
				 if(isset($param['spouse1'])){  $param['spouse1'] =  $this->removeComma2($param['spouse1']);}else{ $param['spouse1'] = '';}
				 if(isset($param['family_person1'])){  $param['family_person1'] =  $this->removeComma2($param['family_person1']);}else{ $param['family_person1'] = '';}
				 if(isset($param['other1'])){  $param['other1'] =  $this->removeComma2($param['other1']);}else{ $param['other1'] = '';}
				 if(isset($param['partial_liability1'])){  $param['partial_liability1'] =  $this->removeComma2($param['partial_liability1']);}else{ $param['partial_liability1'] = '';}

				 if(isset($param['assured2'])){ $param['assured2'] =  $this->removeComma2($param['assured2']); }else{ $param['assured2'] = '';}
				
				 if(isset($param['daily_compensation'])){ $param['daily_compensation'] =  $this->removeComma2($param['daily_compensation']); }else{ $param['daily_compensation'] = '';}
				 
				if(isset($param['daily_compensation2'])){ $param['daily_compensation2'] =  $this->removeComma2($param['daily_compensation2']); }else{ $param['daily_compensation2'] = '';}
				
				if(isset($param['daily_compensation3'])){ $param['daily_compensation3'] =  $this->removeComma2($param['daily_compensation3']); }else{ $param['daily_compensation3'] = '';}
				
				if(isset($param['daily_compensation4'])){ $param['daily_compensation4'] =  $this->removeComma2($param['daily_compensation4']); }else{ $param['daily_compensation4'] = '';}
				
				if(isset($param['daily_compensation5'])){ $param['daily_compensation5'] =  $this->removeComma2($param['daily_compensation5']); }else{ $param['daily_compensation'] = '';}
				
				
				
				 if(isset($param['spouse2'])){  $param['spouse2'] =  $this->removeComma2($param['spouse2']);}else{ $param['spouse2'] = '';}
				 if(isset($param['family_person2'])){  $param['family_person2'] =  $this->removeComma2($param['family_person2']);}else{ $param['family_person2'] = '';}
				 if(isset($param['other2'])){  $param['other2'] =  $this->removeComma2($param['other2']);}else{ $param['other2'] = '';}
				 if(isset($param['partial_liability2'])){  $param['partial_liability2'] =  $this->removeComma2($param['partial_liability2']);}else{ $param['partial_liability2'] = '';}		

				 if(isset($param['assured3'])){ $param['assured3'] =  $this->removeComma2($param['assured3']); }else{ $param['assured3'] = '';}
				 if(isset($param['spouse3'])){  $param['spouse3'] =  $this->removeComma2($param['spouse3']);}else{ $param['spouse3'] = '';}
				 if(isset($param['family_person3'])){  $param['family_person3'] =  $this->removeComma2($param['family_person3']);}else{ $param['family_person3'] = '';}
				 if(isset($param['other3'])){  $param['other3'] =  $this->removeComma2($param['other3']);}else{ $param['other3'] = '';}
				 if(isset($param['partial_liability3'])){  $param['partial_liability3'] =  $this->removeComma2($param['partial_liability3']);}else{ $param['partial_liability3'] = '';}			

				 if(isset($param['assured4'])){ $param['assured4'] =  $this->removeComma2($param['assured4']); }else{ $param['assured4'] = '';}
				 if(isset($param['spouse4'])){  $param['spouse4'] =  $this->removeComma2($param['spouse4']);}else{ $param['spouse4'] = '';}
				 if(isset($param['family_person4'])){  $param['family_person4'] =  $this->removeComma2($param['family_person4']);}else{ $param['family_person4'] = '';}
				 if(isset($param['other4'])){  $param['other4'] =  $this->removeComma2($param['other4']);}else{ $param['other4'] = '';}
				 if(isset($param['partial_liability4'])){  $param['partial_liability4'] =  $this->removeComma2($param['partial_liability4']);}else{ $param['partial_liability4'] = '';}	

				 if(isset($param['assured5'])){ $param['assured5'] =  $this->removeComma2($param['assured5']); }else{ $param['assured5'] = '';}
				 if(isset($param['spouse5'])){  $param['spouse5'] =  $this->removeComma2($param['spouse5']);}else{ $param['spouse5'] = '';}
				 if(isset($param['family_person5'])){  $param['family_person5'] =  $this->removeComma2($param['family_person5']);}else{ $param['family_person5'] = '';}
				 if(isset($param['other5'])){  $param['other5'] =  $this->removeComma2($param['other5']);}else{ $param['other5'] = '';}
				 if(isset($param['partial_liability5'])){  $param['partial_liability5'] =  $this->removeComma2($param['partial_liability5']);}else{ $param['partial_liability5'] = '';}			
				 if(isset($param['treatment_costs'])){  $param['treatment_costs'] =  $this->removeComma2($param['treatment_costs']);}else{ $param['treatment_costs'] = '0';}

				 
		 
				//------check if data in tbl_insurance_data if($data['insWorkID']=='0'){   `ins_code_id` = '".$param['code_id']."'  daily_compensation
		if($param['workID']=='0'){  
	      $sql=" INSERT INTO `tbl_insurance_data` (`id`, `date_work`, `cust_name`, `cust_nickname`, `cust_telephone_1`, `insurance_data_type` , `recieve_warning` , `not_recieve_warning` , `recieve_warning_yes`, `insurance_remark`, `insurance_corp_id` , `insurance_start`, `agent_id`, `insurance_no`, `insurance_total_net`, `insurance_total`, `payment_amount` ,  `ins_code_id` ) "
			   . " VALUES "
			   ."('', '".$param['get_ins_date_work']."' ,'".$param['cust_name']."','".$param['cust_nickname']."','".$param['tel1']."','".$param['selectType']."' , '".$param['recieve_warning']."','".$param['not_recieve_warning']."','".$param['recieve_warning_yes']."' ,'".$param['insurance_remark']."', '".$param['corp_id']."' , '".$param['insurance_start']."', '".$param['agent_id']."' ,'".$param['policy_number']."' , '".$param['totalprice_installment']."', '".$param['payment_amount']."' , '".$param['renewal']."' , '".$param['code_id']."' )"
			   ." ";
			
			if($this->db->query($sql)){
					 $returnValue['doDb']='1';
					 $returnValue['workID']=$this->db->insert_id(); 
					//-----insert into other insurance// type_work payment_amount  address_org
					
						if(!isset($param['address_org'])){ $param['address_org']=''; }
						if(!isset($param['address_name'])){ $param['address_name']=''; }
						if(!isset($param['address_no'])){ $param['address_no']=''; }
						if(!isset($param['address_moo'])){ $param['address_moo']=''; }
						if(!isset($param['address_alley'])){ $param['address_alley']=''; }
						if(!isset($param['address_road'])){ $param['address_road']=''; }
						if(!isset($param['address_road'])){ $param['address_road']=''; }
						if(!isset($param['address_subdistric'])){ $param['address_subdistric']=''; }
						if(!isset($param['address_disctric'])){ $param['address_disctric']=''; }
						if(!isset($param['address_disctric'])){ $param['address_disctric']=''; }
						if(!isset($param['address_province'])){ $param['address_province']=''; }
						if(!isset($param['address_postcode'])){ $param['address_postcode']=''; }
						if(!isset($param['address_postcode'])){ $param['address_postcode']=''; }
						if(!isset($param['address_sendtype'])){ $param['address_sendtype']=''; }
						if(!isset($param['address_remark'])){ $param['address_remark']=''; }
						if(!isset($param['address_use_type'])){ $param['address_use_type']=''; }
						if(!isset($param['post_date'])){ $param['post_date']=''; }
						if(!isset($param['post_no'])){ $param['post_no']=''; }
						 
						 $query="INSERT INTO `tbl_insurance_accident_data`(`id`,`work_id`, `company_id`, `renewal`, `policy_old_number`, `policy_number`, `code_id`, `policyholder`, `protected_name1`, `protected_number1`, `protected_sex1`, `protected_date1`, `protected_age1`, `protected_relationship1`, `protected_name2`, `protected_number2`, `protected_sex2`, `protected_date2`, `protected_age2`, `protected_relationship2`, `protected_name3`, `protected_number3`, `protected_sex3`, `protected_date3`, `protected_age3`, `protected_relationship3`, `beneficiary`, `insurance_period`, `insurance_start`, `insurance_start_time`, `insurance_end`, `insurance_end_time`, `assured1`, `spouse1`, `family_person1`, `other1`, `partial_liability1`, `assured2`, `spouse2`, `family_person2`, `other2`, `partial_liability2`, `assured3`, `spouse3`, `family_person3`, `other3`, `partial_liability3`, `assured4`, `spouse4`, `family_person4`, `other4`, `partial_liability4`, `assured5`, `spouse5`, `family_person5`, `other5`, `partial_liability5`, `insurance_price`, `installment`, `totalprice_installment`, `revenue_stamp`, `tax`, `total_price`, `attach`, `contract_startdate`, `contract_enddate`, `type_work`, `broker_name`, `license_number`, `address_name`, `address_org`, `address_no`, `address_moo`, `address_alley`, `address_road`, `address_subdistric`, `address_disctric`, `address_province`, `address_postcode`, `address_sendtype`, `address_remark`, `address_use_type`, `post_date`, `post_no`, `payment_type`, `corp_id`, `date_add`, `user_update`, `cust_name`, `agent_id`, `cust_nickname`, `tel1`, `insurance_limit`, `payment_amount`, `insurance_discount`, `treatment_costs` , `daily_compensation`, `daily_compensation2`, `daily_compensation3`, `daily_compensation4`, `daily_compensation5`) "
						." VALUES "
						."('','".$returnValue['workID']."','".$param['company_id']."','".$param['renewal']."','".$param['policy_old_number']."','".$param['policy_number']."','".$param['code_id']."','".$param['policyholder']."','".$param['protected_name1']."','".$param['protected_number1']."','".$param['protected_sex1']."','".$param['protected_date1']."','".$param['protected_age1']."','".$param['protected_relationship1']."','".$param['protected_name2']."','".$param['protected_number2']."','".$param['protected_sex2']."','".$param['protected_date2']."','".$param['protected_age2']."','".$param['protected_relationship2']."','".$param['protected_name3']."','".$param['protected_number3']."','".$param['protected_sex3']."','".$param['protected_date3']."','".$param['protected_age3']."','".$param['protected_relationship3']."','".$param['beneficiary']."',  '".$param['insurance_period']."'  ,  '".$param['insurance_start']."'  ,  '".$param['insurance_start_time']."',  '".$param['insurance_end']."',  '".$param['insurance_end_time']."',  '".$param['assured1']."',  '".$param['spouse1']."' ,  '".$param['family_person1']."',  '".$param['other1']."',  '".$param['partial_liability1']."',  '".$param['assured2']."',  '".$param['spouse2']."',   '".$param['family_person2']."',   '".$param['other2']."',   '".$param['partial_liability2']."',   '".$param['assured3']."',   '".$param['spouse3']."',   '".$param['family_person3']."',   '".$param['other3']."',   '".$param['partial_liability3']."',   '".$param['assured4']."',   '".$param['spouse4']."',   '".$param['family_person4']."',   '".$param['other4']."',   '".$param['partial_liability4']."',   '".$param['assured5']."',   '".$param['spouse5']."',   '".$param['family_person5']."',   '".$param['other5']."',   '".$param['partial_liability5']."',   '".$param['insurance_price']."',   '".$param['installment']."',   '".$param['totalprice_installment']."',   '".$param['revenue_stamp']."',   '".$param['tax']."',   '".$param['total_price']."',   '".$param['attach']."',   '".$param['contract_startdate']."',   '".$param['contract_enddate']."',   '".$param['type_work']."',   '".$param['broker_name']."',   '".$param['license_number']."',   '".$param['address_name']."',   '".$param['address_org']."',   '".$param['address_no']."',   '".$param['address_moo']."',   '".$param['address_alley']."',   '".$param['address_road']."',  '".$param['address_subdistric']."'  ,  '".$param['address_disctric']."' ,  '".$param['address_province']."', '".$param['address_postcode']."',  '".$param['address_sendtype']."', '".$param['address_remark']."',  '".$param['address_use_type']."', '".$param['post_date']."'  ,  '".$param['post_no']."' ,  '".$param['payment_type']."',  '".$param['corp_id']."',  '".$today."',  '".$param['adminID']."',  '".$param['cust_name']."', '".$param['agent_id']."', '".$param['cust_nickname']."', '".$param['tel1']."', '".$param['insurance_limit']."', '".$param['payment_amount']."', '".$param['insurance_discount']."', '".$param['treatment_costs']."', '".$param['daily_compensation']."', '".$param['daily_compensation2']."', '".$param['daily_compensation3']."', '".$param['daily_compensation4']."', '".$param['daily_compensation5']."')";
						
						if($this->db->query($query)){
							 $returnValue['doDbOther']='1';
					 		 $returnValue['Insurance_otherID']=$this->db->insert_id(); 
						}else{
							 $returnValue['doDbOther']='1';
					 		 $returnValue['Insurance_otherID']="ErrorInsertInsuranceOther 4";
						}
						//$returnValue['query']=$query;
					
				
			}else{
					$returnValue['doDbOther']='0';
					$returnValue['workID']="ErrorInsertInsurancePA";  // date_registration_end brand_id   recieve_warning_yes insWorkID contract_startdate
			}
					
		}else{ 
		 	
			$sql = "UPDATE tbl_insurance_data SET `date_work` = '".$param['get_ins_date_work']."' , `cust_name`='".$param['cust_name']."', `cust_nickname`='".$param['cust_nickname']."', `cust_telephone_1`='".$param['tel1']."'  , `recieve_warning`='".$param['recieve_warning']."' , `not_recieve_warning` ='".$param['not_recieve_warning']."' , `recieve_warning_yes` = '".$param['recieve_warning_yes']."'  , `insurance_remark` = '".$param['insurance_remark']."' , `insurance_corp_id`='".$param['corp_id']."' , `insurance_start` = '".$param['insurance_start']."' ,`agent_id`='".$param['agent_id']."' ,`insurance_no`='".$param['policy_number']."' , `insurance_total_net` = '".$param['totalprice_installment']."' ,`insurance_total`=  '".$param['payment_amount']."' , `insurance_renew`='".$param['renewal']."' , `ins_code_id` = '".$param['code_id']."' "
				." WHERE id = '".$param['workID']."' ";
			  if($this->db->query($sql)){
					 $returnValue['doDb']='1';
					 $returnValue['workID']=$param['workID'];
				  	 //-------toher insurance post_date adminID type contract_startdate treatment_costs
				  	 $query="UPDATE `tbl_insurance_accident_data` SET `type`= '".$param['type']."',`company_id`='".$param['company_id']."',`renewal`='".$param['renewal']."',`policy_old_number`='".$param['policy_old_number']."',`policy_number`='".$param['policy_number']."',`code_id`='".$param['code_id']."',`policyholder`='".$param['policyholder']."',`protected_name1`='".$param['protected_name1']."',`protected_number1`='".$param['protected_number1']."',`protected_sex1`='".$param['protected_sex1']."',`protected_date1`='".$param['protected_date1']."',`protected_age1`='".$param['protected_age1']."',`protected_relationship1`='".$param['protected_relationship1']."',`protected_name2`='".$param['protected_name2']."',`protected_number2`='".$param['protected_number2']."',`protected_sex2`='".$param['protected_sex2']."',`protected_date2`='".$param['protected_date2']."',`protected_age2`='".$param['protected_age2']."',`protected_relationship2`='".$param['protected_relationship2']."',`protected_name3`='".$param['protected_name3']."',`protected_number3`='".$param['protected_number3']."',`protected_sex3`='".$param['protected_sex3']."',`protected_date3`='".$param['protected_date3']."',`protected_age3`='".$param['protected_age3']."',`protected_relationship3`='".$param['protected_relationship3']."',`beneficiary`='".$param['beneficiary']."',`insurance_period`='".$param['insurance_period']."',`insurance_start`='".$param['insurance_start']."',`insurance_start_time`='".$param['insurance_start_time']."',`insurance_end`='".$param['insurance_end']."',`insurance_end_time`='".$param['insurance_end_time']."',`assured1`='".$param['assured1']."',`spouse1`='".$param['spouse1']."',`family_person1`='".$param['family_person1']."',`other1`='".$param['other1']."',`partial_liability1`='".$param['partial_liability1']."',`assured2`='".$param['assured2']."',`spouse2`='".$param['spouse2']."',`family_person2`='".$param['family_person2']."',`other2`='".$param['other2']."',`partial_liability2`='".$param['partial_liability2']."',`assured3`='".$param['assured3']."',`spouse3`='".$param['spouse3']."',`family_person3`='".$param['family_person3']."',`other3`='".$param['other3']."',`partial_liability3`='".$param['partial_liability3']."',`assured4`='".$param['assured4']."',`spouse4`='".$param['spouse4']."',`family_person4`='".$param['family_person4']."',`other4`='".$param['other4']."',`partial_liability4`='".$param['partial_liability4']."',`assured5`='".$param['assured5']."',`spouse5`='".$param['spouse5']."',`family_person5`='".$param['family_person5']."',`other5`='".$param['other5']."',`partial_liability5`='".$param['partial_liability5']."',`insurance_price`='".$param['insurance_price']."',`installment`='".$param['installment']."',`totalprice_installment`='".$param['totalprice_installment']."',`revenue_stamp`='".$param['revenue_stamp']."',`tax`='".$param['tax']."',`total_price`='".$param['total_price']."',`attach`='".$param['attach']."',`contract_startdate`='".$param['contract_startdate']."',`contract_enddate`='".$param['contract_enddate']."',`type_work`='".$param['type_work']."',`broker_name`='".$param['broker_name']."',`license_number`='".$param['license_number']."',`address_name`='".$param['address_name']."',`address_org`='".$param['address_org']."',`address_no`='".$param['address_no']."',`address_moo`='".$param['address_moo']."',`address_alley`='".$param['address_alley']."',`address_road`='".$param['address_road']."',`address_subdistric`='".$param['address_subdistric']."',`address_disctric`='".$param['address_disctric']."',`address_province`='".$param['address_province']."',`address_postcode`='".$param['address_postcode']."',`address_sendtype`='".$param['address_sendtype']."',`address_remark`='".$param['address_remark']."',`address_use_type`='".$param['address_use_type']."',`payment_type`='".$param['payment_type']."',`corp_id`='".$param['corp_id']."', `date_add`='".$today."', `user_update`='".$param['adminID']."', `cust_name`='".$param['cust_name']."', `agent_id` ='".$param['agent_id']."', `cust_nickname` ='".$param['cust_nickname']."', `tel1` ='".$param['tel1']."', `insurance_limit` ='".$param['insurance_limit']."', `payment_amount` ='".$param['payment_amount']."', `insurance_discount` ='".$param['insurance_discount']."' , `treatment_costs`='".$param['treatment_costs']."' , `daily_compensation`='".$param['daily_compensation']."' , `daily_compensation2`='".$param['daily_compensation2']."' , `daily_compensation3`='".$param['daily_compensation3']."' , `daily_compensation4`='".$param['daily_compensation4']."' , `daily_compensation5`='".$param['daily_compensation5']."'   WHERE `id`= '".$param['Insurance_otherID']."'";
						 //$returnValue['sql_updateOther']=$query;
						if($this->db->query($query)){
							 $returnValue['doDbOther']='1';
					 		 $returnValue['Insurance_otherID']=$param['Insurance_otherID']; 
						}else{
							 $returnValue['doDbOther']='1';
					 		 $returnValue['Insurance_otherID']="ErrorUpdateInsuranceOther 4";
						}
						//$returnValue['query']=$query; address_postcode
					
				  	
				  	
				}else{
					$returnValue['doDbOther']='0';
					$returnValue['workID']="ErrorUpdateOther";
				}
		}
				//------------end case 4-------------------
			break;

		}
		
		
		
		
		
		$returnValue['sql']=$sql;
		return $returnValue;
	}
	//-----------------------------
}
?>
