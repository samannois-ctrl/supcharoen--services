<!DOCTYPE html>

<html lang="en">

<!-- BEGIN HEAD -->



<head>

<?php include("header.php"); ?>

<style>
html,body{
width: 100%;
height: 100%;
margin: 0;
padding: 0;
overflow-x: hidden;
}

.txt-center{
text-align: center;
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

	<div class=" pull-left">

		<div class="page-title">ตั้งค่าสมุดธนาคาร</div>

	</div>

</div>

</div>



<!-- start Payment Details -->

<div class="row">

<div class="col-md-12 col-sm-12">

<div class="white-box border-gray">

<div class="card-head" style="padding-bottom: 20px">

<header>ข้อมูลสมุดธนาคาร</header>


</div>

<div class="card-body ">
     
	<form class="form-horizontal" role="form">
                                            <div class="form-group row">
											
												
                                               
                                                <div class="col-md-2">ชื่อธนาคาร
                                                    <input type="text" class="form-control form-control-sm bbank" name="bank_name" id="bank_name" placeholder="ชื่อธนาคารภาษาไทย">
													
                                                </div>
												
									
                                                <div class="col-md-3">
													สาขาธนาคาร
 													<input type="text" id="bank_branch" name="bank_branch" class="form-control form-control-sm  bbank" placeholder="ชื่อสาขาธนาคารภาษาไทย">
 													
                                                </div> 
												
												  <div class="col-md-3">
													ชื่อบัญชี
 													<input type="text" id="bank_acc_name" name="bank_acc_name" class="form-control form-control-sm  bbank" placeholder="ชื่อบัญชีธนาคารภาษาไทย">
 													
                                                </div> 
												 <div class="col-md-2">เลขที่บัญชี
                                           		<input type="text" id="bank_number" name="bank_number" class="form-control form-control-sm  bbank">
                                                </div>
									
												 <div class="col-md-2">
													 สถานะใช้งาน
                                           		<select name="data_status" id="data_status" class="form-control form-control-sm  ">
													<option value="0">ยกเลิกใช้งาน</option>
													<option value="1" selected="">ใช้งาน</option>
												 </select>
													  
												
                                                </div>
                                              <div class="col-md-1">
                                                 <br>
                                              <button type="button" class="btn btn-success" onclick="addBookBank()">เพิ่มธนาคาร</button>
												</div>
                                            </div>
              </form>
	<div id="showBb" class="table-responsive tblHeightSet"></div>

</div>

<br>

<!--
<div class="center col-md-12" style="display: inline-block;">

	<button type="submit" class="btn btn-success">บันทึกข้อมูล</button>


	<button type="submit" class="btn btn-danger">ยกเลิก</button>

</div>-->


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