<!DOCTYPE html>

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

				<header>รายการ <?php echo $titleOtherInsurance[$selectType]?></header>                                    
				
			</div>

			<div class="card-body ">
		
					<div class="col-md-12 col-sm-12 col-12">

						<div class="btn-group">
							<a href="<?php echo base_url('Insurance_other/work_insurance_other_add/').$selectType?>" class="nav-link">
								<button id="addRow1" class="btn btn-success btn-lg m-b-10"> <i class="fa fa-plus"></i> เพิ่มลูกค้ารายใหม่ </button>
							</a>
						</div>
					<div class="btn-group">
						<!--<a class="btn btn-warning btn-lg m-b-10" href="http://localhost/supcharoenbroker.com/Insurance_car2/anticipate_customer">ลูกค้ามุ่งหวัง</a>-->
					</div>
				  </div>
						<div class="col-md-12 col-sm-12">
												
														<div class="card-head">
															<header>ค้นหาข้อมูล</header>
														</div>
														<div class="card-body" id="bar-parent">
															<form class="row">
																
															

																
															 <div class="col-sm-2">
																		<label class="control-label">เลือกเดือน</label>
																	    <select id="selectMonth" name="selectMonth" class="form-select">
																	           <option value="all">--ทุกเดือน--</option>
																			  <?php $txtSelected = ''; foreach($monthArray AS $monthNo=>$monthName){ 
																			            //if($currMonth==$monthNo){ $txtSelected = "selected";}else{ $txtSelected = ''; }
																			   ?>
																	           <option value="<?php echo $monthNo?>" <?php echo $txtSelected?>><?php echo $monthName?></option>
																			  <?php  } ?>
																	    </select>
																</div>
																<div class="col-sm-2">
																		<label class="control-label">เลือกปี</label>
																	    <select id="selectYear" name="selectYear" class="form-select">
																	            <?php $txtSelected = ''; 
																			        for($i=0;$i<=((($currYear+1)-$startYear)+1);$i++){ 
																						$YearShow = (($currYear+1)-$i)+543;
																						$YearValue = (($currYear+1)-$i);
																						
																			           if($YearValue==$currYear){ $txtSelected = "selected";}else{ $txtSelected = ''; }
																			   ?>
																	           <option value="<?php echo $YearValue?>" <?php echo $txtSelected?>><?php echo $YearShow?></option>
																			  <?php  } ?>
																	    </select>
																	
																</div>
																
																<div class="col-sm-1">
																	<label class="control-label">ชำระครั้งเดียว/ผ่อน</label>
																	<select id="payType" name="payType" class="form-select" aria-label="">
																		<option value="0">- ทั้งหมด -</option>
																		<option value="1">ชำระครั้งเดียว</option>
																		<option value="2">เงินผ่อน</option>
																	</select>													
																</div>
																
																
																<!--<div class="col-sm-2">
																	<label class="control-label">ช่องทางชำระเงิน</label>																	
																	<select class="form-select" aria-label="">
																		<option value="0">- ทั้งหมด -</option>
																		<option value="1">เงินสด</option>
																		<option value="2">โอนเงินธนาคาร</option>
																		<option value="2">บัตรเครดิต</option>
																		<option value="2">เช็คธนาคาร</option>
																	</select>	
																</div>-->																
																																
																<div class="col-sm-1">																	
																	<button type="button" class="btn btn-info" style="margin-top: 25px; padding: 5px 30px;" onClick="listInsOther('<?php echo $selectType?>')"><i class="fa fa-search"></i> ค้นหา</button>
																</div>
															</form>
														</div>
													
												</div>
					<div class="table-responsive" id="showInsOtherList"></div>
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
	
	
	
	