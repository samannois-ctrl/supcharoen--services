<?php 
$coverTotal = 0;	 
?>

<div class="row">
	<div class="col-md-6 col-sm-6">
		<div class="card card-box">
			<div class="card-head">
				<header>ใบแจ้งเตือนต่อประกัน</header>
			</div>
			<div class="card-body">

					<div class="form-group row">
						<label class="col-sm-4 control-label">วันครบ</label>
						<div class="col-sm-8" style="margin-top: 8px;">
							<?php echo $this->insurance_model->translateDateToThai($LasData['insurance_end']);?>
						</div>	
					</div>																

					<div class="form-group row">																	
						<label class="col-sm-4 control-label">ทะเบียน</label>
						<div class="col-sm-8" style="margin-top: 8px;">
							<?php echo $InsDetail->vehicle_regis." ".$InsDetail->province_name;?>
						</div>
					</div>


					<div class="form-group row">
						<label class="col-sm-4 control-label">ชื่อ - นามสกุล ลูกค้า/ตัวแทน</label>
						<div class="col-sm-8" style="margin-top: 8px;">
							<?php echo $InsDetail->cust_name?>
						</div>	
					</div>

					<div class="form-group row">																	
						<label class="col-sm-4 control-label">โทรศัพท์</label>
						<div class="col-sm-8" style="margin-top: 8px;">
							 <?php echo $InsDetail->custTelephone?>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 control-label">เบี้ยเดิม</label>
						<div class="col-sm-8" style="margin-top: 8px;">


							ประกัน + พรบ. 
<?php 


if(($LasData['last_insurance_price']!=0)&&($LasData['last_act_price']!=0)){ 
echo number_format($LasData['last_insurance_price'])."+".number_format($LasData['last_act_price'])." = ".number_format($LasData['last_total']);

}else if(($LasData['last_insurance_price']!=0)&&($LasData['last_act_price']==0)){ 
echo number_format($LasData['last_insurance_price'])." = ".number_format($LasData['last_total']);

}else if(($LasData['last_insurance_price']==0)&&($LasData['last_act_price']!=0)){ 
echo "".number_format($LasData['last_act_price'])." = ".number_format($LasData['last_total']);

}

?>
						</div>																		
					</div>



			</div>
		</div>
	</div>


	<div class="col-md-6 col-sm-6">
		<div class="card card-box">
			<div class="card-head">
				<header>รายละเอียดเบี้ยประกันใหม่</header>											
			</div>
			<div class="card-body">


					<div class="form-group row">
						<label class="col-sm-2 control-label">ประกัน</label>
						<div class="col-sm-4" style="margin-top: 8px;">
							<?php echo number_format($InsDetail->insurance_price,2); $coverTotal=$coverTotal+$InsDetail->insurance_price;?>				
						</div>	
						<label class="col-sm-2 control-label">วันหมดประกัน</label>
						<div class="col-sm-4" style="margin-top: 8px;">
							<?php echo $this->insurance_model->translateDateToThai($InsDetail->insurance_end);?>														
						</div>
					</div>		

					<div class="form-group row">
						<label class="col-sm-2 control-label">พ.ร.บ.</label>
						<div class="col-sm-4" style="margin-top: 8px;">
							<?php echo number_format($InsDetail->act_price,2); $coverTotal=$coverTotal+$InsDetail->act_price;?>														
						</div>	
						<label class="col-sm-2 control-label">วันหมด พ.ร.บ.</label>
						<div class="col-sm-4" style="margin-top: 8px;">
							<?php echo $this->insurance_model->translateDateToThai($InsDetail->act_date_end);?>											
						</div>
					</div>		


					<div class="form-group row">
						<label class="col-sm-2 control-label">ภาษี</label>
						<div class="col-sm-4" style="margin-top: 8px;">
							<?php echo number_format($InsDetail->tax_price,2); $coverTotal=$coverTotal+$InsDetail->tax_price?>													
						</div>	
						<label class="col-sm-2 control-label">วันหมดภาษี</label>
						<div class="col-sm-4" style="margin-top: 8px;">
							<?php echo $this->insurance_model->translateDateToThai($InsDetail->date_registration_end);?>													
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 control-label">รถตรวจสภาพ</label>
						<div class="col-sm-4" style="margin-top: 8px;">
							<?php echo number_format($InsDetail->car_check_price,2); $coverTotal=$coverTotal+$InsDetail->car_check_price?>														
						</div>	
						<label class="col-sm-2 control-label">วันตรวจสภาพ</label>
						<div class="col-sm-4" style="margin-top: 8px;">
							<?php echo $this->insurance_model->translateDateToThai($InsDetail->car_check_date)." : ".$InsDetail->car_check_time;?>														
						</div>
					</div>		

					<div class="form-group row">
						<label class="col-sm-2 control-label">รวมทั้งสิ้น</label>
						<div class="col-sm-8" style="margin-top: 8px;">
							<?php echo number_format($coverTotal,2)?>														
						</div>				
						<label class="col-sm-1 control-label">บาท</label>
					</div>	

					<div class="form-group row">
						<label class="col-sm-2 control-label">Dedug</label>
						<div class="col-sm-8" style="margin-top: 8px;">
							<?php echo number_format($InsDetail->dedug,2);?>
						</div>				
						<label class="col-sm-1 control-label">บาท</label>
					</div>	

					<div class="form-group row">
						<label class="col-sm-2 control-label">เลือกบริษัท</label>
						<?php echo $InsDetail->insCompany_name?>																	
					</div>		

					<div class="form-group row">
						<label class="col-sm-2 control-label">ซ่อม</label>
						<div class="col-sm-3" style="margin-top: 8px;">
							<div class="radio p-0">
								<input type="radio" name="" id="" value="" checked="" <?php if($InsDetail->insurance_fix_garace=='2'){ echo "checked";}?> >
								<label for="optionsRadios1">
									ซ่อมอู่
								</label>
							</div>																			
						</div>		
						<div class="col-sm-3" style="margin-top: 8px;">
							<div class="radio p-0">
								<input type="radio" name="" id="" value="" <?php if($InsDetail->insurance_fix_garace=='1'){ echo "checked";}?>>
								<label for="optionsRadios1">
									ซ่อมห้าง
								</label>
							</div>																			
						</div>		
					</div>			

					<div class="form-group row">
						<label class="col-sm-2 control-label">ระบุผู้ขับขี่</label>
						<div class="col-sm-3" style="margin-top: 8px;">
						  <div class="radio p-0">
								<input type="radio" name="" id="" value="" checked="">
								<label for="optionsRadios1">
									ระบุ
								</label>
							** ควรอยู่หน้ากรอกข้อมูลภาคสมัครใจ ?</div>																			
						</div>		
						<div class="col-sm-3" style="margin-top: 8px;">
						  <div class="radio p-0">
								<input type="radio" name="" id="" value="">
								<label for="optionsRadios1">
									ไม่ระบุ
								</label>
							</div>																			
						</div>		
					</div>	


					<div class="form-group row">
						<label class="col-sm-2 control-label">เงินสด **</label>
						<div class="col-sm-3" style="margin-top: 8px;">
							<div class="radio p-0">
								<input type="radio" name="" id="" value="" >
								<label for="optionsRadios1">
									เงินสด
								</label>
							</div>																			
						</div>		
						<div class="col-sm-7" style="margin-top: 8px;">
							<div class="radio p-0">
								<input type="radio" name="" id="" value="">

								<label for="optionsRadios1">
									เงินผ่อน  จำนวน <input type="text"> งวด
								</label>
							</div>																			
						</div>		
					</div>

					<div class="form-group row">
						<label class="col-sm-2 control-label">หมายเหตุ</label>
						<div class="col-sm-10" style="margin-top: 8px;">
							<textarea class="form-control" rows="3" placeholder="" style="height: 58px;"></textarea>	
						</div>																		
					</div>



			</div>
		</div>
	</div>												
</div>