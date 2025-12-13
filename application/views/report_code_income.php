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
										<div class="col-md-12 col-md-12 col-12">                                           
												<div class="card-body">
													
													<div class="row">
			
			<div class="row" style="margin-top: 15px;">
	 <div class="col-md-1">
				<select id="ins_code_id" name="ins_code_id" class="form-select" aria-label="" onChange="setcodeName('codeName',this)">
																			
					<option value="x">ทุกโค้ด</option>
					<?php foreach($listCode AS $code){?>
					<option value="<?php echo $code->id?>" ><?php echo $code->conde_name?></option>
					<?php }?>

				</select>
		   </div>
			<div class="col-md-1">วันคุ้มครอง
				<!-- $data['periodDateStart'] = "";
		  $data['periodMonthStart'] = "";
		  $data['periodDateEnd'] = "";
		  $data['periodMonthEnd'] = "";
		  $data['periodYear'] = ""; select_day_start_temp select_month_start_temp select_month_start_temp select_day_end_temp select_month_end_temp  -->
				</div>
		   <div class="col-md-1">
			<select id="select_day_start" name="select_day_start" class="form-select" aria-label="" onChange="SetTempSelect()">
								
								<?php for($i=1;$i<=31;$i++){?>
								<option value="<?php echo $i?>" <?php if($DateStart==$i){ echo "selected";}?> ><?php echo $i?></option>
								<?php }?>
			</select>
		  </div>

		  <div class="col-md-1">
								<!--  monthArray  currMonth startYear select_month select_year-->
									<select id="select_month_start" name="select_month_start" class="form-select" aria-label=""  onChange="SetTempSelect()">
										
										<?php foreach($monthArray AS $monthID=>$monthName){?>
										<option value="<?php echo $monthID?>" <?php if($monthID==$startMonth){ echo "selected";}?> ><?php echo $monthName?></option>
										<?php }?>
									</select>
							  </div>	
		<div class="col-md-1">ถึงวันที่</div>
				   <div class="col-md-1">
					<select id="select_day_end" name="select_day_end" class="form-select" aria-label=""   onChange="SetTempSelect()">
									  
										<?php for($i=1;$i<=31;$i++){?>
										<option value="<?php echo $i?>" <?php if($DateEnd==$i){ echo "selected";}?> ><?php echo $i?></option>
										<?php }?>
										</select>
				  </div>

				  <div class="col-md-1">
										<!--  monthArray  currMonth startYear select_month select_year-->
											<select id="select_month_end" name="select_month_end" class="form-select" aria-label=""    onChange="SetTempSelect()">
												
												<?php foreach($monthArray AS $monthID=>$monthName){?>
												<option value="<?php echo $monthID?>" <?php if($monthID==$currentMonth){ echo "selected";}?> ><?php echo $monthName?></option>
												<?php }?>
											</select>
									  </div>	

		  <div class="col-md-1">
									<select id="select_year" name="select_year" class="form-select" aria-label="" onChange="SetTempSelect()">
										
										<?php for($i=0;$i<=$rangeYear;$i++){ 
												$txtYear = $startYear+$i;
										?>
										<option value="<?php echo $txtYear?>" <?php if($txtYear==$currYear){ echo "selected";}?> ><?php echo $txtYear+543?></option>
										<?php }?>

									</select>
			
			    
		   </div>
			
			 
		  	<div class="col-md-2">
				<button type="button" class="btn btn-success btn-sm" onClick="GetCodeIncome()">ตกลง</button>
			    &nbsp;
				<button id="btn-income" type="button" class="btn btn-info btn-sm" onClick="">
					<i class="fa  fa-plus-circle" id="BtPlus"></i> 
					<i class="fa fa-minus-circle text-danger" id="BtMinus" style="display: none"></i> 
					เพิ่มรายได้โค้ด</button>
				   <input type="hidden" id="currentPage" name="currentPage" value="Mainpage">
				
			</div>	
		  </div>
	<div class="row" id="divIncome" style="display: none; padding:10px;; background-color: #E4E4E4;margin: 5px; ">
		<div class="row"  style="padding: 5px;">
			        <?php /*?>
			        <div class="col-md-1">ชื่อลูกค้า</div>
					<div class="col-md-2"><input type="text" id="cust_name" name="cust_name" class="form-control form-control-sm"></div>
					 <?php */?>
					<div class="col-md-1">ชื่อโค้ด</div>
					<div class="col-md-2 text-primary" id="codeName"></div>
			
					<div class="col-md-1">บริษัท <input type="hidden" id="cust_name" name="cust_name" value=""></div>
					<div class="col-md-2">
						<select name="insurance_corp_id" class="form-select" id="insurance_corp_id" aria-label="" >

						<option value="x">เลือกบริษัท</option>
							<?php foreach($listInsCorp AS $corp){?>
								<option value="<?php echo $corp->id?>" ><?php echo $corp->company_name?></option>
							<?php }?>
						</select>
						
					</div>
					<div class="col-md-1">วันคุ้มครอง</div>
				  <div class="col-md-3 text-primary" id="protect_date_div"></div>
		</div>
		<div class="row" style="padding: 5px;">
			
					<div class="col-md-1">เบี้ยสุทธิ</div>
					<div class="col-md-2"><input type="text" id="income_total_net" name="income_total_net" class="form-control form-control-sm autonumber"></div>
			 		<div class="col-md-1"><button type="button" class="btn btn-success btn-sm" onClick="addCodeIncome()">เพิ่ม</button></div></div>
		           <div id="showResultAdd" class="col-md-2 text-success"></div>
					
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