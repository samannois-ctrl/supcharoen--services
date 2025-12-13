<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
	<?php include("header.php"); ?>
</head>
<!-- END HEAD -->
<style>		
		body{
		  -webkit-print-color-adjust:exact !important;
		  print-color-adjust:exact !important;
		}
		
		/* css ส่วนสำหรับการแบ่งหน้าข้อมูลสำหรับการพิมพ์ */
		@media all
		{
			.page-break { display:none; }
			.page-break-no{ display:none; }
		}
	
	    @media screen
			{
				.printOnly{display:none;}
			}

		
	
		@media print
		{
			.page-break { display:block;height:1px; page-break-before:always; }
			.page-break-no{ display:block;height:1px; page-break-after:avoid; } 
			.printOnly {
			   display : block;
			}
			body {		
				background-color: #fff;				
				color: #000;
				
				margin: 0;
			}
			@page { 
				size: a4;
				margin: 0;
				/*size: a5 landscape;
				size: landscape;
				margin: 0;*/
			}
			.table .tr .td {
				font-size: 16px;
			}
		}
				
		
		
		
	</style> 
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
							<div class="page-title">แบบรายงานการตรวจสภาพรถผ่านระบบสารสนเทศ (ระบบใหม่)</div>
						</div>
						
					</div>
				</div>

				
					<div class="row">
                        <div class="col-md-12">
                            <div class="card card-topline-red">
                                <div class="card-head">
                                    <header>รายงานการตรวจสภาพรถผ่านระบบสารสนเทศ</header>   
									<ol class="breadcrumb page-breadcrumb pull-right">
										<li>
										<!--<a href="<?php //echo base_url('Inspection/inspection_information_print'); ?>" target="_blank">
												<button type="button" class="btn btn-info btn-sm"><i class="fa fa-print"></i>พิมพ์ ต.ร.อ.ส่ง พ.ร.บ.</button>
										</a>-->
										
										<!--<button type="button" class="btn btn-info btn-sm" onClick="printActDaily('actDaily')">
											<i class="fa fa-print"></i>พิมพ์ใบส่งเงิน ตรอ </button>
										&nbsp;&nbsp;-->
											
											<button type="button" class="btn btn-warning btn-sm" onClick="printReport('printArea')"><i class="fa fa-print"></i>พิมพ์แบบรายงานการตรวจสภาพรถ</button>
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
														<button type="button" class="btn btn-info btn-sm" onClick="loadMonthlyReport()">ตกลง</button>
												  </div>
														
											</div>													
									  </form>		
																							
									</div>
								 </div>
								 <div id="showReport"></div>
                                 <div id="showReportPrint"></div>
                                 <div id="showActDailyPrint"></div>
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