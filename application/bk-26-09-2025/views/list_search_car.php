<div class="row">
	<label class="col-sm-2 control-label"></label>
	<div class="col-sm-10 ">
<ul>
	<?php foreach($listCar AS $data){?>
	<li><?php echo $data->vehicle_regis."&nbsp;&nbsp;".$data->province_name."&nbsp;&nbsp;".$data->car_brand?>&nbsp;&nbsp;&nbsp;
		[
		<a href="javascript:void(0)" onClick="setFormCarValue('<?php echo $data->id?>','<?php echo $data->vehicle_regis?>','<?php echo $data->province_regis;?>','<?php echo $data->date_regist?>','<?php echo $data->year_car?>','<?php echo $data->vin_no?>','<?php echo $data->engine_size?>','<?php echo $data->car_brand?>','<?php echo $data->car_model?>','<?php echo $data->car_type_id?>')">
		ใช้ข้อมูลนี้
		</a>
		]</li>
	<?php }?>
</ul> 

</div>
</div>