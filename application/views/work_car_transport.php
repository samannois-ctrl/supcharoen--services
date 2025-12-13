											<div class="row">
												<div class="col-md-12 col-sm-12">
													<div class="card card-box">
														<div class="card-head">
															<header>งานขนส่ง</header>
															
														</div>
														<div class="card-body " id="bar-parent1">
															<!--<form id="transportForm" name="transportForm" class="form-horizontal" method="post">		-->														
																<div class="form-group row">
																	<label class="col-sm-2 control-label">วันที่ทำรายการ</label>
																	<div class="col-sm-4">
																		<input name="date_transport" type="text" class="form-control datepicker" id="date_transport" placeholder="" readonly="readonly">
																	</div>
																	
																	<label class="col-sm-2 control-label">ประเภทงาน</label>
																	<div class="col-sm-4">
																		
		<?php //print_r($workType)?>
		<select name="work_type_id" class="form-control" id="work_type_id">
			<option value="x"></option>												
			<?php foreach($workType AS $work){?>
			<option value="<?php echo $work->id?>"><?php echo $work->work_type_name?></option>		
			<?php } ?>
			<option value="99999">อื่นๆ</option>		
		</select>	
																	
																  </div>
																</div>																
																
																<div class="form-group row">
																	<label class="col-sm-2 control-label">ค่าบริการ</label>
																	<div class="col-sm-4">
																		<input name="transport_price" type="text" class="form-control autonumber" id="transport_price" placeholder="" onChange="CalculateTransport()">
																	</div>
																	
																	<label class="col-sm-2 control-label">ส่วนลด</label>
																	<div class="col-sm-4">
																		<input name="transport_discount_price" type="text" class="form-control autonumber" id="transport_discount_price" placeholder=""  onChange="CalculateTransport()">
																	</div>
																</div>	
																
																
																<div class="form-group row">
																	<label class="col-sm-2 control-label">ราคาสุทธิ</label>
																	<div class="col-sm-4">
																		<input name="transport_discount_total" type="text" class="form-control autonumber" id="transport_discount_total" placeholder="" readonly="readonly">
																	</div>
																	
																	<label class="col-sm-2 control-label">การชำระเงิน</label>																	
																	<div class="col-sm-4">
																		<select name="transport_payment" class="form-select" id="transport_payment" aria-label="">
																			<option value="x">การชำระเงิน</option>
																			<option value="1">เงินสด</option>
																			<option value="2">เงินโอน</option>
																		</select>
																	</div>
																</div>	
																
																<div class="form-group row">																	
																	<label class="col-sm-2 control-label">หมายเหตุ</label>
																	<div class="col-sm-10">
																		<textarea name="transport_remark" rows="3" class="form-control" id="transport_remark" style="height: 58px;" placeholder=""></textarea>
																	</div>
																</div>
																<div class="form-group row">																	
																	<div class="col-sm-12" align="center">
																	<input type="hidden" id="transportID" name="transportID">
																	<input type="hidden" id="transportWorkID" name="transportWorkID" value="<?php echo $workID?>">
																	<button id="btnTransport" type="button" class="btn btn-success btn-sm" onClick="savetransport()">เพิ่มรายการงานขนส่ง</button>
																		&nbsp;&nbsp;
																	<button class="btn btn-danger btn-sm" type="reset" onClick="resetBtnTransportText()">ยกเลิก</button>
																	</div>
																	
																</div>																
																<div class="form-group row">	
																	<div class="col-sm-12">
																		<div class="card card-topline-aqua">
																			<div class="card-head">
																				<header>รายการงานขนส่ง</header>																				
																			</div>
																			<div id="transportList" class="card-body "></div>
																		</div>
																	</div>

																</div>
																
																<div class="form-group" style="padding-top: 50px;">
																	<div class="col-md-12" style="text-align: center">
																		<!--<button type="submit" class="btn btn-info">บันทึกข้อมูล</button>-->
																	</div>
																</div>
															<!--</form>-->
														</div>
													</div>
												</div>
											</div>