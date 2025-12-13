<script>
	
	
	//-------------------------


	function DeleteInsurance(cust_name,dataID){
		$('#dataDelete').val(dataID);
		$('#exampleModalCenter').modal('show');
		var remark_delete = $('#remark_delete').val();
		$('#btnDelete').click(function(){
			var remark_delete = $('#remark_delete').val();
			if(remark_delete==''){
				alert('กรุณาใส่เหตุผลในการลบ')
			}else{
				$.post('<?php echo base_url('insurance_car/DeleteInsurance')?>',{ dataID:dataID,data_status:"0", remark_delete:remark_delete },function(data){
							var obj=JSON.parse(data);
							if(obj.doDb=='1'){
								alert('ลบรายการ '+cust_name+' สำเร็จแล้ว');
								$('#remark_delete').val('');
								$('#exampleModalCenter').modal('hide');
								listIns();
							}else{
								alert('ไม่สามารถลบรายการได้')
							}
						 })
			}
				
		})
		
	}
	//-------------------------
	function listIns(){  //	
		//var startDate  = $('#startDate').val();
		//var endDate  = $('#endDate').val();
		var selectMonth  = $('#selectMonth option:selected').val();
		var selectYear  = $('#selectYear option:selected').val();
		var vehicle_regis  = $('#vehicle_regis').val();
		var workType  = $('#workType option:selected').val();
		var payType  = $('#payType option:selected').val();
		var data_status = "1,2";
		$.post('<?php echo base_url('insurance_car/listIns')?>', { selectMonth:selectMonth , selectYear:selectYear , vehicle_regis:vehicle_regis, workType:workType , payType:payType , data_status:data_status },function(data){ 
				$('#showInsList').empty();
				$('#showInsList').html(data);
				
		})
	}
	
	function deleteWork(workID,custName){
		if(confirm('ต้องการลบรายการ '+custName+' ?')){
			$.post('<?php echo base_url('insurance_car/deleteWork')?>', { workID:workID },function(data){
				var obj=JSON.parse(data);
				console.log(data);
				if(obj.delWork=='1'){
					console.log('delete ok');
					showWork()
				}else{
					console.log('cannot delete ');
				}
			})
		}else{
			return false;
		}
	}
	
	

	
 $(document).ready(function(){
	 listIns()
 })	
	
  $(".datepicker").datepicker({
                language:'th-th',
                format:'dd/mm/yyyy',
                autoclose: true
    });
</script>