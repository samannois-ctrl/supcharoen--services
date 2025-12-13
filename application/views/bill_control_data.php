<?php 
//echo $data['sql']."<br>";
//echo $data['sqlCaption']."<br>";
//print_r($data['resultDataCaption']);

$dataCAption['resultDataCaption'] = $data['resultDataCaption'];
?>
<style>
	.textRight{
		text-align: right;
	}
	.inputSmall{
		font-size: 13px;
	}
</style>
<div class="from-group row" style="margin-bottom: 10px;">
	<div class="col-1"><button type="button" class="btn btn-sm btn-success" onClick="reloadData()">เรียกข้อมูลใหม่</button></div>
	<div class="col-1"><button type="button" class="btn btn-sm btn-info" onClick="showAllData()">แสดงที่ซ่อน</button></div>

</div>
<div class="table-responsive">
<table id="controlTable" class="table table-bordered">
								<tr>
									<td>เลือก</td>
									<td>เลขที่ กธ.</td>  
									<td>ชื่อ - นามสกุล</td>  
									<td>ทะเบียน</td>  
									<td>บริษัท</td>  
									<td>ประเภท</td>  
									<td>ยอดสุทธิ</td>  
									<!--<td>Xยอดรวม</td>  -->
									<td nowrap="nowrap">ยอดเก็บตัวแทน</td>
									<td nowrap="nowrap">ธนาคาร</td>  
									<td nowrap="nowrap">วันที่รับเงิน</td>
									<td nowrap="nowrap">ยอดเงินโอน</td>  
									<td nowrap="nowrap">เบี้ยนำส่ง</td>  
									<td nowrap="nowrap">วันจ่ายเช็ค</td>  
									<td nowrap="nowrap">ตัวแทน</td>  
									<td>ผ่อน</td>  
									<td>งาน</td>
									<td>ลบ</td>  
								</tr>
	<?php $txtRenew='';   $sumAgent = 0; $sumDelivery = 0; $checkWorkID = ''; $sum_insurance_total_net=0; $sum_insurance_price=0; $sum_recieve_amount=0; 
	    
		foreach($data['resultData'] AS $data){ 
	                $countPayment = $this->insurance_model->countPayment($data->workID);
					if($countPayment<=0){ $txtPayment =  "สด";}else { $txtPayment = "ผ่อน-".$countPayment;}
	                
					if(($data->insurance_renew=='0')&&($data->insurance_data_type==1)){ $txtRenew ='ต่ออายุ'; }
	                if(($data->insurance_renew=='1')&&($data->insurance_data_type==1)){ $txtRenew ='งานใหม่'; }
	                if(($data->insurance_renew=='2')&&($data->insurance_data_type==1)){ $txtRenew ='ต่อ ย้าย'; }
					
					if(($data->insurance_renew=='1')&&($data->insurance_data_type > 1)){ $txtRenew ='ต่ออายุ'; }
					if(($data->insurance_renew=='2')&&($data->insurance_data_type > 1)){ $txtRenew ='งานใหม่'; }
					if(($data->insurance_renew=='0')&&($data->insurance_data_type > 1)){ $txtRenew =''; }
			
					$showBtnInsDelete ='1';$showBtnActDelete ='1';$sumAct_recive='1';
			        //if($data) select_ins_bill select_act_bill
			        $checkAct ="";  $checkIns =""; $checkInsOther =""; 
			      
			   if(($data->select_ins_bill=='1')&&($data->insurance_data_type=='1')&&($data->insurance_data_type==1)){
						$checkIns ="checked"; 
						$act_delivery_allowance = ''; 
						//$readonly_Act_allowent = "readonly"; 
						$readonly_Act_allowent = ""; 
						$delivery_allowance =$data->delivery_allowance; 
						$insRowDisplay = '';
						$sumDelivery = $sumDelivery+$data->delivery_allowance;
						$sumAgent = $sumAgent+$data->amt_recieve_ins;
						//echo ' 1 sumAgent>'.$sumAgent;
						$sum_insurance_price=$sum_insurance_price+$data->insurance_price; 
						
							
				        $sum_insurance_total_net=$sum_insurance_total_net+$data->net_balance;
				        //$sum_insurance_total_net=$sum_insurance_total_net+$data->insurance_total_net;
					}else{ 
						$act_delivery_allowance=$data->act_delivery_allowance;  
						$readonly_Act_allowent = "";  
						$delivery_allowance=''; 
						$insRowDisplay = 'style="display: none;"';
				   		$showBtnInsDelete = 0;
					}
			
			  if(($data->select_act_bill=='1')&&($data->insurance_data_type=='1')&&($data->insurance_data_type==1)){ 
						$checkAct ="checked"; 
						$ActRowDisplay = '';
						$sumDelivery = $sumDelivery+$data->act_delivery_allowance;
						$sumAgent = $sumAgent+$data->amt_recieve_act;
						//echo ' 2 sumAgent>'.$sumAgent;
						  $sum_insurance_price=$sum_insurance_price+$data->act_price;
						 //$sum_insurance_total_net=$sum_insurance_total_net+$data->act_price_net;
						 $sum_insurance_total_net=$sum_insurance_total_net+$data->net_balance_act;
						//echo $sum_insurance_total_net." 2<br>";	
						
					}else{
						$ActRowDisplay = 'style="display: none;"';
					}
			
			if(($data->select_ins_bill=='1')&&($data->select_act_bill=='1')){
				$showBtnActDelete='0';
				$sumAct_recive = 0;
			}
			
	
	  //-insurance other	
	$insRowDisplayOther = '';
	  if(($data->insurance_data_type > 1)){ 
						 
		 $getOtherData = $this->insurance_model->getOtherInsID($data->insurance_data_type,$data->workID); 

			if($data->select_ins_bill=='1'){ 
				$checkInsOther ="checked"; 
				$ActRowDisplay = '';
				$delivery_allowance =$data->delivery_allowance; 
				$sumDelivery = $sumDelivery+$data->delivery_allowance;
				$sumAgent = $sumAgent+$data->amt_recieve_act;
				//echo ' 3 sumAgent>'.$sumAgent;
				if(!isset($getOtherData['payment_amount'])){ $getOtherData['payment_amount'] = 0;}
				if(!isset($getOtherData['totalprice_installment'])){ $getOtherData['totalprice_installment'] = 0;}
				$sum_insurance_price=$sum_insurance_price+$getOtherData['totalprice_installment'];

				$insRowDisplayOther = 'style=""';
				
				$sum_insurance_total_net=$sum_insurance_total_net+$data->net_balance;
				//$sum_insurance_total_net=$sum_insurance_total_net+$getOtherData['totalprice_installment'];
				
				//echo $sum_insurance_total_net." 3<br>";
				/*
					ท่องเทียว  Insurance_price
	ขนส่ง premium
	บ้าน totalprice_installment
	PA totalprice_installment
				*/
			
				
			}else{
				$insRowDisplayOther = 'style="display: none;"';

			}
	 }
				
			    //------check if date format  xx/xx  $data->act_check_payment_date , $data->check_payment_date 
			    
				$act_check_payment_date_check = strpos($data->act_check_payment_date, '/');
			    if($act_check_payment_date_check!=false){
					$act_paydate_array = explode("/",$data->act_check_payment_date);
					$data->act_check_payment_date = $act_paydate_array[0]."-".$act_paydate_array[1]."-".$act_paydate_array[0];
				}
			
				$act_check_payment_date_check = strpos($data->check_payment_date, '/');
			    if($act_check_payment_date_check!=false){
					$check_payment_date_array = explode("/",$data->check_payment_date);
					$data->check_payment_date = $check_payment_date_array[0]."-".$check_payment_date_array[1]."-".$check_payment_date_array[0];
				}else{
					
				}
			
			
			
if(($data->insurance_no!='')&&($data->insurance_data_type==1)){ 
			  if($data->net_balance=='0.00'){
				  $resultUpBalance = $this->insurance_model->updateNetBalance('net_balance',$data->insurance_total_net,$data->CtrlID);
				  $showBalance=$data->insurance_total_net;
			  }else{
				  $showBalance=$data->net_balance;
			  }					 
?>
	<tr <?php echo $insRowDisplay?> class="allData" id="insRow<?php echo $data->CtrlID?>">
		<td><input type="checkbox" value="1" onclick="updateSelectTobill('<?php echo $data->CtrlID?>','select_ins_bill',this,'insRow')" <?php echo $checkIns?> >
		 </td>
								  <td><?php echo $data->insurance_no?></td>
								  <td>
									  <a href="<?php echo base_url('Insurance_car/work_insurance_add/').$data->workID?>" target="_blank"><?php echo $data->cust_name?></a>
									  
									</td>
								  <td><?php echo $data->vehicle_regis." ".$data->province_name?></td>
								  <td><?php echo $data->company_name?></td>
								  <td><?php echo $data->insurance_type_name?></td>
								  <td align="right"><input type="text"  class="form-control form-control-sm autonumber" value="<?php echo $showBalance?>" onChange="updateNetBalance('net_balance',this.value,'<?php echo $data->CtrlID?>')"><?php //echo number_format($data->insurance_total_net,2); ?></td>
								 <!-- <td align="right">X<?php echo number_format($data->insurance_price,2);?></td>-->
								  <td align="right"><input type="text"  class="form-control form-control-sm textRight agentImcome autonumber  inputSmall " value="<?php echo $data->amt_recieve_ins;?>" onChange="UpdateBoardControl('amt_recieve_ins','<?php echo $data->CtrlID?>', this.value ,'<?php echo $data->insurance_id?>','<?php echo $data->keygroup?>')" style="width: 90px;"></td>
								  <td align="right" nowrap="nowrap"><?php //echo $data->countInstallment?>
								 <?php $paymentDetail = $this->insurance_model->getPaymentDetail($data->countInstallment,'insurance',$data->workID,$data->insurance_data_type); 
//print_r($paymentDetail);
	                              echo $paymentDetail['bankName']; 
								  if($paymentDetail['is_credit_card']=='1'){
									echo ' '.$data->company_name;
								  }	
									//act insuranceOther recieve_amount ?>
									  
								  </td>
								  <td>
									<?php foreach($paymentDetail['receipt_date'] AS $key=>$val){ 
										      echo $val." ";
									      }
									  ?>  
									 
		</td>
								  <td align="right"><?php 
								
						
									 
	                               $nx=1; 
									foreach($paymentDetail['recieve_amount'] AS $key=>$val){
									   if($paymentDetail['ins_pay_type'][$nx-1] > 0){
										  echo number_format($val,2);
										  if($data->countInstallment>0){ echo "<br>";} 
										  echo '<input type="hidden" class="recieve_amt" name="revive_amt_ins'.$data->CtrlID.$nx.'" value="'.$val.'">';
										 if($insRowDisplay!=''){ $val = 0; }
										 $sum_recieve_amount = $sum_recieve_amount+$val;
									$nx++; 
								   	}
								   }
									
								?>
		    
		</td>
								  <td>
									  <input type="text" id="InsAllowentValue<?php echo $data->CtrlID?>"  class="form-control form-control-sm autonumber dv textRight inputSmall"  value="<?php echo $delivery_allowance?>" onChange="UpdateBoardControl('delivery_allowance','<?php echo $data->CtrlID?>', this.value,'<?php echo $data->insurance_id?>','<?php echo $data->keygroup?>')" style="width: 95px;">
									  <input type="hidden" id="hiddenInsAllowent<?php echo $data->CtrlID?>" name="hiddenInsAllowent<?php echo $data->CtrlID?>" value="<?php echo $data->delivery_allowance?>">
							     </td>
								  <td>
									
									  <input type="text"  class="form-control form-control-sm checkInput datepicker inputSmall"  value="<?php echo $this->insurance_model->translateDateToThai($data->check_payment_date)?>"  onChange="UpdateBoardControl('check_payment_date','<?php echo $data->CtrlID?>', this.value,'<?php echo $data->insurance_id?>','<?php echo $data->keygroup?>')" style="width: 95px;" >
									
							</td>
								  <td><input type="text" class="form-control form-control-sm inputSmall" value="<?php echo $data->agent_name?>" onChange="UpdateBoardControl('agent_name','<?php echo $data->CtrlID?>', this.value,'<?php echo $data->insurance_id?>','<?php echo $data->keygroup?>')" style="width: 95px;">
		                          </td>
								  <td><?php echo $txtPayment;  ?></td>
								  <td><?php echo $txtRenew?></td>
								  <td>
		                            <div id="ins<?php echo $data->CtrlID?>">
									  <button type="button" class="btn btn-sm btn-danger" onClick="DeleteControl('<?php echo htmlspecialchars($data->cust_name)?>','<?php echo $data->CtrlID?>')">X</button>
									</div>  	
								  </td>
	</tr>
<?php } 
	if(($data->act_no!='')&&($data->insurance_data_type==1)){  
			if($data->net_balance=='0.00'){
				  $resultUpBalance = $this->insurance_model->updateNetBalance('net_balance_act',$data->act_price_net,$data->CtrlID);
				  $showBalance_Act=$data->act_price_net;
			  }else{
				  $showBalance_Act=$data->net_balance_act;
			  }	
?>
								<tr <?php echo $ActRowDisplay?>  class="allData" id="insRowAct<?php echo $data->CtrlID?>">
								 <td><input type="checkbox" value="1"  onclick="updateSelectTobill('<?php echo $data->CtrlID?>','select_act_bill',this,'insRowAct')" <?php echo $checkAct?> ></td>
								 <td><?php echo $data->act_no?></td>
								  <td><a href="<?php echo base_url('Insurance_car/work_insurance_add/').$data->workID?>" target="_blank"><?php echo $data->cust_name?></a>
									
									</td>
								  <td><?php echo $data->vehicle_regis." ".$data->province_name?></td>
								  <td><?php echo $data->actCorpName?> </td>
								  <td><?php echo $data->actTypeName?> </td>
								  <td align="right"><input type="text"  class="form-control form-control-sm autonumber" value="<?php echo $showBalance_Act?>"  onChange="updateNetBalance('net_balance_act',this.value,'<?php echo $data->CtrlID?>')"><?php //echo number_format($data->act_price_net,2);?></td>
								  <!--<td align="right">X<?php echo number_format($data->act_price,2);?></td>-->
								  <td align="right"><input type="text"  class="form-control form-control-sm autonumber  textRight agentImcome inputSmall" value="<?php echo $data->amt_recieve_act;?>" onChange="UpdateBoardControl('amt_recieve_act','<?php echo $data->CtrlID?>', this.value ,'<?php echo $data->insurance_id?>','<?php echo $data->keygroup?>')" style="width: 90px;" >								    <?php //echo number_format($data->amt_recieve_act,2)?></td>
								  <td align="right" nowrap="nowrap"><?php //echo $data->countInstallment?> 
									  <?php $paymentDetail = $this->insurance_model->getPaymentDetail($data->countInstallment,'act',$data->workID,$data->insurance_data_type); 
										
										echo $paymentDetail['bankName']; 
										if($paymentDetail['is_credit_card']=='1'){
											echo ' '.$data->company_name;
										  }					 
										?></td>
								  <td><?php foreach($paymentDetail['receipt_date'] AS $key=>$val){ 
										      echo $val." ";
									      }
									  ?>
									
									</td>
								  <td align="right">									  
								    <?php
									if((($showBtnActDelete=='1')&&($data->countInstallment>=0))||(($showBtnActDelete=='0')&&($data->countInstallment==0))){						 
									$nx=1;   
									foreach($paymentDetail['recieve_amount'] AS $key=>$val){
									if($paymentDetail['ins_pay_type'][$nx-1] > 0){
										echo number_format($val,2);
										echo '<input type="hidden" class="recieve_amt" name="revive_amt_act'.$data->CtrlID.$nx.'" value="'.$val.'">';
										if($data->countInstallment>0){ echo "<br>";}
										if($ActRowDisplay!=''){ $val=0;}
										$sum_recieve_amount = $sum_recieve_amount+$val;
									 $nx++; 
											}						
										}						
									}
									
									
									 
									  ?></td>
								  <td>
									 
									  <input id="actAllowValue<?php echo $data->CtrlID?>" type="text"  class="form-control form-control-sm autonumber dv textRight inputSmall"  value="<?php echo $data->act_delivery_allowance?>" onChange="UpdateBoardControl('act_delivery_allowance','<?php echo $data->CtrlID?>', this.value ,'<?php echo $data->insurance_id?>','<?php echo $data->keygroup?>')" <?php echo $readonly_Act_allowent?> style="width: 95px;" >
									 
								  </td>
								  <td>
									 
									  <input type="text"  class="form-control form-control-sm datepicker checkInput inputSmall"  value="<?php echo $this->insurance_model->translateDateToThai($data->act_check_payment_date)?>"  onChange="UpdateBoardControl('act_check_payment_date','<?php echo $data->CtrlID?>', this.value,'<?php echo $data->work_id?>','<?php echo $data->keygroup?>')" style="width: 95px;">
									 
								  </td>
								  <td> 
									  <input type="text" class="form-control form-control-sm inputSmall" value="<?php echo $data->agent_name?>" onChange="UpdateBoardControl('agent_name','<?php echo $data->CtrlID?>', this.value,'<?php echo $data->insurance_id?>','<?php echo $data->keygroup?>')" style="width: 95px;">
									  
								  </td>
								  <td><?php echo $txtPayment;  ?></td>
								  <td><?php echo $txtRenew?></td>
								  <td> 
									<div id="divDeleteAct<?php echo $data->CtrlID?>">  
									  <?php
									  
									if($showBtnActDelete=='1'){
									?>
									  <button type="button" class="btn btn-sm btn-danger" onClick="DeleteControl('<?php echo htmlspecialchars($data->cust_name)?>','<?php echo $data->CtrlID?>')">X</button>
									  	<?php 
										}
									  ?>
									 </div>
										</td>
							    </tr>
								
   <?php }  
		  if($data->insurance_data_type>1){   
			  $showBtnActDelete = '1';
			  
			  if($data->net_balance=='0.00'){
				  $resultUpBalance = $this->insurance_model->updateNetBalance('net_balance',$getOtherData['totalprice_installment'],$data->CtrlID);
				  $showBalance=$getOtherData['totalprice_installment'];
			  }else{
				  $showBalance=$data->net_balance;
			  }	
	
			?>
		
							<tr <?php echo $insRowDisplayOther?>  class="allData" id="insRowAct<?php echo $data->CtrlID?>">
								 <td><input type="checkbox" value="1"  onclick="updateSelectTobill('<?php echo $data->CtrlID?>','select_ins_bill',this,'insRowAct')" <?php echo $checkInsOther?> ></td>
								 <td><?php echo $data->insurance_no?></td>
								  <td>
									  
							    <a href="<?php echo base_url('Insurance_other/work_insurance_other_add/').$data->insurance_data_type.'/'.$data->workID.'/'.$getOtherData['ins_id']?>" target="_blank"><?php echo $data->cust_name?></a></td>
								  <td><?php echo $data->vehicle_regis." ".$data->province_name?></td>
								  <td><?php echo $data->company_name?> </td>
								  <td><?php switch($data->insurance_data_type){
			                                    case "4" :
				  									echo "ประกันอุบัติเหตุ";
				                                break;
				                                case "3" :
				  									echo "ประกันขนส่ง";
				                                break;
				   								case "2" :
				  									echo "ประกันท่องเที่ยว";
				                                break;
				  								case "5" :
				  									echo "ประกันบ้าน";
				                                break;
		  									}
									  ?>
						      </td>
								  <td align="right"><input type="text"  class="form-control form-control-sm autonumber" value="<?php echo $showBalance?>"  onChange="updateNetBalance('net_balance',this.value,'<?php echo $data->CtrlID?>')"><?php //echo number_format($getOtherData['totalprice_installment'],2);?></td>
								  <!--<td align="right">X<?php //echo number_format($getOtherData['payment_amount'],2);?></td>-->
								  <td align="right"><input type="text"  class="form-control form-control-sm autonumber  textRight agentImcome inputSmall" value="<?php echo $data->amt_recieve_act;?>" onChange="UpdateBoardControl('amt_recieve_act','<?php echo $data->CtrlID?>', this.value ,'<?php echo $data->insurance_id?>','<?php echo $data->keygroup?>')" style="width: 90px;" >								    <?php //echo number_format($data->amt_recieve_act,2)?></td>
								  <td align="right" nowrap="nowrap">
									  <?php 
			  							$paymentDetail = $this->insurance_model->getPaymentDetail($data->countInstallment,'insuranceOther',$data->workID,$data->insurance_data_type); 
			 
			                 			  echo $paymentDetail['bankName']; 	
										   if($paymentDetail['is_credit_card']=='1'){
											echo ' '.$data->company_name;
										  }		
									  ?>
								</td>
								  <td>
									  <?php foreach($paymentDetail['receipt_date'] AS $key=>$val){ 
										      echo $val;
									      }
									  ?>
									  <?php /*?>
									  <input type="text" id="dateRecieveAct<?php echo $data->CtrlID?>" class="form-control  datepicker  form-control-sm textRight inputSmall" value="<?php echo $data->act_revieve_date?>"  onChange="UpdateBoardControl('act_revieve_date','<?php echo $data->CtrlID?>', this.value ,'<?php echo $data->insurance_id?>','<?php echo $data->keygroup?>')" style="width: 95px;">
									  <?php */?>
								</td>
								  <td align="right">
									  <?php
			  					$nx=1; //print_r($paymentDetail['recieve_amount']);
			    				foreach($paymentDetail['recieve_amount'] AS $key=>$val){
									 if($paymentDetail['ins_pay_type'][$nx-1] > 0){
										echo number_format($val,2);
									    if($data->countInstallment>0){ echo "<br>";} 
									    echo '<input type="hidden" class="recieve_amt" name="revive_amt_other'.$data->CtrlID.$nx.'" value="'.$val.'">';
										if($insRowDisplayOther!='style=""'){ $val = 0; }
										$sum_recieve_amount = $sum_recieve_amount+$val;
									    
								$nx++;	
									 }
									 }
			  	
						//}?></td>
								  <td>
									  <?php //if($showBtnActDelete=='1'){?>
								    <input type="text" id="InsAllowentValue<?php echo $data->CtrlID?>2"  class="form-control form-control-sm autonumber dv textRight inputSmall"  value="<?php echo $delivery_allowance?>" onChange="UpdateBoardControl('delivery_allowance','<?php echo $data->CtrlID?>', this.value,'<?php echo $data->insurance_id?>','<?php echo $data->keygroup?>')" style="width: 95px;">
									 <?php  //$sumDelivery=$sumDelivery+$delivery_allowance?>
									  <!--<input type="text"  class="form-control form-control-sm autonumber dv"  value="<?php //echo $data->act_delivery_allowance?>" onChange="UpdateBoardControl('act_delivery_allowance','<?php echo $data->CtrlID?>', this.value)">-->
									  <?php //}?> 
								  </td>
								  <td>
									  <?php //if($showBtnActDelete=='1'){?>
								    <input type="text"  class="form-control form-control-sm datepicker checkInput inputSmall"  value="<?php echo $this->insurance_model->translateDateToThai($data->check_payment_date)?>"  onChange="UpdateBoardControl('check_payment_date','<?php echo $data->CtrlID?>', this.value,'<?php echo $data->insurance_id?>','<?php echo $data->keygroup?>')" style="width: 95px;">									  <?php //}?>
								  </td>
								  <td> <?php //if($showBtnActDelete=='1'){?>
								    <input type="text" class="form-control form-control-sm inputSmall" value="<?php echo $data->agent_name?>" onChange="UpdateBoardControl('agent_name','<?php echo $data->CtrlID?>', this.value,'<?php echo $data->insurance_id?>','<?php echo $data->keygroup?>')" style="width: 95px;">
								    <?php //}?>
								  <?php //echo $data->agent_name?></td>
								  <td><?php echo $txtPayment;  ?></td>
								  <td><?php echo $txtRenew?></td>
								  <td> 
									<div id="divDeleteAct<?php echo $data->CtrlID?>">  
									  <?php //echo $showBtnActDelete." |";
									  
									if($showBtnActDelete=='1'){
									?>
									  <button type="button" class="btn btn-sm btn-danger" onClick="DeleteControl('<?php echo htmlspecialchars($data->cust_name)?>','<?php echo $data->CtrlID?>')">X</button>
									  	<?php 
										}
									  ?>
								    </div>
							  </td>
    </tr>
		
	 <?php	} } ?>

	<tr>
								  <td colspan="6">&nbsp;</td>
								  <td align="right"><strong><?php echo number_format($sum_insurance_total_net,2);?></strong></td>
								  <!--<td align="right"><strong>X<?php //echo number_format($sum_insurance_price,2);?></strong></td>-->
	  <td align="right"><span id="sumAgentDiv"><strong><?php echo number_format($sumAgent,2)?></strong></span></td>
	  <td align="right">&nbsp;</td>
								  <td align="right">&nbsp;</td>
								  <td align="right"><strong><?php echo number_format($sum_recieve_amount,2)?></strong></td>
								  <td align="right"><div id="sumDelivery"><strong><?php echo number_format($sumDelivery,2)?></strong></div></td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
  </tr> 
	 </table>
</div>
<script>
$(function($) {

		$('.autonumber').autoNumeric('init');
		 $(".datepicker").datepicker({
                language:'th-th',
                format:'dd/mm/yyyy',
                autoclose: true
            });
	 });
	
	
</script>
							 