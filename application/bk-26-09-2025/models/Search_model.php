<?php
 class Search_model extends CI_Model
 {
 
   function __construct()
    {
        parent::__construct();
    }

	 //------------------------------------------- getbillingSelect($idArray)
	 function getbillingSelect($idArray){
		  $sql="SELECT a.* , b.company_name, c.insurance_type_name "
			 ." FROM tbl_insurance_data AS a "
			 ." LEFT JOIN  tbl_insurance_company AS b ON a.insurance_corp_id = b.id "
			 ." LEFT JOIN   tbl_insurance_type AS c ON a.insurance_type_id = c.id "
			 ." WHERE a.id IN (".$idArray.") ";
		 $returnValue['resultData']= $this->db->query($sql)->result();
		 $returnValue['sql']=$sql;
		 return $returnValue;
		 
	 }
	 //------------------------------------------- custname:custname,plate_license custname vehicle_regis agent_id insurance_corp_id
	 function searchCustForbilling($data){
		  $txtWherePlate = '';
		  $txtWhereCustName = "";
		  $txtWhereCustName2 = "";
		  $txtWhereCustName3 = "";
		  $txtWhereCustName4 = "";
		  $txtWhereCustName5 = "";
		  $txtWhereAgent = "";
		  $txtWhereAgent2 = "";
		  $txtWhereAgent3 = "";
		  $txtWhereAgent4 = "";
		  $txtWhereAgent5 = "";
		  $txtWhereCorp = "";
		  $txtWhereCorp2 = "";
		  $txtWhereCorp3 = "";
		  $txtWhereCorp4 = "";
		  $txtWhereCorp5 = "";
		  
		  $returnValue = array();
		 
		 if($data['custname']!=''){
			 $txtWhereCustName = " AND a.cust_name LIKE '%".$data['custname']."%' ";
			 $txtWhereCustName2 = " AND x.cust_name LIKE '%".$data['custname']."%' ";
			 $txtWhereCustName3 = " AND h.cust_name LIKE '%".$data['custname']."%' ";
			 $txtWhereCustName4 = " AND s.cust_name LIKE '%".$data['custname']."%' ";
			 $txtWhereCustName5 = " AND t.cust_name LIKE '%".$data['custname']."%' ";
		 }
 		
		 if($data['agent_id']!='x'){
			 $txtWhereAgent = " AND a.agent_id = '".$data['agent_id']."' ";
			 $txtWhereAgent2 = " AND x.agent_id = '".$data['agent_id']."' ";
			 $txtWhereAgent3 = " AND h.agent_id = '".$data['agent_id']."' ";
			 $txtWhereAgent4 = " AND s.agent_id = '".$data['agent_id']."' ";
			 $txtWhereAgent5 = " AND t.agent_id = '".$data['agent_id']."' ";
		 }
		  if($data['insurance_corp_id']!='x'){
			 $txtWhereCorp = " AND (a.insurance_corp_id = '".$data['insurance_corp_id']."' OR a.corp_id = '".$data['insurance_corp_id']."') ";
			 $txtWhereCorp2 = " AND x.corp_id = '".$data['insurance_corp_id']."' ";
			 $txtWhereCorp3 = " AND h.corp_id = '".$data['insurance_corp_id']."' ";
			 $txtWhereCorp4 = " AND s.corp_id = '".$data['insurance_corp_id']."' ";
			 $txtWhereCorp5 = " AND t.corp_id = '".$data['insurance_corp_id']."' ";
		 }	
		
		 if($data['plate_license']!=''){
			 $txtWherePlate = " AND a.vehicle_regis LIKE '%".$data['plate_license']."%' ";
			 $txtWherePlate4 = " AND s.register LIKE '%".$data['plate_license']."%' ";
		 }
		 
		 // plate_license select_day_start:select_day_start,select_month_start:select_month_start,select_day_end:select_day_end,select_month_end:select_month_end,select_year:select_year field 
		 
		 $dateStart = $data['select_year']."-".$data['select_month_start']."-".$data['select_day_start'];
		 $dateEnd = $data['select_year']."-".$data['select_month_end']."-".$data['select_day_end'];
		 
		 
		 $txtWhereTime = " AND (( a.insurance_start BETWEEN '".$dateStart."' AND '".$dateEnd."' ) OR ( a.act_date_start BETWEEN '".$dateStart."' AND '".$dateEnd."' ))   ";
		 $txtWhereTime2 = " AND ( x.insurance_start BETWEEN '".$dateStart."' AND '".$dateEnd."' )  ";
		 $txtWhereTime3 = " AND ( h.insurance_start BETWEEN '".$dateStart."' AND '".$dateEnd."' )  ";
		 $txtWhereTime4 = " AND ( s.insurance_start BETWEEN '".$dateStart."' AND '".$dateEnd."' )  ";
		 $txtWhereTime5 = " AND ( t.insurance_start BETWEEN '".$dateStart."' AND '".$dateEnd."' )  ";
		 
		if($data['exclude_contact']=='1'){
					  $txtWhereTime="   AND ((YEAR( a.insurance_start)= '".$data['select_year']."') OR YEAR( a.act_date_start)= '".$data['select_year']."') ";
					  $txtWhereTime2 ="  AND YEAR( x.insurance_start)= '".$data['select_year']."'  "; 		
					  $txtWhereTime3 ="  AND YEAR( h.insurance_start)= '".$data['select_year']."'  "; 		
					  $txtWhereTime4 ="  AND YEAR( s.insurance_start)= '".$data['select_year']."'  "; 		
					  $txtWhereTime5 ="  AND YEAR( t.insurance_start)= '".$data['select_year']."'  "; 		
		}
		 
		// y.id h.corp_id payment_amount
		 
		 $sql="SELECT id , insurance_no , cust_name , cust_nickname , vehicle_regis , insurance_start , act_date_start , company_name , insurance_type_name , insurance_data_type "
			  ." FROM ( "
			  ."SELECT a.id , a.insurance_no , a.cust_name , a.cust_nickname , a.vehicle_regis , a.insurance_start ,act_date_start , b.company_name, c.insurance_type_name ,a.insurance_data_type "   //old ver
			  ." FROM tbl_insurance_data AS a "
			  ." LEFT JOIN  tbl_insurance_company AS b ON a.insurance_corp_id = b.id "
			  ." LEFT JOIN  tbl_insurance_type AS c ON a.insurance_type_id = c.id "
			  ." WHERE 1  $txtWhereCustName $txtWhereAgent $txtWhereCorp $txtWherePlate $txtWhereTime AND  insurance_data_type='1' ";
		 
		$sqlUnion= " UNION ";
		$sqlPA = " SELECT x.work_id ,  x.policy_number , x.cust_name , x.cust_nickname ,'PA' , x.insurance_start , 'x' , y.company_name , 'PA' ,'4' "
			  ." FROM tbl_insurance_accident_data AS x "
			  ." LEFT JOIN  tbl_insurance_company AS y ON x.corp_id = y.id "
			  ." WHERE 1 $txtWhereCustName2 $txtWhereAgent2 $txtWhereCorp2  $txtWhereTime2  ";
		
	   $sqlHOME = " SELECT h.work_id ,  h.policy_number , h.cust_name , h.cust_nickname ,'ประกันบ้าน' , h.insurance_start , 'x' , g.company_name , 'บ้าน' ,'5' "
			  ." FROM tbl_insurance_home_data AS h "
			  ." LEFT JOIN  tbl_insurance_company AS g ON h.corp_id = g.id "
			  ." WHERE 1 $txtWhereCustName3 $txtWhereAgent3 $txtWhereCorp3  $txtWhereTime3  ";
	
	    $sqlShipping = " SELECT s.work_id ,  s.policy_number , s.cust_name , s.cust_nickname , s.register , s.insurance_start , 'x' , z.company_name , 'ขนส่ง' ,'3' "
			  ." FROM tbl_insurance_shpping_data AS s "
			  ." LEFT JOIN  tbl_insurance_company AS z ON s.corp_id = z.id "
			  ." WHERE 1 $txtWhereCustName4 $txtWhereAgent4 $txtWhereCorp4  $txtWhereTime4  ";
		 
	    $sqlTreavel = " SELECT t.work_id ,  t.policy_number , t.cust_name , t.cust_nickname ,'ประกันท่องเที่ยว' , t.insurance_start , 'x' , r.company_name , 'ท่องเที่ยว' ,'2' "
			  ." FROM tbl_insurance_travel_data AS t "
			  ." LEFT JOIN  tbl_insurance_company AS r ON t.corp_id = r.id "
			  ." WHERE 1 $txtWhereCustName5 $txtWhereAgent5 $txtWhereCorp5  $txtWhereTime5  ";		 
		 
		$sqlClose =	" ) AS combined_data ";
		
		 if($data['plate_license']!=''){
			 $sqlPA ='';
			 $sqlUnion ='';
		 }
		 
		 $sql= $sql.$sqlUnion.$sqlPA.$sqlUnion.$sqlHOME.$sqlUnion.$sqlShipping.$sqlUnion.$sqlTreavel.$sqlClose;
		 
		 $returnValue['resultData']= $this->db->query($sql)->result();
		 $returnValue['sql']=$sql;
		 return $returnValue;
		 
	 }
	 
 }