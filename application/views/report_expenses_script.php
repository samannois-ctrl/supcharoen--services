<script>
		
	function showExpense(){ 
		//startDate endDate 
		var expenses_date_start = $('#expenses_date_start').val();
	
		var expenses_date_end = $('#expenses_date_end').val();
	
		$.post('<?php echo base_url('insurance_car/showExpenseReport')?>',{expenses_date_start:expenses_date_start, expenses_date_end : expenses_date_end },function(data){
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
		showExpense()
	})
	
	
	
	function printExpense(divName)
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
   var getDate = $('#date_work').val();
   var title = "";
   var head='<!DOCTYPE html>'+
              '<html>'+
              '<head>'+
              '<meta charset="UTF-8">'+'<title>รายงานค่าใช้จ่าย</title>'+
              '<link rel="stylesheet" type="text/css" href="http://localhost/supcharoenbroker.com/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />'+
             
              '</head>'+
              '<body>';

  var foot=   '</body>'+
              '</html>';

  return  head+title+content+foot;      
}
</script> 