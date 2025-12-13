<script>
	//-------------------------------------- 
	function updateDateControlBoard(field,theValue) { 
		if(theValue!='x'){
			var  keygroup = $('#keygroup').val();
			console.log('key=>'+keygroup)
			
			if(keygroup==''){
				alert('กรุณาเลือกชื่อลูกค้าก่อนเปลียนเดือน')
			}else{
				$.post('<?php echo base_url('Insurance_car2/updateDateControlBoard')?>',{field:field ,theValue:theValue , keygroup:keygroup  },function(data){ 
					console.log(data)
				   var obj = JSON.parse(data);
					if(obj.DoDb=='1'){
						createBlling();
					}else{
						alert('ไม่สามารถแก้ไขข้อมูลได้');
						return false;
					}
				
				})
			}
			
		}
		//control_month control_yea
	 }
	//-------------------------------------- 
	function deleteDedug(dataID,text){
		if(confirm('ต้องการลบ '+text)){
			$.post('<?php echo base_url('Insurance_car2/deleteDedug')?>',{dataID:dataID },function(data){
					var obj = JSON.parse(data);
					if(obj.doDb=='1'){
						createBlling();
					}else{
						alert('ไม่สามารถลบข้อมูลได้');
						return false;
					}
				})
		}else{
			return false;
		}
	}
	//-------------------------------------- 
	 function addDedug(keygroup,billID,actType){
		var dedug_text = $('#dedug_text').val();
		var dedug_amount = $('#dedug_amount').val();
		$.post('<?php echo base_url('Insurance_car2/addDedug')?>',{keygroup:keygroup,billID:billID,dedug_text:dedug_text,dedug_amount:dedug_amount,actType:actType },function(data){
					var obj = JSON.parse(data);
					if(obj.doDb=='1'){
						$('#exampleModalLong').modal('hide');
						createBlling();
					}else{
						alert('ไม่สามารถเพิ่มข้อมูลได้');
						return false;
					}
				})
	}
	//-------------------------------------
	function OpenBillingDedugForm(keygroup,billID,actType){
		if(actType=='delete'){
			var txtHeader ='เพิ่มรายการหัก';
		}else if(actType=='plus'){
			var txtHeader ='เพิ่มรายการบวก';
		}

		$.post('<?php echo base_url('Insurance_car2/OpenBillingDedugForm')?>',{keygroup:keygroup,billID:billID,actType:actType },function(data){
					$('#exampleModalLong h4').empty();
					$('#exampleModalLong h4').html(txtHeader);
					$('#exampleModalLong .modal-body').html(data);
					$('#exampleModalLong').modal('show');
					
				})
		

	}
	
	//-------------------------------------
	function getCompanyData(dataID,inputID){
		if(dataID!='x'){
			$.post('<?php echo base_url('insurance_car2/getCompanyData')?>',{ dataID:dataID},function(data){ 
					console.log(data);
				  $('#'+inputID).val('');
				 $('#'+inputID).val(data);
			})
		}else{
			return false;
		}
			
	}
	//-------------------------------------
	function showAllData(){
		$('.allData').show();
	}
	function reloadData(){
		var keygroup = $('#keygroup').val();
		console.log('keygroup>'+keygroup);
			listcontrolByKey(keygroup);

	}
	//---------------------------------------
	function updateSelectTobill(dataID,field,forms,ids){
		if(forms.checked==true){
			var updateValue='1';
			$('#'+ids+dataID).show();
			//-----set value---//
			if(ids=='insRow'){
				//var setValue = $('#actAllowValue'+dataID).val(); 
				//$('#InsAllowentValue'+dataID).val(setValue);
				//$('#actAllowValue'+dataID).val(''); 
				//$('#actAllowValue'+dataID).prop('readonly', true);
			}else if(ids=='insRowAct'){
				
			}
			//-----------------//
		}else if(forms.checked==false){
			var updateValue='0';
			$('#'+ids+dataID).hide();
			//-----set value---//
			if(ids=='insRow'){
				//var setValue = $('#InsAllowentValue'+dataID).val();
				//$('#actAllowValue'+dataID).val(setValue);
				//$('#actAllowValue'+dataID).prop('readonly', false);
				//$('#InsAllowentValue'+dataID).val('');
			}else if(ids=='insRowAct'){
				//var setValue = $('#actAllowValue'+dataID).val(); 
				//$('#InsAllowentValue'+dataID).val(setValue);
				//$('#actAllowValue'+dataID).prop('readonly', true);
			}
		}
		
		//----------set rows display-----------// insRow	insRowAct
		
		//-------------------------------------//
		$.post('<?php echo base_url('insurance_car2/updateSelectTobill')?>',{ dataID:dataID,field:field,updateValue:updateValue},function(data){
			var obj=JSON.parse(data);
			
			if(obj.DoDb=='1'){ 
				console.log('ok save')
				//alert('บันทึกข้อมูลแล้ว')
				//DoPrintBilling();
				createBlling();
				keygroup = $('#keygroup').val();
				listcontrolByKey(keygroup);
			}else{
				alert('ไม่สามารถแก้ไขข้อมูลได้');
			}
		})
	}
	//---------------------------------------showBillingPrintArea select_month_start select_year
	function DoPrintBilling(){
		var  keygroup = $('#keygroup').val();
		
		var select_day_start = $('#select_day_start option:selected').val();
		var select_month_start = $('#select_month_start option:selected').val();
		var select_day_end = $('#select_day_end option:selected').val();
		var select_month_end = $('#select_month_end option:selected').val();
		var select_year = $('#select_year option:selected').val();
		
		var  hiddenAllSum = $('#hiddenAllSum').val();
		
		var  control_month = select_month_start;
		var  control_year = select_year;
		console.log('select_year>'+select_year)
		$.post('<?php echo base_url('insurance_car2/DoPrintBilling')?>',{    keygroup:keygroup ,  control_month:control_month , control_year:control_year , select_day_start:select_day_start , select_month_start:select_month_start ,select_day_end:select_day_end,select_month_end:select_month_end,select_year:select_year , hiddenAllSum:hiddenAllSum  },function(data){
			$('#showBillingPrintArea').empty();
			$('#showBillingPrintArea').html(data);
		})
	}
	//---------------------------------------control_month
	function printBillingFromControl(){
		var  keygroup = $('#keygroup').val();
		var  transfer_money = $('#transfer_money').val();
		var  date_payment = $('#date_payment').val();
		var  check_no = $('#check_no').val();
		var  check_bank_name = $('#check_bank_name').val();
		var  credit_card = $('#showCreditCard').val();
		var  check_data = $('#check_data').val();
		var  bill_company_id = $('#bill_company_id option:selected').val();
		var  blii_code_id = $('#blii_code_id option:selected').val();
		var  select_day_bill = $('#select_day_bill option:selected').val();
		var  select_month_bill = $('#select_month_bill option:selected').val();
		var  select_year_bill = $('#select_year_bill option:selected').val();
		var  select_year_bill = $('#select_year_bill option:selected').val();
		
		var  paid_bye = $('#paid_bye').val();
		var  paid_bye_date = $('#paid_bye_date').val();
		var  approve_by = $('#approve_by').val();
		var  approve_by_date = $('#approve_by_date').val();
		var  collector = $('#collector').val();
		var  collector_date = $('#collector_date').val();
		
		
		var pay_type = 0 ;
		var selectPay_type  = document.querySelector('input[name="pay_type"]:checked');
		if (selectPay_type) {
			// Get the value of the checked radio button
			var checkedValue = selectPay_type.value;
			var pay_type = checkedValue;
		  } /*else {
			if(transfer_money!=''){
				var pay_type = 1 ;
			}else{
				var pay_type = 0 ;pay_type
			}
			
		  }*/
		
		var select_day_start = $('#select_day_start option:selected').val();
		var select_month_start = $('#select_month_start option:selected').val();
		var select_day_end = $('#select_day_end option:selected').val();
		var select_month_end = $('#select_month_end option:selected').val();
		var select_year = $('#select_year option:selected').val();
		
		if(bill_company_id=='x'){
			alert('กรุณาเลือกบริษัท');
		}else if(blii_code_id=='x'){
			alert('กรุณาเลือกโค้ด');
		}else{
			$.post('<?php echo base_url('insurance_car2/saveBilling')?>',{    keygroup:keygroup , bill_company_id:bill_company_id , blii_code_id:blii_code_id , select_day_bill:select_day_bill, select_month_bill:select_month_bill,select_year_bill:select_year_bill,transfer_money:transfer_money,date_payment:date_payment,pay_type:pay_type, check_bank_name:check_bank_name , check_no:check_no , paid_bye :paid_bye,paid_bye_date:paid_bye_date, approve_by:approve_by , approve_by_date:approve_by_date , collector :collector , collector_date:collector_date, select_day_start:select_day_start,select_month_start:select_month_start,select_day_end:select_day_end,select_month_end:select_month_end, select_year:select_year, credit_card:credit_card,check_data:check_data},function(data){
			var obj = JSON.parse(data);
			
			if(obj.DoDb=='1'){ 
				console.log('ok')
				DoPrintBilling();
			}else{
				alert('ไม่สามารถแก้ไขข้อมูลได้');
			}
			
		})
		}

	}
	//---------------------------------------blii_code_id date_payment check_no select_day_bill select_day_bill 
	function SaveBilling(){
		var  keygroup = $('#keygroup').val();
		var  transfer_money = $('#transfer_money').val();
		var  date_payment = $('#date_payment').val();
		var  check_no = $('#check_no').val();
		var  check_bank_name = $('#check_bank_name').val();
		var  credit_card = $('#showCreditCard').val();
		var  check_data = $('#check_data').val();
		var  bill_company_id = $('#bill_company_id option:selected').val();
		var  blii_code_id = $('#blii_code_id option:selected').val();
		var  select_day_bill = $('#select_day_bill option:selected').val();;
		var  select_month_bill = $('#select_month_bill option:selected').val();;
		var  select_year_bill = $('#select_year_bill option:selected').val();;
		
		var  paid_bye = $('#paid_bye').val();
		var  paid_bye_date = $('#paid_bye_date').val();
		var  approve_by = $('#approve_by').val();
		var  approve_by_date = $('#approve_by_date').val();
		var  collector = $('#collector').val();
		var  collector_date = $('#collector_date').val();
	
		console.log('paid_bye>'+paid_bye+' paid_bye_date>'+paid_bye_date )
		
		var pay_type = 0 ;
		/*var selectPay_type  = document.querySelector('input[name="pay_type"]:checked');
		if (selectPay_type) {
			// Get the value of the checked radio button
			var checkedValue = selectPay_type.value;
			var pay_type = checkedValue;
		  } /*else {
			if(transfer_money!=''){
				var pay_type = 1 ;
			}else{
				var pay_type = 0 ;pay_type
			}
			
			
			
		  }*/
		
		var select_day_start = $('#select_day_start option:selected').val();
		var select_month_start = $('#select_month_start option:selected').val();
		var select_day_end = $('#select_day_end option:selected').val();
		var select_month_end = $('#select_month_end option:selected').val();
		var select_year = $('#select_year option:selected').val();
		
		console.log('select_day_start>'+select_day_start+' select_month_start>'+select_month_start+' ');
		if(bill_company_id=='x'){
			alert('กรุณาเลือกบริษัท');
		}else if(blii_code_id=='x'){
			alert('กรุณาเลือกโค้ด');
		}else{
			$.post('<?php echo base_url('insurance_car2/saveBilling')?>',{    keygroup:keygroup , bill_company_id:bill_company_id , blii_code_id:blii_code_id , select_day_bill:select_day_bill, select_month_bill:select_month_bill,select_year_bill:select_year_bill,transfer_money:transfer_money,date_payment:date_payment,pay_type:pay_type, check_bank_name:check_bank_name , check_no:check_no , paid_bye :paid_bye,paid_bye_date:paid_bye_date, approve_by:approve_by , approve_by_date:approve_by_date , collector :collector , collector_date:collector_date, select_day_start : select_day_start ,select_month_start:select_month_start,select_day_end:select_day_end,select_month_end:select_month_end,select_year:select_year,credit_card:credit_card ,check_data:check_data  },function(data){
			
			var obj = JSON.parse(data);
			if(obj.DoDb=='1'){ 
				console.log('ok save')
				alert('บันทึกข้อมูลแล้ว')
				//DoPrintBilling();
				createBlling();
			}else{
				alert('ไม่สามารถแก้ไขข้อมูลได้');
			}
			
		})
		}
	}
	//---------------------------------------select_year select_month_start
	function createBlling(){
		var  keygroup = $('#keygroup').val();
		//var  control_month = $('#control_month').val();
		//var  control_year = $('#control_year').val();
		var select_day_start = $('#select_day_start option:selected').val();
		var select_month_start = $('#select_month_start option:selected').val();
		var select_day_end = $('#select_day_end option:selected').val();
		var select_month_end = $('#select_month_end option:selected').val();
		var select_year = $('#select_year option:selected').val();
		
		var  control_month = select_month_start;
		var  control_year = select_year;
		
		$.post('<?php echo base_url('insurance_car2/createBlling')?>',{    keygroup:keygroup , control_month:control_month , control_year:control_year   },function(data){
			$('#showBilling').empty();
			$('#showBilling').html(data);
		})
	}
	//---------------------------------------
	function printControlBoard(){
		var  keygroup = $('#keygroup').val();
		var  control_month = $('#select_month_start').val();
		var  control_year = $('#select_year').val();
		
		$.post('<?php echo base_url('insurance_car2/printControlBoardByKey')?>',{    keygroup:keygroup , control_month:control_month , control_year:control_year   },function(data){
			$('#ctrlPrinOnly').empty();
			$('#ctrlPrinOnly').html(data);
		})
	}
	//---------------------------------------
	  function calculateSumDelivery(field) {
        var sum = 0;
		  
		 if((field=='amt_recieve_act')||(field=='amt_recieve_ins')||(field=='amount')){
			
			 var visibleRows = $('tr:not([style="display:none"])');

			// Sum the values from the input fields in visible rows
			var sum = 0;
			visibleRows.find('.agentImcome').each(function () {
			  var value = $(this).val().replace(/,/g, ''); // Remove commas from the value
			  sum += parseFloat(value) || 0;  // Convert to float and add to sum
			});
			 var sumtotalAgent =  sum.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");	
				
			
			// $("#sumAgentDiv").html('<strong>'+sum.toLocaleString('en-US', {maximumFractionDigits: 2})+'</strong>');
			 $("#sumAgentDiv").html('<strong>'+sumtotalAgent+'</strong>');
			 
			 
			 
		   
		  }else if((field=='delivery_allowance')||(field=='act_delivery_allowance')||(field=='amount_delivery')){
			// Loop through each input with class 'dv' and add its value to the sum
			/*$(".dv").each(function () {
			   var value = parseFloat($(this).val().replace(/,/g, '')) || 0;
			  sum += value;   
			});*/

			 var visibleRows = $('tr:not([style="display:none"])');

			// Sum the values from the input fields in visible rows
			var sum = 0;
			visibleRows.find('.dv').each(function () {
			  var value = $(this).val().replace(/,/g, ''); // Remove commas from the value
			  sum += parseFloat(value) || 0;  // Convert to float and add to sum
			}); 
			  
		       console.log('sum>>'+sum)
			 var sumtotal =  sum.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");var sumtotal =  sum.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
 			  // $("#sumDelivery").html('<strong>'+sum.toLocaleString('en-US', {maximumFractionDigits: 2 })+'</strong>');
 			   $("#sumDelivery").html('<strong>'+sumtotal+'</strong>');
		  }
		 createBlling();
      }
	//---------------------------------------
	function DeleteControl(custname,dataID){
		if(confirm('ต้องการลบ '+custname+' ?')){
			$.post('<?php echo base_url('insurance_car2/DeleteControl')?>',{    dataID:dataID   },function(data){
			
			var obj = JSON.parse(data);
			
			if(obj.DoDb=='1'){ 
				console.log('ok')
				var keygroup= $('#keygroup').val();
				listcontrolByKey(keygroup);
				createBlling();
			}else{
				alert('ไม่สามารถแก้ไขข้อมูลได้');
			}
			
		})
		}else{
			return false;
		}
	}
	//---------------------------------------UpdateBoardControl #checkInput
	function UpdateBoardControl(field,dataID,changeValue,insurance_id,keygroup){
		$.post('<?php echo base_url('insurance_car2/UpdateBoardControl')?>',{  field:field , dataID:dataID , changeValue:changeValue , insurance_id:insurance_id ,keygroup:keygroup },function(data){
			var obj = JSON.parse(data);
			console.log(data);
			if(obj.DoDb=='1'){ 
				//calculateSumDelivery(field);
				keygroup = $('#keygroup').val();listcontrolByKey(keygroup);
				//$('#hiddenInsAllowent'+dataID).val(changeValue);
				createBlling();
				//if(field=='check_payment_date'){
				//	$('.checkInput').val(changeValue)
				//	$('.act_check_payment_date').val(changeValue)
				//}
			}else{
				alert('ไม่สามารถแก้ไขข้อมูลได้');
			}
			
		})
	}
	//---------------------------------------
	function listcontrolByKey(keygroup){
			 $.post('<?php echo base_url('insurance_car2/listcontrolByKey')?>',{  keygroup:keygroup },function(data){
			
			 $('#showCtrlBoard').empty();
			 $('#showCtrlBoard').html(data);
			
		})
	}
	//---------------------------------------
	function updateNetBalance(field,changeValue,CtrlID){
		var cleanedValue2 = changeValue.replace(/,/g, '');
		$.post('<?php echo base_url('insurance_car2/updateNetBalance')?>',{ field:field, changeValue:cleanedValue2 ,CtrlID:CtrlID },function(data){
			var obj = JSON.parse(data);
			if(obj.doDb=='1'){
				console.log('ok-update');
				keygroup = $('#keygroup').val(); listcontrolByKey(keygroup);
			}else{
				console.log('Cannot-update !!!');
			}
		})
	}
	//---------------------------------------control_month
	
	function addToBControl(dataID,addType,data_type){
		var  keygroup = $('#keygroup').val();
		
		var select_day_start = $('#select_day_start option:selected').val();
		var select_month_start = $('#select_month_start option:selected').val();
		var select_day_end = $('#select_day_end option:selected').val();
		var select_month_end = $('#select_month_end option:selected').val();
		var select_year = $('#select_year option:selected').val();
		
		var  control_month = $('#control_month option:selected').val();
		var  control_year = $('#control_year option:selected').val();
		
		console.log('addToBControl keygroup>'+keygroup);
		
		$.post('<?php echo base_url('insurance_car2/addToBControl')?>',{ dataID:dataID , keygroup:keygroup, control_month:control_month, control_year:control_year , addType:addType , select_day_start:select_day_start,select_month_start:select_month_start,select_day_end:select_day_end,select_month_end:select_month_end,select_year:select_year ,data_type:data_type},function(data){
			 //$('#showContolAdd').empty();
			// $('#showContolAdd').html(data);
			console.log(data);
			var obj = JSON.parse(data);
			if(obj.DoDb=='1'){
				$('#keygroup').val(obj.keygroup);
				listcontrolByKey(obj.keygroup);
				var new_url="<?php echo base_url('Insurance_car/insurance_billing/')?>"+obj.keygroup;
				window.history.pushState("data","Title",new_url);
				createBlling();
			}

		})
	}
	
	//-------------------------------------------
	function addToBControl2(dataID,addType){
		var text_caption = $('#text_caption').val();
		
		
		var select_day_start = $('#select_day_start option:selected').val();
		var select_month_start = $('#select_month_start option:selected').val();
		var select_day_end = $('#select_day_end option:selected').val();
		var select_month_end = $('#select_month_end option:selected').val();
		var select_year = $('#select_year option:selected').val();
		
		var  keygroup = $('#keygroup').val();
		var  control_month = select_month_start;
		var  control_year = select_year;
		
		
		
		
		if(text_caption==''){
			alert('กรุณาใส่ข้อความ');
			return false;
		}else{
			$.post('<?php echo base_url('insurance_car2/addToBControl')?>',{ dataID:dataID , keygroup:keygroup, control_month:control_month, control_year:control_year , addType:addType ,text_caption:text_caption},function(data){
			 //$('#showContolAdd').empty();
			// $('#showContolAdd').html(data);
			
			var obj = JSON.parse(data);
			if(obj.DoDb=='1'){
				 $('#text_caption').val('');
				$('#keygroup').val(obj.keygroup);
				listcontrolByKey(obj.keygroup);
				var new_url="<?php echo base_url('Insurance_car/insurance_billing/')?>"+obj.keygroup;
				window.history.pushState("data","Title",new_url);
			}

		})
		}
	} 
	//-------------------------------------------
	
	function buildprintReservePrint(content)
{  
  
   var head='<!DOCTYPE html>'+
              '<html>'+
              '<head>'+
              '<meta charset="UTF-8">'+''+
              '<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />'+
              '<style>@media print {  @page     { font-size:11px;   size:  auto;  margin: 5mm;  } table, th, td {  border: 1px solid black; font-size:12px; padding:3px;   } } </style>'+
              '</head>'+
              '<body>';

  var foot=   '</body>'+
              '</html>';

  return  head+content+foot;      
}
	//--------------------------
	function buildprintReservePrint2(content)
{  
  
   var head='<!DOCTYPE html>'+
              '<html>'+
              '<head>'+
              '<meta charset="UTF-8">'+''+
              '<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />'+
              '<style>@media print {  @page     { font-size:11px;   margin-left: 20px;  margin-right: 20px;  }  .box-subcharoen{ text-align: center;		padding: 10px;		border-style: solid;		border-width: 2px; border-color: blue;		font-size: 20px;	color:#004506;		width: 40%;		margin: 0 auto;} .allBorder{ border-style: solid; border-color:black;border-width: thin; } .borderTopButtom{ 		 border-top: thin solid black; border-bottom: thin solid black;	} .BorkderR{ border-right: thin solid black;} .borderBtDash{ border-style: dashed; 	border-top: none;	border-left: none;	border-right: none;	border-bottom-width: 1px;	} } </style>'+
              '</head>'+
              '<body>';

  var foot=   '</body>'+
              '</html>';

  return  head+content+foot;      
}	
	
	//------------------------ 
	function printBilling(){
		var company_id = $('#company_id option:selected').val();
		var companyName = $('#company_id option:selected').text();
		var agent_id = $('#agent_id option:selected').val();
		var agentName = $('#agent_id option:selected').text();
		var selectDate = $('#selectDate option:selected').val();
		var selectDateName = $('#selectDate option:selected').text();
		var selectMonth = $('#selectMonth option:selected').val();
		var selectMonthName = $('#selectMonth option:selected').text();
		var selectYear = $('#selectYear option:selected').val();
		var selectYearThai = $('#selectYear option:selected').text();
		$.post('<?php echo base_url('insurance_car2/printBilling')?>',{ company_id:company_id,companyName:companyName,agent_id:agent_id,agentName:agentName,selectDate:selectDate,selectDateName:selectDateName,selectMonth:selectMonth,selectMonthName:selectMonthName,selectYear:selectYear, selectYearThai:selectYearThai },function(data){ 
			$('#showBiilingPrintArea').empty();
			$('#showBiilingPrintArea').html(data);
		})
		
	}
	//------------------------ 
	function getSumAllAmt(){
		 var sum = 0;
				$(".amt").each(function() {
			  // Parse the value of each input as a number and add it to the sum
			  var inputValue = parseFloat($(this).val());
			  if (!isNaN(inputValue)) {
				sum += inputValue;
			  }
				var allsum = sum.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");	
				$('#nRow1').html(allsum);	
			 });
		
	}
	//------------------------ boxIns boxAct insurane_amount act_amount
	function updateAmt(dataID,fname,chVal){
		$.post('<?php echo base_url('insurance_car2/updateBillAmt')?>',{ dataID:dataID,fname:fname,chVal:chVal },function(data){
			   var obj = JSON.parse(data);
				if(obj.DoDb=='1'){
					if(fname=='insurane_amount'){
						$("#boxIns"+dataID).css("display","block");
						setTimeout(function(){ $("#boxIns"+dataID).css("display","none");},4000);
					}else if(fname=='act_amount'){
						$("#boxAct"+dataID).css("display","block");
						setTimeout(function(){ $("#boxAct"+dataID).css("display","none");},4000);
					}
					getSumAllAmt();
				}else{
					alert('ไม่สามารถเพิ่มเข้อมูลได้');
				}
		}) 
	}
	
	//------------------------ 
	function showBilling(){
		//var company_id = $('#company_id option:selected').val();
		//var agent_id = $('#agent_id option:selected').val();
		//var selectDate = $('#selectDate option:selected').val();
		//var selectMonth = $('#selectMonth option:selected').val();
		//var selectYear = $('#selectYear option:selected').val();
		//listBilling(agent_id,company_id,selectDate,selectMonth,selectYear);
	}
	//------------------------ 
	function  DeleteFromBill(dataID,custname){
		var company_id = $('#company_id option:selected').val();
		var agent_id = $('#agent_id option:selected').val();
		var selectDate = $('#selectDate option:selected').val();
		var selectMonth = $('#selectMonth option:selected').val();
		var selectYear = $('#selectYear option:selected').val();
		if(confirm('ต้องการลบรายการ '+custname+' ?')){
			$.post('<?php echo base_url('insurance_car2/DeleteFromBill')?>',{ dataID:dataID, },function(data){
			   var obj = JSON.parse(data);
				if(obj.DoDb=='1'){
					listBilling(agent_id,company_id,selectDate,selectMonth,selectYear);
				}else{
					alert('ไม่สามารถเพิ่มเข้อมูลได้');
				}
		   })
		}else{
			return false;
		}
		
	}
	//------------------------ 
	function listBilling(agent_id,company_id,selectDate,selectMonth,selectYear){
		$.post('<?php echo base_url('insurance_car2/listBilling')?>',{ agent_id:agent_id, company_id:company_id,selectDate:selectDate,selectMonth:selectMonth,selectYear:selectYear },function(data){
			
			$('#showBillingList').empty();
			$('#showBillingList').html(data);
		})
	}
	//------------------------  
	function  addToBilling(insurance_id){
		//var company_id = $('#company_id option:selected').val();
		//var agent_id = $('#agent_id option:selected').val();
		//var selectDate = $('#selectDate option:selected').val();
		//var selectMonth = $('#selectMonth option:selected').val();
		//var selectYear = $('#selectYear option:selected').val();
		
		$.post('<?php echo base_url('insurance_car2/previewControl')?>',{ insurance_id:insurance_id, agent_id:agent_id},function(data){ 
				var obj = JSON.parse(data);
				if(obj.DoDb=='1'){
					listBilling(agent_id,company_id,selectDate,selectMonth,selectYear);
				}else{
					alert('ไม่สามารถเพิ่มเข้อมูลได้');
				}
		})
			
		
	}
	//------------------------  
	function reloadSelectList(){
		$.post('<?php echo base_url('insurance_car2/reloadCompanyList')?>',{   },function(data){
			  $('#company_id')
				.find('option')
				.remove()
				.end()
				.append(data);
		})	
		$.post('<?php echo base_url('insurance_car2/reloadAgentList')?>',{   },function(data){
			  $('#agent_id')
				.find('option')
				.remove()
				.end()
				.append(data);
		 })
			   
	}
	//------------------------
	function openCompanyForm(){
		$.post('<?php echo base_url('insurance_car2/openCompanyForm')?>',{   },function(data){
			
			
		})
	}
	//------------------------
	function clearSearchArea(){
		$('#showSearch').empty();
	}
	//------------------------
	function showBillSearchForm(){
		$.post('<?php echo base_url('insurance_car2/showBillSearchForm')?>',{   },function(data){
			$('#showBillingsearchForm').empty();
			$('#showBillingsearchForm').html(data);
		})
	}
	//------------------------	
	
	//------------------------	
	
	//------------------------	
	function calculateSum(){
		var sum = 0;
        
        // Loop through all inputs with class "number-input"
        $('.amountInsurance').each(function() {
            var inputValue = parseFloat($(this).val()) || 0; // Convert input value to a number
            sum += inputValue;
        });
		
		var totalSum = (sum).toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
		$('.divSum').html(totalSum)
		$('#BtnPrintBill').prop('disabled', true);
	}
	//------------------------	
	function goToBillingPage(){
		var valuesArray = [];
			// Select all hidden inputs with the name "your_name_here"
			$('input[name="selectID"]').each(function() {
				valuesArray.push($(this).val());
			});

			// Now, valuesArray will contain ["Value 1", "Value 2", "Value 3"]
			console.log(valuesArray);
			if (valuesArray.length === 0) {
				alert("กรุณาเลือกลูกค้าเพื่อทำรายการ");
			} else {
				// Array has values, so you can work with it as needed
				if(confirm('ยืนยันข้อมูลที่เลือก')){
					
						$.post('<?php echo base_url('insurance_car2/goToBillingPage')?>',{ valuesArray:valuesArray},function(data){ 
								$('#workArea').empty();
								$('#workArea').html(data);
								
						}) 
					
					
					}else{
						return false;
					}
			}
		
			
		    
	}
	//------------------------	
	function removeRow(dataID){
		console.log(dataID)
		$('#newrow_'+dataID).remove();
		
	}
	
	//------------------------
	function addToList(dataID){
		
		 //var row = $('#row'+dataID).closest('tr').clone();
		// $('#table2').append(row);
		
		  var clonedRow = $('#row'+dataID).closest('tr').clone();
          
		  //var newRowID = 'row_' + Math.random().toString(36).substring(7);
		  var newRowID = 'newrow_' + dataID;
               // Set the ID for the cloned row
            clonedRow.attr('id', newRowID);
	
            clonedRow.find('td:eq(0)').html('<button class="btn btn-danger btn-sm" onclick="removeRow('+dataID+')">-</button><input type="hidden" name="selectID" id="selectID" value="'+dataID+'">'); // Change the text as needed
		
		 // Append the modified row to table2
		    $('#table2').append(clonedRow);
		   // var valueArray = [];
		   //  valueArray.push(dataID);
			// displayArray()
               
		
		//$.post('<?php //echo base_url('insurance_car2/addToListBilling')?>',{ dataID:dataID},function(data){ 
			
		//})
	}
	
	//-------------------------------------
	  function displayArray() {
                // Clear the existing list
                $('#valueList').empty();

                // Loop through the array and create list items
                for (var i = 0; i < valueArray.length; i++) {
                    $('#valueList').append('<li>' + valueArray[i] + '</li>');
                }
            }
	//------------------------------------- 
	function setExclude(ie){
		console.log('check >'+ie.checked+' value>'+ie.value)
		if(ie.checked==true){
			$('#select_day_start option[value="x"]').prop('selected', true)
			$('#select_month_start option[value="x"]').prop('selected', true)
			$('#select_day_end option[value="x"]').prop('selected', true)
			$('#select_month_end option[value="x"]').prop('selected', true)
		}else{
			var select_day_start =  $('#select_day_start_temp').val();
			var select_month_start = $('#select_month_start_temp').val();
			var select_day_end= $('#select_day_end_temp').val();
			var select_month_end= $('#select_month_end_temp').val();
			
			console.log('select_day_start>'+select_day_start+'  select_month_start>'+select_month_start+' select_day_end>'+select_day_end+' select_month_end>'+select_month_end)
			
			$('#select_day_start option[value="'+select_day_start+'"]').prop('selected', true)
			$('#select_month_start option[value="'+select_month_start+'"]').prop('selected', true)
			$('#select_day_end option[value="'+select_day_end+'"]').prop('selected', true)
			$('#select_month_end option[value="'+select_month_end+'"]').prop('selected', true)
		}
		
	}
	//------------------------------------- 
	function SetTempSelect(ie,fieldID){
		if(ie.value!='x'){
			$('#'+fieldID).val(ie.value);
		}
		
	}
	//-------------------------------------    
	function searchCustForbilling()	{ 
		  
		var custname = $('#custname').val();
		var plate_license = $('#plate_license').val();
		var selectYear = $('#control_year option:selected').val();
		var insurance_corp_id = $('#insurance_corp_id option:selected').val();
		var select_day_start = $('#select_day_start option:selected').val();
		var select_month_start = $('#select_month_start option:selected').val();
		var select_day_end = $('#select_day_end option:selected').val();
		var select_month_end = $('#select_month_end option:selected').val();
		var select_year = $('#select_year option:selected').val();
		var agent_id = $('#Xagent_id option:selected').val();
		
		var select_day_start_text = $('#select_day_start option:selected').text();
		var select_month_start_text = $('#select_month_start option:selected').text();
		var select_day_end_text = $('#select_day_end option:selected').text();
		var select_month_end_text = $('#select_month_end option:selected').text();
		var select_year_text = $('#select_year option:selected').text();
		
		if ($('#exclude_contact').prop('checked')) {
    		var exclude_contact = 1;
			console.log('exclude_contact>'+exclude_contact)
			
		} else {
    		var exclude_contact = 0;
			console.log('exclude_contact>'+exclude_contact)
		}
		
		//if((custname=='')&&(insurance_corp_id=='x')&&(agent_id=='x')){
		//	alert('กรุณาใส่เงื่อนไขในการค้นหา'); exclude_contact select_day_start select_month_start select_day_end select_month_end
		//	return false;
		//}else{
			$.post('<?php echo base_url('insurance_car2/searchCustForbilling')?>',{ custname:custname, selectYear:selectYear,agent_id:agent_id, insurance_corp_id:insurance_corp_id,plate_license:plate_license,select_day_start:select_day_start,select_month_start:select_month_start,select_day_end:select_day_end,select_month_end:select_month_end,select_year:select_year,exclude_contact:exclude_contact},function(data){
				 
				 $('#showSearch').empty();
				 $('#showSearch').html(data);
				
				
			})
		//}
		
			
							//var obj = JSON.parse(data);
		
	}		
	//--------------------{ var  
    $(document).ready(function(){
		keygroup = $('#keygroup').val();
		console.log('keygroup>'+keygroup);
		if(keygroup!=''){
			listcontrolByKey(keygroup);
			createBlling();
		}
		
		
		
	})
	
</script>