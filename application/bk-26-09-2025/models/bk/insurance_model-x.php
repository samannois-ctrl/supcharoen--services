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
		if(($date!='0000-00-00')||($date!='')){
		 $dateArray = explode("-",$date);
		 $dateArray[0] = $dateArray[0]+543;
		 $showDate = $dateArray[2]."/".$dateArray[1]."/".$dateArray[0];
		 }else{
			$showDate ='';	
		 }
		 return $showDate;
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
	 function getActDetail($workID){
		 $sql="SELECT * FROM tbl_car_act_data WHERE work_id = '".$workID."' ";
		 $resultData = $this->db->query($sql)->result();
		 foreach($resultData AS $data);
		 return $data;		
		 
	 }
	//---------------------------------- Act Add update
	 function saveCompulsory($data){
		 /*
	     [act_no] => 
      [act_no] => 
    [corp_id] => 7
    [act_date_start] => 11/12/2565
    [act_date_end] => 11/12/2566
    [act_date_notify] => 
    [act_follow] => 1
    [code_id] => 4
    [act_recieve] => 0
    [act_price] => 2,500.00
    [act_discount] => 
    [act_tax] => 10.00
    [act_vat] => 163.59
    [act_price_net] => 2,327.00
    [act_price_total] => 2,500.00
    [act_cancel_no] => 
    [act_cancel_date] => 
    [act_cancel_reason] => 
    [act_remark] => 
    [act_payment_duedate] => 
    [act_payment_remark] => 
    [back_act_notify_date] => 
    [back_act_recieve_date] => 
    [back_act_no] => 
    [back_act_remark] => 
    [actID] => 
    [actWorkID] => 5
    [actagentID] => 1
    [act_paid] => 1  act_date_notify
		 */
	 $returnVale =array(); 
     $date_work = date("Y-m-d");
		 
	if(!isset($data['act_no'])){ $data['act_no']==''; }
	if(!isset($data['act_discount'])){ $data['act_discount']=='0'; }
	if(!isset($data['act_cancel_no'])){ $data['act_cancel_no']==''; }
	if(!isset($data['act_cancel_date'])){ $data['act_cancel_date']==''; }
	if(!isset($data['act_cancel_reason'])){ $data['act_cancel_reason']==''; }
	if(!isset($data['act_remark'])){ $data['act_remark']==''; }
	if(!isset($data['act_payment_duedate'])){ $data['act_payment_duedate']==''; }
	if(!isset($data['act_payment_remark'])){ $data['act_payment_remark']==''; }
	if(!isset($data['act_date_notify'])){ $data['act_date_notify']==''; }
	if(!isset($data['back_act_remark'])){ $data['back_act_remark']==''; }

	if(!isset($data['act_remark'])){ $data['act_remark']==''; }
	if(!isset($data['actID'])){ $data['actID']==''; }
		 
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
		 
	if($data['actID']==''){
			$sql="INSERT INTO `tbl_car_act_data` (`id`, `date_work`, `work_id`, `agent_id`, `code_id`, `act_no`, `corp_id`, `act_date_start`, `act_date_end`, `act_date_notify` "
			 .", `act_follow`, `act_recieve`, `act_price`, `act_discount`, `act_tax`, `act_vat`, `act_price_net`, `act_price_total` "
			 . ", `act_cancel_no`, `act_cancel_date`, `act_cancel_reason`, `act_remark`, `act_paid`, `act_payment_duedate`, `act_payment_remark`, `back_act_notify_date`, `back_act_recieve_date`, `back_act_no`, `back_act_remark`, `user_update`, `act_paid_day`) "
			 ." VALUES "
			 ."('', '".$date_work."', '".$data['actWorkID']."', '".$data['actagentID']."', '".$data['code_id']."', '".$data['act_no']."', '".$data['corp_id']."', '".$data['act_date_start']."', '".$data['act_date_end']."', '".$data['act_date_notify']."' "
			 .", '".$data['act_follow']."', '".$data['act_recieve']."', '".$data['act_price']."', '".$data['act_discount']."', '".$data['act_tax']."', '".$data['act_vat']."', '".$data['act_price_net']."', '".$data['act_price_total']."' "
			 .", '".$data['act_cancel_no']."', '".$data['act_cancel_date']."', '".$data['act_cancel_reason']."', '".$data['act_remark']."', '".$data['act_paid']."', '".$data['act_payment_duedate']."', '".$data['act_payment_remark']."', '".$data['back_act_notify_date']."', '".$data['back_act_recieve_date']."', '".$data['back_act_no']."', '".$data['back_act_remark']."' , '".$this->session->userdata('user_id')."' , '".$data['act_paid_day']."') ";
		
			if($this->db->query($sql)){
				$returnVale['doDb']='1';
				$returnVale['actDb']='insert';
				$returnVale['actID']=$this->db->insert_id();
				
			}else{
				$returnVale['actID']='no insert';
			}
	}else{
		 $sql="UPDATE tbl_car_act_data SET "
			 ." `agent_id` = '".$data['actagentID']."' , `code_id` = '".$data['code_id']."' , `act_no` = '".$data['act_no']."' , `corp_id` = '".$data['corp_id']."' , `act_date_start`='".$data['act_date_start']."', `act_date_end` = '".$data['act_date_end']."' , `act_date_notify` = '".$data['act_date_notify']."' "
			 ." , `act_follow` = '".$data['act_follow']."' , `act_recieve` = '".$data['act_recieve']."' , `act_price` = '".$data['act_price']."' , `act_discount` = '".$data['act_discount']."' , `act_tax` = '".$data['act_tax']."' , `act_vat` =  '".$data['act_vat']."' , `act_price_net` = '".$data['act_price_net']."' , `act_price_total` = '".$data['act_price_total']."' "
			 . ", `act_cancel_no` = '".$data['act_cancel_no']."' , `act_cancel_date` = '".$data['act_cancel_date']."' , `act_cancel_reason` = '".$data['act_cancel_reason']."', `act_remark` = '".$data['act_remark']."' , `act_paid` = '".$data['act_paid']."' , `act_payment_duedate` = '".$data['act_payment_duedate']."' , `act_payment_remark` = '".$data['act_payment_remark']."' , `back_act_notify_date` = '".$data['back_act_notify_date']."' , `back_act_recieve_date` = '".$data['back_act_recieve_date']."', `back_act_no` =  '".$data['back_act_no']."' , `back_act_remark` =  '".$data['back_act_remark']."' , `user_update`='".$this->session->userdata('user_id')."' , `act_paid_day` ='".$data['act_paid_day']."' "
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
			 ." WHERE a.vehicle_regis LIKE '%".$txtSearch."%' AND a.cust_id  = '".$custID."' ";
		
		 $resultData = $this->db->query($sql)->result();
		 return $resultData;
	 }
	//----------------------------------
	 function listSearchCust($txtSearch){
			$sql = "SELECT * FROM tbl_customer_data WHERE cust_name LIKE '%".$txtSearch."%' ";
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