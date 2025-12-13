											<div class="row">
												<div class="col-md-12 col-sm-12">
													
														<div class="card-head">
															<header>ข้อมูลภาคสมัครใจ</header>
														</div>
														<div class="card-body " id="bar-parent1">
															
																<div class="form-group row">
																	<label class="col-sm-2 control-label">เลขที่กรมธรรม์</label>
																	<div class="col-sm-4">
																		<input name="insurance_no" type="text" class="form-control" id="insurance_no" placeholder="เลขที่กรมธรรม์" value="<?php echo $insurance_no?>">
																	</div>
																	
																	<label class="col-sm-2 control-label">วันที่แจ้งงาน
																		<a href="javascript:void(0)" onClick="ClarDateData('insurance_date_contract')" title="ลบวันที่"><i class="fa fa-times text-danger"></i></a>
																	</label>
																	<label class="col-sm-4 ">
																			<input name="insurance_date_contract" type="text" class="form-control datepicker" id="insurance_date_contract" placeholder="" readonly="readonly" value="<?php echo $insurance_date_contract?>" >
	
																	</label>																	
																</div>
																
																<div class="form-group row">
																	<label class="col-sm-2 control-label">วันที่คุ้มครอง <a href="javascript:void(0)" onClick="ClarDateData('insurance_start')" title="ลบวันที่"><i class="fa fa-times text-danger"></i></a></label>
																	<div class="col-sm-4">
																		<input name="insurance_start" type="text" class="form-control datepicker" id="insurance_start" onChange="setEndDate(this.value,'insurance_end',1)"  placeholder="" readonly="readonly" value="<?php echo $insurance_start?>">
																	</div>
																	
																	<label class="col-sm-2 control-label">วันที่สิ้นสุด <a href="javascript:void(0)" onClick="ClarDateData('insurance_end')" title="ลบวันที่"><i class="fa fa-times text-danger"></i></a></label>
																	<div class="col-sm-4">
																		<input name="insurance_end" type="text" class="form-control datepicker" id="insurance_end" placeholder="" readonly="readonly"  value="<?php echo $insurance_end?>">
																	</div>
																</div>
																
																<div class="form-group row">
																	<label class="col-sm-2 control-label">เลือกบริษัทประกัน</label>
																	<div class="col-sm-4"> 
																																			
																		<select name="insurance_corp_id" class="form-select" id="insurance_corp_id" aria-label="" >
																			
																			<option value="x">เลือกบริษัท</option>
																			<?php foreach($listInsCorp AS $corp){?>
																			<option value="<?php echo $corp->id?>" <?php if($insurance_corp_id==$corp->id){ echo "selected";}?> ><?php echo $corp->company_name?></option>
																			<?php }?>
																			
																		</select>
																		<?php /*?>
																		<select name="insurance_corp_id" class="form-select" id="insurance_corp_id" aria-label="" onChange="getChainSelect(this.value,'insurance_type_id','1','x')">
																			
																			<option value="x">เลือกบริษัท</option>
																			<?php foreach($listInsCorp AS $corp){?>
																			<option value="<?php echo $corp->id?>" <?php if($insurance_corp_id==$corp->id){ echo "selected";}?> ><?php echo $corp->company_name?></option>
																			<?php }?>
																			
																		</select>
																		<?php */?>
																	</div>
																	
																	<label class="col-sm-2 control-label">เลือกประเภทกรมธรรม์</label>
																	<div class="col-sm-4">
																		<select name="insurance_type_id" class="form-select" id="insurance_type_id" aria-label="">
																				<option value="x">เลือกประเภท</option>
																			<?php foreach($listInsType AS $insType){?>
																				<option value="<?php echo $insType->id?>" <?php if($insType->id==$insurance_type_id){ echo "selected";}?> ><?php echo $insType->insurance_type_name?></option>
																			<?php }?>
																		</select>
																		
																		
																		<input type="hidden" name="hiddenInsTypeID" id="hiddenInsTypeID" value="<?php echo $insurance_type_id?>">
																	</div>
																</div>
																
																<div class="form-group row">																	
																	
																	<label class="col-sm-2 control-label">ซ่อม อู่/ห้าง</label>
																	<div class="col-sm-2" style="margin-top: 8px;">
																		<div class="radio p-0">
																			<input type="radio" name="insurance_fix_garace" id="insurance_fix_garace" value="2" <?php if($insurance_fix_garace=='2'){ echo "checked";}?> >
																			<label for="optionsRadios1">
																				ซ่อมอู่
																			</label>
																		</div>																			
																	</div>		
																	<div class="col-sm-2" style="margin-top: 8px;">
																		<div class="radio p-0">
																			<input type="radio" name="insurance_fix_garace" id="insurance_fix_garace" value="1"  <?php if($insurance_fix_garace=='1'){ echo "checked";}?>>
																			<label for="optionsRadios1">
																				ซ่อมห้าง
																			</label>
																		</div>																			
																	</div>	
																	
																	<label class="col-sm-2 control-label">ประเภทงาน</label>
																	<div class="col-sm-1" style="margin-top: 8px;">
																		
																		<div class="radio p-0">
																			<input type="radio" name="insurance_renew" id="insurance_renew" value="0"  <?php if($insurance_renew=='0'){ echo "checked";}?>>
																			<label for="optionsRadios1">
																				ต่ออายุ
																			</label>
																		</div>																			
																	</div>		
																	<div class="col-sm-1" style="margin-top: 8px;">
																		<div class="radio p-0">
																			<input type="radio" name="insurance_renew" id="insurance_renew" value="1" <?php if($insurance_renew=='1'){ echo "checked";}?>>
																			<label for="optionsRadios1">
																				งานใหม่
																			</label>
																		</div>																			
																	</div>	
																	<div class="col-sm-1" style="margin-top: 8px;">
																		<div class="radio p-0">
																			<input type="radio" name="insurance_renew" id="insurance_renew" value="2" <?php if($insurance_renew=='2'){ echo "checked";}?>>
																			<label for="optionsRadios1">
																				ต่อ ย้าย
																			</label>
																		</div>																			
																	</div>	
																	
																</div>
															   <input type="hidden" name ="date_send_document" id="date_send_document" value="<?php echo $date_send_document?>">
															   <input type="hidden" name ="followDocIns" id="followDocIns" value="<?php echo $followDocIns?>">
																<?php /*?>
																<div class="form-group row">
																	<label class="col-sm-2 control-label">วันที่แจ้งงาน พ.ร.บ.</label>
																	<div class="col-sm-4">
																		<input name="date_send_document" type="text" class="form-control datepicker" id="date_send_document" placeholder="" readonly="readonly" value="<?php echo $date_send_document?>" >
																	</div>
																	
																	<label class="col-sm-2 control-label">ตามเอกสาร ประกันภัย</label>
																	<div class="col-sm-2" style="margin-top: 8px;">
																		<div class="radio p-0">
																			<input type="radio" name="followDocIns" id="followDocIns" value="1" <?php if($followDocIns=='1'){ echo "checked";}?>>
																			<label for="optionsRadios1">
																				ตามเอกสาร
																			</label>
																		</div>																			
																	</div>		
																	<div class="col-sm-2" style="margin-top: 8px;">
																		<div class="radio p-0">
																			<input type="radio" name="followDocIns" id="followDocIns" value="0" <?php if($followDocIns=='0'){ echo "checked";}?>>
																			<label for="optionsRadios1">
																				ไม่ตามเอกสาร
																			</label>
																		</div>																			
																	</div>	
																</div>
															<?php */?>
																<div class="form-group row">
																	<label class="col-sm-2 control-label">เลือกตัวแทน <a href="javascript:void(0)" aria-hidden="true" class="icon-plus text-success" onClick="openPopUpForm('agent')" title="เพิ่มตัวแทน"></a></label>
																	<div class="col-sm-4">
																		<select id="Xagent_id" name="Xagent_id" class="form-select" aria-label="">
																		<option value="x">--เลือกชื่อตัวแทน--</option>
																		<?php foreach($listAgent AS $agent){?>
																		<option value="<?php echo $agent->id?>" <?php if($agent_id==$agent->id){ echo "selected";}?>  ><?php echo $agent->agent_name?></option>
																		<?php }?>
																	</select>
																</div>	
																
																	<label class="col-sm-2 control-label">เลือกโค้ด <a href="javascript:void(0)" aria-hidden="true" class="icon-plus text-success" onClick="openPopUpForm('code')" title="เพิ่มโค้ด"></a></label> 
																	<div class="col-sm-4">
																		<select id="ins_code_id" name="ins_code_id" class="form-select" aria-label="">
																			
																			<option value="x">เลือกโค้ด</option>
																			<?php foreach($listCode AS $code){?>
																			<option value="<?php echo $code->id?>" <?php if($ins_code_id==$code->id){ echo "selected";}?> ><?php echo $code->conde_name?></option>
																			<?php }?>
																			
																		</select>
																	</div>	
																</div>
																
																
																<div style="height: 40px; background-color: #E7E7E7; text-align: left; padding: 10px; margin: 0px 0px 20px 0px; color:#000; font-size: 16px; font-weight: 500">
																	รายละเอียด เบี้ยประกัน
																</div>
																<div class="form-group row">
																	<label class="col-sm-2 control-label">ทุนประกัน	</label>
																	<div class="col-sm-4">
																		<input name="sum_insured" type="text" class="form-control autonumber" id="sum_insured" placeholder=""  value="<?php echo $sum_insured?>" >
																	</div>
																	
																	<label class="col-sm-2 control-label">Dedug</label>
																	<div class="col-sm-4">
																		<input name="dedug" type="text" class="form-control autonumber" id="dedug" placeholder=""  value="<?php echo $dedug?>" >
																	</div>
																</div>
																<div class="form-group row">
																	<label class="col-sm-2 control-label">เบี้ยรวม</label>
																	<div class="col-sm-4">
																		<input name="insurance_price" type="text" class="form-control autonumber" id="insurance_price" placeholder="" onChange="CaculateIns()" value="<?php echo $insurance_price?>" >
																	</div>
																	
																	<label class="col-sm-2 control-label">ส่วนลด</label>
																	<div class="col-sm-4">
																		<input name="insurance_discount" type="text" class="form-control autonumber" id="insurance_discount" placeholder=""  onChange="CaculateIns()" value="<?php echo $insurance_discount?>">
																	</div>
																</div>
																
																	
																<div class="form-group row">
																	<label class="col-sm-2 control-label">อากร</label>
																	<div class="col-sm-4">
																		<input name="insurance_duty" type="text" class="form-control autonumber" id="insurance_duty" placeholder=""  value="<?php echo $insurance_duty?>">
																	</div>
																	
																	<label class="col-sm-2 control-label">ภาษี</label>
																	<div class="col-sm-4">
																		<input name="insurance_tax" type="text" class="form-control" id="insurance_tax" placeholder=""  value="<?php echo $insurance_tax?>" >
																	</div>
																</div>
																
																	
																<div class="form-group row">
																	<label class="col-sm-2 control-label">เบี้ยประกันสุทธิ</label>
																	<div class="col-sm-4">
																		<input name="insurance_total_net" type="text" class="form-control autonumber" id="insurance_total_net" placeholder=""  value="<?php echo $insurance_total_net?>" >
																	</div>
																	
																	<label class="col-sm-2 control-label">เบี้ยชำระ</label>
																	<div class="col-sm-4">
																		<input name="insurance_total" type="text" class="form-control autonumber" id="insurance_total" placeholder=""   value="<?php echo $insurance_total?>">
																	</div>
																</div>
																
																<div style="height: 40px; background-color: #E7E7E7; text-align: left; padding: 10px; margin: 0px 0px 20px 0px; color:#000; font-size: 16px; font-weight: 500">
																	รายละเอียด การยกเลิกกรมธรรม์
																</div>
																
																<div class="form-group row">
																	<label class="col-sm-2 control-label">เลขที่ยกเลิกกรมธรรม์</label>
																	<div class="col-sm-4">
																		<input name="ins_cancel_no" type="text" class="form-control" id="ins_cancel_no" placeholder=""  value="<?php echo $ins_cancel_no?>">
																	</div>
																	
																	<label class="col-sm-2 control-label">วันที่ยกเลิกกรมธรรม์ <a href="javascript:void(0)" onClick="ClarDateData('ins_cancel_date')" title="ลบวันที่"><i class="fa fa-times text-danger"></i></a></label>
																	<div class="col-sm-4">
																		<input name="ins_cancel_date" type="text" class="form-control datepicker" id="ins_cancel_date" placeholder="" readonly="readonly"  value="<?php echo $ins_cancel_date?>">
																	</div>
																</div>
																	
																<div class="form-group row">
																	<label class="col-sm-2 control-label"><!--เหตุผลยกเลิกกรมธรรม์--></label>
																	<div class="col-sm-4">
																		
																		<input type="hidden" id="insurance_remark" name="insurance_remark" value="<?php echo $insurance_remark?>">
																		<input type="hidden" id="ins_cancel_reason" name="ins_cancel_reason" value="<?php echo $ins_cancel_reason?>">
																	</div>
																	
																	<!--<label class="col-sm-2 control-label">หมายเหตุ</label>-->
																	<div class="col-sm-4">
																		<!--<textarea name="insurance_remark" rows="3" class="form-control" id="insurance_remark" style="height: 58px;" placeholder=""><?php echo $insurance_remark?></textarea>-->
																	</div>
																</div>
															
															
																<div>
																	<input type="hidden" name="ins_paid" id="ins_paid" value="0">
																	<input type="hidden" name="paid_date" id="paid_date" value="">
																	<input type="hidden" name="payment_due_date" id="payment_due_date" value="">
																	<input type="hidden" name="ins_paid_remark" id="ins_paid_remark" value="">
															    </div>
															
															<?php /* ?>
																<div style="height: 40px; background-color: #E7E7E7; text-align: left; padding: 10px; margin: 0px 0px 20px 0px; color:#000; font-size: 16px; font-weight: 500">
																	สถานะการชำระเงินบริษัทประกันภัย
																</div>
																
																<div class="form-group row">
																	<label class="col-sm-2 control-label">สถานะการชำระเงิน พ.ร.บ.</label>
																	<div class="col-sm-4" style="margin-top: 8px;">
																		<div class="radio p-0">
																			<input type="radio" name="ins_paid" id="ins_paid" value="1" <?php if($ins_paid=='1'){ echo "checked";}?> >
																			<label for="optionsRadios1">
																				ชำระแล้ว
																			</label>
																		</div>																			
																	</div>	
																	
																	<label class="col-sm-2 control-label">วันที่</label>
																	<div class="col-sm-4">
																		<input name="paid_date" type="text" class="form-control datepicker" id="paid_date" placeholder="" readonly="readonly" <?php echo $paid_date?> >
																	</div>
																</div>
																	
																<div class="form-group row">
																	<label class="col-sm-2 control-label"> </label>
																	<div class="col-sm-4" style="margin-top: 8px;">
																		<div class="radio p-0">
																			<input type="radio"  name="ins_paid" id="ins_paid"  value="0" <?php if($ins_paid=='0'){ echo "checked";}?> >
																			<label for="optionsRadios1">
																				ค้างชำระ
																			</label>
																		</div>																			
																	</div>	
																	
																  <label class="col-sm-2 control-label">ครบกำหนดชำระเงินวันที่</label>
																	<div class="col-sm-4">
																		<input name="payment_due_date" type="text" class="form-control datepicker" id="payment_due_date" placeholder="" readonly="readonly" value="<?php echo $payment_due_date?>" >
																		<input type="hidden" id="ins_paid_remark" name="ins_paid_remark" value="<?php echo $ins_paid_remark?>">
																	</div>
																</div> <?php */?>
																
																<div class="form-group row">																	
																	<label class="col-sm-2 control-label"><!--หมายเหตุ--></label>
																	<div class="col-sm-10">
																		<!--<textarea id="ins_paid_remark" name="ins_paid_remark" class="form-control" rows="3" placeholder="" style="height: 58px;"><?php echo $ins_paid_remark?></textarea>-->
																	</div>
																</div>
																
																
																
																<div style="height: 40px; background-color: #E7E7E7; text-align: left; padding: 10px; margin: 0px 0px 20px 0px; color:#000; font-size: 16px; font-weight: 500">
																	สลักหลังกรมธรรม์
																</div>
																
																<div class="form-group row">
																	<label class="col-sm-2 control-label">วันที่แจ้ง  <a href="javascript:void(0)" onClick="ClarDateData('date_insurance_notifi_endorse')" title="ลบวันที่"><i class="fa fa-times text-danger"></i></a></label>
																	<div class="col-sm-4">
																		<input name="date_insurance_notifi_endorse" type="text" class="form-control datepicker" id="date_insurance_notifi_endorse" placeholder="" readonly="readonly" value="<?php echo $date_insurance_notifi_endorse?>">
																	</div>
																	
																	<label class="col-sm-2 control-label">วันที่ได้รับเอกสาร  <a href="javascript:void(0)" onClick="ClarDateData('date_insurance_document_endorse')" title="ลบวันที่"><i class="fa fa-times text-danger"></i></a></label>
																	<div class="col-sm-4">
																		<input name="date_insurance_document_endorse" type="text" class="form-control datepicker" id="date_insurance_document_endorse" placeholder="" readonly="readonly"  value="<?php echo $date_insurance_document_endorse?>">
																	</div>
																</div>
																	
																<div class="form-group row">
																	<label class="col-sm-2 control-label">เลขที่กรมธรรม์สลักหลัง</label>
																	<div class="col-sm-4">
																		<input name="insurance_number_endorse" type="text" class="form-control" id="insurance_number_endorse" placeholder=""  value="<?php echo $insurance_number_endorse?>">
																		<!--<input type="hidden" id="insurance_remark_endorse" name="insurance_remark_endorse" value="<?php //echo $insurance_remark_endorse?>">-->
																	</div>
																	
																	<label class="col-sm-2 control-label">หมายเหตุ</label>
																	<div class="col-sm-4">
																		<textarea name="insurance_remark_endorse" rows="3" class="form-control" id="insurance_remark_endorse" style="height: 58px;" placeholder=""><?php echo $insurance_remark_endorse?></textarea>
																	</div>
																</div>
																
																
														</div>
													
												</div>
											</div>