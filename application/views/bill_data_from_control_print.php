<style>
#printAreaOnly {
   
  /*display : none; */
    padding: 10px;
	background-color: white;
	margin: 5px;
  
}

@media print {
    #printAreaOnly2 {
       display : block;
		background-color: white;
		margin: 5px;	
		padding-left: 10px;
		padding-right: 10px;
	   
    }
	.noBorderR {
		border-right-width: 0; 
	}
	
	
	
	
}
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

.borderBtDash {		border-style: dashed;
		border-top: none;
		border-left: none;
		border-right: none;
		border-bottom-width: 1px;
}
</style>
<?php 
//echo $data['sql'];
// $number=26; echo $formattedNumber = sprintf("%02d", $number);
//echo "<br>";
// $number=1; echo $formattedNumber = sprintf("%02d", $number);
?><div id="printAreaOnly2" style="padding-top: 20px;width: 100%; ">
<br>
	  <div class="box-subcharoen">
	    ทรัพย์เจริญโบรคเกอร์ประกันภัย <br>
		536 ถ.รัถการ อ.หาดใหญ่ จ.สงขลา <br>
		Tel. 081-2362323
	  </div>

		<div style="clear: both">&nbsp;</div> 
		<div class="row">
	   				<h3 align="center">ใบสำคัญจ่าย/Payment Voucher</h3>
	     </div>
			   
	  <div  style="width: 95%;margin: 0 auto" align="center">
	      <div class="row">
			 <div class="col-sm-6" style="text-align: left">จ่ายให้บริษัท / Pay To  <?php echo $BillData['company_name']?> &nbsp;&nbsp;  <span class="text-danger">( <?php echo $BillData['conde_name']?> )</span></div>
			<div class="col-sm-6" style="text-align: right">วันที่ <?php echo $BillPeriod?></div>
		 </div>
	  </div>

	
	
		<div class="col-12" align="center">
			<??>
			<table class="allBorder" width="98%">
						<thead>
							<tr  class="borderTopButtom">
								<td></td>
								<td class="BorkderR" colspan="4">รายการ/Description</td>
								<td width="142" nowrap="nowrap" style="width: 100px;">จำนวนเงิน/Amount</td>
								
							</tr>
						</thead>
						<tbody>
						<?php $n=0; $checkIns=0; $allSum=0; $allRow=0; $fullRow=5;
								$dataCAption['resultDataCaption']=$data['resultDataCaption'];
								foreach($data['resultData'] AS $data2){ 
							        if($checkIns!=$data2->id){
										$showBtnDelete = '1';
									}else{
										$showBtnDelete = '0';
									}
									$doSumActAllow = 1;
								//$allSum = $allSum+$data2->delivery_allowance+$data2->act_delivery_allowance;
								if(!isset($data2->delivery_allowance)){ $data2->delivery_allowance = 0;}
								if(!isset($data2->act_delivery_allowance)){ $data2->act_delivery_allowance = 0;}
							?>	
							<?php   //if(($data2->insurance_total>0)&&($data2->select_ins_bill=='1')&&($data2->insurance_data_type==1)){
									if(($data2->insurance_no!='')&&($data2->select_ins_bill=='1')&&($data2->insurance_data_type==1)){
									$allSum = $allSum+$data2->delivery_allowance;
								    $doSumActAllow = 0;
								    $n++;
							?>
							<tr class="borderTopButtom">
								<td ><?php echo $this->insurance_model->translateDateToThai($data2->insurance_start)?></td>
								<td align="left" nowrap="nowrap"><?php echo $data2->insurance_no?></td>
								<td nowrap style="width: 150px;" >&nbsp;<?php echo $data2->cust_name?></td>
								<td align="left" nowrap="nowrap"   style=""><?php echo $data2->vehicle_regis?>
									<div class="pull-right">
									<span id="boxIns<?php echo $data2->id?>" style="display: none"><i class="fa  fa-check-circle-o text-success"></i></span>
									</div>
							  </td>
								<td  class="BorkderR"  align="right" nowrap="nowrap" style="width: 80px;padding-right: 5px;">
									<?php echo number_format($data2->delivery_allowance,2)?>								
							  </td>
								<td align="right" style="padding-right: 5px;"><?php //if($n=='1'){ echo number_format($allSum,2);}?>
									<?php  //if($n=='1'){  echo "<div id='showAllsumPrint'></div>";}?>
									<?php  if($n=='1'){  echo $hiddenAllSum; }?>
								</td>
								
							</tr>
							<?php $allRow++; }?>
							<?php
								    	
									//if(($data2->act_price_total>0)&&($data2->select_act_bill=='1')&&($data2->insurance_data_type==1)){
									if(($data2->act_no!='')&&($data2->select_act_bill=='1')&&($data2->insurance_data_type==1)){
									//if($doSumActAllow=='1'){ 
										$allSum = $allSum+$data2->act_delivery_allowance; 
							        //}
								    $n++;
							?>
							<tr class="borderTopButtom">
								<td ><?php echo $this->insurance_model->translateDateToThai($data2->act_date_start)?></td>
								<td align="left" nowrap="nowrap" ><?php echo $data2->act_no?></td>
								<td align="left" nowrap="nowrap" >&nbsp;<?php echo $data2->cust_name?></td>
								<td align="left"  nowrap="nowrap"><?php echo $data2->vehicle_regis?>
									<div class="pull-right">
									<span id="boxAct<?php echo $data2->id?>"  style="display: none"><i class="fa  fa-check-circle-o text-success"></i></span></div>
								</td>
								<td  class="BorkderR" width="101" align="right" nowrap="nowrap"  style="padding-right: 5px;">
									<?php echo number_format($data2->act_delivery_allowance,2)?>	
								</td>
								<td align="right"><?php  if($n=='1'){  echo "<div id='showAllsum'></div>";}?>
									<?php  if($n=='1'){  echo $hiddenAllSum; }?>
								</td>
							</tr>
							
							<?php  $allRow++; }?>
								<?php if($data2->insurance_data_type>1){?>
							<tr class="borderTopButtom">
								<td ><?php echo $this->insurance_model->translateDateToThai($data2->insurance_start)?></td>
								<td align="left" nowrap="nowrap"><?php echo $data2->insurance_no?></td>
								<td align="left" nowrap="nowrap">&nbsp;<?php echo $data2->cust_name?></td>
								<td align="left" nowrap="nowrap"><?php switch($data2->insurance_data_type){
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
									<span id="boxIns<?php echo $data2->id?>" style="display: none"><i class="fa  fa-check-circle-o text-success"></i></span>
									</div>
								</td>
								<td  class="BorkderR" align="right" nowrap="nowrap" style="padding-right: 5px;">
									<?php echo number_format($data2->delivery_allowance,2); $allSum=$allSum+$data2->delivery_allowance;?>								
								</td>
								<td align="right" style="padding-right: 5px;"><?php //if($n=='1'){ echo number_format($allSum,2);}?>
									<?php  //if($n=='1'){  echo "<div id='showAllsum'></div>";}?>
									<?php  if($n=='1'){  echo $hiddenAllSum; }?>
								</td>
								
							</tr>
							<?php  $allRow++; }?>
							<?php  $checkIns=$data2->id; $n++;  } ?>
							<?php  $ncheckRow2=1; ?>
							<tr  class="borderTopButtom">
							  <td colspan="5" align="right" class="BorkderR" style="padding-right: 5px;">
								  รวมยอด <?php echo number_format($allSum,2);?>
								 
								</td>
							  <td>&nbsp;</td>
						  </tr>
							<!--<tr class="borderTopButtom ">
								<td colspan="3" align="left" class="text-danger">&nbsp;</td>
								<td class="BorkderR">&nbsp;</td>
								<td class="BorkderR">&nbsp;</td>
								
							</tr>-->
							<?php $nPlus=0; foreach($getBillDedugData['plus'] AS $dedug){ 
									if($dedug->act_type=='1'){
									  $dedugClass = 'text-danger';
									  $allSum=$allSum-$dedug->dedug_amount;
								  }else if($dedug->act_type=='2'){
									   $dedugClass = 'text-success';
									   $allSum=$allSum+$dedug->dedug_amount;
								  }
							
							?>
							<tr class="borderTopButtom">
								<td colspan="4" align="left" class="<?php echo $dedugClass?>">
									<?php echo $dedug->dedug_text?>
									&nbsp;&nbsp;
									<a href="javascript:void(0)" title="ลบ" onClick="deleteDedug('<?php echo $dedug->id?>','<?php echo htmlspecialchars($dedug->dedug_text);?>')">
									<i class="fa fa-times-circle text-danger" ></i>
									</a>
								</td>
							  <td  align="right" nowrap="nowrap" class="BorkderR text-success" style="padding-right: 5px;"><?php if($dedug->dedug_amount!='0.00'){ echo number_format($dedug->dedug_amount,2);     }?>	</td>
								<td align="right" style="padding-right: 5px;">&nbsp;</td>
								
							</tr>
							<?php $nPlus++;  }?>
							<?php /*if($nPlus >0 ){ ?>
							<tr class="borderTopButtom">
							  <td  class="BorkderR"  colspan="4" align="right" style="padding-right: 5px;">รวมยอด <?php echo number_format($allSum,2); ?></td>
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
								  <input type="hidden" name="hiddenAllSum" id="hiddenAllSum" value="<?php echo number_format($allSum,2);?>">
								</td>
							  <td>&nbsp;</td>
						  </tr>
						  <?php }*/?>	
							<tr  class="borderTopButtom">
							  <td colspan="5" align="right" class="BorkderR" style="padding-right: 5px;">
								  รวมยอดทั้งสิ้น <?php echo number_format($allSum,2);?>
								  
								</td>
							  <td>&nbsp;</td>
						  </tr>
							<tr class="borderTopButtom">
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td  class="BorkderR">&nbsp;</td>
								<td>&nbsp;</td>
								
							</tr>
							
							
							<tr class="borderTopButtom">
							  <td colspan="5" align="left"  class="BorkderR" style="font-size: 14px;">
								
								<table border="0" width="100%">
									<tr>
									  <td nowrap="nowrap">
									    <label class="custom-checkbox"><span class="label-text">บัตรเครดิต&nbsp;&nbsp;&nbsp;</span>
											<?php echo $BillData['credit_card'];?>
									      <!--<input type="text" style="width: 450px;text-align: center" class="borderBtDash" value="" >-->
								        </label>								      </td>  
								    </tr>
									<tr>
									  <td nowrap="nowrap">
									    <label class="custom-checkbox"><span class="label-text">เช็ค&nbsp;&nbsp;&nbsp;</span>
											<?php echo $BillData['check_data'];?>
									      <!--<input type="text" style="width: 450px;text-align: center" class="borderBtDash" value="" >-->
								        </label>								      </td>  
								    </tr>
								  	<tr>
									  <td nowrap="nowrap">
									    <label class="custom-checkbox"><span class="label-text">ธนาคาร&nbsp;&nbsp;&nbsp;</span>
											<?php echo $BillData['bank_name']." ".$BillData['bank_acc_branch']." ".$BillData['bank_acc_no']." ".$BillData['bank_acc_name'];?>
									      <!--<input type="text" style="width: 450px;text-align: center" class="borderBtDash" value="" >-->
								        </label>								      </td>  
								    </tr>
									
								  </table>
								
								
							</td>
							  <td>&nbsp;</td>
						  </tr>
							<tr class="borderTopButtom">
							  <td colspan="5" align="left"  class="BorkderR">
								<div class="row">
								 <div class="col-3">
									จำนวนเงิน<br>
							      The Sum of Bahts
									</div>  
								 <div class="col-9" style="text-align: center;vertical-align: middle"><h6 class="text-primary"><?php if($allSum>0){ echo $this->insurance_model->num2wordsThai2($allSum); }?>&nbsp;</h6></div>  
								</div>  
								
								
								
								</td>
							  <td>&nbsp;</td>
						  </tr>
							<tr class="borderTopButtom">
							  <td  class="BorkderR" colspan="5" align="left" style="font-size: 14px;"><table width="100%">
							    <tr>
							      <td width="33%"> ผู้รับเงิน/Collector
							        <input name="collector" type="text" class="borderBtDash" id="collector" style="width: 150px;text-align: center" value="<?php echo $BillData['collector'];?>" ></td>
							      <td width="33%"> ผู้จ่ายเงิน/Paid bye
							        <input name="paid_bye" type="text" class="borderBtDash" id="paid_bye" style="width: 150px;text-align: center" value="<?php echo $BillData['paid_bye'];?>" ></td>
							      <td width="33%"> ผู้บันทึก/Approve By
							        <input name="approve_by" type="text" class="borderBtDash" id="approve_by" style="width: 150px;text-align: center" value="<?php echo $BillData['approve_by'];?>" ></td>
						        </tr>
							    <tr>
							      <td width="33%">วันที่ /Date
							        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							        <input name="collector_date" type="text" class="borderBtDash" id="collector_date" style="width: 150px;text-align: center" value="<?php echo $BillData['collector_date'];?>" ></td>
							      <td width="33%">วันที่ /Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							        <input name="paid_bye_date" type="text" class="borderBtDash" id="paid_bye_date" style="width: 150px;text-align: center" value="<?php echo $BillData['paid_bye_date'];?>" ></td>
							      <td width="33%">วันที่ /Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							        <input name="approve_by_date" type="text" class="borderBtDash" id="approve_by_date" style="width: 150px;text-align: center" value="<?php echo $BillData['approve_by_date'];?>" ></td>
						        </tr>
						      </table></td>
							  <td>&nbsp;</td>
						  </tr>
						</tbody>
					
					</table>
			
		
  </div>
	</div>
<script>
	 
  </script>
<script >
function printData1(divName)
		{  
		   var divToPrint=document.getElementById(divName);
		   var newWin= window.open("");
			// newWin.print(); 
		   newWin.document.write(buildprintReservePrint2(divToPrint.innerHTML));
		   setTimeout(function(){ newWin.print(); 

			newWin.close();
		   }, 1000);
		   //newWin.print();
		   //newWin.close();
		}
	$(document).ready(function(){
		console.log('allSum><?php echo $allSum?>')
		 $('#showAllsumPrint').html('<?php echo number_format($allSum,2);?>')
		 printData1('printAreaOnly2')
	})
</script>

