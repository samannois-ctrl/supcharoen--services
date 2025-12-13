<div style="width: 99%" align="center" id="reserve_form_wrapper">
<table class="table">
                        <tdead>
                            <tr>
                                <td class="txt-center" colspan="6">
                                   <strong> ใบแจ้งงาน  ตรอ. ทรัพย์เจริญเซอร์วิส</strong>
                                </td>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="txt-center" colspan="6">
                                   <span id="job_notification_date"> วันที่แจ้งงาน <?php if(isset($allData->date_send_document)){ echo $this->insurance_model->translateDateToThai($allData->date_send_document);}?> </span>                                                                     
                                </td>
                          </tr>

                            <tr>
                                <td class="txt-center" colspan="6">
                                    <strong>ชื่อลูกค้า/ตัวแทน</strong> <?php if(isset($allData->cust_name)){  echo $allData->cust_name; }?>&nbsp;&nbsp;&nbsp;&nbsp;    
                                   <strong> โทรศัพท์</strong> <?php if(isset($allData->custTelephone)){  echo $allData->custTelephone; }?></td>
                          </tr>

                            <tr>
                                <td class="txt-center" colspan="6"><strong>ยี่ห้อ</strong> <?php if(isset($allData->car_brand)){  echo $allData->car_brand; }?> <strong>&nbsp;&nbsp;รุ่นรถ </strong><?php if(isset($allData->car_model)){  echo $allData->car_model; }?> <strong>&nbsp;&nbsp;ทะเบียนรถ</strong> <?php if(isset($allData->vehicle_regis)){  echo $allData->vehicle_regis; }?> <?php if(isset($allData->province_name)){  echo $allData->province_name; }?></td>
                          </tr>

                            <tr class="txt-center">
                                <td width=30% align="center"><strong>รายการ</strong></td>
                              <td colspan="3" align="center"><strong>บริษัท</strong></td>
                              <td width=20% align="center"><strong>วันคุ้มครอง</strong></td>
                              <td width=20% align="center"><strong>วันสิ้นสุด</strong></td>
                          </tr>

                            <tr>
                                <td><strong>กรมธรรรม์ประเภท</strong>&emsp;&emsp;&emsp;
                                    <div style="display: inline-block;">

                                        <div class="radio p-0">

                                            <input type="checkbox" name="" id="" <?php
												if(isset($allData->insurance_fix_garace)){
													if($allData->insurance_fix_garace==1){ echo "checked"; }
												}   
												   
												   
												   ?> >

                                            <label for="optionsRadios1">ซ่อมห้าง&emsp;&emsp;</label>

                                        </div>

                                    </div>

                                    <div style="display: inline-block;">

                                        <div class="radio p-0">

                                            <input type="checkbox" disabled name="" id="" value="" <?php if(isset($allData->insurance_fix_garace)){ if($allData->insurance_fix_garace==2){ echo "checked";} }?>>

                                            <label for="optionsRadios1">ซ่อมอู่</label>

                                        </div>

                                    </div>
                                </td>
                                <td colspan="3" align="center" class="txt-center"><?php if(isset($allData->insCompany_name)){ echo $allData->insCompany_name;}?></td>
                                <td align="center" class="txt-center"><?php if(isset($allData->insurance_start)){ echo $this->insurance_model->translateDateToThai($allData->insurance_start);}?></td>
                                <td align="center" class="txt-center"><?php if(isset($allData->insurance_end)){ echo $this->insurance_model->translateDateToThai($allData->insurance_end);}?></td>
                          </tr>  

                            <tr>
                                <td><strong>พ.ร.บ.</strong></td>
                              <td colspan="3" align="center" class="txt-center"><?php if(isset($allData->actCompany_name)){ echo $allData->actCompany_name;}?></td>
                                <td align="center" class="txt-center"><?php if(isset($allData->act_date_start)){ echo $this->insurance_model->translateDateToThai($allData->act_date_start);}?></td>
                                <td align="center" class="txt-center"><?php if(isset($allData->act_date_end)){ echo $this->insurance_model->translateDateToThai($allData->act_date_end);}?></td>
                          </tr>
                            <tr>
                                <td><strong>ทุนประกัน</strong></td>
                                <td class="txt-center" colspan="3"><?php if(isset($allData->sum_insured)){ echo number_format($allData->sum_insured,2); } ?> บาท </td>
                                <td></td>
                                <td></td>
                          </tr>

                            <tr>
                                <td>
                               วันจดทะเบียน: <?php if(isset($allData->date_regist)){ echo $allData->date_regist; } ?>&emsp;</td>
                                <td colspan="3">วันที่เสียภาษี: <?php if(isset($allData->date_registration_start)){ echo $this->insurance_model->translateDateToThai($allData->date_registration_start);}?>&emsp;</td>
                                <td colspan="2">วันสิ้นอายุภาษี: <?php if(isset($allData->date_registration_end)){ echo $this->insurance_model->translateDateToThai($allData->date_registration_end);}?></td>
                          </tr>

                            <tr>
                                <td height="30" align="center" class="txt-center"><strong>ค่าบริการ</strong></td>
                                <td height="30" align="center" class="txt-center"><strong>ราคา</strong></td>
                              <td height="30" align="center" class="txt-center"><strong>ส่วนลด</strong></td>
                              <td height="30" align="center" class="txt-center"><strong>สุทธิ</strong></td>
                              <td colspan="2"><strong>การจัดส่งเอกสาร</strong></td>
                          </tr>

                            <tr>
                                <td height="25">- ทะเบียน</td>
                                <td height="25" align="right"><?php if(isset($allData->tax_price)){ echo number_format($allData->tax_price,2);  $totalPrice = $totalPrice+$allData->tax_price; }?></td>
                                <td height="25" align="right"></td>
                                <td height="25" align="right"><?php if(isset($allData->tax_price)){ echo number_format($allData->tax_price,2); $totalNet=$totalNet+$allData->tax_price;}?></td>
                           	  <td colspan="2" rowspan="3">
									
									<div class="col-sm-12" style="margin-top: 8px;">
										<div class="radio p-0">
										  &emsp;
										  <input type="checkbox" name="" id="" value="" <?php if(isset($allData->delivery_of_documents)){  if($allData->delivery_of_documents=='1'){ echo "checked";} }?> >

										  <label for="optionsRadios1">&nbsp;โทรแจ้งลูกค้ารับหน้าร้าน</label>

										</div>

							    </div>

									  <div class="col-sm-12" style="margin-top: 8px;">

										<div class="radio p-0">
										  &emsp;
										  <input type="checkbox" name="" id="" value=""  <?php if(isset($allData->delivery_of_documents)){  if($allData->delivery_of_documents=='2'){ echo "checked";} }?> >

										  <label for="optionsRadios1">&nbsp;จัดส่งไปรษณีย์แบบ ลงทะเบียน</label>

										</div>

									  </div>

									  <div class="col-sm-12" style="margin-top: 8px;">

										<div class="radio p-0">
										  &emsp;
										  <input type="checkbox" name="" id="" value=""  <?php if(isset($allData->delivery_of_documents)){  if($allData->delivery_of_documents=='3'){ echo "checked";} }?> >
 
										  <label for="optionsRadios1">&nbsp;จัดส่งไปรษณีย์แบบ EMS</label>

										</div>

									  </div>

                              </td>
                       	  </tr>


                            <tr>
                                <td height="25">- พ.ร.บ.</td>
                              <td height="25" align="right" class="txt-right"><?php if(isset($allData->act_price)){ echo number_format($allData->act_price,2); $totalPrice = $totalPrice+$allData->act_price;}?></td>
                                <td height="25" align="right" class="txt-right"><?php if(isset($allData->act_discount)){ echo number_format($allData->act_discount,2); $totalDiscount=$totalDiscount+$allData->act_discount;}?></td>
                              <td height="25" align="right" class="txt-right"><?php if(isset($allData->act_price_total)){ echo number_format($allData->act_price_total,2);  $totalNet=$totalNet+$allData->act_price_total;}?></td>
                          </tr>

                            <tr>
                                <td height="25">- ประกันภัย</td>
                                <td height="25" align="right"><?php if(isset($allData->insurance_price)){ echo number_format($allData->insurance_price,2); $totalPrice = $totalPrice+$allData->insurance_price;}?></td>
                                <td height="25" align="right"><?php if(isset($allData->insurance_discount)){ echo number_format($allData->insurance_discount,2); $totalDiscount=$totalDiscount+$allData->insurance_discount;}?></td>
                                <td height="25" align="right"><?php if(isset($allData->insurance_total)){ echo number_format($allData->insurance_total,2); $totalNet=$totalNet+$allData->insurance_total;}?></td>
                          </tr>

                            <tr>
                                <td height="25">- ตรอ.</td>
                                <td height="25" align="right"><?php if(isset($allData->car_check_price)){ echo number_format($allData->car_check_price,2); $totalPrice = $totalPrice+$allData->car_check_price;}?></td>
                                <td height="25" align="right"><?php if(isset($allData->car_check_discount)){ echo number_format($allData->car_check_discount,2); $totalDiscount=$totalDiscount+$allData->car_check_discount;}?></td>
                                <td height="25" align="right"><?php if(isset($allData->car_check_total)){ echo number_format($allData->car_check_total,2);  $totalNet=$totalNet+$allData->car_check_total;}?></td>
                              <td colspan="2"><strong>ที่อยู่</strong></td>
                          </tr>

                            <tr>
                                <td height="25">- ค่าบริการ</td>
                                <td height="25" align="right"><?php if(isset($allData->car_check_price_service)){ echo number_format($allData->car_check_price_service,2); $totalPrice = $totalPrice+$allData->car_check_price_service;}?></td>
                              <td height="25" align="right"></td>
                                <td height="25" align="right"><?php if(isset($allData->car_check_price_service)){ echo number_format($allData->car_check_price_service,2);   $totalNet=$totalNet+$allData->car_check_price_service;}?></td>
                                <td colspan="2" rowspan="3">				  								  
                               
								<div class="col-sm-12" style="margin-top: 8px;">
									<div class="radio p-0">
									  &emsp;
									  <input type="checkbox" name="" id="" value="" <?php if(isset($allData->use_address)){  if($allData->use_address=='1'){ echo "checked";} }?>>

									  <label for="optionsRadios1">&nbsp;ตามกรมธรรม์</label>

									</div>

								  </div>

								  <div class="col-sm-12" style="margin-top: 8px;">

									<div class="radio p-0">
									  &emsp;
									  <input type="checkbox" name="" id="" value="" <?php if(isset($allData->use_address)){  if($allData->use_address=='2'){ echo "checked";} }?>>

									  <label for="optionsRadios1">&nbsp;ตามรายการจดทะเบียน</label>

									</div>

								  </div>

								  <div class="col-sm-12" style="margin-top: 8px;">

									<div class="radio p-0">
									  &emsp;
									  <input type="checkbox" name="" id="" value="" <?php if(isset($allData->use_address)){  if($allData->use_address=='3'){ echo "checked";} }?>>

									  <label for="optionsRadios1">&nbsp;ตามบัตรประชาชน</label>

									</div>

								  </div>

								  <div class="col-sm-12" style="margin-top: 8px;">

									<div class="radio p-0">
									  &emsp;
									  <input type="checkbox" name="" id="" value="" <?php if(isset($allData->use_address)){  if($allData->use_address=='4'){ echo "checked";} }?>>

									  <label for="optionsRadios1">&nbsp;โทรถามที่อยู่ลูกค้า</label>

									</div>

								  </div> 
								
								</td>
                       	  </tr>

                            <tr>
                                <td height="25">- งานอื่นๆ</td>
                                <td height="25" align="right"><?php if(isset($allData->service_other_price)){ echo number_format($allData->service_other_price,2); $totalPrice = $totalPrice+$allData->service_other_price;}?></td>
                                
                              <td height="25" align="right"></td>
                                <td height="25" align="right"><?php if(isset($allData->service_other_price)){ echo number_format($allData->service_other_price,2);  $totalNet=$totalNet+$allData->service_other_price; }?></td>
                          </tr>


                            <tr class="txt-right">
                                <td height="25" align="right"><strong>รวม</strong></td>
                              <td height="25" align="right"><strong><?php echo number_format($totalPrice,2)?></strong></td>
                                <td height="25" align="right"><strong><?php echo number_format($totalDiscount,2)?></strong></td>
                              <td height="25" align="right"><strong><?php echo number_format($totalNet,2)?></strong></td>
                          </tr>


                            <tr>
                                <td colspan="6">
                                    <strong>การชำระเงิน</strong>&emsp;&emsp;&emsp;
                                    <div style="display: inline-block;">

                                        <div class="radio p-0">
                                            <input type="checkbox" name="" id="" value="">
                                            <label for="optionsRadios1">เงินสด&emsp;&emsp;</label>
                                        </div>

                                    </div>

                                    <div style="display: inline-block;">
                                        <div class="radio p-0">
                                            <input type="checkbox" name="" id="" value="">
                                            <label for="optionsRadios1">เงินผ่อน</label>
											
                                        </div>
										
                                    </div>
									<div style="display: inline-block; padding-left: 10px;">
										จำนวน xx งวด
									</div>
                                   
                                </td>
                          </tr>

                            <tr>
                                <td rowspan="3">
                                    <strong>การชำระเงิน:</strong> เงินสด*** <br><br>
                                <strong>จำนวนเงิน</strong> 1,958.21 บาท **</td>
                              <td colspan="3" rowspan="3" valign="top">
                                    <strong>การยกเลิก พ.ร.บ.</strong>
                                    <br>
                                    วันที่ยกเลิก:  <?php if(isset($allData->act_cancel_date)){ echo $this->insurance_model->translateDateToThai($allData->act_cancel_date);}?>
                                    <br>เลขที่ยกเลิก:  <?php if(isset($allData->act_cancel_no)){ echo $allData->act_cancel_no;}?>
                                    <br>เหตุผลที่ยกเลิก: <?php if(isset($allData->act_cancel_reason)){ echo $allData->act_cancel_reason;}?>
                                    <br>
                                    <br>
                                    <strong>การชำระเงิน พ.ร.บ.</strong>
                                    **<br>ชำระแล้ว ชำระเงินวันที่ 05/01/25xx
                                </td>
                                <td colspan="2" rowspan="3" valign="top">
                                    <strong>การยกเลิกกรมธรรม์</strong>
                                    <br>วันที่ยกเลิก: <?php if(isset($allData->ins_cancel_date)){ echo $this->insurance_model->translateDateToThai($allData->ins_cancel_date);}?>
                                    <br>เลขที่ยกเลิก: <?php if(isset($allData->ins_cancel_no)){ echo $allData->ins_cancel_no;}?>
                                    <br>เหตุผลที่ยกเลิก: <?php if(isset($allData->ins_cancel_reason)){ echo $allData->ins_cancel_reason;}?>
                                    <br>
                                    <br>
                                    <strong>การชำระเงิน บริษัทประกันภัย</strong>
                                    <br>
                                    ค้างชำระ ครบกำหนดชำระวันที่
                                **</td>
                            </tr>


                        </tbody>
                    </table>
</div>