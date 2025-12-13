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
								 
                            </div>
                            <div class="card-body ">
                                <div class="row p-b-20">
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <div class="card-body">
                                           
                                                <div class="form-group row">
                                                  <div class="col-sm-2">
													  <label class="control-label">เลือกประเภทประกันภัย</label>
													  <select id="getType" name="getType" class="form-select" aria-label="">
														    <option value="x">-เลือกประเภทประกันภัย-</option>
                                                            <option value="11">ประกันภัยรถยนต์</option>
                                                            <option value="12">พ.ร.บ.</option>
															<option value="13">ภาษี</option>
															<option value="2">ประกันท่องเที่ยว</option>
															<option value="3">ประกันขนส่ง</option>
															<option value="4">ประกันอุบัติเหตุ</option>
															<option value="5">ประกันอัคคีภัย</option>
                                                        </select>
													</div>
                                                    <!--<div class="col-sm-1">ระยะเวลา</div>
                                                <div class="col-sm-2">
													 <select id="duration" name="duration" class="form-select" aria-label="">
														  <option value="x">-เลือกระยะเวลา-</option>
														 <?php /*for($i=1;$i<=12;$i++){?>
                                                            <option value="<?php echo $i?>"><?php echo $i?> เดือน</option>
                                                         <?php }*/?> 
                                                        </select> 
												  </div>-->
												   <div class="col-sm-1">
													   <label class="control-label">ค้นหาชื่อ</label>
													         <input type="text" id="search_custname" name="search_custname" class="form-control" placeholder="">
													</div>
												   <div class="col-sm-2">
													   <label class="control-label">ค้นหาทะเบียน</label>
													   <input type="text" id="search_vRegis" name="search_vRegis"  class="form-control" placeholder=""></div>
													<div class="col-sm-2">
													<label class="control-label">เลือกเดือนหมดอายุ</label>
																	    <select id="selectMonth" name="selectMonth" class="form-select">
																	           <option value="all">--ทุกเดือน--</option>
																			  <?php $txtSelected = ''; foreach($monthArray AS $monthNo=>$monthName){ 
																			            //if($currMonth==$monthNo){ $txtSelected = "selected";}else{ $txtSelected = ''; }
																			   ?>
																	           <option value="<?php echo $monthNo?>" <?php echo $txtSelected?>><?php echo $monthName?></option>
																			  <?php  } ?>
																	    </select>
													</div>
													<div class="col-sm-2">			
																		<label class="control-label">เลือกปีหมดอายุ</label>
																	    <select id="selectYear" name="selectYear" class="form-select">
																	            <?php $txtSelected = ''; 
																			        for($i=0;$i<=((($currYear+1)-$startYear)+1);$i++){ 
																						$YearShow = (($currYear+1)-$i)+543;
																						$YearValue = (($currYear+1)-$i);
																						
																			           if($YearValue==$currYear){ $txtSelected = "selected";}else{ $txtSelected = ''; }
																			   ?>
																	           <option value="<?php echo $YearValue?>" <?php echo $txtSelected?>><?php echo $YearShow?></option>
																			  <?php  } ?>
																	    </select>
																	
																</div>
													<div class="col-sm-2">
														<label class="control-label">เลือกบริษัท</label>
												    <select name="corp_id" class="form-select" id="corp_id" aria-label="">
														<option value="x">--ทุกบริษัท--</option>
														<?php foreach($listInsCorp AS $corp){?>
														<option value="<?php echo $corp->id?>" <?php //if($corp_id==$corp->id){ echo "selected";}?> ><?php echo $corp->company_name?></option>
														<?php }?>

													</select>
																
													</div>
																
                                                    <div class="col-sm-1" style="padding-top: 26px;">
                                                        <button type="button" class="btn btn-info btn-sm" onClick="getReport()">ตกลง</button>
                                                    </div>
                                                </div>
                                          
                                        </div>
                                    </div>
                                </div>
								<div id="showReportArea" class="table-responsive"><h1 align="center" class="text-danger">กรุณาเลือกประเภทประกันภัย</h1></div>
								<?php /*?>
                                <table class="table table-striped table-bordered table-hover table-checkable order-column full-width" id="example4">
                                  
                                    <tbody>
                                        <tr bgcolor="#dcdcdc">
                                            <th rowspan="2" style="text-align: center">ลำดับ</th>
                                            <th rowspan="2" style="text-align: center">ชื่อ-นามสกุล</th>
                                            <th rowspan="2" style="text-align: center">ทะเบียน</th>
                                            <th rowspan="2" style="text-align: center">โทรศัพท์</th>																						
                                            <th colspan="2" style="text-align: center">ประกันภัย</th>
                                            <th colspan="2" style="text-align: center">พ.ร.บ.</th>
                                            <th colspan="2" style="text-align: center">ภาษี</th>
                                            <th rowspan="2" style="text-align: center">หมายเหตุ</th>
                                            <th rowspan="2" style="text-align: center"> รายละเอียด</th>
                                        </tr>
                                        <tr bgcolor="#dcdcdc">
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
                                            <td align="center">4กฆ-1036 กทม.</td>
                                            <td align="center">xxxxxxxxxx</td>
                                            <td align="center">01/07/65<br>เลยกำหนด 90 วัน</td>
                                            <td align="center"><input type="checkbox"></td>
                                            <td align="center">01/07/65<br>เลยกำหนด 90 วัน</td>
                                            <td align="center"><input type="checkbox"></td>
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
                                            <td align="center">4กฆ-1036 กทม.</td>
                                            <td align="center">xxxxxxxxxx</td>
                                            <td align="center" class="odd gradeX">01/07/65<br>
                                              เลยกำหนด 90 วัน</td>
                                            <td align="center" class="odd gradeX"><input type="checkbox" checked>
                                              <br>
                                              <span style="font-size: 14px; color:#AF0002">30/6/65</span></td>
                                            <td align="center" class="odd gradeX">&nbsp;</td>
                                            <td align="center" class="odd gradeX">&nbsp;</td>
                                            <td align="center" class="odd gradeX">01/07/65<br>
                                              เลยกำหนด 90 วัน</td>
                                            <td align="center" class="odd gradeX"><input type="checkbox" checked>
                                              <br>
                                              <span style="font-size: 14px; color:#AF0002">30/6/65</span></td>
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
                                            <td align="center">4กฆ-1036 กทม.</td>
                                            <td align="center">xxxxxxxxxx</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center"><input type="checkbox"></td>
                                            <td align="center">&nbsp;</td>
                                            <td align="center">&nbsp;</td>
                                            <td align="center">&nbsp;</td>
                                            <td align="center">&nbsp;</td>
                                            <td style="text-align: center"><button class="btn btn-xs btn-default"> + หมายเหตุ</button>
                                              <br>
                                              <span style="font-size: 14px; color:#AF0002"></span></td>
                                            <td align="center">
                                                <a href="<?php echo base_url('/'); ?>" target="_blank">
                                                    <button class="btn btn-success btn-sm">รายละเอียด</button>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">4</td>
                                            <td>Jens Brincker</td>
                                            <td align="center">4กฆ-1036 กทม.</td>
                                            <td align="center">xxxxxxxxxx</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center" class="odd gradeX"><input type="checkbox"></td>
                                            <td align="center" class="odd gradeX">01/10/65</td>
                                            <td align="center" class="odd gradeX"><input type="checkbox"></td>
                                            <td align="center" class="odd gradeX">&nbsp;</td>
                                            <td align="center" class="odd gradeX">&nbsp;</td>
                                            <td class="odd gradeX" style="text-align: center"><button class="btn btn-xs btn-default"> + หมายเหตุ</button>
                                              <br>
                                              <span style="font-size: 14px; color:#AF0002"></span></td>
                                            <td align="center">
                                                <a href="<?php echo base_url('/'); ?>" target="_blank">
                                                    <button class="btn btn-success btn-sm">รายละเอียด</button>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">5</td>
                                            <td>Jens Brincker</td>
                                            <td align="center">4กฆ-1036 กทม.</td>
                                            <td align="center">xxxxxxxxxx</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center" class="odd gradeX"><input type="checkbox"></td>
                                            <td align="center" class="odd gradeX">&nbsp;</td>
                                            <td align="center" class="odd gradeX">&nbsp;</td>
                                            <td align="center" class="odd gradeX">&nbsp;</td>
                                            <td align="center" class="odd gradeX">&nbsp;</td>
                                            <td class="odd gradeX" style="text-align: center"><button class="btn btn-xs btn-default"> + หมายเหตุ</button>
                                              <br>
                                              <span style="font-size: 14px; color:#AF0002"></span></td>
                                            <td align="center">
                                                <a href="<?php echo base_url('/'); ?>" target="_blank">
                                                    <button class="btn btn-success btn-sm">รายละเอียด</button>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td style="text-align: center">6</td>
                                            <td>Jens Brincker</td>
                                            <td align="center">4กฆ-1036 กทม.</td>
                                            <td align="center">xxxxxxxxxx</td>
                                            <td align="center">&nbsp;</td>
                                            <td align="center">&nbsp;</td>
                                            <td align="center">&nbsp;</td>
                                            <td align="center">&nbsp;</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center"><input type="checkbox"></td>
                                            <td style="text-align: center"><button class="btn btn-xs btn-default"> + หมายเหตุ</button>
                                              <br>
                                              <span style="font-size: 14px; color:#AF0002"></span></td>
                                            <td align="center">
                                                <a href="<?php echo base_url('/'); ?>" target="_blank">
                                                    <button class="btn btn-success btn-sm">รายละเอียด</button>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">7</td>
                                            <td>Jens Brincker</td>
                                            <td align="center">4กฆ-1036 กทม.</td>
                                            <td align="center">xxxxxxxxxx</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center" class="odd gradeX"><input type="checkbox"></td>
                                            <td align="center" class="odd gradeX">01/10/65</td>
                                            <td align="center" class="odd gradeX"><input type="checkbox"></td>
                                            <td align="center" class="odd gradeX">&nbsp;</td>
                                            <td align="center" class="odd gradeX">&nbsp;</td>
                                            <td class="odd gradeX" style="text-align: center"><button class="btn btn-xs btn-default"> + หมายเหตุ</button>
                                              <br>
                                              <span style="font-size: 14px; color:#AF0002"></span></td>
                                            <td align="center">
                                                <a href="<?php echo base_url('/'); ?>" target="_blank">
                                                    <button class="btn btn-success btn-sm">รายละเอียด</button>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td style="text-align: center">8</td>
                                            <td>Jens Brincker</td>
                                            <td align="center">4กฆ-1036 กทม.</td>
                                            <td align="center">xxxxxxxxxx</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center"><input type="checkbox"></td>
                                            <td align="center">&nbsp;</td>
                                            <td align="center">&nbsp;</td>
                                            <td align="center">01/10/65</td>
                                            <td align="center"><input type="checkbox"></td>
                                            <td style="text-align: center"><button class="btn btn-xs btn-default"> + หมายเหตุ</button>
                                              <br>
                                              <span style="font-size: 14px; color:#AF0002"></span></td>
                                            <td align="center">
                                                <a href="<?php echo base_url('/'); ?>" target="_blank">
                                                    <button class="btn btn-success btn-sm">รายละเอียด</button>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
								<?php */?>
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
						<textarea id="remark" class="form-control" rows="5" placeholder="" ></textarea>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" onClick="DoUpdateRemark()">บันทึก</button>
						<input type="hidden" id="updateAlerRemarkID" name="updateAlerRemarkID">
						
					</div> 
				</div>
			</div>
		</div> 
		
		<div class="modal fade" id="largeModel" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none; width: 95%!important" aria-hidden="true">
						<div class="modal-dialog modal-xl" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="exampleModalLabel">Modal title</h4>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<div class="modal-body">
									    <div id="ExpireShowDetail"></div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
									
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