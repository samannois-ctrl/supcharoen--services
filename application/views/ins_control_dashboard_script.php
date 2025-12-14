<script>
	function setContent(monthIndex,monthName){
		var selectYear = $('#selectYear option:selected').val();
		var selectYearName = $('#selectYear option:selected').text();
		$('.listmonth ').removeClass('active');
		$('.tab-pane').removeClass('active');
		$('.month'+monthIndex).addClass('active');
		$('#tab_6_'+monthIndex).addClass('active');
		var monthNumber = parseInt(monthIndex);
		 var thaiMonths = [
        'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน',
        'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'
      	];
		var monthName  = thaiMonths[monthNumber - 1];
		$.post('<?php echo base_url('insurance_car2/get_control_monthly')?>',{ monthIndex:monthIndex,monthName:monthName, selectYear:selectYear,selectYearName:selectYearName  }, function(data){
			// If a DataTable with the same ID exists, destroy it before replacing content to avoid reinitialise error
			if ($.fn.DataTable && $.fn.DataTable.isDataTable('#controlTable')) {
				try {
					$('#controlTable').DataTable().clear().destroy();
				} catch (e) {
					console.warn('Error destroying existing DataTable', e);
				}
			}
			$('#showDataMonth'+monthIndex).empty();
			$('#showDataMonth'+monthIndex).html(data);
		})
	}
	
	$(document).ready(function(){
		var monthIndex = '<?php echo date('m')?>';
		setContent(monthIndex);
	}) 
</script>