<div class="row">
	<label class="col-sm-2 control-label"></label>
	<div class="col-sm-10 ">
<ul>
	<?php foreach($listCust AS $data){?>
	<li><?php echo $data->cust_name."&nbsp;&nbsp;".$data->cust_telephone_1?>&nbsp;&nbsp;&nbsp;
		[
		<a href="javascript:void(0)" onClick="setFormCustValue('<?php echo $data->id?>','<?php echo htmlspecialchars($data->cust_name)?>','<?php echo $data->cust_telephone_1?>','<?php echo $data->cust_telephone_2?>','<?php echo $data->is_corporation?>','<?php echo $data->cust_nickname?>')">
		ใช้ข้อมูลนี้
		</a>
		]</li>
	<?php }?>
</ul>

</div>
</div>