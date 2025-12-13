<table width="100%" class="table table-bordered">
<thead>
<tr>
	<td width="175">ชื่อ - นามสกุล / ชื่อเล่น</td>
	<td width="160">โทรศัพท์</td>
	<td width="211">ข้อมูลรถ</td>
	
	<td width="196">หมายเหตุ</td>
	<td width="77">&nbsp;</td>
	<td width="87">ซ่อนรายการ</td>
</tr>
	<?php foreach($resultData AS $data){ 
			if($data->type_name!=''){ $data->type_name = "(".$data->type_name.")"; }
	?>
<tr>
  <td><?php echo $data->cust_name?><br>
	  <?php echo $data->cust_nickname?>
  </td>
  <td><?php echo $data->cust_telephone_1; if($data->cust_telephone_2!=''){ echo " ,".$data->cust_telephone_2; }?></td>
  <td><?php echo $data->vehicle_regis." ".$data->province_name." ".$data->type_name." <br>".$data->car_brand_name." ".$data->car_model." <br>วันจดทะเบียน :".$data->date_regist." ".$data->month_regist." ".$data->year_car." "?>
	
</td>
  <td><textarea class="form-control" onChange="updateAnticipateRemark('<?php echo $data->id?>',this.value)"><?php echo $data->anticipate_remark?></textarea></td>
  <td><a href="<?php echo base_url('Insurance_car/work_insurance_add/anticipate/anticipate/'.$data->id)?>" class="btn btn-success">ทำรายการ</a></td>
  <td><button type="button" class="btn btn-danger" onClick="hideThis('<?php echo $data->id?>','<?php echo htmlspecialchars($data->cust_name)?>')">ซ่อนรายการ</button></td>
  </tr>
<?php }?>
</thead>
<tbody>

</tbody>
</table>