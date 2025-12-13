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

                            <div class="page-title">ตั้งค่าตัวแทน</div>

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

                                <div class="col" style="text-align: right;">
                                    <label>ชื่อตัวแทน</label>
                                </div>

                                <div class="col-1">
                                    <input name="agent_name" type="text" class="form-control" id="agent_name" placeholder="">
                                </div>



                                <div class="col-1" style="text-align: right;">
                                    <label>โทรศัพท์</label>
                                </div>

                                <div class="col-1">
                                    <input name="telephone" type="text" class="form-control" id="telephone" placeholder="">
                                </div>




                                <div class="col-1" style="text-align: right;">
                                    <label>ค่าคอม(%)</label>
                                </div>

                                <div class="col-1">
                                    <input name="agent_com" type="text" class="form-control" id="agent_com" placeholder="" onkeypress="validate(event)" >
                                </div>



                                <div class="col-1" style="text-align: right;">
                                    <label>ภาษี(%)</label>
                                </div>

                                <div class="col-1">
                                    <input name="agent_tax" type="text" class="form-control" id="agent_tax" placeholder="" onkeypress="validate(event)">
                                </div>




                                <div class="col-1" style="text-align: right;">
                                    <label>การใช้งาน</label>
                                </div>

                                <div class="col-1">
                                    <select name="agent_status" class="form-select" id="agent_status" aria-label="Default select example">
                                        <option value='x'>--เลือก--</option> 
                                        <option value="1">ใช้งาน</option>
                                        <option value="0">ไม่ใช้งาน</option>
                                    </select>
                                </div>

                                <div class="col-1" style="text-align: right;">
                                    <button type="button" class="btn btn-round btn-success" style="margin-bottom: 5px; margin-right: 5px;" onClick="AddAgent()">บันทึกข้อมูล</button>
                                </div>

                                <div class="col-1">
									<input type="hidden" id="dataID" name="dataID" value="x">
                                    <button type="reset" class="btn btn-round btn-danger" style="margin-bottom: 5px;" onClick="setDataID()" >ยกเลิก</button>
                                </div>

                            </div>
</form>
                            <br>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col" style="text-align: right;">
                                        <label>ค้นหา:</label>
                                    </div>

                                    <div class="col-2">
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>



                            <div class="card-body">

                                <div class="table-wrap">

                                    <div id="listAgent" class="table-responsive tblHeightSet"></div>

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