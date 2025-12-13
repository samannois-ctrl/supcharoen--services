<div style="clear: both">&nbsp;</div>
<?php //print_r($getData['sql'])?>

<?php //print_r($getData['getId'])?>
<?php //echo $getData['sqlPaymentCash']?>
<?php //echo $getData['sqlSelectData']?>
<?php // echo 'hideSuccess>'.$hideSuccess?>

<div class="row table-responsive">
<?php 
	    if(!isset($getData['maxPeriod'])){ $getData['maxPeriod']=1; } //config peroid

         //-----------list data payment -------//
		 foreach($getData['dataPayment'] AS $payment){
			 
			 $is_pay[1][$payment->work_id] = $payment->is_payment1;
			 $due_date[1][$payment->work_id] = $payment->due_date1;
			 $payment1[1][$payment->work_id] = $payment->payment1;
			 $receipt_date[1][$payment->work_id] = $payment->receipt_date1;
			
			 $is_pay[2][$payment->work_id] = $payment->is_payment2;
			 $due_date[2][$payment->work_id] = $payment->due_date2;
			 $payment1[2][$payment->work_id] = $payment->payment2;			 
			 $receipt_date[2][$payment->work_id] = $payment->receipt_date2;			 
	
			 $is_pay[3][$payment->work_id] = $payment->is_payment3;
			 $due_date[3][$payment->work_id] = $payment->due_date3;
			 $payment1[3][$payment->work_id] = $payment->payment3;	
			 $receipt_date[3][$payment->work_id] = $payment->receipt_date3;	

			 $is_pay[4][$payment->work_id] = $payment->is_payment4;
			 $due_date[4][$payment->work_id] = $payment->due_date4;
			 $payment1[4][$payment->work_id] = $payment->payment4;
			 $receipt_date[4][$payment->work_id] = $payment->receipt_date4;

			 $is_pay[5][$payment->work_id] = $payment->is_payment5;
			 $due_date[5][$payment->work_id] = $payment->due_date5;
			 $payment1[5][$payment->work_id] = $payment->payment5;		 
			 $receipt_date[5][$payment->work_id] = $payment->receipt_date5;		 

			 $is_pay[6][$payment->work_id] = $payment->is_payment6;
			 $due_date[6][$payment->work_id] = $payment->due_date6;
			 $payment1[6][$payment->work_id] = $payment->payment6;
			 $receipt_date[6][$payment->work_id] = $payment->receipt_date6;

			 $is_pay[7][$payment->work_id] = $payment->is_payment7;
			 $due_date[7][$payment->work_id] = $payment->due_date7;
			 $payment1[7][$payment->work_id] = $payment->payment7;			 
			 $receipt_date[7][$payment->work_id] = $payment->receipt_date7;			 

			 $is_pay[8][$payment->work_id] = $payment->is_payment8;
			 $due_date[8][$payment->work_id] = $payment->due_date8;
			 $payment1[8][$payment->work_id] = $payment->payment8;	
			 $receipt_date[8][$payment->work_id] = $payment->receipt_date8;	

			 $is_pay[9][$payment->work_id] = $payment->is_payment9;
			 $due_date[9][$payment->work_id] = $payment->due_date9;
			 $payment1[9][$payment->work_id] = $payment->payment9;			 
			 $receipt_date[9][$payment->work_id] = $payment->receipt_date9;			 

			 $is_pay[10][$payment->work_id] = $payment->is_payment10;
			 $due_date[10][$payment->work_id] = $payment->due_date10;
			 $payment1[10][$payment->work_id] = $payment->payment10;					 
			 $receipt_date[10][$payment->work_id] = $payment->receipt_date10;					 
		 }

		 $section1='off'; $section2='off';
		if($payType=='all'){ $section1='on';$section2='on';}
		if($payType=='1'){ $section1='on';}
		if($payType=='2'){ $section2='on';}
		
		$n=1; $sumPay = 0; $sumOverdue = 0; 

//echo  'section1> '.$section1."  section2> ".$section2;
?>
<div class="table-responsive">
<table class="table-bordered" width="100%" cellpadding="5">
	<thead>
	<tr>
		<th>#</th>
		<th align="center">ชื่อ</th>
		<th align="center">ชื่อเล่น</th>
		<th align="center">ตัวแทน</th>
		<th align="center">เบอร์โทร</th>
		<th align="center">ป้ายทะเบียน</th>
		<th align="center">ยอดผ่อนชำระ</th>
		<?php for($i=1;$i<=$getData['maxPeriod'];$i++){?><th align="center">งวดที่ <?php echo $i?></th><?php } ?>	
		<th align="center">รวมจ่ายแล้ว</th>
		<th align="center">รวมคงค้าง</th>
	</tr>
	
	</thead>
	<tbody>
	<?php if($section2=='on'){  foreach($getData['resultData'] AS $data){?>
	 <tr>
	  <td><?php echo $n?></td>
	  <td>
		  <?php if($data->insurance_data_type=='1'){ 
				echo "<a href =".base_url('Insurance_car/work_insurance_add/').$data->work_id." target='_blank'> ";
		        }else if($data->insurance_data_type=='4'){ 
		  		
				$otherID = $this->report_model->getInsOtherID($data->insurance_data_type,$data->work_id);
 		        echo "<a href =".base_url('Insurance_other/work_insurance_other_add/4/185/11')." target='_blank'> ";
		        }
		  ?>
		        
		  
		  <?php echo $data->cust_name?> <!--[<?php echo $data->data_status?>]-->
	       </a>
	  </td>
	  <td><?php echo $data->cust_nickname?></td>
	  <td><?php echo $data->agent_name?></td>
	  <td><?php echo $data->cust_telephone?></td>
	  <td><?php echo $data->vehicle_regis." ".$data->province_name?> </td>
	  <td align="right"><?php echo number_format($data->amount_installment,2)?></td>
	  <?php $textClass=''; $sumPayRow=0; $SumAllRow=0; for($i=1;$i<=$getData['maxPeriod'];$i++){ 
			 if(!isset($payment1[$i][$data->work_id])){ $payment1[$i][$data->work_id] =0;}
			 if(!isset($is_pay[$i][$data->work_id])){ $is_pay[$i][$data->work_id] =0;}
			  
			 $SumAllRow =  $SumAllRow+ $payment1[$i][$data->work_id];
			if($is_pay[$i][$data->work_id]=='1'){ 
				$textClass="text-primary";
				if($receipt_date[$i][$data->work_id]!='0000-00-00'){ $txtDate  = "<small>".$this->insurance_model->translateDateToThai($receipt_date[$i][$data->work_id])."</small>"; }else{  $txtDate = ''; }
				$sumPayRow  = $sumPayRow+$payment1[$i][$data->work_id];
			}else{ 
				$textClass="text-danger";  
				if(isset($due_date[$i][$data->work_id])){
				if($due_date[$i][$data->work_id]!='0000-00-00'){ $txtDate  = "<small>".$this->insurance_model->translateDateToThai($due_date[$i][$data->work_id])."</small>"; }else{  $txtDate = ''; }
			    }else{
					$txtDate ='';
				}
			}
		?>	
			<td class="<?php echo $textClass?>" align="right"><!--[<?php //echo $is_pay[$i][$data->work_id]?>]-->
			 <?php if(isset($payment1[$i][$data->work_id])){  echo number_format($payment1[$i][$data->work_id],2)."<br>".$txtDate; }?>
			</td>
	 <?php  $textClass='';} ?>	
	  <td align="right"><?php echo number_format($sumPayRow,2); $sumPay=$sumPay+$sumPayRow;?></td>
	  <td align="right" class="text-danger"><?php echo number_format(( $SumAllRow-$sumPayRow),2);  $sumOverdue = $sumOverdue+($SumAllRow-$sumPayRow); ?>&nbsp;</td>
	  </tr>
	<?php $n++; $sumPayRow=0; $SumAllRow=0;} ?> 
    <?php } 
		if($section1=='on'){ 
		?>	
	<?php foreach($getData['dataPaymentCash'] AS $cashData){  ?>
	<tr>
	   <td><?php echo $n?></td>
	   <td><?php //print_r($cashData);
				echo "<a href =".base_url('Insurance_car/work_insurance_add/').$cashData->id." target='_blank'> ";
		   											
			  echo $cashData->cust_name?> <!--[ Cash <?php echo $cashData->data_status?> ]-->
	       </a>												
		  </td>
	   <td><?php echo $cashData->cust_nickname?></td>
	   <td><?php echo $cashData->agent_name?></td>
	   <td><?php echo $cashData->cust_telephone?></td>
	   <td><?php echo $cashData->vehicle_regis." ".$cashData->province_name?></td>
	   <td>เงินสดค้างชำระ</td>
	   <?php for($i=1;$i<=$getData['maxPeriod'];$i++){?>

		<td class="text-danger" align="right">
				  <?php 
		   			if($i=='1'){ echo number_format($cashData->payment_amount,2)."<br>"."<small>".$this->insurance_model->translateDateToThai($cashData->cash_duedate)."</small>"; }
		   			
				//echo "//".$cashData->pay_cash_status;
			?>
		
		</td>

		<?php }?>
	   <td align="right">&nbsp;</td>
	   <td align="right" class="text-danger"><?php echo number_format($cashData->payment_amount,2); $sumOverdue = $sumOverdue+$cashData->payment_amount;?>&nbsp;</td>
	   </tr>
	
	<?php $n++; } ?>
    <?php }?>

	<tr style="background-color: #FFD6A9;font-size: 18px">
	  <td colspan="<?php echo $getData['maxPeriod']+7?>" align="right"><strong>รวม</strong></td>
	  
	  <td align="right"><?php echo number_format($sumPay,2)?></td>
	  <td align="right" class="text-danger"><?php echo number_format($sumOverdue,2)?>&nbsp;</td>
	 </tr>
	</tbody>

</table>
<?php //print_r($getData['dataPaymentCash'])?>
</div>
	

</div>