<?php //echo $getData['sql']
//echo $car_type_id;
?>
<div id="printAble">
<?php if($car_type_id!='4'){ ?>	
<table  class="table  table-bordered table-hover table-checkable order-column full-width" id="">
			<thead>
				<tr>
						<th style="text-align: center">ลำดับ</th>
						<th style="text-align: center">ชื่อผู้เอาประกันภัย</th>
						<th style="text-align: center">ทะเบียน</th>
						<th style="text-align: center">บริษัท</th>
						<!--<th style="text-align: center">@วันเริ่มประกัน</th>-->
						<th style="text-align: center">เบี้ยสุทธิ</th>
						<th style="text-align: center">เบี้ยรวม</th>
						<th style="text-align: center">%</th>
						<th style="text-align: center">รับลูกค้า</th>
				</tr>
			</thead>
			<tbody>
				<?php $n=1; $act_price_net_Percent=0;
						$sum_act_price_net = 0;
						$sum_act_price = 0;
						$sum_act_price_total= 0;
						$sum_dedug = 0;
						$sum_dedug2 = 0;
						$deduct_percent = 0;
						$sumPercentAct = 0;
						foreach($getData['resultData'] AS $data){ 
							$dedug = ($data->deduct_percent * $data->act_price_total)/100;

					   if($data->work_overdue==0){	
						$sum_act_price_net =  $sum_act_price_net + $data->act_price_net; 
						$sum_act_price =  $sum_act_price + $data->act_price; 
						$sum_act_price_total =  $sum_act_price_total + $data->act_price_total; 
						$sum_dedug = $sum_dedug+$dedug;
						}	
						$sum_dedug2 = $sum_dedug+$dedug;
						$deduct_percent = $data->deduct_percent;
					?>
					<tr class="odd gradeX">
						<td style="text-align: center"><?php echo $n?></td>

					  <td><?php echo $data->cust_name?><?php if($data->work_overdue=='1'){ echo "<small class='text-danger'> (ค้างชำระ)</small>"; }?></td>
						<td align="center"><?php echo $data->vehicle_regis." ".$data->province_name?> <!--[<?php echo 'carTypeID='.$data->carTypeID?>]--></td>
						<td align="center"><?php echo $data->company_name?></td> 
						<!--<td align="center" style="text-align: center">@<?php echo $this->insurance_model->translateDateToThai($data->act_date_start)?></td>-->
						<td align="right"><?php echo number_format($data->act_price_net,2)?></td>
						<td align="right"><?php echo number_format($data->act_price,2)?></td>
						<td align="right">
							<!--<?php echo 'deduct_percent>'.$data->deduct_percent?>-->
							<?php $percenAct = ($data->act_price_net*$data->deduct_percent)/100;
						         echo $percenAct;
								$sumPercentAct = $sumPercentAct+$percenAct;
							?>
						</td>
						<td align="right"><?php echo number_format($data->act_price_total,2)?></td>
					</tr>
				 <?php $n++; } ?>	
			  <tr>
					  <td height="10"></td>

				<td></td>
					  <td colspan="2"></td>
					  <!--<td>@</td>-->
					  <td align="right"></td>
					  <td colspan="2" align="right"></td>
					  <td align="right"></td>
			  </tr>
			  <tr>
						<td></td>

				<td></td>
						<!--<td>@</td>	-->												
						<td colspan="2" style="border-top: 1px solid #000; border-bottom: double #000"><strong>รวมยอด</strong></td>
						<td align="right" style="border-top: 1px solid #000; border-bottom: double #000; text-align: right"><strong>
						<?php echo number_format($sum_act_price_net,2)?></strong></td>
						<td align="right" style="border-top: 1px solid #000; border-bottom: double #000; text-align: right"><strong><?php echo number_format($sum_act_price,2)?></strong></td>
						<td align="right" style="border-top: 1px solid #000; border-bottom: double #000; text-align: right">
							<?php //echo $sumPercentAct." | ".number_format((ceil($sumPercentAct)),2)
								$sumPercentAct = ceil($sumPercentAct);
							?>&nbsp;</td>
						<td align="right" style="border-top: 1px solid #000; border-bottom: double #000; text-align: right"><strong><?php echo number_format($sum_act_price_total,2)?></strong></td>
			  </tr>
					<tr>
						<td></td>

					  <td></td>
						<!--<td>@</td>		-->											
						<td colspan="2"><strong>%</strong></td>
						<td align="right">&nbsp;</td>
						<td colspan="2" align="right">&nbsp;</td>
						<td align="right"><strong>
							<?php //echo $sum_dedug." | ";//echo number_format($act_price_net_Percent,2)?>
							<?php //$xxx=($sum_act_price_net*$deduct_percent)/100; 
								  //echo number_format((ceil($xxx)),2)
								  echo number_format($sumPercentAct,2);?>
							<?php //echo number_format((ceil($sum_dedug2)),2)?>
						</strong></td>
					</tr>
					<tr>
					  <td></td>

					  <td></td>
					  <!--<td>@</td>-->
					  <td colspan="2"><strong>ส่งโบรคเกอร์</strong></td>
					  <td align="right">&nbsp;</td>
					  <td colspan="2" align="right">&nbsp;</td>
					  <td align="right"><strong><?php  $totalAll = $sum_act_price_total-$sumPercentAct; echo number_format(FLOOR($totalAll),2)?></strong></td>
			  </tr>


			</tbody>
		</table>
<?php }else{ ?>
<style>
	.td_noborder tr td {
		border: none; !important
	}	
</style>
<table  class="table  table-bordered table-hover table-checkable order-column full-width" id="">
			<thead>
				<tr>
						<th style="text-align: center">ลำดับ</th>
						<th style="text-align: center">ชื่อผู้เอาประกันภัย</th>
						<th style="text-align: center">ทะเบียน</th>
						<th style="text-align: center">บริษัท</th>
						<!--<th style="text-align: center">@วันเริ่มประกัน</th>-->
						<th style="text-align: center">เบี้ยสุทธิ</th>
						<th style="text-align: center">เบี้ยรวม</th>
						<th style="text-align: center">รับลูกค้า</th>
				</tr>
			</thead>
			<tbody>
				<?php $n=1; $act_price_net_Percent=0; $sumFive=0;
						$sum_act_price_net = 0;
						$sum_act_price = 0;
						$sum_act_price_total= 0;
						$sum_dedug = 0; $sumtoBroker=0;
						foreach($getData['resultData'] AS $data){ 

							//$data->act_price_net = round($data->act_price_net);
							//$data->act_price =ceil($data->act_price); // ปัดขี้น
							
							$dedug = ($data->deduct_percent * $data->act_price_total)/100;
							$act_price_net_Percent = ($data->deduct_percent * $data->act_price_net)/100;
					
							if($data->work_overdue==0){		
							$sum_act_price_net =  $sum_act_price_net + $data->act_price_net; 
							$sum_act_price =  $sum_act_price + $data->act_price; 

							$sum_act_price_total =  $sum_act_price_total + ($data->act_price_total); 


							$sum_dedug = $sum_dedug+$dedug;
							$sumFive = $sumFive+5;
						 }
							//if($data->work_overdue==0){		
					?>
					<tr class="odd gradeX">
						<td style="text-align: center"><?php echo $n?></td>
						<td><?php echo $data->cust_name?> 
							<?php if($data->work_overdue=='1'){ echo "<small class='text-danger'> (ค้างชำระ)</small>"; }?>
							
						</td>
						<td align="center"><?php echo $data->vehicle_regis." ".$data->province_name?> <!--[<?php echo 'carTypeID='.$data->carTypeID?>]--></td>
						<td align="center"><?php echo $data->company_name?></td> 
						<!--<td align="center" style="text-align: center">@<?php echo $this->insurance_model->translateDateToThai($data->act_date_start)?></td>-->
						<td align="right">
						<?php echo number_format($data->act_price_net,2)?><Br></td>
						<td align="right">
							<?php echo number_format($data->act_price,2);
							
							$toBroker = FLOOR($data->act_price+5); //echo number_format($toBroker,2); 
							if($data->work_overdue==0){
							$sumtoBroker=$sumtoBroker+$toBroker;
							} 
							?>
							
						</td>
						<td align="right"><?php echo number_format($data->act_price_total,2)?></td>
					</tr>
				 <?php $n++; $toBroker=0; } $totalBike = $n-1;  ?>	
			  <tr>
					  <td height="10"></td>
					  <td></td>
					  <td colspan="2"></td>
					  <!--<td>@</td>-->
					  <td align="right"></td>
					  <td align="right"></td>
					  <td align="right"></td>
			  </tr>
			  <tr>
						<td></td>
						<td></td>
						<!--<td>@</td>		-->											
						<td colspan="2" style="border-top: 1px solid #000; border-bottom: double #000"><strong>รวมยอด</strong></td>
						<td style="border-top: 1px solid #000; border-bottom: double #000; text-align: right"><strong><?php echo number_format($sum_act_price_net,2)?></strong></td>
						<td style="border-top: 1px solid #000; border-bottom: double #000; text-align: right"><strong>
							<?php $sum_act_price=ceil($sum_act_price);
								  echo number_format($sum_act_price,2)?></strong></td>
						<td align="right" style="border-top: 1px solid #000; border-bottom: double #000; text-align: right"><strong><?php echo number_format($sum_act_price_total,2)?></strong></td>
			  </tr>
 	 
			</tbody>
  </table>

	<div style="padding-left:40%;">
	   <h3>		บวก 5 บาท X <?php echo $totalBike." คัน <u>".number_format($totalBike*5)."</u> "?><br>
		    ส่งโบรคเกอร์ <u><?php echo number_format((ceil($sum_act_price))+($totalBike*5),2);?></u>
		 </h3>
	</div>

<?php }?>

</div>