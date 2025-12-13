<?php //print_r($DataCarBrand);?>
<table width="100%" class="table table-bordered">
	<thead>
		<tr>
			<th>#</th>
			<th>ยี่ห้อ</th>
			<th>สถานะ</th>
			<th>แก้ไข</th>
		</tr>
	</thead>
	<tbody>
	 <?php  $n=1; foreach($DataCarBrand AS $data){ 
	 				$txt1 = ""; $txt0 ="";  $bgColor='';$txtUse='';
				    if($data->car_brand_status=='1'){
						$txt1 = "selected";
						$bgColor ="";
						$txtUse = "ใช้งาน";
					}else  if($data->car_brand_status=='0'){
						$txt0 = "selected";
						$bgColor ='style="background-color: #FFB2B3"';
						$txtUse = "ยกเลิกใช้งาน";
					}
	
		?>	
		<tr <?php echo $bgColor?>>
		  <td width="10"><?php echo $n?></td>
		  <td><?php echo $data->car_brand_name?></td>
		  <td width="200">
			  <?php /*?>
			  <select class="form-control form-control-sm" onChange="updateCarbrandStatus('<?php echo $data->id?>',this.value)">
		          <option value="1" <?php echo $txt1?> >ใช้งาน</option>	  
		          <option value="0" <?php echo $txt0?>>ยกเลิกใช้งาน</option>	  
			  </select>
			  <?php */?>
			  <?php echo $txtUse;?>
		  </td>
		  <td width="20">
		    <button type="button" class="btn btn-sm btn-success" onClick="setEdit('<?php echo $data->id?>','<?php echo $data->car_brand_status?>','<?php echo $data->car_brand_name?>')">แก้ไข</button>	
		  </td>
	  </tr>
	 <?php $n++; }?>
	</tbody>
</table>
<script>

 //------------------------------------------------
 function setDataID(){
	  $('#car_brand_name').val('');
	  $('#dataID').val('x');
	  //$('#car_brand_status').val(car_brand_status);
 }
 //------------------------------------------------
 function updateCarbrandStatus(dataID,theVaue){
	  $.post('<?php echo base_url('setting/updateCarbrandStatus')?>',{ theVaue:theVaue, dataID:dataID   },function(data){
			    var obj = JSON.parse(data);
		  		 if(obj.DoUpdate=='1'){ 
					 LoadCarBrand('all');
				 }else{
					 alert('ไม่สามารถแก้ไขข้อมูลได้');
				 }
	  })
 }
 //------------------------------------------------ car_brand_name car_brand_status dataID
 function setEdit(dataID,car_brand_status,car_brand_name){
	  $('#car_brand_name').val(car_brand_name);
	  $('#dataID').val(dataID);
	  $('#car_brand_status').val(car_brand_status);
 }
 //------------------------------------------------
 function AddCarBrand(){
	   var car_brand_name = $('#car_brand_name').val();   
	   var dataID = $('#dataID').val();   
	   var car_brand_status = $('#car_brand_status option:selected').val();  
	   
	   if(car_brand_name==''){
		   	alert('กรุณาใส่ยี่ห้อรถ');
		    return false();
	   }else{
		   $.post('<?php echo base_url('setting/AddCarBrandInsrance')?>',{ car_brand_name:car_brand_name, dataID:dataID , car_brand_status:car_brand_status  },function(data){
			   var obj = JSON.parse(data);
			   //console.log(data);
			   if(obj.DoUpdate=='1'){
				   LoadCarBrand('all');
				   $('#car_brand_name').val(''); 
				   $('#dataID').val('x');
				   LoadCarBrand('all');
			   }else{
				   alert('ไม่สามารถเพิ่มข้อมูลได้');
				   return false;
			   }
		   })
	   }
   } 
 	
	
</script>