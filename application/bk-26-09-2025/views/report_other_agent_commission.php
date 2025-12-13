<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <?php include("header.php"); ?>
    <style>
        .txt-right {
            text-align: right;
        }
    </style>
</head>
<!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md page-full-width header-white dark-sidebar-color logo-dark">
    <div class="page-wrapper">
        <!-- start header -->
        <?php include("menu.php"); ?>
        <!-- end sidebar menu -->
        <!-- start page content -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">ค่าคอมมิชชั่นตัวแทน วันที่ x กุมภาพันธ์ 25xx ถึงวันที่ x ธันวาคม 25xx</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-topline-red">
                            <div class="card-head">
                                <header>
                                    รายการค่าคอมมิชชั่นตัวแทน
                                </header>
                                <ol class="breadcrumb page-breadcrumb pull-right">
                                    <li>
                                        <a href="<?php echo base_url('Report_other/report_other_agent_commission_print'); ?>" target="_blank">
                                            <button type="submit" class="btn btn-warning btn-sm">
                                                <i class="fa fa-print"></i>
                                                พิมพ์รายงานค่าคอมมิชชั่นตัวแทน</button>
                                        </a>
                                    </li>
                                </ol>
                            </div>
                            <div class="card-body ">
                                <div class="row p-b-20">
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <div class="card-body">
                                            <form class="form-horizontal">
                                                <div class="form-group row">
                                                    <label class="col-sm-1 control-label">วันที่เริ่มต้น</label>
                                                    <div class="col-sm-2">
                                                        <input type="date" class="form-control">
                                                    </div>
                                                    <label class="col-sm-1 control-label">วันที่สิ้นสุด</label>
                                                    <div class="col-sm-2">
                                                        <input type="date" class="form-control">
                                                    </div>
                                                    <label class="col-sm-1 control-label">เลือกบริษัท</label>
                                                    <div class="col-sm-1">
                                                        <select class="form-select" aria-label="">
                                                            <option value="0">- ทั้งหมด - </option>
                                                            <option value="1">AAAAAA</option>
                                                            <option value="2">BBBBBB</option>
                                                        </select>
                                                    </div>
                                                    <label class="col-sm-1 control-label">เลือกประเภทประกัน</label>
                                                    <div class="col-sm-2">
                                                        <select class="form-select" aria-label="">
															<option value="0">- ทั้งหมด -</option>
															<option value="1">ประกันอัคคีภัย</option>
															<option value="2">ประกันขนส่ง</option>
															<option value="1">ประกันอุบัติเหตุ</option>
															<option value="2">ประกันท่องเที่ยว</option>
														</select>	
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <button type="submit" class="btn btn-info">ตกลง</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-bordered table-hover table-checkable order-column full-width" id="">
                                    <!-- <table class="table table-striped table-bordered table-hover table-checkable order-column full-width" id="example4"> -->
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">ลำดับ</th>
                                            <th style="text-align: center">ชื่อ-สกุล</th>
                                            <th style="text-align: center">เลขที่กรมธรรม์</th>
											<th style="text-align: center">ประเภทประกัน</th>
											<th style="text-align: center">บริษัทประกัน</th>
                                            <th style="text-align: center">เบี้ยรวม</th>
                                            <th style="text-align: center">เบี้ยสุทธิ</th>
                                            <th style="text-align: center">ค่าคอม(1)</th>
                                            <th style="text-align: center">หักภาษี(1)</th>
                                            <th style="text-align: center">ค่าคอม(2)</th>
                                            <th style="text-align: center">หักภาษี(2)</th>
                                            <th style="text-align: center">ค่าคอม(3)</th>
                                            <th style="text-align: center">หักภาษี(3)</th>
                                            <th style="text-align: center">คงเหลือ</th>
                                            <th style="text-align: center">เบี้ยนำส่งบริษัท</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <th colspan="15" style="text-align: left; background-color: #f2f2f2;">&nbsp;<i class="fa fa-book"></i> ประกันอัคคีภัย</th>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td align="center">1</td>
                                            <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
                                            <td align="center">12345 - 6789</td>
											<td align="center">ประกันอุบัติเหตุ</td>
											<td align="center">CHUBB</td>
                                            <td align="right">645.21</td>
                                            <td align="right">600.00</td>
                                            <td align="right">72.00</td>
                                            <td align="right">3.60</td>
                                            <td align="right">144.00</td>
                                            <td align="right">2.16</td>
                                            <td align="right">0.00</td>
                                            <td align="right">0.00</td>
                                            <td align="right">210.24</td>
                                            <td align="right">434.97</td>
                                        </tr>
										 <tr class="odd gradeX">
                                            <td align="center">2</td>
                                            <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
                                            <td align="center">12345 - 6789</td>
											<td align="center">ประกันอุบัติเหตุ</td>
											<td align="center">CHUBB</td>
                                            <td align="right">645.21</td>
                                            <td align="right">600.00</td>
                                            <td align="right">72.00</td>
                                            <td align="right">3.60</td>
                                            <td align="right">144.00</td>
                                            <td align="right">2.16</td>
                                            <td align="right">0.00</td>
                                            <td align="right">0.00</td>
                                            <td align="right">210.24</td>
                                            <td align="right">434.97</td>
                                        </tr>
										 <tr class="odd gradeX">
                                            <td align="center">3</td>
                                            <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
                                            <td align="center">12345 - 6789</td>
											<td align="center">ประกันอุบัติเหตุ</td>
											<td align="center">CHUBB</td>
                                            <td align="right">645.21</td>
                                            <td align="right">600.00</td>
                                            <td align="right">72.00</td>
                                            <td align="right">3.60</td>
                                            <td align="right">144.00</td>
                                            <td align="right">2.16</td>
                                            <td align="right">0.00</td>
                                            <td align="right">0.00</td>
                                            <td align="right">210.24</td>
                                            <td align="right">434.97</td>
                                        </tr>
                                       
                                        <tr class="odd gradeX">
                                            <th style="text-align: right" colspan="5">รวมยอดประกันอัคคีภัย&nbsp;&nbsp;</th>
                                            <th class="txt-right">15,000.00</th>
                                            <th class="txt-right">1,000.00</th>
                                            <th class="txt-right">144.00</th>
                                            <th class="txt-right">10.16</th>
                                            <th class="txt-right">444.00</th>
                                            <th class="txt-right">10.00</th>
											<th class="txt-right">0.00</th>
                                            <th class="txt-right">0.00</th>
                                            <th class="txt-right">710.24</th>
                                            <th class="txt-right">1,334.97</th>
                                        </tr>
										
										<tr class="odd gradeX">
                                            <th colspan="15" style="text-align: left; background-color: #f2f2f2;">&nbsp;<i class="fa fa-book"></i> ประกันขนส่ง</th>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td align="center">1</td>
                                            <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
                                            <td align="center">12345 - 6789</td>
											<td align="center">ประกันอุบัติเหตุ</td>
											<td align="center">CHUBB</td>
                                            <td align="right">645.21</td>
                                            <td align="right">600.00</td>
                                            <td align="right">72.00</td>
                                            <td align="right">3.60</td>
                                            <td align="right">144.00</td>
                                            <td align="right">2.16</td>
                                            <td align="right">0.00</td>
                                            <td align="right">0.00</td>
                                            <td align="right">210.24</td>
                                            <td align="right">434.97</td>
                                        </tr>
										 <tr class="odd gradeX">
                                            <td align="center">2</td>
                                            <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
                                            <td align="center">12345 - 6789</td>
											<td align="center">ประกันอุบัติเหตุ</td>
											<td align="center">CHUBB</td>
                                            <td align="right">645.21</td>
                                            <td align="right">600.00</td>
                                            <td align="right">72.00</td>
                                            <td align="right">3.60</td>
                                            <td align="right">144.00</td>
                                            <td align="right">2.16</td>
                                            <td align="right">0.00</td>
                                            <td align="right">0.00</td>
                                            <td align="right">210.24</td>
                                            <td align="right">434.97</td>
                                        </tr>
										 <tr class="odd gradeX">
                                            <td align="center">3</td>
                                            <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
                                            <td align="center">12345 - 6789</td>
											<td align="center">ประกันอุบัติเหตุ</td>
											<td align="center">CHUBB</td>
                                            <td align="right">645.21</td>
                                            <td align="right">600.00</td>
                                            <td align="right">72.00</td>
                                            <td align="right">3.60</td>
                                            <td align="right">144.00</td>
                                            <td align="right">2.16</td>
                                            <td align="right">0.00</td>
                                            <td align="right">0.00</td>
                                            <td align="right">210.24</td>
                                            <td align="right">434.97</td>
                                        </tr>
										 <tr class="odd gradeX">
										   <th style="text-align: right" colspan="5">รวมยอดประกันขนส่ง&nbsp;&nbsp;</th>
										   <th class="txt-right">15,000.00</th>
										   <th class="txt-right">1,000.00</th>
										   <th class="txt-right">144.00</th>
										   <th class="txt-right">10.16</th>
										   <th class="txt-right">444.00</th>
										   <th class="txt-right">10.00</th>
										   <th class="txt-right">0.00</th>
										   <th class="txt-right">0.00</th>
										   <th class="txt-right">710.24</th>
										   <th class="txt-right">1,334.97</th>
								      </tr>
										
										
										<tr class="odd gradeX">
                                            <th colspan="15" style="text-align: left; background-color: #f2f2f2;">&nbsp;<i class="fa fa-book"></i> ประกันอุบัติเหตุ</th>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td align="center">1</td>
                                            <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
                                            <td align="center">12345 - 6789</td>
											<td align="center">ประกันอุบัติเหตุ</td>
											<td align="center">CHUBB</td>
                                            <td align="right">645.21</td>
                                            <td align="right">600.00</td>
                                            <td align="right">72.00</td>
                                            <td align="right">3.60</td>
                                            <td align="right">144.00</td>
                                            <td align="right">2.16</td>
                                            <td align="right">0.00</td>
                                            <td align="right">0.00</td>
                                            <td align="right">210.24</td>
                                            <td align="right">434.97</td>
                                        </tr>
										 <tr class="odd gradeX">
                                            <td align="center">2</td>
                                            <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
                                            <td align="center">12345 - 6789</td>
											<td align="center">ประกันอุบัติเหตุ</td>
											<td align="center">CHUBB</td>
                                            <td align="right">645.21</td>
                                            <td align="right">600.00</td>
                                            <td align="right">72.00</td>
                                            <td align="right">3.60</td>
                                            <td align="right">144.00</td>
                                            <td align="right">2.16</td>
                                            <td align="right">0.00</td>
                                            <td align="right">0.00</td>
                                            <td align="right">210.24</td>
                                            <td align="right">434.97</td>
                                        </tr>
										 <tr class="odd gradeX">
                                            <td align="center">3</td>
                                            <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
                                            <td align="center">12345 - 6789</td>
											<td align="center">ประกันอุบัติเหตุ</td>
											<td align="center">CHUBB</td>
                                            <td align="right">645.21</td>
                                            <td align="right">600.00</td>
                                            <td align="right">72.00</td>
                                            <td align="right">3.60</td>
                                            <td align="right">144.00</td>
                                            <td align="right">2.16</td>
                                            <td align="right">0.00</td>
                                            <td align="right">0.00</td>
                                            <td align="right">210.24</td>
                                            <td align="right">434.97</td>
                                        </tr>
										 <tr class="odd gradeX">
										   <th style="text-align: right" colspan="5">รวมยอดประกันอัคคีภัย&nbsp;&nbsp;</th>
										   <th class="txt-right">15,000.00</th>
										   <th class="txt-right">1,000.00</th>
										   <th class="txt-right">144.00</th>
										   <th class="txt-right">10.16</th>
										   <th class="txt-right">444.00</th>
										   <th class="txt-right">10.00</th>
										   <th class="txt-right">0.00</th>
										   <th class="txt-right">0.00</th>
										   <th class="txt-right">710.24</th>
										   <th class="txt-right">1,334.97</th>
								      </tr>
										
										
										<tr class="odd gradeX">
                                            <th colspan="15" style="text-align: left; background-color: #f2f2f2;">&nbsp;<i class="fa fa-book"></i> ประกันท่องเที่ยว</th>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td align="center">1</td>
                                            <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
                                            <td align="center">12345 - 6789</td>
											<td align="center">ประกันอุบัติเหตุ</td>
											<td align="center">CHUBB</td>
                                            <td align="right">645.21</td>
                                            <td align="right">600.00</td>
                                            <td align="right">72.00</td>
                                            <td align="right">3.60</td>
                                            <td align="right">144.00</td>
                                            <td align="right">2.16</td>
                                            <td align="right">0.00</td>
                                            <td align="right">0.00</td>
                                            <td align="right">210.24</td>
                                            <td align="right">434.97</td>
                                        </tr>
										 <tr class="odd gradeX">
                                            <td align="center">2</td>
                                            <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
                                            <td align="center">12345 - 6789</td>
											<td align="center">ประกันอุบัติเหตุ</td>
											<td align="center">CHUBB</td>
                                            <td align="right">645.21</td>
                                            <td align="right">600.00</td>
                                            <td align="right">72.00</td>
                                            <td align="right">3.60</td>
                                            <td align="right">144.00</td>
                                            <td align="right">2.16</td>
                                            <td align="right">0.00</td>
                                            <td align="right">0.00</td>
                                            <td align="right">210.24</td>
                                            <td align="right">434.97</td>
                                        </tr>
										 <tr class="odd gradeX">
                                            <td align="center">3</td>
                                            <td>สร้อยกรัณฑ์ จันทร์ทอง</td>
                                            <td align="center">12345 - 6789</td>
											<td align="center">ประกันอุบัติเหตุ</td>
											<td align="center">CHUBB</td>
                                            <td align="right">645.21</td>
                                            <td align="right">600.00</td>
                                            <td align="right">72.00</td>
                                            <td align="right">3.60</td>
                                            <td align="right">144.00</td>
                                            <td align="right">2.16</td>
                                            <td align="right">0.00</td>
                                            <td align="right">0.00</td>
                                            <td align="right">210.24</td>
                                            <td align="right">434.97</td>
                                        </tr>
										 <tr class="odd gradeX">
										   <th style="text-align: right" colspan="5">รวมยอดประกันท่องเที่ยว &nbsp;</th>
										   <th class="txt-right">15,000.00</th>
										   <th class="txt-right">1,000.00</th>
										   <th class="txt-right">144.00</th>
										   <th class="txt-right">10.16</th>
										   <th class="txt-right">444.00</th>
										   <th class="txt-right">10.00</th>
										   <th class="txt-right">0.00</th>
										   <th class="txt-right">0.00</th>
										   <th class="txt-right">710.24</th>
										   <th class="txt-right">1,334.97</th>
								      </tr>
                                       
                                        <tr class="odd gradeX">
                                            <th style="text-align: right" colspan="3">&nbsp;</th>
                                            <th class="txt-right">&nbsp;</th>
                                            <th class="txt-right">&nbsp;</th>
                                            <th class="txt-right">&nbsp;</th>
                                            <th class="txt-right">&nbsp;</th>
                                            <th class="txt-right">&nbsp;</th>
                                            <th class="txt-right">&nbsp;</th>
                                            <th class="txt-right">&nbsp;</th>
                                            <th class="txt-right">&nbsp;</th>
											<th class="txt-right">&nbsp;</th>
                                            <th class="txt-right">&nbsp;</th>
                                            <th class="txt-right">&nbsp;</th>
                                            <th class="txt-right">&nbsp;</th>
                                        </tr>
										
                                       
                                       
                                     
                                        <tr class="odd gradeX" style="background-color: #cfcfcf;">
                                        
                                            <th style="text-align: right" colspan="5">รวมทั้งหมด&nbsp;&nbsp;</th>
                                            <th class="txt-right">57,200.00</th>
                                            <th class="txt-right">53,243.00</th>
                                            <th class="txt-right">9,343.62</th>
                                            <th class="txt-right">934.35</th>
                                            <th class="txt-right">2,000.00</th>
                                            <th class="txt-right">100.00</th>
											<th class="txt-right">0.00</th>
                                            <th class="txt-right">0.00</th>
                                            <th class="txt-right">8,409.27</th>
                                            <th class="txt-right">48,790.73</th>
                                        </tr>
                                    </tbody>
                                </table>
                                <p>&nbsp;</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page content -->
        <!-- start footer -->
        <?php include("footer.php"); ?>
        <!-- end footer -->
</body>
</html>