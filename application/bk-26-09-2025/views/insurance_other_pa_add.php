<div class="page-content">
				<div class="page-bar">
					<div class="page-title-breadcrumb">
						<div class="pull-left">
							<div class="page-title"><?php echo $insuranceTitle?>&nbsp;</div>
						</div>
						
						
						
						<ol class="breadcrumb page-breadcrumb pull-right">
							<li><a href="<?php echo base_url('Insurance_other/work_insurance_other_add/').$selectType?>" class="btn btn-info btn-sm">
				<i class="fa fa-plus"></i> เพิ่มลูกค้ารายใหม่
				</a></li>
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
											<a href="#tab4-panel" class="mdl-tabs__tab is-active text-danger"><i class="fa fa-user"></i> ข้อมูลลูกค้า/ข้อมูลรถ/ข้อมูลประกันภัย</a></i>
											<a href="#tab5-panel" class="mdl-tabs__tab  text-danger"><i class="fa fa-credit-card"></i> การชำระเงิน</a>
											<a href="#tab6-panel" class="mdl-tabs__tab text-primary"><i class="fa fa-address-card-o"></i> ที่อยู่ส่งเอกสาร</a>
											<!--<a href="#tab7-panel" class="mdl-tabs__tab text-primary"><i class="fa fa-file-text-o"></i> สรุปรายการ/สั่งพิมพ์</a>
											<a href="#tab8-panel" class="mdl-tabs__tab text-primary"><i class="fa fa-files-o"></i> ใบคำขอประกัน</a>
											<a href="#tab9-panel" class="mdl-tabs__tab text-primary"><i class="fa fa-files-o"></i> ใบแจ้งเตือนต่อประกัน</a>-->
										</div>
										<div class="mdl-tabs__panel is-active p-t-20" id="tab4-panel">
											
											<form id="insuranceForm" name="insuranceForm" method="post">
											<?php //include("insurance_customer_other_insurance.php");
												  include("insurance_home_form.php");
												 // include("work_car_compulsory_insurance.php");
												  //include("work_car_tax_insurance.php");
												 // include("work_car_inspection_insurance.php");
												  
											?>
											
											<div class="form-group row" style="padding-top: 3px; padding-left: 20px;">
											   <label class="col-sm-2 control-label text-danger">ใบเตือน</label><div class="col-sm-4">
												<input type="checkbox" id="recieve_warning" name="recieve_warning" value='1' <?php //echo $check_recieve_warning?> onclick="uncheckRecieve('not_recieve_warning','recieve_warning')" > รับแล้ว &nbsp;&nbsp;&nbsp;
												<input type="checkbox" id="not_recieve_warning" name="not_recieve_warning"  value='1' <?php //echo $check_not_recieve_warning ?> onclick="uncheckRecieve('recieve_warning','not_recieve_warning')"  > ยังไม่รับ &nbsp;&nbsp;&nbsp;
												<input type="checkbox"  id="recieve_warning_yes" name="recieve_warning_yes"  value='1' <?php //echo $recieve_warning_yes ?>> กรมธรรม์มาแล้ว
										
												</div>	
											</div>
											<div class="form-group row" style="padding-top: 3px; padding-left: 20px;">
												<div class="col-sm-2 text-primary">หมายเหตุ</div>
												<div class="col-sm-4"><textarea rows="4" id="insurance_remark" name="insurance_remark" class="form-control"><?php //echo $insurance_remark?></textarea></div>
												<div class="col-sm-6"></div>
											</div>
									
											<div class="form-group" style="padding-top: 50px;">
												
												
												<input type="hidden" name="insWorkID" id="insWorkID" class="workID" value="<?php echo $workID?>">
												<input type="hidden" name="ins_date_work"  id="ins_date_work"> 
												<input type="hidden" name="date_work"  id="date_work"> 
												<input type="hidden" name="agent_id"  id="agent_id"> 
												<div class="col-md-12" style="text-align: center">
													<button type="button" class="btn btn-info" onClick="SaveInsurance()">บันทึกข้อมูล</button>
												</div>
												</div>
											</form>
										</div>
										<div class="mdl-tabs__panel p-t-20" id="tab5-panel">
											<?php  //include("work_insurance_payment.php");?>
										</div>
										<div class="mdl-tabs__panel p-t-20" id="tab6-panel">
										<?php //include("work_car_address.php"); ?>
											
										</div>
										<!--<div class="mdl-tabs__panel p-t-20" id="tab7-panel">
											<?php //include("work_car_summary_form.php"); ?>
										</div>
										<div class="mdl-tabs__panel p-t-20" id="tab8-panel">
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