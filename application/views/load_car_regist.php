<?php 
   // echo $GetData['sql']."<br>";
   // echo 'date>>'.$GetData['date']."<br>";
	//print_r($GetData['resultData']);
?>
<style>
	.smallFont{
		font-size: 13px;!important;
	}
	
	
.form-control-small {
  
    font-size: 12px;
   
    color: #555;
	padding: 8px 3px;!important;
    
}
</style>
<table width="100%" class="table table-bordered smallFont">
	<thead>
		<tr>
			<th rowspan="2" align="center">ชื่อ</th>
			<th rowspan="2" align="center">ทะเบียน</th>
			<th rowspan="2" align="center">รหัส</th>
			<th rowspan="2" align="center">ขนาดเครื่องยนต์</th>
			<th rowspan="2" align="center">ยี่ห้อ</th>
			<th rowspan="2" align="center" width="60">รุ่น</th>
			<th colspan="3" align="center"><div align="center">วันจดทะเบียน</div></th>
			<th colspan="2" align="center"><div align="center">พ.ร.บ.</div></th>
		</tr>
		<tr>
		  <th align="center" width="40">วัน</th>
		  <th align="center">เดือน</th>
		  <th width="75" align="center">ปี</th>
		  <th width="85" align="center">คุ้มครอง</th>
		  <th width="85" align="center">สิ้นสุด</th>
      </tr>
	 <?php foreach($GetData['resultData'] AS $data){?>	
		<tr>
		  <td nowrap="nowrap"><?php echo $data->cust_name?></td>
		  <td><?php echo $data->vehicle_regis." ".$data->province_name?></td>
		  <td>
			<select name="car_type_id<?php echo $data->workID?>" class="form-control-small form-control  form-control-xs" id="car_type_id<?php echo $data->workID?>" aria-label="" onChange="updateCarData('<?php echo $data->CarID?>','car_type_id',this.value)" >
				<option value="x">ประเภทรถ</option>
				<?php foreach($listCarType AS $carType){?>
			<option value="<?php echo $carType->id?>" <?php if($data->car_type_id==$carType->id){ echo "selected"; }?> ><?php echo $carType->type_name?></option>
				<?php }?>			
						</select>
		  </td>
		  <td>
				<select class="form-control-small  form-control form-control-xs" onChange="updateCarData('<?php echo $data->CarID?>','type_premium_id',this.value)">
			  		<option value="0">-เลือก-</option>
					<?php foreach($listCarPremium AS $premium){?>
		  		  <option value="<?php echo $premium->id?>" <?php if($premium->id==$data->type_premium_id){ echo "selected";}?> ><?php echo $premium->cc?></option>
					<?php }?>
			    </select>	
		  </td>
		  <td>
			<select class="form-control-small form-control form-control-xs" onChange="updateCarData('<?php echo $data->CarID?>','brand_id',this.value)">
			  		<option value="0">-เลือก-</option>
					<?php foreach($listCarBrand AS $cBrand){?>
			  		<option value="<?php echo $cBrand->id?>" <?php if($cBrand->id==$data->brand_id){ echo "selected";}?> ><?php echo $cBrand->car_brand_name?></option>
					<?php }?>
			    </select>	
		  </td>
		  <td><input type="text"  class="form-control form-control-small  form-control-xs "  style="width: 60px" value="<?php echo $data->car_model?>" onChange="updateCarData('<?php echo $data->CarID?>','car_model',this.value)" ></td>
		  <td>
			  
			   <?php 
		     //echo $data->dateCarRegis."<br>";
			 $dateRegisArray=''; $dateRegisArray = explode("-",$data->dateCarRegis);
			         if(!isset($dateRegisArray[2])){ $dateRegisArray[2]='';}
			         if(!isset($dateRegisArray[1])){ $dateRegisArray[1]='';}
					 if($dateRegisArray[1]=='x'){ $dateRegisArray[1]='';}								
			         if(!isset($dateRegisArray[0])){ $dateRegisArray[0]='';}
			    //echo "<br>0>".$dateRegisArray[0]." 1>".$dateRegisArray[1]." 2>".$dateRegisArray[2]."<br>"
			  ?>
			  
	      <input name="date_regist<?php echo $data->CarID?>" id="date_regist<?php echo $data->CarID?>" type="text" class="form-control  form-control-xs carInput"  placeholder=""  value="<?php echo $dateRegisArray[2]?>" style="width: 45px;"  onChange="updateCarData('<?php echo $data->CarID?>','date_regist',this.value)" ></td>
		  <td>
			 
			  <select id="month_regist<?php echo $data->CarID?>" name="month_regist<?php echo $data->CarID?>" class="form-control form-control-small form-control-xs" aria-label="" onChange="updateCarData('<?php echo $data->CarID?>','month_regist',this.value)" >
						<option value="x" >-เดือน-</option>
						<?php foreach($monthArray AS $monthID=>$monthName){?>
				<option value="<?php echo $monthID?>" <?php if($dateRegisArray[1]==$monthID){ echo "selected";}?> ><?php echo $monthName?></option>
						<?php }?>
		  </select></td>
		  <td>
			  <input name="year_car<?php echo $data->CarID?>" type="text" class="form-control form-control-small carInput" id="year_car<?php echo $data->CarID?>" placeholder="พ.ศ." value="<?php echo $data->year_car?>" style="width: 75" onChange="updateCarData('<?php echo $data->CarID?>','year_car',this.value)" >
			</td>
		  <td>
			  <input name="act_date_start<?php echo $data->workID?>" type="text" class="form-control  form-control-xs datepicker" id="act_date_start<?php echo $data->workID?>" placeholder="" onchange="setEndDate(this.value,'act_date_end<?php echo $data->workID?>',1); updateWorkData('<?php echo $data->workID?>','act_date_start',this.value)"  value="<?php echo $this->inspection_model->translateDateToThai($data->act_date_start)?>" readonly=""  style="width: 85px;">
			
			</td>
		  <td>
			  <input name="act_date_end<?php echo $data->workID?>" type="text" class="form-control  form-control-xs datepicker" id="act_date_end<?php echo $data->workID?>" placeholder="" value="<?php echo $this->inspection_model->translateDateToThai($data->act_date_end)?>" readonly=""  style="width: 85px;" onChange="updateWorkData('<?php echo $data->workID?>','act_date_end',this.value)" >
			</td>
	  </tr>
	  <?php }?>
	</thead>
	<tbody>
		
	</tbody>

</table>
<script>
	//------------------------
   function setEndDate(dateStart,fieldName,amtYear){
	    var amtYear = parseInt(amtYear);
	    var arr = dateStart.split('/');
	    var yearNum = parseInt(arr[2]);
	    var nextYear = yearNum + amtYear;
	    var newDate = arr[0]+"/"+arr[1]+"/"+nextYear;
	    // console.log('newDate>'+newDate)
	    $('#'+fieldName).val(newDate);
   }	
	
	$(document).ready(function(){
		
		
		$(".datepicker").datepicker({
                language:'th-th',
                format:'dd/mm/yyyy',
                autoclose: true
            });
	})

</script>