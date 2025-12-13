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
                                        <a href="<?php echo base_url('Report_car/report_car_daily_data_print'); ?>" target="_blank">
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

                                    <!-- <thead>

                                            <tr>

                                                	<th rowspan="2" style="text-align: center">ลำดับ</th>

                                                	<th rowspan="2" style="text-align: center">ชื่อลูกค้า</th>

                                                	<th rowspan="2" style="text-align: center">ป้ายทะเบียน</th>

                                                	<th rowspan="2" style="text-align: center">โทรศัพท์</th>

                                                	<th style="text-align: center">	พรบ.</th>

													<th style="text-align: center">	ภาษี</th>

													<th style="text-align: center">ประกันภัย</th>

													<th style="text-align: center">ผู้ใส่ข้อมูล</th>

													<th style="text-align: center">	รายละเอียด</th>

                                            </tr>

                                        </thead> -->

                                    <tbody>

                                        <tr bgcolor="#dcdcdc">

                                            <th rowspan="2" style="text-align: center">ลำดับ</th>

                                            <th rowspan="2" style="text-align: center">ชื่อ-สกุล</th>

                                            <th rowspan="2" style="text-align: center">ทะเบียน</th>

                                            <th rowspan="2" style="text-align: center">โทรศัพท์</th>

                                            <th colspan="2" style="text-align: center"> พ.ร.บ.</th>

                                            <th colspan="2" style="text-align: center"> ภาษี</th>

                                            <th colspan="2" style="text-align: center">ประกันภัย</th>

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


                                        </tr>

                                        <tr class="odd gradeX">

                                            <td style="text-align: center">1</td>

                                            <td>Jens Brincker</td>

                                            <td align="center">4กฆ-1036 กทม.</td>

                                            <td align="center">xxxxxxxxxx</td>

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

                                            <td>Jens Brincker</td>

                                            <td align="center">4กฆ-1036 กทม.</td>

                                            <td align="center">xxxxxxxxxx</td>

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

                                            <td>Jens Brincker</td>

                                            <td align="center">4กฆ-1036 กทม.</td>

                                            <td align="center">xxxxxxxxxx</td>

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

                                            <td>Jens Brincker</td>

                                            <td align="center">4กฆ-1036 กทม.</td>

                                            <td align="center">xxxxxxxxxx</td>

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

                                            <td style="text-align: center">5</td>

                                            <td>Jens Brincker</td>

                                            <td align="center">4กฆ-1036 กทม.</td>

                                            <td align="center">xxxxxxxxxx</td>

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

                                            <td>Jens Brincker</td>

                                            <td align="center">4กฆ-1036 กทม.</td>

                                            <td align="center">xxxxxxxxxx</td>

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

                                            <td>Jens Brincker</td>

                                            <td align="center">4กฆ-1036 กทม.</td>

                                            <td align="center">xxxxxxxxxx</td>

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

                                            <td>Jens Brincker</td>

                                            <td align="center">4กฆ-1036 กทม.</td>

                                            <td align="center">xxxxxxxxxx</td>

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