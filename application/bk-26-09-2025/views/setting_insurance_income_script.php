<script>

	//---------------------------------------- 

	function deleteIncome(dataID,incomeName){

		if(confirm('ต้องการลบรายการ'+incomeName+' ?')){

			$.post('<?php echo base_url('setting/deleteIncome')?>',{ dataID:dataID } ,function(data){

				var obj = JSON.parse(data);

				if(obj.DoDelete=='1'){ 

					 $('#Row'+dataID).remove();

				}else{

					alert('ไม่สามารถลบข้อมูลได้');

					return false;

				}

			})

		}else{

			return false;

		}

	}

	//----------------------------------------

	function UpdateIncome(dataID,fieldName,updateVal){

		$.post('<?php echo base_url('setting/UpdateIncome')?>',{ dataID:dataID,fieldName:fieldName,updateVal:updateVal},function(data){

			var obj = JSON.parse(data);  

			if(obj.DoUpdate=='1'){

				$('#showNoti'+dataID).empty();

				var txtOk = "&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa fa-check-circle-o text-success 2x'> Update</i>"

				console.log(txtOk);

				$('#showNoti'+dataID).html(txtOk);

				$('#showNoti'+dataID).fadeIn(10);

				$('#'+fieldName+dataID).val(obj.updateVal);

				$('#showNoti'+dataID).fadeOut(5000);

			}else{

				alert('ไม่สามารถแก้ไขข้อมูลได้');

			}

		})

	}

	//------------------------------------showNoti 

	function clearNoti(){

		$('.showNoti').empty();

	}

	//--------------------------------------------

	function AddIncome(){

		var ins_type_id = $('#ins_type_id option:selected').val();

		var com_1 = $('#com_1').val();

		var com_2 = $('#com_2').val();

		var com_3 = $('#com_3').val();

		var tax_1 = $('#tax_1').val();

		var tax_2 = $('#tax_2').val();

		var tax_3 = $('#tax_3').val();

		var companyID = $('#companyID').val();

		

		var ins_type_id = $('#ins_type_id option:selected').val();

		

		if(ins_type_id=='x'){

			alert('กรุณาเลือกประเภทประกันภัย');

			return false;

			

		}else if(com_1==''){

			alert('กรุณาใส่ค่าคอม 1');

			return false;	 				 

	    }else{

			$.post('<?php echo base_url('setting/AddIncome')?>',{ com_1:com_1,com_2:com_2,com_3:com_3,tax_1:tax_1,tax_2:tax_2,tax_3:tax_3,ins_type_id:ins_type_id,companyID:companyID },function(data){

				var obj = JSON.parse(data);

				if(obj.DoInsert=='1'){

					$('#com_1').val('');

					$('#com_2').val('');

					$('#com_3').val('');

					$('#tax_1').val('');

					$('#tax_2').val('');

					$('#tax_3').val('');

					$('#ins_type_id').val('x');

					listIncome();

				}else if(obj.DoInsert=='Dupplicate'){

					alert('ไม่สามารถเพิ่มได้เพราะรายการซ้ำกัน');

				}else{

					alert('ไม่สามารถเพิ่มข้อมูลได้');

					console.log('-cannot insert-');

				}

			})

		}

	}

	//-----------------------------------------------	

	function listIncome(){

		var companyID = $('#companyID').val();

		$.post('<?php echo base_url('setting/listIncome')?>',{ companyID:companyID },function(data){

			 $('#showIncome').empty();

			 $('#showIncome').html(data);

		})

	}

	

	
	

	$(document).ready(function(data){

		listIncome();

	})

</script>