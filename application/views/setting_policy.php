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

                            <div class="page-title">ตั้งค่าประเภทกรมธรรม์</div>

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
<form method="post">
                            <div class="card-head" style="padding-bottom: 20px">

                                

                                <!-- <header>Booking Details</header> -->

                                <div class="col">
                                    <label>ชื่อประเภทกรมธรรม์</label>
                                </div>

                                <div class="col-3">
                                    <input name="insurance_type_name" type="text" class="form-control" id="insurance_type_name" placeholder="">
                                </div>



                                <div class="col-1" style="text-align: right;">
                                    <label>ประเภท</label>
                                </div>

                                <div class="col-2">
                                    <select name="insurance_type" class="form-select" id="insurance_type" aria-label="Default select example">
                                       <option value="x">--เลือกประเภทกรมธรรม์--</option>
                                        <option value="1">ประเภทสมัครใจ</option>
                                        <option value="2">ประเภทบังคับ</option>
                                    </select>
                                </div>



                                <div class="col-1" style="text-align: right;">
                                    <label>การใช้งาน</label>
                                </div>

                                <div class="col-1">
                                    <select name="insurance_type_status" class="form-select" id="insurance_type_status" aria-label="Default select example">
                                       <option value="x">--เลือก--</option>
                                        <option value="1">ใช้งาน</option>
                                        <option value="0">ไม่ใช้งาน</option>
                                    </select>
                                </div>

                                <div class="col-1" style="text-align: right;">
									<input type="hidden" id="updateID" name="updateID">
                                    <button type="button" class="btn btn-round btn-success" style="margin-bottom: 5px; margin-right: 5px;" onClick="addInsTypeData()">บันทึกข้อมูล</button>
                                </div>

                                <div class="col-1">
                                    <button type="reset" class="btn btn-round btn-danger" style="margin-bottom: 5px;" onClick="setDataID()">ยกเลิก</button>
                                </div>

                               
                            </div>
</form>
                            <div class="card-body ">

                                <div class="table-wrap">

                                    <div id="showInsType" class="table-responsive tblHeightSet"></div>

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