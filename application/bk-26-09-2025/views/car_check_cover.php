<style>
.border-cover {
  width: 50%;
  height: 421px;
  padding: 10px;
}
.main-cover {
    background-color: white;
  width: 100%;
  height: 100%;
  border-style: solid;
  border-width: 3px;
  border-color: black;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  align-items: center; /* Center horizontally */
  padding-top: 10px;
  padding-left: 10px;
  padding-right: 10px;
}

.title-cover {
  border-style: solid;
  border-width: 1px;
  border-color: black;
  min-height: 10em;
  width: 98%;
  align-self: flex-start;
  align-content: center;
	min-height: 2em;
}


</style> 

<?php foreach($getResultData['resultData'] AS $data);?>

<div id="printAreaOnly">
<div class="border-cover">
	<div class="main-cover">
		<div class="title-cover">
			<div align="center">ตรอ. ทรัพย์เจริญเซอร์วิส (แยกโรงปูน)<br>
				จันทร์-เสาร์ 08.00-16.30 น.<br>
				โทร 074-244952 / 094-3566924
			</div>
		
		</div>	
		
		
		
<div>
	<table border="0">
		<tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>
		<tr>
			<td>ทะเบียนรถ <span class="text-primary bold">&nbsp;&nbsp;<?php echo $data->vehicle_regis." ".$data->province_name?></span></td>
			<td><input type="checkbox" <?php if($data->registration_book=='0'){ echo "checked";}?>  > ไม่มีเล่ม </td>
		</tr>
		<tr>
			<td>ค่าตรวจสภาพ&nbsp;&nbsp;&nbsp;<span class="text-primary bold"><?php echo  number_format($data->car_check_total,2); ?></span></td>
			<td>บาท</td>
		</tr>
		<tr>
			<td>ค่าทะเบียน&nbsp;&nbsp;&nbsp;<span class="text-primary bold"><?php echo  number_format($data->tax_price,2); ?></span></td>
			<td>บาท</td>
		</tr>
		<tr>
			<td>ค่าพรบ.&nbsp;&nbsp;&nbsp;<span class="text-primary bold"><?php echo  number_format($data->act_price_total,2); ?></span></td>
			<td>บาท</td>
		</tr>	
		<tr>
			<td>ค่าบริการ&nbsp;&nbsp;&nbsp;<span class="text-primary bold"><?php echo  number_format($data->tax_service,2); ?></span></td>
			<td>บาท</td>
		</tr>
		<tr>
		  <td height="15" colspan="2"></td>
		  </tr>
		<tr>
		  <td colspan="2">
			  <input type="checkbox"> รับพรบ.แล้ว
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  <input type="checkbox"> ยังไม่รับพรบ.
			
			</td>
		  </tr>
		<tr>
		  <td height="15" colspan="2"></td>
		  </tr>
		<tr>
		  <td colspan="2">รวม &nbsp;&nbsp;<span class="text-primary bold"><?php echo  number_format($data->total_work_price,2); ?></span>&nbsp;&nbsp;บาท&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  <?php
			  		// remain payment
			        //  total_work_price pay_cash , b.pay_transfer, b.pay_transfer2
			    $remain = $data->total_work_price - ($data->pay_cash+$data->pay_transfer+$data->pay_transfer2);
			    
			  ?>
			  คงค้าง &nbsp;&nbsp;<span class="text-primary bold"><?php echo  number_format($remain,2); ?></span>&nbsp;&nbsp;  บาท</td>
		  </tr>
		<tr>
		  <td colspan="2">รับสมุดวันที่.............................เวลา.............น.</td>
		  </tr>
		<tr>
		  <td height="15" colspan="2"></td>
		  </tr>
		<tr>
		  <td colspan="2">ลงชื่อ.............................................................</td>
		  </tr>
		<tr>
		  <td height="15" colspan="2"></td>
		  </tr>
		<tr>
		  <td colspan="2" align="center"><strong>*กรุณานำใบนี้ มารับเล่มทะเบียนรถ ค่ะ*</strong></td>
		  </tr>	
	</table>
		
		 <br>
		
		
		
	  </div>
	</div>
</div>
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