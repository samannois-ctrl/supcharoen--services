<script>
		
	//-------------------------------
	function listEmp(){
		$.post('<?php echo base_url('setting/listEmp')?>',{ part:"xVpkKasfas3324"} , function(data){
			$('#showData').empty();
			$('#showData').html(data);
			
		})
	}
	//------------------------
	function AddUser(){
		// name_sname user_name telephone_no password user_branch data_status
		var dataID = $('#dataID').val();
		var name_sname = $('#name_sname').val();
		var user_name = $('#user_name').val();
		var telephone_no = $('#telephone_no').val();
		var password = $('#password').val();
		var user_branch = $('#user_branch option:selected').val();
		var data_status = $('#data_status option:selected').val();
		
		if(name_sname==''){
			alert('');
			return false;
		}else if(user_name=='กรุณาใส่ชื่อพนักงาน'){
			alert('กรุณาใส่ Username ');
			return false;	
		}else if((password=='')&&(dataID=='x')){
			alert('กรุณาใส่ Password ');
			return false;	
		}else{
			$.post('<?php echo base_url('setting/AddUser')?>',{ dataID:dataID,name_sname:name_sname,user_name:user_name,telephone_no:telephone_no,password:password,user_branch:user_branch,data_status:data_status },function(data){
				var obj = JSON.parse(data);
				console.log(data)
				if(obj.doUpdate=='1'){
						$('#dataID').val(obj.dataID);
						var new_url="<?php echo base_url('Setting/setting_add_employee')?>"+'/'+obj.dataID;
                               console.log('new_url>'+new_url)
                               window.history.pushState("data","Title",new_url);
                               document.title=name_sname;
					
								$('#showNotice').html('<p align="left" class="text-success">แก้ไขข้อมูลเรียบร้อยแล้ว</p>');
							   setTimeout(function() {
							   $('#showNotice').empty() }, 5500);
					}else{
						 alert('ไม่สามารถเพิ่มได้');

					}

			})
		}
	}
	
	<?php if($page=='listPage'){?>
	  $(document).ready(function(){
		  listEmp();
	  })
	<?php } ?>
</script>