<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
	<?php include("header.php"); ?>
		
	<style>
	.table td, .table th, .card .table td, .card .table th, .card .dataTable td, .card .dataTable th{
			white-space: nowrap;
				 
	}
	</style>
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
							<div class="page-title">ทะเบียนคุมงานประกันทั้งหมด</div>
						</div>
						<!--<ol class="breadcrumb page-breadcrumb pull-right" style="background: none;">
							<li><a href="<?php //echo base_url('Report/report_accrual_customer_print');?>" target="_blank"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-print"></i> พิมพ์รายงานทะเบียนคุมงาน</button></a></li>
						</ol>-->
					</div>
				</div>
					
									<div class="row">
												<div class="col-md-12 col-sm-12">
													<div class="card card-box">
														<div class="card-head">
															<header>ค้นหาข้อมูล</header>
														</div>
														<div class="card-body" id="bar-parent">
															<form class="row">
																<div class="col-sm-2">
																	<label class="control-label">วันที่เริ่มต้น</label>
																	<input type="date" class="form-control" id="">	
																</div>
																
																<div class="col-sm-2">																	
																	<label class="control-label">วันที่สิ้นสุด</label>
																	<input type="date" class="form-control" id="">													
																</div>
																
																<div class="col-sm-1">
																	<label class="control-label">ทะเบียนรถ</label>
																	<input type="text" class="form-control" id="">													
																</div>
																
																<div class="col-sm-2">
																	<label class="control-label">เลือกประเภทงาน</label>
																	<select class="form-select" aria-label="">
																		<option value="0">- ทั้งหมด -</option>
																		<option value="1">ประกันรถ</option>
																		<option value="1">พ.ร.บ.</option>
																		<option value="1">ภาษี</option>
																		<option value="1">ตรอ.</option>
																		<option value="2">ประกันอัคคีภัย</option>
																		<option value="2">ประกันขนส่ง</option>
																		<option value="2">ประกันอุบัติเหตุ (PA)</option>
																		<option value="2">ประกันท่องเที่ยว</option>
																	</select>															
																</div>
																
																<div class="col-sm-1">
																	<label class="control-label">เงินสด/ผ่อน</label>
																	<select class="form-select" aria-label="">
																		<option value="0">- ทั้งหมด -</option>
																		<option value="1">เงินสด</option>
																		<option value="2">เงินผ่อน</option>
																	</select>													
																</div>
																
																
																<div class="col-sm-2">
																	<label class="control-label">ช่องทางชำระเงิน</label>																	
																	<select class="form-select" aria-label="">
																		<option value="0">- ทั้งหมด -</option>
																		<option value="1">เงินสด</option>
																		<option value="2">โอนเงินธนาคาร</option>
																		<option value="2">บัตรเครดิต</option>
																		<option value="2">เช็คธนาคาร</option>
																	</select>	
																</div>																
																																
																<div class="col-sm-1">																	
																	<button type="submit" class="btn btn-info" style="margin-top: 25px; padding: 5px 30px;"><i class="fa fa-search"></i> ค้นหา</button>
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
                                    <header>ผลการค้นหาทะเบียนคุมงานประกันทั้งหมด</header>                                    
                                </div>
                                <div class="card-body ">
                                    <div class="row p-b-20">
                                      
                                    </div>
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column full-width" id="example4">
                                        <thead>
                                            <tr>
                                               	<th style="text-align: center">ลำดับ</th>
												<th style="text-align: center">วันที่</th>
												<th style="text-align: center">เลขที่กรมธรรม์</th>
												<th style="text-align: center">ชื่อ - นามสกุล</th>
												<th style="text-align: center">ทะเบียน</th>
												<th style="text-align: center">บริษัท</th>
												<th style="text-align: center">ประเภท</th>
												<th style="text-align: center">ยอดสุทธิ</th>
												<th style="text-align: center">ยอดรวม</th>
												<th style="text-align: center">ยอดเก็บตัวแทน</th>
												<th style="text-align: center">วันที่รับเงิน</th>
												<th style="text-align: center">เบี้ยนำส่ง</th>
												<th style="text-align: center">วันที่จ่ายเช็ค</th>
												<th style="text-align: center">ชื่อตัวแทน</th>
												<th style="text-align: center">สด/ผ่อน</th>
												<th style="text-align: center">งวด 1</th>
												<th style="text-align: center">รับเงิน</th>
												<th style="text-align: center">งวด 2</th>
												<th style="text-align: center">รับเงิน</th>
												<th style="text-align: center">งวด 3</th>
												<th style="text-align: center">รับเงิน</th>
												<th style="text-align: center">งวด 4</th>
												<th style="text-align: center">รับเงิน</th>
												<th style="text-align: center">งวด 5</th>
												<th style="text-align: center">รับเงิน</th>
												<th style="text-align: center">งวด 6</th>
												<th style="text-align: center">รับเงิน</th>
												<th style="text-align: center">วันครบภาษี</th>
												<th style="text-align: center">เบอร์โทรติดต่อ</th>
												<th style="text-align: center">สถานะตามเงิน</th>
												<th style="text-align: center">หมายเหตุ</th>
												<th style="text-align: center">รายละเอียด</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<tr class="odd gradeX">
												<td style="text-align: center">1</td>
												<td style="text-align: center">01/10/65</td>
												<td>4กฆ-1036 กทม.</td>
												<td>สร้อยกรัณฑ์ จันทร์ทอง</td>
												<td>4กฆ-1036 กทม.</td>
												<td>CHUBB</td>
												<td>ประกันชั้น 1</td>
												<td style="text-align: right">10,024.77</td>
												<td style="text-align: right">10,770.37</td>
												<td style="text-align: right">10,500.00</td>
												<td>BBL 11/9/65</td>
												<td style="text-align: right">8,965.91</td>
												<td style="text-align: center">31/10/65</td>
												<td>ลูกค้า</td>
												<td style="text-align: center">สด</td>
												<td style="text-align: right">1,750.00</td>
												<td>BBL 11/9/65</td>
												<td style="text-align: right">1,750.00</td>
												<td>BBL 23/10/65</td>
												<td style="text-align: right">1,750.00</td>
												<td></td>
												<td style="text-align: right">1,750.00</td>
												<td></td>
												<td style="text-align: right">1,750.00</td>
												<td></td>
												<td style="text-align: right">1,750.00</td>
												<td></td>												
												<td>ภาษีหมด 17/07/2565 รถต้องตรวจ</td>												
												<td>ลูกค้าพี่อรุณ 065-4096557</td>													
												<td style="text-align: center"><button class="btn btn-xs btn-success"> ชำระแล้ว </button><br>
													<span style="font-size: 14px; color:#187B00">กำหนดชำระ 10/09/65</span>
												</td>
												<td style="text-align: center"><button class="btn btn-xs btn-default"> + หมายเหตุ</button><br>
													<span style="font-size: 14px; color:#AF0002"></span>
												</td>
												<td style="text-align: center">
													<a href="<?php echo base_url('Insurance_car/work_car_all');?>">
														<button class="btn btn-sm btn-info"> รายละเอียด </button>
													</a>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td style="text-align: center">2</td>
												<td style="text-align: center">01/10/65</td>
												<td>4กฆ-1036 กทม.</td>
												<td>สร้อยกรัณฑ์ จันทร์ทอง</td>
												<td>อัคคีภัย</td>
												<td>อาคเนย์</td>
												<td>PL</td>
												<td style="text-align: right">10,024.77</td>
												<td style="text-align: right">10,770.37</td>
												<td style="text-align: right">10,500.00</td>
												<td>BBL 11/9/65</td>
												<td style="text-align: right">8,965.91</td>
												<td style="text-align: center">31/10/65</td>
												<td>ลูกค้า</td>
												<td style="text-align: center">สด</td>
												<td style="text-align: right">1,750.00</td>
												<td>BBL 11/9/65</td>
												<td style="text-align: right">1,750.00</td>
												<td></td>
												<td style="text-align: right">1,750.00</td>
												<td></td>
												<td style="text-align: right">1,750.00</td>
												<td></td>
												<td style="text-align: right">1,750.00</td>
												<td></td>
												<td style="text-align: right">1,750.00</td>
												<td></td>												
												<td>17/07/2566</td>												
												<td>065-4096557</td>											
												<td style="text-align: center"><button class="btn btn-xs btn-danger"> ค้างชำระ</button><br>
													<span style="font-size: 14px; color:#AF0002">กำหนดชำระ 10/09/65</span>
												</td>
												<td style="text-align: center"><button class="btn btn-xs btn-default"> + หมายเหตุ</button><br>
													<span style="font-size: 14px; color:#AF0002">แจ้งทางไลน์ 05/09/65</span>
												</td>
												<td style="text-align: center">
													<a href="<?php echo base_url('Insurance_car/work_car_all');?>">
														<button class="btn btn-sm btn-info"> รายละเอียด </button>
													</a>
												</td>
											</tr>
                                        	<tr class="odd gradeX">
												<td style="text-align: center">3</td>
												<td style="text-align: center">01/10/65</td>
												<td>4กฆ-1036 กทม.</td>
												<td>สร้อยกรัณฑ์ จันทร์ทอง</td>
												<td>อุบัติเหตุ</td>
												<td>อาคเนย์</td>
												<td>PA</td>
												<td style="text-align: right">10,024.77</td>
												<td style="text-align: right">10,770.37</td>
												<td style="text-align: right">10,500.00</td>
												<td>BBL 11/9/65</td>
												<td style="text-align: right">8,965.91</td>
												<td style="text-align: center">31/10/65</td>
												<td>ลูกค้า</td>
												<td style="text-align: center">สด</td>
												<td style="text-align: right">1,750.00</td>
												<td>BBL 11/9/65</td>
												<td style="text-align: right">1,750.00</td>
												<td>BBL 23/10/65</td>
												<td style="text-align: right">1,750.00</td>
												<td></td>
												<td style="text-align: right">1,750.00</td>
												<td></td>
												<td style="text-align: right">1,750.00</td>
												<td></td>
												<td style="text-align: right">1,750.00</td>
												<td></td>												
												<td>17/07/2565</td>												
												<td>065-4096557</td>													
												<td style="text-align: center"><button class="btn btn-xs btn-success"> ชำระแล้ว </button><br>
													<span style="font-size: 14px; color:#187B00">กำหนดชำระ 10/09/65</span>
												</td>
												<td style="text-align: center"><button class="btn btn-xs btn-default"> + หมายเหตุ</button><br>
													<span style="font-size: 14px; color:#AF0002"></span>
												</td>
												<td style="text-align: center">
													<a href="<?php echo base_url('Insurance_car/work_car_all');?>">
														<button class="btn btn-sm btn-info"> รายละเอียด </button>
													</a>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td style="text-align: center">4</td>
												<td style="text-align: center">01/10/65</td>
												<td>4กฆ-1036 กทม.</td>
												<td>สร้อยกรัณฑ์ จันทร์ทอง</td>
												<td>4กฆ-1036 กทม.</td>
												<td>CHUBB</td>
												<td>ประกันชั้น 1</td>
												<td style="text-align: right">10,024.77</td>
												<td style="text-align: right">10,770.37</td>
												<td style="text-align: right">10,500.00</td>
												<td>BBL 11/9/65</td>
												<td style="text-align: right">8,965.91</td>
												<td style="text-align: center">31/10/65</td>
												<td>ลูกค้า</td>
												<td style="text-align: center">สด</td>
												<td style="text-align: right">1,750.00</td>
												<td>BBL 11/9/65</td>
												<td style="text-align: right">1,750.00</td>
												<td></td>
												<td style="text-align: right">1,750.00</td>
												<td></td>
												<td style="text-align: right">1,750.00</td>
												<td></td>
												<td style="text-align: right">1,750.00</td>
												<td></td>
												<td style="text-align: right">1,750.00</td>
												<td></td>												
												<td>17/07/2565 </td>												
												<td>065-4096557</td>												
												<td style="text-align: center"><button class="btn btn-xs btn-danger"> ค้างชำระ</button><br>
													<span style="font-size: 14px; color:#AF0002">กำหนดชำระ 10/09/65</span>
												</td>																		
												<td style="text-align: center">													
													<button type="button" class="btn btn-xs btn-default" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" data-upgraded="MaterialButton,MaterialRipple"> + หมายเหตุ </button>
													<br>
													<span style="font-size: 14px; color:#AF0002">ลูกค้าแจ้งชำระ 30/09/65</span>
												</td>
												<td style="text-align: center">
													<a href="<?php echo base_url('Insurance_car/work_car_all');?>">
														<button class="btn btn-sm btn-info"> รายละเอียด </button>
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
		
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="exampleModalLongTitle">+ หมายเหตุ</h4>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<textarea class="form-control" rows="10" placeholder="" style="height:200px;"></textarea>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-primary">บันทึก</button>
								</div>
							</div>
						</div>
					</div>
	
	<!-- start footer -->	 
		<?php include("footer.php"); ?>
	<!-- end footer -->
	
</body>

</html>