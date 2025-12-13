<script>
	function listData(){
		//selectMonth selectYear payType  option:selected').val();
		var selectMonth =$('#selectMonth option:selected').val();
		var selectYear =$('#selectYear option:selected').val();
		var selectYear =$('#selectYear option:selected').val();
		var payType =$('#payType option:selected').val();
		//var payType =$('#payType option:selected').val();
		
		<?php if($permission['psermission']==2){?>
		  var isChecked = document.getElementById("hideSuccess").checked;

			if (isChecked) {
				var hideSuccess =1;
			} else {
				var hideSuccess =0;
			}
			 var readConfig ="no";
		<?php }else{ ?>
		      var hideSuccess =$('#hideSuccess').val();
			  var readConfig ="yes";
		<?php }?>
		
		//var payType =$('#payType').val();
		$.post('<?php echo base_url('report_car/list_overdue')?>',{ selectMonth:selectMonth,selectYear:selectYear,payType:payType,hideSuccess:hideSuccess,readConfig:readConfig},function(data){
			$('#showReportOverdue').empty();
			$('#showReportOverdue').html(data);
			
		})
	}
	
	
	$(document).ready(function(){
		listData();
	})
</script>