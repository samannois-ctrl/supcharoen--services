<?php //echo $resultData['sql'];
	  //echo "<br>";
	 // print_r($resultData['getDb']);
function displaycurrency($value){
	if($value > 0){
		$return = number_format($value,2);
	}else{
		$return = '';
	}
	return $return;
}
function displayNum($value){
	if($value > 0){
		$return = $value;
	}else{
		$return = '';
	}
	return $return;
}
?><style>
	.alg-right{
		text-align: right;
	}
	.alg-left{
		text-align: left;
	}
	.TopBorder{
		border-top-style: solid;
		border-top-color: red;
		border-top: 3px;
	    background-color:#FFF0D6;
		vertical-align: bottom;
		color : #6b5b47;
	}
	.txtGreen{
		color: #b8941f;;
	}
</style>
<?php //print_r($audit);
//echo $audit['canCheckPayment']?>
<table style="" class="table ">
   <?php $checkMainID='x'; 
	$nRow = 1;
	foreach($resultData['getDb'] AS $data){ 
		  $sumRow[$data->mainID] = 0;
	      $sumRow[$data->mainID] = $data->carcheck_amt+$data->tax_amt+$data->tax_service_amt+$data->act_amt+$data->insurance_amt;
	if($checkMainID!=$data->mainID){ 
		 $sumTotal[$data->mainID] = 0;
		 
		 //---------check payment pass---
		 if(($data->check_payment_pass=='1')&&($audit['canCheckPayment']=='1')){
			$txtCheck = 'checked';
			$txtBtn = 'btn-success';
		 }else if(($data->check_payment_pass=='0')&&($audit['canCheckPayment']=='1')){
			$txtCheck = '';
			$txtBtn = 'btn-danger';
		 }else{
			$txtBtn = 'btn-success';
		 }


	?> 
	<tr class="TopBorder">
	  <td colspan="8"><!--[<?php echo 'checkMainID>'.$checkMainID." mainID>".$data->mainID?>]-->
	 <?php if($audit['canCheckPayment']=='1'){?>
	  <input type="checkbox" name="check<?php echo $data->mainID?>" id="check<?php echo $data->mainID?>" onclick="updateCheck(this,'<?php echo $data->mainID?>')" <?php echo $txtCheck?> >  
    <?php }?>
	  &nbsp;
		<strong>
		<span class='txtGreen'>วันที่ชำระเงิน :</span>&nbsp;&nbsp; <?php echo $this->insurance_model->translateDateToThai($data->date_transfer)?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<span class='txtGreen'>วิธีชำระเงิน :</span><?php echo $data->PayType?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class='txtGreen'>ธนาคาร :</span>&nbsp;<?php echo $data->bankName?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class='txtGreen'>ผู้ชำระเงิน :</span>&nbsp;&nbsp;<?php echo $data->payment_by?> &nbsp;&nbsp;&nbsp; <?php if($data->remark!=''){ echo ' หมายเหตุ: '.$data->remark; } ?>
<br>
		<!--ชื่อผู้ชำระเงิน&nbsp;&nbsp; : <?php echo $data->payment_by?>&nbsp;&nbsp;&nbsp;&nbsp; วันที่ชำระเงิน :&nbsp;&nbsp; <?php echo $this->insurance_model->translateDateToThai($data->date_transfer)?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data->bankName?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  จำนวนเงิน : <?php echo number_format($data->transfer_amt)?> บาท  &nbsp;&nbsp;(<?php echo $data->PayType?>)
			&nbsp;&nbsp;&nbsp; <?php if($data->remark!=''){ echo ' หมายเหตุ: '.$data->remark; } ?>--->
		  </strong>
		</td>
		<td align="right">
		  	 <a id='btn<?php echo $data->mainID?>' href="<?php echo base_url('record_recipe/record_recipe_add/'.$data->mainID)?>" class="btn <?php echo $txtBtn?> btn-xs" target="_blank">รายละเอียด</button>		
	   </td>
    </tr>
	<tr style="background-color:#F3F3F3">
	  
      <td>ทะเบียน</td>
      <td>ตรวจสภาพ</td>
	  <td>ค่าภาษี</td>
	  <td>ค่าบริการต่อภาษี</td>
	  <td>พ.ร.บ.</td>
	  <td>ประกันภัย</td>
	  <td>รับทั่วไป</td>
	  <td width="100">ผ่อนงวด</td>
	  <td>รวม</td>
    </tr>
	<?php $nRow=1; } ?>
    <tr>
      <td><?php echo $data->customer_desc;?> </td>
      <td><?php echo displaycurrency($data->carcheck_amt);?></td>
      <td><?php echo displaycurrency($data->tax_amt);?></td>
      <td><?php echo displaycurrency($data->tax_service_amt);?></td>
      <td><?php echo displaycurrency($data->act_amt);?></td>
      <td><?php echo displaycurrency($data->insurance_amt);?></td>
      <td><?php if($data->recieve_normal=='1'){ echo displaycurrency($data->transfer_amt); }?></td>
      <td><?php echo displayNum($data->installment_period)?></td>
      <td><?php echo displaycurrency($sumRow[$data->mainID]);
		  		$sumTotal[$data->mainID] = $sumTotal[$data->mainID]+$sumRow[$data->mainID];
		  ?>
		</td>
    </tr>
	<?php if($nRow==$data->CountMaxRow){?>
    <tr>
      <td>&nbsp;<?php //echo $nRow." | ".$data->CountMaxRow?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="right">รวมทั้งหมด&nbsp;</td>
      <td><strong><?php echo displaycurrency($sumTotal[$data->mainID]);?></strong></td>
    </tr>
	<?php } $checkMainID=$data->mainID; $nRow++; }?>
</table>
