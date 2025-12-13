<script>
		function getRecieveReport(){
			/* var selectMonth = $('#selectMonth option:selected').val();
			 var selectYear = $('#selectYear option:selected').val();
			 var paytype = $('#paytype option:selected').val();
			 var bank_transfer_id = $('#bank_transfer_id option:selected').val();
			 if(((bank_transfer_id !='x')&&(paytype=='1')) || ((bank_transfer_id !='x')&&(paytype=='0'))){
 				 alert('กรุณาเลือกเงินโอน');
				 return false;
			 }else{ 
			console.log('selectMonth>'+selectMonth+' selectYear>'+selectYear+' paytype>'+paytype+' bank_transfer_id>'+bank_transfer_id);
			  $.post('<?php echo base_url('Record_recipe/getRecieveReport')?>',{ selectMonth:selectMonth,selectYear:selectYear,paytype:paytype,bank_transfer_id:bank_transfer_id },function(data){
				  //console.log(data);
				  $('#reportArea').empty();
				  $('#reportArea').html(data);
			 })
			}
			*/
			// 
		}
	   //--------------------------------
		function setPayType(iam){
			 if(iam.value!='x'){
				 $('#paytype option[value="2"]').prop('selected', true);
			 }else if(iam.value=='x'){
				  $('#paytype option[value="0"]').prop('selected', true);
			 }
		}
	   //--------------------------------
	   $(document).ready(function(){
		   //getRecieveReport();
		   window.location.href='<?php echo base_url('record_recipe')?>';
	   })
</script>
   