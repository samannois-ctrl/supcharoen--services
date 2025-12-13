<?php include('phpconfig.php');?>
<?php include 'form_function.php';
	//------------------------------------------
$datanow = date("Y-m-d");
    $number_days = date("t");
														  $date1 = date("Y-m");
														  $date2 = $date1.'-01';
														  $date3 = $date1.'-'.$number_days;
          $quotation_no = get_claimNO_autoquo($date2,$date3);  
                
                $queryquo="SELECT *   FROM tbl_quotation_data WHERE id = '".$_GET['dataID']."' ";
		$resultquo=mysql_query($queryquo);
		$quoData=mysql_fetch_assoc($resultquo);
   $querycut="SELECT *   FROM tbl_customer_temp WHERE id = '".$quoData['custID']."' ";
		$resultcut=mysql_query($querycut);
		$cutData=mysql_fetch_assoc($resultcut);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>ใบเสนอราคา ประกันภัยรถยนต์</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <!-- Favicon -->
		<link href="Form/style_font_form.css" rel="stylesheet">
		
	 <style>
            .dotted {border: 2px solid #000000; border-radius: 15px;}
            td span {width: 60px;}
            #tdwhn {border: 1px solid white; }
            #sp p{
                line-height: 1;
				margin: 0px;
            }
            #footer{
                float:right;font-size: 10px;
				bottom: 0px;
				margin-right: auto;
				margin-left: auto;
		 	}
	  </style>
		
    </head>
    
	
	
<body>
<table width="1000" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td width="110" rowspan="2" align="left"><img src="assets/images/logo3.png" width="100" height="auto"></td>
      <td rowspan="2" align="left"><font style="font-family: 'sarabun_regular', sans-serif; font-size: 16pt; font-weight: 600; line-height:24px">บริษัท พัฒนสิน โบรกเกอร์ จำกัด </font><font style="font-family: 'sarabun_regular', sans-serif; font-size: 12pt; font-weight: 600;">(สำนักงานใหญ่)</font><br>
        <font style="font-family: 'sarabun_regular', sans-serif; font-size: 12pt; font-weight: 600; line-height:32px">ทะเบียนเลขที่ ว00007/2564</font><br>
        <font style="font-family: 'sarabun_regular', sans-serif; font-size: 12pt; line-height: 24px">86/9 หมู่ที่9 ตำบลชิงโค อำเภอสิงหนคร จังหวัดสงขลา 90280<br>
          โทรศัพท์ 066-002-4004</font></td>
      <td width="278" align="right" style="text-align: center; padding: 5px; font-size: 20pt;font-weight: 600; " height="100" class="dotted">ใบเสนอราคา<br>
        <span style="font-size: 16pt">QUOTATION</span></td>
    </tr>
    <tr>
      <td colspan="2" align="right"><table width="100%" border="0" cellspacing="5" cellpadding="0">
        <tr>
          <td width="55%" height="37" align="right" valign="bottom"><strong>วันที่พิมพ์ :</strong></td>
          <td width="45%" height="37" align="right" valign="bottom"><?php echo  translateDateToThai($quoData['date_input'])?></td>
        </tr>
        <tr>
          <td height="25" align="right"><strong>เลขที่ใบเสนอราคา :</strong></td>
          <td height="25" align="right"><?php echo $quoData['quotation_no']?></td>
        </tr>
        <tbody>
        </tbody>
      </table></td>
    </tr>
  </tbody>
</table>
<table width="1000" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td width="700" valign="bottom">&nbsp;&nbsp;<strong>ผู้เอาประกันภัย : </strong><?php if($quoData['cust_status_Legal']!='1'){?>คุณ <?php }?><?php echo $quoData['quo_cusname']?> <?php echo $quoData['quo_cus_sname']?></td>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="table6">
        <tbody>
          <tr>
            <td height="35" align="center" bgcolor="#fbe4a0"><strong>ลักษณะการใช้งาน</strong></td>
          </tr>
          <tr>
            <td height="35" align="center" >
                <?php if($quoData['quo_operating']=='1'){
                    $quo_operating = 'ส่วนบุคคล';
                }else if($quoData['quo_operating']=='2'){
                      $quo_operating = 'ใช้เพื่อการพาณิชย์';
                }else if($quoData['quo_operating']=='3'){
                      $quo_operating = 'ใช้รับจ้างหรือให้เช่า';
                }else if($quoData['quo_operating']=='4'){
                      $quo_operating = 'ใช้เพื่อการพาณิชย์พิเศษ<br>ใช้ขนส่งสินค้าความเสี่ยงสูง';
                }else{
                    $quo_operating = '';
                }?>
                <span <?php if($quoData['quo_operating']=='4'){?>style="line-height:1.5"<?php }?>><?php echo $quo_operating?></span>
			</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
  </tbody>
</table>
<br>
<table width="1000" border="0" cellspacing="0" cellpadding="0" class="table6">
  <tbody>
    <tr>
      <td width="69" height="40" align="center" bgcolor="#047bf8" style="color: #FFF">รหัสรถ</td>
      <td width="214" height="40" align="center" bgcolor="#047bf8" style="color: #FFF">ยี่ห้อ/รุ่น</td>
      <td width="161" height="40" align="center" bgcolor="#047bf8" style="color: #FFF">ป้ายทะเบียน</td>
      <td width="245" height="40" align="center" bgcolor="#047bf8" style="color: #FFF">เลขตัวถัง/แบบตัวถัง</td>
      <td width="120" height="40" align="center" bgcolor="#047bf8" style="color: #FFF">ปี/รุ่น</td>
      <td width="191" height="40" align="center" bgcolor="#047bf8" style="color: #FFF">จำนวนที่นั่ง/ขนาด/น้ำหนัก</td>
    </tr>
    <tr>
      <td height="40" align="center"><?php echo $quoData['quocar_id']?></td>
      <td height="40" align="center"><?php echo $quoData['quocar_brand']?></td>
      <td height="40" align="center"><?php echo $quoData['quocar_license_plate']?></td>
      <td height="40" align="center"><?php echo $quoData['quocar_bodyno']?></td>
      <td height="40" align="center"><?php echo $quoData['quocar_year']?></td>
      <td height="40" align="center"><?php echo $quoData['quocar_seats']?></td>
    </tr>
  </tbody>
</table>
<table width="1000" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height="80" style="line-height: 26px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;บริษัท พัฒนสิน โบรกเกอร์ จำกัด มีความยินดีเป็นอย่างยิ่งที่ได้มีโอกาสเสนอเงื่อนไขความคุ้มครองและประกันภัยของการประกันภัยรถยนต์ และบริการต่างๆ ตามรายละเอียดดังต่อไปนี้ </td>
    </tr>
  </tbody>
</table>
<table class="table6" width="1000" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height="25" colspan="3"   <?php if(($quoData['quo_text1']!='')||($quoData['quo_text2']!='')||($quoData['quo_text1']!='')){?>rowspan="3"<?php }else{?>rowspan="2"<?php }?> align="center" bgcolor="#FFFFFF" style="font-size:13pt; border-top: 2px solid #000; border-bottom: 2px solid #000"><strong>รายการความคุ้มครอง</strong></td>
      <?php $querycorp="SELECT * FROM tbl_insurance_corp WHERE id = '".$quoData['quo_corp1']."' ";
		$resultcorp = mysql_query($querycorp);
                $datacorp=mysql_fetch_assoc($resultcorp);
                  $querypackage="SELECT a.id AS dataID, a.corp_id , a.insurance_id , a.type_package , a.package_price1,a.package_price1_1 , a.package_price2 , a.package_price2_1 , a.package_price3,a.package_price3_1,a.package_price3_2 , a.package_price4 , a.package_price5 , a.package_price6 ,a.package_price7,a.package_price8,a.insurance_price, b.insurance_name    FROM  tbl_clam_package a"
			." LEFT JOIN   tbl_insurance_name b ON a.insurance_id=b.id "
			." WHERE a.id = '".$quoData['quo_insurance1']."' ";
                  $resultpackage = mysql_query($querypackage);
                $datapackage=mysql_fetch_assoc($resultpackage);
                   if($datapackage['type_package']=='1'){
                            $type_package = 'ซ่อมอู่';
                        }else if($datapackage['type_package']=='2'){
                             $type_package = 'ซ่อมห้าง';
                        }
		?>
      <td width="149" height="79" align="center" bgcolor="#FFFFFF" style="line-height: 23px; border-top: 2px solid #000;"><strong>บ.<?php echo $datacorp['corp_name']?><br>
        <?php echo $datapackage['insurance_name']?><br>
      <?php echo $type_package?><br>
      </strong></td>
      <?php if($quoData['quo_corp2']!='0'){?>
      <?php $querycorp2="SELECT * FROM tbl_insurance_corp WHERE id = '".$quoData['quo_corp2']."' ";
		$resultcorp2 = mysql_query($querycorp2);
                $datacorp2=mysql_fetch_assoc($resultcorp2);
                  $querypackage2="SELECT a.id AS dataID, a.corp_id , a.insurance_id , a.type_package , a.package_price1,a.package_price1_1 , a.package_price2 , a.package_price2_1 , a.package_price3,a.package_price3_1,a.package_price3_2 , a.package_price4 , a.package_price5 , a.package_price6 ,a.package_price7,a.package_price8,a.insurance_price, b.insurance_name    FROM  tbl_clam_package a"
			." LEFT JOIN   tbl_insurance_name b ON a.insurance_id=b.id "
			." WHERE a.id = '".$quoData['quo_insurance2']."' ";
                  $resultpackage2 = mysql_query($querypackage2);
                $datapackage2=mysql_fetch_assoc($resultpackage2);
                   if($datapackage2['type_package']=='1'){
                            $type_package2 = 'ซ่อมอู่';
                        }else if($datapackage2['type_package']=='2'){
                             $type_package2 = 'ซ่อมห้าง';
                        }
		?>
      <td width="149" align="center" bgcolor="#FFFFFF" style="line-height: 23px; border-top: 2px solid #000;"><strong>บ.<?php echo $datacorp2['corp_name']?><br>
      <?php echo $datapackage2['insurance_name']?><br>
      <?php echo $type_package2?><br>
      </strong></td>
      <?php }?>
      <?php if($quoData['quo_corp3']!='0'){?>
      <?php $querycorp3="SELECT * FROM tbl_insurance_corp WHERE id = '".$quoData['quo_corp3']."' ";
		$resultcorp3 = mysql_query($querycorp3);
                $datacorp3=mysql_fetch_assoc($resultcorp3);
                  $querypackage3="SELECT a.id AS dataID, a.corp_id , a.insurance_id , a.type_package , a.package_price1,a.package_price1_1 , a.package_price2 , a.package_price2_1 , a.package_price3,a.package_price3_1,a.package_price3_2 , a.package_price4 , a.package_price5 , a.package_price6 ,a.package_price7,a.package_price8,a.insurance_price, b.insurance_name    FROM  tbl_clam_package a"
			." LEFT JOIN   tbl_insurance_name b ON a.insurance_id=b.id "
			." WHERE a.id = '".$quoData['quo_insurance3']."' ";
                  $resultpackage3 = mysql_query($querypackage3);
                $datapackage3=mysql_fetch_assoc($resultpackage3);
                   if($datapackage3['type_package']=='1'){
                            $type_package3 = 'ซ่อมอู่';
                        }else if($datapackage3['type_package']=='2'){
                             $type_package3 = 'ซ่อมห้าง';
                        }
		?>
      <td width="153" align="center" bgcolor="#FFFFFF" style="line-height: 23px; border-top: 2px solid #000;"><strong>บ.<?php echo $datacorp3['corp_name']?><br>
      <?php echo $datapackage3['insurance_name']?><br>
      <?php echo $type_package3?><br>
      </strong></td>
      <?php }?>
    </tr>
    <?php if(($quoData['quo_text1']!='')||($quoData['quo_text2']!='')||($quoData['quo_text1']!='')){?>
    <tr>
      <td width="181" height="40" align="center" bgcolor="#FFFFFF" ><strong><?php echo $quoData['quo_text1']?></strong></td>
      <?php if($quoData['quo_corp2']!='0'){?>
      <td height="40" align="center" bgcolor="#FFFFFF" ><strong><?php echo $quoData['quo_text2']?></strong></td>
      <?php }?>
      <?php if($quoData['quo_corp3']!='0'){?>
      <td height="40" align="center" bgcolor="#FFFFFF" ><strong><?php echo $quoData['quo_text3']?></strong></td>
      <?php }?>
    </tr>
    <?php }?>
    <tr>
      <td height="39" align="center" bgcolor="#FFFFFF" style="border-bottom: 2px solid #000"><strong>
      วงเงินคุ้มครอง</strong></td>
      <?php if($quoData['quo_corp2']!='0'){?>
      <td height="39" align="center" bgcolor="#FFFFFF" style="border-bottom: 2px solid #000"><strong>วงเงินคุ้มครอง</strong></td>
      <?php }?>
      <?php if($quoData['quo_corp3']!='0'){?>
      <td height="39" align="center" bgcolor="#FFFFFF" style="border-bottom: 2px solid #000"><strong>วงเงินคุ้มครอง</strong></td>
      <?php }?>
    </tr>
    <tr>
      <td height="33" colspan="2" bgcolor="#FFFFFF" style="border-right: none;">1) ความเสียหายต่อชีวิต ร่างกาย หรืออนามัย บุคคลภายนอก      </td>
      <td width="140" height="33" align="center" bgcolor="#FFFFFF" style="border-left: none !important">: ต่อคน</td>
      <td height="33" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; "><?php echo number_format($quoData['quo_price1_c1'],2);?></td>
      <?php if($quoData['quo_corp2']!='0'){?>
      <td height="33" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; "><?php echo number_format($quoData['quo_price1_c2'],2);?></td>
      <?php }?>
      <?php if($quoData['quo_corp3']!='0'){?>
      <td height="33" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; "><?php echo number_format($quoData['quo_price1_c3'],2);?></td>
      <?php }?>
    </tr>
    <tr>
      <td height="33" colspan="2" bgcolor="#FFFFFF" style="border-right: none;">(Limit Liability for Bodily or Death)</td>
      <td height="33" align="center" bgcolor="#FFFFFF" style="border-left: none;">: ต่อครั้ง</td>
      <td height="33" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; "><?php echo number_format($quoData['quo_price1_1_c1'],2);?></td>
      <?php if($quoData['quo_corp2']!='0'){?>
      <td height="33" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; "><?php echo number_format($quoData['quo_price1_1_c2'],2);?></td>
      <?php }?>
      <?php if($quoData['quo_corp3']!='0'){?>
      <td height="33" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; "><?php echo number_format($quoData['quo_price1_1_c3'],2);?></td>
      <?php }?>
    </tr>
    <tr>
      <td height="33" colspan="2" bgcolor="#FFFFFF" style="border-right: none;">2) ความเสียหายต่อทรัพย์สิน บุคคลภายนอก</td>
      <td height="33" align="center" bgcolor="#FFFFFF" style="border-left: none;">: ต่อครั้ง</td>
      <td height="33" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; "><?php echo number_format($quoData['quo_price2_c1'],2);?></td>
      <?php if($quoData['quo_corp2']!='0'){?>
      <td height="33" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; "><?php echo number_format($quoData['quo_price2_c2'],2);?></td>
      <?php }?>
      <?php if($quoData['quo_corp3']!='0'){?>
      <td height="33" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; "><?php echo number_format($quoData['quo_price2_c3'],2);?></td>
      <?php }?>
    </tr>
    <tr>
      <td height="33" colspan="2" bgcolor="#FFFFFF" style="border-right: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.1) ความเสียหายส่วนแรก (Deductible)</td>
      <td height="33" align="center" bgcolor="#FFFFFF" style="border-left: none;">: ต่อครั้ง</td>
      <td height="33" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; "><?php echo number_format($quoData['quo_price2_1_c1'],2);?></td>
      <?php if($quoData['quo_corp2']!='0'){?>
      <td height="33" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; "><?php echo number_format($quoData['quo_price2_1_c2'],2);?></td>
      <?php }?>
      <?php if($quoData['quo_corp3']!='0'){?>
      <td height="33" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; "><?php echo number_format($quoData['quo_price2_1_c3'],2);?></td>
      <?php }?>
    </tr>
    <tr>
      <td height="30" colspan="6" bgcolor="#E8E8E8" style="background-color: #E3E3E3;border-top: 2px solid #000; border-bottom: 2px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>ความคุ้มครองรถยนต์ตามทุนประกันภัย</strong></td>
    </tr>
    <tr>
      <td height="30" colspan="2" bgcolor="#FFFFFF" style="border-right: none;">3) ความเสียหายต่อตัวรถคันเอาประกันภัย (Own Damage)</td>
      <td height="30" align="center" bgcolor="#FFFFFF" style="border-left: none;">: ต่อครั้ง</td>
      <td height="30" align="right" bgcolor="#FFFFFF" style="color: red; padding-right: 10px; "><strong><?php echo number_format($quoData['quo_price3_c1'],2);?></strong></td>
      <?php if($quoData['quo_corp2']!='0'){?>
      <td height="30" align="right" bgcolor="#FFFFFF" style="color: red; padding-right: 10px; "><strong><?php echo number_format($quoData['quo_price3_c2'],2);?></strong></td>
      <?php }?>
      <?php if($quoData['quo_corp3']!='0'){?>
      <td height="30" align="right" bgcolor="#FFFFFF" style="color: red; padding-right: 10px; "><strong><?php echo number_format($quoData['quo_price3_c3'],2);?></strong></td>
      <?php }?>
    </tr>
    <tr>
      <td height="33" colspan="2" bgcolor="#FFFFFF" style="border-right: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.1) เนื่องจากภัยน้ำท่วม </td>
      <td height="33" align="center" bgcolor="#FFFFFF" style="border-left: none;">: ต่อครั้ง</td>
      <td height="33" align="right" bgcolor="#FFFFFF" style="color: red; padding-right: 10px; "><strong><?php echo number_format($quoData['quo_price3_1_c1'],2);?></strong></td>
      <?php if($quoData['quo_corp2']!='0'){?>
      <td height="33" align="right" bgcolor="#FFFFFF" style="color: red; padding-right: 10px; "><strong><?php echo number_format($quoData['quo_price3_1_c2'],2);?></strong></td>
      <?php }?>
      <?php if($quoData['quo_corp3']!='0'){?>
      <td height="33" align="right" bgcolor="#FFFFFF" style="color: red; padding-right: 10px; "><strong><?php echo number_format($quoData['quo_price3_1_c3'],2);?></strong></td>
      <?php }?>
    </tr>
    <tr>
      <td height="33" colspan="2" bgcolor="#FFFFFF" style="border-right: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.2) ความเสียหายส่วนแรก </td>
      <td height="33" align="center" bgcolor="#FFFFFF" style="border-left: none;">: ต่อครั้ง</td>
      <td height="33" align="right" bgcolor="#FFFFFF" style="color: red; padding-right: 10px; "><strong><?php echo number_format($quoData['quo_price3_2_c1'],2);?></strong></td>
      <?php if($quoData['quo_corp2']!='0'){?>
      <td height="33" align="right" bgcolor="#FFFFFF" style="color: red; padding-right: 10px; "><strong><?php echo number_format($quoData['quo_price3_2_c2'],2);?></strong></td>
      <?php }?>
      <?php if($quoData['quo_corp3']!='0'){?>
      <td height="33" align="right" bgcolor="#FFFFFF" style="color: red; padding-right: 10px; "><strong><?php echo number_format($quoData['quo_price3_2_c3'],2);?></strong></td>
      <?php }?>
    </tr>
    <tr>
      <td height="33" colspan="2" bgcolor="#FFFFFF" style="border-right: none;">4) รถยนต์สูญหาย / ไฟไหม้ (Fire &amp; Theif)</td>
      <td height="33" align="center" bgcolor="#FFFFFF" style="border-left: none;">: ต่อครั้ง</td>
      <td height="33" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; color:red;"><strong><?php echo number_format($quoData['quo_price4_c1'],2);?></strong></td>
      <?php if($quoData['quo_corp2']!='0'){?>
      <td height="33" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; color:red;"><strong><?php echo number_format($quoData['quo_price4_c2'],2);?></strong></td>
      <?php }?>
      <?php if($quoData['quo_corp3']!='0'){?>
      <td height="33" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; color:red;"><strong><?php echo number_format($quoData['quo_price4_c3'],2);?></strong></td>
      <?php }?>
    </tr>
    <tr>
      <td height="30" colspan="3" bgcolor="#E8E8E8" style="background-color: #E3E3E3;border-top: 2px solid #000; border-bottom: 2px solid #000">&nbsp;&nbsp;&nbsp;<strong>ความคุ้มครองตามเอกสารแนบท้าย</strong> <font style="font-size: 10pt;">(Additional Coverage Per Endorsement)</font></td>
      <td height="30" align="center" style="border-top: 2px solid #000; border-bottom: 2px solid #000"><strong><?php echo $quoData['quo_perple1'];?> คน</strong></td>
      <?php if($quoData['quo_corp2']!='0'){?>
      <td height="30" align="center" style="border-top: 2px solid #000; border-bottom: 2px solid #000"><strong><?php echo $quoData['quo_perple2'];?> คน</strong></td>
      <?php }?>
      <?php if($quoData['quo_corp3']!='0'){?>
      <td height="30" align="center" style="border-top: 2px solid #000; border-bottom: 2px solid #000"><strong><?php echo $quoData['quo_perple3'];?> คน</strong></td>
      <?php }?>
    </tr>
    <tr>
      <td height="33" colspan="2" bgcolor="#FFFFFF" style="border-right: none;">5) อุบัติเหตุส่วนบุคคล (Personal Accident)</td>
      <td height="33" align="center" bgcolor="#FFFFFF" style="border-left: none;">: ต่อคน</td>
      <td height="33" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; "><?php echo number_format($quoData['quo_price5_c1'],2);?></td>
      <?php if($quoData['quo_corp2']!='0'){?>
      <td height="33" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; "><?php echo number_format($quoData['quo_price5_c2'],2);?></td>
      <?php }?>
      <?php if($quoData['quo_corp3']!='0'){?>
      <td height="33" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; "><?php echo number_format($quoData['quo_price5_c3'],2);?></td>
      <?php }?>
    </tr>
    <tr>
      <td height="33" colspan="2" bgcolor="#FFFFFF" style="border-right: none;">6) ค่ารักษาพยาบาล (Medical Expense)</td>
      <td height="33" align="center" bgcolor="#FFFFFF" style="border-left: none;">: ต่อคน</td>
      <td height="33" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; "><?php echo number_format($quoData['quo_price6_c1'],2);?></td>
      <?php if($quoData['quo_corp2']!='0'){?>
      <td height="33" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; "><?php echo number_format($quoData['quo_price6_c2'],2);?></td>
      <?php }?>
      <?php if($quoData['quo_corp3']!='0'){?>
      <td height="33" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; "><?php echo number_format($quoData['quo_price6_c3'],2);?></td>
      <?php }?>
    </tr>
    <tr>
      <td height="33" colspan="2" bgcolor="#FFFFFF" style="border-right: none;">7) การประกันตัวผู้ขับขี่ (Bail Bond Insurance)</td>
      <td height="33" align="center" bgcolor="#FFFFFF" style="border-left: none;">: ต่อครั้ง</td>
      <td height="33" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; "><?php echo number_format($quoData['quo_price7_c1'],2);?></td>
      <?php if($quoData['quo_corp2']!='0'){?>
      <td height="33" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; "><?php echo number_format($quoData['quo_price7_c2'],2);?></td>
      <?php }?>
      <?php if($quoData['quo_corp3']!='0'){?>
      <td height="33" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; "><?php echo number_format($quoData['quo_price7_c3'],2);?></td>
      <?php }?>
    </tr>
    <tr>
      <td height="33" colspan="2" bgcolor="#FFFFFF" style="border-right: none;">8) คุ้มครองอุปกรณ์ตกแต่ง (บาท)</td>
      <td height="33" align="center" bgcolor="#FFFFFF" style="border-left: none;">: ต่อครั้ง</td>
      <td height="33" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; "><?php echo number_format($quoData['quo_price8_c1'],2);?></td>
      <?php if($quoData['quo_corp2']!='0'){?>
      <td height="33" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; "><?php echo number_format($quoData['quo_price8_c2'],2);?></td>
      <?php }?>
      <?php if($quoData['quo_corp3']!='0'){?>
      <td height="33" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; "><?php echo number_format($quoData['quo_price8_c3'],2);?></td>
      <?php }?>
    </tr>
   
    <?php if($quoData['quo_other1']!=''){?>
    <tr>
      <td height="33" colspan="2" style="border-right: none;"><?php echo $quoData['quo_other1'];?></td>
      <td height="33" align="center" style="border-left: none;">&nbsp;</td>
      <td align="right"  style="padding-right: 10px; "><?php echo number_format($quoData['quo_otherprice1'],2);?></td>
      <?php if($quoData['quo_corp2']!='0'){?>
      <td align="right"  style="padding-right: 10px; "><?php echo number_format($quoData['quo_otherprice2'],2);?></td>
      <?php }?>
      <?php if($quoData['quo_corp3']!='0'){?>
      <td align="right"  style="padding-right: 10px; "><?php echo number_format($quoData['quo_otherprice3'],2);?></td>
      <?php }?>
    </tr>
    <?php }?>
    <?php if($quoData['quo_other2']!=''){?>
    <tr>
      <td height="33" colspan="2" style="border-right: none;"><?php echo $quoData['quo_other2'];?></td>
      <td height="33" align="center" style="border-left: none;">&nbsp;</td>
      <td align="right"  style="padding-right: 10px; "><?php echo number_format($quoData['quo_otherprice21'],2);?></td>
      <?php if($quoData['quo_corp2']!='0'){?>
      <td align="right"  style="padding-right: 10px; "><?php echo number_format($quoData['quo_otherprice22'],2);?></td>
      <?php }?>
      <?php if($quoData['quo_corp3']!='0'){?>
      <td align="right"  style="padding-right: 10px; "><?php echo number_format($quoData['quo_otherprice23'],2);?></td>
      <?php }?>
    </tr>
    <?php }?>
       <?php if(($quoData['quo_insurance_price_c1']!='0.00')||($quoData['quo_insurance_price_c2']!='0.00')||($quoData['quo_insurance_price_c3']!='0.00')){?>
    <tr>
      <td height="35" bgcolor="#FFFFFF" style="border-right: none;border-top: 2px solid #000;width: 180px;">วันสิ้นอายุประกัน </td>
      <td width="228" height="35" bgcolor="#FFFFFF" style="border-right: none; border-left:none; border-top: 2px solid #000"><?php echo  translateDateToThai($quoData['date_expiration_Insurance']);?></td>
      <td height="35" align="center" bgcolor="#FFFFFF" style="border-left: none;border-top: 2px solid #000"><strong>เบี้ยประกัน</strong></td>
      <td height="35" align="right" bgcolor="#FFFFFF" style="padding-right: 10px;border-top: 2px solid #000"><strong><?php echo number_format($quoData['quo_insurance_price_c1'],2);?></strong></td>
      <?php if($quoData['quo_corp2']!='0'){?>
      <td height="35" align="right" bgcolor="#FFFFFF" style="padding-right: 10px;border-top: 2px solid #000"><strong><?php echo number_format($quoData['quo_insurance_price_c2'],2);?></strong></td>
      <?php }?>
      <?php if($quoData['quo_corp3']!='0'){?>
      <td height="35" align="right" bgcolor="#FFFFFF" style="padding-right: 10px;border-top: 2px solid #000"><strong><?php echo number_format($quoData['quo_insurance_price_c3'],2);?></strong></td>
      <?php }?>
    </tr>
        <?php }?>
           <?php if(($quoData['quo_actprice1']!='0.00')||($quoData['quo_actprice2']!='0.00')||($quoData['quo_actprice3']!='0.00')){?>
    <tr>
      <td height="35" bgcolor="#FFFFFF" style="border-right: none;width: 180px;">วันสิ้นอายุ พ.ร.บ.</td>
      <td height="35" bgcolor="#FFFFFF" style="border-right: none; border-left: none;"><?php echo  translateDateToThai($quoData['date_expiration_act']);?></td>
      <td height="35" align="center" bgcolor="#FFFFFF" style="border-left: none;"><strong>พ.ร.บ.</strong></td>
      <td height="35" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; "><strong><?php echo number_format($quoData['quo_actprice1'],2);?></strong></td>
      <?php if($quoData['quo_corp2']!='0'){?>
      <td height="35" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; "><strong><?php echo number_format($quoData['quo_actprice2'],2);?></strong></td>
      <?php }?>
      <?php if($quoData['quo_corp3']!='0'){?>
      <td height="35" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; "><strong><?php echo number_format($quoData['quo_actprice3'],2);?></strong></td>
      <?php }?>
    </tr>
    <?php }?>
    <?php if(($quoData['quo_registerprice1']!='0.00')||($quoData['quo_registerprice2']!='0.00')||($quoData['quo_registerprice3']!='0.00')){?>
    <tr>
      <td height="35" bgcolor="#FFFFFF" style="border-right: none;width: 180px;">วันสิ้นอายุทะเบียน </td>
      <td height="35" bgcolor="#FFFFFF" style="border-right: none; border-left: none;"><?php echo  translateDateToThai($quoData['date_expiration_register']);?></td>
      <td height="35" align="center" bgcolor="#FFFFFF" style="border-left: none;"><strong>ทะเบียน</strong></td>
      <td height="35" align="right" bgcolor="#FFFFFF" style="padding-right: 10px;"><strong><?php echo number_format($quoData['quo_registerprice1'],2);?></strong></td>
      <?php if($quoData['quo_corp2']!='0'){?>
      <td height="35" align="right" bgcolor="#FFFFFF" style="padding-right: 10px;"><strong><?php echo number_format($quoData['quo_registerprice2'],2);?></strong></td>
      <?php }?>
      <?php if($quoData['quo_corp3']!='0'){?>
      <td height="35" align="right" bgcolor="#FFFFFF" style="padding-right: 10px;"><strong><?php echo number_format($quoData['quo_registerprice3'],2);?></strong></td>
      <?php }?>
    </tr>
    <?php }?>
        <?php if(($quoData['quo_totalsumact1']!='0.00')||($quoData['quo_totalsumact2']!='0.00')||($quoData['quo_totalsumact3']!='0.00')){?>
    <tr>
      <td height="35" bgcolor="#FFFFFF" style="border-right: none;width: 180px;">วันสิ้นอายุประกัน/พ.ร.บ.  </td>
      <td height="35" bgcolor="#FFFFFF" style="border-right: none; border-left: none;"><?php echo  translateDateToThai($quoData['date_totalsumact']);?></td>
      <td height="35" align="center" bgcolor="#FFFFFF" style="border-left: none;"><strong>ประกันรวม พ.ร.บ.</strong></td>
      <td height="35" align="right" bgcolor="#FFFFFF" style="padding-right: 10px;"><strong><?php echo number_format($quoData['quo_totalsumact1'],2);?></strong></td>
      <?php if($quoData['quo_corp2']!='0'){?>
      <td height="35" align="right" bgcolor="#FFFFFF" style="padding-right: 10px;"><strong><?php echo number_format($quoData['quo_totalsumact2'],2);?></strong></td>
      <?php }?>
      <?php if($quoData['quo_corp3']!='0'){?>
      <td height="35" align="right" bgcolor="#FFFFFF" style="padding-right: 10px;"><strong><?php echo number_format($quoData['quo_totalsumact3'],2);?></strong></td>
      <?php }?>
    </tr>
    <?php }?>
    <?php if($quoData['cust_status_discount']=='1'){?>
    <?php if(($quoData['quo_discountprice1']!='0.00')||($quoData['quo_discountprice2']!='0.00')||($quoData['quo_discountprice3']!='0.00')){?>
    <tr >
        <td height="35" bgcolor="#FFFFFF" colspan="2" style="border-right: none;"><?php echo $quoData['textdiscount']?></td>
     
      <td height="35" align="center" bgcolor="#FFFFFF" style="border-left: none;"></td>
      <td height="35" align="right" bgcolor="#FFFFFF" style="padding-right: 10px;"><strong><?php echo number_format($quoData['quo_discountprice1'],2);?></strong></td>
      <?php if($quoData['quo_corp2']!='0'){?>
      <td height="35" align="right" bgcolor="#FFFFFF" style="padding-right: 10px;"><strong><?php echo number_format($quoData['quo_discountprice2'],2);?></strong></td>
      <?php }?>
      <?php if($quoData['quo_corp3']!='0'){?>
      <td height="35" align="right" bgcolor="#FFFFFF" style="padding-right: 10px;"><strong><?php echo number_format($quoData['quo_discountprice3'],2);?></strong></td>
      <?php }?>
    </tr>
    <?php }}?>
    <tr>
      <td height="38" colspan="3" align="center" bgcolor="#B8DBFF" style="border-top: 2px solid #000; border-bottom: 2px solid #000"><font style="font-size: 14pt; font-weight: 600;">เบี้ยรวม</font></td>
      <td height="38" align="right" bgcolor="#B8DBFF" style="border-top: 2px solid #000; border-bottom: 2px solid #000; padding-right: 10px;"><font style="font-size: 14pt; font-weight: 600; color:red;"><?php echo number_format($quoData['quo_totalprice1'],2);?></font></td>
      <?php if($quoData['quo_corp2']!='0'){?>
      <td height="38" align="right" bgcolor="#B8DBFF" style="border-top: 2px solid #000; border-bottom: 2px solid #000;padding-right: 10px;"><font style="font-size: 14pt; font-weight: 600; color:red;"><?php echo number_format($quoData['quo_totalprice2'],2);?></font></td>
      <?php }?>
      <?php if($quoData['quo_corp3']!='0'){?>
      <td height="38" align="right" bgcolor="#B8DBFF" style="border-top: 2px solid #000; border-bottom: 2px solid #000;padding-right: 10px;"><font style="font-size: 14pt; font-weight: 600; color:red;"><?php echo number_format($quoData['quo_totalprice3'],2);?></font></td>
      <?php }?>
    </tr>
  </tbody>
</table>
<table width="1000" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td width="728" height="40" style="line-height: 26px;font-size: 12px"><blockquote><strong>หากลูกค้าประสงค์จะทำประกันภัย โปรดติดต่อ บริษัท พัฒนสิน โบรกเกอร์ จำกัด โทร. 066-002-4004<br>
      ขอขอบคุณที่ไว้วางใจใช้บริการ บริษัท พัฒนสิน โบรกเกอร์ จำกัด ด้วยดีเสมอมา</strong></blockquote></td>
      <td width="272" rowspan="2" style="line-height: 26px;font-size: 14px">
		  <table width="100%" border="0" cellspacing="0" cellpadding="0" >
        <tbody>
          <tr>
            <td height="100" align="center" ><strong>ขอแสดงความนับถือ</strong></td>
          </tr>
          <tr>
            <td height="42" align="center">....................................................................</td>
          </tr>
          <tr>
            <td height="30" align="center">(นางชวัลนุช ปาตังคะโร)</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td height="40" align="center" valign="bottom" style="line-height: 26px;font-size: 12px">
		  <table class="table2" width="96%" border="0" cellspacing="0" cellpadding="0" >
          <tbody>
            <tr>
              <td height="26" align="left"><strong>&nbsp;&nbsp;หมายเหตุ: </strong></td>
            </tr>
            <tr>
              <td height="30" align="left"><blockquote><?php echo $quoData['remarkquo']?></blockquote></td>
            </tr>
          </tbody>
      </table></td>
    </tr>
  </tbody>
</table>
<script>
	window.print();
</script>
</body>
    
</html>