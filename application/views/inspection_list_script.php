<script>
	
	function printToDaily(){
		 var getDate = $('#date_work').val();
		
		 window.open('<?php echo base_url('Inspection/inspection_remittance_print/');?>'+getDate,'_blank');
	}
	
  //----------------------------	
  function setShowDate(datevalue){
	  $('#showCurrDate').empty();
	  $('#showCurrDate').text(datevalue);
  }  	
	
 //----------------------------------	
  function listInspection(){
	  var date_work = $('#date_work').val();
	    var select_day = $('#select_day option:selected').val() ;
		var select_day_end = $('#select_day_end option:selected').val() ;
		var select_month = $('#select_month option:selected').val() ;
		var select_month_text = $('#select_month option:selected').text() ;
		var select_month_end = $('#select_month_end option:selected').val() ;
		var select_month_end_text = $('#select_month_end option:selected').text() ;
		var select_month_name = $('#select_month option:selected').text() ;
		var select_year = $('#select_year  option:selected').val() ;
		var select_year_end = $('#select_year_end  option:selected').val() ;
		var select_year_name = $('#select_year  option:selected').text() ;
		var select_year_name_end = $('#select_year_end  option:selected').text() ;
	  
	  $.post('<?php echo base_url('Inspection/load_inspection_report')?>',{ select_day:select_day,select_day_end:select_day_end,select_month:select_month,select_month_text:select_month_text,select_month_end:select_month_end,select_month_end_text:select_month_end_text,select_year:select_year,select_year_end:select_year_end,select_year_name:select_year_name,select_year_name_end:select_year_name_end},function(data){
		  //console.log(data)
		  var setDate = select_day+' '+select_month_text+' '+select_year_name+' ถึง '+select_day_end+' '+select_month_end_text+' '+select_year_name_end;
		  $('#showCurrDate').empty();
		  $('#showCurrDate').html(setDate);
		  $('#showReport').empty();
		  $('#showReport').html(data);
		    
	  }) 
  } 
 //----------------------------------	 


function printData1(divName)
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
}

function buildprintReservePrint(content)
{  
   //var getDate = $('#date_work').val();
   var getDate = $('#showCurrDate').text();
   var title = "รายการ ตรอ. ประจำ วันที่ "+getDate;
   var head='<!DOCTYPE html>'+
              '<html>'+
              '<head>'+
              '<meta charset="UTF-8">'+'<title>ตรอ. ทรัพย์เจริญเซอร์วิส (แยกโรงปูน) ระบบบริหารงานประกันภัยรถยนต์</title>'+
              '<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />'+
             
              '</head>'+
              '<body>';

  var foot=   '</body>'+
              '</html>';

  return  head+title+content+foot;      
}


 //----------------------------------	
 $(document).ready(function(){
	 listInspection();
	 
	/* $(".datepicker").datepicker({
                language:'th-th',
                format:'dd/mm/yyyy',
                autoclose: true
      });*/
	 
 })	
 
</script>