<!DOCTYPE html>
<html>
<head>
    <?php include("header.php"); ?>
    <title>ใบเสร็จรับเงิน</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  <link href="Form/style_font_form.css" rel="stylesheet">-->
    <style>
		@media print {
            body {
                background-color: #fff;
                zoom: 70%;
            }
			
			@page { 
				size: a5;
				/*size: a5 landscape;
				size: landscape;*/
			}
        }
		
        .dotted {
            border: 2px solid #000000;
            border-radius: 15px;
        }
        td span {
            width: 60px;
        }
        #tdwhn {
            border: 1px solid white;
        }
        #sp p {
            line-height: 1;
            margin: 0px;
        }
        #footer {
            float: right;
            font-size: 10px;
            bottom: 0px;
            margin-right: auto;
            margin-left: auto;
        }
        
        .bd-black {
            border: 1px solid #000;
        }
    </style>
</head>
<body style="background: #ffffff; margin:0px;padding: 0px">
    <div class="panel-body" style="height: 1000px;width: 1050px;background: #ffffff ">
        <form role="form" class="form-horizontal form-groups-bordered" id="frm1">
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td valign="top">
                            <table width="97%" border="0" align="left" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <!--<tr>
			<td width="160" height="140" style="vertical-align: top; text-align: left"><img src="assets/images/avatars/avatar2.png" width="150" height="auto" alt=""/></td>
			<td valign="top" style="padding-top: 12px;">
				<font style="font-family: 'sarabun_regular', sans-serif; font-size: 17pt; font-weight: 600; line-height:18px">บริษัท จอห์น โบรคเกอร์แอนด์เซอร์วิส จำกัด</font><br>
				<font style="font-family: 'sarabun_regular', sans-serif; font-size: 11pt; line-height:36px">เลขที่ผู้เสียภาษี 0905564001437</font><br>
				<font style="font-family: 'sarabun_regular', sans-serif; font-size: 11pt; line-height: 24px">64/92 ถนนนิพัทธ์สงเคราะห์ 2 ซอย 2 ตำบลหาดใหญ่ อำเภอหาดใหญ่ จังหวัดสงขลา <br>
				โทรศัพท์ 074-816288, 097-3569968, 085-6745367</font>
			</td>
		</tr>-->
                                    <tr>
                                        <td>
                                            <br>
                                            <!--<font style="font-family: 'sarabun_regular', sans-serif; font-size: 17pt; font-weight: 600; line-height:18px;">นางสาวโดมพัชร บุญชู</font><br>-->
                                            <font style="font-size: 17pt; font-weight: 600; line-height:18px;">บริษัท ทรัพย์เจริญ โบรกเกอร์ ประกันภัย จำกัด</font><br>
                                            <font style="font-size: 11pt; line-height:36px">536 ถ.รัถการ ต.หาดใหญ่ อ.หาดใหญ่ จ.สงขลา 90110</font><br>
                                            <font style="font-size: 11pt; line-height: 24px">โทร. 097-3245364, 081-2362323
                                            </font>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td valign="top" style="padding-top: 20px;">
                            <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td style="float:right; text-align: center; padding: 15px 10px 10px 10px; font-weight: 600; font-size: 20pt;" width="300" height="130" class="dotted">
                                            ใบรับเงิน<br><span style="font-size: 16pt; font-weight: 600;">RECEIPT</span>
                                        </td>
                                    </tr>
                                    <!--<tr> 
		                                <td style="float:right;text-align: center;padding: 10px" width="300" height="130" class="dotted" valign="bottom" ><h4 style="font-size: 20pt">ใบเสร็จรับเงิน<br><span style="font-size: 16pt">RECEIPT</span></h4>
		                                </td>
	                                    </tr> -->
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table width="1050" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:5px;">
                <tbody>
                    <tr>
                        <td valign="top">
                            <table border="0" align="left" cellpadding="0" cellspacing="0" style="padding:10px 10px 0px 5px; width: 697px">
                                <tbody>
                                    <!-- <tr>
        <td width="20" align="left" valign="bottom" style="line-height:28px" ><span style="font-size: 15pt; font-weight: 600;">รหัส</span></td>
      	<td width="40" align="left" valign="top" style="font-size: 14pt; " colspan="3"> &nbsp; </td>
    </tr>
    <tr>
        <td style="font-size: 16pt; line-height:24px" width="35" align="left" valign="bottom" colspan="2">(Code)</td>
    </tr>-->
                                    <tr>
                                        <td width="109" align="left" valign="bottom" style="line-height:28px"><span style="font-size: 15pt; font-weight: 600;">ชื่อลูกค้า</span></td>
                                        <td width="588" align="left" valign="" style="font-size: 14pt;">คุณ สมหมาย ใจดี</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 16pt;line-height:24px" align="left" valign="bottom" colspan="2">(Customer Name)</td>
                                    </tr>
                                    <tr>
                                        <td width="109" align="left" valign="bottom" style="line-height:28px"><span style="font-size: 15pt; font-weight: 600;">ที่อยู่</span></td>
                                        <td width="588" align="left" valign="" style="font-size: 14pt;" colspan="3"> </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 16pt;line-height:24px" align="left" valign="bottom" colspan="2">(Address)</td>
                                    </tr>
                                    <tr>
                                        <td width="109" align="left" valign="bottom" style="line-height:28px"><span style="font-size: 15pt; font-weight: 600;">โทรศัพท์</span></td>
                                        <td width="588" align="left" valign="" style="font-size: 14pt;">095-xxxxxxx</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 16pt;line-height:24px" align="left" valign="bottom" colspan="2">(Telephone)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td valign="top">
                            <table align="left" cellpadding="0" cellspacing="0" style="font-size: 20pt; padding:10px 10px 0px 5px; width: 350px;">
                                <tbody>
                                    <tr>
                                        <td width="40%" align="left" valign="bottom" style="line-height:22px;padding-top: 5px"><span style="font-size: 15pt; font-weight: 600;">&nbsp;เลขที่เอกสาร</span><span style="font-size: 16pt;"><br>
                                                &nbsp;(No.)</span></td>
                                        <td width="60%" align="left" valign="top" style="padding-top: 8px; font-size: 14pt;">xxxx-xxxxxx-xxxx</td>
                                    </tr>
                                    <tr>
                                        <td width="40%" align="left" valign="bottom" style="line-height:22px; padding-top: 5px"><span style="font-size: 15pt; font-weight: 600;"></span><span style="font-size: 16pt;font-weight: 600;">&nbsp;วันที่</span><span style="font-size: 16pt;"><br>
                                                &nbsp;(Date)</span></td>
                                        <td width="60%" align="left" valign="top" style="padding-top: 8px; font-size: 14pt;">01/11/25xx</td>
                                    </tr>
                                    <tr>
                                        <td width="40%" align="left" valign="bottom" style="line-height:22px; padding-top: 5px"><span style="font-size: 15pt; font-weight: 600;"></span><span style="font-size: 16pt;font-weight: 600;">&nbsp;ทะเบียนรถ</span><span style="font-size: 15pt;"><br>
                                                &nbsp;(License Plate)</span></td>
                                        <td width="60%" align="left" valign="top" style="padding-top: 8px; font-size: 14pt;">กข-321 สข.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" style="font-size: 20pt;margin-top: 5px;">
                <tbody>
                    <tr>
                        <th style="width: 85px;text-align:center;font-size: 15pt;padding: 10px;" class="bd-black">ลำดับที่<br>
                            No</th>
                        <th style="width: 677px;text-align:center;font-size: 15pt;padding: 10px;" class="bd-black">รายการ<br>
                            Description</th>
                        <th style="text-align:center;font-size: 15pt;padding: 10px;" class="bd-black">จำนวน<br>
                            Quantity <br></th>
                        <th style="text-align:center;font-size: 15pt;padding: 10px;" class="bd-black">ราคา<br>
                            Price <br></th>
                    </tr>
                    <tr style="border-bottom: 0px;border-bottom-color: white;font-size: 14pt;">
                        <td class="bd-black" style="text-align:center;"></td>
                        <td class="bd-black" style="padding: 10px;border-bottom: 0px;">&nbsp;</td>
                        <td class="bd-black" style="text-align:center;padding: 10px;border-bottom: 0px;">&nbsp;</td>
                        <td class="bd-black" style="text-align:center;padding: 10px;border-bottom: 0px;">&nbsp;</td>
                    </tr>
                    <tr style="border-bottom: 0px;border-bottom-color: white;font-size: 14pt;">
                        <td class="bd-black" style="text-align:center;"></td>
                        <td class="bd-black" style="padding: 10px;border-bottom: 0px;">&nbsp;</td>
                        <td class="bd-black" style="text-align:center;padding: 10px;border-bottom: 0px;">&nbsp;</td>
                        <td class="bd-black" style="text-align:center;padding: 10px;border-bottom: 0px;">&nbsp;</td>
                    </tr>
                    <tr style="border-bottom: 0px;border-bottom-color: white;font-size: 14pt;">
                        <td class="bd-black" style="text-align:center;"></td>
                        <td class="bd-black" style="padding: 10px;border-bottom: 0px;">&nbsp;</td>
                        <td class="bd-black" style="text-align:center;padding: 10px;border-bottom: 0px;">&nbsp;</td>
                        <td class="bd-black" style="text-align:center;padding: 10px;border-bottom: 0px;">&nbsp;</td>
                    </tr>
                    <tr style="border-bottom: 0px;border-bottom-color: white;font-size: 14pt;">
                        <td class="bd-black" style="text-align:center;"></td>
                        <td class="bd-black" style="padding: 10px;border-bottom: 0px;">&nbsp;</td>
                        <td class="bd-black" style="text-align:center;padding: 10px;border-bottom: 0px;">&nbsp;</td>
                        <td class="bd-black" style="text-align:center;padding: 10px;border-bottom: 0px;">&nbsp;</td>
                    </tr>
                    <tr style="border-bottom: 0px;border-bottom-color: white;font-size: 14pt;">
                        <td class="bd-black" style="text-align:center;"></td>
                        <td class="bd-black" style="padding: 10px;border-bottom: 0px;">&nbsp;</td>
                        <td class="bd-black" style="text-align:center;padding: 10px;border-bottom: 0px;">&nbsp;</td>
                        <td class="bd-black" style="text-align:center;padding: 10px;border-bottom: 0px;">&nbsp;</td>
                    </tr>
                    <tr style="border-bottom: 0px;border-bottom-color: white;font-size: 14pt;">
                        <td class="bd-black" style="text-align:center;"></td>
                        <td class="bd-black" style="padding: 10px;border-bottom: 0px;">&nbsp;</td>
                        <td class="bd-black" style="text-align:center;padding: 10px;border-bottom: 0px;">&nbsp;</td>
                        <td class="bd-black" style="text-align:center;padding: 10px;border-bottom: 0px;">&nbsp;</td>
                    </tr>
                    <tr style="border-bottom: 0px;border-bottom-color: white;font-size: 14pt;">
                        <td class="bd-black" style="text-align:center;"></td>
                        <td class="bd-black" style="padding: 10px;border-bottom: 0px;">&nbsp;</td>
                        <td class="bd-black" style="text-align:center;padding: 10px;border-bottom: 0px;">&nbsp;</td>
                        <td class="bd-black" style="text-align:center;padding: 10px;border-bottom: 0px;">&nbsp;</td>
                    </tr>
                    <tr style="border-bottom: 0px;border-bottom-color: white;font-size: 14pt;">
                        <td class="bd-black" style="text-align:center;"></td>
                        <td class="bd-black" style="padding: 10px;border-bottom: 0px;">&nbsp;</td>
                        <td class="bd-black" style="text-align:center;padding: 10px;border-bottom: 0px;">&nbsp;</td>
                        <td class="bd-black" style="text-align:center;padding: 10px;border-bottom: 0px;">&nbsp;</td>
                    </tr>
                    <tr style="border-bottom: 0px;border-bottom-color: white;font-size: 14pt;">
                        <td class="bd-black" style="text-align:center;"></td>
                        <td class="bd-black" style="padding: 10px;border-bottom: 0px;">&nbsp;</td>
                        <td class="bd-black" style="text-align:center;padding: 10px;border-bottom: 0px;">&nbsp;</td>
                        <td class="bd-black" style="text-align:center;padding: 10px;border-bottom: 0px;">&nbsp;</td>
                    </tr>
                    <tr style="border-bottom: 0px;border-bottom-color: white;font-size: 14pt;">
                        <td class="bd-black" style="text-align:center;"></td>
                        <td class="bd-black" style="padding: 10px;border-bottom: 0px;">&nbsp;(ยอดค้างชำระ 1,958.86 บาท)</td>
                        <td class="bd-black" style="text-align:center;padding: 10px;border-bottom: 0px;">&nbsp;</td>
                        <td class="bd-black" style="text-align:center;padding: 10px;border-bottom: 0px;">&nbsp;</td>
                    </tr>
                    <tr style="border-bottom: 0px;border-bottom-color: white;font-size: 14pt;">
                        <td class="bd-black" style="text-align:center;"></td>
                        <td class="bd-black" style="padding: 10px;border-bottom: 0px;">&nbsp;</td>
                        <td class="bd-black" style="text-align:center;padding: 10px;border-bottom: 0px;">&nbsp;</td>
                        <td class="bd-black" style="text-align:center;padding: 10px;border-bottom: 0px;">&nbsp;</td>
                    </tr>
                </tbody>
            </table>
            <table width="100%" border="1" align="left" cellpadding="0" cellspacing="0" style="margin-top:5px;margin-right:3px">
                <tbody>
                    <tr>
                        <td style="width:697px">
                            <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td width="10%" align="left" valign="top" style=" padding-top: 16px;">
                                            <div style="font-size: 15pt; font-weight: 600;">&nbsp;หมายเหตุ</div>
                                            <div style="font-size: 15pt;">&nbsp;(Remark)</div>
                                        </td>
                                        <td align="left" valign="top" style="padding-left:15px;">
                                            <div style="font-size: 15pt; line-height: 12px"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="98%" border="1" align="center" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td align="center" valign="top" style="padding:10px"><span style="font-size: 14pt; ">(ถ้วน)</span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" style="padding-top: 15px;">
                                <tbody>
                                    <tr>
                                        <td align="left" valign="top"><span style="font-size: 15px; line-height:22px">• กรุณาสั่งจ่ายเช็คขีดคร่อมในนาม "บริษัท ทรัพย์เจริญ โบรกเกอร์ ประกันภัย จำกัด" เท่านั้น<br>
                                                • ในกรณีชำระเงินด้วยเช็ค&nbsp; ใบรับเงินฉบับนี้มีผลสมบูรณ์ต่อเมื่อบริษัทฯ เรียกเก็บเงินตามเช็คได้เรียบร้อยแล้ว</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td style="border-left: 1px solid #000;">
                            <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td align="left" valign="top" style="border-bottom: 1px solid black;font-size: 20pt;padding-top: 10px"><span style="font-size: 16pt; font-weight: 600;">&nbsp;จำนวนเงินรวมทั้งสิ้น<br>&nbsp;Grand Total</span> </td>
                                        <td align="right" valign="top" style="line-height:25px;padding-top: 17px;border-bottom: 1px solid black;font-size: 20pt"><span style="font-size: 14pt; font-weight: 600;">0.00&nbsp;</span> </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table border="0" align="center" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td align="center" valign="bottom" colspan="2" style="padding-top:30px"><span style="border-bottom: 1px dotted black;font-size: 20pt;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></td>
                                    </tr>
                                    <tr>
                                        <td height="40" colspan="2" align="center" valign="bottom" style="line-height:30px;font-size: 14pt;">ผู้รับเงิน/COLLECTOR</td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="bottom" style="line-height:30px;font-size: 14pt; height: 34px" colspan="2">วันที่/Date<span style="border-bottom: 1px dotted black;font-size: 20pt;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; / &nbsp; &nbsp; &nbsp; &nbsp; / &nbsp; &nbsp; &nbsp; &nbsp;</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table width="100%" border="1" align="left" cellpadding="0" cellspacing="0" style="margin-top:5px;">
                <tbody>
                    <tr>
                        <td style="width:697px">
                            <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td align="left" valign="top" style="line-height:25px;padding-top: 10px;"><span style="font-size: 15pt; ">&nbsp;ชำระโดย<br>&nbsp;PAID BY</span> </td>
                                        <td align="left" valign="top" style="line-height:25px;padding-top: 10px;"><span style="font-size: 15pt; "><input type="checkbox"> เงินสด<br>&nbsp; &nbsp;&nbsp;&nbsp;CASH</span> </td>
                                        <td align="left" valign="top" style="line-height:25px;padding-top: 10px;"><span style="font-size: 15pt; "><input type="checkbox"> เช็ค<br>&nbsp; &nbsp;&nbsp;&nbsp;CHEQUE</span> </td>
                                        <td align="left" valign="top" style="line-height:25px;padding-top: 10px;"><span style="font-size: 15pt;"><input type="checkbox"> เงินโอน<br>&nbsp; &nbsp;&nbsp;TRANSFER</span> </td>
                                        <td width="20%" align="left" valign="top" style="line-height:25px"><span style="font-size: 16pt; ">&nbsp; &nbsp;</span> </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td align="left" valign="top" style="line-height:25px" width="33%"><span style="font-size: 15pt; ">&nbsp;ธนาคาร<span style="border-bottom: 1px dotted black;font-size: 16pt;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span><br>&nbsp;BANK</span></td>
                                        <td align="left" valign="top" style="line-height:25px" width="33%"><span style="font-size: 15pt; ">&nbsp;สาขา<span style="border-bottom: 1px dotted black;font-size: 16pt;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span><br>&nbsp;BRANCH</span></td>
                                        <td align="left" valign="top" style="line-height:25px" width="34%"><span style="font-size: 15pt; ;">&nbsp;เลขที่เช็ค<span style="border-bottom: 1px dotted black;font-size: 16pt;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span><br>&nbsp;CHEQUE NO.</span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td align="left" valign="top" style="line-height:25px" width="33%"><span style="font-size: 15pt; ">&nbsp;ลงวันที่<span style="border-bottom: 1px dotted black;font-size: 20pt;">&nbsp; &nbsp; &nbsp; &nbsp; / &nbsp; &nbsp; &nbsp; / &nbsp; &nbsp; &nbsp; </span><br>&nbsp;DATE</span></td>
                                        <td align="left" valign="top" style="line-height:25px" width="67%"><span style="font-size: 15pt; ">&nbsp;จำนวนเงิน<span style="border-bottom: 1px dotted black;font-size: 20pt;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span><br>&nbsp;AMOUNT</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td style="border-left: 1px solid #000;">
                            <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td height="70" align="center" style="line-height:25px">
                                            <span style="font-size: 14pt; font-weight: 600;">
                                                บริษัท ทรัพย์เจริญ โบรกเกอร์ ประกันภัย จำกัด
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table border="0" align="center" cellpadding="0" cellspacing="0" style="margin-bottom: 10px">
                                <tbody>
                                    <tr>
                                        <td align="center" height="35px" valign="bottom" colspan="2"><span style="border-bottom: 1px dotted black;font-size: 20pt;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></td>
                                    </tr>
                                    <tr>
                                        <td height="40px" colspan="2" align="center" style="line-height:30px;font-size: 14pt;">ผู้มีอำนาจลงนาม/AUTHORIZED</td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="top" style="line-height:25px;font-size: 14pt;" colspan="2">วันที่/Date<span style="border-bottom: 1px dotted black;font-size: 20pt;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; / &nbsp; &nbsp; &nbsp; &nbsp; / &nbsp; &nbsp; &nbsp; &nbsp;</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    <script>
        window.print();
    </script>
</body>
</html>