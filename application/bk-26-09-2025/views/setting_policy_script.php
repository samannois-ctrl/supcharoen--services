<script>
	  function setDataID(){
		$('#dataID').val('x');
	}	
	
	function SetValue(dataID,insurance_type_name,insurance_type,insurance_type_status){
		$('#insurance_type_name').val(insurance_type_name);
		$('#insurance_type').val(insurance_type);
		$('#insurance_type_status').val(insurance_type_status);
		$('#updateID').val(dataID);
		
	}
	
	//-------------------------------
	function addInsTypeData(){
		var insurance_type_name = $('#insurance_type_name').val();
		var insurance_type = $('#insurance_type option:selected').val();
		var insurance_type_status = $('#insurance_type_status option:selected').val();
		var updateID = $('#updateID').val();
		if(insurance_type_name==''){
			alert('กรุณาใส่ชื่อประเภทประกันภัย');
			return false;
		}else if(insurance_type=='x'){
			alert('กรุณาเลือกประเภทประกันภัย');
			return false;
				}else if(insurance_type_status=='x'){
			alert('กรุณาเลือกการใช้งาน');
			return false;
		}else{
			$.post('<?php echo base_url('setting/addInsTypeData')?>',{ insurance_type_name:insurance_type_name,insurance_type:insurance_type,insurance_type_status:insurance_type_status,updateID:updateID},function(data){
				var obj = JSON.parse(data);
				//-------------------------
				if(obj.DoInsert=='1'){
					$('#insurance_type_name').val('');
					$('#insurance_type').val('x');
					$('#insurance_type_status').val('x');
					$('#updateID').val('');
					listInstype();
				}else{
					alert('ไม่สามารถเพิ่มข้อมูลได้')
				}
				//-------------------------
			})
		}
		
	}
	
   function listInstype(){
	   $.post('<?php echo base_url('setting/listInstype')?>',{  },function(data){
		   $('#showInsType').empty();
		   $('#showInsType').html(data);
		   
	   })
   }	

	$(document).ready(function(){
		listInstype();
	})
</script>