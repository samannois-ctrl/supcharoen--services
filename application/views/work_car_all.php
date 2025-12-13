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
							<div class="page-title">ข้อมูลประกันภัยรถยนต์</div>
						</div>
						
						<div class="page-title-breadcrumb pull-left">
							<ol class="breadcrumb page-breadcrumb" style="background-color: #8bc34a; padding: 15px; margin-left: 20px;color: #000;font-size: 16px;">
								<li><i class="fa fa-user" style="color:#121212"></i> <span id="showCustName" style="color: black"><?php echo $cust_name?></span></li>
								<li style="padding-left: 20px;"><i class="fa fa-car" style="color:#121212"></i> <span id="car_regist" style="color: black"><?php echo $vehicle_regis?></span></li>
								<li style="padding-left: 20px;"><i class="fa fa-phone" style="color:#121212"></i><span id="cust_Telephone" style="color: black"><?php echo $cust_telephone_1." ".$cust_telephone_2?></span></li>
							</ol>
						</div>
						
						<ol class="breadcrumb page-breadcrumb pull-right">
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
									<?php */?>
									<?php if($menu->payment > 0){ ?>
									<li class="nav-item">
										<a href="#payment" data-bs-toggle="tab"> <i class="fa fa-credit-card"></i> การชำระเงิน</a>
									</li>
									<?php } ?>  
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
										<?php include("work_car_customer.php"); ?>
										
										<?php if($menu->car_check > 0){ include("work_car_inspection.php"); }?>
										
										<?php //if($menu->car_other > 0){ include("work_car_service.php"); } //ยกเลิกไปใช้แบบฟอร์มในบริการต่อภาษี?>
										
										<?php if($menu->act > 0){  include("work_car_compulsory.php"); }?>
										
										<?php if($menu->tax > 0){ include("work_car_tax.php"); }?>
										
										<?php if($menu->insurance > 0){ include("work_car_voluntary.php"); }?>
										
										<?php if($menu->car_transport > 0){include("work_car_transport.php"); } ?>
										
									</div>
									<?php /*?>
									<div class="tab-pane" id="work">
										
										<?php if($menu->act > 0){  include("work_car_compulsory.php"); }?>
										
										<?php if($menu->tax > 0){ include("work_car_tax.php"); }?>
										
										<?php if($menu->insurance > 0){ include("work_car_voluntary.php"); }?>
										
										<?php if($menu->car_check > 0){ include("work_car_inspection.php"); }?>
										
										<?php if($menu->car_other > 0){ include("work_car_service.php"); }?>
										
										<?php if($menu->car_transport > 0){include("work_car_transport.php"); } ?>
										
									</div>
									<?php */ ?>
									<?php if($menu->payment > 0){ ?>
									<div class="tab-pane" id="payment">
										<?php include("work_car_payment.php"); ?>
									</div>
									<?php }?>
									<?php  if($menu->mailing_address > 0){ ?>
									<div class="tab-pane" id="address">
										<?php include("work_car_address.php"); ?>
									</div>
									<?php }?>
									<?php  if($menu->summary_print_order > 0){ ?>
									<div class="tab-pane" id="summary_form">
										<?php include("work_car_summary_form.php"); ?>
									</div>
									<?php }?>
									<?php  if($menu->ins_application_form > 0){ ?>
									<div class="tab-pane" id="application_form">
										<?php include("work_car_application_form.php"); ?>
									</div>
									<?php }?>
									<?php  if($menu->insurance_cover > 0){ ?>
									<div class="tab-pane" id="insurance_cover">
										<?php include("work_car_insurance_cover.php"); ?>
									</div>
									<?php }?>
									<?php  if($menu->cover_inspection > 0){ ?>
									<div class="tab-pane" id="inspection_cover">
										<?php include("work_car_inspection_cover.php"); ?>
									</div>
									<?php }?>
									<?php  if($menu->invoice > 0){ ?>
									<div class="tab-pane" id="invoice">
										<?php include("work_car_invoice.php"); ?>
									</div>
									<?php }?>
									<?php  if($menu->receipt > 0){ ?>
									<div class="tab-pane" id="receipt">
										<?php include("work_car_receipt.php"); ?>
									</div>
									<?php }?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end page content -->
	</div>
	<!-- start footer -->
	<?php include("footer.php"); ?>
	<!-- end footer -->
</body>
</html>