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

                            <div class="page-title">ตั้งค่าบริษัทประกันภัย</div>

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

                            <div class="card-head" style="padding-bottom: 20px">

                                <!-- <header>Booking Details</header> -->


                                <label style="margin-right: 10px;">ชื่อบริษัท</label>


                                <div class="col-3">
                                    <input type="text" id="company_name" name="company_name" class="form-control" placeholder="">
                                </div>

                                <div class="col-1">
                                </div>

                                <label style="margin-right: 10px;">การใช้งาน</label>


                                <div class="col-1" style="margin-right: 30px;">
                                    <select id="company_status" name="company_status" class="form-select" aria-label="Default select example">
                                        <option value="1">ใช้งาน</option>
                                        <option value="2">ไม่ใช้งาน</option>
                                    </select>
                                </div>

                                <button type="button" class="btn btn-round btn-success" style="margin-bottom: 5px; margin-right: 5px;" onclick="AddCompany()" >บันทึกข้อมูล</button>
                                <button type="button" class="btn btn-round btn-danger" style="margin-bottom: 5px;" onclick="resetForm()" >ยกเลิก</button>
                                <button type="button" class="btn btn-round btn-info" style="margin-bottom: 5px;" onclick="listCompany()" >เรียกข้อมูลใหม่</button>

                            </div>
                          
                            <div class="card-body" id="showCompanylist"></div>

                        </div>

                    </div>

                </div>

                <!-- end Payment Details -->



            </div>

        </div>

        <!-- end page content -->



    </div>

    <!-- end page container -->

    <!-- start modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title txt-info" id="exampleModalLongTitle">ข้อมูลบริษัทประกันภัย</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <label class="control-label col-md-3">ชื่อเต็มบริษัท</label>
                        <div class="col-md-8">
                            <input type="text" name="" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">ที่อยู่บริษัท</label>
                        <div class="col-md-8">
                            <input type="text" name="" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">โทรศัพท์</label>
                        <div class="col-md-8">
                            <input type="text" name="" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">เลขประจำตัวผู้เสียภาษี</label>
                        <div class="col-md-8">
                            <input type="text" name="" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">ข้อความ</label>
                        <div class="col-md-8">
                            <input type="text" name="" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">โลโก้</label>
                        <div class="col-md-8">
                            <input type="file" name="" class="form-control" />
                        </div>
                    </div>



                </div>
                <div class="modal-footer" style="justify-content: center;">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-success">บันทึก</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->

    <!-- start footer -->

    <?php include("footer.php"); ?>

    <!-- end footer -->




</body>



</html>