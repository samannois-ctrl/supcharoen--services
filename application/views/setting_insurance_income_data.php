<link rel="stylesheet" href="assets/plugins/material/material.min.css">

<table class="table display product-overview mb-30" id="support_table5">

                                            <thead>

                                                <tr>

                                                    <th width=40%>ชนิดประกันภัย</th>

                                                    <th width=8%>คอม 1</th>

                                                    <th width=8%>ภาษี 1</th>

                                                    <th width=8%>คอม 2</th>

                                                    <th width=8%>ภาษี 3</th>

                                                    <th width=8%>คอม 3</th>

                                                    <th width=8%>ภาษี 3</th>

                                                    <th>แก้ไข</th>

                                                    <th>ลบ</th>


                                                </tr>

                                            </thead>

                                            <tbody>
<?php $n=1; foreach($listIncome AS $data){ ?>
                                                <tr id="Row<?php echo $data->id?>">

                                                    <td><?php echo $data->insurance_type_name?><span id="showNoti<?php echo $data->id?>" class="showNoti"></span></td>

                                                    <td>
                                                        <div class="col-12">
                                                            <input type="text" id="com_1<?php echo $data->id?>" name="com_1<?php echo $data->id?>" class="form-control" value="<?php echo $data->com_1?>"  onkeypress='validate(event)' onChange="UpdateIncome('<?php echo $data->id?>','com_1',this.value)">
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="col-12">
                                                            <input type="text" id="tax_1<?php echo $data->id?>" name="tax_1<?php echo $data->id?>" class="form-control"  value="<?php echo $data->tax_1?>"  onkeypress='validate(event)'  onChange="UpdateIncome('<?php echo $data->id?>','tax_1',this.value)">
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="col-12">
                                                            <input type="text" id="com_2<?php echo $data->id?>" name="com_2<?php echo $data->id?>" class="form-control"  value="<?php echo $data->com_2?>"  onkeypress='validate(event)'  onChange="UpdateIncome('<?php echo $data->id?>','com_2',this.value)" >
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="col-12">
                                                            <input type="text" id="tax_2<?php echo $data->id?>" name="tax_2<?php echo $data->id?>"  class="form-control"  value="<?php echo $data->tax_2?>"  onkeypress='validate(event)'  onChange="UpdateIncome('<?php echo $data->id?>','tax_2',this.value)">
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="col-12">
                                                            <input type="text" id="com_3<?php echo $data->id?>" name="com_3<?php echo $data->id?>" class="form-control"  value="<?php echo $data->com_3?>"  onkeypress='validate(event)'   onChange="UpdateIncome('<?php echo $data->id?>','com_3',this.value)">
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="col-12">
                                                            <input type="text" id="tax_3<?php echo $data->id?>" name="tax_3<?php echo $data->id?>"  class="form-control"  value="<?php echo $data->tax_3?>"  onkeypress='validate(event)'   onChange="UpdateIncome('<?php echo $data->id?>','tax_3',this.value)">
                                                        </div> 
                                                    </td>

                                                    <td>
                                                        <a href="javascript:void(0)" class="btn btn-tbl-edit btn-xs">

                                                            <i class="fa fa-pencil"></i>

                                                        </a>
                                                    </td>

                                                    <td>
                                                        <a href="javascript:void(0)" class="btn btn-tbl-edit btn-xs deepPink-bgcolor" onClick="deleteIncome('<?php echo $data->id?>','<?php echo htmlspecialchars($data->insurance_type_name)?>')">

                                                            <i class="fa fa-trash-o"></i>

                                                        </a>
                                                    </td>

                                                </tr>

<?php $n++; }?>
                                            </tbody>

                                        </table>