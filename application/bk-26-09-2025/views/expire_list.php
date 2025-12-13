<?php //print_r($resultData['sql']);?>
<?php //print_r($resultData);?>


	<table class="table table-striped table-bordered table-hover table-checkable"  id="table_expire">
		<thead>
			<tr>
				<th>ลำดับ</th>
				<th>ชือ-สกุล</th>
				<th>โทรศัพท์</th>
				<th>ประเภทรถ</th>
				<th>ทะเบียน</th>
				<th>วันจดทะเบียน</th>
				<th>อายุรถ</th>
				<th>วันสิ้นอายุภาษี</th>
				<th>วันที่สิ้นสุด พ.ร.บ.</th>
				<th style="">การแจ้งเตือน</th>
				<th>ต่ออายุ</th>
			</tr>
		</thead>
		<tbody>
		<?php $n=1; foreach($resultData['resultData'] AS $data){
					if($data->follow_insurance=='1'){ $checkFollow="checked";}else{ $checkFollow=""; }
					if($data->alert_success=='1'){ $trClass = 'bgGreen'; }else if($data->alert_success=='2'){ $trClass="bgRed"; }else{ $trClass =''; }
					
			?>
			<tr id="Row<?php echo $data->workID?>" class="<?php echo $trClass?>" >
			  <td><?php echo $n?></td>
			  <td><?php echo $data->cust_name." ".$data->cust_nickname?></td>
			  <td><?php echo $data->custTelephoneNo?></td>
			  <td><?php echo $data->type_name?></td>
			  <td><?php echo $data->vehicle_regis?></td>
			  <td><?php echo $this->insurance_model->translateDateToThai2($data->date_regist)?></td>
			  <td align="center">
			  <?php  
				//$yearArray = explode("-",$data->date_regist);
				//if(isset($yearArray[0])){
				//	echo $data->date_regist;
				//}
				
				if(($data->year_car!='')&&($data->year_car!='0000')){
					$checkDigit = strlen($data->year_car);
					if($checkDigit==2){
						$data->year_car = 2500+$data->year_car;
					}
					$currentYear = date("Y")+543;
					$diffYear  = $currentYear-$data->year_car;
					echo $diffYear;
				}
				//echo $data->date_regist; /*$lastdate = "2016-01-23";
/*$currentDate = date("Y-m-d");
$diff = date_diff(date_create($lastdate), date_create($currentDate));
$years = $diff->y; */
				$check="";
				if($data->close_alert=='1'){
					 $check="checked";
				}
				  		 
				  	?>
			  </td>
			  <td><?php echo $this->insurance_model->translateDateToThai($data->date_registration_end)?></td> 
			  <td><?php echo $this->insurance_model->translateDateToThai($data->act_date_end)?></td> 
			  <td>
				<div>ครั้งที่ 1 <input type="text" class="form-control form-control-sm" value="<?php echo $data->note_expire_1?>" onChange="updateNote(this.value,'note_expire_1', '<?php echo $data->workID?>')" ></div>
				<div>ครั้งที่ 2<input type="text" class="form-control form-control-sm"  value="<?php echo $data->note_expire_2?>"  onChange="updateNote(this.value,'note_expire_2', '<?php echo $data->workID?>')" ></div>
				<div>ครั้งที่ 3<input type="text" class="form-control form-control-sm"  value="<?php echo $data->note_expire_3?>"  onChange="updateNote(this.value,'note_expire_3', '<?php echo $data->workID?>')" ></div>
				
			  </td>
			  <td>
				  <div  class="bt-border-x">
				  <a href="<?php echo base_url('Insurance_car/work_car_all/'.$data->custID.'/'.$data->carID.'/'.$data->workID.'/renew')?>" class="btn btn-primary btn-sm" target="_blank">ต่ออายุ</a>
				  </div>	
				  
				 <div style="margin-top: 20px;">
				  <span class="text-danger" >
				  <input type="checkbox" onclick="UpdateAlert('<?php echo $data->workID?>',this)" <?php echo $check?> >
				  ปิดแจ้งเตือน </span>
				
				  </div>
				 	 
				  
			</td>
		  </tr>
		 <?php $n++; }?>
		</tbody>
	</table>
	
<script>
	function UpdateAlertRemark(e,custName,workID){
		 if(confirm('ต้องการเปลี่ยนการแจ้งเตือน '+custName)){
			 
			  var changeValue = e.value;
			 
			  $.post('<?php echo base_url('insurance_car/UpdateAlertRemark')?>',{ changeValue:changeValue,workID:workID},function(data){
					var obj= JSON.parse(data);
					if(obj.doDb=='1'){
						alert('แก้ไขหมายเหตุเรียบร้อยแล้ว');
					}else{
						alert('ไม่สามารถหมายเหตุได้ ');
					    console.log(data);
					}
			    })
		 }else{
			 return false;
		 }
	}
	
	function updateFollowIns(e,custName,workID){
		 if(confirm('ต้องการเปลี่ยนการแจ้งเตือน '+custName)){
			 if(e.checked==true){
				  var changeValue = 1;
			 }else{
				 var changeValue = 0;
			 }
			
			 
			  $.post('<?php echo base_url('insurance_car/updateFollowIns')?>',{ changeValue:changeValue,workID:workID},function(data){
					var obj= JSON.parse(data);
					if(obj.doDb=='1'){
						if(changeValue==0){
							$('#TdFollow'+workID).removeClass('bgYellow');
							console.log('removeClass')
						}else if(changeValue==1){
							$('#TdFollow'+workID).addClass('bgYellow');
							console.log('addClass')
						}
					}
			    })
		 }else{
			 return false;
		 }
	}
	
	function updateAlert(e,custName,workID){
		 if(confirm('ต้องการเปลี่ยนการแจ้งเตือน '+custName)){ 
			 var changeValue = e.value;
			  $.post('<?php echo base_url('insurance_car/updateAlert')?>',{ changeValue:changeValue,workID:workID},function(data){
					var obj= JSON.parse(data);
					if(obj.doDb=='1'){
						if(changeValue==0){
							$('#Row'+workID).removeClass('bgRed');
							$('#Row'+workID).removeClass('bgGreen');
						}else if(changeValue==1){
							$('#Row'+workID).addClass('bgGreen');
						}else if(changeValue==2){
							$('#Row'+workID).addClass('bgRed');
						}
					}
			    })
		 }else{
			 return false;
		 }
	}
	
	
	$(document).ready(function(){
		 /* $('#table_expire').DataTable( {
			  "paging": true,
			  "pagelengh" : 50 ,
			  "ordering": false,
			  "oLanguage": {
			   "sSearch": "ค้นหา"
			 }
		} );*/
 })	

</script>