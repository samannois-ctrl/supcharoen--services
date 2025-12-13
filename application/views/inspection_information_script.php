<script>
	 function updateCarcheckTime(dataID,upType,changeVal){
		 var username = $('#username').text();
		 console.log('username>'+username);
		 if(changeVal==''){
			 alert('กรุณาใส่เวลา');
		 }else{
			 var hr = $('#hr'+dataID).val();
			 var min = $('#min'+dataID).val();
			 var sec = $('#sec'+dataID).val();
			 $.post('<?php echo base_url('Inspection/updateCarcheckTime')?>',{ dataID:dataID,upType,changeVal,hr:hr,min:min,sec:sec},function(data){
				 var obj = JSON.parse(data);
				
				 if(obj.doUpdate=='1'){
					 console.log('update ok');
					 $('#emp'+dataID).html(username)
				 }else{
					 console.log('cannot update');
				 }
			 })
		 }
	 }
	
	
	function loadMonthlyReport(){ 
		var select_day = $('#select_day option:selected').val() ;
		var select_day_end = $('#select_day_end option:selected').val() ;
		var select_month = $('#select_month option:selected').val() ;
		var select_month_end = $('#select_month_end option:selected').val() ;
		var select_month_name = $('#select_month option:selected').text() ;
		var select_year = $('#select_year  option:selected').val() ;
		var select_year_end = $('#select_year_end  option:selected').val() ;
		var select_year_name = $('#select_year  option:selected').text() ;
		 $.post('<?php echo base_url('Inspection/loadCarCheckMonthly')?>',{ select_day:select_day,select_month:select_month,select_month_name:select_month_name,select_year:select_year,select_year_name:select_year_name,select_day_end:select_day_end,select_month_end:select_month_end,select_year_end:select_year_end},function(data){
		  //console.log(data)
		  $('#showReport').empty();
		  $('#showReport').html(data);
		   
	  }) 
	}
	
	
	 $(document).ready(function(){ 
		 loadMonthlyReport()
	 })
	
	
	function loadMonthlyReportPrint(){
var select_day = $('#select_day option:selected').val() ;
		var select_day_end = $('#select_day_end option:selected').val() ;
		var select_month = $('#select_month option:selected').val() ;
		var select_month_end = $('#select_month_end option:selected').val() ;
		var select_month_name = $('#select_month option:selected').text() ;
		var select_year = $('#select_year  option:selected').val() ;
		var select_year_end = $('#select_year_end  option:selected').val() ;
		var select_year_name = $('#select_year  option:selected').text() ;
		
		 $.post('<?php echo base_url('Inspection/loadMonthlyReportPrint')?>',{ select_day:select_day,select_month:select_month,select_month_name:select_month_name,select_year:select_year,select_year_name:select_year_name,select_day_end:select_day_end,select_month_end:select_month_end,select_year_end:select_year_end},function(data){
		  //console.log(data)
		  $('#showReportPrint').empty();
		  $('#showReportPrint').html(data);
		   
	  }) 
	}
	
	
	 $(document).ready(function(){ 
		 loadMonthlyReport()
	 })	
	
	 //--------------------
	function printReport(divName)
		{  
		   loadMonthlyReportPrint();
		}
	
	 function printActDaily(divName){
		var select_day = $('#select_day option:selected').val() ;
		var select_month = $('#select_month option:selected').val() ;
		var select_month_name = $('#select_month option:selected').text() ;
		var select_year = $('#select_year  option:selected').val() ;
		var select_year_name = $('#select_year  option:selected').text() ;
		 
		var select_year_name = $('#select_year  option:selected').text() ;
		 $.post('<?php echo base_url('Inspection/printActDaily')?>',{ select_day:select_day,select_month:select_month,select_month_name:select_month_name,select_year:select_year,select_year_name:select_year_name},function(data){
		  //console.log(data)
		  $('#showActDailyPrint').empty();
		  $('#showActDailyPrint').html(data); 
	 })
	 }
	/*function printData1(divName)
		{  
		   var divToPrint=document.getElementById(divName);
		   var newWin= window.open("");
			// newWin.print(); 
		   newWin.document.write(buildprintReservePrint(divToPrint.innerHTML));
		   setTimeout(function(){ newWin.print(); 

			newWin.close();
		   }, 1000);
		   //newWin.print();
		   //newWin.close();
		}*/

function buildprintReservePrint(content)
{  
  
   var head='<!DOCTYPE html>'+
              '<html>'+
              '<head>'+
              '<meta charset="UTF-8">'+''+
              '<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />'+
              '<style>@media print {  @page     {    size:  auto;  margin: 5mm;  } } </style>'+
              '</head>'+
              '<body>';

  var foot=   '</body>'+
              '</html>';

  return  head+content+foot;      
}


	
	
	
	
	
</script>