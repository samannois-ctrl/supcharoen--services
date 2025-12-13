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
                    รายงานยกเลิกประกันภัย/พ.ร.บ.<br>
                    ระหว่างวันที่ x กุมภาพันธ์ 25xx ถึงวันที่ x ธันวาคม 25xx
                </td>

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

                <th style="text-align: center">วันที่ยกเลิก</th>

                <th style="text-align: center">ชื่อ-สกุล</th>

                <th style="text-align: center">ทะเบียน</th>

                <th style="text-align: center">เลขกรมธรรม์</th>

                <th style="text-align: center">เลขกรมธรรม์ยกเลิก</th>

                <th style="text-align: center">เหตุผลยกเลิกกรมธรรม์</th>

            </tr>

        </thead>

        <tbody>

            <tr class="odd gradeX">

                <td style="text-align: center">1</td>

                <td align="center">01/08/2565</td>

                <td>Jens Brincker</td>

                <td align="center">4กฆ-1036 กทม.</td>

                <td>706-22-11-500-17847</td>

                <td>706-22-11-500-17847</td>

                <td>ลูกค้าแจ้งยกเลิก</td>

                

            </tr>

            <tr>

                <td style="text-align: center">2</td>

                <td align="center">01/08/2565</td>

                <td>Jens Brincker</td>

                <td align="center">4กฆ-1036 กทม.</td>

                <td>706-22-11-500-17847</td>

                <td>706-22-11-500-17847</td>

                <td>ลูกค้าแจ้งยกเลิก/ขายรถ</td>

                

            </tr>

            <tr class="odd gradeX">

                <td style="text-align: center">3</td>

                <td align="center">01/08/2565</td>

                <td>Jens Brincker</td>

                <td align="center">4กฆ-1036 กทม.</td>

                <td>11002-103-220170952(1)(ซ่อมอู่)</td>

                <td>11002-103-220170952(1)(ซ่อมอู่)</td>

                <td>ลูกค้าแจ้งยกเลิก/ขายรถ</td>

                

            </tr>

            <tr>

                <td style="text-align: center">4</td>

                <td align="center">01/08/2565</td>

                <td>Jens Brincker</td>

                <td align="center">4กฆ-1036 กทม.</td>

                <td>20-22-0004295</td>

                <td>20-22-0004295</td>

                <td>ยกเลิก ออก กธ.ซ้ำ</td>

                

            </tr>

            <tr class="odd gradeX">

                <td style="text-align: center">5</td>

                <td align="center">01/08/2565</td>

                <td>Jens Brincker</td>

                <td align="center">4กฆ-1036 กทม.</td>

                <td>20-22-0004295</td>

                <td>20-22-0004295</td>

                <td>ยกเลิก กธ.เนื่องจากลูกค้าขายรถ</td>

                

            </tr>

            <tr class="odd gradeX">

                <td style="text-align: center">6</td>

                <td align="center">01/08/2565</td>

                <td>Jens Brincker</td>

                <td align="center">4กฆ-1036 กทม.</td>

                <td>11002-103-220170952(1)(ซ่อมอู่)</td>

                <td>11002-103-220170952(1)(ซ่อมอู่)</td>

                <td>ลูกค้าแจ้งยกเลิก/ขายรถ</td>

                

            </tr>


            <tr class="odd gradeX">

                <td style="text-align: center">7</td>

                <td align="center">01/08/2565</td>

                <td>Jens Brincker</td>

                <td align="center">4กฆ-1036 กทม.</td>

                <td>11002-103-220170952(1)(ซ่อมอู่)</td>

                <td>11002-103-220170952(1)(ซ่อมอู่)</td>

                <td>ลูกค้าแจ้งยกเลิก/ขายรถ</td>

                

            </tr>


            <tr class="odd gradeX">

                <td style="text-align: center">8</td>

                <td align="center">01/08/2565</td>

                <td>Jens Brincker</td>

                <td align="center">4กฆ-1036 กทม.</td>

                <td>11002-103-220170952(1)(ซ่อมอู่)</td>

                <td>11002-103-220170952(1)(ซ่อมอู่)</td>

                <td>ลูกค้าแจ้งยกเลิก/ขายรถ</td>

                

            </tr>



        </tbody>

    </table>

    <script>
        window.print();
    </script>

</body>

</html>