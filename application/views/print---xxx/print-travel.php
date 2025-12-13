<?php include('phpconfig.php');?>
<?php
	$_POST['DataID']=$_GET['DataID'];
	 $query="SELECT * FROM tbl_insurance_travel_data WHERE id = '".$_POST['DataID']."' ";
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
<title>ประกันท่องเที่ยว</title>
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
	    padding-left: 5px;
		background-color: #FFFFFF}
	
	.border_style {
		border-top: 1px solid #000000;
		border-left: 1px solid #000000;
		border-right: 1px solid #000000;
		border-bottom: 1px solid #000000;		
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
					<img src="<?php echo $pathUpload2.$insurance_Corp['img_logo'];?>"   style="width: 150px; height: auto; border:0px;">
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
			<div class="col-sm-12" style="text-align:center; font-size: 16px">
				<strong>ตารางกรมธรรม์สำหรับธุรกิจนำเที่ยวและมัคคุเทศก์</strong>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12" style="text-align:center; font-size: 14px; padding-bottom: 10px;">
				<strong>TRAVEL ACCIDENT INSURANCE FOR TOUR OPERATORS AND GUIDES POLICY</strong>
			</div>
		</div>
	
	
		<div class="row">
			<div class="col-sm-12">
				
			  <table style="width:100%;margin-left: auto;margin-right: auto;" class="border_style" >					
					<tr>
						<td colspan="2" style="width:60%; height:50px; font-size:10px;">
								<span>รหัสบริษัท<br>Company Code</span>
								<span style="margin-left: 50px;"><?php echo  $insurance_travel['company_id']?></span>
						</td>
					  <td style="font-size:10px;">
								<span>กรมธรรม์เลขที่<br>Policy No.</span>
								<span style="margin-left: 50px;"><?php echo  $insurance_travel['company_id']?></span>
					  </td>
					</tr>
			</table>
				
				
				
				<table style="width:100%; height:50px; margin-left: auto;margin-right: auto; border-bottom: none;" class="border_style">				
						
				  <tr>
					<td width="30%" style="font-size: 10px;">
						<span>1. ผู้ถือกรมธรรม์ : ชื่อและที่อยู่<br>&nbsp;&nbsp;&nbsp;&nbsp;The Policyholder : Name and Address</span>
					</td>							
					<td width="70%" colspan="3" style="font-size: 10px;">
						<?php echo $insurance_travel['cust_name'];?><br>
						<?php echo $insurance_travel['policyholder'];?>
					</td>
				  </tr>
				</table>
				
			  <table style="width:100%; height:50px; margin-left: auto;margin-right: auto; border-bottom: none;" class="border_style">		
				<tr>
							<td style="font-size:10px">
								<span >2. ผู้เอาประกันภัย : ชื่อ-สกุล, เลขที่บัตรประจำตัวที่ใช้อ้างอิง, ผู้รับประโยชน์ Insured Name, Identity Card Number,Beneficiary</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $insurance_travel['assured'];?>
							</td>
				</tr>
				</table>
				
				
				<table style="width:100%; height:50px;margin-left: auto;margin-right: auto; border-bottom: none;" class="border_style">
				
						<tr>
						  <td colspan="3" style="font-size:10px;">
								<div style="display:inline-block">
									<span >4. ระยะเวลาประกันภัย<br>&nbsp;&nbsp;&nbsp;&nbsp;Period of Insurance</span>
									<span style="margin-left: 30px; vertical-align: top"> <?php echo $insurance_travel['insurance_period'];?> ปี</span>
								</div>
								<div style="display:inline-block;margin-left:30px;">
									<span >เริ่มวันที่<br>From</span>
									<span style="margin-left: 30px;"><?php echo GetThaiDate($insurance_travel['insurance_start'])?></span>
								</div>
								<div style="display:inline-block;margin-left:30px;">
									<span >เวลา<br>at</span>
									<span style="margin-left: 30px;"><?php echo $insurance_travel['insurance_start_time'];?> น.</span>
								</div>
								<div style="display:inline-block;margin-left:30px;">
									<span >สิ้นสุดวันที่<br>to</span>
									<span style="margin-left: 30px;"><?php echo GetThaiDate($insurance_travel['insurance_end'])?></span>
								</div>
								<div style="display:inline-block;margin-left:30px;">
									<span >เวลา<br>at</span>
									<span style="margin-left: 30px;"><?php echo $insurance_travel['insurance_end_time'];?> น.</span>
								</div>
							</td>
						</tr>
				</table>
					
			  <table style="width:100%; margin-left: auto;margin-right: auto; border-bottom: none;" class="border_style">						
						<tr>
						  <td colspan="3" style="font-size:10px; height:50px; border-bottom: 1px solid #000000;">
								<span>5. เส้นทางการเดินทาง: <br>&nbsp;&nbsp;&nbsp;&nbsp;Journey: </span>
								<span style="margin-left: 100px;"><?php echo $insurance_travel['travel_route'];?></span>
							</td>
						</tr>
					
						<tr>
						  <td colspan="3" style="font-size:10px;height:50px;">
								<span>6. จำนวนจำกัดความรับผิดชอบ :</span>
								<span style="margin-left: 15px;"><?php echo $insurance_travel['amount'];?></span>
							    <br>&nbsp;&nbsp;&nbsp;&nbsp;Limit of Liability:
							    <span style="margin-left: 60px;">This policy offords coverage only with respect to such result from boily injury for which a sum insured is stated</span>
							</td>
						</tr>
				</table>
				
				<table style="width:100%;margin-left: auto;margin-right: auto; border-bottom: none;" class="border_style">
				
						<tr style="font-size:10px;" class="border_style">
							<td style="text-align:center;width: 60%;" class="b_right">
								<span>ข้อตกลงคุ้มครอง<br>Insuring Agreement</span>
							</td>
							<td width="25%" style="text-align:center;width: 25%;" class="b_right">
								<span>จำนวนเงินเอาประกันภัย (บาท)<br>Sum Insured (Baht)</span>
							</td>
							<td width="20%" style="text-align:center;width: 15%;" class="b_right">
							  <span>เบี้ยประกันภัย (บาท)<br>Premium(Bath)</span>
							</td>
						</tr>
				
					
						<tr style="font-size:10px;" class="border_style">
							<td  class="b_right" valign="top">
								<span>ข้อ 1. เสียชีวิต สูญเสียอวัยวะ สายตา หรือทุพพลภาพถาวรสิ้นเชิง<br>Item 1. Loss of Lite Dismemberment. Loss of Sight or Total Permanent Disability</span>
								<br>
								<span>ข้อ 2. ค่ารักษาพยาบาลต่ออุบัติเหตุแต่ละครั้ง<br>Item 2.  Medical Expenses Each Accident</span>
							</td>
							<td  class="b_right"style="text-align:left" valign="top"> 
								<span>คนละ</span>	<span style="margin-left: 40px;"><?php echo number_format($insurance_travel['life_cost'],2);?></span>
								<br><br>								
								<span>คนละ</span>	<span style="margin-left: 40px;"><?php echo number_format($insurance_travel['medical_accident'],2);?></span>
							</td>
							<td style="text-align:center;" valign="top">
								<span>รวมอยู่ด้วยแล้ว</span>
							</td>
						</tr>
				</table>
				
				<table style="width:100%;margin-left: auto ;margin-right: auto; border-bottom: none; border-top: none;" class="border_style">
						<tr style="font-size:10px;">
							<td colspan="2" style="border-right: 1px solid #000000" >
								<div style="margin-left: 360px;">
									<p>เบี้ยประกันภัยสำหรับภัยเพิ่ม Additional Premium</p>
									<p>เบี้ยประกันภัย Net Premium</p>
									<p>อากร Duty</p>
									<p>ภาษีมูลค่าเพิ่ม Tax</p>
									<p>เบี้ยประกันภัยรวม Total Premium</p>
								</div>
							</td>
							<td width="114px">
								<div style="text-align:right;margin-right: 10px;">
									<p><?php echo number_format($insurance_travel['insurance_premiums'],2);?></p>
									<p><?php echo number_format($insurance_travel['Insurance_price'],2);?></p>
									<p><?php echo number_format($insurance_travel['duty'],2);?></p>
									<p><?php echo number_format($insurance_travel['vat'],2);?></p>
									<p><?php echo number_format($insurance_travel['Insurance_price_total'],2);?></p>
								</div>
							</td>
						</tr>
				</table>
				
				
				<table style="width:100%;margin-left: auto; margin-right: auto;" class="border_style">

						<tr style="font-size:10px;">
							<td colspan="3" height="50" style="border-bottom: 1px solid #000000">
								<span>7. ข้อตกลงคุ้มครอง/เอกสารแนบท้ายที่แนบติด <br> Insuring Agreement/Endorsement Attached</span>
								<span style="margin-left: 50px;"><?php echo $insurance_travel['protection_agreement'];?></span>
							</td>
						</tr>
				
						<tr style="font-size:10px;">
							<td colspan="3" height="50">
								<div style="margin-left:10px;display: inline;">
                                   <span style="margin-left: 10px;"><?php if($insurance_travel['agent']=='1'){?><i class="fa fa-check" aria-hidden="true"></i><?php }?>
									ตัวแทน</span>
									
									<span style="margin-left: 50px;"><?php if($insurance_travel['agent']=='2'){?><i class="fa fa-check" aria-hidden="true"></i><?php }?>
									นายหน้าประกันภัยรายนี้</span>
									
								</div>
	
								<span style="margin-left: 30px;"><?php echo $insurance_travel['agent_name'];?></span>
								<span style="margin-left: 100px;">ใบอนุญาตเลขที่</span>
								<span style="margin-left: 10px;"><?php echo $insurance_travel['license_number'];?></span>
								
								<br>
									<span style="margin-left: 20px;">Agent</span>
									<span style="margin-left: 70px;">Broker</span>
									<span style="margin-left: 290px;">License No.</span>
							</td>
			  	</table>
				
				
				
				<table style="width:100%;margin-left: auto; margin-right: auto;" class="border_style">
					<tr style="font-size:10px;">
						<td height="50" width="25%">
							<span>วันทำสัญญาประกันภัย<br>Agreement made on</span>								
						</td>
					
						<td  height="50" width="25%">
							<span style="margin-left: 15px;"><?php if($insurance_travel['insurance_contract_date']!='0000-00-00'){echo GetThaiDate($insurance_travel['insurance_contract_date']);}?><?php echo GetThaiDate($insurance_travel['insurance_contract_date'])?></span>
						</td>
						
						<td  height="50" width="25%">
							<span>วันทำกรมธรรม์<br>Policy issued on</span>								
						</td>
					
						<td height="50" width="25%">
							<span style="margin-left: 20px;"><?php if($insurance_travel['policy_date']!='0000-00-00'){echo GetThaiDate($insurance_travel['policy_date']);}?></span>
						</td>
					</tr>
				</table>
				
				
				<div style="margin:15px;">
					<p>เพื่อเป็นหลักฐาน บริษัทฯ โดยบุคคลผู้มีอำนาจกระทำแทนบริษัทฯ ได้ลงลายมีชื่อไว้เป็นสำคัญ ณ สำนักงานของบริษัทฯ<br>
					As evidence the Company has caused this policy to be signed by duly authorized persons to be affixed at its office</p>
	
				</div>
							
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: 70px;">
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
		</div>
	</div>
<p align="right" style="padding-top: 30px;">.</p>
<p>&nbsp;</p>
<script>
	window.print();
</script>
</body>
</html>