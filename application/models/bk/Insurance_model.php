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
	//---------------------------------- 
	 function removeComma($theValue){
		$NewValue = str_replace(",","",$theValue);
		return $NewValue;
  	}
	//################################################################################################  
	 //----------------------------------changeValue,workID
	 function UpdateAlertRemark($data){
		 $returnValue = array(); 
		 $returnValue['doDb']=0;
		 $sql="UPDATE tbl_work_data SET remark_follow = '".$data['changeValue']."' WHERE id = '".$data['workID']."' ";
		 if($this->db->query($sql)){
			 $returnValue['doDb']=1;
		 }
		 $returnValue['sql']=$sql;
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
		 $returnValue['sql']=$sql;
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
		 $returnValue['sql']=$sql;
		 return $returnValue;
	 }
	 //----------------------------------date_registration_end 
	 function getExpireList($data){
	 
		 $returnValue = array(); 
		
		 //$condition = " WHERE  f.act_date_end <= DATE_ADD(NOW(), INTERVAL 3 MONTH) OR  h.date_registration_end <= DATE_ADD(NOW(), INTERVAL 3 MONTH) ";
		 
		 // select_year_name:select_year_name,select_year:select_year,select_range:select_range,select_type:select_type,car_type_id:car_type_id 
		 
		 
		 
		 //$condition = " WHERE (  f.act_date_end <= DATE_ADD(NOW(), INTERVAL 3 MONTH) AND f.act_date_end <>'0000-00-00' ) AND ( h.date_registration_end <= DATE_ADD(NOW(), INTERVAL 3 MONTH) AND  h.date_registration_end <>'0000-00-00'  ) ";
		 
		 //$data['select_range'] = $data['select_range']+12;
		 
		 if($data['car_type_id']=='allcar'){
			 $CarCondition=' AND d.car_type_id IN (1,2,3)';
		 }else{
			  $CarCondition=' AND d.car_type_id IN ('.$data['car_type_id'].')';
		 }
		 
		 
		 
		 if($data['select_type']=='1'){  //act
			 $condition = " WHERE (  f.act_date_end <= DATE_ADD(NOW(), INTERVAL ".$data['select_range']." MONTH) AND f.act_date_end <>'0000-00-00' )";
			 $orderBy ="ORDER BY f.act_date_end ASC";
		 }else if($data['select_type']=='2'){ //tax
			 $condition = " WHERE ( h.date_registration_end <= DATE_ADD('2023-05-15', INTERVAL ".$data['select_range']." MONTH) AND  h.date_registration_end <>'0000-00-00'  ) ";
			 $orderBy ="ORDER BY h.date_registration_end ASC";
		 }
		 
		 
		 $sql="SELECT a.* , b.id AS workID , b.pay_cash , b.pay_transfer , b.alert_success , b.follow_insurance , b.remark_follow , c.cust_name , c.cust_nickname , CONCAT(c.cust_telephone_1,' ',c.cust_telephone_2) AS custTelephoneNo "
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
			  ." $condition $CarCondition  $orderBy ";
		  
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
		 $returnValue['sql']=$sql;
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
		  $returnValue['sql']=$sql;
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
		  $returnValue['sql']=$sql;
		 return $returnValue;
	 }
	 //---------------------------------- 
	 function listExpenses($data){
		 $returnValue = array(); 
		 $sql="SELECT * FROM expenses_data WHERE expenses_date BETWEEN '".$data['start']."' AND '".$data['end']."' AND data_status='1' ORDER BY id ASC ";
		 $returnValue['resultData']  = $this->db->query($sql)->result();
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
		 
		 
		 
		 
		$txtWhereDate =" AND YEAR(a.date_add) = '".$data['selectYear']."' ";  
		 
		$sql="SELECT a.id AS workID , a.date_add AS workDate , a.car_id  "
			 ." , b.id AS actID , b.act_date_start , b.act_date_end ,b.act_price,b.act_price_total, b.act_paid "
			 ." , c.id AS checkID , c.car_check_total,  c.car_check_price, c.car_check_paid"
			 ." , d.id AS taxID , d.tax_price , d.tax_paid "
			 ." , e.car_check_price_service "
			 ." , f.id AS CustID , f.cust_name , f.cust_nickname , f.cust_telephone_2 , f.cust_telephone_1 "
			 ." , g.id AS CarID , g.vehicle_regis ,g.province_regis  "
			 ." , h.province_name , h.id AS provinceID "
			 ." FROM tbl_work_data AS a "
			 ." LEFT JOIN  tbl_car_act_data AS b ON b.work_id = a.id "
			 ." LEFT JOIN  tbl_car_check AS c ON c.work_id = a.id "
			 ." LEFT JOIN  tbl_car_tax_data AS d ON d.work_id = a.id "
			 ." LEFT JOIN  tbl_car_service AS e ON e.work_id = a.id "
			 ." LEFT JOIN  tbl_customer_data AS f ON a.cust_id = f.id "
			 ." LEFT JOIN  tbl_car_data AS g ON a.car_id  = g.id "
			 ." LEFT JOIN  tbl_province AS h ON g.province_regis  = h.id "
			 
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
		 $returnValue['sql']=$sql;
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
			 ." , d.vehicle_regis , e.province_name ,d.car_type_id , f.id AS carTypeID , f.type_name , b.work_overdue "
			 ." FROM  tbl_car_act_data AS a "
			 ." LEFT JOIN tbl_work_data AS b ON a.work_id = b.id "
			 ." LEFT JOIN tbl_customer_data AS c ON b.cust_id  =  c.id "
			  ." LEFT JOIN tbl_car_data AS d ON b.car_id  =  d.id "
			 ." LEFT JOIN tbl_province AS e ON d.province_regis   =  e.id "
			 ." LEFT JOIN tbl_car_type AS f ON d.car_type_id = f.id  "
			 ." WHERE act_price_total >0 AND b.do_act='0' AND a.date_work BETWEEN  '".$data['startDate']."'  AND   '".$data['endDate']."' $whereCartype $wherecCompany ORDER BY  a.act_date_start ";
		  
		    $returnValue['resultData']=$this->db->query($sql)->result();
		 	$returnValue['sql']=$sql;
		 
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
		 
		 $sql="SELECT a.id AS CheckID , count(a.id) AS countN , a.car_type, a.car_check_price ,  SUM(CASE WHEN w.work_overdue = '0' THEN a.car_check_total ELSE 0 END) AS totalCarCheckPrice , b.id AS carTypeID , c.car_type_group FROM tbl_car_check AS a LEFT JOIN tbl_work_data AS w ON a.work_id = w.id LEFT JOIN tbl_car_data AS b ON w.car_id = b.id LEFT JOIN tbl_car_type AS c ON b.car_type_id = c.id  $txtWhereDayMonthYear AND a.car_check_price > 0 AND a.free_cancel = '0' GROUP BY (a.car_check_price) ORDER BY a.car_check_price ASC , a.car_check_price ASC;";
	 
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
		
		  $txtWhereDayMonthYear  =" WHERE a.date_tax_work BETWEEN '".$dayCheck."' AND '".$dayCheck_end."'  AND w.work_overdue = '0'";
		 
		 //$sql="SELECT SUM(tax_price) AS totalTax FROM tbl_car_tax_data AS a " totalTaxService totalTaxRecieve
		 $sql="SELECT COUNT(a.id) AS countRenewTax FROM tbl_car_tax_data AS a "
			 ." LEFT JOIN tbl_work_data AS w ON a.work_id = w.id "
			 ." $txtWhereDayMonthYear ";
		 $returnValue['resultTax']=$this->db->query($sql)->result();
		 $returnValue['sql4']=$sql;
		 
		 foreach($returnValue['resultTax'] AS $tax);
		 if(isset($tax->countRenewTax)){
			
			 $returnValue['totalTaxRecieve']=$tax->countRenewTax*80;
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

		 $txtWhereDayMonthYear  =" WHERE (a.date_work BETWEEN '".$dayCheck."' AND '".$dayCheck_end."') AND w.work_overdue = '0' AND a.act_price_total > 0 ";
		 
		    $sql = "SELECT  SUM(a.act_price_total) AS act_total , SUM(a.act_price_total) AS act_price_total2 "
			 .", CASE 
	 
			 	 WHEN c.car_type_group = '1' THEN  SUM(a.act_price_total - (a.act_price_net*0.24)) 
				 WHEN c.car_type_group = '2' THEN  SUM((a.act_price))
				
				 END AS dedugPrice
			 "
			 //." CASE  WHEN c.car_type_group = '1' THEN  SUM(a.act_price_net*0.24) ELSE 0  END AS reciveAct  "
			 ." , a.act_price_total , a.act_price_net , a.deduct_percent  AS deduct_total "
			 ."  , c.car_type_group ,c.deduct_percent "
			 ." FROM tbl_car_act_data AS a "
			 ." LEFT JOIN tbl_work_data AS w ON a.work_id = w.id "
			 ." LEFT JOIN tbl_car_data AS b ON w.car_id = b.id "
			 ." LEFT JOIN tbl_car_type AS c ON b.car_type_id = c.id "
			 ." $txtWhereDayMonthYear "
			 ."  GROUP BY c.car_type_group ORDER BY c.car_type_group ASC ";
		  $returnValue['sql5']=$sql;
		  $returnValue['resultAct']=$this->db->query($sql)->result();
		 
		 
		 //-------count bike act--
		 
		  
		 $sql="SELECT COUNT(a.id) AS countBikeAct "
			 ." FROM  tbl_car_act_data AS a "
			 ." LEFT JOIN tbl_work_data AS b ON a.work_id = b.id "
			  ." LEFT JOIN tbl_car_data AS d ON b.car_id  =  d.id "
			 ." LEFT JOIN tbl_car_type AS f ON d.car_type_id = f.id  "
			 ." WHERE act_price_total >0 AND b.do_act='0'  AND (a.date_work BETWEEN '".$dayCheck."' AND '".$dayCheck_end."') AND d.car_type_id IN ('4')  ";
		  
		    $countBikeAct=$this->db->query($sql)->result();
		 	foreach($countBikeAct AS $cc);
		 	$returnValue['countBikeAct']=$cc->countBikeAct;
		    
		 	$returnValue['sql5.1']=$sql;
		 
		 
		 //-----------อื่นๆ---//
		
		 $txtWhereDayMonthYear  =" WHERE b.date_add BETWEEN '".$dayCheck."' AND '".$dayCheck_end."' ";

		 $sql = "SELECT CAST(FORMAT(SUM(a.car_check_price_service), 2) AS DECIMAL(10,2)) AS car_check_price_service  "
			  ." , CAST(FORMAT(SUM(a.service_other_price), 2) AS DECIMAL(10,2)) AS service_other_price  "
			 ." FROM  tbl_car_service AS a "
			 ." LEFT JOIN tbl_work_data AS b ON a.work_id = b.id "
			 ." $txtWhereDayMonthYear  AND b.work_overdue = '0' ";
		  $returnValue['sql6']=$sql;
		  $returnValue['resultOther']=$this->db->query($sql)->result();
		  foreach($returnValue['resultOther'] AS $other);
		  $returnValue['sumOther'] =  $other->car_check_price_service+$other->service_other_price;
		 
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
		 $returnValue['sql']=$sql;
		 
		  return $returnValue;
	 }  //select_month,select_year
	 //---------------------------------- car_check_price other_paid date_work pay_transfer2
	 function load_inspection_daily_report($data){
		 $returnValue = array();		
		 //$date_work = $this->translateDateToEng($date_work);  
		 $dayCheck = $data['select_year']."-".$data['select_month']."-".$data['select_day'];
		 $dayCheck_end = $data['select_year_end']."-".$data['select_month_end']."-".$data['select_day_end'];
		 
		 $sql="SELECT a.* , b.id AS workID , b.pay_cash , b.pay_transfer, b.pay_transfer2, b.do_act ,b.work_overdue  , c.cust_name , c.cust_nickname , CONCAT(c.cust_telephone_1,' ',c.cust_telephone_2) AS custTelephoneNo "
			  ." , d.vehicle_regis , e.province_name , f.other_paid, f.act_discount , f.act_price_total, g.car_check_price_service , g.service_other_price , h.tax_price , h.tax_service"
			  ." , j.initials_name , j.type_name , j.car_type_group , b.pay_cash_overdue , b.pay_transfer_overdue , b.pay_transfer2_overdue , b.work_overdue "
			  ." FROM tbl_car_check AS a "
			  ." LEFT JOIN tbl_work_data AS b ON a.work_id = b.id "
			  ." LEFT JOIN tbl_customer_data AS c ON b.cust_id  =  c.id "
			  ." LEFT JOIN tbl_car_data AS d ON b.car_id  =  d.id "
			  ." LEFT JOIN tbl_province AS e ON d.province_regis   =  e.id "
			  ." LEFT JOIN tbl_car_act_data AS f ON f.work_id   =  b.id "
			  ." LEFT JOIN tbl_car_service AS g ON g.work_id   =  b.id "
			  ." LEFT JOIN tbl_car_tax_data AS h ON h.work_id   =  b.id "
			  ." LEFT JOIN tbl_car_type AS j ON d.car_type_id   =  j.id "
			  ." WHERE a.car_check_date BETWEEN '".$dayCheck."' AND '".$dayCheck_end."'  ORDER BY a.car_check_date ASC ";
		  
		 $returnValue['resultData']=$this->db->query($sql);
		 $returnValue['sql']=$sql;
		 
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
	 //----------------------------------startDate endDate 
	 function listWork($data){
		 $data['startDate'] = $this->translateDateToEng($data['startDate']); 
		 $data['endDate'] = $this->translateDateToEng($data['endDate']); 
		 $sql="SELECT a.*, a.id AS workID , b.id AS custID, b.cust_name , b.cust_nickname , CONCAT(cust_telephone_1,' ', cust_telephone_2) AS custTelephone , c.id AS CarID, c.vehicle_regis , d.province_name ,e.act_no , f.insurance_no  "
			 ." FROM tbl_work_data AS a "
			 ." LEFT JOIN tbl_customer_data AS b ON a.cust_id = b.id "
			 ." LEFT JOIN tbl_car_data AS c ON a.car_id = c.id "
			 ." LEFT JOIN tbl_province AS d ON c.province_regis  = d.id "
			 ." LEFT JOIN tbl_car_act_data AS e ON a.id  = e.work_id "
			 ." LEFT JOIN  tbl_car_insurance_data AS f ON a.id  = f.work_id "
			 ." WHERE a.work_status ='1' AND (a.date_add BETWEEN '".$data['startDate']."' AND '".$data['endDate']."')"
			 ." ORDER BY a.date_add DESC, a.id ASC ";
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
	 function SavePostAddr($data){
		
		 $returnVale = array();		
		 $returnVale['doDb']='0';
		 $data['date_of_submission'] =$this->translateDateToEng($data['date_of_submission']); 
		 
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
		 }else{
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
		 	if($data['tax_price']!=''){
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
				
			}
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