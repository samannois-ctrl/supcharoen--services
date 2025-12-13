 <div class="showDataLoader" style="position: absolute;left:0;top:0;width: 100%;height:100%;z-index:100;background: #f2f2f2c7;display: none;">
                                        <div class="showDataLoader-container" style="position: absolute;left: 50%;top: 100px;">
                                            
                                                    
                                        
                                            <div class="showDataLoader-spinner"></div>
                                            <div class="showDataLoader-text">Loading ...</div>
                                        </div>
                             </div>
<table class="table table-striped table-bordered table-hover table-checkable order-column full-width">
                                            <!-- <table class="table table-striped table-bordered table-hover table-checkable order-column full-width" id="example4"> -->
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center">ลำดับ</th>
                                                    <th style="text-align: center" width=25%>ชื่อ</th>
                                                    <th style="text-align: center">เลขผู้เสียภาษี</th>
                                                    <th style="text-align: center">ข้อมูลบัญชีธนาคาร</th>
                                                    <th style="text-align: center">ข้อมูลไลน์</th>
                                                    <th style="text-align: center" width=30%>ข้อมูลที่อยู่เอกสาร</th>
                                                    <th style="text-align: center">แก้ไข</th>
                                                </tr>
                                            </thead>
                                            <tbody>
											<?php $n=1; foreach($dataList AS $data){?>	
                                                <tr class="odd gradeX">

                                                    <td><?php echo $n?></td>

                                                    <td><?php echo $data->header_name?></td>

                                                    <td align="center"><?php echo $data->tax_no?></td>

                                                    <td><?php echo $data->bank_name."<br>".$data->bank_acc_number?></td>

                                                    <td><?php echo $data->line_id?></td>

                                                    <td><?php echo $data->address?></td>

                                                    <td align="center">

                                                        <a href="<?php echo base_url('Setting/setting_add_header/'.$data->id); ?>" class="btn btn-tbl-edit btn-xs">

                                                            <i class="fa fa-pencil"></i>

                                                        </a>

                                                    </td>
                                                </tr>
											<?php $n++; }?>
												
                                            </tbody>
                                        </table>