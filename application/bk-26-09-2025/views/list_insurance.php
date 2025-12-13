<?php //echo print_r($data['sql'])."<br>";
		//echo 'maxPeriod>>'.$data['maxPeriod']."<br>";;
		// print_r($data['payment']);
// print_r($data['resultData']);
//--check permisssion--------
$permission = $this->insurance_model->getPermisssion('insurance_dashboard',$this->session->userdata('user_id'));


/*$mysqlTimestamp = '2024-03-18 10:30:00';

// Create a DateTime object from the MySQL timestamp
$date = new DateTime($mysqlTimestamp, new DateTimeZone('UTC')); // Assuming your MySQL timestamp is in UTC

// Convert the timezone to Thai
$date->setTimezone(new DateTimeZone('Asia/Bangkok'));

// Format the date in Thai format
$thaiDate = $date->format('d F Y, H:i:s');

echo "Thai Date: $thaiDate";
//echo 'psermission>>>>>>>'.$permission['psermission']; */
?>
<style>
	.notRecieveWarning{
		background-color:#FDD4FF;
		color: black;
	}
	.RecieveWarning{
		background-color:#FFFDD8;color: black;
	}
	.RecieveInsurance{
		background-color:#E0FFC0;color: black;
	}
	
</style>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
						aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title text-danger" id="exampleModalLongTitle">กรุณาระบุเหตุผลในการลบ</h4>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<textarea id="remark_delete" name="remark_delete" class="form-control" rows="5"></textarea>
								</div>
								<div class="modal-footer">
									<input type="hidden" id="dataDelete" name="dataDelete">
									<button type="button" id="btnDelete" class="btn btn-success">ตกลง</button>
									<button type="button" class="btn btn-secondary"
										data-bs-dismiss="modal">ปิด</button>
								</div>
							</div>
						</div>
					</div>

<table class="table table-bordered   full-width" id="ListIns">
                                        <thead>
                                            <tr>
                                               	<th style="text-align: center">ลำดับ</th>
												<th style="text-align: center">วันที่แจ้งงาน</th>
												<th style="text-align: center">วันคุ้มครอง</th>
												<th style="text-align: center">ชื่อ - นามสกุล</th>
												<th style="text-align: center">ทะเบียน</th>
												<th style="text-align: center">ประกันภัย</th>
												<th style="text-align: center">พ.ร.บ.</th>
												<th style="text-align: center">ภาษี</th>
												<th style="text-align: center">ตรวจสภาพ</th>
												
												<th style="text-align: center">จ่ายเงิน</th>
												<th style="text-align: center">กำหนดชำระ</th>
												<?php for($i=1;$i<=$data['maxPeriod'];$i++){?>
												<?php }?>
												
												<th style="text-align: center">หมายเหตุ</th>
												<th style="text-align: center">รายละเอียด</th>
												<?php if($permission['psermission']==2){?>
												<th style="text-align: center">ลบ</th>
												<?php }?>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php $n=1; $txtPayType=''; foreach($data['resultData'] AS $list){ 
													if($list->is_installment=='1'){
														$txtPayType = "ผ่อน";
													}else if($list->is_installment=='0'){
														$txtPayType = "สด";
													}
												$trClass = '';
												if($list->recieve_warning=='0'){
													$trClass = "notRecieveWarning";
												}
												if($list->recieve_warning=='1'){
													$trClass = "RecieveWarning";
												}
												if($list->recieve_warning_yes=='1'){
													$trClass = "RecieveInsurance";
												}
	 
											?>	
											<tr class="odd gradeX <?php echo $trClass?>">
												<td style="text-align: center"><?php echo $n?></td>
												<td style="text-align: left">
													<?php 	echo $this->insurance_model->translateDateToThai($list->insurance_date_contract);?>
												</td>
												<td><?php //echo $list->insurance_no;?>
													<?php 	
														if($list->insurance_start!='0000-00-00'){ 
																echo $this->insurance_model->translateDateToThai($list->insurance_start);
														}else if(($list->insurance_start=='0000-00-00')&&($list->act_date_start!='0000-00-00')){
												
														echo $this->insurance_model->translateDateToThai($list->act_date_start);
											}?>
												</td>
												<td><?php echo $list->cust_name?></td>
												<td><?php echo $list->vehicle_regis."<br>".$list->province_name?></td>
												<td align="center"><?php if($list->insurance_total > 0){ ?><i class="fa  fa-check-square-o 2x text-success"></i><?php  }?></td>
											  <td align="center">
												<?php if($list->act_price_total > 0){ ?><i class="fa  fa-check-square-o 2x text-success"></i><?php  }?>
												</td>
												<td align="center"><?php if($list->tax_price > 0){ ?><i class="fa  fa-check-square-o 2x text-success"></i><?php  }?></td>
												<td align="center"><?php if($list->car_check_price > 0){ ?><i class="fa  fa-check-square-o 2x text-success"></i><?php  }?></td>
												
											  <td align="center">
													<?php if($list->countInstallment > 0){ echo "ผ่อน/".$list->countInstallment; }else{ 
															//echo "สด"; 
														  $getPaymentType = $this->insurance_model->getPaymentType('1',$list->id);
														  echo $getPaymentType['showPay'];
														}?>
												</td>
												<td align="center" class="text-danger">
												<?php if($list->countInstallment>0){
															$installmentLastDueDate = $this->insurance_model->findInstallmentDueDate('insurance',$list->id);
															echo $installmentLastDueDate;
												        }else{ 
														//--------find cash_duedate-----//
														   $cashDueDate =  $this->insurance_model->findCashDueDate('insurance',$list->id);
														   echo $cashDueDate;
														}?>
												</td>
												<?php /*for($i=1;$i<=$data['maxPeriod'];$i++){?>
												<?php }*/?>
																						
												<td style="text-align: center">
													<span id="insurance_remark<?php echo $list->id?>"><?php echo $list->insurance_remark?></span>
													<br>
													<!--<button class="btn btn-xs btn-default"> + หมายเหตุ</button>-->
												  
												</td>
												<td style="text-align: center">
													<a href="<?php echo base_url('Insurance_car/work_insurance_add/').$list->id;?>">
														<button class="btn btn-sm btn-info"> รายละเอียด </button>
													</a>
												</td>
												<?php if($permission['psermission']=='2'){?>
												<td style="text-align: center">
													<button type="button" class="btn btn-sm btn-danger" onClick="DeleteInsurance('<?php echo htmlspecialchars($list->cust_name)?>','<?php echo $list->id?>')">x</button>
												</td>
												<?php }?>
											</tr>
										<?php $n++; }?>
										</tbody>
                                    </table>
<script>
	$(document).ready(function(){
	  $('#ListIns').DataTable( {
          "paging": false,
	 	  "ordering": false,
	      "oLanguage": {
		   "sSearch": "ค้นหา"
		 }
    } );
 })	
</script>