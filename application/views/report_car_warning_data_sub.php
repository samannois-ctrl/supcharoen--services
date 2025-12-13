<?php //print_r($getData['sql'])?>
<?php
$today=date("Y-m-d");   $now = new DateTime($today);
?>
<?php //echo 'useForm>'.$getData['useForm']; 
if($getData['useForm']=='1'){?>
<table class="table table-striped table-bordered table-hover table-checkable order-column full-width" id="example4">
			<tbody>
				<tr bgcolor="#dcdcdc">
					<th rowspan="2" style="text-align: center">ลำดับ</th>
					<th rowspan="2" style="text-align: center">ชื่อ-นามสกุล</th>
					<th rowspan="2" style="text-align: center">ทะเบียน</th>
					<th rowspan="2" style="text-align: center"><!--โทรศัพท์--> ตัวแทน</th>
					<th colspan="3" style="text-align: center">ประกันภัย</th>
					<th colspan="3" style="text-align: center">พ.ร.บ.</th>
					<th colspan="2" style="text-align: center">ภาษี</th>
					<th rowspan="2" style="text-align: center">หมายเหตุ</th>
					<th rowspan="2" style="text-align: center">เพิ่มหมายเหตุ</th>
					<th rowspan="2" style="text-align: center"> ต่ออายุ</th>
				</tr>
				<tr bgcolor="#dcdcdc">
					<th style="text-align: center">บริษัท</th>
					<th style="text-align: center">วันหมดอายุ</th>
					<th style="text-align: center">ปิดแจ้งเตือน</th>
					<th style="text-align: center">บริษัท</th>
					<th style="text-align: center">วันหมดอายุ</th>
					<th style="text-align: center">ปิดแจ้งเตือน</th>
					<th style="text-align: center">วันหมดอายุ</th>
					<th style="text-align: center">ปิดแจ้งเตือน</th>
				</tr>
    <?php $n=1;  
			foreach($getData['Data'] AS $data){
					$ExpireIns = '';$ExpireTax = ''; $ExpireACT = '';
				    $insClass=""; $TaxClass='';$ActClass= '';
				    $checkIns =''; $checkAct =''; $checkTax ='';
					if($data->insurance_end!='0000-00-00'){
			        	$diffINS = date_diff($now, new DateTime($data->insurance_end));
						if($diffINS->invert){
							$insClass="text-danger";
						}
						$ExpireIns = $diffINS->days . " วัน";
					}
					if($data->act_date_end!='0000-00-00'){
						$diffACT = date_diff($now,new DateTime($data->act_date_end));
						$ExpireACT = $diffACT->days . " วัน";
						if($diffACT->invert){
							$ActClass="text-danger";
						}
					}
					if($data->date_registration_end!='0000-00-00'){
						$diffTAX = date_diff($now,new DateTime($data->date_registration_end));
						$ExpireTax = $diffTAX->days . " วัน";
						if($diffTAX->invert){
							$TaxClass="text-danger";
						}
					}
					if($data->close_alert_ins=='1'){
						$checkIns="checked";
					}
					if($data->close_alert_act=='1'){
						$checkAct="checked";
					}
					if($data->close_alert_tax=='1'){
						$checkTax="checked";
					}
					$iconRemark = ''; $classRemark= ' btn-default';
					if($data->CheckFollow > 0){
						$iconRemark = '<i class="fa fa-info text-danger"></i>';
						$classRemark = ' btn-danger';
					}
				?>
				<tr class="odd gradeX">
					<td style="text-align: center">
						<?php echo $n?>
					</td>
					<td><a href="<?php echo base_url('Insurance_car/work_insurance_add/'.$data->WorkID)?>" target="_blank"><?php echo $data->cust_name?></a></td>
					<td align="center"><?php echo $data->vehicle_regis." ".$data->province_name?></td>
					<td align="center">
						<?php //echo $data->cust_telephone_1; if($data->cust_telephone_2!=''){ echo " ,".$data->cust_telephone_2; }?>
						<?php echo $data->agent_name?>
					</td>
				  <td align="center"><?php echo $data->company_name?></td>
				  <td align="center"><?php echo $this->insurance_model->translateDateToThai($data->insurance_end)?> <br>
                  <span class="<?php echo $insClass?>"><?php echo $ExpireIns;?></span></td>
					<td align="center"><input type="checkbox" onClick="updateAlert('<?php echo $data->WorkID?>','close_alert_ins',this,'<?php echo $getData['insuranceType']?>')" <?php echo $checkIns?> ></td>
					<td align="center"><?php echo $data->ActcorpName?></td>
				  <td align="center"><?php echo $this->insurance_model->translateDateToThai($data->act_date_end)?> <br>
			      <span class="<?php echo $ActClass?>"><?php echo $ExpireACT;?></span></td>
					<td align="center"><input type="checkbox"  onClick="updateAlert('<?php echo $data->WorkID?>','close_alert_act',this,'<?php echo $getData['insuranceType']?>')" <?php echo $checkAct?> ></td>
				  <td align="center">
						<?php echo $this->insurance_model->translateDateToThai($data->date_registration_end)?>
						<br>
						<?php //echo $diffTAX->y . " ปี, " . $diffTAX->m . " เดือน, " . $diffTAX->d . " วัน";?>
						<span class="<?php echo $TaxClass?>"><?php echo $ExpireTax?></span>
				  </td>
					<td align="center"><input type="checkbox"   onClick="updateAlert('<?php echo $data->WorkID?>','close_alert_tax',this,'<?php echo $getData['insuranceType']?>')"  <?php echo $checkTax?>></td>
					<td style="text-align: justify; width: 200px;"><?php echo $data->insurance_remark?></td>
				  <td style="text-align: center">
						<button id="btnRemark<?php echo $data->WorkID?>" class="btn btn-xs  <?php echo $classRemark?>" onClick="ShowRemark('<?php echo $data->WorkID?>', '<?php echo htmlspecialchars($data->cust_name)?>','','<?php echo $data->insurance_data_type?>')"> + หมายเหตุ</button><br>
						<span style="font-size: 14px; color:#AF0002" id="Remark<?php echo $data->WorkID?>"><?php //echo $iconRemark?></span>
				  </td>
					<td align="center">
						<a href="<?php echo base_url('Insurance_car/work_insurance_add/'.$data->WorkID.'/renew/').$data->WorkID; ?>" target="_blank">
							<button class="btn btn-success btn-sm">ต่ออายุ</button>
						</a>
					</td>
				</tr> 
	<?php $n++; }?>
			</tbody>
 </table>
<?php }else{ ?>
<table class="table table-striped table-bordered table-hover table-checkable order-column full-width" id="example4">
			<tbody>
				<tr bgcolor="#dcdcdc">
					<th rowspan="2" style="text-align: center">ลำดับ</th>
					<th rowspan="2" style="text-align: center">ชื่อ-นามสกุล</th>
					<th rowspan="2" style="text-align: center">ประเภท</th>
					<th rowspan="2" style="text-align: center"><!--โทรศัพท์--> ตัวแทน</th>
					<th rowspan="2" style="text-align: center">บริษัท</th>																						
					<th colspan="2" style="text-align: center">ประกันภัย</th>
					<th rowspan="2" style="text-align: center">หมายเหตุ</th>
					<th rowspan="2" style="text-align: center">เพิ่มหมายเหตุ</th>
					<th rowspan="2" style="text-align: center"> ต่ออายุ</th>
				</tr>
				<tr bgcolor="#dcdcdc">
					<th style="text-align: center">วันหมดอายุ</th>
					<th style="text-align: center">ปิดแจ้งเตือน</th>
				</tr>
    <?php $n=1;  
			foreach($getData['Data'] AS $data){
					$ExpireIns = '';$ExpireTax = ''; $ExpireACT = '';
				    $insClass=""; $TaxClass='';$ActClass= '';
				    $checkIns =''; $checkAct =''; $checkTax ='';
					if($data->insurance_end!='0000-00-00'){
			        	$diffINS = date_diff($now, new DateTime($data->insurance_end));
						if($diffINS->invert){
							$insClass="text-danger";
						}
						$ExpireIns = $diffINS->days . " วัน";
					}
					if($data->act_date_end!='0000-00-00'){
						$diffACT = date_diff($now,new DateTime($data->act_date_end));
						$ExpireACT = $diffACT->days . " วัน";
						if($diffACT->invert){
							$ActClass="text-danger";
						}
					}
					if($data->date_registration_end!='0000-00-00'){
						$diffTAX = date_diff($now,new DateTime($data->date_registration_end));
						$ExpireTax = $diffTAX->days . " วัน";
						if($diffTAX->invert){
							$TaxClass="text-danger";
						}
					}
					if($data->close_alert_ins=='1'){
						$checkIns="checked";
					}
					if($data->close_alert_act=='1'){
						$checkAct="checked";
					}
					if($data->close_alert_tax=='1'){
						$checkTax="checked";
					}
					$iconRemark = ''; $classRemark= ' btn-default';
					if($data->CheckFollow >0){
						$iconRemark = '<i class="fa fa-info text-danger"></i>';
						$classRemark = ' btn-danger';
					}
					$getOtherID = $this->insurance_other_model->getOtherID($getData['insuranceType'],$data->WorkID);
				    $link = "Insurance_other/work_insurance_other_add/".$getData['insuranceType']."/".$data->WorkID."/".$getOtherID['insuranceOtherID'];
				?>
				<tr class="odd gradeX">
					<td style="text-align: center">
						<?php echo $n?>
					</td>
					<td><a href="<?php echo base_url($link)?>" target="_blank"><?php echo $data->cust_name?></a></td>
					<td align="center"><?php echo $data->insurance_type_name?></td>
					<td align="center"><?php //echo $data->cust_telephone_1; if($data->cust_telephone_2!=''){ echo " ,".$data->cust_telephone_2; }?>
				  <?php echo $data->agent_name?>
				</td>
				  <td align="center"><?php echo $data->company_name?></td>
					<td align="center"><?php echo $this->insurance_model->translateDateToThai($data->insurance_end)?>
					<br>
					  <span class="<?php echo $insClass?>"><?php echo $ExpireIns;?></span>
					</td>
					<td align="center"><input type="checkbox" onClick="updateAlert('<?php echo $data->WorkID?>','close_alert_ins',this,'<?php echo $getData['insuranceType']?>')" <?php echo $checkIns?> ></td>
					<td style="text-align: justify; width: 200px;"><?php echo $data->insurance_remark?></td>
					<td style="text-align: center">
						<button id="btnRemark<?php echo $data->WorkID?>" class="btn btn-xs  <?php echo $classRemark?>" onClick="ShowRemark('<?php echo $data->WorkID?>', '<?php echo htmlspecialchars($data->cust_name)?>','','<?php echo $data->insurance_data_type?>')"> + หมายเหตุ</button><br>
						<span style="font-size: 14px; color:#AF0002" id="Remark<?php echo $data->WorkID?>"><?php //echo $iconRemark?></span>
					</td>
					<td align="center">
						<a href="<?php echo base_url('Insurance_other/work_insurance_other_add/'.$getData['insuranceType']."/".$data->WorkID."/".$getOtherID['insuranceOtherID']."/renew"); ?>" target="_blank">
							<button class="btn btn-success btn-sm">ต่ออายุ</button>
						</a>
					</td>
				</tr> 
	<?php $n++; }?>
			</tbody>
 </table>
<?php }?> 
