<script>
	function UpdateUseBranch(e,branch,dataID){
		if(e.checked==true){
			var updateVal = '1';
		}else if(e.checked==false){
			var updateVal = '0';
		}
		$.post('<?php echo base_url('setting/UpdateBookUseBranch')?>',{ dataID:dataID , updateVal:updateVal,branch:branch },function(data){
				var obj = JSON.parse(data);
				if(obj.doUpdate=='1'){
					listBookBank('all');
				}else{
					alert('ไม่สามารถแก้ไขข้อมูลได้');
				}
			})
	}
	//------------------------------ 
	function updateStatus(dataID,selectVal){
		$.post('<?php echo base_url('setting/updateBookBackStatus')?>',{ dataID:dataID , data_status:selectVal },function(data){
				var obj = JSON.parse(data);
				if(obj.doUpdate=='1'){
					listBookBank('all');
				}else{
					alert('ไม่สามารถแก้ไขข้อมูลได้');
				}
			})
	}
	//------------------------------
	function listBookBank(data_status){
			$.post('<?php echo base_url('setting/listBookBank')?>',{ data_status:data_status },function(data){
				$('#showBb').empty();
				$('#showBb').html(data);
			})
	}
	//------------------------------
	function addBookBank(){  //bank_branch bank_acc_name bank_number data_status
		var bank_branch = $('#bank_branch').val();
		var bank_acc_name = $('#bank_acc_name').val();
		var bank_number = $('#bank_number').val();
		var bank_name = $('#bank_name').val();
		var data_status = $('#data_status option:selected').val();
		
		if(bank_acc_name==''){
			alert('กรุณาใส่ชื่อธนาคาร');
			return false;
		}else{
			$.post('<?php echo base_url('setting/addBookBank')?>',{ bank_name:bank_name, bank_branch:bank_branch, bank_acc_name:bank_acc_name,bank_number:bank_number,data_status:data_status },function(data){
			    var obj = JSON.parse(data);
				if(obj.doUpdate=='1'){
					listBookBank('all');
					$('#bank_branch').val('');
					$('#bank_acc_name').val('');
					$('#bank_number').val('');
					$('#bank_name').val('');
					
				}else{
					alert('ไม่สามารถเพิ่มข้อมูลได้');
				}
			})
		}
	}
	//------------------------------
	$(document).ready(function(){
		listBookBank('all');
	})
</script>