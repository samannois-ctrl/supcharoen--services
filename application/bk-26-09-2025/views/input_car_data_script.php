<script>
	
	//---------------------------
	function updateWorkData(workID,fname,changeValue){
		
		var act_date_start = $('#act_date_start'+workID).val();
		var act_date_end = $('#act_date_end'+workID).val();
		
		$.post('<?php echo base_url('Inspection/updateWorkData')?>',{ workID:workID,fname:fname,act_date_start:act_date_start , act_date_end:act_date_end },function(data){
			
			var obj = JSON.parse(data)
			if(obj.DoDb=='0'){
				alert('ไม่สามารถแก้ไขข้อมูลได้');
			}else{
				
			}
		})  
	}
	//---------------------------
	function updateCarData(carID,fname,changeValue){
		if(fname=='date_regist'){
			var date_regist = changeValue;
			var month_regist = $('#month_regist'+carID+' option:selected').val();
			var changeValue = month_regist+"-"+date_regist;
		}
		if(fname=='month_regist'){
			var fname = 'date_regist';
			var date_regist = $('#date_regist'+carID).val();
			var month_regist = changeValue;
			var changeValue = month_regist+"-"+date_regist;
		}
		
		//console.log('changeValue>>'+changeValue)
		$.post('<?php echo base_url('Inspection/updateCarData')?>',{ carID:carID,fname:fname,changeValue:changeValue },function(data){
			
			var obj = JSON.parse(data)
			if(obj.DoDb=='0'){
				alert('ไม่สามารถแก้ไขข้อมูลได้');
			}else{
				
			}
		})  
	}
	//--------------------------------
	function loadcareRegister(){
		var select_day = $('#select_day option:selected').val() ;
		var select_day_end = $('#select_day_end option:selected').val() ;
		var select_month = $('#select_month option:selected').val() ;
		var select_month_end = $('#select_month_end option:selected').val() ;
		var select_month_name = $('#select_month option:selected').text() ;
		var select_year = $('#select_year  option:selected').val() ;
		var select_year_name = $('#select_year  option:selected').text() ;
		console.log('select_year>'+select_year)
		
		 $.post('<?php echo base_url('Inspection/loadcareRegister')?>',{ select_day:select_day,select_day_end:select_day_end,select_month:select_month,select_month_end:select_month_end,select_month_name:select_month_name,select_year:select_year, select_year_name:select_year_name},function(data){
			  $('#showReport').empty();
			  $('#showReport').html(data);
		 })
	}
	
	
	$(document).ready(function(){
		loadcareRegister()
		
	})
</script>