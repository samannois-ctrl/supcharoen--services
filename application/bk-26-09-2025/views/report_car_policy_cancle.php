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

                            <div class="page-title">ยกเลิกประกันภัย/พ.ร.บ. วันที่ x กุมภาพันธ์ 25xx ถึงวันที่ x ธันวาคม 25xx</div>

                        </div>

                    </div>

                </div>





                <div class="row">

                    <div class="col-md-12">

                        <div class="card card-topline-red">

                            <div class="card-head">

                                <header>
                                    รายการยกเลิกประกันภัย/พ.ร.บ.
                                </header>

                                <ol class="breadcrumb page-breadcrumb pull-right">

                                    <li><a href="<?php echo base_url('Report_car/report_car_policy_cancle_print'); ?>" target="_blank"><button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-print"></i> พิมพ์รายงานยกเลิกประกันภัย/พ.ร.บ.</button></a></li>

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



                                                    <label class="col-sm-1 control-label">เลือกประเภท</label>

                                                    <div class="col-sm-2">

                                                        <select class="form-select" aria-label="">

                                                            <option value="0">- ทั้งหมด - </option>

                                                            <option value="1">ประกันรถ</option>

                                                            <option value="2">พ.ร.บ.</option>

                                                        </select>

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

                                            <th style="text-align: center">ลำดับ</th>

                                            <th style="text-align: center">วันที่ยกเลิก</th>

                                            <th style="text-align: center">ชื่อ-สกุล</th>

                                            <th style="text-align: center">ทะเบียน</th>

                                            <th style="text-align: center">เลขกรมธรรม์</th>

                                            <th style="text-align: center">เลขกรมธรรม์ยกเลิก</th>

                                            <th style="text-align: center">เหตุผลยกเลิกกรมธรรม์</th>

                                            <th style="text-align: center">รายละเอียด</th>

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

                                            <td align="center">
                                                <a href="<?php echo base_url('Insurance_car/work_car_all'); ?>" target="_blank">

                                                    <button class="btn btn-circle btn-success btn-xs"><i class="fa fa-file-text"></i></button>

                                                </a>
                                            </td>

                                        </tr>

                                        <tr>

                                            <td style="text-align: center">2</td>

                                            <td align="center">01/08/2565</td>

                                            <td>Jens Brincker</td>

                                            <td align="center">4กฆ-1036 กทม.</td>

                                            <td>706-22-11-500-17847</td>

                                            <td>706-22-11-500-17847</td>

                                            <td>ลูกค้าแจ้งยกเลิก/ขายรถ</td>

                                            <td align="center">
                                                <a href="<?php echo base_url('Insurance_car/work_car_all'); ?>" target="_blank">

                                                    <button class="btn btn-circle btn-success btn-xs"><i class="fa fa-file-text"></i></button>

                                                </a>
                                            </td>

                                        </tr>

                                        <tr class="odd gradeX">

                                            <td style="text-align: center">3</td>

                                            <td align="center">01/08/2565</td>

                                            <td>Jens Brincker</td>

                                            <td align="center">4กฆ-1036 กทม.</td>

                                            <td>11002-103-220170952(1)(ซ่อมอู่)</td>

                                            <td>11002-103-220170952(1)(ซ่อมอู่)</td>

                                            <td>ลูกค้าแจ้งยกเลิก/ขายรถ</td>

                                            <td align="center">
                                                <a href="<?php echo base_url('Insurance_car/work_car_all'); ?>" target="_blank">

                                                    <button class="btn btn-circle btn-success btn-xs"><i class="fa fa-file-text"></i></button>

                                                </a>
                                            </td>

                                        </tr>

                                        <tr>

                                            <td style="text-align: center">4</td>

                                            <td align="center">01/08/2565</td>

                                            <td>Jens Brincker</td>

                                            <td align="center">4กฆ-1036 กทม.</td>

                                            <td>20-22-0004295</td>

                                            <td>20-22-0004295</td>

                                            <td>ยกเลิก ออก กธ.ซ้ำ</td>

                                            <td align="center">
                                                <a href="<?php echo base_url('Insurance_car/work_car_all'); ?>" target="_blank">

                                                    <button class="btn btn-circle btn-success btn-xs"><i class="fa fa-file-text"></i></button>

                                                </a>
                                            </td>

                                        </tr>

                                        <tr class="odd gradeX">

                                            <td style="text-align: center">5</td>

                                            <td align="center">01/08/2565</td>

                                            <td>Jens Brincker</td>

                                            <td align="center">4กฆ-1036 กทม.</td>

                                            <td>20-22-0004295</td>

                                            <td>20-22-0004295</td>

                                            <td>ยกเลิก กธ.เนื่องจากลูกค้าขายรถ</td>

                                            <td align="center">
                                                <a href="<?php echo base_url('Insurance_car/work_car_all'); ?>" target="_blank">

                                                    <button class="btn btn-circle btn-success btn-xs"><i class="fa fa-file-text"></i></button>

                                                </a>
                                            </td>

                                        </tr>

                                        <tr class="odd gradeX">

                                            <td style="text-align: center">6</td>

                                            <td align="center">01/08/2565</td>

                                            <td>Jens Brincker</td>

                                            <td align="center">4กฆ-1036 กทม.</td>

                                            <td>11002-103-220170952(1)(ซ่อมอู่)</td>

                                            <td>11002-103-220170952(1)(ซ่อมอู่)</td>

                                            <td>ลูกค้าแจ้งยกเลิก/ขายรถ</td>

                                            <td align="center">
                                                <a href="<?php echo base_url('Insurance_car/work_car_all'); ?>" target="_blank">

                                                    <button class="btn btn-circle btn-success btn-xs"><i class="fa fa-file-text"></i></button>

                                                </a>
                                            </td>

                                        </tr>


                                        <tr class="odd gradeX">

                                            <td style="text-align: center">7</td>

                                            <td align="center">01/08/2565</td>

                                            <td>Jens Brincker</td>

                                            <td align="center">4กฆ-1036 กทม.</td>

                                            <td>11002-103-220170952(1)(ซ่อมอู่)</td>

                                            <td>11002-103-220170952(1)(ซ่อมอู่)</td>

                                            <td>ลูกค้าแจ้งยกเลิก/ขายรถ</td>

                                            <td align="center">
                                                <a href="<?php echo base_url('Insurance_car/work_car_all'); ?>" target="_blank">

                                                    <button class="btn btn-circle btn-success btn-xs"><i class="fa fa-file-text"></i></button>

                                                </a>
                                            </td>

                                        </tr>


                                        <tr class="odd gradeX">

                                            <td style="text-align: center">8</td>

                                            <td align="center">01/08/2565</td>

                                            <td>Jens Brincker</td>

                                            <td align="center">4กฆ-1036 กทม.</td>

                                            <td>11002-103-220170952(1)(ซ่อมอู่)</td>

                                            <td>11002-103-220170952(1)(ซ่อมอู่)</td>

                                            <td>ลูกค้าแจ้งยกเลิก/ขายรถ</td>

                                            <td align="center">
                                                <a href="<?php echo base_url('Insurance_car/work_car_all'); ?>" target="_blank">

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