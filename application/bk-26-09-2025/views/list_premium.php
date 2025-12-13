<?php //print_r($resultData)?>

<table width="100%" class="table table-bordered">
			    <tr>
			      <th width="47%">ขนาดเครื่องยนต์</th>
			      <th width="29%">เบี้ยรวม</th>
			      <th width="24%">เบี้ยชำระ</th>
			      </tr>
	<?php foreach($resultData AS $data){?>
			    <tr>
			      <th><input type="text" class="form-control form-control-sm" value="<?php echo $data->cc?>" onChange="UpdatePremium('<?php echo $data->id?>','cc',this.value,'<?php echo $data->tbl_car_type_id?>')"></th>
			      <th><input type="number" class="form-control form-control-sm" value="<?php echo $data->total_premium?>"  onChange="UpdatePremium('<?php echo $data->id?>','total_premium',this.value,'<?php echo $data->tbl_car_type_id?>')"></th>
			      <th><input type="number" class="form-control form-control-sm" value="<?php echo $data->premium?>"  onChange="UpdatePremium('<?php echo $data->id?>','premium',this.value,'<?php echo $data->tbl_car_type_id?>')"></th>
			      </tr>
	<?php }?>
</table>