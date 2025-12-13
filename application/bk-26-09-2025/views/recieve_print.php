<?php 
//echo $getPrint['sql'];
//echo $getPrint['sqlInstallment'];
 function display_currency($value){
	 if($value > 0){
		 $xxValue = number_format($value);
	 }else{
		 $xxValue ='';
	 }
	 return $xxValue;
 }
?>
<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title>ใบสำคัญรับ</title>

	<link href="<?php echo base_url('assets/css/payment_css.css')?>" rel="stylesheet" type="text/css" />
	  

</head>
<body>
<div id="printCoverAreaOnly" style="margin: 10px;">
<div align="center" style="margin: 0 auto">
  <div class="headerBox" style="display: inline-block;"><div class="header">ทรัพย์เจริญโบรคเกอร์ประกันภัย</div>
  <div class="sub-header">536 ถ.รัตการ อ.หาดใหญ่ จ.สงขลา<br>
    Tel. 097-3245364, 081-2362323
  </div>
</div>	  
</div>
  <h6>ใบสำคัญรับ / Receipt Voucher</h63>

  <table width="100%" border="0" class="no-border"> 
    <tr>
      <td width="51%">ได้รับจาก / Receive From &nbsp;&nbsp;<?php echo $getPrint['recieve_from']?></td>
      <td width="49%" align="right">วันที่ / Date&nbsp;&nbsp;&nbsp;<?php echo $this->insurance_model->translateDateToThai($getPrint['recieve_date'])?></td>
    </tr>
  </table>
	
  <table class="table " width="98%" border="1" cellpadding="2" cellspacing="0" style="line-height: 9pt">
    <tr>
      <th width="69%">รายการ / Description</th>
      <th colspan="2">จำนวนเงิน / Amount</th>
    </tr>
    <tr>
      <td>
		  ค่ากรมธรรม์ 
		  <?php if($getPrint['insurance_amt'] > 0){ echo "สด "; } 
		     
		   if(($getPrint['insurance_amt'] > 0)&&($getPrint['all_installment_amt']>0)){
			   echo " / ";
		   }
		      
		      if($getPrint['all_installment_amt']>0){ echo ' ผ่อน  '.$getPrint['textInstallment']; }?>
		</td>
      <td width="24%" align="right"><?php echo display_currency($getPrint['totalInsuranceAmt'])?>&nbsp;</td>
      <td width="7%" align="right">บาท&nbsp;</td>
    </tr>
    <tr>
      <td>ค่า พ.ร.บ.   </td>
      <td align="right"><?php echo display_currency($getPrint['act_amt'])?>&nbsp;</td>
      <td align="right">บาท&nbsp;</td>
    </tr>
    <tr>
      <td>ค่าตรวจสภาพ  </td>
      <td align="right"><?php echo display_currency($getPrint['carcheck_amt'])?>&nbsp;</td>
      <td align="right">บาท&nbsp;</td>
    </tr>
    <tr>
      <td>ค่าภาษีประจำปี  </td>
      <td align="right"><?php echo display_currency($getPrint['tax_amt'])?>&nbsp;</td>
      <td align="right">บาท&nbsp;</td>
    </tr>
    <tr>
      <td>ค่าบริการต่อภาษี</td>
      <td align="right"><?php echo display_currency($getPrint['tax_service_amt'])?>&nbsp;</td>
      <td align="right">บาท&nbsp;</td>
    </tr>
	  <tr>
      <td>อื่นๆ</td>
      <td align="right"><?php echo display_currency($getPrint['other_payment'])?>&nbsp;</td>
      <td align="right">บาท&nbsp;</td>
    </tr>
    <tr>
      <td style="padding-left: 200px;"><strong>รวมยอด</strong></td>
      <td align="right">&nbsp;</td>
      <td align="right">บาท&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" >
		  <table class="no-border" border="0" width="100%" style="line-height: 9pt">
		  	<tr>
			   <td width="80"><span class="section-title">Payment</span></td> 
			   <td width="120" nowrap="nowrap">☐ เงินสด / Cash</td> 
			   <td width="96" nowrap="nowrap">☐ เช็ค / ธนาคาร</td> 
			   <td width="230" >
				 <div style="border-bottom-style: dotted;width: 100%; margin-bottom: -30px;"></div>
				</td> 
			   <td width="50" nowrap="nowrap">ลงวันที่/</td>
		      <td width="230" ><div style="border-bottom-style: dotted;width: 100%; margin-bottom: -30px;"></div></td>
			  </tr>
			</table> 
	    <table class="no-border" border="0" width="100%"  style="line-height: 9pt">
		  	<tr>
		  	  <td width="80"  >&nbsp;</td>
		  	  <td width="120" align="left" style="">☐ โอน / ธนาคาร</td>
		  	  <td width="" ><div style="border-bottom-style: dotted;width: 100%"></div></td>
		  	 
		  	  <td width="130" align="center" >หมายเลขเช็ค / No.&nbsp;</td>
		  	  <td width="180"><div style="border-bottom-style: dotted; width: 100%"></div></td>
		  	  
	  	    </tr>
		      
		  </table>
		  
	 จำนวนเงิน The Sum of Bahts
		 <table class="no-border" border="0" width="100%"  style="line-height: 9pt">
			 <tr>
			   <td width="120" align="right">ผู้รับเงิน/Collector</td>
			   <td width=""><div style="border-bottom-style: dotted; width: 100%"></div></td>
			   <td  width="120" align="center">ผู้จ่ายเงิน/Paid By</td>
			   <td width=""><div style="border-bottom-style: dotted; width: 100%"></div></td>
			   <td  width="120" align="right" nowrap="nowrap">ผู้บันทึก/Approved By</td>
			   <td width=""><div style="border-bottom-style: dotted; width: 100%"></div></td>
			 </tr>
			 <tr>
			   <td align="right">วันที่ / Date&nbsp;</td>
			   <td><div style="border-bottom-style: dotted; width: 100%"></div></td>
			   <td align="center">วันที่ / Date&nbsp;</td>
			   <td><div style="border-bottom-style: dotted; width: 100%"></div></td>
			   <td align="right">วันที่ / Date&nbsp;</td>
			   <td><div style="border-bottom-style: dotted; width: 100%"></div></td>
		   </tr>
	    </table>	 
	  </td>
    </tr>
 
  
  </table>


</div>
  

</body>
</html><script>
function buildprintReservePrint(content)
{  
  
   var head='<!DOCTYPE html>'+
              '<html>'+
              '<head>'+
              '<meta charset="UTF-8">'+''+
              '<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />'+
              '<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/payment_css.css')?>" rel="stylesheet" type="text/css" />'+
              '<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet" type="text/css" />'+
              '<style>@media print{ .underline {    border-bottom: 1px dotted #000;  min-width: 50px;  height: 20px;} .underlineTD{ border-bottom: 1px;		border-bottom-style: dotted;	} }</style>'+
              '</head>'+
              '<body>';

  var foot=   '</body>'+
              '</html>';

  return  head+content+foot;      
}

function printDataInstallment(divName)
		{  
		   var divToPrint=document.getElementById(divName);
		   var newWin= window.open("");
			// newWin.print(); 
		   newWin.document.write(buildprintReservePrint(divToPrint.innerHTML));
		   setTimeout(function(){ newWin.print(); 

			newWin.close();
		   }, 1000);
		   //newWin.print();
		   //newWin.close();
		}
	$(document).ready(function(){
		printDataInstallment('printCoverAreaOnly')
	})
</script>
