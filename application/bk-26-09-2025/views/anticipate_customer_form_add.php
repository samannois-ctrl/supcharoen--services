<form name="anticipate_customer" id="anticipate_customer" method="post">
	<div class="row">
<div class="col-md-6 col-sm-6">

	
	
		<div class="card-body " id="bar-parent1">

				<div class="form-group row">
					<label class="col-sm-3 control-label">ชื่อ - นามสกุล <span class="text-danger">***</span></label>
					<div class="col-sm-9">
						<input name="cust_name" type="text" class="form-control custInput" id="cust_name" placeholder="ชื่อ"  value="" <?php //echo $readonlyCustNane?> > <!--onKeyUp="listSearchCust(this.value)" -->
						
					</div>

			  </div> 
<div id="showListCustomer"></div>
			  <div class="form-group row">
					<label class="col-sm-3 control-label">ชื่อเล่น</label>
					<div class="col-sm-9">
						<input name="cust_nickname" type="text" class="form-control custInput" id="cust_nickname" placeholder="ชื่อเล่น"   value=""  <?php //echo $readonlyCustNane?>>
				  </div>

				</div>
				<div class="form-group row">
					<label class="col-sm-3 control-label">โทรศัพท์ <span class="text-danger">***</span></label>
					<div class="col-sm-5">
						<input name="cust_telephone_1" type="text" class="form-control custInput" id="cust_telephone_1" placeholder="โทรศัพท์ 1"  value=""  <?php //echo $readonlyCustNane?>>
						
					</div>
					<div class="col-sm-4">
						<input name="cust_telephone_2" type="text" class="form-control custInput" id="cust_telephone_2" placeholder="โทรศัพท์ 2" value=""  <?php //echo $readonlyCustNane?>>
					</div>
				</div>	
				<div class="form-group row">
					<label class="col-sm-3 control-label">หมายเหตุ</label>
					<div class="col-sm-9">
						<textarea id="anticipate_remark" name="anticipate_remark" class="form-control"></textarea>
					</div>
				</div>																
				



			<!--	<div class="form-group" style="padding-top: 50px;">
					<div class="col-md-12" style="text-align: center">
						<?php /*if($showBtnCust=='1'){?>
						<button id="saveCustName" type="button" class="btn btn-info" onClick="SaveCustomer()">บันทึกข้อมูล</button>
						<?php }*/?>
						
					</div>
				</div>-->
				<div id="showCustNoti" align="center"></div>

		</div>

</div>

<div class="col-md-6 col-sm-6">

		<!--<div class="card-head"><header>ข้อมูลทะเบียนรถ</header><div class="pull-right"><button type="button" class="btn btn-success btn-sm" onClick="resetFormCar()">+เพิ่มรถใหม่</button></div>

		</div>-->
		<div class="card-body " id="bar-parent1">

				<div class="form-group row">
					<label class="col-sm-2 control-label">ทะเบียนรถ</label>
					<div class="col-sm-4">
						<input name="vehicle_regis" type="text" class="form-control carInput" id="vehicle_regis" placeholder="ทะเบียนรถ"  value=""><!--onKeyUp="listSearchCar(this.value)"-->
					</div>
					<label class="col-sm-2 control-label">จังหวัด</label>
					<div class="col-sm-4">

					  <select id="province_regis" name="province_regis" class="form-control carInput">
						<option value="x">--เลือกจังหวัด--</option>
							<?php foreach($ProvinceList AS $province){?>
							<option value="<?php echo $province->id;?>"><?php echo $province->province_name;?></option>
							<?php }?>
						</select>
					</div>
				</div>
				<div id="showCarList"></div>
			  <div class="form-group row">
					<label class="col-sm-2 control-label">วันจดทะเบียน</label>	
					<div class="col-sm-2">
						<input name="date_regist" type="text" class="form-control carInput" id="date_regist" placeholder=""  value="">

				  </div>
				  <div class="col-sm-3">
					<select id="month_regist" name="month_regist" class="form-select" aria-label="">
						<option value="x" >--เลือกเดือน--</option>
						<?php foreach($monthArray AS $monthID=>$monthName){?>
						<option value="<?php echo $monthID?>"  ><?php echo $monthName?></option>
						<?php }?>
					</select>

				  </div>
					
					<div class="col-sm-3">
						<input name="year_car" type="text" class="form-control carInput" id="year_car" placeholder="ปี พ.ศ."  value="" >
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 control-label">เลขตัวถัง</label>
					<div class="col-sm-4">
						<input name="vin_no" type="text" class="form-control carInput" id="vin_no" placeholder="เลขตัวถัง"  value="">
					</div>
					
					<input type="hidden" name="engine_size" id="engine_size" value="">
				</div>																

				<div class="form-group row">
					<label class="col-sm-2 control-label">ยี่ห้อรถ</label>
					<div class="col-sm-3">
						<?php /*?>
						<input name="car_brand" type="text" class="form-control carInput" id="car_brand" placeholder="ยี่ห้อรถ"  value="<?php echo $car_brand?>">
						<?php */?>
						<input type="hidden" name="car_brand" id="car_brand" value="">
						<select id="brand_id" name="brand_id" class="form-control">
							<option value="0">--เลือกยี่ห้อ</option>
							<?php foreach($listCarBrand AS $brand){?>
							<option value="<?php echo $brand->id?>" ><?php echo $brand->car_brand_name?></option>
							<?php }?>
							
						</select>
					</div>
					<div class="col-sm-1">
						<!--<button id="toggleButton" type="button" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></button>-->
					</div>
					<label class="col-sm-2 control-label" style="text-align: right">รุ่นรถ</label>
					<div class="col-sm-4">
						<input name="car_model" type="text" class="form-control carInput" id="car_model" placeholder="รุ่นรถ"  value="">
					</div>
				</div>
				<div style="clear: both"></div>
				<div id="carBrandDiv" class="form-group row" style="<?php //echo $hilightRed?>; padding:5px;display:none">
					<label class="col-sm-3 control-label">เพิ่มยี่ห้อรถ</label>
					<div class="col-sm-6">
						<input name="car_brand_name" type="text" class="form-control carInput" id="car_brand_name" placeholder="เพิ่มยี่ห้อรถ"  >
					</div>
					<div class="col-sm-3">
						&nbsp;
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-2 control-label" style="<?php //echo $hilightRed?>">ประเภทรถ</label>
					<div class="col-sm-10">
						<select name="car_type_id" class="form-select carInput" id="car_type_id" aria-label="" onChange="listCarTypePremium();">
							<option value="x">ประเภทรถ</option>
				<?php foreach($listCarType AS $carType){?>
			<option value="<?php echo $carType->id?>"  ><?php echo $carType->type_full_name?></option>
				<?php }?>			
						</select>
					</div>																	
				</div>
			   <div class="form-group row">
				   <label class="col-sm-2 control-label" style="<?php //echo $hilightRed?>">รหัส</label>
				   <div class="col-sm-10" id="listCC">
						<select name="type_premium_id" class="form-select carInput" id="type_premium_id" aria-label="" >
							<option value="x">--เลือก--</option>
						</select>
						
					</div>	
				</div>
		    	
			

		</div>

</div>	
		<div align="center">
					<button type="button" class="btn btn-success" onClick="add_customer()">เพิ่มรายชื่อลูกค้า</button>
				</div>
</div>
</form>