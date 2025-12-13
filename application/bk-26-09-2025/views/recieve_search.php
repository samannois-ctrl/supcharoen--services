<?php //echo $getDb['sql']?>
<table class="table">
	<tr>
		<th>ชื่อ</th>
		<th>ป้ายทะเบียน</th>
		<th>ประเภท</th>
		<th>เลือก</th>
  </tr>
	<?php $n=0;  foreach($getDb['resultData'] AS $data){ 
				 $link ='';
				 if(!isset($data->province_name)){ $data->province_name=''; }
				 if($data->insurance_data_type==1){
					 $link = base_url('Insurance_car/work_insurance_add/').$data->id;
				 }else if($data->insurance_data_type>1){
					  $getInsuranceOtherID = $this->insurance_other_model->getOtherID($data->insurance_data_type,$data->id);
					  $link = base_url('Insurance_other/work_insurance_other_add/').$data->insurance_data_type."/".$data->id."/".$getInsuranceOtherID['insuranceOtherID'];
				 }
	?>
	<tr>
		<td><a href="<?php echo $link?>" target="_blank">
			<?php echo $data->cust_name; ?>
			</a>
		  <!--[ <?php echo $data->id?> ]-->
			
		</td>
		<td><?php echo $data->vehicle_regis.' '.$data->province_name;?></td>
		<td><?php switch($data->insurance_data_type){
		case "1" :
			echo "ประกันภาคสมัครใจ";
		break;
		case "2" :
			echo "ประกันท่องเที่ยว";
		break;
		case "3" :
			echo "ประกันขนส่ง";
		break;
		case "4" :
			echo "ประกันอุบัติเหตุ";
		break;
		case "5" :
			echo "ประกันบ้าน";
		break;			
	  		}?>
		</td>
		<td><button type="button" class="btn btn-warning btn-sm" onClick="addRecieveChild('<?php echo $data->id?>','<?php echo $data->insurance_data_type?>');"><i class="fa fa-plus"></i> เลือก</button></td>
	</tr>
  <?php $n++; }?>
  <?php if($n==0){?>
 	 <tr>
		<td colspan="4" align="center">ไม่พบข้อมูล</td>
		
	</tr>
  <?php }?>
</table>