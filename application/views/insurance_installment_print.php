<style>
#printAreaOnly {
   display : none;
   
  
}

@media print {
    #printAreaOnly {
       display : block;
	  
    }
	
	
}
</style>

<div id="printAreaOnly">
<div class="card-head" style="text-align: center;">
							<header>ข้อมูลการชำระเงิน / ผ่อนประกันรถ</header><br>
							<p style="font-weight: 400; line-height: 24px;">
								<strong>ชื่อลูกค้า</strong> <?php echo $cust_name?> 
								<strong>โทรศัพท์</strong> <?php if($cust_telephone_2!=''){ $cust_telephone_2=" ,".$cust_telephone_2;} echo $cust_telephone_1."".$cust_telephone_2?>  <br>
								<strong>ทะเบียนรถ</strong> <?php echo $vehicle_regis." ".$province_name?> <strong>ประเภท</strong> <?php echo $insurance_type_name?> <strong>วันคุ้มครอง</strong> <?php echo $insurance_start?><br>
								<strong>
								<?php if($is_installment=='1'){?>
									ผ่อน</strong> <?php echo $installment_peroid?> งวด <strong>
								<?php }else{ ?>
									สด
								<?php }?>
								เบี้ยรวม</strong> <?php echo $insurance_total?> บาท <strong> รับชำระ</strong> <?php echo $isPaid?> บาท <strong>คงค้าง </strong><?php echo $isNotPaid?> บาท
							</p> 
						</div>
						<div class="card-body ">
							<div class="">
							  <table width="100%" class="table-bordered  full-width">
							    <thead>
							      <tr>
							        <th nowrap="nowrap" style="text-align: center">งวดที่</th>
							        <th nowrap="nowrap" style="text-align: center">วันที่รับเงิน</th>
							        <th nowrap="nowrap" style="text-align: center">จำนวนเงิน</th>
							        <th nowrap="nowrap" style="text-align: center">การชำระเงิน</th>
							        <th nowrap="nowrap" style="text-align: center">ธนาคาร</th>
							        <th nowrap="nowrap" style="text-align: center">เลขที่ใบเสร็จ</th>
							        <th nowrap="nowrap" style="text-align: center">กำหนดชำระเงิน</th>
							        <th nowrap="nowrap" style="text-align: center">สถานะตามเงิน</th>
							        <th nowrap="nowrap" style="text-align: center">หมายเหตุ</th>
						          </tr>
						        </thead>
							    <tbody>
							      <?php $n=1; $txtDuedate='-'; foreach($insurancePayment AS $payment){ 
											 $txtDuedate = $payment->due_date;
				?>
							      <tr class="active">
							        <td nowrap="nowrap" style="text-align: center"><?php echo $n?></td>
							        <td nowrap="nowrap"><?php echo $this->insurance_model->translateDateToThai($payment->receipt_date)?></td>
							        <td align="center" nowrap="nowrap">
									<?php echo number_format($payment->amount,2);
	                                             if($payment->discount!='0.00'){ echo "-".number_format($payment->discount,2);}
										?></td>
							        <td align="center" nowrap="nowrap">
										<?php if($payment->pay_type=='0'){ echo "ค้างชำระ"; }?>
										<?php if($payment->pay_type=='1'){ echo "เงินสด"; }?>
										<?php if($payment->pay_type=='2'){ echo "เงินโอน"; }?>
										<?php if($payment->pay_type=='3'){ echo "บัตรเครดิต"; }?>
										<?php if($payment->pay_type=='4'){ echo "เช็ค"; }?>
										</td>
							        <td align="center" nowrap="nowrap">
										<?php if($payment->bank_id > 0){ 
													$bankData = $this->setting_model->getBankDetail($payment->bank_id);
													echo $bankData['bank_name']." ".$bankData['bank_acc_name']."<br> ".$bankData['bank_number'];
											}
										
										/*										$returnValue['bank_id']=$data->id;
			 $returnValue['bank_name']=$data->bank_name;
			 $returnValue['bank_branch']=$data->bank_branch;
			 $returnValue['bank_acc_name']=$data->bank_acc_name;
			 $returnValue['bank_number']=$data->bank_number;*/
										?>

										
									</td>
									  
									  
									  
							        <td align="center" nowrap="nowrap"><?php echo $payment->recipe_no?></td>
							        <td align="center" nowrap="nowrap"><?php if($payment->due_date!='0000-00-00'){ echo $this->insurance_model->translateDateToThai($payment->due_date); }?></td>
							        <td nowrap="nowrap" style="text-align: center"><?php if($payment->is_payment=='1'){ ?>
							          ชำระเงินแล้ว
							          <?php }else if($payment->is_payment=='0'){?>
							           ค้างชำระเงิน 
							          <?php }?></td>
							        <td align="center"><?php echo $payment->remark?></td>
						          </tr>
							      <?php $n++; }?>
							      <tr class="active">
							        <td nowrap="nowrap">&nbsp;</td>
							        <td nowrap="nowrap" >รวมยอดรับชำระ</td>
							        <td nowrap="nowrap" ><?php echo $isPaid?></td>
							        <td nowrap="nowrap" style="text-align:center;color:#C90003">ยอดค้างรับ</td>
							        <td nowrap="nowrap" style="text-align:center;  color:#C90003"><?php echo $isNotPaid?></td>
							        <td nowrap="nowrap" style="text-align:center; color:#C90003">&nbsp;</td>
							        <td colspan="3" nowrap="nowrap" style="text-align:center;">( เบี้ยรวม <?php echo $insurance_total?> )</td>
						          </tr>
						        </tbody>
						      </table>
							  <p align="center" style="padding-top: 30px; font-weight: bold; color:#AB0002; font-size: 18px;">** งวดถัดไป ชำระทุกวันที่ <?php  $vals = explode("-",$txtDuedate); 
										if(isset($vals[2])){
											echo (int)$vals[2];
										}else{ echo "10"; }
								  ?> **</p>
						  </div>
						</div>
</div>
<script>
function buildprintReservePrint(content)
{  
  
   var head='<!DOCTYPE html>'+
              '<html>'+
              '<head>'+
              '<meta charset="UTF-8">'+''+
              '<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />'+
              '<style>@media print {  @page     {    size:  auto;  margin: 5mm;  }  html, body {  height: auto;  font-size: 10pt;  } } </style>'+
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
		printDataInstallment('printAreaOnly')
	})
</script>