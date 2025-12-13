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

                            <div class="page-title">ตั้งค่าพนักงาน</div>

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


                                <!-- <div class="col">
                                    <a href="<?php echo base_url('Setting/add_detail'); ?>">
                                        <button type="button" class="btn btn-round btn-success" style="margin-bottom: 5px; margin-right: 5px;">
                                            <i class="fa fa-plus"> เพิ่มข้อมูล</i>
                                        </button>
                                    </a>
                                </div> -->

                                <div class="col-12">
                                    <a href="<?php echo base_url('Setting/setting_employee');?>">
                                        <button type="button" class="btn btn-round btn-warning" style="margin-bottom: 5px;">
                                            <i class="fa fa-list"> รายชื่อพนักงาน</i>
                                        </button>
                                    </a>
									&nbsp;
									<a href="<?php echo base_url('Setting/setting_add_employee');?>">
                                        <button type="button" class="btn btn-round btn-success" style="margin-bottom: 5px; margin-right: 5px;">
                                            <i class="fa fa-plus"> เพิ่มพนักงาน</i>
                                        </button>
                                    </a>
                                </div>

                            </div>

                            <div class="card-body">
                                <form action="#">
                                    <div class="form-horizontal">
                                        <div class="row">

                                            <div class="col">

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">ชื่อพนักงาน
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-8">
                                                        <input name="name_sname" type="text" class="form-control" id="name_sname" data-required="1" value="<?php echo $name_sname?>" />
                                                    </div>
                                                </div>


                                                <br>


                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Username
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-8">
                                                        <input name="user_name" type="text" class="form-control" id="user_name" data-required="1" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)" value="<?php echo $user_name?>" <?php echo $disUserName?> />
														<small class="text-danger">ภาษาอังกฤษ</small>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col">

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">โทรศัพท์</label>
                                                    <div class="col-md-8">
                                                        <input name="telephone_no" type="text" class="form-control" id="telephone_no" data-required="1" value="<?php echo $telephone_no?>" />
                                                    </div>
                                                </div>

                                                <br>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Password
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-8">
                                                        <input name="password" type="password" class="form-control" id="password" data-required="1" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)"/>
														<small class="text-danger">ภาษาอังกฤษหรือตัวเลข</small>
                                                    </div>
                                                </div>

                                            </div>



                                            <div class="col">

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">เลือกสาขา</label>
                                                    <div class="col-md-6">
                                                        <select name="user_branch" class="form-select" id="user_branch">
                                                            <option value="x" <?php if($user_branch=='x'){ echo "selected"; }?> >--เลือกสาขา--</option>
                                                            <option value="2"  <?php if($user_branch=='2'){ echo "selected"; }?>>พรบ ตรอ ตรวจสภาพรถ</option>
                                                            <option value="1"  <?php if($user_branch=='1'){ echo "selected"; }?>>ประกันภัย</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <br>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">การใช้งาน</label>
                                                    <div class="col-md-6">
                                                        <select name="data_status" class="form-select" id="data_status">
                                                            
                                                            <option value="1" <?php if($data_status=='1'){ echo "selected"; }?>>ใช้งาน</option>
                                                            <option value="0" <?php if($data_status=='0'){ echo "selected"; }?>>ไม่ใช้งาน</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>


                                        </div>


                                    </div>
                                    <div class="form-group">
                                        <div class="center col-md-12">
											<input type="hidden" id="dataID" name="dataID" value="<?php echo $dataID?>">
											
                                            <button type="button" class="btn btn-success" onClick="AddUser()">เพิ่ม/แก้ไขข้อมูล</button>
                                            <!-- <button type="button" class="btn btn-default">Cancel</button> -->
                                        </div>
										<div id="showNotice" align="center"></div>
                                    </div>
                                </form>
                            </div>



                            <br>

                          
                                <div class="col-2">
                                    <b class="font-red">ข้อแนะนำ</b>
                                </div>
                                <div class="col-12">
                                    <ul class="list-divided">
                                        <li>กรุณากรอกทุกช่องที่มีเครืองหมาย *</li>
                                        <li>Username และ Password กรุณาใช้ภาษาอังกฤษ จำนวนไม่เกิน 10 ตัวอักษร</li>
                                    </ul>
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