<script>
		  function setDataID(){
			$('#dataID').val('x');
		}	
	
	
		function SetValue(dataID,codeName,codeStatus){
			$('#conde_name').val(codeName)
			$('#dataID').val(dataID)
			$('#code_status').val(codeStatus)
		}
	
		 function  ChangeStatus(dataID,chageValue){
            $.post('<?php echo base_url('setting/ChangeCodeStatus')?>',{ dataID:dataID,chageValue:chageValue },function(data){
                   // console.log(data);
                   var obj = JSON.parse(data);
                   if(obj.DoUpdate=='1'){
                    alert('แก้ไขสถานะเรียบร้อยแล้ว');
                    //if(chageValue=='1'){
                   //     $('#com_name'+dataID).removeClass('text-danger');
                   // }else if(chageValue=='0'){
                   //     $('#com_name'+dataID).addClass('text-danger');
                   // }
					   
					listCode(); 
					   
                   }

                   // 
                   
            })
        }
	
	
		function AddCode(){

			var conde_name = $('#conde_name').val();
			var dataID = $('#dataID').val();
   		    var code_status = $('#code_status option:selected').val();

			//console.log('code_status>'+code_status)
				if(conde_name==''){

					alert('กรุณาใส่ชื่อโค้ด');

					return false;

				}else if(code_status=='x'){

					alert('กรุณาเลือกการใช้งาน');

					return false;	 				 

				}else{

					$.post('<?php echo base_url('setting/AddCode')?>',{ conde_name:conde_name,code_status:code_status, dataID:dataID },function(data){

						var obj = JSON.parse(data);

						if(obj.DoInsert=='1'){

							$('#conde_name').val('');
							$('#dataID').val('x');
							$('#code_status').val('x');

							listCode();

						}else{

							alert('ไม่สามารถเพิ่มได้');

						}

					})

				}

		}

		function listCode(){
				$.post('<?php echo base_url('setting/listCode')?>',{ },function(data){
					$('#showCode').empty();
					$('#showCode').html(data);
				})
				

		}

      
		$(document).ready(function(){
			listCode();
		})			

	   

</script> 