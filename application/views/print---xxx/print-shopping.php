<?php include('phpconfig.php');?>
<?php
	$_POST['DataID']=$_GET['DataID'];
	 $query="SELECT * FROM tbl_insurance_shpping_data WHERE id = '".$_POST['DataID']."' ";
		$resultreceipt_data=mysql_query($query);
		$insurance_travel=mysql_fetch_assoc($resultreceipt_data);
                
                  $query="SELECT COUNT(id) NumInstallment FROM tbl_insurance_shpping_installment  WHERE  travel_id = '".$_POST['DataID']."' ";
		$resultCount = mysql_query($query);
		$countInstallment = mysql_fetch_assoc($resultCount);  
                
                $query="SELECT * FROM `tbl_insurance_corp` WHERE id = '".$insurance_travel['corp_id']."' ";
    $resultCorp = mysql_query($query);
	$numCorp = mysql_num_rows($resultCorp);
        $insurance_Corp=mysql_fetch_assoc($resultCorp);
        $pathUpload2="uploadfile/";
         $ext = pathinfo($pathUpload2.$insurance_Corp['img_logo']);
         $extension = strtolower($ext['extension']);
        
        
                $query2="SELECT * FROM `tbl_code_data` WHERE  id = '".$insurance_travel['code_id']."'    ";
    $resultCode = mysql_query($query2);
    $insurance_Code=mysql_fetch_assoc($resultCode);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ประกันขนส่ง</title>
<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
	
		<link href="https://fonts.googleapis.com/css?family=Mitr|Prompt|Sarabun&display=swap" rel="stylesheet">

<style>
	@page {margin: 0;}	
	 .page-break { height:0; page-break-before:always; margin:0; border-top:none; }
        
	body{
		font-size:10px; 
		font-family: 'Sarabun', sans-serif;
	    margin: 20px;
		background-color: #FFFFFF;
	}
	
	td {
		font-size:10px; 
		font-family: 'Sarabun', sans-serif;
	    padding-left: 5px;}
	
	.border_style {
		border-top: 1px solid #000000;
		border-left: 1px solid #000000;
		border-right: 1px solid #000000;
				
	}
	.b_right{ 
		border-right: 1px #000000 solid;
	}
	.b_left{ 
		border-left: 1px #000000 solid;
	}
	.b_none{
		border: none;
	}
	
    .page{
    height:947px;
    padding-top:5px;
	background-color: aquamarine;
    page-break-after : always;   
    font-family: 'Sarabun', sans-serif;
    position:relative;
    border-bottom:1px solid #000;
	margin: 0mm;

  }
</style>
</head>

<body>
<div>&nbsp;</div>
<div id="FormTravel" class="fromprint" >


	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tbody>
		<tr>
                    <td valign="top" width="13%">
                        <?php if(($extension=='jpg')||($extension=='jpeg')||($extension=='bmp')||($extension=='gif')||($extension=='png')){ ?>
					<img src="<?php echo $pathUpload2.$insurance_Corp['img_logo'];?>" style="width: 150px; height: auto; border:0px;">
					<?php }else{ ?>
						<div style="height: 150px; width: 150px; text-align: center;vertical-align: middle; padding-top: 60px; border-style: solid;border-width: 1px;">
							<h1 class="text-primary">
							<?php echo strtoupper($extension)?> file.
							</h1>
						</div>
					<?php }?>
                    </td>
		  <td valign="top" width="65%" style="padding-left: 20px;">
			  <address style="font-size:10px;">
						<?php echo  $insurance_Corp['corp_fullname']?>
						<br>
						<?php echo  $insurance_Corp['corp_addr']?>
						<br>
						<?php echo  $insurance_Corp['accident_report']?>						
			   </address>
			</td>
		  <td valign="top" width="17%">			 		
				<div style="font-size:16px; position: relative; text-align: center"><strong>ชำระอากรแล้ว</strong></div>				
				<div style="border-style: solid; padding: 0px 20px; margin-top: 0px; font-size:16px; text-align: center"><strong>ต้นฉบับ</strong></div>			 
		 </td>
		</tr>
	  </tbody>
	</table>
	
	
		<div class="row">
		  	<div class="col-sm-12" style="text-align: center; font-size: 16px; padding-bottom: 10px;">
				<span><strong>กรมธรรม์ประกันภัยความรับผิดของผู้ขนส่ง</strong></span>
		 	</div>
		</div>	
	
<div class="row">
		  <div class="col-sm-12" style="text-align:center; font-size: 10px;">
			  <span style="float: left"><strong>ทะเบียนเลขที่  <?php echo $insurance_travel['register'];?> </strong></span><span style="float: right; position: relative"><strong>กรมธรรม์เลขที่  <?php echo $insurance_travel['policy_number'];?></strong></span>
		  </div>
		</div>

<table style="width:100%;margin-left: auto;margin-right: auto;" class="border_style">
    <tr>
      <td height="40" align="left" valign="top" style="font-size:12px; padding: 5px;">
		  กรมธรรม์ประกันภัยฉบับนี้ทำให้ไว้เป็นสำคัญว่า "ผู้เอาประกัน" ตามที่ระบุชื่อไว้ในตารางกรมธรรม์ประกันภัยข้างล่างนี้ตกลงชำระเบี้ยประกันภัย และเบี้ยประกันเพิ่ม (หากมี) ตามจำนวนที่ได้ระบุไว้ในกรมธรรม์ประกันภัยให้แก่ <strong><?php echo  $insurance_Corp['corp_fullname']?></strong> ซึ่งต่อไปนี้เรียกว่า "บริษัท" เพื่อตอบแทนในการที่บริษัทตกลงรับประกันความรับผิดตามกฎหมายของผู้เอาประกันภัยในความสูญหาย หรือความเสียหาย หรือส่งมอบชักช้าของที่ผู้เอาประกันภัยรับขนและโดยยานพาหนะที่ระบุไว้ในตารางกรมธรรม์ประกันภัยตามรายละเอียดข้างล่างนี้และภายใต้ ข้อสัญญาเงื่อนไข ข้อยกเว้นและข้อรับรองต่ง ๆ ที่ปรากฏในกรมธรรม์ประกันภัยฉบับนี้ รวมทั้งเอกสารแนบท้ายและใบสลักหลัง (ในกรณีที่ข้อความในเอกสารแนบท้าย และใบสลักหลังขัดหรือแย้งกับข้อความที่ระบุไว้ในกรมธรรม์ประกันภัยนี้ ให้ถือเอาข้อความในเอกสารแนบท้ายและใบสลักหลังเป็นสำคัญ)     
      </td>
    </tr>
</table>
	
<table style="width:100%;margin-left: auto;margin-right: auto;" class="border_style">
  <thead>
    <tr>
      <td height="30" align="center"  style="font-size:14px;">
		 <strong>ตารางกรมธรรม์ประกันภัย</strong>
      </td>
    </tr>
  </thead>
</table>
	
	
<table style="width:100%;margin-left: auto;margin-right: auto;" class="border_style">
  <thead>
    <tr>
      <td width="142" height="20" align="left" valign="top" style="font-size: 12px; border-right: none; border-bottom: none; border-top:none;"><strong>ชื่อและที่อยู่ผู้เอาประกันภัย</strong><br>
        <font style="font-size:10px">Name and Address of Insured</font></td>
      <td height="20" align="left" valign="top" style="font-size: 12px; border-bottom: none; border-top:none; border-left: none;"><?php echo $insurance_travel['cust_name'];?><br><?php echo $insurance_travel['policyholder'];?></td>
    </tr>
  </thead>
</table>
<table style="width:100%;margin-left: auto;margin-right: auto;" class="border_style">
  <thead>
    <tr>
      <td height="30" align="center"  style="font-size:12px; border-bottom: none;  border-top:none;"><strong>ยานพาหนะขนส่ง</strong></td>
    </tr>
  </thead>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="border_style">
  <tbody>
    <tr>
      <td width="20%" height="30" align="center" class="border_style"><strong>ประเภท</strong></td>
      <td height="30" align="center" class="border_style"><strong>เลขตัวถังและเลขทะเบียน หรืออื่นๆ</strong></td>
    </tr>
    <tr>
      <td align="left" height="60" valign="top" class="border_style"><?php echo $insurance_travel['vehicle_type'];?></td>
      <td align="left" valign="top" class="border_style"><?php echo $insurance_travel['registration_number'];?><br></td>
    </tr>
  </tbody>
</table>
<table style="width:100%;margin-left: auto;margin-right: auto;"  class="border_style">
  <thead>
    <tr>
      <td height="30" align="left"  style="font-size:12px; border-bottom: none; border-top: none; "><strong>ระยะเวลาประกันภัย</strong></td>
    </tr>
    <tr>
      <td height="30" align="left"  style="font-size:12px; border-bottom: none; border-top: none; ">
          <input type="checkbox"disabled <?php if($insurance_travel['insurance_period_ch']=='1'){echo 'checked';}?> style="width: 20px"> 
		กรมธรรม์ประกันภัยแบบกำหนดเวลา : เริ่มวันที่<strong> <?php echo GetThaiDate($insurance_travel['insurance_end'])?></strong> เวลา <?php echo $insurance_travel['insurance_start_time'];?> น.  สิ้นสุดวันที่<strong> <?php echo GetThaiDate($insurance_travel['insurance_start'])?></strong> เวลา <?php echo $insurance_travel['insurance_end_time'];?> น.<br>
    	<span style="margin-left: 23px;">ขอบเขต <?php echo $insurance_travel['scope']?> และเส้นทางการขนส่ง <?php echo $insurance_travel['route']?></span>  <br>
       <input type="checkbox" disabled <?php if($insurance_travel['insurance_period_ch']=='2'){echo 'checked';}?> style="width: 20px"> กรมธรรม์ประกันภัยแบบขนส่งเฉพาะเที่ยว : จาก <?php echo $insurance_travel['transportation_insurance'];?></td>
    </tr>
  </thead>
</table>
	
<table style="width:100%;"  class="border_style">
  <thead>
    <tr>
      <td height="30" align="left"  style="font-size:12px; border-bottom: none; "><strong>จำนวนเงินจำกัดความรับผิดสำหรับค่าสินไหมทดแทน</strong></td>
    </tr>
    <tr>
      <td height="30" align="left" style="font-size:12px; border-bottom: none; border-top: none; padding-left:10px; ">
		1. จำนวนเงินจำกัดความรับผิดรวม <?php echo number_format($insurance_travel['price'],2)?> บาท<br>
		2. จำนวนเงินจำกัดความรับผิดต่อการเรียกร้องหรือต่ออุบัติเหตุแต่ละครั้ง <?php echo number_format($insurance_travel['priceaccident'],2)?> บาท<br>
		3. จำนวนเงินจำกัดความรับผิดต่อหนึ่งยานพาหนะ  <?php echo number_format($insurance_travel['pricevehicle'],2)?> บาท <br>
		4. จำนวนเงินจำกัดความรับผิดเพื่อการส่งมอบชักช้าต่อการเรียกร้องหรือต่ออุบัติเหตุแต่ละครั้งและต่อหนึ่งยานพาหนะ  <?php echo number_format($insurance_travel['priceclaim'],2)?>  บาท		
	  </td>
    </tr>
  </thead>
</table>
	
<table style="width:100%;margin-left: auto;margin-right: auto;"  class="border_style">
  <thead>
    <tr>
      <td height="30" align="left"  style="font-size:12px; border-bottom: none "><strong>ความเสียหายส่วนแรก ที่ผู้เอาประกันภัยต้องรับผิดเองต่ออุบัติเหตุแต่ละครั้ง ตามเอกสารแนบท้าย</strong></td>
    </tr>
  </thead>
</table>
	

<table style="width:100%;" class="border_style">
  <thead>
    <tr>
      <td height="30" align="left"  style="font-size:12px; border-bottom: none; ">
		  <strong>ภัยเพิ่มพิเศษหรือข้อรับรองหรือเอกสารแนบท้าย ซึ่งถือเป็นส่วนหนึ่งของกรมธรรม์ประกันภัย </strong>
		<input type="checkbox" disabled <?php if($insurance_travel['extra_danger']=='0'){echo 'checked';}?> style="width: 20px" > ไม่มี  <input type="checkbox"  style="width: 40px"  disabled <?php if($insurance_travel['extra_danger']=='1'){echo 'checked';}?>>   มี
	  </td>
    </tr>
    <tr>
      <td height="30" align="left"  style="font-size:12px; border-bottom: none; border-top: none; padding-left:20px; ">
		ตามเอกสารแนบ	
	  </td>
    </tr>
  </thead>
</table>
	
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="border_style">
  <tbody>
    <tr>
      <td width="20%" height="30" align="center" style="border-right: 1px solid #000000; border-bottom: 1px solid #000000"><strong>อัตราเบี้ยประกันภัย</strong></td>
      <td width="20%" height="30" align="center" style="border-right: 1px solid #000000; border-bottom: 1px solid #000000"><strong>เบี้ยประกันภัย (บาท)</strong></td>
      <td width="20%" height="30" align="center" style="border-right: 1px solid #000000; border-bottom: 1px solid #000000"><strong>อากรแสตมป์ (บาท)</strong></td>
      <td width="20%" height="30" align="center" style="border-right: 1px solid #000000; border-bottom: 1px solid #000000"><strong>ภาษีมูลค่าเพิ่ม (บาท)</strong></td>
      <td width="20%" height="30" align="center" style="border-bottom: 1px solid #000000"><strong>เบี้ยประกันภัยรวม (บาท)</strong></td>
    </tr>
    <tr>
      <td align="center" height="30" style="border-bottom: none;border-right: 1px solid #000000"><?php echo number_format($insurance_travel['premium_rate'],2)?></td>
      <td align="center" height="30" style="border-bottom: none;border-right: 1px solid #000000"><?php echo number_format($insurance_travel['premium'],2)?></td>
      <td align="center" height="30" style="border-bottom: none;border-right: 1px solid #000000"><?php echo number_format($insurance_travel['revenue_stamp'],2)?></td>
      <td align="center" height="30" style="border-bottom: none;border-right: 1px solid #000000"><?php echo number_format($insurance_travel['tax'],2)?></td>
      <td align="center" height="30" style="border-bottom: none;"><?php echo number_format($insurance_travel['total_price'],2)?></td>
    </tr>
  </tbody>
</table>
<table style="width:100%;margin-left: auto;margin-right: auto;"  class="border_style">
  <thead>
    <tr>
        <td width="5%" height="40" align="right" valign="middle" style="font-size:12px;border-right: none;"><input type="checkbox" disabled <?php if($insurance_travel['agent']=='1'){echo 'checked';}?>></td>
      <td width="10%" height="40" align="left" valign="middle" style="font-size:12px;border-left: none; border-right: none;"><strong>ตัวแทน</strong></td>
      <td width="2%" align="right" valign="middle" style="font-size:12px;border-left: none; border-right: none;"><input type="checkbox" disabled <?php if($insurance_travel['agent']=='2'){echo 'checked';}?>></td>
      <td width="20%" align="left" valign="middle" style="font-size:12px;border-left: none; border-right: none;"><strong>นายหน้าประกันภัยรายนี้</strong></td>
      <td align="left" valign="middle" style="font-size:12px;border-left: none; border-right: none;"><strong><?php echo $insurance_travel['agent_name']?></strong></td>
      <td width="15%" align="left" valign="middle" style="font-size:12px;border-left: none; border-right: none;"><strong>ใบอนุญาตเลขที่</strong></td>
      <td width="20%" align="left" valign="middle" style="font-size:12px;border-left: none;"><strong><?php echo $insurance_travel['license_number']?></strong></td>
    </tr>
  </thead>
</table>
<table style="width:100%;margin-left: auto;margin-right: auto;  border-bottom:1px solid #000000;"  class="border_style">
    <tr>
      <td width="20%" height="40" align="left" style="font-size:12px;border-right: none;  border-top: none;"><strong>วันที่ทำสัญญาประกันภัย</strong></td>
      <td width="20%" align="left" style="font-size:12px;border-left: none; border-right: none;  border-top: none;"><strong><?php if($insurance_travel['contract_startdate']!='0000-00-00'){echo GetThaiDate($insurance_travel['contract_startdate']);}?></strong></td>
      <td align="center" style="font-size:12px;border-left: none; border-right: none;  border-top: none;">&nbsp;</td>
      <td width="25%" align="left" style="font-size:12px;border-left: none; border-right: none;border-top: none;"><strong>วันที่ออกกรมธรรม์ประกันภัย</strong></td>
      <td width="20%" align="left" style="font-size:12px;border-left: none;  border-top: none;"><strong><?php if($insurance_travel['contract_enddate']!='0000-00-00'){echo GetThaiDate($insurance_travel['contract_enddate']);}?></strong></td>
    </tr>
</table>
<p>&nbsp;</p>
<p>เพื่อเป็นหลักฐาน บริษัทโดยผู้มีอำนาจได้ลงลายมือชื่อและประทับตราบริษัทไว้เป็นสำคัญ ณ สำนักงานของบริษัท</p>
	
						
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: 20px;">
  <tbody>
    <tr>
      <td width="33%" align="center" valign="bottom"  style="border: none;">............................................................ </td>
      <td width="33%" align="center" valign="bottom"  style="border: none;">............................................................ </td>
      <td width="33%" align="center" valign="bottom"  style="border: none;">............................................................ </td>
    </tr>
    <tr>
      <td align="center" valign="top" style="text-align: center; border: none;"><br>
        กรรมการ</td>
      <td align="center" valign="top" style="text-align: center; border: none;"><br>
        กรรมการ</td>
      <td align="center" valign="top" style="text-align: center; border: none;"><br>
      ผู้รับมอบอำนาจ </td>
    </tr>
  </tbody>
</table>
	</div>
<p align="right" style="padding-top: 30px;">.</p>
<p>&nbsp;</p>
<script>
	window.print();
</script>
</body>
</html>