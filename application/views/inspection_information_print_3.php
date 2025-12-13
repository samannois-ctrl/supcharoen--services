<style>
#printAreaOnly {
   /*display : none;*/
   display : block;
  
}

@media print {
    #printAreaOnly {
       display : block;
	  
    }
	
	
}
</style>

<div id="printAreaOnly">
<?php $countBike=0;
	//echo $getData['sql1']; 
	//echo $getData['sql5']; 
	//echo '<br>'.$getData['sql5.1']; 
	//print_r($getData['resultCarCheck']);; //echo $getData['sql5']
		//print_r($getData['resultCarCheckFree']);
	?>
<div id="printME" style="text-align: center">
	<div class="" style="text-align: center; border-bottom: 0px !important">
          <p style="font-size: 16px; font-weight: bold">ใบส่งเงิน ตรอ 
										<?php echo $txtDay?> 
		  </p>
</div>
<table  style="width: 98%" align="center">
	<tr>
		<td width="17%" colspan="2" align="left" nowrap="nowrap">1.ค่าตรวจ ตรอ.</td>
		<td width="10%" align="center">&nbsp;</td>
		<td width="6%">&nbsp;</td>
		<td width="12%">&nbsp;</td>
		<td width="8%">&nbsp;</td>
		<td width="9%">&nbsp;</td>
		<td width="19%">&nbsp;</td>
		<td width="11%">&nbsp;</td>
		<td width="8%">&nbsp;</td>
	</tr>
	<?php $sumCarcheckTotal=0; foreach($getData['resultCarCheck'] AS $car){ 
			if($car->car_type_group=='1'){
				$txtCar = 'รถยนต์';
			}else{
				$txtCar = 'จักรยานยนต์';
				$countBike = $car->countN;
			}
	?>
	<tr>
		<td align="left" nowrap="nowrap" style="padding-left: 20px;"><?php echo $txtCar?></td>
		<td nowrap="nowrap" style="padding-left: 20px;"><?php echo number_format($car->car_check_price,0)?> บาท</td>
		<td align="center"> <?php echo $car->countN?> </td>
		<td align="center">คัน</td>
		<td align="center">รวม</td>
		<td align="right"> <?php echo number_format($car->totalCarCheckPrice,2);?></td>
		<td align="center">บาท</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<?php $sumCarcheckTotal =$sumCarcheckTotal+$car->totalCarCheckPrice; }?>
	<?php /*foreach($getData['resultBikeCheck'] AS $bike){?>
	<tr>
		<td nowrap="nowrap" style="padding-left: 20px;">รถ จยย. <?php echo number_format($bike->car_check_price,0)?> บาท </td>
		<td align="center"> <?php echo $bike->countN?> </td>
		<td align="center">คัน</td>
		<td align="center">รวม</td>
		<td align="right"> <?php echo number_format($bike->totalCarCheckPrice,2)?></td>
		<td align="center">บาท</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<?php  $sumCarcheckTotal =$sumCarcheckTotal+$bike->totalCarCheckPrice; }*/?>
	<tr>
	  <td colspan="2" nowrap="nowrap" style="height: 15px;"></td>
	  <td align="center"></td>
	  <td align="center"></td>
	  <td></td>
	  <td align="right"></td>
	  <td></td>
	  <td></td>
	  <td></td>
	  <td></td>
    </tr>
	<?php  $txtFree=''; foreach($getData['resultCarCheckFree'] AS $freeCancel){
			if($freeCancel->car_type_group=='1'){
				$txtFree = 'รถยนต์พรี/ยกเลิก';
			}else if($freeCancel->car_type_group=='2'){
				$txtFree = 'จยย. พรี/ยกเลิก';
			}
	//if(($freeCancel->count_free_cancel > 0)||($freeCancel->count_check_pass>0)){
	?>
	<tr>
	  <td colspan="2" nowrap="nowrap" style="padding-left: 20px;"><?php echo $txtFree;?></td>
	  <td align="center"><?php echo $freeCancel->count_free_cancel?></td>
	  <td align="center">คัน</td>
	  <td align="center">ไม่ผ่าน</td>
	  <td align="right"><?php echo $freeCancel->count_check_pass?></td>
	  <td align="center">คัน</td>
	  <td>&nbsp;</td>
	  <td align="right">&nbsp;</td>
	  <td>&nbsp;</td>
    </tr>
	<?php } //}?>
	<tr>
	  <td colspan="2" nowrap="nowrap" style="padding-left: 20px;">&nbsp;</td>
	  <td align="center">&nbsp;</td>
	  <td align="center">&nbsp;</td>
	  <td align="center">&nbsp;</td>
	  <td align="right">&nbsp;</td>
	  <td>&nbsp;</td>
	  <td align="right">รวมรับค่าตรวจ</td>
	  <td align="right"><?php echo number_format($sumCarcheckTotal,2)?></td>
	  <td align="center">บาท</td>
    </tr>
	<tr>
	  <td colspan="2" align="left" nowrap="nowrap" style="padding-left: 20px;">รวมค่าภาษีทั้งหมด</td>
	  <td align="center"><?php echo number_format($getData['totalTaxAll'],2)?></td>
	  <td align="center">บาท</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td align="center">&nbsp;</td>
    </tr>
	<tr>
	  <td colspan="2" align="left" nowrap="nowrap" >2. ค่าบริการต่อภาษี <!--[<?php echo $getData['countRenewTax']?>คัน]--></td> 
	  <td align="center"><?php echo number_format($getData['totalTaxRecieve'],2)?></td>
	  <td align="center">บาท</td>
	  <td align="center">หัก</td>
	  <td><?php echo number_format($getData['countRenewTax']*20,2)?>
		<br>(<?php echo $getData['countRenewTax']." คัน X 20"?>)
		</td>
	  <td align="center">บาท</td>
	  <td align="right">เหลือรับค่าบริการฝาก</td>
	  <td align="right">
		  <?php //echo number_format(($getData['totalTaxRecieve']-$getData['totalTaxService']),2);
		  $serviceTax = ($getData['totalTaxRecieve']-($getData['countRenewTax']*20)); 
		  echo number_format($serviceTax,2);
		  
		  //$serviceTotal = $getData['totalTaxRecieve']-$getData['totalTaxService'];
		  ?></td>
	  <td align="center">บาท</td>
    </tr>
	<tr>
	  <td height="19" colspan="2" nowrap="nowrap" style="height: 15px;"></td>
	  <td align="center"></td>
	  <td align="center"></td>
	  <td></td>
	  <td align="right"></td>
	  <td></td>
	  <td></td>
	  <td></td>
	  <td></td>
    </tr>
	<tr>
	  <td colspan="2" align="left" nowrap="nowrap">3. ค่าพรบ. </td>
	  <td align="center">&nbsp;</td>
	  <td align="center">&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td align="right">&nbsp;</td>
	  <td align="right">&nbsp;</td>
	  <td align="center">&nbsp;</td>
    </tr>
	<?php $actTotal = 0; $sumActTtoal =0; foreach($getData['resultAct'] AS $act){ 
			if($act->car_type_group=='1'){
				$txtAct = "รถยนต์ รับ";
				$txtAct2 = "รับสุทธิ พรบ. รถยนต์";
			}else if($act->car_type_group=='2'){
				$txtAct = "รถจยย. รับ";
				$txtAct2 = "รับสุทธิ พรบ. จยย.";
			}else{
				$txtAct = "ไม่ระบุประเภทรถ";
				$txtAct2 = "รับสุทธิ พรบ. ไม่ระบุประเภท";
			}
	//$actTotal = $actTotal+($act->act_price_total-$act->deduct_total);
	?>
	<tr>
		<td colspan="2" nowrap="nowrap" style="padding-left: 20px;"><?php echo $txtAct?> <!--[car_type_group:<?php echo $act->car_type_group?>]--></td>
		<td align="center"><?php echo number_format($act->act_total,2)?></td>
		<td align="center">บาท</td>
		<td align="center">หัก ส่ง</td>
		<td align="right">
			<?php //echo number_format($act->dedugPrice,2);
				if($act->car_type_group=='1'){ 
					$carDedug = FLOOR($act->dedugPrice);
					echo number_format($carDedug,2);
				}else if($act->car_type_group=='2'){
					$addActPrice = $getData['countBikeAct']*5;
					//$totalBikeDedug = ($act->dedugPrice)+$addActPrice;
					//echo number_format($totalBikeDedug,2)."<br>";
					//echo "countBikeAct>".$getData['countBikeAct']."<br>";
					//echo "dedugPrice>".$act->dedugPrice."<br>";
					//echo "ceil_dedugPrice>". ceil($act->dedugPrice)."<br>";
					//$totalBikeDedug = ceil($act->dedugPrice)+$addActPrice;
					$totalBikeDedug = ($act->dedugPrice)+$addActPrice;
					echo number_format($totalBikeDedug,2);
				}
			
			?>
		<?php /*if($act->car_type_group=='1'){ $totalDedug = $act->act_price_total-($act->act_price_total*$act->deduct_total)/100; 			echo number_format($totalDedug,2); }else{
					echo number_format($bike->countN*$act->act_price_total2,2);
		
				} */?>
		</td>
	  <td align="center">บาท</td>
		<td align="right" nowrap="nowrap"><?php echo $txtAct2?> </td>
		<td align="right"><?php //echo $act->act_total." ".$act->dedugPrice?>
				<?php if($act->car_type_group=='1'){
						$actTotal = $act->act_total-$carDedug;
						//$actTotal = $act->reciveAct;
					    $sumActTtoal = $sumActTtoal+$actTotal;
					    echo number_format($actTotal,2);
					}else if($act->car_type_group=='2'){
						
						//echo number_format(($countBike * 20),2);
					    // $actRecive = $act->act_total - $act->dedugPrice;
					     $actRecive = $act->act_total - $totalBikeDedug;
						echo number_format(($actRecive),2);
						$sumActTtoal = $sumActTtoal+$actRecive;
					}
					  
					/*if($act->car_type_group=='1'){ 
							$totalRecieve =($act->act_price_total*24)/100; echo number_format($totalRecieve,2); 
							$actTotal = $actTotal+$totalRecieve;
						}else{
							echo number_format($bike->countN*20,2); $totalRecieve=$totalRecieve+($bike->countN*20); 
							$actTotal = $actTotal +($bike->countN*20);
						}*/
			
				?>
			<?php //echo number_format(($act->act_price_total-$act->deduct_total),2)?>
		
		</td>
		<td align="center">บาท</td>
	</tr>	
	<?php $actTotal=0; }  ?>
	
	<tr>
	  <td colspan="2" nowrap="nowrap" style="height: 15px;"></td>
	  <td align="center"></td>
	  <td></td>
	  <td></td>
	  <td align="right"></td>
	  <td></td>
	  <td align="right"></td>
	  <td></td>
	  <td></td>
   </tr>
		<tr>
	  <td colspan="2" align="left" nowrap="nowrap" >4. รับอื่นๆ.</td>
	  <td align="center"><?php echo number_format($getData['sumOther'])?></td>
	  <td align="center">บาท</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td align="right">&nbsp;</td>
	  <td align="right">&nbsp;</td>
	  <td align="center">&nbsp;</td>
    </tr>
	<tr>
	  <td colspan="2" nowrap="nowrap" style="height: 15px;"></td>
	  <td align="center"></td>
	  <td></td>
	  <td></td>
	  <td align="right"></td>
	  <td></td>
	  <td></td>
	  <td align="right"></td>
	  <td></td>
    </tr>
	<tr>
	  <td colspan="2"></td>
	  <td nowrap="nowrap" style="padding-left: 20px;">&nbsp;</td>
	  <td align="center">&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	 
	  <td align="right">รวมรับ 4 รายการ</td>
	  <td align="right">
		 <!-- <?php 
	echo 'serviceTax>'.$serviceTax."<br>";
	echo 'sumCarcheckTotal>'.$sumCarcheckTotal."<br>";
	echo 'sumActTtoal>'.$sumActTtoal."<br>";
	echo 'sumOther>'.$getData['sumOther']."<br>";
		  ?>-->
		
		  <?php 
		  $totalRecieve = ($serviceTax+$sumCarcheckTotal+$sumActTtoal+$getData['sumOther']);
		  echo number_format($totalRecieve,2);
		  
		  ?></td>
	  <td align="center">บาท</td>
    </tr>
	<tr>
	  <td colspan="10" style="height: 20px;">
		<hr class="col-xs-12">
	  </td>
    </tr>
	<tr>
	  <td colspan="2" ><u>หัก</u> </td>
	  <td align="center">&nbsp;</td>
	  <td align="center">&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td colspan="3">&nbsp;</td>
    </tr>
	<tr>
	  <td colspan="7" >
		  <table  border="0">
			<?php $n=1; $sumCarcheckTotal=0; foreach($getData['resultExpense'] AS $expense){ $sumCarcheckTotal = $sumCarcheckTotal+$expense->expenses_price;?>
		  	<tr>
				<td width="17"><?php echo $n."."?></td>  
				<td width="200" align="left"  nowrap><?php echo $expense->expenses_name?></td>  
				<td width="80" align="right" nowrap><?php echo number_format($expense->expenses_price,2)?>&nbsp;</td>
				<td  >บาท</td>  
			</tr>
		  <?php $n++; }?>
		  </table>	
		
		
		
	</td>
	  <td colspan="3" align="right" valign="top"><table border="0" width="90%">
	    <tr>
	      <td width="49%" nowrap="nowrap">รวมรายจ่าย</td>
	      <td width="31%" align="right"><?php echo number_format($sumCarcheckTotal,2)?></td>
	      <td width="20%" align="center">บาท</td>
	      </tr>
	    <tr>
	      <td nowrap="nowrap">ส่งเงินประจำวัน</td>
	      <td align="right"><?php echo number_format(($totalRecieve),2)?></td>
	      <td align="center">บาท</td>
	      </tr>
	    <tr>
	      <td nowrap="nowrap">รวมส่งเงินทั้งหมด</td>
	      <td  align="right"><?php echo number_format(($totalRecieve-$sumCarcheckTotal),2)?></td>
	      <td align="center">บาท</td>
	      </tr>
      </table></td>
    </tr>
</table>
    </tr>


	
</div>

<script>
function printData2(divName)
		{  
		    var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
		}
	
</script>
