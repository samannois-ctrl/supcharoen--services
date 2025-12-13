
<html lang="en">

<!-- BEGIN HEAD -->



<head>

<?php include("header.php"); ?>

</head>

<!-- END HEAD 

xxx<?php echo $this->session->userdata('user_id')?>-->

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md page-full-width header-white dark-sidebar-color logo-dark">

<div class="page-wrapper">

<!-- start header -->

<?php include("menu.php"); ?>

<!-- end sidebar menu -->

<!-- start page content -->

<div class="page-content-wrapper">

<div class="page-content">	





<div class="row">

	<div class="col-md-12">

		<div class="card card-topline-red">

			<div class="card-head">

				<header>รายการรายจ่าย</header>                                    

			</div>

			<div class="card-body ">

				<div class="row p-b-20">

					<div class="col-md-3 col-sm-2 col-3">

						<div class="btn-group">

							

						</div>

					</div>



					<div class="col-md-12 col-sm-12 col-12">
					  <div class="form-group row">
								<label class="col-md-1 control-label">วันที่</label>
								<div class="col-md-2"><input type="text" id="expenses_date" name="expenses_date" class="form-control form-control-sm datepicker" readonly value="<?php echo $startDay?>" style="width: 100px;" onChange="updateStartDate(this.value)"></div>
								<label class="col-md-2">รายการค่าใช้จ่าย</label>
								<div class="col-md-2"><input name="expenses_name" type="text" class="form-control" id="expenses_name"></div>
						<label class="col-md-1">จำนวนเงิน</label>
								<div class="col-md-2"><input name="expenses_price" type="text" class="form-control" id="expenses_price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"></div>
						<div class="col-md-1"><button type="button" class="btn btn-success " onClick="saveExpense()">บันทึก</button></div>	
					  </div>			

					</div>

					
				</div>
				<div class="row">
					<div class="col-12">
					รายการค่าใช้จ่ายวันที่ &nbsp;&nbsp;<span id="showListDate"><?php echo $startDay?></span>
					<input type="hidden" id="expenses_date_select" name="expenses_date_select" value="<?php echo $startDay?>"></div></div>
					
					<!--<input type="text" id="expenses_date_select" name="expenses_date_select" class="form-control form-control-sm datepicker" readonly value="<?php //echo $startDay?>">-->
				<div id="showData"></div>

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

