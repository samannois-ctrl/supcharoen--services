<?php include('phpconfig.php');?>
<?php
	$_POST['DataID']=$_GET['DataID'];
	$querymenu="SELECT * FROM tbl_user_menu WHERE user_ID ='".$_SESSION['adminID']."' AND menu_id = 'menu1' ORDER BY id ASC  ";
		$resultmenu=mysql_query($querymenu);
                                      $menu = mysql_fetch_assoc($resultmenu);
                if($menu['permission']==2){
                    $txtDisable = 'disabled';
                }else{
                    $txtDisable = '';
                }
                   $query="SELECT * FROM tbl_insurance_accident_data WHERE id = '".$_POST['DataID']."' ";
		$resultreceipt_data=mysql_query($query);
		$insurance_travel=mysql_fetch_assoc($resultreceipt_data);
                
                  $query="SELECT COUNT(id) NumInstallment FROM tbl_insurance_travel_installment  WHERE  travel_id = '".$_POST['DataID']."' ";
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
<title>ประกันอุบัติเหตุ</title>
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
<div id="Formaccident" class="fromprint " style="page-break-after: always">

    
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
		  	<div class="col-sm-12" style="text-align: center; font-size: 14px;">
				<span style="margin-left: 100px;"><strong>ตารางกรมธรรม์ประกันภัย</strong></span><span style="float: right; position: relative"><strong>PA_MySave1/1.0</strong></span>
		 	</div>
		</div>	
	
<div class="row">
    <div class="col-sm-12" style="text-align:center; font-size: 12px;">
				<strong>กรมธรรม์ประกันภัยอุบติเหตุและสุขภาพ ยูนิเวอร์ส (ใช้สำหรับการขายช่องทางอื่นๆ ยกเว้นการขายผ่านทางโทรศัพท์)</strong>
		  </div>
		</div>

<table style="width:100%;margin-left: auto;margin-right: auto;" class="T2" border="1">
  <thead>
    <tr>
      <td height="40" colspan="4" align="center" style="font-size:12px;">
          <input type="checkbox" <?php if(($insurance_travel['type']=='1')){ echo "checked";}?> disabled> แบบรายเดี่ยว 
		  <span style="margin-left:25px;"><input type="checkbox" <?php if(($insurance_travel['type']=='2')){ echo "checked";}?> disabled> แบบครอบครัว</span>
		</td>
    </tr>
    <tr>
      <td width="17%" height="40" align="left" valign="middle" style="font-size:12px; border-right: 1px solid #fff;"> <span>รหัสบริษัท</span><span style="margin-left: 2px;"><?php echo  $insurance_travel['company_id']?></span></td>
      <td width="23%" height="40" align="left" valign="middle" style="font-size:12px;">
		  <input type="checkbox" <?php if(($insurance_travel['renewal']=='1')){ echo "checked";}?> disabled> ต่ออายุ 
		  <span style="margin-left: 10px;"><input type="checkbox" <?php if(($insurance_travel['renewal']=='2')){ echo "checked";}?> disabled> ประกันภัยใหม่</span>
		</td>
      <td width="32%" height="40" align="left" valign="middle" style="font-size:12px; border-right: 1px solid #fff;">&nbsp;&nbsp;กรมธรรม์เดิมเลขที่<span style="margin-left: 2px;"><?php echo  $insurance_travel['policy_old_number']?></span></td>
      <td height="40" align="left" valign="middle" style="font-size:12px;">กรมธรรม์เลขที่ <span style="margin-left: 2px;"><?php echo $insurance_travel['policy_number']?></span></td>
    </tr>
  </thead>
  <thead>
    <tr>
      <td height="50" align="left" valign="top" style="font-size: 10px; border-right: 1px solid #fff;"><strong>1. ผู้เอาประกันภัย : <br>
        &nbsp;&nbsp;ชื่อและที่อยู่</strong></td>
      <td height="40" colspan="3" align="left" valign="top" style="font-size: 10px;">
          <?php echo $insurance_travel['cust_name'];?><br>
          <?php echo $insurance_travel['policyholder'];?>
      </td>
    </tr>
  </thead>
	
  <thead>
    <tr>
      <td colspan="4" align="left" style="font-size:10px; padding-left: 0px !important">
        <table width="100%" border="1" cellspacing="0" cellpadding="0" style="font-size:10px">
          <tbody>
            <tr>
              <td width="33%" height="30" align="left"><strong>2. ผู้ได้รับความคุ้มครอง : ชื่อ-นามสกุล</strong></td>
              <td width="22%" height="30" align="center"><strong>เลขประจำตัวประชาชนหรือ<br>
              เลขที่หนังสือเดินทาง</strong></td>
              <td width="8%" height="30" align="center"><strong>เพศ</strong></td>
              <td width="12%" height="30" align="center"><strong>วันเดือนปีเกิด</strong></td>
              <td width="10%" height="30" align="center"><strong>อายุ (ปี)</strong></td>
              <td width="19%" height="30" align="center"><strong>ความสัมพันธ์<br>
              กับผู้เอาประกันภัย</strong></td>
            </tr>
            <tr>
              <td height="30"><?php echo $insurance_travel['protected_name1'];?></td>
              <td height="30" align="center"><?php echo $insurance_travel['protected_number1'];?></td>
              <td height="30" align="center"><?php echo $insurance_travel['protected_sex1'];?></td>
              <td height="30" align="center"><?php echo translateDateToThai($insurance_travel['protected_date1']);?></td>
              <td height="30" align="center"><?php if($insurance_travel['protected_age1']!='0'){echo $insurance_travel['protected_age1'];}?></td>
              <td height="30" align="center"><?php echo $insurance_travel['protected_relationship1'];?></td>
            </tr>
             <tr>
              <td height="30"><?php echo $insurance_travel['protected_name2'];?></td>
              <td height="30" align="center"><?php echo $insurance_travel['protected_number2'];?></td>
              <td height="30" align="center"><?php echo $insurance_travel['protected_sex2'];?></td>
              <td height="30" align="center"><?php echo translateDateToThai($insurance_travel['protected_date2']);?></td>
              <td height="30" align="center"><?php if($insurance_travel['protected_age2']!='0'){echo $insurance_travel['protected_age2'];}?></td>
              <td height="30" align="center"><?php echo $insurance_travel['protected_relationship2'];?></td>
            </tr>
             <tr>
              <td height="30"><?php echo $insurance_travel['protected_name3'];?></td>
              <td height="30" align="center"><?php echo $insurance_travel['protected_number3'];?></td>
              <td height="30" align="center"><?php echo $insurance_travel['protected_sex3'];?></td>
              <td height="30" align="center"><?php echo translateDateToThai($insurance_travel['protected_date3']);?></td>
              <td height="30" align="center"><?php if($insurance_travel['protected_age3']!='0'){echo $insurance_travel['protected_age3'];}?></td>
              <td height="30" align="center"><?php echo $insurance_travel['protected_relationship3'];?></td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
    <tr>
      <td height="35" colspan="4" align="left" style="font-size:10px"><strong>3. ผู้รับประโยชน์และความสัมพันธ์กับผู้ได้รับความคุ้มครองแต่ละราย</strong></td>
    </tr>
    <tr>
      <td height="50" colspan="4" align="left" style="font-size:10px; padding-left: 20px;"><?php echo $insurance_travel['beneficiary'];?></td>
    </tr>
    <tr>
      <td height="50" colspan="4" align="left" style="font-size:10px"><strong>4. ระยะเวลาประกันภัย <?php if($insurance_travel['insurance_period']!=0){echo $insurance_travel['insurance_period'].' ปี';}?> : วันที่กรมธรรม์ประกันภัยเริ่มต้น <?php echo GetThaiDate($insurance_travel['insurance_start']);?> เวลา <?php echo $insurance_travel['insurance_start_time'];?> น. วันที่กรมธรรม์ประกันภัยสิ้นสุด <?php echo GetThaiDate($insurance_travel['insurance_end']);?> เวลา <?php echo $insurance_travel['insurance_end_time'];?> น.</strong> <br>
        &nbsp; &nbsp;(กรมธรรมน์ประกันภัยนี้จะต่ออายุโดยอัตโนมัติ ทั้งนี้ภายใต้เงื่อนไขวันสิ้นสุดการเอาประกันภัยตามที่กำหนดไว้ตามเงื่อนไขของกรมธรรม์ประกันภัย)
      </td>
    </tr>
    <tr>
      <td height="35" colspan="4" align="left" style="font-size:10px;"><strong>5. ความคุ้มครองแผนประกันภัย</strong></td>
    </tr>
    <tr>
      <td height="100" colspan="4" align="left" valign="top" style="font-size:10px; padding-left: 0px !important">
	  <table width="100%" border="1" cellspacing="0" cellpadding="0" style="font-size:10px;">
        <tbody>
          <tr>
            <td rowspan="3" align="center" style="font-weight: bold">ลำดับ</td>
            <td rowspan="3" align="center" style="font-weight: bold">ข้อตกลงคุ้มครอง/เอกสารแนบท้าย</td>
            <td colspan="5" align="center" style="font-weight: bold">จำนวนเงินเอาประกันภัย (บาท)</td>
          </tr>
          <tr>
            <td rowspan="2" align="center" style="font-weight: bold">ผู้เอาประกันภัย</td>
            <td colspan="3" align="center" style="font-weight: bold">บุคคลในครอบครัว</td>
            <td rowspan="2" align="center" style="font-weight: bold">ความรับผิดส่วนแรก<br>
              (บาทหรือวัน)</td>
          </tr>
          <tr>
            <td align="center" style="font-weight: bold">คู่สมรส</td>
            <td align="center" style="font-weight: bold">บุตร (ต่อคน)</td>
            <td align="center" style="font-weight: bold">อื่นๆ (ระบุ)</td>
          </tr>
          <tr>
            <td height="30" align="center">&nbsp;</td>
            <td height="30" align="left">&nbsp;</td>
            <td height="30" colspan="5" align="center">------------------------ระบุไว้ในเอกสารแนบกรมธรรม์ประกันภัย------------------------</td>
            </tr>
          <tr>
            <td height="30" align="center">6.</td>
            <td height="30" align="left">การสิ้นสุดความคุ้มครองตามข้อ 10. เรื่องการสิ้นสุดความคุ้มครอง ด้วยเหตุอายุครบ</td>
            <td height="30" colspan="5" align="center">------------------------ระบุไว้ในเอกสารแนบกรมธรรม์ประกันภัย------------------------</td>
            </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
     	<td height="35" colspan="4" align="left" valign="middle" style="font-size:10px;">7. เบี้ยประกันภัยนี้มีการปรับเบี้ยประกันภัยตามอายุ 
			<span style="font-size:12px;margin-left:25px;"><input type="checkbox" <?php if(($insurance_travel['insurance_price']=='1')){ echo "checked";}?> disabled> ไม่มี </span>
			<span style="margin-left:25px;"><input type="checkbox" <?php if(($insurance_travel['insurance_price']=='2')){ echo "checked";}?> disabled> มี (ถ้ามี ให้ระบุไว้ในเอกสารแนบกรมธรรม์ประกันภัย)</span>
		</td>
    </tr>
    <tr>
      <td height="35" colspan="4" align="left" valign="middle" style="font-size:10px">8. งวดการชำระเบี้ยประกันภัย 
		  <span style="font-size:12px; margin-left:20px;"><input type="checkbox" <?php if(($insurance_travel['installment']=='1')){ echo "checked";}?> disabled> รายเดือน</span> 
		  <span style="font-size:12px; margin-left:20px;"><input type="checkbox" <?php if(($insurance_travel['installment']=='2')){ echo "checked";}?> disabled> รายปี</span>
		  <span style="font-size:12px; margin-left:20px;"><input type="checkbox" <?php if(($insurance_travel['installment']=='3')){ echo "checked";}?> disabled> ชำระครั้งเดียว</span> 
		  <span style="font-size:12px; margin-left:20px;"><input type="checkbox" <?php if(($insurance_travel['installment']=='4')){ echo "checked";}?> disabled> ชำระครั้งเดียวแบ่งจ่าย 6 งวด</span>
		</td>
    </tr>
    <tr>
      	<td height="35" colspan="4" align="left" valign="middle" style="font-size:10px">9. เบี้ยประกันภัยสุทธิต่องวด
		 	<span style="font-size:12px; margin-left:20px;"> <?php echo number_format($insurance_travel['totalprice_installment'],2);?> บาท</span> 
		  	<span style="font-size:12px; margin-left:20px;">อากรแสตมป์ </span>
		  	<span style="font-size:12px; margin-left:20px;"><?php echo number_format($insurance_travel['revenue_stamp'],2);?> บาท</span> 
		  	<span style="font-size:12px; margin-left:20px;">ภาษี</span>
			<span style="font-size:12px; margin-left:20px;"><?php echo number_format($insurance_travel['tax'],2);?> บาท </span>
		  	<span style="font-size:12px; margin-left:20px;">เบี้ยประกันภัยรวม</span> 
		  	<span style="font-size:12px; margin-left:20px;"><?php echo number_format($insurance_travel['total_price'],2);?> บาท</span>
			
		</td>
    </tr>
    <tr>
      <td height="35" colspan="4" align="left" valign="middle" style="font-size:10px">10 เอกสารแนบท้าย / ใบสลักหลังกรมธรรม์ประกันภัยที่แนบติด 
		  <span style="font-size:12px; margin-left:20px;"> <?php echo $insurance_travel['attach'];?></span>
	  </td>
    </tr>
    <tr>
      <td height="35" colspan="4" align="left" valign="middle" style="font-size:10px">11. วันทำสัญญาประกันภัย 
                  <span style="font-size:12px; margin-left:25px;"><?php if($insurance_travel['contract_startdate']!='0000-00-00'){echo GetThaiDate($insurance_travel['contract_startdate']);}?></span> 
		  <span style="font-size:12px; margin-left:25px;">วันทำกรมธรรม์</span> 
                  <span style="font-size:12px; margin-left:25px;"><?php if($insurance_travel['contract_enddate']!='0000-00-00'){echo GetThaiDate($insurance_travel['contract_enddate']);}?></span> 
	  </td>
    </tr>
    <tr>
      <td height="35" colspan="4" align="left" valign="middle" style="font-size:10px">
		  <span style="font-size:12px; margin-left:25px;"><input type="checkbox" <?php if(($insurance_travel['type_work']=='1')){ echo "checked";}?> disabled> งานตรง</span> 
		  <span style="font-size:12px; margin-left:25px;"><input type="checkbox" <?php if(($insurance_travel['type_work']=='2')){ echo "checked";}?> disabled> ตัวแทน</span> 
		  <span style="font-size:12px; margin-left:25px;"><input type="checkbox" <?php if(($insurance_travel['type_work']=='3')){ echo "checked";}?> disabled> 
		  นายหน้าประกันภัยรายนี้</span> 
		  <span style="font-size:12px; margin-left:10px;"><?php echo $insurance_travel['broker_name'];?></span>
		  <span style="font-size:12px; margin-left:25px;">ใบอนุญาตเลขที่</span>
		  <span style="font-size:12px; margin-left:10px;"><?php echo $insurance_travel['license_number'];?></span>
		</td>
    </tr>
  </thead>  
 
</table>
<br>
<p>เพื่อเป็นหลักฐาน บริษัทฯ โดยบุคคลผู้มีอำนาจกระทำการแทนบริษัทฯ ได้ลงลายมือชื่อไว้เป็นสำคัญ ณ สำนักงานของบริษัทฯ</p>
<p>&nbsp;</p>
					
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
	
	
	
<div id="Formaccident2" class="fromprint " style="page-break-after: always;margin-top: 20px">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tbody>
		<tr>
                    <td valign="top" width="13%">
                        <?php if(($extension=='jpg')||($extension=='jpeg')||($extension=='bmp')||($extension=='gif')||($extension=='png')){ ?>
					<img src="<?php echo $pathUpload2.$insurance_Corp['img_logo'];?>"  style="width: 150px; height: auto; border:0px;" >
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
		  <td valign="top" width="17%">&nbsp;			 		
						 
		 </td>
		</tr>
	  </tbody>
	</table>	
	
  <p>&nbsp;</p>
		<div class="row">
		  <div class="col-sm-12" style="text-align:center; font-size: 12px;">
				<strong>เอกสารแนบติดตารางกรมธรรม์ประกันอุบัติเหตุและสุขภาพ ยูนิเวอร์ส
			    <br>(ใช้สำหรับการขายผ่านช่องทางอื่นๆ ยกเว้นการขายผ่านทางโทรศัพท์)</strong>
		  </div>
		</div>	
	
	  <div class="row">
		  <div class="col-sm-12" style="text-align:left; font-size: 12px;">
			  <p>&nbsp;</p>
				เป็นที่เข้าใจและตกลงกันว่ากรมธรรม์ประกันภัยเลขที่ <?php echo $insurance_travel['policy_number']?> <span style="font-size:12px; margin-left:25px;">รายละเอียดเพิ่มเติมดังต่อไปนี้</span><br>
			  รายละเอียดของความคุ้มครองแผนกระกันภัย
		  </div>
	  </div>
	
<table width="100%" border="1" cellspacing="0" cellpadding="0" style="font-size: 10px;">
  <tbody>
    <tr>
      <td rowspan="3" align="center" style="font-weight: bold">ลำดับ</td>
      <td rowspan="3" align="center" style="font-weight: bold">ข้อตกลงคุ้มครอง/เอกสารแนบท้าย</td>
      <td colspan="4" align="center" style="font-weight: bold">จำนวนเงินเอาประกันภัย (บาท)</td>
      </tr>
    <tr>
      <td width="12%" rowspan="2" align="center" style="font-weight: bold">ผู้เอาประกันภัย</td>
      <td colspan="3" align="center" style="font-weight: bold">บุคคลในครอบครัว</td>
      </tr>
    <tr>
      <td width="10%" align="center" style="font-weight: bold">คู่สมรส</td>
      <td width="10%" align="center" style="font-weight: bold">บุตร (ต่อคน)</td>
      <td width="10%" align="center" style="font-weight: bold">อื่นๆ (ระบุ)</td>
    </tr>
    <tr>
      <td height="70" align="center">1</td>
      <td height="70" align="left" style="width: 550px; margin: 4px;">ผลประโยชน์การเสียชีวิต การสูญเสียอวัยวะ สายตา หรือทุพพลภาพถาวรสิ้นเชิง (อบ.1)<br>
        Loss of Life. Dismemberment, Loss of Sight or Total Permanet Disability (PA.1) </td>
      <td width="12%" height="70" align="center"><?php if($insurance_travel['assured1'] != ''){ echo number_format(str_replace(',', '', $insurance_travel['assured1']) , 2); }?></td>
      <td width="10%" height="70" align="center"><?php if($insurance_travel['spouse1'] != ''){ echo number_format(str_replace(',', '', $insurance_travel['spouse1']) , 2); }?></td>
      <td width="10%" height="70" align="center"><?php if($insurance_travel['family_person1'] != '0'){ echo $insurance_travel['family_person1']; }?></td>
      <td width="10%" height="70" align="center"><?php if($insurance_travel['other1'] != ''){ echo number_format(str_replace(',', '', $insurance_travel['other1']) , 2); }?></td>
      </tr>
    <tr>
      <td height="70" align="center">1.1</td>
      <td height="70" align="left">การกำจัดความรับผิด (การถูกฆาตกรรม หรือถูกทำร้ายร่างกาย) หรือ<br>
        Limitation of cover (Murder and assault) or</td>
       <td width="12%" height="70" align="center"><?php if($insurance_travel['assured2'] != ''){ echo number_format(str_replace(',', '', $insurance_travel['assured2']) , 2); }?></td>
      <td width="10%" height="70" align="center"><?php if($insurance_travel['spouse2'] != ''){ echo number_format(str_replace(',', '', $insurance_travel['spouse2']) , 2); }?></td>
      <td width="10%" height="70" align="center"><?php if($insurance_travel['family_person2'] != '0'){ echo $insurance_travel['family_person2']; }?></td>
      <td width="10%" height="70" align="center"><?php if($insurance_travel['other2'] != ''){ echo number_format(str_replace(',', '', $insurance_travel['other2']) , 2); }?></td>
      </tr>
    <tr>
      <td height="70" align="center">1.2</td>
      <td height="70" align="left">การขยายความคุ้มครอง (การขับขี่หรือโดยสารรถจักรยานยนต์)<br>
        Extended cover (Diving or riding as a passanger on a motocycle)</td>
       <td width="12%" height="70" align="center"><?php if($insurance_travel['assured3'] != ''){ echo number_format(str_replace(',', '', $insurance_travel['assured3']) , 2); }?></td>
      <td width="10%" height="70" align="center"><?php if($insurance_travel['spouse3'] != ''){ echo number_format(str_replace(',', '', $insurance_travel['spouse3']) , 2); }?></td>
      <td width="10%" height="70" align="center"><?php if($insurance_travel['family_person3'] != '0'){ echo $insurance_travel['family_person3']; }?></td>
      <td width="10%" height="70" align="center"><?php if($insurance_travel['other3'] != ''){ echo number_format(str_replace(',', '', $insurance_travel['other3']) , 2); }?></td>
      </tr>
    <tr>
      <td height="70" align="center">2</td>
      <td height="70" align="left">ผลประโยชน์ค่ารักษาพยาบาลเนื่องจากอุบัติเหตุ<br>
        Medicl exoebse caused by accident</td>
      <td width="12%" height="70" align="center"><?php if($insurance_travel['assured4'] != ''){ echo number_format(str_replace(',', '', $insurance_travel['assured4']) , 2); }?></td>
      <td width="10%" height="70" align="center"><?php if($insurance_travel['spouse4'] != ''){ echo number_format(str_replace(',', '', $insurance_travel['spouse4']) , 2); }?></td>
      <td width="10%" height="70" align="center"><?php if($insurance_travel['family_person4'] != '0'){ echo $insurance_travel['family_person4']; }?></td>
      <td width="10%" height="70" align="center"><?php if($insurance_travel['other4'] != ''){ echo number_format(str_replace(',', '', $insurance_travel['other4']) , 2); }?></td>
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