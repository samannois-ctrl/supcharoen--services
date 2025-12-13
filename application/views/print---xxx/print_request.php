<?php include('phpconfig.php');?>
<?php include 'form_function.php';
	//------------------------------------------
$datanow = date("Y-m-d");
    $queryrequest="SELECT *   FROM tbl_request_data WHERE id = '".$_GET['DataID']."' ";
		$resultrequest=mysql_query($queryrequest);
		$requestData=mysql_fetch_assoc($resultrequest);
$query="SELECT a.* , b.username , c.branch_name , d.insurance_name, e.corp_name , f.corp_name  AS ActCorp , g.work_name FROM tbl_work_data a "
		." LEFT JOIN tbl_user_data b ON a.user_input_id=b.id "
		." LEFT JOIN tbl_branch_data c ON a.branch_id=c.id "
		." LEFT JOIN tbl_insurance_name d ON a.insurance_type_id=d.id "	
		." LEFT JOIN tbl_insurance_corp e ON a.insurance_corp_id=e.id "	
		." LEFT JOIN tbl_insurance_corp f ON a.act_corp_id=f.id "
		." LEFT JOIN tbl_work_type g ON a.other_type_id=g.id "		
		." WHERE a.id = '".$requestData['work_id']."' ";
		//echo $query;
     $result = mysql_query($query);
     $data = mysql_fetch_assoc($result);
     if($requestData['request_date_time']!='00:00:00'){
         $timeArray = explode(":",$requestData['request_date_time']);
		$time2= $timeArray[1];
		$time1= $timeArray[0];
                $timeall = $time1.'.'.$time2.' น.';
     }else{
         $timeall = '';
     }
     $querycorp="SELECT *   FROM tbl_insurance_corp WHERE id = '".$data['insurance_corp_id']."' ";
		$resultcorp=mysql_query($querycorp);
		$corpData=mysql_fetch_assoc($resultcorp);
?>

<!DOCTYPE html>
<html>
    <head>
       <title>ใบคำขอเอาประกันภัยรถยนต์</title>
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
      <td height="60" align="right" valign="bottom"><font style="font-family: 'sarabun_regular', sans-serif; font-size: 15pt; font-weight: 600; line-height:18px">บริษัท พัฒนสิน โบรกเกอร์ จำกัด<!--สถานตรวจสภาพรถยนต์ทรัพย์ดีหลวง  โดยคุณชวัลนุช ปาตังคะโร--></font><br>
        <font style="font-family: 'sarabun_regular', sans-serif; font-size: 11pt; line-height: 28px">86/9 หมู่ที่ 9 ตำบลชิงโค อำเภอสิงหนคร จังหวัดสงขลา 90280
      โทรศัพท์ 098-114-4469</font></td>
    </tr>
  </tbody>
</table>
	
<table width="1000" border="0" cellspacing="0" cellpadding="0" style="border: 2px solid #000000">
  <tbody>
    <tr>
      <td>
		  
<table class="table" width="1000" border="0" cellspacing="0" cellpadding="5">
  <tbody>
    <tr>
      <td align="left" width="770" >
        <font style="font-family: 'sarabun_regular', sans-serif; font-size: 17pt; font-weight: 600; line-height:32px"><?php echo $corpData['corp_fullname']?></font><br>
        <font style="font-family: 'sarabun_regular', sans-serif; font-size: 11pt; line-height: 22px"><?php echo $corpData['corp_addr']?><br>
        <?php echo $corpData['corp_hotline']?></font>
		<br>
		<font style="font-size: 11pt; line-height: 20px;">ศูนย์รับแจ้งอุบัติเหตุ 24 ชั่วโมง โทร. <?php echo $corpData['accident_report']?></font>
	  </td>
      <td width="230" colspan="2" align="center">
          <?php 
          $pathUpload="uploadfile/";
		   ?>
        
		<img src="<?php echo $pathUpload.$corpData['img_logo'];?>" width="230" height="75">
        </td>
    </tr>
  </tbody>
</table>
		  
<table class="table2" width="1000" border="0" cellspacing="0" cellpadding="5">
  <tbody>
    <tr>
      <td width="84" height="25" align="left"><strong>วันที่รับแจ้ง</strong></td>
      <td width="212" align="left"><?php echo  Getmonandyear($requestData['request_date_input'])?></td>
      <td colspan="2" align="center" style="font-size: 14pt"><strong>คำขอเอาประกันภัยรถยนต์</strong></td>
      <td width="325" align="right">รหัสตัวแทน <?php echo  $requestData['agent_code']?></td>
    </tr>
  </tbody>
</table>
<table class="table2" width="1000" border="0" cellspacing="0" cellpadding="5">
  <tbody>
    <tr>
      <td width="84" height="25" align="left">&nbsp;</td>
      <td width="87" align="left"><input type="checkbox" class="ace" <?php if($requestData['request_type']=='1'){echo 'checked';}?> > 
      แจ้งใหม่</td>
      <td colspan="2" align="left"><input type="checkbox" class="ace" <?php if($requestData['request_type']=='2'){echo 'checked';}?> >  ต่ออายุกรมธรรม์</td>
      <td width="325" align="right">ประกันภัยประเภท <?php echo $requestData['request_corptype']?> (<?php echo $requestData['request_corptypefix']?>)</td>
    </tr>
  </tbody>
</table>
<table class="table2" width="1000" border="0" cellspacing="0" cellpadding="5">
  <tbody>
    <tr>
      <td width="107" height="30"><strong>ผู้เอาประกันภัย</strong></td>
      <td width="75" align="right"><strong> ชื่อ-สกุล :</strong></td>
      <td width="328" height="30" align="left"><?php if($data['cust_status_Legal']!='1'){?>คุณ<?php }?> <?php echo $data['cust_name']?> <?php echo $data['cust_sname']?></td>
      <td width="147" align="right"><strong>เลขที่บัตรประชาชน :</strong></td>
      <td width="291" align="left"><?php echo $requestData['request_card_number']?></td>
    </tr>
    <tr>
      <td height="30">&nbsp;</td>
      <td align="right"><strong>ที่อยู่ :</strong></td>
      <td height="30" colspan="3" align="left"><?php if(($requestData['request_address']!='')){echo $requestData['request_address']?><?php }else{?><?php  if($data['address_org']!=''){echo $data['address_org'];}?> <?php  if($data['address_no']!=''){echo 'เลขที่ '.$data['address_no'];}?> <?php  if($data['address_moo']!=''){echo 'หมู่ '.$data['address_moo'];}?> <?php  if($data['address_alley']!=''){echo 'ซ. '.$data['address_alley'];}?> <?php  if($data['address_road']!=''){echo 'ถ. '.$data['address_road'];}?> <?php  if($data['address_subdistric']!=''){echo 'ต. '.$data['address_subdistric'];}?> <?php  if($data['address_disctric']!=''){echo 'อ. '.$data['address_disctric'];}?> <?php  if($data['address_province']!=''){echo 'จ. '.$data['address_province'];}?> <?php  if($data['address_postcode']!=''){echo $data['address_postcode'];}?><?php }?></td>
    </tr>
    <tr>
      <td height="30">&nbsp;</td>
      <td align="right"><strong>โทรศัพท์ :</strong></td>
      <td height="30" colspan="3" align="left"><?php echo $data['tel1']?></td>
    </tr>
  </tbody>
</table>
<table class="table2" width="1000" border="0" cellspacing="0" cellpadding="5">
  <tbody>
    <tr>
      <td width="217" height="30" valign="bottom"><strong>ประเภทการประกันภัยที่ต้องการ </strong></td>
      <td width="232" height="30" align="left" valign="bottom"><input type="checkbox" class="ace" <?php if($requestData['insurance_type']=='1'){echo 'checked';}?> >
      ไม่ระบุชื่อผู้ขับขี่</td>
      <td width="219" align="left" valign="bottom"><input type="checkbox" class="ace" <?php if($requestData['insurance_type']=='2'){echo 'checked';}?> >
        ระบุชื่อผู้ขับขี่</td>
      <td width="290" align="left" valign="bottom" style="font-size: 11pt">(โปรดแนบสำเนาบัตรประชาชน ใบอนุญาตขับขี่)</td>
    </tr>
    <tr>
      <td height="30" align="center" valign="bottom">ผู้ขับขี่</td>
      <td height="30" align="left" valign="bottom">1.<?php echo $requestData['request_driver1']?></td>
      <td height="30" align="left" valign="bottom">วัน/เดือน/ปีเกิด <?php echo  translateDateToThai($requestData['request_birthday1'])?></td>
      <td height="30" align="left" valign="bottom">อาชีพ <?php echo $requestData['request_career1']?></td>
    </tr>
    <tr>
      <td height="30" valign="bottom">&nbsp;</td>
      <td height="30" align="left" valign="bottom">2.<?php echo $requestData['request_driver2']?></td>
      <td height="30" align="left" valign="bottom">วัน/เดือน/ปีเกิด <?php echo  translateDateToThai($requestData['request_birthday2'])?></td>
      <td height="30" align="left" valign="bottom">อาชีพ <?php echo $requestData['request_career2']?></td>
    </tr>
  </tbody>
</table>
<table class="table2" width="1000" border="0" cellspacing="0" cellpadding="3">
  <tbody>
    <tr>
      <td width="127" height="30"><strong>การใช้รถยนต์ </strong></td>
      <td width="851" height="30" align="left"><?php echo $requestData['request_car_use']?></td>
    </tr>
  </tbody>
</table>
<table class="table2" width="1000" border="0" cellspacing="0" cellpadding="3">
  <tbody>
    <tr>
      <td width="127" height="30"><strong>ผู้รับผลประโยชน์ </strong></td>
      <td width="851" height="30" align="left"><?php echo $requestData['request_beneficiary']?></td>
    </tr>
  </tbody>
</table>
<table class="table2" width="1000" border="0" cellspacing="0" cellpadding="3">
  <tbody>
    <tr>
      <td width="218" height="30"><strong>ระยะเวลาประกันภัย เริ่มต้นวันที่</strong></td>
      <td width="232" height="30" align="left"><?php echo  Getmonandyear($data['insurance_start'])?></td>
      <td width="86" align="left"><strong>สิ้นสุดวันที่</strong></td>
      <td width="241" height="30" align="left"><?php echo  Getmonandyear($data['insurance_end'])?></td>
      <td width="39" align="left"><strong>เวลา</strong></td>
      <td width="122" align="left"><?php echo $timeall?> </td>
    </tr>
  </tbody>
</table>
<table class="table2" width="1000" border="0" cellspacing="0" cellpadding="3">
  <tbody>
    <tr>
      <td height="30" align="center"><strong>รายการรถยนต์ที่เอาประกันภัย</strong></td>
    </tr>
  </tbody>
</table>
<table width="1000" border="0" cellspacing="0" cellpadding="0" class="table" style="font-size: 11pt">
  <tbody>
    <tr>
      <td width="37" height="35" align="center"><strong>รหัส</strong></td>
      <td width="145" height="35" align="center"><strong>ชื่อรถยนต์/รุ่น</strong></td>
      <td width="119" height="35" align="center"><strong>เลขทะเบียน</strong></td>
      <td width="175" height="35" align="center"><strong>เลขตัวถัง</strong></td>
      <td width="58" height="35" align="center"><strong>ปี/รุ่น</strong></td>
      <td width="126" align="center"><strong>แบบตัวถัง</strong></td>
      <td width="190" align="center"><strong>จำนวนที่นั่ง/ขนาด/น้ำหนัก</strong></td>
<!--      <td width="150" height="35" align="center"><strong>มูลค่าเต็มรวมตกแต่ง</strong></td>-->
    </tr>
    <tr>
      <td height="35" align="center"><?php echo $requestData['request_car_id']?></td>
      <td height="35" align="center"><?php echo $data['car_brand']?><?php if($data['car_model']!=''){echo '/'.$data['car_model'];}?></td>
      <td height="35" align="center"><?php echo $data['car_license_plate']?></td>
      <td height="35" align="center"><?php echo $data['car_chassis']?></td>
      <td height="35" align="center"><?php echo $requestData['request_car_year']?></td>
      <td align="center"><?php echo $requestData['request_car_bodymodel']?></td>
      <td align="center"><?php echo $requestData['request_car_seats']?></td>
<!--      <td height="35" align="center"><?php //echo number_format($requestData['request_car_total'],2)?></td>-->
    </tr>
  </tbody>
</table>
<table class="table2" width="1000" border="0" cellspacing="0" cellpadding="3">
  <tbody>
    <tr>
      <td height="30" align="left"><strong>รายการตกแต่งเปลี่ยนแปลงรถยนต์เพิ่มเติม (โปรดระบุรายละเอียด)  คุ้มครองอุปกรณ์ตกแต่งเพิ่มเติม <?php echo number_format($requestData['request_car_total'],2)?> บาท</strong></td>
    </tr>
    <tr>
      <td height="30" align="left"><?php echo $requestData['decorative_items']?></td>
    </tr>
  </tbody>
</table>
<table width="1000" border="0" cellspacing="0" cellpadding="0" class="table">
  <tbody>
    <tr>
      <td width="315" height="30" align="center" bgcolor="#FFFFFF"><strong>ความรับผิดต่อบุคคลภายนอก</strong></td>
      <td width="295" align="center" bgcolor="#FFFFFF"><strong>รถยนต์เสียหาย สูญหาย ไฟไหม้</strong></td>
      <td width="390" align="center" bgcolor="#FFFFFF"><strong>ความคุ้มครองตามเอกสารแนบท้าย</strong></td>
    </tr>
    <tr>
      <td height="30" align="center" valign="top" bgcolor="#FFFFFF">
		<table width="94%" border="0" cellspacing="0" cellpadding="4" class="table3">
        <tbody>
          <tr>
            <td height="20" colspan="2">1) ความเสียหายต่อชีวิต ร่างกาย หรืออนามัย </td>
            </tr>
          <tr>
            <td height="20" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;1.1) ความเสียหายต่อชีวิต ร่างกาย หรืออนามัย </td>
            </tr>
          <tr align="right">
            <td width="42" height="20">&nbsp;</td>
            <td width="242" style="border-bottom: 1px solid #8B8B8B"><?php echo number_format($requestData['req_price1'],2)?> บาท/คน</td>
            </tr>
          <tr align="right">
            <td height="24">&nbsp;</td>
            <td valign="bottom" style="border-bottom: 1px solid #8B8B8B"><?php echo number_format($requestData['req_price1_1'],2)?> บาท/ครั้ง</td>
          </tr>
          <tr>
            <td height="20" colspan="2">2) ความเสียหายต่อทรัพย์สิน</td>
          </tr>
          <tr align="right">
            <td height="20">&nbsp;</td>
            <td height="20" style="border-bottom: 1px solid #8B8B8B"><?php echo number_format($requestData['req_price2'],2)?> บาท/ครั้ง</td>
          </tr>
          <tr>
            <td height="20" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;2.1) ความเสียหายส่วนแรก</td>
          </tr>
          <tr>
            <td height="20" align="right">&nbsp;</td>
            <td height="20" align="right" style="border-bottom: 1px solid #8B8B8B"><?php echo number_format($requestData['req_price2_1'],2)?> บาท/ครั้ง</td>
          </tr>
        </tbody>
      </table></td>
      <td align="center" valign="top" bgcolor="#FFFFFF"><table width="94%" border="0" cellspacing="0" cellpadding="4" class="table3">
        <tbody>
          <tr>
            <td height="20" colspan="2">1) ความเสียหายต่อรถยนต์</td>
          </tr>
          <tr align="right">
            <td width="39" height="20">&nbsp;</td>
            <td width="245" style="border-bottom: 1px solid #8B8B8B"><?php echo number_format($requestData['req_price3'],2)?> บาท/ครั้ง</td>
          </tr>
          <tr>
            <td height="20" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;1.1) ความเสียหายส่วนแรกกรณีเป็นฝ่ายผิด </td>
          </tr>
          <tr align="right">
            <td height="20">&nbsp;</td>
            <td height="20" style="border-bottom: 1px solid #8B8B8B"><?php echo number_format($requestData['req_price3_1'],2)?> บาท/ครั้ง</td>
          </tr>
          <tr>
            <td height="20" colspan="2">2) รถยนต์สูญหาย/ไฟไหม้</td>
          </tr>
          <tr align="right">
            <td height="20">&nbsp;</td>
            <td height="20" style="border-bottom: 1px solid #8B8B8B"><?php echo number_format($requestData['req_price4'],2)?> บาท/ครั้ง</td>
          </tr>
          <tr>
            <td height="20" colspan="2">3) เนื่องจากภัยน้ำท่วม </td>
          </tr>
          <tr align="right">
            <td height="20">&nbsp;</td>
            <td height="20" style="border-bottom: 1px solid #8B8B8B"><?php echo number_format($requestData['req_price4_1'],2)?> บาท/ครั้ง</td>
          </tr>
        </tbody>
      </table></td>
      <td align="center" valign="top" bgcolor="#FFFFFF"><table width="94%" border="0" cellspacing="0" cellpadding="4" class="table3">
        <tbody>
          <tr>
            <td height="20" colspan="3">1) อุบัติเหตุส่วนบุคคล</td>
          </tr>
          <tr>
            <td height="20" colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;1.1) เสียชีวิต สูญเสียอวัยวะ ทุพพลภาพถาวร</td>
          </tr>
          <tr align="right">
            <td width="90" height="20" align="right">ก) ผู้ขับขี่</td>
            <td width="25" align="left"><?php echo $requestData['req_preple5']?> คน</td>
            <td width="112" align="right" style="border-bottom: 1px solid #8B8B8B"><?php echo number_format($requestData['req_price5'],2)?> <span style="font-size:12px">บาท/คน</span></td>
          </tr>
          <tr align="right">
            <td height="20" align="right">ข) ผู้โดยสาร</td>
            <td align="left"><?php echo $requestData['req_preple5_1']?> คน</td>
            <td align="right" style="border-bottom: 1px solid #8B8B8B"><?php echo number_format($requestData['req_price5_1'],2)?> <span style="font-size:12px">บาท/คน</span></td>
          </tr>
          <tr>
            <td height="20" colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;1.2) ทุพพลภาพชั่วคราว</td>
          </tr>
          <tr align="right">
            <td height="20" align="right">ก) ผู้ขับขี่</td>
            <td align="left"><?php echo $requestData['req_preple5_2']?> คน</td>
            <td align="right" style="border-bottom: 1px solid #8B8B8B"><?php echo number_format($requestData['req_price5_2'],2)?> <span style="font-size:12px">บาท/สัปดาห์</span></td>
          </tr>
          <tr align="right">
            <td height="20" align="right">ข) ผู้โดยสาร</td>
            <td align="left"><?php echo $requestData['req_preple5_3']?> คน</td>
            <td align="right" style="border-bottom: 1px solid #8B8B8B"><?php echo number_format($requestData['req_price5_3'],2)?> <span style="font-size:12px">บาท/คน/สัปดาห์</span></td>
          </tr>
          <tr>
            <td height="20" colspan="3">2) ค่ารักษาพยาบาล <?php echo $requestData['req_totalpreple5']?> คน</td>
          </tr>
          <tr>
            <td height="20" align="right">&nbsp;</td>
            <td height="20" colspan="2" align="right" style="border-bottom: 1px solid #8B8B8B"><?php echo number_format($requestData['req_price6'],2)?> บาท/คน</td>
            </tr>
          <tr>
            <td height="20" colspan="3">3) การประกันตัวผู้ขับขี่</td>
          </tr>
          <tr>
            <td height="20" align="right">&nbsp;</td>
            <td height="20" colspan="2" align="right" style="border-bottom: 1px solid #8B8B8B"><?php echo number_format($requestData['req_price7'],2)?> บาท/ครั้ง</td>
            </tr>
          <tr>
            <td height="10" align="right"></td>
            <td height="10" colspan="2" align="right"></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td height="34" align="center" bgcolor="#FFFFFF"><strong>เบี้ยประกันภัยสุทธิ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo number_format($requestData['req_insurance_price'],2)?> &nbsp;&nbsp;&nbsp;&nbsp;บาท</strong></td>
      <td height="34" align="center" bgcolor="#FFFFFF"><strong>เบี้ยประกันภัยรวม&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo number_format($data['insurance_price']+$data['service_other_price'],2)?> &nbsp;&nbsp;&nbsp;&nbsp;บาท</strong></td>
      <td height="34" align="center" bgcolor="#FFFFFF"><strong>เบี้ย พรบ.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo number_format($requestData['req_actprice'],2)?> &nbsp;&nbsp;&nbsp;&nbsp;บาท</strong></td>
    </tr>
  </tbody>
</table>
<table width="1000" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td colspan="2" style="line-height: 26px; border-top: 1px solid #000;"><blockquote>ข้าพเจ้าขอรับรองว่า คำบอกกล่าวตามรายการข้างบนเป็นความจริง และให้ถือเป็นส่วนหนึ่งของสัญญาระหว่างข้าพเจ้ากับบริษัท <br>
        โดยข้าพเจ้ามีความประสงค์ให้กรมธรรม์มีผลบังคับตั้งแต่วันที่ <strong><?php echo  Getmonandyear($requestData['date_effective'])?></strong> เป็นต้นไป</blockquote></td>
    </tr>
  </tbody>
</table>
<table width="1000" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td width="500"><table width="100%" border="0" cellspacing="0" cellpadding="3" >
        <tbody>
          <tr>
            <td height="30" align="center" >&nbsp;</td>
          </tr>
          <tr>
            <td height="30" align="center" >ลงชื่อผู้เขียนหรือผู้พิมพ์</td>
          </tr>
          <tr>
            <td height="30" align="center">ชวัลนุช ปาตังคะโร</td>
          </tr>
        </tbody>
      </table></td>
      <td align="center"><table width="80%" border="0" cellspacing="0" cellpadding="3" >
        <tbody>
          <tr>
            <td width="32%" height="30" align="left" >&nbsp;</td>
            <td width="68%" align="left" >&nbsp;</td>
          </tr>
          <tr>
            <td width="32%" height="30" align="left" >ผู้ขอเอาประกันภัย</td>
            <td width="68%" align="left" > ........................................................</td>
          </tr>
          <tr>
            <td width="32%" height="30" align="left">วันที่/เดือน/ปี </td>
            <td width="68%" align="left">........................................................</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
  </tbody>
</table>
		
	  </td>
    </tr>
  </tbody>
</table>

<table width="1000" border="0" cellspacing="0" cellpadding="0" >
  <tbody>
    <tr>
      <td colspan="2" style="font-size: 11pt; line-height: 26px">คำเตือนของกรมประกันภัย กระทรวงพาณิชย์<br>
        ให้ตอบคำถามข้างต้นตามความเป็นจริงทุกข้อ มิฉะนั้นบริษัทอาจถือเป็นเหตุปฎิเสธความรับผิดชอบตามสัญญาประกันภัยได้ ตามประมวลกฎหมายเพ่งและพาณิชย์ มาตรา 865
      </td>
    </tr>
  </tbody>
</table>

</body>
    <script>
	window.print();
</script>
</html>