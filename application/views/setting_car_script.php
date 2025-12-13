<script>
  
	
	function LoadCarBrand(dataStatus){
		$.post('<?php echo base_url('setting/listCarBrandInsurance')?>',{dataStatus:dataStatus },function(data){
			$('#showBrand').empty();
			$('#showBrand').html(data);
			
		})
	}
	
	$(document).ready(function(){
		LoadCarBrand('all');
	})
</script>