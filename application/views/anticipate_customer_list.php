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

	<div class="col-md-12">

		<div class="card card-topline-red">

			<div class="card-head">

				<header>ลูกค้ามุ่งหวัง</header>                                    
				<div class="pull-right">
					
				</div>
			</div>
		
	<div id="workArea">

			<div class="card-body ">
                 
				<div class="card-body ">
									<div class="mdl-tabs mdl-js-tabs">
										<div class="mdl-tabs__tab-bar tab-left-side">
										  <a href="#tab4-panel" class="mdl-tabs__tab is-active text-success"><i class="fa fa-list-ul"> รายชื่อลูกค้ามุ่งหวัง</i></a>
										  <a href="#tab5-panel" class="mdl-tabs__tab text-primary"><i class="fa  fa-plus-circle"> เพิ่มข้อมูลลูกค้ามุ่งหวัง</i></a>
										
										</div>
										<div  class="mdl-tabs__panel is-active p-t-20" id="tab4-panel">
											<div id="list_data">
											
										   </div>
										</div>
										<div class="mdl-tabs__panel p-t-20" id="tab5-panel">
											<?php $this->load->view('anticipate_customer_form_add')?>
										</div>
										
									</div>
								</div>

				
				
				
				
			</div> 

          
	</div>
		
		</div>

	</div>

</div>

</div>
      <div id="showBiilingPrintArea"></div>
   
</div>

<!-- end page content -->



<!-- start footer -->	 

<?php include("footer.php"); ?>

<!-- end footer -->



</body>



</html>