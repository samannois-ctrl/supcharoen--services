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
</head>
<style>
 @page {margin: 0;} 
  .page-break { height:0; page-break-before:always; margin:0; border-top:none; }
        
     body, p, span, td, a, h5 {font-size:12pt; font-family: Prompt,Arial, Helvetica, sans-serif;}
     body{margin-left:1em; margin-right:1em;}
    .page{
	    top:0px;
		height:auto;
		padding-top:0px;
		background-color: aquamarine;
		page-break-after : always;   
		font-family: Prompt, Arial, Helvetica, sans-serif;
		position:relative;
		border-bottom:0px solid #000;
		margin: 0mm;
		}
</style>

<body>
<div>&nbsp;</div>
<div style="height: auto; width: 280px; background: #ffffff; margin:0px; ">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tbody>
    <tr>
        <td valign="top">
			
<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
  <tbody>
    
    		<tr>
				
				<td style="line-height:22px;text-align: center">
					<!--<h5 style="font-size: 14pt;line-height:25px;margin: 12px 0px 0px 0px;font-weight: 600;">บริษัท พัฒนสิน โบรกเกอร์ จำกัด  ///  ทรัพย์ดีหลวง <br>AGENT OFFICE</h5>-->
                    <h5 style="font-size: 16pt;line-height:25px;margin: 12px 0px 0px 0px;font-weight: 600;"><!--สถานตรวจสภาพรถ -->ทรัพย์ดีหลวง&nbsp;<?php echo $_SESSION['branch_id']-1;?></h5>
					<p style="font-size: 11pt;margin:  0px"><!--86/9 ม.9 ต.ชิงโค อ.สิงหนคร จ.สงขลา 90280<br>-->โทร. 066-002-4004</p>
                    <h5 style="font-size: 14pt;margin: 10px 0px 10px 0px; font-weight: 800;  "><?php if((($_GET['type']=='2')&&($data['print_customer']=='1'))||(($_GET['type']=='1')&&($data['print_shop']=='1'))){echo 'สำเนา';}?>ใบรับเงิน</h5>
				</td>
			</tr>
                     
  </tbody>
</table>
            <?php
            $dateArray = explode("-",$data['date_input']);
		$mon= $dateArray[1];
		$year= $dateArray[0] ;
                $dateinput = $year.$mon;
		
            
            ?>
 <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
         <tr>
				<td width="40%" style="padding-top:10px">
                                    <p style="font-size: 12pt;margin:  0px; font-weight: bold">เลขที่ใบรับเงิน</p>
				</td>
                                <td width="60%"  style="font-size: 12pt;margin:  0px;border-bottom:  1px dotted #000000;padding-top:10px"><?php echo $data['receipt_no']?>
                                   
				</td>
                                </tr>
                                   <tr>
                                       <td width="8%" style="padding-top:10px">
                                    <p style="font-size: 12pt;margin:  0px; font-weight: bold">วันที่</p>
				</td>
                                <td width="42%" style="font-size: 12pt;margin:  0px;border-bottom:  1px dotted #000000;padding-top:10px">
                                    <?php echo translateDateToThai($data['date_input'])?> 
				</td>
                                
			</tr>
                        <tr>
                            <td width="100%" colspan="6" style="font-size: 9pt;text-align: center;padding-top:5px">
                                <span>----------------------------------------</span>
				</td>
                        </tr>             
  </tbody>
</table>
            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
         <tr>
             <td width="35%" style="padding-top:5px">
                                    <p style="font-size: 12pt;margin:  0px"><span style="font-weight: 600;">ลูกค้า</span></p>
				</td>
				<td width="65%" style="font-size: 12pt;margin:  0px;border-bottom:  1px dotted #000000;padding-top:5px"><?php if($data['cust_status_Legal']!='1'){?>คุณ<?php }?><?php  echo $data['cust_name']; ?> <?php  echo $data['cust_sname']; ?> 
                                    
				</td>
                                
			</tr>
               </tbody>
</table>
            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
         <tr>
             <td width="35%" style="padding-top:5px">
                                    <p style="font-size: 12pt;margin:  0px"><span style="font-weight: 600;">โทรศัพท์</span></p>
				</td>
				<td width="65%" style="font-size: 12pt;margin:  0px;border-bottom:  1px dotted #000000;padding-top:5px"><?php  echo $data['cust_phone']; ?> 
                                    
				</td>
                                
			</tr>
               </tbody>
</table>
            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="padding-top:10px">
  <tbody>      
        <tr>
             <td width="35%" style="padding-top:5px" align="left">
                       <p style="font-size: 12pt;margin:  0px;font-weight: 600;">ทะเบียนรถ</p>
			 </td>
			 <td width="65%" style="font-size: 12pt;margin:  0px;border-bottom:  1px dotted #000000;padding-top:5px"  align="left"><?php echo $data['car_license_plate']?> 
                                    
			</td>
                                <td width="20%" >
                                    
				</td>
                                
			</tr>
                        <tr>
                            <td width="100%" colspan="3" style="font-size: 9pt;text-align: center;padding-top:5px">
                                <span>----------------------------------------</span>
				</td>
                        </tr>             
  </tbody>
</table>
             <?php if(($data['actcheck']=='1')||($data['taxcheck']=='1')||($data['carcheck']=='1')||($data['carcheck']=='1')||($data['othercheck']=='1')){?>
            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="padding-top:10px">
  <tbody>      
        <tr>
                            <td width="100%" colspan="4" style="font-size: 12pt;text-align: center;">
                                <h5 style="font-size: 14pt;margin:  0px;font-weight: 600; ">รายการชำระเงิน</h5>
				</td>
                        </tr>
                        <?php if($data['actcheck']=='1'){?>
                            <tr>
                               
                            <td width="60%" colspan="2" style="font-size: 12pt;padding-top:10px">
                              <p style="font-size: 12pt;margin:  0px"><?php if($data['car_type']=='2'){?>พ.ร.บ.<?php }else{?>พ.ร.บ. + บริการ<?php }?></p>
				</td>
                                <td width="40%" >
                                    <span  style="float:right;padding-top: 10px;"><?php echo Xprice2($data['actprice'])?> บาท</span>
				</td>
                        </tr>
                        <?php }?>
                            <?php if($data['taxcheck']=='1'){?>
                            <tr>

                            <td width="60%" colspan="2" style="font-size: 12pt;padding-top:10px">
                              <p style="font-size: 12pt;margin:  0px">ทะเบียนรถ</p>
				</td>
                                 <td width="40%"  >
                                    <span  style="float:right;padding-top: 10px;"><?php echo Xprice2($data['taxprice'])?> บาท</span>
				</td>
                        </tr>
                          <?php }?>
                        <?php if($data['carcheck']=='1'){?>
                            <tr>
                               

                            <td width="60%" colspan="2"  style="font-size: 12pt;padding-top:10px">
                              <p style="font-size: 12pt;margin:  0px">ตรวจสภาพรถ</p>
				</td>
                                <td width="40%" >
                                     <span  style="float:right;padding-top: 10px;"><?php echo Xprice2($data['carcheckprice'])?> บาท</span>
                                     
				</td>
                        </tr> 
                        <?php }?>
                        <?php if($data['carsercheck']=='1'){?>
                            <tr>
                                

                            <td width="60%" colspan="2"  style="font-size: 12pt;padding-top:10px">
                              <p style="font-size: 12pt;margin:  0px">บริการต่อทะเบียน</p>
				</td>
                                <td width="40%" >
                                     <span  style="float:right;padding-top: 10px;"><?php echo Xprice2($data['carserprice'])?> บาท</span>
                                     
				</td>
                        </tr> 
                        <?php }?>
                        <?php if($data['othercheck']=='1'){?>
                            <tr>
                               
                            <td width="30%"  style="font-size: 12pt;padding-top:10px">
                              <p style="font-size: 12pt;margin:  0px">อื่นๆ ระบุ</p>
				</td>
                                <td width="30%" style="font-size: 12pt;margin:  0px;border-bottom:  1px dotted #000000;padding-top:5px"><?php echo $data['otherwork_name']?>
                                    
				</td>
                                <td width="40%" >
                                     <span  style="float:right;padding-top: 10px;"><?php echo Xprice2($data['otherprice'])?> บาท</span>
                                     
				</td>
                        </tr> 
                        <?php }?>
                        <tr>
                            <td width="100%" colspan="4" style="font-size: 9pt;text-align: center;padding-top:10px">
                                <span>----------------------------------------</span>
				</td>
                        </tr>     
  </tbody>
</table>
             <?php }?>
             <?php if(($data['cashcheck']=='1')||($data['periodcheck1']=='1')||($data['periodcheck2']=='1')||($data['periodcheck3']=='1')){?>
            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="padding-top:10px">
  <tbody>      
        <tr>
                            <td width="100%" colspan="5" style="font-size: 12pt;text-align: center;">
                                <h5 style="font-size: 14pt;margin:  0px;font-weight: 600; ">รายการค่าประกันภัยรถ</h5>
				</td>
                        </tr>
                        <?php if($data['cashcheck']=='1'){?>
                            <tr>
                                

                            <td width="60%" colspan="2"  style="font-size: 12pt;padding-top:10px">
                              <p style="font-size: 12pt;margin:  0px">ชำระเต็มจำนวน</p>
				</td>
                                <td width="40%" >
                                     <span  style="float:right;padding-top: 10px;"><?php echo Xprice2($data['cashprice'])?> บาท</span>
                                     
				</td>
                        </tr> 
                        <?php }?>
                        <?php if($data['periodcheck1']=='1'){?>
                            <tr>
                                

                            <td width="60%" colspan="2"  style="font-size: 12pt;padding-top:10px">
                              <p style="font-size: 12pt;margin:  0px">งวดที่&nbsp;<?php echo $data['period1']?></p>
				</td>
                                <td width="40%" >
                                     <span  style="float:right;padding-top: 10px;"><?php echo Xprice2($data['periodcheck1price'])?> บาท</span>
                                     
				</td>
                        </tr> 
                        <?php }?>
                        <?php if($data['periodcheck2']=='1'){?>
                            <tr>
                                

                            <td width="60%" colspan="2"  style="font-size: 12pt;padding-top:10px">
                              <p style="font-size: 12pt;margin:  0px">งวดที่&nbsp;<?php echo $data['period2']?></p>
				</td>
                                <td width="40%" >
                                     <span  style="float:right;padding-top: 10px;"><?php echo Xprice2($data['periodcheck2price'])?> บาท</span>
                                     
				</td>
                        </tr> 
                        <?php }?>
                        <?php if($data['periodcheck3']=='1'){?>
                            <tr>
                                

                            <td width="60%" colspan="2"  style="font-size: 12pt;padding-top:10px">
                              <p style="font-size: 12pt;margin:  0px">งวดที่&nbsp;<?php echo $data['period3']?></p>
				</td>
                                <td width="40%" >
                                     <span  style="float:right;padding-top: 10px;"><?php echo Xprice2($data['periodcheck3price'])?> บาท</span>
                                     
				</td>
                        </tr> 
                        <?php }?>
    
                        <tr>
                            <td width="100%" colspan="5" style="font-size: 9pt;text-align: center;padding-top:10px">
                                <span>----------------------------------------</span>
				</td>
                        </tr>     
  </tbody>
</table>
             <?php }?>
            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="padding-top:10px">
  <tbody>      
        <tr>
                            
                            <tr>
                            <td width="50%" colspan="2" style="font-size: 12pt;">
                              <p style="font-size: 12pt;margin:  0px;  font-weight: bold">รวมทั้งสิ้น</p>
				</td>
                            <td width="50%" colspan="1" style="font-size: 14pt;">
                                <span  style="float:right; padding-top: 0px; font-weight: bold"><?php echo Xprice2($data['totalall'])?> บาท</span>
				</td>
                        </tr> 
                            <tr>
                            <td width="50%" colspan="2" style="font-size: 12pt;padding-top:5px">
                              <p style="font-size: 12pt;margin:  0px">เงินสด</p>
				</td>
                                <td width="50%" colspan="1" style="font-size: 14pt;">
                                     <span  style="float:right;padding-top: 0px; font-weight: bold"><?php echo Xprice2($data['cash'])?> บาท</span>
				</td>
                        </tr> 
                         <tr>
                            <td width="auto" colspan="2" style="font-size: 12pt;padding-top:5px">
                              	<p style="font-size: 12pt;margin:  0px">เงินโอน <font style="font-size: 10pt;"> <?php echo $data['detail_transfer']?></font></p>
							</td>
                            <td width="auto" colspan="1" style="font-size: 14pt;">
                                  <span  style="float:right;padding-top: 0px; font-weight: bold"><?php echo Xprice2($data['transfer'])?> บาท</span>
							</td>
                        </tr> 
                            <tr>
                            <td width="50%" colspan="2" style="font-size: 12pt;padding-top:px">
                              <p style="font-size: 12pt;margin:  0px; ">เงินทอน</p>
				</td>
                                         <td width="50%" colspan="1" style="font-size: 14pt;">
                                 <span  style="float:right;padding-top: 0px; font-weight: bold"><?php echo Xprice2($data['change'])?> บาท</span>
				</td>
                        </tr> 
                            
                            
                        <tr>
                            <td width="100%" colspan="3" style="font-size: 9pt;text-align: center;padding-top:10px">
                                <span>----------------------------------------</span>
				</td>
                        </tr>     
  </tbody>
</table>
           <?php if($data['appointment_check']=='1'){?>  
            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
     
         <tr>
			<td width="45%" style="padding-top:10px">
                <p style="font-size: 12pt;margin:  0px">นัดรับทะเบียนรถ &nbsp;</p>
			</td>
			<td width="55%" style="font-size: 12pt;margin:  0px;border-bottom:  1px dotted #000000;padding-top:10px">
                <p style="font-size: 12pt;margin:  0px"><?php echo $data['car_license_plate']?> </p>
			</td>
         </tr>
         <tr>
			 <td width="45%" style="padding-top:10px">
                 <p style="font-size: 12pt;margin:  0px">วันที่ &nbsp;</p>
			 </td>
             <td width="55%" style="font-size: 12pt;margin:  0px;border-bottom:  1px dotted #000000;padding-top:10px">
				 <?php echo translateDateToThai($data['date_appointment'])?> 
			 </td>
         </tr>
         <tr>
             <td width="90%" colspan="2" style="font-size: 9pt;text-align: center;padding-top:10px">
                               <span>----------------------------------------</span>
			 </td>
         </tr>  
      </tbody>
</table>
      <?php }?>
            <?php if(($data['check_manual']=='1')||($data['check_nomanual']=='1')){?>  
            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
     
         <tr>
				<td width="95%" style="text-align: center" >
                                    <?php if(($data['check_manual']=='1')){?>
                   <p style="font-size: 14pt;margin:  0px;font-weight: 800;">&#9679;&#9679;&#9679;  มีคู่มือ  &#9679;&#9679;&#9679;</มีคู่มือ></p>
                                    <?php }else if(($data['check_nomanual']=='1')){?>
                                         <p style="font-size: 14pt;margin:  0px;font-weight: 800;">&#9679;&#9679;&#9679; ไม่มีคู่มือ &#9679;&#9679;&#9679;</p>
                                   <?php }?>
				</td>
                                </tr>
                                  <tr>
                            <td width="90%" colspan="3" style="font-size: 9pt;text-align: center;">
                                <span>----------------------------------------</span>
				</td>
                        </tr>  
                         </tbody>
</table>
      <?php }?>
                                <?php if(($data['advertisement']!='')&&($_GET['type']=='2')){?>
            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
                                   <tr>
                                       
                                <td width="100%" style="font-size: 12pt;margin:  0px;border-bottom:  1px dotted #000000;padding-top:10px">
                                    <?php echo $data['advertisement']?> 
				</td>
                                
			</tr>
                            
                              
  </tbody>
</table>
            <br>
          
                <?php }?>
            <?php if($_GET['type']=='2'){?>
            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="padding-top:10px">
  <tbody>      
        <tr>
                            
                             <td width="100%" colspan="3" style="font-size: 12pt;text-align: center;">
                                <h5 style="font-size: 14pt;margin:  0px;font-weight: 600; ">ขอบคุณที่ใช้บริการ</h5>
				</td>
                        </tr>
                            <tr>
                            <td width="100%" colspan="3" style="font-size: 12pt;padding-top:10px;text-align: center;">
                              <p style="font-size: 12pt;margin:  0px">หากต้องการเช็คประกันภัยรถยนต์ <br>กรุณาเพิ่มบัญชีไลน์ ด้วย QR Code นี้</p>
				</td>
                        </tr> 
                            <tr>
                            <td width="100%" colspan="3" style="font-size: 12pt;padding-top:10px;text-align: center;">
                              <img src="assets/images/QRline.png" width="100" height="100" alt=""/>
				</td>
                        </tr> 
                        <tr>
                            <td width="100%" colspan="3" style="font-size: 12pt;">
                                <p style="font-size: 12pt;margin:  0px"><u>กรุณาส่งเอกสารใน Line ดังนี้</u></p>
				</td>
                        </tr> 
                            <tr>
                            <td width="100%" colspan="3" style="font-size: 12pt;padding-top:0px">
                              <p style="font-size: 12pt;margin:  0px">1. รายการจดทะเบียนรถ (หน้าเล่ม)</p>
				</td>
                        </tr> 
                            <tr>
                            <td width="100%" colspan="3" style="font-size: 12pt;padding-top:0px;padding-bottom: 10px">
                              <p style="font-size: 12pt;margin:  0px">2. กรมธรรม์เดิมที่ยังไม่หมดอายุ (ถ้ามี)</p>
				</td>
                        </tr> 
                             
                            
                            
                          
  </tbody>
</table>
            <?php }?>
        </td>
        
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