<?php
 class Report_model extends CI_Model
 {
    function __construct()
    {
        parent::__construct();
    }
    ######################################################### select_year_protect
	//----------------------------------work_id, changeValue
	 function updateNote($param){
		  $returnValue = array();
		  $returnValue['success'] = 0;
		 $sql="UPDATE tbl_insurance_data SET note_to_customer = '".$param['changeValue']."' WHERE id = '".$param['work_id']."'  ";
		 if($this->db->query($sql)){
			 $returnValue['success'] = 1;
		 }
		 return $returnValue;
	 }
	//----------------------------------
	 function getCodeForInsuranceCorp($param){
		  $returnValue = array();
		 $param['dateStart'] = $param['select_yearStart']."-".$param['select_month_start']."-".$param['select_day_start'];
	     $param['dateEnd'] = $param['select_year']."-".$param['select_month_end']."-".$param['select_day_end'];
		  $sql = " SELECT ins_code_id AS codeID FROM tbl_insurance_data WHERE insurance_corp_id ='".$param['corp_id']."' AND data_status='1' AND insurance_start BETWEEN '".$param['dateStart']."' AND '".$param['dateEnd']."'   "
			  	." UNION "
			    ." SELECT act_code_id AS codeID FROM tbl_insurance_data WHERE corp_id ='".$param['corp_id']."' AND data_status='1' AND act_date_start BETWEEN '".$param['dateStart']."' AND '".$param['dateEnd']."'  "
			  	." UNION "
			    ." SELECT code_id AS codeID FROM  tbl_insurance_travel_data WHERE corp_id ='".$param['corp_id']."' AND data_status='1' AND insurance_start BETWEEN '".$param['dateStart']."' AND '".$param['dateEnd']."' "
			    ." UNION "
			    ." SELECT code_id AS codeID FROM  tbl_insurance_shpping_data WHERE corp_id ='".$param['corp_id']."' AND data_status='1' AND insurance_start BETWEEN '".$param['dateStart']."' AND '".$param['dateEnd']."' "
			  	." UNION "
			    ." SELECT code_id AS codeID FROM  tbl_insurance_accident_data WHERE corp_id ='".$param['corp_id']."' AND data_status='1' AND insurance_start BETWEEN '".$param['dateStart']."' AND '".$param['dateEnd']."' "
			    ." UNION "
			    ." SELECT code_id AS codeID FROM  tbl_insurance_home_data WHERE corp_id ='".$param['corp_id']."' AND data_status='1' AND insurance_start BETWEEN '".$param['dateStart']."' AND '".$param['dateEnd']."' "
			   ." ";
		 $returnValue['getData']=$this->db->query($sql)->result();
		 $returnValue['sql']=$sql;
		 $getCodeID = array();
		 $returnValue['countID']=0;
		 foreach($returnValue['getData'] AS $data){
			 if($data->codeID!=0){
				  $getCodeID[] = $data->codeID;
				   $returnValue['countID']++;
			 }
		 }
		 if( $returnValue['countID'] > 0){
			  $codeID = implode(",",$getCodeID);
		 	  $sql="SELECT id, conde_name FROM  tbl_code_data WHERE id IN (".$codeID.") ";
		      $returnValue['resultGetCode']=$this->db->query($sql)->result();
		      $returnValue['sqlGetCode']=$sql;
		 }
		 return $returnValue;
	 }
	//----------------------------------
	function GetCorpIncomeList($param){
	   $returnValue = array();
	   $param['dateStart'] = $param['select_yearStart']."-".$param['select_month_start']."-".$param['select_day_start'];
	   $param['dateEnd'] = $param['select_year']."-".$param['select_month_end']."-".$param['select_day_end'];
		 $txtCodeIns = ""; 
		 $txtCodeAct = ""; 
		 $txtCodeTrevel = ""; 
		 $txtCodePa = ""; 
		 $txtCodeTransport = ""; 
		 $txtCodeHome = ""; 
		  $whereCodeIns = '';
		//  Treavel Transport Home PA  t6.id 
		$numericValues = array_filter($param['insType'], function($value) {
    			return is_numeric($value);
		});
		$alphabetValues = array_filter($param['insType'], function($value) {
    			return !is_numeric($value);
		});
		$returnValue['numericValues'] = $numericValues;
		$returnValue['alphabetValues'] = $alphabetValues;
		$getTypeIDSql = implode(",",$returnValue['numericValues']);
		$returnValue['Treavel']='no';
		if (in_array("'Treavel'", $param['insType'])) {
			$returnValue['Treavel']='have';
		}
		if($param['selectedCode']!='all'){
			 $param['ins_code_id'] = implode(",",$param['selectedCodeValues']);
			 $txtCodeIns = " AND t1.ins_code_id  IN (".$param['ins_code_id'].") " ;
			 $txtCodeAct = " AND t2.act_code_id  IN(".$param['ins_code_id']." ) " ;
			 $txtCodeTransport = " AND t3.code_id  IN(".$param['ins_code_id'].") " ;
			 $txtCodeTravel = " AND t4.code_id  IN(".$param['ins_code_id'].") " ;
			 $txtCodePa = " AND t7.code_id  IN(".$param['ins_code_id'].") " ;
			 $txtCodeHome = " AND t5.code_id  IN(".$param['ins_code_id'].") " ;
		}else{
			 $txtCodeIns = " " ;
			 $txtCodeAct = " " ;
			 $txtCodeTransport = " " ;
			 $txtCodeTravel = " " ;
			 $txtCodePa = " " ;
			 $txtCodeHome = " " ;
			 $param['ins_code_id'] ="";
		}
		//if($param['ins_code_id']!='x'){
		//}
		if($param['corp_id']=='x'){
			$txtCorp ='';
		}else{
			$txtCorp =" AND t6.id =  '".$param['corp_id']."' ";
		}
		echo $param['ins_code_id']."<br>";
		    $txtTypeIns  = " AND t1.insurance_type_id IN (".$getTypeIDSql.")";
	  	//-----------insurance data---------- insurance_type_name-  $sqlTransport  $sqlTreavel-// ** 
		 $sqlIns = ""; $sqlAct="";$sqlTravel=""; $sqlTransport='';$sqlHome='';$sqlPA='';
		 $sumSql=0;  $workType  = implode(",",$param['workType']);
		 $wx_array = explode(",", $workType); // Convert string to array
		 $workTypeSet = "'" . implode("','", $wx_array) . "'";; // Join array with single quotes
		$txtUnion1 = '';$txtUnion2 = '';$txtUnion3 = '';$txtUnion4 = '';$txtUnion5 = '';
		if (!empty($numericValues)) {  //กรณีได้เลือกประกัน ป1-ป3
		 $sqlIns=" SELECT 1 AS Seq , 
					t1.id AS workID, 
					tc.conde_name, 
					tc.id AS code_id, 
					t1.ins_code_id, 
					t1.cust_name, 
					t1.insurance_data_type AS insurance_type,  
					t1.insurance_type_id ,
					t7.insurance_type_name ,
					t6.company_name, 
					t6.id AS company_id,  
					t1.insurance_total_net AS total_price_net  ,
					t1.insurance_price AS insurance_price , 
					t1.insurance_start  AS protect_date_start,
					t1.vehicle_regis ,
					t8.province_name ,
					CASE WHEN t1.insurance_renew = '0' THEN 'ต่ออายุ'
					     WHEN t1.insurance_renew = '1' THEN 'งานใหม่'
					     WHEN t1.insurance_renew = '2' THEN 'ต่อ ย้าย'
						 END AS WorkType,
					t1.insurance_renew AS InsRenew ,
					t9.agent_name
				FROM tbl_insurance_data t1
				LEFT JOIN tbl_insurance_company t6 ON  t1.insurance_corp_id = t6.id 
				LEFT JOIN tbl_insurance_type t7 ON  t1.insurance_type_id = t7.id 
				LEFT JOIN tbl_province t8 ON  t1.province_regis  = t8.id 
				LEFT JOIN tbl_agent_data t9 ON  t1.agent_id  = t9.id 
				JOIN tbl_code_data tc ON t1.ins_code_id = tc.id 
				WHERE 
					t1.insurance_start BETWEEN '".$param['dateStart']."' AND '".$param['dateEnd']."'  
					$txtCorp $txtTypeIns $txtCodeIns AND t1.insurance_renew IN (".$workTypeSet.")
			  ";
			$returnValue['numericValues']='yes';
			$sumSql++;
		 }
		if (!empty($alphabetValues)) {  //กรณีได้เลือกประกัน ป1-ป3  a.renewal
		if (in_array("'Act'", $param['insType'])) { 
		  if($sqlIns!=''){
			  $txtUnion1 = ' UNION ALL ';
		  }	
		  $sqlAct ="SELECT 2 AS Seq , 
					t2.id AS workID, 
					tc.conde_name, 
					tc.id AS code_id, 
					t2.act_code_id AS ins_code_id, 
					t2.cust_name, 
					t2.insurance_data_type AS insurance_type,  
					t2.insurance_type_id ,
					'พ.ร.บ.' AS insurance_type_name ,
					t6.company_name, 
					t6.id AS company_id,  
					t2.act_price_net AS total_price_net ,
					t2.act_price AS insurance_price ,
					t2.act_date_start  AS protect_date_start , 
					t2.vehicle_regis ,
					t8.province_name ,
					CASE WHEN t2.insurance_renew = '0' THEN 'ต่ออายุ'
					     WHEN t2.insurance_renew = '1' THEN 'งานใหม่'
					     WHEN t2.insurance_renew = '2' THEN 'ต่อ ย้าย'
						 END AS WorkType ,
					t2.insurance_renew AS InsRenew ,
					t9.agent_name 
				FROM tbl_insurance_data t2
				LEFT JOIN tbl_insurance_company t6 ON  t2.corp_id = t6.id 
				LEFT JOIN tbl_province t8 ON  t2.province_regis  = t8.id 
				LEFT JOIN tbl_agent_data t9 ON  t2.act_agent_id  = t9.id 
				JOIN tbl_code_data tc ON t2.act_code_id = tc.id 
				WHERE 
					t2.act_date_start BETWEEN '".$param['dateStart']."' AND '".$param['dateEnd']."'  
					$txtCorp  $txtCodeAct   AND t2.insurance_renew IN (".$workTypeSet.")
			  "; 
			  $sumSql++;
		  }
			//--------ประกันเบ็ดเตล็ด---------//
		//--ปรับค่าใน array + 1
		array_walk($param['workType'], function(&$value) {
				$value += 1;
			});
		$workType  = implode(",",$param['workType']);
		$wx_array = explode(",", $workType); // Convert string to array
		$workTypeSet = "'" . implode("','", $wx_array) . "'";; 	
		$workTypeInsOther=$workTypeSet;	
		//echo "<br> >>> ".$workTypeInsOther;
		//echo "<br>";
			if (in_array("'Transport'", $param['insType'])) { 
				if(($sqlIns!='')|| ($sqlAct!='')){
			         $txtUnion2 = ' UNION ALL ';
		        }	
				$sqlTransport="SELECT 3 AS Seq , 
					t3.work_id AS workID, 
					tc.conde_name, 
					tc.id AS code_id, 
					t3.code_id AS ins_code_id, 
					t3.cust_name, 
					'3' AS insurance_type,  
					'travel' AS insurance_type_id ,
					'ขนส่ง' AS insurance_type_name ,
					t6.company_name, 
					t6.id AS company_id,  
					t3.premium AS total_price_net ,
					t3.total_price AS insurance_price ,
					t3.insurance_start  AS protect_date_start , 
					t3.register AS vehicle_regis ,
					'' AS province_name ,
					
					CASE WHEN t3.renewal = '1' THEN 'ต่ออายุ'
					     WHEN t3.renewal = '2' THEN 'งานใหม่'
					     WHEN t3.renewal = '3' THEN ''
						 END AS WorkType ,
					t3.renewal AS InsRenew ,
					t9.agent_name  
				FROM tbl_insurance_shpping_data t3
				LEFT JOIN tbl_insurance_company t6 ON  t3.corp_id = t6.id 
				LEFT JOIN tbl_agent_data t9 ON  t3.agent_id = t9.id 
				JOIN tbl_code_data tc ON t3.code_id = tc.id 
				WHERE 
					t3.insurance_start BETWEEN '".$param['dateStart']."' AND '".$param['dateEnd']."'  
					$txtCorp $txtCodeTransport AND t3.renewal IN (".$workTypeInsOther.")
			  "; 
			 $sumSql++;
		  }	
		   if(in_array("'Treavel'", $param['insType'])) {  
			   if(($sqlIns!='')|| ($sqlAct!='') || ($sqlTransport!='')){
			         $txtUnion3 = ' UNION ALL ';
		        }	
			 $sqlTravel="SELECT 4 AS Seq , 
						t4.work_id AS workID, 
						tc.conde_name, 
						tc.id AS code_id, 
						t4.code_id AS ins_code_id, 
						t4.cust_name, 
						'3' AS insurance_type,  
						'travel' AS insurance_type_id ,
						'เดินทาง' AS insurance_type_name ,
						t6.company_name, 
						t6.id AS company_id,  
						t4.Insurance_price AS total_price_net ,
						t4.Insurance_price_total AS insurance_price ,
						t4.insurance_start  AS protect_date_start , 
						'' AS vehicle_regis ,
						 '' AS province_name ,
						
					CASE WHEN t4.renewal = '1' THEN 'ต่ออายุ'
					     WHEN t4.renewal = '2' THEN 'งานใหม่'
					     WHEN t4.renewal = '3' THEN ''
						 END AS WorkType ,
					t4.renewal AS InsRenew ,
					 t9.agent_name 
					FROM tbl_insurance_travel_data t4
					LEFT JOIN tbl_insurance_company t6 ON  t4.corp_id = t6.id 
					LEFT JOIN tbl_agent_data t9 ON  t4.agent_id = t9.id 
					JOIN tbl_code_data tc ON t4.code_id = tc.id 
					WHERE 
						t4.insurance_start BETWEEN '".$param['dateStart']."' AND '".$param['dateEnd']."'  
						$txtCorp $txtCodeTravel AND t4.renewal IN (".$workTypeInsOther.")
				  "; 
			    $sumSql++;
		  }	
		   if(in_array("'Home'", $param['insType'])) {  
			   if(($sqlIns!='')|| ($sqlAct!='') || ($sqlTransport!='')|| ($sqlTravel!='')){
			         $txtUnion4 = ' UNION ALL ';
		        }
			 $sqlHome="SELECT 5 AS Seq , 
						t5.work_id AS workID, 
						tc.conde_name, 
						tc.id AS code_id, 
						t5.code_id AS ins_code_id, 
						t5.cust_name, 
						'3' AS insurance_type,  
						'travel' AS insurance_type_id ,
						'ประกันอัคคีภัย' AS insurance_type_name ,
						t6.company_name, 
						t6.id AS company_id,  
						t5.totalprice_installment AS total_price_net ,
						t5.total_price AS insurance_price ,
						t5.insurance_start  AS protect_date_start , 
						'' AS vehicle_regis ,
						 '' AS province_name ,
					CASE WHEN t5.renewal = '1' THEN 'ต่ออายุ'
					     WHEN t5.renewal = '2' THEN 'งานใหม่'
					     WHEN t5.renewal = '3' THEN ''
						 END AS WorkType ,
					t5.renewal AS InsRenew ,
					 t9.agent_name 
					FROM tbl_insurance_home_data t5
					LEFT JOIN tbl_insurance_company t6 ON  t5.corp_id = t6.id 
					LEFT JOIN tbl_agent_data t9 ON  t5.agent_id = t9.id 
					JOIN tbl_code_data tc ON t5.code_id = tc.id 
					WHERE 
						t5.insurance_start BETWEEN '".$param['dateStart']."' AND '".$param['dateEnd']."'  
						$txtCorp $txtCodeHome  AND t5.renewal IN (".$workTypeInsOther.")
				  "; 
			    $sumSql++;
		  }	
	  if(in_array("'PA'", $param['insType'])) {  
			   if(($sqlIns!='')|| ($sqlAct!='') || ($sqlTransport!='')|| ($sqlTravel!='')|| ($sqlHome!='')){
			         $txtUnion5 = ' UNION ALL ';
		        }
			 $sqlPA="SELECT 6 AS Seq , 
						t7.work_id AS workID, 
						tc.conde_name, 
						tc.id AS code_id, 
						t7.code_id AS ins_code_id, 
						t7.cust_name, 
						'3' AS insurance_type,  
						'travel' AS insurance_type_id ,
						'ประกันอุบัติเหตุ' AS insurance_type_name ,
						t6.company_name, 
						t6.id AS company_id,  
						t7.totalprice_installment AS total_price_net ,
						t7.total_price AS insurance_price ,
						t7.insurance_start  AS protect_date_start , 
						'' AS vehicle_regis ,
						 '' AS province_name ,
					 CASE WHEN t7.renewal = '1' THEN 'ต่ออายุ'
					     WHEN t7.renewal = '2' THEN 'งานใหม่'
					     WHEN t7.renewal = '3' THEN ''
						 END AS WorkType ,
					t7.renewal AS InsRenew ,
					 t9.agent_name 
					FROM tbl_insurance_accident_data t7
					LEFT JOIN tbl_insurance_company t6 ON  t7.corp_id = t6.id 
					LEFT JOIN tbl_agent_data t9 ON  t7.agent_id = t9.id 
					JOIN tbl_code_data tc ON t7.code_id = tc.id 
					WHERE 
						t7.insurance_start BETWEEN '".$param['dateStart']."' AND '".$param['dateEnd']."'  
						$txtCorp $txtCodePa  AND t7.renewal IN (".$workTypeInsOther.")
				  "; 
		  	 $sumSql++;
		  }	
		} //end if (!empty($alphabetValues)) {  
		//$txtUnion1 = 'UNION ALL'; $txtUnion2 = 'UNION ALL';$txtUnion3 = 'UNION ALL';$txtUnion4 = 'UNION ALL';$txtUnion5 = 'UNION ALL';  
		//echo  '<br>sumSql>>>>> '.$sumSql."<br>";
		$sql="SELECT * FROM ( 
					$sqlIns 
					$txtUnion1
					$sqlAct
					$txtUnion2
					$sqlTransport
					$txtUnion3
					$sqlTravel
					$txtUnion4
					$sqlHome
					$txtUnion5
					$sqlPA
			) AS combined_result
			ORDER BY code_id ASC , protect_date_start ASC  ";
			//ORDER BY Seq ASC , protect_date_start ASC  ";
		$returnValue['sql'] =$sql;
		$returnValue['getDb']=$this->db->query($sql)->result();
		return $returnValue;
	}
	//---------------------------------- 
	 function addCodeIncome($param){
		  $returnValue = array();
		  $returnValue['addIncome']='0';
		   $param['income_total_net'] = $this->removeCommaReport($param['income_total_net']);
		   $start_protection_date = $param['select_year_protect']."-".$param['select_month_protect']."-".$param['select_day_protect'];
		   $end_protection_date = $param['select_year_protect']."-".$param['select_month_end']."-".$param['select_day_end'];
		   $sql="INSERT INTO `tbl_code_income_other` (`id`, `code_id`, `start_protection_date`, `end_protection_date`, `income_total_net`, `cust_name`, `data_status`, `user_id_add`, `insurance_corp_id`) VALUES ('', '".$param['ins_code_id']."', '".$start_protection_date."', '".$end_protection_date."', '".$param['income_total_net']."', '".$param['cust_name']."', '1', '".$this->session->userdata('user_id')."', '".$param['insurance_corp_id']."') ";
		   if($this->db->query($sql)){
			   $returnValue['addIncome']='1';
		   }
		  $returnValue['sql']=$sql;
		  return $returnValue;
	 }
	//----------------------------------
	function getFollowData($referID){
			 $sql="SELECT * FROM tbl_follow_up_customer WHERE work_id = '".$referID."' ";
			 $returnValue['sql_follow']=$sql;
		     $numRow = $this->db->query($sql)->num_rows();
		     $returnValue['follow']['numRow']=$numRow;
		    if($numRow > 0){ 
				 $result = $this->db->query($sql)->result();
				 foreach($result AS $data){
					 $returnValue['follow']['followID'] = $data->id;
					 $returnValue['follow']['insurance_type_id'] = $data->insurance_type ;
					 $returnValue['follow']['follow_sum_insured'] = $data->sum_insured;
					 $returnValue['follow']['follow_insurance_price'] = $data->insurance_price;
					 $returnValue['follow']['follow_act_price'] = $data->act_price;
					 $returnValue['follow']['folow_1'] = $data->folow_1;
					 $returnValue['follow']['folow_2'] = $data->folow_2;
					 $returnValue['follow']['folow_3'] = $data->folow_3;
					 $returnValue['follow']['folow_4'] = $data->folow_4;
					 $returnValue['follow']['folow_5'] = $data->folow_5;
				 }
			}else{
					 $returnValue['follow']['followID'] = '';
					 $returnValue['follow']['insurance_type_id'] = '';
					 $returnValue['follow']['follow_sum_insured'] = '';
					 $returnValue['follow']['follow_insurance_price'] = '';
					 $returnValue['follow']['follow_act_price'] = '';
					 $returnValue['follow']['folow_1'] = '';
					 $returnValue['follow']['folow_2'] = '';
					 $returnValue['follow']['folow_3'] = '';
					 $returnValue['follow']['folow_4'] = '';
					 $returnValue['follow']['folow_5'] = '';
			}	
		return $returnValue;
	} 
	//----------------------------------
	 function removeCommaReport($theValue){
		$NewValue = str_replace(",","",$theValue);
		return $NewValue;
  	}
	//------------------------------------------------------- followCount followID
	 function updateFollow($param){
		  $returnValue=array();
		  $returnValue['work_id']=$param['work_id'];
		 //-------set value follow---
		 $updateValue = array();
		 $returnValue['doDb'] = 0;
		 for($i=1;$i<=5;$i++){
			  $iname = "folow_".$i;
			  $updateValue[$i]=$param[$iname];
		 }
		 $param['sum_insured'] = $this->removeCommaReport($param['sum_insured']);
		 $param['insurance_price'] = $this->removeCommaReport($param['insurance_price']);
		 $param['insurance_total'] = $this->removeCommaReport($param['insurance_total']);
		 if(isset( $param['insurance_total'])){ $param['insurance_total'] = $this->removeCommaReport($param['insurance_total']);}
		 if(isset($param['act_price'])){
			  $param['act_price'] = $this->removeCommaReport($param['act_price']);
		 }else{
			  $param['act_price'] =0;
		 }
		 if(!isset($param['insurance_type'])){
			 $param['insurance_type']=0;
		 }
		 if($param['followID']==''){
				$sql="INSERT INTO `tbl_follow_up_customer` (`id`, `work_id`, `insurance_type`, `sum_insured`, `insurance_price`, `act_price`, `insurance_total`, `folow_1`, `folow_2`, `folow_3`, `folow_4`, `folow_5`, `remark`) "
				 ." VALUES "
				 ."('', '".$param['work_id']."', '".$param['insurance_type']."', '".$param['sum_insured']."', '".$param['insurance_price']."', '".$param['act_price']."','".$param['insurance_total']."', '".$updateValue[1]."', '".$updateValue[2]."', '".$updateValue[3]."', '".$updateValue[4]."', '".$updateValue[5]."', '') ";
			    $returnValue['sql']=$sql;
			    if($this->db->query($sql)){
					$returnValue['followID']=$this->db->insert_id();
					$returnValue['doDb'] = 1;
				}
		 }else{
			  $sql="UPDATE tbl_follow_up_customer SET `insurance_type`= '".$param['insurance_type']."', `sum_insured` = '".$param['sum_insured']."', `insurance_price` = '".$param['insurance_price']."' , `act_price` = '".$param['act_price']."', `folow_1` = '".$updateValue[1]."', `folow_2` ='".$updateValue[2]."' , `folow_3`='".$updateValue[3]."', `folow_4` = '".$updateValue[4]."' , `folow_5` = '".$updateValue[5]."', `remark` = '' , `insurance_total`='".$param['insurance_total']."' WHERE id = '".$param['followID']."' ";
			   $returnValue['sql']=$sql;
			    if($this->db->query($sql)){
					$returnValue['followID']=$param['followID'];
					$returnValue['doDb'] = 1; 
				}
		 }
		 //$sql="UPDATE tbl_insurance_data SET renew_remark = 'have remark' WHERE id = '".$param['work_id']."' ";
		 //$this->db->query($sql);
		 return  $returnValue;
	 }
	//------------------------------------------------------- 
	 function updateAlertExpire($param){
		 $returnValue=array();
		 $returnValue['doDb']=0;
		 $fieldType = $param['fieldType'];
		 $sql="UPDATE tbl_insurance_data SET ".$fieldType." = '".$param['iamValue']."' WHERE id = '".$param['workID']."'  ";
		 if($this->db->query($sql)){
			 $returnValue['doDb']=1;
		 }
		 //$returnValue['sql']=$sql;
		 return $returnValue;
	 }
	//-------------------------------------------------------follow_sum_insured
	 function GetAlertRemark($param){
		 $returnValue=array();
		 if($param['data_type']=='1'){
			$sql="SELECT a.* ,a.id AS work_id , b.company_name , c.insurance_type_name, d.province_name , e.agent_name  "
				 ." ,  (SELECT COUNT(id) FROM tbl_insurance_payment WHERE work_id = a.id) AS countInstallment "
				 ."FROM tbl_insurance_data AS a "
				 ." LEFT JOIN tbl_insurance_company AS b ON a.insurance_corp_id = b.id "
				 ." LEFT JOIN tbl_insurance_type AS c ON a.insurance_type_id  = c.id "
				 ." LEFT JOIN tbl_province AS d ON a.province_regis   = d.id "
				 ." LEFT JOIN  tbl_agent_data AS e ON a.agent_id   = e.id "
				 ." WHERE a.id = '".$param['workID']."'  ";
			 $result= $this->db->query($sql)->result();
			 foreach($result AS $data){
				 $returnValue['insuranceData'] = $data;
			 }
			 $returnValue['sql']=$sql;
		 }else if($param['data_type'] > '1'){
			switch($param['data_type']){
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
			  	  $sql="SELECT a.id AS work_id , a.note_to_customer , b.company_name ,  e.agent_name , f.id AS OtherID , f.*"
				 ." ,  (SELECT COUNT(id) FROM tbl_insurance_payment WHERE work_id = a.id) AS countInstallment "
				 ." FROM $tbl AS f "
				 ." LEFT JOIN tbl_insurance_data AS a  ON   a.id = f.work_id "
				 ." LEFT JOIN tbl_insurance_company AS b ON f.corp_id  = b.id "
				 ." LEFT JOIN  tbl_agent_data AS e ON f.agent_id   = e.id "
				 ." WHERE a.id = '".$param['workID']."'  ";
			  $returnValue['sql']=$sql;
			  $result = $this->db->query($sql)->result();
			  foreach($result AS $data){
				  $returnValue['insuranceOtherID'] = $data->id;
				  $returnValue['work_id']=$data->work_id;
				  $returnValue['insuranceData'] = $data;
			  }
		 }
		  //--------get follow --------//  followID insurance_type_id sum_insured insurance_price act_price folow_
			 $sql="SELECT * FROM tbl_follow_up_customer WHERE work_id = '".$param['workID']."' ";
			 $returnValue['sql_follow']=$sql;
		     $numRow = $this->db->query($sql)->num_rows();
		     $returnValue['follow']['numRow']=$numRow;
		    if($numRow > 0){ 
				 $result = $this->db->query($sql)->result();
				 foreach($result AS $data){
					 $returnValue['follow']['followID'] = $data->id;
					 $returnValue['follow']['insurance_type_id'] = $data->insurance_type ;
					 $returnValue['follow']['follow_sum_insured'] = $data->sum_insured;
					 $returnValue['follow']['follow_insurance_price'] = $data->insurance_price;
					 $returnValue['follow']['follow_act_price'] = $data->act_price;
					 $returnValue['follow']['insurance_total'] = $data->insurance_total;
					 $returnValue['follow']['folow_1'] = $data->folow_1;
					 $returnValue['follow']['folow_2'] = $data->folow_2;
					 $returnValue['follow']['folow_3'] = $data->folow_3;
					 $returnValue['follow']['folow_4'] = $data->folow_4;
					 $returnValue['follow']['folow_5'] = $data->folow_5;
				 }
			}else{
					 $returnValue['follow']['followID'] = '';
					 $returnValue['follow']['insurance_type_id'] = '';
					 $returnValue['follow']['follow_sum_insured'] = '';
					 $returnValue['follow']['follow_insurance_price'] = '';
					 $returnValue['follow']['follow_act_price'] = '';
					 $returnValue['follow']['insurance_total'] = '';
					 $returnValue['follow']['folow_1'] = '';
					 $returnValue['follow']['folow_2'] = '';
					 $returnValue['follow']['folow_3'] = '';
					 $returnValue['follow']['folow_4'] = '';
					 $returnValue['follow']['folow_5'] = '';
			}
		  return $returnValue;
	 }
	//-------------------------------------------------------
	 function DoUpdateAlerRemark($param){
		$returnValue=array();
		$returnValue['doDb']=0;
		$returnValue['isEmpty']=0;
		$returnValue['xxx']=strlen(trim($param['remark']));
		$param['remark']= htmlspecialchars($param['remark']);
		 if($returnValue['xxx']<=0){
			 $returnValue['isEmpty']='1';
		 }
		 $sql="UPDATE tbl_insurance_data SET renew_remark = '".$param['remark']."' WHERE id = '".$param['workID']."'  ";
		 if($this->db->query($sql)){
			 $returnValue['doDb']=1;
		 }
		return $returnValue; 
	 }
	//-------------------------------------------------------renew_remark duration   getType:getType,search_custname:search_custname,search_vRegis:search_vRegis,selectMonth:selectMonth,selectYear:selectYear,duration:duration  corp_id useForm
	 function getReportExpire($param){
		$returnValue=array();
		$param['duration'] = $param['duration']*30; 
		$returnValue['useForm']='2'; 
		$returnValue['insuranceType']=$param['getType']; 
		$returnValue['insuranceType']=$param['getType']; 
		$txtJoinCorp  = '';  $txtAgenName = " "; $txtJoinAgent = '';
		//print_r($param);
		if(($param['getType']=='11')||($param['getType']=='12')||($param['getType']=='13')){
			 $txtJoinCorp  = '';
			 $txtCorpName = "";			 
			 $txtWhereCorpIns = "";			 
			 $txtWhereCorpAct = "";			 
			 $returnValue['useForm']='1';
			 $txtOrderBy = '';
			 $txtAgenName = " , e.agent_name";
			 if($param['selectMonth']=='all'){
				 $txtIns = " ( YEAR(a.insurance_end) = '".$param['selectYear']."' ";
				  $txtAct = "  YEAR(a.act_date_end) = '".$param['selectYear']."'";
				 //$txtTax = " a.date_registration_end <= DATE_ADD(CURDATE(), INTERVAL 90 DAY)";
				 $txtTax = " a.date_registration_end <= DATE_ADD(CURDATE(), INTERVAL 90 DAY)";
				 $txtTax = "(  a.date_registration_end < DATE_ADD( STR_TO_DATE(CONCAT('".$param['selectYear']."-' , DATE_FORMAT(CURDATE(), '%m-%d')), '%Y-%m-%d'),  INTERVAL 90 DAY )) AND YEAR(a.date_registration_end) = '".$param['selectYear']."' ";

				 // STR_TO_DATE(CONCAT('2026-', DATE_FORMAT(CURDATE(), '%m-%d')), '%Y-%m-%d')
			 }else{
				 $txtIns = " ( MONTH(a.insurance_end) = '".$param['selectMonth']."' AND YEAR(a.insurance_end) = '".$param['selectYear']."' ";
				 $txtAct = " ( MONTH(a.act_date_end) = '".$param['selectMonth']."' AND YEAR(a.act_date_end) = '".$param['selectYear']."' )";
				 $txtTax = " ( MONTH(a.date_registration_end) = '".$param['selectMonth']."' AND YEAR(a.date_registration_end) = '".$param['selectYear']."' )";
				 //$txtTax = " DATE_SUB(a.act_date_end INTERVAL 90 DAY) <= 90 ";
			 }
			 if($param['getType']=='11'){
				  $txtOrderBy = "  a.insurance_end ASC ";
				  $txtWhere2 = " ( $txtIns ) AND a.close_alert_ins ='0' AND a.insurance_end <>'0000-00-00')  ";
				 if($param['corp_id']!='x'){
					$txtWhereCorpIns = " AND a.insurance_corp_id = '".$param['corp_id']."' ";
				 }
				 $txtJoinAgent = "LEFT JOIN tbl_agent_data AS e ON a.agent_id = e.id ";

			 }else if($param['getType']=='12'){
				  $txtOrderBy = "  a.act_date_end ASC ";
				  
				  $txtWhere2 = " ( $txtAct ) AND a.close_alert_ins ='0' AND a.act_date_end <>'0000-00-00'  ";
				  if($param['corp_id']!='x'){
					$txtWhereCorpAct = " AND a.corp_id = '".$param['corp_id']."' ";
				   }
				   $txtJoinAgent = "LEFT JOIN tbl_agent_data AS e ON a.act_agent_id = e.id ";

			 }else if($param['getType']=='13'){  //tax
			 	  $txtOrderBy = "  a.date_registration_end ASC ";
				 
				   $txtWhere2 = "  ($txtTax) AND a.close_alert_tax ='0' AND a.date_registration_end <>'0000-00-00'  ";

				   $txtAgenName = " , '' AS agent_name ";
			 }
			 $txtWhereName = '';
			 $txtWhereRegis = '';
			 if($param['search_custname']!=''){
				 $txtWhereName = " AND  a.cust_name LIKE '%".$param['search_custname']."%' ";
			 }
			 if($param['search_vRegis']!=''){
				 $txtWhereName = " AND a.vehicle_regis LIKE '%".$param['search_vRegis']."%' ";
			 }

			 

			 $sql="SELECT a.id AS WorkID , a.cust_name, a.insurance_start , a.insurance_end, a.act_date_end, a.date_registration_end , a.data_status , a.insurance_data_type , a.vehicle_regis , a.close_alert_ins , a.close_alert_act , a.close_alert_tax , a.cust_telephone_1, a.cust_telephone_2 , a.renew_remark , b.province_name , c.company_name  , d.company_name AS ActcorpName , a.insurance_remark $txtAgenName "
				 .", (SELECT COUNT(id) FROM tbl_follow_up_customer WHERE work_id = a.id) AS CheckFollow "
				 ." FROM tbl_insurance_data AS a   "
				 ." LEFT JOIN tbl_province  AS b ON  a.province_regis = b.id  "
				 ." LEFT JOIN tbl_insurance_company AS c ON a.insurance_corp_id = c.id "
				 ." LEFT JOIN tbl_insurance_company AS d ON a.corp_id = d.id "
				 ." $txtJoinAgent "
				 ." WHERE  $txtWhere2 $txtWhereName $txtWhereRegis $txtWhereCorpIns	$txtWhereCorpAct "
				 ." AND a.insurance_data_type='1' AND a.data_status='1' ORDER BY $txtOrderBy ";
			 $returnValue['Data']=$this->db->query($sql)->result();	 
			 $returnValue['sql']=$sql;
		}else if($param['getType']=='2'){ //ท่องเที่ยว  
			  $txtWhereCorpAct = '';
			  $txtAgenName = " , e.agent_name";
              $txtJoinAgent = "LEFT JOIN tbl_agent_data AS e ON a.agent_id = e.id ";
			  if($param['corp_id']!='x'){
					$txtWhereCorpAct = " AND b.corp_id = '".$param['corp_id']."' ";
			   }
			  if($param['selectMonth']=='all'){
				 $txtWhereDate = " AND YEAR(b.insurance_end) = '".$param['selectYear']."' ";
			  }else{
				 $txtWhereDate = " AND MONTH(b.insurance_end) = '".$param['selectMonth']."' AND YEAR(b.insurance_end) = '".$param['selectYear']."' ";
			  }
			  $sql="SELECT a.id AS WorkID , a.cust_name, a.insurance_start, a.act_date_end, a.date_registration_end , a.data_status , a.insurance_data_type  , a.close_alert_ins , a.close_alert_act , a.close_alert_tax , a.cust_telephone_1, a.cust_telephone_2 , a.renew_remark , b.insurance_end , 'ประกันท่องเที่ยว' AS insurance_type_name , d.company_name  , a.insurance_remark $txtAgenName "
				 .", (SELECT COUNT(id) FROM tbl_follow_up_customer WHERE work_id = a.id) AS CheckFollow "
				 ." FROM tbl_insurance_data AS a   "
				 ." LEFT JOIN tbl_insurance_travel_data  AS b ON  a.id = b.work_id  "
				 ." LEFT JOIN tbl_insurance_company AS d ON b.corp_id  = d.id "
				 ." $txtJoinAgent "
				 ." WHERE 1 $txtWhereDate $txtWhereCorpAct "
				 ." AND a.insurance_data_type='2' AND a.data_status='1' AND a.close_alert_ins ='0' ORDER BY b.insurance_end ASC ";
			 $returnValue['Data']=$this->db->query($sql)->result();	 
			 $returnValue['sql']=$sql;
		}else if($param['getType']=='3'){ //ขนส่ง 
			  $txtWhereCorpAct = '';
			  $txtAgenName = " , e.agent_name";
              $txtJoinAgent = "LEFT JOIN tbl_agent_data AS e ON a.agent_id = e.id ";
			  if($param['corp_id']!='x'){
					$txtWhereCorpAct = " AND b.corp_id = '".$param['corp_id']."' ";
			   }
			  if($param['selectMonth']=='all'){
				 $txtWhereDate = " AND YEAR(b.insurance_end) = '".$param['selectYear']."' ";
			  }else{
				 $txtWhereDate = " AND MONTH(b.insurance_end) = '".$param['selectMonth']."' AND YEAR(b.insurance_end) = '".$param['selectYear']."' ";
			  }
			 $sql="SELECT a.id AS WorkID , a.cust_name, a.insurance_start, a.act_date_end, a.date_registration_end , a.data_status , a.insurance_data_type  , a.close_alert_ins , a.close_alert_act , a.close_alert_tax , a.cust_telephone_1, a.cust_telephone_2 , a.renew_remark , b.insurance_end , 'ประกันขนส่ง' AS insurance_type_name  , d.company_name  , a.insurance_remark $txtAgenName "
				 .", (SELECT COUNT(id) FROM tbl_follow_up_customer WHERE work_id = a.id) AS CheckFollow "
				 ." FROM tbl_insurance_data AS a   "
				 ." LEFT JOIN tbl_insurance_shpping_data  AS b ON  a.id = b.work_id  "
				 ." LEFT JOIN tbl_insurance_company AS d ON b.corp_id  = d.id "
				 ." $txtJoinAgent "
				 ." WHERE 1  $txtWhereDate $txtWhereCorpAct "
				 ." AND a.insurance_data_type='3' AND a.data_status='1' AND a.close_alert_ins ='0' ORDER BY b.insurance_end ASC ";
			 $returnValue['Data']=$this->db->query($sql)->result();	 
			 $returnValue['sql']=$sql;
		}else if($param['getType']=='4'){ //PA
			  $txtWhereCorpAct = '';
			  $txtAgenName = " , e.agent_name";
              $txtJoinAgent = "LEFT JOIN tbl_agent_data AS e ON a.agent_id = e.id ";
			  if($param['corp_id']!='x'){
					$txtWhereCorpAct = " AND b.corp_id = '".$param['corp_id']."' ";
			   }
			  if($param['selectMonth']=='all'){
				 $txtWhereDate = " AND YEAR(b.insurance_end) = '".$param['selectYear']."' ";
			  }else{
				 $txtWhereDate = " AND MONTH(b.insurance_end) = '".$param['selectMonth']."' AND YEAR(b.insurance_end) = '".$param['selectYear']."' ";
			  }
			  $sql="SELECT a.id AS WorkID , a.cust_name, a.insurance_start, a.act_date_end, a.date_registration_end , a.data_status , a.insurance_data_type  , a.close_alert_ins , a.close_alert_act , a.close_alert_tax , a.cust_telephone_1, a.cust_telephone_2 , a.renew_remark , b.insurance_end , 'ประกันอุบัติเหตุ' AS insurance_type_name  , d.company_name  , a.insurance_remark $txtAgenName "
				  .", (SELECT COUNT(id) FROM tbl_follow_up_customer WHERE work_id = a.id) AS CheckFollow "
				 ." FROM tbl_insurance_data AS a   "
				 ." LEFT JOIN tbl_insurance_accident_data  AS b ON  a.id = b.work_id  "
				 ." LEFT JOIN tbl_insurance_company AS d ON b.corp_id  = d.id "
				 ." $txtJoinAgent "
				 ." WHERE 1  $txtWhereDate $txtWhereCorpAct "
				 ." AND a.insurance_data_type='4' AND a.data_status='1' AND a.close_alert_ins ='0' ORDER BY b.insurance_end ASC ";
			 $returnValue['Data']=$this->db->query($sql)->result();	 
			 $returnValue['sql']=$sql;
		}else if($param['getType']=='5'){ //บ้าน
			  $txtWhereCorpAct = '';
			   $txtAgenName = " , e.agent_name";
              $txtJoinAgent = "LEFT JOIN tbl_agent_data AS e ON a.agent_id = e.id ";
			  if($param['corp_id']!='x'){
					$txtWhereCorpAct = " AND b.corp_id = '".$param['corp_id']."' ";
			   }
			  if($param['selectMonth']=='all'){
				 $txtWhereDate = " AND YEAR(b.insurance_end) = '".$param['selectYear']."' ";
			  }else{
				 $txtWhereDate = " AND MONTH(b.insurance_end) = '".$param['selectMonth']."' AND YEAR(b.insurance_end) = '".$param['selectYear']."' ";
			  }
			  $sql="SELECT a.id AS WorkID , a.cust_name, a.insurance_start, a.act_date_end, a.date_registration_end , a.data_status , a.insurance_data_type  , a.close_alert_ins , a.close_alert_act , a.close_alert_tax , a.cust_telephone_1, a.cust_telephone_2 , a.renew_remark , b.insurance_end , 'ประกันบ้าน' AS insurance_type_name  , d.company_name  , a.insurance_remark  $txtAgenName "
				 .", (SELECT COUNT(id) FROM tbl_follow_up_customer WHERE work_id = a.id) AS CheckFollow "
				 ." FROM tbl_insurance_data AS a   "
				 ." LEFT JOIN tbl_insurance_home_data  AS b ON  a.id = b.work_id  "
				 ." LEFT JOIN tbl_insurance_company AS d ON b.corp_id  = d.id "
				 ." $txtJoinAgent "
				 ." WHERE 1 $txtWhereDate $txtWhereCorpAct "
				 ." AND a.insurance_data_type='5' AND a.data_status='1' AND a.close_alert_ins ='0' ORDER BY b.insurance_end ASC ";
			 $returnValue['Data']=$this->db->query($sql)->result();	 
			 $returnValue['sql']=$sql;
		}
		return $returnValue;
	 }
	//------------------------------------------------------- user_delete  
	  function get_overdue_conf(){
		 //$ouverDueConfig = 0;
		 $sql="SELECT * FROM tbl_report_overdue_conf  ";
		 $resultData = $this->db->query($sql)->result();
		 foreach($resultData AS $data){
			 $ouverDueConfig = $data->hidesuccess;
		 }
		 if(!isset($ouverDueConfig)){
			 $sql="INSERT INTO tbl_report_overdue_conf (hidesuccess) VALUES ('0') ";
			 $this->db->query($sql);
			 $ouverDueConfig = 0;
		 } 
		 return $ouverDueConfig;
	 }
	//------------------------------------------------------- 
	 function getIncomeCodeByID($CodeID,$dateStart,$dateEnd){
		   $sumTotal = array();  
		   $sumTotal['all'] = 0;
		   $sql="SELECT SUM( t1.act_price_net) AS total_price FROM tbl_insurance_data AS t1 JOIN tbl_code_data tc ON t1.act_code_id = tc.id WHERE t1.act_code_id='".$CodeID."' AND t1.insurance_start BETWEEN  '".$dateStart."' AND '".$dateEnd."' GROUP BY t1.act_code_id ";
		   $result=$this->db->query($sql)->result();
		   foreach($result AS $data){
			   $sumTotal['all'] =  $sumTotal['all']+$data->total_price;
			   $sumTotal['a0']=$data->total_price;
			   $sumTotal['sql_a0']=$sql;
		   }
		   $sql="SELECT SUM(t1.insurance_total_net) AS total_price FROM tbl_insurance_data AS t1  JOIN tbl_code_data tc ON t1.ins_code_id = tc.id  WHERE t1.ins_code_id='".$CodeID."' AND t1.insurance_start BETWEEN  '".$dateStart."' AND '".$dateEnd."' GROUP BY t1.ins_code_id ";
		   $result=$this->db->query($sql)->result();
		   foreach($result AS $data){
			   $sumTotal['all'] =  $sumTotal['all']+$data->total_price;
			   $sumTotal['a1']=$data->total_price;
			   $sumTotal['sql_a1']=$sql;
		   }
		   $sql="SELECT SUM(t1.Insurance_price ) AS total_price FROM tbl_insurance_travel_data  AS  t1   JOIN tbl_code_data tc ON t1.code_id = tc.id   WHERE t1.code_id='".$CodeID."' AND t1.insurance_start BETWEEN  '".$dateStart."' AND '".$dateEnd."' GROUP BY t1.code_id ";
		   $result=$this->db->query($sql)->result();
		   foreach($result AS $data){
			   $sumTotal['all'] =  $sumTotal['all']+$data->total_price;
			    $sumTotal['a2']=$data->total_price;
			     $sumTotal['sql_a2']=$sql;
		   }		   
		 	$sql="SELECT SUM(t1.premium ) AS total_price FROM tbl_insurance_shpping_data  AS  t1   JOIN tbl_code_data tc ON t1.code_id = tc.id  WHERE t1.code_id='".$CodeID."' AND t1.insurance_start BETWEEN  '".$dateStart."' AND '".$dateEnd."' GROUP BY t1.code_id ";
		   $result=$this->db->query($sql)->result();
		   foreach($result AS $data){
			   $sumTotal['all'] =  $sumTotal['all']+$data->total_price;
			   $sumTotal['a3']=$data->total_price;
			     $sumTotal['sql_a3']=$sql;
		   }	
		   $sql="SELECT SUM(t1.totalprice_installment ) AS total_price FROM tbl_insurance_accident_data  AS  t1  JOIN tbl_code_data tc ON t1.code_id = tc.id  WHERE t1.code_id='".$CodeID."' AND t1.insurance_start BETWEEN  '".$dateStart."' AND '".$dateEnd."' GROUP BY t1.code_id ";
		   $result=$this->db->query($sql)->result();
		   foreach($result AS $data){
			   $sumTotal['all'] =  $sumTotal['all']+$data->total_price;
			   $sumTotal['a4']=$data->total_price;
			     $sumTotal['sql_a4']=$sql;
		   }
		    $sql="SELECT SUM(t1.totalprice_installment ) AS total_price FROM tbl_insurance_home_data  AS  t1  JOIN tbl_code_data tc ON t1.code_id = tc.id  WHERE t1.code_id='".$CodeID."' AND t1.insurance_start BETWEEN  '".$dateStart."' AND '".$dateEnd."' GROUP BY t1.code_id ";
		   $result=$this->db->query($sql)->result();
		   foreach($result AS $data){
			   $sumTotal['all'] =  $sumTotal['all']+$data->total_price;
			   $sumTotal['a5']=$data->total_price;
			     $sumTotal['sql_a5']=$sql;
		   }
		 return $sumTotal;
	 }
	 //------------------------------------------------------
	 function removeOtherIncome($param){
		 $returnValue = array();
		 $returnValue['DoDb'] = 0;
		 $sql="DELETE FROM tbl_code_income_other WHERE id = '".$param['dataID']."' ";
		 $returnValue['sql'] = $sql;
		 if($this->db->query($sql)){
			 $returnValue['DoDb'] = 1;
		 	}
		 return $returnValue; 
	 }
	//------------------------------------------------------- (t1.insurance_total_net + t1.act_price_net) 
	 function GetCodeIncomeDetail($param){
		 $txtCode1 = "";
		 $txtCode2 = "";
	     if($param['ins_code_id']!='x'){
			 $txtCode1="   AND CASE 
            WHEN t1.insurance_data_type = 1 THEN t1.ins_code_id = '".$param['ins_code_id']."' 
            WHEN t1.insurance_data_type = 2 THEN t2.code_id = '".$param['ins_code_id']."' 
            WHEN t1.insurance_data_type = 3 THEN t3.code_id = '".$param['ins_code_id']."' 
            WHEN t1.insurance_data_type = 4 THEN t4.code_id = '".$param['ins_code_id']."' 
            WHEN t1.insurance_data_type = 5 THEN t5.code_id = '".$param['ins_code_id']."'  
        END  ";
			 $txtCode2="  AND oi.code_id = '".$param['ins_code_id']."'   ";
		 }
		  $sql="SELECT * FROM (
    SELECT 1 AS Seq , 
        t1.id AS workID, 
        tc.conde_name, 
        tc.id AS code_id, 
        t1.ins_code_id, 
        t1.cust_name, 
        t1.insurance_data_type AS insurance_type,   
        t6.company_name, 
        t6.id AS company_id,  
        CASE 
            WHEN t1.insurance_data_type = 1 THEN t1.insurance_total_net 
            WHEN t1.insurance_data_type = 2 THEN t2.Insurance_price 
            WHEN t1.insurance_data_type = 3 THEN t3.premium 
            WHEN t1.insurance_data_type = 4 THEN t4.totalprice_installment 
            WHEN t1.insurance_data_type = 5 THEN t5.totalprice_installment 
            ELSE 0 
        END AS total_price  
    FROM tbl_insurance_data t1
    LEFT JOIN tbl_insurance_travel_data t2 ON t1.id = t2.work_id AND t1.insurance_data_type = 2
    LEFT JOIN tbl_insurance_shpping_data t3 ON t1.id = t3.work_id AND t1.insurance_data_type = 3
    LEFT JOIN tbl_insurance_accident_data t4 ON t1.id = t4.work_id AND t1.insurance_data_type = 4
    LEFT JOIN tbl_insurance_home_data t5 ON t1.id = t5.work_id AND t1.insurance_data_type = 5
    LEFT JOIN tbl_insurance_company t6 
        ON CASE 
            WHEN t1.insurance_data_type = 1 THEN t1.insurance_corp_id 
            WHEN t1.insurance_data_type = 2 THEN t2.corp_id 
            WHEN t1.insurance_data_type = 3 THEN t3.corp_id 
            WHEN t1.insurance_data_type = 4 THEN t4.corp_id 
            WHEN t1.insurance_data_type = 5 THEN t5.corp_id 
        END = t6.id
    JOIN tbl_code_data tc ON t1.ins_code_id = tc.id 
    WHERE 
        CASE 
            WHEN t1.insurance_data_type = 1 THEN t1.insurance_start BETWEEN '".$param['dateStart']."' AND '".$param['dateEnd']."'  
            WHEN t1.insurance_data_type = 2 THEN t2.insurance_start BETWEEN '".$param['dateStart']."' AND '".$param['dateEnd']."'  
            WHEN t1.insurance_data_type = 3 THEN t3.insurance_start BETWEEN '".$param['dateStart']."' AND '".$param['dateEnd']."'  
            WHEN t1.insurance_data_type = 4 THEN t4.insurance_start BETWEEN '".$param['dateStart']."' AND '".$param['dateEnd']."'  
            WHEN t1.insurance_data_type = 5 THEN t5.insurance_start BETWEEN '".$param['dateStart']."' AND '".$param['dateEnd']."'  
        END 
        $txtCode1
        AND t6.id =  '".$param['company_id']."'  AND tc.id = '".$param['code_id']."'
    UNION ALL
    SELECT 2 AS Seq , 
        oi.id AS workID, 
        tc.conde_name, 
        tc.id AS code_id, 
        oi.code_id AS ins_code_id, 
        '' AS cust_name, 
        '6' AS insurance_type,   
        t6.company_name, 
        t6.id AS company_id,  
        oi.income_total_net AS total_price  
    FROM tbl_code_income_other oi
    JOIN tbl_insurance_company t6 ON oi.insurance_corp_id = t6.id
    JOIN tbl_code_data tc ON oi.code_id = tc.id
    WHERE 
        oi.start_protection_date BETWEEN  '".$param['dateStart']."' AND '".$param['dateEnd']."'  
        $txtCode2
        AND t6.id =  '".$param['company_id']."' AND tc.id = '".$param['code_id']."'
) AS combined_result
ORDER BY code_id ASC , CASE WHEN Seq = 2 THEN workID END ASC ";
//ORDER BY Seq ASC , CASE WHEN Seq = 2 THEN workID END ASC ";
		  $returnValue['Data']=$this->db->query($sql)->result();
		  $returnValue['sql']=$sql;
		 return $returnValue;
	 }
	//------------------------------------------------------- ins_code_id income_total_net total_price
	 function GetCodeIncome($param){
		 $returnValue = array();
		$txtCode1="";
		$txtCode2="";
		if($param['ins_code_id']!='x'){
			$txtCode1="   AND 
        CASE 
            WHEN t1.insurance_data_type = 1 THEN t1.ins_code_id  
            WHEN t1.insurance_data_type = 2 THEN t2.code_id  
            WHEN t1.insurance_data_type = 3 THEN t3.code_id  
            WHEN t1.insurance_data_type = 4 THEN t4.code_id  
            WHEN t1.insurance_data_type = 5 THEN t5.code_id  
        END = '".$param['ins_code_id']."' ";
			$txtCode2="  AND ci.code_id = '".$param['ins_code_id']."'   ";
		}
		 if($param['currentPage']=='Mainpage'){
			 $txtGroupBy1 = "  GROUP BY  tc.id  ";
			 $txtGroupBy2 = "  GROUP BY tc.id";
			 $txtGroupBy3 = "  GROUP BY  code_id ";
		 }else{
			 $txtGroupBy1 = " GROUP BY tc.conde_name, tc.id,  t6.id  ";
			 $txtGroupBy2 = " GROUP BY tc.conde_name, tc.id, t6.id, ci.insurance_corp_id  ";
			 $txtGroupBy3 = " GROUP BY  code_id,  company_id  ";			 
		 }
		$sql = "
				WITH combined_data AS (
       SELECT 
        tc.conde_name, 
        tc.id AS code_id, 
        t6.company_name, 
        t6.id AS company_id, 
        SUM(
            CASE 
                WHEN t1.insurance_data_type = 1 THEN t1.insurance_total_net 
                WHEN t1.insurance_data_type = 2 THEN t2.Insurance_price 
                WHEN t1.insurance_data_type = 3 THEN t3.premium 
                WHEN t1.insurance_data_type = 4 THEN t4.totalprice_installment 
                WHEN t1.insurance_data_type = 5 THEN t5.totalprice_installment 
                ELSE 0 
            END
        ) + COALESCE(
            (SELECT SUM(ci.income_total_net) 
             FROM tbl_code_income_other ci 
             WHERE ci.insurance_corp_id = t6.id 
               AND ci.code_id = tc.id 
               AND ci.start_protection_date >= '2025-01-01' 
               AND ci.end_protection_date <= '2025-02-13'), 0
        ) AS total_price 
    FROM tbl_insurance_data t1  
    LEFT JOIN tbl_insurance_travel_data t2 ON t1.id = t2.work_id AND t1.insurance_data_type = 2  
    LEFT JOIN tbl_insurance_shpping_data t3 ON t1.id = t3.work_id AND t1.insurance_data_type = 3  
    LEFT JOIN tbl_insurance_accident_data t4 ON t1.id = t4.work_id AND t1.insurance_data_type = 4  
    LEFT JOIN tbl_insurance_home_data t5 ON t1.id = t5.work_id AND t1.insurance_data_type = 5  
    LEFT JOIN tbl_insurance_company t6 ON 
        CASE 
            WHEN t1.insurance_data_type = 1 THEN t1.insurance_corp_id  
            WHEN t1.insurance_data_type = 2 THEN t2.corp_id  
            WHEN t1.insurance_data_type = 3 THEN t3.corp_id  
            WHEN t1.insurance_data_type = 4 THEN t4.corp_id  
            WHEN t1.insurance_data_type = 5 THEN t5.corp_id  
        END = t6.id  
    JOIN tbl_code_data tc ON t1.ins_code_id = tc.id  
    WHERE 
        CASE 
            WHEN t1.insurance_data_type = 1 THEN t1.insurance_start  
            WHEN t1.insurance_data_type = 2 THEN t2.insurance_start  
            WHEN t1.insurance_data_type = 3 THEN t3.insurance_start  
            WHEN t1.insurance_data_type = 4 THEN t4.insurance_start  
            WHEN t1.insurance_data_type = 5 THEN t5.insurance_start  
        END BETWEEN '".$param['dateStart']."' AND '".$param['dateEnd']."'
    $txtCode1
    $txtGroupBy1
    UNION  
    SELECT 
        tc.conde_name, 
        tc.id AS code_id, 
        t6.company_name, 
        t6.id AS company_id, 
        SUM(ci.income_total_net) AS total_price 
    FROM tbl_code_income_other ci  
    JOIN tbl_code_data tc ON ci.code_id = tc.id  
    JOIN tbl_insurance_company t6 ON ci.insurance_corp_id = t6.id  
    WHERE ci.start_protection_date >= '".$param['dateStart']."' 
      AND ci.end_protection_date <= '".$param['dateEnd']."'
      $txtCode2
	  $txtGroupBy2
)  
	SELECT 
		conde_name, 
		code_id, 
		company_name, 
		company_id, 
		SUM(total_price) AS total_price  
	FROM combined_data  
	$txtGroupBy3
	ORDER BY code_id ,company_id; 
	";
		  $returnValue['Data']=$this->db->query($sql)->result();
		  $returnValue['sql']=$sql;
		  //----select data other code income
		  /*$sql="SELECT * FROM tbl_code_income_other WHERE code_id= '".$param['ins_code_id']."'  AND start_protection_date BETWEEN '".$param['dateStart']."' AND '".$param['dateEnd']."' ";
		  $returnValue['ResultOther'] = $this->db->query($sql)->result();
		  $returnValue['sqlOther']=$sql;
		  foreach( $returnValue['ResultOther'] AS $data){
			   $returnValue['DataOther'][$data->insurance_corp_id] = $data->income_total_net;
		  }*/
		 return $returnValue;
		 /* type=corp	$sql = "
				WITH combined_data AS (
    SELECT 
        tc.conde_name, 
        tc.id AS code_id, 
        t6.company_name, 
        t6.id AS company_id, 
        SUM(
            CASE 
                WHEN t1.insurance_data_type = 1 THEN t1.insurance_total_net 
                WHEN t1.insurance_data_type = 2 THEN t2.Insurance_price 
                WHEN t1.insurance_data_type = 3 THEN t3.premium 
                WHEN t1.insurance_data_type = 4 THEN t4.totalprice_installment 
                WHEN t1.insurance_data_type = 5 THEN t5.totalprice_installment 
                ELSE 0 
            END
        ) + COALESCE(
            (SELECT SUM(ci.income_total_net) 
             FROM tbl_code_income_other ci 
             WHERE ci.insurance_corp_id = t6.id 
               AND ci.code_id = tc.id 
               AND ci.start_protection_date >= '2025-01-01' 
               AND ci.end_protection_date <= '2025-02-13'), 0
        ) AS total_price 
    FROM tbl_insurance_data t1  
    LEFT JOIN tbl_insurance_travel_data t2 ON t1.id = t2.work_id AND t1.insurance_data_type = 2  
    LEFT JOIN tbl_insurance_shpping_data t3 ON t1.id = t3.work_id AND t1.insurance_data_type = 3  
    LEFT JOIN tbl_insurance_accident_data t4 ON t1.id = t4.work_id AND t1.insurance_data_type = 4  
    LEFT JOIN tbl_insurance_home_data t5 ON t1.id = t5.work_id AND t1.insurance_data_type = 5  
    LEFT JOIN tbl_insurance_company t6 ON 
        CASE 
            WHEN t1.insurance_data_type = 1 THEN t1.insurance_corp_id  
            WHEN t1.insurance_data_type = 2 THEN t2.corp_id  
            WHEN t1.insurance_data_type = 3 THEN t3.corp_id  
            WHEN t1.insurance_data_type = 4 THEN t4.corp_id  
            WHEN t1.insurance_data_type = 5 THEN t5.corp_id  
        END = t6.id  
    JOIN tbl_code_data tc ON t1.ins_code_id = tc.id  
    WHERE 
        CASE 
            WHEN t1.insurance_data_type = 1 THEN t1.insurance_start  
            WHEN t1.insurance_data_type = 2 THEN t2.insurance_start  
            WHEN t1.insurance_data_type = 3 THEN t3.insurance_start  
            WHEN t1.insurance_data_type = 4 THEN t4.insurance_start  
            WHEN t1.insurance_data_type = 5 THEN t5.insurance_start  
        END BETWEEN '".$param['dateStart']."' AND '".$param['dateEnd']."'
    $txtCode1
    GROUP BY tc.conde_name, tc.id, t6.company_name, t6.id  
    UNION  
    SELECT 
        tc.conde_name, 
        tc.id AS code_id, 
        t6.company_name, 
        t6.id AS company_id, 
        SUM(ci.income_total_net) AS total_price 
    FROM tbl_code_income_other ci  
    JOIN tbl_code_data tc ON ci.code_id = tc.id  
    JOIN tbl_insurance_company t6 ON ci.insurance_corp_id = t6.id  
    WHERE ci.start_protection_date >= '".$param['dateStart']."' 
      AND ci.end_protection_date <= '".$param['dateEnd']."'
      $txtCode2
    GROUP BY tc.conde_name, tc.id, t6.company_name, t6.id, ci.insurance_corp_id  
)  
SELECT 
    conde_name, 
    code_id, 
    company_name, 
    company_id, 
    SUM(total_price) AS total_price  
FROM combined_data  
GROUP BY conde_name, code_id, company_name, company_id  
ORDER BY company_id;
		";  */
	 }
	//------------------------------------------------------- user_delete 
	 function report_code_income_detail($param){
		  $sql = "  SELECT t0.id, t0.act_code_id, t0.cust_name, t0.insurance_data_type, tc0.conde_name,
						 t0.act_price_net AS total_price
				  FROM tbl_insurance_data t0
				  JOIN tbl_code_data tc0 ON t0.act_code_id = tc0.id
				  WHERE t0.insurance_data_type = 1
					AND t0.insurance_start BETWEEN '".$param['dateStart']."' AND '".$param['dateEnd']."'
					AND t0.act_code_id = '".$param['codeID']."' 
				  GROUP BY t0.id ";
		   $returnValue['Data0']=$this->db->query($sql)->result();
		   $sql = " SELECT t1.id, t1.ins_code_id, t1.cust_name, t1.insurance_data_type, tc.conde_name,
						 t1.insurance_total_net AS total_price
				  FROM tbl_insurance_data t1
				  JOIN tbl_code_data tc ON t1.ins_code_id = tc.id
				  WHERE t1.insurance_data_type = 1
					AND t1.insurance_start BETWEEN '".$param['dateStart']."' AND '".$param['dateEnd']."'
					AND t1.ins_code_id = '".$param['codeID']."' 
				  GROUP BY t1.id   ";
		   $returnValue['Data1']=$this->db->query($sql)->result();
		  $sql = " SELECT t2.work_id AS id , t2.code_id, t2.cust_name,  '2' AS  insurance_data_type , tc2.conde_name,
						 t2.Insurance_price AS total_price
				  FROM tbl_insurance_travel_data t2
				  JOIN tbl_code_data tc2 ON t2.code_id = tc2.id
				  WHERE t2.insurance_start BETWEEN '".$param['dateStart']."' AND '".$param['dateEnd']."'
					AND t2.code_id = '".$param['codeID']."' 
				   GROUP BY t2.id  ";
		   $returnValue['Data2']=$this->db->query($sql)->result();
			$sql = "   SELECT t3.work_id  AS id , t3.code_id, t3.cust_name, '3' AS  insurance_data_type, tc3.conde_name,
						 t3.premium AS total_price
				  FROM tbl_insurance_shpping_data t3
				  JOIN tbl_code_data tc3 ON t3.code_id = tc3.id
				  WHERE t3.insurance_start BETWEEN '".$param['dateStart']."' AND '".$param['dateEnd']."'
					AND t3.code_id = '".$param['codeID']."' 
				   GROUP BY t3.id  ";
		   $returnValue['Data3']=$this->db->query($sql)->result();
		   $sql = "  SELECT t4.work_id  AS id , t4.code_id, t4.cust_name, '4' AS  insurance_data_type, tc4.conde_name,
						 t4.totalprice_installment AS total_price
				  FROM tbl_insurance_accident_data t4 
				  JOIN tbl_code_data tc4 ON t4.code_id = tc4.id
				  WHERE t4.insurance_start BETWEEN '".$param['dateStart']."' AND '".$param['dateEnd']."'
					AND t4.code_id = '".$param['codeID']."'  ";
		   $returnValue['Data4']=$this->db->query($sql)->result();
		  $sql = "   SELECT t5.work_id  AS id , t5.code_id, t5.cust_name, '5' AS  insurance_data_type, tc5.conde_name,
						 t5.totalprice_installment AS total_price
				  FROM tbl_insurance_home_data t5
				  JOIN tbl_code_data tc5 ON t5.code_id = tc5.id
				  WHERE  t5.insurance_start BETWEEN '".$param['dateStart']."' AND '".$param['dateEnd']."'
					AND t5.code_id = '".$param['codeID']."'   ";
		   $returnValue['Data5']=$this->db->query($sql)->result();
		 return $returnValue;
	 }
	//------------------------------------------------------- user_delete  
	 function ListInsuranceDelete($data){
		 $sql="SELECT  id,insurance_no, cust_name , vehicle_regis , province_name , remark_delete , date_delete , name_sname , insurance_start , work_id  "
			  ." FROM ( 
			 	 SELECT  a.id, a.insurance_no , a.cust_name ,a.vehicle_regis ,b.province_name ,a.remark_delete ,a.date_delete  ,g.name_sname	,a.insurance_start , a.work_id
				 FROM tbl_insurance_data AS a 
				 LEFT JOIN  tbl_province AS b ON a.province_regis=b.id
				 LEFT JOIN  tbl_user_data AS g ON a.user_delete = g.id 
				 WHERE a.data_status = '0' 
			 	 UNION
				 SELECT  x.id, x.policy_number , x.cust_name , 'PA' , '4', x.remark_delete , x.date_delete , y.name_sname , x.insurance_start , x.work_id
				 FROM tbl_insurance_accident_data AS x
				 LEFT JOIN   tbl_user_data AS y ON x.user_delete = y.id 
				 LEFT JOIN   tbl_insurance_data AS z ON x.work_id  = z.id 
				 WHERE x.data_status = '0' 
			 	) AS combined_tables ORDER BY date_delete DESC ";
		 $resultData = $this->db->query($sql)->result();
		 return $resultData;
	 }
	//------------------------------------------------------- insurance_no   hideSuccess is_payment
	function list_overdue($data){
		$returnValue = array();
		$txtWhereMonth = "";
		$txtWhereMonthCash = "";
        $select_day_end = $data['select_day_end'];
		/*if(isset($_POST['data'])){
			$data = json_decode($_POST['data'], true);
			$selectMonth = $data['selectMonth'];
			$selectYear = $data['selectYear'];
			$payType = $data['payType'];
			$hideSuccess = $data['hideSuccess'];
			$readConfig = $data['readConfig'];
			// ... ดึงค่าที่เหลือตามต้องการ selectYear  a.is_payment = '0' 
		} */
		$data = $this->input->post();
		//--------config------
			$data['selectYear'] = '2025';

		$txtWerePayStaus ='';  
		//$txtPayCashStatus = " AND b.pay_cash_status IN ('0','1','2') "; 
		$txtPayCashStatus = "  ";
		//$data['hideSuccess'] = 1; //****************** */
		if($data['hideSuccess']=='1'){
			//$txtPaySuccess =' HAVING sumToTal - sumPay > 0  ';
			 $txtWerePayStaus = " AND a.is_payment = '0' ";
			 $txtPayCashStatus = " AND b.pay_cash_status IN ('0','2') ";
		}

		$data['selectMonth'] = 'all';
		if($data['selectMonth']!='all'){
			$txtWhereMonth = " AND if(b.insurance_start!='0000-00-00', MONTH(b.insurance_start),MONTH(b.act_date_start)) = '".$data['selectMonth']."'    ";
			$txtWhereMonthCash = " AND if(insurance_start!='0000-00-00', MONTH(insurance_start),MONTH(b.act_date_start)) = '".$data['selectMonth']."'    ";
		}
		$txtWhereYear = " AND if(b.insurance_start!='0000-00-00', YEAR(b.insurance_start),YEAR(b.act_date_start)) = '".$data['selectYear']."' ";
		$txtWhereYearCash = " AND if(insurance_start!='0000-00-00', YEAR(insurance_start),YEAR(act_date_start)) = '".$data['selectYear']."' ";
		$txtWhereYear = "  ";
		$txtWhereYearCash = "  ";
		
		$wherePaytype = '';
		if($data['payType']=='1'){
		}else if($data['payType']=='2'){
		}

		// select_day_start select_month_start select_year_start select_day_end select_month_end select_year_end
        $txtWhereDueDateCash = '';
		$txtWhereDueDateInstallment = '';
		if($data['select_day_start'] < 10){ $data['select_day_start'] = '0'.$data['select_day_start'];}
		if($data['select_day_end'] < 10){ $data['select_day_end'] = '0'.$data['select_day_end'];}
		if($data['useDuedate']=='1'){
			$startDate = $data['select_year_start']."-".$data['select_month_start']."-".$data['select_day_start'];
			$endDate = $data['select_year_end']."-".$data['select_month_end']."-".$data['select_day_end'];
			
			$txtWhereDueDateInstallment = " AND (a.due_date BETWEEN '".$startDate."' AND '".$endDate."' )";
			$txtWhereDueDateCash = "AND (b.cash_duedate BETWEEN '".$startDate."' AND '".$endDate."')";
		}
		$sql="SELECT
				a.work_id , b.cust_name , b.cust_nickname , CONCAT(b.cust_telephone_1 , ' ' , b.cust_telephone_2) AS cust_telephone
				, b.vehicle_regis, b.insurance_data_type , b.amount_installment , c.province_name , b.data_status , d.agent_name ,
				COALESCE((SELECT SUM(amount) FROM tbl_insurance_payment AS e WHERE e.work_id=a.work_id),0) AS sumToTal , 
				COALESCE((SELECT SUM(amount) FROM tbl_insurance_payment AS f WHERE f.is_payment='1' AND f.work_id=a.work_id  ),0) AS sumPay  
			FROM
				tbl_insurance_payment AS a
			LEFT JOIN tbl_insurance_data AS b ON a.work_id = b.id
			LEFT JOIN tbl_province AS c ON b.province_regis = c.id 
			LEFT JOIN tbl_agent_data AS d ON b.agent_id = d.id
			WHERE 1 $txtWerePayStaus AND b.data_status='1' $txtWhereMonth $txtWhereYear $txtWhereDueDateInstallment 
			GROUP BY
			a.work_id  ";
		$returnValue['sql']=$sql." <Br>".$txtWhereDueDateCash."<br>--".$endDate." ".$data['select_day_end']." select_day_end>".$select_day_end." hideSuccess>".$data['hideSuccess'];
		$returnValue['resultData'] = $this->db->query($sql)->result();
		$getId = array();
		foreach($returnValue['resultData'] AS $data_id){
			$getId[] = $data_id->work_id;
		}
		$AllworkID = implode(",",$getId);
		$returnValue['AllworkID']=$AllworkID;
		$returnValue['getId']=$getId;
		//------select max installment-------//
		$returnValue['maxPeriod']=0;
		//$sql="SELECT MAX(period) AS countPeriod FROM `tbl_insurance_payment` WHERE work_id IN (SELECT a.work_id FROM tbl_insurance_payment AS a WHERE 1 $txtWhereMonth $txtWhereYear ) ";
		if (!empty($AllworkID)) {
		$sql="SELECT MAX(period) AS countPeriod FROM `tbl_insurance_payment` WHERE work_id IN ($AllworkID ) ";
		$dataCount = $this->db->query($sql)->result();
		foreach($dataCount AS $period){
			$returnValue['maxPeriod'] = $period->countPeriod;
		}
		$returnValue['sql_max_period']=$sql;
		//--select data-------//
		
		$sqlSelectData = "SELECT work_id , period ,
		        (SELECT SUM(amount) FROM tbl_insurance_payment AS a WHERE a.work_id=tbl_insurance_payment.work_id  ) AS sumToTal , 
				(SELECT SUM(amount) FROM tbl_insurance_payment AS b WHERE is_payment='1' AND b.work_id=tbl_insurance_payment.work_id  ) AS sumPay , 
				MAX(CASE WHEN period = 1 THEN amount END) AS payment1,
				MAX(CASE WHEN period = 1 THEN transaction_date END) AS transaction_date1,
				MAX(CASE WHEN period = 1 THEN receipt_date END) AS receipt_date1,
				MAX(CASE WHEN period = 1 THEN is_payment END) AS is_payment1,
				MAX(CASE WHEN period = 1 THEN due_date END) AS due_date1,
				MAX(CASE WHEN period = 2 THEN amount END) AS payment2,
				MAX(CASE WHEN period = 2 THEN transaction_date END) AS transaction_date2,
				MAX(CASE WHEN period = 2 THEN receipt_date END) AS receipt_date2,
				MAX(CASE WHEN period = 2 THEN is_payment END) AS is_payment2,
				MAX(CASE WHEN period = 2 THEN due_date END) AS due_date2,
				MAX(CASE WHEN period = 3 THEN amount END) AS payment3,
				MAX(CASE WHEN period = 3 THEN transaction_date END) AS transaction_date3,
				MAX(CASE WHEN period = 3 THEN receipt_date END) AS receipt_date3,
				MAX(CASE WHEN period = 3 THEN is_payment END) AS is_payment3,
				MAX(CASE WHEN period = 3 THEN due_date END) AS due_date3,
				MAX(CASE WHEN period = 4 THEN amount END) AS payment4,
				MAX(CASE WHEN period = 4 THEN receipt_date END) AS receipt_date4,
				MAX(CASE WHEN period = 4 THEN transaction_date END) AS transaction_date4,
				MAX(CASE WHEN period = 4 THEN receipt_date END) AS receipt_date4,
				MAX(CASE WHEN period = 4 THEN is_payment END) AS is_payment4,
				MAX(CASE WHEN period = 4 THEN due_date END) AS due_date4,
				MAX(CASE WHEN period = 5 THEN amount END) AS payment5,
				MAX(CASE WHEN period = 5 THEN transaction_date END) AS transaction_date5,
				MAX(CASE WHEN period = 5 THEN receipt_date END) AS receipt_date5,
				MAX(CASE WHEN period = 5 THEN is_payment END) AS is_payment5,
				MAX(CASE WHEN period = 5 THEN due_date END) AS due_date5,
				MAX(CASE WHEN period = 6 THEN amount END) AS payment6,
				MAX(CASE WHEN period = 6 THEN transaction_date END) AS transaction_date6,
				MAX(CASE WHEN period = 6 THEN receipt_date END) AS receipt_date6,
				MAX(CASE WHEN period = 6 THEN is_payment END) AS is_payment6,
				MAX(CASE WHEN period = 6 THEN due_date END) AS due_date6,
				MAX(CASE WHEN period = 7 THEN amount END) AS payment7,
				MAX(CASE WHEN period = 7 THEN transaction_date END) AS transaction_date7,
				MAX(CASE WHEN period = 7 THEN receipt_date END) AS receipt_date7,
				MAX(CASE WHEN period = 7 THEN is_payment END) AS is_payment7,
				MAX(CASE WHEN period = 7 THEN due_date END) AS due_date7,
				MAX(CASE WHEN period = 8 THEN amount END) AS payment8,
				MAX(CASE WHEN period = 8 THEN transaction_date END) AS transaction_date8,
				MAX(CASE WHEN period = 8 THEN receipt_date END) AS receipt_date8,
				MAX(CASE WHEN period = 8 THEN is_payment END) AS is_payment8,
				MAX(CASE WHEN period = 8 THEN due_date END) AS due_date8,
				MAX(CASE WHEN period = 9 THEN amount END) AS payment9,
				MAX(CASE WHEN period = 9 THEN transaction_date END) AS transaction_date9,
				MAX(CASE WHEN period = 9 THEN receipt_date END) AS receipt_date9,
				MAX(CASE WHEN period = 9 THEN is_payment END) AS is_payment9,
				MAX(CASE WHEN period = 9 THEN due_date END) AS due_date9,
				MAX(CASE WHEN period = 10 THEN amount END) AS payment10,
				MAX(CASE WHEN period = 10 THEN transaction_date END) AS transaction_date10,
				MAX(CASE WHEN period = 10 THEN receipt_date END) AS receipt_date10,
				MAX(CASE WHEN period = 10 THEN is_payment END) AS is_payment10,
				MAX(CASE WHEN period = 10 THEN due_date END) AS due_date10 "
			." FROM tbl_insurance_payment WHERE work_id IN ($AllworkID ) AND amount > 0   GROUP BY work_id ";
			$returnValue['dataPayment'] = $this->db->query($sqlSelectData)->result();
			$returnValue['sqlSelectData']=$sqlSelectData." <br> useDuedate".$data['useDuedate']." hideSuccess>>".$data['hideSuccess'];
	}else{
		$returnValue['dataPayment'] = [];
		$returnValue['maxPeriod'] = 1;
		$returnValue['sqlSelectData']=" <br> useDuedate".$data['useDuedate'];
	}
		//-------ค้างชำระเงินสด-------// a.work_id
		$sql="SELECT * FROM tbl_insurance_data WHERE pay_cash_status='2' $txtWhereMonthCash $txtWhereYearCash ";
		$sql="SELECT
				b.id , b.cust_name , b.cust_nickname , CONCAT(b.cust_telephone_1 , ' ' , b.cust_telephone_2) AS cust_telephone
				, b.vehicle_regis, b.insurance_data_type , b.amount_installment ,b.payment_amount ,b.cash_duedate , c.province_name , b.data_status , d.agent_name , b.pay_cash_status
			FROM
				tbl_insurance_data AS b
			LEFT JOIN tbl_province AS c ON b.province_regis = c.id 
			LEFT JOIN tbl_agent_data AS d ON b.agent_id = d.id  "
			." WHERE 1 $txtPayCashStatus   $txtWhereMonthCash $txtWhereYearCash $txtWhereDueDateCash  ";
		$returnValue['dataPaymentCash'] = $this->db->query($sql)->result();
		$returnValue['sqlPaymentCash'] = $sql;
		//---------update overdue config---------
		$returnValue['config'] ='';
		$sql= "UPDATE tbl_report_overdue_conf SET hidesuccess = '".$data['hideSuccess']."' ";
		if($this->db->query($sql)){
				$returnValue['config'] = "success Update Conf";
		}
		return $returnValue;
	}
	 //-----------------------------------------
	  function getInsOtherID($dataType,$workID){
	 }
	 #######################################################
 }
