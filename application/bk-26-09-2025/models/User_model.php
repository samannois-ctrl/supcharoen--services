<?php
 class User_model extends CI_Model
 {
    


    function __construct()
    {
        parent::__construct();
    }

    function getUserLogin($xuser,$xpassword){
		$returnValue = array();
		$sql="SELECT id,name_sname,last_login,user_update ,data_status,user_branch FROM tbl_user_data WHERE user_name ='".$xuser."' AND password =md5('".$xpassword."') AND data_status='1' ";
		$resultData = $this->db->query($sql)->result();
		foreach($resultData AS $data);
		if(!isset($data)){
			$data = "";
		}
		$returnValue['UserData']=$data;
		return $returnValue;
    }
	 
	function DoupdatePassWord($newPass){
		$returnValue = array();
		$returnValue['Doupdate']=0;
		$newPass = md5($newPass);
		
		$sql="UPDATE tbl_user_data SET  `password` = '".$newPass."' WHERE id = '".$this->session->userdata('user_id')."'  ";
		if($this->db->query($sql)){
			$returnValue['Doupdate']=1;
		}

		$returnValue['sql']=$sql;

		return $returnValue;

	}



 }
