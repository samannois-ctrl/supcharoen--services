<script>
	function listHeader(){
		$.post('<?php echo base_url('setting/listHeader')?>',{ part:"listHeader" },function(data){
			$('#showData').empty();
			$('#showData').html(data);
			
		})
	}
	
	$(document).ready(function(data){
		 listHeader();
	})
</script>