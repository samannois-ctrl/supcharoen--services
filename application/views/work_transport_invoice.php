<div class="row">

    <div class="col-md-12 col-sm-12">

        <div class="card card-box">

            <div class="card-head">

                <header>ข้อมูลใบแจ้งหนี้</header>

            </div>

            <div class="card-body " id="bar-parent1">

                <form class="form-horizontal">

                    <div class="form-group row">

                        <label class="col-sm-2 control-label">รหัสตัวแทน</label>

                        <div class="col-sm-4">

                            <input type="text" class="form-control" id="" placeholder="">

                        </div>

                    </div>

                    <div class="form-group row">

                        <label class="col-sm-2 control-label">วันที่รับแจ้ง</label>

                        <div class="col-sm-4">

                            <input type="date" class="form-control" id="" placeholder="">

                        </div>

                        <label class="col-sm-2 control-label">เลขที่ใบรับแจ้ง</label>

                        <div class="col-sm-4">

                            <input type="text" class="form-control" id="" placeholder="">

                        </div>

                    </div>

                    <div class="form-group row">

                        <label class="col-sm-2 control-label">ชื่อ-สกุล ผู้เอาประกันภัย</label>

                        <div class="col-sm-4">

                            <input type="text" class="form-control" id="" placeholder="">

                        </div>

                        <label class="col-sm-2 control-label">โทรศัพท์</label>

                        <div class="col-sm-4">

                            <input type="text" class="form-control" id="" placeholder="">

                        </div>

                    </div>



                    <div class="form-group row">

                        <label class="col-sm-2 control-label">เลขที่กรมธรรม์</label>

                        <div class="col-sm-4">

                            <input type="text" class="form-control" id="" placeholder="">

                        </div>

                        <label class="col-sm-2 control-label">บริษัท</label>

                        <div class="col-sm-4">

                            <input type="text" class="form-control" id="" placeholder="">

                        </div>

                    </div>

                    <div class="form-group row">

                        <label class="col-sm-2 control-label">ที่อยู่</label>

                        <div class="col-sm-4">

                            <textarea class="form-control" rows="3" placeholder="" style="height: 58px;"></textarea>

                        </div>

                    </div>

                    <br><br>

                    <div class="form-group row">

                        <div class="col-sm-12">

                            <div class="card card-topline-aqua">

                                <!-- <div class="card-head">

                                <header></header>

                            </div> -->

                                <div class="card-body ">

                                    <div class="table-scrollable">

                                        <table class="table center">

                                            <thead>

                                                <tr style="background-color: #E7E7E7;">

                                                    <th>รายการประเภทกรมธรรม์</th>

                                                    <th>วันเริ่มคุ้มครอง</th>

                                                    <th>วันหมดอายุ</th>

                                                    <th>เบี้ยเก็บลูกค้า</th>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                <tr class="active">

                                                    <td>

                                                        <input type="text" class="form-control" id="" placeholder="">

                                                    </td>

                                                    <td>

                                                        <input type="text" class="form-control" id="" placeholder="">

                                                    </td>

                                                    <td>

                                                        <input type="text" class="form-control" id="" placeholder="">

                                                    </td>

                                                    <td>

                                                        <input type="text" class="form-control" id="" placeholder="">

                                                    </td>

                                                </tr>

                                            </tbody>

                                        </table>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="form-group row">

                        <label class="col-sm-12 control-label" style="text-align: left;">โดยชำระเงินดังนี้ :</label>

                    </div>

                    <div class="form-group row">

                        <label class="col-sm-5 control-label" style="text-align: left;">จำนวนเงิน 1,958.86 บาท</label>

                    </div>



                    <div class="form-group" style="padding-top: 50px;">

                        <div class="col-md-12" style="text-align: center">

                            <button type="submit" class="btn btn-info">บันทึกข้อมูล</button>



                            <a href="<?php echo base_url('Insurance_transport/work_transport_invoice_print'); ?>" target="_blank">

                                <button type="button" class="btn btn-warning">

                                    <i class="fa fa-print"></i> พิมพ์ใบแจ้งหนี้

                                </button>

                            </a>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>