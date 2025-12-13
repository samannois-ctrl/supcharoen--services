<!DOCTYPE html>

<html>

<head>

    <?php include("header.php"); ?>

    <title>ใบคำขอเอาประกันภัยรถยนต์</title>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->

    <link href="Form/style_font_form.css" rel="stylesheet">



    <style>
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



        @media print {
            body {
                background-color: #fff;
                zoom: 42%;
            }
        }

        .bd-solid {
            border: 1px solid #C5C5C5;
        }

        .bd-right{
            border-right: 1px solid #C5C5C5;
        }

        .bd-bottom{
            border-bottom: 0;
        }

        .bd-top{
            border-top: 1px solid #C5C5C5;
        }
        
    </style>



</head>



<body>
    <table border="0" width="100%" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td height="60" align="right" valign="bottom">
                    <font style="font-size: 18pt; font-weight: 600; line-height:18px">บริษัท ทรัพย์เจริญ โบรกเกอร์ ประกันภัย จำกัด</font>
                    <!-- <font style="font-size: 11pt; line-height: 28px">
                        536 ถ.รัถการ ต.หาดใหญ่ อ.หาดใหญ่ จ.สงขลา 90110
                    </font> -->
                    <br>

                    <font style="font-size: 15pt; line-height: 28px">
                        536 ถ.รัถการ ต.หาดใหญ่ อ.หาดใหญ่ จ.สงขลา 90110
                        โทร. 097-3245364, 081-2362323
                    </font>
                </td>
            </tr>
        </tbody>
    </table>

    <table border="0" width="100%"class="bd-solid">
        <tbody>
            <tr>
                <td>

                    <table class="table" border="0">
                        <tbody>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 17pt; font-weight: 600; line-height:32px"></font><br>
                                    <font style="font-size: 11pt; line-height: 22px"><br>
                                    </font>
                                </td>
                                <td width="265" colspan="2" align="center">

                                    <img src="uploadfile/" width="265" height="50">

                                    <br>
                                    <font style="font-size: 15pt; line-height: 20px;">ศูนย์รับแจ้งอุบัติเหตุ 24 ชั่วโมง<br>
                                    </font>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table" border="0" cellspacing="0" cellpadding="5">
                        <tbody>
                            <tr>
                                <td width="130" height="25" align="left" style="font-size: 18pt"><strong>วันที่รับแจ้ง</strong></td>
                                <td width="212" align="left" style="font-size: 18pt">07&nbsp;ตุลาคม &nbsp;2565</td>
                                <td colspan="2" align="center" style="font-size: 20pt"><strong>คำขอเอาประกันภัยรถยนต์</strong></td>
                                <td width="325" align="right" style="font-size: 18pt">รหัสตัวแทน 502040265</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table" border="0" cellspacing="0" cellpadding="5">
                        <tbody>
                            <tr style="font-size: 18pt">
                                <td width="130" height="25" align="left">&nbsp;</td>
                                <td width="120" align="left"><input type="checkbox" class="ace">
                                    แจ้งใหม่</td>
                                <td colspan="2" align="left"><input type="checkbox" class="ace"> ต่ออายุกรมธรรม์</td>
                                <td width="325" align="right">ประกันภัยประเภท ()</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table" border="0" cellspacing="0" cellpadding="5" style="font-size: 18pt">
                        <tbody>
                            <tr>
                                <td width="120" height="30" class="bd-bottom"><strong>ผู้เอาประกันภัย</strong></td>
                                <td width="75" align="right" class="bd-bottom"><strong> ชื่อ-สกุล :</strong></td>
                                <td width="328" height="30" align="left" class="bd-bottom">คุณ สมชาย ใจดี</td>
                                <td width="160" align="right" class="bd-bottom"><strong>เลขที่บัตรประชาชน :</strong></td>
                                <td width="295" align="left" class="bd-bottom"></td>
                            </tr>
                            <tr>
                                <td height="30" class="bd-bottom">&nbsp;</td>
                                <td align="right" class="bd-bottom"><strong>ที่อยู่ :</strong></td>
                                <td height="30" colspan="3" align="left" class="bd-bottom"> </td>
                            </tr>
                            <tr>
                                <td height="30">&nbsp;</td>
                                <td align="right"><strong>โทรศัพท์ :</strong></td>
                                <td height="30" colspan="3" align="left">095-xxxxxxx</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table" border="0" cellspacing="0" cellpadding="5" style="font-size: 18pt">
                        <tbody>
                            <tr>
                                <td width="230" height="30" valign="bottom" class="bd-bottom">
                                    <strong>
                                        ประเภทการประกันภัยที่ต้องการ
                                    </strong>
                                </td>

                                <td width="232" height="30" align="left" valign="bottom" class="bd-bottom">
                                    <input type="checkbox" class="ace">
                                    ไม่ระบุชื่อผู้ขับขี่
                                </td>

                                <td width="219" align="left" valign="bottom" class="bd-bottom">
                                    <input type="checkbox" class="ace">
                                    ระบุชื่อผู้ขับขี่
                                </td>

                                <td width="290" align="left" valign="bottom" style="font-size: 16pt" class="bd-bottom">
                                    (โปรดแนบสำเนาบัตรประชาชน ใบอนุญาตขับขี่)
                                </td>
                            </tr>

                            <tr>
                                <td height="30" align="center" valign="bottom" class="bd-bottom">ผู้ขับขี่</td>
                                <td height="30" align="left" valign="bottom" class="bd-bottom">1.</td>
                                <td height="30" align="left" valign="bottom" class="bd-bottom">วัน/เดือน/ปีเกิด </td>
                                <td height="30" align="left" valign="bottom" class="bd-bottom">อาชีพ </td>
                            </tr>
                            <tr>
                                <td height="30" valign="bottom">&nbsp;</td>
                                <td height="30" align="left" valign="bottom">2.</td>
                                <td height="30" align="left" valign="bottom">วัน/เดือน/ปีเกิด </td>
                                <td height="30" align="left" valign="bottom">อาชีพ </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table" border="0" cellspacing="0" cellpadding="3" style="font-size: 18pt">
                        <tbody>
                            <tr>
                                <td width="127" height="30"><strong>การใช้รถยนต์ </strong></td>
                                <td width="851" height="30" align="left"></td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table" border="0" cellspacing="0" cellpadding="3" style="font-size: 18pt">
                        <tbody>
                            <tr>
                                <td width="127" height="30"><strong>ผู้รับผลประโยชน์ </strong></td>
                                <td width="851" height="30" align="left"></td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table" border="0" cellspacing="0" cellpadding="3" style="font-size: 18pt">
                        <tbody>
                            <tr>
                                <td width="230" height="30"><strong>ระยะเวลาประกันภัย เริ่มต้นวันที่</strong></td>
                                <td width="232" height="30" align="left">00&nbsp;&nbsp;543</td>
                                <td width="86" align="left"><strong>สิ้นสุดวันที่</strong></td>
                                <td width="241" height="30" align="left">00&nbsp;&nbsp;543</td>
                                <td width="39" align="left"><strong>เวลา</strong></td>
                                <td width="122" align="left"> </td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table" border="0" style="font-size: 18pt">
                        <tbody>
                            <tr>
                                <td height="5" align="center" class="bd-bottom"><strong>รายการรถยนต์ที่เอาประกันภัย</strong></td>
                            </tr>
                        </tbody>
                    </table>
                    <table border="0" width="100%" class="table" style="font-size: 16pt">
                        <tbody>
                            <tr>
                                <td width="37" height="35" align="center" class="bd-right bd-top"><strong>รหัส</strong></td>
                                <td width="145" height="35" align="center" class="bd-right bd-top"><strong>ชื่อรถยนต์/รุ่น</strong></td>
                                <td width="119" height="35" align="center" class="bd-right bd-top"><strong>เลขทะเบียน</strong></td>
                                <td width="175" height="35" align="center" class="bd-right bd-top"><strong>เลขตัวถัง</strong></td>
                                <td width="58" height="35" align="center" class="bd-right bd-top"><strong>ปี/รุ่น</strong></td>
                                <td width="126" align="center" class="bd-right bd-top"><strong>แบบตัวถัง</strong></td>
                                <td width="190" align="center" class="bd-top"><strong>จำนวนที่นั่ง/ขนาด/น้ำหนัก</strong></td>
                                <!--      <td width="150" height="35" align="center"><strong>มูลค่าเต็มรวมตกแต่ง</strong></td>-->
                            </tr>
                            <tr>
                                <td height="35" align="center" class="bd-right bd-top"></td>
                                <td height="35" align="center" class="bd-right bd-top">MAZDA/2</td>
                                <td height="35" align="center" class="bd-right bd-top">ขพ-461 สข.</td>
                                <td height="35" align="center" class="bd-right bd-top">MM8DJ2H3A0W217735</td>
                                <td height="35" align="center" class="bd-right bd-top"></td>
                                <td align="center" class="bd-right bd-top"></td>
                                <td align="center"></td>
                                <!--      <td height="35" align="center"></td>-->
                            </tr>
                        </tbody>
                    </table>
                    <table class="table" border="0" cellspacing="0" cellpadding="3" style="font-size: 16pt">
                        <tbody>
                            <tr>
                                <td height="30" align="left" class="bd-bottom"><strong>รายการตกแต่งเปลี่ยนแปลงรถยนต์เพิ่มเติม (โปรดระบุรายละเอียด) คุ้มครองอุปกรณ์ตกแต่งเพิ่มเติม 0.00 บาท</strong></td>
                            </tr>
                            <tr>
                                <td height="30" align="left" class="bd-bottom"></td>
                            </tr>
                        </tbody>
                    </table>
                    <table border="0" width="100%" cellspacing="0" cellpadding="0" class="table" style="font-size: 18pt">
                        <tbody>
                            <tr>
                                <td width="315" height="30" align="center" class="bd-top bd-right"><strong>ความรับผิดต่อบุคคลภายนอก</strong></td>
                                <td width="295" align="center" class="bd-top bd-right"><strong>รถยนต์เสียหาย สูญหาย ไฟไหม้</strong></td>
                                <td width="390" align="center" class="bd-top"><strong>ความคุ้มครองตามเอกสารแนบท้าย</strong></td>
                            </tr>
                            <tr>
                                <td height="30" align="center" valign="top" class="bd-right" style="vertical-align: top;">
                                    <table width="94%" border="0" cellspacing="0" cellpadding="4" class="table3">
                                        <tbody>
                                            <tr>
                                                <td height="20" colspan="2">
                                                    1) ความเสียหายต่อชีวิต ร่างกาย หรืออนามัย 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="20" colspan="2">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    1.1) ความเสียหายต่อชีวิต ร่างกาย หรืออนามัย 
                                                </td>
                                            </tr>
                                            <tr align="right">
                                                <td width="42" height="20">&nbsp;</td>
                                                <td width="242" style="border-bottom: 1px solid #8B8B8B">0.00 บาท/คน</td>
                                            </tr>
                                            <tr align="right">
                                                <td height="24">&nbsp;</td>
                                                <td valign="bottom" style="border-bottom: 1px solid #8B8B8B">0.00 บาท/ครั้ง</td>
                                            </tr>
                                            <tr>
                                                <td height="20" colspan="2">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    1.2) ความเสียหายต่อทรัพย์สิน
                                                </td>
                                            </tr>
                                            <tr align="right">
                                                <td height="20">&nbsp;</td>
                                                <td height="20" style="border-bottom: 1px solid #8B8B8B">0.00 บาท/ครั้ง</td>
                                            </tr>
                                            <tr>
                                                <td height="20" colspan="2">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    1.2.1) ความเสียหายส่วนแรก
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="20" align="right">&nbsp;</td>
                                                <td height="20" align="right" style="border-bottom: 1px solid #8B8B8B">0.00 บาท/ครั้ง</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>

                                <td align="center" style="border-right: 1px solid #C5C5C5; vertical-align: top;vertical-align: top;">
                                    <table width="94%" border="0" cellspacing="0" cellpadding="4" class="table3">
                                        <tbody>
                                            <tr>
                                                <td height="20" colspan="2">1) ความเสียหายต่อรถยนต์</td>
                                            </tr>
                                            <tr align="right">
                                                <td width="39" height="20">&nbsp;</td>
                                                <td width="245" style="border-bottom: 1px solid #8B8B8B">0.00 บาท/ครั้ง</td>
                                            </tr>
                                            <tr>
                                                <td height="20" colspan="2">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    1.1) ความเสียหายส่วนแรกกรณีเป็นฝ่ายผิด 
                                                </td>
                                            </tr>
                                            <tr align="right">
                                                <td height="20">&nbsp;</td>
                                                <td height="20" style="border-bottom: 1px solid #8B8B8B">0.00 บาท/ครั้ง</td>
                                            </tr>
                                            <tr>
                                                <td height="20" colspan="2">2) รถยนต์สูญหาย/ไฟไหม้</td>
                                            </tr>
                                            <tr align="right">
                                                <td height="20">&nbsp;</td>
                                                <td height="20" style="border-bottom: 1px solid #8B8B8B">0.00 บาท/ครั้ง</td>
                                            </tr>
                                            <tr>
                                                <td height="20" colspan="2">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    2.1) เนื่องจากภัยน้ำท่วม 
                                                </td>
                                            </tr>
                                            <tr align="right">
                                                <td height="20">&nbsp;</td>
                                                <td height="20" style="border-bottom: 1px solid #8B8B8B">0.00 บาท/ครั้ง</td>
                                            </tr>
                                            <tr>
                                                <td height="20" colspan="2">ราคา พรบ.</td>
                                            </tr>
                                            <tr align="right">
                                                <td height="20">&nbsp;</td>
                                                <td height="20" style="border-bottom: 1px solid #8B8B8B">645.00 บาท</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>

                                <td align="center">
                                    <table width="94%" border="0" cellspacing="0" cellpadding="4" class="table3">
                                        <tbody>
                                            <tr>
                                                <td height="20" colspan="3">1) อุบัติเหตุส่วนบุคคล</td>
                                            </tr>
                                            <tr>
                                                <td height="20" colspan="3">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    1.1) เสียชีวิต สูญเสียอวัยวะ ทุพพลภาพถาวร
                                                </td>
                                            </tr>
                                            <tr align="right">
                                                <td width="90" height="20" align="right">ก) ผู้ขับขี่</td>
                                                <td width="25" align="left">1 คน</td>
                                                <td width="112" align="right" style="border-bottom: 1px solid #8B8B8B">0.00 <span style="font-size:12px">บาท/คน</span></td>
                                            </tr>
                                            <tr align="right">
                                                <td height="20" align="right">ข) ผู้โดยสาร</td>
                                                <td align="left">0 คน</td>
                                                <td align="right" style="border-bottom: 1px solid #8B8B8B">0.00 <span style="font-size:12px">บาท/คน</span></td>
                                            </tr>
                                            <tr>
                                                <td height="20" colspan="3">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    1.2) ทุพพลภาพชั่วคราว
                                                </td>
                                            </tr>
                                            <tr align="right">
                                                <td height="20" align="right">ก) ผู้ขับขี่</td>
                                                <td align="left">0 คน</td>
                                                <td align="right" style="border-bottom: 1px solid #8B8B8B">0.00 <span style="font-size:12px">บาท/สัปดาห์</span></td>
                                            </tr>
                                            <tr align="right">
                                                <td height="20" align="right">ข) ผู้โดยสาร</td>
                                                <td align="left">0 คน</td>
                                                <td align="right" style="border-bottom: 1px solid #8B8B8B">0.00 <span style="font-size:12px">บาท/คน/สัปดาห์</span></td>
                                            </tr>
                                            <tr>
                                                <td height="20" colspan="3">2) ค่ารักษาพยาบาล 0 คน</td>
                                            </tr>
                                            <tr>
                                                <td height="20" align="right">&nbsp;</td>
                                                <td height="20" colspan="2" align="right" style="border-bottom: 1px solid #8B8B8B">0.00 บาท/คน</td>
                                            </tr>
                                            <tr>
                                                <td height="20" colspan="3">3) การประกันตัวผู้ขับขี่</td>
                                            </tr>
                                            <tr>
                                                <td height="20" align="right">&nbsp;</td>
                                                <td height="20" colspan="2" align="right" style="border-bottom: 1px solid #8B8B8B">0.00 บาท/ครั้ง</td>
                                            </tr>
                                            <tr>
                                                <td height="10" align="right"></td>
                                                <td height="10" colspan="2" align="right"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td height="34" align="center" style="border-right: 1px solid #C5C5C5;"><strong>เบี้ยประกันภัยสุทธิ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0.00 &nbsp;&nbsp;&nbsp;&nbsp;บาท</strong></td>
                                <td height="34" align="center" style="border-right: 1px solid #C5C5C5;"><strong>เบี้ยประกันภัยรวม&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0.00 &nbsp;&nbsp;&nbsp;&nbsp;บาท</strong></td>
                                <td height="34" align="center"><strong>เบี้ยประกันภัยรวม พรบ.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;645.00 &nbsp;&nbsp;&nbsp;&nbsp;บาท</strong></td>
                            </tr>
                        </tbody>
                    </table>
                    <table border="0" width="100%">
                        <tbody>
                            <tr>
                                <td colspan="2" style="line-height: 26px;">
                                    <h3>&emsp;&emsp;ข้าพเจ้าขอรับรองว่า คำบอกกล่าวตามรายการข้างบนเป็นความจริง และให้ถือเป็นส่วนหนึ่งของสัญญาระหว่างข้าพเจ้ากับบริษัท <br>
                                        &emsp;&emsp;โดยข้าพเจ้ามีความประสงค์ให้กรมธรรม์มีผลบังคับตั้งแต่วันที่ <strong>29&nbsp;กันยายน &nbsp;2565</strong> เป็นต้นไป</h3>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table border="0" width="100%" style="font-size: 18pt">
                        <tbody>
                            <tr>
                                <td width="800">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="3">
                                        <tbody>
                                            <tr>
                                                <td height="30" align="center">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td height="30" align="center">ลงชื่อผู้เขียนหรือผู้พิมพ์</td>
                                            </tr>
                                            <tr>
                                                <td height="30" align="center">(บริษัท ทรัพย์เจริญ โบรกเกอร์ ประกันภัย จำกัด)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td align="center">
                                    <table width="80%" border="0" cellspacing="0" cellpadding="3">
                                        <tbody>
                                            <tr>
                                                <td width="32%" height="30" align="left">&nbsp;</td>
                                                <td width="68%" align="left">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td width="32%" height="30" align="left">ผู้ขอเอาประกันภัย</td>
                                                <td width="68%" align="left"> ........................................................</td>
                                            </tr>
                                            <tr>
                                                <td width="32%" height="30" align="left">วันที่/เดือน/ปี </td>
                                                <td width="68%" align="left">........................................................</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </td>
            </tr>
        </tbody>
    </table>

    <table border="0" width="100%" style="font-size: 15pt">
        <tbody>
            <tr>
                <td colspan="2" style="line-height: 26px">คำเตือนของกรมประกันภัย กระทรวงพาณิชย์<br>
                    ให้ตอบคำถามข้างต้นตามความเป็นจริงทุกข้อ มิฉะนั้นบริษัทอาจถือเป็นเหตุปฎิเสธความรับผิดชอบตามสัญญาประกันภัยได้ ตามประมวลกฎหมายเพ่งและพาณิชย์ มาตรา 865
                </td>
            </tr>
        </tbody>
    </table>


    <script>
        window.print();
    </script>
</body>



</html>