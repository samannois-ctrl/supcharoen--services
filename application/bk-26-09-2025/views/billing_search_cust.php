      <div class="card-body ">
                <div class="row">
						<div class="col-md-1">ค้นหาลูกค้า</div>
						<div class="col-md-2"><input id="custname" type="text" class="form-control form-control-sm" placeholder="ชื่อลูกค้า"></div>
						<div class="col-md-2"><input id="plate_license" type="text" class="form-control form-control-sm" placeholder="ป้ายทะเบียน"></div>
						<div class="col-md-2">
							<?php //echo $rangeYear."  currentYear>".$currentYear." startYear>".$startYear?>
					 			<select id="selectYear" name="selectYear" class="form-control form-control-sm">
									<?php for($i=0;$i <= $rangeYear ;$i++){ 
											 $yearValue = $currentYear-$i;
									?>
									<option value="<?php echo $yearValue?>"><?php echo $yearValue+543?></option>
									<?php }?>
								</select>
							
							
					    </div>
					 	
					 
						<div class="col-md-3"><button type="button" class="btn btn-success btn-sm" onClick="searchCustForbilling()">ค้นหาลูกค้า</button>
		  	&nbsp;&nbsp;&nbsp;
							<button type="button" class="btn btn-danger btn-sm" onClick="clearSearchArea()">ยกเลิก</button>
		  	</div>
				
				</div>	
		  <div class="row" id="showSearch"></div>
</div>	
				