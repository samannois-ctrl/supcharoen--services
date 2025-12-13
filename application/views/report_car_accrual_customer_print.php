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
				zoom:80%;}
			
			@page { 
				size: a4 landscape;
				/*size: a5 landscape;
				size: landscape;*/
			}
			.table .tr .td {
				font-size: 16px;	
			}
			
			.table td, .table th, .card .table td, .card .table th, .card .dataTable td, .card .dataTable th{
				padding: 2px !important;
				vertical-align: middle;
				 
			}
		}
	</style>
</head>									
<body>	
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>   
    <tr>
      <td height="35" colspan="3" align="center" style="font-size: 18px; font-weight: bold;">รายงานลูกค้าค้างจ่าย<br>
      วันที่ 1 - 30 มีนาคม 2565</td>
    </tr>   
    <tr>
      <td height="35">&nbsp;</td>
      <td height="35">&nbsp;</td>
      <td height="35">&nbsp;</td>
    </tr>
  </tbody>
</table>
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column full-width">
                                        <thead>
                                            <tr>
                                                	<th style="text-align: center">ลำดับ</th>
													<th style="text-align: center">ชื่อ - นามสกุล</th>
													<th style="text-align: center">ทะเบียนรถ</th>
													<th style="text-align: center">บริษัท</th>
													<th style="text-align: center">ประเภทรายได้</th>
													<th style="text-align: center">วันคุ้มครอง</th>
													<th style="text-align: center">เบี้ยสุทธิ</th>
													<th style="text-align: center">เบี้ยรวม</th>
													<th style="text-align: center">ส่วนลด</th>
													<th style="text-align: center">เบี้ยหลังหักส่วนลด</th>
													<th style="text-align: center">เบี้ยชำระแล้ว</th>
													<th style="text-align: center">เบี้ยค้างชำระ</th>
													<th style="text-align: center">สถานะ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
												<tr class="odd gradeX">
													<td style="text-align: center">1</td>
													<td>สร้อยกรัณฑ์ จันทร์ทอง</td>
													<td>4กฆ-1036 กทม.</td>
													<td>CHUBB</td>
													<td>ประกันชั้น 2</td>
													<td style="text-align: center">01/10/65</td>
													<td style="text-align: right">12,119.00</td>
													<td style="text-align: right">13,019.76</td>
													<td style="text-align: right">0.76</td>
													<td style="text-align: right">13,019.00</td>
													<td style="text-align: right">10,019.00</td>
													<td style="text-align: right">3,000.00</td>													
													<td style="text-align: center"><button class="btn btn-xs btn-warning"> ค้างชำระ </button></td>
												</tr>
												<tr class="odd gradeX">
													<td style="text-align: center">&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>CHUBB</td>
													<td>ค่า พ.ร.บ.</td>
													<td style="text-align: center">01/10/65</td>
													<td style="text-align: right">12,119.00</td>
													<td style="text-align: right">13,019.76</td>
													<td style="text-align: right">0.76</td>
													<td style="text-align: right">13,019.00</td>
													<td style="text-align: right">13,019.00</td>
													<td style="text-align: right">0.00</td>													
													<td style="text-align: center"><button class="btn btn-xs btn-success"> ชำระแล้ว </button></td>
												</tr>
												<tr class="odd gradeX">
													<td style="text-align: center">&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>ค่าภาษี</td>
													<td style="text-align: center">01/10/65</td>
													<td style="text-align: right">12,119.00</td>
													<td style="text-align: right">13,019.76</td>
													<td style="text-align: right">0.76</td>
													<td style="text-align: right">13,019.00</td>
													<td style="text-align: right">13,019.00</td>
													<td style="text-align: right">0.00</td>													
													<td style="text-align: center"><button class="btn btn-xs btn-success"> ชำระแล้ว </button></td>
												</tr>
												<tr class="odd gradeX">
													<td style="text-align: center">&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>ค่าตรวจสภาพรถ</td>
													<td style="text-align: center">01/10/65</td>
													<td style="text-align: right">12,119.00</td>
													<td style="text-align: right">13,019.76</td>
													<td style="text-align: right">0.76</td>
													<td style="text-align: right">13,019.00</td>
													<td style="text-align: right">13,019.00</td>
													<td style="text-align: right">0.00</td>													
													<td style="text-align: center"><button class="btn btn-xs btn-success"> ชำระแล้ว </button></td>
												</tr>
												<tr class="odd gradeX">
													<td style="text-align: center">&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>ค่าบริการ</td>
													<td style="text-align: center">01/10/65</td>
													<td style="text-align: right">12,119.00</td>
													<td style="text-align: right">13,019.76</td>
													<td style="text-align: right">0.76</td>
													<td style="text-align: right">13,019.00</td>
													<td style="text-align: right">13,019.00</td>
													<td style="text-align: right">0.00</td>													
													<td style="text-align: center"><button class="btn btn-xs btn-success"> ชำระแล้ว </button></td>
												</tr>
												<tr class="odd gradeX">
													<td style="text-align: center">&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>งานขนส่ง</td>
													<td style="text-align: center">01/10/65</td>
													<td style="text-align: right">12,119.00</td>
													<td style="text-align: right">13,019.76</td>
													<td style="text-align: right">0.76</td>
													<td style="text-align: right">13,019.00</td>
													<td style="text-align: right">13,019.00</td>
													<td style="text-align: right">0.00</td>													
													<td style="text-align: center"><button class="btn btn-xs btn-success"> ชำระแล้ว </button></td>
												</tr>
												<tr class="odd gradeX">
													<td style="text-align: center">&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>ค่าอื่นๆ</td>
													<td style="text-align: center">01/10/65</td>
													<td style="text-align: right">12,119.00</td>
													<td style="text-align: right">13,019.76</td>
													<td style="text-align: right">0.76</td>
													<td style="text-align: right">13,019.00</td>
													<td style="text-align: right">13,019.00</td>
													<td style="text-align: right">0.00</td>													
													<td style="text-align: center"><button class="btn btn-xs btn-success"> ชำระแล้ว </button></td>
												</tr>
												<tr class="odd gradeX">
												  <td style="text-align: center">2</td>
												  <td>เอกพงษ์ วิจักษณานนท์</td>
												  <td>กพ 3233 สข</td>
												  <td>อลิอันซ์</td>
												  <td>ประกันชั้น 1</td>
												  <td style="text-align: center">20/10/65</td>
												  <td style="text-align: right">12,119.00</td>
												  <td style="text-align: right">13,019.76</td>
												  <td style="text-align: right">0.76</td>
												  <td style="text-align: right">13,019.00</td>
												  <td style="text-align: right">10,019.00</td>
												  <td style="text-align: right">3,000.00</td>
												  <td style="text-align: center"><button class="btn btn-xs btn-warning"> ค้างชำระ </button></td>
										  </tr>
												<tr class="odd gradeX">
												  <td style="text-align: center">&nbsp;</td>
												  <td>&nbsp;</td>
												  <td>&nbsp;</td>
												  <td>อลิอันซ</td>
												  <td>ค่า พ.ร.บ.</td>
												  <td style="text-align: center">20/10/65</td>
												  <td style="text-align: right">12,119.00</td>
												  <td style="text-align: right">13,019.76</td>
												  <td style="text-align: right">0.76</td>
												  <td style="text-align: right">13,019.00</td>
												  <td style="text-align: right">13,019.00</td>
												  <td style="text-align: right">0.00</td>
												  <td style="text-align: center"><button class="btn btn-xs btn-success"> ชำระแล้ว </button></td>
										  </tr>
												<tr class="odd gradeX">
												  <td style="text-align: center">3</td>
												  <td>วาริน แซ่ลิ้ม</td>
												  <td>อัคคีภัย</td>
												  <td>AXA</td>
												  <td>PL</td>
												  <td style="text-align: center">20/10/65</td>
												  <td style="text-align: right">12,119.00</td>
												  <td style="text-align: right">13,019.76</td>
												  <td style="text-align: right">0.76</td>
												  <td style="text-align: right">13,019.00</td>
												  <td style="text-align: right">10,019.00</td>
												  <td style="text-align: right">3,000.00</td>
												  <td style="text-align: center"><button class="btn btn-xs btn-warning"> ค้างชำระ </button></td>
										  </tr>
												<tr class="odd gradeX">
												  <td style="text-align: center">4</td>
												  <td>หจก. เอ็น.พี</td>
												  <td>&nbsp;</td>
												  <td>&nbsp;</td>
												  <td>ประกันชั้น 1</td>
												  <td style="text-align: center">20/10/65</td>
												  <td style="text-align: right">12,119.00</td>
												  <td style="text-align: right">13,019.76</td>
												  <td style="text-align: right">0.76</td>
												  <td style="text-align: right">13,019.00</td>
												  <td style="text-align: right">13,019.00</td>
												  <td style="text-align: right">0.00</td>
												  <td style="text-align: center"><button class="btn btn-xs btn-success"> ชำระแล้ว </button></td>
										  </tr>
												<tr class="odd gradeX">
												  <td style="text-align: center">&nbsp;</td>
												  <td>&nbsp;</td>
												  <td>&nbsp;</td>
												  <td>&nbsp;</td>
												  <td>ค่า พ.ร.บ.</td>
												  <td style="text-align: center">20/10/65</td>
												  <td style="text-align: right">12,119.00</td>
												  <td style="text-align: right">13,019.76</td>
												  <td style="text-align: right">0.76</td>
												  <td style="text-align: right">13,019.00</td>
												  <td style="text-align: right">13,019.00</td>
												  <td style="text-align: right">0.00</td>
												 <td style="text-align: center"><button class="btn btn-xs btn-success"> ชำระแล้ว </button></td>
										  </tr>
												<tr class="odd gradeX">
												  <td style="text-align: center">&nbsp;</td>
												  <td>&nbsp;</td>
												  <td>&nbsp;</td>
												  <td>&nbsp;</td>
												  <td>&nbsp;</td>
												  <td style="text-align: center">&nbsp;</td>
												  <td style="text-align: right">&nbsp;</td>
												  <td style="text-align: right">&nbsp;</td>
												  <td style="text-align: right">&nbsp;</td>
												  <td style="text-align: right">&nbsp;</td>
												  <td style="text-align: right">&nbsp;</td>
												  <td style="text-align: right">&nbsp;</td>
												  <td style="text-align: center">&nbsp;</td>
										  </tr>
												<tr class="odd gradeX">
												  <td style="text-align: center">&nbsp;</td>
												  <td>&nbsp;</td>
												  <td>&nbsp;</td>
												  <td>&nbsp;</td>
												  <td style="text-align: right"><strong>รวมทั้งสิ้น</strong></td>
												  <td style="text-align: center">&nbsp;</td>
												  <td style="text-align: right"><strong>99,999.99</strong></td>
												  <td style="text-align: right"><strong>99,999.99</strong></td>
												  <td style="text-align: right"><strong>999.99</strong></td>
												  <td style="text-align: right"><strong>99,999.99</strong></td>
												  <td style="text-align: right"><strong>99,999.99</strong></td>
												  <td style="text-align: right"><strong>99,999.99</strong></td>
												  <td style="text-align: center">&nbsp;</td>
										  </tr>
                                        </tbody>
                                    </table>

<script>
		window.print();
    </script>
</body>
</html>