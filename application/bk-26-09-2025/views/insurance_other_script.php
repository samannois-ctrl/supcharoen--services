<script>
		//-------------------------


	function DeleteInsuranceOther(cust_name,dataID,insType){
		$('#dataDelete').val(dataID);
		$('#exampleModalCenter').modal('show');
		var remark_delete = $('#remark_delete').val();
		$('#btnDelete').click(function(){
			var remark_delete = $('#remark_delete').val();
			if(remark_delete==''){
				alert('กรุณาใส่เหตุผลในการลบ')
			}else{
				$.post('<?php echo base_url('Insurance_other/DeleteInsuranceOther')?>',{ dataID:dataID,data_status:"0", remark_delete:remark_delete,insType:insType },function(data){
							var obj=JSON.parse(data);
							if(obj.doDb=='1'){
								alert('ลบรายการ '+cust_name+' สำเร็จแล้ว');
								$('#remark_delete').val('');
								$('#exampleModalCenter').modal('hide');
								var SelectType = '<?php echo $selectType?>';
								listInsOther(SelectType);
							}else{
								alert('ไม่สามารถลบรายการได้')
							}
						 })
			}
				
		})
		
	}
	    //--------------------payType
		function listInsOther(SelectType){
			
			//var startDate = $('#startDate').val()
			//var endDate = $('#endDate').val()
			
			var selectMonth  = $('#selectMonth option:selected').val();
		    var selectYear  = $('#selectYear option:selected').val();
			var data_status = 1;
			var payType = $('#payType option:selected').val()
			$.post('<?php echo base_url('Insurance_other/listInsOther')?>',{ selectMonth:selectMonth,selectYear:selectYear , payType, SelectType:SelectType,data_status:data_status},function(data){
				
				$('#showInsOtherList').empty();
				$('#showInsOtherList').html(data);
			})
		}
	  
	$(document).ready(function(){
		var SelectType = '<?php echo $selectType?>';
		listInsOther(SelectType);
		$(".datepicker").datepicker({
                language:'th-th',
                format:'dd/mm/yyyy',
                autoclose: true
            });
	})
</script>

		 