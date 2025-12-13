<div class="table-wrap">

                                    <div class="table-responsive tblHeightSet">

                                        <table class="table display product-overview mb-30" id="support_table5">

                                            <thead>

                                                <tr>

                                                    <th>#</th>

                                                    <th width="50%" colspan="2">ชื่อบริษัท</th>

                                                    <!--<th width="10%">@เรียงลำดับ</th>-->

                                                    <th>ประเภทประกันภัย</th>

                                                    <th>ที่อยู่/แก้ไข</th>

                                                    <th>สถานะ</th>

                                                   <!-- <th>แก้ไข</th>-->

                                                </tr>

                                            </thead>

                                            <tbody>
                                            <?php $n=1; foreach($resultData AS $data){ 
                                                            $txtCheck1 = ''; $txtCheck2 = '';$NameClass='';
                                                            if($data->company_status==1){
                                                                $txtCheck1 = "checked";
                                                            }
                                                            if($data->company_status==0){
                                                                $txtCheck2 = "checked";
                                                                $NameClass='text-danger';     
                                                            }
                                                    ?>
                                                <tr>

                                                    <td><?php echo $n?></td>

                                                    <td><span id="com_name<?php echo $data->id?>" class="<?php echo $NameClass?>"><?php echo $data->company_name?></span></td>
                                                    <td>
													 <select id="use_branch" name="use_branch" class="form-select" aria-label="Default select example" onChange="updateCorpBranch('<?php echo $data->id?>','<?php echo htmlspecialchars($data->company_name)?>',this)">
														<option value="x">--เลือกสาขา--</option>
														 <option value="1" <?php if($data->use_branch=='1'){ echo "selected"; }?> >ประกันภัย</option>
														<option value="2" <?php if($data->use_branch=='2'){ echo "selected"; }?>>ต.ร.อ.</option>
													</select>
														
													
													</td>

                                                   <!-- <td>
                                                        <div class="col-8">
                                                            @
                                                            <input type="text" id="Company<?php echo $data->id?>" value="<?php echo $data->company_order?>" class="form-control" onchange="UpdateOrder('<?php echo $data->id?>',this.value)" >
                                                        </div>
                                                    </td>-->

                                                    <td>
                                                        <a href="<?php echo base_url('Setting/setting_insurance_income_detail/'.$data->id);?>">
                                                            <button type="button" class="btn btn-round btn-warning btn-sm">ดูประเภทประกันภัย</button>
                                                        </a>
                                                    </td>

                                                    <td>
                                                       <!-- <button type="button" class="btn btn-round btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">เพิ่มที่อยู่/แก้ไขข้อมูล</button>-->

                                                        <button type="button" class="btn btn-round btn-primary btn-sm" onclick="openEditForm('<?php echo $data->id?>','<?php echo htmlspecialchars($data->company_name)?>')">เพิ่มที่อยู่/แก้ไขข้อมูล</button>
                                                    </td> 
                                                    <td>
                                                     <input type="radio" name="status<?php echo $data->id?>" value="1" <?php echo $txtCheck1?> onclick="ChangeStatus('<?php echo $data->id?>',this.value)" > ใช้งาน <br>
                                                     <input type="radio" name="status<?php echo $data->id?>" value="0" <?php echo $txtCheck2?>  onclick="ChangeStatus('<?php echo $data->id?>',this.value)"> ไม่ใช้งาน
                                                     </td>

                                                    <!--<td>

                                                        <a href="<?php echo base_url('setting/edit_company_insurance/'.$data->id)?>" class="btn btn-tbl-edit btn-xs">

                                                            <i class="fa fa-pencil"></i>

                                                        </a>


                                                    </td>-->

                                                </tr>
                                            <?php $n++; } ?>
                                          

                                            </tbody>

                                        </table>

                                    </div>

                                </div>