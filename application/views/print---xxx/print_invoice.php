<?php include('phpconfig.php');?>
<?php include 'form_function.php';
	//------------------------------------------
$datanow = date("Y-m-d");
    $queryinvoice="SELECT *   FROM tbl_invoice_data WHERE id = '".$_GET['DataID']."' ";
		$resultinvoice=mysql_query($queryinvoice);
		$invoiceData=mysql_fetch_assoc($resultinvoice);
$query="SELECT a.* , b.username , c.branch_name , d.insurance_name, e.corp_name , f.corp_name  AS ActCorp , g.work_name FROM tbl_work_data a "
		." LEFT JOIN tbl_user_data b ON a.user_input_id=b.id "
		." LEFT JOIN tbl_branch_data c ON a.branch_id=c.id "
		." LEFT JOIN tbl_insurance_name d ON a.insurance_type_id=d.id "	
		." LEFT JOIN tbl_insurance_corp e ON a.insurance_corp_id=e.id "	
		." LEFT JOIN tbl_insurance_corp f ON a.act_corp_id=f.id "
		." LEFT JOIN tbl_work_type g ON a.other_type_id=g.id "		
		." WHERE a.id = '".$invoiceData['work_id']."' ";
		//echo $query;
     $result = mysql_query($query);
     $data = mysql_fetch_assoc($result);
 $queryInstallment="SELECT * FROM tbl_work_installment WHERE  work_id = '".$data['id']."' ORDER BY period_payment ASC ";
	$resultInstallment = mysql_query($queryInstallment);
          $querysumIns="SELECT SUM(amount) AS totalprice FROM tbl_work_installment WHERE  work_id = '".$data['id']."' ORDER BY period_payment ASC ";
	$resultsumIns = mysql_query($querysumIns);
        $sumIns=mysql_fetch_assoc($resultsumIns);
         $querycorp="SELECT *   FROM tbl_insurance_corp WHERE id = '".$data['insurance_corp_id']."' ";
		$resultcorp=mysql_query($querycorp);
		$corpData=mysql_fetch_assoc($resultcorp);
?>

<!DOCTYPE html>
<html>
    <head>
       <title>ใบแจ้งหนี้ ประกันภัยรถยนต์</title>
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
      <td width="110" align="left"><img src="assets/images/logo3.png" width="100" height="auto"></td>
      <td align="left">
		<font style="font-family: 'sarabun_regular', sans-serif; font-size: 17pt; font-weight: 600; line-height:18px">บริษัท พัฒนสิน โบรกเกอร์ จำกัด<!--สถานตรวจสภาพรถ ทรัพย์ดีหลวง--></font><br>
        <font style="font-family: 'sarabun_regular', sans-serif; font-size: 15pt; font-weight: 600; line-height:32px">(โดยนายหน้าชวัลนุช ปาตังคะโร) คุณสาว</font><br>
		<font style="font-family: 'sarabun_regular', sans-serif; font-size: 11pt; line-height: 24px">86/9 หมู่ที่ 9 ตำบลชิงโค อำเภอสิงหนคร จังหวัดสงขลา 90280<br>
		โทรศัพท์ 066-002-4004</font>
	    </td>
      <td style="float:right; text-align: center; padding: 20px 0px 0px 10px" width="300" height="90" class="dotted"><font style="font-size: 19pt; font-weight: 600; line-height: 40px">ใบแจ้งหนี้<br>
        ชำระเบี้ยประกันภัย</font></td>
    </tr>
    <tr>
      <td align="left">&nbsp;</td>
      <td align="left"><font style="font-size: 14pt; font-weight: 600;">คู่สัญญา <?php echo $corpData['corp_fullname']?></font></td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<br>
<table width="1000" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td width="120" height="30" valign="bottom">&nbsp;&nbsp;<strong>ผู้เอาประกันภัย </strong></td>
      <td height="30" colspan="3" align="left" valign="bottom"><?php if($data['cust_status_Legal']!='1'){?>คุณ<?php }?> <?php echo $data['cust_name']?> <?php echo $data['cust_sname']?></td>
      <td width="112" align="left" valign="bottom"><strong>วันที่</strong></td>
      <td width="148" align="left" valign="bottom"><?php echo  translateDateToThai($invoiceData['invoice_date_input'])?></td>
    </tr>
    <tr>
      <td height="30" valign="bottom">&nbsp;&nbsp;<strong>ที่อยู่</strong></td>
      <td height="30" colspan="3" align="left" valign="bottom"><?php if(($invoiceData['invoice_address']!='')){echo $invoiceData['invoice_address']?><?php }else{?><?php  if($data['address_org']!=''){echo $data['address_org'];}?> <?php  if($data['address_no']!=''){echo 'เลขที่ '.$data['address_no'];}?> <?php  if($data['address_moo']!=''){echo 'หมู่ '.$data['address_moo'];}?> <?php  if($data['address_alley']!=''){echo 'ซ. '.$data['address_alley'];}?> <?php  if($data['address_road']!=''){echo 'ถ. '.$data['address_road'];}?> <?php  if($data['address_subdistric']!=''){echo 'ต. '.$data['address_subdistric'];}?> <?php  if($data['address_disctric']!=''){echo 'อ. '.$data['address_disctric'];}?> <?php  if($data['address_province']!=''){echo 'จ. '.$data['address_province'];}?> <?php  if($data['address_postcode']!=''){echo $data['address_postcode'];}?><?php }?></td>
      <td align="left" valign="bottom"><strong>เลขที่ใบรับแจ้ง</strong></td>
      <td align="left" valign="bottom"><?php echo $invoiceData['invoice_no'];?></td>
    </tr>
    <tr>
      <td height="30" valign="bottom">&nbsp;&nbsp;<strong>โทรศัพท์</strong></td>
      <td height="30" colspan="3" align="left" valign="bottom"><?php echo $data['tel1']?></td>
      <td align="left" valign="bottom"><strong>รหัสตัวแทน</strong></td>
      <td align="left" valign="bottom"><strong><?php echo $invoiceData['invoice_agent_code']?></strong></td>
    </tr>
    <tr>
      <td height="30" valign="bottom">&nbsp;&nbsp;<strong>ยี่ห้อรถ</strong></td>
      <td width="185" height="30" align="left" valign="bottom"><?php echo $data['car_brand']?></td>
      <td width="46" align="left" valign="bottom"><strong>รุ่น</strong></td>
      <td width="389" align="left" valign="bottom"><?php echo $data['car_model']?></td>
      <td align="left" valign="bottom">&nbsp;</td>
      <td align="left" valign="bottom">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" valign="bottom">&nbsp;&nbsp;<strong>เลขทะเบียนรถ</strong></td>
      <td height="30" colspan="3" align="left" valign="bottom"><?php echo $data['car_license_plate']?></td>
      <td align="left" valign="bottom">&nbsp;</td>
      <td align="left" valign="bottom">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" valign="bottom">&nbsp;</td>
      <td height="30" colspan="3" align="left" valign="bottom">&nbsp;</td>
      <td align="left" valign="bottom">&nbsp;</td>
      <td align="left" valign="bottom">&nbsp;</td>
    </tr>
  </tbody>
</table>
<table width="1000" border="0" cellspacing="0" cellpadding="0" class="table5">
  <tbody>
    <tr>
      <td height="40" align="center" bgcolor="#047bf8" style="color: #FFF">รายการประเภทกรมธรรม์</td>
      <td width="200" height="40" align="center" bgcolor="#047bf8" style="color: #FFF">วันเริ่มคุ้มครอง</td>
      <td width="200" height="40" align="center" bgcolor="#047bf8" style="color: #FFF">วันหมดอายุ</td>
      <td width="200" height="40" align="center" bgcolor="#047bf8" style="color: #FFF">เบี้ยเก็บลูกค้า</td>
    </tr>
    <tr>
      <td height="70" align="center"><?php echo $invoiceData['invoice_insurance_type']?><br></td>
      <td height="70" align="center"><?php echo translateDateToThai($data['insurance_start'])?></td>
      <td height="70" align="center"><?php echo translateDateToThai($data['insurance_end'])?></td>
      <td height="70" align="center"><?php echo number_format($sumIns['totalprice'],2)?></td>
    </tr>
  </tbody>
</table>
<p></p>
<table width="1000" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height="40" style="line-height: 26px"><strong>โดยชำระเงินดังนี้ :</strong></td>
    </tr>
    <tr>
      <td>
           <?php if($data['payment_type']=='1'){ 
		 		 while($installment=mysql_fetch_assoc($resultInstallment)){ 
				 	echo "จำนวนเงิน ".Xprice2($installment['amount'])." บาท<br>";
				 }
		 
		 }else if($data['payment_type']=='2'){  ?>
        <table width="800" border="0" align="right" cellpadding="0" cellspacing="0">
          <tbody>
              <?php $n=1; while($installment=mysql_fetch_assoc($resultInstallment)){ ?>
            <tr>
              <td width="100" height="33" bgcolor="#FFFFFF"> งวดที่ <?php echo $n?></td>
              <td width="39" height="33" align="center" bgcolor="#FFFFFF" >วันที่</td>
              <td width="88" height="33" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; "><?php echo translateDateToThai($installment['due_date']);?></td>
              <td width="116" height="33" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; ">จำนวนเงิน</td>
              <td width="159" height="33" align="right" bgcolor="#FFFFFF" style="padding-right: 10px; "><?php echo Xprice2($installment['amount'])?></td>
              <td width="40" bgcolor="#FFFFFF">บาท</td>
              <td width="202" bgcolor="#FFFFFF" style="font-size: 10pt; padding-left: 10px;"><?php if($installment['payment_status']==1){?>(ชำระแล้ว <?php if($installment['remark']!=''){echo $installment['remark'];}?>)<?php }?></td>
            </tr>
  <?php $n++; }?>
            <tr>
              <td height="40" align="center">&nbsp;</td>
              <td height="40" align="center">&nbsp;</td>
              <td height="40" align="right">&nbsp;</td>
              <td height="40" align="right" style="padding-right: 10px;"><font style="font-size: 12pt; font-weight: 600;">รวมเป็นเงิน</font></td>
              <td height="40" align="right" style="padding-right: 10px;border-bottom: 2px solid #999; "><font style="font-size: 12pt; font-weight: 600;"><?php echo number_format($sumIns['totalprice'],2)?></font></td>
              <td width="40" bgcolor="#FFFFFF" style="border-bottom: 2px solid #999;">บาท</td>
              <td height="40" align="right">&nbsp;</td>
            </tr>
          </tbody>
        </table>
            <?php }?>
          
      </td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>

<table width="1000" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td width="501" height="60" style="border-top:2px solid #000;"><strong>กรณีชำระเงินผ่านธนาคาร</strong></td>
    </tr>
    <tr>
      <td height="40" align="center" valign="bottom" >
		  <table class="table2" width="100%" border="0" cellspacing="0" cellpadding="2">
          <tbody>
            <tr>
              <td height="30" align="left"><strong>&nbsp;&nbsp;&nbsp;วิธีการชำระเงินเข้าบัญชี บริษัท พัฒนสิน โบรกเกอร์ จำกัด</strong></td>
              <td align="left" style="border-left: 1px solid #000;"><strong>&nbsp;&nbsp;&nbsp;ขั้นตอนปฎิบัติเมื่อชำระเงินผ่านธนาคาร หรือเครื่อง ATM</strong></td>
            </tr>
            <tr>
              <td align="left">&nbsp;&nbsp;&nbsp;ธนาคารกสิกรไทย เลขที่บัญชี 092-3-49017-5</td>
              <td align="left"  style="border-left: 1px solid #000;"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
                <tbody>
                  <tr>
                    <td height="26" align="left">&nbsp;&nbsp;&nbsp;1. ส่งสำเนาการชำระเงิน ผ่านระบบ Line ID: 0982700086</td>
                  </tr>
                  <tr>
                    <td height="30" align="left">&nbsp;&nbsp;&nbsp;2. หรือส่งมายัง E-mail: tdl54@hotmail.com</td>
                  </tr>
                  <tr>
                    <td height="30" align="left">&nbsp;&nbsp;&nbsp;3. โทรแจ้งเจ้าหน้าที่ โทร. 066-002-4004</td>
                  </tr>
                </tbody>
              </table></td>
            </tr>
          </tbody>
      </table></td>
    </tr>
  </tbody>
</table>
<br>
<table width="1000" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td style="line-height: 27px"><strong>คำเตือน</strong> กฎการชำระเบี้ยประกันภัย Cash before cover กำหนดให้กรมธรรม์มีผลบังคับคุ้มครองทันทีที่รับชำระเบี้ยประกันภัยจากผู้เอาประกันภัย ดังนั้น<br>
ผู้เอาประกันภัยต้องชำระเบี้ยประกันภัยก่อนเริ่มวันคุ้มครองของกรมธรรม์ กรณีที่มีการผ่อนชำระเบี้ยประกันภัย จึงเป็นการตกลงกันระหว่างผู้เอาประกันภัย <br>
กับ บริษัท พัฒนสิน โบรกเกอร์ จำกัด รับอนุญาตจัดการประกันภัยโดยตรง เท่านั้น ผู้เอาประกันภัยยินดีปฎิบัติตามข้อตกลงการผ่อนชำระเบี้ยประกันภัยอย่าง<br>
เคร่งครัด หากผิดนัดผ่อนชำระเบี้ยประกันภัยตามวันที่กำหนดแม้งวดใดงวดหนึ่ง ให้แสดงว่าผู้เอาประกันภัยมีความประสงค์ให้ บริษัท พัฒนสิน โบรกเกอร์ จำกัด<br>
ยกเลิกกรมธรรม์ และหากผู้เอาประกันภัยผ่อนชำระเบี้ยประกันภัยจนครบ จะทำการส่งมอบกรมธรรม์ต้นฉบับแก่ผู้เอาประกันภัยทันที</td>
    </tr>
  </tbody>
</table>
<table width="1000" border="0" cellspacing="0" cellpadding="0" >
  <tbody>
    <tr>
      <td width="500" height="100" align="center" >&nbsp;</td>
      <td width="500" height="100" align="center" >&nbsp;</td>
    </tr>
    <tr>
      <td align="center">ลงชื่อ ............................................................... ผู้เอาประกันภัย</td>
      <td height="42" align="center">ฝ่ายการเงิน - บัญชี</td>
    </tr>
    <tr>
      <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(................................................................)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td height="30" align="center">(นางชวัลนุช ปาตังคะโร)</td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
 <script>
	window.print();
</script>
</body>
   
</html>