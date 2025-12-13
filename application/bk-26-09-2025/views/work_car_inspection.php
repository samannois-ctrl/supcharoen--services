											<div class="row">
												<div class="col-md-12 col-sm-12">
													<!--<div class="card card-box">-->
														<div class="card-head">
															<header>ข้อมูลตรวจสภาพรถ</header>
														</div>
														<div class="card-body " id="bar-parent1">
															<!--<form id="inspectForm" name="inspectForm" class="form-horizontal">	-->															
																<div class="form-group row">
																	<label class="col-sm-2 control-label">วันที่ตรวจ</label>
																	<div class="col-sm-4">
																		<input name="car_check_date" type="text" class="form-control datepicker" id="car_check_date" placeholder="" readonly="readonly" value="<?php echo $car_check_date?>">
																	</div>
																	
																	<label class="col-sm-2 control-label">เวลาตรวจ</label>
																	<!--<div class="col-sm-4">
																		<input name="car_check_time" type="time" class="form-control" id="car_check_time" placeholder="" value="<?php //echo $car_check_time?>">
																		<?php //echo $car_check_time?>/
																		<?php //echo date("H:i:s")?>
																	</div>-->
																	<div class="col-sm-1">
																		<?php $timeArray = explode(":",$car_check_time); //print_r(($timeArray));
																			   if(!isset($timeArray[2])){ $timeArray[2] = "00";}?>
																		
																		ชม: 
																		<select id="hr" name="hr" class="form-control form-control-sm">
																			 <option value="00" <?php if($timeArray[0]=='00'){ echo "selected";}?>>--</option>
																			 <?php for($i=0;$i<24;$i++){  if($i <10){ $HrVal="0".$i;}else{ $HrVal=$i;}?>
																				<option value="<?php echo $HrVal?>" <?php if($timeArray[0]==$i){ echo "selected";}?> ><?php echo $HrVal?></option>
																			 <?php }?>
																		</select>
																	</div>
																	<div class="col-sm-1">นาที: 
																		<select id="minute" name="minute" class="form-control form-control-sm">
																			 <option value="00" <?php if($timeArray[1]=='00'){ echo "selected";}?>>--</option>
																				<?php for($i=0;$i<=60;$i++){ if($i <10){ $MinVal="0".$i;}else{ $MinVal=$i;} ?>
																				<option value="<?php echo $MinVal?>" <?php if($timeArray[1]==$MinVal){ echo "selected";}?> ><?php echo $MinVal?></option>
																			 <?php }?>
																		</select>
																	</div>
																	<div class="col-sm-1">วินาที: 
																		<select id="second" name="second"  class="form-control form-control-sm">
																			 <option value="00" <?php if($timeArray[2]=='00'){ echo "selected";}?> >--</option>
																			<?php for($i=0;$i<=60;$i++){ if($i <10){ $secVal="0".$i;}else{ $secVal=$i;} ?>
																				<option value="<?php echo $secVal?>" <?php if($timeArray[2]==$secVal){ echo "selected";}?>  ><?php echo $secVal?></option>
																			 <?php }?></select></div>
																</div>														
																
																<div class="form-group row">
																	<label class="col-sm-2 control-label">ค่าตรวจสภาพ</label>
																	<div class="col-sm-4">
																		<input name="car_check_price" type="text" class="form-control autonumber" id="car_check_price" placeholder="" onChange="CalculateCheckCar()" value="<?php echo $car_check_price?>">
																	</div>
																	
																	<label class="col-sm-2 control-label">ส่วนลดค่าตรวจสภาพ</label>
																	<div class="col-sm-4">
																		<input name="car_check_discount" type="text" class="form-control autonumber" id="car_check_discount" placeholder="" onChange="CalculateCheckCar()" value="<?php echo $car_check_discount?>">
																	</div>
																</div>
																																
<div class="form-group row">
	<label class="col-sm-2 control-label">ราคาสุทธิ</label>
		<div class="col-sm-4">
		<input name="car_check_total" type="text" class="form-control autonumber" id="car_check_total" placeholder="" readonly value="<?php echo $car_check_total?>" >
				</div>	
																	
	<label class="col-sm-2 control-label">เล่มทะเบียน</label>
		<div class="col-sm-2" style="margin-top: 8px;">
		<div class="radio p-0">
		<input type="radio" name="registration_book" id="" value="1" <?php if($registration_book=='1'){ echo "checked";}?> >
		<label for="optionsRadios1">มีเล่มทะเบียน</label>
		</div>																			
	</div>		
	<div class="col-sm-2" style="margin-top: 8px;">
			<div class="radio p-0">
			<input type="radio" name="registration_book" id="" value="0"  <?php if($registration_book=='0'){ echo "checked";}?> >
	<label for="optionsRadios1">ไม่มีเล่มทะเบียน</label>
	          </div>																			
	</div>	
	</div>

	
	
	<div class="form-group row">
	<label class="col-sm-2 control-label">ฟรี / ยกเลิก</label>
		<div class="col-sm-4" style="margin-top: 8px;">
		  <input type="checkbox" id='free_cancel' name='free_cancel' value='1' <?php if($free_cancel=='1'){ echo "checked";}?> onclick="CalculateCheckCar()" >
		</div>	
																	
	<label class="col-sm-2 control-label">ตรวจผ่าน/ไม่ผ่าน</label>
		<div class="col-sm-2" style="margin-top: 8px;">
		<div class="radio p-0">
		<input type="radio" name="check_pass" id="check_pass" value="1" <?php if($check_pass=='1'){ echo "checked";}?> >
		<label >ผ่าน</label>
		</div>																			
	</div>			
	<div class="col-sm-2" style="margin-top: 8px;">
		
		<div class="radio p-0">
		<input type="radio" name="check_pass" id="check_pass" value="0" <?php if($check_pass=='0'){ echo "checked";}?> >
		<label>ไม่ผ่าน</label>
		</div>																			
			
		</div>	
	</div>
	<!--<div class="form-group row">
		
		<label class="col-sm-2 control-label">การชำระค่าตรวจสภาพ</label>
												
	<div class="col-sm-2" style="margin-top: 8px;">
		<div class="radio p-0">
		<input type="radio" name="car_check_paid" id="car_check_paid" value="1" <?php //if($car_check_paid=='1'){ echo "checked";}?> >
		<label  >ชำระแล้ว</label>
		</div>																			
	</div>			
	<div class="col-sm-2" style="margin-top: 8px;">
		
		<div class="radio p-0">
		<input type="radio" name="car_check_paid" id="car_check_paid" value="0" <?php //if($car_check_paid=='0'){ echo "checked";}?> >
		<label  > ค้างชำระ</label>
		</div>																			
			
		</div>	
		
	</div>-->
	<div class="form-group row">																	
				<label class="col-sm-2 control-label">หมายเหตุ</label>
				<div class="col-sm-10">
																		<textarea name="car_check_remark" rows="3" class="form-control" id="car_check_remark" style="height: 58px;" placeholder=""><?php echo $car_check_remark?></textarea>
					<input type="hidden" id="car_check_paid" name="car_check_paid" value="<?php if($car_check_paid=='1'){ echo "";}else{ echo "0"; }?>">
					
																	</div>
																</div>
																																
																
																
			<div class="form-group" style="padding-top: 0px;">
																	<div class="col-md-12" style="text-align: center">
															
															<input type="hidden" name="inspecID" id="inspecID" value="<?php echo $inspecID?>">
															<input type="hidden" name="inspecworkID" id="inspecworkID" class="workID" value="<?php echo $workID?>">
															<input type="hidden" name="car_type" id="car_type">			
																	<!--	<button type="button" class="btn btn-info" onClick="SaveCarCheck()">บันทึกข้อมูล</button>-->
																	</div>
			</div>
															<!--</form>-->
														</div>
													<!--</div>-->
												</div>
											</div>