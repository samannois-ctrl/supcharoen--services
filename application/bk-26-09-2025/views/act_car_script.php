<script>
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
	
	
	function showWork(){
		
		var startDate = $('#startDate').val();
		var endDate  = $('#endDate').val();
		console.log(startDate+' '+endDate)
		$.post('<?php echo base_url('insurance_car/listWork')?>', { startDate:startDate,endDate:endDate},
			  function(data){
			  $('#showData').empty();
			  $('#showData').html(data);
			
		})
	}
	
 $(document).ready(function(){
	 showWork()
 })	
	
  $(".datepicker").datepicker({
                language:'th-th',
                format:'dd/mm/yyyy',
                autoclose: true
    });
</script>