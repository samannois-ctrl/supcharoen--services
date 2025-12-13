<script>
	function updateStartDate(changeValue){
		$('#expenses_date_select').val(changeValue);
		$('#showListDate').text(changeValue);
		showExpense()
	}
	
	
	 function deleteExpense(dataID,exName){
		 if(confirm('ต้องการลบรายการ '+exName+' ?')){
			 $.post('<?php echo base_url('insurance_car/deleteExpense')?>',{ dataID:dataID },function(data){
				 var obj = JSON.parse(data);
				 if(obj.doDb=='1'){
					 $('#expenses_name').val('');
					 $('#expenses_price').val('');
					showExpense()
				
				}else{
					alert('ไม่สามารถลบข้อมูลได้');
				}
			 })
		 }else{
			 return falsel;
		 }
	 }
	
	
	function saveExpense(){
		var  expenses_date = $('#expenses_date').val();
		var  expenses_name = $('#expenses_name').val();
		var  expenses_price = $('#expenses_price').val();
		
		if(expenses_name==''){
			alert('กรุณาใส่รายการค่าใช้จ่าย');
			return false;
		}else if(expenses_price==''){
			alert('กรุณาใส่จำนวนเงิน');
			return false;
		}else{
			$.post('<?php echo base_url('insurance_car/saveExpense')?>',{  expenses_date:expenses_date,expenses_name:expenses_name,expenses_price:expenses_price},function(data){
				var obj = JSON.parse(data);
				if(obj.doDb=='1'){
					showExpense()
				
				}else{
					alert('ไม่สามารถบันทึกข้อมูลได้');
				}
			})
		}
	}
	
	function showExpense(){ 
		//startDate endDate 
		var expenses_date_select = $('#expenses_date_select').val();
	
		$.post('<?php echo base_url('insurance_car/showExpense')?>',{expenses_date_select : expenses_date_select },function(data){
			$('#showData').empty();
			$('#showData').html(data);
		})	
	}



	$(".datepicker").datepicker({
                language:'th-th',
                format:'dd/mm/yyyy',
                autoclose: true
    });

	$(document).ready(function(){
		showExpense();
	})
</script>