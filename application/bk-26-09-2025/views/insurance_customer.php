<div class="row">
<div class="col-md-6 col-sm-6">

		<div class="card-head">
			<header>ข้อมูลลูกค้า</header>
			<div class="pull-right"><!--<button id="addRow1" class="btn btn-info btn-sm" onClick="window.location.href='<?php //echo base_url('Insurance_car/work_car_all')?>'"> <i class="fa fa-plus"></i> เพิ่มลูกค้ารายใหม่ </button>-->
			
				<a href="<?php echo base_url('Insurance_car/work_car_all')?>"  class="btn btn-info btn-sm" >
				<i class="fa fa-plus"></i> เพิ่มลูกค้ารายใหม่
				</a> 
			
			</div>
		</div>
		<div class="card-body " id="bar-parent1">

				<div class="form-group row">
					<label class="col-sm-2 control-label">ชื่อ - นามสกุล</label>
					<div class="col-sm-10">
						<input name="cust_name" type="text" class="form-control custInput" id="cust_name" placeholder="ชื่อ"  value="<?php echo $cust_name?>" <?php echo $readonlyCustNane?> > <!--onKeyUp="listSearchCust(this.value)" -->
					</div>

			  </div> 
<div id="showListCustomer"></div>
			  <div class="form-group row">
					<label class="col-sm-2 control-label">ชื่อเล่น</label>
					<div class="col-sm-10">
						<input name="cust_nickname" type="text" class="form-control custInput" id="cust_nickname" placeholder="ชื่อเล่น"   value="<?php echo $cust_nickname?>"  <?php echo $readonlyCustNane?>>
				  </div>

				</div>
				<div class="form-group row">
					<label class="col-sm-2 control-label">โทรศัพท์</label>
					<div class="col-sm-5">
						<input name="cust_telephone_1" type="text" class="form-control custInput" id="cust_telephone_1" placeholder="โทรศัพท์ 1"  value="<?php echo $cust_telephone_1?>"  <?php echo $readonlyCustNane?>>
					</div>
					<div class="col-sm-5">
						<input name="cust_telephone_2" type="text" class="form-control custInput" id="cust_telephone_2" placeholder="โทรศัพท์ 2" value="<?php echo $cust_telephone_2?>"  <?php echo $readonlyCustNane?>>
					</div>
				</div>																
				<div class="form-group row">
					<label class="col-sm-2 control-label">สถานะ</label>
					<div class="col-sm-10" style="margin-top: 8px;">
						<input name="is_corporation" type="checkbox" id="is_corporation custInput" value="1" <?php echo $chkCorp?> >
						<label>นิติบุคคล</label>
						<input type="hidden" id="custID" name="custID" value="<?php echo $custID?>">
						<input type="hidden" id="workID" name="workID" value="<?php echo $workID?>">
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
						<input name="vehicle_regis" type="text" class="form-control carInput" id="vehicle_regis" placeholder="ทะเบียนรถ"  value="<?php echo $vehicle_regis?>"><!--onKeyUp="listSearchCar(this.value)"-->
					</div>
					<label class="col-sm-2 control-label">จังหวัด</label>
					<div class="col-sm-4">

					  <select id="province_regis" name="province_regis" class="form-control carInput">
						<option value="x">--เลือกจังหวัด--</option>
							<?php foreach($ProvinceList AS $province){?>
							<option value="<?php echo $province->id;?>" <?php if($province_regis==$province->id){ echo "selected"; }?> ><?php echo $province->province_name;?></option>
							<?php }?>
						</select>
					</div>
				</div>
				<div id="showCarList"></div>
			  <div class="form-group row">
					<label class="col-sm-2 control-label">วันจดทะเบียน</label>	
					<div class="col-sm-2">
						<input name="date_regist" type="text" class="form-control carInput" id="date_regist" placeholder=""  value="<?php echo $date_regist?>">

				  </div>
				  <div class="col-sm-3">
					<select id="month_regist" name="month_regist" class="form-select" aria-label="">
						<option value="x" >--เลือกเดือน--</option>
						<?php foreach($monthArray AS $monthID=>$monthName){?>
						<option value="<?php echo $monthID?>" <?php if($month_regist==$monthID){ echo "selected";}?> ><?php echo $monthName?></option>
						<?php }?>
					</select>

				  </div>
					
					<div class="col-sm-3">
						<input name="year_car" type="text" class="form-control carInput" id="year_car" placeholder="ปี พ.ศ."  value="<?php echo $year_car?>" >
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 control-label">เลขตัวถัง</label>
					<div class="col-sm-4">
						<input name="vin_no" type="text" class="form-control carInput" id="vin_no" placeholder="เลขตัวถัง"  value="<?php echo $vin_no?>">
					</div>
					<!--<label class="col-sm-2 control-label">CC</label>
					<div class="col-sm-4">
						<input name="engine_size" type="text" class="form-control carInput" id="engine_size" placeholder="CC"   value="<?php echo $engine_size?>">
					</div>	-->	
					<input type="hidden" name="engine_size" id="engine_size" value="">
				</div>																

				<div class="form-group row">
					<label class="col-sm-2 control-label">ยี่ห้อรถ</label>
					<div class="col-sm-3">
						<?php /*?>
						<input name="car_brand" type="text" class="form-control carInput" id="car_brand" placeholder="ยี่ห้อรถ"  value="<?php echo $car_brand?>">
						<?php */?>
						<input type="hidden" name="car_brand" id="car_brand" value="<?php echo $car_brand?>">
						<select id="brand_id" name="brand_id" class="form-control">
							<option value="0">--เลือกยี่ห้อ</option>
							<?php foreach($listCarBrand AS $brand){?>
							<option value="<?php echo $brand->id?>" <?php if($brand_id==$brand->id){ echo "selected";}?> ><?php echo $brand->car_brand_name?></option>
							<?php }?>
							
						</select>
					</div>
					<div class="col-sm-1">
						<button id="toggleButton" type="button" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></button>
					</div>
					<label class="col-sm-2 control-label" style="text-align: right">รุ่นรถ</label>
					<div class="col-sm-4">
						<input name="car_model" type="text" class="form-control carInput" id="car_model" placeholder="รุ่นรถ"  value="<?php echo $car_model?>">
					</div>
				</div>
				<div style="clear: both"></div>
				<div id="carBrandDiv" class="form-group row" style="<?php echo $hilightRed?>; padding:5px;display:none">
					<label class="col-sm-3 control-label">เพิ่มยี่ห้อรถ</label>
					<div class="col-sm-6">
						<input name="car_brand_name" type="text" class="form-control carInput" id="car_brand_name" placeholder="เพิ่มยี่ห้อรถ"  >
					</div>
					<div class="col-sm-3">
						<button type="button" class="btn btn-primary btn-sm" onClick="addCarBrand()">เพิ่มยี่ห้อรถ</button>
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-3 control-label" style="<?php echo $hilightRed?>">ประเภทรถ</label>
					<div class="col-sm-9">
						<select name="car_type_id" class="form-select carInput" id="car_type_id" aria-label="" onChange="setdecardedug();getCarPremium();">
							<option value="x">ประเภทรถ</option>
				<?php foreach($listCarType AS $carType){?>
			<option value="<?php echo $carType->id?>" <?php if($car_type_id==$carType->id){ echo "selected"; }?> ><?php echo $carType->type_full_name?></option>
				<?php }?>			
						</select>
					</div>																	
				</div>
			<div class="form-group row">
					<label class="col-sm-3 control-label " style="<?php echo $hilightRed?>">ขนาดเครื่องยนต์</label>
					<div class="col-sm-9" id="listCC">
						<select name="type_premium_id" class="form-select carInput" id="type_premium_id" aria-label="" onChange="setdecardedug();">
							<option value="x">--เลือก--</option>
								<?php foreach($carCC AS $cc){?>
							<option value="<?php echo $cc->id?>" <?php if($type_premium_id==$cc->id){ echo "selected"; }?> ><?php echo $cc->cc?></option>
						<?php }?>			
						</select>
					</div>																	
				</div>
				
				<!--<div class="form-group" style="padding-top: 50px;">
					<div class="col-md-12" style="text-align: center">
						<?php /*//if($showCarBt=='1'){?>
						<button id="saveCarBtn" name="saveCarBtn" type="button" class="btn btn-info" onClick="SaveCar()">บันทึก/แก้ไข ข้อมูล</button>
						<?php //} */?>
						
					</div>
					<div id="showcartNoti" align="center"></div>
				</div>-->
<input type="hidden" id="carID" name="carID" value="<?php echo $carID?>">
		</div>

</div>												
</div>