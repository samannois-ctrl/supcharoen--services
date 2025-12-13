<?php 
//print_r($getData['sql']);
//echo "<hr>";
//print_r($getData['resultData']);
		

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
<table class="table table-bordered  table-checkable order-column full-width" id="example4">
                                        <thead>
                                            <tr>
                                               	<th style="text-align: center">ลำดับ</th>
												<th style="text-align: center">วันที่</th>
												<th style="text-align: center">เลขที่กรมธรรม์</th>
												<th style="text-align: center">ชื่อ - นามสกุล</th>
												<th style="text-align: center">ทะเบียน</th>
												<th style="text-align: center">พ.ร.บ.</th>
												<th style="text-align: center">ภาษี</th>
												<th style="text-align: center">ประกันภัย</th>
												<th style="text-align: center">จ่ายเงิน</th>
											
												<th style="text-align: center">หมายเหตุ</th>
												<th style="text-align: center">รายละเอียด</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php $n=1; $txtPayType=''; foreach($getData['resultData'] AS $list){ 
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
												<td style="text-align: center"><?php echo $this->insurance_model->translateDateToThai($list->date_work)?></td>
												<td><?php echo $list->insurance_no;?><!--4กฆ-1036 กทม.--></td>
												<td><?php echo $list->cust_name?></td>
												<td><?php echo $list->vehicle_regis."<br>".$list->province_name?></td>
												<td align="center">
												 <?php if($list->act_price_total > 0){ ?>
													<i class="fa  fa-check-square-o 2x text-success"></i>
													<br>
													<small class="text-danger">หมดอายุ : <?php echo $this->insurance_model->translateDateToThai($list->act_date_end)?></small>
												 <?php  }?>
												 
												</td>
												<td align="center"><?php if($list->tax_price > 0){ ?>
													<i class="fa  fa-check-square-o 2x text-success"></i>
													<br>
													<small class="text-danger">หมดอายุ : <?php echo $this->insurance_model->translateDateToThai($list->date_registration_end)?></small>	
												<?php  }?></td>
												<td align="center"><?php if($list->insurance_total > 0){ ?>
													<i class="fa  fa-check-square-o 2x text-success"></i>
													<br>
													<small class="text-danger">หมดอายุ : <?php echo $this->insurance_model->translateDateToThai($list->insurance_end)?></small>
													<?php  }?></td>
												<td align="center">
													<?php if($list->countInstallment > 0){ echo "ผ่อน/".$list->countInstallment; }else{ echo "สด"; }?>
												</td>
																			
												<td style="text-align: center">
													<span id="insurance_remark<?php echo $list->id?>"><?php echo $list->insurance_remark?></span>
													<br>
													<!--<button class="btn btn-xs btn-default"> + หมายเหตุ</button>-->
												  
												</td>
												<td style="text-align: center">
													<a  class="btn btn-sm btn-info" href="<?php echo base_url('Insurance_car/work_insurance_add/').$list->id;?>" target="_blank">
														 รายละเอียด 
													</a>
													<!--<button type="button" class="btn btn-sm btn-warning" onClick="renewThis('<?php /*echo $list->id?>','<?php echo htmlspecialchars($list->cust_name)*/?>')">ต่ออายุ</button>-->
															
												</td>
											</tr>
										<?php $n++; }?>
										</tbody>
                                    </table>
<!--<table class="table table-striped table-bordered table-hover table-checkable order-column full-width" id="example4">
  <thead>
    <tr>
      <th style="text-align: center">ลำดับ</th>
      <th style="text-align: center">วันที่</th>
      <th style="text-align: center">ทะเบียนรถ</th>
      <th style="text-align: center">ชื่อ - นามสกุล</th>
      <th style="text-align: center">ชื่อเล่น</th>
      <th style="text-align: center">การชำระเงิน</th>
      <th style="text-align: center">ยอดที่ต้องชำระ</th>
      <th style="text-align: center">คงค้าง</th>
      <th style="text-align: center">หมายเหตุ</th>
      <th style="text-align: center">ตัวแทน</th>
      <th style="text-align: center">รายละเอียด</th>
    </tr>
  </thead>
  <tbody>
  <?php //$n=1; foreach($getData['resultData'] AS $data){?>  
    <tr class="odd gradeX">
      <td style="text-align: center"><?php echo $n?></td>
      <td style="text-align: center">01/10/65</td>
      <td>4กฆ-1036 กทม.</td>
      <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
      <td>น้องใหม่ พยาบาล</td>
      <td style="text-align: center;"><span class="label label-danger label-mini">ตามเงิน</span><br>
        <span style="padding-top: 15px; font-size:12px; color: #FF0004">กำหนดชำระ : 28/09/2565</span></td>
      <td style="text-align: right">12,516.88</td>
      <td style="text-align: right">12,516.88</td>
      <td style="font-size: 12px;">ตามเงินตั้งแต่วันที่ 25 ก.ย. 65</td>
      <td>กรอร</td>
      <td style="text-align: center"><a href="<?php echo base_url('Insurance_car/work_car_payment_print'); ?>" target="_blank">
        <button class="btn btn-info btn-sm m-b-10">รายการชำระเงิน</button>
        </a> <a href="<?php echo base_url('Insurance_car/work_car_all'); ?>">
          <button class="btn btn-success btn-sm m-b-10">รายละเอียด</button>
          </a> <a href="<?php echo base_url('Insurance_car/work_car_all'); ?>">
            <button class="btn btn-warning btn-sm m-b-10">ต่ออายุ</button>
          </a></td>
    </tr>
  <?php //$n++; }?>	  
  </tbody>
</table>-->
