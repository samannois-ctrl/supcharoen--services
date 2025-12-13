<?php //print_r($getData['sql'])?>
<table class="table table-bordered" style="width: 100%">
	<tr>
		<th>บริษัท</th>
		<th>โค้ด</th>
		<th>ตัวแทน</th>
		<th>ประเภท</th>
		<th>ชื่อ</th>
		<th>&nbsp;</th>
		<th>ทะเบียน</th>
		<th>สุทธิ</th>
		<th>รวม</th>
	</tr>
	<?php $sumNet =0; $sumTotal = 0; foreach($getData['getDb'] AS $data){ ?>
  <tr class="<?php echo $data->insurance_type_name?>">
		<td><?php echo $data->company_name?></td>
		<td><?php echo $data->conde_name?></td>
		<td><?php echo $data->agent_name?></td>
		<td><?php echo $data->insurance_type_name?></td>
		<td><?php echo $data->cust_name?></td>
		<td><?php echo $data->WorkType?></td>
		<td><?php echo $data->vehicle_regis." ".$data->province_name?></td>
	  <td align="right"><?php echo number_format($data->total_price_net,2); $sumNet=$sumNet+$data->total_price_net?>&nbsp;</td>
	  <td align="right"><?php echo number_format($data->insurance_price,2); $sumTotal=$sumTotal+$data->insurance_price?>&nbsp;</td>
	</tr>
	<?php }?>
	<tr style="background-color:#EFEFEF">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><?php echo number_format($sumNet,2)?></td>
    <td align="right"><?php echo number_format($sumTotal,2)?></td>
  </tr>
</table> 