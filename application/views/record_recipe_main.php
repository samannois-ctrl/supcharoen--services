<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
<?php include("header.php"); ?>
<style>
        .custom-select-container {
            position: relative;  
            cursor: pointer;
            border: 1px solid #ccc;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .custom-select-header {
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .custom-select-header::after {
            content: '▼';  
            font-size: 0.8em;
            color: #888;
        }
        .custom-select-options {
            display: none; 
            position: absolute;
            top: 100%;  
            left: 0;
            right: 0;
            border: 1px solid #ccc;
            border-top: none;  
            background-color: #fff;
            max-height: 200px;
            overflow-y: auto;
            z-index: 1000;  
			 max-height: 600px; 
        }
        .custom-option {
            display: flex;
            align-items: center;
            padding: 8px 10px;
            cursor: pointer;
        }
        .custom-option:hover {
            background-color: #f0f0f0;
        }
        .custom-option input[type="checkbox"] {
            margin-right: 10px;
        }
        /* สไตล์สำหรับแสดงผลค่าที่เลือก */
        #selectedValuesDisplay {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #eee;
            background-color: #f9f9f9;
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
				<header>รายการบันทึกรับเงิน </header>                                    
				<div class="pull-right"><a href="<?php echo base_url('record_recipe/record_recipe_add/')?>" class="btn btn-sm btn-success">เพิ่มบันทึกรับเงิน</a>&nbsp;</div>
			</div>
			<div class="card-body ">
				<div class="form-group row">
					<div class="col-md-3">เลือกธนาคาร
						<?php /*?>
					<select id="bank_id" class="form-select">
						  <option value="x"  >-ทุกธนาคาร-</option>
						 <?php foreach($bookbankList['result'] AS $bookbank){  ?>
						  <option value="<?php echo $bookbank->id?>"  ><?php echo $bookbank->bank_name." ".$bookbank->bank_acc_name." ".$bookbank->bank_number?></option>
						 <?php }?>
					   </select><?php */?>
	 <div class="custom-select-container">
        <div class="custom-select-header">
            <span id="selectedHeaderText">เลือกธนาคาร</span>
        </div>
        <div class="custom-select-options">
            <div class="custom-option select-all">
                <input type="checkbox" id="selectAllCheckbox">
                <label for="selectAllCheckbox">-ทุกธนาคาร-</label>
            </div>
			  <div class="custom-option">
				<input type="checkbox" class="option-checkbox"  id="option" value="0">
                <label for="selectAllCheckbox">ธนบัตร</label>
			  </div>
			  <!--<div class="custom-option">
				<input type="checkbox" class="option-checkbox"  id="option" value="-1">
                <label for="selectAllCheckbox">บัตรเครดิต</label>
			  </div>
			  <div class="custom-option">
				<input type="checkbox" class="option-checkbox"  id="option" value="-2">
                <label for="selectAllCheckbox">เช็ค</label>
			  </div>-->
	 <?php foreach($bookbankList['result'] AS $bookbank){  ?>
            <div class="custom-option">
                <input type="checkbox" class="option-checkbox" id="option<?php echo $bookbank->id?>" value="<?php echo $bookbank->id?>">
                <label for="option1<?php echo $bookbank->id?>" value="<?php echo $bookbank->id?>"><?php echo $bookbank->bank_name." ".$bookbank->bank_acc_name." ".$bookbank->bank_number?></label>
			</div>
            <?php }?>
        </div>
    </div>
					</div>
					<div class="col-md-1">
						เลือกวันเริ่ม
						<select id="selectDay" name="selectDay" class="form-select">
							 <!--<option value="all">-ทุกวัน-</option>-->
							<?php for($i=1;$i<=31;$i++){ 
							   $DayValue = sprintf("%02d", $i);
							 ?>
							<option value="<?php echo $DayValue?>" <?php if($currDate==$DayValue){ echo "selected";}?> > <?php echo $i?></option>
							<?php }?>
						</select>
					</div>
					<div class="col-md-1">
						เลือกเดือน
						<select id="selectMonth" name="selectMonth" class="form-select">
							  <!-- <option value="all">--ทุกเดือน--</option>-->
							  <?php $txtSelected = ''; foreach($monthArray AS $monthNo=>$monthName){ 
										if($currMonth==$monthNo){ $txtSelected = "selected";}else{ $txtSelected = ''; }
							   ?>
							   <option value="<?php echo $monthNo?>" <?php echo $txtSelected?>><?php echo $monthName?></option>
							  <?php  } ?>
						</select>
				</div>
				<div class="col-md-1">
						เลือกปี
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
				<div class="col-md-1">
						เลือกวันสิ้นสุด
						<select id="selectDayEnd" name="selectDayEnd" class="form-select">
							<!--  <option value="all">-ทุกวัน-</option>-->
							<?php for($i=1;$i<=31;$i++){ 
							   $DayValue = sprintf("%02d", $i);
							 ?>
							<option value="<?php echo $DayValue?>" <?php if($currDate==$DayValue){ echo "selected";}?> > <?php echo $i?></option>
							<?php }?>
						</select>
					</div>
					 
					<div class="col-md-1">
						เลือกเดือน
						<select id="selectMonthEnd" name="selectMonthEnd" class="form-select">
							  <!-- <option value="all">--ทุกเดือน--</option>-->
							  <?php $txtSelected = ''; foreach($monthArray AS $monthNo=>$monthName){ 
										if($currMonth==$monthNo){ $txtSelected = "selected";}else{ $txtSelected = ''; }
							   ?>
							   <option value="<?php echo $monthNo?>" <?php echo $txtSelected?>><?php echo $monthName?></option>
							  <?php  } ?>
						</select>
				</div>
				<div class="col-md-1">
						เลือกปี
						
						<select id="selectYearEnd" name="selectYearEnd" class="form-select">
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
				<div class="col-md-2" style="padding-top: 25px;">
					 <input type="hidden" id="GetBankID" name="GetBankID" value="all">
					<button type="button" class="btn btn-info btn-sm" onClick="getRecieveList()">ตกลง</button>
				</div>
				</div>
               	<div id="showBankSelect"></div>
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