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
		<form id="insuranceOtherForm" name="insuranceOtherForm" method="post" enctype="multipart/form-data">
		<div class="page-content-wrapper">
		
						<div class="page-content">
				<div class="page-bar">
					<div class="page-title-breadcrumb">
						<div class="pull-left">
							<div class="page-title"><?php echo $insuranceTitle?>&nbsp;
							<a href="<?php echo base_url('insurance_other/insurance_other/').$selectType?>" class="btn btn-info    btn-lg m-b-10"><i class="fa fa-list"></i> หน้ารวม<?php echo $insuranceTitle?></a>	
							&nbsp;&nbsp;
							<a href="<?php echo base_url('Insurance_other/work_insurance_other_add/').$selectType?>" class="btn btn-success  btn-lg m-b-10 "><i class="fa fa-plus"></i> เพิ่มลูกค้ารายใหม่</a>
							&nbsp;	
							<button type="button" class="btn btn-lg m-b-10 btn-info" onclick="printInsuranceOtherPayment('cover')">พิมพ์ใบปะหน้า</button>	
							</div>
							
						</div>
						
						
						
						<ol class="breadcrumb page-breadcrumb pull-right">
							
							<li>วันที่ทำรายการ</li>
							<li><input type="text" class="form-control datepicker" id="ins_date_work" placeholder="" name="ins_date_work" value="<?php echo $dateWork?>"></li>
							
						</ol>
						
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="panel tab-border card-box">
							<div class="card-body ">
									<div class="mdl-tabs mdl-js-tabs">
										<div class="mdl-tabs__tab-bar tab-left-side">
											<a href="#tab4-panel" class="mdl-tabs__tab is-active text-danger"><i class="fa fa-user"></i> ข้อมูลลูกค้า/ข้อมูลประกันภัย</a></i>
											<a href="#tab5-panel" class="mdl-tabs__tab  text-danger"><i class="fa fa-credit-card"></i> การชำระเงิน</a>
											<a href="#tab6-panel" class="mdl-tabs__tab text-primary"><i class="fa fa-address-card-o"></i> ที่อยู่ส่งเอกสาร</a>
											<a href="#tab7-panel" class="mdl-tabs__tab text-primary"><i class="fa fa-file-text-o"></i> ไฟล์รูป</a>
											<!--<a href="#tab8-panel" class="mdl-tabs__tab text-primary"><i class="fa fa-files-o"></i> ใบคำขอประกัน</a>
											<a href="#tab9-panel" class="mdl-tabs__tab text-primary"><i class="fa fa-files-o"></i> ใบแจ้งเตือนต่อประกัน</a>-->
										</div>
										<div class="mdl-tabs__panel is-active p-t-20" id="tab4-panel">
											
											
											<?php //include("insurance_customer_other_insurance.php");
												   $insuranceTypeName = '';
												   $insuranceTypeName = 'ยอดชำระ '.$insuranceTitle;
								                   switch($selectType){
													   case "4" :
														   $this->load->view('insurance_pa_form');
													   break;													  
													   case "5" :
														   $this->load->view('insurance_home_form');
													   break;
													   case "3" :
														   $this->load->view('insurance_transport_form');
													   break;
													   case "2" :
														   $this->load->view('insurance_travel_form');
													   break;
												   } 

											?>
											
											<div class="form-group row" style="padding-top: 3px; padding-left: 20px;">
											   <label class="col-sm-2 control-label text-danger">ใบเตือน</label><div class="col-sm-4">
												<input type="checkbox" id="recieve_warning" name="recieve_warning" value='1' <?php if($recieve_warning==1){echo "checked";}?>  > รับแล้ว &nbsp;&nbsp;&nbsp;
												<input type="checkbox" id="not_recieve_warning" name="not_recieve_warning"  value='1' <?php if($not_recieve_warning==1){echo "checked";}?>  > ยังไม่รับ &nbsp;&nbsp;&nbsp;
												<input type="checkbox"  id="recieve_warning_yes" name="recieve_warning_yes"  value='1' <?php if($recieve_warning_yes==1){echo "checked";}?>> กรมธรรม์มาแล้ว
										
												</div>	
											</div>
											<div class="form-group row" style="padding-top: 3px; padding-left: 20px;">
												<div class="col-sm-2 text-primary">หมายเหตุ</div>
												<div class="col-sm-4"><textarea rows="4" id="insurance_remark" name="insurance_remark" class="form-control"><?php echo $insurance_remark?></textarea></div>
												<div class="col-sm-6"></div>
											</div>
									
											<div class="form-group" style="padding-top: 50px;">
												
												
												<input type="hidden" name="workID" id="workID" class="workID" value="<?php echo $workID?>">
												<input type="hidden" name="Insurance_otherID" id="Insurance_otherID" class="workID" value="<?php echo $Insurance_otherID?>">
												<input type="hidden" name="get_ins_date_work"  id="get_ins_date_work"> 
												<input type="hidden" name="selectType"  id="selectType" value="<?php echo $selectType?>"> 
																							
											
												<div class="col-md-12" style="text-align: center">
													<button type="button" class="btn btn-info" onClick="SaveInsuranceOther()">บันทึกข้อมูล</button>
												</div>
												</div>
										
										</div>
										<div class="mdl-tabs__panel p-t-20" id="tab5-panel">
											<?php  include("work_insurance_payment_other.php");?>
											
										</div>
								<?php ?>
										<div class="mdl-tabs__panel p-t-20" id="tab6-panel">
										 <div class="row">
											<?php include("work_other_insurance_address.php"); ?>
		
	                                     </div>
											
										</div>
								<?php ?>
										<div class="mdl-tabs__panel p-t-20" id="tab7-panel">
											<?php include("work_insurance_image.php"); ?>
										</div>
										<!--<div class="mdl-tabs__panel p-t-20" id="tab8-panel">
											<?php //include("work_car_application_form.php"); ?>
										</div>
										<div class="mdl-tabs__panel p-t-20" id="tab9-panel">
											<?php //include("work_car_insurance_cover.php"); ?>
										</div>-->
									</div>
								</div>
							
							
					</div>
				</div>
			</div>
			
			<!--modal-->
			
			<div class="modal fade" id="exampleModalLong" tabindex="-1" aria-labelledby="exampleModalLongTitle" style="display: none;" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="exampleModalLongTitle">Modal title</h4>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body"></div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
									<!--<button type="button" class="btn btn-primary">Save changes</button>-->
								</div>
							</div>
						</div>
					</div>
			<!--//modal-->
			
		</div>
		     
		<!-- end page content -->
		</div>
		</form>
	<!-- start footer -->
	<?php include("footer.php"); ?>
	<!-- end footer -->
</body>
</html>