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
                            <div class="page-title">รายงานแจ้งเตือนใกล้หมดอายุ</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-topline-red">
                            <div class="card-head">
                                <header>รายการแจ้งเตือนใกล้หมดอายุ</header>
								 <ol class="breadcrumb page-breadcrumb pull-right">
                                    <li><a href="<?php echo base_url('Report_other/report_other_warning_data_print'); ?>" target="_blank"><button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-print"></i> พิมพ์รายงานแจ้งเตือนใกล้หมดอายุ</button></a></li>
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
                                                    <div class="col-sm-1">
                                                       <select class="form-select" aria-label="">
															<option value="0">- ทั้งหมด -</option>
															<option value="1">ประกันอัคคีภัย</option>
															<option value="2">ประกันขนส่ง</option>
															<option value="1">ประกันอุบัติเหตุ</option>
															<option value="2">ประกันท่องเที่ยว</option>
													  </select>	
                                                  </div>
												  <label class="col-sm-1 control-label">เรียงตามวันหมดอายุ</label>
                                                  <div class="col-sm-2">
                                                        <select class="form-select" aria-label="">
                                                            <option value="1">จากมากไปน้อย</option>
                                                            <option value="2">จากน้อยไปมาก</option>
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
                                <table class="table table-striped table-bordered table-hover table-checkable order-column full-width" id="example4">
                                  
                                    <tbody>
                                        <tr bgcolor="#dcdcdc">
                                            <th rowspan="2" style="text-align: center">ลำดับ</th>
                                            <th rowspan="2" style="text-align: center">ชื่อ-นามสกุล</th>											
                                            <th rowspan="2" style="text-align: center">โทรศัพท์</th>	
                                            <th rowspan="2" style="text-align: center">เลขที่กรมธรรม์</th>																					
                                            <th colspan="2" style="text-align: center">ประกันอัคคีภัย</th>
                                            <th colspan="2" style="text-align: center">ประกันขนส่ง</th>
                                            <th colspan="2" style="text-align: center">ประกันอุบัติเหตุ</th>
											<th colspan="2" style="text-align: center">ประกันท่องเที่ยว</th>
                                            <th rowspan="2" style="text-align: center">หมายเหตุ</th>
                                            <th rowspan="2" style="text-align: center">รายละเอียด</th>
                                        </tr>
                                        <tr bgcolor="#dcdcdc">
                                            <th style="text-align: center">วันหมดอายุ</th>
                                            <th style="text-align: center">ปิดแจ้งเตือน</th>
                                            <th style="text-align: center">วันหมดอายุ</th>
                                            <th style="text-align: center">ปิดแจ้งเตือน</th>
                                            <th style="text-align: center">วันหมดอายุ</th>
                                            <th style="text-align: center">ปิดแจ้งเตือน</th>
											<th style="text-align: center">วันหมดอายุ</th>
                                            <th style="text-align: center">ปิดแจ้งเตือน</th>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td style="text-align: center">1</td>
                                            <td>Jens Brincker</td>
                                            <td align="center">099-9997788</td>
                                            <td align="center">12345-67890</td>
                                            <td align="center">01/07/65<br>เลยกำหนด 90 วัน</td>
                                            <td align="center"><input type="checkbox"></td>
                                            <td align="center">&nbsp;</td>
                                            <td align="center">&nbsp;</td>
                                            <td align="center"></td>
                                            <td align="center">&nbsp;</td>
											<td align="center"></td>
                                            <td align="center">&nbsp;</td>
                                            <td style="text-align: center">
												<button class="btn btn-xs btn-default"> + หมายเหตุ</button><br>
												<span style="font-size: 14px; color:#AF0002"></span>
											</td>
                                            <td align="center">
                                                <a href="<?php echo base_url('Insurance_car/work_car_all'); ?>" target="_blank">
                                                    <button class="btn btn-success btn-sm">รายละเอียด</button>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">2</td>
                                            <td>Jens Brincker</td>
                                            <td align="center" class="odd gradeX">099-9997788</td>
                                            <td align="center" class="odd gradeX">12345-67890</td>
                                            <td align="center" class="odd gradeX">&nbsp;</td>
                                            <td align="center" class="odd gradeX">&nbsp;</td>
                                            <td align="center" class="odd gradeX">01/07/65<br>
                                              เลยกำหนด 90 วัน</td>
                                            <td align="center" class="odd gradeX"><input type="checkbox" checked>
                                              <br>
                                              <span style="font-size: 14px; color:#AF0002">30/6/65</span></td>
                                            <td align="center" class="odd gradeX">&nbsp;</td>
                                            <td align="center" class="odd gradeX">&nbsp;</td>
											<td align="center"></td>
                                            <td align="center">&nbsp;</td>
                                            <td style="text-align: center">													
													<button type="button" class="btn btn-xs btn-default" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" data-upgraded="MaterialButton,MaterialRipple"> + หมายเหตุ </button>
													<br>
													<span style="font-size: 14px; color:#AF0002">ไม่รับสาย 24/6/65</span>
											</td>
                                            <td align="center">
                                                <a href="<?php echo base_url('/'); ?>" target="_blank">
                                                    <button class="btn btn-success btn-sm">รายละเอียด</button>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                          <td style="text-align: center">3</td>
                                          <td>Jens Brincker</td>
                                          <td align="center">099-9997788</td>
                                          <td align="center">12345-67890</td>
                                          <td align="center">&nbsp;</td>
                                          <td align="center">&nbsp;</td>
                                          <td align="center">&nbsp;</td>
                                          <td align="center">&nbsp;</td>
                                          <td align="center">01/12/65<br></td>
                                          <td align="center"><input type="checkbox"></td>
                                          <td align="center">&nbsp;</td>
                                          <td align="center">&nbsp;</td>
                                          <td style="text-align: center"><button class="btn btn-xs btn-default"> + หมายเหตุ</button>
                                            <br>
                                            <span style="font-size: 14px; color:#AF0002"></span></td>
                                          <td align="center"><a href="<?php echo base_url('Insurance_car/work_car_all'); ?>" target="_blank">
                                            <button class="btn btn-success btn-sm">รายละเอียด</button>
                                          </a></td>
                                        </tr>
                                        <tr class="odd gradeX">
                                          <td style="text-align: center">4</td>
                                          <td>Jens Brincker</td>
                                          <td align="center">099-9997788</td>
                                          <td align="center">12345-67890</td>
                                          <td align="center">&nbsp;</td>
                                          <td align="center">&nbsp;</td>
                                          <td align="center">&nbsp;</td>
                                          <td align="center">&nbsp;</td>
                                          <td align="center">&nbsp;</td>
                                          <td align="center">&nbsp;</td>
                                          <td align="center">20/12/65<br></td>
                                          <td align="center"><input type="checkbox"></td>
                                          <td style="text-align: center"><button class="btn btn-xs btn-default"> + หมายเหตุ</button>
                                            <br>
                                            <span style="font-size: 14px; color:#AF0002"></span></td>
                                          <td align="center"><a href="<?php echo base_url('Insurance_car/work_car_all'); ?>" target="_blank">
                                            <button class="btn btn-success btn-sm">รายละเอียด</button>
                                          </a></td>
                                        </tr>
                                        <tr class="odd gradeX">
                                          <td style="text-align: center">5</td>
                                          <td>Jens Brincker</td>
                                          <td align="center">099-9997788</td>
                                          <td align="center">12345-67890</td>
                                          <td align="center">&nbsp;</td>
                                          <td align="center">&nbsp;</td>
                                          <td align="center">&nbsp;</td>
                                          <td align="center">&nbsp;</td>
                                          <td align="center">10/10/66</td>
                                          <td align="center"><input type="checkbox"></td>
                                          <td align="center"></td>
                                          <td align="center">&nbsp;</td>
                                          <td style="text-align: center"><button class="btn btn-xs btn-default"> + หมายเหตุ</button>
                                            <br>
                                            <span style="font-size: 14px; color:#AF0002"></span></td>
                                          <td align="center"><a href="<?php echo base_url('Insurance_car/work_car_all'); ?>" target="_blank">
                                            <button class="btn btn-success btn-sm">รายละเอียด</button>
                                          </a></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
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
		
        <!-- end page content -->
        <!-- start footer -->
        <?php include("footer.php"); ?>
        <!-- end footer -->
</body>
</html>