<script>
	//----------------------- 							  
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
	//------------------------
	function calculateAct(){
		var act_price = $('#act_price').val();
		var act_discount = $('#act_discount').val();
		var act_tax = $('#act_tax').val();
		var act_vat = $('#act_vat').val();
		var act_price_total = $('#act_price_total').val();
						
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
		//alert(act_price+' '+act_discount); $calVal
     	var calVal = act_price-act_discount;
		var num = calVal.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
		$('#act_price_total').val(num);
		
		$('#act_price_total').autoNumeric('init',{calVal});
         //console.log('calVal->'+calVal);
		//--------calculate Back-----//
		var Result1 = ((act_price * 6.9144)/100).toFixed(2);
		
		var InsTotalNet = act_price-Result1;
		var InsTotalNet = Math.floor(InsTotalNet);
		//console.log(' InsTotalNet toFixed >'+InsTotalNet+' act_price >'+act_price+' Result1>'+Result1);
		var TotalNetValue = InsTotalNet.toFixed(0);
		var TotalNetText = InsTotalNet.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
		
		//console.log(' act_price>'+act_price+'Result1 > '+Result1+' TotalNetValue >'+TotalNetValue);
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
			 console.log(data);
			 var obj = JSON.parse(data); // custID  doDb
			  if(obj.doDb=='1'){
				  $('#custID').val(obj.custID);
				  $('#saveCustName').attr("style", "display:none;");
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
				console.log(data);
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
			 console.log(data);
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
              '<style></style></head>'+
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
		    console.log('workID>>'+workID)
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
	 })
</script>