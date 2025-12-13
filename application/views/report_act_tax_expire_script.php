<script>
	//-------------------------------
	function UpdateAlert(workID,iam){
		if(iam.checked==true){
			var changeValue = 1;
		}else if(iam.checked==false){ 
			var changeValue = 0;
		}
		
		 $.post('<?php echo base_url('insurance_car/UpdateExpireAlert')?>',{ workID:workID,changeValue:changeValue },function(data){
		 	var obj=JSON.parse(data)
			console.log(data);
				if(obj.doDb=='1'){
					console.log('ok-save');
				}else{
					console.log('not-save');
				}
			
		 })
	}
	//-------------------------------
	function checkMe(iam){
		var value = 0;
		console.log(iam.name)
		
		$('#'+iam.name).click(function() {
             
			value = value === 0 ? 1 : 0;
			console.log('value>>'+value)
			// Toggle the button's active class based on the value
			$('#'+iam.name).toggleClass('active', value === 1);

			// Update the button text based on the value
			if (value === 1) {
				$('#'+iam.name).text('✔');
			} else {
				$('#'+iam.name).text('Click Me');
			}
		});
		
		
	}
	//-------------------------------
	function updateNote(ivalue,field,dataID){
		 $.post('<?php echo base_url('insurance_car/updateExpireNote')?>',{ ivalue:ivalue,field:field,dataID:dataID },function(data){
		 	var obj=JSON.parse(data)
				if(obj.doDb=='1'){
					console.log('ok-save');
				}else{
					console.log('not-save');
				}
			
		 })
	}
	//------------------------------- search_custname search_vRegis selectMonth search_vRegis
	function getExpireList(){ 
		var car_type_id = $('#car_type_id option:selected').val();
		var select_type = $('#select_type option:selected').val();
		var select_type_text = $('#select_type option:selected').text();
		//var select_range = $('#select_range option:selected').val();
		var select_range = 'all';
		var select_year = $('#select_year option:selected').val();
		var select_year_name = $('#select_year option:selected').text();
		var selectMonthName = $('#selectMonth option:selected').text();
		var selectMonth = $('#selectMonth option:selected').val();
		var search_custname = $('#search_custname').val();
		var search_vRegis = $('#search_vRegis').val();

		 $.post('<?php echo base_url('insurance_car/getExpireList')?>',{ select_year_name:select_year_name,select_year:select_year,select_range:select_range,select_type:select_type,car_type_id:car_type_id,select_type_text:select_type_text, selectMonthName:selectMonthName , selectMonth:selectMonth,search_custname:search_custname,search_vRegis:search_vRegis },function(data){
			
			  $('#showReport').empty();
			  $('#showReport').html(data);
			  $('#reportType').html(select_type_text)
		 })
	}
	
	$(document).ready(function(){
		getExpireList()
	})
	
	
	
</script>
