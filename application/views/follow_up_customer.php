<?php $data=$result['insuranceData'];  ?>
<?php //echo 'data_type>'.$data_type?>
<style>
	.fixHeight{
		padding-top: 5px;
		padding-bottom: 5px;
	}
	.rightBorderRed{
		border-right-color:#9E9E9E;
		border-right-style: solid;
		border-right-width: 3px;
	}
	
	.btBorder{
		border-bottom-style: solid;
		border-bottom-width: 1px;
		border-bottom-color: #CBCBCB;
		
	}
</style>
<?php if($data_type=='5'){ ?>
<div class="row">
		<div class="col-md-8 rightBorderRed" >
			<div class="col-12"><h3 align="center">ข้อมูลประกันภัยบ้าน</h3></div>
			<div class="row fixHeight">
			<label class="col-md-3">ชื่อบริษัท</label>
			<label class="col-md-9 text-primary"><?php echo $data->company_name?></label>
			</div>
			<div class="row fixHeight">
				<label class="col-md-3">เลขที่กรมธรรม์</label>
				<label class="col-md-9 text-primary" ><?php echo $data->policy_number?></label>
			</div>
			<div class="row fixHeight">
				<label class="col-md-3">ชื่อ-นามสกุลผู้เอาประกัน</label>
				<label class="col-md-4 text-primary"><?php echo $data->cust_name?></label>
				<label class="col-md-2">  เบอร์โทร  </label>
				<label class="col-md-3 text-primary"><?php echo $data->tel1;?></label>
			</div>
			<div class="row fixHeight">
			<label class="col-md-2">ชื่อเล่น</label>
			<label class="col-md-4  text-primary"><?php echo $data->cust_nickname?></label>
			<label class="col-md-2">ตัวแทน</label>
			<label class="col-md-4  text-primary"><?php echo $data->agent_name?></label>
			
			</div>
			<div class="row fixHeight">
			<label class="col-md-2">วันคุ้มครอง</label>
			<div class="col-md-4  text-primary"><?php echo $this->insurance_model->translateDateToThai($data->insurance_start)?></div>
			<label class="col-md-2">สิ้นสุด</label>
			<div class="col-md-4  text-primary"><?php echo $this->insurance_model->translateDateToThai($data->insurance_end)?></div>
		</div>
		<div class="row fixHeight">
			<label class="col-md-2">ทุนประกัน</label>
			<label class="col-md-4 text-primary"><?php echo number_format($data->insurance_limit,2)?></label>
			<label class="col-md-2">เบี้ยรวม</label>
			<label class="col-md-4 text-primary"><?php echo number_format($data->total_price,2)?></label>
		</div>
		<div class="row fixHeight">
			<label class="col-md-2">เบี้ยชำระ</label>
			<label class="col-md-10 text-primary"><?php echo number_format($data->payment_amount,2)?></label>
		</div>	
		<div class="row fixHeight">
			<label class="col-md-4">สถานที่เอาประกันภัย</label>
			<label class="col-md-8 text-primary"><?php echo $data->location_insured?></label>
		</div>	
			<div class="row fixHeight">
				<div class="col-md-12 text-primary">	
			 <textarea class="form-control" placeholder="เพิ่มโน๊ตส่งลูกค้า" onChange="updateNote('<?php echo $data->work_id?>',this.value)"><?php echo $data->note_to_customer?></textarea>
			</div> 
		</div>
	</div>
	<div class="col-md-4" style="" >
		<form id="followForm" name="followForm" method="post">
	     <div class="col-12"><h3 align="center">ใบเตือนต่ออายุ</h3></div>
		
		<div class="row fixHeight">
		  <div class="col-md-4">ทุนประกัน</div>
			<div class="col-md-8"><input name="sum_insured" type="text" class="form-control autonumber" id="sum_insured" value="<?php echo $result['follow']['follow_sum_insured']?>"></div>
		</div>
		<div class="row fixHeight">
		  <div class="col-md-4">เบี้ยรวมกรมธรรม์</div>
			<div class="col-md-8"><input name="insurance_price" type="text" class="form-control autonumber" id="insurance_price" value="<?php echo $result['follow']['follow_insurance_price']?>"></div>
		</div>	
		
		<?php for($i=1;$i<=5;$i++){ 
				$iname = "folow_".$i;
			?>
		<div class="row fixHeight">
			<div class="col-md-4">โน๊ตตามครั้งที่ <?php echo $i?></div>
			<div class="col-md-8">&nbsp;</div>
		</div>
		<div class="row" s>
			<input type="text" id="folow_<?php echo $i?>" name="folow_<?php echo $i?>" value="<?php echo $result['follow'][$iname]?>"  class="form-control">
		</div>
		<div class="row" style="padding: 10px;"></div>
		<?php }?>
		<div style="clear: both"></div>
		<div class="col-12" align="center">
		    <input type="hidden" name="followID" id="followID" value="<?php echo $result['follow']['followID']?>">
		    <input type="hidden" name="work_id" id="work_id" value="<?php echo $data->work_id?>">
		    <input type="hidden" name="followCount" id="followCount" value="<?php echo $i-1;?>">
		    <input type="hidden" name="data_type" id="data_type" value="<?php echo $data_type?>">
			<button type="button" class="btn btn-sm btn-success" onClick="updateFollow()">บันทีกข้อมูล</button>
			<div align="center" id="shownoti" class="fixHeight"></div>
		</div>
	</form>
		</div>
</div>	
<?php }?>
<?php if($data_type=='4'){ ?>
<div class="row">
		<div class="col-md-8 rightBorderRed" >
			<div class="col-12"><h3 align="center">ข้อมูลประกันอุบัติเหตุ</h3></div>
			<div class="row fixHeight">
			<label class="col-md-3">ชื่อบริษัท</label>
			<label class="col-md-9 text-primary"><?php echo $data->company_name?></label>
			</div>
			<div class="row fixHeight">
				<label class="col-md-3">เลขที่กรมธรรม์</label>
				<label class="col-md-9 text-primary" ><?php echo $data->policy_number?></label>
			</div>
			<div class="row fixHeight">
				<label class="col-md-3">ชื่อ-นามสกุลผู้เอาประกัน</label>
				<label class="col-md-4 text-primary"><?php echo $data->cust_name?></label>
				<label class="col-md-2">  เบอร์โทร  </label>
				<label class="col-md-3 text-primary"><?php echo $data->tel1;?></label>
			</div>
			<div class="row fixHeight">
			<label class="col-md-2">ชื่อเล่น</label>
			<label class="col-md-4  text-primary"><?php echo $data->cust_nickname?></label>
			<label class="col-md-2">ตัวแทน</label>
			<label class="col-md-4  text-primary"><?php echo $data->agent_name?></label>
			
			</div>
			<div class="row fixHeight">
			<label class="col-md-2">วันคุ้มครอง</label>
			<div class="col-md-4  text-primary"><?php echo $this->insurance_model->translateDateToThai($data->insurance_start)?></div>
			<label class="col-md-2">สิ้นสุด</label>
			<div class="col-md-4  text-primary"><?php echo $this->insurance_model->translateDateToThai($data->insurance_end)?></div>
		</div>
		<div class="row fixHeight">
			<label class="col-md-2">ทุนประกัน</label>
			<label class="col-md-4 text-primary"><?php echo number_format($data->totalprice_installment,2)?></label>
			<label class="col-md-2">ค่ารักษา</label>
			<label class="col-md-4 text-primary"><?php echo number_format($data->treatment_costs,2)?></label>
		</div>
		<div class="row fixHeight">
			<label class="col-md-2">เบี้ยรวม</label>
			<label class="col-md-4 text-primary"><?php echo number_format($data->total_price,2)?></label>
			<label class="col-md-2">เบี้ยชำระ</label>
			<label class="col-md-4 text-primary"><?php echo number_format($data->payment_amount,2)?></label>
		</div>	
		<div class="row fixHeight">
				<div class="col-md-12 text-primary">	
			 <textarea class="form-control" placeholder="เพิ่มโน๊ตส่งลูกค้า" onChange="updateNote('<?php echo $data->work_id?>',this.value)"><?php echo $data->note_to_customer?></textarea>
			</div> 
		</div>
	</div>
	<div class="col-md-4" style="" >
		<form id="followForm" name="followForm" method="post">
	     <div class="col-12"><h3 align="center">ใบเตือนต่ออายุ</h3></div>
		
		<div class="row fixHeight">
		  <div class="col-md-4">ทุนประกัน</div>
			<div class="col-md-8"><input name="sum_insured" type="text" class="form-control autonumber" id="sum_insured" value="<?php echo $result['follow']['follow_sum_insured']?>"></div>
		</div>
		<div class="row fixHeight">
		  <div class="col-md-4">เบี้ยรวมกรมธรรม์</div>
			<div class="col-md-8"><input name="insurance_price" type="text" class="form-control autonumber" id="insurance_price" value="<?php echo $result['follow']['follow_insurance_price']?>"></div>
		</div>	
		
		<?php for($i=1;$i<=5;$i++){ 
				$iname = "folow_".$i;
			?>
		<div class="row fixHeight">
			<div class="col-md-4">โน๊ตตามครั้งที่ <?php echo $i?></div>
			<div class="col-md-8">&nbsp;</div>
		</div>
		<div class="row" s>
			<input type="text" id="folow_<?php echo $i?>" name="folow_<?php echo $i?>" value="<?php echo $result['follow'][$iname]?>"  class="form-control">
		</div>
		<div class="row" style="padding: 10px;"></div>
		<?php }?>
		<div style="clear: both"></div>
		<div class="col-12" align="center">
		    <input type="hidden" name="followID" id="followID" value="<?php echo $result['follow']['followID']?>">
		    <input type="hidden" name="work_id" id="work_id" value="<?php echo $data->work_id?>">
		    <input type="hidden" name="followCount" id="followCount" value="<?php echo $i-1;?>">
		    <input type="hidden" name="data_type" id="data_type" value="<?php echo $data_type?>">
			<button type="button" class="btn btn-sm btn-success" onClick="updateFollow()">บันทีกข้อมูล</button>
			<div align="center" id="shownoti" class="fixHeight"></div>
		</div>
	</form>
		</div>
</div>		
<?php }?>
<?php if($data_type=='3'){ ?>
<div class="row">
		<div class="col-md-8 rightBorderRed" >
			<div class="col-12"><h3 align="center">ข้อมูลประกันขนส่ง</h3></div>
			<div class="row fixHeight">
			<label class="col-md-3">ชื่อบริษัท</label>
			<label class="col-md-9 text-primary"><?php echo $data->company_name?></label>
			</div>
			<div class="row fixHeight">
				<label class="col-md-3">เลขที่กรมธรรม์</label>
				<label class="col-md-9 text-primary" ><?php echo $data->policy_number?></label>
			</div>
			<div class="row fixHeight">
				<label class="col-md-3">ชื่อ-นามสกุลผู้เอาประกัน</label>
				<label class="col-md-4 text-primary"><?php echo $data->cust_name?></label>
				<label class="col-md-2">  เบอร์โทร  </label>
				<label class="col-md-3 text-primary"><?php echo $data->tel1;?></label>
			</div>
			<div class="row fixHeight">
			<label class="col-md-2">ชื่อเล่น</label>
			<label class="col-md-4  text-primary"><?php echo $data->cust_nickname?></label>
			<label class="col-md-2">ตัวแทน</label>
			<label class="col-md-4  text-primary"><?php echo $data->agent_name?></label>
			
			</div>
			<div class="row fixHeight">
			<label class="col-md-2">วันคุ้มครอง</label>
			<div class="col-md-4  text-primary"><?php echo $this->insurance_model->translateDateToThai($data->insurance_start)?></div>
			<label class="col-md-2">สิ้นสุด</label>
			<div class="col-md-4  text-primary"><?php echo $this->insurance_model->translateDateToThai($data->insurance_end)?></div>
		</div>
		<div class="row fixHeight">
			<label class="col-md-2">ทุนประกัน</label>
			<label class="col-md-4 text-primary"><?php echo number_format($data->insurance_limit,2)?></label>
			<label class="col-md-2"> </label>
			<label class="col-md-4 text-primary"> </label>
		</div>
		<div class="row fixHeight">
			<label class="col-md-2">เบี้ยรวม</label>
			<label class="col-md-4 text-primary"><?php echo number_format($data->total_price,2)?></label>
			<label class="col-md-2">เบี้ยชำระ</label>
			<label class="col-md-4 text-primary"><?php echo number_format($data->payment_amount,2)?></label>
		</div>	
		<div class="row fixHeight">
				<div class="col-md-12 text-primary">	
			 <textarea class="form-control" placeholder="เพิ่มโน๊ตส่งลูกค้า" onChange="updateNote('<?php echo $data->work_id?>',this.value)"><?php echo $data->note_to_customer?></textarea>
			</div> 
		</div>
	</div>
	<div class="col-md-4" style="" >
		<form id="followForm" name="followForm" method="post">
	     <div class="col-12"><h3 align="center">ใบเตือนต่ออายุ</h3></div>
		<div class="row fixHeight">
		  <div class="col-md-4">ชื่อบริษัท</div>
			<div class="col-md-8"><?php echo $data->company_name?></div>
		</div>
		<div class="row fixHeight">
		  <div class="col-md-4">ทุนประกัน</div>
			<div class="col-md-8"><input name="sum_insured" type="text" class="form-control autonumber" id="sum_insured" value="<?php echo $result['follow']['follow_sum_insured']?>"></div>
		</div>
		<div class="row fixHeight">
		  <div class="col-md-4">เบี้ยรวมกรมธรรม์</div>
			<div class="col-md-8"><input name="insurance_price" type="text" class="form-control autonumber" id="insurance_price" value="<?php echo $result['follow']['follow_insurance_price']?>"></div>
		</div>	
		
		<?php for($i=1;$i<=5;$i++){ 
				$iname = "folow_".$i;
			?>
		<div class="row fixHeight">
			<div class="col-md-4">โน๊ตตามครั้งที่ <?php echo $i?></div>
			<div class="col-md-8">&nbsp;</div>
		</div>
		<div class="row" s>
			<input type="text" id="folow_<?php echo $i?>" name="folow_<?php echo $i?>" value="<?php echo $result['follow'][$iname]?>"  class="form-control">
		</div>
		<div class="row" style="padding: 10px;"></div>
		<?php }?>
		<div style="clear: both"></div>
		<div class="col-12" align="center">
		    <input type="hidden" name="followID" id="followID" value="<?php echo $result['follow']['followID']?>">
		    <input type="hidden" name="work_id" id="work_id" value="<?php echo $data->work_id?>">
		    <input type="hidden" name="followCount" id="followCount" value="<?php echo $i-1;?>">
		    <input type="hidden" name="data_type" id="data_type" value="<?php echo $data_type?>">
			<button type="button" class="btn btn-sm btn-success" onClick="updateFollow()">บันทีกข้อมูล</button>
			<div align="center" id="shownoti" class="fixHeight"></div>
		</div>
	</form>
		</div>
</div>	
<?php }?>
<?php if($data_type=='2'){ ?>
	<div class="row">
		<div class="col-md-8 rightBorderRed" >
			<div class="col-12"><h3 align="center">ข้อมูลประกันท่องเที่ยว</h3></div>
			<div class="row fixHeight">
			<label class="col-md-3">ชื่อบริษัท</label>
			<label class="col-md-9 text-primary"><?php echo $data->company_name?></label>
			</div>
			<div class="row fixHeight">
				<label class="col-md-3">เลขที่กรมธรรม์</label>
				<label class="col-md-9 text-primary" ><?php echo $data->policy_number?></label>
			</div>
			<div class="row fixHeight">
				<label class="col-md-3">ชื่อ-นามสกุลผู้เอาประกัน</label>
				<label class="col-md-4 text-primary"><?php echo $data->cust_name?></label>
				<label class="col-md-2">  เบอร์โทร  </label>
				<label class="col-md-3 text-primary"><?php echo $data->tel1;?></label>
			</div>
			<div class="row fixHeight">
			<label class="col-md-2">ชื่อเล่น</label>
			<label class="col-md-4  text-primary"><?php echo $data->cust_nickname?></label>
			<label class="col-md-2">ตัวแทน</label>
			<label class="col-md-4  text-primary"><?php echo $data->agent_name?></label>
			
			</div>
			<div class="row fixHeight">
			<label class="col-md-2">วันคุ้มครอง</label>
			<div class="col-md-4  text-primary"><?php echo $this->insurance_model->translateDateToThai($data->insurance_start)?></div>
			<label class="col-md-2">สิ้นสุด</label>
			<div class="col-md-4  text-primary"><?php echo $this->insurance_model->translateDateToThai($data->insurance_end)?></div>
		</div>
		<div class="row fixHeight">
			<label class="col-md-2">ทุนประกัน</label>
			<label class="col-md-4 text-primary"><?php echo number_format($data->totalprice_installment,2)?></label>
			<label class="col-md-2">ค่ารักษา</label>
			<label class="col-md-4 text-primary"><?php echo number_format($data->medical_accident,2)?></label>
		</div>
		<div class="row fixHeight">
			<label class="col-md-2">เบี้ยรวม</label>
			<label class="col-md-4 text-primary"><?php echo number_format($data->Insurance_price_total,2)?></label>
			<label class="col-md-2">เบี้ยชำระ</label>
			<label class="col-md-4 text-primary"><?php echo number_format($data->payment_amount,2)?></label>
		</div>	
		<div class="row fixHeight">
				<div class="col-md-12 text-primary">	
			 <textarea class="form-control" placeholder="เพิ่มโน๊ตส่งลูกค้า" onChange="updateNote('<?php echo $data->work_id?>',this.value)"><?php echo $data->note_to_customer?></textarea>
			</div> 
		</div>
	</div>
	<div class="col-md-4" style="" >
		<form id="followForm" name="followForm" method="post">
	     <div class="col-12"><h3 align="center">ใบเตือนต่ออายุ</h3></div>
		
		<div class="row fixHeight">
		  <div class="col-md-4">ทุนประกัน</div>
			<div class="col-md-8"><input name="sum_insured" type="text" class="form-control autonumber" id="sum_insured" value="<?php echo $result['follow']['follow_sum_insured']?>"></div>
		</div>
		<div class="row fixHeight">
		  <div class="col-md-4">เบี้ยรวมกรมธรรม์</div>
			<div class="col-md-8"><input name="insurance_price" type="text" class="form-control autonumber" id="insurance_price" value="<?php echo $result['follow']['follow_insurance_price']?>"></div>
		</div>	
		
		<?php for($i=1;$i<=5;$i++){ 
				$iname = "folow_".$i;
			?>
		<div class="row fixHeight">
			<div class="col-md-4">โน๊ตตามครั้งที่ <?php echo $i?></div>
			<div class="col-md-8">&nbsp;</div>
		</div>
		<div class="row" s>
			<input type="text" id="folow_<?php echo $i?>" name="folow_<?php echo $i?>" value="<?php echo $result['follow'][$iname]?>"  class="form-control">
		</div>
		<div class="row" style="padding: 10px;"></div>
		<?php }?>
		<div style="clear: both"></div>
		<div class="col-12" align="center">
		    <input type="hidden" name="followID" id="followID" value="<?php echo $result['follow']['followID']?>">
		    <input type="hidden" name="work_id" id="work_id" value="<?php echo $data->work_id?>">
		    <input type="hidden" name="followCount" id="followCount" value="<?php echo $i-1;?>">
		    <input type="hidden" name="data_type" id="data_type" value="<?php echo $data_type?>">
			<button type="button" class="btn btn-sm btn-success" onClick="updateFollow()">บันทีกข้อมูล</button>
			<div align="center" id="shownoti" class="fixHeight"></div>
		</div>
	</form>
		</div>
</div>
<?php }?>
<?php if($data_type=='1'){ 
		 
?>
<div class="row">
	<div class="col-md-8 rightBorderRed" >
		<div class="col-12"><h3 align="center">ข้อมูลประกันภัยรถยนต์</h3></div>
	    <div class="row fixHeight">
			<label class="col-md-3">ชื่อบริษัท</label>
			<label class="col-md-9 text-primary"><?php echo $result['insuranceData']->company_name?></label>
		</div>
	    <div class="row fixHeight">
			<label class="col-md-3">เลขที่กรมธรรม์</label>
			<label class="col-md-9 text-primary" ><?php echo $result['insuranceData']->insurance_no?></label>
		</div>
		<div class="row fixHeight">
			<label class="col-md-3">ชื่อ-นามสกุลผู้เอาประกัน</label>
			<label class="col-md-4 text-primary"><?php echo $result['insuranceData']->cust_name?></label>
			<label class="col-md-2">  ป้ายทะเบียน  </label>
			<label class="col-md-3 text-primary"><?php echo $result['insuranceData']->vehicle_regis." ".$result['insuranceData']->province_name?></label>
		</div>

		<div class="row fixHeight">
			<label class="col-md-2">ชื่อเล่น</label>
			<label class="col-md-2  text-primary"><?php echo $result['insuranceData']->cust_nickname?></label>
			<label class="col-md-1">ตัวแทน</label>
			<label class="col-md-2  text-primary"><?php echo $data->agent_name?></label>
			<label class="col-md-2">เบอร์โทร</label>
			<label class="col-md-3  text-primary"><?php echo $data->cust_telephone_1; if($data->cust_telephone_2!=''){ echo " <br>,".$data->cust_telephone_2; }?></label>
		</div>
		
		<div class="row fixHeight">
			<label class="col-md-2">วันคุ้มครอง</label>
			<div class="col-md-4  text-primary"><?php echo $this->insurance_model->translateDateToThai($data->insurance_start)?></div>
			<label class="col-md-2">สิ้นสุด</label>
			<div class="col-md-4  text-primary"><?php echo $this->insurance_model->translateDateToThai($data->insurance_end)?></div>
		</div>
		<div class="row fixHeight">
			
			<div class="col-md-3" style="padding-left: 50px;"> 
				<?php if($data->insurance_fix_garace=='2'){ echo "<i class='fa fa-check'> </i>";}?>  ซ่อมอุ่ </div>  
			<div class="col-md-2" style="padding-left: 5px;"> 
				<?php if($data->insurance_fix_garace=='1'){ echo "<i class='fa fa-check'> </i>";}?> ซ่อมห้าง   </div>
			<label class="col-md-7">ประเภท&nbsp;&nbsp;<span class="text-primary"><?php echo $data->insurance_type_name?></span></label>
			
		</div>
		<div class="row fixHeight">
			<label class="col-md-2">ทุนประกัน</label>
			<label class="col-md-4 text-primary"><?php echo number_format($data->sum_insured,2)?></label>
			<label class="col-md-2">เบี้ยรวม</label>
			<label class="col-md-4 text-primary"><?php echo number_format($data->insurance_price,2)?></label>
		</div>
		<div class="row fixHeight">
			<label class="col-md-2">เบี้ยชำระ</label>
			<label class="col-md-10 text-primary"><?php echo number_format($data->insurance_total,2)?></label>
		</div>
		<div style="clear: both"></div>
		<div class="row fixHeight">
			<label class="col-md-2">พ.ร.บ.</label>
			<label class="col-md-2">วันคุ้มครอง</label>
			<label class="col-md-3 text-primary"><?php echo $this->insurance_model->translateDateToThai($data->act_date_start)?></label>
			<label class="col-md-2">สิ้นสุด</label>
			<label class="col-md-3 text-primary"><?php echo $this->insurance_model->translateDateToThai($data->act_date_end)?></label>
		</div>
		<div class="row fixHeight">
			<label class="col-md-2">เบี้ยรวม</label>
			<label class="col-md-4 text-primary"><?php echo number_format($data->act_price,2)?></label>
			<label class="col-md-2">เบี้ยชำระ</label>
			<label class="col-md-4 text-primary"><?php echo number_format($data->act_price_total,2)?></label>
		</div>
			<div class="row fixHeight">
			<label class="col-md-2">ค่าภาษี</label>
			<label class="col-md-2">วันภาษีหมด</label>
			<label class="col-md-3 text-primary"><?php echo $this->insurance_model->translateDateToThai($data->date_registration_end)?></label>
			<label class="col-md-2">ค่าภาษี</label>
			<label class="col-md-3 text-primary"><?php echo number_format($data->tax_price,2)?></label>
		</div>
		<div class="row fixHeight">
			<label class="col-md-2">ค่าตรวจรถ</label>
			<label class="col-md-10 text-primary"><?php echo number_format($data->car_check_price,2)?></label>
		</div>
		<div class="row fixHeight">
			<div class="col-md-6" style="text-align: center">
				<?php if($data->countInstallment==0){ ?><i class="fa fa-check"></i><?php }?>&nbsp;สด 
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<?php if($data->countInstallment > 0){ ?><i class="fa fa-check"></i><?php }?>&nbsp;ผ่อน  <?php if($data->countInstallment > 0){ echo $data->countInstallment." งวด"; } ?> </div>
			<div class="col-md-6" style="text-align: left">
				   ยอดชำระรวม 
				<span class="text-primary">
				<?php echo number_format(($data->insurance_total+$data->act_price_total+$data->tax_price+$data->car_check_price),2);?> 
				</span>&nbsp;&nbsp;&nbsp;
			<span class=" text-primary"></span>
			
			</div>
		</div>
		<div class="row fixHeight">
				<div class="col-md-12 text-primary">	
			 <textarea class="form-control" placeholder="เพิ่มโน๊ตส่งลูกค้า" onChange="updateNote('<?php echo $data->work_id?>',this.value)"><?php echo $data->note_to_customer?></textarea>
			</div> 
		</div>
	</div>
	
	
	<div class="col-md-4" style="" >
		<form id="followForm" name="followForm" method="post">
	     <div class="col-12"><h3 align="center">ใบเตือนต่ออายุ</h3></div>
		<div class="row fixHeight">
		  <div class="col-md-4">ชื่อบริษัท</div>
			<div class="col-md-8"><?php echo $data->company_name?></div>
		</div>
		<div class="row fixHeight">
			<div class="col-md-4">ประเภท</div>
			<div class="col-md-8">
			<select name="insurance_type" class="form-select" id="insurance_type" aria-label="">
			<option value="x">เลือกประเภท</option>
		<?php foreach($listInsType AS $insType){?>
			<option value="<?php echo $insType->id?>" <?php if($insType->id==$result['follow']['insurance_type_id']){ echo "selected";}?> ><?php echo $insType->insurance_type_name?></option>
		<?php }?>
			</select>
			
			</div>
		</div>
		<div class="row fixHeight">
		  <div class="col-md-4">ทุน</div>
			<div class="col-md-8"><input name="sum_insured" type="text" class="form-control autonumber" id="sum_insured" value="<?php echo $result['follow']['follow_sum_insured']?>" ></div>
		</div>
		<div class="row fixHeight">
		  <div class="col-md-4">เบี้ยกรมธรรม์รวม</div>
			<div class="col-md-8"><input name="insurance_price" type="text" class="form-control autonumber" id="insurance_price" value="<?php echo $result['follow']['follow_insurance_price']?>" onChange="sumTotal()" ></div>
		</div>	
		<div class="row fixHeight">
		  <div class="col-md-4">เบี้ย พ.ร.บ. รวม</div>
			<div class="col-md-8"><input name="act_price" type="text" class="form-control autonumber" id="act_price" value="<?php echo $result['follow']['follow_act_price']?>" onChange="sumTotal()" ></div>
		</div>
		<div class="row fixHeight">
		  <div class="col-md-4">เบี้ยรวมทั้งหมด</div>
			<div class="col-md-8"><input name="insurance_total" type="text" class="form-control autonumber" id="insurance_total" value="<?php echo $result['follow']['insurance_total']?>"></div>
		</div>
		<?php for($i=1;$i<=5;$i++){ 
				$iname = "folow_".$i;
			?>
		<div class="row fixHeight">
			<div class="col-md-4">โน๊ตตามครั้งที่ <?php echo $i?></div>
			<div class="col-md-8">&nbsp;</div>
		</div>
		<div class="row" s>
			<input type="text" id="folow_<?php echo $i?>" name="folow_<?php echo $i?>" value="<?php echo $result['follow'][$iname]?>"  class="form-control">
		</div>
		<div class="row" style="padding: 10px;"></div>
		<?php }?>
		<div style="clear: both"></div>
		
		<div style="clear: both"></div>
		<div class="col-12" align="center">
		    <input type="hidden" name="followID" id="followID" value="<?php echo $result['follow']['followID']?>" >
		    <input type="hidden" name="work_id" id="work_id" value="<?php echo $data->id?>">
		    <input type="hidden" name="followCount" id="followCount" value="<?php echo $i-1;?>">
		    <input type="hidden" name="data_type" id="data_type" value="<?php echo $data_type?>">
			<button type="button" class="btn btn-sm btn-success" onClick="updateFollow()">บันทีกข้อมูล</button>
			<div align="center" id="shownoti" class="fixHeight"></div>
		</div>
	</form>
		</div>
		 
		
</div>
<?php }?>
<script>
	
	
	$(function($) {

		$('.autonumber').autoNumeric('init');
		
	 });
</script>