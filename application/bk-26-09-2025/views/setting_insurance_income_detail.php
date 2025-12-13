<!DOCTYPE html>

<html lang="en">

<!-- BEGIN HEAD -->



<head>

    <?php include("header.php"); ?>

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

                            <div class="page-title">ตั้งค่าบริษัทประกันภัย <span class="text-primary bold"><?php echo $company_name?></span></div>

                        </div>

                      <!--  <ol class="breadcrumb page-breadcrumb pull-right">

                            <li><i class="fa fa-cog"></i>&nbsp;<a class="parent-item" href="<?php echo base_url('Setting/setting_company_insurance'); ?>">กลับหน้าตั้งค่าบริษัทประกันภัย</a>&nbsp;

                            </li>



                        </ol>-->
						<div class="pull-right">
						<a class="btn btn-primary" href="<?php echo base_url('Setting/setting_company_insurance');?>">กลับหน้าตั้งค่าบริษัทประกันภัย</a>
						</div>
                    </div>

                </div>



                <!-- start Payment Details -->

                <div class="row">

                    <div class="col-md-12 col-sm-12">

                        <div class="white-box border-gray">

                            <div class="card-body ">

                                <div class="table-wrap">

                                    <div class="table-responsive tblHeightSet">

                                        <table class="table display product-overview mb-30 ml-table-bordered mdl-data-table" id="support_table5">

                                            <thead>

                                                <tr>

                                                    <th class="mdl-data-table__cell--non-numeric">ชนิดประกันภัย</th>

                                                    <th class="mdl-data-table__cell--non-numeric" width=8%>คอม 1</th>

                                                    <th class="mdl-data-table__cell--non-numeric" width=8%>ภาษี 1</th>

                                                    <th class="mdl-data-table__cell--non-numeric" width=8%>คอม 2</th>

                                                    <th class="mdl-data-table__cell--non-numeric" width=8%>ภาษี 2</th>

                                                    <th class="mdl-data-table__cell--non-numeric" width=8%>คอม 3</th>

                                                    <th class="mdl-data-table__cell--non-numeric" width=8%>ภาษี 3</th>

                                                    <th class="mdl-data-table__cell--non-numeric" width=4%>เพิ่ม</th>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                <tr>

                                                    <td>
                                                        <div class="col-12" style="margin-right: 10px;">
                                                            <select name="ins_type_id" class="form-select" id="ins_type_id" aria-label="Default select example">
                                                                <option value="x" selected>--เลือกประเภท--</option>
																<?php foreach($getInsType AS $insType){?>
                                                                <option value="<?php echo $insType->id?>"><?php echo $insType->insurance_type_name?></option>
																<?php }?>
                                                                
                                                            </select>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="col-12">
                                                            <input name="com_1" type="text" class="form-control" id="com_1" onkeypress='validate(event)' value="0">
                                                        </div>
                                                    </td>



                                                    <td>
                                                        <div class="col-12">
                                                            <input name="tax_1" type="text" class="form-control" id="tax_1" onkeypress='validate(event)' value="0">
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="col-12">
                                                            <input name="com_2" type="text" class="form-control" id="com_2" onkeypress='validate(event)' value="0">
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="col-12">
                                                            <input name="tax_2" type="text" class="form-control" id="tax_2" onkeypress='validate(event)' value="0">
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="col-12">
                                                            <input name="com_3" type="text" class="form-control" id="com_3" onkeypress='validate(event)' value="0">
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="col-12">
                                                            <input name="tax_3" type="text" class="form-control" id="tax_3" onkeypress='validate(event)' value="0">
                                                        </div>
                                                    </td>

                                                    <td>
													<input type="hidden" id="companyID" name="companyID" value="<?php echo $companyID?>">
                                                       <a href="javascript:void(0)" class="btn btn-tbl-edit btn-xs btn-success" onClick="AddIncome()">

                                                            <i class="fa fa-plus"></i>

                                                        </a>
                                                    </td>

                                                </tr>



                                            </tbody>

                                        </table>


                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 col-sm-12">

                        <div class="white-box border-gray">


                            <div class="card-body ">

                                <div class="table-wrap">

                                    <div id="showIncome" class="table-responsive tblHeightSet"></div>

                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-2">
                                        <b class="font-red">หมายเหตุ</b>
                                    </div>

                                    <div class="col-12">
                                        <ul class="list-divided">
                                            <li>การแก้ไขข้อมูล สามารถเปลี่ยนวันที่เริ่มต้น, วันที่สิ้นสุด และแก้ไขตัวเลขในช่องต่างๆ ได้ทันที เมื่อแก้ไขแล้วระบบจะบันทึกให้อัตโนมัติ โดยจะมี PopUp แจ้งเตือนทุกช่องที่มีการแก้ไข</li>
                                            <li>การแก้ไขข้อมูล ควรทำการแก้ไขหลังเลิกงาน เพื่อป้องกันการลงข้อมูลระหว่างการเปลี่ยนแปลง</li>
                                            <li>ในกรณีไม่ระบุวันที่สิ้นสุด ระบบจะใช้ค่าต่างๆ ที่กำหนดไว้ จนกว่าจะมีการเปลี่ยนวันที่เริ่มต้นใหม่</li>
                                            <li>การแก้ไขค่าต่างๆ ระบบจะใช้ค่าใหม่ ณ วันที่มีการแก้ไข (ค่าเดิมจะถูกบันทึกไว้ในแต่ละรายการแล้ว)</li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- end Payment Details -->



            </div>

        </div>

        <!-- end page content -->



    </div>

    <!-- end page container -->

    <script>

    </script>

    <!-- start footer -->

    <?php include("footer.php"); ?>

    <!-- end footer -->




</body>



</html>