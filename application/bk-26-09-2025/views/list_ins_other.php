<?php //echo $data['sql']."<br>";
//echo 'selectType>>'.$SelectType;
	$permission = $this->insurance_model->getPermisssion('insurance_dashboard',$this->session->userdata('user_id'));	?>
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
<table class="table table-bordered full-width" id="accident">
                                        <thead>
                                            <tr>
                                               	<th style="text-align: center">ลำดับ</th>
												<th style="text-align: center">วันที่คุ้มครอง</th>
												<th style="text-align: center">เลขที่กรมธรรม์</th>
												<th style="text-align: center">ชื่อ - นามสกุล</th>
												<th style="text-align: center">จ่ายเงิน</th>
												<th style="text-align: center">กำหนดชำระ</th>
												<?php //for($i=1;$i<=$data['maxPeriod'];$i++){?>
												<?php //}?>
												
												<th width="150" style="text-align: center">หมายเหตุ</th>
												<th style="text-align: center">รายละเอียด</th>
												<?php if($permission['psermission']==2){?><th style="text-align: center">ลบ</th><?php }?>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php $n=1; $txtPayType=''; foreach($data['resultData'] AS $list){ 
													
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
												<td style="text-align: center"><?php echo $this->insurance_model->translateDateToThai($list->insurance_start)?></td>
												<td><?php echo $list->policy_number;?><!--4กฆ-1036 กทม.--></td>
												<td><?php echo $list->cust_name?></td>
												<td align="center">
													<?php
												     $getInstammentDate = 0;
													if($list->countInstallment > 1){ 
															echo "ผ่อน/".$list->countInstallment; 
															 $getInstammentDate = 1;
														  }else{ 
																//echo "สด";
														
															 $getPaymentType = $this->insurance_model->getPaymentType($SelectType,$list->work_id,$list->id);
															echo $getPaymentType['showPay'];	
														  }?>
												</td>
												<td align="center" class="text-danger">
													
													<?php //echo $list->cash_duedate;
									if( $getInstammentDate==0){
										if($list->pay_cash_status!=''){ echo $this->insurance_model->translateDateToThai($list->cash_duedate); }
									}else{
										$getDuedate = $this->insurance_model->getInstallmentDuedate($list->work_id);
										echo $getDuedate['getDueDate'];
									}
									 ?>
													
													
												</td>
												<?php //for($i=1;$i<=$data['maxPeriod'];$i++){?>
												<?php //}?>
																						
												<td style="text-align: center">
													<span id="insurance_remark<?php echo $list->id?>"><?php echo $list->insurance_remark?></span>
													<br>
													<!--<button class="btn btn-xs btn-default"> + หมายเหตุ</button>-->
												  
												</td>
												<td style="text-align: center">
													<a href="<?php echo base_url('Insurance_other/work_insurance_other_add/').$SelectType."/".$list->work_id."/".$list->id;?>">
														<button class="btn btn-sm btn-info"> รายละเอียด </button>
													</a>
												</td>
												<?php if($permission['psermission']==2){?>
												<td style="text-align: center">
												<button type="button" class="btn btn-sm btn-danger" onClick="DeleteInsuranceOther('<?php echo htmlspecialchars($list->cust_name)?>','<?php echo $list->id?>','pa')">x</button>
												</td>
												<?php }?>
											</tr>
										<?php $n++; }?>
										</tbody>
                                    </table>
<script>
	$(document).ready(function(){
	  $('#accident').DataTable( {
          "paging": false,
	 	  "ordering": false,
	      "oLanguage": {
		   "sSearch": "ค้นหา"
		 }
    } );
 })	
</script>