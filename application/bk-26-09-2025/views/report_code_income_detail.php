<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
	<?php include("header.php"); ?>
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
						<div class=" pull-left">
							<div class="page-title">รายงานรายได้โค้ด </div>
						</div>
					</div>
				</div>

				
					<div class="row">
                        <div class="col-md-12">
                            <div class="card card-topline-red">
                                <div class="card-head">
                                    <header>รายการรายได้โค้ด</header>                                    
                                </div>
                                <div class="card-body ">
                                  <div class="row p-b-20">
										<div class="col-md-12 col-sm-12 col-12">                                           
												<div class="card-body">
													
													<div class="row">
			
			<div class="row" style="margin-top: 15px;">
	 
			<div class="col-sm-1">วันคุ้มครอง
				
				</div>
		   <div class="col-sm-1">
			<select id="select_day_start" name="select_day_start" class="form-select" aria-label="" onChange="SetTempSelect(this,'select_day_start_temp')">
								
								<?php for($i=1;$i<=31;$i++){ ?>
								<option value="<?php echo $i?>" <?php if($getStartDate==$i){ echo "selected";}?> ><?php echo $i?></option>
								<?php }?>
			</select>
		  </div>

		  <div class="col-sm-2">
								<!--  monthArray  currMonth startYear select_month select_year-->
									<select id="select_month_start" name="select_month_start" class="form-select" aria-label=""  onChange="SetTempSelect(this,'select_month_start_temp')">
										
										<?php foreach($monthArray AS $monthID=>$monthName){?>
										<option value="<?php echo $monthID?>" <?php if($monthID==$getstartMonth){ echo "selected";}?> ><?php echo $monthName?></option>
										<?php }?>
									</select>
							  </div>	
		<div class="col-sm-1">ถึงวันที่</div>
				   <div class="col-sm-2">
					<select id="select_day_end" name="select_day_end" class="form-select" aria-label=""   onChange="SetTempSelect(this,'select_day_end_temp')">
									  
										<?php for($i=1;$i<=31;$i++){?>
										<option value="<?php echo $i?>" <?php if($getsEndate==$i){ echo "selected";}?> ><?php echo $i?></option>
										<?php }?>
										</select>
				  </div>

				  <div class="col-sm-1">
										<!--  monthArray  currMonth startYear select_month select_year-->
											<select id="select_month_end" name="select_month_end" class="form-select" aria-label=""    onChange="SetTempSelect(this,'select_month_end_temp')">
												
												<?php foreach($monthArray AS $monthID=>$monthName){?>
												<option value="<?php echo $monthID?>" <?php if($monthID==$getEndMonth){ echo "selected";}?> ><?php echo $monthName?></option>
												<?php }?>
											</select>
									  </div>	

		  <div class="col-sm-1">
									<select id="select_year" name="select_year" class="form-select" aria-label="">
										
										<?php for($i=0;$i<=$rangeYear;$i++){ 
												$txtYear = $startYear+$i;
										?>
										<option value="<?php echo $txtYear?>" <?php if($txtYear==$currYear){ echo "selected";}?> ><?php echo $txtYear+543?></option>
										<?php }?>

									</select>
		   </div>
		   <div class="col-sm-2">
			      <select id="codeID" name="codeID"  class="form-select">
			         <option value="x">--โค้ด--</option>
					  <?php foreach($listCode AS $code){?>
					 <option value="<?php echo $code->id?>" <?php if($code->id==$codeID){ echo "selected";}?> ><?php echo $code->conde_name?></option>
					  <?php }?>
			      </select>
		   </div>
		
							
		  	<div class="col-md-1"><button type="button" class="btn btn-success btn-sm" onClick="GetCodeDetail()">ตกลง</button>
		
		
			</div>	
		  </div> 
			
			</div>
			</div>
			</div>
             </div>
				<div id="showReport" class="table-responsive"></div>
                                    								
                                  	
									<p>&nbsp;</p>
									
									

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