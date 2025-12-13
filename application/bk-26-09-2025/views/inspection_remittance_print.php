<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
	<?php include("header.php"); ?>
	<style>
		@media print {
			body {		
				background-color: #fff;				
				color: #000;
				zoom:85%;
			}
			
			@page { 
				size: a4;
				margin: 5;*
				/*size: a5 landscape;
				size: landscape;*/
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
                                    <p style="font-size: 16px; font-weight: bold">ใบส่งเงิน ตรอ. วันที่ 1 ตุลาคม 2565</p>                                    
                                </div>
                                <div class="card-body ">
                                  
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tbody>
                                        <tr>
                                          <td width="230"><strong>1. ค่าตรวจ ตรอ.</strong></td>
                                          <td width="150">&nbsp;</td>
                                          <td width="50">&nbsp;</td>
                                          <td width="200">&nbsp;</td>
                                          <td width="150">&nbsp;</td>
                                          <td width="50">&nbsp;</td>
                                          <td width="230">&nbsp;</td>
                                          <td width="150">&nbsp;</td>
                                          <td width="50">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td width="230" align="right">รถยนต์ 200 บาท</td>
                                          <td width="150" style="text-align: center; border-bottom: 1px solid;"><?php echo $getData['countInspectCar']?></td>
                                          <td width="50">คัน</td>
                                          <td width="200" align="right">รวม</td>
                                          <td width="150" style="text-align: center; border-bottom: 1px solid;"><?php echo number_format($getData['countInspectCar']*200)?></td>
                                          <td width="50">บาท</td>
                                          <td width="230">&nbsp;</td>
                                          <td width="150">&nbsp;</td>
                                          <td width="50">&nbsp;</td><?php echo number_format($getData['countInspectCar']*200)?>
                                        </tr>
                                        <tr>
                                          <td width="230" align="right">รถ จยย. 60 บาท</td>
                                          <td width="150" style="text-align: center; border-bottom: 1px solid;"><?php echo $getData['countInspectBike']?></td>
                                          <td width="50">คัน</td>
                                          <td width="200" align="right">รวม</td>
                                          <td width="150" style="text-align: center; border-bottom: 1px solid;"><?php echo number_format($getData['countInspectBike']*60)?></td>
                                          <td width="50">บาท</td>
                                          <td width="230">&nbsp;</td>
                                          <td width="150">&nbsp;</td>
                                          <td width="50">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td width="230" align="right">&nbsp;</td>
                                          <td width="150">&nbsp;</td>
                                          <td width="50">&nbsp;</td>
                                          <td width="200" align="right">&nbsp;</td>
                                          <td width="150">&nbsp;</td>
                                          <td width="50">&nbsp;</td>
                                          <td width="230">&nbsp;</td>
                                          <td width="150">&nbsp;</td>
                                          <td width="50">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td width="230" align="right">รถยนต์ ฟรี / ยกเลิก</td>
                                          <td width="150" style="text-align: center; border-bottom: 1px solid;">0</td>
                                          <td width="50">คัน</td>
                                          <td width="200" align="right">ไม่ผ่าน</td>
                                          <td width="150" style="text-align: center; border-bottom: 1px solid;">0</td>
                                          <td width="50">คัน</td>
                                          <td width="230">&nbsp;</td>
                                          <td width="150">&nbsp;</td>
                                          <td width="50">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td width="230" align="right">รถ จยย. ฟรี / ยกเลิก</td>
                                          <td width="150" style="text-align: center; border-bottom: 1px solid;">0</td>
                                          <td width="50">คัน</td>
                                          <td width="200" align="right">ไม่ผ่าน</td>
                                          <td width="150" style="text-align: center; border-bottom: 1px solid;">0</td>
                                          <td width="50">คัน</td>
                                          <td width="230" align="right">รวมรับค่าตรวจ</td>
                                          <td width="150" style="text-align: center; border-bottom: 1px solid;"><?php echo number_format(($getData['countInspectCar']*200)+($getData['countInspectBike']*60))?> </td>
                                          <td width="50">บาท</td>
                                        </tr>
                                        <tr>
                                          <td width="230">&nbsp;</td>
                                          <td width="150">&nbsp;</td>
                                          <td width="50">&nbsp;</td>
                                          <td width="200">&nbsp;</td>
                                          <td width="150">&nbsp;</td>
                                          <td width="50">&nbsp;</td>
                                          <td width="230">&nbsp;</td>
                                          <td width="150">&nbsp;</td>
                                          <td width="50">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td width="230"><strong>2. ค่ารับต่อภาษี</strong></td>
                                          <td width="150">&nbsp;</td>
                                          <td width="50">&nbsp;</td>
                                          <td width="200">&nbsp;</td>
                                          <td width="150">&nbsp;</td>
                                          <td width="50">&nbsp;</td>
                                          <td width="230">&nbsp;</td>
                                          <td width="150">&nbsp;</td>
                                          <td width="50">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td width="230" align="right">จำนวน</td>
                                          <td width="150">&nbsp;</td>
                                          <td width="50">&nbsp;</td>
                                          <td width="200" align="right"><strong><u>หัก</u></strong> จำนวน</td>
                                          <td width="150">&nbsp;</td>
                                          <td width="50">&nbsp;</td>
                                          <td width="230">&nbsp;</td>
                                          <td width="150">&nbsp;</td>
                                          <td width="50">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td width="230" align="right">(10 คัน) x 80 บาท</td>
                                          <td width="150" style="text-align: center; border-bottom: 1px solid;">2,000.00 </td>
                                          <td width="50">บาท</td>
                                          <td width="200" align="right">(10 คัน) x 20 บาท</td>
                                          <td width="150" style="text-align: center; border-bottom: 1px solid;">1,200.00</td>
                                          <td width="50">บาท</td>
                                          <td width="230" align="right">เหลือรับค่าบริการฝาก</td>
                                          <td width="150" style="text-align: center; border-bottom: 1px solid;">2,000.00 </td>
                                          <td width="50">บาท</td>
                                        </tr>
                                        <tr>
                                          <td width="230">&nbsp;</td>
                                          <td width="150">&nbsp;</td>
                                          <td width="50">&nbsp;</td>
                                          <td width="200">&nbsp;</td>
                                          <td width="150">&nbsp;</td>
                                          <td width="50">&nbsp;</td>
                                          <td width="230">&nbsp;</td>
                                          <td width="150">&nbsp;</td>
                                          <td width="50">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td><strong>3. ค่า พ.ร.บ.</strong></td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td align="right">รถยนต์ รับ</td>
                                          <td style="text-align: center; border-bottom: 1px solid;">1,000.00</td>
                                          <td>บาท</td>
                                          <td width="200" align="right"><strong><u>หัก</u></strong> ส่ง</td>
                                          <td style="text-align: center; border-bottom: 1px solid;">500.00</td>
                                          <td>บาท</td>
                                          <td align="right">รับสุทธิ พรบ. รถยนต์</td>
                                          <td style="text-align: center; border-bottom: 1px solid;">2,000.00 </td>
                                          <td>บาท</td>
                                        </tr>
                                        <tr>
                                          <td align="right">รถ จยย. รับ</td>
                                          <td style="text-align: center; border-bottom: 1px solid;">1,000.00</td>
                                          <td>บาท</td>
                                          <td width="200" align="right"><strong><u>หัก</u></strong> ส่ง</td>
                                          <td style="text-align: center; border-bottom: 1px solid;">500.00</td>
                                          <td>บาท</td>
                                          <td align="right">รับสุทธิ พรบ. รถ จยย.</td>
                                          <td style="text-align: center; border-bottom: 1px solid;">2,000.00 </td>
                                          <td>บาท</td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td><strong>4. รับอื่นๆ</strong></td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td align="right">รวมรับ 4 รายการ</td>
                                          <td style="text-align: center; border-bottom: 1px solid;">2,000.00 </td>
                                          <td>บาท</td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td><strong>รายการหัก</strong></td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td align="right">ค่าข้าว</td>
                                          <td style="text-align: center; border-bottom: 1px solid;">150.00</td>
                                          <td>บาท</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td align="right">อื่นๆ</td>
                                          <td style="text-align: center; border-bottom: 1px solid;">100.00</td>
                                          <td>บาท</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td align="right">รวมรายจ่าย</td>
                                          <td style="text-align: center; border-bottom: 1px solid;">2,000.00 </td>
                                          <td>บาท</td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td height="30" align="right"><strong>*ส่งเงินประจำวัน</strong></td>
                                          <td height="30" style="text-align: center; border-bottom: 1px solid;"><strong>2,000.00 </strong></td>
                                          <td height="30"><strong>บาท</strong></td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td height="30" align="right"><strong>รวม</strong></td>
                                          <td height="30" style="text-align: center; border-bottom: double;"><strong>2,000.00 </strong></td>
                                          <td height="30"><strong>บาท</strong></td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
				
		
	<script>
		window.print();
    </script>
	
</body>
</html>