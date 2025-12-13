<!doctype html>
<html>
<head>
	<?php include("header.php"); ?>
	<style>
		@media print {
		
		@page {
		  size: A4 landscape; /* DIN A4 standard, Europe */
		  margin:10;
			}

	body {zoom: 80%;}

    }
		
		
	</style>
</head>									

<body>
																						
														<div class="card-body" id="">
															<form class="form-horizontal">									
																<div class="form-group row">	
																	<div class="col-sm-12">
																		<div class="card card-topline-aqua">
																			<div class="card-head" style="text-align: center;">
																				<header>ข้อมูลการชำระเงิน / ผ่อนประกัน</header><br>
																				<p style="font-weight: 400; line-height: 24px;">
																					<strong>ชื่อลูกค้า</strong> xxxxxxxxxx xxxxxxxxxxxxx 
																					<strong>โทรศัพท์</strong> xxxxxxxxxxxxx  <br>
																					<strong>เลขที่กรมธรรม์</strong> 123-456-789 <strong>ประเภท</strong> ประกันอุบัติเหตุ <strong>วันคุ้มครอง</strong> 18/10/65<br>
																					<strong>ผ่อน</strong> 3 งวด <strong>เบี้ยรวม</strong> xxxxxxxx บาท <strong> รับชำระ</strong> xxxxxxx บาท <strong>คงค้าง </strong>xxxxxxx บาท
																				</p>
																			</div>
																			<div class="card-body ">
																				<div class="">
																					<table class="table">
																						<thead>
																							<tr>
																								<th style="text-align: center; background-color: #E5E5E5">งวดที่</th>
																								<th style="text-align: center; background-color: #E5E5E5">วันที่ทำรายการ</th>
																								<th style="text-align: center; background-color: #E5E5E5">วันที่รับเงิน</th>
																								<th style="text-align: center; background-color: #E5E5E5">จำนวนเงิน</th>
																								<th style="text-align: center; background-color: #E5E5E5">การชำระเงิน</th>
																								<th style="text-align: center; background-color: #E5E5E5">เลขที่ใบเสร็จ</th>
																								<th style="text-align: center; background-color: #E5E5E5">วันกำหนดชำระเงิน</th>
																								<th style="text-align: center; background-color: #E5E5E5">สถานะตามเงิน</th>
																								<th style="text-align: center; background-color: #E5E5E5">หมายเหตุ</th>
																							</tr>
																						</thead>
																						<tbody>
																							<tr>
																								<td style="text-align: center">1</td>
																								<td style="text-align: center">01/10/2565</td>
																								<td style="text-align: center">01/10/2565</td>
																								<td style="text-align: right;">10,000.00</td>
																								<td style="text-align: center">เงินโอน</td>
																								<td style="text-align: center">เลขที่ 99/999</td>
																								<td style="text-align: center">01/10/2565</td>
																								<td style="text-align: center">
																									<button class="btn btn-success btn-xs">ปกติ</button>
																								</td>		
																								<td>ธ.กรุงเทพ 123-456-7890</td>	
																							</tr>
																							<tr>
																								<td style="text-align: center">2</td>
																								<td style="text-align: center"></td>
																								<td style="text-align: center"></td>
																								<td style="text-align: right;">10,000.00</td>
																								<td style="text-align: center"></td>
																								<td style="text-align: center"></td>
																								<td style="text-align: center">01/11/2565</td>
																								<td style="text-align: center">
																									<button class="btn btn-danger btn-xs">ค้างชำระ</button>
																								</td>		
																								<td></td>		
																							</tr>
																							<tr>
																								<td style="text-align: center">3</td>
																								<td style="text-align: center"></td>
																								<td style="text-align: center"></td>
																								<td style="text-align: right;">10,000.00</td>
																								<td style="text-align: center"></td>
																								<td style="text-align: center"></td>
																								<td style="text-align: center">01/12/2565</td>
																								<td style="text-align: center">
																									<button class="btn btn-danger btn-xs">ค้างชำระ</button>
																								</td>		
																								<td></td>		
																							</tr>
																							
																							<tr>
																								<td colspan="3" style="height: 30px; text-align: right; background-color: #E5E5E5"><strong>รวมยอดรับชำระ</strong></td>
																								<td style="text-align: right; background-color: #E5E5E5; font-weight: 500;">xx,xxx.xx</td>
																								<td style="text-align: center; background-color: #E5E5E5; color:#C90003"><strong>ยอดค้างรับ</strong></td>
																								<td style="background-color: #E5E5E5; color:#C90003">x,xxx.xx</td>
																								<td colspan="3" style="background-color: #E5E5E5;">( เบี้ยรวม 12,346.97 )</td>
																							</tr>
																							
																						</tbody>
																					</table>
																					<p align="center" style="padding-top: 30px; font-weight: bold; color:#AB0002; font-size: 18px;">** งวดถัดไป ชำระทุกวันที่ 10 **</p>
																				</div>
																			</div>
																		
																		</div>
																	</div>

																</div>
																
																
															</form>
														</div>
													
<script>
	window.print();
</script>
	
	</body>
</html>