<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Insurance_car2 extends CI_Controller {

	function __construct()

    {

        parent::__construct();

        //$this->load->model('User_model');
        //$this->load->model('Control_model');
        //$this->load->model('Download_model');

		$this->load->model('user_model');
        $this->load->model('setting_model');
        $this->load->model('insurance_model');
        $this->load->model('search_model');
		
		if($this->session->userdata('user_id')==''){
			redirect(base_url().'login', 'refresh');
		}
    }
	
	public function index(){
		
	}
	
		
	public function num2wordsThai($amount_number)
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
    $baht = $this->ReadNumber ($number);
    if ($baht != "")
        $ret .= $baht . "บาท";
    
    $satang = $this->ReadNumber($fraction);
    if ($satang != "")
        $ret .=  $satang . "สตางค์";
    else 
        $ret .= "ถ้วน";
    return $ret;
   }

public function ReadNumber($number)
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
	
	function getThaiDate($date){
		$monthNameArray=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
		
		if(($date!='0000-00-00')&&($date!='')){
		 $dateArray = explode("-",$date);
		 $dateArray[0] = $dateArray[0]+543;
		 $dateArray[2] = sprintf("%01d", $dateArray[2]);
		  $showDate =  $dateArray[2]." ". $monthNameArray[$dateArray[1]]." ".$dateArray[0];
		   
		 }else{
			$showDate ='';	
		 }
		return $showDate;
		
	}
	
	//--------------------------------------------------- dataID
	public function updateDateControlBoard(){
		$data=array();
		$data=$this->input->post();
		$resultData = $this->insurance_model->updateDateControlBoard($data);
		echo json_encode($resultData);
	}
	//--------------------------------------------------- dataID
	public function deleteDedug(){
		$data=array();
		$dataID=$this->input->post('dataID');
		$resultData = $this->insurance_model->deleteDedug($dataID);
		echo json_encode($resultData);
	}
	//--------------------------------------------------- 
	public function addDedug(){
		$data=array();
		$data=$this->input->post();
		$resultData = $this->insurance_model->addDedug($data);
		echo json_encode($resultData);
	}
	//--------------------------------------------------- 
	public function OpenBillingDedugForm(){
		$data=array();
		$data['keygroup']=$this->input->post('keygroup');
		$data['billID']=$this->input->post('billID');
		$data['actType']=$this->input->post('actType');
		$this->load->view('insurance_dedug_form',$data);
	}
	//---------------------------------------------------
	public function getCompanyData(){
		$dataID=$this->input->post('dataID');
		$BillData=$this->setting_model->getCompayData($dataID);
		echo $BillData['bank_name']." ".$BillData['bank_acc_branch']." ".$BillData['bank_acc_no']." ".$BillData['bank_acc_name'];
	}
	//---------------------------------------------------
	public function renew_customer_by_id(){
		$data=$this->input->post();
		$resultData = $this->insurance_model->renew_customer_by_id($data);
		echo json_encode($resultData);
	}
	//--------------------------------------------------resultData
	public function showTextPayment(){
		$data=$this->input->post();
		$resultData = $this->insurance_model->showTextPayment($data);
		if($resultData['countInstallment']==0){
			 echo "<strong>สด</strong>";
		}else if($resultData['countInstallment']> 0){
			echo "<strong>ผ่อน ".$resultData['countInstallment']." งวด</strong><br>";
			echo "<table width='100%'><tr>";
			foreach($resultData['getData'] AS $GetData){
				$tdClass='';
				if($GetData->is_payment=='1'){ $tdClass="text-success"; }
				echo "<td class='".$tdClass."'>";
				echo "&nbsp;งวด".$GetData->period."&nbsp;:&nbsp;&nbsp; ".number_format($GetData->amount,2);
				echo "</td>";
			}
			echo "<tr></table>";
			
		}
		
	}
	//--------------------------------------------------
	public function get_control_monthly(){
		$data=array();
		$data=$this->input->post();
		$data['getData']=$this->insurance_model->get_control_monthly($data);
		
		$dataStatus =1;$use_branch=1;
		$data['listInsCorp'] = $this->setting_model->listCompany($dataStatus,$use_branch); 
		
		$this->load->view('get_control_monthly_data',$data);
	}
	//--------------------------------------------------
	public function agent_control_dashboard(){
		$data=array();
		$data['currYear'] = date("Y");
		$data['startYear'] = 2022;
		$data['rangeYear']  = $data['currYear'] - $data['startYear'];
		$data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
		
		$this->load->view('agent_control_dashboard',$data);
		$this->load->view('agent_control_dashboard_script',$data);
		
	}
	//--------------------------------------------------
	public function ins_control_dashboard(){
		$data=array();
		$data['currYear'] = date("Y");
		$data['startYear'] = 2022;
		$data['rangeYear']  = $data['currYear'] - $data['startYear'];
		$data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
		
		
		
		$this->load->view('ins_control_dashboard',$data);
		$this->load->view('ins_control_dashboard_script',$data);
		
	}
	//--------------------------------------------------
	public function openPopUpForm(){
		$data=array();
		$data=$this->input->post();
		/*
		 $dataStatus ='1';
		  $data['listCompany']=$this->setting_model->listCompany($dataStatus);
		  $agentStatus = '1';
		  $data['listAgent'] = $this->setting_model->listAgent($agentStatus); 
		  $data['listCode'] = $this->setting_model->listCode($dataStatus); 
		*/
		$dataStatus ='1';
		if($data['formType']=='code'){
			 $data['listCode'] = $this->setting_model->listCode($dataStatus); 
			 $this->load->view('list_code_popup',$data);
		}else if($data['formType']=='agent'){ 
			$data['listAgent'] = $this->setting_model->listAgent($dataStatus); 
			$this->load->view('list_code_popup',$data);
		}
		
	}
	//-------------------------------------------------refresh list in pop-up
	public function refreshAgentCodePopup(){
		 $formType = $this->input->post('formType');
		 $dataStatus =1;
		 if($formType=='code'){
			 $data['listCode'] = $this->setting_model->listCode($dataStatus); 
			 //$this->load->view('list_code_popup.php',$data);
			?>
				<table cellpadding="5" cellspacing="0" class="border" width="100%">
					<tr>
						<td>#</td>
						<td width="602">ชื่อโค้ด.</td>
						<td width="162">สถานะใช้งาน</td>
					</tr>
					<?php $n=1; foreach($data['listCode'] AS $code){?>
					<tr>
					  <td width="17"><?php echo $n?></td>
					  <td><?php echo $code->conde_name?></td>
					  <td>
						 <select class="form-control form-control-sm" onChange="updateCodeStatus('<?php echo $code->id?>',this.value,'<?php echo htmlspecialchars($code->conde_name)?>')">
							<option value="0">ยกเลิกใช้งาน</option> 
							<option value="1" <?php if($code->code_status=='1'){ echo "selected";}?> >ใช้งาน</option> 
						 </select>	
					  </td>
				  </tr>
				  <?php $n++; }?>
				</table>

			<?php
		 
		 
		 
		 }else if($formType=='agent'){ 
			$data['listAgent'] = $this->setting_model->listAgent($dataStatus); 
			//$this->load->view('list_code_popup.php',$data);
			?>
<table cellpadding="5" cellspacing="0" class="border" width="100%">
	<tr>
		<td>#</td>
		<td width="187">ชื่อตัวแทน</td>
		<td width="144">โทรศัพท์</td>
		<td width="137">ค่าคอม(%)</td>
		<td width="135">ภาษี(%)</td>
		<td width="131">สถานะใช้งาน</td>
	</tr>
	<?php $n=1; foreach($data['listAgent'] AS $agent){?>
	<tr>
	  <td width="17"><?php echo $n?></td>
	  <td><?php echo $agent->agent_name?></td>
	  <td><?php echo $agent->telephone?></td>
	  <td><?php echo $agent->agent_com?></td>
	  <td><?php echo $agent->agent_tax?></td>
	  <td>
		 <select class="form-control form-control-sm" onChange="updateAgentStatus('<?php echo $agent->id?>',this.value,'<?php echo htmlspecialchars($agent->agent_name)?>')">
		 	<option value="0">ยกเลิกใช้งาน</option> 
		 	<option value="1" <?php if($agent->agent_status=='1'){ echo "selected";}?> >ใช้งาน</option> 
		 </select>	
	  </td>
  </tr>
  <?php $n++; }?>
</table>
			<?php
		}
	}

	//--------------------------------------------------
	public function reloadCodeList(){
		 
		  $dataStatus = '1';
		  $data['listAgent'] = $this->setting_model->listCode($dataStatus); 
		  echo ' <option value="x">--เลือกโค้ด--</option>';
		  foreach($data['listAgent'] AS $data){
			 echo "<option value ='".$data->id."' >".$data->conde_name."</option>";
		 }
	
	}
	//--------------------------------------------------
	public function hide_anticipate_customer(){
		$data=array();
		$data=$this->input->post();
		$resultData = $this->insurance_model->hide_anticipate_customer($data);
		echo json_encode($resultData);
	}
	//--------------------------------------------------
	public function list_anticipate_customer(){
	   $status='1';
	   $data['resultData'] = $this->insurance_model->list_anticipate_customer($status);
	   $this->load->view('anticipate_customer_list_data',$data);
	}
	//--------------------------------------------------
	public function add_anticipate_customer(){
		$data=array();
		$data=$this->input->post();
		//print_r($data);
		$resultData = $this->insurance_model->add_anticipate_customer($data);
		echo json_encode($resultData);
	}
	//--------------------------------------------------updateAnticipateRemark')',{ dataID:dataID, changeValue
	public function updateAnticipateRemark(){
		$data=$this->input->post();
		$resultData = $this->insurance_model->updateAnticipateRemark($data);
		echo json_encode($resultData);
	}
	//--------------------------------------------------
	public function anticipate_customer(){
		$data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
		$data['listCarType'] = $this->insurance_model->listCarType();  
		$data['ProvinceList'] = $this->setting_model->ProvinceList(); 
		$brand_status ='1';
		$data['listCarBrand'] = $this->setting_model->listCarBrand($brand_status);
		$this->load->view('anticipate_customer_list',$data);
		$this->load->view('anticipate_customer_script',$data);
	}
	//--------------------------------------------------
	public function printBilling(){
		 $data=array();
		
		 $data=$this->input->post();
		 //print_r($data);
		 $data['SqlData']=$this->insurance_model->listBilling($data);
		 // company_name,agent_name:agent_name,selectDateName:selectDateName,selectMonthName:selectMonthName,selectYearThai:selectYearThai 
		  //-sum all amt insurane_amount act_amount
		 $data['allSum']=0;
		 foreach($data['SqlData']['resultData'] AS $sumData){
			 $data['allSum'] = $data['allSum']+$sumData->insurane_amount+$sumData->act_amount;		 
		 } 
		 
		 $data['thainum']=$this->num2wordsThai($data['allSum']);
		  
		
		 $data['company_name']=$this->input->post('company_name');
		 $data['agent_name']=$this->input->post('agent_name');
		 $data['selectDateName']=$this->input->post('selectDateName');
		 $data['selectMonthName']=$this->input->post('selectMonthName');
		 $data['selectYearThai']=$this->input->post('selectYearThai');
		 
		 $this->load->view('print_billing',$data);
	}
	
	//--------------------------------------------------
	public function updateSelectTobill(){
		 $data=array();
		 $data=$this->input->post();
		 $resultData=$this->insurance_model->updateSelectTobill($data); 
		 echo json_encode($resultData);
	}
	//--------------------------------------------------
	public function updateBillAmt(){
		//dataID:dataID,fname:fname,chVal:chVal
		 $data=array();
		 $data=$this->input->post();
		 $resultData=$this->insurance_model->updateBillAmt($data); 
		 echo json_encode($resultData);
	}
	//--------------------------------------------------
	public function DeleteFromBill(){
		 $dataID=$this->input->post('dataID');
		 $resultData=$this->insurance_model->DeleteFromBill($dataID);
		 echo json_encode($resultData);
	}
	//--------------------------------------------------
	public function listBilling(){
		 $data=array();
		 $data=$this->input->post();
		 $data['data']=$this->insurance_model->listBilling($data);
		 $this->load->view('list_billing',$data);
	}
	//--------------------------------------------------	
	public function DeleteControl(){
		$data=array();
		$data=$this->input->post();
		$resultData=$this->insurance_model->DeleteControl($data);
		echo json_encode($resultData);
	}  
	//--------------------------------------------------
	public function UpdateBoardControl(){
		$data=array();
		$data=$this->input->post();
		$resultData=$this->insurance_model->UpdateBoardControl($data);
		echo json_encode($resultData);
	}  
	//--------------------------------------------------
	public function addToBControl(){
		$data=array();
		$data=$this->input->post();
		$resultData=$this->insurance_model->addToBControlboard($data);
		echo json_encode($resultData);
		
	}
	//--------------------------------------------------updateNetBalance($insurance_total_net,$CtrlID)
	public function updateNetBalance(){ 
		//changeValue:changeValue ,CtrlID:CtrlID 
		$data=$this->input->post();
		$resultData = $this->insurance_model->updateNetBalance($data['field'],$data['changeValue'],$data['CtrlID']); 
		echo json_encode($resultData);
	} 
	//--------------------------------------------------
	public function listcontrolByKey(){
		$data=$this->input->post();
		$data['data']=$this->insurance_model->listcontrolByKey($data);
		$this->load->view('bill_control_data',$data);
	}
	//--------------------------------------------------
	public function saveBilling(){
		$data=$this->input->post();
		$resultData = $this->insurance_model->saveBilling($data);
		echo json_encode($resultData);
	}
	//-------------------------------------------------- hiddenAllSum
	public function DoPrintBilling(){
		$data=array();
		$data=$this->input->post();
		$keygroup=$data['keygroup'];
		$data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
		  $data['currMonth']=date('m');
		
		$data['monthName'] = $data['monthArray'][$data['control_month']];
		$data['YearhName'] = $data['control_year']+543;
		
		 $data['data']=$this->insurance_model->listcontrolByKey($data);
		
		$data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");;
		$data['startday']=date("d");
		$data['startYear']=2022;
		$data['currYear'] = date("Y");
		$data['rangeYear']=($data['currYear']-$data['startYear'])+1;
		$data['currMonth']=date('m'); 
		
		
		//----------get data billing-------//
		$data['BillData'] = $this->insurance_model->getBillData($keygroup);
		if(isset($data['BillData']['bill_date'])){
			$data['startday'] =$data['BillData']['bill_date'];
		}	
		if(isset($data['BillData']['select_month_bill'])){
			$data['currMonth'] =$data['BillData']['select_month_bill'];
		}		
		if(isset($data['BillData']['select_year_bill'])){
			$data['currYear'] =$data['BillData']['select_year_bill'];
		}	
		
		
		$dateBillStart = $this->getThaiDate($data['BillData']['period_bill_start']);
		$dateBillEnd = $this->getThaiDate($data['BillData']['period_bill_end']);
		
		//$data['BillPeriod']=$dateBillStart." ถึง ".$dateBillEnd;
		$data['BillPeriod']=$this->getThaiDate($data['BillData']['billDate']);
		//---------company_id code_id
		//------get dedug
		$data['getBillDedugData'] = $this->insurance_model->getBillDedugData($keygroup);
		
		$this->load->view('bill_data_from_control_print',$data);
		
	}
	//--------------------------------------------------
	public function createBlling(){
		$data=array();
		$data=$this->input->post();
		$keygroup=$data['keygroup'];
		$data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
		  $data['currMonth']=date('m');
		
		$data['monthName'] = $data['monthArray'][$data['control_month']];
		$data['YearhName'] = $data['control_year']+543;
		
		 $data['data']=$this->insurance_model->listcontrolByKey($data);
		
		 $dataStatus ='1';
		 $data['listCompany']=$this->setting_model->listCompany($dataStatus);
		 $agentStatus = '1';
		 // $data['listAgent'] = $this->setting_model->listAgent($agentStatus); 
		 $data['listCode'] = $this->setting_model->listCode($dataStatus); 
		
		$data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");;
		$data['startday']=date("d");
		$data['startYear']=2022;
		$data['currYear'] = date("Y");
		$data['rangeYear']=($data['currYear']-$data['startYear'])+1;
		$data['currMonth']=date('m'); 
		
		
		//----------get data billing-------// getBillDedugData
		$data['BillData'] = $this->insurance_model->getBillData($keygroup);
		if(isset($data['BillData']['bill_date'])){
			$data['startday'] =$data['BillData']['bill_date'];
		}	
		if(isset($data['BillData']['select_month_bill'])){
			$data['currMonth'] =$data['BillData']['select_month_bill'];
		}		
		if(isset($data['BillData']['select_year_bill'])){
			$data['currYear'] =$data['BillData']['select_year_bill'];
		}	
		
		if(isset($data['BillData']['period_bill_start'])&&(isset($data['BillData']['period_bill_end']))){
			$dateBillStart = $this->getThaiDate($data['BillData']['period_bill_start']);
			$dateBillEnd = $this->getThaiDate($data['BillData']['period_bill_end']);
			$data['BillPeriod']=$dateBillStart." ถึง ".$dateBillEnd;
		}else{
			$data['BillPeriod']="";
		}
		
		
		//------get dedug
		$data['getBillDedugData'] = $this->insurance_model->getBillDedugData($keygroup);
		
		$this->load->view('bill_data_from_control',$data);
	}
	//--------------------------------------------------
	public function printControlBoardByKey(){
		$data=array();
		$data=$this->input->post();
		
		$data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม","x"=>"ทุกเดือน");
		  $data['currMonth']=date('m');
		
		$data['monthName'] = $data['monthArray'][$data['control_month']];
		$data['YearhName'] = $data['control_year']+543;
		
		
		$data['data']=$this->insurance_model->listcontrolByKey($data);
		
		$data['monthName'] = $data['monthArray'][$data['data']['control_month']];
		$data['YearhName'] = $data['data']['control_year']+543;
		
		$this->load->view('bill_control_data_print',$data);
	}
	//--------------------------------------------------
	public function previewControl(){
			
		   $data=array();
		   $data=$this->input->post();
		   $data['resultSelect'];
		   // $resultData=$this->insurance_model->addToBilling($data);
		   // echo json_encode($resultData);
		  
		}
	//--------------------------------------------------
	public function reloadCompanyList(){
		 $dataStatus ='1';
		 $data['listCompany']=$this->setting_model->listCompany($dataStatus);
		     echo ' <option value="x">--เลือกบริษัท--</option>';
		 foreach($data['listCompany'] AS $data){
			 echo "<option value ='".$data->id."' >".$data->company_full_name."</option>";
		 }
	}
	//--------------------------------------------------
	public function reloadAgentList(){
		 
		  $agentStatus = '1';
		  $data['listAgent'] = $this->setting_model->listAgent($agentStatus); 
		  echo ' <option value="x">--เลือกตัวแทน--</option>';
		  foreach($data['listAgent'] AS $data){
			 echo "<option value ='".$data->id."' >".$data->agent_name."</option>";
		 }
	}
	//--------------------------------------------------
	public function showBillSearchForm(){
		  $data=array();
		  $data['currentDate'] = date("d");
		  $data['currentMonth'] = date("m");
		  $data['currentYear'] = date("Y");
		  $data['startYear'] = 2022;
		  $data['rangeYear']  = $data['currentYear'] - $data['startYear'];
		  $dataStatus =1;
		  $data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
		  $data['currMonth']=date('m');
		 $this->load->view('billing_search_cust',$data);
	}
	//--------------------------------------------------
	
	//--------------------------------------------------
	public function goToBillingPage(){
		$valuesArray=$this->input->post('valuesArray');
		$idArray = array();
		foreach($valuesArray AS $key=>$val){
			//echo 'key->'.$key.' val->'.$val."<br>";
			$idArray[] = $val;
		}
	   // print_r($idArray);
		$idArray = implode(",",$idArray);
		$data['data'] = $this->search_model->getbillingSelect($idArray);
		$this->load->view('bliiling_input_step1',$data);	
		
	}
	//--------------------------------------------------
	public function searchCustForbilling(){
		 $data=array();
		 $data=$this->input->post();
		 $data['data'] = $this->search_model->searchCustForbilling($data);
		 $this->load->view('search_cust_billing_table',$data);
	}
	
}