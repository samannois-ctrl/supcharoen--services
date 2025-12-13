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
																	<label class="control-label">ชื่อ</label>
																	<input name="cust_name" type="text"  class="form-control fsearch" id="cust_name">	
																</div>
																
																
																<div class="col-sm-1">
																	<label class="control-label">ชื่อเล่น</label>
																	<input name="cust_nickname" type="text" class="form-control fsearch" id="cust_nickname">												
																</div>
																
																<div class="col-sm-1">
																	<label class="control-label">โทรศัพท์</label>
																	<input name="cust_telephone" type="text" class="form-control fsearch" id="cust_telephone">													
																</div>
																
																<div class="col-sm-1">
																	<label class="control-label">ทะเบียนรถ</label>
																	<input name="vehicle_regis" type="text" class="form-control fsearch" id="vehicle_regis">													
																</div>
																
																<div class="col-sm-2">
																	<label class="control-label">ประเภทงาน</label>																	
																	<select id="workType" class="form-select" aria-label="">
																		<option value="0">- ทั้งหมด -</option>
																		<option value="1">ประกันรถ</option>
																		<option value="2">พ.ร.บ.</option>
																		<option value="3">ภาษี</option>
																		<option value="4">ตรอ.</option>
																	<!--	<option value="5">ประกันอัคคีภัย</option>
																		<option value="6">ประกันขนส่ง</option>
																		<option value="7">ประกันอุบัติเหตุ (PA)</option>
																		<option value="8">ประกันท่องเที่ยว</option>-->
																	</select> 	
																</div>
																
																<div class="col-sm-1">
																	<label class="control-label">ตัวแทน</label>																	
																	<select id="agent_id" name="agent_id" class="form-select" aria-label="">
																		<option value="0">- ทั้งหมด -</option>
																		<?php foreach($listAgent AS $agent){?>	
																		<option value="<?php echo $agent->id?>"><?php echo $agent->agent_name?></option>
																		<?php }?>
																	</select>			
																</div>
																
															<!--	<div class="col-sm-1">
																	<label class="control-label">การชำระเงิน</label>
																	<select name="overdue"  class="form-select" id="overdue" aria-label="">
																			<option value="0">- ทั้งหมด -</option>
																			<option value="1">ค้างชำระ</option>
																			<option value="2">ชำระเรียบร้อย</option>
																	</select>														
																</div>-->
																
																<div class="col-sm-1">
																	<label class="control-label">ปี พ.ศ.</label>
																	<select id="selectYear" name="selectYear" class="form-select" aria-label="">
																		
																		 <?php for($i=0; $i<=($currentYear-$startYear);$i++){ ?>
																			<option value="<?php echo $startYear+$i?>"><?php echo $startYear+$i+543?></option>
																		<?php }?>
																			
																	</select> 							
																</div>
																
																<div class="col-sm-1">																	
																	<button type="button" class="btn btn-info" style="margin-top: 25px; padding: 5px 30px;" onClick="SearchAllCustomer()"><i class="fa fa-search"></i> ค้นหา</button>
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
                                   <div id="showAllSearch"></div>
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