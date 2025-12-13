<style>
/*@media print {
  #printOnly {
    display: block;
  }
}*/
</style>

<div style="padding-top: 10px;" id="printAble">
	<!--<div id="printOnly" style="display: none">
	    <h4>ค่าใช้จ่าย วันที่  <?php //echo $txtDate?></h4>
	</div>-->
<table class="table table-bordered" width="100%">
   <tr>
	<th width="10">No.</th>
	<th width="120">วันที่</th>
	<th>รายการ</th>
	<th width="120">จำนวนเงิน</th>
	<!--<th width="50">แก้ไข</th>-->
<?php if($showDelete=='1'){ ?>	   
	<th  width="50">ลบ</th>
<?php }?>
	   
  </tr>
<?php  $n=1; $sumTotal=0; foreach($listExpenses['resultData'] AS $data){ 
				$sumTotal = $sumTotal+$data->expenses_price;
	?>
   <tr>
     <td><?php echo $n?></td>
     <td><?php echo $this->insurance_model->translateDateToThai($data->expenses_date)?></td>
     <td><?php echo $data->expenses_name?></td>
     <td align="right"><?php echo number_format($data->expenses_price,2)?>&nbsp;</td>
     <!--<td><button class="btn btn-circle btn-success"><i class="fa fa-file-text"></i></button></td>-->
     	<!--<th width="50">แก้ไข</th>-->
<?php if($showDelete=='1'){ ?>	
	   <td><button class="btn btn-circle btn-danger" onclick="deleteExpense('<?php echo $data->id?>','<?php echo htmlspecialchars($data->expenses_name)?>')">ลบ</button></td>
  </tr>
  <?php }?> 
<?php $n++; }?>
	<tr>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td align="right">รวม:</td>
     <td align="right"><?php echo number_format($sumTotal,2)?>&nbsp;</td>
     <!--<td>&nbsp;</td>-->
		<!--<th width="50">แก้ไข</th>-->
<?php if($showDelete=='1'){ ?>		
     <td>&nbsp;</td>
  <?php }?> 		
  </tr>
</table>
</div>