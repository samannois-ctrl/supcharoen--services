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
                size: a4 landscape;
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
            .txt-right {
                text-align: right;
            }
        }
    .txt-right {            text-align: right;
}
    </style>
</head>
<body>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td height="35" colspan="3" align="center" style="font-size: 18px; font-weight: bold;">
                    รายงานค่าคอมมิชชั่นตัวแทน (ประกันเบ็ดเตล็ด)<br>
					วันที่ x กุมภาพันธ์ 25xx ถึงวันที่ x ธันวาคม 25xx
              </td>
            </tr>
            <tr>
                <td height="35">&nbsp;</td>
                <td height="35">&nbsp;</td>
                <td height="35">&nbsp;</td>
            </tr>
        </tbody>
    </table>
    <table class="table table-bordered table-hover table-checkable order-column full-width" id="table">
      <!-- <table class="table table-striped table-bordered table-hover table-checkable order-column full-width" id="example4"> -->
      <thead>
        <tr>
          <th style="text-align: center">ลำดับ</th>
          <th style="text-align: center">ชื่อ-สกุล</th>
          <th style="text-align: center">เลขที่กรมธรรม์</th>
          <th style="text-align: center">ประเภทประกัน</th>
          <th style="text-align: center">บริษัทประกัน</th>
          <th style="text-align: center">เบี้ยรวม</th>
          <th style="text-align: center">เบี้ยสุทธิ</th>
          <th style="text-align: center">ค่าคอม(1)</th>
          <th style="text-align: center">หักภาษี(1)</th>
          <th style="text-align: center">ค่าคอม(2)</th>
          <th style="text-align: center">หักภาษี(2)</th>
          <th style="text-align: center">ค่าคอม(3)</th>
          <th style="text-align: center">หักภาษี(3)</th>
          <th style="text-align: center">คงเหลือ</th>
          <th style="text-align: center">เบี้ยนำส่งบริษัท</th>
        </tr>
      </thead>
      <tbody>
        <tr class="odd gradeX">
          <th colspan="15" style="text-align: left; background-color: #f2f2f2;">&nbsp;<i class="fa fa-book"></i> ประกันอัคคีภัย</th>
        </tr>
        <tr class="odd gradeX">
          <td align="center">1</td>
          <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
          <td align="center">12345 - 6789</td>
          <td align="center">ประกันอุบัติเหตุ</td>
          <td align="center">CHUBB</td>
          <td align="right">645.21</td>
          <td align="right">600.00</td>
          <td align="right">72.00</td>
          <td align="right">3.60</td>
          <td align="right">144.00</td>
          <td align="right">2.16</td>
          <td align="right">0.00</td>
          <td align="right">0.00</td>
          <td align="right">210.24</td>
          <td align="right">434.97</td>
        </tr>
        <tr class="odd gradeX">
          <td align="center">2</td>
          <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
          <td align="center">12345 - 6789</td>
          <td align="center">ประกันอุบัติเหตุ</td>
          <td align="center">CHUBB</td>
          <td align="right">645.21</td>
          <td align="right">600.00</td>
          <td align="right">72.00</td>
          <td align="right">3.60</td>
          <td align="right">144.00</td>
          <td align="right">2.16</td>
          <td align="right">0.00</td>
          <td align="right">0.00</td>
          <td align="right">210.24</td>
          <td align="right">434.97</td>
        </tr>
        <tr class="odd gradeX">
          <td align="center">3</td>
          <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
          <td align="center">12345 - 6789</td>
          <td align="center">ประกันอุบัติเหตุ</td>
          <td align="center">CHUBB</td>
          <td align="right">645.21</td>
          <td align="right">600.00</td>
          <td align="right">72.00</td>
          <td align="right">3.60</td>
          <td align="right">144.00</td>
          <td align="right">2.16</td>
          <td align="right">0.00</td>
          <td align="right">0.00</td>
          <td align="right">210.24</td>
          <td align="right">434.97</td>
        </tr>
        <tr class="odd gradeX">
          <th style="text-align: right" colspan="5">รวมยอดประกันอัคคีภัย&nbsp;&nbsp;</th>
          <th class="txt-right">15,000.00</th>
          <th class="txt-right">1,000.00</th>
          <th class="txt-right">144.00</th>
          <th class="txt-right">10.16</th>
          <th class="txt-right">444.00</th>
          <th class="txt-right">10.00</th>
          <th class="txt-right">0.00</th>
          <th class="txt-right">0.00</th>
          <th class="txt-right">710.24</th>
          <th class="txt-right">1,334.97</th>
        </tr>
        <tr class="odd gradeX">
          <th colspan="15" style="text-align: left; background-color: #f2f2f2;">&nbsp;<i class="fa fa-book"></i> ประกันขนส่ง</th>
        </tr>
        <tr class="odd gradeX">
          <td align="center">1</td>
          <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
          <td align="center">12345 - 6789</td>
          <td align="center">ประกันอุบัติเหตุ</td>
          <td align="center">CHUBB</td>
          <td align="right">645.21</td>
          <td align="right">600.00</td>
          <td align="right">72.00</td>
          <td align="right">3.60</td>
          <td align="right">144.00</td>
          <td align="right">2.16</td>
          <td align="right">0.00</td>
          <td align="right">0.00</td>
          <td align="right">210.24</td>
          <td align="right">434.97</td>
        </tr>
        <tr class="odd gradeX">
          <td align="center">2</td>
          <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
          <td align="center">12345 - 6789</td>
          <td align="center">ประกันอุบัติเหตุ</td>
          <td align="center">CHUBB</td>
          <td align="right">645.21</td>
          <td align="right">600.00</td>
          <td align="right">72.00</td>
          <td align="right">3.60</td>
          <td align="right">144.00</td>
          <td align="right">2.16</td>
          <td align="right">0.00</td>
          <td align="right">0.00</td>
          <td align="right">210.24</td>
          <td align="right">434.97</td>
        </tr>
        <tr class="odd gradeX">
          <td align="center">3</td>
          <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
          <td align="center">12345 - 6789</td>
          <td align="center">ประกันอุบัติเหตุ</td>
          <td align="center">CHUBB</td>
          <td align="right">645.21</td>
          <td align="right">600.00</td>
          <td align="right">72.00</td>
          <td align="right">3.60</td>
          <td align="right">144.00</td>
          <td align="right">2.16</td>
          <td align="right">0.00</td>
          <td align="right">0.00</td>
          <td align="right">210.24</td>
          <td align="right">434.97</td>
        </tr>
        <tr class="odd gradeX">
          <th style="text-align: right" colspan="5">รวมยอดประกันขนส่ง&nbsp;&nbsp;</th>
          <th class="txt-right">15,000.00</th>
          <th class="txt-right">1,000.00</th>
          <th class="txt-right">144.00</th>
          <th class="txt-right">10.16</th>
          <th class="txt-right">444.00</th>
          <th class="txt-right">10.00</th>
          <th class="txt-right">0.00</th>
          <th class="txt-right">0.00</th>
          <th class="txt-right">710.24</th>
          <th class="txt-right">1,334.97</th>
        </tr>
        <tr class="odd gradeX">
          <th colspan="15" style="text-align: left; background-color: #f2f2f2;">&nbsp;<i class="fa fa-book"></i> ประกันอุบัติเหตุ</th>
        </tr>
        <tr class="odd gradeX">
          <td align="center">1</td>
          <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
          <td align="center">12345 - 6789</td>
          <td align="center">ประกันอุบัติเหตุ</td>
          <td align="center">CHUBB</td>
          <td align="right">645.21</td>
          <td align="right">600.00</td>
          <td align="right">72.00</td>
          <td align="right">3.60</td>
          <td align="right">144.00</td>
          <td align="right">2.16</td>
          <td align="right">0.00</td>
          <td align="right">0.00</td>
          <td align="right">210.24</td>
          <td align="right">434.97</td>
        </tr>
        <tr class="odd gradeX">
          <td align="center">2</td>
          <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
          <td align="center">12345 - 6789</td>
          <td align="center">ประกันอุบัติเหตุ</td>
          <td align="center">CHUBB</td>
          <td align="right">645.21</td>
          <td align="right">600.00</td>
          <td align="right">72.00</td>
          <td align="right">3.60</td>
          <td align="right">144.00</td>
          <td align="right">2.16</td>
          <td align="right">0.00</td>
          <td align="right">0.00</td>
          <td align="right">210.24</td>
          <td align="right">434.97</td>
        </tr>
        <tr class="odd gradeX">
          <td align="center">3</td>
          <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
          <td align="center">12345 - 6789</td>
          <td align="center">ประกันอุบัติเหตุ</td>
          <td align="center">CHUBB</td>
          <td align="right">645.21</td>
          <td align="right">600.00</td>
          <td align="right">72.00</td>
          <td align="right">3.60</td>
          <td align="right">144.00</td>
          <td align="right">2.16</td>
          <td align="right">0.00</td>
          <td align="right">0.00</td>
          <td align="right">210.24</td>
          <td align="right">434.97</td>
        </tr>
        <tr class="odd gradeX">
          <th style="text-align: right" colspan="5">รวมยอดประกันอัคคีภัย&nbsp;&nbsp;</th>
          <th class="txt-right">15,000.00</th>
          <th class="txt-right">1,000.00</th>
          <th class="txt-right">144.00</th>
          <th class="txt-right">10.16</th>
          <th class="txt-right">444.00</th>
          <th class="txt-right">10.00</th>
          <th class="txt-right">0.00</th>
          <th class="txt-right">0.00</th>
          <th class="txt-right">710.24</th>
          <th class="txt-right">1,334.97</th>
        </tr>
        <tr class="odd gradeX">
          <th colspan="15" style="text-align: left; background-color: #f2f2f2;">&nbsp;<i class="fa fa-book"></i> ประกันท่องเที่ยว</th>
        </tr>
        <tr class="odd gradeX">
          <td align="center">1</td>
          <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
          <td align="center">12345 - 6789</td>
          <td align="center">ประกันอุบัติเหตุ</td>
          <td align="center">CHUBB</td>
          <td align="right">645.21</td>
          <td align="right">600.00</td>
          <td align="right">72.00</td>
          <td align="right">3.60</td>
          <td align="right">144.00</td>
          <td align="right">2.16</td>
          <td align="right">0.00</td>
          <td align="right">0.00</td>
          <td align="right">210.24</td>
          <td align="right">434.97</td>
        </tr>
        <tr class="odd gradeX">
          <td align="center">2</td>
          <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
          <td align="center">12345 - 6789</td>
          <td align="center">ประกันอุบัติเหตุ</td>
          <td align="center">CHUBB</td>
          <td align="right">645.21</td>
          <td align="right">600.00</td>
          <td align="right">72.00</td>
          <td align="right">3.60</td>
          <td align="right">144.00</td>
          <td align="right">2.16</td>
          <td align="right">0.00</td>
          <td align="right">0.00</td>
          <td align="right">210.24</td>
          <td align="right">434.97</td>
        </tr>
        <tr class="odd gradeX">
          <td align="center">3</td>
          <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
          <td align="center">12345 - 6789</td>
          <td align="center">ประกันอุบัติเหตุ</td>
          <td align="center">CHUBB</td>
          <td align="right">645.21</td>
          <td align="right">600.00</td>
          <td align="right">72.00</td>
          <td align="right">3.60</td>
          <td align="right">144.00</td>
          <td align="right">2.16</td>
          <td align="right">0.00</td>
          <td align="right">0.00</td>
          <td align="right">210.24</td>
          <td align="right">434.97</td>
        </tr>
        <tr class="odd gradeX">
          <th style="text-align: right" colspan="5">รวมยอดประกันท่องเที่ยว &nbsp;</th>
          <th class="txt-right">15,000.00</th>
          <th class="txt-right">1,000.00</th>
          <th class="txt-right">144.00</th>
          <th class="txt-right">10.16</th>
          <th class="txt-right">444.00</th>
          <th class="txt-right">10.00</th>
          <th class="txt-right">0.00</th>
          <th class="txt-right">0.00</th>
          <th class="txt-right">710.24</th>
          <th class="txt-right">1,334.97</th>
        </tr>
        <tr class="odd gradeX">
          <th style="text-align: right" colspan="3">&nbsp;</th>
          <th class="txt-right">&nbsp;</th>
          <th class="txt-right">&nbsp;</th>
          <th class="txt-right">&nbsp;</th>
          <th class="txt-right">&nbsp;</th>
          <th class="txt-right">&nbsp;</th>
          <th class="txt-right">&nbsp;</th>
          <th class="txt-right">&nbsp;</th>
          <th class="txt-right">&nbsp;</th>
          <th class="txt-right">&nbsp;</th>
          <th class="txt-right">&nbsp;</th>
          <th class="txt-right">&nbsp;</th>
          <th class="txt-right">&nbsp;</th>
        </tr>
        <tr class="odd gradeX" style="background-color: #cfcfcf;">
          <th style="text-align: right" colspan="5">รวมทั้งหมด&nbsp;&nbsp;</th>
          <th class="txt-right">57,200.00</th>
          <th class="txt-right">53,243.00</th>
          <th class="txt-right">9,343.62</th>
          <th class="txt-right">934.35</th>
          <th class="txt-right">2,000.00</th>
          <th class="txt-right">100.00</th>
          <th class="txt-right">0.00</th>
          <th class="txt-right">0.00</th>
          <th class="txt-right">8,409.27</th>
          <th class="txt-right">48,790.73</th>
        </tr>
      </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>
</html>