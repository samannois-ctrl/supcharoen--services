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
				
			</div>
	<div id="workArea">

			<div class="card-body ">
                 <div class="row">
						<div class="col-md-1">ค้นหาลูกค้า</div>
						<div class="col-md-2"><input id="custname" type="text" class="form-control form-control-sm" placeholder="ชื่อลูกค้า"></div>
						<div class="col-md-2"><input id="plate_license" type="text" class="form-control form-control-sm" placeholder="ป้ายทะเบียน"></div>
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
					 	<div class="col-md-2">
							<select id="Xagent_id" name="Xagent_id" class="form-select" aria-label="">
																		<option value="x">--เลือกชื่อตัวแทน--</option>
																		<?php foreach($listAgent AS $agent){?>
																		<option value="<?php echo $agent->id?>"  ><?php echo $agent->agent_name?></option>
																		<?php }?>
																	</select>
					    </div>
					 
						<div class="col-md-1"><button type="button" class="btn btn-success btn-sm" onClick="searchCustForbilling()">ค้นหาลูกค้า</button></div>
				
				</div>	
				<div class="row" id="showSearch"></div>
				
			</div> 

            <div class="card-body ">
			รายการที่เลือก<br>
<table class="table table-bordered " id="table2">
	<thead>
		<tr>
			<td width="10">เลือก</td>
			<td>เลือก</td>
			<td>ชื่อลูกค้า</td>
			<td>ป้ายทะเบียน</td>
			<td>วันคุ้มครอง</td>
			<td>รายละเอียด</td>
		</tr>
		
	</thead>
	<tbody></tbody>
</table>
	<div align="center" ><button type="button" class="btn btn-success btn-sm" onClick="goToBillingPage()">ตกลง</button></div>
<!--
	valueList			
		<ul id="valueList">
         Values will be displayed here 
     </ul>
-->
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