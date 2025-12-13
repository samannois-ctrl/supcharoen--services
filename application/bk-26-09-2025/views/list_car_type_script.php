<script>
		 function UpdatePremium(dataID,field,changeValue,tbl_car_type_id){
			 $.post('<?php echo base_url('setting/UpdatePremium')?>',{ dataID:dataID , field:field, changeValue:changeValue,tbl_car_type_id:tbl_car_type_id },function(data){
				var obj = JSON.parse(data);
				
				if(obj.doUpdate=='1'){
					//alert('แก้ไขข้อมูลเรียบร้อยแล้ว')	;
					$('#text'+tbl_car_type_id).removeClass('text-danger');
					$('#text'+tbl_car_type_id).addClass('text-success');
					$('#text'+tbl_car_type_id).text('แก้ไขข้อมูลเรียบร้อยแล้ว');
					setTimeout(function(){ $('#text'+tbl_car_type_id).empty(); }, 5000);
					
				}else{
					$('#text'+tbl_car_type_id).removeClass('text-success');
					$('#text'+tbl_car_type_id).addClass('text-danger');
					$('#text'+tbl_car_type_id).text('ไม่สามารถแก้ไขข้อมูล');
					setTimeout(function(){ $('#text'+tbl_car_type_id).empty(); }, 5000);
											
				}
			 })
		 }
	
	 //----------------------------------------
		 function addPremium(){
			var tbl_car_type_id=$('#tbl_car_type_id option:selected').val()
			var total_premium=$('#total_premium').val()
			var premium=$('#premium').val();
			var cc=$('#cc').val();
			 
			 if(tbl_car_type_id=='x'){
				 alert('กรุณาเลือกประเภทรถ');
				 return false;
			 }else if(cc==''){
				  alert('กรุณาใส่ CC');
				 return false;
			 }else if(total_premium==''){
				  alert('กรุณาใส่เบี้ยรวม');
				 return false;
			 }else if(premium==''){
				  alert('กรุณาใส่เบี้ยชำระ');
				 return false;
			 }else{
				$.post('<?php echo base_url('setting/addPremium')?>',{ tbl_car_type_id:tbl_car_type_id , cc:cc , total_premium:total_premium,premium:premium },function(data){
				var obj = JSON.parse(data);
				if(obj.doUpdate=='1'){
					listPremium(tbl_car_type_id)
					$('#total_premium').val('');
					$('#premium').val('');
					$('#cc').val('');
				}else{
					alert('ไม่สามารถแก้ไขข้อมูลได้');
				}
				}) 
			 }
			 
			
			
		}
	
	
		//--------------------------
		function listPremium(tbl_car_type_id){
			$.post('<?php echo base_url('setting/listPremium')?>',{ tbl_car_type_id:tbl_car_type_id  },function(data){
					$('#carType'+tbl_car_type_id).empty();
					$('#carType'+tbl_car_type_id).html(data);
				
				}) 
		}
		//--------------------------
		function updateCarDedug(dataID,selectVal){
			$.post('<?php echo base_url('setting/updateCarDedug')?>',{ dataID:dataID , deduct_percent:selectVal },function(data){
				var obj = JSON.parse(data);
				if(obj.doUpdate=='1'){
					$('#text'+dataID).addClass('text-success');
					$('#text'+dataID).text('แก้ไขข้อมูลเรียบร้อยแล้ว');
					setTimeout(function(){ $('#text'+dataID).empty(); }, 5000);
				}else{
					alert('ไม่สามารถแก้ไขข้อมูลได้');
				}
			})
		}
		//--------------------------
		$(document).ready(function(){
			 <?php foreach($listCartype['result'] AS $data){ echo " listPremium('".$data->id."');"; }?>
		})
		
	
</script>