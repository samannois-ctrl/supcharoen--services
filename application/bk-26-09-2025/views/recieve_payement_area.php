<?php
//print_r($getDb);
//echo "<br>---------------------<br>";
//echo 'countInstallฺByWorkID > '.$getDb['getDb']; 
//echo "<br>---------------------<br>";
//echo "print_r getDb >> ";payment_amount
//print_r($getDb['getDb']);
//echo "<br>---------------------<br>";
$insuranceTitle = array("1"=>"ประกันภาคสมัครใจ","2"=>"ประกันท่องเที่ยว","3"=>"ประกันขนส่ง","4"=>"ประกันอุบัติเหตุ","5"=>"ประกันบ้าน");
function checkBox($val){
	 if($val==1){
		 echo "checked";
	 }else{
		 echo "";
	 }
}
?>
<table width="100%" class="table table-bordered table-hover">
		  		<tr>
			      <th>ทะเบียน</th>
			      <th colspan="2">ตรวจสภาพ</th>
			      <th colspan="2">ค่าภาษี</th>
			      <th colspan="2">ค่าบริการต่อภาษี</th>
			      <th colspan="2">พ.ร.บ.</th>
			      <th colspan="2">ประกันภัย</th>
			      <th width="100">ผ่อนงวด</th>
			      <th>จำนวนเงินผ่อน</th>
			      <th>รวม</th>
			      <th width="30">บันทึก</th>
			      <th width="30" class="text-danger">ลบ</th>
		       </tr>
	<?php $sumTotal=0;
		  foreach($getDb['getDb'] AS $data){ 
			  $sumRow=0;
			  $sumRow = $data->carcheck_amt+$data->tax_amt+$data->tax_service_amt+$data->act_amt+$data->insurance_amt;
			  $sumTotal = $sumTotal + $sumRow; 
				?>
		  		<tr>
		  		  <td>
					  <?php if($data->insurance_data_type==1){?>
					  <a href="<?php echo base_url('Insurance_car/work_insurance_add/'.$data->insurance_id)?>" target="_blank">
					  <?php echo $data->vehicle_regis." ".$data->province_name?>
					  </a>
					  <?php }else if($data->insurance_data_type> 1){ 
					                $desCriptionArray = explode(">",$data->customer_desc);
									$data->customer_desc = $desCriptionArray[1];
									$customer_ID = $desCriptionArray[0];

					  ?>
							<a href="<?php echo base_url('Insurance_other/work_insurance_other_add/'.$data->insurance_data_type.'/'.$data->insurance_id."/".$customer_ID);?>" target="_blank">
								<?php	echo $desCriptionArray[1]?>
							</a>
					  
						 <?php }else{ echo $data->payment_by; }?>
					  
					
					</td>
				 <td><input type="checkbox" onClick="getValue('carcheck','carcheck_amt<?php echo $data->recieveInsID?>','<?php echo $data->recieveInsID?>',this,'<?php echo $data->insurance_id?>','<?php echo $data->insurance_data_type?>')" <?php checkBox($data->carcheck)?> ></td>
		  		  <td><input name="carcheck_amt<?php echo $data->recieveInsID?>" type="text" class="form-control form-control-sm autonumber autosum" id="carcheck_amt<?php echo $data->recieveInsID?>" value="<?php if($data->carcheck_amt >0){ echo $data->carcheck_amt;}?>"  onChange="calculateSums()"  ></td>
		  		  <td><input type="checkbox" onClick="getValue('tax','tax_amt<?php echo $data->recieveInsID?>','<?php echo $data->recieveInsID?>',this,'<?php echo $data->insurance_id?>','<?php echo $data->insurance_data_type?>')" <?php checkBox($data->tax)?>></td>
		  		  <td><input name="tax_amt<?php echo $data->recieveInsID?>" type="text" class="form-control form-control-sm autonumber autosum" id="tax_amt<?php echo $data->recieveInsID?>"  value="<?php if($data->tax_amt >0){ echo $data->tax_amt; }?>"  onChange="calculateSums()"  ></td>
		  		  <td><input type="checkbox" onClick="getValue('tax_service','tax_service_amt<?php echo $data->recieveInsID?>','<?php echo $data->recieveInsID?>',this,'<?php echo $data->insurance_id?>','<?php echo $data->insurance_data_type?>')"  <?php checkBox($data->tax_service)?> ></td>
		  		  <td><input name="tax_service_amt<?php echo $data->recieveInsID?>" type="text" class="form-control form-control-sm autonumber autosum" id="tax_service_amt<?php echo $data->recieveInsID?>"  value="<?php if($data->tax_service_amt >0){ echo $data->tax_service_amt; } ?>"  onChange="calculateSums()"  ></td>
		  		  <td><input type="checkbox" onClick="getValue('act','act_amt<?php echo $data->recieveInsID?>','<?php echo $data->recieveInsID?>',this,'<?php echo $data->insurance_id?>','<?php echo $data->insurance_data_type?>')"  <?php checkBox($data->act)?>  ></td>
		  		  <td><input name="act_amt<?php echo $data->recieveInsID?>" type="text" class="form-control form-control-sm autonumber autosum" id="act_amt<?php echo $data->recieveInsID?>"   value="<?php if($data->act_amt >0){  echo $data->act_amt; }?>" onChange="calculateSums()" ></td>
		  		  <td><input type="checkbox" onClick="getValue('insurance','insurance_amt<?php echo $data->recieveInsID?>','<?php echo $data->recieveInsID?>',this,'<?php echo $data->insurance_id?>','<?php echo $data->insurance_data_type?>')"  <?php checkBox($data->insurance)?> ></td>
		  		  <td><input name="insurance_amt<?php echo $data->recieveInsID?>" type="text" class="form-control form-control-sm autonumber autosum" id="insurance_amt<?php echo $data->recieveInsID?>"    value="<?php if($data->insurance_amt >0){ echo $data->insurance_amt; }?>"  onChange="calculateSums()" ></td>
		  		  <td align="center">
					  <select id="installment_period<?php echo $data->recieveInsID?>" name="installment_period<?php echo $data->recieveInsID?>" class="form-control form-control-sm" <?php if($data->CountInstallment==0){ echo "disabled";}?> onchange="getInstallment(this.value,'<?php echo $data->insurance_id?>','installment_amt<?php echo $data->recieveInsID?>','<?php echo $data->recieveInsID?>')" >
						  
					    <option value="0">-เลือก-</option>
						 <?php for($i=1; $i<=$data->CountInstallment; $i++){ 
						    $txtSelect = '';
							if($data->installment_period==$i){ $txtSelect = 'selected'; }
						  ?>
					    <option value="<?php echo $i?>" <?php echo $txtSelect?> ><?php echo $i?></option>
					   <?php } ?>
					  </select> 
					</td>
		  		  <td><input name="installment_amt<?php echo $data->recieveInsID?>" type="text" class="form-control form-control-sm autonumber" id="installment_amt<?php echo $data->recieveInsID?>" <?php if($data->CountInstallment==0){ echo "disabled";}?>   value="<?php  if($data->installment_amt >0){ echo $data->installment_amt; }?>" >
					<span id="installmentAlert"></span>
					</td>
		  		  <td><div id="resultRow<?php echo $data->recieveInsID?>"><?php //echo number_format($sumRow,2)?></div></td>
		  		  <td><button type="button" class="btn btn-primary btn-xs" onClick="updateRecieveDetail('<?php echo $data->recieveInsID?>','<?php echo $data->insurance_id?>','<?php echo $data->insurance_data_type?>')">บันทึก</button></td>
		  		  <td><button type="button" class="btn btn-danger btn-xs" onClick="deleteReciveList('<?php echo $data->vehicle_regis." ".$data->province_name?>','<?php echo $data->recieveInsID?>')" >x	</button></td>
            </tr>
		  		
	 <?php ; } ?>
	<tr>
		  		  <td>&nbsp;</td>
		  		  <td>&nbsp;</td>
		  		  <td>&nbsp;</td>
		  		  <td>&nbsp;</td>
		  		  <td>&nbsp;</td>
		  		  <td>&nbsp;</td>
		  		  <td>&nbsp;</td>
		  		  <td>&nbsp;</td>
		  		  <td>&nbsp;</td>
		  		  <td>&nbsp;</td>
		  		  <td>&nbsp;</td>
		  		  <td align="center">&nbsp;</td>
		  		  <td align="right"><strong>รวม</strong></td>
		  		  <td><div id="showTotal" style="font-weight: bold"><?php echo number_format($sumTotal,2)?></div></td>
		  		  <td>&nbsp;</td>
		  		  <td>&nbsp;</td>
             </tr>  		
		  </table>
  <div id="showResult" align="center"></div>
<script>
$(function($) {

		$('.autonumber').autoNumeric('init');
		
	 });
</script>


