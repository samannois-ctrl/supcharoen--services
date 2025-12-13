<?php //echo $resultData['sql']?>
<div id="printTransfer">
<table width="100%" class=" table-striped table-bordered table-hover table-checkable order-column full-width" id="table">
  <thead>
	<tr>
		<th width="10">#</th>
		<th align="center">ชือลูกค้า</th>
		<th align="center">ทะเบียน</th>
		<th align="center">วันที่โอน</th>
		<th align="center">ธนาคาร</th>
		<th align="center">จำนวนเงิน</th>
	</tr>
	</thead>
<?php $n=1; $sumTotal = 0;foreach($resultData['result'] AS $data){?>	
	<tr>
	  <td><?php echo $n?></td>
	  <td><?php echo $data->cust_name?></td>
	  <td align="center"><?php echo $data->vehicle_regis." ".$data->province_name?></td>
	  <td align="center"><?php echo $this->insurance_model->translateDateToThai($data->pay_transfer_date);?></td>
	  <td align="center"><?php echo $data->bank_name." ".$data->bank_acc_name." ".$data->bank_number?></td>
	 <td align="right"><?php echo number_format($data->pay_transfer,2); $sumTotal=$sumTotal+$data->pay_transfer?></td>
  </tr>
	
<?php $n++; }?>
	<tr>
	  <td colspan="5" align="right">รวม&nbsp;</td>
	  <td align="right"><?php echo number_format($sumTotal,2)?></td>
  </tr>
</table>
	
</div>