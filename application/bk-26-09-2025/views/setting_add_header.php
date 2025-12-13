<!DOCTYPE html>

<html lang="en">

<!-- BEGIN HEAD -->



<head>

    <?php include("header.php"); ?>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
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

                            <div class="page-title">ตั้งค่าหัวกระดาษ&nbsp;&nbsp;ใบรับเงิน&nbsp;&nbsp;และใบแจ้งหนี้</div>

                        </div>

                        <!-- <ol class="breadcrumb page-breadcrumb pull-right">

							<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"

									href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>

							</li>

							<li class="active">Dashboard</li>

						</ol> -->

                    </div>

                </div>



                <!-- start Payment Details -->

                <div class="row">

                    <div class="col-md-12 col-sm-12">

                        <div class="white-box border-gray">

                            <div class="card-head" style="padding-bottom: 20px">

                                <!-- <header>Booking Details</header> -->


                                <!-- <div class="col">
                                    <a href="<?php echo base_url('Setting/setting_add_header'); ?>">
                                        <button type="button" class="btn btn-round btn-success" style="margin-bottom: 5px; margin-right: 5px;">
                                            <i class="fa fa-plus"> เพิ่มข้อมูล</i>
                                        </button>
                                    </a>
                                </div> -->

                                <div class="col-1">
                                    <a href="<?php echo base_url('Setting/setting_header'); ?>">
                                        <button type="button" class="btn btn-round btn-warning" style="margin-bottom: 5px;">
                                            <i class="fa fa-list"> ดูรายชื่อ</i>
                                        </button>
                                    </a>
                                </div>

                            </div>

                            <div class="card-body">
                                <form name="headerRecipe" id="headerRecipe" method="post" enctype="multipart/form-data">
                                    <div class="form-horizontal">

                                        <div class="row">
                                            <div class="col">

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">ชื่อหัวใบเสร็จ
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-8">
                                                        <input name="header_name" type="text" class="form-control" id="header_name" data-required="1" value="<?php echo $header_name?>" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">ที่อยู่
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-8">
                                                        <textarea name="address" rows="5" class="form-control" id="address" type="text" data-required="1"><?php echo $address?></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Line ID
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-8">
                                                        <input name="line_id" type="text" class="form-control" id="line_id"  value="<?php echo $line_id?>"/>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">ขั้นตอนแจ้งโอนเงิน</label>
                                                    <div class="col-md-8">
                                                        <textarea name="step_stransfer" rows="5" class="form-control summernote" id="step_stransfer" type="text"><?php echo $step_stransfer?></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">ชื่อธนาคาร
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-8">
                                                        <input name="bank_name" type="text" class="form-control" id="bank_name"  value="<?php echo $bank_name?>" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">ชื่อบัญชีธนาคาร
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-8">
                                                        <input name="bank_acc_name" type="text" class="form-control" id="bank_acc_name"   value="<?php echo $bank_acc_name?>"  />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-sm-3">Qr-code บัญชีธนาคาร</label>
                                                    <div class="col-md-8">
														<div id="bank_img">
														<?php if($bank_qr_code!=''){?>
														<img src="<?php echo base_url($bank_qr_code)?>" style="width: 100px;height: 100px;" class="img-responsive">
														<?php }?></div>
														<div>
                                                        <input name="bank_qr_code" type="file" class="form-control" id="bank_qr_code"  />
														<input type="hidden" id="oldBankQrCode" name="oldBankQrCode" value="<?php echo $bank_qr_code?>">
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="col">

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">เลขผู้เสียภาษี
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-8">
                                                        <input name="tax_no" type="text" class="form-control" id="tax_no"   value="<?php echo $tax_no?>" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">โทรศัพท์
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-8">
                                                        <textarea name="telephone_no" rows="5" class="form-control" id="telephone_no" type="text" data-required="1"><?php echo $telephone_no?></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Line Qr-code</label>
                                                    <div class="col-md-8">
														<div id="line_img">
														<?php if($line_id_qrcode!=''){?>
														<img src="<?php echo base_url($line_id_qrcode)?>" style="width: 100px;height: 100px;" class="img-responsive">
														<?php }?>
														</div>
														<div>
                                                        <input name="line_id_qrcode" type="file" class="form-control" id="line_id_qrcode" />
														<input type="hidden" id="oldLineQrCode" name="oldLineQrCode" value="<?php echo $line_id_qrcode?>">
														</div>
                                                    </div> 
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Logo หัวกระดาษ</label>
                                                    <div class="col-md-8">
														<div id="log_img">
														<?php if($logo_head!=''){?>
														<img src="<?php echo base_url($logo_head)?>" style="width: 100px;height: 100px;" class="img-responsive">
														<?php }?>
														</div>
														<div>
                                                        <input name="logo_head" type="file" class="form-control" id="logo_head" />
														<input type="hidden" id="oldLogo" name="oldLogo" value="<?php echo $logo_head?>">
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">ชื่อสาขาธนาคาร
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-8">
                                                        <input name="bank_branch" type="text" class="form-control" id="bank_branch"  value="<?php echo $bank_branch?>"/>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">เลขทีบัญชีธนาคาร
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-8">
                                                        <input name="bank_acc_number" type="text" class="form-control" id="bank_acc_number" value="<?php echo $bank_acc_number?>"/>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">การใช้งาน</label>
                                                    <span class="required">* </span>
                                                    <div class="col-md-8">
                                                        <select name="data_status" class="form-select" id="data_status">
                                                            <option value="x" <?php if($data_status=='x'){ echo "selected";}?>>--เลือก--</option>
                                                          <option value="1" <?php if($data_status=='1'){ echo "selected";}?>>ใช้งาน</option>
                                                            <option value="0" <?php if($data_status=='0'){ echo "selected";}?> >ไม่ใช้งาน</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <br>

                                    <div class="form-group">
                                        <div class="center col-md-12">
											<input type="hidden" id="dataID" name="dataID" value="<?php echo $dataID?>">
                                            <button type="button" class="btn btn-success" onClick="updateAgent()">เพิ่ม/แก้ไขข้อมูล</button>
                                            <!-- <button type="button" class="btn btn-default">Cancel</button> -->
											<div id="showNotice" align="center"></div>
											
											<div class="showDataLoader" style="position: absolute;left:0;top:0;width: 100%;height:100%;z-index:100;background: #f2f2f2c7;display: none;">
                                        <div class="showDataLoader-container" style="position: absolute;left: 50%;top: 100px;">
                                            <div class="showDataLoader-spinner"></div>
                                            <div class="showDataLoader-text">Loading ...</div>
                                        </div>
                             				</div>
                                        </div>
                                    </div>
                                </form>
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



    <!-- start footer -->

    <?php include("footer.php"); ?>

    <!-- end footer -->




</body>



</html>