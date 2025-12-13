<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
	<?php include("header.php"); ?>
</head>
<!-- END HEAD -->
<style>		
		body{
		  -webkit-print-color-adjust:exact !important;
		  print-color-adjust:exact !important;
		}
		
		/* css ส่วนสำหรับการแบ่งหน้าข้อมูลสำหรับการพิมพ์ */
		@media all
		{
			.page-break { display:none; }
			.page-break-no{ display:none; }
		}
	
	    @media screen
			{
				.printOnly{display:none;}
			}

		
	
		@media print
		{
			.page-break { display:block;height:1px; page-break-before:always; }
			.page-break-no{ display:block;height:1px; page-break-after:avoid; } 
			.printOnly {
			   display : block;
			}
			body {		
				background-color: #fff;				
				color: #000;
				
				margin: 0;
			}
			@page { 
				size: a4;
				margin: 0;
				/*size: a5 landscape;
				size: landscape;
				margin: 0;*/
			}
			.table .tr .td {
				font-size: 16px;
			}
		}
				
	.bgRed{
		background-color: #FF8082
	}
	.bgGreen{
		background-color:#A1FFA0
	}		
	.bgYellow{
		background-color:#F3FF3B
	}	
		
	.bt-border-x{
		padding-bottom: 20px;
		border-bottom-style: solid;
		border-bottom-width: 1px;
		border-bottom-color: #6C6C6C;
		
	}
	
	
	.toggle-btn {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #f0f0f0;
    border: 1px solid #ccc;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.toggle-btn.active {
    background-color: #4CAF50;
    color: white;
}

	</style> 
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
							<div class="page-title">วันสิ้นอายุภาษี/พ.ร.บ.</div>
						</div>
						
					</div>
				</div>

				
					<div class="row">
                        <div class="col-md-12">
                            <div class="card card-topline-red">
                                <div class="card-head">
                                    <header>วันสิ้นอายุภาษี/พ.ร.บ.</header>   
									<ol class="breadcrumb page-breadcrumb pull-right">
										<li>
										<!--<a href="<?php //echo base_url('Inspection/inspection_information_print'); ?>" target="_blank">
												<button type="button" class="btn btn-info btn-sm"><i class="fa fa-print"></i>พิมพ์ ต.ร.อ.ส่ง พ.ร.บ.</button>
										</a>-->
										
										<!--<button type="button" class="btn btn-info btn-sm" onClick="printActDaily('actDaily')">
											<i class="fa fa-print"></i>พิมพ์ใบส่งเงิน ตรอ </button>
										&nbsp;&nbsp;
											
											<button type="button" class="btn btn-warning btn-sm" onClick="printReport('printArea')"><i class="fa fa-print"></i>พิมพ์แบบรายงานการตรวจสภาพรถ</button>-->
										</li>
									</ol>
                                </div>
                                <div class="card-body ">
                                  <div class="row p-b-20">   
									<div class="col-md-12 col-sm-12 col-12">                                           
												
										<form class="form-horizontal">
											<div class="form-group row">
												<div class="col-sm-1">
													<label class="control-label">  เลือกประเภทรถ </label>
												 <select name="car_type_id" class="form-select carInput" id="car_type_id" aria-label="">
																	
												   <option value="allcar"> รถยนต์ทั้งหมด</option>
																<?php foreach($listCarType AS $carType){?>
																		<option value="<?php echo $carType->id?>" ><?php echo $carType->type_name?></option>
																<?php }?>
																	    
													</select>
												</div>
												<div class="col-sm-2">
													<label class="control-label"> เลือกประเภทรายการ </label>
												 <select id="select_type" name="select_type" class="form-select" aria-label="">
												   
												   <option value="1">พ.ร.บ.</option>	
												   <option value="2" selected>ภาษี</option>	
												 </select>
												</div>
												<!--<div class="col-sm-3">ระยะเวลาก่อนหมดอายุ
														<select id="select_range" name="select_range" class="form-select" aria-label="">
															
															<?php /*for($i=1;$i<=12;$i++){ ?>
															<option value="<?php echo $i?>"><?php echo $i?> เดือน</option>
												    		<?php }*/?>
															
														</select> 
												</div>-->
												    <div class="col-sm-2">
													   <label class="control-label">ค้นหาชื่อ</label>
													         <input type="text" id="search_custname" name="search_custname" class="form-control" placeholder=""></div>
												   <div class="col-sm-2">
													   		<label class="control-label">ค้นหาทะเบียน</label>
													   <input type="text" id="search_vRegis" name="search_vRegis"  class="form-control" placeholder=""></div>
													<div class="col-sm-2">
													<label class="control-label">เลือกเดือนหมดอายุ</label>
																	    <select id="selectMonth" name="selectMonth" class="form-select">
																	           <option value="all">--ทุกเดือน--</option>
																			  <?php $txtSelected = ''; foreach($monthArray AS $monthNo=>$monthName){ 
																			            if($currMonth==$monthNo){ $txtSelected = "selected";}else{ $txtSelected = ''; }
																			   ?>
																	           <option value="<?php echo $monthNo?>" <?php echo $txtSelected?>><?php echo $monthName?></option>
																			  <?php  } ?>
																	    </select>
													</div>
																
												  <div class="col-sm-2">
													   <label class="control-label">เลือกปีหมดอายุ</label>
														<select id="select_year" name="select_year" class="form-select" aria-label="">
															<?php for($i=0;$i<=$rangeYear;$i++){ 
																	$txtYear = $startYear+$i;
																	$txtYear2 = $startYear+$i+543;
															?>
															<option value="<?php echo $txtYear?>" <?php if($txtYear==$currYear){ echo "selected";}?> ><?php echo $txtYear2?></option>
															<?php }?>
															
														</select>
												  </div>	
												  <div class="col-sm-1"><br>
													<button type="button" class="btn btn-info btn-sm" onClick="getExpireList()">ตกลง</button>
												  </div>
														
											</div>													
									  </form>		
																							
									</div>
								
								 </div>
								 <h3 class="text-danger" align="center" style="margin-top: -10px;">แจ้งเตือนหมดอายุ <span id="reportType"></span></h3>
								 <div id="showReport"></div>
                                
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