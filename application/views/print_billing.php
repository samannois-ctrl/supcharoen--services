<style>
#printAreaOnly {
   /*display : none;*/
   display : none;
    padding: 10px;
	background-color: white
  
}

@media print {
    #printAreaOnly {
       display : block;
		background-color: white
	   
    }
	
	
	
	
}
	.box-subcharoen{
		text-align: center;
		padding: 10px;
		border-style: solid;
		border-width: 2px;<br>
        border-color: blue;
		font-size: 20px;
		color:#004506;
		width: 40%;
		margin: 0 auto;
		 
	}
</style>

<div id="printAreaOnly">
	  <div class="box-subcharoen">
	    ทรัพย์เจริญโบรคเกอร์ประกันภัย <br>
		536 ถ.รัถการ อ.หาดใหญ่ จ.สงขลา <br>
		Tel.097-3245364, 081-2362323
	  </div>
	 <div class="row">
	    <div class="col-6 text-danger" style="text-align: left" >ใบสำคัญจ่าย</div>
	    <div class="col-6 text-primary" style="text-align: right"></div>
	
	  </div>
	  <div class="row">
	    <div class="col-6 text-danger" style="text-align: left" >Payment Voucher</div>
	    <div class="col-6 text-primary" style="text-align: right">วันที่ <?php echo $selectDateName." ".$selectMonthName." ".$selectYearThai;?></div>
	
	  </div>
	 <div class="row">
		<div class="col-12">
		จ่ายให้บริษัท / Pay To <?php echo $companyName?> <span class="text-danger">(<?php echo $agentName?>)</span>
		</div>
	 </div>
	<div class="row">
		<div class="col-12">
			 <table class="table table-bordered" width="100%">
						<thead>
							<tr>
								<td colspan="4">รายการ/Description</td>
								<td width="10%">จำนวนเงิน/Amount</td>
								
							</tr>
						</thead>
						<tbody>
						<?php $n=1; $checkIns=0; foreach($SqlData['resultData'] AS $data){ 
							        if($checkIns!=$data->id){
										$showBtnDelete = '1';
									}else{
										$showBtnDelete = '0';
									}
							?>	
							<?php if($data->insurance_total>0){?>
							<tr>
								<td width="19%"><?php echo $data->insurance_no?> </td>
								<td width="27%"><?php echo $data->cust_name?></td>
								<td width="18%"><?php echo $data->vehicle_regis?>
									<div class="pull-right">
									<span id="boxIns<?php echo $data->id?>" style="display: none"><i class="fa  fa-check-circle-o text-success"></i></span>
									</div>
								</td>
								<td width="16%">
									<?php echo number_format($data->insurane_amount,2)?>								
								</td>
								<td align="right">
									<?php if($n=='1'){ echo number_format($allSum,2);}?>
								</td>
								
							</tr>
							<?php }?>
							<?php if($data->act_price_total>0){?>
							<tr>
								<td width="19%"><?php echo $data->act_no?> </td>
								<td width="27%"><?php echo $data->cust_name?></td>
								<td width="18%"><?php echo $data->vehicle_regis?>
									<div class="pull-right">
									<span id="boxAct<?php echo $data->id?>"  style="display: none"><i class="fa  fa-check-circle-o text-success"></i></span></div>
								</td>
								<td width="16%">
									<?php echo number_format($data->act_amount,2)?>	
								</td>
								<td>&nbsp;</td>
								
							</tr>
							
							<?php }?>
							<?php $n++; $checkIns=$data->id; }?>
							<tr>
							  <td colspan="4" align="right">รวมยอด <?php echo number_format($allSum,2);?></td>
							  <td>&nbsp;</td>
						  </tr>
							<tr>
							  <td colspan="4" align="left"  style="font-size: 14px;">Payment <input type="text" style="width: 100px;height: 30px;">
								เงินสด/Cash &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" style="width: 30px;">
								โอน/ธนาคาร......................................... ลงวันที่/.....................................<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  <input type="text" style="width: 30px;">								   เช็ค/ธนาคาร....................................................
							   หมายเลขเช็ค/No.................................................</td>
							  <td>&nbsp;</td>
						  </tr>
							<tr>
							  <td colspan="4" align="left">
								<div class="row">
								 <div class="col-3">
									จำนวนเงิน<br>
							      The Sum of Bahts
									</div>  
								 <div class="col-9" style="text-align: center"><h3 class="text-primary"><?php echo $thainum?></h3></div>  
								</div>  
								
								
								
								</td>
							  <td>&nbsp;</td>
						  </tr>
							<tr>
							  <td colspan="4" align="left" style="font-size: 14px;">ผุ้รับเงิน/Collector...................................ผู้จ่ายเงิน/Paid byr...................................ผู้บันทึก/Approve By...................................<br>
							    วันที่ /Date...................................... &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วันที่ /Date......................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วันที่ /Date......................................................</td>
							  <td>&nbsp;</td>
						  </tr>
						</tbody>
					
					</table>
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

