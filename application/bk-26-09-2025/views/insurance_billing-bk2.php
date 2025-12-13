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

				<header>ใบวางบิล</header>                                    
				<div class="pull-right">
					<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus" onClick="showBillSearchForm()"> เพิ่มชื่อลูกค้า</i></button> 
					&nbsp;&nbsp;&nbsp;
					<button type="button" class="btn btn-success btn-sm" onClick=" window.open('<?php echo base_url('Setting/setting_company_insurance')?>', '_blank');">เพิ่มชื่อบริษัท</button>
					 &nbsp;&nbsp;&nbsp;
					<button type="button" class="btn btn-info btn-sm" onClick=" window.open('<?php echo base_url('Setting/setting_agent')?>', '_blank');">เพิ่มชื่อตัวแทน</button>
					&nbsp;&nbsp;&nbsp;
					<button type="button" class="btn btn-info btn-sm" onClick="reloadSelectList()"><i class="fa fa-refresh"> เรียกข้อมูลบริษัท/ตัวแทนใหม่</i></button>
				</div>
			</div>
			<div id="showBillingsearchForm" style="clear: both;padding: 10px;">&nbsp;</div>
	<div id="workArea">

			<div class="card-body ">
                <div class="row">
				  <div class="col-md-1">
						จ่ายให้/Pay To   
					</div>
				  <div class="col-md-2">
						<select id="company_id" name="company_id" class="form-control form-control-sm">
						  <option value="x">--เลือกบริษัท--</option>
						  <?php foreach($listCompany AS $company){?>
						  <option value="<?php echo $company->id?>"><?php echo $company->company_full_name?></option>
						  <?php }?>
						</select>
					</div>
					<div class="col-md-2">
						<select id="agent_id" name="agent_id" class="form-control form-control-sm">
						  <option value="x">--เลือกตัวแทน--</option>
						  <?php foreach($listAgent AS $agent){?>
							<option value="<?php echo $agent->id?>"><?php echo $agent->agent_name?></option>
						  <?php }?>
						</select>
					</div>
				
					 <div class="col-md-1" style="text-align: right">
						 วันที่
					</div>
					<div class="col-md-1">
						 <select id="selectDate" name="selectDate" class="form-control form-control-sm">
							 
							 <option value="x">--</option>
							 <?php for($i=1;$i<=31;$i++){
									$txtSelect = "";
							 		if($i<10){ $txtValue="0".$i; }else{ $txtValue=$i; }
	                                if($currentDate == $txtValue){ $txtSelect = "selected"; }
							 ?>
							 <option value="<?php echo $txtValue?>" <?php echo $txtSelect?> ><?php echo $i?></option>
							 <?php }?>
						 </select>
					</div>
					 <div class="col-md-1" style="text-align: right">
						 เดือน
					</div>
					<div class="col-md-1">
						 <select id="selectMonth" name="selectMonth" class="form-control form-control-sm">
							 
							 <?php foreach($monthArray AS $key=>$value){ 
	                                $txtSelect = '';
							 	    if($currentMonth == $key){ $txtSelect = "selected"; }
							 ?>
							 <option value="<?php echo $key?>" <?php echo $txtSelect?> ><?php echo $value?></option>
							 <?php }?>
						 </select>
					</div>
					 <div class="col-md-1" style="text-align: right">
						 ปี
					</div> 
					<div class="col-md-1">
						 <select id="selectYear" name="selectYear" class="form-control form-control-sm">
							 
							
							 <?php for($i=0;$i<=$rangeYear;$i++){
							 		$txtYearValue = $currentYear-$i;
	                                $txtThaiYearValue = $txtYearValue+543;
									 $txtSelect = '';
							 	    if($currentYear == $txtYearValue){ $txtSelect = "selected"; }
							 ?>
							 <option value="<?php echo $txtYearValue?>" <?php echo $txtSelect?>><?php echo $txtThaiYearValue?></option>
							 <?php }?>
						 </select>
					</div>
					<div class="col-md-1">
						<button type="button" class="btn btn-success btn-sm" onClick="showBilling()">ตกลง</button>
					</div>
				</div> 
				<div style="clear: both">&nbsp;</div>

				
				<div class="row">
					<div><h3 class="text-primary">รายการที่เลือก</h3></div>
					<div id="showBillingList"></div>
					
					<div align="center">
						<!--<button type="button" class="btn btn-sm btn-success">บันทึกข้อมูล</button>
						&nbsp;&nbsp;&nbsp;&nbsp;-->
						<button type="button" class="btn btn-sm btn-info" onClick="printBilling()">พิมพ์</button>
					
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