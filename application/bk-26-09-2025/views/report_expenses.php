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
                            <div class="page-title">รายงานค่าใช้จ่าย</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-topline-red">
                            <div class="card-head">
                              
								 <!--<ol class="breadcrumb page-breadcrumb pull-right">
                                    <li><a href="<?php //echo base_url('Report_car/report_car_warning_data_print'); ?>" target="_blank"><button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-print"></i> พิมพ์รายงานแจ้งเตือนใกล้หมดอายุ</button></a></li>
                                </ol>-->
                            </div>
                            <div class="card-body ">
                                <div class="row p-b-20">
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <div class="card-body">
                                            <form class="form-horizontal">
                                                <div class="form-group row">
                                                    <label class="col-sm-1 control-label">วันที่เริ่มต้น</label> 
                                                    <div class="col-sm-2">
                                                       <input type="text" id="expenses_date_start" name="expenses_date_start" class="form-control form-control-sm datepicker" readonly value="<?php echo $startday?>" style="width: 100px;">
                                                    </div>
                                                    <label class="col-sm-1 control-label">วันที่สิ้นสุด</label>
                                                    <div class="col-sm-2">
                                                         <input type="text" id="expenses_date_end" name="expenses_date_end" class="form-control form-control-sm datepicker" readonly value="<?php echo $endday?>" style="width: 100px;">
                                                    </div>
                                                    
												  
                                                    <div class="col-sm-1">
                                                        <button type="button" class="btn btn-success" onClick="showExpense()">ตกลง</button> 
                                                    </div>
													 <div class="col-sm-1">
                                                        <button type="button" class="btn btn-info" onClick="printExpense('printAble')"><i class="fa fa-print"></i>พิมพ์รายการใช้จ่าย</button> 
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="showData"></div>
                            </div>
                    </div>
                        </div>
                </div>
            </div>
        </div>
		
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="exampleModalLongTitle">+ หมายเหตุ</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<textarea class="form-control" rows="10" placeholder="" style="height:200px;"></textarea>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary">บันทึก</button>
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