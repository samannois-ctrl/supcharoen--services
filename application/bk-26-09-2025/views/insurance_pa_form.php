<?php
		$txtDisable ='';
	   
?>

<div class="row">
		<div class="col-xs-12">
			<div class="form-group  row">
                           
                         
					<label class="col-sm-2 control-label no-padding-right">เลือกประเภท</label>
					<div class="col-sm-2">
						<label>
                        <input name="type" id="type" type="radio" class="ace" value="1" <?php if($type=='1'){ echo "checked";}?>  <?php echo $txtDisable?>/>
							&nbsp;
							<span class="lbl">&nbsp;แบบรายเดี่ยว</span>
					</label>
					</div>  
					<div class="col-sm-8">
						<label>
                         <input name="type" id="type" type="radio" class="ace" value="2" <?php if($type=='2'){ echo "checked";}?>  <?php echo $txtDisable?>/>
							&nbsp;
							<span class="lbl">&nbsp;แบบครอบครัว</span>
					</label>
					</div>  
					
			</div>
			
			<div class="form-group  row">
					<label class="col-sm-2 control-label no-padding-right">รหัสบริษัท</label>

					<div class="col-sm-10">
						<span>
                             <input name="company_id" type="text" id="company_id"   value="<?php echo $company_id?>" />
								
						</span>
					</div>  
				</div>
			
             <div class="form-group  row">                           
                         
					<label class="col-sm-2 control-label no-padding-right">การต่ออายุ</label>
					<div class="col-sm-2">
						<label>
                           <input name="renewal" id="renewal" type="radio" class="ace" value="1" <?php if($renewal=='1'){ echo "checked";}?> />
							&nbsp;
							<span class="lbl">&nbsp;ต่ออายุ</span>
					</label>
					</div>  
					<div class="col-sm-8">
						<label>
                            <input name="renewal" id="renewal" type="radio" class="ace" value="2"   <?php if($renewal=='2'){ echo "checked";}?>/>
							&nbsp;
							<span class="lbl">&nbsp;ประกันใหม่</span>
					</label>
					</div>  
					
				</div>
			
<input type="hidden" id = "policy_old_number" name="policy_old_number" value=''>
		
		<?php /*?>	<div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">กรมธรรม์เดิมเลขที่</label>
                     <div class="col-sm-10">
						<span>
                            <input name="policy_old_number" type="text" id="policy_old_number"   value="<?php echo $policy_old_number?>" />
								
						  </span>
					</div>
			</div>
			
			<?php */?>	
			<div class="form-group row">
					 <label class="col-sm-2 control-label no-padding-right">กรมธรรม์เลขที่</label>
                     <div class="col-sm-10">
						<span>
                            <input name="policy_number" type="text" id="policy_number"   value="<?php echo $policy_number?>" />
								
						  </span>
					</div>
					
			</div>		
			
           <div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">บริษัทประกัน</label>

					<div class="col-sm-10">
						<span>
                        <select name="corp_id" class="form-control" id="corp_id" style="width: 24%;">
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

					<div class="col-sm-10">
						<span>
                    <select name="agent_id" class="form-control" id="agent_id" style="width: 24%;">
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

					<div class="col-sm-10">
						<span>
                        <select name="code_id" class="form-control" id="code_id" style="width: 24%;">
						<option value="">--เลือกโค้ด--</option>
					<?php foreach($listCode AS $code){?>
								<option value="<?php echo $code->id?>" <?php if($code_id==$code->id){ echo "selected";}?> ><?php echo $code->conde_name?></option>
							<?php }?>
					</select>
								
						  </span>
					</div>  
				</div>
                    <div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right"><strong>ผู้เอาประกัน :</strong> ชื่อ - สกุล</label>

					<div class="col-sm-10">
						<span>
                        <input name="cust_name" type="text" id="cust_name"  placeholder="" value="<?php echo $cust_name?>" />
								
						  </span>
					</div>  
				</div>
			
			<div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right"><strong>ผู้เอาประกัน :</strong> ชื่อเล่น</label>

					<div class="col-sm-10">
						<span>
                                      <input name="cust_nickname" type="text" id="cust_nickname" placeholder="" value="<?php echo $cust_nickname?>" />
								
						  </span>
					</div>  
				</div>
			<div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right"><strong>ผู้เอาประกัน :</strong> โทรศัพท์</label>

					<div class="col-sm-10">
						<span>
                                     <input name="tel1" type="text" id="tel1" placeholder="" value="<?php echo $tel1?>" />
								
						  </span>
					</div>  
				</div>
			
			<div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right"><strong>ผู้เอาประกัน :</strong> ที่อยู่</label>

					<div class="col-sm-10">
						<span>
                                    <textarea id="policyholder" name="policyholder" rows="5" style="width:500px" <?php echo $txtDisable?>><?php echo $policyholder?></textarea>
								
						  </span>
					</div>  
				</div>
      
			
			
			<div class="form-group row">
                 
                    <label class="col-sm-2 control-label no-padding-right" ><strong>ผู้ได้รับความคุ้มครอง :</strong></label>
				
					<div class="col-sm-2" >
					<span>
                           <input style="width: 100%" name="protected_name1" type="text" id="protected_name1" placeholder="ชื่อ-นามสกุล"   value="<?php echo $protected_name1?>" />
					</span>	
					</div>  
					<div class="col-sm-2" >
					<span>
                           <input style="width: 100%" name="protected_number1" type="text" id="protected_number1" placeholder="เลขประจำตัวประชาชนหรือเลขที่หนังสือเดินทาง"   value="<?php echo $protected_number1?>" />
					</span>	
					</div>  
					<div class="col-sm-1" >
					<span>
                           <input style="width: 100%" name="protected_sex1" type="text" id="protected_sex1" placeholder="เพศ"  value="<?php echo $protected_sex1?>" />
					</span>	
					</div>  
					<div class="col-sm-2" >
					<span>
                           <input style="width: 100%" name="protected_date1" type="text" id="protected_date1" placeholder="วันเดือนปีเกิด" class=" date-picker"  data-provide="datepicker" data-date-language="th-th"   value="<?php echo $protected_date1?>" />
					 </span>	
					</div>  
					<div class="col-sm-1" >
					<span>
                            <input style="width: 100%" name="protected_age1" type="text" id="protected_age1" placeholder="อายุ(ปี)"   value="<?php echo $protected_age1?>" />
					</span>	
					</div>  
					<div class="col-sm-2" >
					<span>
                            <input style="width: 100%" name="protected_relationship1" type="text" id="protected_relationship1" placeholder="ความสัมพันธ์กับผู้เอาประกันภัย"   value="<?php echo $protected_relationship1?>" />
					</span>	
					</div> 
				
				
			</div>
			
			
            <div class="form-group row">
                 
				  <div class="col-sm-2" > </div>
                    <div class="col-sm-2" >
					<span>
                           <input style="width: 100%" name="protected_name2" type="text" id="protected_name2" placeholder="ชื่อ-นามสกุล"   value="<?php echo $protected_name2?>" />
								
						  </span>	
					</div>  
					<div class="col-sm-2" >
					<span>
                          <input style="width: 100%" name="protected_number2" type="text" id="protected_number2" placeholder="เลขประจำตัวประชาชนหรือเลขที่หนังสือเดินทาง"   value="<?php echo $protected_number2?>" />
								
						  </span>	
					</div>  
					<div class="col-sm-1" >
					<span>
                              <input style="width: 100%" name="protected_sex2" type="text" id="protected_sex2" placeholder="เพศ"  value="<?php echo $protected_sex2?>" />
								
						  </span>	
					</div>  
					<div class="col-sm-2" >
					<span>
                              <input style="width: 100%" name="protected_date2" type="text" id="protected_date2" placeholder="วันเดือนปีเกิด" class=" date-picker"  data-provide="datepicker" data-date-language="th-th"   value="<?php echo $protected_date2?>" />
								
						  </span>	
					</div>  
					<div class="col-sm-1" >
					<span>
                             <input style="width: 100%" name="protected_age2" type="text" id="protected_age2" placeholder="อายุ(ปี)"   value="<?php echo $protected_age2?>" />
							
						  </span>	
					</div>  
					<div class="col-sm-2" >
					<span>
                            <input style="width: 100%" name="protected_relationship2" type="text" id="protected_relationship2" placeholder="ความสัมพันธ์กับผู้เอาประกันภัย"   value="<?php echo $protected_relationship2?>" />
								
						  </span>	
					</div>
                          
					
			</div>
			
			
            <div class="form-group  row">
				  <div class="col-sm-2" > </div>
				
                  <div class="col-sm-2" >
					<span>
                                            <input style="width: 100%" name="protected_name3" type="text" id="protected_name3" placeholder="ชื่อ-นามสกุล"   value="<?php echo $protected_name3?>" />
								
						  </span>	
					</div>  
					<div class="col-sm-2" >
					<span>
                                            <input style="width: 100%" name="protected_number3" type="text" id="protected_number3" placeholder="เลขประจำตัวประชาชนหรือเลขที่หนังสือเดินทาง"   value="<?php echo $protected_number3?>" />
								
						  </span>	
					</div>  
					<div class="col-sm-1" >
					<span>
                                            <input style="width: 100%" name="protected_sex3" type="text" id="protected_sex3" placeholder="เพศ"  value="<?php echo $protected_sex3?>" />
								
						  </span>	
					</div>  
					<div class="col-sm-2" >
					<span>
                                            <input style="width: 100%" name="protected_date3" type="text" id="protected_date3" placeholder="วันเดือนปีเกิด" class=" date-picker"  data-provide="datepicker" data-date-language="th-th"   value="<?php echo $protected_date3?>" />
								
						  </span>	
					</div>  
					<div class="col-sm-1" >
					<span>
                                            <input style="width: 100%" name="protected_age3" type="text" id="protected_age3" placeholder="อายุ(ปี)"   value="<?php echo $protected_age3?>" />
							
						  </span>	
					</div>  
					<div class="col-sm-2" >
					<span>
                                            <input style="width: 100%" name="protected_relationship3" type="text" id="protected_relationship3" placeholder="ความสัมพันธ์กับผู้เอาประกันภัย"   value="<?php echo $protected_relationship3?>" />
								
						  </span>	
					</div>
				</div>
			
			
               <div class="form-group  row">
                 
                        <label class="col-sm-2 control-label no-padding-right" >ผู้รับประโยชน์และความสัมพันธ์</label>

					<div class="col-sm-10" >
						<span>
                           <textarea id="beneficiary" name="beneficiary" rows="5" style="width:500px"><?php echo $beneficiary?></textarea>
							
						  </span>
					</div>  
				</div>
                    <div class="form-group  row">
					<label class="col-sm-2 control-label no-padding-right">ระยะเวลาประกันภัย</label>

					<div class="col-sm-2">
						<span>
                          <input name="insurance_period" type="number" id="insurance_period"   value="<?php echo $insurance_period?>" />
                                                        
						  </span>
					</div>
                                        <div class="col-sm-8" style="margin-bottom: 3px;">
						<span>
                                                    <p style="margin-bottom: 15px;">ปี</p>
						  </span>
					</div>
                              
				</div>
                    
                    
                 
                    <div class="form-group  row" >
					<label class="col-sm-2 control-label no-padding-right">เริ่มวันที่</label>

					<div class="col-sm-2">
						<span>
                                                    <input name="insurance_start" id="insurance_start" type="text" class=" date-picker"  data-provide="datepicker" data-date-language="th-th"   value="<?php echo $insurance_start?>" <?php echo $txtDisable?>/>
						  </span>
					</div>  
                                        <label class="col-sm-1 control-label no-padding-right">เวลา</label>
                                        <div class="col-sm-7">
                                            <input name="insurance_start_time" id="insurance_start_time" style="width: 100px" type="time" value="<?php echo $insurance_start_time?>" <?php echo $txtDisable?>/>
					</div>
				</div>
                    <div class="form-group  row">
					<label class="col-sm-2 control-label no-padding-right">สิ้นสุด</label>

					<div class="col-sm-2">
						<span>
                                                    <input name="insurance_end" id="insurance_end" type="text" class=" date-picker"  data-provide="datepicker" data-date-language="th-th"   value="<?php echo $insurance_end?>" <?php echo $txtDisable?>/>
						  </span>
					</div>  
                                        <label class="col-sm-1 control-label no-padding-right">เวลา</label>
                                        <div class="col-sm-7">
                                            <input name="insurance_end_time" id="insurance_end_time" style="width: 100px" type="time" value="<?php echo $insurance_end_time?>" <?php echo $txtDisable?>/>
					</div>
				</div>
			
			
                    <p>&nbsp;</p>
				
			
					<style>
						.table_border{
							border: #000000 1px solid;
							border-right: #000000 1px solid;
							border-left: #000000 1px solid;
						}
					</style>
			
					<div class="form-group">
							<div class="col-sm-12" style="text-align: center; font-size: 16px; font-weight: bold; padding: 10px; margin: 12px; background-color: #DDDDDD">ข้อตกลงคุ้มครอง/เอกสารแนบท้าย</div>
					</div>
                    
                    <div class="form-group">
						 <div class="col-sm-12">
							<table width="100%" cellspacing="0" cellpadding="0" style="font-size: 14px;">
							  <tbody>
								<tr >
								  <td class="table_border" rowspan="3" align="center" bgcolor="#FFFFFF" style="font-weight: bold">ลำดับ</td>
								  <td colspan="2" rowspan="3" align="center" bgcolor="#FFFFFF" class="table_border" style="font-weight: bold">ข้อตกลงคุ้มครอง/เอกสารแนบท้าย</td>
								  <td class="table_border" colspan="5" align="center" bgcolor="#FFFFFF" style="font-weight: bold">จำนวนเงินเอาประกันภัย (บาท)</td>
							    </tr>
								<tr>
								  <td class="table_border" rowspan="2" align="center" bgcolor="#FFFFFF" style="font-weight: bold">ผู้เอาประกันภัย</td>
								  <td class="table_border" colspan="3" align="center" bgcolor="#FFFFFF" style="font-weight: bold">บุคคลในครอบครัว</td>
								  <td class="table_border" rowspan="2" align="center" bgcolor="#FFFFFF" style="font-weight: bold">ความรับผิดส่วนแรก<br>
							      (บาทหรือวัน)</td>
							    </tr>
								<tr>
								  <td class="table_border" align="center" bgcolor="#FFFFFF" style="font-weight: bold">คู่สมรส</td>
								  <td class="table_border" align="center" bgcolor="#FFFFFF" style="font-weight: bold">บุตร (ต่อคน)</td>
								  <td class="table_border" align="center" bgcolor="#FFFFFF" style="font-weight: bold">อื่นๆ (ระบุ)</td>
							    </tr>
								<tr>
								  <td class="table_border" align="center" bgcolor="#FFFFFF">1</td>
								  <td colspan="2" align="left" bgcolor="#FFFFFF" class="table_border" style="width: 550px; margin: 4px;">ผลประโยชน์การเสียชีวิต การสูญเสียอวัยวะ สายตา หรือทุพพลภาพถาวรสิ้นเชิง (อบ.1)<br>
									Loss of Life. Dismemberment, Loss of Sight or Total Permanet Disability (PA.1)
									</td>
                                  <td class="table_border" align="center" bgcolor="#FFFFFF"><input type="text" class="form-control autonumber" name="assured1" value="<?php echo $assured1?>" style="width: 100px; margin: 4px;"></td>
                                  <td class="table_border" align="center" bgcolor="#FFFFFF"><input  type="text" class="form-control autonumber" name="spouse1" value="<?php echo $spouse1?>" style="width: 100px; margin: 4px;"></td>
                                  <td class="table_border" align="center" bgcolor="#FFFFFF"><input type="text" class="form-control autonumber" name="family_person1" value="<?php echo $family_person1?>" style="width: 100px; margin: 4px;"></td>
                                  <td class="table_border" align="center" bgcolor="#FFFFFF"><input type="text" class="form-control autonumber" name="other1" value="<?php echo $other1?>" style="width: 100px; margin: 4px;"></td>
                                  <td class="table_border" align="center" bgcolor="#FFFFFF"><input  type="text" class="form-control autonumber" name="partial_liability1" value="<?php echo $partial_liability1?>" style="width: 100px; margin: 4px;"></td>
								</tr>
								
								<tr>
								  <td class="table_border" align="center" bgcolor="#FFFFFF">1.1</td>
								  <td colspan="2" align="left" bgcolor="#FFFFFF" class="table_border">การกำจัดความรับผิด (การถูกฆาตกรรม หรือถูกทำร้ายร่างกาย) หรือ<br>
							      Limitation of cover (Murder and assault) or</td>
                                  <td class="table_border" align="center" bgcolor="#FFFFFF"><input type="text"  class="form-control autonumber" name="assured2" value="<?php echo $assured2?>" style="width: 100px; margin: 4px;"></td>
                                  <td class="table_border" align="center" bgcolor="#FFFFFF"><input  type="text" class="form-control autonumber" name="spouse2" value="<?php echo $spouse2?>" style="width: 100px; margin: 4px;"></td>
                                  <td class="table_border" align="center" bgcolor="#FFFFFF"><input type="text" class="form-control autonumber" name="family_person2" value="<?php echo $family_person2?>" style="width: 100px; margin: 4px;"></td>
                                  <td class="table_border" align="center" bgcolor="#FFFFFF"><input type="text" class="form-control autonumber" name="other2" value="<?php echo $other2?>" style="width: 100px; margin: 4px;"></td>
                                  <td class="table_border" align="center" bgcolor="#FFFFFF"><input  type="text" class="form-control autonumber" name="partial_liability2" value="<?php echo $partial_liability2?>" style="width: 100px; margin: 4px;"></td>
							    </tr>
								<tr>
								  <td class="table_border" align="center" bgcolor="#FFFFFF">1.2</td>
								  <td colspan="2" align="left" bgcolor="#FFFFFF" class="table_border">การขยายความคุ้มครอง (การขับขี่หรือโดยสารรถจักรยานยนต์)<br>
							      Extended cover (Diving or riding as a passanger on a motocycle)</td>
                                  <td class="table_border" align="center" bgcolor="#FFFFFF"><input type="text" class="form-control autonumber" name="assured3" value="<?php echo $assured3?>" style="width: 100px; margin: 4px;"></td>
                                  <td class="table_border" align="center" bgcolor="#FFFFFF"><input  type="text" class="form-control autonumber" name="spouse3" value="<?php echo $spouse3?>" style="width: 100px; margin: 4px;"></td>
                                  <td class="table_border" align="center" bgcolor="#FFFFFF"><input type="text" class="form-control autonumber" name="family_person3" value="<?php echo $family_person3?>" style="width: 100px; margin: 4px;"></td>
                                  <td class="table_border" align="center" bgcolor="#FFFFFF"><input type="text" class="form-control autonumber" name="other3" value="<?php echo $other3?>" style="width: 100px; margin: 4px;"></td>
                                  <td class="table_border" align="center" bgcolor="#FFFFFF"><input  type="text" class="form-control autonumber" name="partial_liability3" value="<?php echo $partial_liability3?>" style="width: 100px; margin: 4px;"></td>
							    </tr>
								<tr>
								  <td class="table_border" align="center" bgcolor="#FFFFFF">2</td>
								  <td colspan="2" align="left" bgcolor="#FFFFFF" class="table_border">ผลประโยชน์ค่ารักษาพยาบาลเนื่องจากอุบัติเหตุ<br>
							      Medicl exoebse caused by accident</td>
                                  <td class="table_border" align="center" bgcolor="#FFFFFF"><input type="text" class="form-control autonumber" name="assured4" value="<?php echo $assured4?>" style="width: 100px; margin: 4px;"></td>
                                  <td class="table_border" align="center" bgcolor="#FFFFFF"><input  type="text" class="form-control autonumber" name="spouse4" value="<?php echo $spouse4?>" style="width: 100px; margin: 4px;"></td>
                                  <td class="table_border" align="center" bgcolor="#FFFFFF"><input type="text" class="form-control autonumber" name="family_person4" value="<?php echo $family_person4?>" style="width: 100px; margin: 4px;"></td>
                                  <td class="table_border" align="center" bgcolor="#FFFFFF"><input type="text" class="form-control autonumber" name="other4" value="<?php echo $other4?>" style="width: 100px; margin: 4px;"></td>
                                  <td class="table_border" align="center" bgcolor="#FFFFFF"><input  type="text" class="form-control autonumber" name="partial_liability4" value="<?php echo $partial_liability4?>" style="width: 100px; margin: 4px;"></td>
							    </tr>
								<tr>
								  <td class="table_border" align="center" bgcolor="#FFFFFF">6.</td>
								  <td colspan="2" align="left" bgcolor="#FFFFFF" class="table_border">การสิ้นสุดความคุ้มครองตามข้อ 10. เรื่องการสิ้นสุดความคุ้มครอง ด้วยเหตุอายุครบ</td>
                                  <td class="table_border" align="center" bgcolor="#FFFFFF"><input type="text" class="form-control autonumber" name="assured5" value="<?php echo $assured5?>" style="width: 100px; margin: 4px;"></td>
                                  <td class="table_border" align="center" bgcolor="#FFFFFF"><input  type="text" class="form-control autonumber" name="spouse5" value="<?php echo $spouse5?>" style="width: 100px; margin: 4px;"></td>
                                  <td class="table_border" align="center" bgcolor="#FFFFFF"><input type="text" class="form-control autonumber" name="family_person5" value="<?php echo $family_person5?>" style="width: 100px; margin: 4px;"></td>
                                  <td class="table_border" align="center" bgcolor="#FFFFFF"><input type="text" class="form-control autonumber" name="other5" value="<?php echo $other5?>" style="width: 100px; margin: 4px;"></td>
                                  <td class="table_border" align="center" bgcolor="#FFFFFF"><input  type="text" class="form-control autonumber" name="partial_liability5" value="<?php echo $partial_liability5?>" style="width: 100px; margin: 4px;"></td>
							    </tr>
								<tr>
								  <td class="table_border" align="center" bgcolor="#FFFFFF">3</td>
								  <td class="table_border" align="left" bgcolor="#FFFFFF">ค่าชดเชย</td>
								  <td class="table_border" align="right" bgcolor="#FFFFFF"><strong>วันละ</strong></td>
								  <td align="center" bgcolor="#FFFFFF" class="table_border"><input  type="text"  class="form-control autonumber" name="daily_compensation" id="daily_compensation" value="<?php echo $daily_compensation?>" style="width: 100px; margin: 4px;"></td>
								  <td align="center" bgcolor="#FFFFFF" class="table_border"><input  type="text"  class="form-control autonumber" name="daily_compensation2" id="daily_compensation2" value="<?php echo $daily_compensation2?>" style="width: 100px; margin: 4px;"></td>
								  <td align="center" bgcolor="#FFFFFF" class="table_border"><input  type="text"  class="form-control autonumber" name="daily_compensation3" id="daily_compensation3" value="<?php echo $daily_compensation3?>" style="width: 100px; margin: 4px;"></td>
								  <td align="center" bgcolor="#FFFFFF" class="table_border"><input  type="text"  class="form-control autonumber" name="daily_compensation4" id="daily_compensation4" value="<?php echo $daily_compensation4?>" style="width: 100px; margin: 4px;"></td>
								  <td align="center" bgcolor="#FFFFFF" class="table_border"><input  type="text"  class="form-control autonumber" name="daily_compensation5" id="daily_compensation5" value="<?php echo $daily_compensation5?>" style="width: 100px; margin: 4px;"></td>
							    </tr>
								
							  </tbody>
							</table>
					  </div>
		  </div>
                  
			
			
           <p>&nbsp;</p>
                    
             <div class="form-group">
                           
                         
					<label class="col-sm-2 control-label no-padding-right">เบี้ยประกันภัยนี้ มีการปรับเบี้ยประกันภัยตามอายุ</label>
					<div class="col-sm-2">
						<label>
                                                    <input name="insurance_price" id="insurance_price" type="radio" class="ace" value="1" <?php if($insurance_price=='1'){echo "checked";}?> <?php echo $txtDisable?>/>
							&nbsp;
							<span class="lbl">&nbsp;ไม่มี</span>
					</label>
					</div>  
					<div class="col-sm-8">
						<label>
                                                    <input name="insurance_price" id="insurance_price" type="radio" class="ace" value="2" <?php if($insurance_price=='2'){echo "checked";}?>  <?php echo $txtDisable?>/>
							&nbsp;
							<span class="lbl">&nbsp;มี (ถ้ามีให้ระบุไว้ในเอกสารแนบกรมธรรม์ประกันภัย)</span>
					</label>
					</div>  
					
			</div>
                    
            <div class="form-group">
                           
                         
					<label class="col-sm-2 control-label no-padding-right">งวดการชำระเบี้ยประกันภัย </label>
<div class="col-sm-2">
						<label>
                                                    <input name="installment" id="installment1" type="radio" class="ace" value="1"  <?php if($installment=='1'){echo "checked";}?>  <?php echo $txtDisable?>/>
							&nbsp;
							<span class="lbl">&nbsp;รายเดือน</span>
					</label>
					</div>  
<div class="col-sm-2">
						<label>
                                                    <input name="installment" id="installment2" type="radio" class="ace" value="2" <?php if($installment=='2'){echo "checked";}?>  <?php echo $txtDisable?>/>
							&nbsp;
							<span class="lbl">&nbsp;รายปี</span>
					</label>
					</div>  
<div class="col-sm-2">
						<label>
                                                    <input name="installment" id="installment3" type="radio" class="ace" value="3" <?php if($installment=='3'){echo "checked";}?> <?php echo $txtDisable?>/>
							&nbsp;
							<span class="lbl">&nbsp;ชำระครั้งเดียว</span>
					</label>
					</div>  
					<div class="col-sm-4">
						<label>
                                                    <input name="installment" id="installment4" type="radio" class="ace" value="4" <?php if($installment=='4'){echo "checked";}?>  <?php echo $txtDisable?>/>
							&nbsp;
							<span class="lbl">&nbsp;ชำระครั้งเดียวแบ่งจ่าย 6 งวด</span>
					</label>
					</div>  
					
				</div>
                    
                    
           <p>&nbsp;</p>
			<div class="form-group row">
					<label class="col-sm-12 control-label no-padding-right"><strong>เบี้ยประกันภัยสุทธิต่องวด</strong></label>
                                                        </div>
			<div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">เบี้ยสุทธิต่องวด (บาท)</label>

					<div class="col-sm-2">
						<span>
                                                    <input  name="totalprice_installment" type="text"  class="form-control autonumber" id="totalprice_installment" placeholder=""   value="<?php echo $totalprice_installment?>" />
						  </span>
					</div>  
				</div>
			<div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">อากรแสตมป์ (บาท)</label>

					<div class="col-sm-2">
						<span>
                                                    <input  name="revenue_stamp" type="text"  class="form-control autonumber" id="revenue_stamp" placeholder=""   value="<?php echo $revenue_stamp?>" />
						  </span>
					</div>  
				</div>
			<div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">ภาษี (บาท)</label>

					<div class="col-sm-2">
						<span>
                                                    <input  name="tax"  type="text" class="form-control autonumber" id="tax" placeholder=""   value="<?php echo $tax?>" />
						  </span>
					</div>  
				</div>
			<div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">เบี้ยประกันภัยรวม (บาท)</label>

					<div class="col-sm-2">
						<span>
                                                    <input  name="total_price"  type="text" class="form-control autonumber" id="total_price" placeholder=""   value="<?php echo $total_price?>" />
						  </span>
					</div>  
				</div>
			<div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">ส่วนลด (บาท)</label>

					<div class="col-sm-2">
						<span>
                                                    <input  name="insurance_discount"  type="text" class="form-control autonumber" id="insurance_discount" placeholder=""   value="<?php echo $insurance_discount?>" />
						  </span>
					</div>  
				</div>
			<div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">ทุนประกัน (บาท)</label>

					<div class="col-sm-2">
						<span>
                                 <input name="insurance_limit" type="text"  class="form-control autonumber" id="insurance_limit" placeholder="" value="<?php echo $insurance_limit?>" />
						  </span>
					</div>
					<label class="col-sm-1 control-label no-padding-right">ค่ารักษา (บาท)</label>
					<div class="col-sm-2"> 
						<input name="treatment_costs" type="text" id="treatment_costs" class="form-control autonumber" placeholder="" value="<?php echo $treatment_costs?>" />
					</div>  
				</div>
			<div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">ยอดชำระ (บาท)</label>

					<div class="col-sm-2">
						<span>
                                 <input name="payment_amount"  type="text" class="form-control autonumber" id="payment_amount" placeholder="" value="<?php echo $payment_amount?>" />
							   
						  </span>
					</div>  
				</div>
			
			<p>&nbsp;</p>
			<div class="form-group row">
					<label class="col-sm-12 control-label no-padding-right"><strong>เอกสารแนบท้าย/ใบสลักหลัง</strong></label>

					
				</div>
			<div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">กรมธรรม์ประกันภัยที่แนบติด</label>

					<div class="col-sm-2">
						<span>
                                                    <input  name="attach" type="text" id="attach" placeholder=""   value="<?php echo $attach?>" />
						  </span>
					</div>  
				</div>
			
                    <div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">วันทำสัญญาประกันภัย</label>

					<div class="col-sm-10">
						<span><?php echo $contract_startdate." ".$contract_enddate?>
                                                    <input name="contract_startdate" id="contract_startdate" type="text" class=" date-picker"  data-provide="datepicker" data-date-language="th-th"   value="<?php echo $contract_startdate?>" <?php echo $txtDisable?>/>
						  </span>
					</div>  
				</div>
                    <div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">วันออกกรมธรรม์ประกันภัย</label>

					<div class="col-sm-2">
						<span>
                                                    <input name="contract_enddate" id="contract_enddate" type="text" class=" date-picker"  data-provide="datepicker" data-date-language="th-th"   value="<?php echo $contract_enddate?>" <?php echo $txtDisable?>/>
						  </span>
					</div>  
                                        
				</div>
			
			
	  <div class="form-group row">
		  <label class="col-sm-2 control-label no-padding-right">ตัวแทน</label>
		  <div class="col-sm-2">
						<label>
                                                    <input name="type_work" id="type_work" type="radio" class="ace" value="1" <?php if($type_work=='1'){echo "checked";}?>  <?php echo $txtDisable?>/>
							&nbsp;
							<span class="lbl">&nbsp;งานตรง</span>
					</label>
					</div>  
              <div class="col-sm-2">
						<label>
                                                    <input name="type_work" id="type_work2" type="radio" class="ace" value="2"  <?php if($type_work=='2'){echo "checked";}?> <?php echo $txtDisable?>/>
							&nbsp;
							<span class="lbl">&nbsp;ตัวแทน</span>
					</label>
					</div>  
              <div class="col-sm-2">
						<label>
                                                    <input name="type_work" id="type_work2" type="radio" class="ace" value="3"  <?php if($type_work=='3'){echo "checked";}?> <?php echo $txtDisable?>/>
							&nbsp;
							<span class="lbl">&nbsp;นายหน้าประกันภัยรายนี้</span>
					</label>
					</div>  
              <div class="col-sm-4">
						<label>
                                                    <input name="broker_name" id="broker_name" type="text" value="<?php echo $broker_name?>"  <?php echo $txtDisable?>/>
							
					</label>
					</div>  
				</div>		
			
			
                    
                    
                    
			
                        <div class="form-group row">
					<label class="col-sm-2 control-label no-padding-right">ใบอนุญาตเลขที่</label>

                                        <div class="col-sm-10" style=" margin-top: 5px;">
						<span>
                                                    <input name="license_number" type="text" id="license_number"   value="<?php echo $license_number?>" />
								
						  </span>
					</div>  
				</div>
			
				
		</div>
	</div>

	