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

                            <div class="page-title">เปลี่ยนรหัสผ่าน</div>

                        </div>

                    </div>

                </div>

                

				<div class="row">

					<div class="col-md-3 col-sm-3"></div>

													

					<div class="col-md-6 col-sm-6">

						<div class="card card-box">

							<div class="card-head">

								<header>เปลี่ยนรหัสผ่าน</header>

							</div>

							<div class="card-body " id="bar-parent1">

							
									<div class="form-group row" style="padding-top: 30px;">

										<label class="col-sm-3 control-label">ระบุรหัสผ่านใหม่</label>

										<div class="col-sm-9">

											<input type="text" class="form-control" id="Pass" name="Pass" placeholder="ระบุรหัสผ่านใหม่" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)">

											<span style="font-size: 14px; color: #A60002">(กรุณาตั้งรหัสผ่านที่คาดเดายาก และต้องเป็นตัวอักษรภาษาอังกฤษและตัวเลขเท่านั้น)</span>

										</div>																	

									</div>

									<div class="form-group row">

										<label class="col-sm-3 control-label">ระบุรหัสผ่านใหม่อีกครั้ง</label>

										<div class="col-sm-9">

											<input type="text" class="form-control" id="rePass" name="rePass" placeholder="ระบุรหัสผ่านใหม่อีกครั้ง" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)">

											<span style="font-size: 14px; color: #A60002">(กรุณาระบุรหัสผ่านให้เหมือนกับช่องรหัสผ่านใหม่ด้านบน)</span>

										</div>

																	

									</div>

									<div class="form-group" style="padding-top: 50px;">

										<div class="col-md-12" style="text-align: center">

											<button type="submit" class="btn btn-info" onclick="DoupdatePass()">บันทึกข้อมูล</button>

										</div>

									</div>																

							</div>

						</div>

					</div>

				</div>

				

            </div>

        </div>

        <!-- end page content -->

    </div>

    <!-- end page container -->

    <!-- start footer -->

    <?php include("footer.php"); ?>

    <!-- end footer -->
