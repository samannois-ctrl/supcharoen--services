<script>
	function loadSummaryDaily(){
		var select_day = $('#select_day option:selected').val() ;
		var select_day_end = $('#select_day_end option:selected').val() ;
		var select_month = $('#select_month option:selected').val() ;
		var select_month_end = $('#select_month_end option:selected').val() ;
		var select_month_name = $('#select_month option:selected').text() ;
		var select_year = $('#select_year  option:selected').val() ;
		var select_year_name = $('#select_year  option:selected').text() ;
		 
		var select_year_name = $('#select_year  option:selected').text() ;
		 $.post('<?php echo base_url('Inspection/loadSummaryDaily')?>',{ select_day:select_day,select_month:select_month,select_month_name:select_month_name,select_year:select_year,select_day_end:select_day_end,select_month_end:select_month_end,select_year_name:select_year_name},function(data){
		  //console.log(data)
		  $('#showActDailyPrint').empty();
		  $('#showActDailyPrint').html(data); 
	 })
	}

	$(document).ready(function(){
		loadSummaryDaily()
	})
</script>