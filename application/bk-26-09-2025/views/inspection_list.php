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
							<div class="page-title">รายงานการตรวจสภาพรถรายวัน</div>
						</div>
						
					</div>
				</div>

				
					<div class="row">
                        <div class="col-md-12">
                            <div class="card card-topline-red">
                                <div class="card-head">
                                    <header>รายการ ตรอ. ประจำวันที่ <span id="showCurrDate"><?php //echo $curentDate?></span></header>    
									<ol class="breadcrumb page-breadcrumb pull-right">
										<li>
											<!--<a href="<?php //echo base_url('Inspection/inspection_remittance_print'); ?>" target="_blank">
												<button type="button" class="btn btn-warning btn-sm"><i class="fa fa-print"></i>พิมพ์ใบส่งเงิน ตรอ. รายวัน</button>
											</a>-->
											<!--<button type="button" class="btn btn-warning btn-sm" onClick="printToDaily()"><i class="fa fa-print"></i>พิมพ์ใบส่งเงิน ตรอ. รายวัน</button>-->
										</li>
										<li style="padding-left: 20px;">
											<!--<a href="<?php //echo base_url('Inspection/inspection_daily_print'); ?>" target="_blank">-->
												
											<!--</a>-->
											<button type="button"class="btn btn-danger btn-sm" onClick="printData1('printInspect')"><i class="fa fa-print"></i>พิมพ์รายงานรายวัน</button>
										</li>										
									</ol>									
                                </div>
                                <div class="card-body ">
                                  <div class="row p-b-20">   
									<div class="col-md-12 col-sm-12 col-12"> 
										<form class="form-horizontal">
											<div class="form-group row">
												
												<div class="col-sm-1">
													<select id="select_day" name="select_day" class="form-select" aria-label="">
													
													<?php for($i=1;$i<=31;$i++){?>
													<option value="<?php echo $i?>" <?php if($startday==$i){ echo "selected";}?> ><?php echo $i?></option>
													<?php }?>
													</select>
												</div>
												 
												  <div class="col-sm-2">
													<!--  monthArray  currMonth startYear select_month select_year-->
														<select id="select_month" name="select_month" class="form-select" aria-label="">
															<?php foreach($monthArray AS $monthID=>$monthName){?>
															<option value="<?php echo $monthID?>" <?php if($monthID==$currMonth){ echo "selected";}?> ><?php echo $monthName?></option>
															<?php }?>
														</select>
												  </div>	
												
												  <div class="col-sm-1">
														<select id="select_year" name="select_year" class="form-select" aria-label="">
															<?php for($i=0;$i<=$rangeYear;$i++){ 
																	$txtYear = $startYear+$i;
															?>
															<option value="<?php echo $txtYear?>" <?php if($txtYear==$currYear){ echo "selected";}?> ><?php echo $txtYear?></option>
															<?php }?>
															
														</select>
												  </div>
												<label class="col-sm-1 control-label">ถึง</label>
												<div class="col-sm-2">
													<select id="select_day_end" name="select_day_end" class="form-select" aria-label="">
													
													<?php for($i=1;$i<=31;$i++){?>
													<option value="<?php echo $i?>" <?php if($startday==$i){ echo "selected";}?> ><?php echo $i?></option>
													<?php }?>
													</select>
												</div>
												 
												  <div class="col-sm-2">
													<!--  monthArray  currMonth startYear select_month select_year-->
														<select id="select_month_end" name="select_month_end" class="form-select" aria-label="">
															<?php foreach($monthArray AS $monthID=>$monthName){?>
															<option value="<?php echo $monthID?>" <?php if($monthID==$currMonth){ echo "selected";}?> ><?php echo $monthName?></option>
															<?php }?>
														</select>
												  </div>	
												  
												  <div class="col-sm-1">
														<select id="select_year_end" name="select_year_end" class="form-select" aria-label="">
															<?php for($i=0;$i<=$rangeYear;$i++){ 
																	$txtYear = $startYear+$i;
															?>
															<option value="<?php echo $txtYear?>" <?php if($txtYear==$currYear){ echo "selected";}?> ><?php echo $txtYear?></option>
															<?php }?>
															
														</select>
												  </div>	
												  <div class="col-sm-1">
														<button type="button" class="btn btn-info btn-sm" onClick="listInspection()">ตกลง</button>
												  </div>
														
											</div>													
									  </form>
										<?php /*	?>
										<form class="form-horizontal">
											<div class="form-group row">
												<label class="col-sm-1 control-label">เลือกวันที่</label>
												<div class="col-sm-2">
													<input name="date_work" type="text" class="form-control datepicker" id="date_work" value="<?php echo $curentDate?>" readonly="readonly" onChange="setShowDate(this.value)">
												</div>	
												<div class="col-sm-1">
										<button type="button" class="btn btn-info btn-sm" onClick="listInspection()">ตกลง</button>
												</div>
											</div>													
										</form>		
										<?php */?>
									</div>
 								</div>
								<div id="showReport"></div>
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
	
</body>

</html>