<?php if($insurance_data_type=='1'){ //insurance_payment?>
<table class="table" width="100%">
								<thead>
								   <tr>
									  <td width="9%" style="text-align: center">รายการ</td>
									  <td width="12%" style="text-align: center">จำนวนเงิน</td>
									  <td width="12%" nowrap="nowrap" style="text-align: center">ยอดเก็บลูกค้า/ตัวแทน</td>
									<!--  <td width="6%" nowrap="nowrap" style="text-align: center">#</td>-->
									  <td width="10%" style="text-align: center">การชำระเงิน</td>
									  <td width="15%" style="text-align: center">ยอดเก็บเงินสด</td>
									  <td width="12%" style="text-align: center">ยอดเก็บเงินโอน</td>
									  <td width="9%" style="text-align: center">ธนาคาร</td>
									  <td width="16%" style="text-align: center">วันที่รับงิน</td>
									  <td width="5%" style="text-align: center">&nbsp;</td>
							      </tr>
								   
								</thead>
								
								<tbody>
								 <tr> 
								     <td class="text-primary" align="center"><strong>ตรวจสภาพรถ</strong></td>
								     <td align="center"><span  id="show_car_check_price<?php echo $work_id?>"><?php echo  number_format($car_check_price,2)?> </span></td>
								     <td align="center"><input type="text" id="amt_recieve_carcheck<?php echo $work_id?>" name="amt_recieve_carcheck<?php echo $work_id?>" class="form-control autonumber" value="<?php echo $amt_recieve_carcheck?>" ></td>
								  
								     <td>
										 	<select id="car_check_pay_type<?php echo $work_id?>" class="form-select" aria-label="" >
													<option value="0" <?php if($car_check_pay_type=='0'){ echo "selected"; }?> >เลือกการชำระเงิน</option>
													<option value="1" <?php if($car_check_pay_type=='1'){ echo "selected"; }?> >เงินสด</option>
													<option value="2" <?php if($car_check_pay_type=='2'){ echo "selected"; }?> >เงินโอน</option>
													<option value="3" <?php if($car_check_pay_type=='3'){ echo "selected"; }?> >บัตรเครดิต</option>
											 		<option value="4" <?php if($car_check_pay_type=='4'){ echo "selected"; }?> >เช็ค</option>
											</select>
									 </td>
								     <td><input type="text" id="cash_collection_carcheck<?php echo $work_id?>" name="cash_collection_carcheck<?php echo $work_id?>" class="form-control autonumber" value="<?php echo $cash_collection_carcheck?>"  ></td>
								     <td><input type="text" id="tran_collection_carcheck<?php echo $work_id?>" name="tran_collection_carcheck<?php echo $work_id?>" class="form-control autonumber" value="<?php echo $tran_collection_carcheck?>"  ></td>
								     <td>
									 <select id="car_check_pay_bank_id<?php echo $work_id?>" class="form-select">
										  <option value="x">-เลือกธนาคาร-</option>
										 <?php foreach($bookbankList['result'] AS $bookbank){?>
										  <option value="<?php echo $bookbank->id?>" <?php if($car_check_pay_bank_id==$bookbank->id){ echo "selected"; }?> ><?php echo $bookbank->bank_name." ".$bookbank->bank_acc_name." ".$bookbank->bank_number?></option>
										 <?php }?>

									   </select> 
									 </td>
								     <td>
									 <input type="text" class="form-control datepicker" id="car_check_receipt_date<?php echo $work_id?>" placeholder="" readonly="" value="<?php echo $car_check_receipt_date?>">
									 </td>
								     <td><button type="button" class="btn btn-success btn-sm" onClick="updateRecipeCashPayment('<?php echo $work_id?>','car_check','<?php echo $insurance_data_type?>','<?php echo $otherInsID?>')"><span id="ok_car_check<?php echo $work_id?>"></span>บันทึก</button></td>
							      </tr> 
									 <tr>
								     <td class="text-primary" align="center"><strong>ภาษี</strong></td> 
								     <td align="center"><span  id="show_tax_total<?php echo $work_id?>"><?php $totalTax = $tax_price+$tax_service; echo  number_format($totalTax,2)?> </span></td>
								     <td align="center"><input type="text" id="amt_recieve_tax<?php echo $work_id?>" name="amt_recieve_tax<?php echo $work_id?>" class="form-control autonumber"  value="<?php echo $amt_recieve_tax?>" onchange="UpdatePayType('amt_recieve_tax',this.value)" > </td>
								    
									 <?php /*?>  	 <td align="left"> 
									 #
									 <input type="radio" name="tax_cash" id="tax_cash1" value="1"  <?php if($tax_cash=='1'){ echo "checked";}?>  onchange="UpdatePayType('tax_cash','1')" > <label for="tax_cash1">สด</label> <br>
									   <input type="radio" name="tax_cash"  id="tax_cash2" value="2" <?php if($tax_cash=='2'){ echo "checked";}?>  onchange="UpdatePayType('tax_cash','2')" > <label for="tax_cash2">ผ่อน </label>
									</td>
									 <?php */?>  	 
								     <td>
								 	   <select id="tax_pay_type<?php echo $work_id?>" class="form-select" aria-label="" >
													<option value="0" <?php if($tax_pay_type=='0'){ echo "selected"; }?> >เลือกการชำระเงิน</option>
													<option value="1" <?php if($tax_pay_type=='1'){ echo "selected"; }?> >เงินสด</option>
													<option value="2" <?php if($tax_pay_type=='2'){ echo "selected"; }?> >เงินโอน</option>
													<option value="3" <?php if($tax_pay_type=='3'){ echo "selected"; }?> >บัตรเครดิต</option>
											        <option value="4" <?php if($tax_pay_type=='4'){ echo "selected"; }?> >เช็ค</option>
											</select>
									 </td>
								     <td><input type="text" id="cash_collection_tax<?php echo $work_id?>" name="cash_collection_tax<?php echo $work_id?>" class="form-control autonumber" value="<?php echo $cash_collection_tax?>"></td>
								     <td><input type="text" id="tran_collection_tax<?php echo $work_id?>" name="tran_collection_tax<?php echo $work_id?>" class="form-control autonumber" value="<?php echo $tran_collection_tax?>" ></td>
								     <td>
									 <select id="tax_pay_bank_id<?php echo $work_id?>" class="form-select" >
										  <option value="x">-เลือกธนาคาร-</option>
										 <?php foreach($bookbankList['result'] AS $bookbank){?>
										  <option value="<?php echo $bookbank->id?>" <?php if($tax_pay_bank_id==$bookbank->id){ echo "selected"; }?> ><?php echo $bookbank->bank_name." ".$bookbank->bank_acc_name." ".$bookbank->bank_number?></option>
										 <?php }?>

									   </select>	 
									 </td>
								     <td>
									 <input type="text" class="form-control datepicker" id="tax_receipt_date<?php echo $work_id?>" placeholder="" readonly="" value="<?php echo $tax_receipt_date?>">
									 </td>
								     <td><button type="button" class="btn btn-success btn-sm"  onClick="updateRecipeCashPayment('<?php echo $work_id?>','tax','<?php echo $insurance_data_type?>','<?php echo $otherInsID?>')"><span id="ok_tax<?php echo $work_id?>"></span>บันทึก</button></td>
							      </tr>
								 <tr>
								     <td class="text-primary" align="center"><strong>พ.ร.บ.</strong></td>
								     <td align="center"><span  id="show_act_price_total<?php echo $work_id?>"><?php echo  number_format($act_price_total,2)?> </span></td>
								     <td align="center"><input type="text" id="amt_recieve_act<?php echo $work_id?>" name="amt_recieve_act<?php echo $work_id?>" class="form-control autonumber"  value="<?php echo $amt_recieve_act?>"  ></td>
								   <?php /*?>    
									 <td align="left"> 
									 #
									 <input type="radio" name="act_cash" id="act_cash1" value="1" <?php if($act_cash=='1'){ echo "checked";}?>  onchange="UpdatePayType('act_cash','1')"> <label for="act_cash1">สด</label> <br>
									   <input type="radio" name="act_cash"  id="act_cash2" value="2" <?php if($act_cash=='2'){ echo "checked";}?>  onchange="UpdatePayType('act_cash','2')"  > <label for="act_cash2">ผ่อน </label>
									 
									 </td>
									 <?php */?>   
								     <td>
										 	<select id="act_pay_type<?php echo $work_id?>" class="form-select" aria-label="" >
													<option value="0" <?php if($act_pay_type=='0'){ echo "selected"; }?> >เลือกการชำระเงิน</option>
													<option value="1" <?php if($act_pay_type=='1'){ echo "selected"; }?> >เงินสด</option>
													<option value="2" <?php if($act_pay_type=='2'){ echo "selected"; }?> >เงินโอน</option>
													<option value="3" <?php if($act_pay_type=='3'){ echo "selected"; }?> >บัตรเครดิต</option>
											        <option value="4" <?php if($act_pay_type=='4'){ echo "selected"; }?> >เช็ค</option>
											</select>
									 </td>
								     <td><input type="text" id="cash_collection_act<?php echo $work_id?>" name="cash_collection_act<?php echo $work_id?>" class="form-control autonumber" value="<?php echo $cash_collection_act?>"  ></td>
								     <td><input type="text" id="tran_collection_act<?php echo $work_id?>" name="tran_collection_act<?php echo $work_id?>" class="form-control autonumber" value="<?php echo $tran_collection_act?>"  ></td>
								     <td>
									 <select id="act_pay_bank_id<?php echo $work_id?>" class="form-select">
										  <option value="x">-เลือกธนาคาร-</option>
										 <?php foreach($bookbankList['result'] AS $bookbank){?>
										  <option value="<?php echo $bookbank->id?>" <?php if($act_pay_bank_id==$bookbank->id){ echo "selected"; }?> ><?php echo $bookbank->bank_name." ".$bookbank->bank_acc_name." ".$bookbank->bank_number?></option>
										 <?php }?>

									   </select>	   
									 </td>
								     <td>
									 <input type="text" class="form-control datepicker" id="act_receipt_date<?php echo $work_id?>" placeholder="" readonly="" value="<?php echo $act_receipt_date?>">
									 </td>
								     <td><button type="button" class="btn btn-success btn-sm"  onClick="updateRecipeCashPayment('<?php echo $work_id?>','act','<?php echo $insurance_data_type?>','<?php echo $otherInsID?>')"><span id="ok_act<?php echo $work_id?>"></span>บันทึก</button></td>
							      </tr>
								  <tr>
								     <td class="text-primary" align="center"><strong>ข้อมูลภาคสมัครใจ</strong></td> 
								     <td align="center"><span  id="show_insurance_total<?php echo $work_id?>"><?php echo number_format($insurance_total,2); ?> </span></td>
								     <td align="center"><input type="text" id="amt_recieve_ins<?php echo $work_id?>" name="amt_recieve_ins<?php echo $work_id?>" class="form-control autonumber"  value="<?php echo $amt_recieve_ins?>"></td>
								     
								     <td>
								 	   <select id="ins_pay_type<?php echo $work_id?>" class="form-select" aria-label="" >
													<option value="0" <?php if($ins_pay_type=='0'){ echo "selected"; }?> >เลือกการชำระเงิน</option>
													<option value="1" <?php if($ins_pay_type=='1'){ echo "selected"; }?> >เงินสด</option>
													<option value="2" <?php if($ins_pay_type=='2'){ echo "selected"; }?> >เงินโอน</option>
													<option value="3" <?php if($ins_pay_type=='3'){ echo "selected"; }?> >บัตรเครดิต</option>
											  	    <option value="4" <?php if($ins_pay_type=='4'){ echo "selected"; }?> >เช็ค</option>
											</select>
									 </td>
								     <td><input type="text" id="cash_collection_ins<?php echo $work_id?>" name="cash_collection_ins<?php echo $work_id?>" class="form-control autonumber" value="<?php echo $cash_collection_ins?>" ></td>
								     <td><input type="text" id="tran_collection_ins<?php echo $work_id?>" name="tran_collection_ins<?php echo $work_id?>" class="form-control autonumber" value="<?php echo $tran_collection_ins?>" ></td>
								     <td>
									 <select id="ins_pay_bank_id<?php echo $work_id?>" class="form-select">
										  <option value="x">-เลือกธนาคาร-</option>
										 <?php foreach($bookbankList['result'] AS $bookbank){?>
										  <option value="<?php echo $bookbank->id?>" <?php if($ins_pay_bank_id==$bookbank->id){ echo "selected"; }?> ><?php echo $bookbank->bank_name." ".$bookbank->bank_acc_name." ".$bookbank->bank_number?></option>
										 <?php }?>

									   </select>	 
									 </td>
								     <td>
									 <input type="text" class="form-control datepicker" id="ins_receipt_date<?php echo $work_id?>" placeholder="" readonly="" value="<?php echo $ins_receipt_date?>">
									 </td>
								     <td>
										 
										 <button type="button" class="btn btn-success btn-sm"  onClick="updateRecipeCashPayment('<?php echo $work_id?>','ins','<?php echo $insurance_data_type?>','<?php echo $otherInsID?>')"><span id="ok_ins<?php echo $work_id?>"></span>บันทึก</button>
									  
										
										 
										 
									     <input type="hidden" id="recieve_id_carcheck<?php echo $work_id?>" name="recieve_id_carcheck"<?php echo $work_id?> value="<?php echo $recieve_id_carcheck?>">
										 <input type="hidden" id="recieve_id_act<?php echo $work_id?>" name="recieve_id_act<?php echo $work_id?>" value="<?php echo $recieve_id_act?>">
										 <input type="hidden" id="recieve_id_tax<?php echo $work_id?>" name="recieve_id_tax<?php echo $work_id?>" value="<?php echo $recieve_id_tax?>">
										 <input type="hidden" id="recieve_id_ins<?php echo $work_id?>" name="recieve_id_ins<?php echo $work_id?>" value="<?php echo $recieve_id_ins?>">
										 
										 <?php //echo 'recieve_id_carcheck>'.$recieve_id_carcheck." recieve_id_act>".$recieve_id_act." recieve_id_tax>".$recieve_id_tax." recieve_id_ins>".$recieve_id_ins?>
									  </td>
							      </tr>
								
									 <tr>
									   <td class="text-danger" align="center">ยอดชำระ</td>
									   <td align="center" class="text-danger" >
										   <input type="text" class="form-control autonumber " id="payment_amount<?php echo $work_id?>" name="payment_amount<?php echo $work_id?>" onChange="updatePaymentAmount(this.value)" value="<?php echo $payment_amount?>" > </td>
									   <td align="left" class="text-danger" style="padding-left: 10px;"> <!--<strong>วันกำหนดชำระเงิน</strong>
									    <input name="cash_duedate<?php //echo $work_id?>" type="text" class=" datepicker" id="cash_duedate<?php echo $work_id?>" placeholder=""  value="<?php //echo $cash_duedate?>"   style="height: 30px;">-->
									     <select id="pay_cash_status<?php echo $work_id?>" name="pay_cash_status<?php echo $work_id?>"  class="form-select ">
									       <option value="0" <?php if($pay_cash_status==0){ echo "selected"; }?> >ไม่ระบุ</option>
									       <option value="1" <?php if($pay_cash_status==1){ echo "selected"; }?> >ชำระเรียบร้อยแล้ว</option>
									       <option value="2" <?php if($pay_cash_status==2){ echo "selected"; }?> >ค้างชำระ</option>
								         </select>
								      </td>
									   <td align="left" class="text-danger" style="padding-left: 10px;"> <button type="button" class="btn btn-primary btn-sm" onClick="UpdateCashDuedate('<?php echo $work_id?>')"><span id="ok_payStatus<?php echo $work_id?>"></span>บันทึก</button></td>
									   <td align="left" class="text-danger" style="padding-left: 10px;">&nbsp;</td>
									   <td align="left" class="text-danger" style="padding-left: 10px;">&nbsp;</td>
									   <td align="left" class="text-danger" style="padding-left: 10px;">&nbsp;</td>
									   <td align="left" class="text-danger" style="padding-left: 10px;">&nbsp;</td>
									   <td align="left" class="text-danger" style="padding-left: 10px;">&nbsp;</td>
									  
						          </tr>
									
								</tbody>
						  </table>
<?php }else{ 
	 //other insurance_other_payment 
//echo $work_id."<<<";
?>
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
								     <td align="center"><span  id="show_insurance_total<?php echo $work_id?>"><?php if($payment_amount!=''){ echo number_format($payment_amount,2); } ?> </span></td>
								     <td align="center"><input type="text" id="amt_recieve_ins<?php echo $work_id?>" name="amt_recieve_ins<?php echo $work_id?>" class="form-control autonumber"  value="<?php echo $amt_recieve_ins?>"></td>
								  <?php /*?>  
									  <td align="left">
									  <input type="radio" name="ins_cash" id="ins_cash1" value="1" <?php if($ins_cash=='1'){ echo "checked";}?> onchange="UpdatePotherPayType('ins_cash','1', '<?php echo $selectType?>')" > <label for="ins_cash1">สด</label> <br>
									   <input type="radio" name="ins_cash"  id="ins_cash2" value="2" <?php if($ins_cash=='2'){ echo "checked";}?>  onchange="UpdatePotherPayType('ins_cash','2', '<?php echo $selectType?>')" > 
									   #
									   <label for="ins_cash2">ผ่อน </label>
									  </td>
									<?php */?>    
								     <td>
								 	   <select id="ins_pay_type<?php echo $work_id?>" class="form-select" aria-label="" onChange="setCashTranValue('amt_recieve_ins','cash_collection','tran_collection',this)">
													<option value="0" <?php if($ins_pay_type=='0'){ echo "selected"; }?> >เลือกการชำระเงิน</option>
													<option value="1" <?php if($ins_pay_type=='1'){ echo "selected"; }?> >เงินสด</option>
													<option value="2" <?php if($ins_pay_type=='2'){ echo "selected"; }?> >เงินโอน</option>
													<option value="3" <?php if($ins_pay_type=='3'){ echo "selected"; }?> >บัตรเครดิต</option>
											  	    <option value="4" <?php if($ins_pay_type=='4'){ echo "selected"; }?> >เช็ค</option>
											</select>
									 </td>
								     <td><input type="text" id="cash_collection<?php echo $work_id?>" name="cash_collection<?php echo $work_id?>" class="form-control autonumber"  value="<?php echo $cash_collection_ins?>"  ></td>
								     <td><input type="text" id="tran_collection<?php echo $work_id?>" name="tran_collection<?php echo $work_id?>" class="form-control autonumber"  value="<?php echo $tran_collection_ins?>" ></td>
								     <td nowrap>
									 <select id="ins_pay_bank_id<?php echo $work_id?>" class="form-select">
										  <option value="x">-เลือกธนาคาร-</option>
										 <?php foreach($bookbankList['result'] AS $bookbank){?>
										  <option value="<?php echo $bookbank->id?>" <?php if($ins_pay_bank_id==$bookbank->id){ echo "selected"; }?> ><?php echo $bookbank->bank_name." ".$bookbank->bank_acc_name." ".$bookbank->bank_number?></option>
										 <?php }?>

									   </select>	 
									 </td>
								     <td>
									 <input type="text" class="form-control datepicker" id="ins_receipt_date<?php echo $work_id?>" placeholder="" readonly="" value="<?php echo $ins_receipt_date?>">
									 </td>
								     <td>&nbsp;</td>
							      </tr>
							 
									 
									
									 <tr>
									   <td class="text-danger" align="center">ยอดชำระ</td>
									   <td align="center" class="text-danger" >
										   <input type="text" class="form-control autonumber " id="cash_payment_amount" name="cash_payment_amount" onChange="updatePaymentAmount(this.value,'<?php echo $selectType?>')" value="<?php echo $payment_amount?>" > </td>
									   <td align="left" class="text-danger" style="padding-left: 10px;"><!--<strong>วันกำหนดชำระเงิน</strong>-->
									    <!-- <input name="cash_duedate" type="text" class=" datepicker" id="cash_duedate" placeholder=""  value="<?php echo $cash_duedate?>"   style="height: 30px;">-->
									     <select id="pay_cash_status<?php echo $work_id?>" name="pay_cash_status<?php echo $work_id?>" class="form-select ">
									       <option value="0" <?php if($pay_cash_status==0){ echo "selected"; }?> >ไม่ระบุ</option>
									       <option value="1" <?php if($pay_cash_status==1){ echo "selected"; }?> >ชำระเรียบร้อยแล้ว</option>
									       <option value="2" <?php if($pay_cash_status==2){ echo "selected"; }?> >ค้างชำระ</option>
								         </select>
								       </td>
									   <td align="left" class="text-danger" style="padding-left: 10px;">&nbsp;</td>
									   <td align="left" class="text-danger" style="padding-left: 10px;">&nbsp;</td>
									   <td align="left" class="text-danger" style="padding-left: 10px;">&nbsp;</td>
									   <td align="left" class="text-danger" style="padding-left: 10px;">&nbsp;</td>
									   <td align="left" class="text-danger" style="padding-left: 10px;">&nbsp;</td>
									   <td align="left" class="text-danger" style="padding-left: 10px;"><button type="button" class="btn btn-success btn-sm"  onClick="updateRecipeCashPayment('<?php echo $work_id?>','otherins','<?php echo $insurance_data_type?>','<?php echo $otherInsID?>')"><span id="ok_ins<?php echo $work_id?>"><span id="ok_ins"></span>บันทึก</button></td>
									   
						          </tr>
									 
								</tbody>
						  </table>
<?php }?>