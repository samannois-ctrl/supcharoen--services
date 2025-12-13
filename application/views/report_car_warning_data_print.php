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
      <td height="35" colspan="3" align="center" style="font-size: 18px; font-weight: bold;">รายงานแจ้งเตือนใกล้หมดอายุ<br>
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
  <tbody>
    <tr bgcolor="#dcdcdc">
      <th rowspan="2" style="text-align: center">ลำดับ</th>
      <th rowspan="2" style="text-align: center">ชื่อ-นามสกุล</th>
      <th rowspan="2" style="text-align: center">ทะเบียน</th>
      <th rowspan="2" style="text-align: center">โทรศัพท์</th>
      <th colspan="2" style="text-align: center">ประกันภัย</th>
      <th colspan="2" style="text-align: center">พ.ร.บ.</th>
      <th colspan="2" style="text-align: center">ภาษี</th>
      <th rowspan="2" style="text-align: center">หมายเหตุ</th>
    </tr>
    <tr bgcolor="#dcdcdc">
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
      <td align="center">4กฆ-1036 กทม.</td>
      <td align="center">xxxxxxxxxx</td>
      <td align="center">01/07/65<br>
        เลยกำหนด 90 วัน</td>
      <td align="center"><input type="checkbox"></td>
      <td align="center">01/07/65<br>
        เลยกำหนด 90 วัน</td>
      <td align="center"><input type="checkbox"></td>
      <td align="center"></td>
      <td align="center">&nbsp;</td>
      <td style="text-align: center"></td>
    </tr>
    <tr>
      <td style="text-align: center">2</td>
      <td>Jens Brincker</td>
      <td align="center">4กฆ-1036 กทม.</td>
      <td align="center">xxxxxxxxxx</td>
      <td align="center" class="odd gradeX">01/07/65<br>
        เลยกำหนด 90 วัน</td>
      <td align="center" class="odd gradeX"><input type="checkbox" checked>
        <br>
        <span style="font-size: 14px; color:#AF0002">30/6/65</span></td>
      <td align="center" class="odd gradeX">&nbsp;</td>
      <td align="center" class="odd gradeX">&nbsp;</td>
      <td align="center" class="odd gradeX">01/07/65<br>
        เลยกำหนด 90 วัน</td>
      <td align="center" class="odd gradeX"><input type="checkbox" checked><br>
		  <span style="font-size: 14px; color:#AF0002">30/6/65</span>
		</td>
      <td style="text-align: center">
        <span style="font-size: 14px; color:#AF0002">ไม่รับสาย 24/6/65</span></td>
    </tr>
    <tr class="odd gradeX">
      <td style="text-align: center">3</td>
      <td>Jens Brincker</td>
      <td align="center">4กฆ-1036 กทม.</td>
      <td align="center">xxxxxxxxxx</td>
      <td align="center">01/10/65</td>
      <td align="center"><input type="checkbox"></td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td style="text-align: center">&nbsp;</td>
    </tr>
    <tr>
      <td style="text-align: center">4</td>
      <td>Jens Brincker</td>
      <td align="center">4กฆ-1036 กทม.</td>
      <td align="center">xxxxxxxxxx</td>
      <td align="center">01/10/65</td>
      <td align="center" class="odd gradeX"><input type="checkbox"></td>
      <td align="center" class="odd gradeX">01/10/65</td>
      <td align="center" class="odd gradeX"><input type="checkbox"></td>
      <td align="center" class="odd gradeX">&nbsp;</td>
      <td align="center" class="odd gradeX">&nbsp;</td>
      <td class="odd gradeX" style="text-align: center">&nbsp;</td>
    </tr>
    <tr>
      <td style="text-align: center">5</td>
      <td>Jens Brincker</td>
      <td align="center">4กฆ-1036 กทม.</td>
      <td align="center">xxxxxxxxxx</td>
      <td align="center">01/10/65</td>
      <td align="center" class="odd gradeX"><input type="checkbox"></td>
      <td align="center" class="odd gradeX">&nbsp;</td>
      <td align="center" class="odd gradeX">&nbsp;</td>
      <td align="center" class="odd gradeX">&nbsp;</td>
      <td align="center" class="odd gradeX">&nbsp;</td>
      <td class="odd gradeX" style="text-align: center">&nbsp;</td>
    </tr>
    <tr class="odd gradeX">
      <td style="text-align: center">6</td>
      <td>Jens Brincker</td>
      <td align="center">4กฆ-1036 กทม.</td>
      <td align="center">xxxxxxxxxx</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">01/10/65</td>
      <td align="center"><input type="checkbox"></td>
      <td style="text-align: center">&nbsp;</td>
    </tr>
    <tr>
      <td style="text-align: center">7</td>
      <td>Jens Brincker</td>
      <td align="center">4กฆ-1036 กทม.</td>
      <td align="center">xxxxxxxxxx</td>
      <td align="center">01/10/65</td>
      <td align="center" class="odd gradeX"><input type="checkbox"></td>
      <td align="center" class="odd gradeX">01/10/65</td>
      <td align="center" class="odd gradeX"><input type="checkbox"></td>
      <td align="center" class="odd gradeX">&nbsp;</td>
      <td align="center" class="odd gradeX">&nbsp;</td>
      <td class="odd gradeX" style="text-align: center">&nbsp;</td>
    </tr>
    <tr class="odd gradeX">
      <td style="text-align: center">8</td>
      <td>Jens Brincker</td>
      <td align="center">4กฆ-1036 กทม.</td>
      <td align="center">xxxxxxxxxx</td>
      <td align="center">01/10/65</td>
      <td align="center"><input type="checkbox"></td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">01/10/65</td>
      <td align="center"><input type="checkbox"></td>
      <td style="text-align: center">&nbsp;</td>
    </tr>
  </tbody>
</table>
<script>
		window.print();
    </script>
</body>
</html>