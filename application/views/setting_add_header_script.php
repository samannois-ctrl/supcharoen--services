<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>

	//-------------------------------	
	function updateAgent(){
		var header_name = $('#header_name').val();
		var tax_no = $('#tax_no').val();
		var address = $('#address').val();
		var line_id = $('#line_id').val();
		var line_id_qrcode = $('#line_id_qrcode').val();
		var step_stransfer = $('#step_stransfer').val();
		var telephone_no = $('#telephone_no').val();
		var bank_name = $('#bank_name').val();
		var bank_branch = $('#bank_branch').val();
		var bank_acc_name = $('#bank_acc_name').val();
		var bank_acc_number = $('#bank_acc_number').val();
		var bank_qr_code = $('#bank_qr_code').val();
		var data_status = $('#data_status option:selected').val();
		
		if(header_name==''){
			alert('กรุณาใส่ชื่อหัวใบเสร็จ/ใบรับเงิน');
			return false;
		}else if(tax_no==''){
			alert('กรุณาใส่เลขผู้เสียภาษี');
			return false;		
		}else if(address==''){
			alert('กรุณาใส่ที่อยู่');
			return false;			
		}else if(line_id==''){
			alert('กรุณาใส่ Line ID');
			return false;			
		}else if(bank_name==''){
			alert('กรุณาใส่ชื่อธนาคาร');
			return false;	
					
		}else if(bank_branch==''){
			alert('กรุณาใส่สาขาธนาคาร');
			return false;			
		}else if(bank_acc_number==''){
			alert('กรุณาใส่เลขทีบัญชีธนาคาร');
			return false;	
		}else if(bank_acc_name==''){
			alert('กรุณาใส่ชื่อบัญชีธนาคาร');
			return false;	
		}else if(data_status=='x'){
			alert('กรุณาเลือกการใช้งาน');
			return false;	
			
		}else{
			$('.showDataLoader').show();
			var form = new FormData($('#headerRecipe')[0]);
                var result='';
                $.ajax({
                    url: '<?php echo base_url('setting/updateAgent')?>',
                    type: 'POST' ,  
                    data: form ,
                    success: function (data) {
                        
                           var obj = JSON.parse(data);
                            if(obj.doUpdate=='1'){
                             
                              $('#dataID').val(obj.dataID);
                              
                               var new_url="<?php echo base_url('Setting/setting_add_header')?>"+'/'+obj.dataID;
                              
                               window.history.pushState("data","Title",new_url);
                               document.title=header_name;
                               
                           	  // bank_img bank_qr_code oldBankQrCode oldLineQrCode
							  $('#line_id_qrcode').val('');$('#line_img').empty();
							  $('#line_img').html('<img src="<?php echo base_url()?>'+obj.line_id_qrcode+'"  style="width: 100px;height: 100px;" class="img-responsive">');
							  $('#oldLineQrCode').val('');
							  $('#oldLineQrCode').val(obj.line_id_qrcode);
								
							  $('#bank_qr_code').val('');$('#bank_img').empty();
							  $('#bank_img').html('<img src="<?php echo base_url()?>'+obj.bank_qr_code+'"  style="width: 100px;height: 100px;" class="img-responsive">');
							  $('#oldBankQrCode').val('');
							  $('#oldBankQrCode').val(obj.bank_qr_code);
								
							//	bank_img logo_head oldLogo line_id_qrcode
								
							  $('#logo_head').val('');$('#log_img').empty();
							  $('#log_img').html('<img src="<?php echo base_url()?>'+obj.logo_head+'"  style="width: 100px;height: 100px;" class="img-responsive">');
							  $('#oldLogo').val('');	
							  $('#oldLogo').val(obj.logo_head);
								
								
                               $('#showNotice').html('<p align="left" class="text-success">แก้ไขข้อมูลเรียบร้อยแล้ว</p>');
							   setTimeout(function() {
							   $('#showNotice').empty() }, 5500);
							
                        }else{
                             $('#showNotice').html('<p align="left" class="text-danger">ไม่สามารถแก้ไขข้อมูล</p>');
                        }
                    },
                    
                    cache: false,
                    contentType: false,
                    processData: false

                }).always( function(){
				$('.showDataLoader').hide();
			});
            }
		}
	//-------------------------------
	$(document).ready(function(){
		$('.summernote').summernote({
				placeholder: '',
				height: 250,
					toolbar: [
					  ['style', ['style']],
					  ['font', ['bold', 'underline', 'clear']],
					  ['color', ['color']],
					  ['para', ['ul', 'ol', 'paragraph']],
					  ['table', ['table']]
					  ['view', ['fullscreen', 'codeview']]
					]
			  });
	})
</script>