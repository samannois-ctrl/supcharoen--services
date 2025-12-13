<script>
	//----------------------- 
	function openSearchForm(){
			$('#largeModel').modal('show');
	}
	//----------------------- 
	function searchCustomer2(){  //s_custname s_cust_nickname s_phone s_registration s_workType selectYear
		var custname = $('#s_custname').val();
		var cust_nickname = $('#s_cust_nickname').val();
		var phone = $('#s_phone').val();
		var registration = $('#s_registration').val();
		var workType = "";
		var workTypeName = "";
		var selectYear = "";
		var selectYearName = "";
		var payment = "";
		
		//var workType = $('#s_workType option:selected').val();
		//var workTypeName = $('#s_workType option:selected').text();
		//var selectYear = $('#selectYear option:selected').val();
		//var selectYearName = $('#selectYear option:selected').text();
		//var payment = $('#s_payment option:selected').val();
		if((custname=='')&&(cust_nickname=='')&&(registration=='')){
			alert('กรุณาใส่คำค้นหา');
			return false;
		}else{
			$.post('<?php echo base_url('insurance_car/searchCustomer_inspection2')?>',{ custname:custname, cust_nickname:cust_nickname,phone:phone,registration:registration,workType:workType, workTypeName:workTypeName, selectYear:selectYear,selectYearName:selectYearName,payment:payment},function(data){
			
			$('#showSearchData').empty();
			$('#showSearchData').html(data);
			})
		}
		
	}
	//----------------------- brand_id
	function renewME(CustID,CarID,GetWorkID){
		var CurrentWorkID = $('#workID').val();
		
		console.log(CustID+' '+CarID+' '+GetWorkID+' CurrentWorkID>'+CurrentWorkID)
	    $.post('<?php echo base_url('insurance_car/renewME')?>',{  CustID:CustID,CarID:CarID,GetWorkID:GetWorkID}, function(data){
			var obj = JSON.parse(data);
		
			$('#cust_name').val(obj.cust_name);
			$('#cust_nickname').val(obj.cust_nickname);
			$('#cust_telephone_1').val(obj.cust_telephone_1);
			$('#cust_telephone_2').val(obj.cust_telephone_2);
			$('#vehicle_regis').val(obj.vehicle_regis);
			$('#province_regis').val(obj.province_regis);
			$('#year_car').val(obj.year_car);
			$('#vin_no').val(obj.vin_no);
			$('#engine_size').val(obj.engine_size);
			$('#car_brand').val(obj.car_brand);
			$('#car_model').val(obj.car_model);
			$('#car_type_id').val(obj.car_type_id);
			
			$('#date_regist').val(obj.date_regist_day);
			$('#month_regist').val(obj.date_regist_month);
			$('#year_car').val(obj.date_regist_year);
			
			$('#vin_no').val(obj.vin_no);
			$('#engine_size').val(obj.engine_size);
			$('#car_brand').val(obj.car_brand);
			$('#brand_id').val(obj.brand_id);
			
			
			
			if(obj.is_corporation=='1'){
				$('#is_corporation').attr('checked','checked');
			}
			
			updateTaxExpire(); getCarPremiumX(obj.car_type_id,obj.type_premium_id);setdecardedug();
			$('#largeModel').modal('hide');
			$('#showSearchData').empty();
			$('#s_registration').val('');
			$('#s_cust_nickname').empty();
			$('#s_custname').empty();
			
		})
	}
	//----------------------- 
	function  updateOverDue(e,section){
		//---check section pay_cash_overdue	pay_transfer_overdue pay_transfer2_overdue ถ้า tick==true ให้เข็คว่ามีการติ๊ก หรือ ช่องเงินมีค่าว่างหรือไม่	 pay_cash_check pay_cash
		/* if(e.checked==true){
			var updateVal='1';
		 }else{
			var updateVal='0';
		  }
		var workID = $('#workID').val();
		
		if(section=='pay_cash_overdue'){
			var pay_cash = $('#pay_cash').val();
			if($('#pay_cash_check').is(':checked')&&(pay_cash!='')){
				
			}else{
				alert('กรุณาติ๊กช่องเงินสดและใส่จำนวนเงินสด');
				return false;
			}
		}
		
		
		$.post('<?php //echo base_url('insurance_car/updateOverDue')?>',{ workID:workID,updateVal:updateVal,section:section},function(data){
					 
		})*/
	}
	//----------------------- 
	function addCarBrand(){
		var car_brand_name = $('#car_brand_name').val();
		if(car_brand_name==''){
			alert('กรุณาใส่ยี่ห้อรถ');
			return false;
		}else{
			 $.post('<?php echo base_url('setting/addCarBrand')?>',{ car_brand_name:car_brand_name},function(data){
			  if(data!='Error'){
				  alert('เพิ่มข้อมูลสำเร็จแล้ว');
				  $('#car_brand_name').val('')
				  $("#carBrandDiv").css("display","none");
				  $('#brand_id').find('option').remove().end().append(data)
			  }else{
				   alert('ไม่สามารถเพิ่มยี่ห้อรถได้');
				  cosole.log(data);
			  }
			 
		 })
		}
	}  
	//----------------------- 
	function toggleAddBrand(){
		$("#toggleButton").click(function(){
        $("#myDiv").toggle();
      });
	}
	//----------------------- 
	function setActForm(e){
		//console.log(e.checked)
		if(e.checked==false){
			setdecardedug();
			//getCarPremium();
			
		}else if(e.checked==true){

			$('#act_price').val('');
			$('#act_discount').val('');
			$('#act_tax').val('');
			$('#act_vat').val('');
			$('#act_price_net').val('');
			$('#deduct_percent').val('');
			$('#other_paid').val('');
			$('#act_price_total').val('');
			$('#act_date_start').val('');
			$('#act_date_end').val('');
			$('#act_no').val('');

			$('#corp_id option[value="x"]').attr("selected", "selected");
			$('#act_type_id option[value="x"]').attr("selected", "selected");
			
		}
		getCarcheckTotal();
	}
	//----------------------- 
	function updateTaxExpire(){
		var date =$('#date_regist').val();
		var month_regist =$('#month_regist option:selected').val();
		if(month_regist=='x'){
			var month_regist ='00';
		}
		var year_car =$('#year_car').val();
		var currentYear = (new Date).getFullYear();
		var currentYear = parseInt(currentYear);
		var nexYear = currentYear+544;
		//console.log('currentYear>>'+currentYear)
		var SetDateExpire = date+'/'+month_regist+'/'+nexYear;
		//console.log('SetDateExpire>'+SetDateExpire)
		$('#date_registration_end').val(SetDateExpire);
	}
	//----------------------- 
	function getCarPremiumX(car_type_id,type_premium_id){
		
		console.log('car_type_id >'+car_type_id+' type_premium_id>'+type_premium_id);
		 $.post('<?php echo base_url('insurance_car/getCarPremiumListX')?>',{ car_type_id:car_type_id,type_premium_id:type_premium_id},function(data){
			  $('#listCC').empty();
			  $('#listCC').html(data);
			 
		 })
	}
	//----------------------- 
	function getCarPremium(){
		var car_type_id = $('#car_type_id option:selected').val();
		
		 $.post('<?php echo base_url('insurance_car/getCarPremiumList')?>',{ car_type_id:car_type_id},function(data){
			  $('#listCC').empty();
			  $('#listCC').html(data);
			 
		 })
	}
	//----------------------- changeVale.r
	function updateAmountPay(e,formName){
		//console.log(e.name)
		//console.log(e.value)
		//console.log(e.checked)
		
		var total_work_price = $('#total_work_price').val().replace(/\,/g,'');
		var total_work_price = parseFloat(total_work_price);
	
		if(e.name=='pay_cash_check'){
			 if(e.checked==false){ 
				$('#pay_cash').val('0');
				 calculatePayment('pay_cash','0.00');
			}else{
				//calculatePayment(formName,changeVale)
				var pay_transfer = $('#pay_transfer').val().replace(/\,/g,'');
				var total_work_price = parseFloat(total_work_price);
				
				//if(total_work_price >= pay_transfer ){
					 var pay_cash = (total_work_price-pay_transfer).toFixed(2);
					
				//}else{
				//	var pay_cash = total_work_price.toFixed(2);
				//}
				
				 var displaySumtotalCash = pay_cash.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				//console.log('**displaySumtotalCash>'+displaySumtotalCash+' pay_cash>'+pay_cash);
				if(pay_cash!='0.00'){
					calculatePayment('pay_cash',displaySumtotalCash);
				}
				
			
			}
		}else if(e.name=='pay_transfer_check'){
			if(e.checked==false){ 
				$('#pay_transfer').val('0');
				calculatePayment('pay_transfer',0);
				$('#pay_transfer_date').val('')
			}else{
				
				var pay_cash = $('#pay_cash').val().replace(/\,/g,'');
				var total_work_price = parseFloat(total_work_price);
				
				//if(total_work_price >= pay_cash ){
					 var pay_transfer = (total_work_price-pay_cash).toFixed(2);
					
				//}else{
				//	var pay_transfer = total_work_price.toFixed(2);
				//}
				
				 var displaySumtotalTran = pay_transfer.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				// console.log('**displaySumtotalCash>'+displaySumtotalTran+' pay_transfer>'+pay_transfer);
				 if(pay_transfer!='0.00'){
					calculatePayment(formName,displaySumtotalTran);
				 }
				
			}
		}		
	
		//calculatePayment();
		
	}
	
	//----------------------- 
	function calculatePayment(formName,changeVale){
		
		/*console.log('formName>'+formName+' changeVale>'+changeVale);
		console.log('calculatePayment > changeVale>'+changeVale)
		
		if(changeVale==''){ var changeVale=0; }
		
		var total_work_price = $('#total_work_price').val().replace(/\,/g,'');
		var total_work_price = parseFloat(total_work_price);
		
		var cashCheck =  $('#pay_cash_check').is(":checked");
		var TranCheck =  $('#pay_transfer_check').is(":checked");
		
		
		console.log('formName>'+formName+' changeVale>'+changeVale+' cashCheck>'+cashCheck);
		
		if(formName=='pay_cash'){
			// $('.myCheckbox').prop('checked', true);	
			var changeVale = changeVale.replace(/\,/g,'');
			var changeVale = parseFloat(changeVale);
			var cashCheck =  $('#pay_cash_check').is(":checked");
			
			if(changeVale > 0){
				$('#pay_cash_check').prop('checked', true);	
				var totalTran = (total_work_price - changeVale).toFixed(2);
				var displaySumtotalTran = totalTran.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");		
				var changeVale = changeVale.toFixed(2);
				var displaychangeVale = changeVale.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				
				$('#pay_cash').val(displaychangeVale);
				$('#pay_transfer').val(displaySumtotalTran);
				if(displaySumtotalTran!='0.00'){
					$('#pay_transfer_check').prop('checked', true);	
				}else{
					$('#pay_transfer_check').prop('checked', false);	
				}
				
			}else {
			    $('#pay_cash_check').prop('checked', false);
				$('#pay_cash').val('0');
			}
			
			if(changeVale < total_work_price){  }
			
		}else if(formName=='pay_transfer'){
			//var changeVale = changeVale.replace(/\,/g,'');
			var changeVale = parseFloat(changeVale);
			var TranCheck =  $('#TranCheck').is(":checked");
			
			
			if(changeVale > 0){
				$('#pay_transfer_check').prop('checked', true);	
				var totalCash = (total_work_price -changeVale).toFixed(2);
				var displaySumtotalCash = totalCash.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				var changeVale = changeVale.toFixed(2);
				var displaychangeVale = changeVale.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				$('#pay_cash').val(displaySumtotalCash);
				$('#pay_transfer').val(displaychangeVale);
			}else {
			    $('#pay_transfer_check').prop('checked', false);
				$('#pay_cash').val('0');
			}
			
		}	*/
	
	
	}
	//----------------------- 	pay_transfer_check
	function SaveToRoOr(){
		
		var bank_acc_id = $('#bank_acc_id option:selected').val();
		var bank_acc_id2 = $('#bank_acc_id2 option:selected').val();
		var pay_type = $('input[name=pay_type]:checked').val()
		
		var cashCheck =  $('#pay_cash_check').is(":checked");
		var TranCheck =  $('#pay_transfer_check').is(":checked");
		var TranCheck2 =  $('#pay_transfer_check2').is(":checked");
		
		var pay_transfer_date  = $('#pay_transfer_date').val();
		var pay_transfer_date2  = $('#pay_transfer_date2').val();
		var pay_cash  = $('#pay_cash').val();
		
		if ($('input[class=pay_type]:checked').length <= 0) {
			alert('กรุณาเลือกการชำระเงิน');
			return false;
		}else if((TranCheck==true)&&(bank_acc_id=='0')){
			alert('กรุณาเลือกธนาคารที่รับโอน');
			return false;
		}else if((TranCheck==true)&&(pay_transfer_date=='')){
			alert('กรุณาใส่วันที่โอนเงิน');
			return false;	
		
		}else if((TranCheck2==true)&&(bank_acc_id2=='0')){
			alert('กรุณาเลือกธนาคารที่รับโอน');
			return false;
		}else if((TranCheck2==true)&&(pay_transfer_date2=='')){
			alert('กรุณาใส่วันที่โอนเงิน');
			return false;	
			
		}else if((cashCheck==true)&&(pay_cash=='')){
			alert('กรุณาใส่จำนวนเงินสด');
			return false;	
		}else{
			var workID = $('#workID').val();
			$('#appWorkID').val(workID);
			var form = new FormData($('#carcheck_all')[0]);
				var result='';
			 
			 $.ajax({
				url: '<?php echo base_url('insurance_car/SaveToRoOr')?>',
				type: 'POST' ,  
				data: form ,
				success: function (data) {
				//console.log(data);
				var obj = JSON.parse(data);	 
					
				if(obj.doDb=='1'){
					
					    $('#actID').val(obj.actID);
					    $('#inspecID').val(obj.inspecID);
					    $('#taxID').val(obj.taxID);
					    $('#serviceworkID').val(obj.workID);
					    $('#inspecID').val(obj.inspecID);
					    $('#service_id').val(obj.service_id);
					 	$('#custID').val(obj.custID);
						$('#carID').val(obj.carID);
						alert('บันทึกข้อมูลเรียบร้อยแล้ว');
						 $('#workID').val(obj.workID)
						 $('#workID2').val(obj.workID)
						 var  carID = $('#carID').val();
		 				 var  custID = $('#custID').val();
						 var  workID = $('#workID').val();
						 var new_url="<?php echo base_url('Insurance_car/work_car_all')?>"+'/'+custID+'/'+carID+'/'+obj.workID;
						 window.history.pushState("data","Title",new_url);
					  	 updateWorkData(obj.workID);
						 $( "#printCarcheckWork" ).prop( "disabled", false );
					     $('#btnSearchCust').hide();
					}else{	
						alert('บันทึกข้อมูลไม่สำเร็จ');	
					}
					
				},
				
				cache: false,
				contentType: false,
				processData: false
			});	
		}
		
		
	}
	/*
	 var  workID = $('#workID').val();
		 var  carID = $('#carID').val();
		 var  custID = $('#custID').val();
		 var  car_check_price_service = $('#car_check_price_service').val();
		 var  service_other_price= $('#service_other_price').val();
		var new_url="<?php //echo base_url('Insurance_car/work_car_all')?>"+'/'+custID+'/'+carID+'/'+obj.serviceworkID;
							window.history.pushState("data","Title",new_url);
	*/
	//-----------------------.replace(/\,/g,'');  pay_cash	 calculateActDiscount() act_price_total act_price_total_full
	function getCarcheckTotal(){
		//console.log('getCarcheckTotal function ');
				
		var car_check_price = $('#car_check_price').val().replace(/\,/g,'')
		var car_check_discount = $('#car_check_discount').val().replace(/\,/g,'');
		var act_price_total = $('#act_price_total').val().replace(/\,/g,'');
		var act_price_total_full = $('#act_price_total_full').val().replace(/\,/g,'');
		var act_discount = $('#act_discount').val().replace(/\,/g,'');
		var act_other_paid = $('#other_paid').val().replace(/\,/g,'');
		var tax_price = $('#tax_price').val().replace(/\,/g,'');
		var tax_service = $('#tax_service').val().replace(/\,/g,'');
		var service_other_price = $('#service_other_price').val().replace(/\,/g,'');
		
		var pay_cash = $('#pay_cash').val().replace(/\,/g,'');
		var pay_transfer = $('#pay_transfer').val().replace(/\,/g,'');
		var pay_transfer2 = $('#pay_transfer2').val().replace(/\,/g,'');
		
		// 
		if($("#free_cancel").prop('checked') == true){
			//do something
			var free_cancel_carcheck ='1';
		}else if($("#free_cancel").prop('checked') == false){
			var free_cancel_carcheck ='0';
		}
		
		if(car_check_price == "" ){
			var car_check_price = 0;
		}
		if(car_check_discount == "" ){
			var car_check_discount = 0;
		}
		
		if(act_price_total == "" ){
			var act_price_total = 0;
		}
		if(act_discount == "" ){
			var act_discount = 0;
		}
		if(act_other_paid == "" ){
			var act_other_paid = 0;
		}
		if(tax_price == "" ){
			var tax_price = 0;
		}
		if(tax_service == "" ){
			var tax_service = 0;
		}
		if(service_other_price == "" ){
			var service_other_price= 0;
		}
		

			
		var car_check_price = parseFloat(car_check_price);
		var car_check_discount = parseFloat(car_check_discount);
		var act_price_total = parseFloat(act_price_total);
		var act_price_total_full = parseFloat(act_price_total_full);
		var act_discount = parseFloat(act_discount);
		var act_other_paid = parseFloat(act_other_paid);
		var tax_price = parseFloat(tax_price);
		var tax_service = parseFloat(tax_service);
		var service_other_price = parseFloat(service_other_price);
		
		var pay_cash = parseFloat(pay_cash);
		var pay_transfer = parseFloat(pay_transfer);
		var pay_transfer2 = parseFloat(pay_transfer2);
		
		//-(pay_cash+pay_transfer+pay_transfer2)
		//console.log('free_cancel_carcheck>'+free_cancel_carcheck)
		if(free_cancel_carcheck=='1'){
			var sumTotal =  ((act_price_total+act_other_paid) + (tax_price+tax_service+service_other_price)).toFixed(2);
		}else{
			var sumTotal = ((car_check_price-car_check_discount) + (act_price_total+act_other_paid) + (tax_price+tax_service+service_other_price)).toFixed(2);
		}
		
		
		
		
		console.log('sumTotal>'+sumTotal+" : "+('pay_cash> '+pay_cash+' pay_transfer>'+pay_transfer+' pay_transfer2>'+pay_transfer2))
		
		
		var displaySumtoal = sumTotal.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
		$('#total_work_price').val(displaySumtoal);
		//$('#act_discount').val(autoDiscount);
		//$('#act_price_total').val(act_price);
		
	}
	//----------------------- 							  
	function setWorkID(workID){
		$('.workID').val(workID);
		$('#workID').val(workID);
	}
	//----------------------- 
	//----------------------- 
	function reloadAppData(){
		var workID = $('#workID').val();
		if(workID!=''){
			
		}
	}
	//----------------------- 
	function callInsCover(){
		 var workID = $('#workID').val();
		 $.post('<?php echo base_url('insurance_car/callInsCover')?>',{ workID:workID},function(data){
			  $('#CoverArea').empty();
			  $('#CoverArea').html(data);
			 
		 })
	}
	//----------------------- deduct_percent  $('#deduct_percent').val('') premium total_premium
	function setdecardedug(){
		var car_type_id = $('#car_type_id option:selected').val();
		var type_premium_id = $('#type_premium_id option:selected').val();
		var deduct_percent = $('#deduct_percent').val();
		var do_Act = $('input[name=do_act]:checked');
		 
		 $.post('<?php echo base_url('insurance_car/setdecardedug')?>',{ car_type_id:car_type_id,type_premium_id:type_premium_id},function(data){
			  var obj =JSON.parse(data);
			  console.log(data);
			 if($('#do_act').is(":checked")==false){
				  $('#deduct_percent').val(obj.dedugVal);
			  	  $('#act_price').val(obj.total_premium);
			      $('#act_price_total').val(obj.premium);
			      $('#act_price_total_full').val(obj.premium);
			 // $('#act_price_net').val(obj.total_premium);
			  
			 calculateAct()
			 }
			 
			 
		 })
	}
	//----------------------- 
	function SaveCarApplication(){
		
		var custID = $('#custID').val();
		var insuranec_name = $('#insuranec_name').val();
		var id_card = $('#id_card').val();
		var app_telephone = $('#app_telephone').val();
		var app_address = $('#app_address').val();
		if(insuranec_name==''){
			alert('กรุณาใส่ ชื่อ-สกุล ผู้เอาประกันภัย');
			return false;
		}else if(id_card==''){
			alert('กรุณาใส่ เลขที่บัตรประชาชน');
			return false;
		}else if(app_telephone==''){
			alert('กรุณาใส่ หมายเลขโทรศัพท์');
			return false;	  
		}else if(app_address==''){
			alert('กรุณาใส่ที่อยู่');
			return false;	
		}else{
			var workID = $('#workID').val();
			$('#appWorkID').val(workID);
			var form = new FormData($('#appForm')[0]);
				var result='';
			 
			 $.ajax({
				url: '<?php echo base_url('insurance_car/SaveCarApplication')?>',
				type: 'POST' ,  
				data: form ,
				success: function (data) {
				console.log(data);
				var obj = JSON.parse(data);	    
				if(obj.doDb=='1'){
						alert('บันทึกข้อมูลเรียบร้อยแล้ว');
						
						$('#postID').val(obj.postID);
					  
						
					}else{	
						alert('บันทึกข้อมูลไม่สำเร็จ');	
					}
					
				},
				
				cache: false,
				contentType: false,
				processData: false
			});	
		}
	}
	//----------------------- 
	function callSummaryData(){
		var workID = $('#workID').val();
		//if(workID!=''){
			$.post('<?php echo base_url('insurance_car/callSummaryData')?>',{ workID:workID },function(data){
				$('#summary_data').empty();
				$('#summary_data').html(data);
			})
		//}
		
	}
	//-----------------------  
	function getChainSelect(SelectValue,chainSelectName,selectType,selectedValue){
		console.log(SelectValue+' '+chainSelectName+' '+selectType)
		if(SelectValue!='x'){
			$.post('<?php echo base_url('insurance_car/getChainSelect')?>',{ corp_id:SelectValue,selectType:selectType,selectedValue:selectedValue },function(data){
				$('#'+chainSelectName).empty();
				$('#'+chainSelectName).append(data);
			})
		}else if(SelectValue=='x'){
			$('#'+chainSelectName).empty();
		}
	} 
	//----------------------- 
	 function SetTransportVal(date_transport,work_type_id,transport_price,transport_discount_price,transport_discount_total,transport_payment,transport_remark,transportID){
		var workID = $('#workID').val();
		 $('#date_transport').val(date_transport);
		 $('#work_type_id').val(work_type_id);
		 $('#transport_price').val(transport_price);
		 $('#transport_discount_price').val(transport_discount_price);
		 $('#transport_discount_total').val(transport_discount_total);
		 $('#transport_payment').val(transport_payment);
		 $('#transport_remark').val(transport_remark);
		 $('#transportID').val(transportID);
		 $('#serviceworkID').val(workID);
		 $('#btnTransport').text('แก้ไขรายการงานขนส่ง');
	 }
	//----------------------- 
	 function removeTransport(dataID,work_type_name){
		 if(confirm('ต้องการลบรายการ '+work_type_name+' ?')){
			 $.post('<?php echo base_url('insurance_car/removeTransport')?>',{ dataID:dataID },function(data){
				var obj = JSON.parse(data);	   
				 if(obj.doDb =='1'){
					var workID=$('#workID').val();
					 listTransport(workID);
					 alert('ลบรายการ '+work_type_name+' เรียบร้อยแล้ว')
					
		   			
				 }else{
					  alert('ไม่สามารถลบรายการ '+work_type_name+' ได้')
				 }
				 
			})
		 }else{
			 return false;
		 }
	 }
	//----------------------- 
	function resetBtnTransportText(){
		$('#btnTransport').text('เพิ่มรายการงานขนส่ง');
	}
	//----------------------- 
	function listTransport(workID){
		console.log('listTransport funct');
	}
	//----------------------- 
	function listTransport(workID){
		$.post('<?php echo base_url('insurance_car/listTransportWork')?>',{ workID:workID },function(data){
			$('#transportList').empty();
			$('#transportList').html(data);			
		})
	}
	//-----------------------// post_name telephone  subdistric distric province post_code 
	function SavePostAddr(){
		var workID = $('#workID').val();
		var post_name = $('#post_name').val();
		var telephone = $('#telephone').val();
		var subdistric = $('#subdistric').val();
		var distric = $('#distric').val();
		var province = $('#province').val();
		var post_code = $('#post_code').val();
		var custID = $('#custID').val();
		if(workID==''){
			alert('กรุณาเพิ่มข้อมูลการทำงาน \r \n ประกันภัย/พ.ร.บ./ตรวจสภาพ/ต่อทะเบียน/ภาษี \r\n ก่อนเพิ่มข้อมูลส่วนนี้');
			return false;		
		}else if(post_name==''){
			alert('กรุณาใส่ชื่อ-นามสกุล');
			return false;	
		}else if(telephone==''){
			alert('กรุณาใส่โทรศัพท์');
			return false;
		}else if(subdistric==''){
			alert('กรุณาใส่ตำบล/แขวง');
			return false;	
		}else if(distric==''){
			alert('กรุณาใส่อำเภอ');
			return false;					
		}else if(post_code==''){
			alert('กรุณาใส่รหัสไปรษณีย์');
			return false;				
			
		}else{
			 $('#postCustID').val(custID);
			 var form = new FormData($('#postForm')[0]);
				var result='';
			 
			 $.ajax({
				url: '<?php echo base_url('insurance_car/SavePostAddr')?>',
				type: 'POST' ,  
				data: form ,
				success: function (data) {
				console.log(data);
				var obj = JSON.parse(data);	    
				if(obj.doDb=='1'){
						alert('บันทึกข้อมูลเรียบร้อยแล้ว');
						
						$('#postID').val(obj.postID);
					  
						
					}else{	
						alert('บันทึกข้อมูลไม่สำเร็จ');	
					}
					
				},
				
				cache: false,
				contentType: false,
				processData: false
			});	
		}
		
		
	}
	//----------------------- 
	function savetransport(){
					
		var date_transport=$('#date_transport').val();
		var transport_price=$('#transport_price').val();
		var transport_payment=$('#transport_payment option:selected').val();
		var work_type_id=$('#work_type_id option:selected').val();
		var workID = $('#workID').val();
		
		if(workID==''){
			alert('กรุณาเพิ่มข้อมูลการทำงาน \r \n ประกันภัย/พ.ร.บ./ตรวจสภาพ/ต่อทะเบียน/ภาษี \r\n ก่อนเพิ่มข้อมูลส่วนนี้');
			return false;				
		}else if(date_transport==''){
			alert('กรุณาเลือกวันที่ทำรายการ');
			return false;
		}else if(transport_price==''){
			alert('กรุณาใส่ค่าบริการ');
			return false;		
		}else if(work_type_id=='x'){
			alert('กรุณาเลือกประเภทงาน');
			return false;
		}else if(transport_price=='x'){
			alert('กรุณาเลือกการชำระเงิน');
			return false;	
		}else if(transport_payment=='x'){
			alert('กรุณาเลือกการชำระเงิน');
			return false;	
		}else{
			  $('#transportWorkID').val(workID);
			   var form = new FormData($('#transportForm')[0]);
				var result='';
			 $.ajax({
				url: '<?php echo base_url('insurance_car/savetransport')?>',
				type: 'POST' ,  
				data: form ,
				success: function (data) {
				console.log(data);
				var obj = JSON.parse(data);	    // doDb = 1  actDb actID  taxID taxWorkID  insWorkID insID
				if(obj.doDb=='1'){
						alert('บันทึกข้อมูลเรียบร้อยแล้ว');
						listTransport(workID);
						$('#transportID').val('');
					    $('#transportForm')[0].reset();
						$('#btnTransport').text('เพิ่มรายการงานขนส่ง');
					}else{	
						alert('บันทึกข้อมูลไม่สำเร็จ');	
					}
					
				},
				
				cache: false,
				contentType: false,
				processData: false
			});	 
		}
	}
	//----------------------- 
	function updateWorkData(workID){
		
		var  carID = $('#carID').val();
		var  custID = $('#custID').val();
		var  ins_date_work = $('#ins_date_work').val();
		<?php if(($this->session->userdata('user_branch')=='1')||($this->session->userdata('user_branch')=='0')){?>
		 var  agent_id = $('#agent_id option:selected').val();
		<?php }else{ ?>
		 var  agent_id = $('#agent_id').val();
		<?php }?>
		
		 $.post('<?php echo base_url('insurance_car/updateWorkData')?>',{ carID:carID,custID:custID,workID:workID,agent_id:agent_id, ins_date_work:ins_date_work } , function(data){
			 if(data=='1'){
				 console.log('update work ok');
			 }else{
				console.log('cannot update work !!'); 
			 }
		 })
	}
	//----------------------- ServiceForm
	function SaveService(){
		 	<?php if(($this->session->userdata('user_branch')=='1')||($this->session->userdata('user_branch')=='0')){?>
		 var  agent_id = $('#agent_id option:selected').val();
		<?php }else{ ?>
		 var  agent_id = $('#agent_id').val();
		<?php }?>
		 var  workID = $('#workID').val();
		 var  carID = $('#carID').val();
		 var  custID = $('#custID').val();
		 var  car_check_price_service = $('#car_check_price_service').val();
		 var  service_other_price= $('#service_other_price').val();
		
		if(workID==''){
			alert('กรุณาเพิ่มข้อมูลการทำงาน \r \n ประกันภัย/พ.ร.บ./ตรวจสภาพ/ต่อทะเบียน/ภาษี \r\n ก่อนเพิ่มข้อมูลส่วนนี้');
			return false;				
		}else if((car_check_price_service=='')&&(service_other_price=='')){
			alert('กรุณาใส่ข้อมูลค่าบริการ/ค่าอื่นๆ');
			return false;
			
		}else{
			   var form = new FormData($('#ServiceForm')[0]);
				var result='';
			 $.ajax({
				url: '<?php echo base_url('insurance_car/SaveService')?>',
				type: 'POST' ,  
				data: form ,
				success: function (data) {
				console.log(data);
				var obj = JSON.parse(data);	    // doDb = 1  actDb actID  taxID taxWorkID  insWorkID insID
				if(obj.doDb=='1'){
						alert('บันทึกข้อมูลเรียบร้อยแล้ว');
						$('#service_id').val(obj.inspecID);

						if(workID==''){
							var new_url="<?php echo base_url('Insurance_car/work_car_all')?>"+'/'+custID+'/'+carID+'/'+obj.serviceworkID;
							window.history.pushState("data","Title",new_url);
								 updateWorkData(obj.serviceworkID);
								//------set work value
							  	 setWorkID(obj.serviceworkID);
						}
							 
							
					}else{	
							alert('บันทึกข้อมูลไม่สำเร็จ');	
						}
					
				},
				
				cache: false,
				contentType: false,
				processData: false
			});	 
		}
		
	}			
	//-----------------------hr minute second
	function SaveCarCheck(){
		 	<?php if(($this->session->userdata('user_branch')=='1')||($this->session->userdata('user_branch')=='0')){?>
		 var  agent_id = $('#agent_id option:selected').val();
		<?php }else{ ?>
		 var  agent_id = $('#agent_id').val();
		<?php }?>
		 var  car_type = $('#car_type_id option:selected').val();
		 var  workID = $('#workID').val();
		 var  carID = $('#carID').val();
		 var  custID = $('#custID').val();
		 var  car_check_date = $('#car_check_date').val();
		 var  car_check_price= $('#car_check_price').val();
		 //var  car_check_time= $('#car_check_time').val();
		
		 var  hr = $('#hr option:selected').val();
		 var  minute = $('#minute option:selected').val();
		 var  second = $('#second option:selected').val();
		
		 //console.log('time->'+hr+":"+minute+":"+second);
		
		// var  car_check_time = eval(hr+":"+minute+":"+second);
		// console.log(car_check_time)
		
		if(custID==''){
			alert('กรุณาใส่ข้อมูลลูกค้า');
			return false;
		}else if(carID==''){
			alert('กรุณาเพิ่มข้อมูลรถ');
			return false;		
		
	    }else if(car_check_date==''){
			alert('กรุณาใส่วันที่ตรวจ');
			return false;
		//}else if(car_check_time==''){
		//	alert('กรุณาใส่เวลาตรวจ');
		//	return false;			
		}else if(car_check_price==''){
			alert('กรุณาใส่ค่าตรวจสภาพ');
			return false;	 
		//}else if($('input[name=registration_book]:checked').length<=0){ 
		//	   alert('กรุณาเลือกมี มีเล่มทะเบียน/ไม่มี มีเล่มทะเบียน');
		//	   return false;		
		}else{
			$('#car_type').val(car_type);
			   var form = new FormData($('#inspectForm')[0]);
				var result='';
			 $.ajax({
				url: '<?php echo base_url('insurance_car/SaveCarCheck')?>',
				type: 'POST' ,  
				data: form ,
				success: function (data) {
				console.log(data);
				var obj = JSON.parse(data);	    // doDb = 1  actDb actID  taxID taxWorkID  insWorkID insID
				if(obj.doDb=='1'){
						alert('บันทึกข้อมูลเรียบร้อยแล้ว');
						$('#inspecID').val(obj.inspecID);

						if(workID==''){
							var new_url="<?php echo base_url('Insurance_car/work_car_all')?>"+'/'+custID+'/'+carID+'/'+obj.inspecworkID;
							window.history.pushState("data","Title",new_url);
								 updateWorkData(obj.inspecworkID);
								//------set work value
							  	 setWorkID(obj.inspecworkID);
						}
							 
							
					}else{	
							alert('บันทึกข้อมูลไม่สำเร็จ');	
						}
					
				},
				
				cache: false,
				contentType: false,
				processData: false
			});	 
		}
		
	}
	//-----------------------
	function SaveIns(){
		 	<?php if(($this->session->userdata('user_branch')=='1')||($this->session->userdata('user_branch')=='0')){?>
		 var  agent_id = $('#agent_id option:selected').val();
		<?php }else{ ?>
		 var  agent_id = $('#agent_id').val();
		<?php }?>
		 var  workID = $('#workID').val();
		 var  carID = $('#carID').val();
		 var  custID = $('#custID').val();
		
		  var insurance_price = $('#insurance_price').val();
		  var insurance_start = $('#insurance_start').val();
		  var insurance_end = $('#insurance_end').val();
		  var insurance_corp_id = $('#insurance_corp_id option:selected').val();
		  var insurance_type_id = $('#insurance_type_id option:selected').val();
		
		if(agent_id=='x'){
			alert('กรุณาเลือกตัวแทน');
			return false;
		}else if(custID==''){
			alert('กรุณาใส่ข้อมูลลูกค้า');
			return false;
		}else if(carID==''){
			alert('กรุณาเพิ่มข้อมูลรถ');
			return false;
			
		}else if(insurance_start==''){
			   alert('กรุณาเลือกวันที่คุ้มครอง');
			   return false;
		   }else if(insurance_corp_id=='x'){
			   alert('กรุณาเลือกบริษัทประกัน');
			   return false;		
			 }else if(insurance_type_id=='x'){
			   alert('กรุณาเลือกประเภทกรมธรรม์');
			   return false;		   
			}else if($('input[name=insurance_fix_garace]:checked').length<=0){ 
			   alert('กรุณาเลือกซ่อมอู่/ซ่อมห้าง');
			   return false;				
			}else if($('input[name=insurance_renew]:checked').length<=0){ 
			   alert('กรุณาเลือกประเภทงาน งานใหม่/ต่ออายุ');
			   return false;	
			}else if($('input[name=insurance_renew]:checked').length<=0){ 
			   alert('กรุณาเลือกตามเอกสารประกันภัย');
			   return false;				 
			 }else if(insurance_price==''){
			   alert('กรุณาใส่เบี้ยรวม');
			   return false;				 
		   }else{
			   var  workID = $('#workID').val();
			   var  carID = $('#carID').val();
			   var  custID = $('#custID').val();
			   
			    //$('#actagentID').val(agent_id);
				$('#insWorkID').val(workID);
			   
			    var form = new FormData($('#insForm')[0]);
				var result='';
			 $.ajax({
				url: '<?php echo base_url('insurance_car/SaveIns')?>',
				type: 'POST' ,  
				data: form ,
				success: function (data) {
				console.log(data);
				var obj = JSON.parse(data);	    // doDb = 1  actDb actID  taxID taxWorkID  insWorkID insID
				if(obj.doDb=='1'){
						alert('บันทึกข้อมูลเรียบร้อยแล้ว');
						$('#insID').val(obj.insID);

						if(workID==''){
							var new_url="<?php echo base_url('Insurance_car/work_car_all')?>"+'/'+custID+'/'+carID+'/'+obj.taxWorkID;
							window.history.pushState("data","Title",new_url);
								 updateWorkData(obj.taxWorkID);
								//------set work value
							  	 setWorkID(obj.taxWorkID);
						}
							 
							
					}else{	
							alert('บันทึกข้อมูลไม่สำเร็จ');	
						}
					
				},
				
				cache: false,
				contentType: false,
				processData: false
			});
			    
		   }
		  
	}
	//----------------------- 
	function SaveTax(){
		<?php if(($this->session->userdata('user_branch')=='1')||($this->session->userdata('user_branch')=='0')){?>
		 var  agent_id = $('#agent_id option:selected').val();
		<?php }else{ ?>
		 var  agent_id = $('#agent_id').val();
		<?php }?>
		 var  workID = $('#workID').val();
		 var  carID = $('#carID').val();
		 var  custID = $('#custID').val();
		
		   var tax_price = $('#tax_price').val();
		   var date_registration_start = $('#date_registration_start').val();
		   var date_registration_end = $('#date_registration_end').val();
		   var tax_pay_date = $('#tax_pay_date').val();
		  
		 
		
	if(agent_id=='x'){
					alert('กรุณาเลือกตัวแทน');
			return false;
	}if(custID==''){
			alert('กรุณาใส่ข้อมูลลูกค้า');
			return false;
		}else if(carID==''){
			alert('กรุณาเพิ่มข้อมูลรถ');
			return false;
			
		}else 	if(tax_price==''){
			   alert('กรุณาใส่ราคารวมภาษี');
			   return false;
		   }else if(date_registration_start==''){
			   alert('กรุณาใส่วันจดทะเบียน');
			   return false;			   
		   }else if(date_registration_end==''){
			   alert('กรุณาใส่วันสิ้นอายุภาษี');
			   return false;			   
		   }else if(agent_id==''){
		  	   alert('กรุณาเลือกชื่อตัวแทน');
			   return false;			   
		  // }else if($('input[name=have_manual]:checked').length<=0){ 
			//   alert('กรุณาเลือก มีหรือไม่มีคู่มือ');
		//	   return false;		  
		 //  }else if($('input[name=do_register]:checked').length<=0){ 
		//	   alert('กรุณาเลือกจดทะเบียน');
		//	   return false;
		   }else{
			   var  workID = $('#workID').val();
			   var  carID = $('#carID').val();
			   var  custID = $('#custID').val();
			   
			    //$('#actagentID').val(agent_id);
				$('#taxWorkID').val(workID);
			   
			    var form = new FormData($('#taxForm')[0]);
				var result='';
			 $.ajax({
				url: '<?php echo base_url('insurance_car/SaveTax')?>',
				type: 'POST' ,  
				data: form ,
				success: function (data) {
				console.log(data);
				var obj = JSON.parse(data);	    // doDb = 1  actDb actID  taxID taxWorkID
				if(obj.doDb=='1'){
						alert('บันทึกข้อมูลเรียบร้อยแล้ว');
						$('#taxID').val(obj.taxID);

						if(workID==''){
							var new_url="<?php echo base_url('Insurance_car/work_car_all')?>"+'/'+custID+'/'+carID+'/'+obj.taxWorkID;
							window.history.pushState("data","Title",new_url);
								 updateWorkData(obj.taxWorkID);
								//------set work value
							  	 setWorkID(obj.taxWorkID);
						}
							 
							
					}else{	
							alert('บันทึกข้อมูลไม่สำเร็จ');	
						}
					
				},
				
				cache: false,
				contentType: false,
				processData: false
			});
			    
		   }
		} 
	//-----------------------
	function saveCompulsory(){
		<?php if(($this->session->userdata('user_branch')=='1')||($this->session->userdata('user_branch')=='0')){?>
		 var  agent_id = $('#agent_id option:selected').val();
		 var  code_id = $('#code_id option:selected').val();
		<?php }else{ ?>
		 var  agent_id = $('#agent_id').val();
		 var  code_id = '0'
		<?php }?>
		var  act_price = $('#act_price').val();
		var  act_date_start = $('#act_date_start').val();
		var  corp_id = $('#corp_id option:selected').val();
		
		
		var  act_type_id  = $('#act_type_id option:selected').val();
		var  workID = $('#workID').val();
		var  carID = $('#carID').val();
		var  custID = $('#custID').val();
		
	
		if(agent_id=='x'){
						alert('กรุณาเลือกตัวแทน');
			return false;
		}else if(custID==''){
			alert('กรุณาใส่ข้อมูลลูกค้า');
			return false;
		}else if(carID==''){
			alert('กรุณาเพิ่มข้อมูลรถ');
			return false;	
		
		}else if(act_price==''){
			alert('กรุณาใส่ เบี้ยรวม พ.ร.บ.');
			return false;
		}else if(act_date_start==''){
			alert('กรุณาใส่ วันคุ้มครอง');
			return false;	
		}else if(corp_id=='x'){
			alert('กรุณาเลือกบริษัท');
			return false;			
		}else if(act_type_id =='x'){
			alert('กรุณาเลือกประเภท พ.ร.บ.');
			return false;	
			
		//}else if(code_id=='x'){
		//	alert('กรุณาเลือกโค้ด');
		//	return false;		
		//}else if($('input[name=act_follow]:checked').length<=0){
		//	alert('กรุณาเลือกการตามเอกสาร พ.ร.บ.');
		//	return false;			
		//}else if($('input[name=act_recieve]:checked').length<=0){ 
		//	alert('กรุณาเลือกการรับเอกสาร พ.ร.บ.');
		//	return false;
		}else if(agent_id=='x'){
			alert('กรุณาเลือกชื่อตัวแทน');
			return false;			
		}else{
			
			$('#actagentID').val(agent_id);
			$('#actWorkID').val(workID);
			
			var form = new FormData($('#compulsory')[0]);
			var result='';
			 $.ajax({
				url: '<?php echo base_url('insurance_car/saveCompulsory')?>',
				type: 'POST' ,  
				data: form ,
				success: function (data) {
				//console.log(data);
				var obj = JSON.parse(data);	    // doDb = 1  actDb actID  actID actWorkID
				if(obj.doDb=='1'){
					alert('บันทึกข้อมูลเรียบร้อยแล้ว');
				 $('#actID').val(obj.actID);
				  var new_url="<?php echo base_url('Insurance_car/work_car_all')?>"+'/'+custID+'/'+carID+'/'+obj.actWorkID;
				  window.history.pushState("data","Title",new_url);
				  updateWorkData(obj.actWorkID);
							  //------set work value
				  setWorkID(obj.actWorkID)
				  $('#actWorkID').val(obj.actWorkID);
				}else{	
					alert('บันทึกข้อมูลไม่สำเร็จ');	
				}
					
				},
			
				cache: false,
				contentType: false,
				processData: false
			});
			
		}
	}
	

	//-----------------------------
	function CalculateTransport(){
			var transport_price = $('#transport_price').val();
			//transport_price = transport_price.replace(',','');
			transport_price = transport_price.replace(/\,/g,'');
		
			var transport_discount_price = $('#transport_discount_price').val();
			//transport_discount_price = transport_discount_price.replace(',','');
			transport_discount_price = transport_discount_price.replace(/\,/g,'');
		
			if(transport_price==''){
			var transport_price = 0;
			}else{
				var transport_price =  parseFloat(transport_price);
			}
		
			if(transport_discount_price==''){
				var transport_discount_price = 0;
			}else{
				var transport_discount_price =  parseFloat(transport_discount_price);
			}		
		
		 	var calVal = transport_price-transport_discount_price;
		var num = calVal.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
		$('#transport_discount_total').val(num);
		 //transport_discount_price transport_discount_total
	}
	 //-----------------------------
	function CalculateCheckCar(){  
		var car_check_price = $('#car_check_price').val();
		   car_check_price = car_check_price.replace(',','');
		var car_check_discount = $('#car_check_discount').val();
		   car_check_discount = car_check_discount.replace(',','');
		
		if(car_check_price==''){
			var car_check_price = 0;
		}else{
			var car_check_price =  parseFloat(car_check_price);
		}
		
		
		if(car_check_discount==''){
			var car_check_discount = 0;
		}else{
			var car_check_discount =  parseFloat(car_check_discount);
		}
		        
		var calVal = car_check_price-car_check_discount;
		var num = calVal.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
		$('#car_check_total').val(num);
		getCarcheckTotal();
	}
	//-----------------------------
	function CaculateIns(){ //insurance_price insurance_discount insurance_total
		
		var insurance_price = $('#insurance_price').val();
			insurance_price = insurance_price.replace(',','');
		var insurance_discount=$('#insurance_discount').val();
			insurance_discount = insurance_discount.replace(',','');
		//console.log('insurance_price>>'+insurance_price)
		
		if($('#insurance_price').val()==''){
			var insurance_price = 0;
		}else{
			var insurance_price = parseFloat(insurance_price);
		}
		if($('#insurance_discount').val()==''){
			var insurance_discount = 0;
		}else{
			var insurance_discount =  parseFloat(insurance_discount);
		}

     	var calVal = insurance_price-insurance_discount;
		var num = calVal.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"); 
		$('#insurance_total').val(num);
		
		//--------calculate Back-----// insurance_total_net
		var Result1 = (insurance_price * 6.9144)/100;
		var InsTotalNet = insurance_price-Result1;
		var InsTotalNet = Math.floor(InsTotalNet);
		var TotalNetValue = InsTotalNet.toFixed(0);
		var TotalNetText = InsTotalNet.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
		//-------duty calculate -----------//
		
		var addvalue=0;
		
		var dutyValue = (TotalNetValue *0.4)/100;
		var dutyResult= Math.ceil(dutyValue);
		$('#insurance_duty').val(dutyResult+'.00');
		//console.log('dutyValue>'+dutyValue+' dutyResult>'+dutyResult);
		//-------tax calculate -----------// +'.00'
		var x1 = parseInt(TotalNetValue);
		var x2 = parseInt(dutyResult);
		var taxvalue = ((x1+x2)*7)/100;
		var taxText = taxvalue;
		//console.log('TotalNetValue >'+TotalNetValue+' dutyResult>'+dutyResult+' taxvalue>'+taxvalue);
		$('#insurance_tax').val(taxText);
		
		//-------insurance_total_net calculate -----------//
		$('#insurance_total_net').val(TotalNetText+'.00');
	}
	//------------------------act_price_total act_discount 
	function calActDiscount(e){
		var act_price = $('#act_price').val().replace(',','');
		var act_price = parseFloat(act_price);
		var act_price_floor = Math.floor(act_price); 
	
		console.log(act_price+' '+act_price)
		
		//console.log(e.name+' >'+act_price_floor)
		
		if(e.name=='act_discount'){
			var act_discount=$('#act_discount').val().replace(',','');;
			var act_discount = parseFloat(act_discount);
			var actTotal = act_price_floor-act_discount;
			$('#act_price_total').val(actTotal.toFixed(2))
		}else if(e.name=='act_price_total'){
			var act_price_total = $('#act_price_total').val().replace(',','');;
			var act_price_total = parseFloat(act_price_total);
			var actDiscount = act_price_floor-act_price_total;
			//console.log('act_discount 1 >'+actDiscount)
			if(actDiscount<=0){ var actDiscount = 0;}
			//console.log('act_discount 2>'+actDiscount)
			$('#act_discount').val(actDiscount.toFixed(2));
			
		}
		
		getCarcheckTotal();
		
	}	
	  
	//--------------------------act_price_total
	function calculateAct(){
		var act_price = $('#act_price').val();
		var act_discount = $('#act_discount').val();
		var act_tax = $('#act_tax').val();
		var act_vat = $('#act_vat').val();
		var act_price_total = $('#act_price_total').val();
		
		var act_price_total_full = Math.floor(act_price); 
		
		var act_price = $('#act_price').val();
			act_price = act_price.replace(',','');
		
		var act_discount=$('#act_discount').val();
			act_discount = act_discount.replace(',','');
		
		if(act_price==''){
			var act_price = 0;
		}else{
			var act_price = parseFloat(act_price);
		}

		if(act_discount==''){
			var act_discount = 0;
		}else{
			var act_discount = parseFloat(act_discount);
		}
	
		var act_price_total = act_price_total_full-act_discount;
		
		var act_price_total = act_price_total.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
		
		$('#act_price_total').val(act_price_total);
		//$('#act_discount').val(autoDiscount);
		$('#act_price_total').autoNumeric('init',{act_price_total});
		
		//$('#act_price_total').autoNumeric('init',{calVal});
		
		
		
		
         //console.log('calVal->'+calVal);
		//--------calculate Back-----//
		var Result1 = ((act_price * 6.9144)/100).toFixed(2);
		
		var InsTotalNet = act_price-Result1;
		var InsTotalNet = Math.floor(InsTotalNet);
		//console.log(' InsTotalNet toFixed >'+InsTotalNet+' act_price >'+act_price+' Result1>'+Result1); act_price_total
		var TotalNetValue = InsTotalNet.toFixed(0);
		var TotalNetText = InsTotalNet.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
		
		//console.log(' act_price>'+act_price+'Result1 > '+Result1+' TotalNetValue >'+TotalNetValue); act_price_total
		//-------duty calculate -----------//
		
		var addvalue=0;
		
		var dutyValue = (TotalNetValue *0.4)/100;
		var dutyResult= Math.ceil(dutyValue);
		$('#act_tax').val(dutyResult+'.00');
		//console.log('dutyValue>'+dutyValue+' dutyResult>'+dutyResult+' TotalNetValue:>'+TotalNetValue);
		//-------tax calculate -----------// +'.00'
		var x1 = parseFloat(TotalNetValue);
		var x2 = parseFloat(dutyResult);
		var taxvalue = ((x1+x2)*7)/100;
		var taxVat = taxvalue;
		//console.log('TotalNetValue >'+TotalNetValue+' dutyResult>'+dutyResult+' taxvalue>'+taxvalue);
		$('#act_vat').val(taxvalue);
		
		//-------insurance_total_net calculate -----------//
		
		$('#act_price_net').val(TotalNetText+'.00');
		
		
		
		getCarcheckTotal();
	
		
	}	
	function calculateActDiscount(){
		
		/*var act_discount = $('#act_discount').val();
		var act_price_total = $('#act_price_total').val();
		var act_price_total_full = $('#act_price_total_full').val().replace(/\,/g,'');
		
		if(act_discount==''){
			var act_discount = 0;
		}
						
		var x1 = parseFloat(act_discount);
		var x2 = parseFloat(act_price_total);
		var x3 = parseFloat(act_price_total_full);
		
		var ActResult = x3 - x1;
		var ActResult = ActResult.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
		 $('#act_price_total').val(ActResult);
		 getCarcheckTotal();*/
	}
	//------------------------
   function setEndDate(dateStart,fieldName,amtYear){
	    var amtYear = parseInt(amtYear);
	    var arr = dateStart.split('/');
	    var yearNum = parseInt(arr[2]);
	    var nextYear = yearNum + amtYear;
	    var newDate = arr[0]+"/"+arr[1]+"/"+nextYear;
	    // console.log('newDate>'+newDate)
	    $('#'+fieldName).val(newDate);
   }	
	
   //-----------------------	
   function SaveCustomer(){
	var custID = $('#custID').val();
	var cust_name =  $('#cust_name').val();
	var cust_telephone_1 = $('#cust_telephone_1').val();
	var cust_telephone_2 = $('#cust_telephone_2').val();
	var cust_nickname= $('#cust_nickname').val();
	   if($('#is_corporation').is(":checked")){
		   var is_corporation =1;
	   }else{
		   var is_corporation =0;
	   }
	   if(cust_name==''){
		   alert('กรุณาใส่ชื่อลูกค้า');
		   return false;
	   }else if(cust_telephone_1==''){
		   alert('กรุณาใส่หมายเลขโทรศัพท์');
		   return false;
	   }else{
		   $.post('<?php echo base_url('insurance_car/addCustomer')?>',{  custID:custID,cust_name:cust_name,cust_telephone_1:cust_telephone_1,cust_telephone_2:cust_telephone_2,cust_nickname:cust_nickname,is_corporation:is_corporation },function(data){
			// console.log(data);
			 var obj = JSON.parse(data); // custID  doDb
			  if(obj.doDb=='1'){
				  $('#custID').val(obj.custID);
				  //$('#saveCustName').attr("style", "display:none;");
				  $('#showCustNoti').html('เพิ่มข้อมูลเรียบร้อยแล้ว');
				  setTimeout($('#showCustNoti').empty(), 6000);
				  var new_url="<?php echo base_url('Insurance_car/work_car_all')?>"+'/'+obj.custID;
                  window.history.pushState("data","Title",new_url);
				  $('#showCustName').html(cust_name);
			  }else{
				  alert('ไม่สามารถเพิ่มข้อมูลลูกค้าได้');
				  console.log(data);
			  }
			})
	   }
   }
	//--------------------------custInput
   function setFormCustValue(custID,cust_name,cust_telephone_1,cust_telephone_2,is_corporation,cust_nickname){
	   $('#custID').val(custID);
	   $('#cust_name').val(cust_name);
	   $('#cust_telephone_1').val(cust_telephone_1);
	   $('#cust_telephone_2').val(cust_telephone_2);
	   $('#cust_nickname').val(cust_nickname);
	   $('#showCustName').html(cust_name);
	   $('#cust_Telephone').html(cust_telephone_1+' '+cust_telephone_2);
	   if(is_corporation=='1'){
		   $('#is_corporation').prop('checked', true)
	   }else{
		    $('#is_corporation').prop('checked', false);
	   }
	    $('#saveCustName').attr("style", "display:none;");
	    $('#showListCustomer').empty();
	    $('#carForm')[0].reset();	
	    $('.custInput').attr('readonly', true);
	     var new_url="<?php echo base_url('Insurance_car/work_car_all')?>"+'/'+custID;
         window.history.pushState("data","Title",new_url);
   }
   //----------------------------- showcartNoti
	function SaveCar(){
		 var custID = $('#custID').val();
		 var carID = $('#carID').val();
		 var vehicle_regis = $('#vehicle_regis').val();
		 var province_regis = $('#province_regis  option:selected').val();
		 var date_regist = $('#date_regist').val();
		 var year_car = $('#year_car').val();
		 var vin_no = $('#vin_no').val();
		 var engine_size = $('#engine_size').val();
		 var car_brand = $('#car_brand').val();
		 var car_model = $('#car_model').val();
		 var car_type_id = $('#car_type_id option:selected').val();
		 var workID=$('#workID').val();
		
		if(custID==''){
			alert('กรุณาใส่ข้อมูลลูกค้า');
			return false;	
		}else  if(vehicle_regis==''){
			alert('กรุณาใส่ป้ายทะเบียน');
			return false;
		}else if(province_regis=='x'){
			alert('กรุณาใส่จังหวัดที่จดทะเบียน');
			return false;			
		}else if(car_type_id=='x'){
			alert('กรุณาเลือกประเภทรถ');
			return false;			 
		}else{
			 $.post('<?php echo base_url('insurance_car/addCar')?>',{ carID:carID,vehicle_regis:vehicle_regis,province_regis:province_regis,date_regist:date_regist,year_car:year_car,vin_no:vin_no,engine_size:engine_size, car_brand:car_brand,car_model:car_model,car_type_id:car_type_id,custID:custID,workID:workID  },function(data){
				var obj = JSON.parse(data);
				//console.log(data);
				if(obj.doDb=='1'){
				 var new_url="<?php echo base_url('Insurance_car/work_car_all')?>"+'/'+custID+'/'+obj.carID+'/'+workID;
                  window.history.pushState("data","Title",new_url);	
				  $('#car_regist').html(vehicle_regis);
				  $('#carID').val(obj.carID);
				  //$('#saveCarBtn').attr("style", "display:none;");
				  $('#showcartNoti').html('เพิ่ม/แก้ไขข้อมูลเรียบร้อยแล้ว');
				 	
				  setTimeout(function(){ $('#showcartNoti').empty() }, 6000);
				 
				}else{
				  alert('ไม่สามารถเพิ่มข้อมูลลูกค้าได้');
				  console.log(data);
			  }
				//--doDb carID

		   })
		}
	}
   //----------------------------- 
	function resetFormCar(){
		 $('#carID').val('');
		 $('#carForm')[0].reset();	
		 //$('#saveCarBtn').attr("style", "display:block;");
		 $("#saveCarBtn").css("display", "block")
		 var custID = $('#custID').val();
		 var new_url="<?php echo base_url('Insurance_car/work_car_all')?>"+'/'+custID;
		 window.location.href=new_url;
		 //window.history.pushState("data","Title",new_url);	
	}
   //----------------------------- 
	 function setFormCarValue(dataID,vehicle_regis,province_regis,date_regist,year_car,vin_no,engine_size,car_brand,car_model,car_type_id){
		 $('#carID').val(dataID);
		 $('#vehicle_regis').val(vehicle_regis);
		 $('#province_regis').val(province_regis);
		 $('#date_regist').val(date_regist);
		 $('#year_car').val(year_car);
		 $('#vin_no').val(vin_no);
		 $('#engine_size').val(engine_size);
		 $('#car_brand').val(car_brand);
		 $('#car_model').val(car_model);

		 $('#car_type_id').val(car_type_id);
		 $('#saveCarBtn').attr("style", "display:none;");
	     $('#showCarList').empty();
		 
		  var custID = $('#custID').val();
		 var new_url="<?php echo base_url('Insurance_car/work_car_all')?>"+'/'+custID+'/'+dataID;
         window.history.pushState("data","Title",new_url);	
		 $('#car_regist').html(vehicle_regis);
		 $('#deduct_percent').val('')
		 setdecardedug();
	 }
   //----------------------------- 
	function listSearchCar(theVal){
		 $.trim(theVal);
		var custID=$('#custID').val();
		
		if(custID==''){
			alert('กรุณาเลือกชื่อลูกค้าก่อนจะทำการค้นหาเลขทะเบียน');
			$('#vehicle_regis').val('');
			return false;
		}else if((theVal!='')&&(custID!='')){ 
		   $.post('<?php echo base_url('insurance_car/listSearchCar')?>',{ theVal:theVal,custID:custID },function(data){
			 //console.log(data);
		   $('#showCarList').empty();
		   $('#showCarList').html(data);
		   })
		}else{
			 $('#showCarList').empty();
		}
	}
   //-----------------------------   
	function listSearchCust(theVal){
	  $.trim(theVal);
	 
	   if(theVal!=''){
		   $.post('<?php echo base_url('insurance_car/listSearchCust')?>',{ theVal:theVal },function(data){
		   $('#showListCustomer').empty();
		   $('#showListCustomer').html(data);
	   	}) 
	   }else{
		   $('#showListCustomer').empty();
	   }
   } 
   //----------------------------- 
function printSummary(){
	var workID=$('#workID').val();
	if(workID==''){
		alert('ไม่สามารถพิพม์ได้ เนื่องจากไม่มีข้อมูล การทำงาน \r \n ประกันภัย/พ.ร.บ./ตรวจสภาพ/ต่อทะเบียน/ภาษี \r\n ก่อนเพิ่มข้อมูลส่วนนี้');
		return false;
	}else{
		window.open('<?php echo base_url('insurance_car/work_car_summary_print/')?>'+workID, '_blank');
	}
}

function PrintinsCover(){
	var workID=$('#workID').val();
	if(workID==''){
		alert('ไม่สามารถพิพม์ได้ เนื่องจากไม่มีข้อมูล การทำงาน \r \n ประกันภัย/พ.ร.บ./ตรวจสภาพ/ต่อทะเบียน/ภาษี \r\n ก่อนเพิ่มข้อมูลส่วนนี้');
		return false;
	}else{
		window.open('<?php echo base_url('Insurance_car/work_car_insurance_cover_print/')?>'+workID, '_blank');
	}
} // 
	
	
function printData1()
{  
   var divToPrint=document.getElementById("reserve_form_wrapper");
   var newWin= window.open("");
	// newWin.print(); 
   newWin.document.write(buildprintReservePrint(divToPrint.innerHTML));
   setTimeout(function(){ newWin.print(); 

    //newWin.close();
   }, 1000);
   //newWin.print();
   //newWin.close();
}

	
function printCarcheckCover(){
		var workID = $('#workID').val();
		 $.post('<?php echo base_url('Inspection/printCarcheckWork')?>',{ workID:workID},function(data){
			  //console.log(data)
			  $('#showPrint').empty();
			  $('#showPrint').html(data);
	})
}
	
function buildprintReservePrint(content)
{  
   var head='<!DOCTYPE html>'+
              '<html>'+
              '<head>'+
              '<meta charset="UTF-8">'+'<title>Print Page</title>'+
              '<link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet" type="text/css" />'+
              '<link href="<?php echo base_url('assets/css/responsive.css')?>" rel="stylesheet" type="text/css" />'+
              '<link href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />'+
              '<link href="<?php echo base_url('assets/plugins/bootstrap/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css" />'+
              '<link href="<?php echo base_url('assets/css/plugins.min.css')?>" rel="stylesheet" type="text/css" />'+
              '<link href="<?php echo base_url('assets/plugins/material/material.min.css')?>" rel="stylesheet" type="text/css" />'+
              '<link href="<?php echo base_url('assets/css/theme-color.css')?>" rel="stylesheet" type="text/css" />'+
              '<link href="<?php echo base_url('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />'+
              '<style>	.main-cover { '
 +'  background-color: white;  '
 +' width: 100%; '
 +' height: 100%; '
 +' border-style: solid; '
 +' border-width: 3px; '
 +' border-color: black; '
 +' display: flex; '
 +' flex-direction: column; '
 +' justify-content: flex-start; '
 +' align-items: center; '
 +' padding-top: 10px; '
 +' padding-left: 10px; '
 +' padding-right: 10px; '
+'} '

+'.border-cover { '
+' width: 49%; '
+'  height: 421px; '
+'  padding: 10px; '
+'} '

+'.title-cover { '
+'   border-style: solid;  '
 +' border-width: 1px; '
 +' border-color: black; '
 
 +' width: 98%; '
+'  align-self: flex-start; '
+'  align-content: center; } </style></head>'+
              '<body>';

  var foot=   '</body>'+
              '</html>';

  return  head+content+foot;    
	
	 /* <link href="http://localhost/supcharoenbroker.com/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	 	<link href="http://localhost/supcharoenbroker.com/assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<link href="http://localhost/supcharoenbroker.com/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<!--bootstrap -->
	<link href="http://localhost/supcharoenbroker.com/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="http://localhost/supcharoenbroker.com/assets/plugins/summernote/summernote.css" rel="stylesheet">
	<!-- morris chart -->
	<link href="http://localhost/supcharoenbroker.com/assets/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
	<!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="http://localhost/supcharoenbroker.com/assets/plugins/material/material.min.css">
	<link rel="stylesheet" href="http://localhost/supcharoenbroker.com/assets/css/material_style.css">
	<!-- animation -->
	<link href="http://localhost/supcharoenbroker.com/assets/css/pages/animate_page.css" rel="stylesheet">
	<!-- Template Styles -->
	<link href="http://localhost/supcharoenbroker.com/assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
	<link href="http://localhost/supcharoenbroker.com/assets/css/style.css" rel="stylesheet" type="text/css" />
	<link href="http://localhost/supcharoenbroker.com/assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="http://localhost/supcharoenbroker.com/assets/css/theme-color.css" rel="stylesheet" type="text/css" />
	<!-- thaidate -->
	 */
}
   //----------------------------- <link href="http://localhost/supcharoenbroker.com/assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
	 $(document).ready(function(){
            //-------set act corp
		    var act_corp_id = $('#corp_id option:selected').val();
		 	if(act_corp_id!='x'){
				getChainSelect('<?php echo $corp_id?>','act_type_id','2','<?php echo $act_type_id?>');
			}            
		    //-------set ins corp insurance_corp_id insurance_type_id
		    var insurance_corp_id = $('#insurance_corp_id option:selected').val();
		 	if(insurance_corp_id!='x'){
				getChainSelect('<?php echo $insurance_corp_id?>','insurance_type_id','1','<?php echo $insurance_type_id?>');
			}
		   
		 	var workID=$('#workID').val();
		    //console.log('workID>>'+workID)
		 	if(workID!=''){
				listTransport(workID);
				reloadAppData();
				callInsCover();
			}
		 	
		 
		     $(".datepicker").datepicker({
                language:'th-th',
                format:'dd/mm/yyyy',
                autoclose: true
            });
		 
		 	callSummaryData();
		 /* $(".autonumber").on("keypress keyup blur",function (event) {
            //this.value = this.value.replace(/[^0-9\.]/g,'');
     		$(this).val($(this).val().replace(/[^0-9\.]/g,''));
            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57) ) {
                event.preventDefault();
            }
         });*/
		 
		 
		  $("#toggleButton").click(function(){
			$("#carBrandDiv").toggle();
		  });
 
	 })
</script>