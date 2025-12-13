<script>
		//---------------------------------------------------- insurance_price act_price  insurance_total
	function sumTotal(){
		var  insurance_price = $('#insurance_price').val();
		var  act_price = $('#act_price').val();
		var insurance_price =  insurance_price.replace(/,/g, '')
		var act_price =   act_price.replace(/,/g, '')
		if(insurance_price==''){
			var insurance_price = 0;
		}
		if(act_price==''){
			var act_price = 0;
		}
		var s1 = parseFloat(insurance_price);
		var s2 = parseFloat(act_price);
		var total = s1+s2;
		var display = parseFloat(total).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
		$('#insurance_total').val(display);
	}
		//---------------------------------------------------- followID
	function updateFollow(){
		 $.ajax({
			url: '<?php echo base_url('Report_car/updateFollow')?>', // Replace with your server-side processing URL
			type: 'POST', // Use 'GET' or 'POST' based on your requirements
			data: $('#followForm').serialize(), // Serialize the form data doDb
			success: function(response) {
			  var obj = JSON.parse(response);
			  if(obj.doDb=='1'){
				  $('#followID').val(obj.followID);
				  $('#btnRemark'+obj.work_id).removeClass('btn-default');
				  $('#btnRemark'+obj.work_id).addClass('btn-danger');
				  $('#shownoti').empty();
				  $('#shownoti').removeClass('text-danger');
				  $('#shownoti').addClass('text-success');
				  $('#shownoti').html('บันทีกเรียบร้อยแล้ว');
				  setTimeout(function() { $('#shownoti').empty(); }, 5000);
			  }else{
				  $('#shownoti').empty();
				  $('#shownoti').removeClass('text-success');
				  $('#shownoti').addClass('text-danger');
				  $('#shownoti').html('ไม่สามารถบันทีกได้'); 
				  setTimeout(function() { $('#shownoti').empty(); }, 5000);
			  }
			  // Handle the successful response here
			  //console.log('Form submitted successfully:', response);
			},
			error: function(xhr, status, error) {
			  // Handle errors here
			  console.error('Form submission failed:', error);
			}
		  }); 
	}
	//----------------------------------------------------doDb
	function ShowRemark(workID,custName,remark,data_type){
		  console.log(workID+' '+custName+'  '+remark );
			// #exampleModalCenter  #exampleModalLongTitle remark  
		 $('#exampleModalLabel').empty();
		 $('#exampleModalLabel').html(custName);
		 //$('#updateAlerRemarkID').val('');
		 //$('#updateAlerRemarkID').val(workID);
		$.post("<?php echo base_url('Report_car/GetAlertRemark')?>", { workID:workID,data_type:data_type},function(data){
					//$('#largeModel #remark').val('');
		 			//$('#largeModel #remark').val(data);
		 			$('#ExpireShowDetail').empty();
		 			$('#ExpireShowDetail').html(data);
		 			$('#largeModel').modal('show');
		})
	}
	//----------------------------  
	function DoUpdateRemark(){
		 var workID =	$('#updateAlerRemarkID').val();
		 var remark =	$('#remark').val();
		 $.post("<?php echo base_url('Report_car/DoUpdateAlerRemark')?>", { workID:workID,remark:remark},function(data){
			 var obj = JSON.parse(data);
			 console.log(data);
				 if(obj.doDb=='1'){
					  $('#exampleModalCenter').modal('hide');
					  if(obj.isEmpty=='1'){
						  $('#btnRemark'+workID).removeClass('btn-danger');
						  $('#btnRemark'+workID).addClass('btn-default');
					  }else if(obj.isEmpty=='0'){ 
					  	  $('#btnRemark'+workID).removeClass('btn-default');
						  $('#btnRemark'+workID).addClass('btn-danger');
					  }
				 }else{
					 console.log('cannot update');
				}
			 })
	}
	//----------------------------
	function updateAlert(workID,fieldType,iam,insuranceType){
		if(iam.checked==true){
			var iamValue = 1;
		}else{
			var iamValue = 0;
		}
		$.post("<?php echo base_url('Report_car/updateAlertExpire')?>", { workID:workID,fieldType:fieldType,iamValue:iamValue,insuranceType:insuranceType },function(data){
			var obj = JSON.parse(data);
			if(obj.doDb=='1'){
				console.log('ok update '+fieldType);
			}else{
				console.log('not update '+fieldType);
			}
		})
	}
	//----------------------------------- search_custname search_vRegis selectMonth  selectYear
    function getReport(){
			// getType duration
		var getType = $('#getType option:selected').val();
		var search_custname = $('#search_custname').val();
		var search_vRegis = $('#search_vRegis').val();
		var selectMonth = $('#selectMonth option:selected').val();
		var selectYear = $('#selectYear option:selected').val();
		var corp_id = $('#corp_id option:selected').val();
		var duration = '1';
		if(getType=='x'){
			alert('กรุณาเลือกประเภทประกันภัย');
			return false;
		//}else if(selectMonth=='all'){ 
		//	alert('กรุณาเลือกเดือนหมดอายุ');
		//	return false;			
		}else{
			$.post("<?php echo base_url('Report_car/getReportExpire')?>",{ getType:getType,search_custname:search_custname,search_vRegis:search_vRegis,selectMonth:selectMonth,selectYear:selectYear,duration:duration,corp_id:corp_id},function(data){
				$('#showReportArea').empty();
				$('#showReportArea').html(data);
			})
		}
	}
</script>