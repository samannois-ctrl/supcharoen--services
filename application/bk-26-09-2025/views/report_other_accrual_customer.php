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
							<div class="page-title">รายงานลูกค้าค้างจ่าย</div>
						</div>
						
					</div>
				</div>
				
				
					<div class="row">
                        <div class="col-md-12">
                            <div class="card card-topline-red">
                                <div class="card-head">
                                    <header>รายการลูกค้าค้างจ่าย</header>    
									<ol class="breadcrumb page-breadcrumb pull-right" style="background: none;">
										<li><a href="<?php echo base_url('Report_other/report_other_accrual_customer_print');?>" target="_blank"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-print"></i> พิมพ์รายงานลูกค้าค้างจ่าย</button></a></li>
									</ol>
                                </div>
								
                                <div class="card-body ">
                                    <div class="row p-b-20">
                                       
									  <div class="col-md-12 col-sm-12 col-12">
                                           
												<div class="card-body">
													<form class="form-horizontal">
														<div class="form-group row">
															<label class="col-sm-1 control-label">วันที่เริ่มต้น</label>
															<div class="col-sm-2">
																<input type="date" class="form-control">
															</div>											
															
															<label class="col-sm-1 control-label">วันที่สิ้นสุด</label>
															<div class="col-sm-2">
																<input type="date" class="form-control">
															</div>		
															
															<label class="col-sm-1 control-label">เลือกประเภท</label>															
															<div class="col-sm-2" style="margin-top: 8px;">
																<select class="form-select" aria-label="">
																	<option value="0">- ทั้งหมด -</option>
																	<option value="1">ประกันอัคคีภัย</option>
																	<option value="2">ประกันขนส่ง</option>
																	<option value="1">ประกันอุบัติเหตุ</option>
																	<option value="2">ประกันท่องเที่ยว</option>
																</select>																	
															</div>
															
															<label class="col-sm-1 control-label">สถานะ</label>
															<div class="col-sm-1" style="margin-top: 8px;">
																<select class="form-select" aria-label="">
																	<option value="0">- ทั้งหมด -</option>
																	<option value="1">ค้างชำระ</option>
																	<option value="2">ฃำระแล้ว</option>
																</select>
															</div>	
															
															<div class="col-sm-1">
																<button type="submit" class="btn btn-info">ตกลง</button>
															</div>
														</div>
													</form>		
												</div>
											
										</div>
                                    </div>
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column full-width">
                                        <thead>
                                            <tr>
                                                	<th style="text-align: center">ลำดับ</th>
													<th style="text-align: center">ชื่อ - นามสกุล</th>
													<th style="text-align: center">เลขที่กรมธรรม์</th>
													<th style="text-align: center">บริษัท</th>
													<th style="text-align: center">ประเภทประกัน</th>
													<th style="text-align: center">วันคุ้มครอง</th>
													<th style="text-align: center">เบี้ยสุทธิ</th>
													<th style="text-align: center">เบี้ยรวม</th>
													<th style="text-align: center">ส่วนลด</th>
													<th style="text-align: center">เบี้ยหลังหักส่วนลด</th>
													<th style="text-align: center">เบี้ยชำระแล้ว</th>
													<th style="text-align: center">เบี้ยค้างชำระ</th>
													<th style="text-align: center">สถานะ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
												<tr class="odd gradeX">
													<td style="text-align: center">1</td>
													<td>สร้อยกรัณฑ์ จันทร์ทอง</td>
													<td>1234-5678</td>
													<td>CHUBB</td>
													<td>ประกันอุบัติเหตุ</td>
													<td style="text-align: center">01/10/65</td>
													<td style="text-align: right">12,119.00</td>
													<td style="text-align: right">13,019.76</td>
													<td style="text-align: right">0.76</td>
													<td style="text-align: right">13,019.00</td>
													<td style="text-align: right">10,019.00</td>
													<td style="text-align: right">3,000.00</td>													
													<td style="text-align: center"><button class="btn btn-xs btn-warning"> ค้างชำระ </button></td>
												</tr>
												<tr class="odd gradeX">
												  <td style="text-align: center">2</td>
												  <td>เอกพงษ์ วิจักษณานนท์</td>
												  <td>1234-5678</td>
												  <td>อลิอันซ์</td>
												  <td>ประกันท่องเที่ยว</td>
												  <td style="text-align: center">20/10/65</td>
												  <td style="text-align: right">12,119.00</td>
												  <td style="text-align: right">13,019.76</td>
												  <td style="text-align: right">0.76</td>
												  <td style="text-align: right">13,019.00</td>
												  <td style="text-align: right">10,019.00</td>
												  <td style="text-align: right">3,000.00</td>
												  <td style="text-align: center"><button class="btn btn-xs btn-warning"> ค้างชำระ </button></td>
										  </tr>
												<tr class="odd gradeX">
												  <td style="text-align: center">3</td>
												  <td>วาริน แซ่ลิ้ม</td>
												  <td>1234-5678</td>
												  <td>AXA</td>
												  <td>ประกันขนส่ง</td>
												  <td style="text-align: center">20/10/65</td>
												  <td style="text-align: right">12,119.00</td>
												  <td style="text-align: right">13,019.76</td>
												  <td style="text-align: right">0.76</td>
												  <td style="text-align: right">13,019.00</td>
												  <td style="text-align: right">10,019.00</td>
												  <td style="text-align: right">3,000.00</td>
												  <td style="text-align: center"><button class="btn btn-xs btn-warning"> ค้างชำระ </button></td>
										  </tr>
												<tr class="odd gradeX">
												  <td style="text-align: center">4</td>
												  <td>หจก. เอ็น.พี</td>
												  <td>1234-5678</td>
												  <td>AXA</td>
												  <td>ประกันอัคคีภัย</td>
												  <td style="text-align: center">20/10/65</td>
												  <td style="text-align: right">12,119.00</td>
												  <td style="text-align: right">13,019.76</td>
												  <td style="text-align: right">0.76</td>
												  <td style="text-align: right">13,019.00</td>
												  <td style="text-align: right">13,019.00</td>
												  <td style="text-align: right">0.00</td>
												  <td style="text-align: center"><button class="btn btn-xs btn-success"> ชำระแล้ว </button></td>
										  </tr>
												<tr class="odd gradeX">
												  <td style="text-align: center">5</td>
												  <td>เอกพงษ์ วิจักษณานนท์</td>
												  <td>1234-5678</td>
												  <td>อลิอันซ์</td>
												  <td>ประกันท่องเที่ยว</td>
												  <td style="text-align: center">20/10/65</td>
												  <td style="text-align: right">12,119.00</td>
												  <td style="text-align: right">13,019.76</td>
												  <td style="text-align: right">0.76</td>
												  <td style="text-align: right">13,019.00</td>
												  <td style="text-align: right">10,019.00</td>
												  <td style="text-align: right">3,000.00</td>
												  <td style="text-align: center"><button class="btn btn-xs btn-warning"> ค้างชำระ </button></td>
										  </tr>
												<tr class="odd gradeX">
												  <td style="text-align: center">&nbsp;</td>
												  <td>&nbsp;</td>
												  <td>&nbsp;</td>
												  <td>&nbsp;</td>
												  <td>&nbsp;</td>
												  <td style="text-align: center">&nbsp;</td>
												  <td style="text-align: right">&nbsp;</td>
												  <td style="text-align: right">&nbsp;</td>
												  <td style="text-align: right">&nbsp;</td>
												  <td style="text-align: right">&nbsp;</td>
												  <td style="text-align: right">&nbsp;</td>
												  <td style="text-align: right">&nbsp;</td>
												  <td style="text-align: center">&nbsp;</td>
										  </tr>
												<tr class="odd gradeX">
												  <td style="text-align: center">&nbsp;</td>
												  <td>&nbsp;</td>
												  <td>&nbsp;</td>
												  <td>&nbsp;</td>
												  <td style="text-align: right"><strong>รวมทั้งสิ้น</strong></td>
												  <td style="text-align: center">&nbsp;</td>
												  <td style="text-align: right"><strong>99,999.99</strong></td>
												  <td style="text-align: right"><strong>99,999.99</strong></td>
												  <td style="text-align: right"><strong>999.99</strong></td>
												  <td style="text-align: right"><strong>99,999.99</strong></td>
												  <td style="text-align: right"><strong>99,999.99</strong></td>
												  <td style="text-align: right"><strong>99,999.99</strong></td>
												  <td style="text-align: center">&nbsp;</td>
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