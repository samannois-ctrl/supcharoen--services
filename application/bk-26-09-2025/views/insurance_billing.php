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


<?php include("menu.php"); ?>

<!-- end sidebar menu -->

<!-- start page content -->

<div class="page-content-wrapper">

<div class="page-content">	





<div class="row">

	<div class="col-md-12">

		<div class="card card-topline-red">

			<div class="card-head">

				<header>ใบวางบิล </header>                                    
				<div class="pull-right"><a href="<?php echo base_url('Insurance_car/insurance_billing')?>"> 
								<button type="button" class="btn btn-info btn-lg m-b-10"><i class="fa fa-plus"></i> ใบวางบิลบริษัท </button>
					           &nbsp;&nbsp;
								<a href="<?php echo base_url('Insurance_car2/ins_control_dashboard')?>"> 
								<button type="button" class="btn btn-info btn-lg m-b-10"><i class="fa fa-th-list"></i> ใบสำคัญจ่ายบริษัท </button>
							</a>
							</div>
			</div>
	<div id="workArea">


 <div class="card-body ">
			
<!--
	valueList			
		<ul id="valueList">
         Values will be displayed here 
     </ul>
-->
</div>
<div class="card-body ">
	<div class="mdl-tabs mdl-js-tabs">
		<div class="mdl-tabs__tab-bar tab-left-side">
			<a href="#tab4-panel" class="mdl-tabs__tab is-active text-primary"> 1. เลือกลูกค้า / ใบสำคัญจ่าย</a>
			<a href="#tab5-panel" class="mdl-tabs__tab text-primary">2. ใบวางบิล </a>
			<!--<a href="#tab6-panel" class="mdl-tabs__tab text-primary"></a>-->
		</div>
		<div class="mdl-tabs__panel is-active p-t-20" id="tab4-panel">
			<div class="row">
			
				<div class="col-md-2"><input id="custname" type="text" class="form-control form-control-sm" placeholder="ชื่อลูกค้า"></div>
		<div class="col-md-2"><input id="plate_license" type="text" class="form-control form-control-sm" placeholder="ป้ายทะเบียน"></div>
		<div class="col-md-2">
			 <select id="Xagent_id" name="Xagent_id" class="form-select" aria-label="">
			<option value="x">--เลือกชื่อตัวแทน--</option>
			<?php foreach($listAgent AS $agent){?>
			<option value="<?php echo $agent->id?>"><?php echo $agent->agent_name?></option>
			<?php }?>
		</select>
		</div>
		<div class="col-md-2">
			<select name="insurance_corp_id" class="form-select" id="insurance_corp_id" aria-label="" >
		       <option value="x">เลือกบริษัท</option>
				<?php foreach($listInsCorp AS $corp){?>
				<option value="<?php echo $corp->id?>"><?php echo $corp->company_name?></option>
				<?php }?>
				</select>
		</div>
		<?php /*?>
		<div class="col-md-2">
			<?php //echo $rangeYear."  currentYear>".$currentYear." startYear>".$startYear?>
				<select id="selectYear" name="selectYear" class="form-control form-control-sm">
					<?php for($i=0;$i <= $rangeYear ;$i++){ 
							 $yearValue = $currentYear-$i;
					?>
					<option value="<?php echo $yearValue?>"><?php echo $yearValue+543?></option>
					<?php }?>
				</select>


		</div>
		<?php  
		
						
		
		 <div style="clear: both">&nbsp;</div>
		<div class="row">
			   <div class="row">
			     <div class="col-md-1">รายการอื่นๆ</div>
			     <div class="col-md-5"><input type="text" id="text_caption" name="text_caption" class="form-control form-control-sm"></div>
			     <div class="col-md-2"><button type="button" class="btn btn-sm btn-success" onClick="addToBControl2('is_caption','1')">เพิ่มข้อความ</button></div>
			   </div>
		</div>*/?>
			
			</div>
			<div class="row">
			
			<div class="row" style="margin-top: 15px;">
	 
			<div class="col-sm-1">วันคุ้มครอง
				<!-- $data['periodDateStart'] = "";
		  $data['periodMonthStart'] = "";
		  $data['periodDateEnd'] = "";
		  $data['periodMonthEnd'] = "";
		  $data['periodYear'] = ""; select_day_start_temp select_month_start_temp select_month_start_temp select_day_end_temp select_month_end_temp  -->
				</div>
		   <div class="col-sm-1">
			<select id="select_day_start" name="select_day_start" class="form-select" aria-label="" onChange="SetTempSelect(this,'select_day_start_temp')">
								<option value="x">--ไม่ระบุ--</option>
								<?php for($i=1;$i<=31;$i++){?>
								<option value="<?php echo $i?>" <?php if($periodDateStart==$i){ echo "selected";}?> ><?php echo $i?></option>
								<?php }?>
			</select>
		  </div>

		  <div class="col-sm-2">
								<!--  monthArray  currMonth startYear select_month select_year-->
									<select id="select_month_start" name="select_month_start" class="form-select" aria-label=""  onChange="SetTempSelect(this,'select_month_start_temp')">
										<option value="x">--ไม่ระบุ--</option>
										<?php foreach($monthArray AS $monthID=>$monthName){?>
										<option value="<?php echo $monthID?>" <?php if($monthID==$periodMonthStart){ echo "selected";}?> ><?php echo $monthName?></option>
										<?php }?>
									</select>
							  </div>	
		<div class="col-sm-1">ถึงวันที่</div>
				   <div class="col-sm-2">
					<select id="select_day_end" name="select_day_end" class="form-select" aria-label=""   onChange="SetTempSelect(this,'select_day_end_temp')">
									   <option value="x">--ไม่ระบุ--</option>
										<?php for($i=1;$i<=31;$i++){?>
										<option value="<?php echo $i?>" <?php if($periodDateEnd==$i){ echo "selected";}?> ><?php echo $i?></option>
										<?php }?>
										</select>
				  </div>

				  <div class="col-sm-1">
										<!--  monthArray  currMonth startYear select_month select_year-->
											<select id="select_month_end" name="select_month_end" class="form-select" aria-label=""    onChange="SetTempSelect(this,'select_month_end_temp')">
												<option value="x">--ไม่ระบุ--</option>
												<?php foreach($monthArray AS $monthID=>$monthName){?>
												<option value="<?php echo $monthID?>" <?php if($monthID==$periodMonthEnd){ echo "selected";}?> ><?php echo $monthName?></option>
												<?php }?>
											</select>
									  </div>	

		  <div class="col-sm-1">
									<select id="select_year" name="select_year" class="form-select" aria-label="">
										
										<?php for($i=0;$i<=$rangeYear;$i++){ 
												$txtYear = $startYear+$i;
										?>
										<option value="<?php echo $txtYear?>" <?php if($txtYear==$periodYear){ echo "selected";}?> ><?php echo $txtYear+543?></option>
										<?php }?>

									</select>
		   </div>
		 <div class="col-md-2"><input type="checkbox" id="exclude_contact" name="exclude_contact" value="1" onClick="setExclude(this)"> ไม่ระบุวันคุ้มครอง</div>
							
		  	<div class="col-md-1"><button type="button" class="btn btn-success btn-sm" onClick="searchCustForbilling()">ค้นหาลูกค้า</button>
			<input type="hidden" id="select_day_start_temp" name="select_day_start_temp" value="<?php echo ltrim($periodDateStart, '0')?>">	
			<input type="hidden" id="select_month_start_temp" name="select_month_start_temp" value="<?php echo $periodMonthStart?>">	
			<input type="hidden" id="select_day_end_temp" name="select_day_end_temp" value="<?php echo ltrim($periodDateEnd, '0')?>">	
			<input type="hidden" id="select_month_end_temp" name="select_month_end_temp" value="<?php echo $periodMonthEnd?>">	
		  
			
			</div>	
		  </div>
			
			</div>
			
			
		 <div class="row">
		
			
		<!--<div class="col-md-1"><button type="button" class="btn btn-success btn-sm" onClick="searchCustForbilling()">ค้นหาลูกค้า</button></div>-->		
		
		<div class="row" id="showSearch"></div>
			  
	   <div style="clear: both">&nbsp;</div>
			    <hr class="col-xs-12">
			   			<div class="panel">
						  <header class="panel-heading panel-heading-blue">
								<div class="row">
									<div class="col-sm-2">ทะเบียนคุมงานประเภท-พ.ร.บ.  </div>
									
									<div class="col-sm-1">ประจำเดือน</div>
									<div class="col-sm-2">
										<select id="control_month" name="control_month" class="form-control form-control-sm" onChange="updateDateControlBoard('control_month', this.value)">
											<option value="x">---เลือกเดือน---</option>
											<?php foreach($monthArray AS $key=>$val){ ?>
											<option value="<?php echo $key?>" <?php if($key==$currentMonth){ echo "selected";}?> ><?php echo $val?></option>
											<?php }?>
										</select>
										</div>
									<div class="col-md-2">
									<?php //echo $rangeYear."  currentYear>".$currentYear." startYear>".$startYear?>
										<select id="control_year" name="control_year" class="form-control form-control-sm"  onChange="updateDateControlBoard('control_year', this.value)" >
											<?php for($i=0;$i <= $rangeYear ;$i++){ 
													 $yearValue = $currentYear-$i;
											?>
											<option value="<?php echo $yearValue?>"><?php echo $yearValue+543?></option>
											<?php }?>
										</select>
									

							  </div>
								
								<div class="col-md-3">
									<button type="button" class="btn btn-success btn-sm" onClick="printControlBoard()">พิมพ์</button>
									<input type="hidden" name="keygroup" id="keygroup" value="<?php echo $keygroup?>">
								</div>
								<div class="col-md-1 ">
									<div class="pull-right">
									
									</div>
									
								</div>
															
							  </div>
							 </header>
							<div id="showCtrlBoard" class="panel-body">
							  <table id="controlTable" class="table table-bordered">
								<tr>
									<td>เลขที่ กธ.</td>  
									<td>ชื่อ - นามสกุล</td>  
									<td>ทะเบียน</td>  
									<td>บริษัท</td>  
									<td>ประเภท</td>  
									<td>ยอดสุทธิ</td>  
									<td>ยอดรวม</td>  
									<td>ยอดเก็บตัวแทน</td>  
									<td>วันที่รับเงิน</td>  
									<td>เบี้ยนำส่ง</td>  
									<td>วันจ่ายเช็ค</td>  
									<td>ตัวแทน</td>  
									<td>ผ่อน</td>  
									<td>งาน</td>  
								</tr>
								<tr>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
							    </tr>	
								
							  </table>
							
							
							</div>
							<div id="ctrlPrinOnly"></div>
							
				</div>
			 
			   	
		</div>	
</div>

		<div class="mdl-tabs__panel p-t-20" id="tab5-panel">
				<div class="row">
					
			      <div class="col-12">
					  <div class="pull-right">
					  <button type="button" class="btn btn-sm btn-info" onClick="createBlling()">เรียกข้อมูลใหม่</button>
						  &nbsp;&nbsp;
					  <button type="button" class="btn btn-sm btn-success" onClick="printBillingFromControl()">พิมพ์</button>
					  </div>
					</div>
			    </div>
				<div id="showBilling"></div>
			    <div style="clear: both">&nbsp;</div>
			   <div id="showBillingPrintArea"></div>
			   <div class="col-12" align="center">
			     <button type="button" class="btn btn-sm btn-success" onClick="SaveBilling()">บันทึกข้อมูล</button>
			   </div>
			
   </div>
											
			<!--<div class="mdl-tabs__panel p-t-20" id="tab6-panel">
											<p>You'll. His have you'll day make beginning good, herb. Can't place lights
												was evening let his itself. His seas unto replenish may every said midst
												him. Night to air behold tree years sixth waters. Unto together can't
												darkness sixth heaven it. Fruit. Image. Winged, a own. The waters
												multiply were male. Wherein gathering replenish gathering blessed dry
												called second. It Beginning whose you every dry them midst don't place
												you're sixth he above hath, fish sea fifth. Brought called.
												<p>
			</div>-->
	</div>
</div>
		
		
		
		
		
		
		
		
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



<!-- start footer -->	 

<?php include("footer.php"); ?>




</body>



</html>