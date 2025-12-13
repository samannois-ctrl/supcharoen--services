<?php include('phpconfig.php');?>
<?php
	$_POST['DataID']=$_GET['DataID'];
	$query="SELECT a.* , b.username , c.branch_name , d.insurance_name, e.corp_name , f.corp_name  AS ActCorp , g.work_name FROM tbl_work_data a "
		." LEFT JOIN tbl_user_data b ON a.user_input_id=b.id "
		." LEFT JOIN tbl_branch_data c ON b.branch_id=c.id "
		." LEFT JOIN tbl_insurance_name d ON a.insurance_type_id=d.id "	
		." LEFT JOIN tbl_insurance_corp e ON a.insurance_corp_id=e.id "	
		." LEFT JOIN tbl_insurance_corp f ON a.act_corp_id=f.id "
		." LEFT JOIN tbl_work_type g ON a.other_type_id=g.id "		
		." WHERE a.id = '".$_POST['DataID']."' ";
     $result = mysql_query($query);
     $data = mysql_fetch_assoc($result);
		
	 if($data['contract_text']==''){
		 $data['contract_text']='สัญญาผ่อนชำระ  ตามใบแจ้งงานฉบับนี้ ข้าพเจ้ายินดีผ่อนชำระค่างวด ตามเวลาที่กำหนด หากไม่ชำระค่างวดได้ ข้าพเจ้ายินดีให้ยกเลิกกรมธรรม์ และยินดีให้บริษัทประกันภัยโอนเงินค่ายกเลิกให้กับตัวแทน โดยไม่มีข้อโต้แย้ง หรือเงื่อนไขไดๆทั้งสิ้น';
	 }else{
		 $data['contract_text']=$data['contract_text'];
	 }

    $query="SELECT * FROM tbl_work_installment WHERE  work_id = '".$_POST['DataID']."' ORDER BY period_payment ASC ";
	$resultInstallment = mysql_query($query);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ใบแจ้งงาน</title>
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
		
	body{
		margin-left:2em; margin-right:2em;
	    font-family: 'Sarabun', sans-serif;
	}
		
	table,tr,td,h1,h2,h3,h4 {font-size:10pt; font-family: 'Sarabun', sans-serif;}
		
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
		
	@page {margin: 0;}	
	 .page-break { height:0; page-break-before:always; margin:0; border-top:none; }
        }
     
		
     
</style>
</head>

<body>
<div>&nbsp;</div>
<table width="100%" border="1" cellpadding="3" cellspacing="0" bordercolor="#1D1D1D">
  <tbody>
    <tr>
      <td height="25" colspan="6" align="center"><h2><strong>ใบแจ้งงาน <?php echo $data['branch_name']?></strong></h2></td>
    </tr>
    <tr>
      <td height="30" colspan="6" align="center">
      
      วันที่แจ้งงาน <?php echo translateDateToThai($data['date_input'])?> 
      &nbsp;&nbsp;
      ทะเบียนรถ <?php echo $data['car_license_plate']?> 
      &nbsp;&nbsp;
      วันที่ตอบ Mail.................................................</td>
    </tr>
    <tr>
      <td height="30" colspan="6" align="center">
      ชื่อลูกค้า/Sub <?php if($data['cust_name']!=''){  echo $data['cust_name']." ".$data['cust_sname']; }else{ echo "...........................";}?>  
      &nbsp;&nbsp;
      ชื่อเล่น <?php if($data['cust_nickname']!=''){  echo $data['cust_nickname'];}else{ echo "..........................."; }?> 
      &nbsp;โทรศัพท์&nbsp;
       <?php $haveComma=''; if($data['tel1']!=''){ echo $data['tel1']; $haveComma=','; } if($data['tel2']!=''){ echo '&nbsp;'.$haveComma.$data['tel2']; } ?>
      </td>
    </tr>
    <tr>
      <td height="30" colspan="6" align="center">
      ยี่ห้อ <?php if($data['car_brand']!=''){ echo $data['car_brand'];}else{  echo "..........................."; }?> 
      รุ่นรถ <?php if($data['car_model']!=''){ echo $data['car_model']; }else{  echo "..........................."; }?> 
     </td>
    </tr>
    <tr>
      <td width="40%" height="30"  align="center" bgcolor="#E4E6E9"><strong>รายการ</strong></td>
      <td height="30" colspan="3" align="center" bgcolor="#E4E6E9"><strong>บริษัท</strong></td>
      <td width="20%" height="30" align="center" bgcolor="#E4E6E9"><strong>วันคุ้มครอง</strong></td>
      <td width="20%" height="30" align="center" bgcolor="#E4E6E9"><strong>วันสิ้นสุด</strong></td>
    </tr>
    <tr>
      <td height="30"  align="left" nowrap="nowrap" style="padding-left: 10px;">
       กรมธรรม์ประเภท <?php echo $data['insurance_name']?>
       <label>
	<input name="insurance_fix_garace" id="insurance_fix_garace" type="checkbox" class="ace" value="2" <?php if($data['insurance_fix_garace']=='2'){ echo "checked";}?> />
	&nbsp;
	 <span class="lbl"> ซ่อมห้าง</span>
	</label>
	<label>
	<input name="insurance_fix_garace" id="insurance_fix_garace" type="checkbox" class="ace" value="1" <?php if($data['insurance_fix_garace']=='1'){ echo "checked";}?> />
	&nbsp;
	 <span class="lbl"> ซ่อมอู่</span>
	</label>
					
       </td>
      <td height="30" colspan="3" align="center"><?php echo $data['corp_name']?></td>
      <td height="30" align="center"><?php echo translateDateToThai($data['insurance_start'])?></td>
      <td height="30" align="center"><?php echo translateDateToThai($data['insurance_end'])?></td>
    </tr>
    <tr>
      <td height="30"  align="left" style="padding-left: 10px;">พรบ. </td>
      <td height="30" colspan="3" align="center"><?php echo $data['ActCorp']?></td>
      <td height="30" align="center"><?php echo translateDateToThai($data['act_protect_start'])?></td>
      <td height="30" align="center"><?php echo translateDateToThai($data['act_protect_end'])?></td>
    </tr>
    <tr>
      <td height="30"  align="left" style="padding-left: 10px;">ทุนประกัน <?php echo Xprice2($data['insurance_limit'])?></td>
      <td height="30" colspan="3" align="center">&nbsp;</td>
      <td height="30" align="center">&nbsp;</td>
      <td height="30" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td height="40"  colspan="6" align="left" style="padding-left: 10px;">วันจดทะเบียน : <?php if(($data['car_register_day']!='0000-00-00')){echo translateDateToThai($data['car_register_day']);}else{echo "...........................";}?>  <?php if(($data['act_pay_date']!='0000-00-00')){?>วันที่เสียภาษี : <?php echo translateDateToThai($data['act_pay_date'])?> <?php }else{?>วันที่เสียภาษี : ...........................<?php }?> <?php if(($data['end_tax_day']!='0000-00-00')){?>วันสิ้นอายุภาษี : <?php echo translateDateToThai($data['end_tax_day'])?> <?php }else{?>วันสิ้นอายุภาษี : ...........................<?php }?> <?php if(($data['insurance_code']!='')){?>แพคเกจ : <?php echo $data['insurance_code']?> <?php }else{?>แพคเกจ : ...........................<?php }?>
      
   <label>
   <?php //echo 'act_do>'.$data['act_do']." act_notdo>".$data['act_notdo']." act_donow>".$data['act_donow']." act_prepare>".$data['act_prepare']?>
	   
	     
	    
	</label> </td>
    </tr>
    <tr>
      <td height="25"  align="center"><strong>ค่าบริการ</strong></td>
      <td height="25" align="center"><strong>ราคา</strong></td>
      <td height="25" align="center"><strong>ส่วนลด</strong></td>
      <td height="25" align="center"><strong>สุทธ</strong>ิ</td>
      <td width="35%"height="25" colspan="2" align="center">การจัดส่งเอกสาร</td>
    </tr>
    <tr>
      <td height="25"  align="left" style="padding-left: 10px;">- ทะเบียน</td>
      <td height="25" align="right" style="padding-right: 10px;"><?php echo Xprice2($data['act_price_tax'])?></td>
      <td height="25" align="right" style="padding-right: 10px;">&nbsp;</td>
      <td height="25" align="right" style="padding-right: 10px;"><?php echo Xprice2($data['act_price_tax'])?></td>
      <td height="25" colspan="2" align="left">
        <div class="radio">
          <label>
  <input  type="checkbox" class="ace"   value="1" <?php if($data['address_sendtype']=='1'){ echo "checked";}?> />
            <span class="lbl"> โทรแจ้งลูกค้ารับหน้าร้าน</span>
            </label>
          
        </div></td>
    </tr>
    <tr>
      <td height="25"  align="left" style="padding-left: 10px;">- พรบ.</td>
      <td height="25" align="right" style="padding-right: 10px;"><?php echo Xprice2($data['act_price'])?></td>
      <td height="25" align="right" style="padding-right: 10px;"><?php echo Xprice2($data['act_discount'])?></td>
      <td height="25" align="right" style="padding-right: 10px;"><?php echo Xprice2($data['act_price_total'])?></td>
      <td height="25" colspan="2" align="left">
        <div class="radio">
          <label>
            <input  type="checkbox" class="ace"   value="2"  <?php if($data['address_sendtype']=='2'){ echo "checked";}?>/>
            <span class="lbl"> จัดส่งไปรษณีย์ แบบลงทะเบียน</span>
            </label>
          
          </div>
        
      </td>
    </tr>
<!--    <tr>
      <td  align="left" style="padding-left: 10px;">-รวมประกันภัยและดำเนินการ 
      
       
      </td>  
      <td align="right" style="padding-right: 10px;">
      <?php //echo Xprice2($data['insurance_price']+$data['service_other_price'])?></td>
      <td align="right" style="padding-right: 10px;"><?php //echo Xprice2($data['insurance_discount'])?></td>
      <td align="right" style="padding-right: 10px;"><?php //echo Xprice2($data['insurance_total']+$data['service_other_price'])?></td>
      <td colspan="2" align="left">
        <div class="radio">
          <label>
            <input  type="checkbox" class="ace"   value="3"  <?php //if($data['address_sendtype']=='3'){ echo "checked";}?>/>
            <span class="lbl"> จัดส่งไปรษณีย์ แบบ EMS</span>
            </label>
          
          </div>
        
      </td>
    </tr>-->
    <tr>
      <td height="25"  align="left" style="padding-left: 10px;">- ประกันภัย
      
       
      </td>  
      <td height="25" align="right" style="padding-right: 10px;">
      <?php echo Xprice2($data['insurance_price'])?></td>
      <td height="25" align="right" style="padding-right: 10px;"><?php echo Xprice2($data['insurance_discount'])?></td>
      <td height="25" align="right" style="padding-right: 10px;"><?php echo Xprice2($data['insurance_total'])?></td>
      <td height="25" colspan="2" align="left">
        <div class="radio">
          <label>
            <input  type="checkbox" class="ace"   value="3"  <?php if($data['address_sendtype']=='3'){ echo "checked";}?>/>
            <span class="lbl"> จัดส่งไปรษณีย์ แบบ EMS</span>
            </label>
          
          </div>
        
      </td>
    </tr>
    <tr>
      <td height="25"  align="left" style="padding-left: 10px;">- ค่าบริการ<!--- ตรวจสภาพรถ--></td>
      <td height="25" align="right" style="padding-right: 10px;"><?php echo Xprice2($data['car_check_price_service'])?><?php //echo Xprice2($data['car_check_price'])?> </td>
      <td height="25" align="right" style="padding-right: 10px;"><?php //echo Xprice2($data['car_check_discount'])?></td>
      <td height="25" align="right" style="padding-right: 10px;"><?php echo Xprice2($data['car_check_price_service'])?><?php //echo Xprice2($data['car_check_total'])?></td>
		<td height="25" colspan="2" align="left"> <div class="radio">&nbsp;&nbsp;&nbsp;<strong>ที่อยู่ </strong></div></td>
    </tr>
    <tr>
      <td height="25"  align="left" style="padding-left: 10px;">- งานอื่นๆ <?php echo $data['work_name']?>&nbsp;</td>
      <td height="25" align="right" style="padding-right: 10px;"><?php echo Xprice2($data['service_other_price'])?></td>
      <td height="25" align="right" style="padding-right: 10px;">&nbsp;</td>
      <td height="25" align="right" style="padding-right: 10px;"><?php echo Xprice2($data['service_other_price'])?></td>
      <td height="25" colspan="2" align="left">
      		<div class="radio">
							<label>
<input type="checkbox" class="ace"   value="1" <?php if($data['address_use_type']=='1'){ echo "checked";}?> />
		<span class="lbl"> ตามกรมธรรม์</span>
						  </label>

						</div>
      	
      </td>
    </tr>
    <tr>
      <td height="25"  align="left" style="padding-left: 10px;">&nbsp;</td>
      <td height="25" align="right" style="padding-right: 10px;">&nbsp;</td>
      <td height="25" align="right" style="padding-right: 10px;">&nbsp;</td>
      <td height="25" align="right" style="padding-right: 10px;">&nbsp;</td>
      <td height="25" colspan="2" align="left">
        <div class="radio">
          <label>
            <input  type="checkbox" class="ace"  value="2"  <?php if($data['address_use_type']=='2'){ echo "checked";}?>/>
            <span class="lbl"> ตามรายการจดทะเบียน </span>
            </label>
          </div>
      </td>
    </tr>
<!--    <tr>
      <td  align="left" style="padding-left: 10px;">&nbsp;-งานอื่นๆ <?php //echo $data['work_name']?>&nbsp;</td>
      <td align="right" style="padding-right: 10px;"><?php //echo Xprice2($data['other_total'])?></td>
      <td align="right" style="padding-right: 10px;">&nbsp;</td>
      <td align="right" style="padding-right: 10px;"><?php //echo Xprice2($data['other_total'])?></td>
      <td colspan="2" align="left">
        <div class="radio">
          <label>
            <input  type="checkbox" class="ace"  value="2"  <?php //if($data['address_use_type']=='2'){ echo "checked";}?>/>
            <span class="lbl"> ตามรายการจดทะเบียน </span>
            </label>
          </div>
      </td>
    </tr>-->
    <tr>
      <td height="25"  align="left">&nbsp;</td>
      <td height="25" align="right" style="padding-right: 10px;">&nbsp;</td>
      <td height="25" align="right" style="padding-right: 10px;">&nbsp;</td>
      <td height="25" align="right" style="padding-right: 10px;">&nbsp;</td>
      <td height="25" colspan="2" align="left">
        
        <div class="radio">
          <label>
            <input   type="checkbox" class="ace"   value="3"  <?php if($data['address_use_type']=='3'){ echo "checked";}?>/>
            <span class="lbl"> ตามบัตรประชาชน</span>
            </label>
          
          </div>
      </td>
    </tr>
    <tr>
      <td height="25"  align="right"><strong><span style="padding-left: 10px;"><strong>รวม&nbsp;</strong></span></strong></td>
      <td height="25" align="right"><span style="padding-right: 10px;">
        <?php
		echo Xprice2($data['act_price_tax']+$data['act_price']+$data['insurance_price']+$data['car_check_price']+$data['car_check_price_service']+$data['service_other_price']+$data['other_total']);
	
		//$totalAll = GetSumtotal($data['id']); echo Xprice2($totalAll);
		 //Xprice2($data['act_price_tax']+$data['act_price']+$data['insurance_total']+$data['car_check_total']+$data['car_check_price_service']+$data['other_total'])?>
      </span></td>
      <td height="25" align="right" style="padding-right: 10px;"><?php echo Xprice2($data['act_discount']+$data['insurance_discount']+$data['car_check_discount'])?></td>
      <td height="25" align="right"><span style="padding-right: 10px;">
        <?php $totalAll = GetSumtotal($data['id']); echo Xprice2($totalAll);
		 //Xprice2($data['act_price_tax']+$data['act_price']+$data['insurance_total']+$data['car_check_total']+$data['car_check_price_service']+$data['other_total'])?>
      </span></td>
      <td height="25" colspan="2" align="left">
        <div class="radio">
          <label>
            <input name="address_use_type" type="checkbox" class="ace" id="address_use_type" value="4" <?php if($data['address_use_type']=='4'){ echo "checked";}?> />
            <span class="lbl"> โทรถามที่อยู่ลูกค้า</span>
            </label>
          </div>
      </td>
    </tr>
    <tr>
      <td height="25"  align="left">&nbsp;</td>
      <td height="25" colspan="3" align="center">&nbsp;</td>
      <td height="25" colspan="2" align="left">
        
        <!--<div class="radio">
          <label>
            <input  type="checkbox" class="ace"   value="3"  <?php //if($data['address_sendtype']=='4'){ echo "checked";}?>/>
            <span class="lbl"> พี่สาวจัดส่ง</span>
            </label>
          
          </div>-->
      </td>
    </tr>
    <tr>
      <td height="25"  colspan="6" align="left" style="padding-left: 10px;">
      <strong>การชำระเงิน</strong> 
     <input  type="checkbox" class="ace" value="2" <?php if($data['payment_type']=='1'){ echo "checked";}?> />
	&nbsp;
	 <span class="lbl"> <strong>เงินสด</strong></span>  
       <input  type="checkbox" class="ace" value="2" <?php if($data['payment_type']=='2'){ echo "checked";}?> />
	&nbsp;
	 <span class="lbl">   <strong>ผ่อน</strong> </span>
      จำนวน <?php if($data['payment_type']=='2'){
		echo countInstallment($data['id']); }?> งวด</td>
    </tr>
    <tr>
      <td align="left" valign="top" style="padding-left: 5px;padding-right: 5px;">
  <?php //if($data['payment_type']==2){ echo $data['contract_text']; 	 }?>
           <label><strong>การชำระเงิน :</strong> <?php if($data['payment_type']=='1'){ echo "เงินสด";}else{ echo "เงินผ่อน";}?></label><div style="clear: both"></div>
        
        <?php if($data['payment_type']=='1'){ 
		 		 while($installment=mysql_fetch_assoc($resultInstallment)){ 
				 	echo "จำนวนเงิน ".Xprice2($installment['amount'])." บาท<br>";
				 }
		 
		 }else if($data['payment_type']=='2'){  ?>
        	<table width="100%" align="left" style="font-size: 7pt">
       		  <?php $n=1; while($installment=mysql_fetch_assoc($resultInstallment)){ ?>
        		<tr>
        			<td width="45" nowrap="nowrap"><?php echo ' งวดที่ '.$n; ?></td>
        			<td width="93" align="right" nowrap="nowrap"><?php echo Xprice2($installment['amount'])?> บาท</td>
        			<td width="87" align="right" nowrap="nowrap">กำหนดชำระเงิน</td>
        			<td align="right"  nowrap="nowrap"><?php echo translateDateToThai($installment['due_date']);?></td>
        		</tr>
        		<?php $n++; }?>
        	</table>
         
      <?php } ?>
      </td>
      <td colspan="3" align="left" valign="top" style="padding-left: 10px; padding-top: 5px; font-size: 8pt">
          <label><strong>การยกเลิก พ.ร.บ.</strong></label><br>
<label>วันที่ยกเลิก : <?php echo translateDateToThai($data['act_cancel_date']);?></label><br>
<label>เลขที่ยกเลิก : <?php echo $data['act_cancel_no']?></label><br>
<label>เหตุผลที่ยกเลิก : <?php echo $data['act_cancel_reason']?></label><br>
<?php if(($data['act_paid']==1)||($data['act_overdue']==1)){?>
<label><strong>การชำระเงิน พ.ร.บ.</strong></label><br>
<?php }?>
<?php if($data['act_paid']==1){?>
<label>ชำระแล้ว ชำระเงินวันที่่ <?php echo translateDateToThai($data['act_paid_date']);?></label>
<?php }else if($data['act_overdue']==1){?>
<label>ค้างชำระ ครบกำหนดชำระวันที่ <?php echo translateDateToThai($data['act_payment_date']);?></label>
<?php }?>
        </td>
      <td colspan="2" align="left" valign="top" style="padding-left: 10px; padding-top: 5px; font-size: 8pt">
          <label><strong>การยกเลิกกรมธรรม์</strong></label><br>
<label>วันที่ยกเลิก : <?php echo translateDateToThai($data['ins_cancel_date']);?></label><br>
<label>เลขที่ยกเลิก : <?php echo $data['ins_cancel_no']?></label><br>
<label>เหตุผลที่ยกเลิก : <?php echo $data['ins_cancel_reason']?></label><br>
<?php if(($data['paid']==1)||($data['overdue']==1)){?>
<label><strong>การชำระเงิน บริษัทประกันภัย</strong></label><br>
<?php }?>
<?php if($data['paid']==1){?>
<label>ชำระแล้ว ชำระเงินวันที่่ <?php echo translateDateToThai($data['paid_date']);?></label>
<?php }else if($data['overdue']==1){?>
<label>ค้างชำระ ครบกำหนดชำระวันที่ <?php echo translateDateToThai($data['payment_due_date']);?></label>
<?php }?>
        </td>
    </tr>
  </tbody>
</table>
<!--<table width="100%" border="0" cellpadding="3" cellspacing="0" >
  <tr>
    <td width="57%" height="50" valign="bottom">ลงชื่อ...............................................................ผู้เอาประกันภัย/ผู้ได้รับมอบหมาย</td>
    <td  width="43%" align="right" valign="bottom">ลงชื่อ...............................................................ตัวแทน</td>
  </tr>
  <tr>
    <td  colspan="2" style="padding-top: 3px;">**หมายเหตุ ใบแจ้งงานนี้ออกโดยระบบอัติโนมัติ จึงไม่ต้องมีการลงนามก็ได้ให้ถือว่าทั้งสองฝ่ายอ่านและเข้าใจตรงกันทุกประการ </td>
  </tr>
  <tr>
    <td  colspan="2"> <?php //showBankAccount($data['branch_id'])?></td>
  </tr>
</table>-->
<p align="right" style="padding-top: 30px;">.</p>
<p>&nbsp;</p>
<script>
	window.print();
</script>
</body>
</html>