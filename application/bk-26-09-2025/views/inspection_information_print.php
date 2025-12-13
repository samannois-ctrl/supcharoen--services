<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
	<?php include("header.php"); ?>
	
	<style>		
		body{
		  -webkit-print-color-adjust:exact !important;
		  print-color-adjust:exact !important;
		}
		
		/* css ส่วนสำหรับการแบ่งหน้าข้อมูลสำหรับการพิมพ์ */
		@media all
		{
			.page-break { display:none; }
			.page-break-no{ display:none; }
		}
		@media print
		{
			.page-break { display:block;height:1px; page-break-before:always; }
			.page-break-no{ display:block;height:1px; page-break-after:avoid; } 
		}
				
		
		@media print {
			body {		
				background-color: #fff;				
				color: #000;
				zoom:100%;
			}
			
			@page { 
				size: a4;
				/*size: a5 landscape;
				size: landscape;
				margin: 0;*/
			}
			.table .tr .td {
				font-size: 16px;
			}
			
		}
		
		
	</style>
</head>
<!-- END HEAD -->

<body>

	<div class="row">
                        <div class="col-md-12">
                            <div class="">
                                <div style="text-align: center; border-bottom: 0px !important">
                                    <p style="font-size: 16px; font-weight: bold">แบบรายงานการตรวจสภาพรถผ่านระบบสารสนเทศ (ระบบใหม่)<br>
                                   		สถานตรวจสภาพรถชื่อ ทรัพย์เจริญเซอร์วิส &emsp;เลขที่ใบอนุญาต สข.002/2549 &emsp;จังหวัด สงขลา<br>
										ประจำเดือน เมษายน พ.ศ. 2565
									</p>
                                </div>
                                <div>
                                   <table class="table table-striped table-bordered table-hover table-checkable order-column full-width" id="example4">
                                        <thead>
                                            <tr>
                                               	<th style="text-align: center">ลำดับ</th>
                                               	<th style="text-align: center">หมายเลขทะเบียนรถ</th>
                                               	<th style="text-align: center">ประเภทรถ<br>
                                               	  (รย.1, รย.2, รย.3, รย.12)</th>
												<th style="text-align: center">วันที่ตรวจสภาพรถ</th>
												<th style="text-align: center">เวลาที่ตรวจสภาพรถ</th>
											</tr>
										</thead>
                                        <tbody>	
                                            <tr>
                                             	<td align="center" style="text-align: center">1</td>
                                             	<td align="center" style="text-align: center">คกษ 875 สข</td>
                                             	<td align="center" style="text-align: center">12</td>
                                              	<td align="center" style="text-align: center">1/10/65</td>
                                              	<td align="center" style="text-align: center">08:12:52</td>
										 	</tr>
                                            <tr>
                                             	<td align="center" style="text-align: center">2</td>
                                             	<td align="center" style="text-align: center">คกษ 875 สข</td>
                                             	<td align="center" style="text-align: center">1</td>
                                              	<td align="center" style="text-align: center">1/10/65</td>
                                              	<td align="center" style="text-align: center">10:12:52</td>
										 	</tr>
                                            <tr>
                                             	<td align="center" style="text-align: center">3</td>
                                             	<td align="center" style="text-align: center">คกษ 875 สข</td>
                                             	<td align="center" style="text-align: center">12</td>
                                              	<td align="center" style="text-align: center">2/10/65</td>
                                              	<td align="center" style="text-align: center">10:12:52</td>
										 	</tr>
                                       		<tr>
                                             	<td align="center" style="text-align: center">4</td>
                                             	<td align="center" style="text-align: center">คกษ 875 สข</td>
                                             	<td align="center" style="text-align: center">12</td>
                                              	<td align="center" style="text-align: center">3/10/65</td>
                                              	<td align="center" style="text-align: center">10:12:52</td>
										 	</tr>
                                            <tr>
                                             	<td align="center" style="text-align: center">5</td>
                                             	<td align="center" style="text-align: center">คกษ 875 สข</td>
                                             	<td align="center" style="text-align: center">1</td>
                                              	<td align="center" style="text-align: center">4/10/65</td>
                                              	<td align="center" style="text-align: center">10:12:52</td>
										 	</tr>
                                            <tr>
                                              <td align="center" style="text-align: center">6</td>
                                              <td align="center" style="text-align: center">คกษ 875 สข</td>
                                              <td align="center" style="text-align: center">12</td>
                                              <td align="center" style="text-align: center">4/10/65</td>
                                              <td align="center" style="text-align: center">08:12:52</td>
                                            </tr>
                                            <tr>
                                              <td align="center" style="text-align: center">7</td>
                                              <td align="center" style="text-align: center">คกษ 875 สข</td>
                                              <td align="center" style="text-align: center">1</td>
                                              <td align="center" style="text-align: center">5/10/65</td>
                                              <td align="center" style="text-align: center">10:12:52</td>
                                            </tr>
                                            <tr>
                                              <td align="center" style="text-align: center">8</td>
                                              <td align="center" style="text-align: center">คกษ 875 สข</td>
                                              <td align="center" style="text-align: center">12</td>
                                              <td align="center" style="text-align: center">5/10/65</td>
                                              <td align="center" style="text-align: center">10:12:52</td>
                                            </tr>
                                            <tr>
                                              <td align="center" style="text-align: center">9</td>
                                              <td align="center" style="text-align: center">คกษ 875 สข</td>
                                              <td align="center" style="text-align: center">12</td>
                                              <td align="center" style="text-align: center">6/10/65</td>
                                              <td align="center" style="text-align: center">10:12:52</td>
                                            </tr>
                                            <tr>
                                              <td align="center" style="text-align: center">10</td>
                                              <td align="center" style="text-align: center">คกษ 875 สข</td>
                                              <td align="center" style="text-align: center">1</td>
                                              <td align="center" style="text-align: center">7/10/65</td>
                                              <td align="center" style="text-align: center">10:12:52</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>				
	
	
	<div class="page-break">&nbsp;</div>
	
	<div class="row">
        <div class="col-md-12" align="center">
			<table style="width: 70%; text-align: center; border: 2px solid;">
				<tr>
					<td style="font-size: 26px; font-weight: bold; text-align: center; padding: 25px; background-color: #77C14E;">สถานตรวจสภาพรถทรัพย์เจริญเซอร์วิส</td>
				</tr>
				<tr>				  
				  <td style="font-size: 26px; font-weight: bold; text-align: center; padding: 25px; border-top: 2px solid;">รถที่ตรวจสภาพ</td>
			  	</tr>
				<tr>				  
				 <td style="font-size: 26px; font-weight: bold; text-align: center; padding: 25px; border-top: 2px solid;">วันที่ 1 - 31 ตุลาคม 2565</td>
			  	</tr>
				<tr>				  
				  <td style="font-size: 40px; font-weight: bold; text-align: center; padding: 25px; border-top: 2px solid;">จำนวน 650 คัน</td>
			  	</tr>
			</table>
        </div>
   </div>				

	
	<script>
		window.print();
    </script>
	
</body>
</html>