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
	//echo "<br>";
	//echo $getData['sql5.1']; 
	//echo $getData['sql4']; 
	//echo "<br>";
	//echo $getData['sql42']; 
   //echo '<br>'.$getData['sql1'];  w.date_add, COUNT(a.id) AS countRenewTax , SUM(a.tax_service) AS sumTaxService
	//echo "<br>";
	?>
<div id="printME" style="text-align: center; margin-left: 3px; margin-right: 3px;">
	<div class="" style="text-align: center; border-bottom: 0px !important">
          <p style="font-size: 16px; font-weight: bold">สรุปรายวันใบส่งเงิน ต.ร.อ.<?php echo $txtDay?> </p>
</div>
<?php //echo ">>>>".$dateStart." ".$dateEnd." "?> 
<?php //print_r($DateDiff)?> 
<?php  // echo "<br>DateDiff>>>".$DateDiff." MonthDiff>>".$MonthDiff."<br>"?> 
<?php 
	    //---------carcheck-----------------
		foreach($getData['resultCarCheck'] AS $carchk){
			$dateToTimeStamp = strtotime($carchk->car_check_date);
			if(!isset($carCheckPrice[$carchk->car_type_group][$dateToTimeStamp])){ $carCheckPrice[$carchk->car_type_group][$dateToTimeStamp]=0;}
			if(!isset($carCheckCountN[$carchk->car_type_group][$dateToTimeStamp])){ $carCheckCountN[$carchk->car_type_group][$dateToTimeStamp]=0;}
			if(!isset($carCheckTotal[$carchk->car_type_group][$dateToTimeStamp])){ $carCheckTotal[$carchk->car_type_group][$dateToTimeStamp]=0;}
			$carCheckPrice[$carchk->car_type_group][$dateToTimeStamp]=$carCheckPrice[$carchk->car_type_group][$dateToTimeStamp]+$carchk->car_check_price;
			$carCheckCountN[$carchk->car_type_group][$dateToTimeStamp]=$carCheckCountN[$carchk->car_type_group][$dateToTimeStamp]+$carchk->countN;
			$carCheckTotal[$carchk->car_type_group][$dateToTimeStamp]=$carCheckTotal[$carchk->car_type_group][$dateToTimeStamp]+$carchk->totalCarCheckPrice;
		}
		//---------TAX-----------------	($getData['totalTaxRecieve']-($getData['countRenewTax']*20))  
		foreach($getData['resultTax1'] AS $rsTax){
			$dateToTimeStamp = strtotime($rsTax->date_add);	
			$serviceTax[$dateToTimeStamp] = ($rsTax->sumTaxService-($rsTax->countRenewTax*20));  
	    }
		//------ACT-----------------
		foreach($getData['ResultcountBikeAct'] AS $countBike){
			$dateToTimeStamp = strtotime($countBike->date_work);
			$Bike[$dateToTimeStamp]=$countBike->countBikeAct;
		}	  
	    $carDedug = 0; $actBikeTotal=array(); $actCarTotal=array();
		foreach($getData['resultAct'] AS $act){
			$dateToTimeStamp = strtotime($act->date_work); 
			if($act->car_type_group=='1'){ 
					$carDedug = FLOOR($act->dedugPrice);
				    if(!isset($actCarTotal[$dateToTimeStamp])){ $actCarTotal[$dateToTimeStamp]=0; }
					$actCarTotal[$dateToTimeStamp] = $act->act_total-$carDedug;
					$actCarDaily[$dateToTimeStamp] = $act->act_total-$carDedug;
			  }else if($act->car_type_group=='2'){
					 if(isset($act->dedugPrice)){
						$addActPrice = $Bike[$dateToTimeStamp]*5;
						$totalBikeDedug = ($act->dedugPrice)+$addActPrice;
						$actBikeTotal[$dateToTimeStamp] = $act->act_total - $totalBikeDedug;
						$actBikeDaily[$dateToTimeStamp] = $actBikeTotal[$dateToTimeStamp];
					 }else{
						 $actBikeTotal[$dateToTimeStamp] = 0;
						 $actBikeDaily[$dateToTimeStamp]=0;
					 }
				}
			if(!isset($actBikeTotal[$dateToTimeStamp])){ $actBikeTotal[$dateToTimeStamp] =0 ;}
			if(!isset($actCarTotal[$dateToTimeStamp])){ $actCarTotal[$dateToTimeStamp] =0 ;}
			$actDaily[$dateToTimeStamp] = ($actCarTotal[$dateToTimeStamp]+$actBikeTotal[$dateToTimeStamp]);
			$act->dedugPrice = 0; 
		}
		//--------other-----------
		foreach($getData['resultOther'] AS $other){
			$dateToTimeStamp = strtotime($other->date_add); 
			if($other->service_other_price > 0){
				$DataOther[$dateToTimeStamp] = $other->service_other_price;
			}
		}
	   //--------expense
		foreach($getData['resultExpense'] AS $expense){ 
				$dateToTimeStamp = strtotime($expense->expenses_date); 
				if($expense->expenses_price > 0){
					if(!isset($expenseData[$dateToTimeStamp])){ $expenseData[$dateToTimeStamp]=0;}
					$expenseData[$dateToTimeStamp] = $expenseData[$dateToTimeStamp]+$expense->expenses_price;
				}
		}
?>	
<table width="98%" class="  table-bordered  table-checkable order-column full-width" id="">
			<thead>
				<tr>
						<th width="7%" rowspan="2" style="text-align: center">วันที่</th>
						<th colspan="2" style="text-align: center">ตรวจ จยย.</th>
						<th colspan="2" style="text-align: center">ตรวจ รย.</th>
						<!--<th style="text-align: center">@วันเริ่มประกัน</th>-->
						<th width="10%" rowspan="2" style="text-align: center">ค่าบริการ</th>
						<th colspan="2" style="text-align: center">พรบ.</th>
						<th width="6%" rowspan="2" style="text-align: center">อื่นๆ</th>
						<th width="12%" rowspan="2" style="text-align: center">รวมรับ</th>
						<th width="9%" rowspan="2" style="text-align: center">(คชจ.)</th>
						<th width="9%" rowspan="2" style="text-align: center">รับสุทธิ</th>
				</tr>
				<tr>
				  <th width="7%" style="text-align: center">คัน</th>
				  <th width="8%" style="text-align: center">บาท</th>
				  <th width="8%" style="text-align: center">คัน</th>
				  <th width="8%" style="text-align: center">บาท</th>
				  <th width="8%" style="text-align: center">จยย.</th>
				  <th width="8%" style="text-align: center">รย.</th>
              </tr>
		</thead>
		<tbody>
			<?php 
			$NumCarCheck=0;$NumBikeCheck=0;
			$sumTotalCarCheck = 0;
			$sumTotalBikeCheck = 0;
			$sumTotalService = 0;
			$sumTotalAct = 0;
			$sumTotalBikeAct = 0;
			$sumTotalCarAct = 0;
			$sumTotalOther = 0;
			$sumTotalRevice = 0;
			$sumExpense = 0;
			$sumTotalAll = 0;
			$x1=0; $y1=0;
			for($i=1;$i<=$DateDiff;$i++){
					$today = $i."-".$select_month."-".$select_year;
					#---------day calculate--------------
					if(!isset($day)){ $day=$select_day;}
					$day = str_pad($day, 2, '0', STR_PAD_LEFT);
					$todayFormat = $select_year."-".$select_month."-".$day;
					$date = new DateTime($todayFormat);
					$isLastDayOfMonth = ($date->format('d') === $date->format('t'));
    				if ($isLastDayOfMonth) {
						$day = 1;
						$select_month = str_pad($select_month+1, 2, '0', STR_PAD_LEFT);
						//$x = "The date is the last day of the month.".$select_month;
					} else {
						$x = "";
						$day++;
					}
					$dateToTimeStamp = strtotime($todayFormat);
					#---------day calculate--------------
			?>
				<tr>
				  <td nowrap="nowrap" style="text-align: center" title="<?php echo $this->insurance_model->translateDateToThai($todayFormat);?>">
					  <?php echo substr($this->insurance_model->translateDateToThai($todayFormat),0,2)?></td>
				  <td style="text-align: center">
					 <?php 
				    if(isset($carCheckCountN[2][$dateToTimeStamp]))
					{ 
						echo $carCheckCountN[2][$dateToTimeStamp];
					}else{
						$carCheckCountN[2][$dateToTimeStamp]=0;
					} 
					   $NumBikeCheck = $NumBikeCheck+$carCheckCountN[2][$dateToTimeStamp];
					  ?>
				 </td>
				  <td style="text-align: center">
					  <?php if(isset($carCheckTotal[2][$dateToTimeStamp])){ echo number_format($carCheckTotal[2][$dateToTimeStamp],2);}else{ $carCheckTotal[2][$dateToTimeStamp]=0; }
					  $sumTotalCarCheck = $sumTotalCarCheck+$carCheckTotal[2][$dateToTimeStamp];
					  ?>
				  </td>
				  <td style="text-align: center"><?php 
				    if(isset($carCheckCountN[1][$dateToTimeStamp]))
					{ 
						echo $carCheckCountN[1][$dateToTimeStamp];
					}else{
						$carCheckCountN[1][$dateToTimeStamp] = 0;
					}
					 $NumCarCheck = $NumCarCheck+$carCheckCountN[1][$dateToTimeStamp]; 
					  ?></td>
				  <td style="text-align: center"><?php if(isset($carCheckTotal[1][$dateToTimeStamp])){ echo number_format($carCheckTotal[1][$dateToTimeStamp],2);}else{ $carCheckTotal[1][$dateToTimeStamp]=0; }
					  $sumTotalBikeCheck = $sumTotalBikeCheck+$carCheckTotal[1][$dateToTimeStamp];
					  ?>
										</td>
				  <td style="text-align: center">
					<?php if(isset($serviceTax[$dateToTimeStamp])){ echo number_format($serviceTax[$dateToTimeStamp],2); }else{ $serviceTax[$dateToTimeStamp]=0; }
					  $sumTotalService  = $sumTotalService+$serviceTax[$dateToTimeStamp];
					  ?>
				  </td>
				  <td style="text-align: center">
				    <?php if(isset($actDaily[$dateToTimeStamp])){ //echo number_format($actDaily[$dateToTimeStamp],2);
					  }else{ $actDaily[$dateToTimeStamp]=0; } 
					  if(isset($actBikeDaily[$dateToTimeStamp])){
						  echo $actBikeDaily[$dateToTimeStamp];   
					  }else{
						  $actBikeDaily[$dateToTimeStamp]=0;
					  }
				   $sumTotalAct = $sumTotalAct+$actDaily[$dateToTimeStamp];  
				   $sumTotalBikeAct = $sumTotalBikeAct+$actBikeDaily[$dateToTimeStamp];  
					  ?></td>
				  <td style="text-align: center">
					  <?php  if(isset($actCarDaily[$dateToTimeStamp])){
							  	echo $actCarDaily[$dateToTimeStamp];   
							  }else{
								  $actCarDaily[$dateToTimeStamp]=0;
							  }
						$sumTotalCarAct = $sumTotalCarAct+$actCarDaily[$dateToTimeStamp];  
					  ?>
				  </td>
				  <td style="text-align: center"><?php if(isset($DataOther[$dateToTimeStamp])){ echo number_format($DataOther[$dateToTimeStamp],2); }else{ $DataOther[$dateToTimeStamp]=0; }
					  $sumTotalOther = $sumTotalOther+$DataOther[$dateToTimeStamp];
					  ?></td>
				  <td style="text-align: center">
					 <?php
						$totalRow[$dateToTimeStamp] = $carCheckTotal[2][$dateToTimeStamp]+$carCheckTotal[1][$dateToTimeStamp]+$serviceTax[$dateToTimeStamp]+$actDaily[$dateToTimeStamp]+$DataOther[$dateToTimeStamp];
						if($totalRow[$dateToTimeStamp]>0){
							echo number_format($totalRow[$dateToTimeStamp],2);	
						}else{
							$totalRow[$dateToTimeStamp] = 0;
						}
						$sumTotalRevice = $sumTotalRevice+$totalRow[$dateToTimeStamp];
						?>
				  </td>
				  <td style="text-align: center">
					<?php if(isset($expenseData[$dateToTimeStamp])){ 
							echo number_format($expenseData[$dateToTimeStamp],2);
						}else{
							$expenseData[$dateToTimeStamp]=0;
						}
						$sumExpense =$sumExpense+$expenseData[$dateToTimeStamp];
					  ?>
				  </td>
				  <td style="text-align: center"><?php $reciveDay[$dateToTimeStamp] = $totalRow[$dateToTimeStamp]-$expenseData[$dateToTimeStamp] ;
				  if($reciveDay[$dateToTimeStamp]!='0'){  
					  echo number_format($reciveDay[$dateToTimeStamp],2); }
					  $sumTotalAll = $sumTotalAll+$reciveDay[$dateToTimeStamp];
				   ?>
			   </td>
			  </tr>
			<?php  $expenseData[$dateToTimeStamp];  }?>
			<tr>
				  <th nowrap="nowrap" style="text-align: center">รวม</th>
				  <th style="text-align: center"><?php echo number_format($NumBikeCheck)?></th>
				  <th style="text-align: center"><?php echo number_format($sumTotalCarCheck,2)?></th>
				  <th style="text-align: center"><?php echo number_format($NumCarCheck)?></th>
				  <th style="text-align: center"><?php echo number_format($sumTotalBikeCheck,2)?></th>
				  <th style="text-align: center"><?php echo number_format($sumTotalService,2)?></th>
				  <th style="text-align: center">
					  <?php echo number_format($sumTotalBikeAct,2)?>
					  <?php //echo number_format($sumTotalAct,2)?>
				</th>
				  <th style="text-align: center"><?php echo number_format($sumTotalCarAct,2)?></th>
				  <th style="text-align: center"><?php echo number_format($sumTotalOther,2)?></th>
			  <th style="text-align: center"><?php echo number_format($sumTotalRevice,2)?></th>
			  <th style="text-align: center"><?php echo number_format($sumExpense,2)?></th>
			  <th style="text-align: center"><?php echo number_format($sumTotalAll,2)?></th>
		  </tr>
		</tbody>
	</table>
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
