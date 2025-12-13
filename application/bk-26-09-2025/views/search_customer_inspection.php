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
								<div class="page-title">ค้นหาลูกค้าทั้งหมด</div>
							</div>
							
						</div>
					</div>
					
					<div class="row">
												<div class="col-md-12 col-sm-12">
													<div class="card card-box">
														<div class="card-head">
															<header>ค้นหาลูกค้า</header>
														</div>
														<div class="card-body" id="bar-parent">
															<form class="row">
																<div class="col-sm-1">
																	<label class="control-label">ชื่อ-นามสกุล</label>
																	<input type="text" class="form-control" id="s_custname" name="s_custname">	
																</div>
																
																
																<div class="col-sm-1">
																	<label class="control-label">ชื่อเล่น</label>
																	<input type="text" class="form-control" id="s_cust_nickname">													
																</div>
																
																<div class="col-sm-1">
																	<label class="control-label">โทรศัพท์</label>
																	<input type="text" class="form-control" id="s_phone" name="s_phone">													
																</div>
																
																<div class="col-sm-1">
																	<label class="control-label">ทะเบียนรถ</label>
																	<input type="text" class="form-control" id="s_registration" name="s_registration">													
																</div>
																
																<div class="col-sm-2">
																	<label  class="control-label">ประเภทงาน</label>																	
																	<select id="s_workType" name="s_workType" class="form-select" aria-label="">																		
																		<option value="all">- ทั้งหมด -</option>
																		<option value="act">พ.ร.บ.</option>
																		<option value="tax">ภาษี</option>
																		<option value="inspect">ตรอ.</option>
																		
																	</select>			
																</div>
																
																<div class="col-sm-1">
																	<label class="control-label">การชำระเงิน</label>
																	<select id="s_payment" name="s_payment" class="form-select" aria-label="">
																			<option value="all">- ทั้งหมด -</option>
																			<option value="0">ค้างชำระ</option>
																			<option value="1">ชำระเรียบร้อย</option>
																	</select>  											
																</div>
																
																<div class="col-sm-1">
																	<label class="control-label">ปี พ.ศ.</label>
																	<select id="selectYear" name="selectYear" class="form-select" aria-label="">
																			<?php for($i=0;$i<=$RangeYear;$i++){
																				$valYear = $MinYear+$i;
																			?>
																			<option value="<?php echo $valYear?>" <?php if($currentYear==$valYear){ echo "selected";}?> ><?php echo $MinYear+$i+543?></option>
																		   <?php }?>
																			
																	</select>											
																</div>
																
																<div class="col-sm-1">																	
																	<button type="button" class="btn btn-info" style="margin-top: 25px; padding: 5px 30px;" onClick="searchCustomer();"><i class="fa fa-search"></i> ค้นหา</button>
																</div>
															</form>
														</div>
													</div>
												</div>
												
					</div>
					
					<div class="row">
                        <div class="col-md-12">
                            <div class="card card-topline-red">
                                <div class="card-head">
                                    <header>ผลการค้นหาลูกค้าทั้งหมด</header>                                    
                                </div>
                                <div class="card-body ">
                                  <div id="showSearchData"></div>
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