<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Inspection extends CI_Controller {

	
		function __construct()

    {

        parent::__construct();

        //$this->load->model('User_model');
        //$this->load->model('Control_model');
        //$this->load->model('Download_model');

		$this->load->model('user_model');
        $this->load->model('setting_model');
        $this->load->model('insurance_model');
        $this->load->model('inspection_model');
		
		if($this->session->userdata('user_id')==''){
			redirect(base_url().'login', 'refresh');
		}
    }
	//---------------------------------------
	public function printCarcheckWork(){
		$data=array();
		$data = $this->input->post();
		$data['getResultData']= $this->inspection_model->loadCarcheckCover($data);
		$this->load->view('car_check_cover',$data);
	}
	//---------------------------------------
	public function updateWorkData(){
		$data=array();
		$data = $this->input->post();
		$resultData = $this->inspection_model->updateWorkData($data);
		echo json_encode($resultData);
	}	
	//---------------------------------------
	public function updateCarData(){
		$data=array();
		$data = $this->input->post();
		$resultData = $this->inspection_model->updateCarData($data);
		echo json_encode($resultData);
	}
	//---------------------------------------
	public function loadcareRegister(){
		$data=array();
		$data = $this->input->post();
		//print_r($data);
		$data['monthArray']=array("01"=>"ม.ค.","02"=>"ก.พ.","03"=>"มี.ค.","04"=>"เม.ย.", "05"=>"พ.ค.","06"=>"มิ.ย.","07"=>"ก.ค.","08"=>"ส.ค.","09"=>"ก.ย.","10"=>"ต.ค.","11"=>"พ.ย.","12"=>"ธ.ค.");
		$data['currMonth']=date('m');
		
		$brand_status ='1';
		$data['listCarBrand'] = $this->setting_model->listCarBrand($brand_status);
		$data['listCarType'] = $this->insurance_model->listCarType();  
		$data['listCarPremium'] = $this->inspection_model->listCarPremium();  
		$data['GetData'] = $this->inspection_model->loadcareRegister($data);
		$this->load->view('load_car_regist',$data);
	}	
	//---------------------------------------
	public function input_car_data(){
		$data=array();
		$data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");;
		$data['startday']="01";
		$data['currentDate']=date("d");
		$data['startYear']=2022;
		$data['currYear'] = date("Y");
		$data['rangeYear']=($data['currYear']-$data['startYear'])+1;
		$data['currMonth']=date('m'); 
		
		$this->load->view('input_car_data',$data);
		$this->load->view('input_car_data_script');
	}
	//---------------------------------------
	public function summarize_daily_report(){
		$data=array();
		$data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");;
		$data['startday']="01";
		$data['currentDate']=date("d");
		$data['startYear']=2022;
		$data['currYear'] = date("Y");
		$data['rangeYear']=($data['currYear']-$data['startYear'])+1;
		$data['currMonth']=date('m'); 
		
		$this->load->view('summarize_daily_report',$data);
		$this->load->view('summarize_daily_report_script');
	}
	//---------------------------------------
	public function loadSummaryDaily(){
		$data=array();
		$data = $this->input->post();
		$data['GetdataType']="daily";
		$data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");;
		$data['select_day']=$this->input->post('select_day');
		$data['select_day_end']=$this->input->post('select_day_end');
		$data['select_month']=$this->input->post('select_month');
		$data['select_month_end']=$this->input->post('select_month_end');
		$data['select_year']=$this->input->post('select_year');
		$data['select_month_name']=$this->input->post('select_month_name');
		$data['select_year_name']=$this->input->post('select_year_name');
		$data['getData']=$this->insurance_model->loadActDaily($data);  //select_month,select_year 
		$data['lastDate']=date("t");
		
		///-----------date time month------------------------
		if(($data['select_day']==$data['select_day_end'])&&($data['select_month']==$data['select_month_end'])){
			$data['txtDay']='วันที่ '.$data['select_day']." ".$data['monthArray'][$data['select_month']]." พ.ศ. ".($data['select_year']+543);
		}else{
			$data['txtDay']='วันที่ '.$data['select_day']." ".$data['monthArray'][$data['select_month']]." ถึง ".$data['select_day_end'].' '.$data['monthArray'][$data['select_month_end']].' พ.ศ. '.($data['select_year']+543);
		}
		
		if($data['select_day']<10){ $x1 = "0".$data['select_day'];}else{ $x1=$data['select_day'];}
		if($data['select_day_end']<10){ $x2 = "0".$data['select_day_end'];}else{ $x2=$data['select_day_end'];}
		//echo $dateStart."---".$dateEnd; 
		$data['dateStart'] = $data['select_year']."-".$data['select_month']."-".$data['select_day'];
		$data['dateEnd'] = $data['select_year']."-".$data['select_month_end']."-".$data['select_day_end'];
		
		$startDate = new DateTime($data['dateStart']);
		$endDate = new DateTime($data['dateEnd']);
		$interval = $startDate->diff($endDate);

		$monthsDiff = $interval->y * 12 + $interval->m;
		
		// Get the number of days from the interval
		$data['DateDiff'] = $interval->days+1;
		$data['MonthDiff'] = $monthsDiff;

		///-----------------------------------
		
		
		
		//print_r($data['getData']);
		$this->load->view('summarize_daily_data',$data);
	}
	//---------------------------------------
		
	public function inspection_list(){
		$data=array();
		$CD=date("Y-m-d");
		$data['curentDate']=$this->insurance_model->translateDateToThai($CD);
		
		$data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");;
		$data['startday']=date("d");
		$data['startYear']=2022;
		$data['currYear'] = date("Y");
		$data['rangeYear']=($data['currYear']-$data['startYear'])+1;
		$data['currMonth']=date('m');  
		
		
		$this->load->view('inspection_list',$data);
		$this->load->view('inspection_list_script');
	}
	//-----------------------------------------------date_work
	public function load_inspection_report(){
		//$date_work = $this->input->post('date_work');
		//echo $date_work;
		$data = $this->input->post();
		$data['getData'] = $this->insurance_model->load_inspection_daily_report($data);
		$this->load->view('inspection_load_report',$data);
	}  
	//------------------------------------------------
	public function inspection_remittance_print($day,$month,$year){
		$data['workDate'] = ($year-543)."-".$month."-".$day;
		
		$data['getData'] = $this->insurance_model->inspect_summary($data);
		
		$this->load->view('inspection_remittance_print',$data);
	}
		
	public function inspection_daily_print(){
		$this->load->view('inspection_daily_print');
	}		
		
	public function updateCarcheckTime(){  //dataID:dataID,upType,changeVal,hr:hr,min:min,sec:sec
		$data['dataID']=$this->input->post('dataID');
		$data['upType']=$this->input->post('upType');
		$data['changeVal']=$this->input->post('hr').":".$this->input->post('min').":".$this->input->post('sec');
		$resultData = $this->insurance_model->updateCarcheckTime($data);  
		echo json_encode($resultData);
	}
	
	
	public function carcheck_summary(){
		$data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");;
		$data['startday']=date("d");
		$data['startYear']=2022;
		$data['currYear'] = date("Y");
		$data['rangeYear']=($data['currYear']-$data['startYear'])+1;
		$data['currMonth']=date('m');  
		$this->load->view('inspection_summary',$data);
		$this->load->view('inspection_summary_script');
	}
	
	public function loadSummary(){
		$data=array();
		$data['GetdataType']="range";
		$data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");;
		$data['select_day']=$this->input->post('select_day');
		$data['select_day_end']=$this->input->post('select_day_end');
		$data['select_month']=$this->input->post('select_month');
		$data['select_month_end']=$this->input->post('select_month_end');
		$data['select_year']=$this->input->post('select_year');
		$data['select_month_name']=$this->input->post('select_month_name');
		$data['select_year_name']=$this->input->post('select_year_name');
		$data['getData']=$this->insurance_model->loadActDaily($data);  //select_month,select_year 
		$data['lastDate']=date("t");
		
		if(($data['select_day']==$data['select_day_end'])&&($data['select_month']==$data['select_month_end'])){
			$data['txtDay']='วันที่ '.$data['select_day']." ".$data['monthArray'][$data['select_month']]." พ.ศ. ".($data['select_year']+543);
		}else{
			$data['txtDay']='วันที่ '.$data['select_day']." ".$data['monthArray'][$data['select_month']]." ถึง ".$data['select_day_end'].' '.$data['monthArray'][$data['select_month_end']].' พ.ศ. '.($data['select_year']+543);
		}
		
			
		$this->load->view('inspection_information_print_3',$data);
	}
	
	public function inspection_information(){
		$data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");;
		$data['startday']=date("d");
		$data['startYear']=2022;
		$data['currYear'] = date("Y");
		$data['rangeYear']=($data['currYear']-$data['startYear'])+1;
		$data['currMonth']=date('m');  
		$this->load->view('inspection_information',$data);
		$this->load->view('inspection_information_script');
	}
	
	public function loadCarCheckMonthly(){   
		$data['select_day']=$this->input->post('select_day');
		$data['select_day_end']=$this->input->post('select_day_end');
		$data['select_month']=$this->input->post('select_month');
		$data['select_month_end']=$this->input->post('select_month_end');
		$data['select_year']=$this->input->post('select_year');
		$data['select_year_end']=$this->input->post('select_year_end');
		$data['select_month_name']=$this->input->post('select_month_name');
		$data['select_year_name']=$this->input->post('select_year_name');
		
		
		$data['getData']=$this->insurance_model->loadCarCheckMonthly($data);  //select_month,select_year
		$data['lastDate']=date("t");
		$this->load->view('inspection_information_data',$data);
		
	}
	
	public function loadMonthlyReportPrint(){  
		$data['monthArray']=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");;
		
		$data['select_day']=$this->input->post('select_day');
		$data['select_day_end']=$this->input->post('select_day_end');
		$data['select_month']=$this->input->post('select_month');
		$data['select_month_end']=$this->input->post('select_month_end');
		$data['select_year']=$this->input->post('select_year');
		$data['select_year_end']=$this->input->post('select_year_end');
		$data['select_month_name']=$this->input->post('select_month_name');
		$data['select_year_name']=$this->input->post('select_year_name');
		
		
		$data['getData']=$this->insurance_model->loadCarCheckMonthly($data);  //select_month,select_year
		$data['lastDate']=date("t");
		
		if($data['select_day']=='all'){
			$data['txtDay']='ประจำเดือน ';
		}else{
			$data['txtDay']='วันที่ '.$data['select_day'];
		}
		
		if(($data['select_day']==$data['select_day_end'])&&($data['select_month']==$data['select_month_end'])&&($data['select_year']==$data['select_year_end'])){
				$data['txtDay']='วันที่ '.$data['select_day']." ".$data['monthArray'][$data['select_month']]." พ.ศ. ".($data['select_year']+543);
		}else{
			$data['txtDay']='วันที่ '.$data['select_day']." ".$data['monthArray'][$data['select_month']]." พ.ศ. ".($data['select_year']+543)." ถึง ".$data['select_day_end']." ".$data['monthArray'][$data['select_month_end']]." พ.ศ. ".($data['select_year_end']+543);
		}
		
		$this->load->view('inspection_information_print_2',$data);
		
	}

	public function printActDaily(){  
		$data['select_day']=$this->input->post('select_day');
		$data['select_month']=$this->input->post('select_month');
		$data['select_year']=$this->input->post('select_year');
		$data['select_month_name']=$this->input->post('select_month_name');
		$data['select_year_name']=$this->input->post('select_year_name');
		$data['getData']=$this->insurance_model->loadActDaily($data);  //select_month,select_year 
		$data['lastDate']=date("t");
		
		if($data['select_day']=='all'){
			$data['txtDay']='ประจำเดือน ';
		}else{
			$data['txtDay']='วันที่ '.$data['select_day'];
		}
		
		
		
		$this->load->view('inspection_information_print_3',$data);
		
	}	
	
	public function inspection_information_print(){
		$this->load->view('inspection_information_print');
	}	
	
	public function inspection_act(){
		$currDate =date("Y-m-d");
		$date = new DateTime($currDate);
		//--------1 เดือน
		//$start_of_month = date('Y-m-01');
		$start_of_month = date('Y-m-d');
		$end_of_month = date('Y-m-d');		
		//$end_of_month = date('Y-m-t');		
		//--------1 วัน
		//$start_of_month = date('Y-m-d');
		//$end_of_month =  date('Y-m-d');
		
		$dataStatus =1;
		$data['listInsCorp'] = $this->setting_model->listCompany($dataStatus);  
		$data['listCarType'] = $this->insurance_model->listCarType();  
		//echo $start_of_month." ----".$end_of_month;
		
		$data['startDate']=$this->insurance_model-> translateDateToThai($start_of_month);
		$data['endDate']=$this->insurance_model-> translateDateToThai($end_of_month);
		$this->load->view('inspection_act',$data);
		$this->load->view('inspection_act_script');
	}	
	
	public function inspection_act_report(){
		 $data=$this->input->post();
		 $data['getData']=$this->insurance_model->inspection_act_report($data); 
		 $this->load->view('inspection_act_report',$data);
		
	}
	
	public function inspection_act_print($dateStart,$dateEnd,$car_type_id,$insurance_corp_id ){
		
		 $data['startDate'] = $this->insurance_model-> translateDateToThai($dateStart); 
		 $data['endDate'] = $this->insurance_model-> translateDateToThai($dateEnd); 
		 $data['car_type_id']=$car_type_id;
		 $data['insurance_corp_id']=$insurance_corp_id;
		 
		 if($car_type_id=='x'){
			$data['car_type_name'] = "ทุกประเภท" ;
		 }else if($car_type_id=='allcar'){
			$data['car_type_name'] = "รถยนต์ทั้งหมด" ; 
		 }else{
			$cartypeDetail=$this->insurance_model->CarTypeDetail($car_type_id);
			$data['car_type_name']=$cartypeDetail['type_name'];
		 }
		 
		 
		$data['getData']=$this->insurance_model->inspection_act_report($data); 
		$this->load->view('inspection_act_print',$data);
	}	
}
	