<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
	<?php include("header.php"); ?>
	<style>
		.hilightBtWarning{
			background-color: #FFE6E7;
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
						<div class=" pull-left">
							<div class="page-title">รายงานรายได้ส่วนเพิ่ม</div>
						</div>
					</div>
				</div>

				
					<div class="row">
                        <div class="col-md-12">
                            <div class="card card-topline-red">
                                <div class="card-head">
                                    <header>รายการรายได้ส่วนเพิ่ม</header>                                    
                                </div>
                                <div class="card-body ">
                                  <div class="row p-b-20">
										<div class="col-md-12 col-md-12 col-12">                                           
												<div class="card-body">
													
													<div class="row">
			
			<div class="row" style="margin-top: 15px;">
	 <div class="col-md-2">
				<select name="corp_id" class="form-select" id="corp_id" aria-label="" onChange="getCodeList(this)">
					<option value="x">--ทุกบริษัท--</option>
					<?php foreach($listInsCorp AS $corp){?>
					<option value="<?php echo $corp->id?>" <?php //if($corp_id==$corp->id){ echo "selected";}?> ><?php echo $corp->company_name?></option>
					<?php }?>

				</select>
		   </div>
			
				<div class="col-md-8 selectCodeTxt" id="codeList">
				 <input type="checkbox">	แฟร์ดี&nbsp;&nbsp;
					 <input type="checkbox"> มิตรแท้กิ่ง&nbsp;&nbsp;<input type="checkbox"> มิตรแท้กิ่ง
				<?php /*?>	
				<select id="ins_code_id" name="ins_code_id" class="form-select" aria-label="" >
																			
					<option value="x">เลือกโค้ด</option>
					<?php foreach($listCode AS $code){?>
					<option value="<?php echo $code->id?>"><?php echo $code->conde_name?></option>
					<?php }?>

				</select>
				<?php */?>		
		   </div>
			<div class="col-md-2 selectCodeTxt" id="selectCodeTxt"></div>
		   </div>
			<div class="row" style="margin-top: 15px;">
			<div class="col-md-1">วันคุ้มครอง
				
				</div>
		   <div class="col-md-1">
			<select id="select_day_start" name="select_day_start" class="form-select" aria-label="" >
								
								<?php for($i=1;$i<=31;$i++){?>
								<option value="<?php echo $i?>" <?php if($DateStart==$i){ echo "selected";}?> ><?php echo $i?></option>
								<?php }?>
			</select>
		  </div>

		  <div class="col-md-1">
								<!--  monthArray  currMonth startYear select_month select_year-->
									<select id="select_month_start" name="select_month_start" class="form-select" aria-label=""  >
										
										<?php foreach($monthArray AS $monthID=>$monthName){?>
										<option value="<?php echo $monthID?>" <?php if($monthID==$startMonth){ echo "selected";}?> ><?php echo $monthName?></option>
										<?php }?>
									</select>
							  </div>
				<div class="col-md-1">
									<select id="select_yearStart" name="select_yearStart" class="form-select" aria-label="" >
										
										<?php for($i=0;$i<=$rangeYear;$i++){ 
												$txtYear = $startYear+$i;
										?>
										<option value="<?php echo $txtYear?>" <?php if($txtYear==$currYear){ echo "selected";}?> ><?php echo $txtYear+543?></option>
										<?php }?>

									</select>
			
			    
		   </div>
		<div class="col-md-1">ถึงวันที่</div>
				   <div class="col-md-1">
					<select id="select_day_end" name="select_day_end" class="form-select" aria-label=""   >
									  
										<?php for($i=1;$i<=31;$i++){?>
										<option value="<?php echo $i?>" <?php if($DateEnd==$i){ echo "selected";}?> ><?php echo $i?></option>
										<?php }?>
										</select>
				  </div>

				  <div class="col-md-1">
										<!--  monthArray  currMonth startYear select_month select_year-->
											<select id="select_month_end" name="select_month_end" class="form-select" aria-label=""    >
												
												<?php foreach($monthArray AS $monthID=>$monthName){?>
												<option value="<?php echo $monthID?>" <?php if($monthID==$currentMonth){ echo "selected";}?> ><?php echo $monthName?></option>
												<?php }?>
											</select>
									  </div>	

		  <div class="col-md-1">
									<select id="select_year" name="select_year" class="form-select" aria-label="" >
										
										<?php for($i=0;$i<=$rangeYear;$i++){ 
												$txtYear = $startYear+$i;
										?>
										<option value="<?php echo $txtYear?>" <?php if($txtYear==$currYear){ echo "selected";}?> ><?php echo $txtYear+543?></option>
										<?php }?>

									</select>
			
			    
		   </div>
			
			 
		  	<div class="col-md-2">
				
			    &nbsp;
				
			</div>	
		  </div>
		 <div id="showInsType" class="row form-group" style="margin-top: 15px;">	
				<?php $i=1; foreach($listInstype AS $insType){ 
			 				if(($insType->id != '9')&&($insType->id != '1')){
			 	?>
				<div class="col-md-1">
				<input name="c<?php echo $i?>" type="checkbox" class="InsType xyz" id="c<?php echo $i?>" value="<?php echo $insType->id?>" checked="checked">
				&nbsp;&nbsp;<label for="c<?php echo $i?>"><?php echo $insType->insurance_type_name?></label>
				</div>	
				<?php $i++; }  }?>
			 <div class="col-md-1">
				<input name="c<?php echo $i?>" type="checkbox" class="InsType xyz" id="c<?php echo $i?>" value="'Act'" checked="checked">
				&nbsp;&nbsp;<label for="c<?php echo $i?>">พ.ร.บ.</label> 
			  </div> 
			  <div class="col-md-1">
				<input name="c<?php echo $i?>" type="checkbox" class="InsType xyz" id="c<?php echo $i?>" value="'Transport'" checked="checked">
				&nbsp;&nbsp;<label for="c<?php echo $i?>">ขนส่ง</label>
			  </div>
			  <div class="col-md-1">
				<input name="c<?php echo $i?>" type="checkbox" class="InsType xyz" id="c<?php echo $i?>" value="'Treavel'" checked="checked">
				&nbsp;&nbsp;<label for="c<?php echo $i?>">เดินทาง</label> 
			  </div> 
			
			 <div class="col-md-1">
				<input name="c<?php echo $i?>" type="checkbox" class="InsType xyz" id="c<?php echo $i?>" value="'Home'" checked="checked">
				&nbsp;&nbsp;<label for="c<?php echo $i?>">บ้าน</label>
			  </div>
			  <div class="col-md-1">
				<input name="c<?php echo $i?>" type="checkbox" class="InsType xyz" id="c<?php echo $i?>" value="'PA'" checked="checked">
				&nbsp;&nbsp;<label for="c<?php echo $i?>">อุบัติเหตุ</label>
			  </div>
			  <div class="col-md-1">
			   <input name="c<?php echo $i?>" type="checkbox" class="InsType" id="checkAll" value="all" checked="checked">
			 &nbsp;&nbsp;<label for="checkAll">ทั้งหมด</label>
				  </div>	
				<div class="col-auto">	
					<p id="error-message" style="color: red; display: none;"></p>
			    </div>	
		</div>
			
		  	</div>
			<div id="showWorkType" class="row form-group" style="margin-top: 5px;">	
					<div class="col-md-1"><input name="x1" type="checkbox" class="workType" id="x1" value="0" checked="checked"> <label for="x1"> ต่ออายุ </label> </div>
					<div class="col-md-1"><input name="x2" type="checkbox" class="workType" id="x2" value="1" checked="checked"> <label for="x2"> งานใหม่ </label></div>
					<div class="col-md-1"><input name="x3" type="checkbox" class="workType" id="x3" value="2" checked="checked"> <label for="x3"> ต่อ ย้าย </label></div>
					<div class="col-auto">	
					<p id="error-message2" style="color: red; display: none;"></p>
			    	</div>	
				    <div class="col-md-2"><button type="button" class="btn btn-success btn-sm" onClick="GetCorpIncome()">ตกลง</button></div>
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