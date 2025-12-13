<div class="row">

    <div class="col-md-12 col-sm-12">

        <div class="card card-box">

            <div class="card-head">

                <header>ข้อมูลการชำระเงิน / ผ่อนประกัน</header>

                <ol class="breadcrumb page-breadcrumb pull-right">

                    <li><a href="<?php echo base_url('Insurance_transport/work_transport_transportyment_print'); ?>" target="_blank"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-print"></i> พิมพ์สำหรับลูกค้า</button></a></li>

                </ol>

            </div>

            <div class="card-body " id="bar-parent1">

                <form class="form-horizontal">

                    <div class="form-group row" style="font-size: 16px">

                        <label class="col-sm-4 control-label"><strong>เลือกการชำระเงิน</strong></label>

                        <div class="col-sm-1" style="margin-top: 8px;">

                            <div class="radio p-0">

                                <input type="radio" name="" id="" value="" checked="">

                                <label for="optionsRadios1">เงินสด</label>

                            </div>

                        </div>

                        <div class="col-sm-1" style="margin-top: 8px;">

                            <div class="radio p-0">

                                <input type="radio" name="" id="" value="">

                                <label for="optionsRadios1">เงินผ่อน</label>

                            </div>

                        </div>





                        <label class="col-sm-1 control-label">จำนวนงวด</label>

                        <div class="col-sm-2">

                            <select class="form-select" aria-label="">

                                <option value="0">เลือกจำนวนงวด</option>

                                <option value="1">1</option>

                                <option value="2">2</option>

                                <option value="3">3</option>

                                <option value="4">4</option>

                                <option value="5">5</option>

                                <option value="6">6</option>

                                <option value="7">7</option>

                                <option value="8">8</option>

                                <option value="9">9</option>

                                <option value="10">10</option>

                            </select>

                        </div>

                        <div class="col-sm-1">

                            <button type="submit" class="btn btn-info btn-sm">บันทึกข้อมูล</button>

                        </div>



                    </div>





                    <div class="form-group row">

                        <div class="col-sm-12">

                            <div class="card card-topline-aqua">

                                <div class="card-head" style="text-align: center;">

                                    <header>ข้อมูลการชำระเงิน / ผ่อนประกัน</header>

                                </div>

                                <div class="card-body ">

                                    <div class="table-scrollable">

                                        <table class="table">

                                            <thead>

                                                <tr>

                                                    <th style="text-align: center">งวดที่</th>

                                                    <th style="text-align: center">วันที่ทำรายการ</th>

                                                    <th style="text-align: center">วันที่รับเงิน</th>

                                                    <th style="text-align: center">จำนวนเงิน</th>

                                                    <th style="text-align: center">การชำระเงิน</th>

                                                    <th style="text-align: center">เลขที่ใบเสร็จ</th>

                                                    <th style="text-align: center">วันกำหนดชำระเงิน</th>

                                                    <th style="text-align: center">สถานะตามเงิน</th>

                                                    <th style="text-align: center">หมายเหตุ</th>

                                                    <th style="text-align: center">แก้ไข / ลบ</th>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                <tr class="active">

                                                    <td style="text-align: center">1</td>

                                                    <td><input type="date" class="form-control" id="" placeholder=""></td>

                                                    <td><input type="date" class="form-control" id="" placeholder=""></td>

                                                    <td><input type="text" class="form-control" id="" placeholder=""></td>

                                                    <td>

                                                        <select class="form-select" aria-label="">

                                                            <option value="0">เลือกการชำระเงิน</option>

                                                            <option value="1">เงินสด</option>

                                                            <option value="2">เงินโอน</option>

                                                            <option value="3">บัตรเครดิต</option>

                                                            <option value="4">เช็ค</option>

                                                        </select>

                                                    </td>

                                                    <td><input type="text" class="form-control" id="" placeholder=""></td>

                                                    <td><input type="date" class="form-control" id="" placeholder=""></td>

                                                    <td style="text-align: center">

                                                        <button class="btn btn-success btn-xs">ชำระเงินแล้ว</button>

                                                    </td>

                                                    <td><input type="text" class="form-control" id="" placeholder=""></td>

                                                    <td style="text-align: center">

                                                        <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>

                                                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>

                                                    </td>

                                                </tr>

                                                <tr class="active">

                                                    <td style="text-align: center">2</td>

                                                    <td><input type="date" class="form-control" id="" placeholder=""></td>

                                                    <td><input type="date" class="form-control" id="" placeholder=""></td>

                                                    <td><input type="text" class="form-control" id="" placeholder=""></td>

                                                    <td>

                                                        <select class="form-select" aria-label="">

                                                            <option value="0">เลือกการชำระเงิน</option>

                                                            <option value="1">เงินสด</option>

                                                            <option value="2">เงินโอน</option>

                                                            <option value="3">บัตรเครดิต</option>

                                                            <option value="4">เช็ค</option>

                                                        </select>

                                                    </td>

                                                    <td><input type="text" class="form-control" id="" placeholder=""></td>

                                                    <td><input type="date" class="form-control" id="" placeholder=""></td>

                                                    <td style="text-align: center">

                                                        <button class="btn btn-danger btn-xs">ค้างชำระ</button>

                                                    </td>

                                                    <td><input type="text" class="form-control" id="" placeholder=""></td>

                                                    <td style="text-align: center">

                                                        <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>

                                                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>

                                                    </td>

                                                </tr>



                                                <tr class="active">

                                                    <td>&nbsp;</td>

                                                    <td></td>

                                                    <td style="text-align: center;font-size: 18px; font-weight: 500;">รวมยอดรับชำระ</td>

                                                    <td style="text-align: center;font-size: 18px; font-weight: 500;">xx,xxx.xx</td>

                                                    <td style="text-align: center;font-size: 18px; font-weight: 500; color:#C90003">ยอดค้างรับ</td>

                                                    <td style="text-align: center;font-size: 18px; font-weight: 500; color:#C90003">x,xxx.xx</td>

                                                    <td colspan="4" style="font-size: 18px; font-weight: 500;">( เบี้ยรวม 12,346.97 )</td>

                                                </tr>



                                            </tbody>

                                        </table>

                                    </div>

                                </div>

                            </div>

                        </div>



                    </div>





                </form>

            </div>

        </div>

    </div>

</div>