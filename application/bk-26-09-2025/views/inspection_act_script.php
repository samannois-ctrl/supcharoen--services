<script>
	  function printActReport(){
		    var startDate = $('#startDate').val();
		    var  arr = startDate.split('/');
		    var yearNum = parseInt(arr[2]);
		  	var yearThai = yearNum-543;
		    var stDate = yearThai+"-"+arr[1]+"-"+arr[0];
		  
			var endDate = $('#endDate').val();
		    var  arr = endDate.split('/');
		    var yearNum = parseInt(arr[2]);
		  	var yearThai = yearNum-543;
		    var enDate = yearThai+"-"+arr[1]+"-"+arr[0];
		     
		    var car_type_id = $('#car_type_id option:selected').val();
		    var car_type_name = $('#car_type_id option:selected').text();
		    var insurance_corp_id = $('#insurance_corp_id option:selected').val();
		    // car_type_id insurance_corp_id
		  
		  	var typename = encodeURIComponent(car_type_name);
		  
		  	window.open("<?php echo base_url('inspection/inspection_act_print/')?>"+stDate+"/"+enDate+"/"+car_type_id+"/"+insurance_corp_id, '_blank');
	  }
	 
	
		function  listReport(){  // 
			var startDate = $('#startDate').val();
			var endDate = $('#endDate').val();
			var insurance_corp_id = $('#insurance_corp_id option:selected').val();
			var car_type_id = $('#car_type_id option:selected').val();
			$.post('<?php echo base_url('inspection/inspection_act_report')?>', { startDate:startDate, endDate:endDate , insurance_corp_id:insurance_corp_id , car_type_id:car_type_id},function(data){
				 	$('#showReport').empty();
				 	$('#showReport').html(data);
				
			})
		}
	
	$(document).ready(function(){
		 listReport();
		
		
		     $(".datepicker").datepicker({
                language:'th-th',
                format:'dd/mm/yyyy',
                autoclose: true
            });
	})
	
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
   var getDate = $('#startDate').val();
   var getDateEnd = $('#endDate').val();
   var cartype = $('#car_type_id option:selected').text();
   var title = "รายการ  ตรอ. "+cartype+" ส่ง พ.ร.บ. วันที่ "+getDate+' - '+getDateEnd+'  ';
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
</script> 