<div class="row">
												<div class="col-md-12 col-sm-12">
													<!--<div class="card card-box">-->
														<div class="card-head">
															<header>ข้อมูลภาษี (ทะเบียนรถยนต์)</header>
														</div>
														<div class="card-body " id="bar-parent1">
															<!--<form id="taxForm" name="taxForm" class="form-horizontal">	-->															
<!--
																<div class="form-group row">
																	<label class="col-sm-2 control-label">วันจดทะเบียน</label>
																	<div class="col-sm-4">
																		<input name="date_registration_start" type="text" class="form-control datepicker" id="date_registration_start" placeholder="" readonly>
																	</div>
																	
																	<label class="col-sm-2 control-label">&nbsp;</label>
																	<div class="col-sm-4">&nbsp;</div>
																</div>
																

																
																
																
															
																
																<div style="height: 40px; background-color: #E7E7E7; text-align: center; padding: 10px; margin: 0px 0px 20px 0px; color:#000; font-size: 16px; font-weight: 500">
																	รายละเอียดค่าภาษี
																</div>-->
																
																<div class="form-group row">
																	<label class="col-sm-2 control-label">ราคารวมภาษี</label>
																	<div class="col-sm-4">
																		<input name="tax_price" type="text" class="form-control autonumber" id="tax_price" placeholder="" value="<?php echo $tax_price?>" onChange="getCarcheckTotal();updateTaxExpire()">
																	</div>
																	
																	<label class="col-sm-2 control-label">ค่าบริการต่อภาษี</label>
																	<div class="col-sm-4">
																		<input name="tax_service" type="text" class="form-control autonumber" id="tax_service" placeholder=""  value="<?php echo $tax_service?>" onChange="getCarcheckTotal()">
																		<input type="hidden" name="tax_recall" id="tax_recall" value="<?php echo $tax_recall?>">
																		<!--<input name="tax_recall" type="text" class="form-control autonumber" id="tax_recall" placeholder=""  value="<?php //echo $tax_recall?>">-->
																		
																	</div>
																</div>
																
														
																<div class="form-group row">
																	<label class="col-sm-2 control-label">วันที่เสียภาษี</label>
																	<div class="col-sm-4">
																		<input name="tax_pay_date" type="text" class="form-control datepicker" id="tax_pay_date" placeholder="" readonly onChange="setEndDate(this.value,'date_registration_end',1)" value="<?php echo $tax_pay_date?>" >
																	</div>																	
																		<label class="col-sm-2 control-label " style="<?php echo $hilightRed?>">วันสิ้นอายุภาษี</label>
																	<div class="col-sm-4">
																		
														<input name="date_registration_end" type="text" class="form-control datepicker" id="date_registration_end" placeholder="" readonly   value="<?php echo $date_registration_end?>"  > 
																	</div>
																</div>
																
																<div class="form-group row">																	
																	
																	<label class="col-sm-2 control-label">คู่มือ</label>
																	<div class="col-sm-2" style="margin-top: 8px;">
																		<div class="radio p-0">
																			<input type="radio" name="have_manual" id="have_manual" value="1" <?php if($have_manual=='1'){ echo "checked";}?> >
																			<label for="optionsRadios1">มีคู่มือ</label>
																		</div>																			
																	</div>		
																	<div class="col-sm-2" style="margin-top: 8px;">
																		<div class="radio p-0">
																			<input type="radio" name="have_manual" id="have_manual" value="0"  <?php if($have_manual=='0'){ echo "checked";}?>>
																			<label for="optionsRadios1">ไม่มีคู่มือ</label>
																		</div>																			
																	</div>	
																		
																	
																	<label class="col-sm-2 control-label">ทะเบียน</label>
																	<div class="col-sm-2" style="margin-top: 8px;">
																		<div class="radio p-0">
																			<input type="radio" name="do_register" id="do_register" value="1" <?php if($do_register=='1'){ echo "checked";}?>>
																			<label for="optionsRadios1">ทำ</label>
																		</div>																			
																	</div>		
																	<div class="col-sm-2" style="margin-top: 8px;">
																		<div class="radio p-0">
																			<input type="radio" name="do_register" id="do_register" value="0"  <?php if($do_register=='0'){ echo "checked";}?>>
																			<label for="optionsRadios1">ไม่ทำ</label>
																		</div>																			
																	</div>																		
																</div>
<!--		<div class="form-group row">
		
		<label class="col-sm-2 control-label">การชำระค่าภาษี</label>
												
	<div class="col-sm-2" style="margin-top: 8px;">
		<div class="radio p-0">
		<input type="radio" name="tax_paid" id="tax_paid" value="1" <?php //if($tax_paid=='1'){ echo "checked";}?> >
		<label  >ชำระแล้ว</label>
		</div>																			
	</div>			
	<div class="col-sm-2" style="margin-top: 8px;">
		
		<div class="radio p-0">
		<input type="radio" name="tax_paid" id="tax_paid" value="0" <?php //if($tax_paid=='0'){ echo "checked";}?> >
		<label  > ค้างชำระ</label>
		</div>																			
			
		</div>	
		
	</div>-->
																<div class="form-group row">																	
																	<label class="col-sm-2 control-label">หมายเหตุ</label>
																	<div class="col-sm-10">
																		<textarea name="tax_remark" rows="3" class="form-control" id="tax_remark" style="height: 58px;" placeholder=""><?php echo $tax_remark?></textarea>
																	</div>
																</div>
																
					<div class="form-group" style="padding-top: 0px;">
					<div class="col-md-12" style="text-align: center">
						<input type="hidden" name="taxID" id="taxID" value="<?php echo $taxID?>">
						<input type="hidden" name="taxWorkID" id="taxWorkID" class="workID" value="<?php echo $workID?>">
						<input type="hidden" name="tax_paid" id="tax_paid"  value="<?php if($tax_paid=='1'){ echo "1";}else{ echo "0";}?>">
					   <!-- <input type="hidden" name="taxagentID" id="taxagentID" class="agentID" value="<?php //echo $workID?>">-->
					 
					<!--<button type="button" class="btn btn-info" onClick="SaveTax()" >บันทึกข้อมูล</button>-->
						</div>
																</div>
															<!--</form>-->
														</div>
													<!--</div>-->
												</div>
											</div>