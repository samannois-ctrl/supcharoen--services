<script>
	//----------------------------------
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
		var workID =  $('#workID').val();
		if(workID=='0'){
			alert('กรุณาใส่ข้อมูลหลักแล้วบันทึกก่อนที่จะเพิ่มรูป/ไฟล์');
			return false;
		}else{
			var form = new FormData($('#insuranceOtherForm')[0]);
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
	function printInsuranceOtherPayment(actionType){
		var workID =  $('#workID').val();
		var Insurance_otherID =  $('#Insurance_otherID').val();
		var selectType =  $('#selectType').val();
		var amount_installment =  $('#amount_installment').val();
		var installment_peroid  = $('#installment_peroid option:selected').val();
		
		console.log('selectType>'+selectType+' installment_peroid>'+installment_peroid)
		$.post('<?php echo base_url('Insurance_other/printInsuranceOtherPayment')?>',{ workID:workID, Insurance_otherID:Insurance_otherID,installment_peroid:installment_peroid,actionType:actionType,selectType:selectType,amount_installment:amount_installment},function(data){
			$('#listInstallmentPrint').empty();
			$('#listInstallmentPrint').html(data);
			
		})
	}
	//----------------------------------//-----------------------------
	function UpdatePotherPayType(field,theValue,insType){
		var insWorkID =  $('#Insurance_otherID').val();
		 //var insWorkID =  $('#workID').val();
		 $.post('<?php echo base_url('Insurance_other/UpdatePotherPayType')?>',{field:field,theValue:theValue,insWorkID:insWorkID,insType},function(data){
			 console.log(data);
			 var obj = JSON.parse(data);
			 if(obj.Dodb=='ok'){
				 console.log('ok-update');
			 }else{
				  console.log('not-update');
			 }
		 })
	}
	//----------------------------------
		 
	function updateOtherAmountInstallment(insType){
		var insWorkID =  $('#Insurance_otherID').val();
		//var insWorkID =  $('#workID').val();
		var amount_installment = $('#amount_installment').val().replace(',','');
		var selectType =  $('#selectType').val();
		$.post('<?php echo base_url('Insurance_other/updateOtherAmountInstallment')?>',{ insWorkID:insWorkID,amount_installment:amount_installment,insType:insType,selectType:selectType},function(data){
							var obj = JSON.parse(data);
							if(obj.DoDb=='1'){
								console.log('update amount installment ok')
							}else{
								console.log('cannot update amount installment !!!!')
							}
		    })
	}
	//---------------------------------- 
	function UpdateCashOtherDuedate(insType){
		var insWorkID =  $('#Insurance_otherID').val(); 
		var pay_cash_status =  $('#pay_cash_status option:selected').val();
		var cash_duedate =  $('#cash_duedate').val();
		console.log('cash_duedate>'+cash_duedate+' insWorkID>'+insWorkID+' pay_cash_status>'+pay_cash_status)
		$.post('<?php echo base_url('Insurance_other/UpdateCashOtherDuedate')?>',{cash_duedate:cash_duedate,insWorkID:insWorkID,pay_cash_status:pay_cash_status,insType:insType},function(data){
			console.log(data);
				var obj= JSON.parse(data);
			    if(obj.DoDb=='1'){
					console.log('ok')
				}
		})
	}
	//----------------------------- 
	function updatePaymentAmount(theValue,insType){
		var insWorkID =  $('#Insurance_otherID').val(); 
		console.log('insWorkID>'+insWorkID)
		 $.post('<?php echo base_url('Insurance_other/updatePaymentAmount')?>',{theValue:theValue,insWorkID:insWorkID,insType:insType},function(data){
			 console.log(data);
			 var obj = JSON.parse(data);
			 if(obj.Dodb=='ok'){
				 console.log('ok-update');
			 }else{
				  console.log('not-update');
			 }
		 })
		
	}
	//----------------------------------ins_cash  workID
	function updateCashInsOtherPayment(section,insType){
		    var workID =  $('#Insurance_otherID').val();
		    var insurance_id =  $('#workID').val();
	
			var ins_pay_type = $('#ins_pay_type option:selected').val();
		
			var ins_pay_bank_id = $('#ins_pay_bank_id option:selected').val();
			var amt_recieve_ins = $('#amt_recieve_ins').val();
			
			var receipt_date  = $('#ins_receipt_date').val();
			var cash_type  = 0;
			
			var cash_collection_value= $('#cash_collection').val();	
			var tran_collection_value = $('#tran_collection').val();		
			var recieve_id_ins = $('#recieve_id_ins').val();		
			
		   /*if ($('input[name=ins_cash]:checked').length > 0) {
				 var cash_type  = $('input[name=ins_cash]:checked').val(); recieve_id_ins
			}*/
		var cash_type  = 1;
		
		
		if(ins_pay_type=='0'){
			alert('กรุณาเลือกวิธีการชำระเงิน');
			return false;
		}else if((ins_pay_type==2)&&(ins_pay_bank_id=='x')){
			alert('กรุณาเลือกธนาคาร');
			return false;			
		}else if(receipt_date==''){
			alert('กรุณาเลือกวันที่รับเงิน');
			return false;			
		}else{
			$.post('<?php echo base_url('Insurance_other/updateCashInsOtherPayment')?>',{ insWorkID:workID,ins_pay_type:ins_pay_type,ins_pay_bank_id:ins_pay_bank_id,receipt_date:receipt_date,section:section,cash_type:cash_type,amt_revieve:amt_recieve_ins, insType:insType, cash_collection_value:cash_collection_value,tran_collection_value:tran_collection_value, insurance_id:insurance_id,recieve_id_ins:recieve_id_ins},function(data){
			
							var obj = JSON.parse(data);
console.log(data);
							
							if(obj.Dodb=='ok'){
								 $('#ok_ins').html('<i class="fa fa-check"></i> ');
								 setTimeout(function(){ $('#ok_ins').empty() },5000)
							}
		    })
		}
		
		
		
	}
	//----------------------------------
	function showTextPayment(xx){
		
	}
	//----------------------------------
	function calculateRemainPayment(){
		
	}
	//---------------------------------- 
	function updateDuedatePayment(dataID,duedate){
		$.post('<?php echo base_url('insurance_car/updateDuedatePayment')?>',{ dataID:dataID,duedate:duedate },function(data){
			var obj = JSON.parse(data);
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
			$.post('<?php echo base_url('insurance_car/UpdatePayment')?>',{ dataID:dataID,receipt_date:receipt_date,remark:remark,pay_type:pay_type,bank_id:bank_id,payStatus:payStatus,recieve_id:recieve_id},function(data){ 
				var obj = JSON.parse(data);
				
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
					var insWorkID =  $('#workID').val(); 
					showTextPayment(insWorkID);
				}else{
					alert('ไม่สามารถอัพเดทข้อมูลได้');
				}
			})
		}
		
		
	}   
	//------------------------------------ 
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
				
				
				
				if (month > 12) {
					month = 1;
					year += 1;
					var txtmonth = ('0' + month).slice(-2);
					
				}
				
				
			  // Format the date
				if(month < 10){
					var txtmonth = ('0' + month).slice(-2);
					
				}else{
					var txtmonth = (month);
				}
				
				var nextMonthDate = day + '/' + txtmonth + '/' + year;
			   
			  //---add value------//
			
			 $("input[name='duedate"+NoInput+"']").val(nextMonthDate);
			   
			 var	NoInput = NoInput+1;	
			
		   }
		}
		
		$.post('<?php echo base_url('insurance_car/updateDuedatePayment')?>',{ dataID:dataID,duedate:duedate, curr_period:curr_period , periodInstamment:totallInstallment, work_id:work_id },function(data){
			var obj = JSON.parse(data);
			
			if(obj.DoDb=='1'){
				$('#duedatetxt'+dataID).html('<span class="text-success">แก้ไขข้อมูลเรียบร้อยแล้ว</span>');
				setTimeout(function(){ $('#duedatetxt'+dataID).empty(); } , 4000)
			}else{
				$('#duedatetxt'+dataID).html('<span class="text-success">ไม่สามารถแก้ไขข้อมูลได้</span>');
				setTimeout(function(){ $('#duedatetxt'+dataID).empty(); } , 4000)
			}
			
		})
		
	}
	//----------------------------------
	function printAddr(){
		  var radios = document.getElementsByName('a4size');
		  var insWorkID =  $('#workID').val();
		
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
		 var form = new FormData($('#insuranceOtherForm')[0]);
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
							  var insWorkID =  $('#workID').val();
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
	//------------------------------------ 
	function listInstallment(insWorkID){
		$.post('<?php echo base_url('insurance_car/listInstallment')?>',{ insWorkID:insWorkID},function(data){
			$('#listInstallment').empty();
			$('#listInstallment').html(data);
			
		})
	}
	//------------------------------------ 
	function calculateInstallmentOther(){
		var workID =  $('#workID').val();
		var payment_amount = $('#amount_installment').val().replace(',','');
		//var insurance_totalShow = $('#insurance_total').val();
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
			
		  $.post('<?php echo base_url('insurance_other/calculateInstallmentOther')?>',{ insWorkID:workID , insurance_total:payment_amount,installment_peroid:installment_peroid, selectedPay:selectedPay , amount_installment:amount_installment   },function(data){
			 
			  var obj = JSON.parse(data);
			  if(obj.DoDbAll=='1'){
				  listInstallment(workID);
				  
			  }else{
				  alert('ไม่สามารถสร้างข้อมูลได้');
			  }
		  })
		}else{
			return false;
		}	
			
	//}
		//$('#totalInsurance').html(insurance_totalShow);
		//console.log('insurance_totalShow>'+insurance_totalShow)
		//calculateRemainPayment();
		
		//console.log('insurance_total>'+insurance_total+' installment_peroid>'+installment_peroid)
		
	}
	//----------------------------------get_ins_date_work selectType
	function SaveInsuranceOther(){
		//-----set date work
		var ins_date_work = $('#ins_date_work').val();
		
		$('#get_ins_date_work').val(ins_date_work);
		
		var cust_name = $('#cust_name').val();
		var selectType = $('#selectType').val();
		
		if(cust_name==''){
			alert('กรุณาใส่ชื่อผู้เอาประกัน');
			return false;
		}else{
			var form = new FormData($('#insuranceOtherForm')[0]);
			var result='';
			 $.ajax({
				url: '<?php echo base_url('insurance_other/SaveInsuranceOther')?>',
				type: 'POST' ,  
				data: form ,
				success: function (data) {
				
				var obj = JSON.parse(data);	 
				
				if(obj.doDb=='1'){
						 alert('บันทึกข้อมูลเรียบร้อยแล้ว');
						 $('#workID').val(obj.workID)
						 $('#Insurance_otherID').val(obj.Insurance_otherID)
					
						 var new_url="<?php echo base_url('Insurance_other/work_insurance_other_add/')?>"+selectType+"/"+obj.workID+"/"+obj.Insurance_otherID;
						   window.history.pushState("data","Title",new_url);
						 var payment_amount =$('#payment_amount').val();
						   
						 $('#show_insurance_total').html(payment_amount);
						 
						
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

	
	//----------------------------------	
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
				    
					$('#code_id')
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
				   
					$('#agent_id')
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
	
$(document).ready(function(){
		 $(".datepicker").datepicker({
                language:'th-th',
                format:'dd/mm/yyyy',
                autoclose: true
            });
	var workID =  $('#workID').val();
	
	if(workID!='0'){
		listInstallment(workID);
		list_insurance_images_file();
	}
	
 })
</script>