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
							<!--<div class="page-title">ตรอ. ส่ง พ.ร.บ. วันที่ <span id="start_date"></span> เดือน <span id="start_month"></span> <span id="start_year"></span></div>-->
						</div>
					</div>
				</div>

				
					<div class="row">
                        <div class="col-md-12">
                            <div class="card card-topline-red">
                                <div class="card-head">
                                    <header>รายการ ตรอ. ส่ง พ.ร.บ.</header>                                    
									<ol class="breadcrumb page-breadcrumb pull-right">
										<li>
											<!--<a href="<?php echo base_url('Inspection/inspection_act_print'); ?>" target="_blank">-->
												
												<button type="button" class="btn btn-warning btn-sm" onClick="printData1('printAble')"><i class="fa fa-print"></i>พิมพ์ใบ ตรอ. ส่ง พ.ร.บ.</button>
											<!--</a>-->
										</li>								
									</ol>	
                                </div>
                                <div class="card-body ">
                                  <div class="row p-b-20">
										<div class="col-md-12 col-sm-12 col-12">                                           
												<div class="card-body">
													<form class="form-horizontal">
														<div class="row">
															<label class="col-sm-1 control-label">วันที่เริ่มต้น</label>
															<div class="col-sm-2">
																<input name="startDate" id="startDate" type="text" class="form-control datepicker"  value="<?php echo $startDate?>" readonly="readonly" >
															</div>											
															
															<div class="col-sm-1 control-label">วันที่สิ้นสุด</div>
															<div class="col-sm-2">
																<input name="endDate" id="endDate" type="text" class="form-control datepicker"  value="<?php echo $endDate?>" readonly="readonly" >
															</div>
															<label class="col-sm-1 control-label">ประเภทรถ</label>
															<div class="col-sm-1">
																
																<select name="car_type_id" class="form-select carInput" id="car_type_id" aria-label="">
																	
																	<option value="allcar"> รถยนต์ทั้งหมด</option>
																<?php foreach($listCarType AS $carType){?>
																		<option value="<?php echo $carType->id?>" ><?php echo $carType->type_name?></option>
																<?php }?>
																	    
																		</select>
															</div>	
															<label class="col-sm-1 control-label">บริษัท</label>
															<div class="col-sm-2">
																
																<select name="insurance_corp_id" class="form-select" id="insurance_corp_id" aria-label="" >
																			
																			<option value="x">--ทุกบริษัท--</option>
																			<?php foreach($listInsCorp AS $corp){?>
																			<option value="<?php echo $corp->id?>" ><?php echo $corp->company_name?></option>
																			<?php }?>
																			
																		</select>
															</div>	
															<div class="col-sm-1">
																<button type="button" class="btn btn-info btn-sm" onClick="listReport()">ตกลง</button>
															</div>
														</div>
													</form>		
												</div>
											
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