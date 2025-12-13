<div class="col-xs-12">
			<div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">รหัสบริษัท</label>

					<div class="col-sm-3">
						<span>
                                                    <input name="company_id"  class="form-control" type="text" id="company_id" value="<?php echo $company_id?>">
								
						  </span>
					</div>  
			
                 </div>          
                <div class="form-group row">         
					<label class="col-sm-2 control-label no-padding-right">การต่ออายุ</label>
<div class="col-sm-2">
						<label>
                                                    <input name="renewal" id="renewal" type="radio" class="ace" value="1" <?php if($renewal=='1'){ echo "checked";}?> >
							&nbsp;
							<span class="lbl">&nbsp;ต่ออายุ</span>
					</label>
					</div>  
					<div class="col-sm-2">
						<label>
                                                    <input name="renewal" id="renewal" type="radio" class="ace" value="2" <?php if($renewal=='2'){ echo "checked";}?> >
							&nbsp;
							<span class="lbl">&nbsp;ประกันใหม่</span>
					</label>
					</div>  
					
				</div>
			<input type="hidden" id = "policy_old_number" name="policy_old_number" value=''>
			
			<?php /*?>
			<div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">กรมธรรม์เดิมเลขที่</label>
                    <div class="col-sm-3">
						<span>
                            <input name="policy_old_number" type="text"   class="form-control"  id="policy_old_number" value="<?php echo $policy_old_number?>">
								
						  </span>
					</div>
                          
					
			</div>
			<?php */?>
			
			<div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">กรมธรรม์เลขที่</label>
                            <div class="col-sm-3">
						<span>
                             <input name="policy_number" type="text"    class="form-control"  id="policy_number" value="<?php echo $policy_number?>">
								
						  </span>
					</div>
					
				</div>
			
			
  <div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">บริษัทประกัน</label>

					<div class="col-sm-3">
						<span>
                      <select name="corp_id" class="form-control" id="corp_id" >
						<option value="">--เลือกบริษัท--</option>
						
							<?php foreach($listInsCorp AS $corp){?>
									<?php foreach($listInsCorp AS $corp){?>
									<option value="<?php echo $corp->id?>" <?php if($corp_id==$corp->id){ echo "selected";}?> ><?php echo $corp->company_name?></option>
									<?php }?>
							<?php }?>
						</select>
						  </span>
					</div>  
				</div>
				
			<div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">ตัวแทน <a href="javascript:void(0)" aria-hidden="true" class="icon-plus text-success" onclick="openPopUpForm('agent')" title="เพิ่มตัวแทน"></a></label>

					<div class="col-sm-3">
						<span>
                    <select name="agent_id" class="form-control" id="agent_id" >
						<option value="">--เลือกตัวแทน--</option>
					<?php foreach($listAgent AS $agent){?>
								<option value="<?php echo $agent->id?>" <?php if($agent_id==$agent->id){ echo "selected";}?>  ><?php echo $agent->agent_name?></option>
																		<?php }?>
					</select>
								
						  </span>
					</div>  
				</div>	
  		<div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">โค้ด <a href="javascript:void(0)" aria-hidden="true" class="icon-plus text-success" onclick="openPopUpForm('code')" title="เพิ่มโค้ด"></a></label>

					<div class="col-sm-3">
						<span>
                        <select name="code_id" class="form-control" id="code_id" >
						<option value="">--เลือกโค้ด--</option>
					<?php foreach($listCode AS $code){?>
								<option value="<?php echo $code->id?>" <?php if($code_id==$code->id){ echo "selected";}?> ><?php echo $code->conde_name?></option>
							<?php }?>
					</select>
								
						  </span>
					</div>  
				</div>
                    <div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">ชื่อ - สกุล ผู้เอาประกัน</label>

					<div class="col-sm-3">
						<span>
                                                    <input name="cust_name"    class="form-control"  type="text" id="cust_name" placeholder="" value="<?php echo $cust_name?>">
								
						  </span>
					</div>  
				</div>
				<div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">ชื่อเล่น</label>

					<div class="col-sm-3">
						<span>
                                                    <input name="cust_nickname"  class="form-control"  type="text" id="cust_nickname" placeholder="" value="<?php echo $cust_nickname?>">
								
						  </span>
					</div>  
				</div>
  <div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">โทรศัพท์</label>

					<div class="col-sm-3">
						<span>
                                                    <input name="tel1"   class="form-control"  type="text" id="tel1" placeholder="" value="<?php echo $tel1?>">
								
						  </span>
	  </div>  
				</div>
                    <div class="form-group row">
                 
                        <label class="col-sm-2 control-label no-padding-right">ที่อยู่ผู้เอาประกัน</label>

					<div class="col-sm-3">
						<span>
                                                    <textarea id="policyholder"   class="form-control"  name="policyholder" rows="5"><?php echo $policyholder?></textarea>
							
						  </span>
					</div>  
				</div>
                    <div class="form-group row">
                 
                        <label class="col-sm-2 control-label no-padding-right">สถานที่ตั้งทรัพย์สินเอาประกัน</label>

					<div class="col-sm-3">
						<span>
                                                    <textarea id="location_insured"   class="form-control"  name="location_insured" rows="5" ><?php echo $location_insured?></textarea>
							
						  </span>
					</div>  
				</div>
                  <div class="form-group row">
                 
                        <label class="col-sm-2 control-label no-padding-right">ผู้รับประโยชน์</label>

					<div class="col-sm-3">
						<span>
                                                    <textarea id="beneficiary"   class="form-control"  name="beneficiary" rows="5" ><?php echo $beneficiary?></textarea>
							
						  </span>
					</div>  
				</div>
                    <div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">ระยะเวลาประกันภัย</label>

					<div class="col-sm-2">
						<span>
                                                    <input name="insurance_period" type="number"  class="form-control" 1 id="insurance_period" value="<?php echo $insurance_period?>">
                                                        
						  </span>
					</div>
                                        <div class="col-sm-8" style="margin-bottom: 3px;">
						<span>
                                                    <p style="margin-bottom: 15px;">ปี</p>
						  </span>
					</div>
                              
				</div>
                    
                    
                 
                    <div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">เริ่มวันที่</label>

					<div class="col-sm-2">
						<span>
                                                    <input name="insurance_start" id="insurance_start" type="text" class="form-control date-picker" data-provide="datepicker" data-date-language="th-th" value="<?php echo $insurance_start?>">
						  </span>
					</div>  
                                        <label class="col-sm-1 control-label no-padding-right">เวลา</label>
                                        <div class="col-sm-7">
                                            <input name="insurance_start_time" id="insurance_start_time"   class="form-control"  style="width: 150px" type="time" value="<?php echo $insurance_start_time?>">
					</div>
				</div>
                    <div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">สิ้นสุด</label>

					<div class="col-sm-2">
						<span>
                                                    <input name="insurance_end" id="insurance_end" type="text" class="form-control date-picker" data-provide="datepicker" data-date-language="th-th" value="<?php echo $insurance_end?>">
						  </span>
					</div>  
                                        <label class="col-sm-1 control-label no-padding-right">เวลา</label>
                                        <div class="col-sm-7">
                                            <input name="insurance_end_time" id="insurance_end_time"  class="form-control" style="width: 150px" type="time" value="<?php echo $insurance_end_time?>">
					</div>
				</div>
                    

		
			<div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">เบี้ยประกันภัยสุทธิ (บาท)</label>

					<div class="col-sm-2">
						<span>
                                                    <input name="totalprice_installment"  class="form-control autonumber" type="text" id="totalprice_installment" placeholder="" value="<?php echo $totalprice_installment?>">
						  </span>
					</div>
				   <div class="col-sm-8">
					</div>  
				</div>
			<div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">อากรแสตมป์ (บาท)</label>

					<div class="col-sm-2">
						<span>
                                                    <input name="revenue_stamp"  class="form-control autonumber" type="text" id="revenue_stamp" placeholder="" value="<?php echo $revenue_stamp?>">
						  </span>
					</div> 
				 <div class="col-sm-8">
					</div>  
				</div>
  <div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">ภาษี (บาท)</label>

					<div class="col-sm-2">
						<span>
                                                    <input name="tax"  class="form-control autonumber" type="text" id="tax" placeholder="" value="<?php echo $tax?>">
						  </span>
		  </div>  
	    <div class="col-sm-8">
					</div>  
				</div>
  <div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">เบี้ยประกันภัยรวม (บาท)</label>

					<div class="col-sm-2">
						<span>
                                                    <input name="total_price" type="text"  class="form-control autonumber" id="total_price"  placeholder="" value="<?php echo $total_price?>">
						  </span>
		  </div>    <div class="col-sm-8">
					</div>  
				</div>
			
  <div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">ทุนประกัน (บาท)</label>

					<div class="col-sm-2">
						<span>
                                                    <input name="insurance_limit" type="text"  class="form-control autonumber" id="insurance_limit" placeholder="" value="<?php echo $insurance_limit?>">
						  </span>
		  </div>    <div class="col-sm-8">
					</div>  
				</div>
			<div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">ส่วนลด(บาท)</label>

					<div class="col-sm-2">
						<span>
                                                    <input name="insurance_discount"  class="form-control autonumber" type="text" id="insurance_discount" placeholder="" value="<?php echo $insurance_discount?>">
						  </span>
					</div>  
				  <div class="col-sm-8">
					</div>  
				</div><div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">ยอดชำระ (บาท)</label>

					<div class="col-sm-2">
						<span>
                                                    <input name="payment_amount"  class="form-control autonumber" type="text" id="payment_amount" placeholder="" value="<?php echo $payment_amount?>">
						  </span>
					</div>  
	  <div class="col-sm-8">
					</div>  
				</div>
			
			
			<div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">เอกสารแนบท้ายที่แนบติด</label>

					<div class="col-sm-3">
						<span>
                              <input name="attach"   class="form-control"  type="text" id="attach" value="<?php echo $attach?>">
						  </span>
					</div>  
				</div>
			
                    <div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">วันทำสัญญาประกันภัย</label>

					<div class="col-sm-3">
						<span>
                                                    <input name="contract_startdate" id="contract_startdate" type="text" class="form-control date-picker" data-provide="datepicker" data-date-language="th-th" value="<?php echo $contract_startdate?>">
						  </span>
					</div>  
				</div>
                    <div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">วันออกกรมธรรม์ประกันภัย</label>

					<div class="col-sm-3">
						<span>
                                                    <input name="contract_enddate" id="contract_enddate" type="text" class="form-control date-picker" data-provide="datepicker" data-date-language="th-th" value="<?php echo $contract_enddate?>">
						  </span>
					</div>  
                                        
				</div>
	  <div class="form-group row">
              
            
				  <label class="col-sm-2 control-label no-padding-right">เลือกตัวแทน</label>
				  <div class="col-sm-2">
						<input name="type_work" id="type_work2" type="radio" class="ace" value="2" <?php if($type_work=='2'){ echo "checked";}?>  >
							&nbsp;
						<span class="lbl">&nbsp;ตัวแทน</span>
				  </div>
					 
              <div class="col-sm-2">
						<label>
                         <input name="type_work" id="type_work2" type="radio" class="ace" value="3"  <?php if($type_work=='3'){ echo "checked";}?>>
							&nbsp;
							<span class="lbl">&nbsp;นายหน้าประกันภัยรายนี้</span>
					</label>
					</div>  
              <div class="col-sm-6">
						<label>
                            <input name="broker_name" id="broker_name" class="form-control" type="text" value="<?php echo $broker_name?>">
							
					</label>
					</div>  
				</div>		
			
			
                    
                    
                    
			
                  <div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">ใบอนุญาตเลขที่</label>

                                        <div class="col-sm-3" style=" margin-top: 5px;">
						<span>
                                                    <input name="license_number" type="text" class="form-control" id="license_number" value="<?php echo $license_number?>">
								
						  </span>
					</div>  
				</div>
                  
                    
				

		
					
</div>