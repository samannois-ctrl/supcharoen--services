<?php  $txtDisable='';?>

<div class="row">
		<div class="col-xs-12">
			<div class="form-group row">
                           
               		<input type="hidden" id="date_input" name="date_input" value="<?php //echo $today?>">
					<label class="col-md-2 control-label no-padding-right">ทะเบียนเลขที่</label>

					<div  class="col-md-4">
						<span>
                              <input name="register" type="text" id="register"  class="form-control"  placeholder="ทะเบียนเลขที่" value="<?php echo $register;?>" >
								
						 </span>
					</div>  
				</div>
				<input type="hidden" id = "policy_old_number" name="policy_old_number" value=''>
			

			<div class="form-group row">
					<label class="col-md-2 control-label no-padding-right">กรมธรรม์เลขที่</label>

					<div  class="col-md-4">
						<span>
                              <input name="policy_number" type="text" id="policy_number"  class="form-control"   placeholder="กรมธรรม์เลขที่" value="<?php echo $policy_number;?>" >
								
						</span>
					</div>  
				</div>

			<div class="form-group  row">                           
                         
					<label class="col-md-2 control-label no-padding-right">การต่ออายุ</label>
					<div class="col-md-2">
						<label>
                           <input name="renewal" id="renewal" type="radio" class="ace" value="1"  <?php if($renewal=='1'){ echo 'checked'; } ?>>
							&nbsp;
							<span class="lbl">&nbsp;ต่ออายุ</span>
					</label>
					</div>  
					<div class="col-md-2">
						<label>
                            <input name="renewal" id="renewal" type="radio" class="ace" value="2" <?php if($renewal=='2'){ echo 'checked'; } ?> >
							&nbsp;
							<span class="lbl">&nbsp;ประกันใหม่</span>
					</label>
					</div>  
					
				</div>
			<div class="form-group row">
			  <label class="col-md-2 control-label no-padding-right">บริษัทประกัน</label>

					<div  class="col-md-4">
					  <select name="corp_id" class="form-control" id="corp_id" >
					    <option value="">--เลือกบริษัท--</option>
					    <?php foreach($listInsCorp AS $corp){?>
					    <?php foreach($listInsCorp AS $corp){?>
					    <option value="<?php echo $corp->id?>" <?php if($corp_id==$corp->id){ echo "selected";}?> ><?php echo $corp->company_name?></option>
					    <?php }?>
					    <?php }?>
				      </select>
					</div>  
		  </div>
			<div class="form-group row">
					<label class="col-md-2 control-label no-padding-right">ตัวแทน</label>

					<div  class="col-md-4">
					  <select name="agent_id" class="form-control" id="agent_id" >
					    <option value="">--เลือกตัวแทน--</option>
					    <?php foreach($listAgent AS $agent){?>
					    <option value="<?php echo $agent->id?>" <?php if($agent_id==$agent->id){ echo "selected";}?>  ><?php echo $agent->agent_name?></option>
					    <?php }?>
				      </select>
					</div>  
				</div>	
			<div class="form-group row">
					<label class="col-md-2 control-label no-padding-right">โค้ด</label>

					<div  class="col-md-4">
					  <select name="code_id" class="form-control" id="code_id" >
					    <option value="">--เลือกโค้ด--</option>
					    <?php foreach($listCode AS $code){?>
					    <option value="<?php echo $code->id?>" <?php if($code_id==$code->id){ echo "selected";}?> ><?php echo $code->conde_name?></option>
					    <?php }?>
				      </select>
					</div>  
				</div>
                    <div class="form-group row">
					<label class="col-md-2 control-label no-padding-right">ชื่อ - สกุล ผู้เอาประกัน</label>

					<div  class="col-md-4">
						<span>
                        <input name="cust_name" type="text" id="cust_name"   class="form-control"  placeholder="" value="<?php echo $cust_name;?>" >
								
						  </span>
					</div>  
				</div>
			
				<div class="form-group row">
					<label class="col-md-2 control-label no-padding-right">ชื่อเล่น</label>

					<div  class="col-md-4">
						<span>
                            <input name="cust_nickname" type="text" id="cust_nickname" placeholder=""  class="form-control"  value="<?php echo $cust_nickname;?>" >								
						  </span>
					</div>  
				</div>
				<div class="form-group row">
					<label class="col-md-2 control-label no-padding-right">โทรศัพท์</label>

					<div  class="col-md-4">
						<span>
                             <input name="tel1" type="text" id="tel1" placeholder="" class="form-control"  value="<?php echo $tel1;?>" >								
					  </span>
					</div>  
				</div>
			
			
                    <div class="form-group row">
                 
                        <label class="col-md-2 control-label no-padding-right" >ชื่อและที่อยู่ผู้เอาประกัน</label>

					<div  class="col-md-4" >
						<span>
                               <textarea id="policyholder" name="policyholder"  class="form-control" rows="5" style="width:500px"  ><?php echo $policyholder;?></textarea>
							
						  </span>
					</div>  
				</div>
                    <div class="form-group row">
                 
                        <label class="col-md-12 control-label no-padding-right"><strong>ยานพาหนะขนส่ง</strong></label>

					 
				</div>
                    
                    <div class="form-group row">
                 
                        <label class="col-md-2 control-label no-padding-right" >&nbsp;&nbsp;&nbsp;&nbsp;ประเภท :</label>

					<div  class="col-md-4" >
						<span>
                              <textarea id="vehicle_type" name="vehicle_type" placeholder="" rows="5" style="width:500px"  class="form-control"   ><?php echo $vehicle_type;?></textarea>
							
						</span>
					</div>  
				</div>
                    <div class="form-group row">
                 
                        <label class="col-md-2 control-label no-padding-right" >&nbsp;&nbsp;&nbsp;&nbsp;เลขตัวถังและเลขทะเบียน หรืออื่นๆ :</label>

					<div  class="col-md-4" >
						<span>
                             <textarea id="registration_number" name="registration_number" placeholder="" rows="5" style="width:500px" class="form-control"  ><?php echo $registration_number;?></textarea>
							
						</span>
					</div>  
				</div>
              
			<p>&nbsp;</p>      
			<hr style="border: 1px solid #808080; margin-bottom: 15px; margin-left: 15px;">
			
                <div class="row">
					<label class="col-md-2  no-padding-right">ระยะเวลาประกันภัย</label>
					
					<div  class="col-md-9">
					  <div class="form-group row">
						 <div class="col-md-12">
                            <input name="insurance_period_ch" id="insurance_period_ch1" type="radio" class="ace" value="1" <?php if($insurance_period_ch=='1'){ echo "checked";}?>>&nbsp;<span class="lbl  no-padding-right">&nbsp;กรมธรรม์ประกันภัยแบบกำหนดเวลา:	</span>
						</div>
						
					   </div>
						<div class="form-group row">
							<div class="col-md-2">
							<label  class=" no-padding-right">เริ่มวันที่ </label>				
                        <input name="insurance_start" id="insurance_start" type="text" class="form-control date-picker"  data-provide="datepicker" data-date-language="th-th"   value="<?php echo $insurance_start;?>"  >
							
							</div>
							<div class="col-md-2">
								<label class=" no-padding-right">เวลา</label>
                         <input name="insurance_start_time" id="insurance_start_time" type="time" class="form-control" value="<?php echo $insurance_start_time;?>"  >
							</div>
					   </div>
						
					  <div class="form-group row">
						 <div class="col-md-2">
							 <label  class=" no-padding-right">สิ้นสุดวันที่ </label>
							 <input name="insurance_end" id="insurance_end" type="text" class="form-control date-picker"  data-provide="datepicker" data-date-language="th-th"   value="<?php echo $insurance_end;?>"  >	 
					   	</div>							
					   	 <div class="col-md-2">
						  <label class=" no-padding-right">เวลา</label>
                           <input name="insurance_end_time" id="insurance_end_time" class="form-control" type="time" value="<?php echo $insurance_end_time;?>"  >
						  </div>							
					   </div>							
				
						<div class="form-group row">
						<div class="col-md-6">
							<label  class=" no-padding-right">ขอบเขต</label>
							<input type="text"  id="scope" name="scope"  class="form-control"   value="<?php echo $scope;?>">
						</div>	
						</div>	
						<div class="form-group row">
						<div class="col-md-6">
							<label  class=" no-padding-right">และเส้นทางการขนส่ง</label>
							<input type="text"  id="route" name="route"  class="form-control"   value="<?php echo $route;?>">  
						</div>	
						</div>	
				
                       <div class="form-group ">
						<div class="col-md-6">
								<input name="insurance_period_ch" id="insurance_period_ch2" type="radio" class="ace" value="2" <?php if($insurance_period_ch=='2'){ echo "checked";}?>>&nbsp;<span class="lbl">&nbsp;<label  class=" no-padding-right">กรมธรรม์ประกันภัยแบบขนส่งเฉพาะเที่ยว:จาก</label></span>
						   </div>
						   <div class="col-md-6">
							   <input type="text"  id="transportation_insurance" class="form-control" name="transportation_insurance"  placeholder="" value="<?php echo $transportation_insurance;?>"> 
						   </div>	
						</div>
						
							
                         
					 
					</div>
						
				</div>
               
			
			<p>&nbsp;</p>      
			<hr style="border: 1px solid #808080; margin-bottom: 15px; margin-left: 15px;">
			
			<div class="form-group row">
					<label class="col-md-2 control-label no-padding-right">จำนวนเงิน</label>
					
					<div  class="col-md-4">
						<label>
                         <span class="lbl">1. จำนวนเงินความรับผิดรวม</span>&nbsp; <input type="text" id="price" name="price"  style="width: 100px" class="autonumber" value="<?php echo $price;?>"> &nbsp;บาท
						</label>					
						<br>
						<label>
                            <span class="lbl">2. จำนวนเงินจำกัดความรับผิดต่อการเรียกร้องหรือต่ออุบัติเหตุแต่ละครั้ง</span>&nbsp; <input type="text" id="priceaccident"  class="autonumber"  name="priceaccident"  style="width: 100px" value="<?php echo $priceaccident;?>"> &nbsp;บาท
						</label>
						<br>
						<label>
                            <span class="lbl">3. จำนวนเงินจำกัดความรับผิดต่อหนึ่งยานพาหนะ</span>&nbsp; <input type="text" id="pricevehicle" name="pricevehicle"  class="autonumber"   style="width: 100px" value="<?php echo $pricevehicle;?>"> &nbsp;บาท
						</label>
						<br>
						<label>
                            <span class="lbl">4. จำนวนเงินจำกัดความรับผิดเพื่อการส่งมอบชักช้าต่อการเรียกร้อง หรือต่ออุบัติเหตุแต่ละครั้ง และต่อหนึ่งยานพาหนะ</span>&nbsp; <input type="text" id="priceclaim" name="priceclaim"  style="width: 100px"  class="autonumber"  value="<?php echo $priceclaim;?>"> &nbsp;บาท
						</label>
					 
					</div>
						
				</div>
           
			
			<p>&nbsp;</p>      
			<hr style="border: 1px solid #808080; margin-bottom: 15px; margin-left: 15px;">
			
                    <div class="form-group row">
					<label class="col-md-2 control-label no-padding-right">ภัยเพิ่มพิเศษ</label>
					<div class="col-md-2">
						<label>
                            <input name="extra_danger" id="extra_danger1" type="radio" class="ace" value="0" <?php if($extra_danger=='0'){ echo "checked";}?>  >
							&nbsp;
							<span class="lbl">&nbsp;ไม่มี</span>
					</label>
					</div>  
					<div class="col-md-2">
						<label>
                           <input name="extra_danger" id="extra_danger2" type="radio" class="ace" value="1" <?php if($extra_danger=='1'){ echo "checked";}?>  >
							&nbsp;
							<span class="lbl">&nbsp;มี</span>
					</label>
					</div>  
                           
			</div>

			<div class="form-group row">
					<label class="col-md-2 control-label no-padding-right">อัตราเบี้ยประกันภัย</label>

					<div  class="col-md-4">						
                   <label> <input type="text" id="premium_rate" name="premium_rate" class="form-control autonumber" value="<?php echo $premium_rate?>"> &nbsp;</label>							
					</div>   
			</div>

			<div class="form-group row">
					<label class="col-md-2 control-label no-padding-right">เบี้ยประกันภัย</label>

					<div  class="col-md-4">						
                                            <label> <input type="text" id="premium" name="premium" class="form-control autonumber"  value="<?php echo $premium;?>"> &nbsp;บาท</label>							
					</div>  
			</div>
	
	
			<div class="form-group row">
					<label class="col-md-2 control-label no-padding-right">อากรแสตมป์</label>

					<div  class="col-md-4">						
                        <label> <input name="revenue_stamp" type="text" id="revenue_stamp"  class="form-control autonumber"  value="<?php echo $revenue_stamp;?>"> &nbsp;บาท</label>							
					</div>   
			</div>

			<div class="form-group row">
					<label class="col-md-2 control-label no-padding-right">ภาษีมูลค่าเพิ่ม</label>

					<div  class="col-md-4">						
                        <label> <input  name="tax" type="text" id="tax"  class="form-control autonumber"  value="<?php echo $tax;?>"> &nbsp;บาท</label>							
					</div>  
			</div>
	
			<div class="form-group row">
					<label class="col-md-2 control-label no-padding-right">เบี้ยประกันภัยรวม</label>

					<div  class="col-md-4">						
                        <label> <input name="total_price" type="text" id="total_price"  class="form-control autonumber"  value="<?php echo $total_price;?>"> &nbsp;บาท</label>							
					</div>  
			</div>
			
			<div class="form-group row">
					<label class="col-md-2 control-label no-padding-right">ทุนประกัน</label>

					<div  class="col-md-4">
						<label>
              <input name="insurance_limit" type="text" id="insurance_limit" placeholder=""  class="form-control autonumber"  value="<?php echo $insurance_limit;?>" > &nbsp;บาท
						  </label>
					</div>  
				</div>
			<div class="form-group row">
					<label class="col-md-2 control-label no-padding-right">ส่วนลด</label>

					<div  class="col-md-4">
						<label>
                      <input name="insurance_discount" type="text" id="insurance_discount"  class="form-control autonumber"  placeholder="" value="<?php echo $insurance_discount;?>" > &nbsp;บาท
						  </label>
					</div>  
				</div>
				<div class="form-group row">
					<label class="col-md-2 control-label no-padding-right">ยอดชำระ</label>

					<div  class="col-md-4">
						<label>
                       <input name="payment_amount" type="text" id="payment_amount"  class="form-control autonumber"  placeholder="" value="<?php echo $payment_amount;?>" > &nbsp;บาท
						  </label>
					</div>  
				</div>
			
			
                    <div class="form-group row">
					<label class="col-md-2 control-label no-padding-right">ตัวแทน</label>

					<div class="col-md-1">
						<label>
                            <input name="agent" id="agent1" type="radio" class="ace" value="1" <?php if($agent=='1'){ echo "checked";}?>  >
							&nbsp;
							<span class="lbl">&nbsp;ตัวแทน</span>
					</label>
					</div>  
					<div class="col-md-2">
						<label>
                           <input name="agent" id="agent2" type="radio" class="ace" value="2" <?php if($agent=='2'){ echo "checked";}?>  >
							&nbsp;
							<span class="lbl">&nbsp;นายหน้าประกันภัยรายนี้</span>
					</label>
					</div>  
					<div class="col-md-2">
						 
                              <input name="agent_name" id="agent_name" type="text" class="form-control "   value="<?php  echo $agent_name;?>"   >
							
					 
					</div>  
				</div>
			
			
           <div class="form-group row">
				<label class="col-md-2 control-label no-padding-right">ใบอนุญาตเลขที่</label>

					<div  class="col-md-4">
						<span>
                              <input name="license_number" type="text" id="license_number" class="form-control"  value="<?php echo $license_number;?>" >
						</span>
					</div>  
			</div>
           
			<div class="form-group row">
					<label class="col-md-2 control-label no-padding-right">วันทำสัญญาประกันภัย</label>

					<div  class="col-md-4">
						<span>
                  <input name="contract_startdate" id="contract_startdate" type="text" class="form-control date-picker"  data-provide="datepicker" data-date-language="th-th"   value="<?php echo $contract_startdate;?>"  >
						  </span>
					</div>  
				</div>
                    <div class="form-group row">
					<label class="col-md-2 control-label no-padding-right">วันออกกรมธรรม์ประกันภัย</label>

					<div  class="col-md-4">
						<span>
                    <input name="contract_enddate" id="contract_enddate" type="text" class="form-control date-picker"  data-provide="datepicker" data-date-language="th-th"   value="<?php echo $contract_enddate;?>"  >
						  </span>
					</div>  
                                        
				</div>
   
			
		</div>
	</div>
