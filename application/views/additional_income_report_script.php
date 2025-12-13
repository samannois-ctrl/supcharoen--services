<script>
	
		//-------------------------
		function getCodeList(em){
			const text = em.options[em.selectedIndex].text;
			
			var  select_day_start = $('#select_day_start option:selected').val();	
			var  select_month_start = $('#select_month_start option:selected').val();	
			var  select_day_end = $('#select_day_end option:selected').val();	
			var  select_month_end = $('#select_month_end option:selected').val();	
			var  select_year = $('#select_year option:selected').val();	
			var  select_yearStart = $('#select_yearStart option:selected').val();	
			var  select_year = $('#select_year option:selected').val();	
			var  corp_id = $('#corp_id option:selected').val();	
			var  ins_code_id = $('#ins_code_id option:selected').val();	
			
			
			if(em.value=='x'){
				$('#codeList').empty();
			}else{
				$.post('<?php echo base_url('Report_car/getCodeList')?>', { corp_id : em.value , select_day_start:select_day_start ,select_month_start:select_month_start,select_day_end:select_day_end,select_month_end:select_month_end,select_yearStart:select_yearStart,select_year:select_year },function(data){
				 $('#codeList').empty();
				 $('#codeList').html(data);
				GetCorpIncome();
				 
			 }) 
			}
			
		}
		//-------------------------
	    $(document).ready(function() {
			 $("#checkAll").click(function() {
                $(".InsType").prop("checked", $(this).prop("checked"));
            });

            // ถ้า checkbox ย่อยทั้งหมดถูกเช็คครบ ให้ติ๊ก Check All, ถ้ามีอันใดอันหนึ่งไม่ได้เช็คให้ยกเลิก Check All
            $(".InsType").click(function() {
                if ($(".InsType:checked").length === $(".InsType").length) {
                    $("#checkAll").prop("checked", true);
                } else {
                    $("#checkAll").prop("checked", false);
                }
            });
			
			
			/*$(".xyz").change(function() {
				 	$(".xyz").not(this).prop("checked", false); // Uncheck all except the clicked one
			 	});*/
			$('#codeList').empty();
			
		})
	
	
	
		//-------------------------
		function GetCorpIncome(){
			var  select_day_start = $('#select_day_start option:selected').val();	
			var  select_month_start = $('#select_month_start option:selected').val();	
			var  select_day_end = $('#select_day_end option:selected').val();	
			var  select_month_end = $('#select_month_end option:selected').val();	
			var  select_year = $('#select_year option:selected').val();	
			var  select_yearStart = $('#select_yearStart option:selected').val();	
			var  corp_id = $('#corp_id option:selected').val();	
			//var  ins_code_id = $('#ins_code_id option:selected').val();	

			var  select_day_startTxt = $('#select_day_start option:selected').text();	
			var  select_month_startTxt = $('#select_month_start option:selected').text();	
			var  select_day_endTxt = $('#select_day_end option:selected').text();	
			var  select_month_endTxt = $('#select_month_end option:selected').text();	
			var  select_yearTxt = $('#select_year option:selected').text();			  
			var  select_CorpTxt = $('#corp_id option:selected').text();			  
			//var  ins_code_idTxt = $('#ins_code_id option:selected').text();			  
		    
			var selectedCode = 'selected';
			
		    var select_yearNum = parseInt(select_year);
		    var YearThai = select_yearNum+543;
		    var DateRange = select_day_startTxt+' '+select_month_startTxt+' '+select_yearTxt+' ถึง '+select_day_endTxt+' '+select_month_endTxt+' '+select_yearTxt;
			
			
		  	let selectedInsTypeValues = [];
		
		  	 $(".InsType:checked").each(function () {
				if($(this).val()!='all'){
					selectedInsTypeValues.push($(this).val());
				}
            	
        	});
		  	
		    let workType = [];
		   	$(".workType:checked").each(function () {
            	workType.push($(this).val());
        	});
		  	
		    let selectedCodeValues = [];
			 $(".CodeFromCorp:checked").each(function () {
				if($(this).val()!='all'){
					selectedCodeValues.push($(this).val());
				}
            	
        	});
		
		if(corp_id=='x'){
			    //alert('กรุณาเลือกบริษัท');
			   //return false;
			  var selectedCode = 'all';
			
		  }	
		  
		 if((corp_id!='x')&&(selectedCodeValues.length === 0)){  
			  	  $("#selectCodeTxt").text("กรุณาเลือกอย่างน้อย 1 ตัวเลือก").show();
			  	  $('.selectCodeTxt').addClass('hilightBtWarning');
			  	  $('#showReport').empty();
			     

		  }else  if(selectedInsTypeValues.length === 0){ 
    			  $("#error-message").text("กรุณาเลือกอย่างน้อย 1 ตัวเลือก").show();
			  	  $('#showInsType').addClass('hilightBtWarning');
			      return false;
			      $('#showReport').empty();
          }else if((workType.length === 0)||(workType.length === '')){ 
    			  $("#error-message2").text("กรุณาเลือกอย่างน้อย 1 ตัวเลือก").show();
			      $('#showWorkType').addClass('hilightBtWarning');
			  	  $('#showReport').empty();
			      return false;
		  }else{ //  
			 $('.selectCodeTxt').removeClass('hilightBtWarning');
			 $('#showInsType').removeClass('hilightBtWarning');
			 $('#showWorkType').removeClass('hilightBtWarning'); 
			 $("#error-message").hide();
			 $("#error-message2").hide();
			 $("#selectCodeTxt").empty(); 
			 
			 $.post('<?php echo base_url('Report_car/GetCorpIncomeList')?>', { select_day_start:select_day_start,select_month_start:select_month_start,select_day_end:select_day_end,select_month_end:select_month_end,select_year:select_year, corp_id:corp_id,select_CorpTxt:select_CorpTxt,YearThai:YearThai,selectedCodeValues:selectedCodeValues , insType : selectedInsTypeValues, select_yearStart:select_yearStart, workType:workType , selectedCode:selectedCode },function(data){
				 $('#showReport').empty();
				 $('#showReport').html(data);
				
				 
			 }) 
		  }
		  
			
			
		}

</script>