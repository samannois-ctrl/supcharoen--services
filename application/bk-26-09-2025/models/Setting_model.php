<?php
 class Setting_model extends CI_Model
 {
    function __construct()
    {
        parent::__construct();
    }

    //----------------------------------  //car_brand_name:car_brand_name, dataID:dataID , car_brand_status:car_brand_status 
	 function AddCarBrandInsurance($data){
		 $returnValue = array();
		 $returnValue['DoUpdate']=0;
		 $returnValue['dataID']=$data['dataID'];
		 if($data['dataID']=='x'){
			 $sql="INSERT INTO `tbl_insurance_car_brand` (`id`, `car_brand_name`, `car_brand_status`, `user_update`) VALUES ('', '".$data['car_brand_name']."', '".$data['car_brand_status']."', '".$this->session->userdata('user_id')."');";
		 
			  if($this->db->query($sql)){
				 $returnValue['DoUpdate'] = '1';
				 $returnValue['action']  ='insert';
				 $returnValue['dataID'] = $this->db->insert_id();
			 }
		 }else{
			 $sql="UPDATE tbl_insurance_car_brand SET car_brand_name ='".$data['car_brand_name']."', car_brand_status='".$data['car_brand_status']."' , user_update = '".$this->session->userdata('user_id')."' WHERE id = '".$data['dataID']."' ";
			 if($this->db->query($sql)){
				 $returnValue['DoUpdate'] = '1';
				 $returnValue['action']  ='update';
			 }
		 }
		 
		 return $returnValue;
	 }
    //----------------------------------  
	 function listCarBrandInsurance($brand_status){
		 $returnValue = array();
		 if($brand_status=='all'){
			 $txtWere = "";
		 }else{
			 $txtWere = " WHERE car_brand_status='".$brand_status."'"; 
		 }
		 $sql="SELECT * FROM tbl_insurance_car_brand  $txtWere ORDER BY car_brand_status DESC , car_brand_name ASC ";
		 $resultData = $this->db->query($sql)->result();
		 return $resultData;
		 
		 
	 }
    //----------------------------------  
	 function updateCorpBranch($data){
		 $returnValue = array();
		 $returnValue['DoUpdate']=0;
		 $sql="UPDATE tbl_insurance_company SET use_branch = '".$data['changeValue']."' WHERE id = '".$data['dataID']."' ";
		 if($this->db->query($sql)){
				   $returnValue['DoUpdate'] = '1';
		 }
		 return $returnValue;
	 }
    //---------------------------------- 
	 function listInsuranceType($type,$status){
		 $sql="SELECT * FROM tbl_insurance_type WHERE  insurance_type = '".$type."' AND insurance_type_status = '".$status."'  ";
		 $resultData = $this->db->query($sql)->result();
		 return $resultData;
	 }
    //---------------------------------- 
	 function addCarBrand($data){
		 $returnValue = array();
		 $sql="INSERT INTO tbl_car_brand (id,car_brand_name,car_brand_status,user_update ) VALUES('','".$data['car_brand_name']."','1','".$this->session->userdata('user_id')."')";
		  if($this->db->query($sql)){
				   $returnValue['doUpdate'] = '1';
		 }
		 $returnValue['sql'] = $sql;
		 return $returnValue;
		 
	 }
    //---------------------------------- 
	 function listCarBrand($brand_status){
		 if($brand_status=='all'){
			 $txtWere = "";
		 }else{
			 $txtWere = " WHERE car_brand_status='".$brand_status."'"; 
		 }
		 $sql="SELECT * FROM tbl_car_brand  $txtWere ORDER BY car_brand_name ASC ";
		 $resultData = $this->db->query($sql)->result();
		 return $resultData;
	 }
    //----------------------------------dataID , updateVal
	 function UpdateBookUseBranch($data){
		 $filename = $data['branch'];
		
		 $returnValue = array();
		  $sql="UPDATE tbl_bookbank_data SET  $filename = '".$data['updateVal']."' WHERE id = '".$data['dataID']."'  ";
		 if($this->db->query($sql)){
				   $returnValue['doUpdate'] = '1';
		 }
		 $returnValue['sql'] = $sql;
		 return $returnValue;
	 }
    //----------------------------------
	 function UpdatePremium($data){
		 $fieldName = $data['field'];
		 $returnValue = array();
		 $returnValue['doUpdate'] = '0';
		 $sql="UPDATE tbl_car_type_premium SET $fieldName='".$data['changeValue']."' WHERE id='".$data['dataID']."' ";
		 if($this->db->query($sql)){
				   $returnValue['doUpdate'] = '1';
		 }
		 $returnValue['sql'] = $sql;
		 return $returnValue;
	 }
    //---------------------------------- 
	 function listPremium($data){
		 $sql="SELECT * FROM tbl_car_type_premium WHERE tbl_car_type_id = '".$data['tbl_car_type_id']."' ORDER BY id ASC ";
		 //echo $sql;
		 $resultData = $this->db->query($sql)->result();
		 return $resultData;
	 }
	   //---------------------------------- 
	 function listPremium2($dataID){
		 $sql="SELECT * FROM tbl_car_type_premium WHERE tbl_car_type_id = '".$dataID."' ORDER BY id ASC ";
		 //echo $sql;
		 $resultData = $this->db->query($sql)->result();
		 return $resultData;
	 }
    //----------------------------------
	 function listCarPremium($dataStatus){
		  $returnValue = array();
		 $txtStatus = "";
		 if($dataStatus!='all'){
			 $txtStatus = " WHERE data_status='".$dataStatus."' ";
		 }

		  $sql="SELECT * FROM tbl_car_type_premium ORDER BY tbl_car_type_id ASC , id ASC ";
		  $resultData=$this->db->query($sql)->result();
		  foreach($resultData AS $data){
			  $returnValue['tbl_car_type_id']['id']=$data->id;
			  $returnValue['tbl_car_type_id']['cc']=$data->cc;
			  $returnValue['premium']['id']=$data->premium;
			  $returnValue['tbl_car_type_id']['total_premium']=$data->total_premium;
		  }
		  return $returnValue;
	 }
    //---------------------------------- 
	 function addPremium($data){
		 $returnValue = array();
		 $returnValue['doUpdate'] = '0';
		 $sql="INSERT INTO `tbl_car_type_premium` (`id`, `tbl_car_type_id`, `cc`, `premium`, `total_premium`, `data_status`, `date_update`, `user_update`) VALUES ('', '".$data['tbl_car_type_id']."', '".$data['cc']."', '".$data['premium']."', '".$data['total_premium']."', '1', current_timestamp(), '0')";
		 if($this->db->query($sql)){
				   $returnValue['doUpdate'] = '1';
		 }
		 $returnValue['sql'] = $sql;
		 return $returnValue;
	 }
    //---------------------------------- 
	 function updateCarDedug($data){
		 $returnValue = array();
		 $returnValue['doUpdate'] = '0';
		 $sql="UPDATE tbl_car_type SET deduct_percent = '".$data['deduct_percent']."' WHERE id = '".$data['dataID']."' ";
		 if($this->db->query($sql)){
				   $returnValue['doUpdate'] = '1';
		 }
		 $returnValue['sql'] = $sql;
		 return $returnValue;
	 }
    //---------------------------------- 
	 function listCartype($data){
		 $returnValue = array();
		 $sql="SELECT * FROM tbl_car_type ORDER BY car_type_group ASC ";
		 $returnValue['result'] = $this->db->query($sql)->result();
		 return $returnValue;
	 }
    //---------------------------------- 
	 function updateBookBackStatus($data){
		 $returnValue = array();
		 $returnValue['doUpdate'] = '0';
		 $sql="UPDATE tbl_bookbank_data SET data_status = '".$data['data_status']."' WHERE id = '".$data['dataID']."' ";
		 if($this->db->query($sql)){
				   $returnValue['doUpdate'] = '1';
		 }
		 $returnValue['sql'] = $sql;
		 return $returnValue;
		 
	 }
    //---------------------------------- 
	 function listBookBank($data){
		 $returnValue = array();
		 $txtWhere = ""; $txtBranch1 = ""; $txtBranch2 = "";
		 if($data['data_status']!='all'){
			 $txtWhere = " AND data_status = '".$data['data_status']."' ";
		 }
		 if(isset($data['selectBranch1'])){
			 $txtBranch1=" AND branch_1= '".$data['selectBranch1']."' ";
		 }
		 if(isset($data['selectBranch2'])){
			 $txtBranch2=" AND branch_2= '".$data['selectBranch2']."' ";
		 }		 
		 $sql="SELECT * FROM tbl_bookbank_data WHERE 1 $txtWhere  $txtBranch1 $txtBranch2 ORDER BY data_status DESC , id ASC    ";
		 $returnValue['sql'] = $sql;
		 $returnValue['result'] = $this->db->query($sql)->result();
		 return $returnValue;
	 }
    //---------------------------------- 
	 function getBankDetail($bankID){
		 $returnValue = array();
		 $sql="SELECT * FROM tbl_bookbank_data WHERE id = '".$bankID."' ";
		 $result = $this->db->query($sql)->result();
		 foreach($result AS $data){
			 $returnValue['bank_id']=$data->id;
			 $returnValue['bank_name']=$data->bank_name;
			 $returnValue['bank_branch']=$data->bank_branch;
			 $returnValue['bank_acc_name']=$data->bank_acc_name;
			 $returnValue['bank_number']=$data->bank_number;
		 }
		  return $returnValue;
	 }
    //---------------------------------- 
	 function addBookBank($data){
		  $returnValue = array();
		  $returnValue['doUpdate'] = '0';
		  $data['dataAdd']=date("Y-m-d");
		  $sql="INSERT INTO `tbl_bookbank_data` (`id`, `bank_name`, `bank_branch`, `bank_acc_name`, `bank_number`, `user_id`, `data_status`, `date_add`, `date_update`) VALUES ('', '".$data['bank_name']."', '".$data['bank_branch']."', '".$data['bank_acc_name']."', '".$data['bank_number']."', '".$this->session->userdata('user_id')."', '".$data['data_status']."', '".$data['dataAdd']."', current_timestamp());";
		 if($this->db->query($sql)){
				   $returnValue['doUpdate'] = '1';
		 }
		  $returnValue['sql'] = $sql;
		 return $returnValue;
	 }
    //---------------------------------- field,theVal:theVal,uerID:
	 function onoffMenu($data){
		  $returnValue = array();
		  $returnValue['doUpdate'] = '0';
		  $sql="UPDATE tbl_user_data SET ".$data['field']." = '".$data['theVal']."' WHERE id='".$data['uerID']."'  ";
		 if($this->db->query($sql)){
				   $returnValue['doUpdate'] = '1';
		 }
		  $returnValue['sql'] = $sql;
		 return $returnValue;
	 }
    //---------------------------------- 
	 function ProvinceList(){
		 $sql="SELECT * FROM tbl_province  ORDER BY province_name  ASC  ";
		 $resultData = $this->db->query($sql)->result();
		 return $resultData; 
	 }
    //---------------------------------- 
	 function listEmp($dataStatus){
		 $sql="SELECT * FROM tbl_user_data WHERE data_status ='".$dataStatus."' ORDER BY data_status DESC , id ASC  ";
		 $resultData = $this->db->query($sql)->result();
		 return $resultData;
	 }
    //---------------------------------- 
	 function employeeDetail($dataID){
		 $sql="SELECT * FROM tbl_user_data WHERE id = '".$dataID."' ";
		 $resultData = $this->db->query($sql)->result();
		 return($resultData);
	 }

	 //---------------------------------- 
	 function getWorkType($dataStatus){
		 $sql="SELECT * FROM tbl_work_type WHERE work_status = '".$dataStatus."' ORDER BY work_type_name ASC ";
		 $resultData = $this->db->query($sql)->result();
		 return $resultData;
	 }
    //---------------------------------- 
	 function AddUser($param){
		 $returnValue = array();
		 $returnValue['dbAction'] = '';
		 $returnValue['doUpdate'] = '0';

		 if($param['dataID']=='x'){
			 $param['password'] = md5($param['password']);
			 $sql="INSERT INTO `tbl_user_data` (`id`, `name_sname`, `telephone_no`, `user_name`, `password`, `user_branch`, `last_login`, `user_update`, `data_status`) VALUES ('', '".$param['name_sname']."', '".$param['telephone_no']."', '".$param['user_name']."', '".$param['password']."', '".$param['user_branch']."', current_timestamp(), '".$this->session->userdata('user_id')."', '".$param['data_status']."');";
			  if($this->db->query($sql)){
				   $returnValue['dbAction'] = 'insert';
				   $returnValue['doUpdate'] = '1';
				   $returnValue['sql'] = $sql;
				   $returnValue['dataID'] = $this->db->insert_id();
			  }
		 }else{
			 if($param['password']!=''){
				  $param['password'] = md5($param['password']);
				  $txtPass = " , `password` = '".$param['password']."' ";
			 }else{
				 $txtPass ='';
			 }
			 $sql="UPDATE tbl_user_data SET `name_sname` ='".$param['name_sname']."' , `telephone_no`='".$param['telephone_no']."', `user_name`='".$param['user_name']."' , `user_branch`='".$param['user_branch']."',  `user_update` = '".$this->session->userdata('user_id')."' , `data_status` ='".$param['data_status']."' $txtPass  WHERE id = '".$param['dataID']."' ";
			 	if($this->db->query($sql)){
				   $returnValue['dbAction'] = 'update';
				   $returnValue['doUpdate'] = '1';
				   $returnValue['sql'] = $sql;
				   $returnValue['dataID'] = $param['dataID'];
			  }
		 }
		 
		 return $returnValue;
	 }
    //---------------------------------- 
	 function listHeader(){
		 $sql="SELECT * FROM tbl_recipe_head WHERE data_status  ='1' ORDER BY id ASC ";
		 $resultData = $this->db->query($sql)->result();
		 return $resultData;
	 }
    //---------------------------------- 
	 function updateAgent($param){
		 $returnValue = array();
		 $returnValue['dbAction'] = '';
		  $returnValue['doUpdate'] = '0';
		
		 
		 if($param['dataID']==''){
			 $sql=" INSERT INTO `tbl_recipe_head` (`id`, `header_name`, `tax_no`, `address`, `telephone_no`, `line_id`, `line_id_qrcode`, `step_stransfer` "
				 .", `logo_head`, `bank_name`, `bank_branch`, `bank_acc_name`, `bank_acc_number`, `bank_qr_code`, `data_status`, `user_update`, `date_update`, `branch_id`)"
				 ." VALUES "
				 ."('', '".$param['header_name']."', '".$param['tax_no']."', '".$param['address']."', '".$param['telephone_no']."', '".$param['line_id']."', '".$param['line_id_qrcode']."', '".$param['step_stransfer']."' "
				 .", '".$param['logo_head']."', '".$param['bank_name']."', '".$param['bank_branch']."', '".$param['bank_acc_name']."', '".$param['bank_acc_number']."', '".$param['bank_qr_code']."', '".$param['data_status']."', '".$this->session->userdata('user_id')."' , current_timestamp(), '0');";
			  if($this->db->query($sql)){
				   $returnValue['dbAction'] = 'insert';
				   $returnValue['doUpdate'] = '1';
				   $returnValue['sql'] = $sql;
				   $returnValue['dataID'] = $this->db->insert_id();
			  }
		 }else{
			 $sql="UPDATE tbl_recipe_head SET `header_name` = '".$param['header_name']."', `tax_no` = '".$param['tax_no']."', `address` = '".$param['address']."', `telephone_no`='".$param['telephone_no']."' , `line_id` = '".$param['line_id']."', `line_id_qrcode` = '".$param['line_id_qrcode']."', `step_stransfer` = '".$param['step_stransfer']."' "
				 .", `logo_head` = '".$param['logo_head']."' , `bank_name` = '".$param['bank_name']."' , `bank_branch` = '".$param['bank_branch']."', `bank_acc_name` = '".$param['bank_acc_name']."', `bank_acc_number` = '".$param['bank_acc_number']."', `bank_qr_code` = '".$param['bank_qr_code']."', `data_status` = '".$param['data_status']."', `user_update` = '".$this->session->userdata('user_id')."',  `branch_id` = '0' WHERE id = '".$param['dataID']."' " ;
			 if($this->db->query($sql)){
				   $returnValue['dbAction'] = 'update';
				   $returnValue['sql'] = $sql;
				   $returnValue['doUpdate'] = '1';
				   $returnValue['dataID'] =$param['dataID'];
			  }
		 }
		 $returnValue['logo_head'] = $param['logo_head'];
		 $returnValue['bank_qr_code'] = $param['bank_qr_code'];
		 $returnValue['line_id_qrcode'] = $param['line_id_qrcode'];
		 
		 return $returnValue;
	 }
    //---------------------------------- 
	 function getHeaderData($dataID){
		 $sql="SELECT * FROM tbl_recipe_head WHERE id ='".$dataID."' ";
		 $resultData=$this->db->query($sql)->result();
		 return $resultData;		 
	 }
    //---------------------------------- 

	 function listAgent($agentStatus){

		 $txtWhere = '';

		 if($agentStatus!='all'){

			 $txtWhere = " WHERE agent_status = '".$agentStatus."' ";

		 }

		//$sql="SELECT * FROM tbl_agent_data $txtWhere ORDER BY agent_status DESC , id ASC ";
		 $sql="SELECT * FROM tbl_agent_data $txtWhere ORDER BY agent_status DESC , agent_name ASC ";

		 $resultData = $this->db->query($sql)->result();

		 return $resultData;

	 }

    //---------------------------------- dataID,chageValue
	 function updateAgentStatus($data){
		 $returnValue = array();
         $returnValue['DoUpdate']=0;
		 $sql="UPDATE tbl_agent_data SET agent_status = '".$data['chageValue']."' WHERE id = '".$data['dataID']."'  ";
		 if($this->db->query($sql)){ 
		  	$returnValue['DoUpdate']=1;
		 }
		 // $returnValue['sql']=$sql;
		 return $returnValue;
	 }
    //---------------------------------- 

	function AddAgent($parm){

		$returnValue = array();

		$returnValue['DoInsert']=0;

		

		if($parm['dataID']=='x'){

			 $sql = "INSERT INTO `tbl_agent_data` (`id`, `agent_name`, `telephone`, `agent_com`, `agent_tax`, `agent_status`, `user_update`) "

				 ." VALUES ('', '".$parm['agent_name']."', '".$parm['telephone']."',  '".$parm['agent_com']."', '".$parm['agent_tax']."', '".$parm['agent_status']."', '".$this->session->userdata('user_id')."') ";

			if($this->db->query($sql)){

				$returnValue['DoInsert']=1;

				$returnValue['DoData']="insert";

			  }

		}else{

			$sql="UPDATE tbl_agent_data SET  `agent_name` = '".$parm['agent_name']."' , `telephone`='".$parm['telephone']."' , `agent_com` = '".$parm['agent_com']."' , `agent_tax` = '".$parm['agent_tax']."' , `agent_status`= '".$parm['agent_status']."', `user_update`='".$this->session->userdata('user_id')."' WHERE id ='".$parm['dataID']."' ";

			if($this->db->query($sql)){

				$returnValue['DoInsert']=1;

				$returnValue['DoData']="update";

			  }

		}

		 $returnValue['sql']=$sql;

		 return $returnValue; 

		

	} // dataID:dataID, agent_name:agent_name ,telephone:telephone,agent_status:agent_status,agent_com:agent_com,agent_tax:agent_tax 

    //---------------------------------- 

	 function ChangeCodeStatus($parm){

		 $returnValue = array();

		 $returnValue['DoUpdate']=0;

  

		 $sql="UPDATE tbl_code_data SET code_status = '".$parm['chageValue']."' WHERE id = '".$parm['dataID']."' ";

		 if($this->db->query($sql)){

			 $returnValue['DoUpdate']=1;

		 }

		 $returnValue['sql']=$sql;

		 return $returnValue;

	 } 

    //---------------------------------- 

	 function listCode($code_status){

		 $txtWhere ='';

		 if($code_status!='all'){

			 $txtWhere = " WHERE code_status = '".$code_status."' ";

		 }

		// echo $code_status;

		// $sql="SELECT * FROM tbl_code_data $txtWhere ORDER BY code_status DESC , id DESC ";
		 $sql="SELECT * FROM tbl_code_data $txtWhere ORDER BY code_status DESC , conde_name DESC ";

		 $resultData = $this->db->query($sql)->result();

		 return $resultData;			 

	 }

    //---------------------------------- 



	 function AddCode($parm){



		$returnValue = array();



		$returnValue['DoInsert']=0;



		 if($parm['dataID']!='x'){

			 $sql="UPDATE tbl_code_data SET `conde_name`='".$parm['conde_name']."', `code_status`='".$parm['code_status']."', `user_update`='".$this->session->userdata('user_id')."' WHERE id = '".$parm['dataID']."' ";

			 if($this->db->query($sql)){

				$returnValue['DoInsert']=1;

			  }

		 }else{

			 

			 $sql="INSERT INTO `tbl_code_data` (`id`, `conde_name`, `code_status`, `user_update`) VALUES ('', '".$parm['conde_name']."', '".$parm['code_status']."', '".$this->session->userdata('user_id')."') ";



		 	 if($this->db->query($sql)){

				$returnValue['DoInsert']=1;

			  }

		 }



		



		



        $returnValue['sql'] = $sql;







        return $returnValue;



	 }



    //---------------------------------- 



	 function deleteIncome($parm){



		$returnValue = array();



		$returnValue['DoDelete']=0;



	 	$sql="DELETE FROM tbl_insurance_income WHERE id = '".$parm['dataID'] ."' ";



		 



		 if($this->db->query($sql)){



            $returnValue['DoDelete']=1;



          }







        $returnValue['sql'] = $sql;



		return $returnValue;  



	 }



    //----------------------------------  



	 function UpdateIncome($parm){



		$returnValue = array();



		$returnValue['DoUpdate']=0;



		 



		$dataID=$parm['dataID'];



		$fieldName=$parm['fieldName'];



		$updateVal=$parm['updateVal'];



		 



		 $sql ="UPDATE tbl_insurance_income SET $fieldName = '".$updateVal."' , `user_update`='".$this->session->userdata('user_id')."'  WHERE id='".$dataID."' ";



		 if($this->db->query($sql)){



            $returnValue['DoUpdate']=1;



          }







        $returnValue['sql'] = $sql;



        $returnValue['updateVal'] = number_format($updateVal,2);



		 



		return $returnValue; 



	 }



    //---------------------------------- 



	 function listIncome($parm){



		 $sql="SELECT a.*,b.insurance_type_name FROM tbl_insurance_income AS a LEFT JOIN tbl_insurance_type AS b ON a.ins_type_id=b.id WHERE ins_company ='".$parm['ins_company']."' ";



		 $resultData = $this->db->query($sql)->result();



		 return $resultData;



	 }



	 



    //----------------------------------   



	 function AddIncome($parm){



		$returnValue = array();



		$returnValue['DoInsert']=0;



		



		 $sql="SELECT * FROM tbl_insurance_income WHERE  ins_company='".$parm['ins_company']."' AND ins_type_id='".$parm['ins_type_id']."' ";



		 



		 $resultData = $this->db->query($sql);



		 if($resultData->num_rows() > 0){



			 $returnValue['DoInsert']='Dupplicate';



		 }else{



			$sql = "INSERT INTO `tbl_insurance_income` (`id`, `ins_company`, `ins_type_id`, `com_1`, `tax_1`, `com_2`, `tax_2`, `com_3`, `tax_3`, `start_date`, `end_date`, `user_update`) "



			." VALUES ('', '".$parm['ins_company']."', '".$parm['ins_type_id']."', '".$parm['com_1']."', '".$parm['tax_1']."', '".$parm['com_2']."', '".$parm['tax_2']."', '".$parm['com_3']."', '".$parm['tax_3']."', '0000-00-00', '0000-00-00', '".$this->session->userdata('user_id')."') ";



		 



			 if($this->db->query($sql)){



				$returnValue['DoInsert']=1;



			  }



		 }







        $returnValue['sql'] = $sql;







        return $returnValue;



	 }



    //----------------------------------   



	 function listInstype($parm){



		 if($parm['status'] == 'all'){



			 $txtWhereStatus = '';



		 }else{



			 $txtWhereStatus = "  WHERE  insurance_type_status='".$parm['status']."' "; 



		 }



		 $sql="SELECT * FROM tbl_insurance_type  $txtWhereStatus ORDER BY  insurance_type_status DESC , insurance_type ASC , id ASC ";



		 $resultData= $this->db->query($sql)->result();



		 return $resultData;



		 



	 }



	//----------------------------------



	 function addInsTypeData($data){



		 $returnValue = array();



		 $returnValue['DoInsert']=0;



		 



		 if($data['updateID']==''){



				 $sql="INSERT INTO `tbl_insurance_type` (`id`, `insurance_type_name`, `insurance_type`, `insurance_type_status`, `user_update`) VALUES ('', '".$data['insurance_type_name']."', '".$data['insurance_type']."', '".$data['insurance_type_status']."', '".$this->session->userdata('user_id')."');"; 



		 }else{



			  $sql="UPDATE tbl_insurance_type SET `insurance_type_name`='".$data['insurance_type_name']."', `insurance_type`='".$data['insurance_type']."', `insurance_type_status`='".$data['insurance_type_status']."' , `user_update`='".$this->session->userdata('user_id')."' WHERE id = '".$data['updateID']."' ";



		 }



	



		$returnValue['sql']= $sql;



		 



		if($this->db->query($sql)){



            $returnValue['DoInsert']=1;



         }







        $returnValue['sql'] = $sql;







        return $returnValue;



	 }



    //---------------------------------- bank_name bank_acc_branch bank_acc_no bank_acc_name 



	function updateAddrCorp($data){



        $returnValue = array();



        $returnValue['DoUpdate']=0;



        $returnValue['img_logo'] = '';



        $sql="UPDATE tbl_insurance_company SET company_name = '".$data['company_name']."' , company_full_name ='".$data['company_full_name']."' , company_addr='".$data['company_addr']."' , company_telephone='".$data['company_telephone']."' , company_logo='".$data['filename']."' , company_tax_no='".$data['company_tax_no']."', company_tax_no='".$data['company_tax_no']."', bank_name='".$data['bank_name']."', bank_acc_branch='".$data['bank_acc_branch']."', bank_acc_no='".$data['bank_acc_no']."', bank_acc_name='".$data['bank_acc_name']."' WHERE id = '".$data['dataID']."'  ";


        if($this->db->query($sql)){



            $returnValue['DoUpdate']=1;



            $returnValue['img_logo'] = $data['filename'];



        }



        $returnValue['sql']=$sql;



        $returnValue['img_logo']=$data['filename'];



        return $returnValue;   



    }







    



    //----------------------------------



    function getCompayData($dataID){



        $returnValue = array();



        $sql = "SELECT * FROM tbl_insurance_company WHERE id = '".$dataID."' ";




        $resultData = $this->db->query($sql)->result();



		$CountRow =  $this->db->query($sql)->num_rows();



		if($CountRow>0){



			foreach($resultData AS $data);



			$returnValue['id']=$data->id;



			$returnValue['company_name']=  $data->company_name;



			$returnValue['company_full_name']= htmlspecialchars($data->company_full_name);



			$returnValue['company_addr']=htmlspecialchars($data->company_addr);



			$returnValue['company_telephone']=$data->company_telephone;



			$returnValue['company_logo']=$data->company_logo;



			$returnValue['company_tax_no']=$data->company_tax_no;
			
			$returnValue['bank_name']=$data->bank_name;
			$returnValue['bank_acc_no']=$data->bank_acc_no;
			$returnValue['bank_acc_branch']=$data->bank_acc_branch;
			$returnValue['bank_acc_name']=$data->bank_acc_name;
			$returnValue['company_tax_no']=$data->company_tax_no;



		}else{



			$returnValue['id']="notFound";



		}



        return $returnValue;   



    }



    //----------------------------------    



    function UpdateCompanyOrder($dataID,$chageValue){



        $returnValue = array();



        $returnValue['DoUpdate']=0;



        $sql="UPDATE tbl_insurance_company SET company_order = '".$chageValue."' WHERE id = '".$dataID."' ";



        if($this->db->query($sql)){



            $returnValue['DoUpdate']=1;



        }



        $returnValue['sql']=$sql;



        return $returnValue;       



    }



    //----------------------------------  



    function ChangeCompanyStatus($dataID,$chageValue){



        $returnValue = array();



        $returnValue['DoUpdate']=0;



        $sql="UPDATE tbl_insurance_company SET company_status = '".$chageValue."' WHERE id = '".$dataID."' ";



        if($this->db->query($sql)){



            $returnValue['DoUpdate']=1;



        }



        $returnValue['sql']=$sql;



        return $returnValue;



    }



    //----------------------------------
    function listCompany($dataStatus=NULL,$use_branch=NULL){
		
		$txtWhere = '';
		$txtBranch = '';
		
		if(isset($use_branch)){
			$txtBranch = " AND use_branch = '".$use_branch."' ";
		}
		
		if(isset($dataStatus)){
			$txtWhere = " AND company_status = '".$dataStatus."' ";
		}
        $sql = "SELECT * FROM tbl_insurance_company WHERE 1 $txtWhere $txtBranch ORDER BY company_order ASC ";
        $resultData=$this->db->query($sql)->result();
        return $resultData;

    }
    //----------------------------------

    function addCompany($company_name,$company_status,$use_branch){

        $returnValue = array();
        $returnValue['DoInsert']=0;
        $sql = "SELECT MAX(company_order) AS SelectMax FROM tbl_insurance_company ";
        $resultData = $this->db->query($sql)->result();
        foreach($resultData AS $count);
        if(!isset($count->SelectMax)){
            $MaxNum = 1 ;
        }else{
            $MaxNum = $count->SelectMax+1 ;
        }
    //----------------------------------
        $sql="INSERT INTO `tbl_insurance_company` (`id`, `company_name`, `company_code`, `company_status`, `company_order`, `user_update`, `use_branch`) "
        ." VALUES "
        ." ('', '".$company_name."', 'company_code', '".$company_status."', '".$MaxNum."', '".$this->session->userdata('user_id')."', '".$use_branch."') ";
        if($this->db->query($sql)){
            $returnValue['DoInsert']=1;
        }
        $returnValue['sql'] = $sql;
        return $returnValue;
    }

    //----------------------------------



 }