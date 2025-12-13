<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');

        $this->load->model('setting_model');

        //$this->load->model('Download_model');

		if($this->session->userdata('user_id')==''){

			redirect(base_url().'login', 'refresh');

		}

    }



	public function index(){



	}
	
	
	
	
	function find_path_upload_current()
	{

		$root_path = FCPATH.'uploadfile/logo/';
		//$cur_upload_path = $root_path.date('Y');
		$cur_upload_path = $root_path;
		if(! file_exists($cur_upload_path))

		{
			mkdir($cur_upload_path, 0777, true);

		}
		return $cur_upload_path;

	}


	
function find_path_upload_currentYear()
	{
		$root_path = FCPATH.'uploadfile/';
		$cur_upload_path = $root_path.date('Y');
		
		//$cur_upload_path = $root_path;
		if(! file_exists($cur_upload_path))
		{
			mkdir($cur_upload_path, 0777, true);
		}

		return $cur_upload_path;

	}

	
	
	//------------------------------------------------
	public function AddCarBrandInsrance(){
		 
		 $data=array();
		 $data =$this->input->post();
		 $resultData =$this->setting_model->AddCarBrandInsurance($data);
		 echo json_encode($resultData);
	}
	//------------------------------------------------
	public function listCarBrandInsurance(){
		$dataStatus = $this->input->post('dataStatus');
		$data['DataCarBrand']=$this->setting_model->listCarBrandInsurance($dataStatus);
		$this->load->view('setting_car_brand_list',$data);
	}
	//------------------------------------------------
	public function setting_car_brand(){
		$data=array();
		$this->load->view('setting_car_brand',$data);
		$this->load->view('setting_car_script');
	}
	//------------------------------------------------
	public function updateCorpBranch(){
		 //  
		 $data = $this->input->post();
		 $resultData = $this->setting_model->updateCorpBranch($data);
		 echo json_encode($resultData);
	}
	//------------------------------------------------
	public function addCarBrand(){
		$data = $this->input->post();
		$returnVale=array();
		$resultData = $this->setting_model->addCarBrand($data);
		if($resultData['doUpdate']=='1'){
			$brand_status='1';
			$listCarBrand = $this->setting_model->listCarBrand($brand_status);
			  echo '<option value="0">--เลือกยี่ห้อ</option>';
			foreach($listCarBrand AS $brand){
			  echo '<option value="'.$brand->id.'">'.$brand->car_brand_name.'</option>';
			}
		}else{
			echo "Error";
		}
		//echo $resultData;
	}
	//------------------------------------------------
	public function UpdateBookUseBranch(){
		$data = array();
		$data=$this->input->post();
		$resultData = $this->setting_model->UpdateBookUseBranch($data);
		echo json_encode($resultData);
	}
	//------------------------------------------------
	public function UpdatePremium(){
		$data = array();
		$data=$this->input->post();
		$resultData = $this->setting_model->UpdatePremium($data);
		echo json_encode($resultData);
	}
	//------------------------------------------------
	public function listPremium(){
		$data = array();
		$data=$this->input->post();
		$data['resultData'] = $this->setting_model->listPremium($data);
		$this->load->view('list_premium',$data);
	}
	//------------------------------------------------
	public function addPremium(){
		$data = array();
		$data=$this->input->post();
		$resultData = $this->setting_model->addPremium($data);
		echo json_encode($resultData);
	}
	//------------------------------------------------
	public function updateCarDedug(){
		$data = array();
		$data=$this->input->post();
		$resultData = $this->setting_model->updateCarDedug($data);
		echo json_encode($resultData);
	}
	//------------------------------------------------
	public function setting_deduct_percent(){
		$data=array();
		$data['listCartype']=$this->setting_model->listCartype($data);
		//$dataStatus='1';
		//$data['listCarPremium']=$this->setting_model->listCarPremium($dataStatus);
		$this->load->view('list_car_type',$data);
		$this->load->view('list_car_type_script',$data);
		
	}
	//------------------------------------------------
	public function  updateBookBackStatus(){  
		//dataID , selectVal 
		$data = array();
		$data=$this->input->post();
		$resultData = $this->setting_model->updateBookBackStatus($data);
		echo json_encode($resultData);
	}
		
	//-------------------------------------------------
	public function listBookBank(){
		$data = array();
		$data=$this->input->post();
		$data['resultData'] = $this->setting_model->listBookBank($data);
		$this->load->view('listbookbank',$data);
	}
	//-------------------------------------------------
	public function addBookBank(){
		$data = array();
		$data=$this->input->post();
		$resultData = $this->setting_model->addBookBank($data);
		echo json_encode($resultData);
	}
	//-------------------------------------------------
    public function setting_bookbank(){
			$data=array();
			$this->load->view('setting_bookbank',$data);
			$this->load->view('setting_bookbank_script',$data);
	}

    //------- บริษัทประกันภัย -----------dataID,chageValue 
	public function updateAddrCorp(){
		$this->load->library('upload');
		$upload_path = $this->find_path_upload_current();
		$data['dataID'] = $this->input->post('UpdateDataID');
		$data['company_name'] = htmlspecialchars($this->input->post('update_company_name'));
		$data['company_full_name'] = htmlspecialchars($this->input->post('update_company_full_name'));
		$data['company_addr'] = htmlspecialchars($this->input->post('company_addr'));
		$data['company_telephone'] = $this->input->post('company_telephone');
		$data['company_tax_no'] = $this->input->post('company_tax_no');
		$data['bank_name']=$this->input->post('bank_name');
		$data['bank_acc_branch']=$this->input->post('bank_acc_branch');
		$data['bank_acc_no']=$this->input->post('bank_acc_no');
		$data['bank_acc_name']=$this->input->post('bank_acc_name');
		$data['filename']=$this->input->post('HiddenlogoFile');
		if (isset($_FILES["logoFile"]["name"])) {
			$config['encrypt_name'] = TRUE;
			$config['upload_path'] = $this->find_path_upload_current();;
			$config['upload_path'] = $this->find_path_upload_current();;
			$config['upload_path'] = $this->find_path_upload_current();;
			$config['upload_path'] = $this->find_path_upload_current();;
			$config['upload_path'] = $this->find_path_upload_current();;
			$config['allowed_types'] = 'gif|jpeg|jpg|png';
			$config['max_size']     = '0';
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('logoFile')) {
				//$error = array('error' => $this->upload->display_errors());
				//var_dump($error);
			} else {
				$data['filename'] = $this->upload->data('file_name');
				@unlink($upload_path.$this->input->post('HiddenlogoFile'));
			}
		}else{



			  $data['filename']='';



		}


		$result = $this->setting_model->updateAddrCorp($data);



		$result['upload_path']= base_url('uploadfile/logo');







		echo json_encode($result);







	}







	public function getCompayData(){



		$dataID = $this->input->post('dataID');



		$resultData = $this->setting_model->getCompayData($dataID);



		echo json_encode($resultData);



	}




	public function edit_company_insurance($corpID=NULL){



		if(!isset($corpID)){



			redirect(base_url('Setting/setting_company_insurance/'), 'refresh');



		}else{



			$data['page']='editCompany';



			$getCompanyData = $this->setting_model->getCompanyData($corpID);



			$this->load->view('setting_edit_company_insurance',$data);



			$this->load->view('setting_company_insurance_script',$data);	







		}







		$data['page']='addCompany';



		$this->load->view('setting_company_insurance');	



		



	}







	public function UpdateCompanyOrder(){



		$dataID = $this->input->post('dataID');



		$chageValue = $this->input->post('chageValue');



		$resultData = $this->setting_model->UpdateCompanyOrder($dataID,$chageValue);



		echo json_encode($resultData);		



	}







    public function ChangeCompanyStatus(){



		$dataID = $this->input->post('dataID');



		$chageValue = $this->input->post('chageValue');



		$resultData = $this->setting_model->ChangeCompanyStatus($dataID,$chageValue);



		echo json_encode($resultData);



	}







	public function listCompany(){



		$data['resultData']=$this->setting_model->listCompany();



		$this->load->view('setting_company_list',$data);



	}







    public function addCompany(){

		$company_name = $this->input->post('company_name');
		$company_status = $this->input->post('company_status');		
		$use_branch = $this->input->post('use_branch');		



		$result = $this->setting_model->addCompany($company_name,$company_status,$use_branch);



		echo json_encode($result);



	}







	public function setting_company_insurance(){				



		$data['page']='addCompany';



		$this->load->view('setting_company_insurance');	



		$this->load->view('setting_company_insurance_script',$data);	







	}







	//------- บริษัทประกันภัย -> ดูข้อมูลรายได้ -----------listInstype







	public function setting_insurance_income_detail($corpID=NULL){				



		if(!isset($corpID)){



			redirect(base_url('Setting/setting_company_insurance'), 'refresh');



		}else{



		    $CompanyData = $this->setting_model->getCompayData($corpID);



			if($CompanyData['id']=='notFound'){



				redirect(base_url('Setting/setting_company_insurance'), 'refresh');



			}



		}



		



		$parm['status'] = '1';



		$data['getInsType']= $this->setting_model->listInstype($parm);



		$data['companyID']=$corpID;
		$data['company_name']=$CompanyData['company_name'];

      

		$this->load->view('setting_insurance_income_detail',$data);	



		$this->load->view('setting_insurance_income_script');	







	}







	public function AddIncome(){



		// com_1:com_1,com_2:com_2,com_3:com_3,tax_1:tax_1,tax_2:tax_2,tax_3:tax_3,ins_type_id:ins_type_id,companyID:companyID 



		$parm['com_1'] = $this->input->post('com_1');



		$parm['com_2'] = $this->input->post('com_2');



		$parm['com_3'] = $this->input->post('com_3');



		$parm['tax_1'] = $this->input->post('tax_1');



		$parm['tax_2'] = $this->input->post('tax_2');



		$parm['tax_3'] = $this->input->post('tax_3');



		$parm['ins_type_id'] = $this->input->post('ins_type_id');



		$parm['ins_company'] = $this->input->post('companyID');



		



		$resultData= $this->setting_model->AddIncome($parm);



		echo json_encode($resultData);



	}



	



	public function deleteIncome(){



		$parm['dataID'] = $this->input->post('dataID');



		$resultData = $this->setting_model->deleteIncome($parm);



		echo json_encode($resultData);



	} 



	



	public function listIncome(){



		$parm['ins_company'] = $this->input->post('companyID');



		$data['listIncome']= $this->setting_model->listIncome($parm);



		$this->load->view('setting_insurance_income_data',$data);



	}







	public function UpdateIncome(){



		// dataID:dataID,fieldName:fieldName,updateVal:updateVal



		$parm['dataID'] = $this->input->post('dataID');



		$parm['fieldName'] = $this->input->post('fieldName');



		$parm['updateVal'] = $this->input->post('updateVal');



	 	$resultData = $this->setting_model->UpdateIncome($parm);



		echo json_encode($resultData);



	}



	//------- กรมธรรม์ --------------







	public function setting_policy(){				



	



		$this->load->view('setting_policy');	



		$this->load->view('setting_policy_script');	







	}



	



	public function addInsTypeData(){



	 $data['insurance_type'] = $this->input->post('insurance_type');



	 $data['insurance_type_status'] = $this->input->post('insurance_type_status');



	 $data['insurance_type_name'] = $this->input->post('insurance_type_name');



	 $data['updateID'] = $this->input->post('updateID');



	



	 $resultData = $this->setting_model->addInsTypeData($data);



	 echo json_encode($resultData);



	



	}



	



    public function listInstype(){



		$parm['status'] = 'all';

		$data['listData']= $this->setting_model->listInstype($parm);



		$this->load->view('setting_policy_data',$data);



	}







	//------- ตัวแทน --------------
    public function updateAgentStatus(){
		$data=$this->input->post();
		$resultData = $this->setting_model->updateAgentStatus($data); 
		echo json_encode($resultData);
	}
	
	public function listAgent(){

		$agentStatus = 'all';

		$data['listAgent'] = $this->setting_model->listAgent($agentStatus); 

		$this->load->view('setting_agent_list',$data);

	}

	

	public function AddAgent(){

	// dataID:dataID, agent_name:agent_name ,telephone:telephone,agent_status:agent_status,agent_com:agent_com,agent_tax:agent_tax 

		$parm['dataID'] = $this->input->post('dataID');

		$parm['agent_name'] = $this->input->post('agent_name');

		$parm['telephone'] = $this->input->post('telephone');

		$parm['agent_status'] = $this->input->post('agent_status');

		$parm['agent_com'] = $this->input->post('agent_com');

		$parm['agent_tax'] = $this->input->post('agent_tax');

		$parm['agent_tax'] = $this->input->post('agent_tax');

		

		$resultData = $this->setting_model->AddAgent($parm); 

		echo json_encode($resultData);

		

	}  



	public function setting_agent(){				



		$this->load->view('setting_agent');	

		$this->load->view('setting_agent_script');	



	}



	//------- รายชื่อโค้ด --------------	ChangeCodeStatus()  dataID  chageValue

	public function ChangeCodeStatus(){

		$parm['dataID'] = $this->input->post('dataID');

		$parm['chageValue'] = $this->input->post('chageValue');

		$resultData = $this->setting_model->ChangeCodeStatus($parm); 

		echo json_encode($resultData);

	}

	

    public function listCode(){

		$code_status = 'all';

		$data['listCode'] = $this->setting_model->listCode($code_status);

		$this->load->view('setting_code_list_table',$data);	

	}



	public function setting_code_list(){				



		$this->load->view('setting_code_list');	



		$this->load->view('setting_code_script');	



	}







	public function AddCode(){



		$parm['conde_name'] = $this->input->post('conde_name');



		$parm['code_status'] = $this->input->post('code_status');

		

		$parm['dataID'] = $this->input->post('dataID');



		$resultData = $this->setting_model->AddCode($parm);



	 	echo json_encode($resultData);



	}    

	
	

	//------- หัวกระดาษ ใบรับเงิน และใบแจ้งหนี้ --------------
	public function listHeader(){
		$data['dataList']=$this->setting_model->listHeader();
		$this->load->view('setting_header_list',$data);	
	}


	public function setting_header(){				

		$this->load->view('setting_header');	
		$this->load->view('setting_header_script');	
	}
	
	public function updateAgent(){
		 $this->load->library('upload');
		
		 $param['header_name']=$this->input->post('header_name');
		 $param['tax_no']=$this->input->post('tax_no');
		 $param['address']=$this->input->post('address');
		 $param['telephone_no']=$this->input->post('telephone_no');
		 $param['line_id']=$this->input->post('line_id');
		 $param['bank_name']=$this->input->post('bank_name');
		 $param['line_id_qrcode']=$this->input->post('line_id_qrcode');
		 $param['step_stransfer']=$this->input->post('step_stransfer');
		 $param['bank_branch']=$this->input->post('bank_branch');
		 $param['bank_acc_number']=$this->input->post('bank_acc_number');
		 $param['bank_acc_name']=$this->input->post('bank_acc_name');
		 $param['data_status']=$this->input->post('data_status');
		 $param['dataID']=$this->input->post('dataID');
		 $param['oldBankQrCode']=$this->input->post('oldBankQrCode');
		 $param['oldLineQrCode']=$this->input->post('oldLineQrCode');
		 $param['oldLogo']=$this->input->post('oldLogo');
		 $param['bank_qr_code']=$this->input->post('oldBankQrCode');
		 $param['line_id_qrcode']=$this->input->post('oldLineQrCode');
		 $param['logo_head']=$this->input->post('oldLogo');
		 //---------file bank_qr_code----------------------// 
		
		 $param['dbPath'] = 'uploadfile/'.date('Y')."/";
		 
		
		 if (isset($_FILES["bank_qr_code"]["name"])) {

			$config['encrypt_name'] = TRUE;

			$config['upload_path'] = $this->find_path_upload_currentYear();;

			$config['allowed_types'] = 'gif|jpeg|jpg|png';

			$config['max_size']     = '0';

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('bank_qr_code')) {

				//$error = array('error' => $this->upload->display_errors());

				//var_dump($error);

			} else {
			    $bank_qr_code = $this->upload->data('file_name');
			    $param['bank_qr_code'] = $param['dbPath'].$bank_qr_code;
				
				@unlink($this->input->post('oldBankQrCode'));
				
			}
		}else{
			  $param['bank_qr_code']=$this->input->post('oldBankQrCode');
		}
		//---------line_id_qrcode oldLineQrCode----------------------// 
		 if (isset($_FILES["line_id_qrcode"]["name"])) {

			$config['encrypt_name'] = TRUE;

			$config['upload_path'] = $this->find_path_upload_currentYear();;

			$config['allowed_types'] = 'gif|jpeg|jpg|png';

			$config['max_size']     = '0';

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('line_id_qrcode')) {

				//$error = array('error' => $this->upload->display_errors());

				//var_dump($error);

			} else {
				$line_id_qrcode = $this->upload->data('file_name');
			    $param['line_id_qrcode'] = $param['dbPath'].$line_id_qrcode;
				
			    //$param['line_id_qrcode'] = $this->upload->data('file_name');
				@unlink($this->input->post('oldLineQrCode'));
				
			}
		}else{
			  $param['line_id_qrcode']=$this->input->post('oldLineQrCode');
		}
		//---------logo_head oldLogo----------------------// 
		 if (isset($_FILES["logo_head"]["name"])) {

			$config['encrypt_name'] = TRUE;

			$config['upload_path'] = $this->find_path_upload_currentYear();;

			$config['allowed_types'] = 'gif|jpeg|jpg|png';

			$config['max_size']     = '0';

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('logo_head')) {

				//$error = array('error' => $this->upload->display_errors());

				//var_dump($error);

			} else {
				$logo_head = $this->upload->data('file_name');
			    $param['logo_head'] = $param['dbPath'].$logo_head;
				
			    //$param['logo_head'] = $this->upload->data('file_name');
				@unlink($this->input->post('oldLogo'));
				
			}
		}else{
			  $param['logo_head']=$this->input->post('oldLogo');
		}
		
		$resultData = $this->setting_model->updateAgent($param);
		echo json_encode($resultData);
	}
	//------- หัวกระดาษ ใบรับเงิน และใบแจ้งหนี้ ---> เพิ่มข้อมูล --------------

	public function setting_add_header($dataID=NULL){	
		
		if(!isset($dataID)){
			$data['header_name']='';
			$data['tax_no']='';
			$data['address']='';
			$data['telephone_no']='';
			$data['line_id']='';
			$data['bank_name']='';
			$data['line_id_qrcode']='';
			$data['logo_head']='';
			$data['step_stransfer']='';
			$data['bank_branch']='';
			$data['bank_acc_number']='';
			$data['bank_acc_name']='';
			$data['data_status']='x';
			$data['bank_qr_code']='';
			$data['dataID']='';
		}else{
			$resultData=$this->setting_model->getHeaderData($dataID);
			foreach($resultData AS $head);
			$data['header_name']=$head->header_name;
			$data['tax_no']=$head->tax_no;
			$data['address']=$head->address;
			$data['telephone_no']=$head->telephone_no;
			$data['line_id']=$head->line_id;
			$data['bank_name']=$head->bank_name;
			$data['line_id_qrcode']=$head->line_id_qrcode;
			$data['logo_head']=$head->logo_head;
			$data['step_stransfer']=$head->step_stransfer;
			$data['bank_branch']=$head->bank_branch;
			$data['bank_acc_number']=$head->bank_acc_number;
			$data['bank_acc_name']=$head->bank_acc_name;
			$data['data_status']=$head->data_status;
			$data['bank_qr_code']=$head->bank_qr_code;	
			$data['dataID']=$dataID;
		}
		$this->load->view('setting_add_header',$data);	
		$this->load->view('setting_add_header_script');	
	}

	//------- การแจ้งเตือนหมดอายุ --------------

	//------- พนักงาน --------------
	public function AddUser(){
		// dataID:dataID,name_sname:name_sname,user_name:user_name,telephone_no:telephone_no,password:password,user_branch:user_branch,data_status:data_status
		$param['dataID'] = $this->input->post('dataID');
		$param['name_sname'] = $this->input->post('name_sname');
		$param['user_name'] = $this->input->post('user_name');
		$param['telephone_no'] = $this->input->post('telephone_no');
		$param['password'] = $this->input->post('password');
		$param['user_branch'] = $this->input->post('user_branch');
		$param['data_status'] = $this->input->post('data_status');
		
		$resultData = $this->setting_model->AddUser($param);
		echo json_encode($resultData);
		
	}
	

	public function setting_employee(){		

		$data['page'] = "listPage";

		$this->load->view('setting_employee');	

		$this->load->view('setting_employee_script',$data);	

	}

    public function listEmp(){
		$dataStatus = '1';
		$data['listEm']=$this->setting_model->listEmp($dataStatus);
		$this->load->view('setting_employee_list',$data);
	}

	

	public function setting_add_employee($dataID=NULL){	

		$data['page'] = "addPage";

		if(!isset($dataID)){

			$data['dataID']='x';
			$data['name_sname']='';
			$data['telephone_no']='';
			$data['user_branch']='';
			$data['user_name']='';
			$data['password']='';
			$data['data_status']='x';
			$data['disUserName']='';
			
		}else{
			$resultData = $this->setting_model->employeeDetail($dataID);
			foreach($resultData AS $em);
			$data['dataID']=$dataID;
			$data['name_sname'] = $em->name_sname;
			$data['telephone_no'] =  $em->telephone_no;
			$data['user_branch'] = $em->user_branch;
			$data['user_name'] = $em->user_name;;
			$data['password'] =$em->password;
			$data['data_status'] = $em->data_status;
			$data['disUserName']='readonly';

		}

		$this->load->view('setting_add_employee',$data);

		$this->load->view('setting_employee_script',$data);	

	}



	//------- กำหนดสิทธิ์การใช้งาน -------------:
	
	public function onoffMenu(){
		$data['field'] = $this->input->post('field');
		$data['theVal'] = $this->input->post('theVal');
		$data['uerID'] = $this->input->post('uerID');
		
		$resultData=$this->setting_model->onoffMenu($data);
		echo json_encode($resultData);
	}


	
	//-------------------------------------------
	public function setting_permission($userID=NULL){				
		if(!isset($userID)){
			redirect(base_url('/Setting/setting_employee'), 'refresh');
		}

		$data['userID']=$userID;
		$data['userData']=$this->setting_model->employeeDetail($data['userID']);
		foreach($data['userData'] AS $user);
		$data['userName']=$user->name_sname;
		$data['userID']=$user->id;
		
		// SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'supcharoen_data' AND TABLE_NAME = 'tbl_user_data' LIMIT 9,51;
		$data['menuArray']=array();
		
		$data['menuArray'] = array('setting'=>'ตั้งค่าพื้นฐาน_main',
		'setting_company_insurance'=>'ประเภทกรมธรรม์' ,
		'setting_policy'=>'ประเภทกรมธรรม์',
		'setting_agent'=>'ตัวแทน',
		'setting_code_list'=>'รายชื่อโค้ด',
		'setting_car_brand'=>'ยี่ห้อรถ',
		'setting_header'=>'หัวกระดาษ ใบรับเงิน และใบแจ้งหนี้',
		'setting_bookbank' => 'สมุดบัญชีธนาคาร',						   
		'setting_deduct_percent' => 'หัก % พ.ร.บ',						   
		'setting_employee'=>'พนักงาน',
		'setting_permission'=>'กำหนดสิทธิ์การใช้งาน',
		'permission18'=>'',
		'inspection'=>'รายงาน ตรอ._main',
		'inspection_list'=>'บัญชีรายวัน',
		//'inspection_list'=>'รายงานการตรวจสภาพรถรายวัน',
		'inspection_information'=> 'รายงานตรวจสภาพรถผ่านระบบสารสนเทศ',
		'inspection_act'=> 'รายงานตรวจสภาพรถส่ง พ.ร.บ.',
		'report_expenses' => 'รายงานค่าใช้จ่าย',
		'report_transfer' => 'รายงานโอนเงิน',
		'report_act_tax_expire' => 'รายงานพรบ/ภาษีหมดอายุ',
		'carcheck_summarize_daily_report' => 'สรุปรายวันใบส่งเงิน ต.ร.อ.',
		'input_car_data' => 'วัน เดือน ปี จดทะเบียน',
		'report_other'=> 'รายงานประกันเบ็ดเตล็ด_main',
		'report_other_daily_data'=>'รายงานข้อมูลรายวัน',
		'report_other_pay_installment_1'=> 'รายงานชำระค่างวด' ,
		'report_other_receipt'=> '',
		'report_other_agent_commission' => '',
		'report_other_accrual_customer'=> '',
		'report_other_warning_data'=> '',
		'report_other_income_agent' => 'รายงานรายได้โค้ด',
		'permission37' =>'',
		'report_car' => 'รายงานประกันรถยนต์_main',
		'report_other_pay_installment' => 'รายงานค้างชำระ',
		'report_ins_delete' => 'รายงานลบข้อมูล',
		'report_car_receipt' => 'รายงานรายรับ',
		'report_car_agent_commission' => 'รายการค่าคอมมิชชั่นตัวแทน' ,
		'report_car_accrual_customer'=>'รายงานลูกค้าค้างจ่าย' , 
		'report_car_warning_data' => 'รายงานแจ้งเตือนใกล้หมดอายุ',
		'report_car_policy_cancle' => 'ยกเลิกประกันภัย',
		'report_car_income_agent' =>'รายงานรายได้โค้ด' ,
		'additional_income_report' => 'รายงานรายได้ส่วนเพิ่ม',								   
		'report_car_invoice_agent' =>'รายงานใบวางบิลตัวแทน' ,
		'report_car_payment_insurance' =>'รายงานใบสำคัญจ่าย' ,
		'insurance_misce' =>'ประกันเบ็ดเตล็ด_main' ,
		'insurance_fire' =>'ประกันภัยบ้าน' ,
		'insurance_transport' =>'ประกันภัยขนส่ง' ,
		'insurance_travel'=> 'ประกันท่องเที่ยว ' ,
		'insurance_pa'=> 'ประกันภัยอุบัติเหตุ (PA) ' ,
		'permission54'=>'',
		//'report_code_net'=>'รายงานเบี้ยสุทธิโค้ด',
		'report_expire_ins'=>'รายงานหมดอายุ',
		'insurance_main' => ' ประกันรถยนต์/พ.ร.บ./ต.ร.อ._main',
		'insurance_billing' => 'ใบวางบิล',
		'act_dashboard'=> 'หน้าแรก ต.ร.อ.',
		'insurance_dashboard'=> 'หน้าแรกประกันภัย',
		'act'=> 'พ.ร.บ.',
		'tax' => 'ข้อมูลภาษี',
		'insurance' => 'ภาคสมัครใจ',
		'car_check' => 'ตรวจสภาพรถ',
		'car_other' => 'ค่าบริการ / ค่าอื่นๆ',
		'payment' => 'การชำระเงิน',
		'mailing_address' => 'ที่อยู่ส่งเอกสาร',
		'summary_print_order' => 'สรุปรายการ/สั่งพิมพ์',
		'ins_application_form' => 'ใบคำขอประกัน',
		'insurance_cover' => 'ใบปะหน้าประกัน',
		'cover_inspection' => 'ใบปะหน้า ตรอ.',
		'invoice' => 'ใบแจ้งหนี้',
		'receipt' => 'ใบรับเงิน',
		'control_insurance_work' => 'ทะเบียนคุมงานประกันทั้งหมด',
		'expenses_add' => 'ค่าใช้จ่าย',
		'car_transport' => 'งานขนส่ง',
        'car_check_search' => 'ค้นหาลูกค้าตรอ._main',								   
        'car_check_search_page' => 'ค้นหาลูกค้าตรอ.',
		'money_recipe_main' => 'บันทึกชำระเงิน_main',								   
		'record_receipt' => 'บันทึกชำระเงิน',								   
		'record_receipt_report' => 'รายงานบันทึกชำระเงิน'								   
		);
		
		$this->load->view('setting_permission',$data);	
 		$this->load->view('setting_permission_script',$data);	

	}


	//------- เปลี่ยนรหัสผ่าน -------------







	public function change_pass(){				







		$this->load->view('change_pass');	



		$this->load->view('change_pass_script');	







	}







	 public function DoupdatePass(){



		$newPass = $this->input->post('Pass');



		$result = $this->user_model->DoupdatePassWord($newPass);



		echo json_encode($result);



	 }

}







	