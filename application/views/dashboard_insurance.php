<div class="row">
												<div class="col-md-12 col-sm-12">
												
														<div class="card-head">
															<header>ค้นหาข้อมูล</header>
														</div>
														<div class="card-body" id="bar-parent">
															<form class="row">
																
															

																
															<!--  <div class="col-sm-2">
																	<label class="control-label">วันที่เริ่มต้น</label>
																	<input type="text" id="startDate" name="startDate" class="form-control datepicker" readonly value="<?php //echo $startday?>">
															  </div>
																
																<div class="col-sm-2">															
																	<label class="control-label">วันที่สิ้นสุด</label>
																	<input type="text" id="endDate" name="endDate" class="form-control datepicker" value="<?php //echo $endday?>" readonly>											
															  </div>-->
																<div class="col-sm-2">
																		<label class="control-label">เลือกเดือน</label>
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
																			        for($i=0;$i<=((($currYear+1)-$startYear)+1);$i++){ 
																						$YearShow = (($currYear+1)-$i)+543;
																						$YearValue = (($currYear+1)-$i);
																						
																			           if($YearValue==$currYear){ $txtSelected = "selected";}else{ $txtSelected = ''; }
																			   ?>
																	           <option value="<?php echo $YearValue?>" <?php echo $txtSelected?>><?php echo $YearShow?></option>
																			  <?php  } ?>
																	    </select>
																</div>
																<div class="col-sm-1">
																	<label class="control-label">ทะเบียนรถ</label>
																	<input type="text" class="form-control" id="vehicle_regis" name="vehicle_regis">													
																</div>
																
																<div class="col-sm-2">
																	<label class="control-label">เลือกประเภทงาน</label>
																	<select id="workType" class="form-select" aria-label="">
																		<option value="0">- ทั้งหมด -</option>
																		<option value="1">ประกันรถ</option>
																		<option value="2">พ.ร.บ.</option>
																		<option value="3">ภาษี</option>
																		<option value="4">ตรอ.</option>
																	<!--	<option value="5">ประกันอัคคีภัย</option>
																		<option value="6">ประกันขนส่ง</option>
																		<option value="7">ประกันอุบัติเหตุ (PA)</option>
																		<option value="8">ประกันท่องเที่ยว</option>-->
																	</select>															
																</div>
																
																<div class="col-sm-1">
																	<label class="control-label">ชำระครั้งเดียว/ผ่อน</label>
																	<select id="payType" name="payType" class="form-select" aria-label="">
																		<option value="0">- ทั้งหมด -</option>
																		<option value="1">ชำระครั้งเดียว</option>
																		<option value="2">เงินผ่อน</option>
																	</select>													
																</div>
																
																
																<!--<div class="col-sm-2">
																	<label class="control-label">ช่องทางชำระเงิน</label>																	
																	<select class="form-select" aria-label="">
																		<option value="0">- ทั้งหมด -</option>
																		<option value="1">เงินสด</option>
																		<option value="2">โอนเงินธนาคาร</option>
																		<option value="2">บัตรเครดิต</option>
																		<option value="2">เช็คธนาคาร</option>
																	</select>	
																</div>-->																
																																
																<div class="col-sm-1">																	
																	<button type="button" class="btn btn-info" style="margin-top: 25px; padding: 5px 30px;" onClick="listIns()"><i class="fa fa-search"></i> ค้นหา</button>
																</div>
															</form>
														</div>
													
												</div>
												
					</div>
<div class="table-responsive" id="showInsList"></div>
<!-- Button trigger modal -->
