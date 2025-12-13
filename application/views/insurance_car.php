<!DOCTYPE html>

<html lang="en">

<!-- BEGIN HEAD -->



<head>

<?php include("header.php"); ?>

</head>

<!-- END HEAD 

xxx<?php echo $this->session->userdata('user_id')?>-->

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md page-full-width header-white dark-sidebar-color logo-dark">

<div class="page-wrapper">

<!-- start header -->

<?php include("menu.php"); ?>

<!-- end sidebar menu -->

<!-- start page content -->

<div class="page-content-wrapper">

<div class="page-content">	





<div class="row">
<?php if($this->session->userdata('user_branch')=='1'){ //ประกันภัย?>
	<div class="col-md-12">

		<div class="card card-topline-red">

			<div class="card-head">

				<header>รายการประกันภัย</header>                                    
				
			</div>

			<div class="card-body ">
               <?php if($menu->insurance_dashboard > 0){?>
				<div class="col-md-12 col-sm-12 col-12">

						<div class="btn-group">
							<a href="<?php echo base_url('Insurance_car/work_insurance_add');?>" class="nav-link">
								<button id="addRow1" class="btn btn-success btn-lg m-b-10"> <i class="fa fa-plus"></i> เพิ่มลูกค้ารายใหม่ </button>
							</a>
						</div>
					<!--<div class="btn-group">
						<a href="<?php echo base_url('Insurance_car/insurance_billing');?>" > 
								<button type="button" class="btn btn-info btn-lg m-b-10"><i class="fa fa-plus"></i> ใบวางบิลบริษัท </button>
							</a>
						</div>-->
						<div class="btn-group">
						<a href="<?php echo base_url('Insurance_car2/ins_control_dashboard');?>" > 
								<button type="button" class="btn btn-primary btn-lg m-b-10"><i class="fa fa-th-list"></i> ใบวางบิลบริษัท</button>
							</a>
						</div>
						<div class="btn-group">
						<a href="<?php echo base_url('Insurance_car2/agent_control_dashboard');?>" > 
								<button type="button" class="btn btn-info btn-lg m-b-10"><i class="fa fa-th-list"></i> ใบวางบิลตัวแทน </button>
							</a>
						</div>
					<div class="btn-group">
						<a class="btn btn-warning btn-lg m-b-10" href="<?php echo base_url('Insurance_car2/anticipate_customer')?>">ลูกค้ามุ่งหวัง</a>
					</div>
				  </div>
				<?php include("dashboard_insurance.php")?>
				
			   <?php }else{ ?>
				      <div class="row p-b-20">
						<h1 align="center">กรุณาเลือกเมนูเพื่อทำงาน</h1>
					  </div>
				<?php }?>
				
			</div>

		</div>

	</div>
<?php }else  if($this->session->userdata('user_branch')=='2'){  //ตรอ?>
	<div class="col-md-12">

		<div class="card card-topline-red">

			<div class="card-head">

				<header>รายการ ต.ร.อ.</header>                                    

			</div>

			<div class="card-body ">
               <?php if($menu->act_dashboard > 0){?>
				<div class="row p-b-20">

					<div class="col-md-3 col-sm-2 col-3">

						<div class="btn-group">

							<a href="<?php echo base_url('Insurance_car/work_car_all');?>" class="nav-link">

								<button id="addRow1" class="btn btn-info btn-lg m-b-10"> <i class="fa fa-plus"></i> เพิ่มลูกค้ารายใหม่ </button>

							</a>

						</div>

					</div>



					<div class="col-md-9 col-sm-9 col-9">



							<div class="card-body">

								<form class="form-horizontal">

									<div class="form-group row">

										<label class="col-sm-2 control-label">วันทำรายการ</label>

										<div class="col-sm-2">

											<input type="text" id="startDate" name="startDate" class="form-control datepicker" readonly value="<?php echo $startday?>">
										</div>
										-
										<div class="col-sm-2">

											<input type="text" id="endDate" name="endDate" class="form-control datepicker" value="<?php echo $endday?>" readonly>

										</div>															



										<div class="col-sm-2">
	&nbsp;
	<button type="button" class="btn btn-info btn-sm" onClick="showWork()">ตกลง</button>
<?php //echo $startday." ".$endday?>
										</div>

									</div>

								</form>		

							</div>



					</div>

					
				</div>
				<div id="showData"></div>
			   <?php }else{ ?>
				      <div class="row p-b-20">
						<h1 align="center">กรุณาเลือกเมนูเพื่อทำงาน</h1>
					  </div>
				<?php }?>
				
			</div>

		</div>

	</div>
<?php }?>
</div>

</div>

</div>

<!-- end page content -->



<!-- start footer -->	 

<?php include("footer.php"); ?>

<!-- end footer -->



</body>



</html>