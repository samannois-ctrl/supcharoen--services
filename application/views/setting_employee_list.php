<table class="table display product-overview mb-30" id="support_table5">

                                            <thead>

                                                <tr>

                                                    <th>#</th>

                                                    <th width="30%">ชื่อพนักงาน</th>

                                                    <th>สาขา</th>

                                                    <th>username</th>

                                                    <th>โทรศัพท์</th>

                                                    <th>สถานะ</th>

                                                   <!-- <th style="text-align: center;">สิทธิ์ปลดล็อคข้อมูล</th>-->

                                                    <th>สิทธิ์การเข้าถึง</th>

                                                    <th>แก้ไข</th>

                                                </tr>

                                            </thead>

                                            <tbody>
<?php $n=1; foreach($listEm AS $data){?>
                           <tr>

                                                    <td><?php echo $n?></td>

                                                    <td><?php echo $data->name_sname?></td>

                                                    <td><?php if($data->user_branch ==1){ echo " ประกันภัย"; }else if($data->user_branch ==2){   echo " พรบ ตรอ ตรวจสภาพรถ";  }?></td>

                                                    <td><?php echo $data->user_name?></td>

                                                    <td><?php echo $data->telephone_no?></td>

                                                    <td><?php if($data->data_status ==1){ echo "ใช้งาน";}else{ echo "<span class='text-danger'>ไม่ใช้งาน</span>"; }?></td>

                                                   <!-- <td style="text-align: center;">
                                                        <div>
                                                            <input class="form-check-input" type="checkbox" value="" id="">
                                                        </div>
                                                    </td>-->

                                                    <td>
                                                        <a href="<?php echo base_url('Setting/setting_permission/').$data->id; ?>">
                                                            <button type="button" class="btn btn-round btn-warning btn-sm">กำหนดสิทธิ์</button>
                                                        </a>
                                                    </td>

                                                    <td>

                                                        <a href="<?php echo base_url('Setting/setting_add_employee/').$data->id; ?>" class="btn btn-tbl-edit btn-xs">

                                                            <i class="fa fa-pencil"></i>

                                                        </a>

                                                    </td>

                                                </tr>
<?php $n++;} ?>
                                            </tbody>

                                        </table>