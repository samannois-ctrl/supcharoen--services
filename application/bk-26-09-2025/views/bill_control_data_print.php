<style>
#printAreaOnly {
  
 display: none;
     padding: 10px;
	background-color: white
  
}

@media print {
    #printAreaOnly {
       display : block;
		background-color: white;
		font-size:11px;
	   
    }
	
	table, th, td {
      border: 1px solid black;
    }
	
	
}
	.box-subcharoen{
		text-align: center;
		padding: 10px;
		border-style: solid;
		border-width: 2px;<br>
        border-color: blue;
		font-size: 20px;
		color:#004506;
		width: 40%;
		margin: 0 auto;
		 
	}
.inputSmall {		font-size: 13px;
}
.textRight {		text-align: right;
}
</style>

<?php 
	//echo $data['sql']."<br>";
	//echo $data['sqlCaption']."<br>";
	//print_r($data['resultDataCaption']);
?>
<div id="printAreaOnly">
<h4>ทะเบียนคุมงานประเภท-พรบ. เดือน  <?php echo $monthName." ".$YearhName?></h4>

<br>
<table id="controlTable" class="table table-bordered">
  <thead>
	<tr>
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
    </tr>
</thead> 
<tbody>
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
						
						$sum_insurance_price=$sum_insurance_price+$data->act_price;
						// $sum_insurance_total_net=$sum_insurance_total_net+$data->net_balance;
				  		$sum_insurance_total_net=$sum_insurance_total_net+$data->net_balance_act;
						// $sum_insurance_total_net=$sum_insurance_total_net+$data->act_price_net;
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
				if(!isset($getOtherData['payment_amount'])){ $getOtherData['payment_amount'] = 0;}
				if(!isset($getOtherData['totalprice_installment'])){ $getOtherData['totalprice_installment'] = 0;}
				$sum_insurance_price=$sum_insurance_price+$getOtherData['totalprice_installment'];

				$insRowDisplayOther = 'style=""';
				
				//$sum_insurance_total_net=$sum_insurance_total_net+$getOtherData['totalprice_installment'];
				$sum_insurance_total_net=$sum_insurance_total_net+$data->net_balance;
				
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
									 
?>
  <tr <?php echo $insRowDisplay?> class="allData" id="insRow<?php echo $data->CtrlID?>">
    <td><?php echo $data->insurance_no?></td>
    <td><?php echo $data->cust_name?></td>
    <td><?php echo $data->vehicle_regis." ".$data->province_name?></td>
    <td><?php echo $data->company_name?></td>
    <td><?php echo $data->insurance_type_name?></td>
    <td align="right"><?php echo number_format($data->net_balance,2);?></td>
    <!-- <td align="right">X<?php echo number_format($data->insurance_price,2);?></td>-->
    <td align="right"><?php echo number_format($data->amt_recieve_ins,2);?></td>
    <td align="right" nowrap="nowrap">
      <?php $paymentDetail = $this->insurance_model->getPaymentDetail($data->countInstallment,'insurance',$data->workID,$data->insurance_data_type); 
	
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
    <td align="right"><?php     $nx=1;  foreach($paymentDetail['recieve_amount'] AS $key=>$val){
								 if($paymentDetail['ins_pay_type'][$nx-1] > 0){		 
										  echo number_format($val,2);
										  if($data->countInstallment>0){ echo "<br>";} 
										  echo '<input type="hidden" class="recieve_amt" name="revive_amt_ins'.$data->CtrlID.$nx.'" value="'.$val.'">';
										 if($insRowDisplay!=''){ $val = 0; }
										 $sum_recieve_amount = $sum_recieve_amount+$val;
									$nx++; } }
									//echo '<br>---<br>'.$sum_recieve_amount;
								?></td>
    <td align="right"><?php echo  number_format($delivery_allowance,2)?>
      <input type="hidden" id="hiddenInsAllowent<?php echo $data->CtrlID?>" name="hiddenInsAllowent<?php echo $data->CtrlID?>" value="<?php echo $data->delivery_allowance?>"></td>
    <td><?php //echo $data->check_payment_date?>
    <?php echo $this->insurance_model->translateDateToThai($data->check_payment_date)?>
     </td>
    <td><?php echo $data->agent_name?></td>
    <td><?php echo $txtPayment;  ?></td>
    <td><?php echo $txtRenew?></td>
    </tr>
  <?php } 
	if(($data->act_no!='')&&($data->insurance_data_type==1)){  
?>
  <tr <?php echo $ActRowDisplay?>  class="allData" id="insRowAct<?php echo $data->CtrlID?>">
    <td><?php echo $data->act_no?>
      <!-- [select_act_bill<?php echo $data->select_act_bill?>]--></td>
    <td><?php echo $data->cust_name?></td>
    <td><?php echo $data->vehicle_regis." ".$data->province_name?></td>
    <td><?php echo $data->actCorpName?></td>
    <td><?php echo $data->actTypeName?></td>
    <td align="right"><?php echo number_format($data->net_balance_act,2);?></td>
    <!--<td align="right">X<?php echo number_format($data->act_price,2);?></td>-->
    <td align="right"><?php echo number_format($data->amt_recieve_act,2)?></td>
    <td align="right" nowrap="nowrap"><?php //echo $data->countInstallment?>
      <?php $paymentDetail = $this->insurance_model->getPaymentDetail($data->countInstallment,'act',$data->workID,$data->insurance_data_type); 
										//				 print_r($paymentDetail);
										echo $paymentDetail['bankName'];	
										if($paymentDetail['is_credit_card']=='1'){
											echo ' '.$data->company_name;
										  }					 
															 // insuranceOther ?></td>
    <td><?php foreach($paymentDetail['receipt_date'] AS $key=>$val){ 
										      echo $val." ";
									      }
									  ?>
      </td>
    <td align="right"><?php
									if((($showBtnActDelete=='1')&&($data->countInstallment>=0))||(($showBtnActDelete=='0')&&($data->countInstallment==0))){						 
									$nx=1; 
								foreach($paymentDetail['recieve_amount'] AS $key=>$val){
								 if($paymentDetail['ins_pay_type'][$nx-1] > 0){
									echo number_format($val,2);
										echo '<input type="hidden" class="recieve_amt" name="revive_amt_act'.$data->CtrlID.$nx.'" value="'.$val.'">';
										if($data->countInstallment>0){ echo "<br>";}
										if($ActRowDisplay!=''){ $val=0;}
										$sum_recieve_amount = $sum_recieve_amount+$val;
									 $nx++;  }	 }					
									}
									
									  ?></td>
    <td align="right"><?php //if($showBtnActDelete=='1'){?>
     <?php echo number_format($data->act_delivery_allowance,2)?>
     
      <?php //}?></td>
    <td><?php //if($showBtnActDelete=='1'){?>
     <?php echo $this->insurance_model->translateDateToThai($data->act_check_payment_date)?>
      <?php //}?></td>
    <td><?php //if($showBtnActDelete=='1'){?>
      <?php echo $data->agent_name?>
      <?php //}?>
      <?php //echo $data->agent_name?></td>
    <td><?php echo $txtPayment;  ?></td>
    <td><?php echo $txtRenew?></td>
    </tr>
  <?php }  
		  if($data->insurance_data_type>1){   
			  $showBtnActDelete = '1';
			
	
			?>
  <tr <?php echo $insRowDisplayOther?>  class="allData" id="insRowAct<?php echo $data->CtrlID?>">
    <td><?php echo $data->insurance_no?></td>
    <td><?php echo $data->cust_name?></td>
    <td><?php echo $data->vehicle_regis." ".$data->province_name?></td>
    <td><?php echo $data->company_name?></td>
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
									  ?></td>
    <td align="right"><?php echo number_format($data->net_balance,2)?></td>
    <!--<td align="right">X<?php //echo number_format($getOtherData['payment_amount'],2);?></td>-->
    <td align="right">
      <?php echo number_format($data->amt_recieve_act,2)?></td>
    <td align="right" nowrap="nowrap"><?php //echo $data->countInstallment?>
       <?php 
			  				$paymentDetail = $this->insurance_model->getPaymentDetail($data->countInstallment,'insuranceOther',$data->workID,$data->insurance_data_type); 
			                 			   echo $paymentDetail['bankName']; 
											
											if($paymentDetail['is_credit_card']=='1'){
												echo ' '.$data->company_name;
											  }	
									  ?></td>
    <td><?php foreach($paymentDetail['receipt_date'] AS $key=>$val){ 
										      echo $val;
									      }
									  ?>
      </td>
    <td align="right"><?php 
			  					$nx=1;
			    				foreach($paymentDetail['recieve_amount'] AS $key=>$val){
								 if($paymentDetail['ins_pay_type'][$nx-1] > 0){	
									echo number_format($val,2);
									    if($data->countInstallment>0){ echo "<br>";} 
									    echo '<input type="hidden" class="recieve_amt" name="revive_amt_other'.$data->CtrlID.$nx.'" value="'.$val.'">';
										if($insRowDisplayOther!='style=""'){ $val = 0; }
										$sum_recieve_amount = $sum_recieve_amount+$val;
									    
								$nx++;	 } }
			  	
						//}?></td>
    <td align="right"><?php //if($showBtnActDelete=='1'){?>
      <?php echo number_format($delivery_allowance,2)?>
     </td>
    <td><?php //if($showBtnActDelete=='1'){?>
     <?php echo $this->insurance_model->translateDateToThai($data->check_payment_date)?>
      <?php //}?></td>
    <td><?php //if($showBtnActDelete=='1'){?>
      <?php echo $data->agent_name?>
      <?php //}?>
      <?php //echo $data->agent_name?></td>
    <td><?php echo $txtPayment;  ?></td>
    <td><?php echo $txtRenew?></td>
    </tr>
  <?php	} } ?>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
    </tr>
</tbody>
</table>
</div>	
<script>
function printData1(divName)
		{  
		   var divToPrint=document.getElementById(divName);
		   var newWin= window.open("");
			// newWin.print(); 
		   newWin.document.write(buildprintReservePrint(divToPrint.innerHTML));
		   setTimeout(function(){ newWin.print(); 

			newWin.close();
		   }, 1000);
		   //newWin.print();
		   //newWin.close();
		}
	$(document).ready(function(){
		printData1('printAreaOnly')
	})
</script>
