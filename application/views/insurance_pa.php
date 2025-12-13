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
							<div class="page-title">ประกันภัยอุบัติเหตุ (PA) ประจำเดือน xxxxxxx 2565</div>
						</div>
						<ol class="breadcrumb page-breadcrumb pull-right">
							<li>
								<a class="t-close btn-color fa fa-times" href="javascript:;"></a>								
							</li>
						</ol>						
						
					</div>
				</div>
				
					<div class="row">
                        <div class="col-md-12">
                            <div class="card card-topline-red">
                                <div class="card-head">
                                    <header>รายการประกันภัยอุบัติเหตุ</header>                                    
                                </div>
                                <div class="card-body ">
                                    <div class="row p-b-20">
                                        <div class="col-md-3 col-sm-2 col-3">
                                            <div class="btn-group">
												<a href="<?php echo base_url('Insurance_PA/work_pa_all');?>" class="nav-link">
                                                	<button id="addRow1" class="btn btn-info btn-lg m-b-10"> <i class="fa fa-plus"></i> เพิ่มลูกค้ารายใหม่ </button>
												</a>
                                            </div>
                                        </div>
										
										<div class="col-md-9 col-sm-9 col-9">
                                           
												<div class="card-body">
													<form class="form-horizontal">
														<div class="form-group row">
															<label class="col-sm-2 control-label">วันที่เริ่มต้น</label>
															<div class="col-sm-2">
																<input type="date" class="form-control">
															</div>											
															
															<label class="col-sm-2 control-label">วันที่สิ้นสุด</label>
															<div class="col-sm-2">
																<input type="date" class="form-control">
															</div>															
															
															<div class="col-sm-2">
																<button type="submit" class="btn btn-info">ตกลง</button>
															</div>
														</div>
													</form>		
												</div>
											
										</div>
                                        <!--<div class="col-md-6 col-sm-6 col-6">
                                            <div class="btn-group pull-right">
                                                <button class="btn deepPink-bgcolor  btn-outline dropdown-toggle"
                                                    data-bs-toggle="dropdown">Tools
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a href="javascript:;"><i class="fa fa-print"></i> Print </a></li>
                                                    <li><a href="javascript:;"><i class="fa fa-file-pdf-o"></i> Save as PDF </a></li>
                                                    <li><a href="javascript:;"><i class="fa fa-file-excel-o"></i> Export to Excel </a></li>
                                                </ul>
                                            </div>
                                        </div>-->
                                    </div>
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column full-width"  id="example4">
                                        <thead>
                                            <tr>
                                                	<th style="text-align: center">ลำดับ</th>
													<th style="text-align: center">วันทำกรมธรรม์</th>
													<th style="text-align: center">เลขที่กรมธรรม์</th>											
													<th style="text-align: center">ชื่อ - นามสกุล</th>
													<th style="text-align: center">บริษัทประกัน</th>
													<th style="text-align: center">ชื่อโค้ด</th>
													<th style="text-align: center">การชำระเงิน</th>
													<th style="text-align: center">ยอดที่ต้องชำระ</th>
													<th style="text-align: center">คงค้าง</th>
													<th style="text-align: center">หมายเหตุ</th>
													<th style="text-align: center">แก้ไข/รายละเอียด</th>
                                            </tr>
                                        </thead>
                                        <tbody>
												<tr class="odd gradeX">
													<td style="text-align: center">1</td>
													<td style="text-align: center">01/10/65</td>
													<td style="text-align: center">706-22-11-T00-30376</td>												
													<td>สร้อยกรัณฑ์ จันทร์ทอง</td>
													<td style="text-align: center">อาคเนย์</td>
													<td style="text-align: center">ดาริน</td>
													<td style="text-align: center;"><span class="label label-danger label-mini">ตามเงิน</span><br><span style="padding-top: 15px; font-size:12px; color: #FF0004">กำหนดชำระ : 28/09/2565</span></td>
													<td style="text-align: right">12,516.88</td>
													<td style="text-align: right">12,516.88</td>
													<td style="font-size: 12px;">ตามเงินตั้งแต่วันที่ 25 ก.ย. 65</td>
													<td style="text-align: center">
														<a href="<?php echo base_url('Insurance_PA/work_pa_all'); ?>">
															<button class="btn btn-circle btn-success"><i class="fa fa-file-text"></i></button>
														</a>
													</td>
												</tr>
												<tr class="odd gradeX">
													<td style="text-align: center">2</td>
													<td style="text-align: center">01/10/65</td>
													<td style="text-align: center">706-22-11-T00-30376</td>												
													<td>สร้อยกรัณฑ์ จันทร์ทอง</td>
													<td style="text-align: center">อาคเนย์</td>
													<td style="text-align: center">ดาริน</td>
													<td style="text-align: center"><span class="label label-success label-mini">ชำระเงินเรียนร้อย</span></td>
													<td style="text-align: right">12,516.88</td>
													<td style="text-align: right">12,516.88</td>
													<td style="font-size: 12px;"></td>
													<td style="text-align: center">
														<a href="<?php echo base_url('Insurance_PA/work_pa_all'); ?>">
															<button class="btn btn-circle btn-success"><i class="fa fa-file-text"></i></button>
														</a>
													</td>
												</tr>
											
											
												<tr class="odd gradeX">
													<td style="text-align: center">3</td>
													<td style="text-align: center">01/10/65</td>
													<td style="text-align: center">706-22-11-T00-30376</td>												
													<td>สร้อยกรัณฑ์ จันทร์ทอง</td>
													<td style="text-align: center">อาคเนย์</td>
													<td style="text-align: center">ดาริน</td>
													<td style="text-align: center;"><span class="label label-danger label-mini">ตามเงิน</span><br><span style="padding-top: 15px; font-size:12px; color: #FF0004">กำหนดชำระ : 28/09/2565</span></td>
													<td style="text-align: right">12,516.88</td>
													<td style="text-align: right">12,516.88</td>
													<td style="font-size: 12px;">&nbsp;</td>
													<td style="text-align: center">
														<a href="<?php echo base_url('Insurance_PA/work_pa_all'); ?>">
															<button class="btn btn-circle btn-success"><i class="fa fa-file-text"></i></button>
														</a>
													</td>
												</tr>
												<tr class="odd gradeX">
													<td style="text-align: center">4</td>
													<td style="text-align: center">01/10/65</td>
													<td style="text-align: center">706-22-11-T00-30376</td>												
													<td>สร้อยกรัณฑ์ จันทร์ทอง</td>
													<td style="text-align: center">อาคเนย์</td>
													<td style="text-align: center">ดาริน</td>
													<td style="text-align: center"><span class="label label-success label-mini">ชำระเงินเรียนร้อย</span></td>
													<td style="text-align: right">12,516.88</td>
													<td style="text-align: right">12,516.88</td>
													<td style="font-size: 12px;"></td>
													<td style="text-align: center">
														<a href="<?php echo base_url('Insurance_PA/work_pa_all'); ?>">
															<button class="btn btn-circle btn-success"><i class="fa fa-file-text"></i></button>
														</a>
													</td>
												</tr>
												<tr class="odd gradeX">
													<td style="text-align: center">5</td>
													<td style="text-align: center">01/10/65</td>
													<td style="text-align: center">706-22-11-T00-30376</td>												
													<td>สร้อยกรัณฑ์ จันทร์ทอง</td>
													<td style="text-align: center">อาคเนย์</td>
													<td style="text-align: center">ดาริน</td>
													<td style="text-align: center;"><span class="label label-danger label-mini">ตามเงิน</span><br><span style="padding-top: 15px; font-size:12px; color: #FF0004">กำหนดชำระ : 28/09/2565</span></td>
													<td style="text-align: right">12,516.88</td>
													<td style="text-align: right">12,516.88</td>
													<td style="font-size: 12px;">&nbsp;</td>
													<td style="text-align: center">
														<a href="<?php echo base_url('Insurance_PA/work_pa_all'); ?>">
															<button class="btn btn-circle btn-success"><i class="fa fa-file-text"></i></button>
														</a>
													</td>
												</tr>
                                        </tbody>
                                    </table>
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