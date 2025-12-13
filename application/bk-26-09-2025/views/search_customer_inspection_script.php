<script>
	function searchCustomer(){  //s_custname s_cust_nickname s_phone s_registration s_workType selectYear
		var custname = $('#s_custname').val();
		var cust_nickname = $('#s_cust_nickname').val();
		var phone = $('#s_phone').val();
		var registration = $('#s_registration').val();
		var workType = $('#s_workType option:selected').val();
		var workTypeName = $('#s_workType option:selected').text();
		var selectYear = $('#selectYear option:selected').val();
		var selectYearName = $('#selectYear option:selected').text();
		var payment = $('#s_payment option:selected').val();
		
		$.post('<?php echo base_url('insurance_car/searchCustomer_inspection')?>',{ custname:custname, cust_nickname:cust_nickname,phone:phone,registration:registration,workType:workType, workTypeName:workTypeName, selectYear:selectYear,selectYearName:selectYearName,payment:payment},function(data){
			//console.log(data);
			$('#showSearchData').empty();
			$('#showSearchData').html(data);
		})
	}
</script>