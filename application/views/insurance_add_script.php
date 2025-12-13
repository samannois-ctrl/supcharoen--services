
<script>
//----------------------------------
	  document.addEventListener("DOMContentLoaded", function () {
            const checkboxes = document.querySelectorAll('input[name="data_status[]"]');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener("change", function () {
                    if (this.checked) {
                        checkboxes.forEach(otherCheckbox => {
                            if (otherCheckbox !== this) {
                                otherCheckbox.checked = false; // Uncheck อันอื่น
                            }
                        });
                    }
                });
            });
        });
	
//---------------------------------- 
	function setTaxExpire(iam){
		
	}
//---------------------------------- 
	function deleteImages(imagesID,numPuc){
		if(confirm('ต้องการลบรูปที่ '+numPuc+' ?')){
			$.post('<?php echo base_url('insurance_car/deleteImages')?>',{ imagesID:imagesID},function(data){
				var obj=JSON.parse(data);
				if(obj.doDb=='1'){
					alert('ลบไฟล์เรียบร้อยแล้ว');
					$('#LI'+imagesID).remove();
				}else{
					
				}
			})
		}else{
			return false;
		}
	}
	//----------------------------------
	function list_insurance_images_file(){
		$('#p2').css('display','block');
		var workID =  $('#workID').val();
		$('#showImagesFiles').html('Loading....');
		$.post('<?php echo base_url('insurance_car/list_insurance_images_file')?>',{ workID:workID},function(data){
			$('#showImagesFiles').empty();
			$('#showImagesFiles').html(data);
			
		})
	}		
	//----------------------------------
	function SaveInsFile(){
		$('#showSpin').css('display','block');
		var insWorkID =  $('#insWorkID').val();
		$('#workID').val(insWorkID);
		var workID =  $('#workID').val();
		
		if(workID=='0'){
			alert('กรุณาใส่ข้อมูลหลักแล้วบันทึกก่อนที่จะเพิ่มรูป/ไฟล์');
			return false;
		}else{
			var form = new FormData($('#insuranceImagesForm')[0]);
				var result='';
			 
			 $.ajax({
				url: '<?php echo base_url('insurance_car/SaveInsFile')?>',
				type: 'POST' ,  
				data: form ,
				success: function (data) {
				
				console.log(data);
				
				var obj = JSON.parse(data);	
				
				console.log(obj.SqlStatus.updateDb)
				if(obj.SqlStatus.updateDb=='1'){
						 alert('บันทึกข้อมูลเรียบร้อยแล้ว');
						 $('#userfile').val('');
					     list_insurance_images_file();	
						 $('#showSpin').css('display','none');
					
						
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
	//---------------------------------- selectType
	//-----------------------------
	function updatePaymentAmount(theValue){
		var insWorkID =  $('#insWorkID').val();
		 $.post('<?php echo base_url('insurance_car/updatePaymentAmount')?>',{theValue:theValue,insWorkID:insWorkID},function(data){
			 
			 var obj = JSON.parse(data);
			 if(obj.Dodb=='ok'){
				 console.log('ok-update');
			 }else{
				  console.log('not-update');
			 }
		 })
		
	}
	//-----------------------------  
	function setCashTranValue(amtField,cashField,tranField,iam){
		
		  var amtValue = $('#'+amtField).val();
		  var cashValue = $('#'+cashField).val();
		  var tranValue = $('#'+tranField).val();
		
		  if(cashValue==''){ var cashValue='0.00'; }
		  if(tranValue==''){ var tranValue='0.00'; }
		
		console.log('iam>'+iam.value+' amtValue>'+amtValue+' cashValue>'+cashValue+' tranValue>'+tranValue)
		
		  if((iam.value !='1')&&(iam.value!='0')){
			 if(cashValue=='0.00'){
				var useValue = amtValue;
			 }else{
				 var useValue = cashValue;
			 }
			  $('#'+cashField).val('0.00');
			  $('#'+tranField).val(useValue);
		  }else if((iam.value=='1')&&(iam.value!='0')){
			 if(tranValue=='0.00'){
				var useValue = amtValue;
			 }else{
				 var useValue = tranValue;
			 }
			  $('#'+cashField).val(useValue);
			  $('#'+tranField).val('0.00');
			  
		  }else if(iam.value=='0'){
			  $('#'+cashField).val('0.00');
			  $('#'+tranField).val('0.00');
		  }
	}
	
	//-----------------------------  
	function UpdatePayType(field,theValue){
		 var insWorkID =  $('#insWorkID').val();
		 $.post('<?php echo base_url('insurance_car/UpdatePayType')?>',{field:field,theValue:theValue,insWorkID:insWorkID},function(data){
			 
			 var obj = JSON.parse(data);
			 if(obj.Dodb=='ok'){
				 console.log('ok-update');
				 if(field=='amt_recieve_carcheck'){
					 $('#cash_collection_carcheck').val(theValue);
				 }else if(field=='amt_recieve_tax'){
					  $('#cash_collection_tax').val(theValue);
				 }else if(field=='amt_recieve_act'){
					 $('#cash_collection_act').val(theValue);
				 }else if(field=='amt_recieve_ins'){
					 $('#cash_collection_ins').val(theValue);
				 }
			 }else{
				  console.log('not-update');
			 }
		 })
	}
	//-----------------------------
	function ClarDateData(inputID){
		$('#'+inputID).val('');
	}
	//-----------------------------
	function updateRadioCheck(iam,inputID,theValue){
		if(iam.checked==false){
			//$('#'+inputID).prop('checked', false);
			$('#'+inputID).val('2');
		}else if(iam.checked==true){
			//$('#'+inputID).prop('checked', true);
			$('#'+inputID).val(theValue);
		}
	}
	//----------------------------- 
	function resetAct(iam){
			$('#act_no').val('');
			$('#act_date_start').val('');
			$('#act_date_end').val('');
			$('#act_price').val('');
			$('#act_discount').val('');
			$('#act_tax').val('');
			$('#act_vat').val('');
			$('#act_price_net').val('');
			$('#act_price_total').val('');
			$('#act_price_total').val('');
			$("#corp_id").val("x"); 
			$("#act_type_id").val("x");
	}
	//-----------------------------
	function callPremium(){
		var car_type_id  = $('#car_type_id option:selected').val();
		var type_premium_id  = $('#type_premium_id option:selected').val();
		//var type_premium_id  = $('#type_premium_id option:selected').val();
		
		var act_for_rent = $("input[name='act_for_rent']:checked").val();
		var doAct = $("input[name='doAct']:checked").val();
		
		if(doAct=='0'){
			//-clear form
			$('#act_price').val('0.00');
			$('#act_discount').val('0.00');
			$('#act_tax').val('0.00');
			$('#act_vat').val('0.00');
			$('#act_price_net').val('0.00');
			$('#act_price_total').val('0.00');
			
		   }else if(doAct=='1'){
		
			if ($('input[name="act_for_rent"]:checked').length === 0) { 
					alert('กรุณาเลือก นิติบุคคล หรือให้เช่า');
					return false;
			}else{
				 var act_for_rent = $("input[name='act_for_rent']:checked").val();
			}
		
		//alert(act_for_rent)
		
		if((car_type_id=='x')||(type_premium_id=='x')){
			alert('กรุณาเลือกประเภทรถ / รหัสรถ');
			return false;
		}else{
			 $.post('<?php echo base_url('insurance_car/callPremium')?>',{ car_type_id:car_type_id,type_premium_id:type_premium_id},function(data){ 
				  
			 	   var obj = JSON.parse(data);
				   if(act_for_rent=='1'){
					   var act_price = parseFloat(obj.total_premium).toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");;
					   var act_tax = parseFloat(obj.tax).toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");;
					   var act_vat = parseFloat(obj.vat).toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");;
					   var act_price_net = parseFloat(obj.insurance_premium).toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");;
					   var act_price_total = parseFloat(obj.total_premium).toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");;
					   
				   }else if(act_for_rent=='2'){
					   var act_price = parseFloat(obj.total_premium_rent).toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");;
					   var act_tax = parseFloat(obj.tax_rent).toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");;
					   var act_vat = parseFloat(obj.vat_rent).toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");;
					   var act_price_net = parseFloat(obj.insurance_premium_rent).toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");;
					   var act_price_total = parseFloat(obj.total_premium_rent).toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");;
				   }
				 
				 
			$('#act_price').val(act_price);
			$('#act_discount').val('0.00');
			$('#act_tax').val(act_tax);
			$('#act_vat').val(act_vat);
			$('#act_price_net').val(act_price_net);
			$('#act_price_total').val(act_price_total);
				 
				   /*
				   {"insurance_premium":"600.00","vat":"42.21","tax":"3.00","total_premium":"645.21","insurance_premium_rent":"1900.00","vat_rent":"133.56","tax_rent":"8.00","total_premium_rent":"2041.56"}
				   
				   */
			 }) 
		}
			
	   }	
		
	}
	//----------------------------
	function listCarTypePremium(){
		var car_type_id  = $('#car_type_id option:selected').val();
		var type_premium_id  = $('#type_premium_id option:selected').val();
		var type_premium_id_temp  = $('#type_premium_id_temp').val();
		//var insurance_personal = $("input[name='insurance_personal']:checked").val();
		//console.log('insurance_personal>'+insurance_personal)
		//if(insurance_personal==undefined){
		////	alert('กรุณาเลือกประเภทประกันภัย');
		//	return false;
		//}else
			if(car_type_id!='x'){
			 $.post('<?php echo base_url('insurance_car/listCarTypePremium')?>',{ car_type_id:car_type_id,type_premium_id_temp:type_premium_id_temp},function(data){ 
			 	   $("#type_premium_id").empty();
			 	   $("#type_premium_id").append(data);
			 }) 
		  }else if(car_type_id=='x'){
			   $("#type_premium_id").empty();
		  }
	}
	//----------------------- deduct_percent  $('#deduct_percent').val('') premium total_premium
	function setdecardedug(){
		var car_type_id = $('#car_type_id option:selected').val();
		var type_premium_id = $('#type_premium_id option:selected').val();
		var deduct_percent = $('#deduct_percent').val();
		var do_Act = $('input[name=do_act]:checked');
		 
		 $.post('<?php echo base_url('insurance_car/setdecardedug')?>',{ car_type_id:car_type_id,type_premium_id:type_premium_id},function(data){
			  var obj =JSON.parse(data);
			 
			 if($('#do_act').is(":checked")==false){
				  //$('#deduct_percent').val(obj.dedugVal);
			  	  $('#act_price').val(obj.total_premium);
			      $('#act_price_total').val(obj.premium);
			      $('#act_price_total_full').val(obj.premium);
			 // $('#act_price_net').val(obj.total_premium);
			  
			 calculateAct()
			 }
			 
			 
		 })
	}
	//----------------------------------code , agent
	//----------------------- 
	function getCarPremium(){
		var car_type_id = $('#car_type_id option:selected').val();
		 $.post('<?php echo base_url('insurance_car/getCarPremiumList')?>',{ car_type_id:car_type_id},function(data){
			  $('#listCC').empty();
			  $('#listCC').html(data);
			 
		 })
	}
	//----------------------------------code , agent
	function showTextPayment(insWorkID){
		$.post('<?php echo base_url('insurance_car2/showTextPayment')?>',{ insWorkID:insWorkID },function(data){
				$('#showPaymentText').empty();
				$('#showPaymentText').html(data);
		})
	}
	//----------------------------------code , agent
	function openPopUpForm(formType){
		    if(formType=='code'){
				var txtHeader ="รายชื่อโค้ด";
			}else{
				var txtHeader ="รายตัวแทน";
			}
			$.post('<?php echo base_url('Insurance_car2/openPopUpForm')?>',{formType:formType },function(data){
					$('#exampleModalLong h4').empty();
					$('#exampleModalLong h4').html(txtHeader);
					$('#exampleModalLong .modal-body').html(data);
					$('#exampleModalLong').modal('show');
					
				})
	}
	//----------------------------------refreshCodeList()
	function refreshCodeList(){
		    $.post('<?php echo base_url('Insurance_car2/reloadCodeList')?>',{},function(data){
					//$('#printAddr').empty();
					//$('#printAddr').html(data);
				    console.log('refreshCodeList() >'+data)
					$('#ins_code_id')
					.find('option')
					.remove()
					.end()
					.append(data);
				    
				    $('#act_code_id')
					.find('option')
					.remove()
					.end()
					.append(data);
					
				})
	}
	//----------------------------------
	function reloadAgentList(){
		    $.post('<?php echo base_url('Insurance_car2/reloadAgentList')?>',{},function(data){
					//$('#printAddr').empty();
					//$('#printAddr').html(data);
				   
					$('#Xagent_id')
					.find('option')
					.remove()
					.end()
					.append(data);
					
					$('#act_agent_id')
					.find('option')
					.remove()
					.end()
					.append(data);
					
				})
	}	
	//----------------------------------refreshCodeList()
	function refreshAgentList(){
		    $.post('<?php echo base_url('Insurance_car2/reloadAgentList')?>',{},function(data){
					//$('#printAddr').empty();
					//$('#printAddr').html(data);
				   
					$('#ins_code_id')
					.find('option')
					.remove()
					.end()
					.append(data);
					
				})
	}	
	//----------------------------------
	function printControlBoard(){
		
	}
	//----------------------------------
	function uncheckRecieve(inputUncheck,inputCheck,iam){
		if(iam.checked==false){
			$('#'+inputUncheck).prop('checked', false); // Unchecks it
		}else{
			$('#'+inputCheck).prop('checked', true); // Checks it
			$('#'+inputUncheck).prop('checked', false); // Unchecks it
		}

	}
	
	//----------------------------------
	function printAddr(){
		  var radios = document.getElementsByName('a4size');
		  var insWorkID =  $('#insWorkID').val();
		  var post_name = $('#post_name').val();
            var selectedValue = "1";

            for (var i = 0; i < radios.length; i++) {
                if (radios[i].checked) {
                    selectedValue = radios[i].value;
                    break;
                }
            }

		if(post_name==''){
			alert('กรุณาใส่ที่อยู่ไปรษณีย์');
			return false;
		}else{
			//if (selectedValue !== "") {
                //alert("Selected value: " + selectedValue); Insurance_car/work_car_address_print
				$.post('<?php echo base_url('Insurance_car/work_car_address_print')?>',{selectedValue:selectedValue,insWorkID:insWorkID},function(data){
					$('#printAddr').empty();
					$('#printAddr').html(data);
					
				})
            //} else {
            //    alert("กรุณาเลือกขนาดกระดาษ.");
            //}
		}
            
	}
	//----------------------------------
	function printDataAddr(divName)
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
   //var getDate = $('#startDate').val();
   //var getDateEnd = $('#endDate').val();
   //var cartype = $('#car_type_id option:selected').text();
   //var title = "รายการ  ตรอ. "+cartype+" ส่ง พ.ร.บ. วันที่ "+getDate+' - '+getDateEnd+'  ';
   var size = $('#a4Size').val()
   var head='<!DOCTYPE html>'+
              '<html>'+
              '<head>'+
              '<meta charset="UTF-8">'+'<title></title>'+
              '<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />'+
              '<style>'+
	   		  '@page { size: '+size+'  font-size: 14pt; }'+
              '</style>'+
              '</head>'+
              '<body>';

  var foot=   '</body>'+
              '</html>';

  return  head+content+foot;      
}
	//----------------------------------
	function SavePostAddr(action){
		
		
		 var form = new FormData($('#postFormAddr')[0]);
				var result='';
			 
			 $.ajax({
				url: '<?php echo base_url('insurance_car/SavePostAddr')?>',
				type: 'POST' ,  
				data: form ,
				success: function (data) {
				
				var obj = JSON.parse(data);	 
				
				if(obj.doDb=='1'){
						 alert('บันทึกข้อมูลเรียบร้อยแล้ว');
						 if(action=='print'){
							 //-----------------------------------	//----
							  var radios = document.getElementsByName('a4size');
							  var insWorkID =  $('#insWorkID').val();
							  var post_name = $('#post_name').val();
								var selectedValue = "1";

								for (var i = 0; i < radios.length; i++) {
									if (radios[i].checked) {
										selectedValue = radios[i].value;
										break;
									}
								}

							if(post_name==''){
								alert('กรุณาใส่ที่อยู่ไปรษณีย์');
								return false;
							}else{
								//if (selectedValue !== "") {
									//alert("Selected value: " + selectedValue); Insurance_car/work_car_address_print
									$.post('<?php echo base_url('Insurance_car/work_car_address_print')?>',{selectedValue:selectedValue,insWorkID:insWorkID},function(data){
										$('#printAddr').empty();
										$('#printAddr').html(data);

									})
								//} else {
								//    alert("กรุณาเลือกขนาดกระดาษ.");
								//}
							}						 
							 //-----------------------------------							 
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
	//---------------------------------- 
	function UpdateCashDuedate(){
		var insWorkID =  $('#insWorkID').val();
		var pay_cash_status =  $('#pay_cash_status option:selected').val();
		var cash_duedate =  $('#cash_duedate').val();
		console.log('cash_duedate>'+cash_duedate+' insWorkID>'+insWorkID+' pay_cash_status>'+pay_cash_status)
		$.post('<?php echo base_url('Insurance_car/UpdateCashDuedate')?>',{cash_duedate:cash_duedate,insWorkID:insWorkID,pay_cash_status:pay_cash_status},function(data){
			console.log(data);
				var obj= JSON.parse(data);
			    if(obj.DoDb=='1'){
					console.log('ok')
				}
		})
	}
	//---------------------------------- 
	function updateCashPayment(section){
		var insWorkID =  $('#insWorkID').val();
		var amount_installment = $('#amount_installment').val().replace(',','');
		var cash_type  = 1;
		if(section=='car_check'){
			
			var pay_type = $('#car_check_pay_type option:selected').val();
			var bank_id = $('#car_check_pay_bank_id option:selected').val();
			var receipt_date  = $('#car_check_receipt_date').val();
			var amt_revieve  = $('#amt_recieve_carcheck').val();
			var spanid ='ok_car_check';
			var fieldCash = 'carcheck_cash';
			var cash_collection_feild = 'cash_collection_carcheck';
			var tran_collection_feild = 'tran_collection_carcheck';
			var cash_collection_value= $('#cash_collection_carcheck').val();	
			var tran_collection_value = $('#tran_collection_carcheck').val();	
			
			var id_recieve_record = $('#recieve_id_carcheck').val();
			var field_recieve_record = 'recieve_id_carcheck';
			/*if ($('input[name=carcheck_cash]:checked').length > 0) {
				 var cash_type  = $('input[name=carcheck_cash]:checked').val();
			}else{
				 var cash_type  = 0;  
				
				recieve_id_carcheck recieve_id_act recieve_id_tax recieve_id_ins 
			}*/
			
		}else if(section=='act'){
			
			var pay_type = $('#act_pay_type option:selected').val();
			var bank_id = $('#act_pay_bank_id option:selected').val();
			var receipt_date  = $('#act_receipt_date').val();
			var amt_revieve  = $('#amt_recieve_act').val();
			var spanid ='ok_act';
			var fieldCash = 'act_cash';
			var cash_collection_feild = 'cash_collection_act';
			var tran_collection_feild = 'tran_collection_act';
			var cash_collection_value= $('#cash_collection_act').val();	
			var tran_collection_value = $('#tran_collection_act').val();
			var id_recieve_record = $('#recieve_id_act').val();
			var field_recieve_record = 'recieve_id_act';
			/*if ($('input[name=act_cash]:checked').length > 0) {
				 var cash_type  = $('input[name=act_cash]:checked').val();
			}else{
				 var cash_type  = 0;
			}*/
			
			
		}else if(section=='ins'){
			
			var pay_type = $('#ins_pay_type option:selected').val();
			var bank_id = $('#ins_pay_bank_id option:selected').val();
			var receipt_date  = $('#ins_receipt_date').val();
			var amt_revieve  = $('#amt_recieve_ins').val();
			var spanid ='ok_ins';
			
			var fieldCash = 'ins_cash';
			var cash_collection_feild = 'cash_collection_ins';
			var tran_collection_feild = 'tran_collection_ins';	
			var cash_collection_value= $('#cash_collection_ins').val();	
			var tran_collection_value = $('#tran_collection_ins').val();	
			
			var id_recieve_record = $('#recieve_id_ins').val();
			var field_recieve_record = 'recieve_id_ins';
			/*if ($('input[name=ins_cash]:checked').length > 0) {
				 var cash_type  = $('input[name=ins_cash]:checked').val();
			}else{
				 var cash_type  = 0;
			}*/
			
			
		}else if(section=='tax'){
		
			var pay_type = $('#tax_pay_type option:selected').val();
			var bank_id = $('#tax_pay_bank_id option:selected').val();
			var receipt_date  = $('#tax_receipt_date').val();
			var amt_revieve  = $('#amt_recieve_tax').val();
			var spanid ='ok_tax';
			var fieldCash = 'tax_cash';
			var cash_collection_feild = 'cash_collection_tax';
			var tran_collection_feild = 'tran_collection_tax';	
			var cash_collection_value= $('#cash_collection_tax').val();	
			var tran_collection_value = $('#tran_collection_tax').val();	
						
			var id_recieve_record = $('#recieve_id_tax').val();
			var field_recieve_record = 'recieve_id_tax';
			/*if ($('input[name=tax_cash]:checked').length > 0) {
				 var cash_type  = $('input[name=tax_cash]:checked').val(); 
			}else{
				 var cash_type  = 0;
			}*/
		}
		
		
		
		
		if(pay_type=='0'){
			alert('กรุณาเลือกวิธีการชำระเงิน');
			return false;
		}else if((pay_type==2)&&(bank_id=='x')){
			alert('กรุณาเลือกธนาคาร');
			return false;			
		}else if(receipt_date==''){
			alert('กรุณาเลือกวันที่รับเงิน');
			return false;			
		}else{
			$.post('<?php echo base_url('insurance_car/updateCashPayment')?>',{ insWorkID:insWorkID,pay_type:pay_type,bank_id:bank_id,receipt_date:receipt_date,section:section,fieldCash:fieldCash,cash_type:cash_type,amt_revieve:amt_revieve , cash_collection_feild:cash_collection_feild,tran_collection_feild:tran_collection_feild, cash_collection_value:cash_collection_value,tran_collection_value:tran_collection_value,id_recieve_record:id_recieve_record,field_recieve_record:field_recieve_record},function(data){
							var obj = JSON.parse(data);
							
							if(obj.DoDb=='1'){
								 $('#'+spanid).html('<i class="fa fa-check"></i> ');
								 setTimeout(function(){ $('#'+spanid).empty() },5000)
							}
		    })
		}
		
		
		
		
		/*  ok_ins ok_act ok_car_check
		car_check=> car_check_pay_type  car_check_pay_bank_id  car_check_receipt_date 
										 act=> act_pay_type  act_pay_bank_id  act_receipt_date 
										 ins=> ins_pay_type  ins_pay_bank_id  ins_receipt_date 
										 tax=> tax_pay_type  tax_pay_bank_id  tax_receipt_date 
		
		*/
	}
	//---------------------------------- 
	function updateAmountInstallment(){
		var insWorkID =  $('#insWorkID').val();
		var amount_installment = $('#amount_installment').val().replace(',','');
		$.post('<?php echo base_url('insurance_car/updateAmountInstallment')?>',{ insWorkID:insWorkID,amount_installment:amount_installment},function(data){
							var obj = JSON.parse(data);
			            
							if(obj.DoDb=='1'){
								console.log('update amount installment ok')
							}else{
								console.log('cannot update amount installment !!!!')
							}
		    })
	}
	//---------------------------------- 
	function setShowPayment(){
		var insurance_total   = $('#insurance_total').val();
		var act_price_total   = $('#act_price_total').val();
		var tax_price   = $('#tax_price').val().replace(',','');
		var tax_service   = $('#tax_service').val().replace(',','');
		var car_check_price   = $('#car_check_price').val();
		
		var tax_priceA = parseFloat(tax_price);
		var tax_serviceA = parseFloat(tax_service);
		var taxTotal  = (tax_priceA+tax_serviceA).toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
		
		var amount_installment = $('#amount_installment').val().replace(',','');
		if(amount_installment==''){ var amount_installment = 0;}
		// show_car_check_price show_act_price_total show_insurance_total show_tax_total
		$('#show_car_check_price').html(car_check_price);
		$('#show_act_price_total').html(act_price_total);
		$('#show_insurance_total').html(insurance_total);
		$('#show_tax_total').html(taxTotal);
		
		
		var insurance_total   = $('#insurance_total').val().replace(',','');
		var act_price_total   = $('#act_price_total').val().replace(',','');
		var tax_price   = $('#tax_price').val().replace(',','');
		var tax_service   = $('#tax_service').val().replace(',','');
		var car_check_price   = $('#car_check_price').val().replace(',','');
		var checkTotalInstallment = parseFloat(amount_installment);
		
		var act_price_total = parseFloat(act_price_total);
		var insurance_total = parseFloat(insurance_total);
		var tax_price = parseFloat(tax_price);
		var tax_service = parseFloat(tax_service);
		var car_check_price = parseFloat(car_check_price);
		
		
		
		var installmentTotal = (insurance_total+act_price_total).toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
		var installmentTotalAll = (tax_service+car_check_price+tax_price+insurance_total+act_price_total).toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
		
		//console.log('checkTotalInstallment>'+checkTotalInstallment+' installmentTotal>'+installmentTotal+' installmentTotalAll>'+installmentTotalAll);
		//if(checkTotalInstallment=='0'){
			//$('#amount_installment').val(installmentTotal);
			$('#amount_installment').val(installmentTotalAll);
			$('#totalAllCash').html(installmentTotalAll);
			updateAmountInstallment();
		//}
		
		
		
	}
	//----------------------------------
	function print_cover_insurance(workID){
		var insWorkID =  $('#insWorkID').val();
		$.post('<?php echo base_url('insurance_car/print_cover_insuranceprintInsurancePayment')?>',{ insWorkID:insWorkID},function(data){
			$('#printCoverArea').empty();
			$('#printCoverArea').html(data);
			
		})
	}
	//---------------------------------- 
	function printInsurancePayment(actionType){
		var insWorkID =  $('#insWorkID').val();
		var installment_peroid  = $('#installment_peroid option:selected').val();
		$.post('<?php echo base_url('insurance_car/printInsurancePayment')?>',{ insWorkID:insWorkID,installment_peroid:installment_peroid,actionType:actionType},function(data){
			$('#listInstallmentPrint').empty();
			$('#listInstallmentPrint').html(data);
			
		})
	}
	//---------------------------------- 
	function calculateRemainPayment(){
		var insWorkID =  $('#insWorkID').val();
		var discountPaymentValue = $("input[name='discount_payment']").val();
			if(discountPaymentValue==''){  var discountPaymentValue = 0;}else{ }
		
		$.post('<?php echo base_url('insurance_car/calculateRemainPayment')?>',{ insWorkID:insWorkID },function(data){ 
			 var obj = JSON.parse(data);
			
			 var Paid = parseFloat(obj.sum_paid);
			 var NotPaid = parseFloat(obj.sum_not_paid);
			 var isPaid = Paid.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
			 var isNotPaid = NotPaid.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
			
			$('#isPaid').empty();	 
			$('#isPaid').html(isPaid);	 
			
			$('#isNotPaid').empty();	 
			$('#isNotPaid').html(isNotPaid);	 
		})
	}
	//---------------------------------- Discounttxt
	function updatePeroidPayment(dataID,theValue,field){
		$.post('<?php echo base_url('insurance_car/updatePeroidPayment')?>',{ dataID:dataID,theValue:theValue,field },function(data){
			var obj = JSON.parse(data);
			if(obj.DoDb=='1'){
				if(field=='amount'){
					$('#Amounttxt'+dataID).html('<span class="text-success">แก้ไขข้อมูลเรียบร้อยแล้ว</span>');
					setTimeout(function(){ $('#Amounttxt'+dataID).empty(); } , 4000)
				}else{
					$('#Discounttxt'+dataID).html('<span class="text-success">แก้ไขข้อมูลเรียบร้อยแล้ว</span>');
					setTimeout(function(){ $('#Discounttxt'+dataID).empty(); } , 4000)
				}
				
				
			}else{
				if(field=='amount'){
					$('#Amounttxt'+dataID).html('<span class="text-danger">ไม่สามารถแก้ไขข้อมูลได้</span>');
					setTimeout(function(){ $('#Amounttxt'+dataID).empty(); } , 4000)
				}else{
					$('#Discounttxt'+dataID).html('<span class="text-danger">ไม่สามารถแก้ไขข้อมูลได้</span>');
					setTimeout(function(){ $('#Discounttxt'+dataID).empty(); } , 4000)
				}
				
			}
			
		})
					
	}
	//---------------------------------- 
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
	}
	//---------------------------------- 
	function updateDuedatePayment(dataID,duedate,curr_period,work_id){
		var totallInstallment  = $('#totallInstallment').val();
		var curr_period = parseInt(curr_period);
		var totallInstallment = parseInt(totallInstallment);
		var curr_period = parseInt(curr_period);
		
		 var inputDate = duedate;
		 var dateParts = inputDate.split('/');
		 var day = parseInt(dateParts[0], 10);
		 var month = parseInt(dateParts[1], 10);
		 var year = parseInt(dateParts[2], 10);
		 var Loop = totallInstallment-2;
		 var NoInput = 3;
		if(curr_period=='2'){
			
			for (var i = 1; i <= Loop; i++) {
        
				var month = month+1;
				
				console.log('  i >'+i+"  month>"+month)
				
				if (month > 12) {
					month = 1;
					year += 1;
					var txtmonth = ('0' + month).slice(-2);
					console.log('>12' + month);
				}
				
				
			  // Format the date
				if(month < 10){
					var txtmonth = ('0' + month).slice(-2);
					console.log('<10 ' + month);
				}else{
					var txtmonth = (month);
				}
				
				var nextMonthDate = day + '/' + txtmonth + '/' + year;
			    console.log('>>i='+i+"  duedate>"+NoInput+' month='+month+'  txtmonth>>'+txtmonth+' >>>'+nextMonthDate)
			  //---add value------//
			
			 $("input[name='duedate"+NoInput+"']").val(nextMonthDate);
			   
			 var	NoInput = NoInput+1;	
			
		   }
		}
		
		$.post('<?php echo base_url('insurance_car/updateDuedatePayment')?>',{ dataID:dataID,duedate:duedate, curr_period:curr_period , periodInstamment:totallInstallment, work_id:work_id },function(data){
			var obj = JSON.parse(data);
			console.log(data);
			if(obj.DoDb=='1'){
				$('#duedatetxt'+dataID).html('<span class="text-success">แก้ไขข้อมูลเรียบร้อยแล้ว</span>');
				setTimeout(function(){ $('#duedatetxt'+dataID).empty(); } , 4000)
			}else{
				$('#duedatetxt'+dataID).html('<span class="text-success">ไม่สามารถแก้ไขข้อมูลได้</span>');
				setTimeout(function(){ $('#duedatetxt'+dataID).empty(); } , 4000)
			}
			
		})
		
	}
	//---------------------------------- receipt_date pay_type bank_id  payStatus remark
	function UpdatePayment(dataID,recieve_id){
		 var receipt_date = $('#receipt_date'+dataID).val();
		 var remark = $('#remark'+dataID).val();
		 var pay_type = $('#pay_type'+dataID+' option:selected').val();
		 var bank_id = $('#bank_id'+dataID+' option:selected').val();
		 var payStatus = $('#payStatus'+dataID+' option:selected').val();
		 var discount = $('#discount'+dataID).val();
		//if(pay_type=='0'){
		//	alert('กรุณาเลือกวิธีการชำระเงิน');
		//	return false;		
		//}else 
		if(receipt_date==''){
			alert('กรุณาใส่วันรับเงิน');
			return false;
		}else if((pay_type=='2')&&(bank_id=='x')){
			alert('กรุณาเลือกธนาคารที่โอน');
			return false;
		}else{
			$.post('<?php echo base_url('insurance_car/UpdatePayment')?>',{ dataID:dataID,receipt_date:receipt_date,remark:remark,pay_type:pay_type,bank_id:bank_id,payStatus:payStatus,discount:discount,recieve_id:recieve_id},function(data){ 
				var obj = JSON.parse(data);
				console.log(data);
				if(obj.DoDb=='1'){
					//-----set pay status------//
					$('#payStatus'+dataID).empty();
					if(obj.isPayment=='0'){
						$('#payStatus'+dataID).html('<button class="btn btn-danger btn-xs"> ค้างชำระเงิน </button>');
					}else if(obj.isPayment=='1'){
						$('#payStatus'+dataID).html('<button class="btn btn-success btn-xs">ชำระเงินแล้ว</button>');
					}
					var spanid = "ok_installment"+dataID; $('#'+spanid).html('<i class="fa fa-check"></i> ');
					 setTimeout(function(){ $('#'+spanid).empty() },5000)
					calculateRemainPayment();
					var insWorkID =  $('#insWorkID').val(); 
					showTextPayment(insWorkID);
				}else{
					alert('ไม่สามารถอัพเดทข้อมูลได้');
				}
			})
		}
		
		
	}   
	
 /*<button class="btn btn-danger btn-xs"> ค้างชำระเงิน </button><button class="btn btn-success btn-xs">ชำระเงินแล้ว</button>*/
	
	//----------------------------------
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
		
		//getCarcheckTotal();
		
	}	
	//------------------------------------ 
	function listInstallment(insWorkID){
		$.post('<?php echo base_url('insurance_car/listInstallment')?>',{ insWorkID:insWorkID},function(data){
			$('#listInstallment').empty();
			$('#listInstallment').html(data);
			
		})
	}
	//------------------------------------ selected.val(); totalInsurance insurance_total insurance_total
	function calculateInstallment(){
		var insWorkID =  $('#insWorkID').val();
		var insurance_total = $('#insurance_total').val().replace(',','');
		var insurance_totalShow = $('#insurance_total').val();
		var installment_peroid = $('#installment_peroid option:selected').val();
		var selectedPay = $("input[type='radio'][name='is_installment']:checked").val();
		
		var amount_installment = $('#amount_installment').val().replace(',','');
		
		//if(installment_peroid==0){
		//	alert('กรุณาเลือกจำนวนงวดชำระ');
		//}else{
			
		  if(confirm('ยืนยันงวดชำระ ?')){	
			if(installment_peroid=='1'){
				$("#optionsRadios1").prop("checked",true);
				$("#optionsRadios2").prop("checked",false);
			}else{
				$("#optionsRadios1").prop("checked",false);
				$("#optionsRadios2").prop("checked",true);
			}
			
		  $.post('<?php echo base_url('insurance_car/calculateInstallment')?>',{ insWorkID:insWorkID , insurance_total:amount_installment,installment_peroid:installment_peroid, selectedPay:selectedPay , amount_installment:amount_installment  },function(data){
			 // console.log(data);
			  var obj = JSON.parse(data);
			  if(obj.DoDbAll=='1'){
				  listInstallment(insWorkID);
				  showTextPayment(insWorkID)
			  }else{
				  alert('ไม่สามารถสร้างข้อมูลได้');
			  }
		  })
		}else{
			return false;
		}	
			
	//}
		$('#totalInsurance').html(insurance_totalShow);
		console.log('insurance_totalShow>'+insurance_totalShow)
		calculateRemainPayment();
		
		console.log('insurance_total>'+insurance_total+' installment_peroid>'+installment_peroid)
		
	}
	//------------------------------------
	function  getInsuranceSelect(corp_id,insurance_type_id,chainSelectName,selectType){

		if(corp_id!='x'){
			$.post('<?php echo base_url('insurance_car/getInsuranceSelect')?>',{ corp_id:corp_id,insurance_type_id:insurance_type_id,selectType:selectType},function(data){
			console.log('getInsuranceSelect>'+data);
				$('#'+chainSelectName).empty();
				$('#'+chainSelectName).append(data);
		})
		}
		
		 
	}
	//------------------------------------
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
	//-----------------------------------
	function SaveInsurance(){
		var cust_name  = $('#cust_name').val();
		var vehicle_regis  = $('#vehicle_regis').val();
		var insurance_price  = $('#insurance_price').val();
		var ins_date_work  = $('#ins_date_work').val();
		var agent_id  = $('#agent_id').val();
		var sum_insured  = $('#sum_insured').val();
		var type_premium_id  = $('#type_premium_id option:selected').val();
		$('#type_premium_id_temp').val(type_premium_id);
		//var insurance_fix_garace = $('#insurance_fix_garace option:selected').val();
		
		var insurance_fix_garace = $(':radio[name="insurance_fix_garace"]:checked').length;
		
		$('#ins_date_work').val(ins_date_work);
		$('#date_work').val(ins_date_work);
		$('#agent_id').val(agent_id);
		
				
		if(cust_name==''){
			alert('กรุณาใส่ชื่อลูกค้า');
			return false;
		}else if(vehicle_regis==''){
			alert('กรุณาใส่เลขทะเบียนรถ');
			return false;
		//}else if((insurance_fix_garace==0)&&(sum_insured!='')){
		//	alert('กรุณาเลือกซ่อมอู่/ซ่อมห้าง');
		//	return false;			
		//}else if((insurance_price=='')&&(sum_insured!='')){
		//	alert('กรุณาใส่เบี้ยรวม');
		//	return false;	
		}else{
			var workID = $('#workID').val();
			
			var form = new FormData($('#insuranceForm')[0]);
				var result='';
			 
			 $.ajax({
				url: '<?php echo base_url('insurance_car/SaveInsurance')?>',
				type: 'POST' ,  
				data: form ,
				success: function (data) {
				//console.log(data);
				var obj = JSON.parse(data);	 
				//console.log(data);
				if(obj.doDb=='1'){
						 alert('บันทึกข้อมูลเรียบร้อยแล้ว');
						 $('#insWorkID').val(obj.workID)
					
						 var new_url="<?php echo base_url('Insurance_car/work_insurance_add/')?>"+obj.workID;
						 window.history.pushState("data","Title",new_url);
					  	// updateWorkData(obj.workID);
					    setShowPayment();
						
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
	
	//------------------------------------	
	function setCutomerType(TypeValue){
		var insWorkID = $('#insWorkID').val();
		var insurance_total_net = $('#insurance_total_net').val();
		var insurance_total = $('#insurance_total').val();
		var Xagent_id = $('#Xagent_id option:selected').val();
		var insType = '1';
		console.log('insWorkID>'+insWorkID+' total_net>'+insurance_total_net+' agent_id>'+Xagent_id+' nsType>'+insType)
		if(insWorkID=='0'){
			alert('กรุณาบันทึกข้อมูลลูกค้าก่อนเลือก');
			return false;
		}else{
			$.post('<?php echo base_url('Insurance_car/setCutomerType/')?>',{insWorkID:insWorkID,insType:insType,cust_type:TypeValue , insurance_total_net:insurance_total_net, Xagent_id:Xagent_id , insurance_total:insurance_total },function(data){
				var obj = JSON.parse(data);
				console.log(obj)
				$('#amt_recieve_ins').val(obj.getResultCom);
			});
		}
	}
	//------------------------------------	
	function CaculateIns(){ //insurance_price insurance_discount insurance_total
		console.log('Do Calculate Ins');
		var insurance_price = $('#insurance_price').val();
			insurance_price = insurance_price.replace(',','');
		var insurance_discount=$('#insurance_discount').val();
			insurance_discount = insurance_discount.replace(',','');
		
		
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
		console.log('dutyValue>'+dutyValue+' dutyResult>'+dutyResult);
		//-------tax calculate -----------// +'.00'
		var x1 = parseInt(TotalNetValue);
		var x2 = parseInt(dutyResult);
		var taxvalue = ((x1+x2)*7)/100;
		var taxText = taxvalue;
		console.log('TotalNetValue >'+TotalNetValue+' dutyResult>'+dutyResult+' taxvalue>'+taxvalue);
		$('#insurance_tax').val(taxText);
		
		//-------insurance_total_net calculate -----------//
		$('#insurance_total_net').val(TotalNetText+'.00');
	}
	
	//------------------------------------
	//--------------------------act_price_total
	function calculateAct(){
		var act_price = $('#act_price').val().replace(',','');
		console.log('act_price 1 >'+act_price)
		var act_discount = $('#act_discount').val().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
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
		
		
		
		//getCarcheckTotal();
	
		
	}	
	
	function getCarcheckTotal(){
		
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
		console.log('currentYear>>'+currentYear)
		var SetDateExpire = date+'/'+month_regist+'/'+nexYear;
		console.log('SetDateExpire>'+SetDateExpire)
		$('#date_registration_end').val(SetDateExpire);
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
	
	//------------------------------------
	function setLicensePlate(theValue){
		$('#showPlateLicense').empty();
		$('#showPlateLicense').html(theValue.value)
	}
	//------------------------------------
	function setEndDate(dateStart,fieldName,amtYear){
	    var amtYear = parseInt(amtYear);
	    var arr = dateStart.split('/');
	    var yearNum = parseInt(arr[2]);
	    var nextYear = yearNum + amtYear;
	    var newDate = arr[0]+"/"+arr[1]+"/"+nextYear;
	    // console.log('newDate>'+newDate)
	    $('#'+fieldName).val(newDate);
   }	
	
	
	$(document).ready(function(){
		 $(".datepicker").datepicker({
                language:'th-th',
                format:'dd/mm/yyyy',
                autoclose: true
            });
		
	    var insWorkID =  $('#insWorkID').val();
		console.log('insWorkID>'+insWorkID)
		 if(insWorkID!='0'){
			 console.log('get selected')
			 var corp_id = $('#insurance_corp_id option:selected').val();
			 var insurance_type_id = $('#hiddenInsTypeID').val();
			// getInsuranceSelect(corp_id,insurance_type_id,'insurance_type_id','1')
		
			 
			 var corp_id = $('#corp_id option:selected').val();
			 var insurance_type_id = $('#hiddenActTypeID').val();
			// getInsuranceSelect(corp_id,insurance_type_id,'act_type_id','2')
			// getInsuranceSelect('act_type_id','2'); 
			 
			 calculateRemainPayment(); 
			 showTextPayment(insWorkID);
			 listCarTypePremium();
			 list_insurance_images_file();
		 }

		<?php if($getCarCode=='1'){?>
		       listCarTypePremium();
		<?php } ?>
	})

	$(document).ready(function(){
    $('.duedateInput').change(function(){
        var currentId = $(this).attr('id'); // Get the ID of the current input
        var currentClass = $(this).attr('class'); // Get the classes of the current input
        
        console.log("Changed input ID: " + currentId);
        console.log("Changed input classes: " + currentClass);
		
		
    });
});
	<?php if($doCaculateIns=='1'){  ?>
				//console.log('doCaculateIns>><?php echo $doCaculateIns?>')
				CaculateIns();
		<?php }?>
	
</script>