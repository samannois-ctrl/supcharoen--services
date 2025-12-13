
<div class="row">
			<div class="col-md-12 col-sm-12">
				<table class="table" width="100%">
								<thead>
								   <tr>
									  <td width="6%" style="text-align: center">รายการ</td>
									  <td width="13%" style="text-align: center">จำนวนเงิน</td>
									  <td width="13%" nowrap="nowrap" style="text-align: center">ยอดเก็บลูกค้า/ตัวแทน</td>
									  <?php /*?><td width="6%" nowrap="nowrap" style="text-align: center">#</td><?php */?> 
									    <td width="8%" style="text-align: center">การชำระเงิน</td>
									    <td width="8%" style="text-align: center">ยอดเก็บเงินสด</td>
									    <td width="8%" style="text-align: center">ยอดเก็บเงินโอน	</td> 
									  <td width="16%" nowrap="nowrap" style="text-align: center">ธนาคาร</td>
									  <td width="17%" style="text-align: center">วันที่รับงิน</td>
									  <td width="5%" style="text-align: center">&nbsp;</td>
							      </tr>
								   
								</thead>
								<tbody>
								  <tr>
								     <td class="text-primary" align="center"><strong><?php echo $insuranceTypeName?></strong></td> 
								     <td align="center"><span  id="show_insurance_total"><?php if($payment_amount!=''){ echo number_format($payment_amount,2); } ?> </span></td>
								     <td align="center"><input type="text" id="amt_recieve_ins" name="amt_recieve_ins" class="form-control autonumber"  value="<?php echo $amt_recieve_ins?>" onchange="UpdatePotherPayType('amt_recieve_ins',this.value, '<?php echo $selectType?>')" ></td>
								  <?php /*?>  
									  <td align="left">
									  <input type="radio" name="ins_cash" id="ins_cash1" value="1" <?php if($ins_cash=='1'){ echo "checked";}?> onchange="UpdatePotherPayType('ins_cash','1', '<?php echo $selectType?>')" > <label for="ins_cash1">สด</label> <br>
									   <input type="radio" name="ins_cash"  id="ins_cash2" value="2" <?php if($ins_cash=='2'){ echo "checked";}?>  onchange="UpdatePotherPayType('ins_cash','2', '<?php echo $selectType?>')" > 
									   #
									   <label for="ins_cash2">ผ่อน </label>
									  </td>
									<?php */?>    
								     <td>
								 	   <select id="ins_pay_type" class="form-select" aria-label="" onChange="setCashTranValue('amt_recieve_ins','cash_collection','tran_collection',this)">
													<option value="0" <?php if($ins_pay_type=='0'){ echo "selected"; }?> >เลือกการชำระเงิน</option>
													<option value="1" <?php if($ins_pay_type=='1'){ echo "selected"; }?> >เงินสด</option>
													<option value="2" <?php if($ins_pay_type=='2'){ echo "selected"; }?> >เงินโอน</option>
													<option value="3" <?php if($ins_pay_type=='3'){ echo "selected"; }?> >บัตรเครดิต</option>
											  	    <option value="4" <?php if($ins_pay_type=='4'){ echo "selected"; }?> >เช็ค</option>
											</select>
									 </td>
								     <td><input type="text" id="cash_collection" name="cash_collection" class="form-control autonumber"  value="<?php echo $cash_collection?>"  ></td>
								     <td><input type="text" id="tran_collection" name="tran_collection" class="form-control autonumber"  value="<?php echo $tran_collection?>" ></td>
								     <td nowrap>
									 <select id="ins_pay_bank_id" class="form-select">
										  <option value="x">-เลือกธนาคาร-</option>
										 <?php foreach($bookbankList['result'] AS $bookbank){?>
										  <option value="<?php echo $bookbank->id?>" <?php if($ins_pay_bank_id==$bookbank->id){ echo "selected"; }?> ><?php echo $bookbank->bank_name." ".$bookbank->bank_acc_name." ".$bookbank->bank_number?></option>
										 <?php }?>

									   </select>	 
									 </td>
								     <td>
									 <input type="text" class="form-control datepicker" id="ins_receipt_date" placeholder="" readonly="" value="<?php echo $ins_receipt_date?>">
									 </td>
								     <td>
										 <input type="hidden" name="recieve_id_ins" id="recieve_id_ins" value="<?php echo $recieve_id_ins?>">
										 <button type="button" class="btn btn-success btn-sm"  onClick="updateCashInsOtherPayment('ins', '<?php echo $selectType?>')"><span id="ok_ins"></span>บันทึก</button></td>
							      </tr>
									
									 <tr>
									   <td class="text-danger" align="center">รวม</td>
									   <td align="center" class="text-danger" ><span id="totalAllCash"><?php //$sumTotal = ($car_check_price+$act_price_total+$insurance_total+$tax_price+$tax_service);
												//echo number_format(($sumTotal),2)?></span></td>
									   <td colspan="7" align="center" class="text-danger" >&nbsp;</td>
							      </tr>
									 <tr>
									   <td class="text-danger" align="center">ยอดชำระ</td>
									   <td align="center" class="text-danger" >
										   <input type="text" class="form-control autonumber " id="cash_payment_amount" name="cash_payment_amount" onChange="updatePaymentAmount(this.value,'<?php echo $selectType?>')" value="<?php echo $cash_payment_amount?>" > </td>
									   <td colspan="7" align="left" class="text-danger" style="padding-left: 10px;"><strong>วันกำหนดชำระเงิน</strong>
									     <input name="cash_duedate" type="text" class=" datepicker" id="cash_duedate" placeholder=""  value="<?php echo $cash_duedate?>"   style="height: 30px;">
									     <select id="pay_cash_status" name="pay_cash_status" style="height: 30px;">
									       <option value="0" <?php if($pay_cash_status==0){ echo "selected"; }?> >ไม่ระบุ</option>
									       <option value="1" <?php if($pay_cash_status==1){ echo "selected"; }?> >ชำระเรียบร้อยแล้ว</option>
									       <option value="2" <?php if($pay_cash_status==2){ echo "selected"; }?> >ค้างชำระ</option>
								         </select>
								       <button type="button" class="btn btn-primary btn-sm" onClick="UpdateCashOtherDuedate('<?php echo $selectType?>')">บันทึก</button></td>
									   
							      </tr>
								</tbody>
						  </table>
				
			</div>
  <div class="col-md-12 col-sm-12">

					
			
					
				<hr class="col-12">
				
							<div class="form-group row" style="font-size: 16px">
								<label class="col-sm-4 control-label"><strong>รายละเอียดการชำระเงินผ่อน</strong></label>
								
								<label class="col-sm-1 control-label">จำนวนเงิน</label>
								<div class="col-sm-2">
									<input type="text" id="amount_installment" name="amount_installment" class="form-control form-control-sm autonumber" onChange="updateOtherAmountInstallment('<?php echo $selectType?>')" value="<?php echo $amount_installment?>">
								</div>

								<label class="col-sm-1 control-label">จำนวนงวด</label>
								<div class="col-sm-2">
<?php 


$maxPeriod = -1; // Initialize with a value lower than the minimum possible period
$maxIndex = -1;

foreach ($insurancePayment as $index => $object) {
if ($object->period > $maxPeriod) {
$maxPeriod = $object->period;
$maxIndex = $index;
}
}	
				//echo ">>".$maxPeriod;

									?>
									<select id="installment_peroid" name="installment_peroid" class="form-select" aria-label="">
										<option value="0">เลือกจำนวนงวด</option>
										
										<?php for($i=1;$i<=10;$i++){?>
										<option value="<?php echo $i?>" <?php if($maxPeriod==$i){ echo "selected";}?>  ><?php echo $i?></option>
										<?php }?>

									</select>
								</div>
								
								<div class="col-sm-1">
									<button type="button" class="btn btn-info btn-sm" onClick="calculateInstallmentOther()">คำนวณงวดผ่อน</button>
								</div>

							</div>																


							<div class="form-group row">	
								<div class="col-sm-12">
								
										
											<div id="listInstallment" class="table-scrollable">
												<?php //include('insurance_installment_talble.php')?>
											</div>
											<div id="listInstallmentPrint"></div>
										
									
								</div>

							</div>
<div align="center"><button type="button" class="btn btn-warning btn-sm" onClick="printInsuranceOtherPayment('normal')"><i class="fa fa-print"></i> พิมพ์รายการผ่อนสำหรับลูกค้า</button></div>


				

			</div>
		</div>