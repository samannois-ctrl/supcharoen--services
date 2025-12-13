											<div class="row">
												<div class="col-md-12 col-sm-12">
													<!--<div class="card card-box">-->
														<div class="card-head">
															<header>การชำระเงิน</header>
														</div>
														<div class="card-body " id="bar-parent1">
		<!--<form id="ServiceForm" name="ServiceForm" class="form-horizontal">	-->															
			<div class="form-group row">
					<label class="col-sm-2 control-label">จำนวนเงินรวม</label>
					<div class="col-sm-2">
						<input name="total_work_price" type="text" class="form-control autonumber" id="total_work_price" placeholder="" value="<?php echo $total_work_price?>">
					</div>
					<label class="col-sm-2 control-label">บาท</label>									
				</div>
				<div class="form-group row">
					   <label class="col-sm-1 control-label">การชำระเงิน</label>
						<div class="col-sm-1" style="margin-top: 8px;">
						<div class="radio p-0">
						<input type="checkbox" name="pay_cash_check" id="pay_cash_check" value="1" <?php if($pay_cash_check=='1'){ echo "checked";}?> class="pay_type" onClick="updateAmountPay(this)" >
						<label for="optionsRadios1">เงินสด</label>
						</div>																			
						</div>	
				  <div class="col-sm-2" >
							<input name="pay_cash" type="text" class="form-control autonumber" id="pay_cash" placeholder="" value="<?php echo $pay_cash?>" onChange="calculatePayment('pay_cash',this.value)" >
						</div>
						 <label class="col-sm-1 control-label">บาท</label>
					   <div class="col-sm-1" style="<?php //echo $hilightRed?>">
						<!--<input name="pay_cash_overdue" type="checkbox" id="pay_cash_overdue" value="1" <?php if($pay_cash_overdue=='1'){ echo "checked";}?> >
						ค้างชำระ--></div>
				
					
				  <div class="col-sm-5">&nbsp;</div>
					</div>
					<div class="form-group row">
					<label class="col-sm-1 control-label"></label>	
					<div class="col-sm-1" style="margin-top: 8px;">
						<div class="radio p-0">
							<input type="checkbox" name="pay_transfer_check" id="pay_transfer_check" value="1"  <?php if($pay_transfer_check=='1'){ echo "checked";}?>  class="pay_type" onClick="updateAmountPay(this,'pay_transfer')">
							<label for="optionsRadios1">โอน</label>
						</div>																			
					</div>	
					<label class="col-sm-1 control-label" style="margin-top: 8px;">ธนาคาร</label>
					<div class="col-sm-2" style="margin-top: 8px;">
						<?php //print_r($bookbankList)?>
					  <select id="bank_acc_id" name="bank_acc_id"  class="form-control">
							<option value="0" >--เลือกธนาคาร--</option>
						  <?php foreach($bookbankList['result'] AS $bookbank){?>
							<option value="<?php echo $bookbank->id;?>" <?php if($bookbank->id==$bank_acc_id){ echo "selected"; } ?> ><?php echo $bookbank->bank_name." ".$bookbank->bank_number." ".$bookbank->bank_acc_name?></option>
						<?php }?>
						</select>
					</div>
					<div class="col-sm-1" style="margin-top: 8px;">
							<input name="pay_transfer" type="text" class="form-control autonumber" id="pay_transfer" placeholder="" value="<?php echo $pay_transfer?>" onChange="calculatePayment('pay_transfer',this.value)"  >
						</div>
						 <label class="col-sm-1 control-label" style="margin-top: 8px;">บาท</label>
						<!--<div class="col-sm-1" style="<?php //echo $hilightRed?>">
						<input name="pay_transfer_overdue" type="checkbox" id="pay_transfer_overdue" value="1" <?php if($pay_transfer_overdue=='1'){ echo "checked";}?> >
						ค้างชำระ</div>-->
				
						
						<label class="col-sm-1 control-label" style="margin-top: 8px;">วันที่โอน</label>
						<div class="col-sm-1" style="margin-top: 8px;">
							<input name="pay_transfer_date" type="text" class="form-control datepicker" id="pay_transfer_date" value="<?php echo $pay_transfer_date?>" placeholder="" readonly >
						</div>	
					</div>
					<!------------------->
					<div class="form-group row">
					<label class="col-sm-1 control-label"></label>	
					<div class="col-sm-1" style="margin-top: 8px;">
						<div class="radio p-0">
							<input type="checkbox" name="pay_transfer_check2" id="pay_transfer_check2" value="1"  <?php if($pay_transfer_check2=='1'){ echo "checked";}?>  class="pay_type" onClick="updateAmountPay(this,'pay_transfer2')">
							<label for="optionsRadios1">โอน</label>
						</div>																
					</div>	
					<label class="col-sm-1 control-label" style="margin-top: 8px;">ธนาคาร</label>
					<div class="col-sm-2" style="margin-top: 8px;">
						<?php //print_r($bookbankList)?>
					  <select id="bank_acc_id2" name="bank_acc_id2"  class="form-control">
							<option value="0" >--เลือกธนาคาร--</option>
						  <?php foreach($bookbankList['result'] AS $bookbank){?>
							<option value="<?php echo $bookbank->id;?>" <?php if($bookbank->id==$bank_acc_id2){ echo "selected"; } ?> ><?php echo $bookbank->bank_name." ".$bookbank->bank_number." ".$bookbank->bank_acc_name?></option>
						<?php }?>
						</select>
					</div>
					<div class="col-sm-1" style="margin-top: 8px;">
							<input name="pay_transfer2" type="text" class="form-control autonumber" id="pay_transfer2" placeholder="" value="<?php echo $pay_transfer2?>" onChange="calculatePayment('pay_transfer2',this.value)"  >
						</div>
						 <label class="col-sm-1 control-label" style="margin-top: 8px;">บาท</label>
						<!--<div class="col-sm-1 " style="<?php //echo $hilightRed?>">
						<input name="pay_transfer2_overdue" type="checkbox" id="pay_transfer2_overdue" value="1" <?php if($pay_transfer2_overdue=='1'){ echo "checked";}?>  >
						ค้างชำระ</div>-->
						
						
						
						<label class="col-sm-1 control-label" style="margin-top: 8px;">วันที่โอน</label>
						<div class="col-sm-1" style="margin-top: 8px;">
							<input name="pay_transfer_date2" type="text" class="form-control datepicker" id="pay_transfer_date2" value="<?php echo $pay_transfer_date2?>" placeholder="" readonly >
							  
							
							<input type="hidden" name="pay_cash_overdue" id="pay_cash_overdue" value="">
							<input type="hidden" name="pay_transfer_overdue" id="pay_transfer_overdue" value="">
							<input type="hidden" name="pay_transfer2_overdue" id="pay_transfer2_overdue" value="">
							
						</div>	
					</div>
					<!------------------->
					<div class="form-group row">
					<label class="col-sm-1 control-label"></label>	
					<div class="col-sm-1" style=" <?php echo $hilightRed?>" >
						<div class="radio p-0">
							<input type="checkbox" name="work_overdue" id="work_overdue" value="1"  <?php if($work_overdue=='1'){ echo "checked";}?>  class="pay_type" >
							<label for="optionsRadios1">ค้างชำระ</label>
						</div>																			
					</div>	
					
					
						<label class="col-sm-1 control-label" style="margin-top: 8px;">วันที่จ่าย</label>
						<div class="col-sm-1" style="margin-top: 8px;">
							<input name="date_pay_overdue" type="text" class="form-control datepicker" id="date_pay_overdue" value="<?php echo $date_pay_overdue?>" placeholder="" readonly >
						</div>	
					</div>
					<!------------------->
				</div> 
				


					<!--</form>-->
														</div>
													<!--</div>-->
												</div>
					</div>
										