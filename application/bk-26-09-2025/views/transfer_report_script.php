<script>  //start_date select_month_start end_date select_month_end
	function loadReport(){
		var bank_acc_id =$('#bank_acc_id option:selected').val();
		var start_date =$('#start_date option:selected').val();
		var select_month_start =$('#select_month_start option:selected').val();
		var end_date =$('#end_date option:selected').val();
		var select_month_end =$('#select_month_end option:selected').val();
		var select_year =$('#select_year option:selected').val();
		if(bank_acc_id==0){
			alert('กรุณาเลือกบัญชีธนาคาร');
			return false;
		}else{
			 $.post('<?php echo base_url('insurance_car/loadReportBankTransfer')?>',{ bank_acc_id:bank_acc_id,start_date:start_date,select_month_start:select_month_start,end_date:end_date,select_month_end:select_month_end,select_year:select_year},function(data){
			  $('#showReport').empty();
			  $('#showReport').html(data);
			 
		 })
		}
	}
	

function printData10(divName)
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
   var bankName = $('#bank_acc_id option:selected').text();
   var start_date = $('#start_date option:selected').text();
   var select_month_start = $('#select_month_start option:selected').text();
   var end_date = $('#end_date option:selected').text();
   var select_month_end = $('#select_month_end option:selected').text();
   var select_year = $('#select_year option:selected').text();
   	
 
   var getDate = bankName+" วันที่ "+start_date+" "+select_month_start+" ถึง "+end_date+" "+select_month_end+" "+select_year;
   var title = "รายการ โอนเงิน "+getDate;
   var head='<!DOCTYPE html>'+
              '<html>'+
              '<head>'+
              '<meta charset="UTF-8">'+'<title>ตรอ. ทรัพย์เจริญเซอร์วิส (แยกโรงปูน) ระบบบริหารงานประกันภัยรถยนต์</title>'+
              '<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />'+
              //'<style>table, th, td { border: 0.5px solid; padding: 0px;border-spacing: 0px;  border-collapse: separate;}</style>'+
              '</head>'+
              '<body>';

  var foot=   '</body>'+
              '</html>';

  return  head+title+content+foot;      
}

</script>