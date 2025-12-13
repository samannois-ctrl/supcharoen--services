
<div class="row">
			<div class="col-md-12 col-sm-12">

					<div class="card-head">
						<header>ข้อมูลการชำระเงิน / ผ่อนประกันรถ ทะเบียน <span id="showPlateLicense"><?php echo $vehicle_regis?></span></header>
						<ol class="breadcrumb page-breadcrumb pull-right">
							<li><?php /* ?><a href="<?php //echo base_url('Insurance_car/work_car_payment_print');?>" target="_blank"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-print"></i> พิมพ์สำหรับลูกค้า</button></a><?php */ ?>
							
							
							
							</li>
						</ol>
					</div>
					
				  <div class="card-body " id="bar-parent2">
					  <div class="table-scrollable">
						
						  
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
								     <td align="center"><span  id="show_car_check_price"><?php echo  number_format($car_check_price,2)?> </span></td>
								     <td align="center"><input type="text" id="amt_recieve_carcheck" name="amt_recieve_carcheck" class="form-control autonumber" value="<?php echo $amt_recieve_carcheck?>" onchange="UpdatePayType('amt_recieve_carcheck',this.value)" ></td>
								 <?php /*?>   
									 <td align="left">
									   #
									   <input type="radio" name="carcheck_cash" id="carcheck_cash1" value="1" <?php if($carcheck_cash=='1'){ echo "checked";}?>  onchange="UpdatePayType('carcheck_cash','1')" > <label for="carcheck_cash1">สด</label> <br>
									   <input type="radio" name="carcheck_cash"  id="carcheck_cash2" value="2"  onchange="UpdatePayType('carcheck_cash','2')"> <label for="carcheck_cash2" <?php if($carcheck_cash=='2'){ echo "checked";}?> >ผ่อน </label>
									 </td>
								 <?php */?>  	 
								     <td>
										 	<select id="car_check_pay_type" class="form-select" aria-label="" onChange="setCashTranValue('amt_recieve_carcheck','cash_collection_carcheck','tran_collection_carcheck',this)">
													<option value="0" <?php if($car_check_pay_type=='0'){ echo "selected"; }?> >เลือกการชำระเงิน</option>
													<option value="1" <?php if($car_check_pay_type=='1'){ echo "selected"; }?> >เงินสด</option>
													<option value="2" <?php if($car_check_pay_type=='2'){ echo "selected"; }?> >เงินโอน</option>
													<option value="3" <?php if($car_check_pay_type=='3'){ echo "selected"; }?> >บัตรเครดิต</option>
											 		<option value="4" <?php if($car_check_pay_type=='4'){ echo "selected"; }?> >เช็ค</option>
											</select>
									 </td>
								     <td><input type="text" id="cash_collection_carcheck" name="cash_collection_carcheck" class="form-control autonumber" value="<?php echo $cash_collection_carcheck?>"  ></td>
								     <td><input type="text" id="tran_collection_carcheck" name="tran_collection_carcheck" class="form-control autonumber" value="<?php echo $tran_collection_carcheck?>"  ></td>
								     <td>
									 <select id="car_check_pay_bank_id" class="form-select">
										  <option value="x">-เลือกธนาคาร-</option>
										 <?php foreach($bookbankList['result'] AS $bookbank){?>
										  <option value="<?php echo $bookbank->id?>" <?php if($car_check_pay_bank_id==$bookbank->id){ echo "selected"; }?> ><?php echo $bookbank->bank_name." ".$bookbank->bank_acc_name." ".$bookbank->bank_number?></option>
										 <?php }?>

									   </select> 
									 </td>
								     <td>
									 <input type="text" class="form-control datepicker" id="car_check_receipt_date" placeholder="" readonly="" value="<?php echo $car_check_receipt_date?>">
									 </td>
								     <td><button type="button" class="btn btn-success btn-sm" onClick="updateCashPayment('car_check')"><span id="ok_car_check"></span>บันทึก</button></td>
							      </tr>
									 <tr>
								     <td class="text-primary" align="center"><strong>ภาษี</strong></td> 
								     <td align="center"><span  id="show_tax_total"><?php $totalTax = $tax_price+$tax_service; echo  number_format($totalTax,2)?> </span></td>
								     <td align="center"><input type="text" id="amt_recieve_tax" name="amt_recieve_tax" class="form-control autonumber"  value="<?php echo $amt_recieve_tax?>" onchange="UpdatePayType('amt_recieve_tax',this.value)" > </td>
								    
									 <?php /*?>  	 <td align="left"> 
									 #
									 <input type="radio" name="tax_cash" id="tax_cash1" value="1"  <?php if($tax_cash=='1'){ echo "checked";}?>  onchange="UpdatePayType('tax_cash','1')" > <label for="tax_cash1">สด</label> <br>
									   <input type="radio" name="tax_cash"  id="tax_cash2" value="2" <?php if($tax_cash=='2'){ echo "checked";}?>  onchange="UpdatePayType('tax_cash','2')" > <label for="tax_cash2">ผ่อน </label>
									</td>
									 <?php */?>  	 
								     <td>
								 	   <select id="tax_pay_type" class="form-select" aria-label="" onChange="setCashTranValue('amt_recieve_tax','cash_collection_tax','tran_collection_tax',this)">
													<option value="0" <?php if($tax_pay_type=='0'){ echo "selected"; }?> >เลือกการชำระเงิน</option>
													<option value="1" <?php if($tax_pay_type=='1'){ echo "selected"; }?> >เงินสด</option>
													<option value="2" <?php if($tax_pay_type=='2'){ echo "selected"; }?> >เงินโอน</option>
													<option value="3" <?php if($tax_pay_type=='3'){ echo "selected"; }?> >บัตรเครดิต</option>
											        <option value="4" <?php if($tax_pay_type=='4'){ echo "selected"; }?> >เช็ค</option>
											</select>
									 </td>
								     <td><input type="text" id="cash_collection_tax" name="cash_collection_tax" class="form-control autonumber" value="<?php echo $cash_collection_tax?>"></td>
								     <td><input type="text" id="tran_collection_tax" name="tran_collection_tax" class="form-control autonumber" value="<?php echo $tran_collection_tax?>" ></td>
								     <td>
									 <select id="tax_pay_bank_id" class="form-select" >
										  <option value="x">-เลือกธนาคาร-</option>
										 <?php foreach($bookbankList['result'] AS $bookbank){?>
										  <option value="<?php echo $bookbank->id?>" <?php if($tax_pay_bank_id==$bookbank->id){ echo "selected"; }?> ><?php echo $bookbank->bank_name." ".$bookbank->bank_acc_name." ".$bookbank->bank_number?></option>
										 <?php }?>

									   </select>	 
									 </td>
								     <td>
									 <input type="text" class="form-control datepicker" id="tax_receipt_date" placeholder="" readonly="" value="<?php echo $tax_receipt_date?>">
									 </td>
								     <td><button type="button" class="btn btn-success btn-sm"  onClick="updateCashPayment('tax')"><span id="ok_tax"></span>บันทึก</button></td>
							      </tr>
								 <tr>
								     <td class="text-primary" align="center"><strong>พ.ร.บ.</strong></td>
								     <td align="center"><span  id="show_act_price_total"><?php echo  number_format($act_price_total,2)?> </span></td>
								     <td align="center"><input type="text" id="amt_recieve_act" name="amt_recieve_act" class="form-control autonumber"  value="<?php echo $amt_recieve_act?>" onchange="UpdatePayType('amt_recieve_act',this.value)" ></td>
								   <?php /*?>    
									 <td align="left"> 
									 #
									 <input type="radio" name="act_cash" id="act_cash1" value="1" <?php if($act_cash=='1'){ echo "checked";}?>  onchange="UpdatePayType('act_cash','1')"> <label for="act_cash1">สด</label> <br>
									   <input type="radio" name="act_cash"  id="act_cash2" value="2" <?php if($act_cash=='2'){ echo "checked";}?>  onchange="UpdatePayType('act_cash','2')"  > <label for="act_cash2">ผ่อน </label>
									 
									 </td>
									 <?php */?>   
								     <td>
										 	<select id="act_pay_type" class="form-select" aria-label="" onChange="setCashTranValue('amt_recieve_act','cash_collection_act','tran_collection_act',this)">
													<option value="0" <?php if($act_pay_type=='0'){ echo "selected"; }?> >เลือกการชำระเงิน</option>
													<option value="1" <?php if($act_pay_type=='1'){ echo "selected"; }?> >เงินสด</option>
													<option value="2" <?php if($act_pay_type=='2'){ echo "selected"; }?> >เงินโอน</option>
													<option value="3" <?php if($act_pay_type=='3'){ echo "selected"; }?> >บัตรเครดิต</option>
											        <option value="4" <?php if($act_pay_type=='4'){ echo "selected"; }?> >เช็ค</option>
											</select>
									 </td>
								     <td><input type="text" id="cash_collection_act" name="cash_collection_act" class="form-control autonumber" value="<?php echo $cash_collection_act?>"  ></td>
								     <td><input type="text" id="tran_collection_act" name="tran_collection_act" class="form-control autonumber" value="<?php echo $tran_collection_act?>"  ></td>
								     <td>
									 <select id="act_pay_bank_id" class="form-select">
										  <option value="x">-เลือกธนาคาร-</option>
										 <?php foreach($bookbankList['result'] AS $bookbank){?>
										  <option value="<?php echo $bookbank->id?>" <?php if($act_pay_bank_id==$bookbank->id){ echo "selected"; }?> ><?php echo $bookbank->bank_name." ".$bookbank->bank_acc_name." ".$bookbank->bank_number?></option>
										 <?php }?>

									   </select>	   
									 </td>
								     <td>
									 <input type="text" class="form-control datepicker" id="act_receipt_date" placeholder="" readonly="" value="<?php echo $act_receipt_date?>">
									 </td>
								     <td><button type="button" class="btn btn-success btn-sm"  onClick="updateCashPayment('act')"><span id="ok_act"></span>บันทึก</button></td>
							      </tr>
								  <tr>
								     <td class="text-primary" align="center"><strong>ข้อมูลภาคสมัครใจ</strong></td> 
								     <td align="center"><span  id="show_insurance_total"><?php echo number_format($insurance_total,2); ?> </span></td>
								     <td align="center"><input type="text" id="amt_recieve_ins" name="amt_recieve_ins" class="form-control autonumber"  value="<?php echo $amt_recieve_ins?>" onchange="UpdatePayType('amt_recieve_ins',this.value)" ></td>
								     <?php /*?>   
									  <td align="left"> 
									  #
									  <input type="radio" name="ins_cash" id="ins_cash1" value="1" <?php if($ins_cash=='1'){ echo "checked";}?> onchange="UpdatePayType('ins_cash','1')" > <label for="ins_cash1">สด</label> <br>
									   <input type="radio" name="ins_cash"  id="ins_cash2" value="2" <?php if($ins_cash=='2'){ echo "checked";}?>  onchange="UpdatePayType('ins_cash','2')" > <label for="ins_cash2">ผ่อน </label>
									  </td>
									  <?php */?>   
								     <td>
								 	   <select id="ins_pay_type" class="form-select" aria-label="" onChange="setCashTranValue('amt_recieve_ins','cash_collection_ins','tran_collection_ins',this)">
													<option value="0" <?php if($ins_pay_type=='0'){ echo "selected"; }?> >เลือกการชำระเงิน</option>
													<option value="1" <?php if($ins_pay_type=='1'){ echo "selected"; }?> >เงินสด</option>
													<option value="2" <?php if($ins_pay_type=='2'){ echo "selected"; }?> >เงินโอน</option>
													<option value="3" <?php if($ins_pay_type=='3'){ echo "selected"; }?> >บัตรเครดิต</option>
											  	    <option value="4" <?php if($ins_pay_type=='4'){ echo "selected"; }?> >เช็ค</option>
											</select>
									 </td>
								     <td><input type="text" id="cash_collection_ins" name="cash_collection_ins" class="form-control autonumber" value="<?php echo $cash_collection_ins?>" ></td>
								     <td><input type="text" id="tran_collection_ins" name="tran_collection_ins" class="form-control autonumber" value="<?php echo $tran_collection_ins?>" ></td>
								     <td>
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
										 <input type="hidden" id="recieve_id_carcheck" name="recieve_id_carcheck" value="<?php echo $recieve_id_carcheck?>">
										 <input type="hidden" id="recieve_id_act" name="recieve_id_act" value="<?php echo $recieve_id_act?>">
										 <input type="hidden" id="recieve_id_tax" name="recieve_id_tax" value="<?php echo $recieve_id_tax?>">
										 <input type="hidden" id="recieve_id_ins" name="recieve_id_ins" value="<?php echo $recieve_id_ins?>">
											
										 <button type="button" class="btn btn-success btn-sm"  onClick="updateCashPayment('ins')"><span id="ok_ins"></span>บันทึก</button></td>
							      </tr>
									
									 <tr>
									   <td class="text-danger" align="center">รวม</td>
									   <td align="center" class="text-danger" ><span id="totalAllCash"><?php $sumTotal = ($car_check_price+$act_price_total+$insurance_total+$tax_price+$tax_service);
												echo number_format(($sumTotal),2)?></span></td>
									   <td colspan="7" align="center" class="text-danger" >&nbsp;</td>
							      </tr>
									 <tr>
									   <td class="text-danger" align="center">ยอดชำระ</td>
									   <td align="center" class="text-danger" >
										   <input type="text" class="form-control autonumber " id="payment_amount" name="payment_amount" onChange="updatePaymentAmount(this.value)" value="<?php echo $payment_amount?>" > </td>
									   <td colspan="7" align="left" class="text-danger" style="padding-left: 10px;"><strong>วันกำหนดชำระเงิน</strong>
									     <input name="cash_duedate" type="text" class=" datepicker" id="cash_duedate" placeholder=""  value="<?php echo $cash_duedate?>"   style="height: 30px;">
									     <select id="pay_cash_status" name="pay_cash_status" style="height: 30px;">
									       <option value="0" <?php if($pay_cash_status==0){ echo "selected"; }?> >ไม่ระบุ</option>
									       <option value="1" <?php if($pay_cash_status==1){ echo "selected"; }?> >ชำระเรียบร้อยแล้ว</option>
									       <option value="2" <?php if($pay_cash_status==2){ echo "selected"; }?> >ค้างชำระ</option>
								         </select>
								       <button type="button" class="btn btn-primary btn-sm" onClick="UpdateCashDuedate()">บันทึก</button></td>
									  
							      </tr>
								</tbody>
						  </table>
							
					  </div>
					 
					  
				  
																
			  </div>
					
				<hr class="col-12">
				
							<div class="form-group row" style="font-size: 16px">
								<label class="col-sm-4 control-label"><strong>รายละเอียดการชำระเงินผ่อน</strong> </label>
								
								<label class="col-sm-1 control-label">ยอดเงินผ่อน</label>
								<div class="col-sm-2">
									<input type="text" id="amount_installment" name="amount_installment" class="form-control form-control-sm autonumber" onChange=" updateAmountInstallment()" value="<?php echo $amount_installment?>">
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
										<option value="0">0</option>
										<?php for($i=1;$i<=10;$i++){?>
										<option value="<?php echo $i?>" <?php if($maxPeriod==$i){ echo "selected";}?>  ><?php echo $i?></option>
										<?php }?>

									</select>
								</div>
								
								<div class="col-sm-1">
									<button type="submit" class="btn btn-info btn-sm" onClick="calculateInstallment()">คำนวณงวดผ่อน</button>
								</div>

							</div>																


							<div class="form-group row">	
								<div class="col-sm-12">
								
										
											<div id="listInstallment" class="table-scrollable">
												<?php include('insurance_installment_talble.php')?>
											</div>
											<div id="listInstallmentPrint"></div>
										
									
								</div>

							</div>
							<div align="center"><button type="button" class="btn btn-warning btn-sm" onClick="printInsurancePayment('normal')"><i class="fa fa-print"></i> พิมพ์รายการผ่อนสำหรับลูกค้า</button></div>



				

			</div>
		</div>