<?php include('phpconfig.php');  // $_GET['SizeA4'] = 2-> half a4  1->fullA4
	$query="SELECT address_name, tel1, address_org, cust_name , cust_sname , address_no , address_moo , address_alley , address_road , address_subdistric, address_disctric , address_province , address_postcode,cust_status_Legal FROM tbl_work_data WHERE id = '".$_GET['DataID']."' ";

    $result = mysql_query($query);
    $data=mysql_fetch_assoc($result);

    
?>

<!doctype html>
<html moznomarginboxes mozdisallowselectionprint>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->


		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />
		<link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
 <style>
	 @page {margin: 0}
   @media print {
   .page-break { height:0; page-break-before:always; margin:0; border-top:none; }
        }
     body, p, span, td, a {font-size:9pt;font-family:'Prompt', sans-serif , Helvetica}
     body{margin-left:2em; margin-right:2em;}
    .page{
    height:947px;
    padding-top:5px;

    page-break-after : always;   
    font-family: Arial, Helvetica, sans-serif;
    position:relative;
    border-bottom:1px solid #000;
	margin: 0mm;

  }
	 
	 #header, #nav, .noprint
{
display: none;
}
	h1 { font-size: 40x; line-height: 1.5; margin: 0.5em 0 5px; }
	h1 { line-height: 1.2; margin: 0.3em 0 5px; }
	 .rotate {
  /* FF3.5+ */
  -moz-transform: rotate(-90.0deg);
  /* Opera 10.5 */
  -o-transform: rotate(-90.0deg);
  /* Saf3.1+, Chrome */
  -webkit-transform: rotate(-90.0deg);
  /* IE6,IE7 */
  filter: progid: DXImageTransform.Microsoft.BasicImage(rotation=0.083);
  /* IE8 */
  -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083)";
  /* Standard */
  transform: rotate(-90.0deg);
}
    </style>
</head>
<body>
<div class="showAddress">
<?php if($_GET['SizeA4']==1){ 
	

	?>
  <table  bgcolor="#9B494A" border="0" style="width: 842px;height: 595px; "> 
		<tr>
		  <td valign="top" align="right" style="padding-top:55px; padding-left: 0px;"><img src="assets/images/logo3.png" width="50" height="auto"></td>
			<td  style="padding-top: 30px; padding-left: 10px;">
			<!-- <h3 >
				ที่อยู่ผู้ส่ง</h3>-->
				<h3>
					<?php if($_SESSION['branch_id']=='2'){ ?>
					บริษัท พัฒนสิน โบรกเกอร์ จำกัด<!--สถานตรวจสภาพรถทรัพย์ดีหลวง 2--><br><br>
					คุณชวัลนุช ปาตังคะโร<br>
(โทร. 098-270-0086)<br>
					86/9 ม.9 ต.ชิงโค <br>
					อ.สิงหนคร  จ.สงขลา 90280
				   <?php } else  if($_SESSION['branch_id']=='3'){ ?>
					บริษัท พัฒนสิน โบรกเกอร์ จำกัด<!--สถานตรวจสภาพรถ ทรัพย์ดีหลวง 3--><br>
					<br>
				  นายศตวรรษ ปาตังคะโร <br>
				  (โทร. 087-287-1144)<br>
					239/115 ม.1 ต.สทิงหม้อ<br>
					อ.สิงหนคร จ.สงขลา 90280					
				<?php  }?>
			   </h3>
				
			</td>
			
	</tr>
		<tr>
		  <td style="text-align: left;padding-lef: 30px; padding-top: 70px;"  align="center" valign="middle">&nbsp;</td>
		
			<td style="text-align: left;padding-lef: 30px; padding-top: 70px;"  align="center" valign="middle">
			<table width="100%" align="right">
				<tr>
					<td align="right" style="padding-right: 20px;">
				  <table align="right"><tr><td nowrap>
					  <h3 style="text-align: left; "> ที่อยู่ผู้รับ </h3>
				<h3>
				<?php 
	              if($data['address_name']!=''){
                          if($data['cust_status_Legal']=='1'){
                                          echo $data['address_name'];
                          }else{
                              echo 'คุณ'.$data['address_name'];
                          }
				  }else if(($data['cust_name']!='')&&($data['address_name']=='')){
                                        if($data['cust_status_Legal']=='1'){
                                         echo $data['cust_name']." ".$data['cust_sname'].""; 
                          }else{
                             echo 'คุณ'.$data['cust_name']." ".$data['cust_sname'].""; 
                          }
                                      
                                  } ?>
					
				<?php if($data['address_org']!=''){ echo '<br>'.$data['address_org']."&nbsp;"; } ?>
				<?php if($data['tel1']!=''){ echo '<br>โทรศัพท์ '.$data['tel1']."&nbsp;<br>"; } ?>
				<?php if($data['address_no']!=''){ echo 'เลขที่ '.$data['address_no']."&nbsp;"; } ?>
				<?php if($data['address_moo']!=''){ echo 'หมู่  '.$data['address_moo']."&nbsp;&nbsp;"; } ?>
				<?php if($data['address_alley']!=''){ echo 'ซอย '.$data['address_alley']."&nbsp;&nbsp;<br>"; } ?>
				<?php if($data['address_road']!=''){ echo 'ถนน '.$data['address_road']."&nbsp;&nbsp;"; } ?>
				
				<?php if($data['address_subdistric']!=''){ echo 'ตำบล/แขวง '.$data['address_subdistric']."&nbsp;&nbsp;<br>"; } ?>
				
				<?php if($data['address_disctric']!=''){ echo 'อำเภอ/เขต '.$data['address_disctric']."&nbsp;&nbsp;"; } ?>
				
				<?php if($data['address_province']!=''){ echo 'จังหวัด '.$data['address_province']."&nbsp;&nbsp;"; } ?>
				<br>
				<?php if($data['address_postcode']!=''){ echo 'รหัสไปรษณีย์ '.$data['address_postcode']."&nbsp;&nbsp;"; } ?>
			</h3>
			</td></tr></table>	
						
					</td>
				</tr>
			</table>
		  </td>
	  </tr>
	</table>
	
<?php }else if($_GET['SizeA4']==2){ ?>
  <table bgcolor="#9B494A" border="0" style="width:20cm;  height: 420px; "><!--width: 595px;--> 
		<tr>
			<td width="60" align="right" valign="top" style="padding-top:30px; padding-left: 0px;"><img src="assets/images/logo3.png" width="50" height="auto"></td>
			<td colspan="2" valign="top">
				<!-- <h4 style="text-align: left; padding-left: 30px; padding-top: 20px; ">
			  ที่อยู่ผู้ส่ง</h4>-->
				<?php if($_SESSION['branch_id']=='2'){ ?>			
				
			  <h4 style="text-align: left; padding-left: 10px; padding-top: 30px; ">
				บริษัท พัฒนสิน โบรกเกอร์ จำกัด<!--สถานตรวจสภาพรถทรัพย์ดีหลวง 2--><br>
				<br>
				คุณชวัลนุช ปาตังคะโร<br>
(โทร. 098-270-0086)<br>				
				86/9 ม.9 ต.ชิงโค อ.สิงหนคร <br>
			  จ.สงขลา 90280 </h4>
				
				<?php } else  if($_SESSION['branch_id']=='3'){ ?>
				 <h4 style="text-align: left; padding-left: 30px; padding-top: 30px; ">
					บริษัท พัฒนสิน โบรกเกอร์ จำกัด<!--สถานตรวจสภาพรถ ทรัพย์ดีหลวง 3--><br>
					<br>
				   นายศตวรรษ ปาตังคะโร <br>
				   (โทร. 087-287-1144)<br>
					โทร. 087-287-1144<br>
					239/115 ม.1 ต.สทิงหม้อ<br>
					อ.สิงหนคร จ.สงขลา 90280</h4>
					
			  <?php  }?>
		  </td>
			
	</tr>
		<tr>
		<td width="50"></td>
		  <td style=" padding-top: 20px;"  align="left" valign="top">
			<table align="right" width="100%">
				<tr>
					<td align="right">
						
			<table width="70%"><tr><td>
			 <h4 style="text-align: left;  padding-top: 2px; ">
				 ที่อยู่ผู้รับ </h4>
				 <h4 style="text-align: left; ">
				<?php if($data['address_name']!=''){
					 if($data['cust_status_Legal']=='1'){
                                          echo $data['address_name'];
                          }else{
                              echo 'คุณ'.$data['address_name'];
                          }
				  }else if(($data['cust_name']!='')&&($data['address_name']=='')){ 
                                       if($data['cust_status_Legal']=='1'){
                                         echo $data['cust_name']." ".$data['cust_sname'].""; 
                          }else{
                             echo 'คุณ'.$data['cust_name']." ".$data['cust_sname'].""; 
                          }
                                      
                                  } ?>
					 
				<?php if($data['address_org']!=''){ echo '<br>'.$data['address_org']."&nbsp;"; } ?>
				<?php if($data['tel1']!=''){ echo '<br>โทรศัพท์ '.$data['tel1']."&nbsp;<br>"; } ?>
				<?php //if($data['address_org']!=''){ echo ''.$data['address_org']."&nbsp;<br>"; } ?>
				<?php if($data['address_no']!=''){ echo 'เลขที่ '.$data['address_no']."&nbsp;"; } ?>
				<?php if($data['address_moo']!=''){ echo 'หมู่  '.$data['address_moo']."&nbsp;&nbsp;"; } ?>
				<?php if($data['address_alley']!=''){ echo 'ซอย '.$data['address_alley']."&nbsp;&nbsp;<br>"; } ?>
				
				<?php if($data['address_road']!=''){ echo 'ถนน '.$data['address_road']."&nbsp;&nbsp;"; } ?>
				<?php if($data['address_subdistric']!=''){ echo 'ตำบล/แขวง'.$data['address_subdistric']."&nbsp;&nbsp;<br>"; } ?>
				
				
				<?php if($data['address_disctric']!=''){ echo 'อำเภอ/เขต '.$data['address_disctric']."&nbsp;&nbsp;"; } ?>
				
				<?php if($data['address_province']!=''){ echo 'จังหวัด '.$data['address_province']."&nbsp;&nbsp;"; } ?>
				<br>
				<?php if($data['address_postcode']!=''){ echo 'รหัสไปรษณีย์ '.$data['address_postcode']."&nbsp;&nbsp;"; } ?>
			</h4>	
			</td></tr></table>		
			</td>
				</tr>
			</table>
			</td>
	</tr>
  </table>
<?php } ?>
</div>

<script> window.print();</script>
</body>
</html>