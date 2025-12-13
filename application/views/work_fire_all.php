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

							<div class="page-title">ข้อมูลประกันอัคคีภัย</div>

						</div>

						<div class="page-title-breadcrumb pull-left">

							<ol class="breadcrumb page-breadcrumb" style="background-color: #8bc34a; padding: 15px; margin-left: 20px;color: #000;font-size: 16px;">

								<li><i class="fa fa-user" style="color:#121212"></i> นายแจ๊คสัน หวัง</li>

								<li style="padding-left: 20px;"><i class="fa fa-car" style="color:#121212"></i> รวย 999 กทม.</li>

								<li style="padding-left: 20px;"><i class="fa fa-phone" style="color:#121212"></i> 099-999-9999</li>

							</ol>

						</div>

						<ol class="breadcrumb page-breadcrumb pull-right">

							<li>วันที่ทำรายการ</li>

							<li><input type="date" class="form-control" id="" placeholder=""></li>

							<li style="padding-left: 15px;">เลือกชื่อผู้ขาย</li>

							<li>

								<select class="form-select" aria-label="">

									<option value="0">เลือกชื่อผู้ขาย</option>

									<option value="1">AAAAAA</option>

									<option value="2">BBBBBB</option>

								</select>

							</li>

						</ol>

					</div>

				</div>

				<div class="row">

					<div class="col-md-12 col-sm-12">

						<div class="panel tab-border card-box">

							<header class="panel-heading panel-heading-gray custom-tab">

								<ul class="nav nav-tabs">

									<li class="nav-item">

										<a href="#work" data-bs-toggle="tab" class="active"> <i class="fa fa-car"></i> ข้อมูลการทำประกัน</a>

									</li>

									<li class="nav-item">

										<a href="#payment" data-bs-toggle="tab"> <i class="fa fa-credit-card"></i> การชำระเงิน</a>

									</li>

									<li class="nav-item">

										<a href="#address" data-bs-toggle="tab"> <i class="fa fa-address-card-o"></i> ที่อยู่ส่งเอกสาร</a>

									</li>

									<li class="nav-item">

										<a href="#summary_form" data-bs-toggle="tab"> <i class="fa fa-file-text-o"></i> สรุปรายการ/สั่งพิมพ์</a>

									</li>																	

									<li class="nav-item">

										<a href="#invoice" data-bs-toggle="tab"> <i class="fa fa-file-text"></i> ใบแจ้งหนี้</a>

									</li>

									<li class="nav-item">

										<a href="#receipt" data-bs-toggle="tab"> <i class="fa fa-file-text"></i> ใบรับเงิน</a>

									</li>

								</ul>

							</header>

							<div class="panel-body">

								<div class="tab-content">									

									<div class="tab-pane active" id="work">

										<?php include("work_fire_data.php"); ?>

									</div>

									<div class="tab-pane" id="payment">

										<?php include("work_fire_payment.php"); ?>

									</div>

									<div class="tab-pane" id="address">

										<?php include("work_fire_address.php"); ?>

									</div>

									<div class="tab-pane" id="summary_form">

										<div class="row">
											<div class="col-md-12 col-sm-12">
												<div class="card card-box">
													<div class="card-head">
														<header>สรุปรายการ/สั่งพิมพ์</header>
													</div>
													<div class="card-body " id="bar-parent1">
														<form class="form-horizontal">
															<div class="form-group row" style="padding-top: 50px">
																<div class="col-sm-5"></div>
																<div class="col-sm-4">
																	<a href="<?php echo base_url('Insurance_fire/work_fire_summary_print'); ?>" target="_blank">
																		<button type="button" class="btn btn-round btn-warning btn-sm m-b-10">
																			<i class="fa fa-print"></i> พิมพ์กรมธรรม์ประกันอัคคีภัย
																		</button>
																	</a>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>	
										</div>

									</div>									

									<div class="tab-pane" id="invoice">

										<?php include("work_fire_invoice.php"); ?>

									</div>

									<div class="tab-pane" id="receipt">

										<?php include("work_fire_receipt.php"); ?>

									</div>

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