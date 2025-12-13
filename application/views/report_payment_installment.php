<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
	<?php include("header.php"); ?>
	<style>
		table,
		td,
		th {
			border: 1px solid #C5C5C5;
		}
		html,
		body {
			width: 100%;
			height: 100%;
			margin: 0;
			padding: 0;
			overflow-x: hidden;
		}
		.txt-center {
			text-align: center;
		}
		.txt-right {
			text-align: right;
		}
	</style>
</head>
<!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md page-full-width header-white dark-sidebar-color logo-dark">
		<!-- start header -->
		<?php include("menu.php"); ?>
		<!-- end sidebar menu -->
		<!-- start page content -->
		<div class="page-content-wrapper">
			<div class="page-content">
				<div class="page-bar">
					<div class="page-title-breadcrumb">
						<div class="pull-left">
							<div class="page-title">รายงานค้างชำระ</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="panel tab-border card-box">
							<div class="card-body ">
								<div class="row">
													<div class="col-md-2 control-label">วันกำหนดชำระ</div>
											<div class="col-md-1">
												<select id="select_day_start" name="select_day_start" class="form-select" aria-label="" >
																	<option value='x'>-</option>
																	<?php for($i=1;$i<=31;$i++){?>
																	<option value="<?php echo $i?>" <?php if($DateStart==$i){ echo "selected";}?> ><?php echo $i?></option>
																	<?php }?>
												</select>
											</div>
											<div class="col-md-1">
																	<!--  monthArray  currMonth startYear select_month select_year-->
																		<select id="select_month_start" name="select_month_start" class="form-select" aria-label=""  >
																			<option value='x'>-</option>
																			<?php foreach($monthArray AS $monthID=>$monthName){?>
																			<option value="<?php echo $monthID?>" <?php if($monthID==$startMonth){ echo "selected";}?> ><?php echo $monthName?></option>
																			<?php }?>
																		</select>
																</div>	
											<div class="col-md-1">
																		<select id="select_year_start" name="select_year_start" class="form-select" aria-label="" >
																			<option value='x'>-</option>
																			<?php $txtSelected = ''; 
																			        for($i=0;$i<=($currYear-$startYear);$i++){ 
																						$YearShow = ($currYear-$i)+543;
																						$YearValue = ($currYear-$i);
																			            if($YearValue==$currYear){ $txtSelected = "selected";}else{ $txtSelected = ''; }
																			   ?>
																	           <option value="<?php echo $YearValue?>" <?php echo $txtSelected?>><?php echo $YearShow?></option>
																			  <?php  } ?>
																		</select>
											</div>
											<div class="col-md-1 control-label">ถึงวันที่</div>
													<div class="col-md-1">
														<select id="select_day_end" name="select_day_end" class="form-select" aria-label=""   >
																			<option value='x'>-</option>
																			<?php for($i=1;$i<=31;$i++){?>
																			<option value="<?php echo $i?>" <?php if($i==30){ echo "selected";}?> ><?php echo $i?></option>
																			<?php }?>
																			</select>
													</div>
													<div class="col-md-1">
																			<!--  monthArray  currMonth startYear select_month select_year-->
																				<select id="select_month_end" name="select_month_end" class="form-select" aria-label="">
																					<option value='x'>-</option>
																					<?php foreach($monthArray AS $monthID=>$monthName){?>
																					<option value="<?php echo $monthID?>" <?php if($monthID==$currentMonth){ echo "selected";}?> ><?php echo $monthName?></option>
																					<?php }?>
																				</select>
																		</div>	
											<div class="col-md-1"> 
																		<select id="select_year_end" name="select_year_end" class="form-select" aria-label="" >
																			<option value='x'>-</option>
																			<?php $txtSelected = ''; 
																			        for($i=0;$i<=($currYear-$startYear);$i++){ 
																						$YearShow = ($currYear-$i)+543;
																						$YearValue = ($currYear-$i);
																			            if($YearValue==$currYear){ $txtSelected = "selected";}else{ $txtSelected = ''; }
																			   ?>
																	           <option value="<?php echo $YearValue?>" <?php echo $txtSelected?>><?php echo $YearShow?></option>
																			  <?php  } ?>
																		</select>
											</div>
									</div>
									<div class="row" style="padding-top:10px;margin-bottom:10px;">
														<?php /*?>	<div class="col-sm-2">
																		<label class="control-label">เลือกเดือนคุ้มครอง</label>
																	    <select id="selectMonth" name="selectMonth" class="form-select">
																	           <option value="all">--ทุกเดือน--</option>
																			  <?php $txtSelected = ''; foreach($monthArray AS $monthNo=>$monthName){ 
																			            if($currMonth==$monthNo){ $txtSelected = "selected";}else{ $txtSelected = ''; }
																			   ?>
																	           <option value="<?php echo $monthNo?>" <?php //echo $txtSelected?>><?php echo $monthName?></option>
																			  <?php  } ?>
																	    </select>
																</div>
																<div class="col-sm-2">
																		<label class="control-label">เลือกปี</label>
																	    <select id="selectYear" name="selectYear" class="form-select">
																			  <?php $txtSelected = ''; 
																			        for($i=0;$i<=($currYear-$startYear);$i++){ 
																						$YearShow = ($currYear-$i)+543;
																						$YearValue = ($currYear-$i);
																			            if($YearShow==$currYear){ $txtSelected = "selected";}else{ $txtSelected = ''; }
																			   ?>
																	           <option value="<?php echo $YearValue?>" <?php echo $txtSelected?>><?php echo $YearShow?></option>
																			  <?php  } ?>
																	    </select>
																</div>
															<?php */?>
															<div class="col-sm-1 control-label"> สด/ผ่อน </div>
																<div class="col-sm-2">
																	
																	    <select id="payType" name="payType" class="form-select">
																			<option value="all">-ทุกประเภท-</option>
																			<option value="1">สด</option>
																			<option value="2">ผ่อน</option>
																		</select>
																</div>
																<div class="col-sm-2"><br> 
																	<?php  if($permission['psermission']==2){ 
																		  $checkThis='checked';
																		  if($getConfig=='1'){ $checkThis='checked'; }
																	?>
																	<input type="checkbox" id="hideSuccess" name="hideSuccess" value="1" <?php echo $checkThis?> > ซ่อนยอดชำระหมดแล้ว
																	<?php }else{ echo '<input type="hidden" name="hideSuccess" id="hideSuccess" value="'.$getConfig.'">'; }?>
																	
																</div>
																
																<div class="col-sm-1">															
																	<button type="button" class="btn btn-info" style="margin-top: 0px; padding: 5px 30px;" onClick="listData()"><i class="fa fa-search"></i> ตกลง</button>
																</div>
									</div>
									
									<div class="row">
										<div class="col-md-12" id="showReportOverdue"></div>
									</div>
						    </div>
					</div>
				</div>
			</div>
			<!--modal-->
			<div class="modal fade" id="exampleModalLong" tabindex="-1" aria-labelledby="exampleModalLongTitle" style="display: none;" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="exampleModalLongTitle">Modal title</h4>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body"></div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
									<!--<button type="button" class="btn btn-primary">Save changes</button>-->
								</div>
							</div>
						</div>
					</div>
			<!--//modal-->
		</div>
		<!-- end page content -->
	</div>
	<!-- start footer -->
	<?php include("footer.php"); ?>
	<!-- end footer -->
</body>
</html>