<?php  //

    //-----tbl_insurance_data

			$data['is_installment'] = "";

			$data['insurance_total'] = "";

			$data['StartCover'] = "";

			$data['insurance_price'] = "";

			$data['payment_amount'] = "";

			$data['amt_recieve_ins'] = "";

			$data['ins_cash'] = "";

			$data['ins_pay_type'] = "";

			$data['ins_pay_bank_id'] = "";

			$data['ins_receipt_date'] = "";

			$data['cash_payment_amount'] = "";

			$data['cash_duedate'] = "";

			$data['amount_installment'] = "";

			$data['pay_cash_status'] = "";

			$data['cash_collection']   = "";

		    $data['tran_collection']   = "";

		    $data['location_insured']   = "";



	switch($selectType){

		case "2" :

			$data['renewal']  ='';

			$data['company_id'] = "";

			$data['policy_number'] = "";

			$data['corp_id'] = "";

			$data['agent_id'] = "";

			$data['agent_name'] = "";

			$data['code_id'] = "";

			$data['cust_name'] = "";

			$data['cust_nickname'] = "";

			$data['tel1'] = "";

			$data['policyholder'] = "";

			$data['assured'] = "";

			$data['insurance_period'] = "";

			$data['insurance_start'] = "";

			$data['insurance_start_time'] = "";

			$data['insurance_end'] = "";

			$data['insurance_end_time'] = "";

			$data['travel_route'] = "";

			$data['amount'] = "";

			$data['life_cost'] = "";

			$data['medical_accident'] = "";

			$data['insurance_premiums'] = "";

			$data['Insurance_price'] = "";

			$data['duty'] = "";

			$data['vat'] = "";

			$data['Insurance_price_total'] = "";

			$data['total_price'] = "";

			$data['insurance_limit'] = "";

			$data['Insurance_discount'] = "";

			$data['payment_amount'] = "";

			$data['protection_agreement'] = "";

			$data['agent'] = "";

			$data['agent_name'] = "";

			$data['license_number'] = "";

			$data['insurance_contract_date'] = "";

			$data['policy_date'] = "";

			$data['amt_recieve_ins']   = "";

		    $data['ins_cash']   = "";

		    $data['cash_payment_amount']   = "";

		    $data['cash_duedate']   = "";

		    $data['amount_installment']   = "";

		    $data['pay_cash_status']   = "";

		    $data['ins_receipt_date']   = "";

		    $data['ins_pay_type']   = "";

		    $data['ins_pay_bank_id']   = "";

		   //$data['insurance_price']   = $otherDetail->premium; Insurance_price_total total_price StartCover Insurance_price_total insurance_premiums

		   $data['insurance_price']   = "";



			

				 

		foreach($resultOtherData AS $otherDetail){ 

			$data['renewal']  = $otherDetail->renewal;

			$data['company_id'] = $otherDetail->company_id;

			$data['policy_number'] = $otherDetail->policy_number;

			$data['corp_id'] = $otherDetail->corp_id;

			$data['agent_id'] = $otherDetail->agent_id;

			$data['agent_name'] = $otherDetail->agent_name;

			$data['code_id'] = $otherDetail->code_id;

			$data['cust_name'] = $otherDetail->cust_name;

			$data['cust_nickname'] = $otherDetail->cust_nickname;

			$data['tel1'] = $otherDetail->tel1;

			$data['policyholder'] = $otherDetail->policyholder;

			$data['assured'] = $otherDetail->assured;

			$data['insurance_period'] = $otherDetail->insurance_period;

			$data['insurance_start'] = $this->insurance_model->translateDateToThai($otherDetail->insurance_start);

			$data['insurance_start_time'] = $otherDetail->insurance_start_time;

			$data['insurance_end'] = $this->insurance_model->translateDateToThai($otherDetail->insurance_end);

			$data['insurance_end_time'] = $otherDetail->insurance_end_time;

			$data['travel_route'] = $otherDetail->travel_route;

			$data['amount'] = $otherDetail->amount;

			$data['life_cost'] = $otherDetail->life_cost;

			$data['medical_accident'] = $otherDetail->medical_accident;

			$data['insurance_premiums'] = $otherDetail->insurance_premiums;

			$data['Insurance_price'] = $otherDetail->Insurance_price;

			$data['duty'] = $otherDetail->duty;

			$data['vat'] = $otherDetail->vat;

			$data['Insurance_price_total'] = $otherDetail->Insurance_price_total;

			$data['total_price'] = $otherDetail->Insurance_price_total;

			$data['insurance_limit'] = $otherDetail->insurance_limit;

			$data['Insurance_discount'] = $otherDetail->Insurance_discount;

			$data['payment_amount'] = $otherDetail->payment_amount;

			$data['protection_agreement'] = $otherDetail->protection_agreement;

			$data['agent'] = $otherDetail->agent;

			$data['agent_name'] = $otherDetail->agent_name;

			$data['license_number'] = $otherDetail->license_number;

			$data['insurance_contract_date'] = $this->insurance_model->translateDateToThai($otherDetail->insurance_contract_date);

			$data['policy_date'] = $this->insurance_model->translateDateToThai($otherDetail->policy_date);

			$data['amt_recieve_ins']   = $otherDetail->amt_recieve_ins;

		   $data['ins_cash']   = $otherDetail->ins_cash;

		   $data['cash_payment_amount']   = $otherDetail->cash_payment_amount;

		   $data['cash_duedate']   = $this->insurance_model->translateDateToThai($otherDetail->cash_duedate);

		   $data['amount_installment']   = $otherDetail->amount_installment;

		   $data['pay_cash_status']   = $otherDetail->pay_cash_status;

		   $data['ins_receipt_date']   = $this->insurance_model->translateDateToThai($otherDetail->ins_receipt_date);

		   $data['ins_pay_type']   = $otherDetail->ins_pay_type;

		   $data['ins_pay_bank_id']   = $otherDetail->ins_pay_bank_id;

		   //$data['insurance_price']   = $otherDetail->premium;

		   $data['insurance_price']   = $otherDetail->payment_amount;

		   $data['cash_payment_amount']   = $otherDetail->cash_payment_amount;	 

		   if($otherDetail->insurance_start_time=='00:00:00'){ $otherDetail->insurance_start_time=''; }

		   $data['StartCover'] = $this->insurance_model->translateDateToThai($otherDetail->insurance_start)." ".$otherDetail->insurance_start_time;;

			

			$data['cash_collection']   = $otherDetail->cash_collection;

		    $data['tran_collection']   = $otherDetail->tran_collection;

		 }

		break;	

		case "3" :	 // insurance_price

			   $data['register']  ='';

			   $data['renewal']  ='';

			   $data['policy_number']  ='';

			   $data['corp_id']  ='';

			   $data['agent_id']  ='';

			   $data['agent_name'] = "";

			   $data['code_id']  ='';

			   $data['cust_name']  ='';

			   $data['cust_nickname']  ='';

			   $data['tel1']  ='';

			   $data['policyholder']  ='';

			   $data['vehicle_type']  ='';

			   $data['registration_number']  ='';

			   $data['insurance_period_ch']  ='';

			   $data['insurance_start']  ='';

			   $data['insurance_start_time']  ='';

			   $data['insurance_end']  ='';

			   $data['insurance_end_time']  ='';

			   $data['scope']  ='';

			   $data['route']  ='';

			   $data['transportation_insurance']  ='';

			   $data['price']  ='';

			   $data['priceaccident']  ='';

			   $data['pricevehicle']  ='';

			   $data['priceclaim']  ='';

			   $data['extra_danger']  ='';

			   $data['premium_rate']  ='';

			   $data['premium']  ='';

			   $data['revenue_stamp']  ='';

			   $data['tax']  ='';

			   $data['total_price']  ='';

			   $data['insurance_limit']  ='';

			   $data['insurance_discount']  ='';

			   $data['payment_amount']  ='';

			   $data['agent']  ='';

			   $data['license_number']  ='';

			   $data['contract_startdate']  ='';

			   $data['contract_enddate']  ='';

			   $data['agent_name']  ='';

			   $data['amt_recieve_ins']  ='';

			   $data['ins_cash']  ='';

			   $data['cash_payment_amount']   ='';

			   $data['cash_duedate']   ='';

			   $data['amount_installment']   ='';

			   $data['pay_cash_status']   ='';

			   $data['ins_receipt_date']   ='';

			   $data['ins_pay_type']   ='';

			   $data['ins_pay_bank_id']   ='';

			

			   foreach($resultOtherData AS $otherDetail){  //insurance_start cash_duedate 

			   $data['register']   = $otherDetail->register;

			   $data['renewal']  = $otherDetail->renewal;

			   $data['policy_number']   = $otherDetail->policy_number;

			   $data['corp_id']   = $otherDetail->corp_id;

			   $data['agent_id']   = $otherDetail->agent_id;

			   $data['agent_name'] = $otherDetail->agent_name;

			   $data['code_id']   = $otherDetail->code_id;

			   $data['cust_name']   = $otherDetail->cust_name;

			   $data['cust_nickname']   = $otherDetail->cust_nickname;

			   $data['tel1']   = $otherDetail->tel1;

			   $data['policyholder']   = $otherDetail->policyholder;

			   $data['vehicle_type']   = $otherDetail->vehicle_type;

			   $data['registration_number']   = $otherDetail->registration_number;

			   $data['insurance_period_ch']   = $otherDetail->insurance_period_ch;

			   $data['insurance_start']   = $this->insurance_model->translateDateToThai($otherDetail->insurance_start);

			   $data['insurance_start_time']   = $otherDetail->insurance_start_time;

			   $data['insurance_end']   = $this->insurance_model->translateDateToThai($otherDetail->insurance_end);

			   $data['insurance_end_time']   = $otherDetail->insurance_end_time;

			   $data['scope']   = $otherDetail->scope;

			   $data['route']   = $otherDetail->route;

			   $data['transportation_insurance']   = $otherDetail->transportation_insurance;

			   $data['price']   = $otherDetail->price;

			   $data['priceaccident']   = $otherDetail->priceaccident;

			   $data['pricevehicle']   = $otherDetail->pricevehicle;

			   $data['priceclaim']   = $otherDetail->priceclaim;

			   $data['extra_danger']   = $otherDetail->extra_danger;

			   $data['premium_rate']   = $otherDetail->premium_rate;

			   $data['premium']   = $otherDetail->premium;

			   $data['revenue_stamp']   = $otherDetail->revenue_stamp;

			   $data['tax']   = $otherDetail->tax;

			   $data['total_price']   = $otherDetail->total_price;

			   $data['insurance_limit']   = $otherDetail->insurance_limit;

			   $data['insurance_discount']   = $otherDetail->insurance_discount;

			   $data['payment_amount']   = $otherDetail->payment_amount;

			   $data['agent']   = $otherDetail->agent;

			   $data['license_number']   = $otherDetail->license_number;

			   $data['contract_startdate']   = $this->insurance_model->translateDateToThai($otherDetail->contract_startdate);

			   $data['contract_enddate']   = $this->insurance_model->translateDateToThai($otherDetail->contract_enddate);

			   $data['agent_name']   = $otherDetail->agent_name;

			   $data['amt_recieve_ins']   = $otherDetail->amt_recieve_ins;

			   $data['ins_cash']   = $otherDetail->ins_cash;

			   $data['cash_payment_amount']   = $otherDetail->cash_payment_amount;

			   $data['cash_duedate']   = $this->insurance_model->translateDateToThai($otherDetail->cash_duedate);

			   $data['amount_installment']   = $otherDetail->amount_installment;

			   $data['pay_cash_status']   = $otherDetail->pay_cash_status;

			   $data['ins_receipt_date']   = $this->insurance_model->translateDateToThai($otherDetail->ins_receipt_date);

			   $data['ins_pay_type']   = $otherDetail->ins_pay_type;

			   $data['ins_pay_bank_id']   = $otherDetail->ins_pay_bank_id;

			   //$data['insurance_price']   = $otherDetail->premium;

			   $data['insurance_price']   = $otherDetail->payment_amount;

			   $data['cash_payment_amount']   = $otherDetail->cash_payment_amount;

				if($otherDetail->insurance_start_time=='00:00:00'){ $otherDetail->insurance_start_time=''; }

			   $data['StartCover'] = $this->insurance_model->translateDateToThai($otherDetail->insurance_start)." ".$otherDetail->insurance_start_time;;

				$data['cash_collection']   = $otherDetail->cash_collection;

		    	$data['tran_collection']   = $otherDetail->tran_collection;

			   }

				

		break;

		case "5" :

			   $data['company_id']  ='';

			   $data['renewal']  ='';

			   $data['policy_old_number']  ='';

			   $data['policy_number']  ='';

			   $data['corp_id']  ='';

			   $data['agent_id']  ='';

			   $data['agent_name']  ='';

			   $data['code_id']  ='';

			   $data['cust_name']  ='';

			   $data['cust_nickname']  ='';

			   $data['tel1']  ='';

			   $data['policyholder']  ='';

			   $data['location_insured']  ='';

			   $data['beneficiary']  ='';

			   $data['insurance_period']  ='';

			   $data['insurance_start']  ='';

			   $data['insurance_start_time']  ='';

			   $data['insurance_end']  ='';

			   $data['insurance_end_time']  ='';

			   $data['totalprice_installment']  ='';

			   $data['revenue_stamp']  ='';

			   $data['tax']  ='';

			   $data['total_price']  ='';

			   $data['insurance_limit']  ='';

			   $data['insurance_discount']  ='';

			   $data['payment_amount']  ='';

			   $data['attach']  ='';

			   $data['contract_startdate']  ='';

			   $data['contract_enddate']  ='';

			   $data['type_work']  ='';

			   $data['broker_name']  ='';

			   $data['license_number']  ='';

			   $data['amt_recieve_ins']  ='';

			   $data['ins_cash']  ='';

			   $data['ins_pay_type']  ='';

			   $data['cash_payment_amount']  ='';

			   $data['amt_recieve_ins'] = "";

			   $data['cash_duedate'] = "";

			   $data['pay_cash_status'] = "";

			   $data['ins_receipt_date'] = "";

			   $data['amount_installment'] = "";

			   $data['ins_pay_bank_id'] = "";

			   

			   

			  foreach($resultOtherData AS $otherDetail){ // cust_name

			   $data['company_id']  = $otherDetail->company_id;

			   $data['renewal']   = $otherDetail->renewal;

			   $data['policy_old_number']   = $otherDetail->policy_old_number;

			   $data['policy_number']   = $otherDetail->policy_number;

			   $data['corp_id']  =  $otherDetail->corp_id;

			   $data['agent_id']  = $otherDetail->agent_id;

				$data['agent_name'] = $otherDetail->agent_name;

			   $data['code_id']  =    $otherDetail->code_id;

			   $data['cust_name']  =  $otherDetail->cust_name;

			   $data['cust_nickname']  =$otherDetail->cust_nickname;

			   $data['tel1']  =$otherDetail->tel1;

			   $data['policyholder']  =$otherDetail->policyholder;

			   $data['location_insured']  =$otherDetail->location_insured;

			   $data['beneficiary']  =$otherDetail->beneficiary;

			   $data['insurance_period']  =$otherDetail->insurance_period;

			   $data['insurance_start']  =$this->insurance_model->translateDateToThai($otherDetail->insurance_start);

			   $data['insurance_start_time']  =$otherDetail->insurance_start_time;

			   $data['insurance_end']  =$this->insurance_model->translateDateToThai($otherDetail->insurance_end);

			   $data['insurance_end_time']  =$otherDetail->insurance_end_time;

			   $data['totalprice_installment']  =$otherDetail->totalprice_installment;

			   $data['revenue_stamp']  =$otherDetail->revenue_stamp;

			   $data['tax']  =$otherDetail->tax;

			   $data['total_price']  =$otherDetail->total_price;

			   $data['insurance_limit']  =$otherDetail->insurance_limit;

			   $data['insurance_discount']  =$otherDetail->insurance_discount;

			   $data['payment_amount']  =$otherDetail->payment_amount;

			   $data['attach']  =$otherDetail->attach;

			   $data['contract_startdate']  =$this->insurance_model->translateDateToThai($otherDetail->contract_startdate);

			   $data['contract_enddate']  =$this->insurance_model->translateDateToThai($otherDetail->contract_enddate);

			   $data['type_work']  =$otherDetail->type_work;

			   $data['broker_name']  =$otherDetail->broker_name;

			   $data['license_number']  =$otherDetail->license_number;

			   $data['amt_recieve_ins']  =$otherDetail->amt_recieve_ins;

			   $data['ins_cash']  =$otherDetail->ins_cash;

			   $data['ins_pay_type']  =$otherDetail->ins_pay_type;

			   $data['cash_payment_amount']  =$otherDetail->cash_payment_amount;

			   $data['amt_recieve_ins'] = $otherDetail->amt_recieve_ins;

			   $data['cash_duedate'] = $this->insurance_model->translateDateToThai($otherDetail->cash_duedate);

			   $data['pay_cash_status'] = $otherDetail->pay_cash_status;

			   $data['ins_receipt_date'] = $this->insurance_model->translateDateToThai($otherDetail->ins_receipt_date);

			   $data['amount_installment'] = $otherDetail->amount_installment;

			   $data['ins_pay_bank_id'] = $otherDetail->ins_pay_bank_id;

			   $data['is_installment'] = $otherDetail->is_installment;

			   $data['insurance_total'] = $otherDetail->insurance_total;

				  if($otherDetail->insurance_start_time=='00:00:00'){ $otherDetail->insurance_start_time=''; }

			   $data['StartCover'] = $this->insurance_model->translateDateToThai($otherDetail->insurance_start)." ".$otherDetail->insurance_start_time;;

			   $data['policy_number'] = $otherDetail->policy_number;

			   $data['insurance_price'] = $otherDetail->totalprice_installment;

			  $data['cash_collection']   = $otherDetail->cash_collection;

		       $data['tran_collection']   = $otherDetail->tran_collection;

				$data['location_insured'] = $otherDetail->location_insured ;  

				  

			  

			  }

		break;	

		case "4" :

			//------------------------------------insurance_start

			    $data['type']="";

				$data['company_id']="";

				$data['renewal']="";

				$data['policy_old_number']="";

				$data['policy_number']="";

				$data['code_id']="";

				$data['agent_id']="";

				$data['agent_name']="";

				$data['policyholder']="";

				$data['protected_name1']="";

				$data['protected_number1']="";

				$data['protected_sex1']="";

				$data['protected_date1']="";

				$data['protected_age1']="";

				$data['protected_relationship1']="";

				$data['protected_name2']="";

				$data['protected_number2']="";

				$data['protected_sex2']="";

				$data['protected_date2']="";

				$data['protected_age2']="";

				$data['protected_relationship2']="";

				$data['protected_name3']="";

				$data['protected_number3']="";

				$data['protected_sex3']="";

				$data['protected_date3']="";

				$data['protected_age3']="";

				$data['protected_relationship3']="";

				$data['beneficiary']="";

				$data['insurance_start']="";

				$data['insurance_start_time']="";

				$data['insurance_end']="";

				$data['insurance_end_time']="";

				$data['assured1']="";

				$data['spouse1']="";

				$data['family_person1']="";

				$data['other1']="";

				$data['partial_liability1']="";

				$data['assured2']="";

				$data['spouse2']="";

				$data['family_person2']="";

				$data['other2']="";

				$data['partial_liability2']="";

				$data['assured3']="";

				$data['spouse3']="";

				$data['family_person3']="";

				$data['other3']="";

				$data['partial_liability3']="";

				$data['assured4']="";

				$data['spouse4']="";

				$data['family_person4']="";

				$data['other4']="";

				$data['partial_liability4']="";

				$data['assured5']="";

				$data['spouse5']="";

				$data['family_person5']="";

				$data['other5']="";

				$data['partial_liability5']="";

				$data['insurance_price']="";

				$data['installment']="";

				$data['totalprice_installment']="";

				$data['revenue_stamp']="";

				$data['tax']="";

				$data['total_price']="";

				$data['attach']="";

				$data['contract_startdate']="";

				$data['contract_enddate']="";

				$data['type_work']="";

				$data['broker_name']="";

				$data['license_number']="";

				$data['address_name']="";

				$data['address_org']="";

				$data['address_no']="";

				$data['address_moo']="";

				$data['address_alley']="";

				$data['address_road']="";

				$data['address_subdistric']="";

				$data['address_disctric']="";

				$data['address_province']="";

				$data['address_postcode']="";

				$data['address_sendtype']="";

				$data['address_remark']="";

				$data['address_use_type']="";

				$data['post_date']="";

				$data['post_no']="";

				$data['payment_type']="";

				$data['corp_id']="";

				$data['date_add']="";

				$data['user_update']="";

				$data['cust_name']="";

				$data['cust_nickname']="";

				$data['tel1']="";

				$data['percent_commission']="";

				$data['commission_baht']="";

				$data['percent_deduct_tax']="";

				$data['deduct_tax_baht']="";

				$data['deliver_baht']="";

				$data['insurance_limit']="";

				$data['treatment_costs']="";

				$data['payment_amount']="";

				$data['insurance_discount']="";

				$data['insurance_period']="";

				$data['ins_cash'] = 0;

				$data['ins_pay_type'] = 0;

				$data['ins_pay_bank_id'] ="";

				$data['ins_receipt_date'] ="";

				$data['amount_installment'] ="";

				$data['cash_duedate'] = "";

				$data['pay_cash_status'] = "0";

				$data['cash_payment_amount'] = "0";

				$data['amt_recieve_ins'] = "";

				$data['location_insured'] = "";

				$data['daily_compensation'] = "";

				$data['daily_compensation2'] = "";

				$data['daily_compensation3'] = "";

				$data['daily_compensation4'] = "";

				$data['daily_compensation5'] = "";

			

			foreach($resultOtherData AS $otherDetail){ 

				$data['type']=$otherDetail->type;

				$data['company_id']=$otherDetail->company_id;

				$data['renewal']=$otherDetail->renewal;

				$data['policy_old_number']=$otherDetail->policy_old_number;

				$data['policy_number']=$otherDetail->policy_number;

				$data['code_id']=$otherDetail->code_id;

				$data['agent_id']=$otherDetail->agent_id;

				$data['agent_name'] = $otherDetail->agent_name;

				$data['policyholder']=$otherDetail->policyholder;

				$data['protected_name1']=$otherDetail->protected_name1;

				$data['protected_number1']=$otherDetail->protected_number1;

				$data['protected_sex1']=$otherDetail->protected_sex1;

				$data['protected_date1']=$otherDetail->protected_date1;

				$data['protected_age1']=$otherDetail->protected_age1;

				$data['protected_relationship1']=$otherDetail->protected_relationship1;

				$data['protected_name2']=$otherDetail->protected_name2;

				$data['protected_number2']=$otherDetail->protected_number2;

				$data['protected_sex2']=$otherDetail->protected_sex2;

				$data['protected_date2']=$otherDetail->protected_date2;

				$data['protected_age2']=$otherDetail->protected_age2;

				$data['protected_relationship2']=$otherDetail->protected_relationship2;

				$data['protected_name3']=$otherDetail->protected_name3;

				$data['protected_number3']=$otherDetail->protected_number3;

				$data['protected_sex3']=$otherDetail->protected_sex3;

				$data['protected_date3']=$otherDetail->protected_date3;

				$data['protected_age3']=$otherDetail->protected_age3;

				$data['protected_relationship3']=$otherDetail->protected_relationship3;

				$data['beneficiary']=$otherDetail->beneficiary;

				$data['insurance_start']=$this->insurance_model->translateDateToThai($otherDetail->insurance_start);

				$data['insurance_start_time']=$otherDetail->insurance_start_time;

				$data['insurance_end']=$this->insurance_model->translateDateToThai($otherDetail->insurance_end);

				$data['insurance_end_time']=$otherDetail->insurance_end_time;

				$data['assured1']=$otherDetail->assured1;

				$data['spouse1']=$otherDetail->spouse1;

				$data['family_person1']=$otherDetail->family_person1;

				$data['other1']=$otherDetail->other1;

				$data['partial_liability1']=$otherDetail->partial_liability1;

				$data['assured2']=$otherDetail->assured2;

				$data['spouse2']=$otherDetail->spouse2;

				$data['family_person2']=$otherDetail->family_person2;

				$data['other2']=$otherDetail->other2;

				$data['partial_liability2']=$otherDetail->partial_liability2;

				$data['assured3']=$otherDetail->assured3;

				$data['spouse3']=$otherDetail->spouse3;

				$data['family_person3']=$otherDetail->family_person3;

				$data['other3']=$otherDetail->other3;

				$data['partial_liability3']=$otherDetail->partial_liability3;

				$data['assured4']=$otherDetail->assured4;

				$data['spouse4']=$otherDetail->spouse4;

				$data['family_person4']=$otherDetail->family_person4;

				$data['other4']=$otherDetail->other4;

				$data['partial_liability4']=$otherDetail->partial_liability4;

				$data['assured5']=$otherDetail->assured5;

				$data['spouse5']=$otherDetail->spouse5;

				$data['family_person5']=$otherDetail->family_person5;

				$data['other5']=$otherDetail->other5;

				$data['partial_liability5']=$otherDetail->partial_liability5;

				$data['insurance_price']=$otherDetail->insurance_price;

				$data['installment']=$otherDetail->installment;

				$data['totalprice_installment']=$otherDetail->totalprice_installment;

				$data['revenue_stamp']=$otherDetail->revenue_stamp;

				$data['tax']=$otherDetail->tax;

				$data['total_price']=$otherDetail->total_price;

				$data['attach']=$otherDetail->attach;

				$data['contract_startdate']=$this->insurance_model->translateDateToThai($otherDetail->contract_startdate);

				$data['contract_enddate']=$this->insurance_model->translateDateToThai($otherDetail->contract_enddate);

				$data['type_work']=$otherDetail->type_work;

				$data['broker_name']=$otherDetail->broker_name;

				$data['license_number']=$otherDetail->license_number;

				$data['address_name']=$otherDetail->address_name;

				$data['address_org']=$otherDetail->address_org;

				$data['address_no']=$otherDetail->address_no;

				$data['address_moo']=$otherDetail->address_moo;

				$data['address_alley']=$otherDetail->address_alley;

				$data['address_road']=$otherDetail->address_road;

				$data['address_subdistric']=$otherDetail->address_subdistric;

				$data['address_disctric']=$otherDetail->address_disctric;

				$data['address_province']=$otherDetail->address_province;

				$data['address_postcode']=$otherDetail->address_postcode;

				$data['address_sendtype']=$otherDetail->address_sendtype;

				$data['address_remark']=$otherDetail->address_remark;

				$data['address_use_type']=$otherDetail->address_use_type;

				$data['post_date']=$otherDetail->post_date;

				$data['post_no']=$otherDetail->post_no;

				$data['payment_type']=$otherDetail->payment_type;

				$data['corp_id']=$otherDetail->corp_id;

				$data['date_add']=$otherDetail->date_add;

				$data['user_update']=$otherDetail->user_update;

				$data['cust_name']=$otherDetail->cust_name;

				$data['cust_nickname']=$otherDetail->cust_nickname;

				$data['tel1']=$otherDetail->tel1;

				$data['percent_commission']=$otherDetail->percent_commission;

				$data['commission_baht']=$otherDetail->commission_baht;

				$data['percent_deduct_tax']=$otherDetail->percent_deduct_tax;

				$data['deduct_tax_baht']=$otherDetail->deduct_tax_baht;

				$data['deliver_baht']=$otherDetail->deliver_baht;

				$data['insurance_limit']=$otherDetail->insurance_limit;

				$data['treatment_costs']=$otherDetail->treatment_costs;

				$data['payment_amount']=$otherDetail->payment_amount;

				$data['insurance_discount']=$otherDetail->insurance_discount;

				$data['insurance_period']=$otherDetail->insurance_period;

				$data['ins_cash'] = $otherDetail->ins_cash ;

				$data['ins_pay_type'] = $otherDetail->ins_pay_type ;

				$data['ins_pay_bank_id'] = $otherDetail->ins_pay_bank_id ;

				$data['ins_receipt_date'] = $this->insurance_model->translateDateToThai($otherDetail->ins_receipt_date);;

				$data['cash_duedate'] = $this->insurance_model->translateDateToThai($otherDetail->cash_duedate);;

				$data['amount_installment']   = $otherDetail->amount_installment ;

				$data['pay_cash_status'] = $otherDetail->pay_cash_status ;

				$data['cash_payment_amount'] = $otherDetail->cash_payment_amount ;

				$data['amt_recieve_ins'] = $otherDetail->amt_recieve_ins ;

				$data['is_installment'] = $otherDetail->is_installment ;

				$data['insurance_total'] = $otherDetail->insurance_total ;

				$data['daily_compensation']  = $otherDetail->daily_compensation ;

				$data['daily_compensation2']  = $otherDetail->daily_compensation2 ;

				$data['daily_compensation3']  = $otherDetail->daily_compensation3 ;

				$data['daily_compensation4']  = $otherDetail->daily_compensation4 ;

				$data['daily_compensation5']  = $otherDetail->daily_compensation5 ;

				

				

				if($otherDetail->insurance_start_time=='00:00:00'){ $otherDetail->insurance_start_time=''; }

				$data['StartCover'] = $this->insurance_model->translateDateToThai($otherDetail->insurance_start)." ".$otherDetail->insurance_start_time;;

			   $data['policy_number'] = $otherDetail->policy_number;

				$data['insurance_price'] = $otherDetail->totalprice_installment;

				$data['cash_collection']   = $otherDetail->cash_collection;

		    $data['tran_collection']   = $otherDetail->tran_collection;

			}



			//------------------------------------

		break;

	

	}

if(!isset($referID)){ $referID = '';}

if($referID=='renew'){ 

	$data['renewal']='1'; 

	$data['insurance_start'] = "";

	$data['insurance_start_time'] = "";

	$data['insurance_end'] = "";

	$data['insurance_end_time'] = "";

	$data['amt_recieve_ins'] = "";

	$data['ins_pay_type'] = "";

	$data['ins_pay_bank_id'] = "";

	$data['ins_receipt_date'] = "";

	$data['cash_payment_amount'] = "";

	$data['cash_duedate'] = "";

	$data['pay_cash_status'] = "";

	$data['policy_number'] ='';

}



?>