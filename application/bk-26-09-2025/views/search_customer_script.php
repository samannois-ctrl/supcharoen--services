<script>
	function renewThis(insID,Custname){
		if(confirm('ต้องการต่ออายุ '+Custname)){
			$.post('<?php echo base_url('insurance_car2/renew_customer_by_id')?>',{ insID:insID },function(data){
				var obj= JSON.parse(data);
					console.log(data);
					if(obj.status=='ok'){
						var url = "<?php echo base_url('Insurance_car/work_insurance_add/')?>"+obj.newID;
						// Open the URL in a new tab
						 window.open(url, '_blank');
					}else{
						alert('ไม่สามารถต่ออายุได้');
						return false;
					}
				})
		}else{
			return false;
		}
	}
	
	//------------------------------------
	function SearchAllCustomer(){
		// cust_telephone vehicle_regis workType	agent_id	overdue	 selectYear			
		var cust_name = $('#cust_name').val();
		var cust_telephone = $('#cust_telephone').val();
		var vehicle_regis = $('#vehicle_regis').val();
		var workType = $('#workType option:selected').val();
		var agent_id = $('#agent_id  option:selected').val();
		var overdue = $('#overdue  option:selected').val();
		var selectYear = $('#selectYear  option:selected').val();
		
		var searchInputs = document.getElementsByClassName('fsearch');
		var allEmpty = true;
		for (var i = 0; i < searchInputs.length; i++) {
		if (searchInputs[i].value.trim() !== '') {
			// If any input is not empty, set the flag to false and break the loop
			allEmpty = false;
			break;
		  }
		}
		
		if ((allEmpty)&&(agent_id=='0')&&(overdue=='0')) {
			alert('กรุณาใส่คำค้นหา หรือเลือกเงื่อนไขอย่างน้อย 1 อย่าง');
			return false;
		}else{
			$.post('<?php echo base_url('insurance_car/SearchAllCustomer')?>',{ cust_name:cust_name , cust_telephone:cust_telephone,vehicle_regis:vehicle_regis,workType:workType,agent_id:agent_id ,overdue:overdue , selectYear:selectYear  },function(data){
					$('#showAllSearch').empty();
					$('#showAllSearch').html(data);
			})
		}
		
		

	}

</script>