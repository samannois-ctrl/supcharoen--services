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
				<header>รายการบันทึกรับเงิน </header>                                    
				<div class="pull-right"><a href="<?php echo base_url('record_recipe/record_recipe_add/')?>" class="btn btn-sm btn-success">เพิ่มบันทึกรับเงิน</a>&nbsp;</div>
			</div>
			<div class="card-body ">
				<div class="form-group row">
					<div class="col-md-2">
						<label class="control-label">เลือกเดือน</label>
						<select id="selectMonth" name="selectMonth" class="form-select">
							   <option value="all">--ทุกเดือน--</option>
							  <?php $txtSelected = ''; foreach($monthArray AS $monthNo=>$monthName){ 
										if($currMonth==$monthNo){ $txtSelected = "selected";}else{ $txtSelected = ''; }
							   ?>
							   <option value="<?php echo $monthNo?>" <?php echo $txtSelected?>><?php echo $monthName?></option>
							  <?php  } ?>
						</select>
				</div>
				<div class="col-md-2">
						<label class="control-label">เลือกปี</label>
						<select id="selectYear" name="selectYear" class="form-select">
							  <?php $txtSelected = ''; 
									for($i=0;$i<=($currYear-$startYear);$i++){ 
										$YearShow = ($currYear-$i)+543;
										$YearValue = ($currYear-$i);
										if($YearShow==$currYear){ $txtSelected = "selected";}else{ $txtSelected = ''; }
							   ?>
							   <option value="<?php echo $YearValue?>" <?php echo $txtSelected?>><?php echo $YearShow?></option>
							  <?php  } ?>
						</select>
				</div>
				<div class="col-md-2">
					<label class="control-label">การชำระเงิน</label>
					<select name="paytype" class="form-select form-control-sm" id="paytype"  aria-label="" >
						<option value="0">เลือกการชำระเงิน</option>
						<option value="1" >เงินสด</option>
						<option value="2" >เงินโอน</option>
						<option value="3" >บัตรเครดิต</option>
				 		<option value="4">เช็ค</option>
					  </select>
				</div>
				<div class="col-md-2">
					<label class="control-label">บัญชีธนาคาร</label>
					<select name="bank_transfer_id" class="form-select" id="bank_transfer_id" onChange="setPayType(this)" >
						 <option value="x">-เลือกธนาคาร-</option>
						  <?php foreach($bookbankList['result'] AS $bookbank){?>
						  <option value="<?php echo $bookbank->id?>"><?php echo $bookbank->bank_name." ".$bookbank->bank_acc_name." ".$bookbank->bank_number?></option>
						  <?php }?>
				      </select>
				</div>
				<div class="col-md-2" style="padding-top: 25px;">
					<button type="button" class="btn btn-success btn-sm" onClick="getRecieveReport()">ตกลง</button>
				</div>
				</div>
                <div class="form-group row" id=""></div>
				<div class="row" id="reportArea"></div>
			<!---->
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