<div class="row">
	<div class="col-md-12 col-sm-12">
		<!--<div class="card card-box">-->
			<div class="card-head">
				<header>ข้อมูล พ.ร.บ. (ประกันรถยนต์ภาคบังคับ)
				&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="text-primary">
				<input type="radio" name="doAct" value="1" <?php if($doAct=='1'){ echo "checked";}?> >	ทำ</span>
				&nbsp;&nbsp;
				<span class="text-danger">
				<input type="radio" name="doAct" value="0" <?php if($doAct=='0'){ echo "checked";}?> onclick="resetAct(this)" >	ไม่ทำ</span>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" name="act_for_rent" value="1" <?php if($act_for_rent=='1'){ echo "checked";}?> > นิติบุคคล</span>
				&nbsp;&nbsp;
				<input type="radio" name="act_for_rent" value="2" <?php if($act_for_rent=='2'){ echo "checked";}?> > ให้เช่า</span>
		
				&nbsp;&nbsp; <button type="button" class="btn btn-success btn-sm" onClick="callPremium()">เรียกเบี้ยชำระใหม่</button>
				</header>
				&nbsp;&nbsp;&nbsp;&nbsp;<!-- <button type="button" class="btn btn-success btn-sm">เลือกจาก ต.ร.อ.</button>-->
				<?php /*?>
				<span class="text-danger">
					<input type="checkbox" name="do_act" id="do_act" value="1" onclick="setActForm(this)" <?php echo $do_act_check?> >&nbsp;ไม่ทำ พ.ร.บ. 
					</span>
				<?php */?>
			</div>
			<div class="card-body " id="bar-parent1">
				
					<div class="form-group row">
						<label class="col-sm-2 control-label">เลขที่ พ.ร.บ.</label>
						<div class="col-sm-4">
							<input name="act_no" type="text" class="form-control" id="act_no" placeholder="เลขที่ พ.ร.บ." value="<?php echo $act_no?>" >
						</div>

						<label class="col-sm-2 control-label">&nbsp;</label>
						<div class="col-sm-4">&nbsp;</div>
					</div>
					<div class="form-group row">
							<label class="col-sm-2 control-label">เลือกบริษัท</label>
						<div class="col-sm-4">
							<select name="corp_id" class="form-select" id="corp_id" aria-label="">

								<option value="x">เลือกบริษัท</option>
								<?php foreach($listInsCorp AS $corp){?>
								<option value="<?php echo $corp->id?>" <?php if($corp_id==$corp->id){ echo "selected";}?> ><?php echo $corp->company_name?></option>
								<?php }?>

							</select>
							<?php /*?>
							<select name="corp_id" class="form-select" id="corp_id" aria-label="" onChange="getChainSelect(this.value,'act_type_id','2','x')">

								<option value="x">เลือกบริษัท</option>
								<?php foreach($listInsCorp AS $corp){?>
								<option value="<?php echo $corp->id?>" <?php if($corp_id==$corp->id){ echo "selected";}?> ><?php echo $corp->company_name?></option>
								<?php }?>
							<?php */?>
							</select>
						</div> 

						<label class="col-sm-2 control-label">เลือกประเภท พ.ร.บ.</label>
						<div class="col-sm-4">
							<select name="act_type_id" class="form-select" id="act_type_id" aria-label="" >
								<option value="x">เลือกประเภท พ.ร.บ</option>
							   <?php foreach($listActType AS $actType){ ?>
								<option value="<?php echo $actType->id?>"  <?php if($actType->id==$act_type_id){ echo "selected";}?> ><?php echo $actType->insurance_type_name?></option>
							  <?php }?>


							</select>
							<input type="hidden" id="hiddenActTypeID" name="hiddenActTypeID" value="<?php echo $act_type_id?>">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 control-label">วันที่คุ้มครอง    <a href="javascript:void(0)" onClick="ClarDateData('act_date_start')" title="ลบวันที่"><i class="fa fa-times text-danger"></i></a></label>
						<div class="col-sm-4">
							<input name="act_date_start" type="text" class="form-control datepicker" id="act_date_start" placeholder="" onChange="setEndDate(this.value,'act_date_end',1)" value="<?php echo $act_date_start?>" readonly >
						</div>

						<label class="col-sm-2 control-label " style="<?php echo $hilightRed?>">วันที่สิ้นสุด  <a href="javascript:void(0)" onClick="ClarDateData('act_date_end')" title="ลบวันที่"><i class="fa fa-times text-danger"></i></a></label>
						<div class="col-sm-4">
							<input name="act_date_end" type="text" class="form-control datepicker" id="act_date_end" placeholder="" value="<?php echo $act_date_end?>" readonly>
						</div>
					</div>

			

					<div class="form-group row">
						<label class="col-sm-2 control-label" style="<?php echo $hilightRed?>">เบี้ยรวม พ.ร.บ.</label>
						<div class="col-sm-4"> 
			<input name="act_price" type="text" class="form-control autonumber" id="act_price" placeholder="" onChange="calculateAct()" value="<?php echo $act_price?>">
						</div>

						<label class="col-sm-2 control-label">ส่วนลด พ.ร.บ.</label>
						<div class="col-sm-4">
							<input name="act_discount" type="text" class="form-control autonumber" id="act_discount" placeholder="" onChange="calActDiscount(this)"  value="<?php echo $act_discount?>">
						</div>
					</div>


					<div class="form-group row">
						<label class="col-sm-2 control-label">อากร</label>
						<div class="col-sm-4">
							<input name="act_tax" type="text" class="form-control autonumber" id="act_tax" placeholder=""   value="<?php echo $act_tax?>">
						</div>

						<label class="col-sm-2 control-label">ภาษี</label>
						<div class="col-sm-4">
							<input name="act_vat" type="text" class="form-control autonumber" id="act_vat" placeholder="" value="<?php echo $act_vat?>">
						</div>
					</div>


					<div class="form-group row">
						<label class="col-sm-2 control-label">เบี้ย พ.ร.บ สุทธิ</label>
						<div class="col-sm-4">
							<input name="act_price_net" type="text" class="form-control autonumber" id="act_price_net" placeholder=""  value="<?php echo $act_price_net?>">
						</div>

						<label class="col-sm-2 control-label" style="<?php echo $hilightRed?>">เบี้ยชำระ</label>
						<div class="col-sm-4">
							<input name="act_price_total" type="text" class="form-control autonumber" id="act_price_total" placeholder=""  value="<?php echo $act_price_total?>"  onChange="calActDiscount(this)">
							<input type="hidden" name="act_price_total_full" id="act_price_total_full" value="<?php echo $act_price_total_full?>">
							<input type="hidden" name="act_payment_remark" id="act_payment_remark" value="">
							<input type="hidden" name="act_paid" id="act_paid" value="<?php if($act_paid=='0'){ echo "checked";}?>">
							<input type="hidden" name="act_payment_duedate" id="act_payment_duedate" value="<?php //echo $act_payment_duedate?>">
							<input type="hidden" name="act_paid_day" id="act_payment_duedate" value="<?php //echo $act_paid_day?>">

							<input type="hidden" name="act_payment_duedate" id="act_payment_duedate" value="<?php //echo $act_payment_duedate?>">
							<input type="hidden" name="act_cancel_no" id="act_cancel_no" value="<?php //echo $act_payment_duedate?>">

							<input type="hidden" name="act_cancel_date" id="act_cancel_date" value="<?php //echo $act_cancel_date?>">
						</div>
					</div>
					<div class="form-group row">
																	<label class="col-sm-2 control-label">เลือกตัวแทน <a href="javascript:void(0)" aria-hidden="true" class="icon-plus text-success" onClick="openPopUpForm('agent')" title="เพิ่มตัวแทน"></a></label>
																	<div class="col-sm-4">
																		<select id="act_agent_id" name="act_agent_id" class="form-select" aria-label="">
																		<option value="x">--เลือกชื่อตัวแทน--</option>
																		<?php foreach($listAgent AS $agent){?>
																		<option value="<?php echo $agent->id?>" <?php if($act_agent_id==$agent->id){ echo "selected";}?>  ><?php echo $agent->agent_name?></option>
																		<?php }?>
																	</select>
																</div>	
												
																	<label class="col-sm-2 control-label">เลือกโค้ด <a href="javascript:void(0)" aria-hidden="true" class="icon-plus text-success" onClick="openPopUpForm('code')" title="เพิ่มโค้ด"></a></label> 
																	<div class="col-sm-4">
																		<select id="act_code_id" name="act_code_id" class="form-select" aria-label="">
																			
																			<option value="x">เลือกโค้ด</option>
																			<?php foreach($listCode AS $code){?>
																			<option value="<?php echo $code->id?>" <?php if($act_code_id==$code->id){ echo "selected";}?> ><?php echo $code->conde_name?></option>
																			<?php }?>
																			
																		</select>
																	</div>	
																</div>
		

					<!--<div class="form-group row">																	
						<label class="col-sm-2 control-label">หมายเหตุ</label>
						<div class="col-sm-10">
							<textarea name="act_payment_remark" rows="3" class="form-control" id="act_payment_remark" style="height: 58px;" placeholder=""><?php //echo $act_payment_remark?></textarea>

							


						</div>
					</div>-->



					<div class="form-group" style="padding-top: 0px;">
						<div class="col-md-12" style="text-align: center">
							<input type="hidden" name="actID" id="actID" value="<?php //echo $actID?>">
							
							<input type="hidden" name="actagentID" id="actagentID" class="agentID" value="<?php //echo $agent_id?>">
							<input type="hidden" name="back_act_notify_date" id="back_act_notify_date" class="agentID" value="<?php //echo $back_act_notify_date?>">
							<input type="hidden" name="back_act_recieve_date" id="back_act_recieve_date" class="agentID" value="<?php //echo $back_act_recieve_date?>">
							<input type="hidden" name="back_act_no" id="back_act_no" class="agentID" value="<?php //echo $back_act_no?>">
							<input type="hidden" name="back_act_remark" id="back_act_remark" class="agentID" value="<?php //echo $back_act_remark?>">
							<input type="hidden" name="act_remark" id="act_remark" class="agentID" value="<?php //echo $act_remark?>">


							<!--<button type="button" class="btn btn-info" onClick="saveCompulsory()">บันทึกข้อมูล</button>-->
						</div>
					</div>
				
			</div>
		<!--</div>-->
	</div>
</div>