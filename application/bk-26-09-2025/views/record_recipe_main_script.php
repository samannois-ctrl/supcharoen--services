<script>
      function updateCheck(iam,mainID){

        var upateVale ='0';

            if(iam.checked==true){
                var upateVale ='1';
            }

             $.post('<?php echo base_url('Record_recipe/updateCheckPayment')?>',{ upateVale:upateVale, mainID:mainID  },function(data){
				 var obj = JSON.parse(data);
                 console.log(data);
                 if(obj.pass=='1'){
                    console.log(obj.pass);
                    if(upateVale==0){
                         $('#btn'+mainID).removeClass('btn-success');
                         $('#btn'+mainID).addClass('btn-danger');
                    }else{
                          $('#btn'+mainID).removeClass('btn-danger');
                          $('#btn'+mainID).addClass('btn-success');   
                    }
                 }else{
                    alert('ไม่สามารถแก้ไขข้อมูลได้');
                    return false;
                 }
			 })
      }

     //---------------------------selectMonthEnd
		function getRecieveList(selectedValues){
			 //var bank_id = $('#bank_id option:selected').val();
			 var selectDay = $('#selectDay option:selected').val();
			 var selectDayEnd = $('#selectDayEnd option:selected').val();
			 var selectMonth = $('#selectMonth option:selected').val();
			 var selectMonthEnd  = $('#selectMonthEnd option:selected').val();
			 var selectYear = $('#selectYear option:selected').val();
			 var selectYearEnd = $('#selectYearEnd option:selected').val();
			 var selectedLabels = [];
            var selectedValues = []; 
            $('.option-checkbox:checked').each(function() {
                selectedLabels.push($(this).next('label').text());
                selectedValues.push($(this).val()); 
            });
			//console.log('selectedValues>'+selectedValues);
			 if (selectedValues.length === 0) { 
				  alert('กรุณาเลือกธนาคารอย่างน้อย 1 ธนาคาร');
				 return false;
			 }else{
			 }
			 $.post('<?php echo base_url('Record_recipe/getRecieveList')?>',{ bank_id:selectedValues, selectDay:selectDay , selectDayEnd:selectDayEnd , selectMonth:selectMonth, selectMonthEnd:selectMonthEnd , selectDayEnd:selectDayEnd, selectYear:selectYear , selectYearEnd:selectYearEnd },function(data){
				  $('#reportArea').empty();
				  $('#reportArea').html(data);
			 })
		}
	  //----------------------------
	 function getSelectValue(selectedValuesArray) {
            console.log("ค่าที่ถูกเลือก (จาก getSelectValue):", selectedValuesArray);
            //$('#displayArray').text(selectedValuesArray.join(', '));
        }
        function updateHeaderAndSendValues() {
            let selectedLabels = [];
            let selectedValues = []; 
            var no =1;
            $('.option-checkbox:checked').each(function() {
                selectedLabels.push($(this).next('label').text());
                selectedValues.push($(this).val()); 
            });
            if (selectedLabels.length > 0) {
                //$('#showBankSelect').text(selectedLabels.join(',  '));
            } else {
                $('#selectedHeaderText').text('เลือกธนาคาร');
            }
			//getRecieveList(selectedValues);
        }
	  //----------------------------	
		  $(document).ready(function(){
            $('#selectAllCheckbox').prop('checked', true); 
            $('.option-checkbox').prop('checked', true);  
            updateHeaderAndSendValues(); 
            $('.custom-select-header').on('click', function() {
                $('.custom-select-options').toggle();
            });
            $(document).on('click', function(event) {
                if (!$(event.target).closest('.custom-select-container').length) {
                    $('.custom-select-options').hide();
                }
            });
            $('#selectAllCheckbox').on('change', function() {
                const isChecked = $(this).is(':checked');
                $('.option-checkbox').prop('checked', isChecked);
                updateHeaderAndSendValues(); 
            });
            $('.option-checkbox').on('change', function() {
                const allChecked = $('.option-checkbox:checked').length === $('.option-checkbox').length;
                $('#selectAllCheckbox').prop('checked', allChecked);
                updateHeaderAndSendValues(); 
            });
			//getRecieveList();
        });
</script>