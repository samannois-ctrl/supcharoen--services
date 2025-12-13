<?php include('phpconfig.php');?>
<?php include 'form_function.php';?>
<?php
	$_POST['DataID']=$_GET['DataID'];
	$query="SELECT * FROM tbl_work_receipt  WHERE id = '".$_POST['DataID']."' ";
     $result = mysql_query($query);
     $data = mysql_fetch_assoc($result);
 $queryInstallment="SELECT * FROM tbl_work_receiptinstall WHERE  work_receiptID = '".$_POST['DataID']."' AND check_installment = '1' ORDER BY id ASC ";
	$resultInstallment = mysql_query($queryInstallment);
        
          $querysumInstallment="SELECT SUM(`amount`) AS sumin FROM `tbl_work_installment` WHERE  work_id = '".$data['work_id']."' ";
         $resultsumInstallment = mysql_query($querysumInstallment);
            $resultsum = mysql_fetch_assoc($resultsumInstallment);
            
          $querysumwork_receipt="SELECT SUM(`totalall`) AS sumwork_receipt FROM `tbl_work_receipt` WHERE  work_id = '".$data['work_id']."' ";
         $resultsumwork_receipt = mysql_query($querysumwork_receipt);
            $resultwork_receipt = mysql_fetch_assoc($resultsumwork_receipt);
            
            $Outstanding = $resultsum['sumin']-$resultwork_receipt['sumwork_receipt'];
            
        $queryworkdata="SELECT * FROM tbl_work_data WHERE  id = '".$data['work_id']."' ";
	$resultworkdata = mysql_query($queryworkdata);
          $workdata = mysql_fetch_assoc($resultworkdata);
          if($workdata['address_org']!=''){
              $address_org = $workdata['address_org'];
          }else{
              $address_org = '';
          }
          if($workdata['address_no']!=''){
              $address_no = $workdata['address_no'];
          }else{
              $address_no = '';
          }
          if($workdata['address_moo']!=''){
              $address_moo = 'หมู่ที่ '.$workdata['address_moo'];
          }else{
              $address_moo = '';
          }
          if($workdata['address_alley']!=''){
              $address_alley = 'ซ.'.$workdata['address_alley'];
          }else{
              $address_alley = '';
          }
          if($workdata['address_road']!=''){
              $address_road = 'ถ.'.$workdata['address_road'];
          }else{
              $address_road = '';
          }
          if($workdata['address_subdistric']!=''){
              $address_subdistric = 'ต.'.$workdata['address_subdistric'];
          }else{
              $address_subdistric = '';
          }
          if($workdata['address_disctric']!=''){
              $address_disctric = 'อ.'.$workdata['address_disctric'];
          }else{
              $address_disctric = '';
          }
          if($workdata['address_province']!=''){
              $address_province = 'จ.'.$workdata['address_province'];
          }else{
              $address_province = '';
          }
          if($workdata['address_postcode']!=''){
              $address_postcode = $workdata['address_postcode'];
          }else{
              $address_postcode = '';
          }
          $address = $address_org.' '.$address_no.' '.$address_moo.' '.$address_alley.' '.$address_road.' '.$address_subdistric.' '.$address_disctric.' '.$address_province.' '.$address_postcode;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>ใบเสร็จรับเงิน</title>
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
    
<body style="background: #ffffff;margin:0px;padding: 0px">
       <div class="panel-body" style="height: 1000px;width: 1050px;background: #ffffff " >
         
<form role="form" class="form-horizontal form-groups-bordered" id="frm1" >
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
        <td valign="top">
            <table width="97%" border="0" align="left" cellpadding="0" cellspacing="0">
  <tbody>
     
   		<tr>
			<td width="110"  style="vertical-align: top; text-align: left"><img src="assets/images/logo3.png" width="100" height="auto" alt=""/></td>
			<td>
				<font style="font-family: 'sarabun_regular', sans-serif; font-size: 17pt; font-weight: 600; line-height:18px">บริษัท พัฒนสิน โบรกเกอร์ จำกัด<!--สถานตรวจสภาพรถ ทรัพย์ดีหลวง--></font><br>
				<br>
				<font style="font-family: 'sarabun_regular', sans-serif; font-size: 11pt; line-height: 24px">86/9 หมู่ที่ 9 ตำบลชิงโค อำเภอสิงหนคร จังหวัดสงขลา 90280<br>
				โทรศัพท์ 066-002-4004</font>
			</td>
		</tr>
  </tbody>
</table>
        </td>
        <td valign="top" style="padding-top: 20px;">

<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
  <tbody>	  
	   <tr> 
		   <td style="float:right; text-align: center; padding: 0px 10px 20px 10px" width="300" height="100" class="dotted"><h4 style="font-size: 20pt">ใบเสร็จรับเงิน<br><span style="font-size: 16pt">RECEIPT</span></h4></td>
	  </tr>
      <!--<tr> 
		  <td style="float:right;text-align: center;padding: 10px" width="300" height="130" class="dotted" valign="bottom" ><h4 style="font-size: 20pt">ใบเสร็จรับเงิน<br><span style="font-size: 16pt">RECEIPT</span></h4>
		  </td>
	  </tr> -->     
  </tbody>
</table>
        </td>
    </tr>
  </tbody>
</table>
							

<table width="1050" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:5px;">
   <tbody>
    	<tr >
			<td valign="top">

<table border="0" align="left" cellpadding="0" cellspacing="0" style="padding:10px 10px 0px 5px; width: 697px">
  <tbody>
    <!-- <tr>
        <td width="20" align="left" valign="bottom" style="line-height:28px" ><span style="font-size: 15pt; font-weight: 600;">รหัส</span></td>
      	<td width="40" align="left" valign="top" style="font-size: 14pt; " colspan="3"> &nbsp; <?php //echo $customer_code?></td>
    </tr>
    <tr>
        <td style="font-size: 16pt; line-height:24px" width="35" align="left" valign="bottom" colspan="2">(Code)</td>
    </tr>-->
     <tr>
      <td width="109"  align="left" valign="bottom" style="line-height:28px"><span style="font-size: 15pt; font-weight: 600;">ชื่อลูกค้า</span></td>
      <td width="588"  align="left" valign="" style="font-size: 14pt;" ><?php if($workdata['cust_status_Legal']!='1'){echo 'คุณ ';}?><?php echo $data['cust_name']?></td>
    </tr>
    <tr>
        <td style="font-size: 16pt;line-height:24px"  align="left" valign="bottom" colspan="2">(Customer Name)</td>
    </tr>
     <tr>
      <td width="109"  align="left" valign="bottom" style="line-height:28px"><span style="font-size: 15pt; font-weight: 600;">ที่อยู่</span></td>
      <td width="588"  align="left" valign="" style="font-size: 14pt;" colspan="3" ><?php echo $address?></td>
    </tr>
    <tr>
        <td style="font-size: 16pt;line-height:24px"  align="left" valign="bottom" colspan="2">(Address)</td>
    </tr>
     <tr>
      <td width="109"  align="left" valign="bottom" style="line-height:28px"><span style="font-size: 15pt; font-weight: 600;">โทรศัพท์</span></td>
      <td width="588"  align="left" valign="" style="font-size: 14pt;"><?php echo $workdata['tel1']?></td>
      
    </tr>
 	<tr>
        <td style="font-size: 16pt;line-height:24px"  align="left" valign="bottom" colspan="2">(Telephone)</td>

    </tr>
  </tbody>
</table>

</td>
<td valign="top" >
<table align="left" cellpadding="0" cellspacing="0" style="font-size: 20pt; padding:10px 10px 0px 5px; width: 350px;">
  <tbody>
      <tr >
     	 <td width="40%"  align="left" valign="bottom" style="line-height:22px;padding-top: 5px"><span style="font-size: 15pt; font-weight: 600;">&nbsp;เลขที่เอกสาร</span><span style="font-size: 16pt;"><br>
     	   &nbsp;(No.)</span></td>
      	<td width="60%"  align="left" valign="top" style="padding-top: 8px; font-size: 14pt;"><?php echo $data['receipt_no']?></td>
      </tr>
	  <tr>
      	<td width="40%"  align="left" valign="bottom" style="line-height:22px; padding-top: 5px"><span style="font-size: 15pt; font-weight: 600;"></span><span style="font-size: 16pt;font-weight: 600;">&nbsp;วันที่</span><span style="font-size: 16pt;"><br>
      	  &nbsp;(Date)</span></td>
       	<td width="60%" align="left" valign="top" style="padding-top: 8px; font-size: 14pt;"><?php echo translateDateToThai($data['date_input']);?></td>
    </tr>
<tr>
      	<td width="40%"  align="left" valign="bottom" style="line-height:22px; padding-top: 5px"><span style="font-size: 15pt; font-weight: 600;"></span><span style="font-size: 16pt;font-weight: 600;">&nbsp;ทะเบียนรถ</span><span style="font-size: 15pt;"><br>
      	  &nbsp;(License Plate)</span></td>
       	<td width="60%" align="left" valign="top" style="padding-top: 8px; font-size: 14pt;"><?php echo $data['car_license_plate'];?></td>
    </tr>	
  </tbody>
</table>

        </td>
    </tr>
  </tbody>
</table>
							
							
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" style="font-size: 20pt;margin-top: 5px;">
  <tbody>
      <tr >
            <th style="width: 80px;text-align:center;font-size: 15pt;padding: 10px;">ลำดับที่<br>
          No</th>
          <th style="width: 677px;text-align:center;font-size: 15pt;padding: 10px;">รายการ<br>
          Description</th>
          <th  style="text-align:center;font-size: 15pt;padding: 10px;">จำนวน<br>
            Quantity            <br></th>
          <th  style="text-align:center;font-size: 15pt;padding: 10px;">ราคา<br>
            Price            <br></th>
         
      </tr>
      <?php 
      $n1=1;$n2=1;$n3=1;$n4=1;$n5=1;
      if($data['actcheck']!='0'){//$n1=1;?>
      <tr style="border-bottom: 0px;border-bottom-color: white;font-size: 14pt;">
          <td style="text-align:center;"><?php echo $n1?></td>
          <td style="padding: 10px;border-bottom: 0px;">&nbsp;พ.ร.บ.</td>
          <td style="text-align:center;padding: 10px;border-bottom: 0px;">1</td>
          <td style="text-align:right; padding: 10px;border-bottom: 0px;"><?php echo number_format($data['actprice'],2)?></td>
      </tr>
      <?php $n1++; }?>
      <?php if($data['taxcheck']!='0'){$n2=$n1+1;?>
      <tr style="border-bottom: 0px;border-bottom-color: white;font-size: 14pt;">
           <td style="text-align:center;"><?php echo $n1?></td>
          <td style="padding: 10px;border-bottom: 0px;">&nbsp;ทะเบียนรถ</td>
          <td style="text-align:center;padding: 10px;border-bottom: 0px;">1</td>
          <td style="text-align:right;padding: 10px;border-bottom: 0px;"><?php echo number_format($data['taxprice'],2)?></td>
      </tr>
      <?php $n1++; }?>
      <?php if($data['carcheck']!='0'){$n3=$n2+1;?>
      <tr style="border-bottom: 0px;border-bottom-color: white;font-size: 14pt;">
           <td style="text-align:center;"><?php echo $n1?></td>
          <td style="padding: 10px;border-bottom: 0px;">&nbsp;ตรวจสภาพรถ</td>
          <td style="text-align:center;padding: 10px;border-bottom: 0px;">1</td>
          <td style="text-align:right;padding: 10px;border-bottom: 0px;"><?php echo number_format($data['carcheckprice'],2)?></td>
      </tr>
      <?php $n1++; }?>
      <?php if($data['carsercheck']!='0'){$n4=$n3+1;?>
      <tr style="border-bottom: 0px;border-bottom-color: white;font-size: 14pt;">
           <td style="text-align:center;"><?php echo $n1?></td>
          <td style="padding: 10px;border-bottom: 0px;">&nbsp;บริการต่อทะเบียน</td>
          <td style="text-align:center;padding: 10px;border-bottom: 0px;">1</td>
          <td style="text-align:right;padding: 10px;border-bottom: 0px;"><?php echo number_format($data['carserprice'],2)?></td>
      </tr>
      <?php $n1++; }?>
      <?php if($data['othercheck']!='0'){$n5=$n4+1;?>
      <tr style="border-bottom: 0px;border-bottom-color: white;font-size: 14pt;">
           <td style="text-align:center;"><?php echo $n1?></td>
          <td style="padding: 10px;border-bottom: 0px;">&nbsp;อื่นๆ  <?php echo $data['otherwork_name']?></td>
          <td style="text-align:center;padding: 10px;border-bottom: 0px;">1</td>
          <td style="text-align:right;padding: 10px;border-bottom: 0px;"><?php echo number_format($data['otherprice'],2)?></td>
      </tr>
      <?php $n1++; }?>
      <?php 
        //if($data['actcheck']!='0'){
         $an = $n1;
     /* }
      if($data['taxcheck']!='0'){
        $an = $n2;
      }
      if($data['carcheck']!='0'){
        $an = $n3; 
      }
      if($data['carsercheck']!='0'){
         $an = $n4;
      }
      if($data['othercheck']!='0'){
          $an = $n5;
      }
      $ann = $an+1;*/
      ?>
      <?php  $n=1; while($installment=mysql_fetch_assoc($resultInstallment)){ 
          if($_GET['type']=='1'){?>
      <tr style="border-bottom: 0px;border-bottom-color: white;font-size: 14pt;">
           <td style="text-align:center;"><?php echo $ann?></td>
          <td style="padding: 10px;border-bottom: 0px;">&nbsp;ค่าประกันภัยรถ ชำระเต็มจำนวน</td>
          <td style="text-align:center;padding: 10px;border-bottom: 0px;">1</td>
          <td style="text-align:right;padding: 10px;border-bottom: 0px;"><?php echo number_format($installment['installment_price'],2)?></td>
      </tr>
          <?php }else{?>
       <tr style="border-bottom: 0px;border-bottom-color: white;font-size: 14pt;">
            <td style="text-align:center;"><?php echo $ann?></td>
          <td style="padding: 10px;border-bottom: 0px;">&nbsp;ค่าประกันภัยรถ งวดที่ <?php echo $installment['number']?></td>
          <td style="text-align:center;padding: 10px;border-bottom: 0px;">1</td>
          <td style="text-align:right;padding: 10px;border-bottom: 0px;"><?php echo number_format($installment['installment_price'],2)?></td>
      </tr>
      <?php $n++;$ann++;}}
      $nn=0;
      if($data['actcheck']!='0'){
          if($nn==0){
          $nn = $n+1;
          }else{
              $nn = $nn+1;
          }
      }
      if($data['taxcheck']!='0'){
           if($nn==0){
          $nn = $n+1;
          }else{
              $nn = $nn+1;
          }
      }
      if($data['carcheck']!='0'){
          if($nn==0){
          $nn = $n+1;
          }else{
              $nn = $nn+1;
          }
      }
      if($data['carsercheck']!='0'){
           if($nn==0){
          $nn = $n+1;
          }else{
              $nn = $nn+1;
          }
      }
      if($data['othercheck']!='0'){
            if($nn==0){
          $nn = $n+1;
          }else{
              $nn = $nn+1;
          }
      }
      for ( $i = $nn; $i <= 8; $i++){
      ?>
      
      <tr style="border-bottom: 0px;border-bottom-color: white;font-size: 14pt;">
           <td style="text-align:center;"></td>
          <td style="padding: 10px;border-bottom: 0px;">&nbsp;</td>
          <td style="text-align:center;padding: 10px;border-bottom: 0px;">&nbsp;</td>
          <td style="text-align:center;padding: 10px;border-bottom: 0px;">&nbsp;</td>
      </tr>
      <?php }?>
        <tr style="border-bottom: 0px;border-bottom-color: white;font-size: 14pt;">
           <td style="text-align:center;"></td>
          <td style="padding: 10px;border-bottom: 0px;">&nbsp;(ยอดค้างชำระ  <?php echo number_format($Outstanding,2)?> บาท)</td>
          <td style="text-align:center;padding: 10px;border-bottom: 0px;">&nbsp;</td>
          <td style="text-align:center;padding: 10px;border-bottom: 0px;">&nbsp;</td>
      </tr>  <tr style="border-bottom: 0px;border-bottom-color: white;font-size: 14pt;">
           <td style="text-align:center;"></td>
          <td style="padding: 10px;border-bottom: 0px;">&nbsp;</td>
          <td style="text-align:center;padding: 10px;border-bottom: 0px;">&nbsp;</td>
          <td style="text-align:center;padding: 10px;border-bottom: 0px;">&nbsp;</td>
      </tr>
  </tbody>
</table>
<table  width="100%" border="1" align="left" cellpadding="0" cellspacing="0" style="margin-top:5px;margin-right:3px">
  <tbody>
      <tr>
          <td style="width:697px">
			  
<table  width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
  <tbody>
      <tr>
          <td width="10%" align="left" valign="top" style=" padding-top: 16px;">
             <div style="font-size: 15pt; font-weight: 600;">&nbsp;หมายเหตุ</div><div style="font-size: 15pt;">&nbsp;(Remark)</div> 
          </td>
          <td align="left" valign="top" style="padding-left:15px;">
             <div style="font-size: 15pt; line-height: 12px" ><?php //echo $detail_receipt2->note?></div> 
          </td>
          
      </tr>
        </tbody>
</table>		  
			  
<table  width="98%" border="1" align="center" cellpadding="0" cellspacing="0" >
  <tbody>
      <tr >
          <td  align="center" valign="top" style="padding:10px"><span style="font-size: 14pt; ">(<?php echo convert_Number2($data['totalall'])?>)</span></td>
    </tr>
  </tbody>
</table>
              <table  width="98%" border="0" align="center" cellpadding="0" cellspacing="0" style="padding-top: 15px;" >
  <tbody>
      <tr >
      <td  align="left" valign="top"><span style="font-size: 15px; line-height:22px">&#8226; กรุณาสั่งจ่ายเช็คขีดคร่อมในนาม &quot;บริษัท พัฒนสิน โบรกเกอร์ จำกัด&quot; เท่านั้น<br>
          &#8226; ในกรณีชำระเงินด้วยเช็ค ใบเสร็จรับเงินฉบับนี้มีผลสมบูรณ์ต่อเมื่อบริษัทฯ เรียกเก็บเงินตามเช็คได้เรียบร้อยแล้ว</span></td>
    </tr>
   
  </tbody>
</table>
          </td>
          <td >
             <table  width="100%" border="0" align="left" cellpadding="0" cellspacing="0" >
  <tbody>
      <tr >
      <td  align="left" valign="top" style="border-bottom: 1px solid black;font-size: 20pt;padding-top: 10px" ><span style="font-size: 16pt; font-weight: 600;">&nbsp;จำนวนเงินรวมทั้งสิ้น<br>&nbsp;Grand Total</span> </td>
      <td  align="right" valign="top" style="line-height:25px;padding-top: 17px;border-bottom: 1px solid black;font-size: 20pt"><span style="font-size: 14pt; font-weight: 600;"><?php echo number_format($data['totalall'],2)?>&nbsp;</span> </td>
    </tr>
  </tbody>
</table>
              <table  border="0" align="center" cellpadding="0" cellspacing="0" >
  <tbody>
      <tr>
          <td align="center" valign="bottom" colspan="2" style="padding-top:30px"><span style="border-bottom: 1px dotted black;font-size: 20pt;">&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></td>
         </tr>
      <tr>
          <td height="40" colspan="2" align="center" valign="bottom" style="line-height:30px;font-size: 14pt;">ผู้รับเงิน/COLLECTOR</td>
         </tr>
      <tr>
          <td align="center" valign="bottom" style="line-height:30px;font-size: 14pt; height: 34px" colspan="2">วันที่/Date<span style="border-bottom: 1px dotted black;font-size: 20pt;">&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; / &nbsp; &nbsp; &nbsp; &nbsp; / &nbsp;  &nbsp; &nbsp; &nbsp;</span></td>
         </tr>
  </tbody>
</table>
          </td>
      </tr>
  </tbody>
</table>
<table width="100%" border="1" align="left" cellpadding="0" cellspacing="0" style="margin-top:5px;">
  <tbody>
      <tr>
          <td style="width:697px">
             <table  width="100%" border="0" align="left" cellpadding="0" cellspacing="0" >
  <tbody>
      <tr >
          <td  align="left" valign="top" style="line-height:25px;padding-top: 10px;"><span style="font-size: 15pt; ">&nbsp;ชำระโดย<br>&nbsp;PAID BY</span> </td>
          <td  align="left" valign="top" style="line-height:25px;padding-top: 10px;"><span style="font-size: 15pt; "><input type="checkbox"> เงินสด<br>&nbsp; &nbsp;&nbsp;&nbsp;CASH</span> </td>
          <td  align="left" valign="top" style="line-height:25px;padding-top: 10px;"><span style="font-size: 15pt; "><input type="checkbox"> เช็ค<br>&nbsp; &nbsp;&nbsp;&nbsp;CHEQUE</span> </td>
          <td  align="left" valign="top" style="line-height:25px;padding-top: 10px;"><span style="font-size: 15pt;"><input type="checkbox"> เงินโอน<br>&nbsp; &nbsp;&nbsp;TRANSFER</span> </td>
          <td width="20%" align="left" valign="top" style="line-height:25px"><span style="font-size: 16pt; ">&nbsp; &nbsp;</span> </td>
    </tr>
  </tbody>
</table>
             <table  width="100%" border="0" align="left" cellpadding="0" cellspacing="0" >
  <tbody>
      <tr >
          <td  align="left" valign="top" style="line-height:25px" width="33%"><span style="font-size: 15pt; ">&nbsp;ธนาคาร<span style="border-bottom: 1px dotted black;font-size: 16pt;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span><br>&nbsp;BANK</span></td>
          <td  align="left" valign="top" style="line-height:25px" width="33%"><span style="font-size: 15pt; ">&nbsp;สาขา<span style="border-bottom: 1px dotted black;font-size: 16pt;">&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span><br>&nbsp;BRANCH</span></td>
          <td  align="left" valign="top" style="line-height:25px" width="34%"><span style="font-size: 15pt; ;">&nbsp;เลขที่เช็ค<span style="border-bottom: 1px dotted black;font-size: 16pt;">&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span><br>&nbsp;CHEQUE NO.</span></td>
    </tr>
  </tbody>
</table>
             <table  width="100%" border="0" align="left" cellpadding="0" cellspacing="0" >
  <tbody>
      <tr >
          <td  align="left" valign="top" style="line-height:25px" width="33%"><span style="font-size: 15pt; ">&nbsp;ลงวันที่<span style="border-bottom: 1px dotted black;font-size: 20pt;">&nbsp; &nbsp; &nbsp; &nbsp; / &nbsp; &nbsp; &nbsp; / &nbsp; &nbsp; &nbsp; </span><br>&nbsp;DATE</span></td>
          <td  align="left" valign="top" style="line-height:25px" width="67%"><span style="font-size: 15pt; ">&nbsp;จำนวนเงิน<span style="border-bottom: 1px dotted black;font-size: 20pt;">&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span><br>&nbsp;AMOUNT</span></td>
    </tr>
  </tbody>
</table>
          </td>
          <td >
             <table  width="100%" border="0" align="left" cellpadding="0" cellspacing="0" >
  <tbody>
      <tr >
      <td height="70" align="center" style="line-height:25px"><span style="font-size: 16pt; font-weight: 600;">บริษัท พัฒนสิน โบรกเกอร์ จำกัด<!--สถานตรวจสภาพรถ ทรัพย์ดีหลวง--></span> </td>
    </tr>
  </tbody>
</table>
              <table  border="0" align="center" cellpadding="0" cellspacing="0" style="margin-bottom: 10px" >
  <tbody>
      <tr>
          <td align="center" height="35px" valign="bottom" colspan="2"><span style="border-bottom: 1px dotted black;font-size: 20pt;">&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></td>
         </tr>
      <tr>
          <td height="40px" colspan="2" align="center" style="line-height:30px;font-size: 14pt;">ผู้มีอำนาจลงนาม/AUTHORIZED</td>
         </tr>
      <tr>
          <td align="center" valign="top" style="line-height:25px;font-size: 14pt;" colspan="2">วันที่/Date<span style="border-bottom: 1px dotted black;font-size: 20pt;">&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; / &nbsp; &nbsp; &nbsp; &nbsp; / &nbsp;  &nbsp; &nbsp; &nbsp;</span></td>
         </tr>
  </tbody>
</table>
          </td>
      </tr>
  </tbody>
</table>
      
         

						</form>
					</div>
     <script>
	window.print();
</script>       
    </body>
    
</html>
