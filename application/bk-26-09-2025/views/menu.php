<!-- start header -->
<?php
$data['userData']=$this->setting_model->employeeDetail($this->session->userdata('user_id'));
foreach($data['userData'] AS $menu);
//echo 'report_transfer>'.$menu->report_transfer
?>
<div class="page-header navbar navbar-fixed-top">

<div class="page-header-inner ">

<!-- logo start -->

<div class="page-logo">

<a href="<?php echo base_url('Insurance_car');?>">

<img alt="" src="<?php echo base_url('assets/img/logo.png');?>">

<span class="logo-default">ตรอ.ทรัพย์เจริญเซอร์วิส</span> </a>

</div>

<!-- logo end -->

<div class="row" style="float: left; padding: 10px 0px 0px 20px;">

<div class="col-lg-12 col-md-12">

<?php if($this->session->userdata('user_branch')=='1'){ ?>	
<a href="<?php echo base_url('Insurance_car/search_customer_insurance');?>">
<button type="button" class="btn btn-success btn-lg m-b-10">ค้นหาลูกค้าทั้งหมด</button>
</a>
<?php }else if($this->session->userdata('user_branch')=='2'){ ?>
<?php if($menu->car_check_search_page >0){?>
<a href="<?php echo base_url('Insurance_car/search_customer_inspection');?>">
<button type="button" class="btn btn-primary btn-lg m-b-10">ค้นหาลูกค้าทั้งหมด.</button>
<?php }?>
</a>
<?php }?>
	
<a href="<?php echo base_url('Report_car/report_car_audit_insurance');?>">
<?php if($menu->control_insurance_work > 0){?>
<button type="button" class="btn btn-danger btn-lg m-b-10">ใบสำคัญจ่าย</button>
<?php }?>
</a>

</div>

</div>




<!-- start mobile menu -->

<a href="javascript:;" class="menu-toggler responsive-toggler" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">

<span></span>

</a>

<!-- end mobile menu -->

<!-- start header menu -->

<div class="top-menu">

<ul class="nav navbar-nav pull-right">

<!-- start manage user dropdown -->

<li class="dropdown dropdown-user">

<a href="javascript:;" class="dropdown-toggle" data-bs-toggle="dropdown" data-hover="dropdown" data-close-others="true">

	<img alt="" class="img-circle" src="<?php echo base_url('assets/img/user/user.png');?>" />

	<span id="username" class="username username-hide-on-mobile"><?php echo $this->session->userdata('user_name')?></span>

	<i class="fa fa-angle-down"></i>

</a>

<ul class="dropdown-menu dropdown-menu-default animated jello">

	<li>

		<a href="<?php echo base_url('Setting/change_pass');?>"><i class="icon-user"></i> เปลี่ยนรหัสผ่าน </a>

	</li>								

	<li>

		<a href="<?php echo base_url('login/goLogout')?>"><i class="icon-logout"></i> ออกจากระบบ </a>

	</li>

</ul>

</li>

<!-- end manage user dropdown -->

</ul>

</div>

</div>

<div class="navbar-custom">

<div class="hor-menu hidden-sm hidden-xs">

<ul class="nav navbar-nav">
<li class="nav-item">
 <?php if($this->session->userdata('user_branch')=='1'){ ?>
		<a href="<?php echo base_url('Insurance_car')?>" class="nav-link nav-toggle">

		<i class="fa fa-home"></i>

		<span class="title">ประกันภัยภาคสมัครใจ
		<span class="arrow"></span>

	</a>
<?php }else { ?>
	<a href="<?php echo base_url('Insurance_car')?>" class="nav-link nav-toggle">

		<i class="fa fa-home"></i>

		<span class="title">หน้าแรก ตรอ.</span>

		<span class="arrow"></span>

	</a>
<?php } ?>
</li>
<?php if($menu->money_recipe_main >0){ ?>
	 <li class="mega-menu-dropdown ">
		 <a href="#" class="dropdown-toggle"> <i class="fa fa-cogs" style="padding-right: 25px"></i> บันทึกรับเงิน <i class="fa fa-angle-down"></i> <span class="arrow "></span></a>
		 	<ul class="dropdown-menu">

				<li>
					<div class="mega-menu-content">
						<div class="row">
							<div class="col-md-12">
								<ul class="mega-menu-submenu">
									<?php if($menu->record_receipt > 0){?>
									<li><a href="<?php echo base_url('record_recipe/');?>" class="nav-link"><span class="title">รายการบันทึกรับเงิน</span></a></li>
									<li><a href="<?php echo base_url('record_recipe/record_recipe_add');?>" class="nav-link"><span class="title">หน้าบันทึกรับเงิน</span></a></li>
									<li><a href="<?php echo base_url('record_recipe/report_recieve');?>" class="nav-link"><span class="title">รายงานบันทึกรับเงิน</span></a></li>
									<?php }?>
								</ul>
							
							</div>
						</div>
					</div>
				</li>
		 </ul>
	 </li>
<?php }?>
<?php if($menu->insurance_main >0){ ?>	
<li class="mega-menu-dropdown ">

<a href="#" class="dropdown-toggle"> <i class="fa fa-cogs" style="padding-right: 25px"></i> ประกันรถยนต์/พ.ร.บ./ต.ร.อ. <i class="fa fa-angle-down"></i>							<span class="arrow "></span>

</a>

<ul class="dropdown-menu">

	<li>

		<div class="mega-menu-content">

			<div class="row">

				<div class="col-md-12">

					<ul class="mega-menu-submenu">
<?php /*if($menu->insurance_billing >0){ ?>	
						<li><a href="<?php echo base_url('Insurance_car/insurance_billing');?>" class="nav-link"><span class="title">ใบวางบิล</span></a></li>
<?php }*/?>
	<?php if($menu->act >0){ ?>	
						<li><a href="<?php echo base_url('Insurance_car/work_car_all');?>" class="nav-link"><span class="title">พ.ร.บ.</span></a></li>
<?php }?>
						
						<?php if($menu->tax >0){ ?>	
						<li><a href="<?php echo base_url('Insurance_car/work_car_all');?>" class="nav-link"><span class="title">ต่อภาษี</span></a></li>
<?php }?><?php if($menu->insurance >0){ ?>	
						<li><a href="<?php echo base_url('Insurance_car/Insurance_car');?>" class="nav-link"><span class="title">ประกันภาคสมัครใจ</span></a></li>
<?php }?><?php if($menu->car_check >0){ ?>	
						<li><a href="<?php echo base_url('Insurance_car/work_car_all');?>" class="nav-link"><span class="title">ตรวจสภาพรถ (ตรอ.)</span></a></li>
<?php }?><?php if($menu->car_other >0){ ?>	
						<li><a href="<?php echo base_url('Insurance_car/work_car_all');?>" class="nav-link"><span class="title">บริการ/อื่นๆ</span></a></li>
<?php }?><?php if($menu->car_transport >0){ ?>						
						<li><a href="<?php echo base_url('Insurance_car/work_car_all');?>" class="nav-link"><span class="title">งานขนส่ง</span></a></li>
<?php }?>

<?php if($menu->expenses_add >0){ ?>						
						<li><a href="<?php echo base_url('Insurance_car/expenses_add');?>" class="nav-link"><span class="title">ค่าใช้จ่าย</span></a></li>
<?php }?>
					</ul>

				</div>

			</div>

		</div>

	</li>

</ul>

</li>
<?php }?>
<?php if($menu->insurance_misce >0){ ?>	
<li class="mega-menu-dropdown ">

<a href="" class="dropdown-toggle"> <i class="fa fa-cogs" style="padding-right: 25px"></i> ประกันเบ็ดเตล็ด

	<i class="fa fa-angle-down"></i>

	<span class="arrow "></span>

</a>

<ul class="dropdown-menu">

	<li>

		<div class="mega-menu-content">

			<div class="row">

				<div class="col-md-12">

					<ul class="mega-menu-submenu">
						<?php if($menu->insurance_pa >0){ ?>	
						<li><a href="<?php echo base_url('insurance_other/insurance_other/4');?>" class="nav-link"><span class="title">ประกันอุบัติเหตุ (PA)</span></a></li>
<?php }?>
<?php if($menu->insurance_fire >0){ ?>	
						<li><a href="<?php echo base_url('Insurance_other/insurance_other/5');?>" class="nav-link"><span class="title">ประกันอัคคีภัย</span></a></li>
<?php }?>
						<?php if($menu->insurance_transport >0){ ?>	
						<li><a href="<?php echo base_url('insurance_other/insurance_other/3');?>" class="nav-link"><span class="title">ประกันขนส่ง</span></a></li>
<?php }?>
						<?php if($menu->insurance_travel >0){ ?>	
						<li><a href="<?php echo base_url('insurance_other/insurance_other/2');?>" class="nav-link"><span class="title">ประกันท่องเที่ยว</span></a></li>
<?php }?>
					</ul>

				</div>

			</div>

		</div>

	</li>

</ul>

</li>
<?php }?>
<?php if($menu->report_car >0){ ?>					
<li class="mega-menu-dropdown ">

<a href="" class="dropdown-toggle"> <i class="fa fa-cogs" style="padding-right: 25px"></i> รายงานประกันรถยนต์

	<i class="fa fa-angle-down"></i>

	<span class="arrow "></span>

</a>

<ul class="dropdown-menu">

	<li>

		<div class="mega-menu-content">

			<div class="row">

				<div class="col-md-12">

					<ul class="mega-menu-submenu">												

						<!--<li><a href="<?php //echo base_url('Report_car/report_car_daily_data');?>" class="nav-link"><span class="title">รายงานข้อมูลรายวัน</span></a></li>-->
<?php if($menu->report_other_pay_installment >0){ ?>
						<li><a href="<?php echo base_url('Report_car/report_payment_installment');?>" class="nav-link"><span class="title">รายงานค้างชำระ</span></a></li>
<?php }?>
<?php if($menu->report_other_pay_installment >0){ ?>
						<li><a href="<?php echo base_url('Report_car/report_ins_delete');?>" class="nav-link"><span class="title">รายงานลบข้อมูล</span></a></li>
<?php }?>					
<?php if($menu->report_car_receipt >0){ ?>
						<li><a href="<?php echo base_url('Report_car/report_car_receipt');?>" class="nav-link"><span class="title">รายงานรายรับ</span></a></li>
<?php }?>
<?php if($menu->report_car_agent_commission >0){ ?>
						<li><a href="<?php echo base_url('Report_car/report_car_agent_commission');?>" class="nav-link"><span class="title">รายงานค่าคอมมิชชั่นตัวแทน</span></a></li>
<?php }?>
<?php /*if($menu->report_car_accrual_customer >0){ ?>
						<li><a href="<?php echo base_url('Report_car/report_car_accrual_customer');?>" class="nav-link"><span class="title">รายงานลูกค้าค้างจ่าย</span></a></li>
<?php }*/?>
<?php if($menu->report_car_warning_data >0){ ?>
						<li><a href="<?php echo base_url('Report_car/report_car_warning_data');?>" class="nav-link"><span class="title">รายงานแจ้งเตือนใกล้หมดอายุ</span></a></li>
<?php }?>
<?php if($menu->report_car_policy_cancle >0){ ?>

						<li><a href="<?php echo base_url('Report_car/report_car_policy_cancle');?>" class="nav-link"><span class="title">รายงานยกเลิกประกันภัย/พ.ร.บ.</span></a></li>
<?php }?>
<?php if($menu->report_car_income_agent >0){ ?>
						<li><a href="<?php echo base_url('Report_car/report_code_income');?>" class="nav-link"><span class="title"> เบี้ยสุทธิ โค๊ดกธ. </span></a></li>
<?php }?>
<?php if($menu->additional_income_report >0){ ?>
						<li><a href="<?php echo base_url('Report_car/additional_income_report');?>" class="nav-link"><span class="title"> รายงานรายได้ส่วนเพิ่ม </span></a></li>
<?php }?>						
<?php if($menu->report_car_invoice_agent >0){ ?>
						<li><a href="<?php echo base_url('Report_car/report_car_invoice_agent');?>" class="nav-link"><span class="title">รายงานใบวางบิลตัวแทน</span></a></li>
<?php }?>
<?php if($menu->report_car_payment_insurance >0){ ?>
						<li><a href="<?php echo base_url('Report_car/report_car_payment_insurance');?>" class="nav-link"><span class="title">รายงานใบสำคัญจ่าย</span></a></li>
<?php }?>
					</ul>

				</div>

			</div>

		</div>

	</li>

</ul>

</li>
<?php }?>
<?php if($menu->report_other >0){ ?>						
<li class="mega-menu-dropdown ">

<a href="" class="dropdown-toggle"> <i class="fa fa-cogs" style="padding-right: 25px"></i> รายงานประกันเบ็ดเตล็ด

	<i class="fa fa-angle-down"></i>

	<span class="arrow "></span>

</a>

<ul class="dropdown-menu">

	<li>

		<div class="mega-menu-content">

			<div class="row">

				<div class="col-md-12">

					<ul class="mega-menu-submenu">
<?php if($menu->report_other_daily_data >0){ ?>
						<li><a href="<?php echo base_url('Report_other/report_other_daily_data');?>" class="nav-link"><span class="title">รายงานข้อมูลรายวัน</span></a></li>
<?php }?>
<?php if($menu->report_other_pay_installment_1 >0){ ?>
						<li><a href="<?php echo base_url('Report_other/report_other_pay_installment');?>" class="nav-link"><span class="title">รายงานชำระค่างวด</span></a></li>
<?php }?>
<?php if($menu->report_other_income_agent >0){ ?>
						<li><a href="<?php echo base_url('Report_car/report_code_income');?>" class="nav-link"><span class="title"> เบี้ยสุทธิ โค๊ดกธ. </span></a></li>
<?php }?>
						<?php if($menu->additional_income_report >0){ ?>
						<li><a href="<?php echo base_url('Report_car/additional_income_report');?>" class="nav-link"><span class="title"> รายงานรายได้ส่วนเพิ่ม </span></a></li>
<?php }?>


					</ul>

				</div>

			</div>

		</div>

	</li>

</ul>

</li>
<?php }?>
<?php if($menu->inspection >0){ ?>			

<li class="mega-menu-dropdown ">

<a href="" class="dropdown-toggle"> <i class="fa fa-cogs" style="padding-right: 25px"></i> รายงาน ตรอ.

	<i class="fa fa-angle-down"></i>

	<span class="arrow "></span>

</a>

<ul class="dropdown-menu">

	<li>

		<div class="mega-menu-content">

			<div class="row">

				<div class="col-md-12">

					<ul class="mega-menu-submenu">	
						<?php if($menu->inspection_list >0){ ?>		
						<li><a href="<?php echo base_url('Inspection/inspection_list');?>" class="nav-link"><span class="title">บัญชีรายวัน</span></a></li>
						<?php } ?>
						<?php if($menu->inspection_information >0){ ?>		
						<li><a href="<?php echo base_url('Inspection/inspection_information');?>" class="nav-link"><span class="title">รายงานตรวจสภาพรถผ่านระบบสารสนเทศ</span></a></li>
						 <?php } ?>
							<?php if($menu->inspection_act >0){ ?>		
						<li><a href="<?php echo base_url('Inspection/inspection_act');?>" class="nav-link"><span class="title">รายงานตรวจสภาพรถส่ง พ.ร.บ.</span></a></li>
						<li><a href="<?php echo base_url('Inspection/carcheck_summary');?>" class="nav-link"><span class="title">ใบส่งเงิน ต.ร.อ.</span></a></li>
						<?php } ?>
						<?php if($menu->report_expenses >0){ ?>	
						<li><a href="<?php echo base_url('Report_other/report_expenses');?>" class="nav-link"><span class="title">รายงานรายจ่าย</span></a></li>
						<?php } ?>
						<?php if($menu->report_transfer > 0){ ?>	
						<li><a href="<?php echo base_url('insurance_car/transfer_report');?>" class="nav-link"><span class="title">รายงานโอนเงิน</span></a></li>
						<?php } ?>
						<?php if($menu->report_act_tax_expire > 0){ ?>	
										<li><a href="<?php echo base_url('insurance_car/report_act_tax_expire');?>" class="nav-link"><span class="title">รายงานพรบ/ภาษีหมดอายุ</span></a></li>
						<?php } ?>
						<?php if($menu->carcheck_summarize_daily_report > 0){ ?>	
										<li><a href="<?php echo base_url('inspection/summarize_daily_report');?>" class="nav-link"><span class="title">สรุปรายวันใบส่งเงิน ต.ร.อ.</span></a></li>
						<?php } ?>
						<?php if($menu->input_car_data > 0){ ?>	
										<li><a href="<?php echo base_url('inspection/input_car_data');?>" class="nav-link"><span class="title">วัน เดือน ปี จดทะเบียน</span></a></li>
						<?php } ?>
						
					</ul>

				</div>

			</div>

		</div>

	</li>

</ul>

</li>

<?php }?>
<?php if($menu->setting >0){ ?>					
<li class="mega-menu-dropdown ">

<a href="" class="dropdown-toggle"> <i class="fa fa-cogs" style="padding-right: 25px"></i> ตั้งค่าพื้นฐาน

	<i class="fa fa-angle-down"></i>

	<span class="arrow "></span>

</a>

<ul class="dropdown-menu">

	<li>

		<div class="mega-menu-content">

			<div class="row">

				<div class="col-md-12">

					<ul class="mega-menu-submenu">
<?php if($menu->setting_company_insurance >0){ ?>	
						<li><a href="<?php echo base_url('Setting/setting_company_insurance');?>" class="nav-link"><span class="title">บริษัทประกันภัย</span></a></li>
<?PHP }?>
						<?php if($menu->setting_policy >0){ ?>	

						<li><a href="<?php echo base_url('Setting/setting_policy');?>" class="nav-link"><span class="title">ประเภทกรมธรรม์</span></a></li>
						<?PHP }?>
						<?php if($menu->setting_agent >0){ ?>	
						<li><a href="<?php echo base_url('Setting/setting_agent');?>" class="nav-link"><span class="title">ตัวแทน</span></a></li>
						<?PHP }?>
						<?php if($menu->setting_code_list >0){ ?>
						<li><a href="<?php echo base_url('Setting/setting_code_list');?>" class="nav-link"><span class="title">รายชื่อโค้ด</span></a></li>
						<?PHP }?>
						<?php if($menu->setting_car_brand >0){ ?>
						<li><a href="<?php echo base_url('Setting/setting_car_brand');?>" class="nav-link"><span class="title">ยี่ห้อรถ</span></a></li>
						<?PHP }?>
						<?php if($menu->setting_header >0){ ?>
						<li><a href="<?php echo base_url('Setting/setting_header');?>" class="nav-link"><span class="title">หัวกระดาษ ใบรับเงิน และใบแจ้งหนี้</span></a></li>
						<?PHP }?>
					<?php if($menu->setting_employee >0){ ?>

						<li><a href="<?php echo base_url('Setting/setting_employee');?>" class="nav-link"><span class="title">พนักงาน</span></a></li>	
					<?PHP }?>
					<?php if($menu->setting_permission >0){ ?>

						<li><a href="<?php echo base_url('Setting/setting_employee');?>" class="nav-link"><span class="title">กำหนดสิทธิ์การใช้งาน</span></a></li>
			<?PHP }?>
						<?php if($menu->setting_bookbank >0){ ?>

						<li><a href="<?php echo base_url('Setting/setting_bookbank');?>" class="nav-link"><span class="title">ข้อมูลสมุดบัญชีธนาคาร</span></a></li>
			<?PHP }?>
						<?php if($menu->setting_permission >0){ ?>

						<li><a href="<?php echo base_url('Setting/setting_deduct_percent');?>" class="nav-link"><span class="title">หัก % พ.ร.บ</span></a></li>
			<?PHP }?>
					</ul>
				</div>
	
			</div>

		</div>

	</li>

</ul>

</li>
<?php }?>

</ul>

</div>

</div>



</div>

<!-- end header -->

<!-- start page container -->

<div class="page-container">

<!-- start sidebar menu -->

<div class="sidebar-container">

<div class="sidemenu-container navbar-collapse collapse fixed-menu">

<div id="remove-scroll">

<ul class="sidemenu page-header-fixed p-t-20" data-keep-expanded="false" data-auto-scroll="true"

data-slide-speed="200">

<li class="sidebar-toggler-wrapper hide">

	<div class="sidebar-toggler">

		<span></span>

	</div>

</li>

<li class="sidebar-user-panel">

	<div class="user-panel">

		<div class="profile-usertitle">

			<div class="sidebar-userpic-name">ตรอ.ทรัพย์เจริญเซอร์วิส</div>

		</div>

	</div>

</li>
<li class="nav-item">

	<a href="<?php echo base_url('Insurance_car')?>" class="nav-link nav-toggle">

		<i class="material-icons"></i>

		<span class="title">หน้าแรก</span>

		<span class="arrow"></span>

	</a>
</li>
<?php if($menu->record_receipt >0){?>
	
	<li class="nav-item start">

	<a href="#" class="nav-link nav-toggle"> บันทึกรับเงิน<span class="arrow"></span>

	</a>

	<ul class="sub-menu">									
		<li><a href="<?php echo base_url('record_recipe/');?>" class="nav-link"><span class="title">รายการบันทึกรับเงิน</span></a></li>
		<li><a href="<?php echo base_url('record_recipe/record_recipe_add');?>" class="nav-link"><span class="title">หน้าบันทึกรับเงิน</span></a></li>
		<li><a href="<?php echo base_url('record_recipe/report_recieve');?>" class="nav-link"><span class="title">รายงานบันทึกรับเงิน</span></a></li>
	</ul>

</li>

<?php }?>
<?php if($menu->insurance_main >0){ ?>	
<li class="nav-item start">

	<a href="#" class="nav-link nav-toggle"> <i class="fa fa-cogs" style="padding-right: 25px"></i> ประกันรถยนต์/พ.ร.บ./ต.ร.อ. <span class="arrow"></span>

	</a>

	<ul class="sub-menu">									
<?php /*if($menu->insurance_billing >0){ ?>	
						<li><a href="<?php echo base_url('Insurance_car/insurance_billing');?>" class="nav-link"><span class="title">ใบวางบิล</span></a></li>
<?php }*/?>
	<?php if($menu->act >0){ ?>	
						<li><a href="<?php echo base_url('Insurance_car/work_car_all');?>" class="nav-link"><span class="title">พ.ร.บ.</span></a></li>
<?php }?><?php if($menu->tax >0){ ?>	
						<li><a href="<?php echo base_url('Insurance_car/work_car_all');?>" class="nav-link"><span class="title">ต่อภาษี</span></a></li>
<?php }?><?php if($menu->insurance >0){ ?>	
						<li><a href="<?php echo base_url('Insurance_car/Insurance_car');?>" class="nav-link"><span class="title">ประกันภาคสมัครใจ</span></a></li>
<?php }?><?php if($menu->car_check >0){ ?>	
						<li><a href="<?php echo base_url('Insurance_car/work_car_all');?>" class="nav-link"><span class="title">ตรวจสภาพรถ (ตรอ.)</span></a></li>
<?php }?><?php if($menu->car_other >0){ ?>	
						<li><a href="<?php echo base_url('Insurance_car/work_car_all');?>" class="nav-link"><span class="title">บริการ/อื่นๆ</span></a></li>
<?php }?><?php if($menu->car_transport >0){ ?>						
						<li><a href="<?php echo base_url('Insurance_car/work_car_all');?>" class="nav-link"><span class="title">งานขนส่ง</span></a></li>
<?php }?>
	</ul>

</li>
<?php }?>





<?php if($menu->insurance_misce >0){ ?>	
<li class="nav-item">

	<a href="#" class="nav-link nav-toggle">

		<i class="material-icons"></i>

		<span class="title">ประกันเบ็ดเตล็ด</span>

		<span class="arrow"></span>

	</a>

	<ul class="sub-menu">
<?php if($menu->insurance_pa >0){ ?>	
						<li><a href="<?php echo base_url('insurance_other/insurance_other/4');?>" class="nav-link"><span class="title">ประกันอุบัติเหตุ (PA)</span></a></li>
<?php }?>
<?php if($menu->insurance_fire >0){ ?>	
						<li><a href="<?php echo base_url('Insurance_other/insurance_other/5');?>" class="nav-link"><span class="title">ประกันอัคคีภัย</span></a></li>
<?php }?>
		<?php if($menu->insurance_transport >0){ ?>	
						<li><a href="<?php echo base_url('insurance_other/insurance_other/3');?>" class="nav-link"><span class="title">ประกันขนส่ง</span></a></li>
<?php }?>
		
		<?php if($menu->insurance_travel >0){ ?>	
						<li><a href="<?php echo base_url('insurance_other/insurance_other/2');?>" class="nav-link"><span class="title">ประกันท่องเที่ยว</span></a></li>
<?php }?>
	</ul>

</li>
<?php }?>
	<?php if($menu->report_car >0){ ?>	
<li class="nav-item">

	<a href="#" class="nav-link nav-toggle">

		<i class="material-icons">email</i>

		<span class="title">รายงานประกันรถยนต์</span>

		<span class="arrow"></span>

	</a>

	<ul class="sub-menu">									

		<!--<li><a href="<?php //echo base_url('Report_car/report_car_daily_data');?>" class="nav-link"><span class="title">รายงานข้อมูลรายวัน</span></a></li>-->
<?php if($menu->report_other_pay_installment >0){ ?>
						<li><a href="<?php echo base_url('Report_car/report_payment_installment');?>" class="nav-link"><span class="title">รายงานค้างชำระ</span></a></li>
<?php }?>
<?php if($menu->report_other_pay_installment >0){ ?>
						<li><a href="<?php echo base_url('Report_car/report_ins_delete');?>" class="nav-link"><span class="title">รายงานลบข้อมูล</span></a></li>
<?php }?>	
<?php if($menu->report_car_receipt >0){ ?>
						<li><a href="<?php echo base_url('Report_car/report_car_receipt');?>" class="nav-link"><span class="title">รายงานรายรับ</span></a></li>
<?php }?>
<?php if($menu->report_car_agent_commission >0){ ?>
						<li><a href="<?php echo base_url('Report_car/report_car_agent_commission');?>" class="nav-link"><span class="title">รายงานค่าคอมมิชชั่นตัวแทน</span></a></li>
<?php }?>
<?php /*if($menu->report_car_accrual_customer >0){ ?>
						<li><a href="<?php echo base_url('Report_car/report_car_accrual_customer');?>" class="nav-link"><span class="title">รายงานลูกค้าค้างจ่าย</span></a></li>
<?php }*/?>
<?php if($menu->report_car_warning_data >0){ ?>
						<li><a href="<?php echo base_url('Report_car/report_car_warning_data');?>" class="nav-link"><span class="title">รายงานแจ้งเตือนใกล้หมดอายุ</span></a></li>
<?php }?>
<?php if($menu->report_car_policy_cancle >0){ ?>

						<li><a href="<?php echo base_url('Report_car/report_car_policy_cancle');?>" class="nav-link"><span class="title">รายงานยกเลิกประกันภัย/พ.ร.บ.</span></a></li>
<?php }?>
<?php if($menu->report_car_income_agent >0){ ?>
						<li><a href="<?php echo base_url('Report_car/report_code_income');?>" class="nav-link"><span class="title"> เบี้ยสุทธิ โค๊ดกธ. </span></a></li>
<?php }?>
		<?php if($menu->report_other_income_agent >0){ ?>
						<li><a href="<?php echo base_url('Report_other/report_other_income_agent');?>" class="nav-link"><span class="title"> เบี้ยสุทธิ โค๊ดกธ. </span></a></li>
<?php }?>
	<?php if($menu->additional_income_report >0){ ?>
						<li><a href="<?php echo base_url('Report_car/additional_income_report');?>" class="nav-link"><span class="title"> รายงานรายได้ส่วนเพิ่ม </span></a></li>
<?php }?>
<?php if($menu->report_car_invoice_agent >0){ ?>
						<li><a href="<?php echo base_url('Report_car/report_car_invoice_agent');?>" class="nav-link"><span class="title">รายงานใบวางบิลตัวแทน</span></a></li>
<?php }?>
<?php if($menu->report_car_payment_insurance >0){ ?>
						<li><a href="<?php echo base_url('Report_car/report_car_payment_insurance');?>" class="nav-link"><span class="title">รายงานใบสำคัญจ่าย</span></a></li>
<?php }?>

	</ul>

</li>
<?php }?>
	<?php if($menu->report_other >0){ ?>	
<li class="nav-item">

	<a href="#" class="nav-link nav-toggle">

		<i class="material-icons">email</i>

		<span class="title">รายงานประกันเบ็ดเตล็ด</span>

		<span class="arrow"></span>

	</a>

	<ul class="sub-menu">									
<?php if($menu->report_other_daily_data >0){ ?>
						<li><a href="<?php echo base_url('Report_other/report_other_daily_data');?>" class="nav-link"><span class="title">รายงานข้อมูลรายวัน</span></a></li>
<?php }?>
<?php if($menu->report_other_pay_installment_1 >0){ ?>
						<li><a href="<?php echo base_url('Report_other/report_other_pay_installment');?>" class="nav-link"><span class="title">รายงานชำระค่างวด</span></a></li>
<?php }?>
<?php if($menu->report_other_income_agent >0){ ?>
						<li><a href="<?php echo base_url('Report_other/report_other_income_agent');?>" class="nav-link"><span class="title"> เบี้ยสุทธิ โค๊ดกธ. </span></a></li>
<?php }?>	
	</ul>

</li>
<?php }?>
	<?php if($menu->inspection >0){ ?>		
<li class="nav-item">

	<a href="#" class="nav-link nav-toggle">

		<i class="material-icons"> </i>

		<span class="title">รายงาน ตรอ.</span>

		<span class="arrow"></span>

	</a>

	<ul class="sub-menu">

		<?php if($menu->inspection_list >0){ ?>		
						<li><a href="<?php echo base_url('Inspection/inspection_list');?>" class="nav-link"><span class="title">บัญชีรายวัน</span></a></li>
						<?php } ?>
						<?php if($menu->inspection_information >0){ ?>		
						<li><a href="<?php echo base_url('Inspection/inspection_information');?>" class="nav-link"><span class="title">รายงานตรวจสภาพรถผ่านระบบสารสนเทศ</span></a></li>
						 <?php } ?>
								
							<?php if($menu->inspection_act >0){ ?>		
						<li><a href="<?php echo base_url('Inspection/inspection_act');?>" class="nav-link"><span class="title">รายงานตรวจสภาพรถส่ง พ.ร.บ.</span></a></li>
						<li><a href="<?php echo base_url('Inspection/carcheck_summary');?>" class="nav-link"><span class="title">ใบส่งเงิน ต.ร.อ.</span></a></li>
						<?php } ?>
		<?php if($menu->report_expenses >0){ ?>	
						<li><a href="<?php echo base_url('Report_other/report_expenses');?>" class="nav-link"><span class="title">รายงานรายจ่าย</span></a></li>
						<?php } ?>
		<?php if($menu->report_transfer > 0){ ?>	
						<li><a href="<?php echo base_url('insurance_car/transfer_report');?>" class="nav-link"><span class="title">รายงานโอนเงิน</span></a></li>
		<?php } ?>
		<?php if($menu->report_act_tax_expire > 0){ ?>	
						<li><a href="<?php echo base_url('insurance_car/report_act_tax_expire');?>" class="nav-link"><span class="title">รายงานพรบ/ภาษีหมดอายุ</span></a></li>
		<?php } ?>
		<?php if($menu->carcheck_summarize_daily_report > 0){ ?>	
										<li><a href="<?php echo base_url('inspection/summarize_daily_report');?>" class="nav-link"><span class="title">สรุปรายวันใบส่งเงิน ต.ร.อ.</span></a></li>
						<?php } ?>
		<?php if($menu->input_car_data > 0){ ?>	
										<li><a href="<?php echo base_url('inspection/input_car_data');?>" class="nav-link"><span class="title">วัน เดือน ปี จดทะเบียน</span></a></li>
						<?php } ?>
	</ul>

</li>
<?php }?>	
<?php if($menu->setting >0){ ?>	
<li class="nav-item">

	<a href="#" class="nav-link nav-toggle">

		<i class="material-icons">vpn_key</i>

		<span class="title">ตั้งค่าพื้นฐาน</span>

		<span class="arrow"></span>

	</a>

	<ul class="sub-menu">
<?php if($menu->setting_company_insurance >0){ ?>	
						<li><a href="<?php echo base_url('Setting/setting_company_insurance');?>" class="nav-link"><span class="title">บริษัทประกันภัย</span></a></li>
<?php }?>
						<?php if($menu->setting_policy >0){ ?>	

						<li><a href="<?php echo base_url('Setting/setting_policy');?>" class="nav-link"><span class="title">ประเภทกรมธรรม์</span></a></li>
						<?PHP }?>
						<?php if($menu->setting_agent >0){ ?>	
						<li><a href="<?php echo base_url('Setting/setting_agent');?>" class="nav-link"><span class="title">ตัวแทน</span></a></li>
						<?PHP }?>
						<?php if($menu->setting_code_list >0){ ?>
						<li><a href="<?php echo base_url('Setting/setting_code_list');?>" class="nav-link"><span class="title">รายชื่อโค้ด</span></a></li>
						<?PHP }?>
						<?php if($menu->setting_car_brand >0){ ?>
						<li><a href="<?php echo base_url('Setting/setting_car_brand');?>" class="nav-link"><span class="title">ยี่ห้อรถ</span></a></li>
						<?PHP }?>
						<?php if($menu->setting_header >0){ ?>
						<li><a href="<?php echo base_url('Setting/setting_header');?>" class="nav-link"><span class="title">หัวกระดาษ ใบรับเงิน และใบแจ้งหนี้</span></a></li>
						<?PHP }?>
					<?php if($menu->setting_employee >0){ ?>

						<li><a href="<?php echo base_url('Setting/setting_employee');?>" class="nav-link"><span class="title">พนักงาน</span></a></li>	
					<?PHP }?>
	
					<?php if($menu->setting_permission >0){ ?>

						<li><a href="<?php echo base_url('Setting/setting_employee');?>" class="nav-link"><span class="title">กำหนดสิทธิ์การใช้งาน</span></a></li>
					<?PHP }?>
						
	</ul>

</li>
<?PHP }?>
</ul>

</div>

</div>

</div>

</div>

<!-- end sidebar menu -->

