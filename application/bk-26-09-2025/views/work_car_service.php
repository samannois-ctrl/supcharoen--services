											<div class="row">
												<div class="col-md-12 col-sm-12">
													<!--<div class="card card-box">-->
														<div class="card-head">
															<header><!--ค่าบริการ /--> ค่ารับอื่นๆ</header>
														</div>
														<div class="card-body " id="bar-parent1">
		<!--<form id="ServiceForm" name="ServiceForm" class="form-horizontal">	-->															
			<div class="form-group row">
					<!--<label class="col-sm-2 control-label">ค่าบริการ</label>
					<div class="col-sm-4">
						<input name="car_check_price_service" type="text" class="form-control autonumber" id="car_check_price_service" placeholder="" value="<?php //echo $car_check_price_service?>">
						
					</div>	-->
					<label class="col-sm-2 control-label">ค่ารับอื่นๆ</label>
					<div class="col-sm-4">
					<input name="service_other_price" type="text" class="form-control autonumber" id="service_other_price" placeholder="" value="<?php echo $service_other_price?>" onChange="calculateAct()" >
						<input name="car_check_price_service" type="hidden" class="form-control autonumber" id="car_check_price_service" placeholder="" value="<?php echo $car_check_price_service?>">
					</div>
				</div>
				<div class="form-group row">																	
					<label class="col-sm-2 control-label">หมายเหตุ</label>
					<div class="col-sm-10">
	               <textarea name="service_remark" rows="3" class="form-control" id="service_remark" style="height: 58px;" placeholder=""><?php echo $service_remark?></textarea>
					</div>
				</div>
																	
				<div class="form-group row" style="padding-top: 00px;">
	<div class="col-md-12" style="text-align: center">
				  <input type="hidden" name="service_id" id="service_id" value="<?php echo $service_id?>">
		<input type="hidden" name="serviceworkID" id="serviceworkID" class="workID" value="<?php echo $workID?>">
							<!--<button type="button" class="btn btn-info" onClick="SaveService()">บันทึกข้อมูล</button>-->
	</div>
</div>

					<!--</form>-->
														</div>
													<!--</div>-->
												</div>
											</div>
										