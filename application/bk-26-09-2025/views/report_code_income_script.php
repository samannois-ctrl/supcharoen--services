<script>
	$(function() {
	  $('#btn-income').on('click', function() {
		$('#divIncome').toggle();
		$('#BtPlus').toggle();
		$('#BtMinus').toggle();

		// Check toggle status
		/*if ($('#divIncome').is(':visible')) {
		   console.log('divIncome is visible');
		} else {
		  console.log('divIncome is hidden');
		}*/
		$('#cust_name').val(''); 
		$('#income_total_net').val('');  
		$('#insurance_corp_id').val('x');  
		SetTempSelect();
	  });
	});
	//-------------------------------
	  function removeOtherIncome(dataID,totals){
		  if(confirm('ต้องการลบรายการ '+totals+' ?')){
			  $.post('<?php echo base_url('report_car/removeOtherIncome')?>',{  dataID:dataID },function(data){
			  		var obj = JSON.parse(data);
				    console.log(data);
				  	if(obj.DoDb=='1'){
						 var company_id = $('#company_id').val();
						 GetCodeIncomeDetail(company_id);
					}
			  })
		  }else{
			  return false;
		  }
		  
	  }
	//------------------------------- btn-income
	  function SetTempSelect(){
			var  select_day_start = $('#select_day_start option:selected').val();	
			var  select_month_start = $('#select_month_start option:selected').val();	
			var  select_day_end = $('#select_day_end option:selected').val();	
			var  select_month_end = $('#select_month_end option:selected').val();	
			var  select_year = $('#select_year option:selected').val();	

			var  select_day_startTxt = $('#select_day_start option:selected').text();	
			var  select_month_startTxt = $('#select_month_start option:selected').text();	
			var  select_day_endTxt = $('#select_day_end option:selected').text();	
			var  select_month_endTxt = $('#select_month_end option:selected').text();	
			var  select_yearTxt = $('#select_year option:selected').text();			  
		    
		    var select_yearNum = parseInt(select_year);
		    var YearThia = select_yearNum+543;
		    var DateRange = select_day_startTxt+' '+select_month_startTxt+' '+select_yearTxt+' ถึง '+select_day_endTxt+' '+select_month_endTxt+' '+select_yearTxt;
		  	
		    $('#protect_date_div').html(DateRange);
		  	
	 }
	//------------------------------- 
	function setcodeName(divName,SelectValueX){
		var  selectValue = $('#ins_code_id option:selected').val();
		var  selectText = $('#ins_code_id option:selected').text();
		//
		if(selectValue!='x'){
			$('#'+divName).html(selectText);
		}else{
			$('#'+divName).html('');
		}
		
	}	 
	//------------------------------- select_year_protect
	function addCodeIncome(){
		var currentPage = $('#currentPage').val();
		var cust_name = $('#cust_name').val();
		var income_total_net = $('#income_total_net').val();
		var insurance_corp_id = $('#insurance_corp_id option:selected').val();
		var ins_code_id = $('#ins_code_id option:selected').val();
		
		var select_day_protect = $('#select_day_start option:selected').val();
		var select_month_protect = $('#select_month_start option:selected').val();
		var select_day_end = $('#select_day_end option:selected').val();	
		var select_month_end = $('#select_month_end option:selected').val();			
		var select_year_protect = $('#select_year option:selected').val();
		
		
		if(currentPage==''){
			var currentPage = 'incomePage';
		}
		//if(cust_name==''){
		//	alert('กรุณาใส่ชื่อลูกค้า');
		//	return false;
		//}else 
		if(insurance_corp_id=='x'){
			alert('กรุณาเลือกบริษัท');
			return false;
		}else if(ins_code_id=='x'){
			alert('กรุณาเลือกโค้ด');
			return false;
		}else if(income_total_net==''){ 
			alert('กรุณาใส่เบี้ยเบี้ยสุทธิ');
			return false;
		}else{
			
			 $.post('<?php echo base_url('report_car/addCodeIncome')?>',{ cust_name:cust_name,income_total_net:income_total_net,insurance_corp_id:insurance_corp_id,ins_code_id:ins_code_id, select_day_protect:select_day_protect,select_month_protect:select_month_protect,select_year_protect:select_year_protect, select_day_end:select_day_end,select_month_end:select_month_end,select_year_protect:select_year_protect } , function(data){
				 	var obj = JSON.parse(data);
				 	if(obj.addIncome=='1'){
						 
						 $('#showResultAdd').html('เพิ่มข้อมูลสำเร็จแล้ว');
						 $('#cust_name').val(''); 
						 $('#income_total_net').val('');  
						 //$('#insurance_corp_id').val('x');  
						 setTimeout(function(){ $('#showResultAdd').empty(); }, 5000);
						
						 if(currentPage=='incomePage'){
							 GetCodeIncome();
						 }else if(currentPage=='incomePageDetail'){
							 GetCodeIncomeDetail(insurance_corp_id)
						 }
					}else{
						alert('ไม่สามารถเพิ่มข้อมูลได้');
					}
			 })
		}
	}
	//-------------------------------select_year_protect
	function GetCodeIncomeDetail(code_id,company_id){
		 var  select_day_start = $('#select_day_start option:selected').val();		
		 var  select_month_start = $('#select_month_start option:selected').val();		
		 var  select_day_end = $('#select_day_end option:selected').val();		
		 var  select_month_end = $('#select_month_end option:selected').val();		
		 var  select_year = $('#select_year option:selected').val();	
		 var  ins_code_id = $('#ins_code_id option:selected').val();	
		 var  ins_code_id_text = $('#ins_code_id option:selected').text();	
		
		//if(ins_code_id=='x'){
		//	alert('กรุณาเลือกโค้ด');
		//	return false;
		//}else{
			
			 $.post('<?php echo base_url('report_car/GetCodeIncomeDetail')?>',{ select_day_start:select_day_start,select_month_start:select_month_start,select_day_end:select_day_end,select_year:select_year,select_month_end:select_month_end , ins_code_id:ins_code_id ,ins_code_id_text:ins_code_id_text, company_id:company_id , code_id:code_id },function(data){
			  $('#showReport').empty();
			  $('#showReport').html(data);
			  $('#currentPage').val('incomePageDetail');
		 })
		//}
		
	}
	
	//----------------------------------
	function backToMain(){
		$('#currentPage').val('Mainpage');
		$("#ins_code_id option[value='x']").prop("selected", true);
		
		GetCodeIncome();
	}
	//----------------------------------
	function ShowCorpIncode(code_id,currentPage){
		$('#currentPage').val(currentPage);
		$('#ins_code_id option[value='+code_id+']').prop("selected", true);
		GetCodeIncome();
		
	}
	//----------------------------------
	function GetCodeIncome(){
		 var  select_day_start = $('#select_day_start option:selected').val();		
		 var  select_month_start = $('#select_month_start option:selected').val();		
		 var  select_day_end = $('#select_day_end option:selected').val();		
		 var  select_month_end = $('#select_month_end option:selected').val();		
		 var  select_year = $('#select_year option:selected').val();	
		 var  ins_code_id = $('#ins_code_id option:selected').val();	
		 var  ins_code_id_text = $('#ins_code_id option:selected').text();	
		 var  reportType ='code'; //corp
		 var  currentPage =$('#currentPage').val(); //corp
		
		//if(ins_code_id=='x'){
		//	alert('กรุณาเลือกโค้ด');
		//	return false;
		//}else{
			 $.post('<?php echo base_url('report_car/GetCodeIncome')?>',{ select_day_start:select_day_start,select_month_start:select_month_start,select_day_end:select_day_end,select_year:select_year,select_month_end:select_month_end , ins_code_id:ins_code_id ,ins_code_id_text:ins_code_id_text , reportType:reportType , currentPage:currentPage},function(data){
			  $('#showReport').empty();
			  $('#showReport').html(data);
			  //$('#currentPage').val('incomePage');
			  
		 })
		//}
		
	}
	
  	//--------------------
	// select_day_start select_month_start select_day_end select_month_end select_year codeID
	function GetCodeDetail(){ 
		 //var  codeID = $('#codeID').val();		
		 //var  dateStart = $('#dateStart').val();		
		 //var  dateEnd = $('#dateEnd').val();
		
		  var  dateStart = $('#select_year option:selected').val()+'-'+$('#select_month_start option:selected').val()+'-'+$('#select_day_start option:selected').val();	
		  var  dateEnd = $('#select_year option:selected').val()+'-'+$('#select_month_end option:selected').val()+'-'+$('#select_day_end option:selected').val();	
		
		 var  codeID = $('#codeID option:selected').val();	
		 
		 
		if(codeID=='x'){
			alert('กรุณาเลือกโค้ด');
		}else{
			$.post('<?php echo base_url('report_car/report_code_detailX')?>',{ codeID:codeID,dateStart:dateStart,dateEnd:dateEnd  },function(data){
			  $('#showReport').empty();
			  $('#showReport').html(data);
		 })
		}
		 
	}
	
	
	$(document).ready(function(){
		<?php if($isMainPage=='1'){?>
			GetCodeIncome();
		<?php }else if($isMainPage=='0'){?>
			//GetCodeDetail()
		<?php }?>
	})
	
</script> 