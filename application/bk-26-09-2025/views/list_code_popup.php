<?php if($formType=='code'){?>

<div class="row form-group">
	<div class="col-3">เพิ่มโค้ด</div>
	<div class="col-4"><input type="text" id="codeName" name="codeName" class="form-control form-control-sm"></div>
	<div class="col-2"><button type="button" class="btn btn-sm btn-success" onClick="AddCodeFromPopUp()">เพิ่มโค้ด</button></div>
	<div class="col-2"></div>
</div>
<div id="listCodeData">
<table cellpadding="5" cellspacing="0" class="border" width="100%">
	<tr>
		<td>#</td>
		<td width="602">ชื่อโค้ด</td>
		<td width="162">สถานะใช้งาน</td>
	</tr>
	<?php $n=1; foreach($listCode AS $code){?>
	<tr>
	  <td width="17"><?php echo $n?></td>
	  <td><?php echo $code->conde_name?></td>
	  <td>
		 <select class="form-control form-control-sm" onChange="updateCodeStatus('<?php echo $code->id?>',this.value,'<?php echo htmlspecialchars($code->conde_name)?>')">
		 	<option value="0">ยกเลิกใช้งาน</option> 
		 	<option value="1" <?php if($code->code_status=='1'){ echo "selected";}?> >ใช้งาน</option> 
		 </select>	
	  </td>
  </tr>
  <?php $n++; }?>
</table>
</div>
<script>
	function updateCodeStatus(dataID,chageValue,Codename){
		if(confirm('ต้องการยกเลิกใช้งาน '+Codename)){
			 $.post('<?php echo base_url('/setting/ChangeCodeStatus');?>',{ dataID:dataID,chageValue:chageValue },function(data){
                   // console.log(data);
                   var obj = JSON.parse(data);
                   if(obj.DoUpdate=='1'){
                    alert('แก้ไขสถานะเรียบร้อยแล้ว');
                    refreshCodeList();
					
                   }

                   // 
                   
            })
		}else{
			return false;
		}
	}
	//--------------------------------------
	function AddCodeFromPopUp(){
		var codeName = $('#codeName').val();
		if(codeName==''){
			alert('กรุณาใส่ชื่อโค้ด');
		}else{
			var conde_name = $('#codeName').val();
			var dataID = 'x';
   		    var code_status = '1';
			
			$.post('<?php echo base_url('setting/AddCode')?>',{ conde_name:conde_name,code_status:code_status, dataID:dataID },function(data){

						var obj = JSON.parse(data);

						if(obj.DoInsert=='1'){
							$('#codeName').val('');
							refreshCodeList();
							refreshAgentCodePopup('code')
						}else{

							alert('ไม่สามารถเพิ่มได้');

						}

					})
		}
	}
	
	
</script>
<?php }else if($formType=='agent'){?>
	
<div class="row form-group">
	<div class="col-3"><input name="agent_name" type="text" class="form-control" id="agent_name" placeholder="ชื่อตัวแทน"></div>
	<div class="col-3"><input name="telephone" type="text" class="form-control" id="telephoneX" placeholder="โทรศัพท์"></div>
	<div class="col-3"><input name="agent_com" type="text" class="form-control" id="agent_com" placeholder="ค่าคอม(%)" onkeypress="validate(event)"></div>
	<div class="col-3"><input name="agent_tax" type="text" class="form-control" id="agent_tax" placeholder="ภาษี(%)" onkeypress="validate(event)"></div>
</div>
<div class="row form-group" align="center">
	<div class="col-4"></div>
	<div class="col-4"><button type="button" class="btn btn-sm btn-success" onClick="AddAgentFromPopUp()">เพิ่มตัวแทน</button></div>
	<div class="col-4"></div>
	
	
</div>
<div id="listAgentData">
<table cellpadding="5" cellspacing="0" class="border" width="100%">
	<tr>
		<td>#</td>
		<td width="187">ชื่อตัวแทน</td>
		<td width="144">โทรศัพท์</td>
		<td width="137">ค่าคอม(%)</td>
		<td width="135">ภาษี(%)</td>
		<td width="131">สถานะใช้งาน</td>
	</tr>
	<?php $n=1; foreach($listAgent AS $code){?>
	<tr>
	  <td width="17"><?php echo $n?></td>
	  <td><?php echo $code->agent_name?></td>
	  <td><?php echo $code->telephone?></td>
	  <td><?php echo $code->agent_com?></td>
	  <td><?php echo $code->agent_tax?></td>
	  <td>
		 <select class="form-control form-control-sm" onChange="updateAgentStatus('<?php echo $code->id?>',this.value,'<?php echo htmlspecialchars($code->agent_name)?>')">
		 	<option value="0">ยกเลิกใช้งาน</option> 
		 	<option value="1" <?php if($code->agent_status=='1'){ echo "selected";}?> >ใช้งาน</option> 
		 </select>	
	  </td>
  </tr>
  <?php $n++; }?>
</table>
</div>
<script>
	
	function updateAgentStatus(dataID,chageValue,Codename){
		if(confirm('ต้องการยกเลิกใช้งาน '+Codename)){
			 $.post('<?php echo base_url('/setting/updateAgentStatus');?>',{ dataID:dataID,chageValue:chageValue },function(data){
                   // console.log(data);
                   var obj = JSON.parse(data);
                   if(obj.DoUpdate=='1'){
                    alert('แก้ไขสถานะเรียบร้อยแล้ว');
                    reloadAgentList();
					   
                   }

                   // 
                   
            })
		}else{
			return false;
		}
	}
	//--------------------------------------
	function AddAgentFromPopUp(){
		
	   //dataID agent_name telephone agent_status agent_com agent_tax
	   var dataID = 'x';
	   var agent_name = $('#agent_name').val();
	   var telephone = $('#telephoneX').val();
		console.log('telephone>>'+telephone)
	   var agent_status = '1';
	   var agent_com = $('#agent_com').val();
	   var agent_tax = $('#agent_tax').val();
	   
	   if(agent_name==''){
		   alert('กรุณาใส่ชื่อตัวแทน');
		   return false;
	     
	   }else{
		   $.post('<?php echo base_url('setting/AddAgent')?>',{ dataID:dataID, agent_name:agent_name ,telephone:telephone,agent_status:agent_status,agent_com:agent_com,agent_tax:agent_tax },function(data){
			   console.log(data);
			   var obj = JSON.parse(data);
				//-------------------------
				if(obj.DoInsert=='1'){
					$('#agent_name').val('');
					$('#telephone').val('');
					$('#agent_status').val('');
					$('#dataID').val('x');
					reloadAgentList();
					refreshAgentCodePopup('agent');
					
				}else{
					alert('ไม่สามารถเพิ่มข้อมูลได้')
				}
			   
		   }) 
	   }
  
	}
	

	
	//-----------------------------------------------	

	function validate(evt) {

	  var theEvent = evt || window.event;



	  // Handle paste

	  if (theEvent.type === 'paste') {

		  key = event.clipboardData.getData('text/plain');

	  } else {

	  // Handle key press

		  var key = theEvent.keyCode || theEvent.which;

		  key = String.fromCharCode(key);

	  }

	  var regex = /[0-9]|\./;

	  if( !regex.test(key) ) {

		theEvent.returnValue = false;

		if(theEvent.preventDefault) theEvent.preventDefault();

	  }

	}
</script>
<?php } ?>
<script>
		
	function refreshAgentCodePopup(formType){
		// listCodeData listAgentData
		
		$.post('<?php echo base_url('insurance_car2/refreshAgentCodePopup/')?>',{ formType:formType },function(data){
			 if(formType=='code'){
				  $('#listCodeData').empty();
			 	  $('#listCodeData').html(data);
			 }else if(formType=='agent'){
				 $('#listAgentData').empty();
			   $('#listAgentData').html(data);
			 }
			
			
			  
		})
	}
</script>
