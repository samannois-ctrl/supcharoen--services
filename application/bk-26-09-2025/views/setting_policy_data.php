<table class="table display product-overview mb-30" id="support_table5">

                                            <thead>

                                                <tr>

                                                    <th>#</th>

                                                    <th width="50%">ประเภทกรมธรรม์</th>

                                                    <th>ประเภท</th>

                                                    <th>สถานะ</th>

                                                    <th>แก้ไข</th>

                                                </tr>

                                            </thead>

                                            <tbody>
				<?php $n=1; foreach($listData AS $data){ 
					 switch($data->insurance_type_status){
						case "1" : $useTxt= "ใช้งาน"; $classRed=''; break; case "0" : $useTxt= "ไม่ใช้งาน"; $classRed='class="text-danger"'; break; 
						}							
												
												?>
                                                <tr <?php echo $classRed?> >

                                                    <td><?php echo $n?></td>

                                                    <td><?php echo $data->insurance_type_name?></td>

                                                    <td><?php switch($data->insurance_type){
														case "1" : echo "ภาคสมัครใจ"; break; case "2" : echo "ภาคบังคับ"; break; 
													}?></td>

                                                    <td><?php echo $useTxt?></td>

                                                    <td>

                                                        <a href="javascript:void(0)" class="btn btn-tbl-edit btn-xs" onClick="SetValue('<?php echo $data->id?>','<?php echo htmlspecialchars($data->insurance_type_name)?>','<?php echo $data->insurance_type?>','<?php echo $data->insurance_type_status?>')">

                                                            <i class="fa fa-pencil"></i>

                                                        </a>


                                                    </td>

                                                </tr>
				<?php $n++; }?>
                                            </tbody>

                                        </table>