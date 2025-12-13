<!DOCTYPE html>

<html lang="en">

<!-- BEGIN HEAD -->

<head>

    <?php include("header.php"); ?>

    <style>
        table,

        td,

        th {

            border: 1px solid #C5C5C5;

        }

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

        .txt-right {

            text-align: right;

        }

        .txt-left {

            text-align: left !important;

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

                        <div class="pull-left">

                            <div class="page-title">บันทึกข้อมูลประกันอุบัติเหตุ</div>

                        </div>

                        <div class="page-title-breadcrumb pull-left">

                            <ol class="breadcrumb page-breadcrumb" style="background-color: #8bc34a; padding: 15px; margin-left: 20px;color: #000;font-size: 16px;">

                                <li><i class="fa fa-user" style="color:#121212"></i> นายแจ๊คสัน หวัง</li>

                                <li style="padding-left: 20px;"><i class="fa fa-phone" style="color:#121212"></i> 099-999-9999</li>

                            </ol>

                        </div>

                        <ol class="breadcrumb page-breadcrumb pull-right">

                            <li>วันที่ทำรายการ</li>

                            <li><input type="date" class="form-control" id="" placeholder=""></li>

                            <li style="padding-left: 15px;">เลือกชื่อผู้ขาย</li>

                            <li>

                                <select class="form-select" aria-label="">

                                    <option value="0">เลือกชื่อผู้ขาย</option>

                                    <option value="1">AAAAAA</option>

                                    <option value="2">BBBBBB</option>

                                </select>

                            </li>

                        </ol>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 col-sm-12">

                        <div class="card card-box">

                            <div class="card-head">

                                <header>ข้อมูลใบรับเงิน</header>

                                <ol class="breadcrumb page-breadcrumb pull-right">

                                    <li><a href="<?php echo base_url(''); ?>"><button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i>ใบรับเงินทั้งหมด</button></a></li>

                                </ol>

                            </div>

                            <div class="card-body " id="bar-parent1">

                                <form class="form-horizontal">

                                    <div class="form-group row">

                                        <label class="col-sm-2 control-label">วันที่</label>

                                        <div class="col-sm-4">

                                            <input type="date" class="form-control" id="" placeholder="">

                                        </div>



                                        <label class="col-sm-2 control-label">เลขที่ใบรับเงิน</label>

                                        <div class="col-sm-4">

                                            <input type="text" class="form-control" id="" placeholder="">

                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label class="col-sm-2 control-label">ชื่อ - นามสกุล</label>

                                        <div class="col-sm-4">

                                            <input type="text" class="form-control" id="" placeholder="">

                                        </div>

                                        <label class="col-sm-2 control-label">เลขที่กรมธรรม์</label>

                                        <div class="col-sm-4">

                                            <input type="text" class="form-control" id="" placeholder="">

                                        </div>

                                    </div>



                                    <div style="height: 40px; background-color: #E7E7E7; text-align: center; padding: 10px; margin: 0px 0px 20px 0px; color:#000; font-size: 16px; font-weight: 500">

                                        รายการชำระเงิน

                                    </div>

                                    <div class="form-group row">

                                        <label class="col-sm-2 control-label"></label>

                                        <div class="col-sm-2" style="margin-top: 8px;">

                                            <div class="radio p-0">

                                                <input type="checkbox" name="" id="" value="">

                                                <label for="optionsRadios1">&emsp;พ.ร.บ. + บริการ</label>

                                            </div>

                                        </div>

                                        <div class="col-sm-1"> </div>

                                        <div class="col-sm-2">

                                            <input type="text" class="form-control" id="" placeholder="">

                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label class="col-sm-2 control-label"></label>

                                        <div class="col-sm-2" style="margin-top: 8px;">

                                            <div class="radio p-0">

                                                <input type="checkbox" name="" id="" value="">

                                                <label for="optionsRadios1">&emsp;ทะเบียนรถ</label>

                                            </div>

                                        </div>

                                        <div class="col-sm-1"> </div>

                                        <div class="col-sm-2">

                                            <input type="text" class="form-control" id="" placeholder="">

                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label class="col-sm-2 control-label"></label>

                                        <div class="col-sm-2" style="margin-top: 8px;">

                                            <div class="radio p-0">

                                                <input type="checkbox" name="" id="" value="">

                                                <label for="optionsRadios1">&emsp;ตรวจสภาพรถ</label>

                                            </div>

                                        </div>

                                        <div class="col-sm-1"> </div>

                                        <div class="col-sm-2">

                                            <input type="text" class="form-control" id="" placeholder="">

                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label class="col-sm-2 control-label"></label>

                                        <div class="col-sm-2" style="margin-top: 8px;">

                                            <div class="radio p-0">

                                                <input type="checkbox" name="" id="" value="">

                                                <label for="optionsRadios1">&emsp;บริการต่อทะเบียน</label>

                                            </div>

                                        </div>

                                        <div class="col-sm-1"></div>

                                        <div class="col-sm-2">

                                            <input type="text" class="form-control" id="" placeholder="">

                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label class="col-sm-2 control-label"></label>

                                        <div class="col-sm-1" style="margin-top: 8px;">

                                            <div class="radio p-0">

                                                <input type="checkbox" name="" id="" value="">

                                                <label for="optionsRadios1">&emsp;อื่นๆ ระบุ</label>

                                            </div>

                                        </div>

                                        <div class="col-sm-2">

                                            <input type="text" class="form-control" id="" placeholder="">

                                        </div>

                                        <div class="col-sm-2">

                                            <input type="text" class="form-control" id="" placeholder="">

                                        </div>

                                    </div>

                                    <div style="height: 40px; background-color: #E7E7E7; text-align: center; padding: 10px; margin: 0px 0px 20px 0px; color:#000; font-size: 16px; font-weight: 500">

                                        รายการค่าประกัน

                                    </div>

                                    <div class="form-group row">

                                        <label class="control-label txt-left">การชำระเงิน : </label>

                                    </div>

                                    <div class="form-group row">

                                        <label class="col-sm-2 control-label"></label>

                                        <div class="col-sm-2" style="margin-top: 8px;">

                                            <div class="radio p-0">

                                                <input type="checkbox" name="" id="" value="">

                                                <label for="optionsRadios1">&emsp;ชำระเต็มจำนวน</label>

                                            </div>

                                        </div>

                                        <div class="col-sm-1"> </div>

                                        <div class="col-sm-2">

                                            <input type="text" class="form-control" id="" placeholder="">

                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label class="col-sm-2 control-label">รวมทั้งสิ้น</label>

                                        <div class="col-sm-3"></div>

                                        <div class="col-sm-2">

                                            <input type="text" class="form-control" id="" placeholder="">

                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label class="col-sm-2 control-label">เงินสด</label>

                                        <div class="col-sm-3"></div>

                                        <div class="col-sm-2">

                                            <input type="text" class="form-control" id="" placeholder="">

                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label class="col-sm-2 control-label">เงินโอน</label>

                                        <div class="col-sm-2">

                                            <input type="text" class="form-control" id="" placeholder="ระบุธนาคาร">

                                        </div>

                                        <div class="col-sm-1"></div>

                                        <div class="col-sm-2">

                                            <input type="text" class="form-control" id="" placeholder="">

                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label class="col-sm-2 control-label">บัตรเครดิต</label>

                                        <div class="col-sm-2">

                                            <input type="text" class="form-control" id="" placeholder="ระบุบัตรเครดิต">

                                        </div>

                                        <div class="col-sm-1"></div>

                                        <div class="col-sm-2">

                                            <input type="text" class="form-control" id="" placeholder="">

                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label class="col-sm-2 control-label">เช็คธนาคาร</label>

                                        <div class="col-sm-2">

                                            <input type="text" class="form-control" id="" placeholder="ระบุเลขที่เช็ค/ธนาคาร">

                                        </div>

                                        <div class="col-sm-1"></div>

                                        <div class="col-sm-2">

                                            <input type="text" class="form-control" id="" placeholder="">

                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label class="col-sm-2 control-label">เงินทอน</label>

                                        <div class="col-sm-3"></div>

                                        <div class="col-sm-2">

                                            <input type="text" class="form-control" id="" placeholder="">

                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label class="col-sm-2 control-label">หมายเหตุ</label>

                                        <div class="col-sm-5">

                                            <textarea class="form-control" rows="3"> </textarea>

                                        </div>

                                    </div>

                                    <div class="form-group" style="padding-top: 50px;">

                                        <div class="col-md-12" style="text-align: center">

                                            <button type="submit" class="btn btn-info">บันทึกข้อมูล</button>

                                            <a href="<?php echo base_url('Insurance_fire/work_fire_receipt_print'); ?>" target="_blank">

                                                <button type="button" class="btn btn-warning"> <i class="fa fa-print"></i>พิมพ์ใบรับเงิน</button>

                                            </a>

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- end page content -->

    </div>

    <!-- start footer -->

    <?php include("footer.php"); ?>

    <!-- end footer -->

</body>

</html>