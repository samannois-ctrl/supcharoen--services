<?php include('phpconfig.php');?>
<?php
	$_POST['DataID']=$_GET['DataID'];
	 $query="SELECT * FROM tbl_insurance_covid_data WHERE id = '".$_POST['DataID']."' ";
		$resultreceipt_data=mysql_query($query);
		$insurance_travel=mysql_fetch_assoc($resultreceipt_data);
                
                  $query="SELECT COUNT(id) NumInstallment FROM tbl_insurance_covid_installment  WHERE  travel_id = '".$_POST['DataID']."' ";
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
<title>ประกัน COVID-19</title>
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
        
     body, td {
		font-size:10px; 
		font-family: 'Sarabun', sans-serif;
	    padding-left: 5px;}
	
	.border_style {
		border-top: 1px solid #000000;
		border-left: 1px solid #000000;
		border-right: 1px solid #000000;
		/*border-bottom: 1px solid #000000;	*/	
	}
	.b_right{ 
		border-right: 1px #000000 solid;
	}
	.b_left{ 
		border-left: 1px #000000 solid;
	}
	.b_top{ 
		border-top: 1px #000000 solid;
	}
	.b_bottom{ 
		border-bottom: 1px #000000 solid;
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
<div id="Formaccident" class="fromprint " style="page-break-after: always">

    
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tbody>
		<tr>
                    <td valign="top" width="13%">
                        <?php if(($extension=='jpg')||($extension=='jpeg')||($extension=='bmp')||($extension=='gif')||($extension=='png')){ ?>
					<img src="<?php echo $pathUpload2.$insurance_Corp['img_logo'];?>"  class="img-thumbnail" style="widows: 350px; height: auto" >
					<?php }else{ ?>
						<div style="height: 200px; width: 200px; text-align: center;vertical-align: middle; padding-top: 60px; border-style: solid;border-width: 1px;">
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
		  	<div class="col-sm-12" style="text-align: center; font-size: 14px;">
				<span><strong>กรมธรรม์ประกันภัยโควิด</strong></span> <br>
				<span><strong>COVID INSURANCE POLICY</strong></span>
		 	</div>
		</div>	
	
		
	
<table style="width:100%;margin-left: auto;margin-right: auto; border-bottom: none;" class="border_style">
  <thead>
    <tr>
      <td height="30" align="center"  style="font-size:12px; ">
		 <strong>ตารางกรมธรรม์ประกันภัย (THE SCHEDULE)</strong>
      </td>
    </tr>
  </thead>
</table>
	
	
<table style="width:100%;margin-left: auto;margin-right: auto;"  class="border_style">
  <thead>
    <tr>
      <td width="15%" height="40" align="left" valign="top" style="font-size:12px;border-right: none; border-top: none;"><strong>รหัสบริษัท</strong><br>
        <font style="font-size:10px">Company Code</font></td>
      <td width="15%" align="left" valign="top" style="font-size:12px; border-left: none; border-right: none; border-top: none;"><strong><?php echo  $insurance_travel['company_id']?></strong></td>
      <td width="25%" height="40" align="left" valign="top" style="font-size:12px;border-left: none;border-right: none; border-top: none;">&nbsp;<strong>กรมธรรม์ประกันภัยลขที่</strong><br>
      <font style="font-size:10px">Policy No.</font></td>
      <td width="20%" align="left" valign="top" style="font-size:12px;border-left: none;border-right: none; border-top: none;"><?php echo  $insurance_travel['policy_number']?></td>
      <td width="" height="40" align="left" valign="top" style="font-size:12px; border-left: none; border-right: none; border-top: none;">&nbsp;</td>
      <td align="left" valign="top" style="font-size:12px;border-left: none; border-top: none;"><strong>คุ้มครอง 24 ชั่วโมงทั่วโลก</strong><br>
      <font style="font-size:10px">24 Hours Worldwide Coverage</font></td>
    </tr>
  </thead>
</table>

<table style="width:100%;margin-left: auto;margin-right: auto" class="border_style">
  <thead>
    <tr>
      <td width="18%" height="20" align="left" valign="top" style="font-size: 12px; border-right: none; border-bottom: none; border-top:none;"><strong>1. ชื่อผู้เอาประกันภัย</strong><br>
        <font style="font-size:10px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name of the Insured</font></td>
      <td height="20" align="left" valign="top" style="font-size: 12px; border: none;"><?php echo  $insurance_travel['policyholder']?><br></td>
      <td colspan="2" align="left" valign="top" style="font-size: 12px; border: none;">เลขที่บัตรประจำตัวประชาชน<br>
        <font style="font-size:10px">Identity Card No.</font></td>
      <td colspan="3" align="left" valign="top" style="font-size: 12px; border-left: none; border-bottom: none; border-top:none;"><?php echo  $insurance_travel['card_number']?></td>
    </tr>
    <tr>
      <td rowspan="3" align="left" valign="top" style="font-size: 12px; border-right: none; border-bottom: none; border-top:none; border-right: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>ที่อยู่</strong><br>
      <font style="font-size:10px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Address</font></td>
      <td rowspan="3" align="left" valign="top" style="font-size: 12px; border: none;"><?php echo  $insurance_travel['insured_address']?></td>
      <td width="15%" height="20" align="left" valign="top" style="font-size: 12px; border:none;">วัน/เดือน/ปีเกิด<br>
        <font style="font-size:10px">Date of Birth</font></td>
      <td width="15%" align="left" valign="top" style="font-size: 12px; border: none;"><?php if($insurance_travel['birthday'] != '0000-00-00'){ echo GetThaiDate($insurance_travel['birthday']); }?></td>
      <td width="5%" align="left" valign="top" style="font-size: 12px; border: none;">อายุ<br>
        <font style="font-size:10px">Age</font></td>
      <td width="5%" align="left" valign="top" style="font-size: 12px; border: none;"> <?php echo  $insurance_travel['age']?></td>
      <td width="5%" align="left" valign="top" style="font-size: 12px; border-bottom: none; border-top:none; border-left: none;"> ปี<br>
      <font style="font-size:10px">Yrs.</font></td>
    </tr>
    <tr>
      <td height="20" align="left" valign="top" style="font-size: 12px; border: none;">อาชีพ<br>
        <font style="font-size:10px">Occupation</font></td>
      <td colspan="4" align="left" valign="top" style="font-size: 12px; border-bottom: none; border-top:none; border-left: none;"><?php echo  $insurance_travel['career']?></td>
    </tr>
    <tr>
      <td height="20" align="left" valign="top" style="font-size: 12px; border-bottom: none; border-top:none; border-left: none; border-right: none;">ชั้นอาชีพ<br>
        <font style="font-size:10px">Occupation Class</font></td>
      <td colspan="4" align="left" valign="top" style="font-size: 12px; border-bottom: none; border-top:none; border-left: none;"><?php echo  $insurance_travel['class_career']?></td>
    </tr>
  </thead>
</table>
	
<table style="width:100%;margin-left: auto;margin-right: auto;" class="border_style">
  <thead>
    <tr>
      <td width="25%" height="20" align="left" valign="top" style="font-size: 12px; border-right: none; border-bottom: none; border-top:none;"><strong>2. ชื่อผู้ได้รับความคุ้มครอง</strong><br>
      <font style="font-size:10px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name of the Covered Person</font></td>
      <td width="30%" height="20" align="left" valign="top" style="font-size: 12px; border: none;"><?php echo  $insurance_travel['beneficiary']?><br></td>
      <td width="29%" align="left" valign="top" style="font-size: 12px; border: none;">ความสัมพันธ์กับผู้เอาประกันภัย<br>
      <font style="font-size:10px">Relationship to the Insured</font></td>
      <td width="16%" align="left" valign="top" style="font-size: 12px; border-left: none; border-bottom: none; border-top:none;"><?php echo  $insurance_travel['beneficiary']?></td>
    </tr>
    <tr>
      <td align="left" valign="top" style="font-size: 12px; border-right: none; border-top:none; border-right: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>ที่อยู่</strong><br>
      <font style="font-size:10px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Address</font></td>
      <td align="left" valign="top" style="font-size: 12px; border: none;"><?php echo  $insurance_travel['address_beneficiary']?></td>
      <td height="20" colspan="2" align="left" valign="top" style="font-size: 12px; border-left: none; border-bottom: none; border-top:none;">&nbsp;</td>
    </tr>
  </thead>
</table>
	
	
<table style="width:100%;margin-left: auto;margin-right: auto;" class="border_style">
  <thead>
    <tr>
      <td width="25%" height="20" align="left" valign="top" style="font-size: 12px; border-right: none; border-bottom: none; border-top:none;"><strong>3. ชื่อผู้รับประโยชน์</strong><br>
        <font style="font-size:10px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name of the Beneficiary</font></td>
      <td width="30%" height="20" align="left" valign="top" style="font-size: 12px; border: none;"><?php echo  $insurance_travel['beneficiary2']?><br></td>
      <td width="29%" align="left" valign="top" style="font-size: 12px; border: none;">ความสัมพันธ์กับผู้ได้รับความคุ้มครอง<br>
        <font style="font-size:10px">Relationship to the Covered Person</font></td>
      <td colspan="3" align="left" valign="top" style="font-size: 12px; border-left: none; border-bottom: none; border-top:none;"><?php echo  $insurance_travel['relationship2']?></td>
    </tr>
    <tr>
      <td align="left" valign="top" style="font-size: 12px; border-right: none; border-bottom: none; border-top:none; border-right: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>ที่อยู่</strong><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font style="font-size:10px">Address</font></td>
      <td align="left" valign="top" style="font-size: 12px; border: none;"><?php echo  $insurance_travel['address_beneficiary2']?></td>
      <td height="20" colspan="4" align="left" valign="top" style="font-size: 12px; border-left: none; border-bottom: none; border-top:none;">&nbsp;</td>
    </tr>
  </thead>
</table>
	
<table style="width:100%;margin-left: auto;margin-right: auto;" class="border_style">
  <thead>
    <tr>
      <td width="18%" height="40" align="left" valign="top" style="font-size:12px; border-right: none; border-bottom: none; border-top:none;"><strong>4. ระยะเวลาประกันภัย</strong><br>
        <font style="font-size:10px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Period of Insurance</font></td>
      <td width="9%" height="40" align="left" valign="top" style="font-size:12px; border-left: none; border-right: none; border-bottom: none; border-top:none;">
        <strong>เริ่มวันที่</strong> <br>
        <font style="font-size:10px;">from</font></td>
      <td width="13%" align="left" valign="top" style="font-size:12px;border-left: none; border-right: none; border-bottom: none; border-top:none;"><?php echo GetThaiDate($insurance_travel['insurance_start'])?></td>
      <td width="4%" align="left" valign="top" style="font-size:12px;border-left: none; border-right: none; border-bottom: none; border-top:none;">
        <strong>เวลา</strong><br>
        <font style="font-size:10px;">at</font></td>
      <td width="7%" align="left" valign="top" style="font-size:12px;border-left: none; border-right: none; border-bottom: none; border-top:none;"><?php echo  $insurance_travel['insurance_start_time']?> น.</td>
      <td width="10%" align="left" valign="top" style="font-size:12px;border-left: none; border-right: none; border-bottom: none; border-top:none;"><strong>น.</strong><br>
      <font style="font-size:10px;">hours</font></td>
      <td width="10%" align="left" valign="top" style="font-size:12px;border-left: none; border-right: none; border-bottom: none; border-top:none;"><strong>สิ้นสุดวันที่</strong> <br>
        <font style="font-size:10px;">to</font></td>
      <td width="15%" align="left" valign="top" style="font-size:12px;border-left: none; border-right: none; border-bottom: none; border-top:none;"><?php echo GetThaiDate($insurance_travel['insurance_start'])?></td>
      <td width="2%" align="left" valign="top" style="font-size:12px;border-left: none; border-right: none; border-bottom: none; border-top:none;"><strong>เวลา</strong><br>
        <font style="font-size:10px;">at</font></td>
      <td width="8%" align="center" valign="top" style="font-size:12px;border-left: none; border-right: none; border-bottom: none; border-top:none;"><?php echo  $insurance_travel['insurance_end_time']?> น.</td>
      <td width="4%" align="left" valign="top" style="font-size:12px;border-left: none; border-bottom: none; border-top:none;"><strong>น.</strong><br>
        <font style="font-size:10px;">hours</font></td>
    </tr>
  </thead>
</table>
	
<table style="width:100%;margin-left: auto;margin-right: auto;" class="border_style">
  <thead>
    <tr>
      <td width="18%" height="30" align="left" valign="top"  style="font-size:12px; border-bottom: none; border-right: none;"><strong>5. จำนวนจำกัดความรับผิด: <br>
        <font style="font-size:10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Limit of Liability</font></strong></td>
   
      <td height="30" align="left" valign="top"  style="font-size:10px; border-bottom: none; border-left: none; ">กรมธรรม์ประกันภัยนี้ให้การคุ้มครองเฉพาะผลของการบาดเจ็บหรือการเจ็บป่วยทางร่างกายในข้อที่มีจำนวนเงินเอาประกันภัยระบุไว้เท่านั้น<br>
        <font style="font-size:10px;">This policy affords coverage only with respect to such result from bodily injury or illness for which a sum insured is stated.</font></td>
    </tr>
  </thead>
</table>
	
	
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="border_style">
  <tbody>
    <tr>
      <td width="27%" height="30" align="center" class="b_right b_bottom"><strong>ข้อตกลงคุ้มครอง/เอกสารแนบท้าย</strong><br>
        <font style="font-size:10px;">Insuring Agreement / Endorsement</font></td>
      <td width="24%" height="30" align="center" class="b_right b_bottom"><strong>จำนวนเงินเอาประกันภัย(บาท)</strong><br><font style="font-size:10px;">Sum Insured (Baht)</font></td>
      <td width="28%" height="30" align="center" class="b_right b_bottom"><strong>ความรับผิดส่วนแรก (บาทหรือวัน)</strong><br>
      <font style="font-size:10px;">Deductible (Baht)</font></td>
      <td width="21%" height="30" align="center" class="b_right b_bottom"><strong>เบี้ยประกันภัย (บาท)</strong><br>
      <font style="font-size:10px;">Premium (Baht)</font></td>
    </tr>
    <tr>
      <td align="center" class="b_right"> ตามเอกสารประกอบแสดง<br>
      รายละเอียดการประกันภัย</td>
      <td align="center" class="b_right">ตามเอกสารประกอบแสดง<br>
รายละเอียดการประกันภัย</td>
      <td align="center" class="b_right">ตามเอกสารประกอบแสดง<br>
รายละเอียดการประกันภัย</td>
      <td align="center" class="b_right">ตามเอกสารประกอบแสดง<br>
รายละเอียดการประกันภัย</td>
    </tr>
    
  </tbody>
</table>
	
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="border_style">
  <tbody>
    <tr>
      <td colspan="2" align="left" class="b_right"><strong>6. งวดการชำระเบี้ยประกันภัย: <br>
      <font style="font-size:10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Premium Payment Period</font></strong></td>
      <td colspan="2" align="center" valign="top"  class="b_bottom"><strong>ชำระเบี้ยประกันภัยต่องวด</strong><br>
      <font style="font-size:10px;">Premium Payment per Period</font></td>
    </tr>
    <tr>
      <td colspan="2" align="left" class="b_right">&nbsp;</td>
      <td width="28%" valign="top" class="b_right b_bottom"><strong>เบี้ยประกันภัยสุทธิ</strong><br>
        <font style="font-size:10px;">Net Premium</font></td>
      <td width="21%" align="right" class="b_bottom" style="padding-right: 30px"><strong><?php if($insurance_travel['premium']!='0.00'){echo number_format($insurance_travel['premium'],2);}?></strong></td>
    </tr>
    <tr>
      <td colspan="2" align="center"  class="b_right">&nbsp;</td>
      <td valign="top" class="b_right b_bottom"><strong>อากรแสตมป์</strong><br>
        <font style="font-size:10px;">Stamp Duty</font></td>
      <td align="right" class="b_bottom"  style="padding-right: 30px"><strong><?php if($insurance_travel['revenue_stamp']!='0.00'){echo number_format($insurance_travel['revenue_stamp'],2);}?> </strong></td>
    </tr>
    <tr>
<td width="30%" align="left" style="border-bottom: none; border-top:none; border-right: none;">&nbsp;<input type="checkbox"  style="width: 20px" disabled <?php if($insurance_travel['premium_payment_period']==1){?>checked<?php }?>> 
      ราย   <?php if(($insurance_travel['period_month']!=0)){echo $insurance_travel['period_month'];}else{echo '........';}?> เดือนติดต่อกัน <br>
        <font style="font-size:10px; margin-left: 28px">Monthly</font></td>
      <td width="21%" align="left" class="b_right"><input type="checkbox"  style="width: 40px" disabled <?php if($insurance_travel['premium_payment_period']==2){?>checked<?php }?>>   รายปี<br>
        <font style="font-size:10px; margin-left: 43px">Annualty</font></td>
      <td valign="top"  class="b_right b_bottom"><strong>ภาษีมูลค่าเพิ่ม</strong><br>
        <font style="font-size:10px;">VAT</font></td>
      <td align="right" class="b_bottom" style="padding-right: 30px"><strong><?php if($insurance_travel['tax']!='0.00'){echo number_format($insurance_travel['tax'],2);}?> </strong></td>
    </tr>
    <tr>
      <td colspan="2" align="center"  class="b_right">&nbsp;</td>
      <td valign="top" class="b_right"><strong>เบี้ยประกันภัยรวม</strong><br>
        <font style="font-size:10px;">Total Premium</font></td>
      <td align="right" style=" border-top:none; padding-right: 30px"><strong><?php if($insurance_travel['total_price']!='0.00'){echo number_format($insurance_travel['total_price'],2);}?> </strong></td>
    </tr>
  </tbody>
</table>
<table style="width:100%;margin-left: auto;margin-right: auto;" class="border_style">
  <thead>
    <tr>
      <td width="35%" height="30" align="left" valign="top"  style="font-size:12px;  border-right: none; border-top: none;"><strong>7. ความคุ้มครอง / เอกสารแนบท้ายที่เนบติด</strong> <br>
      <font style="font-size:10px;">&nbsp;&nbsp;&nbsp;&nbsp;Coverage / Endorsement Attached</font></td>
      <td width="65%" height="30" align="left" valign="top"  style="font-size:12px; border-left: none; border-top: none;">ตามเอกสารแนบ</td>
    </tr>
  </thead>
</table>
<table style="width:100%;margin-left: auto;margin-right: auto;" class="border_style">
  <thead>
    <tr>
      <td width="20%" height="40" align="left" valign="top" style="font-size:12px;border-right: none;  border-top: none; border-bottom: none;"><strong>วันทำสัญญาประกันภัย</strong><br>
      <font style="font-size:10px;">Agreement made on</font></td>
      <td width="20%" align="left" valign="top" style="font-size:12px;border-left: none; border-right: none;  border-top: none; border-bottom: none;"><strong><?php if($insurance_travel['contract_startdate']!='0000-00-00'){echo GetThaiDate($insurance_travel['contract_startdate']);}?></strong></td>
      <td align="left" valign="top" style="font-size:12px;border-left: none; border-right: none;  border-top: none; border-bottom: none;">&nbsp;</td>
      <td width="25%" align="left" valign="top" style="font-size:12px;border-left: none; border-right: none;border-top: none; border-bottom: none;"><strong>วันออกกรมธรรม์ประกันภัย</strong><br>
      <font style="font-size:10px;">Policy issued on</font></td>
      <td width="20%" align="left" valign="top" style="font-size:12px;border-left: none;  border-top: none; border-bottom: none;"><strong><?php if($insurance_travel['contract_enddate']!='0000-00-00'){echo GetThaiDate($insurance_travel['contract_enddate']);}?></strong></td>
    </tr>
  </thead>
</table>
<table style="width:100%;margin-left: auto;margin-right: auto; border-bottom: 1px solid #000000" class="border_style">
  <thead>
    <tr>
      <td width="2%" height="40" align="right" valign="top" style="font-size:12px;border-right: none; border-bottom: none;"><input type="checkbox" disabled <?php if($insurance_travel['agent']==1){?>checked<?php }?>></td>
      <td width="15%" height="40" align="left" valign="top" style="font-size:12px;border-left: none; border-right: none; border-bottom: none;"><strong>ประกันภัยโดยตรง</strong><br>
      <font style="font-size:10px; line-height: 12px">Direct</font></td>
      <td width="2%" align="right" valign="top" style="font-size:12px;border-left: none; border-right: none; border-bottom: none;"><input type="checkbox" disabled <?php if($insurance_travel['agent']==2){?>checked<?php }?>></td>
      <td width="18%" align="left" valign="top" style="font-size:12px;border-left: none; border-right: none; border-bottom: none;"><strong>ตัวแทนประกันวินาศภัย</strong><br>
      <font style="font-size:10px;">Agent</font></td>
      <td width="2%" align="right" valign="top" style="font-size:12px;border-left: none; border-right: none; border-bottom: none;"><input type="checkbox" disabled <?php if($insurance_travel['agent']==3){?>checked<?php }?>></td>
      <td width="13%" align="left" valign="top" style="font-size:12px;border-left: none; border-right: none; border-bottom: none;"><strong>นายหน้าประกันภัย</strong><br>
      <font style="font-size:10px;">Broker</font></td>
      <td width="19%" align="left" valign="top" style="font-size:12px; border-left: none; border-bottom: none;"><span style="font-size:12px; border-left: none; border-top:none; border-right: none;"><?php echo  $insurance_travel['agent_name']?></span></td>
      <td width="11%" align="left" valign="top" style="font-size:12px; border-left: none; border-top:none; border-right: none;"><strong>ใบอนุญาตเลขที่</strong><br>
        <font style="font-size:10px;">License No.</font></td>
      <td width="18%" align="left" valign="top" style="font-size:12px; border-left: none; border-top:none;"><strong><?php echo  $insurance_travel['license_number']?></strong></td>
      </tr>
  </thead>
</table>
<br>
<p>เพื่อเป็นหลักฐาน บริษัทฯ โดยบุคคลผู้มีอำนาจทำการแทนบริษัทฯ ได้ลงลายมือชื่อ และประทับตราบริษัทฯ ไว้เป็นสำคัญ ณ สำนักงานของบริษัทฯ<br>
<font style="font-size:10px;">As evidence, the company has caused this policy to be signed by persons with power to act on behalf of the company and the company's stamp to be affixed at its office.</font></p>

	
  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: 50px;">
  <tbody>
    <tr>
      <td width="33%" align="center" valign="bottom"  style="border: none;">............................................................ <br>
        กรรมการ - Director</td>
      <td width="33%" align="center" valign="bottom"  style="border: none;">............................................................ <br>
        กรรมการ - Director </td>
      <td width="33%" align="center" valign="bottom"  style="border: none;">............................................................ <br>
      ผู้รับมอบอำนาจ - Authorized Signature</td>
    </tr>
   
  </tbody>
</table>
	</div>
<div id="Formaccident2" class="fromprint " style="page-break-after: always;margin-top: 20px">
	
	
	
	
	<!-- พิมพ์หน้า 2 ///  --->
	
	
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="b_none">
		<tr>
                    <td valign="top" width="13%">
                        <?php if(($extension=='jpg')||($extension=='jpeg')||($extension=='bmp')||($extension=='gif')||($extension=='png')){ ?>
					<img src="<?php echo $pathUpload2.$insurance_Corp['img_logo'];?>"  class="img-thumbnail" style="widows: 350px; height: auto" >
					<?php }else{ ?>
						<div style="height: 200px; width: 200px; text-align: center;vertical-align: middle; padding-top: 60px; border-style: solid;border-width: 1px;">
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
			<td valign="top" width="17%">	 </td>	
			
		</tr>
	</table>
	
<p>&nbsp;</p>	
	
<div class="row">
		  	<div class="col-sm-12" style="text-align: center; font-size: 14px;">
				<span><strong>เอกสารประกอบแสดงรายละเอียดการประกันภัย</strong></span> <br>
				<span><strong>DOCUMENT STATING INSURANCE DETAILS</strong></span>
		 	</div>
		</div>	
	
<p>&nbsp;</p>
	
<table style="width:100%;margin-left: auto;margin-right: auto; border-bottom: none;">
  <thead>
    <tr>
      <td height="50"  style="font-size:12px; ">
		 <strong>เอกสารนี้ให้ถือเป็นส่วนหนึ่งของกรมธรรม์ประกันภัยเลขที่<span style="margin-left: 45px">721-11026-40</span></strong>
		  <br>
        <font style="font-size:10px">This document shall form an integral part of the policy</font>
      </td>
    </tr>
  </thead>
</table>

<p>&nbsp;</p>
	
<table width="100%" border="1" >
  <tbody>
    <tr>
      <td width="75%" height="45" align="center"><strong>ข้อตกลงคุ้มครอง</strong><br><font style="font-size:10px;">Insuring Agreement</font></td>
      <td width="25%" height="40" align="center"><strong>จำนวนเงินเอาประกันภัย (บาท)</strong><br><font style="font-size:10px;">Sum Insured (Baht)</font></td>     
    </tr>
    <tr>
      <td height="65">1.การเสียชีวิต สูญเสียอวัยวะ สายตา หรือทุพพลภาพถาวรสิ้นเชิง เนื่องมาจากอุบัติเหตุ (อ.บ.1)</td>
      <td align="center"><?php echo  number_format($insurance_travel['documentation1'],2)?></td>
    </tr>
	<tr>
      <td height="65">2. เจ็บป่วยระยะสุดท้าย และ/หรือ ภาวะโคม่า และ/หรือ ภาวะสมองตายและระบบประสาทล้มเหลว <br>
      จากกรณีได้รับผลกระทบในการฉีดวัคซีนป้องกันไวรัสโคโรนา 2019 (COVID-19)</td>
      <td align="center"><?php echo  number_format($insurance_travel['documentation2'],2)?></td>
    </tr>
	<tr>
      <td height="65">3. ค่ารักษาพยาบาลผู้ป่วยในกรณีได้รับผลกระทบในการฉีดวัคซีนป้องกันไวรัสโคโรนา 2019 (COVID-19)</td>
      <td align="center"><?php echo  number_format($insurance_travel['documentation3'],2)?></td>
    </tr>
	<tr>
      <td height="65">4. เงินชดเชยปลอบขวัญสำหรับผู้ป่วยใน ในกรณีพักรักษาตัวติดต่อกันไม่น้อยกว่า 5 วัน <br>
      จากกรณีได้รับผลกระทบในการฉีดวัคซีนป้องกันไวรัสโคโรนา 2019 (COVID-19)</td>
      <td align="center"><?php echo  number_format($insurance_travel['documentation4'],2)?></td>
    </tr>
	  
	  
  </tbody>
</table>
	
<p>&nbsp;</p>
</div>	
	
	
	
	
	
	
	
<script>
	window.print();
</script>
</body>
</html>