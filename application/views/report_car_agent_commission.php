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
                                        <a href="<?php echo base_url('Report_car/report_car_agent_commission_print'); ?>" target="_blank">
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



                                                    <label class="col-sm-1 control-label">เลือกประเภท</label>

                                                    <div class="col-sm-2">

                                                        <select class="form-select" aria-label="">

                                                            <option value="0">- ทั้งหมด - </option>

                                                            <option value="1">AAAAAA</option>

                                                            <option value="2">BBBBBB</option>

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

                                            <th style="text-align: center">ทะเบียน</th>

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

                                            <th colspan="13" style="text-align: left; background-color: #f2f2f2;">&nbsp;<i class="fa fa-book"></i> สินมั่นคง</th>


                                        </tr>

                                        <tr>

                                            <th colspan="13" style="text-align: left;">&emsp;<i class="fa fa-folder-open"></i> พ.ร.บ.</th>


                                        </tr>

                                        <tr class="odd gradeX">

                                            <td>1</td>

                                            <td>test test</td>

                                            <td align="center">รวย-999 กรุงเทพ</td>

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

                                            <th style="text-align: right" colspan="3">รวม พ.ร.บ. :</th>

                                            <th class="txt-right">645.21</th>

                                            <th class="txt-right">600.00</th>

                                            <th class="txt-right">72.00</th>

                                            <th class="txt-right">3.60</th>

                                            <th class="txt-right">144.00</th>

                                            <th class="txt-right">2.16</th>

                                            <th class="txt-right">0.00</th>

                                            <th class="txt-right">0.00</th>

                                            <th class="txt-right">210.24</th>

                                            <th class="txt-right">434.97</th>

                                        </tr>

                                        <tr class="odd gradeX">

                                            <th style="text-align: right" colspan="3">รวม สินมั่นคง : </th>

                                            <th class="txt-right">645.21</th>

                                            <th class="txt-right">600.00</th>

                                            <th class="txt-right">72.00</th>

                                            <th class="txt-right">3.60</th>

                                            <th class="txt-right">144.00</th>

                                            <th class="txt-right">2.16</th>

                                            <th class="txt-right">0.00</th>

                                            <th class="txt-right">0.00</th>

                                            <th class="txt-right">210.24</th>

                                            <th class="txt-right">434.97</th>

                                        </tr>





                                        <tr class="odd gradeX">

                                            <th colspan="13" style="text-align: left; background-color: #f2f2f2;">&nbsp;<i class="fa fa-book"></i> CHUBB</th>


                                        </tr>

                                        <tr>

                                            <th colspan="13" style="text-align: left;">&emsp;<i class="fa fa-folder-open"></i> พ.ร.บ.</th>


                                        </tr>

                                        <tr class="odd gradeX">

                                            <td>1</td>

                                            <td>test test</td>

                                            <td align="center">รวย-999 กรุงเทพ</td>

                                            <td align="right">1,500.00</td>

                                            <td align="right">1,396.00</td>

                                            <td align="right">167.52</td>

                                            <td align="right">16.75</td>

                                            <td align="right">0.00</td>

                                            <td align="right">0.00</td>

                                            <td align="right">0.00</td>

                                            <td align="right">0.00</td>

                                            <td align="right">150.77</td>

                                            <td align="right">1,349.23</td>

                                        </tr>

                                        <tr class="odd gradeX">

                                            <td>2</td>

                                            <td>test2 test2</td>

                                            <td align="center">รวย-999 กรุงเทพ</td>

                                            <td align="right">650.00</td>

                                            <td align="right">605.00</td>

                                            <td align="right">72.60</td>

                                            <td align="right">7.26</td>

                                            <td align="right">0.00</td>

                                            <td align="right">0.00</td>

                                            <td align="right">0.00</td>

                                            <td align="right">0.00</td>

                                            <td align="right">65.34</td>

                                            <td align="right">584.66</td>

                                        </tr>

                                        <tr class="odd gradeX">

                                            <th style="text-align: right" colspan="3">รวม พ.ร.บ. :</th>

                                            <th class="txt-right">2,150.00</th>

                                            <th class="txt-right">2,001.00</th>

                                            <th class="txt-right">240.12</th>

                                            <th class="txt-right">24.01</th>

                                            <th class="txt-right">0.00</th>

                                            <th class="txt-right">0.00</th>

                                            <th class="txt-right">0.00</th>

                                            <th class="txt-right">0.00</th>

                                            <th class="txt-right">216.11</th>

                                            <th class="txt-right">1,933.89</th>

                                        </tr>

                                        <tr>

                                            <th colspan="13" style="text-align: left;">&emsp;<i class="fa fa-folder-open"></i> ประเภท1</th>


                                        </tr>

                                        <tr class="odd gradeX">

                                            <td>1</td>

                                            <td>test test</td>

                                            <td align="center">รวย-999 กรุงเทพ</td>

                                            <td align="right">27,500.00</td>

                                            <td align="right">25,598.00</td>

                                            <td align="right">4,607.64</td>

                                            <td align="right">460.76</td>

                                            <td align="right">0.00</td>

                                            <td align="right">0.00</td>

                                            <td align="right">0.00</td>

                                            <td align="right">0.00</td>

                                            <td align="right">4,146.88</td>

                                            <td align="right">23,353.12</td>

                                        </tr>

                                        <tr class="odd gradeX">

                                            <td>2</td>

                                            <td>test2 test2</td>

                                            <td align="center">รวย-999 กรุงเทพ</td>

                                            <td align="right">25,400.00</td>

                                            <td align="right">23,643.00</td>

                                            <td align="right">4,255.74</td>

                                            <td align="right">425.57</td>

                                            <td align="right">0.00</td>

                                            <td align="right">0.00</td>

                                            <td align="right">0.00</td>

                                            <td align="right">0.00</td>

                                            <td align="right">3,830.17</td>

                                            <td align="right">21,569.83</td>

                                        </tr>


                                        <tr class="odd gradeX">

                                            <th style="text-align: right" colspan="3">รวม ประเภท1 :</th>

                                            <th class="txt-right">52,900.00</th>

                                            <th class="txt-right">49,241.00</th>

                                            <th class="txt-right">8,863.38</th>

                                            <th class="txt-right">886.33</th>

                                            <th class="txt-right">0.00</th>

                                            <th class="txt-right">0.00</th>

                                            <th class="txt-right">0.00</th>

                                            <th class="txt-right">0.00</th>

                                            <th class="txt-right">7,977.05</th>

                                            <th class="txt-right">44,922.95</th>

                                        </tr>

                                        <tr class="odd gradeX">

                                            <th style="text-align: right" colspan="3">รวม CHUBB :</th>

                                            <th class="txt-right">55,050.00</th>

                                            <th class="txt-right">51,242.00</th>

                                            <th class="txt-right">9,103.50</th>

                                            <th class="txt-right">910.34</th>

                                            <th class="txt-right">0.00</th>

                                            <th class="txt-right">0.00</th>

                                            <th class="txt-right">0.00</th>

                                            <th class="txt-right">0.00</th>

                                            <th class="txt-right">8,193.16</th>

                                            <th class="txt-right">46,856.84</th>

                                        </tr>


                                        <tr class="odd gradeX" style="background-color: #cfcfcf;">
                                        
                                            <th style="text-align: right" colspan="3">รวมทั้งหมด :</th>

                                            <th class="txt-right">57,200.00</th>

                                            <th class="txt-right">53,243.00</th>

                                            <th class="txt-right">9,343.62</th>

                                            <th class="txt-right">934.35</th>

                                            <th class="txt-right">0.00</th>

                                            <th class="txt-right">0.00</th>

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