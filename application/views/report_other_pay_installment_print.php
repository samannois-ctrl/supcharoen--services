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
        }
    </style>
</head>
<body>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td height="35" colspan="3" align="center" style="font-size: 18px; font-weight: bold;">
                    รายงานการชำระเงินค่างวด ประกันเบ็ดเตล็ด<br>
                    ระหว่างวันที่ x กุมภาพันธ์ 25xx ถึงวันที่ x ธันวาคม 25xx</td>
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
                <th style="text-align: center">ชื่อ-สกุล</th>
                <th style="text-align: center">ประเภทประกัน</th>
                <th style="text-align: center">เลขที่กรมธรรม์</th>
                <th style="text-align: center">วันที่ชำระเงิน</th>
                <th style="text-align: center">วันที่โอนจริง</th>
                <th style="text-align: center">จำนวนเงิน</th>
                <th style="text-align: center">เลขที่ใบเสร็จ</th>
                <th style="text-align: center">ช่องทางการชำระเงิน</th>
                <th style="text-align: center">ผู้บันทึกข้อมูล</th>
                <th style="text-align: center">หมายเหตุ</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: center">1</td>
                <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
				<td>ประกันอัคคีภัย</td>
                <td align="center">706-22-11-T00-30376</td>
                <td align="center">01/10/65</td>
                <td align="center">01/10/65</td>
                <td align="right">3,100.00</td>
                <td>523224</td>
                <td align="center">เงินโอนธนาคาร</td>
                <td align="center">admin</td>
                <td></td>              
            </tr>
            <tr>
                <td style="text-align: center">2</td>
                <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
				<td>ประกันอัคคีภัย</td>
                <td align="center">706-22-11-T00-30376</td>
                <td align="center">01/10/65</td>
                <td align="center">01/10/65</td>
                <td align="right">3,100.00</td>
                <td>523224</td>
                <td align="center">เงินโอนธนาคาร</td>
                <td align="center">admin</td>
                <td></td>              
            </tr>
			<tr>
                <td style="text-align: center">3</td>
                <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
				<td>ประกันอัคคีภัย</td>
                <td align="center">706-22-11-T00-30376</td>
                <td align="center">01/10/65</td>
                <td align="center">01/10/65</td>
                <td align="right">3,100.00</td>
                <td>523224</td>
                <td align="center">เงินโอนธนาคาร</td>
                <td align="center">admin</td>
                <td></td>              
            </tr>
			<tr>
                <td style="text-align: center">4</td>
                <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
				<td>ประกันอัคคีภัย</td>
                <td align="center">706-22-11-T00-30376</td>
                <td align="center">01/10/65</td>
                <td align="center">01/10/65</td>
                <td align="right">3,100.00</td>
                <td>523224</td>
                <td align="center">เงินโอนธนาคาร</td>
                <td align="center">admin</td>
                <td></td>              
            </tr>
			<tr>
                <td style="text-align: center">5</td>
                <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
				<td>ประกันอัคคีภัย</td>
                <td align="center">706-22-11-T00-30376</td>
                <td align="center">01/10/65</td>
                <td align="center">01/10/65</td>
                <td align="right">3,100.00</td>
                <td>523224</td>
                <td align="center">เงินโอนธนาคาร</td>
                <td align="center">admin</td>
                <td></td>              
            </tr>
			
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>
</html>