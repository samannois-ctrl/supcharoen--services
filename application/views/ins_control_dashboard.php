<!DOCTYPE html>

<html lang="en">

<!-- BEGIN HEAD -->



<head>

<?php include("header.php"); ?>
<style>
	table {
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        /* เพิ่มสไตล์สำหรับแถวที่ถูกซ่อน เพื่อความชัดเจน */
        .hidden-row {
            display: none;
        }	
</style>
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

	<div class="col-md-12">

		<div class="card card-topline-red">

			<div class="card-head">

				<header>ทะเบียนคุมงาน</header>  <div class="pull-right"><a href="<?php echo base_url('Insurance_car/insurance_billing')?>"> 
								<button type="button" class="btn btn-info btn-lg m-b-10"><i class="fa fa-plus"></i> ใบวางบิลบริษัท </button>
					           &nbsp;&nbsp;
								<a href="<?php echo base_url('Insurance_car2/ins_control_dashboard')?>"> 
								<button type="button" class="btn btn-info btn-lg m-b-10"><i class="fa fa-th-list"></i> ใบสำคัญจ่ายบริษัท</button>
							</a>
							</div>                                  
				
			</div>

			<div class="card-body ">
                 
			
								<div class="card-head">
									
									<header>ทะเบียนคุมงาน  &nbsp;&nbsp;
										<select id="selectYear" name="selectYear" >
											<?php for($i=0;$i <= $rangeYear ;$i++){ 
													 $yearValue = $currYear-$i;
											?>
											<option value="<?php echo $yearValue?>"><?php echo $yearValue+543?></option>
											<?php }?>
										</select>
										
									</header>
									
								</div>
								<div class="card-body " id="bar-parent">
									<div class="row">
										<div class="col-md-2 col-sm-2 col-2">
											<ul class="nav nav-tabs tabs-left">
												<?php $n=1; $txtClass=""; foreach($monthArray AS $monthIndex=>$monthName){ 
												             //if($n=='1'){ $txtClass="active"; }else{ $txtClass=""; }
												            
												   ?>
												<li class="nav-item">
													<a href="#tab_6_<?php echo $monthIndex?>" data-bs-toggle="tab" class="listmonth month<?php echo $monthIndex?>" onClick="setContent('<?php echo $monthIndex?>','<?php echo $monthName?>')"> <?php echo $monthName?> </a>
													<!--'<?php echo $monthIndex?>','<?php echo $monthName?>')"-->
												</li>
												<?php $n++; }?>
												<!--<li class="nav-item">
													<a href="#tab_6_2" data-bs-toggle="tab"> Profile </a>
												</li>
-->
											</ul>
										</div>
										<div class="col-md-9 col-sm-9 col-9">
											<div class="tab-content">
												<?php  $n=1;  foreach($monthArray AS $monthIndex=>$monthName){ 
																if($n=='1'){ $txtClass="active"; }else{ $txtClass=""; }
												?>
												<div class="tab-pane <?php echo $txtClass?> " id="tab_6_<?php echo $monthIndex?>">
													
													<div id="showDataMonth<?php echo $monthIndex?>"><h4 align="center" class="text-primary" style="padding-top: 20px;">กรุณาเลือกเดือนเพื่อดูข้อมูล</h4></div>
												</div>
											<?php $n++; }?>
												
												
											</div>
										</div>
									</div>
								</div>
							
			</div>

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