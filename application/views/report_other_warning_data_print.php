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
      <td height="35" colspan="3" align="center" style="font-size: 18px; font-weight: bold;">รายงานแจ้งเตือนใกล้หมดอายุ (ประกันเบ็ดเตล็ด)<br>
      วันที่ 1 - 30 มีนาคม 2565</td>
    </tr>   
    <tr>
      <td height="35">&nbsp;</td>
      <td height="35">&nbsp;</td>
      <td height="35">&nbsp;</td>
    </tr>
  </tbody>
</table>
<table class="table table-striped table-bordered table-hover table-checkable order-column full-width" id="example4">
  <tbody>
    <tr bgcolor="#dcdcdc">
      <th rowspan="2" style="text-align: center">ลำดับ</th>
      <th rowspan="2" style="text-align: center">ชื่อ-นามสกุล</th>
      <th rowspan="2" style="text-align: center">โทรศัพท์</th>
      <th rowspan="2" style="text-align: center">เลขที่กรมธรรม์</th>
      <th colspan="2" style="text-align: center">ประกันอัคคีภัย</th>
      <th colspan="2" style="text-align: center">ประกันขนส่ง</th>
      <th colspan="2" style="text-align: center">ประกันอุบัติเหตุ</th>
      <th colspan="2" style="text-align: center">ประกันท่องเที่ยว</th>
      <th rowspan="2" style="text-align: center">หมายเหตุ</th>
    </tr>
    <tr bgcolor="#dcdcdc">
      <th style="text-align: center">วันหมดอายุ</th>
      <th style="text-align: center">ปิดแจ้งเตือน</th>
      <th style="text-align: center">วันหมดอายุ</th>
      <th style="text-align: center">ปิดแจ้งเตือน</th>
      <th style="text-align: center">วันหมดอายุ</th>
      <th style="text-align: center">ปิดแจ้งเตือน</th>
      <th style="text-align: center">วันหมดอายุ</th>
      <th style="text-align: center">ปิดแจ้งเตือน</th>
    </tr>
    <tr class="odd gradeX">
      <td style="text-align: center">1</td>
      <td>Jens Brincker</td>
      <td align="center">099-9997788</td>
      <td align="center">12345-67890</td>
      <td align="center">01/07/65<br>
        เลยกำหนด 90 วัน</td>
      <td align="center"><input type="checkbox"></td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center"></td>
      <td align="center">&nbsp;</td>
      <td align="center"></td>
      <td align="center">&nbsp;</td>
      <td style="text-align: center">
        <br>
        <span style="font-size: 14px; color:#AF0002"></span></td>
    </tr>
    <tr>
      <td style="text-align: center">2</td>
      <td>Jens Brincker</td>
      <td align="center" class="odd gradeX">099-9997788</td>
      <td align="center" class="odd gradeX">12345-67890</td>
      <td align="center" class="odd gradeX">&nbsp;</td>
      <td align="center" class="odd gradeX">&nbsp;</td>
      <td align="center" class="odd gradeX">01/07/65<br>
        เลยกำหนด 90 วัน</td>
      <td align="center" class="odd gradeX"><input type="checkbox" checked>
        <br>
        <span style="font-size: 14px; color:#AF0002">30/6/65</span></td>
      <td align="center" class="odd gradeX">&nbsp;</td>
      <td align="center" class="odd gradeX">&nbsp;</td>
      <td align="center"></td>
      <td align="center">&nbsp;</td>
      <td style="text-align: center">
        <span style="font-size: 14px; color:#AF0002">ไม่รับสาย 24/6/65</span></td>
    </tr>
    <tr class="odd gradeX">
      <td style="text-align: center">3</td>
      <td>Jens Brincker</td>
      <td align="center">099-9997788</td>
      <td align="center">12345-67890</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">01/12/65<br></td>
      <td align="center"><input type="checkbox"></td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td style="text-align: center">
        <br>
        <span style="font-size: 14px; color:#AF0002"></span></td>
    </tr>
    <tr class="odd gradeX">
      <td style="text-align: center">4</td>
      <td>Jens Brincker</td>
      <td align="center">099-9997788</td>
      <td align="center">12345-67890</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">20/12/65<br></td>
      <td align="center"><input type="checkbox"></td>
      <td style="text-align: center">
        <br>
        <span style="font-size: 14px; color:#AF0002"></span></td>
    </tr>
    <tr class="odd gradeX">
      <td style="text-align: center">5</td>
      <td>Jens Brincker</td>
      <td align="center">099-9997788</td>
      <td align="center">12345-67890</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">10/10/66</td>
      <td align="center"><input type="checkbox"></td>
      <td align="center"></td>
      <td align="center">&nbsp;</td>
      <td style="text-align: center">
        <br>
        <span style="font-size: 14px; color:#AF0002"></span></td>
    </tr>
  </tbody>
</table>
<script>
		window.print();
    </script>
</body>
</html>