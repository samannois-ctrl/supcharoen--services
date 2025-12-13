<script>
    function setDataID(){
		$('#dataID').val('x');
	}	
	
   function setVal(dataID,agent_name,telephone,agent_com,agent_tax,agent_status){
	   $('#dataID').val(dataID);
	   $('#agent_name').val(agent_name);
	   $('#telephone').val(telephone);
	   $('#agent_status').val(agent_status);
	   $('#agent_com').val(agent_com);
	   $('#agent_tax').val(agent_tax);
   }	
	
   function	AddAgent(){
	   //dataID agent_name telephone agent_status agent_com agent_tax
	   var dataID = $('#dataID').val();
	   var agent_name = $('#agent_name').val();
	   var telephone = $('#telephone').val();
	   var agent_status = $('#agent_status option:selected').val();
	   var agent_com = $('#agent_com').val();
	   var agent_tax = $('#agent_tax').val();
	   
	   if(agent_name==''){
		   alert('กรุณาใส่ชื่อตัวแทน');
		   return false;
	   }else if(agent_status=='x'){
		   alert('กรุณาเลือกการใช้งาน');
		   return false;		   
	   }else{
		   $.post('<?php echo base_url('setting/AddAgent')?>',{ dataID:dataID, agent_name:agent_name ,telephone:telephone,agent_status:agent_status,agent_com:agent_com,agent_tax:agent_tax },function(data){
			   var obj = JSON.parse(data);
				//-------------------------
				if(obj.DoInsert=='1'){
					$('#agent_name').val('');
					$('#telephone').val('');
					$('#agent_status').val('');
					$('#dataID').val('x');
					listAgent();
				}else{
					alert('ไม่สามารถเพิ่มข้อมูลได้')
				}
			   
		   }) 
	   }
   }
	
	function listAgent(){
		$.post('<?php echo base_url('setting/listAgent')?>',{ },function(data){
			$('#listAgent').empty();
			$('#listAgent').html(data);
		})
	}
	
	$(document).ready(function(data){
		listAgent();
	})
</script>  
