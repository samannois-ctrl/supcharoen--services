<style>
#printAreaOnly {
   display : none;
  
}

@media print {
    #printAreaOnly {
       display : block;
	  
    }
	
	
}
</style>

<div id="printAreaOnly">
<div class="printOnly" style="text-align: center; border-bottom: 0px !important">
                                    <p style="font-size: 16px; font-weight: bold">แบบรายงานการตรวจสภาพรถผ่านระบบสารสนเทศ (ระบบใหม่)<br>
                                   		สถานตรวจสภาพรถชื่อ ทรัพย์เจริญเซอร์วิส &emsp;เลขที่ใบอนุญาต สข.002/2549 &emsp;จังหวัด สงขลา<br>
										<?php echo $txtDay?> 
									</p>
</div>
<table width="100%" class=" table-striped table-bordered table-hover table-checkable order-column full-width" id="example4">
	<thead>
		<tr>
			<th valign="top" style="text-align: center">ลำดับ</th>
			<th valign="top" style="text-align: center">หมายเลขทะเบียนรถ</th>
			<th valign="top" nowrap style="text-align: center">ประเภทรถ<br>
			 <small> (รย.1, รย.2, รย.3, รย.12)</small></th>
			<th valign="top" nowrap style="text-align: center">วันที่ตรวจสภาพรถ</th>
			<th valign="top" nowrap style="text-align: center">เวลาที่ตรวจสภาพรถ</th>
		</tr>
	</thead>
	<tbody>	
	<?php $n=1;  foreach($getData['resultData']->result() AS $data){ 
				$checkTimeArray = explode(":",$data->car_check_time);
		?>		
		<tr>
			<td align="center" style="text-align: center"><?php echo $n?></td>
			<td align="center" style="text-align: center"><?php echo $data->vehicle_regis." ".$data->province_name?></td>
			<td align="center" style="text-align: center"><?php echo $data->initials_name?></td>
			<td align="center" style="text-align: center"><?php echo $this->insurance_model->translateDateToThai($data->car_check_date)?></td>
			<td align="center" style="text-align: center"><?php echo $data->car_check_time?>
			</td>
		</tr>
  <?php  $n++;  }?>
	</tbody> 
</table>

	<div class="page-break">&nbsp;</div>
	
</div>
<script>
function printData1(divName)
		{  
		   var divToPrint=document.getElementById(divName);
		   var newWin= window.open("");
			// newWin.print(); 
		   newWin.document.write(buildprintReservePrint(divToPrint.innerHTML));
		   setTimeout(function(){ newWin.print(); 

			newWin.close();
		   }, 1000);
		   //newWin.print();
		   //newWin.close();
		}
	$(document).ready(function(){
		printData1('printAreaOnly')
	})
</script>
