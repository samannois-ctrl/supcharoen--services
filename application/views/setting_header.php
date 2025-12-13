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

                            <div class="page-title">ตั้งค่าหัวกระดาษ&nbsp;&nbsp;ใบรับเงิน&nbsp;&nbsp;และใบแจ้งหนี้</div>

                        </div>

                        <!-- <ol class="breadcrumb page-breadcrumb pull-right">

							<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"

									href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>

							</li>

							<li class="active">Dashboard</li>

						</ol> -->

                    </div>

                </div>



                <!-- start Payment Details -->

                <div class="row">

                    <div class="col-md-12 col-sm-12">

                        <div class="white-box border-gray">

                            <div class="card-head" style="padding-bottom: 20px; border-bottom: 0;">

                                <!-- <header>Booking Details</header> -->


                                <div class="col">
                                    <a href="<?php echo base_url('Setting/setting_add_header'); ?>">
                                        <button type="button" class="btn btn-round btn-success" style="margin-bottom: 5px; margin-right: 5px;">
                                            <i class="fa fa-plus"> เพิ่มข้อมูล</i>
                                        </button>
                                    </a>
                                </div>

                                <!-- <div class="col-1">
                                    <a href="<?php echo base_url('Setting/setting_header'); ?>">
                                        <button type="button" class="btn btn-round btn-warning" style="margin-bottom: 5px;">
                                            <i class="fa fa-list"> ดูรายชื่อ</i>
                                        </button>
                                    </a>
                                </div> -->

                            </div>

                            <div class="card-body ">

                                <div class="table-wrap">

                                    <div id="showData" class="table-responsive tblHeightSet"></div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- end Payment Details -->



            </div>

        </div>

        <!-- end page content -->



    </div>

    <!-- end page container -->



    <!-- start footer -->

    <?php include("footer.php"); ?>

    <!-- end footer -->




</body>



</html>