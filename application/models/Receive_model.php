<?php
 class Receive_model extends CI_Model
 {
   function __construct()
    {
        parent::__construct();
    }
  ###########################################################
	 //----------------------------------
	 function translateDateToEng3($date){
		if($date!=''){
		 $dateArray = explode("/",$date);
		 $dateArray[2] = $dateArray[2]-543;
		 $showDate = $dateArray[2]."-".$dateArray[1]."-".$dateArray[0];
		 }else{
			$showDate = "0000-00-00";
		}
		 return $showDate;
	 }	
	 function translateDateToThai3($date){
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
	 function removeComma3($theValue){
		$NewValue = str_replace(",","",$theValue);
		return $NewValue;
  	}
  ########################################################### upateVale, mainID:mainID
  #-----------------------------------------------------
  function updateCheckPayment($param){
	$returnValue = array();
	$returnValue['pass']=0;
	$sql="UPDATE tb_record_money_received SET check_payment_pass = '".$param['upateVale']."' WHERE id = '".$param['mainID']."'  ";
    if($this->db->query($sql)){
		$returnValue['pass']=1;
	}
	return $returnValue;
  }
  #-----------------------------------------------------
  function cancheckPayment($user_id){
		$returnValue = array();
		$returnValue['canCheckPayment'] = 0;
        $sql = "SELECT payment_check FROM tbl_user_data WHERE id = '".$user_id."' ";
		$result = $this->db->query($sql)->result();
		foreach($result AS $data){
			$returnValue['canCheckPayment']=$data->payment_check;
		}
		return $returnValue;
  }
  #-----------------------------------------------------
	 function GetPrintRevieve($RecieveID){
		 $returnValue = array();
		 $returnValue['carcheck_amt'] = 0;
		 $returnValue['tax_amt'] = 0;
		 $returnValue['tax_service_amt'] = 0;
		 $returnValue['act_amt'] = 0;
		 $returnValue['insurance_amt'] = 0;
		 $returnValue['installment_period'] = 0;
		 $returnValue['installment_amt'] = 0;
		 $returnValue['recieve_from'] = '';
		 $returnValue['recieve_date'] = '';
		 $returnValue['other'] = 0;
		 $sql="SELECT * FROM  tb_record_money_received WHERE id = '".$RecieveID."' ";
		 $returnValue['sql-main']=$sql;
		 $result=$this->db->query($sql)->result();
		 foreach($result AS $data){ 
		 	$returnValue['recieve_from']=$data->payment_by;
		 	$returnValue['recieve_date']=$data->date_transfer;
		 	$returnValue['other_payment']=$data->other_payment;
		 }
		 $sql="SELECT SUM(carcheck_amt) AS carcheck_amt ,  SUM(tax_amt) AS tax_amt , SUM(tax_service_amt) AS tax_service_amt , SUM(act_amt) AS act_amt , SUM(insurance_amt) AS insurance_amt , SUM(installment_amt) AS installment_amt , installment_period "
			 ." FROM tb_record_money_received_detail WHERE recieve_id  = '".$RecieveID."' AND data_status='1' GROUP BY recieve_id ";
		 $returnValue['sql']=$sql;
		 $result=$this->db->query($sql)->result();
		 foreach($result AS $data){
			 $returnValue['carcheck_amt'] = $data->carcheck_amt;
			 $returnValue['tax_amt'] = $data->tax_amt;
			 $returnValue['tax_service_amt'] = $data->tax_service_amt;
			 $returnValue['act_amt'] = $data->act_amt;
			 $returnValue['insurance_amt'] = $data->insurance_amt;
		 }
		 $sql="SELECT a.installment_period , a.installment_amt , max(b.period) AS MaxPeriod  FROM tb_record_money_received_detail AS a "
			 ." LEFT JOIN  tbl_insurance_payment AS b ON a.insurance_id  =b.work_id  "
			 ."  WHERE a.recieve_id  = '".$RecieveID."' AND a.installment_period > 0   AND a.data_status='1' ";
		 $returnValue['sqlInstallment']=$sql;
		 $result=$this->db->query($sql)->result();
		 $returnValue['textInstallment'] = '';
		 $returnValue['installment_period']=array();
		 $returnValue['installment_amt']=array();
		 $returnValue['all_installment_amt'] = 0;
		 $returnValue['totalInsuranceAmt'] = 0;
		  foreach($result AS $data){
			 $returnValue['textInstallment'] = $returnValue['textInstallment']." งวด ".$data->installment_period."/".$data->MaxPeriod;
			// $returnValue['installment_period'][] = $data->installment_period;
			 //$returnValue['installment_amt'][] = $data->installment_amt;
			 if($data->installment_amt>0){
				  $returnValue['all_installment_amt'] = $returnValue['all_installment_amt']+$data->installment_amt;
			 }
		  }
		 $returnValue['totalInsuranceAmt']=$returnValue['insurance_amt']+$returnValue['all_installment_amt'];
	     return $returnValue;
	 }
  #-----------------------------------------------------gettype  carcheck  tax tax_service act insurance  
	 function getValuePayment($data){
		 $allType =1;
		 switch($data['gettype']){
				 case "carcheck";
				 	$field='car_check_price';
				 	$field2=',amt_recieve_carcheck';
				 	$field2Txt='amt_recieve_carcheck';
				    $isIns = 0;
				 break;
				 case "tax";
				 	$field='tax_price';
				 	$field2=', amt_recieve_tax';
				 	$field2Txt='amt_recieve_tax';
				    $isIns = 0;
				 break;
				 case "tax_service";
				 	$field='tax_service';
				 	$field2='';
				 	$field2Txt='';
				    $isIns = 0;
				 break;
				 case "act";
				 	$field='act_price_total';
				 	$field2=',amt_recieve_act';
				 	$field2Txt='amt_recieve_act';
				    $isIns = 0;
				 break;
			 	case "insurance";
				 	$field='insurance_total';
				 	$field2=',amt_recieve_ins';
				 	$field2Txt='amt_recieve_ins';
				    $isIns = 1;
				 break;
		 }
		 switch($data['insType']){
			case "1" :
				$tbl = " tbl_insurance_data ";
				$fileID = ' id ';
				$allType =1;
			break;	
		 	case "2" :
				$tbl = " tbl_insurance_travel_data ";
				$field='payment_amount';
				$field2=',amt_recieve_ins';
				$field2Txt='amt_recieve_ins';
				$fileID = ' work_id ';
				$allType =0;
			break;	
			 case "3" :
				$field='payment_amount';
				$field2=',amt_recieve_ins';
				$field2Txt='amt_recieve_ins';
				$tbl = " tbl_insurance_shpping_data ";
				$fileID = ' work_id ';
				$allType =0;
			break;				 
		 	 case "4" :
				$field='payment_amount';
				$field2=',amt_recieve_ins';
				$field2Txt='amt_recieve_ins';
				$tbl = " tbl_insurance_accident_data "; 
				$fileID = ' work_id ';
				$allType =0;
			 break;
			 case "5" :
				$field='payment_amount';
				$field2=',amt_recieve_ins';
				$field2Txt='amt_recieve_ins';
				$tbl = " tbl_insurance_home_data "; 
				$fileID = ' work_id ';
				$allType =0;
		 	break;	 
		 }
		  $returnValue['insType']=$data['insType']; 
		  $returnValue = array();
		  $returnValue['value']=0;
		  $returnValue['valueAmt']=0;
		  $Sql="SELECT $field $field2 FROM $tbl WHERE $fileID = '".$data['insID']."' ";
		  $result = $this->db->query($Sql)->result();
		  $returnValue['sql']=$Sql;
		  foreach($result AS $GetData){
				      $returnValue['value']=number_format($GetData->$field,2);
			  	  if($field2Txt!=''){
					  $returnValue['valueAmt']=number_format($GetData->$field2Txt,2);
				  }else{
					   $returnValue['valueAmt']='';
				  }
			     //----------เงื่อนไข return---------//
			     if($returnValue['valueAmt']>0){ $returnValue['value']=$returnValue['valueAmt']; }
			     if(($allType==0)&&($isIns==0)){
					 $returnValue['value']='';
				 }
			    /* if(($data['insType']>1)&&(($data['gettype']=='carcheck') ||($data['gettype']=='tax_price')||($data['gettype']=='tax_service')||($data['gettype']=='act'))){
					 $returnValue['value'] ='';
				 } */
			  $returnValue['checkAllTypeIsIns']=$allType." ".$isIns;
		 }
		  /*switch($data['gettype']){
				 case "carcheck";
				 	$field='car_check_price';
				 	$field2=',amt_recieve_carcheck';
				 	$field2Txt='amt_recieve_carcheck';
				    $isIns = 0;
				 break;
				 case "tax";
				 	$field='tax_price';
				 	$field2=', amt_recieve_tax';
				 	$field2Txt='amt_recieve_tax';
				    $isIns = 0;
				 break;
				 case "tax_service";
				 	$field='tax_service';
				 	$field2='';
				 	$field2Txt='';
				    $isIns = 0;
				 break;
				 case "act";
				 	$field='act_price_total';
				 	$field2=',amt_recieve_act';
				 	$field2Txt='amt_recieve_act';
				    $isIns = 0;
				 break;
			 	case "insurance";
				 	$field='insurance_total';
				 	$field2=',amt_recieve_ins';
				 	$field2Txt='amt_recieve_ins';
				    $isIns = 1;
				 break;
		 }*/
		 return $returnValue;
	 }
  #----------------------------------------------------- insurance_id, period 
	 function getInstallmentOne($data){
		 $returnValue = array();
		 $returnValue['value']=0;
		 $sql="SELECT is_payment , (amount-discount) AS amount FROM tbl_insurance_payment WHERE work_id = '".$data['insurance_id']."' AND period='".$data['period']."'  ";
		 $result = $this->db->query($sql)->result();
		 foreach($result AS $data){
			  $returnValue['value']=number_format($data->amount,2);
			  $returnValue['is_payment']=$data->is_payment;
		 }
		 $returnValue['sql']=$sql;
		 return $returnValue;
	 }
  #----------------------------------------------------- 
	 function getCustFromRevieve($recieve_id){
		 $sql = "SELECT a.id , a.work_id , b.cust_name "
			 ." FROM tb_recieve_ins_id AS a "
			 ." LEFT JOIN tbl_insurance_data AS b ON a.work_id = b.id "
			 ." WHERE a.recieve_id = '".$recieve_id."' ";
		 $result =$this->db->query($sql)->result();
		 $returnValue = array();
		 foreach($result AS $data){
			 $returnValue[] = $data->cust_name;
		 }
		 return $returnValue;
	 }
  #----------------------------------------------------- 
	 function getRecieveList($data){
		  $returnValue = array();
		 //bank_id:bank_id, selectDay:selectDay , selectMonth:selectMonth, selectYear:selectYear
		  $txtWhereBank = '';
		 /* if(($data['selectDay']=='all')&&($data['selectMonth']=='all')){
		 		$txtWhereDate = " AND YEAR(a.date_transfer) = '".$data['selectYear']."' ";
		  }else if(($data['selectDay']=='all')&&($data['selectMonth']!='all')){
		 		$txtWhereDate = " AND  MONTH(a.date_transfer) = '".$data['selectMonth']."' AND YEAR(a.date_transfer) = '".$data['selectYear']."' ";
          }else if(($data['selectDay']=='all')&&($data['selectMonth']!='all')){
		 		$txtWhereDate = " AND  DAY(a.date_transfer) = '".$data['selectDay']."' AND YEAR(a.date_transfer) = '".$data['selectYear']."' ";			  
		  }else{
			   	$dateSelect = $data['selectYear']."-".$data['selectMonth']."-".$data['selectDay'];
			    $txtWhereDate = " AND a.date_transfer ='".$dateSelect."' ";
		  }

		  
		  if(($data['selectDayEnd']=='all')&&($data['selectMonthEnd']=='all')){
		 		$txtWhereDateEnd = " AND YEAR(a.date_transfer) = '".$data['selectYear']."' ";
		  }else if(($data['selectDayEnd']=='all')&&($data['selectMonthEnd']!='all')){
		 		$txtWhereDateEnd = " AND  MONTH(a.date_transfer) = '".$data['selectMonthEnd']."' AND YEAR(a.date_transfer) = '".$data['selectYear']."' ";
          }else if(($data['selectDayEnd']=='all')&&($data['selectMonthEnd']!='all')){
		 		$txtWhereDateEnd = " AND  DAY(a.date_transfer) = '".$data['selectDayEnd']."' AND YEAR(a.date_transfer) = '".$data['selectYear']."' ";			  
		  }else{
			   	$txtWhereDateEnd = $data['selectYear']."-".$data['selectMonth']."-".$data['selectDay'];
			    $txtWhereDate = " AND a.date_transfer ='".$dateSelect."' "; 

				selectDayEnd selectMonthEnd selectMonthEnd
		  }*/
			$dataStart = $data['selectYear']."-".$data['selectMonth']."-".$data['selectDay'];
			$dateEnd = $data['selectYearEnd']."-".$data['selectMonthEnd']."-".$data['selectDayEnd'];

			$txtWhereDate  = " AND a.date_transfer BETWEEN '".$dataStart."' AND '".$dateEnd."' ";
		   
			   if (empty($data['bank_id'])) { 
					$txtWhereBank='';
			   }else{
					$data['bank_id']=implode(",",$data['bank_id']);
			  		$txtWhereBank = " AND a.bank_id IN (".$data['bank_id'].")  ";
			   }
		
		//---------------------------
		//-----get user cheakpaymet---
        $audit=$this->cancheckPayment($this->session->userdata('user_id'));
		$txtWhereSecret  = "  ";
		if($audit['canCheckPayment']=='0'){
			$txtWhereSecret  = " AND a.is_secret ='0' ";
		}
		//---------------------------

		 $sql="SELECT
				a.id AS mainID,
				a.*,  CASE pay_type
				WHEN 1 THEN 'ธนบัตร'
				WHEN 2 THEN 'โอนเงิน'
				WHEN 3 THEN 'บัตรเครดิต'
				WHEN 4 THEN 'เช็ค'
				END AS PayType ,
				CONCAT(
					b.bank_name,
					' ',
					b.bank_acc_name,
					' ',
					b.bank_number
				) AS bankName,
				c.id AS detailID,
				c.insurance_id,
				c.carcheck_amt,
				c.tax_amt,
				c.tax_service_amt,
				c.act_amt,
				c.insurance_amt,
				c.installment_period,
				c.installment_amt,
				d.cust_name,
				d.vehicle_regis, d.insurance_data_type , 
				c.dc_cost, c.dc_cost_check ,
				CASE 
					WHEN d.insurance_data_type='1' THEN CONCAT(d.vehicle_regis, ' ', e.province_name)
					WHEN d.insurance_data_type='2' THEN  ( SELECT CONCAT('', trav.cust_name) FROM tbl_insurance_travel_data AS trav WHERE d.id = trav.work_id) 
					WHEN d.insurance_data_type='3' THEN ( SELECT CONCAT( '', tisd.register) FROM tbl_insurance_shpping_data AS tisd WHERE d.id = tisd.work_id )
					WHEN d.insurance_data_type='4' THEN ( SELECT CONCAT( '', acd.cust_name ) FROM tbl_insurance_accident_data AS acd WHERE d.id = acd.work_id )
					WHEN d.insurance_data_type='5' THEN ( SELECT CONCAT( '', home.cust_name ) FROM tbl_insurance_home_data AS home WHERE d.id = home.work_id )
				ELSE a.payment_by
				END AS customer_desc ,
				CONCAT(d.vehicle_regis, ' ', e.province_name) AS carRegister ,
				(SELECT COUNT(id) FROM tb_record_money_received_detail WHERE recieve_id =c.recieve_id AND data_status='1' GROUP BY recieve_id ) AS CountMaxRow
			FROM
				tb_record_money_received AS a
			LEFT JOIN
				tbl_bookbank_data AS b
				ON a.bank_id = b.id
			LEFT JOIN
				tb_record_money_received_detail AS c
				ON c.recieve_id = a.id AND c.data_status = '1'
			LEFT JOIN
				tbl_insurance_data AS d
				ON c.insurance_id = d.id
			LEFT JOIN
				tbl_province AS e
				ON d.province_regis = e.id
			WHERE 1
				 $txtWhereBank $txtWhereDate $txtWhereSecret 
				AND a.main_data_status = '1'  AND a.transfer_amt > 0
			ORDER BY
				a.date_transfer ASC ";   // , a.id ASC;
		 $returnValue['getDb']=$this->db->query($sql)->result();
		 $returnValue['sql']=$sql;
		 return $returnValue;
	 }
  #-----------------------------------------------------
	 function getCarRegis($workID){
		  $returnValue = array();
		  $sql="SELECT a.* , b.province_name  "
			 ." FROM tbl_insurance_data AS a "
			 ." LEFT JOIN  tbl_province AS b ON a.province_regis=b.id "
			 ." WHERE a.id = '".$workID."' "
			 ."  ";
		  $returnValue['sql']=$sql;
		  $result = $this->db->query($sql)->result();
		  foreach($result AS $data){
			  $returnValue['regist'] = $data->vehicle_regis." ".$data->province_name;
		  }
		 return $returnValue;
	 }
  #-----------------------------------------------------selectMonth:selectMonth,selectYear:selectYear,paytype:paytype,bank_transfer_id:bank_transfer_id 
	 function getRecieveReport($data){
		 $returnValue = array();
		 $txtWhereDateRecieve = '';
		 $txtWhereDatePayment = '';
		 $txtpaytypeRecieve = '';
		 $txtpaytypePayment = '';
		 $txtBankRecieve = '';
		 $txtBankPayment = '';
		 $txtpaytypeCash = '';
		 $txtBankCash= '';
		 $txtBankSelect = '';
		 $txtBankSelect2  = "";
		 $txtBankSelect3 = '';
		 if($data['selectMonth']!='all'){
			  $txtWhereDateRecieve = " AND MONTH(a.date_recieve)='".$data['selectMonth']."' AND YEAR(a.date_recieve)='".$data['selectYear']."' ";
			  $txtWhereDatePayment = " AND MONTH(c.receipt_date)='".$data['selectMonth']."' AND YEAR(c.receipt_date)='".$data['selectYear']."' ";
			  $txtWhereDateCash = " AND MONTH(derived_table.date_recieve)='".$data['selectMonth']."' AND YEAR(derived_table.date_recieve)='".$data['selectYear']."' ";
		 }else if($data['selectMonth']=='all'){
			  $txtWhereDateRecieve = " AND  YEAR(a.date_recieve)='".$data['selectYear']."' ";
			  $txtWhereDatePayment = " AND  YEAR(c.receipt_date)='".$data['selectYear']."' ";
			  $txtWhereDateCash = " AND  YEAR(derived_table.date_recieve)='".$data['selectYear']."' ";
		 }
		 if($data['paytype']!='0'){ 
		 	$txtpaytypeRecieve = " AND a.paytype = '".$data['paytype']."' ";
		 	$txtpaytypePayment = " AND c.pay_type = '".$data['paytype']."' ";
		 	$txtpaytypeCash = " AND  derived_table3.paytype = '".$data['paytype']."' ";
		 }
		 // cust_name 
		 // SUM(cash_collection_carcheck+cash_collection_tax+cash_collection_act+cash_collection_ins) AS amp_recieve 
		  if($data['bank_transfer_id']=='x'){ 
			  $txtBankRecieve = "  ";
			  $txtBankPayment = " ";
			  $txtSum = " LEFT JOIN (
					SELECT id, 
						   SUM(amt_recieve_carcheck + amt_recieve_tax + amt_recieve_act + amt_recieve_ins) AS amp_recieve 
					FROM tbl_insurance_data 
					WHERE 1
					GROUP BY id
				) AS summed_data ON f.id = summed_data.id  ";
			  $selectCase3 = "SELECT CASE
								  WHEN car_check_pay_bank_id <>'0'  THEN car_check_pay_bank_id
								  WHEN tax_pay_bank_id <>'0' THEN tax_pay_bank_id
								  WHEN act_pay_bank_id <>'0' THEN act_pay_bank_id
								  WHEN ins_pay_bank_id <>'0' THEN ins_pay_bank_id
							  END AS bank_transfer_id , ";
		  }else if($data['bank_transfer_id']!='x'){
			 $txtBankRecieve = " AND a.bank_transfer_id = '".$data['bank_transfer_id']."' ";
			 $txtBankPayment = " AND c.bank_id = '".$data['bank_transfer_id']."' ";
			 $txtSum = " LEFT JOIN (
					SELECT id, 
						   SUM( CASE 
								WHEN car_check_pay_bank_id = 0 THEN 0 
								ELSE amt_recieve_carcheck 
								END +
								CASE 
									WHEN tax_pay_bank_id = 0 THEN 0 
									ELSE amt_recieve_tax 
								END +
								CASE 
									WHEN act_pay_bank_id = 0 THEN 0 
									ELSE amt_recieve_act 
								END +
								CASE 
									WHEN ins_pay_bank_id = 0 THEN 0 
									ELSE amt_recieve_ins 
								END
							) AS amp_recieve 
					FROM tbl_insurance_data 
					WHERE car_check_pay_bank_id = '".$data['bank_transfer_id']."'
					   OR tax_pay_bank_id = '".$data['bank_transfer_id']."' 
					   OR act_pay_bank_id = '".$data['bank_transfer_id']."' 
					   OR ins_pay_bank_id = '".$data['bank_transfer_id']."'
					GROUP BY id
				) AS summed_data ON f.id = summed_data.id  ";
			  $selectCase3 = "SELECT CASE
								  WHEN car_check_pay_bank_id = '".$data['bank_transfer_id']."'  THEN car_check_pay_bank_id
								  WHEN tax_pay_bank_id = '".$data['bank_transfer_id']."' THEN tax_pay_bank_id
								  WHEN act_pay_bank_id = '".$data['bank_transfer_id']."' THEN act_pay_bank_id
								  WHEN ins_pay_bank_id = '".$data['bank_transfer_id']."' THEN ins_pay_bank_id
							  END AS bank_transfer_id ,";
			   $txtBankSelect3  =" AND bank_transfer_id = '".$data['bank_transfer_id']."' ";
		  }
		 $sql = "SELECT 1 AS Type1 , a.id ,  a.date_recieve , a.amp_recieve , a.bank_transfer_id  , a.paytype , a.remark ,  CONCAT(b.bank_name,' ',b.bank_acc_name) AS bankName   "
			  .", CASE WHEN a.paytype = '1' THEN 'เงินสด'  WHEN a.paytype = '2' THEN 'เงินโอน'      WHEN a.paytype = '3' THEN 'บัตรเครดิต'     WHEN a.paytype = '4' THEN 'เช็ค'      ELSE ''   END AS PayType "
			  .", 0 AS workID , 0 AS cust_name , 0 AS insurance_data_type"
			  ." FROM tb_recieve_record AS a "
			  ." LEFT JOIN tbl_bookbank_data AS b ON a.bank_transfer_id=b.id "
			  ." WHERE 1  $txtWhereDateRecieve $txtpaytypeRecieve $txtBankRecieve "
			  ." HAVING (SELECT COUNT(id) FROM tb_recieve_ins_id WHERE recieve_id = a.id) > 0 "
			  ." UNION "
			  ." SELECT 2  AS Type1 , c.id, c.receipt_date AS date_recieve  , c.amount AS amp_recieve , c.bank_id AS bank_transfer_id , c.pay_type AS paytype , c.remark ,  CONCAT(d.bank_name,' ',d.bank_acc_name) AS bankName "
			  .", CASE WHEN c.pay_type = '1' THEN 'เงินสด'  WHEN c.pay_type = '2' THEN 'เงินโอน'      WHEN c.pay_type = '3' THEN 'บัตรเครดิต'     WHEN c.pay_type = '4' THEN 'เช็ค'      ELSE ''   END AS PayType "
			  .", c.work_id AS workID , e.cust_name , e.insurance_data_type "
		      ." FROM tbl_insurance_payment AS c "
			  ." LEFT JOIN tbl_bookbank_data AS d ON c.bank_id=d.id "
			  ." LEFT JOIn tbl_insurance_data AS e ON c.work_id = e.id "
		 	  ." WHERE c.recieve_id='0' AND c.bank_id > '0'  $txtWhereDatePayment $txtpaytypePayment $txtBankPayment "
			  ." UNION "
			 ." SELECT 3 AS Type1,
				   f.id,
				   derived_table.date_recieve ,  IFNULL(summed_data.amp_recieve, 0) AS amp_recieve 
				   ,derived_table2.bank_transfer_id,
				   derived_table3.paytype,
				   '' AS remark,
				   CONCAT(g.bank_name, ' ', g.bank_acc_name) AS bankName,
				   CASE 
					   WHEN derived_table3.paytype = '1' THEN 'เงินสด'
					   WHEN derived_table3.paytype = '2' THEN 'เงินโอน'
					   WHEN derived_table3.paytype = '3' THEN 'บัตรเครดิต'
					   WHEN derived_table3.paytype = '4' THEN 'เช็ค'
					   ELSE '' 
				   END AS PayType,
				   f.id AS workID,
				   f.cust_name,
				   f.insurance_data_type
			FROM tbl_insurance_data AS f 
			$txtSum
			LEFT JOIN (
					   SELECT CASE
								  WHEN car_check_receipt_date <> '' THEN car_check_receipt_date
								  WHEN tax_receipt_date <> '' THEN tax_receipt_date
								  WHEN act_receipt_date <> '' THEN act_receipt_date
								  WHEN ins_receipt_date <> '' THEN ins_receipt_date
							  END AS date_recieve,
							  id
					   FROM tbl_insurance_data
					  ) AS derived_table ON f.id = derived_table.id
			LEFT JOIN (
					   $selectCase3   id
					   FROM tbl_insurance_data 
					  ) AS derived_table2 ON f.id = derived_table2.id 
			LEFT JOIN (
					   SELECT CASE
								  WHEN car_check_pay_type <> '0' THEN car_check_pay_type
								  WHEN tax_pay_type <> '0' THEN tax_pay_type
								  WHEN act_pay_type <> '0' THEN act_pay_type
								  WHEN ins_pay_type <> '0' THEN ins_pay_type
							  END AS paytype,
							  id
					   FROM tbl_insurance_data
					  ) AS derived_table3 ON f.id = derived_table3.id
			LEFT JOIN tbl_bookbank_data AS g ON derived_table2.bank_transfer_id = g.id "
	        ." WHERE 1  $txtWhereDateCash $txtpaytypeCash   $txtBankSelect3  "    //$txtBankCash AND f.is_installment ='0'
			 //." HAVING (SELECT COUNT(id) FROM tb_recieve_ins_id WHERE work_id = f.id) > 0 "
			."  ORDER BY date_recieve ASC  ";
   //.", CASE WHEN a.paytype = '1' THEN 'เงินสด'  WHEN a.paytype = '2' THEN 'เงินโอน'      WHEN a.paytype = '3' THEN 'บัตรเครดิต'     WHEN a.paytype = '4' THEN 'เช็ค'      ELSE ''   END AS PayType "
		 $returnValue['getDb']=$this->db->query($sql)->result();
		 $returnValue['sql']=$sql;
		 return $returnValue;
	 }
  #----------------------------------------------------- 
	 function updateRecieveData($data){
		  // RecieveID:RecieveID,changeValue:changeValue,field  date_recieve amp_recieve
		 if($data['field']=='date_transfer'){
			 $data['changeValue']=$this->translateDateToEng3($data['changeValue']);
		 }
		 if($data['field']=='transfer_amt'){
			 $data['changeValue']=$this->removeComma3($data['changeValue']);
		 }	
		 $returnValue = array();
		 $returnValue['doDb']='0';
		 if($data['RecieveID']==0){
			  $sql="INSERT INTO tb_record_money_received(id , ".$data['field']." , is_secret) VALUES ('', '".$data['changeValue']."' , '".$data['isSeCret']."')";
			  if($this->db->query($sql)){
				  $returnValue['doDb']='1';
				  $returnValue['RecieveID']=$this->db->insert_id();
		 	  }			 
		 }else{
			  //$sql = "UPDATE tb_record_money_received SET ".$data['field']." = '".$data['changeValue']."' , is_secret = '".$data['isSeCret']."' WHERE id ='".$data['RecieveID']."'  ";
			  $sql = "UPDATE tb_record_money_received SET ".$data['field']." = '".$data['changeValue']."'  WHERE id ='".$data['RecieveID']."'  ";
			  if($this->db->query($sql)){
				  $returnValue['doDb']='1';
				  $returnValue['RecieveID']=$data['RecieveID'];
		 	  }
		 }
		  $returnValue['sql']=$sql;
		  return $returnValue;
	 }
  #-----------------------------------------------------  data_type:data_type,countInstallment:countInstallment data_type,countInstallment   recieveInsID  work_id recieve_id data_type countInstallment
	 function DeleteRecieveIns($data){
		 $returnValue = array();
		 $returnValue['doDb']='0';
		 $sql="DELETE FROM tb_recieve_ins_id WHERE id ='".$data['recieveInsID']."' ";
		 $returnValue['sql1']=$sql;
		 if($this->db->query($sql)){
			 $returnValue['doDb']='1';
			 //-------clear value ----------//act_pay_type
				 $sql = "UPDATE tbl_insurance_data SET "
					    ." cash_collection_carcheck = CASE WHEN recieve_id_carcheck = '".$data['recieve_id']."' THEN '0' ELSE cash_collection_carcheck END  "
					    ." ,tran_collection_carcheck = CASE WHEN recieve_id_carcheck = '".$data['recieve_id']."' THEN '0' ELSE tran_collection_carcheck END  "
					    ." ,cash_collection_tax = CASE WHEN recieve_id_tax  = '".$data['recieve_id']."' THEN '0' ELSE cash_collection_tax END  "
					    ." ,tran_collection_tax = CASE WHEN recieve_id_tax  = '".$data['recieve_id']."' THEN '0' ELSE tran_collection_tax END  "
					    ." ,cash_collection_act = CASE WHEN recieve_id_act  = '".$data['recieve_id']."' THEN '0' ELSE cash_collection_act END  "
					    ." ,tran_collection_act = CASE WHEN recieve_id_act  = '".$data['recieve_id']."' THEN '0' ELSE tran_collection_act END  "
					    ." ,cash_collection_ins = CASE WHEN recieve_id_ins  = '".$data['recieve_id']."' THEN '0' ELSE cash_collection_ins END  "
					    ." ,tran_collection_ins = CASE WHEN recieve_id_ins  = '".$data['recieve_id']."' THEN '0' ELSE tran_collection_ins END  "
					    ." ,car_check_receipt_date = CASE WHEN recieve_id_carcheck  = '".$data['recieve_id']."' THEN '' ELSE car_check_receipt_date END  "
					    ." ,tax_receipt_date = CASE WHEN recieve_id_tax  = '".$data['recieve_id']."' THEN '' ELSE tax_receipt_date END  "
					    ." ,act_receipt_date = CASE WHEN recieve_id_act  = '".$data['recieve_id']."' THEN '' ELSE act_receipt_date END  "
					    ." ,ins_receipt_date = CASE WHEN recieve_id_ins  = '".$data['recieve_id']."' THEN '' ELSE ins_receipt_date END  "
					    ." ,car_check_pay_type = CASE WHEN recieve_id_carcheck  = '".$data['recieve_id']."' THEN '0' ELSE car_check_pay_type END  "
					    ." ,tax_pay_type = CASE WHEN recieve_id_tax  = '".$data['recieve_id']."' THEN '0' ELSE tax_pay_type END  "
					    ." ,act_pay_type = CASE WHEN recieve_id_act  = '".$data['recieve_id']."' THEN '0' ELSE act_pay_type END  "
					    ." ,ins_pay_type = CASE WHEN recieve_id_ins  = '".$data['recieve_id']."' THEN '0' ELSE ins_pay_type END  "					 
					    ." ,car_check_pay_bank_id = CASE WHEN recieve_id_carcheck  = '".$data['recieve_id']."' THEN '0' ELSE car_check_pay_bank_id END  "
					    ." ,tax_pay_bank_id = CASE WHEN recieve_id_tax  = '".$data['recieve_id']."' THEN '0' ELSE tax_pay_bank_id END  "
					    ." ,act_pay_bank_id = CASE WHEN recieve_id_act  = '".$data['recieve_id']."' THEN '0' ELSE act_pay_bank_id END  "
					    ." ,ins_pay_bank_id = CASE WHEN recieve_id_ins  = '".$data['recieve_id']."' THEN '0' ELSE ins_pay_bank_id END  "
					     ." ,recieve_id_carcheck = CASE WHEN recieve_id_carcheck  = '".$data['recieve_id']."' THEN '0' ELSE recieve_id_carcheck END  "
					    ." ,recieve_id_tax = CASE WHEN recieve_id_tax  = '".$data['recieve_id']."' THEN '0' ELSE recieve_id_tax END  "
					    ." ,recieve_id_act = CASE WHEN recieve_id_act  = '".$data['recieve_id']."' THEN '0' ELSE recieve_id_act END  "
					    ." ,recieve_id_ins = CASE WHEN recieve_id_ins  = '".$data['recieve_id']."' THEN '0' ELSE recieve_id_ins END  "
					    ." , pay_cash_status='0' "
					    ." WHERE id ='".$data['work_id']."' ";
				$returnValue['sql2']=$sql; 
			 	$this->db->query($sql); 
			 	 //update other insurance
			    $tb = 0;
			    if($data['data_type'] > 1){
				 	switch($data['data_type']){
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
				 	if($tb != 0){
						$sql="UPDATE $tbl SET cash_collection='0' , tran_collection ='0' WHERE work_id = '".$data['work_id']."' ";
						if($this->db->query($sql)){
							$returnValue['doDbClarOtherTable']='1';
						} 
						$returnValue['sql2']=$sql; 
					}
			 }
					if($data['countInstallment'] > 0){
						$sql="UPDATE tbl_insurance_payment SET pay_type='0' , bank_id='0' , recieve_id='0' , receipt_date = '0000-00-00' , recipe_no='' , bank_id='0' , is_payment ='0' WHERE work_id = '".$data['work_id']."'  AND   recieve_id  ='".$data['recieve_id']."' "; 
						if($this->db->query($sql)){
							$returnValue['doDbClarInstallment']='1';
						} 
						$returnValue['sql3']=$sql; 
					}
			 //-----------------------------//
		 }
		 return $returnValue;
	 }
  #---------------------------------ๅ-------------------- reCieveID  installment_period,installment_amt
	 function updateRecieveDetail($data){
		 $returnValue = array();
		 $returnValue['doDb'] =0;
		 //print_r($data);
		 //echo $data['carcheck'];
		 $data['carcheck_amt']= $this->removeComma3($data['carcheck_amt']);
		 $data['tax_amt']= $this->removeComma3($data['tax_amt']);
		 $data['tax_service_amt']= $this->removeComma3($data['tax_service_amt']);
		 $data['act_amt']= $this->removeComma3($data['act_amt']);
		 $data['insurance_amt']= $this->removeComma3($data['insurance_amt']);
		 $data['installment_amt']= $this->removeComma3($data['installment_amt']);
		 $data['dc_cost']= $this->removeComma3($data['dc_cost']);
		 $sql="UPDATE tb_record_money_received_detail "
			 ." SET carcheck = '".$data['carcheck']."' , carcheck_amt='".$data['carcheck_amt']."'  , tax='".$data['tax']."' "
			 .", tax_amt='".$data['tax_amt']."' , tax_service= '".$data['tax_service']."' "
			 .", tax_service_amt='".$data['tax_service_amt']."' , act='".$data['act']."' "
			 .", act_amt='".$data['act_amt']."' , insurance='".$data['insurance']."' , insurance_amt='".$data['insurance_amt']."' , installment_period='".$data['installment_period']."', installment_amt='".$data['installment_amt']."' , dc_cost='".$data['dc_cost']."' , dc_cost_check='".$data['dc_cost_check']."'  "
			 ." ,user_update='".$this->session->userdata('user_id')."'  " 
		     ." WHERE id = '".$data['reCieveDetailID']."' ";
		 if($this->db->query($sql)){
			 $returnValue['doDb'] =1;
			 $dateRecieve = $this->translateDateToEng3($data['date_recieve']);
			 //---------------update installment-----------//updateRecieveDetail translateDateToEng3 bank_id
			 if($data['installment_period'] > 0){
				 $sql="UPDATE tbl_insurance_payment SET is_payment='1' , transaction_date = '".$dateRecieve."', receipt_date = '".$dateRecieve."' , pay_type='".$data['pay_type']."' , bank_id = '".$data['bank_id']."' , recieve_id='".$data['reCieveID']."' WHERE work_id = '". $data['insurance_id']."' AND period='".$data['installment_period']."' ";
				 if($this->db->query($sql)){
					 $returnValue['updateInstallment']= "ok";
				 }
				// $returnValue['sql-up-installment']=$sql;
			 }
			 /*
			 $data['date_recieve'] = $dataPreview[8];
		    $data['insurance_id'] =  $dataPreview[9];
			 */
			 //---------------update CASH---------------------
			$data['car_check_pay_type'] = 0;
			$data['car_check_pay_bank_id'] = 0;
			$data['car_check_receipt_date'] = ''; 			
			$data['act_pay_type'] = 0;
			$data['act_pay_bank_id'] = 0;
			$data['act_receipt_date'] = ''; 
			$data['ins_pay_type'] = 0;
			$data['ins_pay_bank_id'] = 0;
			$data['ins_receipt_date'] = ''; 
			$data['tax_pay_type'] = 0;
			$data['tax_pay_bank_id'] = 0;
			$data['tax_receipt_date'] = ''; 
   		    $data['carcheck_amt']= $this->removeComma3($data['carcheck_amt']);
		    $data['tax_amt']= $this->removeComma3($data['tax_amt']);
		    $data['tax_service_amt']= $this->removeComma3($data['tax_service_amt']);
		    $data['act_amt']= $this->removeComma3($data['act_amt']);
		    $data['insurance_amt']= $this->removeComma3($data['insurance_amt']);
		    $data['installment_amt']= $this->removeComma3($data['installment_amt']);
			//----------เลือกรายการเงินสดจากข้อมูล---------amt_recieve_ins
			$returnValue['sumTotal']=0;
			switch($data['ins_data_type']){
						case "1" :
							$sql="SELECT  car_check_pay_type ,  amt_recieve_carcheck , car_check_pay_bank_id ,car_check_receipt_date , amt_recieve_tax , tax_pay_bank_id , tax_pay_type , tax_receipt_date , act_pay_type, amt_recieve_act  , act_pay_bank_id ,act_receipt_date , amt_recieve_ins , ins_pay_type ,ins_pay_bank_id,ins_receipt_date , SUM(amt_recieve_carcheck+amt_recieve_tax+amt_recieve_act+amt_recieve_ins) AS sumTotal FROM tbl_insurance_data WHERE  id = '".$data['insurance_id']."'  ";
							$result = $this->db->query($sql)->result();
							foreach($result AS $getInsData){
								 $InsData['car_check_pay_type'] = $getInsData->car_check_pay_type; 
								 $InsData['car_check_pay_bank_id'] = $getInsData->car_check_pay_bank_id; 
				 				 $InsData['car_check_receipt_date'] = $getInsData->car_check_receipt_date; 	
								 $InsData['tax_pay_type'] = $getInsData->tax_pay_type; 
				  				 $InsData['tax_pay_bank_id'] =$getInsData->tax_pay_bank_id; 
				 				 $InsData['tax_receipt_date'] = $getInsData->tax_receipt_date; 
								 $InsData['act_pay_type'] = $getInsData->act_pay_type; 
								 $InsData['act_pay_bank_id'] = $getInsData->act_pay_bank_id; 
				 				 $InsData['act_receipt_date'] = $getInsData->act_receipt_date; 
								 $InsData['ins_pay_type'] = $getInsData->ins_pay_type; 
								 $InsData['ins_pay_bank_id'] = $getInsData->ins_pay_bank_id; 
								 $InsData['ins_receipt_date'] = $getInsData->ins_receipt_date; 
								 $InsData['amt_recieve_ins'] = $getInsData->amt_recieve_ins; 
								$returnValue['amt_recieve_carcheck']= $getInsData->amt_recieve_carcheck; 
								$returnValue['amt_recieve_tax']= $getInsData->amt_recieve_tax; 
								$returnValue['amt_recieve_act']= $getInsData->amt_recieve_act; 
								$returnValue['amt_recieve_ins']= $getInsData->amt_recieve_ins; 
								$returnValue['sumTotal']= $getInsData->sumTotal; 
							}
						break;
						case "2" :
							//$tbl="  tbl_insurance_travel_data ";
							$sql="SELECT '0' AS amt_recieve_carcheck , '0' AS  amt_recieve_tax , '0' AS  amt_recieve_act , amt_recieve_ins , ins_receipt_date , amt_recieve_ins AS sumTotal  FROM tbl_insurance_travel_data WHERE  id = '".$data['insurance_id']."'  ";
							$result = $this->db->query($sql)->result();
							foreach($result AS $getInsData){
								$InsData['ins_pay_type'] = $getInsData->ins_pay_type; 
								$InsData['ins_pay_bank_id'] = $getInsData->ins_pay_bank_id; 
								$InsData['amt_recieve_ins'] = $getInsData->amt_recieve_ins; 
								$returnValue['amt_recieve_ins']= $getInsData->amt_recieve_ins; 
								$returnValue['sumTotal']= $getInsData->sumTotal; 
							}
						break;
						case "3" :
							//$tbl=" tbl_insurance_shpping_data ";
							$sql="SELECT '0' AS amt_recieve_carcheck , '0' AS  amt_recieve_tax , '0' AS  amt_recieve_act , amt_recieve_ins , ins_receipt_date , amt_recieve_ins AS sumTotal  FROM tbl_insurance_shpping_data WHERE  id = '".$data['insurance_id']."'  ";
							$result = $this->db->query($sql)->result();
							foreach($result AS $getInsData){
								$InsData['ins_pay_type'] = $getInsData->ins_pay_type; 
								$InsData['ins_pay_bank_id'] = $getInsData->ins_pay_bank_id; 
								$InsData['amt_recieve_ins'] = $getInsData->amt_recieve_ins; 
								$returnValue['amt_recieve_ins']= $getInsData->amt_recieve_ins; 
								$returnValue['sumTotal']= $getInsData->sumTotal; 
							}
						break;
						case "4" :
							//$tbl=" tbl_insurance_accident_data ";
							$sql="SELECT '0' AS amt_recieve_carcheck , '0' AS  amt_recieve_tax , '0' AS  amt_recieve_act , amt_recieve_ins , ins_receipt_date , amt_recieve_ins AS sumTotal FROM tbl_insurance_accident_data WHERE  id = '".$data['insurance_id']."'  ";
							$result = $this->db->query($sql)->result();
							foreach($result AS $getInsData){
								$InsData['ins_pay_type'] = $getInsData->ins_pay_type; 
								$InsData['ins_pay_bank_id'] = $getInsData->ins_pay_bank_id; 
								$InsData['amt_recieve_ins'] = $getInsData->amt_recieve_ins; 
								$returnValue['amt_recieve_ins']= $getInsData->amt_recieve_ins; 
								$returnValue['sumTotal']= $getInsData->sumTotal; 
							}
						break;
						case "5" :
							//$tbl=" tbl_insurance_home_data ";
							$sql="SELECT '0' AS amt_recieve_carcheck , '0' AS  amt_recieve_tax , '0' AS  amt_recieve_act , amt_recieve_ins , ins_receipt_date , amt_recieve_ins AS sumTotal FROM tbl_insurance_home_data WHERE  id = '".$data['insurance_id']."'  ";
							$result = $this->db->query($sql)->result();
							foreach($result AS $getInsData){
								$InsData['ins_pay_type'] = $getInsData->ins_pay_type; 
								$InsData['ins_pay_bank_id'] = $getInsData->ins_pay_bank_id; 
								$InsData['amt_recieve_ins'] = $getInsData->amt_recieve_ins; 
								$returnValue['amt_recieve_ins']= $getInsData->amt_recieve_ins; 
								$returnValue['sumTotal']= $getInsData->sumTotal; 
							}
						break;	
			 }
			 //----------เปรียบเทียบค่า 
			  if($data['carcheck']=='1'){
				 $data['car_check_pay_type'] = $data['pay_type']; 
				 $data['car_check_pay_bank_id'] = $data['bank_id']; 
				 $data['car_check_receipt_date'] = $dateRecieve; 
			 }else{
				 $data['car_check_pay_type'] = $InsData['car_check_pay_type']; 
				 $data['car_check_pay_bank_id'] = $InsData['car_check_pay_bank_id']; 
				 $data['car_check_receipt_date'] = $InsData['car_check_receipt_date']; 
			 }
			 if($data['tax']=='1'){
				  $data['tax_pay_type'] = $data['pay_type']; 
				  $data['tax_pay_bank_id'] =$data['bank_id']; 
				  $data['tax_receipt_date'] = $dateRecieve; 
			 }else{
				 $data['tax_pay_type'] = $InsData['tax_pay_type']; 
				 $data['tax_pay_bank_id'] = $InsData['tax_pay_bank_id']; 
				 $data['tax_receipt_date'] = $InsData['tax_receipt_date']; 
			 }
			 if($data['act']=='1'){
				 $data['act_pay_type'] = $data['pay_type']; 
				 $data['act_pay_bank_id'] = $data['bank_id']; 
				 $data['act_receipt_date'] = $dateRecieve; 
			 }else{
				 $data['act_pay_type'] = $InsData['act_pay_type']; 
				 $data['act_pay_bank_id'] = $InsData['act_pay_bank_id']; 
				 $data['act_receipt_date'] = $InsData['act_receipt_date']; 
			 }
			 if($data['insurance']=='1'){
				$data['ins_pay_type'] = $data['pay_type']; 
				$data['ins_pay_bank_id'] = $data['bank_id']; 
				$data['ins_receipt_date'] = $dateRecieve; 
			 }else{
				 $data['ins_pay_type'] = $InsData['ins_pay_type']; 
				 $data['ins_pay_bank_id'] = $InsData['ins_pay_bank_id']; 
				 $data['ins_receipt_date'] = $InsData['ins_receipt_date']; 
			 }
			 //-----------เช็คว่าจ่ายครบไหม
			 $complete_pay = 0; 
			 $totalPayment = 0;
			 $sql="SELECT SUM(carcheck_amt)+ SUM(tax_amt)+ SUM(act_amt)+SUM(insurance_amt) + SUM(tax_service_amt) AS SumPayMent FROM tb_record_money_received_detail WHERE insurance_id = '".$data['insurance_id']."' AND data_status='1'; " ;
			 $result = $this->db->query($sql)->result();
			 foreach($result AS $isPay){
				$totalPayment = $isPay->SumPayMent;
			 }
			 if($totalPayment>=$returnValue['sumTotal']){
				$complete_pay = 1; 
			 }
			//----------------------------------------
			$txtUpdateCarCheck = "";
			$txtUpdateTax = "";
			$txtUpdateAct = "";
			$txtUpdateIns = "";
			 $sql="UPDATE tbl_insurance_data SET car_check_pay_type = '".$data['car_check_pay_type']."' , car_check_pay_bank_id = '".$data['car_check_pay_bank_id']."' , car_check_receipt_date = '".$data['car_check_receipt_date']."' , tax_pay_type = '".$data['tax_pay_type']."', tax_pay_bank_id='".$data['tax_pay_bank_id']."' ,tax_receipt_date ='".$data['tax_receipt_date']."'  , act_pay_type='".$data['act_pay_type']."'   , act_pay_bank_id='".$data['act_pay_bank_id']."' , act_receipt_date='". $data['act_receipt_date']."' ,  ins_pay_type='".$data['ins_pay_type']."' , ins_pay_bank_id='".$data['ins_pay_bank_id']."' , ins_receipt_date='".$data['ins_receipt_date']."' , pay_cash_status='".$complete_pay."' WHERE id = '".$data['insurance_id']."'  ";
			  if($this->db->query($sql)){
					 $returnValue['updateCash']= "ok";
				 }
			// $returnValue['sql-up-Cash']=$sql;
			 //----------------UPDATE Other Type payment------------
			 if($data['ins_data_type'] > 1){
			 switch($data['ins_data_type']){
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
			 $sql="UPDATE $tbl SET  ins_pay_type = '".$data['ins_pay_type']."' , ins_pay_bank_id='".$data['ins_pay_bank_id']."' , ins_receipt_date='".$data['ins_receipt_date']."' , pay_cash_status='".$complete_pay."' WHERE work_id = '".$data['insurance_id']."'   ";
				if($this->db->query($sql)){
					 $returnValue['updateCashOther']= "ok";
				 }
				 //$returnValue['sql-up-Cash-Other']=$sql;
			 }
			 //-----------------------------------------------
		 } //end if query
		 // $returnValue['sql'] =$sql;
		 return $returnValue;
	 }
  #---------------------------------ๅ--------------------  
	 function listRecievePaymentArea($data){
		 /*
		 	เช็คว่า มีรายการผ่อนไหม ถ้าไม่มีให้เอาฟอร์มชำระเงินสด เลือกจาก insurance type ไปแสดง  e.province_name'
			***ติดปัญหา ถ้า ไม่ได้เรียกไอดี tb_recieve_ins_id แบบระบุ จะ error ต้องเรียกรวม และแสดงผลได้
		  */
		 $returnValue = array();
		 //$returnValue['getInstallment'] =array(); getInstallment amt_cash work_id installment_period
		 $returnValue['is_cash']='1';
		 $txtWherePlus = '';
		 $sql="SELECT 
				a.id AS recieveInsID, 
				a.carcheck, 
				a.carcheck_amt, 
				a.tax, 
				a.tax_amt,
				a.tax_service,
				a.tax_service_amt, 
				a.act, 
				a.act_amt, 
				a.insurance, 
				a.dc_cost ,
				a.dc_cost_check ,
				a.insurance_amt, 
				b.insurance_data_type, 
				b.vehicle_regis, 
				b.province_regis, 
				c.province_name, 
				a.insurance_id, 
				b.insurance_data_type, 
				a.installment_amt,
				a.installment_period, 
				e.payment_by ,
				(SELECT COUNT(id) AS CountInstallment 
				 FROM tbl_insurance_payment AS c 
				 WHERE c.work_id = a.insurance_id) AS CountInstallment, 
				d.insurance_data_type, 
				CASE 
					WHEN d.insurance_data_type='1' THEN CONCAT(d.vehicle_regis, ' ', c.province_name) 
					WHEN d.insurance_data_type='2' THEN  ( SELECT CONCAT(trav.id, '>', trav.cust_name) FROM tbl_insurance_travel_data AS trav WHERE d.id = trav.work_id) 
					WHEN d.insurance_data_type='3' THEN ( SELECT CONCAT(tisd.id, '>', tisd.register) FROM tbl_insurance_shpping_data AS tisd WHERE d.id = tisd.work_id )
					WHEN d.insurance_data_type='4' THEN ( SELECT CONCAT(acd.id, '>', acd.cust_name ) FROM tbl_insurance_accident_data AS acd WHERE d.id = acd.work_id )
					WHEN d.insurance_data_type='5' THEN ( SELECT CONCAT(home.id, '>', home.cust_name ) FROM tbl_insurance_home_data AS home WHERE d.id = home.work_id )
				END AS customer_desc 
			FROM 
				tb_record_money_received_detail AS a 
				LEFT JOIN tbl_insurance_data AS b ON a.insurance_id = b.id 
				LEFT JOIN tbl_province AS c ON b.province_regis = c.id 
				LEFT JOIN tbl_insurance_data AS d ON a.insurance_id = d.id 
				LEFT JOIN tb_record_money_received  AS e ON a.recieve_id  = e.id 
			WHERE 
				a.recieve_id ='".$data['RecieveID']."' $txtWherePlus AND a.data_status='1'
			ORDER BY 
				a.id DESC ";
		 $returnValue['getDb'] =$this->db->query($sql)->result();
		 $returnValue['getDbSql'] = $sql;
		 //print_r($returnValue);
		 return $returnValue;
	 }
  #----------------------------------------------------- bl_insurance_shpping_data
	function addRecieveChild($data){
		$returnValue = array();
		$returnValue['doDb']=0;
		$returnValue['doDb-child']=0;
		//$data['date_transfer']=$this->translateDateToEng3($data['date_transfer']);
		//$data['transfer_amt'] =  floatval(str_replace(',', '', $data['transfer_amt'])); remark
		$data['other_payment'] =  floatval(str_replace(',', '', $data['other_payment']));
		//-----check if has RecieveID 
		if($data['RecieveID']==0){
			$sql="INSERT INTO tb_record_money_received (id,payment_by,date_transfer,bank_id ,transfer_amt, pay_type,user_updatre ,date_create , other_payment , recieve_normal , remark ) VALUES ('','".$data['payment_by']."','".$data['date_transfer']."','".$data['bank_id']."','".$data['transfer_amt']."','".$data['paytype']."','".$this->session->userdata('user_id')."', now() ,'".$data['other_payment']."','".$data['recieve_normal']."' ,'".$data['remark']."' ) ";
			if($this->db->query($sql)){
				$returnValue['RecieveID']=$this->db->insert_id();
				$returnValue['doDb']=1;
			}
		}else{
			$sql = "UPDATE tb_record_money_received SET date_transfer ='".$data['date_transfer']."' , bank_id='".$data['bank_id']."' , transfer_amt = '".$data['transfer_amt']."' , other_payment='".$data['other_payment']."' , recieve_normal = '".$data['recieve_normal']."', payment_by='".$data['payment_by']."' , user_updatre = '".$this->session->userdata('user_id')."' , remark = '".$data['remark']."' WHERE id = '".$data['RecieveID']."'  ";
			if($this->db->query($sql)){
				$returnValue['doDb']=1;
				$returnValue['RecieveID']=$data['RecieveID'];
			}
		}
		$returnValue['sqlMain']=$sql;
		if(($returnValue['doDb']=='1')&&($data['workID']!= 0)){
			 $sql="INSERT INTO tb_record_money_received_detail (id,recieve_id ,insurance_id,user_update ) VALUES ('','".$returnValue['RecieveID']."','".$data['workID']."','".$this->session->userdata('user_id')."')";
			if($this->db->query($sql)){
				$returnValue['doDb-child']=1;
			}
		}
	    $returnValue['sqlSub']=$sql;
		return $returnValue;
	} 
  #-----------------------------------------------------recieve_ins_id
   function deleteReciveList($data){
	   $returnValue=array();
	   $returnValue['doDb']=0;
	   $sql="UPDATE tb_record_money_received_detail SET data_status='0' , user_update='".$this->session->userdata('user_id')."' WHERE id = '".$data['dataID']."' ";
	   if($this->db->query($sql)){
		   $returnValue['doDb']=1;
	   }
	   return $returnValue;
   }
  #-----------------------------------------------------
   function showCustSearch($data){
	   $returnValue = array();
	   $txtWhereName = '';
	   $txtWhereRegis = '';
	   $txtJoin = '';
	   $txtSelectJoin = '';
	   $data['searchVregis']=trim($data['searchVregis']);
	   $data['searchName']=trim($data['searchName']);
	   if(($data['searchName']!='')){
		   $txtWhereName = " AND a.cust_name LIKE '%".$data['searchName']."%'  ";
	   }
	   if(($data['searchVregis']!='')){
		   $txtWhereRegis = " AND a.vehicle_regis LIKE '%".$data['searchVregis']."%'  ";
		   $txtJoin = ' LEFT JOIN tbl_province AS b ON a.province_regis=b.id ';
		   $txtSelectJoin = ' , b.province_name  , b.id AS provinceID ';
	   }
	   $txtWherePayment = " AND a.pay_cash_status='0' ";
	  // $txtHavingInstallment =" HAVING (SELECT COUNT(id) AS CountInstallment  FROM tbl_insurance_payment AS c WHERE c.work_id = a.id AND c.is_payment = 0 ) > 0 "; insurance_id
	   // (SELECT COUNT(id) AS CountInstallment  FROM tbl_insurance_payment AS c WHERE c.work_id = a.insurance_id  ) AS CountInstallment
	  /* $sql="SELECT a.* $txtSelectJoin "
		   ." , (SELECT COUNT(id) AS CountInstallment  FROM tbl_insurance_payment AS c WHERE c.work_id = a.id AND c.is_payment='0'  ) AS CountInstallment "
		   ." FROM tbl_insurance_data AS a "
		   ." $txtJoin  "
		   ." WHERE 1 $txtWhereName  $txtWhereRegis  $txtWherePayment "
		   ." AND  (
      				(SELECT COUNT(id) FROM tbl_insurance_payment AS c WHERE c.work_id = a.id AND c.is_payment='0') = 0 AND a.pay_cash_status='0'
      				OR
      				(SELECT COUNT(id) FROM tbl_insurance_payment AS c WHERE c.work_id = a.id AND c.is_payment='0') > 0 ) ";
					*/
	   $sql="SELECT
				a.id,
				a.cust_name,
				a.insurance_data_type,
				a.vehicle_regis,
				a.pay_cash_status,
				b.province_name,
				b.id AS provinceID,
				COALESCE(not_paid.count, 0) AS InstallmentNotPay,
				COALESCE(all_payments.count, 0) AS CountInstallment
				FROM tbl_insurance_data AS a
				LEFT JOIN tbl_province AS b ON a.province_regis = b.id
				LEFT JOIN (
				SELECT work_id, COUNT(id) AS count
				FROM tbl_insurance_payment
				WHERE is_payment = '0'
				GROUP BY work_id
				) AS not_paid ON not_paid.work_id = a.id
				LEFT JOIN (
				SELECT work_id, COUNT(id) AS count
				FROM tbl_insurance_payment
				GROUP BY work_id
				) AS all_payments ON all_payments.work_id = a.id
				WHERE 1 
				$txtWhereName  $txtWhereRegis
				AND (
				(COALESCE(all_payments.count, 0) > 0 AND COALESCE(not_paid.count, 0) > 0)
				OR
				(COALESCE(all_payments.count, 0) = 0 AND a.pay_cash_status != '1')
				)";
	   		//  is_payment = '0'
	   $returnValue['resultData'] = $this->db->query($sql)->result();
	   $returnValue['sql']=$sql;
	   return $returnValue;
	   //  -- กรณีที่ไม่มีงวดผ่อนชำระ (CountInstallment = 0) ให้แสดงเฉพาะที่ pay_cash_status = '0'  -- กรณีที่มีงวดผ่อนชำระ (CountInstallment > 0) ให้แสดงเฉพาะที่ค้างชำระ (InstallmentNotPay > 0)
   }
  #-----------------------------------------------------RecieveID
	 function deleteAllRecieve($data){
		  $returnValue=array();
	      $returnValue['doDb']=0;
		   $sql="UPDATE tb_record_money_received SET main_data_status = '0' WHERE id ='".$data['RecieveID']."' ";
		   if($this->db->query($sql)){
			   $returnValue['doDb']=1;
			   //-------delete child--
			   $sql="UPDATE tb_record_money_received_detail SET data_status='0' WHERE recieve_id  = '".$data['RecieveID']."' ";
			   if($this->db->query($sql)){
			   		$returnValue['doDb2']=1;
			   }
		   }
		  return $returnValue;
	 }
  #-----------------------------------------------------
   function getRecieveOne($recieveID){
		 $returnValue = array();
		 $sql = "SELECT * FROM tb_record_money_received WHERE id = '".$recieveID."' ";
		 $returnValue['sql']=$sql;
		 $result = $this->db->query($sql)->result();
		 foreach($result AS $data){
			$returnValue['DataID']=$data->id;
			$returnValue['pay_type']=$data->pay_type;
			$returnValue['date_transfer']=$data->date_transfer;
			$returnValue['transfer_amt']=$data->transfer_amt;
			$returnValue['bank_id']=$data->bank_id;
			$returnValue['remark']=$data->remark;
			$returnValue['RecieveID']=$data->id;;
			$returnValue['payment_by']=$data->payment_by;;
			$returnValue['other_payment']=$data->other_payment;;
			$returnValue['recieve_normal']=$data->recieve_normal;;
		 }
		 return $returnValue;
	 } 
  #-----------------------------------------------------
 }