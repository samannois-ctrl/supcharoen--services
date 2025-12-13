<?php //print_r($data['sql'])?>
<?php //print_r($data['resultData'])?>
<div class="row">
<div class="col-md-12">
<strong class="text-danger">ผลการค้นหา</strong> 
	<div class="pull-right"><button type="button" class="btn btn-sm btn-danger" onClick="clearSearchArea()">X</button></div>
	<br>
<table class="table table-bordered ">
	<thead>
		<tr>
	
			<td>เลขที่กรมธรรม์</td>
			<td>ชื่อลูกค้า</td>
			<td>ป้ายทะเบียน</td>
			<td>วันคุ้มครองประกัน</td>
			<!--<td>วันคุ้มครอง พ.ร.บ.</td>-->
			<td>เลือก</td>
		</tr>
		
	</thead>
	<tbody>
	 <?php foreach($data['resultData'] AS $data){?>	
		<tr id="row<?php echo $data->id?>">
		
		  <td><?php echo $data->insurance_no?></td>
		  <td><?php echo $data->cust_name?>
			 <?php if(($data->insurance_data_type=='1')||($data->insurance_data_type=='2')){ echo $data->vehicle_regis; }?>
		  </td>
		  <td><?php echo $data->vehicle_regis?></td>
		  <td><?php echo $this->insurance_model->translateDateToThai($data->insurance_start)?></td>
		 <!-- <td><?php //if($data->act_date_start!='x') { echo $this->insurance_model->translateDateToThai($data->act_date_start); }?></td>-->
		  <td>
			  <button type="button" class="btn btn-success btn-sm" onClick="addToBControl('<?php echo $data->id?>','0','<?php echo $data->insurance_data_type?>')"><i class="fa fa-plus"></i></button>
			  <!--<button type="button" class="btn btn-success btn-sm" onClick="addToBilling('<?php //echo $data->id?>')"><i class="fa fa-plus"></i></button>-->
			</td>
	  </tr>
	 <?php }?>
	</tbody>
	
</table>
<hr class="col-xs"></div>
</div>