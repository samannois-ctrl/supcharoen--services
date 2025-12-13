<style>

	.box-subcharoen{
		text-align: center;
		padding: 10px;
		border-style: solid;
		border-width: 2px;<br>
        border-color: blue;
		font-size: 20px;
		color:#004506;
		width: 40%;
		margin: 0 auto;
		 
	}
	.allBorder{
		border-style: solid;
		border-color:black;
		border-width: thin;
	}
	.borderTopButtom{
		 border-top: thin solid black;
		 border-bottom: thin solid black;
	}
	.BorkderR{
	  	border-right: thin solid black;
	}
	
	label.custom-checkbox input[type="checkbox"] { 
    opacity:0;
}
 
label.custom-checkbox input[type="checkbox"] ~ .helping-el{
    background-color: #FFFFFF;
    /*border: 2px solid #009688;  */
    border: 2px solid #000;  
    border-radius: 2px;
    display: inline-block;
    padding: 10px;
    position: relative;
    top: 2px;
}
 
label.custom-checkbox input[type="checkbox"]:checked ~ .helping-el{ 
    /*border: 2px solid #009688;*/
    border: 2px solid #000;
    background-color: #FFF;
}
 
label.custom-checkbox input[type="checkbox"]:checked ~ .helping-el:after {
    color: #000;
    content: "\2714";
    font-size: 20px;
    font-weight: normal;
    left: 2px;
    position: absolute;
    top: -6px;
    transform: rotate(10deg);
}
	
	.textinput{
		
	}
	.borderBtDash{
		border-style: dashed;
		border-top: none;
		border-left: none;
		border-right: none;
		border-bottom-width: 1px;
	}

	
</style>




<?php 
//echo "keygroup>".$BillData['keygroup']." billID>".$BillData['billID'];
//print_r($data);  keygroup billID
// $number=26; echo $formattedNumber = sprintf("%02d", $number);
//echo "<br>";
// $number=1; echo $formattedNumber = sprintf("%02d", $number);
?>
	  <div class="box-subcharoen">
	    ทรัพย์เจริญโบรคเกอร์ประกันภัย <br>
		536 ถ.รัถการ อ.หาดใหญ่ จ.สงขลา <br>
		Tel.097-3245364, 081-2362323
	  </div>
	 <div class="row">
	    <div class="col-6 text-danger" style="text-align: left" >ใบสำคัญจ่าย</div>
	    <div class="col-6 text-primary" style="text-align: right"></div>
	
	  </div>
	  <div class="row">
	    <div class="col-6 text-danger" style="text-align: left" >Payment Voucher</div>
	    <div class="col-6  text-primary" style="text-align: right">
		<div class="row">
			 <div class="col-sm-3">&nbsp;</div>
			<div class="col-sm-1">วันที่ </div>
		   <div class="col-sm-2">
			<select id="select_day_bill" name="select_day_bill" class="form-select" aria-label="">

								<?php for($i=1;$i<=31;$i++){?>
								<option value="<?php echo $i?>" <?php if($startday==$i){ echo "selected";}?> ><?php echo $i?></option>
								<?php }?>
								</select>
		  </div>

		  <div class="col-sm-3">
								<!--  monthArray  currMonth startYear select_month select_year-->
									<select id="select_month_bill" name="select_month_bill" class="form-select" aria-label="">
										<?php foreach($monthArray AS $monthID=>$monthName){?>
										<option value="<?php echo $monthID?>" <?php if($monthID==$currMonth){ echo "selected";}?> ><?php echo $monthName?></option>
										<?php }?>
									</select>
							  </div>	

		  <div class="col-sm-3">
									<select id="select_year_bill" name="select_year_bill" class="form-select" aria-label="">
										<?php for($i=0;$i<=$rangeYear;$i++){ 
												$txtYear = $startYear+$i;
										?>
										<option value="<?php echo $txtYear?>" <?php if($txtYear==$currYear){ echo "selected";}?> ><?php echo $txtYear+543?></option>
										<?php }?>

									</select>
							  </div>
							
		  
		  </div>
	   </div>
	
	  </div>
	 <div class="row">
		<div class="col-12">
		จ่ายให้บริษัท / Pay To  <select name="bill_company_id" id="bill_company_id" onChange="getCompanyData(this.value,'showBankOfCorp')">
								<option value="x">--เลือกบริษัท---</option>
								<?php $company_name=''; foreach($listCompany AS $company){ 
										if($company->company_full_name==''){
											$company_name= $company->company_name;
										}else{
											$company_name= $company->company_full_name;
										}
								?>
								<option value="<?php echo $company->id?>" <?php if(isset($BillData['company_id'])){ if($BillData['company_id']==$company->id){ echo "selected";} }?>  ><?php echo $company_name?></option>
			                    <?php }?>
							</select> 
			
			  &nbsp;&nbsp;
			              <span class="text-danger">(
							  <select name="blii_code_id" id="blii_code_id">
							  	<option value="x">--เลือกโค้ด--</option>
								<?php foreach($listCode AS $code){?>
								<option value="<?php echo $code->id?>"  <?php if(isset($BillData['code_id'])){ if($BillData['code_id']==$code->id){ echo "selected";} }?>><?php echo $code->conde_name?></option>
								 <?php } ?>
						  </select>
		  )</span>
	   </div>
	 </div>
	<div class="row">
		<div class="col-12">
			 <table class="allBorder" cellpadding="5px;" width="100%">
						<thead>
							<tr class="borderTopButtom">
								<td colspan="5" class="BorkderR">รายการ/Description</td>
								<td style="width: 150px;">จำนวนเงิน/Amount</td>
								
							</tr>
						</thead>
						<tbody>
						<?php $n=0; $checkIns=0; $allSum=0; $BillDateStart='';$BillDateEnd='';
								$dataCAption['resultDataCaption']=$data['resultDataCaption'];
							
								foreach($data['resultData'] AS $data){ 
							        if($checkIns!=$data->id){
										$showBtnDelete = '1';
									}else{
										$showBtnDelete = '0';
									}
									$doSumActAllow = 1;
								//$allSum = $allSum+$data->delivery_allowance+$data->act_delivery_allowance; 
									
							?>	
							<?php if(($data->insurance_no!='')&&($data->select_ins_bill=='1')&($data->insurance_data_type==1)){
									$allSum = $allSum+$data->delivery_allowance;
								    $doSumActAllow = 0;
								    $n++;
							?>
							<tr  class="borderTopButtom">
								<td style="width: 200px;"><?php echo $this->insurance_model->translateDateToThai($data->insurance_start)?></td>
								<td><?php echo $data->insurance_no?></td>
								<td align="left" style="padding-left: 10px;"><?php echo $data->cust_name?></td>
								<td align="center" nowrap="nowrap" style="width: 120px;"><?php echo $data->vehicle_regis?>
									<div class="pull-right">
									<span id="boxIns<?php echo $data->id?>" style="display: none"><i class="fa  fa-check-circle-o text-success"></i></span>
									</div>
								</td>
								<td  align="right" nowrap="nowrap" class="BorkderR" style="width: 120px;padding-right: 5px;"><?php echo number_format($data->delivery_allowance,2)?>								
								</td>
								<td align="right" style="padding-right: 5px;">
									<?php //if($n=='1'){ echo number_format($allSum,2);}?>
									<?php  if($n=='1'){  echo "<div id='showAllsum'></div>";}?>
								</td>
								
							</tr>
							<?php }?>
							<?php
								    	
									if(($data->act_no!='')&&($data->select_act_bill=='1')&&($data->insurance_data_type==1)){
									//if($doSumActAllow=='1'){ 
										$allSum = $allSum+$data->act_delivery_allowance; 
							        //}
								    $n++;
							?>
							<tr class="borderTopButtom">
								<td ><?php echo $this->insurance_model->translateDateToThai($data->act_date_start)?></td>
								<td ><?php echo $data->act_no?></td>
								<td align="left"><?php echo $data->cust_name?></td>
								<td align="center"  nowrap="nowrap"><?php echo $data->vehicle_regis?>
									<div class="pull-right">
									<span id="boxAct<?php echo $data->id?>"  style="display: none"><i class="fa  fa-check-circle-o text-success"></i></span></div>
								</td>
								<td width="20%" align="right" nowrap="nowrap" class="BorkderR"  style="padding-right: 5px;"><?php echo number_format($data->act_delivery_allowance,2)?>	
								</td>
								<td align="right"><?php  if($n=='1'){  echo "<div id='showAllsum'></div>";}?></td>
							</tr>
							
							<?php }?>
							<?php if($data->insurance_data_type>1){?>
							<tr class="borderTopButtom">
								<td><?php echo $this->insurance_model->translateDateToThai($data->insurance_start)?></td>
								<td style="text-align: left"><?php echo $data->insurance_no?></td>
								<td align="left"><?php echo $data->cust_name?></td>
								<td align="center"  nowrap="nowrap"><?php switch($data->insurance_data_type){
			                                     case "4" :
				  									echo "ประกันอุบัติเหตุ";
				                                break;
				                                case "3" :
				  									echo "ประกันขนส่ง";
				                                break;
				   								case "2" :
				  									echo "ประกันท่องเที่ยว";
				                                break;
				  								case "5" :
				  									echo "ประกันบ้าน";
				                                break;
		  									}
									  ?>
									<div class="pull-right">
									<span id="boxIns<?php echo $data->id?>" style="display: none"><i class="fa  fa-check-circle-o text-success"></i></span>
									</div>
								</td>
								<td  align="right" nowrap="nowrap" class="BorkderR" style="padding-right: 5px;"><?php echo number_format($data->delivery_allowance,2); $allSum=$allSum+$data->delivery_allowance;?>								
								</td>
								<td align="right" style="padding-right: 5px;">
									<?php //if($n=='1'){ echo number_format($allSum,2);}?>
									<?php  if($n=='1'){  echo "<div id='showAllsum'></div>";}?>
								</td>
								
							</tr>
							<?php }?>
							<?php  $checkIns=$data->id; } ?>
							<?php  $ncheckRow2=1; ?>
							
							<tr  class="borderTopButtom">
							  <td colspan="5" align="right" class="BorkderR" style="padding-right: 5px;">
								  รวมยอด <?php echo number_format($allSum,2);?>
								 
								</td>
							  <td>&nbsp;</td>
						  </tr>
							<tr class="borderTopButtom ">
								<td colspan="5" align="left" class="text-danger">&nbsp;</td>
								<td class="BorkderR">&nbsp;</td>
							</tr>
							<?php $nPlus=0; foreach($getBillDedugData['plus'] AS $dedug){ 
							      
									  $dedugClass = 'text-success';
									   $allSum=$allSum+$dedug->dedug_amount;
								 
							 ?>
							<tr class="borderTopButtom">
								<td colspan="4" align="left" class="<?php echo $dedugClass?>">
									<?php echo $dedug->dedug_text?>
									&nbsp;&nbsp;
									<a href="javascript:void(0)" title="ลบ" onClick="deleteDedug('<?php echo $dedug->id?>','<?php echo htmlspecialchars($dedug->dedug_text);?>')">
									<i class="fa fa-times-circle text-danger" ></i>
									</a>
								</td>
							  <td  align="right" nowrap="nowrap" class="BorkderR text-success" style="padding-right: 5px;">
								  <?php echo number_format($dedug->dedug_amount,2);  ?>	
							 </td>
								<td align="right" style="padding-right: 5px;">&nbsp;</td>
								
							</tr>
							<?php $nPlus++; }?>
							<?php /*if($nPlus>0){?>
							<tr  class="borderTopButtom">
							  <td colspan="4" align="right" class="BorkderR" style="padding-right: 5px;">
								  รวมยอด <?php echo number_format($allSum,2);?>
								 
								</td>
							  <td>&nbsp;</td>
						  </tr>
						  <?php }*/?>
							<?php $nDelete = 0; foreach($getBillDedugData['delete'] AS $dedug){ 
							      
									  $dedugClass = 'text-danger';
									  $allSum=$allSum-$dedug->dedug_amount;
								 
							 ?>
							<tr class="borderTopButtom">
								<td colspan="4" align="left" class="<?php echo $dedugClass?>">
									<?php echo $dedug->dedug_text?>
									&nbsp;&nbsp;
									<a href="javascript:void(0)" title="ลบ" onClick="deleteDedug('<?php echo $dedug->id?>','<?php echo htmlspecialchars($dedug->dedug_text);?>')">
									<i class="fa fa-times-circle text-danger" ></i>
									</a>
								</td>
							  <td  align="right" nowrap="nowrap" class="BorkderR text-danger" style="padding-right: 5px;">
								  <?php echo number_format($dedug->dedug_amount,2);  ?>	
							 </td>
								<td align="right" style="padding-right: 5px;">&nbsp;</td>
								
							</tr>
							<?php $nDelete++; }?>
							<?php /*if($nDelete > 0){ ?>
							<tr  class="borderTopButtom">
							  <td colspan="4" align="right" class="BorkderR" style="padding-right: 5px;">
								  รวมยอด <?php echo number_format($allSum,2);?>
								  
								</td>
							  <td>&nbsp;</td>
						  </tr>
						  <?php }*/?>
							<tr class="borderTopButtom ">
								<td colspan="5" align="left" class="text-danger">&nbsp;</td>
								<td class="BorkderR">&nbsp;</td>
							</tr>
							<tr  class="borderTopButtom">
							  <td colspan="5" align="right" class="BorkderR" style="padding-right: 5px;">
								  รวมยอดทั้งสิ้น <?php echo number_format($allSum,2);?>
								  
								</td>
							  <td>&nbsp;</td>
						  </tr>
						<tr  class="borderTopButtom">
							  <td colspan="5" align="right" class="BorkderR" style="padding-right: 5px;">
								<input type="hidden" name="hiddenAllSum" id="hiddenAllSum" value="<?php echo number_format($allSum,2);?>">  
					<?php if(isset($BillData['keygroup'])){?>
					<button type="button" class="btn btn-success btn-sm" onClick="OpenBillingDedugForm('<?php echo $BillData['keygroup']?>','<?php echo $BillData['billID']?>','plus')">เพิ่มข้อมูลบวก</button>			  
					&nbsp;
					<button type="button" class="btn btn-danger btn-sm" onClick="OpenBillingDedugForm('<?php echo $BillData['keygroup']?>','<?php echo $BillData['billID']?>','delete')">เพิ่มข้อมูลหัก</button>
					<?php }?>			  
								</td>
							  <td>&nbsp;</td>
						  </tr>
							
							<tr  class="borderTopButtom">
							  <td colspan="5" align="left" class="BorkderR"  style="font-size: 14px;">
								 
								  <table border="0" width="100%">
								  	<tr>
									  <td align="left" nowrap="nowrap">
									    <label class="custom-checkbox">
									      <!--<input type="checkbox" id="pay_type" name="pay_type" value="2" <?php echo $BillData['pay_transfer']?> /> -->
									      <span class="helping-el"></span>
									      <span class="label-text">บัตรเครดิต&nbsp;&nbsp;&nbsp;</span>
									      <input type="text" id="showCreditCard" name="showCreditCard" style="width: 500px;text-align: center" class="borderBtDash" value="<?php echo $BillData['credit_card']?>" > 
									      
									      <input type="hidden" tyle="width: 200px;" id="check_bank_name" name="check_bank_name" class="borderBtDash" value="<?php echo $BillData['check_bank_name']?>" >
									      <input name="transfer_money" type="hidden" class="autonumber borderBtDash" id="transfer_money" style="width: 120px;height: 30px;text-align: center"  value="<?php if($BillData['transfer_money']!='0.00'){  echo $BillData['transfer_money']; }?>" >
									      
									      <input type="hidden" id="date_payment" name="date_payment" class="borderBtDash" style="width: 85px;" value="<?php echo $BillData['date_payment']?>">
									      
									      <input type="hidden" id="check_no" name="check_no" class="borderBtDash" tyle="width: 200px;"  value="<?php echo $BillData['check_no']?>" >
								        </label>								      </td>  
								    </tr>
									  <tr>
									  <td align="left" nowrap="nowrap">
									    <label class="custom-checkbox">
									      <!--<input type="checkbox" id="pay_type" name="pay_type" value="2" <?php echo $BillData['pay_transfer']?> /> -->
									      <span class="helping-el"></span>
									      <span class="label-text">เช็ค&nbsp;&nbsp;&nbsp;</span>
									      <input type="text" id="check_data" name="check_data" style="width: 500px;text-align: center" class="borderBtDash" value="<?php echo $BillData['check_data']?>" > 
									      
									      <input type="hidden" tyle="width: 200px;" id="check_bank_name" name="check_bank_name" class="borderBtDash" value="<?php echo $BillData['check_bank_name']?>" >
									      <input name="transfer_money" type="hidden" class="autonumber borderBtDash" id="transfer_money" style="width: 120px;height: 30px;text-align: center"  value="<?php if($BillData['transfer_money']!='0.00'){  echo $BillData['transfer_money']; }?>" >
									      
									      <input type="hidden" id="date_payment" name="date_payment" class="borderBtDash" style="width: 85px;" value="<?php echo $BillData['date_payment']?>">
									      
									      <input type="hidden" id="check_no" name="check_no" class="borderBtDash" tyle="width: 200px;"  value="<?php echo $BillData['check_no']?>" >
								        </label>								      </td>  
								    </tr>
									  <tr>
									  <td align="left" nowrap="nowrap">
									    <label class="custom-checkbox">
									      <!--<input type="checkbox" id="pay_type" name="pay_type" value="2" <?php echo $BillData['pay_transfer']?> /> -->
									      <span class="helping-el"></span>
									      <span class="label-text">โอน/ธนาคาร&nbsp;&nbsp;&nbsp;</span>
									      <input type="text" id="showBankOfCorp" style="width: 500px;text-align: center" class="borderBtDash" value="<?php echo $BillData['bank_name']." ".$BillData['bank_acc_branch']." ".$BillData['bank_acc_no']." ".$BillData['bank_acc_name'];?>" > 
									      
									      <input type="hidden" tyle="width: 200px;" id="check_bank_name" name="check_bank_name" class="borderBtDash" value="<?php echo $BillData['check_bank_name']?>" >
									      <input name="transfer_money" type="hidden" class="autonumber borderBtDash" id="transfer_money" style="width: 120px;height: 30px;text-align: center"  value="<?php if($BillData['transfer_money']!='0.00'){  echo $BillData['transfer_money']; }?>" >
									      
									      <input type="hidden" id="date_payment" name="date_payment" class="borderBtDash" style="width: 85px;" value="<?php echo $BillData['date_payment']?>">
									      
									      <input type="hidden" id="check_no" name="check_no" class="borderBtDash" tyle="width: 200px;"  value="<?php echo $BillData['check_no']?>" >
								        </label>								      </td>  
								    </tr>
									
								  </table>
								  
								 
							  </td>
							  <td>&nbsp;</td>
						  </tr>
							<tr  class="borderTopButtom">
							  <td colspan="5" align="left" class="BorkderR">
								<div class="row">
								 <div class="col-3">
									จำนวนเงิน<br>
							      The Sum of Bahts
									</div>  
								 <div class="col-9" style="text-align: center"><h3 class="text-primary"><?php if($allSum>0){ 
								echo $this->insurance_model->num2wordsThai2($allSum); }?>&nbsp;</h3></div>  
								</div>  
								
								
								
								</td>
							  <td>&nbsp;</td>
						  </tr>
							<tr class="borderTopButtom"> 
							  <td class="BorkderR" colspan="5" align="left" style="font-size: 14px;">
							    <table width="100%">
								  	<tr>
									  <td width="33%">
										 ผู้รับเงิน/Collector <input name="collector" type="text" class="borderBtDash" id="collector" style="width: 150px;text-align: center" value="<?php echo $BillData['collector'];?>" > 
										</td>  
									  <td width="33%">
										ผู้จ่ายเงิน/Paid bye <input name="paid_bye" type="text" class="borderBtDash" id="paid_bye" style="width: 150px;text-align: center" value="<?php echo $BillData['paid_bye'];?>" > 
										</td>  
									  <td width="33%"> ผู้บันทึก/Approve By 
							  <input name="approve_by" type="text" class="borderBtDash" id="approve_by" style="width: 150px;text-align: center" value="<?php echo $BillData['approve_by'];?>" >
							 </td>  
									</tr>
									<tr>
									  <td width="33%">วันที่ /Date
										  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							    <input name="collector_date" type="text" class="borderBtDash" id="collector_date" style="width: 150px;text-align: center" value="<?php echo $BillData['collector_date'];?>" >
										</td>  
									  <td width="33%">วันที่ /Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							    <input name="paid_bye_date" type="text" class="borderBtDash" id="paid_bye_date" style="width: 150px;text-align: center" value="<?php echo $BillData['paid_bye_date'];?>" >
										  </td>  
									  <td width="33%">วันที่ /Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							    <input name="approve_by_date" type="text" class="borderBtDash" id="approve_by_date" style="width: 150px;text-align: center" value="<?php echo $BillData['approve_by_date'];?>" ></td>  
									</tr>
								  </table>
								  
								 
							</td>
							  <td>&nbsp;</td>
						  </tr>
						</tbody>
					
					</table>
	  </div>
  </div>
  <script>
	  $('#showAllsum').html('<?php echo number_format($allSum,2);?>')

		$(function($) {
			$('.autonumber').autoNumeric('init');
		 });

  </script>


