<?php
 // print_r($getData);
//echo $getData['sql'];
?>
<div id="printInspect">
	<table width="100%" class=" table-striped table-bordered table-hover table-checkable order-column full-width"  id="table">
  <thead>
    <tr>
      <th rowspan="2" style="text-align: center">ลำดับ</th>
      <th rowspan="2" style="text-align: center">ร.ย.</th>

      <th rowspan="2" style="text-align: center">ทะเบียนรถ</th>

      <th colspan="2" style="text-align: center">ค่าตรวจ</th>
      <th rowspan="2" style="text-align: center">พ.ร.บ</th>
      <th rowspan="2" style="text-align: center">ส่วนลด</th>
      <th rowspan="2" style="text-align: center">ค่าภาษี</th>
     
      <th rowspan="2" style="text-align: center">ค่าบริการ</th>
      <th colspan="2" style="text-align: center">รวม</th>
      </tr>
    <tr>
      <th style="text-align: center">จยย.</th>
      <th style="text-align: center">ร.ย.</th>
      <th style="text-align: center">สด</th>
      <th style="text-align: center">โอน</th>
    </tr>
  </thead>
  <tbody>
	<?php $n=1; 
	  $totalRow[$n]=0; $sumTotal =0;$sumOther=0;$sumService=0;$sumAct=0;$sumTax=0;$sumTaxService=0; $sumFine = 0; $sumActDisc=0; 
	  $sumCash = 0; $sumTransfer=0;
	  $sumBike = 0; $sumCar=0;
	  foreach($getData['resultData']->result() AS $data){ 
	  		 if($data->work_overdue=='0'){
				 $sumAct= $sumAct+$data->act_price_total;
	  			 $sumTax= $sumTax+$data->tax_price;
	  			 $sumTaxService= $sumTaxService+$data->tax_service;
			 }
		  
	  ?>  
    <tr >
      <td align="center" style="text-align: center"><?php echo $n?></td>
      <td align="center" style="text-align: center"><?php echo $data->type_name;//$this->insurance_model->translateDateToThai($data->car_check_date)?></td>

      <td align="center" style="text-align: center"><?php echo $data->vehicle_regis." ".$data->province_name;?>
		  		
		</td>

      <td style="text-align: center">
		  <?php //echo 'free_cancel>'.$data->free_cancel."<Br>";
		  if($data->free_cancel==0){
			   if($data->car_type_group==2){ 
				   echo number_format($data->car_check_price,2);
				  if($data->work_overdue=='0'){  //ค้างชำระ						
					$sumBike=$sumBike+$data->car_check_price; 
				  }
				}
		  }else{
			
			  if($data->car_type_group==2){ 
				  echo "<span class='text-danger'>";
				  echo number_format($data->car_check_price,2)."(ฟรี)";  $sumBike=$sumBike+0;
			  	  echo "</span>";
			  }
		  }
		  
		  
		  ?></td>
      <td style="text-align: center">
		  <?php 
		  if($data->free_cancel==0){
			  if(($data->car_type_group==1)){ 
				  echo number_format($data->car_check_price,2); 
				   if($data->work_overdue=='0'){  
					   $sumCar=$sumCar+$data->car_check_price; 
				    }
			  }
		  }else{
			  if(($data->car_type_group==1)){ 
				  echo "<span class='text-danger'>";
				  echo number_format($data->car_check_price,2)."(ฟรี)";  $sumCar=$sumCar+0; 
			  	  echo "</span>";
			  }
		  }
		  ?></td>
      <td style="text-align: center">
		  <?php echo number_format($data->act_price_total,2);?>
		</td>
      <td style="text-align: center" class="text-danger"><?php if($data->act_discount!='0.00'){ 
			  echo number_format($data->act_discount,2); 
			  $sumActDisc = $sumActDisc+$data->act_discount; 
																							  } ?></td>
      <td style="text-align: center"><?php echo number_format($data->tax_price,2);?></td>
   
      <td style="text-align: center"><?php echo number_format($data->tax_service,2);?> </td>
      <td align="right" style="text-align: center">
		  <?php
		  /*if($data->pay_cash_overdue=='1'){
			  $data->pay_cash = 0;
		  }*/
		   if($data->work_overdue=='1'){
				  echo "<span class='text-danger'>";
				  echo "ค้างจ่าย";
				  echo "</span>";
				  $data->pay_cash=0;
			  }else{
			   	  if($data->pay_cash!='0'){ 
				   echo number_format($data->pay_cash,2);
				  }
			  }
		  
		  
		  //
			 
			 
		  //
		  
		  $sumCash=$sumCash+$data->pay_cash;
		  
		  ?>
		</td>
      <td align="right" style="text-align: center">
		  <?php
		  // pay_transfer_overdue pay_transfer2_overdue
		 /* if($data->pay_transfer_overdue=='1'){
			  $data->pay_transfer = 0;
		  }
		  if($data->pay_transfer2_overdue=='1'){
			  $data->pay_transfer2 = 0;
		  }	*/
		  
		  if($data->work_overdue=='1'){
				  $data->pay_transfer2 = 0;
			  	  $data->pay_transfer = 0;
		  }else{
			  $sumROWTransfer = $data->pay_transfer+$data->pay_transfer2; 
			   if($sumROWTransfer!='0'){ echo number_format($sumROWTransfer,2); $sumTransfer=$sumTransfer+$sumROWTransfer; }
		  }
		 
		  
		  ?>
		</td>
      </tr>
	<?php $n++;  }?> 
    <tr>
      <td colspan="3" align="right" style="text-align: center"><strong>รวมทั้งสิ้น</strong></td>
      <td style="text-align: center"><?php echo number_format($sumBike,2)?></td>
      <td style="text-align: center"><?php echo number_format($sumCar,2)?></td>
      <td style="text-align: center"><?php echo number_format($sumAct,2)?></td>
      <td style="text-align: center"  class="text-danger"><?php echo number_format($sumActDisc,2)?></td>
      <td style="text-align: center"><?php echo number_format($sumTax,2);?></td>
     
      <td style="text-align: center"><?php echo number_format($sumTaxService,2); ?></td>
      <td align="right" style="text-align: center"><?php echo number_format($sumCash,2);?></td>
      <td align="right" style="text-align: center"><?php echo number_format($sumTransfer,2);?></td>
      </tr>
  </tbody>
</table>

</div>
