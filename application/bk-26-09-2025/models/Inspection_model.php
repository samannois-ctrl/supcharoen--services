<?php
 class Inspection_model extends CI_Model
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
	 ################################################
	 
	//---------------------------------- registration_book	 total_work_price pay_cash
	 function loadCarcheckCover($data){
		 		 
		 $sql="SELECT a.* , b.id AS workID , b.pay_cash , b.pay_transfer, b.pay_transfer2 , b.alert_success , b.follow_insurance , b.remark_follow , a.registration_book, b.total_work_price ,c.cust_name , c.cust_nickname , CONCAT(c.cust_telephone_1,' ',c.cust_telephone_2) AS custTelephoneNo "
			  ." , d.vehicle_regis , d.date_regist , e.province_name , f.act_date_end,  f.other_paid , f.act_price_total  , h.tax_price , h.tax_service"
			  ." , j.initials_name , j.type_name , j.car_type_group , h.date_registration_end  "
			  ." FROM tbl_car_check AS a "
			  ." LEFT JOIN tbl_work_data AS b ON a.work_id = b.id "
			  ." LEFT JOIN tbl_customer_data AS c ON b.cust_id  =  c.id "
			  ." LEFT JOIN tbl_car_data AS d ON b.car_id  =  d.id "
			  ." LEFT JOIN tbl_province AS e ON d.province_regis   =  e.id "
			  ." LEFT JOIN tbl_car_act_data AS f ON f.work_id   =  b.id "
			  ." LEFT JOIN tbl_car_tax_data AS h ON h.work_id   =  b.id "
			  ." LEFT JOIN tbl_car_type AS j ON d.car_type_id   =  j.id "
			  ." WHERE b.id = '".$data['workID']."' ";
		 
		 $returnValue['resultData'] = $this->db->query($sql)->result();
		 $returnValue['sql']=$sql;
		 return $returnValue;
	 }
	
   //--------------------------
	function listCarPremium($type_premium_id=NULL){
		$txtWhere ="";
		 if(isset($type_premium_id)){
			 $txtWhere =" WHERE tbl_car_type_id = '".$dataID."' ";
		 }
		
		 $sql="SELECT * FROM tbl_car_type_premium $txtWhere  ORDER BY id ASC ";
		 //echo $sql;
		 $resultData = $this->db->query($sql)->result();
		 return $resultData;
		
		
	}
   //--------------------------workID:workID,fname:fname,changeValue:changeValue  act_date_start act_date_end
	 function updateWorkData($data){
		  $returnVale = array();
		  $returnVale['DoDb']=0;
		  $data['act_date_start'] = $this->translateDateToEng($data['act_date_start']);
		  $data['act_date_end'] = $this->translateDateToEng($data['act_date_end']);
		 
		   $sql="UPDATE  tbl_car_act_data SET  act_date_start = '".$data['act_date_start']."' , act_date_end = '".$data['act_date_end']."' WHERE work_id  ='".$data['workID']."' ";
		    if($this->db->query($sql)){
				 $returnVale['DoDb']=1;
			}
		 	 $returnVale['sql']=$sql; 
			 		
		  return $returnVale;	
		 
	 }
   //--------------------------workID:workID,fname:fname,changeValue:changeValue  act_date_start act_date_end
	 function updateCarData($data){ 
		  $returnVale = array();
		  $returnVale['DoDb']=0;
		  
		
			$sql="UPDATE tbl_car_data SET  ".$data['fname']." = '".$data['changeValue']."' WHERE id ='".$data['carID']."' ";
		    if($this->db->query($sql)){
				 $returnVale['DoDb']=1;
			}
		 	 $returnVale['sql']=$sql; 
		
		 
	 		
		  return $returnVale;
	 }
   //--------------------------
	function loadcareRegister($data){
		 // select_day select_month  select_day_end select_month_end select_year select_year select_year
		 $startDate = $data['select_day']."/".$data['select_month']."/".$data['select_year_name'];
		 $endDate = $data['select_day_end']."/".$data['select_month_end']."/".$data['select_year_name'];
		
		 $data['startDate'] = $this->translateDateToEng($startDate); 
		 $data['endDate'] = $this->translateDateToEng($endDate); 
	
		 $returnVale = array();
		 
		 $sql="SELECT a.id AS workID , a.date_add AS workDate , a.car_id ,a.date_add "
		     ." , f.id AS custID , f.cust_name , f.cust_nickname , f.cust_telephone_2 , f.cust_telephone_1 "
			 ." , g.id AS CarID , g.vehicle_regis ,g.province_regis, g.car_brand , g.car_model , g.car_type_id , g.type_premium_id , g.brand_id , g.date_regist AS dateCarRegis , g.year_car "
			 ." , h.province_name , h.id AS provinceID "
			 ." , b.id AS actID , b.act_date_start , b.act_date_end ,b.act_price,b.act_price_total, b.act_paid "
			 ." FROM tbl_work_data AS a "
					
			 ." LEFT JOIN  tbl_customer_data AS f ON a.cust_id = f.id "
			 ." LEFT JOIN  tbl_car_data AS g ON a.car_id  = g.id "
			 ." LEFT JOIN  tbl_province AS h ON g.province_regis  = h.id "
			 ." LEFT JOIN  tbl_car_act_data AS b ON b.work_id = a.id "
			." WHERE  (a.date_add BETWEEN '".$data['startDate']."' AND '".$data['endDate']."') ORDER BY a.id ASC ";
		 
		 $returnVale['resultData'] =$this->db->query($sql)->result();
		 $returnVale['sql']=$sql;
		 $returnVale['date']= 'startDate>'.$data['startDate']." endDate>>".$data['endDate']." /// ".$this->translateDateToEng($startDate)." | ".$this->translateDateToEng($endDate);
		  
		 return $returnVale;
	}

	 
	 
	 /*
	
	 */
 }
