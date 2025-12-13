<?php //echo print_r($data['sql'])."<br>";
		//echo 'maxPeriod>>'.$data['maxPeriod']."<br>";;
		// print_r($data['payment']);
// print_r($data['resultData']);
//--check permisssion--------
$permission = $this->insurance_model->getPermisssion('report_ins_delete',$this->session->userdata('user_id'));

function toThaiDate($date){
	    $mysqlTimestamp = $date;

		// Create a DateTime object from the MySQL timestamp
		$date = new DateTime($mysqlTimestamp, new DateTimeZone('UTC')); // Assuming your MySQL timestamp is in UTC

		// Convert the timezone to Thai
		$date->setTimezone(new DateTimeZone('Asia/Bangkok'));

		// Format the date in Thai format
		$thaiDate = $date->format('d F Y, H:i:s');

		return $thaiDate;
}
/*$mysqlTimestamp = '2024-03-18 10:30:00';

// Create a DateTime object from the MySQL timestamp
$date = new DateTime($mysqlTimestamp, new DateTimeZone('UTC')); // Assuming your MySQL timestamp is in UTC

// Convert the timezone to Thai
$date->setTimezone(new DateTimeZone('Asia/Bangkok'));

// Format the date in Thai format
$thaiDate = $date->format('d F Y, H:i:s');

echo "Thai Date: $thaiDate";
//echo 'psermission>>>>>>>'.$permission['psermission']; */
?><!DOCTYPE html>

<html lang="en">

<!-- BEGIN HEAD -->



<head>
<style>
	.notRecieveWarning{
		background-color:#FDD4FF;
		color: black;
	}
	.RecieveWarning{
		background-color:#FFFDD8;color: black;
	}
	.RecieveInsurance{
		background-color:#E0FFC0;color: black;
	}
	
</style>
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



<div class="col-md-12">

		<div class="card card-topline-red">

			<div class="card-head">

				<header>รายการลบ</header>                                    
				
			</div>

			<div class="card-body ">
               
				<table class="table table-bordered   full-width" id="ListIns">
                                        <thead>
                                            <tr>
                                               	<th style="text-align: center">ลำดับ</th>
												<th style="text-align: center">เลขกรมธรรม์</th>
												<th style="text-align: center">วันคุ้มครอง</th>
												<th style="text-align: center">ชื่อ - นามสกุล</th>
												<th style="text-align: center">ทะเบียน</th>
												<th style="text-align: center">หมายเหตุ</th>
												<th style="text-align: center">ผู้ลบ</th>
												<th style="text-align: center">รายละเอียด</th>
												<?php /*if($permission['psermission']==2){?>
												<th style="text-align: center">ลบ</th>
												<?php }*/?>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php $n=1; $txtPayType=''; $trClass = ""; foreach($GetData AS $list){ 
													//if($list->is_installment=='1'){
													//	$txtPayType = "ผ่อน";
													//}else if($list->is_installment=='0'){
													//	$txtPayType = "สด";
													//}
												/*$trClass = '';
												if($list->recieve_warning=='0'){
													$trClass = "notRecieveWarning";
												}
												if($list->recieve_warning=='1'){
													$trClass = "RecieveWarning";
												}
												if($list->recieve_warning_yes=='1'){
													$trClass = "RecieveInsurance";
												}*/
	 
											?>	
											<tr class="odd gradeX <?php echo $trClass?>">
												<td style="text-align: center"><?php echo $n?></td>
												<td style="text-align: left"><?php echo $list->insurance_no;//echo $this->insurance_model->translateDateToThai($list->date_work)?></td>
												<td><?php //echo $list->insurance_no;?>
													<?php 	
														if($list->insurance_start!='0000-00-00'){ 
																echo $this->insurance_model->translateDateToThai($list->insurance_start);
														}else if(($list->insurance_start=='0000-00-00')&&($list->act_date_start!='0000-00-00')){
												
														echo $this->insurance_model->translateDateToThai($list->act_date_start);
											}?>
												</td>
												<td><?php echo $list->cust_name?></td>
												<td><?php 
														if($list->work_id=='0'){	echo $list->vehicle_regis."<br>".$list->province_name; }else{ echo $list->vehicle_regis; }
													?></td>
												<td style="text-align: center">
													<span id="insurance_remark<?php echo $list->id?>"><?php echo $list->remark_delete?>
													<Br>วันที่ลบ <?php $dtArray = explode(" ",$list->date_delete); echo $this->insurance_model->translateDateToThai($dtArray[0])." ".$dtArray[1];?>
													</span>
													<br>
													<!--<button class="btn btn-xs btn-default"> + หมายเหตุ</button>-->
												  
												</td>
												<td style="text-align: center"><?php echo $list->name_sname?></td>
												<td style="text-align: center">
													
													<?php if($list->work_id=='0'){?>
													<a href="<?php echo base_url('Insurance_car/work_insurance_add/').$list->id;?>" target="_blank">
														<button class="btn btn-sm btn-info"> รายละเอียด </button>
													</a>
													<?php }else{ ?>
														<a href="<?php echo base_url('Insurance_other/work_insurance_other_add/').$list->province_name."/".$list->work_id."/".$list->id;?>" target="_blank">
														<button class="btn btn-sm btn-info"> รายละเอียด </button>
													</a>
													<?php }?>
												</td><!--$SelectType."/".$list->work_id."/".$list->id;-->
												<?php /*if($permission['psermission']=='2'){?>
												<td style="text-align: center">
													<button type="button" class="btn btn-sm btn-danger" onClick="DeleteInsurance('<?php echo htmlspecialchars($list->cust_name)?>','<?php echo $list->id?>')">x</button>
												</td>
												<?php }*/?>
											</tr>
										<?php $n++; }?>
										</tbody>
                                    </table>
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





<script>
	$(document).ready(function(){
	  $('#ListIns').DataTable( {
          "paging": false,
	 	  "ordering": false,
	      "oLanguage": {
		   "sSearch": "ค้นหา"
		 }
    } );
 })	
</script>