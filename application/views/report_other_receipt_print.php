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
                zoom: 70%;
            }
            @page {
                size: a4;
                /*size: a5 landscape;
				size: landscape;*/
            }
            .table .tr .td {
                font-size: 16px;
            }
            .table td,
            .table th,
            .card .table td,
            .card .table th,
            .card .dataTable td,
            .card .dataTable th {
                padding: 2px !important;
                vertical-align: middle;
            }
            .txt-center {
                text-align: center;
            }
        }
    .txt-center {            text-align: center;
}
    </style>
</head>
<body>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td height="35" colspan="3" align="center" style="font-size: 18px; font-weight: bold;">
                    รายงานรายรับ ประกันเบ็ดเตล็ด<br>
                    วันที่ xx เดือน xxxxx 25xx
                </td>
            </tr>
            <tr>
                <td height="35">&nbsp;</td>
                <td height="35">&nbsp;</td>
                <td height="35">&nbsp;</td>
            </tr>
        </tbody>
    </table>
    <table class="table table-striped table-bordered table-hover table-checkable order-column full-width" id="example4">
      <thead>
        <tr>
          <th class="txt-center">ลำดับ</th>
          <th class="txt-center">ชื่อ-สกุล</th>
          <th class="txt-center">เลขที่กรมธรรม์</th>
          <th class="txt-center">ประเภทประกัน</th>
          <th class="txt-center">เลขที่ใบเสร็จ</th>
          <th class="txt-center">วิธีการชำระเงิน</th>
          <th class="txt-center">งวดที่</th>
          <th class="txt-center">จำนวนเงิน</th>
          <th class="txt-center">ยอดค้างจ่าย</th>
          <th class="txt-center">หมายเหตุ</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="txt-center">1</td>
          <td>ลัดดาวรรณ พุทธสุภะ</td>
          <td align="center">12345-67890</td>
          <td align="center">ประกันอัคคีภัย</td>
          <td align="center">12345678</td>
          <td align="center">เงินโอน ธ.กสิกร</td>
          <td align="center">4/6</td>
          <td align="right">3,500.00</td>
          <td align="right">12,000.00</td>
          <td align="center">xxxxxxx xxxxxx</td>
        </tr>
        <tr>
          <td class="txt-center">2</td>
          <td>ลัดดาวรรณ พุทธสุภะ</td>
          <td align="center">12345-67890</td>
          <td align="center">ประกันอุบัติเหตุ</td>
          <td align="center">12345678</td>
          <td align="center">เงินโอน ธ.กสิกร</td>
          <td align="center">&nbsp;</td>
          <td align="right">2,500.00</td>
          <td align="right">&nbsp;</td>
          <td align="center">&nbsp;</td>
        </tr>
        <tr>
          <td class="txt-center">3</td>
          <td>ลัดดาวรรณ พุทธสุภะ</td>
          <td align="center">12345-67890</td>
          <td align="center">ประกันขนส่ง</td>
          <td align="center">12345678</td>
          <td align="center">เงินสด</td>
          <td align="center">&nbsp;</td>
          <td align="right">500.00</td>
          <td align="right">12,000.00</td>
          <td align="center">&nbsp;</td>
        </tr>
        <tr>
          <td class="txt-center">4</td>
          <td>ลัดดาวรรณ พุทธสุภะ</td>
          <td align="center">12345-67890</td>
          <td align="center">ประกันท่องเที่ยว</td>
          <td align="center">12345678</td>
          <td align="center">บัตรเครดิต</td>
          <td align="center">1/6</td>
          <td align="right">2,500.00</td>
          <td align="right">10,000.00</td>
          <td align="center">&nbsp;</td>
        </tr>
        <tr>
          <td class="txt-center">5</td>
          <td>ลัดดาวรรณ พุทธสุภะ</td>
          <td align="center">12345-67890</td>
          <td align="center">ประกันอัคคีภัย</td>
          <td align="center">12345678</td>
          <td align="center">เงินโอน ธ.กสิกร</td>
          <td align="center">2/6</td>
          <td align="right">4,500.00</td>
          <td align="right">8,000.00</td>
          <td align="center">xxxxxxx xxxxxx</td>
        </tr>
        <tr>
          <td colspan="5" style="text-align: right"><strong>รวมรายรับ</strong></td>
          <td colspan="3" style="border-bottom: double; text-align: right;"><strong>20,500.00</strong></td>
        </tr>
      </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>
</html>