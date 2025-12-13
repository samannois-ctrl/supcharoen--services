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
                    รายงานข้อมูลรายวัน
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
        <tbody>
            <tr bgcolor="#dcdcdc">
                                            <th rowspan="2" style="text-align: center">ลำดับ</th>
                                            <th rowspan="2" style="text-align: center">ชื่อ-สกุล</th>
                                            <th rowspan="2" style="text-align: center">เลขที่กรมธรรม์</th>
                                            <th rowspan="2" style="text-align: center">บริษัท</th>
                                            <th colspan="2" style="text-align: center">ประกันอัคคีภัย</th>
                                            <th colspan="2" style="text-align: center">ประกันขนส่ง</th>
                                            <th colspan="2" style="text-align: center">ประกันอุบัติเหตุ</th>
											<th colspan="2" style="text-align: center">ประกันท่องเที่ยว</th>
                                            <th rowspan="2" style="text-align: center">ผู้ใส่ข้อมูล</th>
                                        </tr>
                                        <tr bgcolor="#dcdcdc">
                                            <th style="text-align: center"> วันคุ้มครอง</th>
                                            <th style="text-align: center"> วันสิ้นสุด</th>
                                            <th style="text-align: center"> วันจดทะเบียน</th>
                                            <th style="text-align: center"> วันสิ้นอายุภาษี</th>
                                            <th style="text-align: center"> วันคุ้มครอง</th>
                                            <th style="text-align: center"> วันสิ้นสุด</th>
											<th style="text-align: center"> วันคุ้มครอง</th>
                                            <th style="text-align: center"> วันสิ้นสุด</th>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td style="text-align: center">1</td>
                                            <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
                                            <td align="center">706-22-11-T00-30376</td>
                                            <td align="center">อาคเนย์</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
											<td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">admin</td>                                           
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">2</td>
                                            <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
                                            <td align="center">706-22-11-T00-30376</td>
                                            <td align="center">อาคเนย์</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
											<td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">admin</td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td style="text-align: center">3</td>
                                            <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
                                            <td align="center">706-22-11-T00-30376</td>
                                            <td align="center">อาคเนย์</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
											<td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">admin</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">4</td>
                                            <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
                                            <td align="center">706-22-11-T00-30376</td>
                                            <td align="center">อาคเนย์</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
											<td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">admin</td>
                                        </tr>
                                       
                                        <tr class="odd gradeX">
                                            <td style="text-align: center">6</td>
                                            <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
                                            <td align="center">706-22-11-T00-30376</td>
                                            <td align="center">อาคเนย์</td>
                                            <td align="center">01/10/65</td>
											<td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">admin</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">7</td>
                                            <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
                                            <td align="center">706-22-11-T00-30376</td>
                                            <td align="center">อาคเนย์</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
											<td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">admin</td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td style="text-align: center">8</td>
                                            <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
                                            <td align="center">706-22-11-T00-30376</td>
                                            <td align="center">อาคเนย์</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
											<td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center">admin</td>
                                        </tr>
			
			
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>
</html>