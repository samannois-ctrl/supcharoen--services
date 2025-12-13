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
							<div class="page-title">รายงานใบสำคัญจ่าย</div>
						</div>
					</div>
				</div>

				
					<div class="row">
                        <div class="col-md-12">
                            <div class="card card-topline-red">
                                <div class="card-head">
                                    <header>รายการใบสำคัญจ่าย</header>                                    
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
															
															<label class="col-sm-1 control-label">เลือกบริษัท</label>
															<div class="col-sm-1">
																<select class="form-select" aria-label="">
																	<option value="0">- ทั้งหมด - </option>
																	<option value="1">AAAAAA</option>
																	<option value="2">BBBBBB</option>
																</select>
															</div>
															
															<label class="col-sm-1 control-label">กรมธรรม์</label>
															<div class="col-sm-2">
															  <select class="form-select" aria-label="">
																	<option value="0">- ทั้งหมด - </option>
																	<option value="1">พ.ร.บ.</option>
																	<option value="2">ประกันภัยชั้น 1</option>
																	<option value="3">ประกันภัยชั้น 2</option>
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
                                    <table
                                        class="table table-striped table-bordered table-hover table-checkable order-column full-width"
                                        id="example4">
                                        <thead>
                                            <tr>
                                                	<th style="text-align: center">ลำดับ</th>
                                                	<th style="text-align: center">ชื่อผู้เอาประกันภัย</th>
                                                	<th style="text-align: center">เลขที่กรมธรรม์</th>
                                                	<th style="text-align: center">ทะเบียน</th>
                                                	<th style="text-align: center">ประเภท</th>
													<th style="text-align: center">วันคุ้มครอง</th>
													<th style="text-align: center">เบี้ยสุทธิ</th>
													<th style="text-align: center">เบี้ยรวม</th>
													<th style="text-align: center">ค่าคอมฯ</th>
													<th style="text-align: center">เบี้ยชำระ</th>
													<th style="text-align: center">เลือกพิมพ์<br><input type="checkbox"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
												<tr class="odd gradeX">
													<td style="text-align: center">1</td>
													<td>สร้อยกรัณฑ์ จันทร์ทอง</td>
													<td>706-22-11-T00-30376</td>
													<td align="center">4กฆ-1036 กทม.</td>
													<td style="text-align: center">ป.1</td>
													<td align="center" style="text-align: center">01/10/65</td>
													<td align="right">41,209.00</td>
													<td align="right">44,270.18</td>
													<td align="right">5,563.22</td>
													<td align="right">38,706.97</td>
													<td align="center"><input type="checkbox"></td>
												</tr>
												<tr>
													<td style="text-align: center">2</td>
													<td>สร้อยกรัณฑ์ จันทร์ทอง</td>
													<td>706-22-11-T00-30376</td>
													<td align="center">4กฆ-1036 กทม.</td>
													<td class="odd gradeX" style="text-align: center">ป.1</td>
													<td align="center" style="text-align: center">01/10/65</td>
													<td align="right" class="odd gradeX">41,209.00</td>
													<td align="right" class="odd gradeX">44,270.18</td>
													<td align="right" class="odd gradeX">5,563.22</td>
													<td align="right" class="odd gradeX">38,706.97</td>
													<td align="center" class="odd gradeX"><input type="checkbox"></td>
												</tr>
												<tr class="odd gradeX">
													<td style="text-align: center">3</td>
													<td>สร้อยกรัณฑ์ จันทร์ทอง</td>
													<td>706-22-11-T00-30376</td>
													<td align="center">4กฆ-1036 กทม.</td>
													<td style="text-align: center">ป.1</td>
													<td align="center" style="text-align: center">01/10/65</td>
													<td align="right">41,209.00</td>
													<td align="right">44,270.18</td>
													<td align="right">5,563.22</td>
													<td align="right">38,706.97</td>
													<td align="center"><input type="checkbox"></td>
												</tr>
												<tr>
													<td style="text-align: center">4</td>
													<td>สร้อยกรัณฑ์ จันทร์ทอง</td>
													<td>706-22-11-T00-30376</td>
													<td align="center">4กฆ-1036 กทม.</td>
													<td class="odd gradeX" style="text-align: center">ป.1</td>
													<td align="center" style="text-align: center">01/10/65</td>
													<td align="right" class="odd gradeX">41,209.00</td>
													<td align="right" class="odd gradeX">44,270.18</td>
													<td align="right" class="odd gradeX">5,563.22</td>
													<td align="right" class="odd gradeX">38,706.97</td>
													<td align="center" class="odd gradeX"><input type="checkbox"></td>
												</tr>
												<tr class="odd gradeX">
													<td style="text-align: center">5</td>
													<td>สร้อยกรัณฑ์ จันทร์ทอง</td>
													<td>706-22-11-T00-30376</td>
													<td align="center">4กฆ-1036 กทม.</td>
													<td style="text-align: center">ป.1</td>
													<td align="center" style="text-align: center">01/10/65</td>
													<td align="right">41,209.00</td>
													<td align="right">44,270.18</td>
													<td align="right">5,563.22</td>
													<td align="right">38,706.97</td>
													<td align="center"><input type="checkbox"></td>
												</tr>
												<tr>
													<td style="text-align: center">6</td>
													<td>สร้อยกรัณฑ์ จันทร์ทอง</td>
													<td>706-22-11-T00-30376</td>
													<td align="center">4กฆ-1036 กทม.</td>
													<td class="odd gradeX" style="text-align: center">ป.1</td>
													<td align="center" style="text-align: center">01/10/65</td>
													<td align="right" class="odd gradeX">41,209.00</td>
													<td align="right" class="odd gradeX">44,270.18</td>
													<td align="right" class="odd gradeX">5,563.22</td>
													<td align="right" class="odd gradeX">38,706.97</td>
													<td align="center" class="odd gradeX"><input type="checkbox"></td>
												</tr>
												<tr>
												  <td style="text-align: center">7</td>
												  <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
												  <td>706-22-11-T00-30376</td>
												  <td align="center">4กฆ-1036 กทม.</td>
												  <td class="odd gradeX" style="text-align: center">ป.1</td>
												  <td align="center" style="text-align: center">01/10/65</td>
												  <td align="right" class="odd gradeX">41,209.00</td>
												  <td align="right" class="odd gradeX">44,270.18</td>
												  <td align="right" class="odd gradeX">5,563.22</td>
												  <td align="right" class="odd gradeX">38,706.97</td>
												  <td align="center" class="odd gradeX"><input type="checkbox"></td>
										  </tr>
												<tr class="odd gradeX">
												  <td style="text-align: center">8</td>
												  <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
												  <td>706-22-11-T00-30376</td>
												  <td align="center">4กฆ-1036 กทม.</td>
												  <td style="text-align: center">ป.1</td>
												  <td align="center" style="text-align: center">01/10/65</td>
												  <td align="right">41,209.00</td>
												  <td align="right">44,270.18</td>
												  <td align="right">5,563.22</td>
												  <td align="right">38,706.97</td>
												  <td align="center"><input type="checkbox"></td>
										  </tr>
												<tr>
												  <td style="text-align: center">9</td>
												  <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
												  <td>706-22-11-T00-30376</td>
												  <td align="center">4กฆ-1036 กทม.</td>
												  <td class="odd gradeX" style="text-align: center">ป.1</td>
												  <td align="center" style="text-align: center">01/10/65</td>
												  <td align="right" class="odd gradeX">41,209.00</td>
												  <td align="right" class="odd gradeX">44,270.18</td>
												  <td align="right" class="odd gradeX">5,563.22</td>
												  <td align="right" class="odd gradeX">38,706.97</td>
												  <td align="center" class="odd gradeX"><input type="checkbox"></td>
										  </tr>
												<tr class="odd gradeX">
												  <td style="text-align: center">10</td>
												  <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
												  <td>706-22-11-T00-30376</td>
												  <td align="center">4กฆ-1036 กทม.</td>
												  <td style="text-align: center">ป.1</td>
												  <td align="center" style="text-align: center">01/10/65</td>
												  <td align="right">41,209.00</td>
												  <td align="right">44,270.18</td>
												  <td align="right">5,563.22</td>
												  <td align="right">38,706.97</td>
												  <td align="center"><input type="checkbox"></td>
										  </tr>
												<tr>
												  <td style="text-align: center">&nbsp;</td>
												  <td>&nbsp;</td>
												  <td>&nbsp;</td>
												  <td align="center">&nbsp;</td>
												  <td class="odd gradeX" style="text-align: center">&nbsp;</td>
												  <td align="center" style="text-align: center">&nbsp;</td>
												  <td align="right" class="odd gradeX">&nbsp;</td>
												  <td align="right" class="odd gradeX">&nbsp;</td>
												  <td align="right" class="odd gradeX">&nbsp;</td>
												  <td align="right" class="odd gradeX">&nbsp;</td>
												  <td align="right" class="odd gradeX">&nbsp;</td>
								          </tr>
												<tr>
												  <td colspan="6" style="text-align: center">&nbsp;</td>
												  <td align="right" class="odd gradeX"><strong>539,209.00</strong></td>
												  <td align="right" class="odd gradeX"><strong>579,270.18</strong></td>
												  <td align="right" class="odd gradeX"><strong>72.,563.22</strong></td>
												  <td align="right" class="odd gradeX"><strong>506,702.97</strong></td>
												  <td align="right" class="odd gradeX">&nbsp;</td>
								          </tr>
												<tr>
												  <td colspan="9" style="text-align: right"><strong>เบี้ยประกันภัยยอดชำระ</strong></td>
												  <td align="right" class="odd gradeX" style="border-bottom: double;"><strong>506,707</strong></td>
												  <td align="right" class="odd gradeX">&nbsp;</td>
								          </tr>	
                                        </tbody>
                                    </table>
									
                                  	<p>&nbsp;</p>
									
									<div class="col-md-12 col-sm-12 col-12">                                           
												<div class="card-body">
													<form class="form-horizontal">
														<div class="form-group row">
															<label class="col-sm-1 control-label">วันที่ชำระ</label>
															<div class="col-sm-2">
																<input type="date" class="form-control">
															</div>											
															
														 	<label class="col-sm-1 control-label">ช่องทางชำระ</label>
																<div class="col-sm-1" style="margin-top: 8px;">
																	<div class="radio p-0">
																		<input type="radio" name="" id="" value="" checked="">
																		<label for="optionsRadios1">เงินสด</label>
																	</div>																			
																</div>		
																<div class="col-sm-3" style="margin-top: 8px;">
																	<div class="radio p-0">
																		<input type="radio" name="" id="" value="">
																		<label for="optionsRadios1">โอน/ธนาคาร</label> <input type="text" class="form-control">
																		<br>
																		&nbsp;&nbsp;&nbsp;&nbsp;วันที่ชำระ <input type="date" class="form-control">
																	</div>																			
																</div>		
																<div class="col-sm-4" style="margin-top: 8px;">
																	<div class="radio p-0">
																		<input type="radio" name="" id="" value="">
																		<label for="optionsRadios1">เช็คธนาคาร/สาขา</label> <input type="text" class="form-control">
																		<br>
																		&nbsp;&nbsp;&nbsp;&nbsp;เลขที่เช็ค <input type="text" class="form-control">
																	</div>																			
																</div>		
														</div>
														
														
														<div class="form-group row" style="padding-top: 40px;">
															<div class="col-sm-12" align="center">
																<button type="submit" class="btn btn-info">บันทึก</button>
																<a href="<?php echo base_url('Report_car/report_car_payment_insurance_print'); ?>" target="_blank">
																	<button type="button" class="btn btn-warning"><i class="fa fa-print"></i>พิมพ์ใบสำคัญจ่าย</button>
																</a>
															</div>
														</div>
													</form>		
												</div>
											
								  </div>

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