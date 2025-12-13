<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
	<?php include("header.php"); ?>
	<style>
		table,
		td,
		th {
			border: 1px solid #C5C5C5;
		}
		html,
		body {
			width: 100%;
			height: 100%;
			margin: 0;
			padding: 0;
			overflow-x: hidden;
		}
		.txt-center {
			text-align: center;
		}
		.txt-right {
			text-align: right;
		}

#printAreaOnly {
   display : none;
  
}

@media print {
    #printAreaOnly {
       display : block;
	  
    }
	
	
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
						<div class="pull-left">
							<div class="page-title">ข้อมูล ต.ร.อ.</div>
						</div>
						
						<div class="page-title-breadcrumb pull-left">
							<ol class="breadcrumb page-breadcrumb" style="background-color: #8bc34a; padding: 15px; margin-left: 20px;color: #000;font-size: 16px;">
								<li><i class="fa fa-user" style="color:#121212"></i> <span id="showCustName" style="color: black"><?php echo $cust_name?></span></li>
								<li style="padding-left: 20px;"><i class="fa fa-car" style="color:#121212"></i> <span id="car_regist" style="color: black"><?php echo $vehicle_regis?></span></li>
								<li style="padding-left: 20px;"><i class="fa fa-phone" style="color:#121212"></i><span id="cust_Telephone" style="color: black"><?php echo $cust_telephone_1." ".$cust_telephone_2?></span></li>
							</ol>
						</div>
						
						<ol class="breadcrumb page-breadcrumb pull-right">
							<?php if($custID==''){ ?>
							<button id="btnSearchCust" type="button" class="btn btn-danger btn-md" onClick="openSearchForm()"><i class="fa fa-search fa-1x">ค้นหาลูกค้า</i></button> 
							<?php }?>
							
							&nbsp;&nbsp;&nbsp;
							<li>วันที่ทำรายการ</li>
							<li><input type="text" class="form-control datepicker" id="ins_date_work" placeholder="" name="ins_date_work" value="<?php echo $dateWork?>"></li>
							<?php if(($this->session->userdata('user_branch')=='1')||($this->session->userdata('user_branch')=='0')){?>
							<li style="padding-left: 15px;">เลือกชื่อตัวแทน</li>
							<li>
								<select id="agent_id" name="agent_id" class="form-select" aria-label="">
									<!--<option value="x">--เลือกชื่อตัวแทน--</option>-->
									<?php foreach($listAgent AS $agent){?>
									<option value="<?php echo $agent->id?>" <?php if($agent_id==$agent->id){ echo "selected";}?>  ><?php echo $agent->agent_name?></option>
									<?php }?>
								</select>
							</li>
							<?php }else{ echo '<input type="hidden" name="agent_id" id="agent_id" value="1">';}?>
						</ol>
						
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="panel tab-border card-box">
							<header class="panel-heading panel-heading-gray custom-tab">
								<ul class="nav nav-tabs">
									<li class="nav-item">
										<a href="#customer" data-bs-toggle="tab" class="active"> <i class="fa fa-user"></i> ข้อมูลลูกค้า/ข้อมูลรถ</a>
									</li>
									<?php /*?>
									<li class="nav-item">
										<a href="#work" data-bs-toggle="tab"> <i class="fa fa-car"></i> ข้อมูลทำงาน </a>
									</li>
									
									<?php if($menu->payment > 0){ ?>
									<li class="nav-item">
										<a href="#payment" data-bs-toggle="tab"> <i class="fa fa-credit-card"></i> การชำระเงิน</a>
									</li>
									<?php } ?>  <?php */?>
									<?php  if($menu->mailing_address > 0){ ?>
									<li class="nav-item">
										<a href="#address" data-bs-toggle="tab"> <i class="fa fa-address-card-o"></i> ที่อยู่ส่งเอกสาร</a>
									</li>
									<?php } ?>  
									<?php  if($menu->summary_print_order > 0){ ?>
									<li class="nav-item">
										<a href="#summary_form" data-bs-toggle="tab"> <i class="fa fa-file-text-o"></i> สรุปรายการ/สั่งพิมพ์</a>
									</li>
									<?php } ?>  
									<?php  if($menu->ins_application_form > 0){ ?>
									<li class="nav-item">
										<a href="#application_form" data-bs-toggle="tab"> <i class="fa fa-files-o"></i> ใบคำขอประกัน</a>
									</li>
									<?php } ?>  
									<?php  if($menu->insurance_cover > 0){ ?>
									<li class="nav-item">
										<a href="#insurance_cover" data-bs-toggle="tab"> <i class="fa fa-files-o"></i> ใบแจ้งเตือนต่อประกัน</a>
									</li>
									<?php } ?>  
									<?php  if($menu->cover_inspection > 0){ ?>
									<li class="nav-item">
										<a href="#inspection_cover" data-bs-toggle="tab"> <i class="fa fa-files-o"></i> ใบปะหน้า ตรอ.</a>
									</li>
									<?php } ?>  
									<?php  if($menu->invoice > 0){ ?>
									<li class="nav-item">
										<a href="#invoice" data-bs-toggle="tab"> <i class="fa fa-file-text"></i> ใบแจ้งหนี้</a>
									</li>
									<?php } ?>  
									<?php  if($menu->receipt > 0){ ?>
									<li class="nav-item">
										<a href="#receipt" data-bs-toggle="tab"> <i class="fa fa-file-text"></i> ใบรับเงิน</a>
									</li>
									<?php } ?>  
									
								</ul>
							</header>
							<div class="panel-body">
								<div class="tab-content">
									
									<div class="tab-pane active" id="customer">
										<?php //include("work_car_customer.php"); ?>
										<form id="carcheck_all" name="carcheck_all" method="post">
										<?php
											$bg_red1="#FF8486;";$fontWhite1="#FFF"; 
											$hilightRed ='background-color:#FF8486;color:white';
											
											
											  include("work_car_customer.php");
											if($menu->car_check>'0'){
												 include("work_car_inspection.php");
											}
											if($menu->act>'0'){
												 include("work_car_compulsory.php"); 
											}
											if($menu->tax>'0'){
											      include("work_car_tax.php");
											}
											if($menu->car_other>'0'){
											      include("work_car_service.php");
											}
											if($menu->payment>'0'){
											      include("work_car_check_payment.php");
											}
											
											  
											 // include("work_car_service.php"); 
											//  include("work_car_check_payment.php");
										?>
										<div class="form-group row" style="text-align: center; padding-top: 20px;">
										<div class="col-md-12" style="text-align: center">
										<input type="hidden" id="workID2" name="workID2" value="<?php echo $workID?>">
										
										<?php $txtBtDisable="";
										if(($menu->act=='1') || ($menu->tax=='1')|| ($menu->car_check=='1')|| ($menu->payment=='1')){
											//$txtBtDisable = "disabled"; disabled
											$txtBtDisable = "style='display:none'";
										}	
									   ?>	
											
										<button type="button" class="btn btn-info" onClick="SaveToRoOr()"  <?php echo $txtBtDisable?> d >บันทึก / แก่ไข ข้อมูล</button>
										&nbsp;&nbsp;&nbsp;
										<button id="printCarcheckWork" type="button" class="btn btn-success" onClick="printCarcheckCover()" >
												พิมพ์ใบส่งงาน
										</button>
									    </div>
									    </div>
											
									</form>	
										<div id="showPrint" class="form-group row" style="text-align: center; padding-top: 20px;">
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="modal fade" id="largeModel" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
						<div class="modal-dialog modal-xl" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="exampleModalLabel">Modal title</h4>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<div class="row">
												<div class="col-md-12 col-sm-12">
													<div class="card">
														<div class="card-head">
															<header>ค้นหาลูกค้า</header>
														</div>
														<div class="card-body"  >
															<form class="row">
																<div class="col-sm-3">
																	<label class="control-label">ชื่อ-นามสกุล</label>
																	<input type="text" class="form-control" id="s_custname" name="s_custname">	
																</div>
																
																
																<div class="col-sm-3">
																	<label class="control-label">ชื่อเล่น</label>
																	<input type="text" class="form-control" id="s_cust_nickname">													
																</div>
															
																<div class="col-sm-3">
																	<label class="control-label">ทะเบียนรถ</label>
																	<input type="text" class="form-control" id="s_registration" name="s_registration">													
																</div>
																
																
																<div class="col-sm-3">																	
																	<button type="button" class="btn btn-danger" style="margin-top: 25px; padding: 5px 30px;" onClick="searchCustomer2();"><i class="fa fa-search"></i> ค้นหา</button>
																</div>
															</form>
														</div>
													</div>
												</div>
												
					</div>
					
								<div class="row">
									<div class="col-md-12">
										<div class="card card-topline-red">

											<div class="card-body ">
											  <div id="showSearchData"></div>
											</div>
										</div>
										
									</div>
								</div>
									
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary" style="display: none">Save</button>
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