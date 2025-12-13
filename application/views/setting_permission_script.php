<script>
	function setPermission(field,theVal,uerID,nrow){
		$.post('<?php echo base_url('setting/onoffMenu')?>',{ field:field,theVal:theVal,uerID:uerID },function(data){
			var obj = JSON.parse(data);
			//console.log(data);
			if(obj.doUpdate=='1'){
				$('#showNoti'+nrow).empty();
				$('#showNoti'+nrow).addClass('text-success');
				$('#showNoti'+nrow).html('<small>&nbsp;&nbsp;แก้ไขข้อมูลเรียบร้อยแล้ว</small>');

				setTimeout(function(){ $('#showNoti'+nrow).empty(); }, 5000);
				
			}else{
				alert('ไม่สามารถแก้ไขข้อมูลได้');
			}
		})
	}
	
</script>