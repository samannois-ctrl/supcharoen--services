<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <?php include("header.php"); ?>
    <style>
        html,
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        .txt-center {
            text-align: center;
        }
    </style>
</head>
<!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md page-full-width header-white dark-sidebar-color logo-dark">
    <div class="page-wrapper">
        <!-- start header -->
        <?php include("menu.php"); ?>
        <!-- end sidebar menu -->
        <!-- start page content -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">รายรับ ประจำวันที่ 10 ตุลาคม 2565</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-topline-red">
                            <div class="card-head">
                                <header>
                                    รายการรายรับ
                                </header>
                                <ol class="breadcrumb page-breadcrumb pull-right">
                                    <li>
                                        <a href="<?php echo base_url('Report_other/report_other_receipt_print'); ?>" target="_blank">
                                            <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-print"></i>
                                                พิมพ์รายงานรายรับ</button>
                                        </a>
                                    </li>
                                </ol>
                            </div>
                            <div class="card-body ">
                                <div class="row p-b-20">
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <div class="card-body">
                                            <form class="form-horizontal">
                                                <div class="form-group row">
                                                    <label class="col-sm-1 control-label">เลือกวัน</label>
                                                    <div class="col-sm-2">
                                                        <input type="date" class="form-control">
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <button type="submit" class="btn btn-info">ตกลง</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
                                            <td align="center">1234-5678</td>
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
                                            <td align="center">1234-5678</td>
                                            <td align="center">ประกันอัคคีภัย</td>
                                            <td align="center">12345678</td>
											<td align="center">เงินโอน ธ.กสิกร</td>
											<td align="center">4/6</td>
                                            <td align="right">3,500.00</td>
                                            <td align="right">12,000.00</td>
                                            <td align="center">xxxxxxx xxxxxx</td>
                                        </tr>
										<tr>
                                            <td class="txt-center">3</td>
                                            <td>ลัดดาวรรณ พุทธสุภะ</td>
                                            <td align="center">1234-5678</td>
                                            <td align="center">ประกันอัคคีภัย</td>
                                            <td align="center">12345678</td>
											<td align="center">เงินโอน ธ.กสิกร</td>
											<td align="center">4/6</td>
                                            <td align="right">3,500.00</td>
                                            <td align="right">12,000.00</td>
                                            <td align="center">xxxxxxx xxxxxx</td>
                                        </tr>
										<tr>
                                            <td class="txt-center">4</td>
                                            <td>ลัดดาวรรณ พุทธสุภะ</td>
                                            <td align="center">1234-5678</td>
                                            <td align="center">ประกันอัคคีภัย</td>
                                            <td align="center">12345678</td>
											<td align="center">เงินโอน ธ.กสิกร</td>
											<td align="center">4/6</td>
                                            <td align="right">3,500.00</td>
                                            <td align="right">12,000.00</td>
                                            <td align="center">xxxxxxx xxxxxx</td>
                                        </tr>
										<tr>
                                            <td class="txt-center">5</td>
                                            <td>ลัดดาวรรณ พุทธสุภะ</td>
                                            <td align="center">1234-5678</td>
                                            <td align="center">ประกันอัคคีภัย</td>
                                            <td align="center">12345678</td>
											<td align="center">เงินโอน ธ.กสิกร</td>
											<td align="center">4/6</td>
                                            <td align="right">3,500.00</td>
                                            <td align="right">12,000.00</td>
                                            <td align="center">xxxxxxx xxxxxx</td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" style="text-align: right"><strong>รวมรายรับ</strong></td>
                                            <td colspan="3" style="border-bottom: double; text-align: right;"><strong>20,500.00</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p>&nbsp;</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page content -->
        <!-- start footer -->
        <?php include("footer.php"); ?>
        <!-- end footer -->
</body>
</html>