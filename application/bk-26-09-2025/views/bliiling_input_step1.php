<?php //print_r($data['sql'])."<br>"?>
<?php //print_r($data['resultData'])?>
<table class="table table-bordered" width="100%">
	<thead>
		<tr>
			<td colspan="4" align="center">รายการ/Desciption</td>
			<td width="18%">จำนวนเงิน</td>
		</tr>
	</thead>
	<tbody>
	 <?php $n=1; foreach($data['resultData'] AS $data){?>	
		<tr>
			<td width="15%"><?php echo $data->insurance_no?></td>
			<td width="22%"><?php echo $data->cust_name?></td>
			<td width="15%"><?php echo $data->vehicle_regis?></td>
			
			<td width="18%"><input type="text" class="form-control form-control-sm amountInsurance autonumber" onChange="calculateSum()"></td>
			<td><?php if($n=='1'){ ?><div id="divSum" class="divSum"></div><?php }?></td>
		</tr>
	 <?php $n++; } ?>	
		<tr>
		  <td>&nbsp;</td>
		  <td></td>
		  
		  <td>รวมยอด</td>
		  <td><div id="divSum2" class="divSum"></div></td>
		  <td></td>
	  </tr>		
	</tbody>

</table>
<div align="center">
		<button type="button" class="btn btn-success btn-sm" onClick="saveBilling()">บันทึกข้อมูล</button>
	    &nbsp;
		<button id="BtnPrintBill" type="button" class="btn btn-info btn-sm" onClick="printBilling()" disabled>พิมพ์</button>
</div>
<div style="height: 50px;">&nbsp;</div>
<div id="showBillPrint"></div>
<script>

</script>