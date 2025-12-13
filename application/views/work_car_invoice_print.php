<!DOCTYPE html>

<html>

<head>

  <?php include("header.php"); ?>

  <title>ใบแจ้งหนี้ ประกันภัยรถยนต์</title>

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
        zoom: 80%;
      }


      .table .tr .td {
        font-size: 16px;
      }
    }

    .bd-solid {
      border: 1px solid #C5C5C5;
    }

    .bg-color {
      background-color: #047bf8;
    }
  </style>



</head>



<body>
  <table border="0" cellspacing="0" cellpadding="0">
    <tbody>
      <tr>
        <td width="160" align="left" valign="top"><img src="<?php echo base_url('assets/img/inspection_logo.jpg');?>" width="120"  height="auto"></td>
        <td width="500" align="left" valign="top" style="padding-top: 12px;">
          <font style="font-size: 17pt; font-weight: 600; line-height:18px">บริษัท ทรัพย์เจริญ โบรกเกอร์ ประกันภัย จำกัด</font><br>
          <font style="font-size: 12pt; line-height:36px">536 ถ.รัถการ ต.หาดใหญ่ อ.หาดใหญ่ จ.สงขลา 90110</font><br>
          <font style="font-size: 12pt; line-height: 24px">โทร. 097-3245364, 081-2362323</font>
        </td>
        <td style="float:right; text-align: center; padding: 10px 0px 0px 10px" width="300" height="90" class="dotted">
          <font style="font-size: 19pt; font-weight: 600; line-height: 40px">ใบแจ้งหนี้<br>
            ชำระเบี้ยประกันภัย</font>
        </td>
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
        <td align="left">
          <font style="font-size: 14pt; font-weight: 600;">คู่สัญญา </font>
        </td>
        <td>&nbsp;</td>
      </tr>
    </tbody>
  </table>
  <br>
  <table border="0" cellspacing="0" cellpadding="0">
    <tbody>
      <tr>
        <td width="120" height="30" valign="bottom">&nbsp;&nbsp;<strong>ผู้เอาประกันภัย </strong></td>
        <td height="30" colspan="3" align="left" valign="bottom">คุณ สมชาย มีน้ำใจ</td>
        <td width="112" align="left" valign="bottom"><strong>วันที่</strong></td>
        <td width="148" align="left" valign="bottom">01/01/25xx</td>
      </tr>
      <tr>
        <td height="30" valign="bottom">&nbsp;&nbsp;<strong>ที่อยู่</strong></td>
        <td height="30" colspan="3" align="left" valign="bottom"> </td>
        <td align="left" valign="bottom"><strong>เลขที่ใบรับแจ้ง</strong></td>
        <td align="left" valign="bottom">xxx-xx-xx-xxxx</td>
      </tr>
      <tr>
        <td height="30" valign="bottom">&nbsp;&nbsp;<strong>โทรศัพท์</strong></td>
        <td height="30" colspan="3" align="left" valign="bottom">081-xxxxxxx</td>
        <td align="left" valign="bottom"><strong>รหัสตัวแทน</strong></td>
        <td align="left" valign="bottom"><strong>502040xxx</strong></td>
      </tr>
      <tr>
        <td height="30" valign="bottom">&nbsp;&nbsp;<strong>ยี่ห้อรถ</strong></td>
        <td width="185" height="30" align="left" valign="bottom">MAZDA</td>
        <td width="46" align="left" valign="bottom"><strong>รุ่น</strong></td>
        <td width="389" align="left" valign="bottom">2</td>
        <td align="left" valign="bottom">&nbsp;</td>
        <td align="left" valign="bottom">&nbsp;</td>
      </tr>
      <tr>
        <td height="30" valign="bottom">&nbsp;&nbsp;<strong>เลขทะเบียนรถ</strong></td>
        <td height="30" colspan="3" align="left" valign="bottom">กข-321 สข.</td>
        <td align="left" valign="bottom">&nbsp;</td>
        <td align="left" valign="bottom">&nbsp;</td>
      </tr>
      <tr>
        <td height="30" valign="bottom">&nbsp;</td>
        <td height="30" colspan="3" align="left" valign="bottom">&nbsp;</td>
        <td align="left" valign="bottom">&nbsp;</td>
        <td align="left" valign="bottom">&nbsp;</td>
      </tr>
    </tbody>
  </table>
  <table border="0" cellspacing="0" cellpadding="0" class="table5">
    <tbody>
      <tr class="center">
        <td width="400" height="40" bgcolor="#047bf8" class="bd-solid">รายการประเภทกรมธรรม์</td>
        <td width="200" height="40" class="bd-solid">วันเริ่มคุ้มครอง</td>
        <td width="200" height="40" class="bd-solid">วันหมดอายุ</td>
        <td width="200" height="40" class="bd-solid">เบี้ยเก็บลูกค้า</td>
      </tr>
      <tr class="center">
        <td height="70" class="bd-solid"><br></td>
        <td height="70" class="bd-solid"></td>
        <td height="70" class="bd-solid"></td>
        <td height="70" class="bd-solid">1,958.86</td>
      </tr>
    </tbody>
  </table>
  <p></p>
  <table border="0" cellspacing="0" cellpadding="0">
    <tbody>
      <tr>
        <td height="40" style="line-height: 26px"><strong>โดยชำระเงินดังนี้ :</strong></td>
      </tr>
      <tr>
        <td>
          จำนวนเงิน 1,958.86 บาท<br>
        </td>
      </tr>
    </tbody>
  </table>
  <p>&nbsp;</p>




  <table class="table">
    <thead>
      <tr>
        <th colspan="4" style="border-top: 1px solid #C5C5C5; ">กรณีชำระเงินผ่านธนาคาร</th>
      </tr>
    </thead>
    <tbody>

      <tr>
        <th colspan="2" style="border-right: 1px solid #C5C5C5; border-left: 1px solid #C5C5C5; border-bottom: 0;">วิธีการชำระเงิน เข้าบัญชี</th>
        <th colspan="2" style="border-right: 3px solid #C5C5C5; border-bottom: 0;">ขั้นตอนปฎิบัติเมื่อชำระเงินผ่านธนาคาร หรือเครื่อง ATM</th>
      </tr>

      <tr>
        <td rowspan="3" style="border-left: 1px solid #C5C5C5; ">
          <!-- 092-3-39682-9--> <img src="assets/images/QRcode_PromtPay.jpg" width="100" height="100" alt="">
        </td>

        <td rowspan="3" style="border-right: 1px solid #C5C5C5">
          กรอร เจริญศิลป์<br>
          ธนาคารกสิกรไทย<br>
          เลขที่บัญชี 263-2-37624-8
        </td>

        <td rowspan="3">
          <img src="assets/images/line_JohnBroker.jpg" width="100" height="100" alt="">
        </td>

        <td rowspan="3" style="border-right: 3px solid #C5C5C5;">
          1. ส่งสำเนาการชำระเงิน ผ่านระบบ Line ID: 091-xxxxxxx<br>
          2. หรือส่งมายัง E-mail: xxxxxxx@hotmail.com<br>
          3. โทรแจ้งเจ้าหน้าที่ โทร. 074-xxxxxx, 081-xxxxxxx,085-xxxxxxx
        </td>
      </tr>

    </tbody>
  </table>





  <br>
  <table border="0" cellspacing="0" cellpadding="0">
    <tbody>
      <tr>
        <td style="line-height: 27px"><strong>คำเตือน</strong>
          กฎการชำระเบี้ยประกันภัย Cash before cover กำหนดให้กรมธรรม์มีผลบังคับคุ้มครองทันทีที่รับชำระเบี้ยประกันภัยจากผู้เอาประกันภัย ดังนั้น
          ผู้เอาประกันภัยต้องชำระเบี้ยประกันภัยก่อนเริ่มวันคุ้มครองของกรมธรรม์ กรณีที่มีการผ่อนชำระเบี้ยประกันภัย จึงเป็นการตกลงกันระหว่างผู้เอาประกันภัย
          กับ บริษัท ทรัพย์เจริญ โบรกเกอร์ ประกันภัย จำกัด รับอนุญาตจัดการประกันภัยโดยตรง เท่านั้น ผู้เอาประกันภัยยินดีปฎิบัติตามข้อตกลงการผ่อนชำระเบี้ย
          ประกันภัยอย่างเคร่งครัด หากผิดนัดผ่อนชำระเบี้ยประกันภัยตามวันที่กำหนดแม้งวดใดงวดหนึ่ง ให้แสดงว่าผู้เอาประกันภัยมีความประสงค์ให้ บริษัท ทรัพย์เจริญ โบรกเกอร์ ประกันภัย จำกัด ยกเลิกกรมธรรม์ และหากผู้เอาประกันภัยผ่อนชำระเบี้ยประกันภัยจนครบ จะทำการส่งมอบกรมธรรม์ต้นฉบับ
          แก่ผู้เอาประกันภัยทันที</td>
      </tr>
    </tbody>
  </table>
  <table border="0" cellspacing="0" cellpadding="0">
    <tbody>
      <tr>
        <td width="500" height="100" align="center">&nbsp;</td>
        <td width="500" height="100" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td align="center">ลงชื่อ ............................................................... ผู้เอาประกันภัย</td>
        <td height="42" align="center">ฝ่ายการเงิน - บัญชี</td>
      </tr>
      <tr>
        <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(................................................................)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td height="30" align="center">(บริษัท ทรัพย์เจริญ โบรกเกอร์ ประกันภัย จำกัด)</td>
      </tr>
    </tbody>
  </table>

  <script>
    window.print();
  </script>

</body>
</html>