<!doctype html>
<html>
<head>
	
	<?php include("header.php"); ?>
	<style>
		body {		
			background-color: #fff;		
		}
		@media print {
			body {		
				background-color: #fff;				
				zoom:80%; 
				body { margin: 1.6cm; }
			}
			
			@page { 
				size: a4;
				margin: 0;
				/*size: a5 landscape;
				size: landscape;*/
			}
			.table .tr .td {
				font-size: 16px;
			}
		}
	</style>
	 
</head>									
<body>
<div style="height: 30px;"></div>
<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tbody>
    <tr>
      <td width="1810" align="center" style="font-size: 18px; font-weight: bold;">
		    <?php if($startDate == $endDate){ ?>
		  	    ใบ ตรอ. ส่ง พ.ร.บ. วันที่ <?php echo  $startDate; //$this->insurance_model-> translateDateToThai($startDate); ?>
		  	<?php }else{ ?>
		  			ใบ ตรอ. ส่ง พ.ร.บ. วันที่  <?php echo  $startDate."-".$endDate;//$this->insurance_model-> translateDateToThai($startDate)." - ".$this->insurance_model-> translateDateToThai($endDate); ?>
		   <?php }?> ประเภทรถ : <?php echo $car_type_name?>
		</td>
    </tr>
  </tbody>
</table>
<div style="padding: 10px;">
<table width="98%" align="center"  class="table  table-bordered table-hover table-checkable order-column full-width" id="">
                                        <thead>
                                            <tr>
                                                	<th style="text-align: center">ลำดับ</th>
                                                	<th style="text-align: center">เลขที่กรมธรรม์</th>												
                                                	<th style="text-align: center">ชื่อผู้เอาประกันภัย</th>
                                                	<th style="text-align: center">ทะเบียน</th>
                                                	<th style="text-align: center">วันเริ่มประกัน</th>
													<th style="text-align: center">เบี้ยสุทธิ</th>
													<th style="text-align: center">เบี้ยรวม</th>
													<th style="text-align: center">รับลูกค้า</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php $n=1; 
													$sum_act_price_net = 0;
													$sum_act_price = 0;
													$sum_act_price_total= 0;
													$sum_dedug = 0;
													foreach($getData['resultData'] AS $data){ 
															$sum_act_price_net =  $sum_act_price_net + $data->act_price_net; 
															$sum_act_price =  $sum_act_price + $data->act_price; 
															$sum_act_price_total =  $sum_act_price_total + $data->act_price_total; 
														
															$dedug = ($data->deduct_percent * $data->act_price_total)/100;
															$sum_dedug = $sum_dedug+$dedug;
											    ?>
												<tr class="odd gradeX">
													<td style="text-align: center"><?php echo $n?></td>
													<td><?php echo $data->act_no?></td>													
													<td><?php echo $data->cust_name?></td>
													<td align="center"><?php echo $data->vehicle_regis." ".$data->province_name?></td> 
													<td align="center" style="text-align: center"><?php echo $data->act_no?></td>
													<td align="right"><?php echo number_format($data->act_price_net,2)?></td>
													<td align="right"><?php echo number_format($data->act_price,2)?></td>
													<td align="right"><?php echo number_format($data->act_price_total,2)?></td>
												</tr>
											 <?php $n++; } ?>	
								          <tr>
										          <td height="10"></td>
										          <td></td>
										          <td></td>
										          <td></td>
										          <td></td>
										          <td align="right"></td>
										          <td align="right"></td>
										          <td align="right"></td>
								          </tr>
								          <tr>
												  	<td></td>
												  	<td></td>													
													<td></td>
													<td></td>													
													<td style="border-top: 1px solid #000; border-bottom: double #000"><strong>รวมยอด</strong></td>
													<td style="border-top: 1px solid #000; border-bottom: double #000; text-align: right"><strong><?php echo number_format($sum_act_price_net,2)?></strong></td>
													<td style="border-top: 1px solid #000; border-bottom: double #000; text-align: right"><strong><?php echo number_format($sum_act_price,2)?></strong></td>
													<td style="border-top: 1px solid #000; border-bottom: double #000; text-align: right"><strong><?php echo number_format($sum_act_price_total,2)?></strong></td>
								  		  </tr>
												<tr>
												  	<td></td>
												  	<td></td>													
													<td></td>
													<td></td>													
													<td><strong>%</strong></td>
													<td align="right">&nbsp;</td>
													<td align="right">&nbsp;</td>
													<td align="right"><strong><?php echo number_format($sum_dedug,2)?></strong></td>
										  		</tr>
												<tr>
												  <td></td>
												  <td></td>
												  <td></td>
												  <td></td>
												  <td><strong>ส่ง</strong></td>
												  <td align="right">&nbsp;</td>
												  <td align="right">&nbsp;</td>
												  <td align="right"><strong><?php  $totalAll = $sum_act_price_total-$sum_dedug; echo number_format($totalAll,2)?></strong></td>
										  </tr>
												
												
                                        </tbody>
                                    </table>
</div>	
	<script>
		window.print();
		//window.close();
		//window.addEventListener('afterprint', (event) => {
		//  console.log('After print');
		//});
    </script>
</body>
</html>