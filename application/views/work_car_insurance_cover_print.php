<!doctype html>
<html>
<head>
	
	<?php include("header.php"); ?>
	<style>
		@media print {
			 margin: 0; 
			body {		
				background-color: #fff;				
				zoom:80%;}
			
			@page { 
				size: a5;
				/*size: a5 landscape;
				size: landscape;*/
			}
			.table .tr .td {
				font-size: 16px;
			}
		}
		
		
	</style>
</head>									
<body>
	<!--<div style="text-align: center; border: 2px solid #000;">
		<h4><span style="font-weight: 800;">ตรอ. ทรัพย์เจริญเซอร์วิส (แยกโรงปูน)</span><br>
		จันทร์-เสาร์  08.00-16.30 น.<br>
	  โทร. 074-244952 / 094-3566924</h4>
	</div>-->
	
	<div style="text-align: center; border: 2px solid #000;">
		<h4><span style="font-weight: 800;">ใบแจ้งเตือนต่อประกัน</span><br>
		
	</div>
	<table align="center" width="100%">
	  <tr>
	    <td width="20%">&nbsp;</td>
	    <td width="25%" >&nbsp;</td>
	    <td width="20%" >&nbsp;</td>
	    <td width="35%" >&nbsp;</td>
      </tr>
	  <tr>
	    <td width="20%" height="35"><strong>วันครบ</strong></td>
	    <td height="35" style=" border-bottom: 1px solid"><?php echo $this->insurance_model->translateDateToThai($LasData['insurance_end']);?></td>
	    <td height="35" align="right"><strong>ทะเบียนรถ&nbsp;&nbsp;</strong></td>
	    <td height="35" style=" border-bottom: 1px solid"><?php echo $InsDetail->vehicle_regis." ".$InsDetail->province_name;?></td>
      </tr>
	  <tr>
	    <td width="20%" height="35"><strong>ชื่อตัวแทน/ลูกค้า</strong></td>
	    <td height="35" style="border-bottom: 1px solid"><?php echo $InsDetail->cust_name?></td>
	    <td height="35" align="right"><strong>โทรศัพท์&nbsp;&nbsp;</strong></td>
	    <td height="35" style="border-bottom: 1px solid"> <?php echo $InsDetail->custTelephone?></td>
      </tr>
	  <tr>
	    <td width="20%" height="35"><strong>เบี้ยเดิม</strong></td>
	    <td height="35" colspan="3" style="border-bottom: 1px solid">ประกัน + พรบ. <?php 
if(($LasData['last_insurance_price']!=0)&&($LasData['last_act_price']!=0)){ 
echo number_format($LasData['last_insurance_price'])."+".number_format($LasData['last_act_price'])." = ".number_format($LasData['last_total']);

}else if(($LasData['last_insurance_price']!=0)&&($LasData['last_act_price']==0)){ 
echo number_format($LasData['last_insurance_price'])." = ".number_format($LasData['last_total']);

}else if(($LasData['last_insurance_price']==0)&&($LasData['last_act_price']!=0)){ 
echo "".number_format($LasData['last_act_price'])." = ".number_format($LasData['last_total']);

}?></td>
      </tr>
	  <tr>
	    <td width="20%">&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
      </tr>
	  <tr>
	    <td width="20%"><strong>เบี้ยใหม่</strong></td>
	    <td height="35" colspan="3" style="border-bottom: 1px solid"> ประกัน + พรบ. <?php echo number_format($InsDetail->insurance_price,2)?> + <?php echo number_format($InsDetail->act_price,2);?>	 =  <?php  echo number_format(($InsDetail->insurance_price+$InsDetail->act_price),2)?></td>
      </tr>
	  <tr>
	    <td width="20%" height="35"><strong>บริษัทประกัน</strong></td>
	    <td height="35" style="border-bottom: 1px solid"><?php echo $InsDetail->insCompany_name?></td>
	    <td height="35" align="right"><strong>Dedug&nbsp;&nbsp;</strong></td>
	    <td height="35" style="border-bottom: 1px solid"><?php echo number_format($InsDetail->dedug,2)?> บาท</td>
      </tr>
	  <tr>
	    <td width="20%" height="35"><strong>ซ่อม</strong></td>
	    <td height="35"><input type="checkbox" <?php if($InsDetail->insurance_fix_garace=='2'){ echo "checked";}?>>
	    ซ่อมอู่</td>
	    <td height="35"><input type="checkbox"  <?php if($InsDetail->insurance_fix_garace=='1'){ echo "checked";}?>>
	      ซ่อมห้าง</td>
	    <td>&nbsp;</td>
      </tr>
	  <tr>
	    <td width="20%" height="35"><strong>การชำระเงิน **</strong></td>
	    <td height="35"><input type="checkbox">
	      เงินสด</td>
	    <td height="35"><input type="checkbox" >
	      เงินผ่อน xx งวด</td>
	    <td>&nbsp;</td>
      </tr>
</table><br>
<table align="center" width="95%">
		<tr>
		  <td width="25%" height="35"><strong>ค่าประกัน</strong></td>
		  <td width="25%" height="35" align="right" style="width: 25%; border-bottom: 1px solid"><?php $coverTotal=0; echo number_format($InsDetail->insurance_price,2); $coverTotal=$coverTotal+$InsDetail->insurance_price?></td>
		  <td width="10%" height="35">บาท</td>
		  <td width="35%" height="35" align="right"><strong>วันหมดอายุประกัน</strong></td>
		  <td width="25%" height="35" align="center" nowrap="nowrap"><?php echo $this->insurance_model->translateDateToThai($InsDetail->insurance_end);?></td>
  </tr>
		<tr>
		  <td width="25%" height="35"><strong>ค่า พ.ร.บ.</strong></td>
		  <td width="25%" height="35" align="right" style="width: 25%; border-bottom: 1px solid"><?php echo number_format($InsDetail->act_price,2); $coverTotal=$coverTotal+$InsDetail->act_price?>	</td>
		  <td width="10%" height="35">บาท</td>
		  <td width="35%" height="35" align="right"><strong>วันหมดอายุ พ.ร.บ.</strong></td>
		  <td width="25%" height="35" align="center" nowrap="nowrap"><?php echo $this->insurance_model->translateDateToThai($InsDetail->act_date_end);?>		</td>
  </tr>
		<tr>
		  <td width="25%" height="35"><strong>ค่าภาษี</strong></td>
		  <td width="25%" height="35" align="right" style="width: 25%; border-bottom: 1px solid"><?php echo number_format($InsDetail->tax_price,2);$coverTotal=$coverTotal+$InsDetail->tax_price?></td>
		  <td width="10%" height="35">บาท</td>
		  <td width="35%" height="35" align="right"><strong>วันหมดอายุภาษี</strong></td>
		  <td width="25%" height="35" align="center" nowrap="nowrap"><?php echo $this->insurance_model->translateDateToThai($InsDetail->date_registration_end);?>	</td>
  </tr>
		<tr>
		  <td width="25%" height="35"><strong>ค่าตรวจสภาพ</strong></td>
		  <td width="25%" height="35" align="right" style="width: 25%; border-bottom: 1px solid"><?php echo number_format($InsDetail->car_check_price,2); $coverTotal=$coverTotal+$InsDetail->car_check_price?>		</td>
		  <td width="10%" height="35">บาท</td>
		  <td width="35%" height="35" align="right"><strong>วันตรวจสภาพ</strong></td>
		  <td width="25%" height="35" align="center" nowrap="nowrap"><?php echo $this->insurance_model->translateDateToThai($InsDetail->car_check_date)." : ".$InsDetail->car_check_time;?>	</td>
	  </tr>
		<tr>
		  <td height="35" align="center"><strong>รวมทั้งสิ้น</strong></td>
		  <td height="35" align="right" style="width: 25%; border-bottom: double; font-weight: bold"><?php echo $coverTotal?></td>
		  <td height="35">บาท</td>
		  <td height="35" align="right">&nbsp;</td>
		  <td height="35" align="center" nowrap="nowrap">&nbsp;</td>
  </tr>
	</table>
	
	<script>
		window.print();
    </script>
</body>
</html>