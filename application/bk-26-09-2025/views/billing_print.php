<!-- icons -->
	<link href="<?php echo base_url('assets/plugins/simple-line-icons/simple-line-icons.min.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/plugins/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
	<!--bootstrap -->
	<link href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/plugins/summernote/summernote.css') ?>" rel="stylesheet">
	<!-- morris chart -->
	<link href="<?php echo base_url('assets/plugins/morris/morris.css') ?>" rel="stylesheet" type="text/css" />
	<!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/material/material.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/material_style.css') ?>">
	<!-- animation -->
	<link href="<?php echo base_url('assets/css/pages/animate_page.css') ?>" rel="stylesheet">
	<!-- Template Styles -->
	<link href="<?php echo base_url('assets/css/plugins.min.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/css/responsive.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/css/theme-color.css') ?>" rel="stylesheet" type="text/css" />
	<!-- thaidate -->
	<link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker.min.css')?>" rel="stylesheet">

	<!-- favicon -->
	<link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico') ?>" />
	
	<!-- data tables -->
    <link href="<?php echo base_url('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
<style>
#printAreaOnly2 {
   display : none;
  
}

@media print {
    #printAreaOnly2 {
       display : block;
	  
    }
	
	
}
</style>


<body>

<div id="printAreaOnly2">
<div class="col-12">
	<div align="center">
		ทรัพย์เจริญโบรกเกอร์ประกันภัย<br>
		536 ถ.รัถการ อ.หาดใหญ่ จ.สงขลา<br>
      Tel. 097-3245364, 081-2362323
	</div>
	<div>
		<span class="text-danger"><u>ใบสำคัญจ่าย</u></span>
	</div>
	<div>
		<span class="text-danger"><u>Payment Voucher</u></span>
		<div class="pull-right text-primary">วันที่ xxxxxxxxxx</div>
	</div>
	<div>
		จ่ายให้ / Pay To บริษัท อลิอันซ์ อยุธยา ประกันภัย จำกัด (มหาชน) <span class="text-danger">(โค้ดโสภา เสรีกำธร)</span>
	</div>
	<br>
	<table width="100%" class="table table-bordered">
		<thead>
		   <tr>
			<td colspan="3"> รายการ / Description </td>
			<td>&nbsp;</td>
			<td>จำนวนเงิน</td>
		   </tr>	
		</thead>
		<tbody>
			<tr>
			  <td>xxx-xxxxx-xxxx</td>
			  <td>ห.จ.ก. เอ็นพี ปัตตานีก่อสร้าง</td>
			  <td>ขน9146 สข</td>
				<td align="right">4,567</td>
				<td align="right">18,268</td>
			</tr>
			<tr>
				<td>xxx-xxxxx-xxxx</td>
				<td>ห.จ.ก. เอ็นพี ปัตตานีก่อสร้าง</td>
			  <td>ขน9146 สข</td>
				<td align="right">4,567</td>
				<td></td>
			</tr>
			<tr>
				<td>xxx-xxxxx-xxxx</td>
				<td>ห.จ.ก. เอ็นพี ปัตตานีก่อสร้าง</td>
			  <td>ขน9146 สข</td>
				<td align="right">4,567</td>
				<td></td>
			</tr>
			<tr>
				<td>xxx-xxxxx-xxxx</td>
				<td>ห.จ.ก. เอ็นพี ปัตตานีก่อสร้าง</td>
			  <td>ขน9146 สข</td>
				<td align="right">4,567</td>
				<td></td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
			  <td align="right">รวมยอด&nbsp;&nbsp;</td>
			  <td>18,268</td>
			  <td align="right">&nbsp;</td>
			  <td></td>
		  </tr>
			<tr>
			  <td colspan="4">จำนวนเงิน<br>
			    The sum of bahts</td>
			  <td>18,268</td>
		  </tr>
			<tr>
			  <td colspan="5">
				<table border="0" width="100%">
				  <tr>
					<td width="33%">ผู้รับเงิน / Collector.......................</td>
					<td width="33%">ผู้จ่ายเงิน/ Paid By......................</td>
					<td width="33%"> ผู้บันทึก/Approve By.....................</td>
				  </tr>
				 <tr>
				   <td width="33%">วันที่ / Date...........................</td>
					<td width="33%">วันที่ / Date....................... </td>
					<td width="33%">วันที่ / Date....................... </td>
				  </tr>  
			  </table></td>
		  </tr>			
		</tbody>	
	
	</table>
</div>
</div>
	
</body>
<script>
	function buildprintReservePrint(content)
{  
  
   var head='<!DOCTYPE html>'+
              '<html>'+
              '<head>'+
              '<meta charset="UTF-8">'+''+
              '<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />'+
              '<style>@media print {  @page     {    size:  auto;  margin: 5mm;  } } </style>'+
              '</head>'+
              '<body>';

  var foot=   '</body>'+
              '</html>';

  return  head+content+foot;      
}

	
function printData1(divName)
		{  
		   var divToPrint=document.getElementById(divName);
		   var newWin= window.open("");
			// newWin.print(); 
		   newWin.document.write(buildprintReservePrint(divToPrint.innerHTML));
		   setTimeout(function(){ newWin.print(); 

			newWin.close();
		   }, 3000);
		   //newWin.print();
		   //newWin.close();
		}
	$(document).ready(function(){
		printData1('printAreaOnly2')
	})
</script>