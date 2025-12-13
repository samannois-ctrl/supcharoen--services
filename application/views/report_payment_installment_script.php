<script>
	function padZero(value) {
		value = parseInt(value, 10);
		if (isNaN(value)) return value; // ถ้าไม่ใช่ตัวเลข คืนค่าเดิม
		return value < 10 ? '0' + value : value.toString();
	}

	function listData(){ 
			//var selectMonth =$('#selectMonth option:selected').val();
			//var selectYear =$('#selectYear option:selected').val();
			var selectMonth ='all';
			var selectYear ='2025';

			var select_day_start =$('#select_day_start option:selected').val();
			var select_month_start =$('#select_month_start option:selected').val();
			var select_year_start =$('#select_year_start option:selected').val();
			var select_day_end =$('#select_day_end option:selected').val();
			var select_month_end =$('#select_month_end option:selected').val();
			var select_year_end =$('#select_year_end option:selected').val();
			var useDuedate = 0;
			var payType =$('#payType option:selected').val();
			//var hideSuccess =1;
		<?php if($permission['psermission']==2){?>
		       var isChecked = document.getElementById("hideSuccess").checked;
				//console.log('isChecked>'+isChecked)
				if (isChecked==true) {
					var hideSuccess =1;
				} else if (isChecked==false) {
					var hideSuccess =0;
				}
			 	var readConfig ="no";
		<?php }else{ ?> 
		         var hideSuccess =$('#hideSuccess').val();
			  	 var readConfig ="yes";
		<?php }?>
			 console.log('select_day_end>'+select_day_end+' hideSuccess>'+hideSuccess)

				var dates = [
					select_day_start,
					select_month_start,
					select_year_start,
					select_day_end,
					select_month_end,
					select_year_end
				];

        
			var hasX = dates.includes('x'); // มีตัวไหนเป็น x บ้าง
			var hasNotX = dates.some(val => val !== 'x'); // มีตัวไหนไม่เป็น x บ้าง
			var allX = dates.every(val => val === 'x');
		
			if(hasX && hasNotX){
		
				alert('กรุณาเลือกวันวันกำหนดชำระให้ครบ');
				return false;
			} else {

				
				if(allX==false){  var useDuedate=1; }
					$.post('<?php echo base_url('report_car/list_overdue')?>',{ selectMonth:selectMonth,selectYear:selectYear,payType:payType,hideSuccess:hideSuccess,readConfig:readConfig,select_day_start:select_day_start,select_month_start:select_month_start,select_year_start:select_year_start,select_day_end:select_day_end,select_month_end:select_month_end,select_year_end:select_year_end,useDuedate:useDuedate},function(data){
				
				$('#showReportOverdue').empty();
				$('#showReportOverdue').html(data);
		})

		}

	}

    // select_day_start select_month_start select_year_start select_day_end select_month_end select_year_end

	$(document).ready(function(){
		listData();
	})
	/*function listData(){
		//selectMonth selectYear payType  option:selected').val();
		var selectMonth =$('#selectMonth option:selected').val();
		var selectYear =$('#selectYear option:selected').val();
		var selectYear =$('#selectYear option:selected').val();
		var payType =$('#payType option:selected').val();
		//var payType =$('#payType option:selected').val();
		<?php //if($permission['psermission']==2){?>
		  var isChecked = document.getElementById("hideSuccess").checked;
			if (isChecked) {
				var hideSuccess =1;
			} else {
				var hideSuccess =0;
			}
			 var readConfig ="no";
		<?php //}else{ ?>
		      var hideSuccess =$('#hideSuccess').val();
			  var readConfig ="yes";
		<?php //}?>
		//var payType =$('#payType').val();
		$.post('<?php //echo base_url('report_car/list_overdue')?>',{ selectMonth:selectMonth,selectYear:selectYear,payType:payType,hideSuccess:hideSuccess,readConfig:readConfig},function(data){
			$('#showReportOverdue').empty();
			$('#showReportOverdue').html(data);
		})
	} */


</script>