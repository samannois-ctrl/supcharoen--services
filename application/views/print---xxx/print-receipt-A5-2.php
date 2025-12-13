<?php include('phpconfig.php');?>
<?php
	$_POST['DataID']=$_GET['DataID'];
	$query="SELECT * FROM tbl_receipt_data  WHERE id = '".$_POST['DataID']."' ";
     $result = mysql_query($query);
     $data = mysql_fetch_assoc($result);


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ใบรับเงิน</title>
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

			 body, h1, h2, h3, h4, h5, p, span, td, a {font-size:10pt;font-family: 'Prompt',Arial, Helvetica, sans-serif;}
			 body{margin-left:1em; margin-right:1em; background-color: #FFFFFF}
			.page{
				top:0px;
				height:auto;
				padding-top:0px;
				background-color: aquamarine;
				page-break-after : always;   
				font-family: 'Prompt',Arial, Helvetica, sans-serif;
				position:relative;
				border-bottom:0px solid #000;
				margin: 0mm;
				}
	</style>
</head>


<body>
<div>&nbsp;</div>
<div style="width: 100%; background: #ffffff; margin:0px; ">
	
		<!--Header-->
			<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
			  <tbody>
    
    		<tr>
				
				<td width="61%" align="left" valign="top" style="line-height:22px; text-align: left; padding-left: 10px; border-bottom: 2px solid #000;margin-bottom: 10px;">
					<!--<h5 style="font-size: 14pt;line-height:25px;margin: 12px 0px 0px 0px;font-weight: 600; ">บริษัท พัฒนสิน โบรกเกอร์ จำกัด /// ทรัพย์ดีหลวง AGENT OFFICE</h5>-->
                    <h5 style="font-size: 14pt;margin:0px;font-weight: 600; "><!--สถานตรวจสภาพรถ -->ทรัพย์ดีหลวง&nbsp;<?php echo $_SESSION['branch_id']-1;?></h5>
					<p style="font-size: 10t;margin:0px"><!--86/9 ม.9 ต.ชิงโค อ.สิงหนคร จ.สงขลา 90280<br>-->โทร. 066-002-4004</p>                    
				</td>
				<td width="39%" align="left" valign="bottom" style="line-height:20px; text-align: left; border-bottom: 2px solid #000;margin-bottom: 10px;">
					
					<?php
						$dateArray = explode("-",$data['date_input']);
						$mon= $dateArray[1];
						$year= $dateArray[0] ;
						$dateinput = $year.$mon;
					?>
					 <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
					  <tbody>
							 <tr>
							   <td colspan="2" align="center" ><h5 style="font-size: 18pt;font-weight: 600; border: 2px solid #000;"><?php if((($_GET['type']=='2')&&($data['print_customer']=='1'))||(($_GET['type']=='1')&&($data['print_shop']=='1'))){echo 'สำเนา';}?>ใบรับเงิน</h5></td>
					    </tr>
							 <tr>
									<td width="38%" >
										<p style="font-size: 10pt;margin:  0px; font-weight: bold">เลขที่ใบรับเงิน</p>
									</td>
								   <td width="62%" style="font-size: 10pt; text-align: left;">
									   <?php echo $data['receipt_no']?>                                   
							   </td>
							 </tr>
							 <tr>
									<td width="38%">
									  <p style="font-size: 10pt;margin:  0px; font-weight: bold">วันที่</p>
									</td>
									<td width="62%" style="font-size: 10pt;">
									  <?php echo translateDateToThai($data['date_input'])?> 
									</td>

							</tr>            
					  </tbody>
				  </table>       
				
				
				</td>
			</tr>
                     
			  </tbody>
			</table>
        <!--Header-->
		<!--Customer-->
        <table width="95%" height="40" border="0" align="center" cellpadding="0" cellspacing="0" style="border-bottom: 1px solid #000000">
		    <tbody>
				 <tr>
					<td width="8%" style="">
						<p style="font-size: 11pt;margin:  0px"><span style="font-weight: 600;">ชื่อลูกค้า</span></p>
					</td>
					<td width="35%" style="font-size: 11pt;margin:  0px;border-bottom:  1px dotted #000000;">
						<?php if($data['cust_status_Legal']!='1'){?>คุณ<?php }?><?php  echo $data['cust_name']; ?> <?php  echo $data['cust_sname']; ?> 
					</td>
					<td width="8%" style="">
						<p style="font-size: 11pt;margin:  0px"><span style="font-weight: 600;">โทรศัพท์</span></p>
					</td>
					<td width="25%" style="font-size: 11pt;margin:  0px;border-bottom:  1px dotted #000000;">
						<?php  echo $data['cust_phone']; ?> 
					</td>

					<td width="10%" style="" align="left">
						<p style="font-size: 11pt;margin:  0px;font-weight: 600;">ทะเบียนรถ</p>
					</td>
					<td width="20%" style="font-size: 11pt;margin:  0px;border-bottom:  1px dotted #000000;"  align="left">
						 <?php echo $data['car_license_plate']?> 
					</td>
				</tr>
              </tbody>
			</table>
        <!--Customer-->
</div>        

<table width="95%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td width="60%" style="padding-left: 15px">
		  <!--Payment-->
			<table width="95%" border="0" cellspacing="0" cellpadding="0">
			  <tbody>
				<tr>
				  <td>  		  


					<?php if(($data['actcheck']=='1')||($data['taxcheck']=='1')||($data['carcheck']=='1')||($data['carcheck']=='1')||($data['othercheck']=='1')){?>
					<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="">
					<tbody>      
						<tr>
							<td width="100%" colspan="4" style="font-size: 11pt;text-align: center;">
								<h5 style="font-size: 12pt; font-weight: 600; border-bottom: solid 1px #000000; padding-bottom: 5px">รายการชำระเงิน</h5>
							</td>
						</tr>

						 <?php if($data['actcheck']=='1'){?>
						 <tr>
							<td width="60%" colspan="2" style="font-size: 11pt;">
								  <p style="font-size: 11pt;margin:  0px"><?php if($data['car_type']=='2'){?>พ.ร.บ.<?php }else{?>พ.ร.บ. + บริการ<?php }?></p>
							</td>
							<td width="40%" >
								  <span  style="float:right;padding-top: 2px;"><?php echo Xprice2($data['actprice'])?> บาท</span>
							</td>
						</tr>
						 <?php }?>
						 <?php if($data['taxcheck']=='1'){?>
						  <tr>
							  <td width="60%" colspan="2" style="font-size: 11pt;">
								  <p style="font-size: 11pt;margin:  0px">ทะเบียนรถ</p>
							  </td>
							  <td width="40%"  >
										<span  style="float:right;;"><?php echo Xprice2($data['taxprice'])?> บาท</span>
							</td>
							</tr>
							  <?php }?>
							<?php if($data['carcheck']=='1'){?>
								<tr>


								<td width="60%" colspan="2"  style="font-size: 11pt;">
								  <p style="font-size: 11pt;margin:  0px">ตรวจสภาพรถ</p>
								</td>
									<td width="40%" >
										 <span  style="float:right;;"><?php echo Xprice2($data['carcheckprice'])?> บาท</span>

								</td>
							</tr> 
							<?php }?>
							<?php if($data['carsercheck']=='1'){?>
								<tr>


								<td width="60%" colspan="2"  style="font-size: 11pt;">
								  <p style="font-size: 11pt;margin:  0px">บริการต่อทะเบียน</p>
							</td>
									<td width="40%" >
										 <span  style="float:right;;"><?php echo Xprice2($data['carserprice'])?> บาท</span>

							</td>
							</tr> 
							<?php }?>
							<?php if($data['othercheck']=='1'){?>
								<tr>

								<td width="15%"  style="font-size: 11pt;">
									<p style="font-size: 11pt;margin:  0px">อื่นๆ ระบุ</p>
								</td>
								 <td width="55%" style="font-size: 11pt;margin:  0px;border-bottom:  1px dotted #000000;">
									 <?php echo $data['otherwork_name']?>                                    
								</td>
								 <td width="30%" >
									 <span  style="float:right;;"><?php echo Xprice2($data['otherprice'])?> บาท</span>
								 </td>
							</tr> 
							<?php }?>

					  </tbody>
					</table>

					  <?php }?>

					  <?php if(($data['cashcheck']=='1')||($data['periodcheck1']=='1')||($data['periodcheck2']=='1')||($data['periodcheck3']=='1')){?>

					  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="">
					  <tbody>      
							<tr>
								<td width="100%" colspan="5" style="font-size: 11pt;text-align: center;">
									<h5 style="font-size: 12pt;font-weight: 600; border-top: solid 1px #000000; border-bottom: solid 1px #000000;  padding: 5px 0px">รายการค่าประกันภัยรถ</h5>
							</td>
							</tr>
							<?php if($data['cashcheck']=='1'){?>
							 <tr>


								<td width="60%" colspan="2"  style="font-size: 11pt;">
								  <p style="font-size: 11pt;margin:  0px">ชำระเต็มจำนวน</p>
							</td>
									<td width="40%" >
										 <span  style="float:right;;"><?php echo Xprice2($data['cashprice'])?> บาท</span>

								</td>
							</tr> 
							<?php }?>
							<?php if($data['periodcheck1']=='1'){?>
								<tr>


								<td width="60%" colspan="2"  style="font-size: 11pt;">
								  <p style="font-size: 11pt;margin:  0px">งวดที่&nbsp;<?php echo $data['period1']?></p>
								</td>
									<td width="40%" >
										 <span  style="float:right;;"><?php echo Xprice2($data['periodcheck1price'])?> บาท</span>

								</td>
							</tr> 
							<?php }?>
							<?php if($data['periodcheck2']=='1'){?>
								<tr>


								<td width="60%" colspan="2"  style="font-size: 11pt;">
								  <p style="font-size: 11pt;margin:  0px">งวดที่&nbsp;<?php echo $data['period2']?></p>
								</td>
									<td width="40%" >
										 <span  style="float:right;;"><?php echo Xprice2($data['periodcheck2price'])?> บาท</span>

								</td>
							</tr> 
							<?php }?>
							<?php if($data['periodcheck3']=='1'){?>
								<tr>


								<td width="60%" colspan="2"  style="font-size: 11pt;">
								  <p style="font-size: 11pt;margin:  0px">งวดที่&nbsp;<?php echo $data['period3']?></p>
								</td>
									<td width="40%" >
										 <span  style="float:right;;"><?php echo Xprice2($data['periodcheck3price'])?> บาท</span>

								</td>
							</tr> 
							<?php }?>    

						  </tbody>
					</table>
				 <?php }?>

				  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="">
				  <tbody>      
						<tr>

							<tr>
								<td width="50%" colspan="2" style="font-size: 11pt;">
								  <p style="font-size: 11pt;margin:  0px;  font-weight: bold; ">รวมทั้งสิ้น</p>
					</td>
								<td width="50%" colspan="1" style="font-size: 14pt;">
									<span  style="float:right; padding-top: 0px; font-weight: bold;  padding: 0.5em 0; border-top: solid 1px #000000; border-bottom: double 4px #000000; "><?php echo Xprice2($data['totalall'])?> บาท</span>
					</td>
							</tr> 
							<tr>
								<td width="50%" colspan="2" style="font-size: 11pt;">
								  <p style="font-size: 11pt;margin:  0px">เงินสด</p>
								</td>
									<td width="50%" colspan="1" style="font-size: 14pt;">
										 <span  style="float:right;padding-top: 0px; font-weight: bold"><?php echo Xprice2($data['cash'])?> บาท</span>
									</td>
							</tr> 
							 <tr>
								<td width="auto" colspan="2" style="font-size: 11pt;">
									<p style="font-size: 11pt;margin:  0px">เงินโอน <font style="font-size: 10pt;"> <?php echo $data['detail_transfer']?></font></p>
								</td>
								<td width="auto" colspan="1" style="font-size: 14pt;">
									  <span  style="float:right;padding-top: 0px; font-weight: bold"><?php echo Xprice2($data['transfer'])?> บาท</span>
								</td>
							</tr> 
							<tr>
								<td width="50%" colspan="2" style="font-size: 11pt;padding-top:px">
								  <p style="font-size: 11pt;margin:  0px; ">เงินทอน</p>
								</td>
											 <td width="50%" colspan="1" style="font-size: 14pt;">
									 <span  style="float:right;padding-top: 0px; font-weight: bold"><?php echo Xprice2($data['change'])?> บาท</span>
								</td>
							</tr> 


							  
				  </tbody>
				</table>
			  
				</td>

				</tr>

			  </tbody>
			</table>		
			<!--Payment-->	
	  </td>
		
		
		
      <td width="35%" valign="top">
		  <p>&nbsp;</p>
		  
		  
		  
	 <?php if($data['appointment_check']=='1'){?>  		
            <table width="95%" border="0" align="left" cellpadding="0" cellspacing="0">
  <tbody>
     
         <tr>
			<td width="40%" style="">
                <p style="font-size: 11pt;margin: 0px">นัดรับทะเบียนรถ&nbsp;</p>
			</td>
			  <td width="55%" style="font-size: 11pt;margin:  0px;border-bottom:  1px dotted #000000;">
				 วันที่ &nbsp;<?php echo translateDateToThai($data['date_appointment'])?> 
			 </td>
			<!--<td width="73%" style="font-size: 11pt;margin:  0px;border-bottom:  1px dotted #000000;">
                <p style="font-size: 11pt;margin:  0px"><?php //echo $data['car_license_plate']?> </p>
			</td>-->
         </tr>
         <!--<tr>
			 <td width="22%" style="">
                 <p style="font-size: 11pt;margin:  0px">วันที่ &nbsp;</p>
			 </td>
             <td width="73%" style="font-size: 11pt;margin:  0px;border-bottom:  1px dotted #000000;">
				 <?php //echo translateDateToThai($data['date_appointment'])?> 
			 </td>
         </tr>-->
	  
	  	
          
      </tbody>
</table>
      <?php }?>
            <?php if(($data['check_manual']=='1')||($data['check_nomanual']=='1')){?>  
            <table width="95%" border="0" align="left" cellpadding="0" cellspacing="0">
  <tbody>
     
         <tr>
				<td width="95%" style="text-align: left" >
                                    <?php if(($data['check_manual']=='1')){?>
                   <p style="font-size: 11pt;margin:  0px;font-weight: 800;">เอกสาร &#9679;&#9679;&#9679;  มีคู่มือ  &#9679;&#9679;&#9679;</มีคู่มือ></p>
                                    <?php }else if(($data['check_nomanual']=='1')){?>
                                         <p style="font-size: 11pt;margin:  0px;font-weight: 800;">เอกสาร &#9679;&#9679;&#9679; ไม่มีคู่มือ &#9679;&#9679;&#9679;</p>
                                   <?php }?>
				</td>
                                </tr>
                                 
                         </tbody>
</table>
      <?php }?>

	
	
            <?php if($_GET['type']=='2'){?>
            <table width="95%" border="0" align="left" cellpadding="0" cellspacing="0" style="">
  <tbody>      
        <tr>
                            
                             <td width="100%" style="text-align: left;">
                                <span style="font-size:11pt; margin:  0px">สอบถามข้อมูลกรุณาติดต่อทางไลน์</span>
								<br>
                                <img src="assets/images/QRline.png" width="100" height="100" alt=""/>
								 
							</td>
                        </tr>                              
                          
  </tbody>
</table>
            <?php }?>
	
	
		
            <?php if(($data['advertisement']!='')&&($_GET['type']=='2')){?>
            <table width="95%" border="0" align="left" cellpadding="0" cellspacing="0">
  <tbody>
                                   <tr>
                                       
                                <td width="100%" style="font-size: 11pt;margin:  0px;border-bottom:  1px dotted #000000;padding-top:10px">
                                    <?php echo $data['advertisement']?> 
				</td>
                                
			</tr>
                            
                              
  </tbody>
</table>
            <br>
          
                <?php }?>
		  
	  </td>
		
    </tr>
  </tbody>
</table>

<table width="95%" align="center" border="0" cellspacing="0" cellpadding="0" style="font-size: 10px; ">
  <tbody>
    <tr>
      <td height="30" valign="bottom" style="border-top: 1px solid #000; padding-left: 10px;">เมื่อท่านชำระเงินเรียบร้อยแล้ว "โปรดเรียกหลักฐานการชำระเงินทุกครั้ง"</td>
    </tr>
    <tr>
      <td align="right">
		  ลงชื่อ .............................................................................. ผู้รับเงิน
		<p style="padding-right: 45px;padding-top: 10px;">(..................................................................................)</p></td>
    </tr>
    <tr>
      <td style="font-size: 9px; padding-left: 10px;">นโยบายส่วนบุคคล<br>บริษัท พัฒนสิน โบรกเกอร์ จำกัด<!--สำนักงานตัวแทนทรัพย์ดีหลวง--> เก็บรวบรวม ใช้ เปิดเผย และเก็บรักษาข้อมูลส่วนบุคคลของท่านตาม พรบ.คุ้มครองส่วนบุคคล พ.ศ.2562</td>
    </tr>
  </tbody>
</table>
	

<!--<p align="right" style="padding-top: 30px;">.</p>
<p>&nbsp;</p>-->
<script>
	window.print();
</script>
</body>
</html>