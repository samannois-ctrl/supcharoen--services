
<div class="table-scrollable">
		<table class="table">
			<thead>
				<tr>
					<th style="text-align: center">งวดที่</th>
					<th style="text-align: center">วันที่รับเงิน</th>
					<th style="text-align: center">จำนวนเงิน</th>
					<th style="text-align: center">ส่วนลด</th>
					<th style="text-align: center">การชำระเงิน</th>
					<th style="text-align: center">ธนาคาร</th>
					<th style="text-align: center">เลขที่ใบเสร็จ</th>
					<th style="text-align: center">วันกำหนดชำระเงิน</th>
					<th style="text-align: center">สถานะตามเงิน</th>
					<th style="text-align: center">หมายเหตุ</th>
					<th style="text-align: center">บันทึก</th>
				</tr>
			</thead>
			<tbody>
				<?php $n=1; $countRow = 0; $totalInstallment =count($insurancePayment);
						foreach($insurancePayment AS $payment){ 
								
				?>
				<tr class="active">
					<td style="text-align: center"><?php echo $n?></td>
					<td><input type="text" class="form-control datepicker" id="receipt_date<?php echo $payment->id?>" placeholder="" readonly  value="<?php echo $this->insurance_model->translateDateToThai($payment->receipt_date)?>" ></td>
					<td>
						<input type="text" class="form-control autonumber" id="amount<?php echo $payment->id?>" placeholder="" value="<?php echo $payment->amount?>" onChange="updatePeroidPayment('<?php echo $payment->id?>',this.value,'amount')">
						<span id="Amounttxt<?php echo $payment->id?>"></span>
					</td>
					<td><?php if($totalInstallment==$n){?>
						<input type="text" class="form-control autonumber" id="discount<?php echo $payment->id?>" name="discount_payment" value="<?php echo $payment->discount?>"  onChange="updatePeroidPayment('<?php echo $payment->id?>',this.value,'discount')">
						<span id="Discounttxt<?php echo $payment->id?>"></span>
						<?php }?>
					</td>
					<td>
						<select id="pay_type<?php echo $payment->id?>" class="form-select" aria-label="">
							<option value="0" <?php if($payment->pay_type=='0'){ echo "selected"; }?> >เลือกการชำระเงิน</option>
							<option value="1" <?php if($payment->pay_type=='1'){ echo "selected"; }?> >เงินสด</option>
							<option value="2" <?php if($payment->pay_type=='2'){ echo "selected"; }?> >เงินโอน</option>
							<option value="3" <?php if($payment->pay_type=='3'){ echo "selected"; }?> >บัตรเครดิต</option>
							<option value="4" <?php if($payment->pay_type=='4'){ echo "selected"; }?> >เช็ค</option>
						</select>
						
					</td>
					<td>
					   <select id="bank_id<?php echo $payment->id?>" class="form-control form-control-sm">
						  <option value="x">-เลือกธนาคาร-</option>
						 <?php foreach($bookbankList['result'] AS $bookbank){?>
						  <option value="<?php echo $bookbank->id?>" <?php if($payment->bank_id==$bookbank->id){ echo "selected"; }?> ><?php echo $bookbank->bank_name." ".$bookbank->bank_acc_name." ".$bookbank->bank_number?></option>
						 <?php }?>
						   
					   </select>
					</td>
					<td><input type="text" class="form-control" id="recipe_no<?php echo $payment->id?>" value="<?php echo $payment->recipe_no?>" placeholder=""></td>
					<td><input type="hidden" name="hiddenID" id="hiddenID" value="<?php echo $payment->id?>">
						<input type="text" class="form-control datepicker duedateInput" id="due_date<?php echo $payment->id?>" value="<?php if($payment->due_date!='0000-00-00'){ echo $this->insurance_model->translateDateToThai($payment->due_date); }?>" placeholder="" readonly onChange="updateDuedatePayment('<?php echo $payment->id?>',this.value,'<?php echo $payment->period?>','<?php echo $payment->work_id?>')" name="duedate<?php echo $payment->period?>">
						<!--[<?php echo $payment->period?>]-->
						<span id="duedatetxt<?php echo $payment->id?>"></span>
					</td>
					<td style="text-align: center">
						<span id="payStatus<?php echo $payment->id?>">
							<?php if($payment->is_payment=='1'){ ?>
							<button class="btn btn-success btn-xs">ชำระเงินแล้ว</button>
							<?php }else if($payment->is_payment=='0'){?>
							<button class="btn btn-danger btn-xs"> ค้างชำระเงิน </button>
							<?php }?>
						</span>
						
					</td>		
					<td><input type="text" class="form-control" id="remark<?php echo $payment->id?>" value="<?php echo $payment->remark?>" placeholder=""></td>
					<td style="text-align: center">
						
						<button type="button" class="btn btn-primary btn-xs" onClick="UpdatePayment('<?php echo $payment->id?>','<?php echo $payment->recieve_id?>')"><span id="ok_installment<?php echo $payment->id?>"></span>บันทึก</button>
						<!--<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>-->
					</td>
				</tr>
				<?php $n++; $countRow++; }?>
				<tr class="active">
					<td>&nbsp;</td>
					<td style="text-align: center;font-size: 18px; font-weight: 500;">
						
						รวมยอดรับชำระ
							<input type="hidden" id="totallInstallment" name="totallInstallment" value="<?php echo $countRow?>">
					</td>
					<td colspan="2" style="text-align: center;font-size: 18px; font-weight: 500;"><span id="isPaid"></span></td>
					<td style="text-align: center;font-size: 18px; font-weight: 500; color:#C90003">ยอดค้างรับ</td>
					<td style="text-align: center;font-size: 18px; font-weight: 500; color:#C90003"><span id="isNotPaid"></span></td>
					<td style="text-align: center;font-size: 18px; font-weight: 500; color:#C90003">&nbsp;</td>
					<td colspan="4" style="font-size: 18px; font-weight: 500;"><!--( เบี้ยรวม <span id="totalInsurance">
						<?php echo $insurance_total+$tax_price+$tax_service;?>***แก้ไขยอดรวม</span> )--></td>
				</tr>

			</tbody>
		</table>
<div id="printArea"></div>
<div id="printCoverArea"></div>

	</div>
<script>
	$(document).ready(function(){
		$(".datepicker").datepicker({
		language:'th-th',
		format:'dd/mm/yyyy',
		autoclose: true
		});
	}) 
</script>
