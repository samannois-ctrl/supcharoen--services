<script>
	
	//-------------------------------
	//----------------------------
	function listCarTypePremium(){
		var car_type_id  = $('#car_type_id option:selected').val();
		var type_premium_id  = $('#type_premium_id option:selected').val();
		var type_premium_id_temp  = $('#type_premium_id_temp').val();
		//var insurance_personal = $("input[name='insurance_personal']:checked").val();
		//console.log('insurance_personal>'+insurance_personal)
		//if(insurance_personal==undefined){
		////	alert('กรุณาเลือกประเภทประกันภัย');
		//	return false;
		//}else
			if(car_type_id!='x'){
			 $.post('<?php echo base_url('insurance_car/listCarTypePremium')?>',{ car_type_id:car_type_id,type_premium_id_temp:type_premium_id_temp},function(data){ 
			 	   $("#type_premium_id").empty();
			 	   $("#type_premium_id").append(data);
			 }) 
		  }else if(car_type_id=='x'){
			   $("#type_premium_id").empty();
		  }
	}
	//-------------------------------
	 function updateAnticipateRemark(dataID,changeValue){
		 $.post('<?php echo base_url('Insurance_car2/updateAnticipateRemark')?>',{ dataID:dataID, changeValue },function(data){
			 var obj =  JSON.parse(data);
			 	if(obj.doDb=='1'){
					alert('แก้ไขข้อมูลแล้ว');
					 console.log('update OK')
				}else{
					alert('ไม่สามารถซ่อนรายชื่อได้');
				}
			 })
	 }
	//-------------------------------
	function hideThis(dataID,custname){
		if(confirm('ต้องการซ่อนรายชื่อ '+custname+' ?')){
			$.post('<?php echo base_url('Insurance_car2/hide_anticipate_customer')?>',{ dataID:dataID, pass:"Wrsx89R@" },function(data){
				var obj =  JSON.parse(data);
				if(obj.doDb=='1'){
					refreshList();
				}else{
					alert('ไม่สามารถซ่อนรายชื่อได้');
				}
			})
		}else{
			return false;
		}
		
	}
	//-------------------------------
	function refreshList(){
		$.post('<?php echo base_url('Insurance_car2/list_anticipate_customer')?>',{ pass:"Wrsx89R@" },function(data){
			$('#list_data').empty();
			$('#list_data').html(data);
		})
	}
	
	//----------------------------------
	function add_customer(){
		var cust_name = $('#cust_name').val();
		var cust_telephone_1 = $('#cust_telephone_1').val();
		if(cust_name==''){
			alert('กรุณาใส่ชื่อลูกค้า');
			return false;
		}else if(cust_telephone_1==''){
			alert('กรุณาใส่หมายลขโทรศัพท์');
			return false;			
		}else{
			var form = new FormData($('#anticipate_customer')[0]);
				
			 $.ajax({
				url: '<?php echo base_url('Insurance_car2/add_anticipate_customer')?>',
				type: 'POST' ,  
				data: form ,
				success: function (data) {
				console.log(data);
				var obj = JSON.parse(data);	 
				//console.log(data);
				if(obj.doDb=='1'){
					     $('#anticipate_customer')[0].reset();
						 alert('บันทึกข้อมูลเรียบร้อยแล้ว');
						 refreshList();						
					}else{	
						alert('บันทึกข้อมูลไม่สำเร็จ');	
					}
					
				},
				
				cache: false,
				contentType: false,
				processData: false
			});	
		}
	}
	 // cust_name cust_telephone_1
	$(document).ready(function(){
		refreshList();
	})
</script>