<div class="row">
	<div class="col-md-12 col-sm-12">
		<!--<div class="card card-box">-->
			<div class="card-head">
				<header>ข้อมูล พ.ร.บ. (ประกันรถยนต์ภาคบังคับ)</header>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="text-danger">
															<input type="checkbox" name="do_act" id="do_act" value="1" onclick="setActForm(this)" <?php echo $do_act_check?> >&nbsp;ไม่ทำ พ.ร.บ.
														</span>
			</div>
			<div class="card-body " id="bar-parent1">
				<!--<form id="compulsory" name="compulsory" class="form-horizontal">-->
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
							<select name="corp_id" class="form-select" id="corp_id" aria-label="" onChange="getChainSelect(this.value,'act_type_id','2','x')">

								<option value="x">เลือกบริษัท</option>
								<?php foreach($listInsCorp AS $corp){?>
								<option value="<?php echo $corp->id?>" <?php if($corp_id==$corp->id){ echo "selected";}?> ><?php echo $corp->company_name?></option>
								<?php }?>

							</select>
						</div> 

						<label class="col-sm-2 control-label">เลือกประเภท พ.ร.บ.</label>
						<div class="col-sm-4">
							<select name="act_type_id" class="form-select" id="act_type_id" aria-label="" >

								<option value="x">เลือกประเภท</option>


							</select>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 control-label">วันที่คุ้มครอง</label>
						<div class="col-sm-4">
							<input name="act_date_start" type="text" class="form-control datepicker" id="act_date_start" placeholder="" onChange="setEndDate(this.value,'act_date_end',1)" value="<?php echo $act_date_start?>" readonly >
						</div>

						<label class="col-sm-2 control-label " style="<?php echo $hilightRed?>">วันที่สิ้นสุด</label>
						<div class="col-sm-4">
							<input name="act_date_end" type="text" class="form-control datepicker" id="act_date_end" placeholder="" value="<?php echo $act_date_end?>" readonly>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 control-label">วันที่แจ้งงาน พ.ร.บ.</label>
						<div class="col-sm-4">
							<input name="act_date_notify" type="text" class="form-control datepicker" id="act_date_notify" placeholder="" value="<?php echo $act_date_notify?>" readonly>
						</div>

						<label class="col-sm-2 control-label">ตามเอกสาร พ.ร.บ.</label>
						<div class="col-sm-2" style="margin-top: 8px;">
							<div class="radio p-0">
								<input type="radio" name="act_follow" id="act_follow" value="1" <?php if($act_follow=='1'){ echo "checked";}?> >
								<label>
									ตามเอกสาร
								</label>
							</div>																			
						</div>		
						<div class="col-sm-2" style="margin-top: 8px;">
							<div class="radio p-0">
								<input type="radio" name="act_follow" id="act_follow" value="0"  <?php if($act_follow=='0'){ echo "checked";}?> >
								<label>
									ไม่ตามเอกสาร
								</label>
							</div>																			
						</div>																	
					</div>

					<div class="form-group row"><?php if(($this->session->userdata('user_branch')=='1')||($this->session->userdata('user_branch')=='0')){?>
						<label class="col-sm-2 control-label">เลือกโค้ด</label>
						<div class="col-sm-4">

							<select id="code_id" name="code_id" class="form-select" aria-label="">

								<option value="x">เลือกโค้ด</option>
								<?php foreach($listCode AS $code){?>
								<option value="<?php echo $code->id?>" <?php if($code_id==$code->id){ echo "selected";}?> ><?php echo $code->conde_name?></option>
								<?php }?>

							</select>
						</div>	<?php }else{ ?>

						<label class="col-sm-2 control-label"></label>
						<div class="col-sm-4"><input type="hidden" name="code_id" id="code_id" value="0"></div>

						<?php }?>

						<label class="col-sm-2 control-label">รับ พ.ร.บ.</label>
						<div class="col-sm-2" style="margin-top: 8px;">
							<div class="radio p-0">
								<input type="radio" name="act_recieve" id="" value="1" <?php if($act_recieve=='1'){ echo "checked";}?> >
								<label for="optionsRadios1">
									รับ พ.ร.บ. แล้ว
								</label>
							</div>																			
						</div>		
						<div class="col-sm-2" style="margin-top: 8px;">
							<div class="radio p-0">
								<input type="radio" name="act_recieve" id="" value="0" <?php if($act_recieve=='0'){ echo "checked";}?>>
								<label for="optionsRadios1">
									ยังไม่รับ พ.ร.บ. 
								</label>
							</div>																			
						</div>
					</div>

					<!--<div style="height: 40px; background-color: #E7E7E7; text-align: center; padding: 10px; margin: 0px 0px 20px 0px; color:#000; font-size: 16px; font-weight: 500">
						รายละเอียด เบี้ย พ.ร.บ.
					</div>-->

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
							<input name="act_tax" type="text" class="form-control autonumber" id="act_tax" placeholder="" readonly   value="<?php echo $act_tax?>">
						</div>

						<label class="col-sm-2 control-label">ภาษี</label>
						<div class="col-sm-4">
							<input name="act_vat" type="text" class="form-control autonumber" id="act_vat" placeholder="" readonly value="<?php echo $act_vat?>">
						</div>
					</div>


					<div class="form-group row">
						<label class="col-sm-2 control-label">เบี้ย พ.ร.บ สุทธิ</label>
						<div class="col-sm-4">
							<input name="act_price_net" type="text" class="form-control autonumber" id="act_price_net" placeholder="" readonly value="<?php echo $act_price_net?>">
						</div>

						<label class="col-sm-2 control-label" style="<?php echo $hilightRed?>">เบี้ยชำระ</label>
						<div class="col-sm-4">
							<input name="act_price_total" type="text" class="form-control autonumber" id="act_price_total" placeholder=""  value="<?php echo $act_price_total?>"  onChange="calActDiscount(this)">
							<input type="hidden" name="act_price_total_full" id="act_price_total_full" value="<?php echo $act_price_total_full?>">
						</div>
					</div>

				<div class="form-group row">
						<label class="col-sm-2 control-label">หัก %</label>
						<div class="col-sm-4">
							<input name="deduct_percent" type="text" class="form-control" id="deduct_percent" placeholder=""  value="<?php echo $deduct_percent?>" onkeypress="return isNumberKey(event)" >
						</div>

						<label class="col-sm-2 control-label">ค่าใช้จ่ายอื่นๆ</label>
						<div class="col-sm-4">
							<input name="other_paid" type="text" class="form-control autonumber" id="other_paid" placeholder=""  value="<?php echo $other_paid?>">
						</div>
					</div>	

					<!--onChange="getCarcheckTotal()"<div style="height: 40px; background-color: #E7E7E7; text-align: center; padding: 10px; margin: 0px 0px 20px 0px; color:#000; font-size: 16px; font-weight: 500">
						รายละเอียด การยกเลิก พ.ร.บ.
					</div>

					<div class="form-group row">
						<label class="col-sm-2 control-label">เลขที่ยกเลิก พ.ร.บ.</label>
						<div class="col-sm-4">
							<input name="act_cancel_no" type="text" class="form-control" id="act_cancel_no" placeholder="" value="<?php //echo $act_cancel_no?>" >
						</div>

						<label class="col-sm-2 control-label">วันที่ยกเลิก พ.ร.บ.</label>
						<div class="col-sm-4">
							<input name="act_cancel_date" type="text" class="form-control datepicker" id="act_cancel_date" placeholder="" value="<?php //echo $act_cancel_date?>" readonly>
						</div>
					</div>-->

					<!--<div class="form-group row">
						<label class="col-sm-2 control-label">เหตุผลที่ยกเลิก พ.ร.บ.</label>
						<div class="col-sm-4">
							<textarea name="act_cancel_reason" rows="3" class="form-control" id="act_cancel_reason" style="height: 58px;" placeholder=""><?php //echo $act_cancel_reason?></textarea>
						</div>

						<label class="col-sm-2 control-label">หมายเหตุ</label>
						<div class="col-sm-4">
							<textarea name="act_remark" rows="3" class="form-control" id="act_remark" style="height: 58px;" placeholder=""><?php //echo $act_remark?></textarea>
						</div>
					</div>-->

		<!--			<div style="height: 40px; background-color: #E7E7E7; text-align: center; padding: 10px; margin: 0px 0px 20px 0px; color:#000; font-size: 16px; font-weight: 500">
						สถานะการชำระเงิน พ.ร.บ.
					</div>-->
				<!--	
					<div class="form-group row">
						<label class="col-sm-2 control-label">สถานะการชำระเงิน พ.ร.บ.</label>
						<div class="col-sm-4" style="margin-top: 8px;">
							<div class="radio p-0">
							  <input type="radio" name="act_paid" id="act_paid" value="1" <?php if($act_paid=='1'){ echo "checked";}?>>
								<label for="optionsRadios1">
									ชำระแล้ว
								</label>
							</div>																			
						</div>	

						<label class="col-sm-2 control-label">วันที่</label>
						<div class="col-sm-4">
							<input type="text" class="form-control datepicker" id="act_paid_day" name="act_paid_day" placeholder="" value="<?php echo  $act_paid_day?>" readonly>
						</div>
					</div>-->

					<!--<div class="form-group row">
						<label class="col-sm-2 control-label"> </label>
						<div class="col-sm-4" style="margin-top: 8px;">
							<div class="radio p-0">
								<input type="radio" name="act_paid" id="act_paid" value="0"  <?php //if($act_paid=='0'){ echo "checked";}?>>
								<label for="optionsRadios1">
									ค้างชำระ
								</label>
							</div>																			
						</div>	

						<label class="col-sm-2 control-label">ครบกำหนดชำระเงินวันที่</label>
						<div class="col-sm-4">
							<input name="act_payment_duedate" type="text" class="form-control datepicker" id="act_payment_duedate" placeholder="" value="<?php //echo $act_payment_duedate?>" readonly>
						</div>
					</div>-->

					<div class="form-group row">																	
						<label class="col-sm-2 control-label">หมายเหตุ</label>
						<div class="col-sm-10">
							<textarea name="act_payment_remark" rows="3" class="form-control" id="act_payment_remark" style="height: 58px;" placeholder=""><?php echo $act_payment_remark?></textarea>

							<input type="hidden" name="act_paid" id="act_paid" value="<?php if($act_paid=='0'){ echo "checked";}?>">
							<input type="hidden" name="act_payment_duedate" id="act_payment_duedate" value="<?php echo $act_payment_duedate?>">
							<input type="hidden" name="act_paid_day" id="act_payment_duedate" value="<?php echo $act_paid_day?>">

							<input type="hidden" name="act_payment_duedate" id="act_payment_duedate" value="<?php echo $act_payment_duedate?>">
							<input type="hidden" name="act_cancel_no" id="act_cancel_no" value="<?php echo $act_payment_duedate?>">

							<input type="hidden" name="act_cancel_date" id="act_cancel_date" value="<?php echo $act_cancel_date?>">


						</div>
					</div>



					<!--<div style="height: 40px; background-color: #E7E7E7; text-align: center; padding: 10px; margin: 0px 0px 20px 0px; color:#000; font-size: 16px; font-weight: 500">
						สลักหลัง พ.ร.บ.
					</div>

					<div class="form-group row">
						<label class="col-sm-2 control-label">วันที่แจ้ง</label>
						<div class="col-sm-4">
							<input name="back_act_notify_date" type="text" class="form-control datepicker" id="back_act_notify_date" placeholder="" value="<?php //echo $back_act_notify_date?>" readonly>
						</div>

						<label class="col-sm-2 control-label">วันที่ได้รับเอกสาร</label>
						<div class="col-sm-4">
							<input name="back_act_recieve_date" type="text" class="form-control datepicker" id="back_act_recieve_date" placeholder=""  value="<?php //echo $back_act_recieve_date?>" readonly>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 control-label">เลขที่ พ.ร.บ.สลักหลัง</label>
						<div class="col-sm-4">
							<input name="back_act_no" type="text" class="form-control" id="back_act_no" placeholder=""  value="<?php //echo $back_act_no?>">
						</div>

						<label class="col-sm-2 control-label">หมายเหตุ</label>
						<div class="col-sm-4">
							<textarea name="back_act_remark" rows="3" class="form-control" id="back_act_remark" style="height: 58px;" placeholder=""><?php //echo $back_act_remark?></textarea>


						</div>
					</div> -->


					<div class="form-group" style="padding-top: 0px;">
						<div class="col-md-12" style="text-align: center">
							<input type="hidden" name="actID" id="actID" value="<?php echo $actID?>">
							<input type="hidden" name="actWorkID" id="actWorkID" class="workID" value="<?php echo $workID?>">
							<input type="hidden" name="actagentID" id="actagentID" class="agentID" value="<?php echo $agent_id?>">
							<input type="hidden" name="back_act_notify_date" id="back_act_notify_date" class="agentID" value="<?php echo $back_act_notify_date?>">
							<input type="hidden" name="back_act_recieve_date" id="back_act_recieve_date" class="agentID" value="<?php echo $back_act_recieve_date?>">
							<input type="hidden" name="back_act_no" id="back_act_no" class="agentID" value="<?php echo $back_act_no?>">
							<input type="hidden" name="back_act_remark" id="back_act_remark" class="agentID" value="<?php echo $back_act_remark?>">
							<input type="hidden" name="act_remark" id="act_remark" class="agentID" value="<?php echo $act_remark?>">


							<!--<button type="button" class="btn btn-info" onClick="saveCompulsory()">บันทึกข้อมูล</button>-->
						</div>
					</div>
				<!--</form>-->
			</div>
		<!--</div>-->
	</div>
</div>