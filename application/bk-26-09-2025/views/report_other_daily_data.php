<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <?php include("header.php"); ?>
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
                            <div class="page-title">ข้อมูลรายวัน</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-topline-red">
                            <div class="card-head">
                                <header>รายการข้อมูลรายวัน</header>
                                <ol class="breadcrumb page-breadcrumb pull-right">
                                    <li>
                                        <a href="<?php echo base_url('Report_other/report_other_daily_data_print'); ?>" target="_blank">
                                            <button type="submit" class="btn btn-warning btn-sm">
                                                <i class="fa fa-print"></i>
                                                พิมพ์รายงานข้อมูลรายวัน</button>
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
                                                    <label class="col-sm-1 control-label">วันที่เริ่มต้น</label>
                                                    <div class="col-sm-2">
                                                        <input type="date" class="form-control">
                                                    </div>
                                                    <label class="col-sm-1 control-label">วันที่สิ้นสุด</label>
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
                                            <th rowspan="2" style="text-align: center">รายละเอียด</th>
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
                                            <td align="center">
                                                <a href="<?php echo base_url('Insurance_car/work_car_all'); ?>" target="_blank">
                                                    <button class="btn btn-circle btn-success btn-xs"><i class="fa fa-file-text"></i></button>
                                                </a>
                                            </td>
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
                                            <td align="center">
                                                <a href="<?php echo base_url('/'); ?>" target="_blank">
                                                    <button class="btn btn-circle btn-success btn-xs"><i class="fa fa-file-text"></i></button>
                                                </a>
                                            </td>
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
                                            <td align="center">
                                                <a href="<?php echo base_url('/'); ?>" target="_blank">
                                                    <button class="btn btn-circle btn-success btn-xs"><i class="fa fa-file-text"></i></button>
                                                </a>
                                            </td>
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
                                            <td align="center">
                                                <a href="<?php echo base_url('/'); ?>" target="_blank">
                                                    <button class="btn btn-circle btn-success btn-xs"><i class="fa fa-file-text"></i></button>
                                                </a>
                                            </td>
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
                                            <td align="center">
                                                <a href="<?php echo base_url('/'); ?>" target="_blank">
                                                    <button class="btn btn-circle btn-success btn-xs"><i class="fa fa-file-text"></i></button>
                                                </a>
                                            </td>
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
                                            <td align="center">
                                                <a href="<?php echo base_url('/'); ?>" target="_blank">
                                                    <button class="btn btn-circle btn-success btn-xs"><i class="fa fa-file-text"></i></button>
                                                </a>
                                            </td>
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
                                            <td align="center">
                                                <a href="<?php echo base_url('/'); ?>" target="_blank">
                                                    <button class="btn btn-circle btn-success btn-xs"><i class="fa fa-file-text"></i></button>
                                                </a>
                                            </td>
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