<?php $txtDisable='';?>

	<div class="row">

		<div class="col-xs-12">

			<div class="form-group row">

                           

                            <input type="hidden" id="date_input" name="date_input" value="<?php echo date("Y-m-d")?>">

					<label class="col-md-2 control-label no-padding-right">รหัสบริษัท</label>



					<div class="col-md-5">

						<span>

                      <input name="company_id" type="text" class="form-control" id="company_id"  placeholder="รหัสบริษัท" value="<?php echo $company_id?>" />

								

						  </span>

					</div>  

				</div>

			<div class="form-group row">

					<label class="col-md-2 control-label no-padding-right">กรมธรรม์เลขที่</label>



					<div class="col-md-5">

						<span>

                         <input name="policy_number" type="text" id="policy_number"  class="form-control"   placeholder="กรมธรรม์เลขที่" value="<?php echo $policy_number?>" />

								

						  </span>

					</div>  

				</div>

			<div class="form-group  row">                           

                         

					<label class="col-sm-2 control-label no-padding-right">การต่ออายุ </label>

					<div class="col-sm-2">

						<label>

                           <input name="renewal" id="renewal" type="radio" class="ace" value="1"  <?php if($renewal=='1'){ echo 'checked'; } ?>>

							&nbsp;

							<span class="lbl">&nbsp;ต่ออายุ</span>

					</label>

					</div>  

					<div class="col-sm-2">

						<label>

                            <input name="renewal" id="renewal" type="radio" class="ace" value="2" <?php if($renewal=='2'){ echo 'checked'; } ?> >

							&nbsp;

							<span class="lbl">&nbsp;ประกันใหม่</span>

					</label>

					</div>  

					

				</div>

			<div class="form-group row">

					<label class="col-md-2 control-label no-padding-right">บริษัทประกัน</label>



					<div class="col-md-5"><span class="col-sm-5">

					  <select name="corp_id" class="form-control" id="corp_id" >

					    <option value="">--เลือกบริษัท--</option>

					    <?php foreach($listInsCorp AS $corp){?>

					    <?php foreach($listInsCorp AS $corp){?>

					    <option value="<?php echo $corp->id?>" <?php if($corp_id==$corp->id){ echo "selected";}?> ><?php echo $corp->company_name?></option>

					    <?php }?>

					    <?php }?>

				    </select>

					</span></div>  

		  </div>

			<div class="form-group row">

					<label class="col-md-2 control-label no-padding-right">ตัวแทน</label>



					<div class="col-md-5"><span class="col-sm-5">

					  <select name="agent_id" class="form-control" id="agent_id" >

					    <option value="">--เลือกตัวแทน--</option>

					    <?php foreach($listAgent AS $agent){?>

					    <option value="<?php echo $agent->id?>" <?php if($agent_id==$agent->id){ echo "selected";}?>  ><?php echo $agent->agent_name?></option>

					    <?php }?>

				    </select>

					</span></div>  

				</div>	

			<div class="form-group row">

					<label class="col-md-2 control-label no-padding-right">โค้ด</label>



					<div class="col-md-5"><span class="col-sm-5">

					  <select name="code_id" class="form-control" id="code_id" >

					    <option value="">--เลือกโค้ด--</option>

					    <?php foreach($listCode AS $code){?>

					    <option value="<?php echo $code->id?>" <?php if($code_id==$code->id){ echo "selected";}?> ><?php echo $code->conde_name?></option>

					    <?php }?>

				    </select>

					</span></div>  

				</div>

                    <div class="form-group row">

					<label class="col-md-2 control-label no-padding-right">ผู้ถือกรมธรรม์ : ชื่อ - สกุล</label>



					<div class="col-md-5">

						<span>

                             <input name="cust_name" type="text" id="cust_name"  class="form-control"   placeholder="" value="<?php echo $cust_name?>" />								

						  </span>

					</div>  

				</div>

			

				<div class="form-group row">

					<label class="col-md-2 control-label no-padding-right">ชื่อเล่น</label>



					<div class="col-md-5">

						<span>

                            <input name="cust_nickname" type="text" id="cust_nickname"  class="form-control"  placeholder="" value="<?php echo $cust_nickname;?>" />								

						  </span>

					</div>  

				</div>

				<div class="form-group row">

					<label class="col-md-2 control-label no-padding-right">โทรศัพท์</label>



					<div class="col-md-5">

						<span>

                           <input name="tel1" type="text" id="tel1" placeholder=""  class="form-control"  value="<?php echo $tel1;?>" />

								

						  </span>

					</div>  

				</div>

			

			

                    <div class="form-group row">

                 

                        <label class="col-md-2 control-label no-padding-right" >ผู้ถือกรมธรรม์ : ที่อยู่</label>



					<div class="col-md-5" >

						<span>

                   <textarea id="policyholder" name="policyholder"  class="form-control"  rows="5" style="width:500px" <?php echo $txtDisable?>><?php echo $policyholder;?></textarea>

							

						  </span>

					</div>  

				</div>

                    <div class="form-group row">

                 

                        <label class="col-md-2 control-label no-padding-right" >ผู้เอาประกันภัย :</label>



					<div class="col-md-5" >

						<span>

                    <textarea id="assured" name="assured" placeholder=""  class="form-control"  rows="5" style="width:500px" <?php echo $txtDisable?>><?php echo $assured;?></textarea>

							

						  </span>

					</div>  

				</div>

                    <div class="form-group row">

					<label class="col-md-2 control-label no-padding-right">ระยะเวลาประกันภัย</label>



					<div class="col-md-5">

						<span>

                              <input name="insurance_period" type="number" id="insurance_period"  class="form-control"   value="<?php echo $insurance_period;?>" <?php echo $txtDisable?>/>                                                        

						 </span>

					</div>

					<div class="col-md-1" style="text-align: left">	

						ปี 

					</div>

                        

				</div>

                <div class="form-group row">

					<label class="col-md-2 control-label no-padding-right">เริ่มวันที่</label>



					<div class="col-md-2">

						<span>

                              <input name="insurance_start" id="insurance_start" type="text" class="form-control date-picker"  data-provide="datepicker" data-date-language="th-th"   value="<?php echo $insurance_start;?>" />

						  </span>

					</div>  

                            <label class="col-md-1 control-label no-padding-right">เวลา</label>

                            <div class="col-md-7">

                                <input name="insurance_start_time" id="insurance_start_time" class="form-control "  style="width: 150px" type="time" value="<?php echo $insurance_start_time;?>" <?php echo $txtDisable?>/>

							</div>

				</div>

                    <div class="form-group row">

					<label class="col-md-2 control-label no-padding-right">สิ้นสุด</label>



					<div class="col-md-2">

						<span>

                         <input name="insurance_end" id="insurance_end" type="text" class="form-control date-picker"  data-provide="datepicker" data-date-language="th-th"   value="<?php echo $insurance_end;?>" <?php echo $txtDisable?>/>

						  </span>

					</div>  

                                        <label class="col-md-1 control-label no-padding-right">เวลา</label>

                  <div class="col-md-7">

                     <input name="insurance_end_time" id="insurance_end_time" class="form-control " style="width: 150px" type="time" value="<?php echo $insurance_end_time;?>" <?php echo $txtDisable?>/>

					</div>

				</div>

                    

			<div class="form-group row">

					<label class="col-md-2 control-label no-padding-right">เส้นทางการเดินทางชื่อ</label>



					<div class="col-md-5">

						<span>

							 <input name="travel_route" type="text" width="100%" class="form-control" id="travel_route"  placeholder="ตามเอกสารแนบ" value="<?php echo $travel_route;?>" />

						  </span>

					</div>  

				</div>

			<div class="form-group row">

					<label class="col-md-2 control-label no-padding-right">จำนวนจำกัดความรับผิดชอบ</label>



					<div class="col-md-5">

						<span>

							 <textarea id="amount" name="amount" class="form-control " placeholder="" rows="3" style="width:500px" <?php echo $txtDisable?>><?php echo $amount;?></textarea>

						  </span>

					</div>  

				</div>

			<div class="row">	

			<div class="form-group row">

					

					<label class="col-md-5 control-label no-padding-right">ข้อ 1. เสียชีวิต สูญเสียอวัยวะ สายตา หรือทุพพลภาพถาวรสิ้นเชิง</label>

					<label class="col-md-1 control-label no-padding-right">คนละ</label>



					<div class="col-md-3">

						<span>

                             <input name="life_cost" type="text" id="life_cost" class="form-control autonumber "  value="<?php echo $life_cost;?>" <?php echo $txtDisable?>/>

						</span>

					</div>  

				</div>

				</div>

				<div class="row">	

			<div class="form-group row">

					

					<label class="col-md-5 control-label no-padding-right">ข้อ 2. ค่ารักษาพยาบาลต่ออุบัติเหตุแต่ละครั้ง</label>

					<label class="col-md-1 control-label no-padding-right">คนละ</label>



					<div class="col-md-3">

						<span>

                             <input name="medical_accident" type="text" id="medical_accident" class="form-control autonumber  "  value="<?php echo $medical_accident;?>" <?php echo $txtDisable?>/>

						</span>

					</div>  

				</div>

				</div>

				<div class="row">	

			<div class="form-group row">					

					<label class="col-md-2 control-label no-padding-right">เบี้ยประกันภัยสำหรับเพิ่ม</label>

					<div class="col-md-5">

						<span>

                            <input name="insurance_premiums" type="text" id="insurance_premiums" class=" autonumber form-control "  value="<?php $insurance_premiums;?>" <?php echo $txtDisable?>/>

						</span>

					</div>  

				</div>

				</div>

				<div class="row">	

			<div class="form-group row">

					<label class="col-md-2 control-label no-padding-right">เบี้ยประกันภัย</label>



					<div class="col-md-5">

						<span>

                             <input name="Insurance_price" type="text" id="Insurance_price" class=" autonumber form-control "  value="<?php echo $Insurance_price;?>" <?php echo $txtDisable?>/>

						</span>

					</div>  

				</div>

				</div>

				<div class="row">	

			<div class="form-group row">

					<label class="col-md-2 control-label no-padding-right">อากร</label>



					<div class="col-md-5">

						<span>

                            <input name="duty" type="text" id="duty" class=" autonumber form-control "  value="<?php echo $duty;?>" <?php echo $txtDisable?>/>

						</span>

					</div>  

				</div>

				</div>

				<div class="row">	

			<div class="form-group row">

					<label class="col-md-2 control-label no-padding-right">ภาษีมูลค่าเพิ่ม</label>

					<div class="col-md-5">

						<span>

                             <input name="vat" type="text" id="vat" class=" autonumber form-control "  value="<?php echo $vat;?>" <?php echo $txtDisable?>/>

						</span>

					</div>  

				</div>

				</div>

				<div class="row">	

			<div class="form-group row">

					<label class="col-md-2 control-label no-padding-right">เบี้ยประกันภัยรวม</label>

					<div class="col-md-5">

						<span>

                             <input name="Insurance_price_total" type="text" id="Insurance_price_total" class=" autonumber form-control "  value="<?php echo $Insurance_price_total;?>" <?php echo $txtDisable?>/>

						</span>

					</div>  

				</div>

				</div>

			<div class="row">	

			<div class="form-group row">

					<label class="col-md-2 control-label no-padding-right">ทุนประกัน</label>



					<div class="col-md-5">

						<span>

                  <input name="insurance_limit" type="text" id="insurance_limit" placeholder="" class=" autonumber form-control " value="<?php echo $insurance_limit;?>" />

						  </span>

					</div>  

				</div>

				</div>

				<div class="row">	

				<div class="form-group row">

					<label class="col-md-2 control-label no-padding-right">ส่วนลด</label>



					<div class="col-md-5">

						<span>

                   <input name="Insurance_discount" type="text" id="Insurance_discount" class=" autonumber form-control " placeholder="" value="<?php echo $Insurance_discount;?>" />

						  </span>

					</div>  

				</div>		

				</div>

<div class="row">					

			<div class="form-group row">

					<label class="col-md-2 control-label no-padding-right">ยอดชำระ</label>



					<div class="col-md-5">

						<span>

                  <input name="payment_amount" type="text" class=" autonumber form-control " id="payment_amount" placeholder="" value="<?php echo $payment_amount;?>" />

						  </span>

					</div>  

				</div>

				</div>

			<div class="row">	

             <div class="form-group row">

					<label class="col-md-2 control-label no-padding-right">ข้อตกลงคุ้มครอง/เอกสารแนบท้ายที่แนบติด</label>



                    <div class="col-md-5" style=" margin-top: 5px;">

						<span>

                          	<input name="protection_agreement" type="text" id="protection_agreement"  class="form-control " value="<?php echo $protection_agreement;?>" />

						</span>

					</div>  

			</div>

			</div>

			

			<div class="form-group row">

					<label class="col-md-2 control-label no-padding-right">ตัวแทน</label>



					<div class="col-md-2">

						<label>

                            <input name="agent" id="agent1" type="radio" class="ace" value="1" <?php if(($agent=='1')){ echo "checked";}?> <?php echo $txtDisable?>/>

							&nbsp;

							<span class="lbl">&nbsp;ตัวแทน</span>

					</label>

					</div>  

					<div class="col-md-2">

						<label>

                            <input name="agent" id="agent2" type="radio" class="ace" value="2" <?php if(($agent=='2')){ echo "checked";}?> <?php echo $txtDisable?>/>

							&nbsp;

						<span class="lbl">&nbsp;นายหน้าประกันภัยรายนี้</span>

					</label>

					</div>  

					<div class="col-md-6">

						<label>

                      <input name="agent_name" id="agent_name" type="text" class="form-control " value="<?php echo $agent_name;?>"  <?php echo $txtDisable?>/>

							

					</label>

					</div>  

		</div>

        <div class="form-group row">

					<label class="col-md-2 control-label no-padding-right">ใบอนุญาตเลขที่</label>



					<div class="col-md-5">

						<span>

                             <input name="license_number" type="text" class="form-control " id="license_number"  value="<?php echo $license_number;?>" />

						</span>

					</div>  

		</div>

        <div class="form-group row">

					<label class="col-md-2 control-label no-padding-right">วันทำสัญญาประกันภัย</label>



					<div class="col-md-5">

						<span>

                            <input name="insurance_contract_date" id="insurance_contract_date" type="text" class="form-control  date-picker"  data-provide="datepicker" data-date-language="th-th"   value="<?php echo $insurance_contract_date;?>" <?php echo $txtDisable?>/>

						</span>

					</div>  

                                    

		</div>

        <div class="form-group row">

					<label class="col-md-2 control-label no-padding-right">วันทำกรมธรรม์</label>



					<div class="col-md-5">

						<span>

                             <input name="policy_date" id="policy_date" type="text" class="form-control  date-picker"  data-provide="datepicker" data-date-language="th-th"   value="<?php echo $policy_date;?>" <?php echo $txtDisable?>/>

						 </span>

					</div>            

		</div>





			

		</div>

	</div>

