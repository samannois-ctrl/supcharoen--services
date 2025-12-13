<!DOCTYPE html>

<html lang="en">

<!-- BEGIN HEAD -->



<head>

<?php include("header.php"); ?>

<style>
html,body{
width: 100%;
height: 100%;
margin: 0;
padding: 0;
overflow-x: hidden;
}

.txt-center{
text-align: center;
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

		<div class="page-title">ตั้งค่ากำหนดสิทธิ์การใช้งาน</div>

	</div>

</div>

</div>



<!-- start Payment Details -->

<div class="row">

<div class="col-md-12 col-sm-12">

<div class="white-box border-gray">

<div class="card-head" style="padding-bottom: 20px">

<header>สิทธิ์การเข้าถึงเมนู <u class="text-danger"><?php echo $userName;?></u></header>


</div>

<div class="card-body ">

<div class="table-wrap">

	<div class="table-responsive tblHeightSet">
<?php //print_r($menuArray)?>
		<table class="table display product-overview mb-30 table-hover" id="support_table5">

			<thead>

				<tr>

					<th width="10" >ลำดับ</th>

					<th width="30%">ชื่อเมนู</th>

					<th class="txt-center">ห้ามใช้งาน</th>

					<th class="txt-center">ดูได้อย่างเดียว</th>

					<th class="txt-center">ดูและแก้ไขได้</th>

				</tr>

			</thead>

			<tbody>
<?php       
	//-----user data-----------//
	foreach($userData AS $userDetail);
	//-----menu data-----------//
	$nRow=1;
	$nMain=0; $nSub=0; foreach($menuArray AS $key=>$val){ 
					$checkMain = explode("_",$val);
					//if($checkMain='main'){
					//	$menuName = $checkMain[0];
					//}else{
					//	$menuName = $val;
					//}
					if(mb_substr($val,-4)=='main'){
						$val = substr($val,0,-5);
						$isMain=1;
						$nMain++;
						$nSub ='';
						$nSubNum="";
						$styleAlign ='';
						$styleBgHead ='style="background-color: #eef1f5"';
					}else{
						$isMain=0;
						$nSub++;
						$nSubNum=".".$nSub;
						$styleAlign ='style="text-align: right"';
						$styleBgHead ='';
					}
	if($val!=''){
				?>
				<tr <?php echo $styleBgHead?>>

					<td <?php echo $styleAlign?>><?php echo $nMain.$nSubNum?></td>

					<td align="left"><?php echo $val?>&nbsp;<span id="showNoti<?php echo $nRow?>"></span></td>

					<?php $txtCheck = ""; for($i=0;$i<=2;$i++){
							if($userDetail->$key==$i){
								$txtCheck = "checked";
							}else{
								$txtCheck = "";
							}
				//echo $userDetail->$key;
						?>
					<td class="txt-center">
						<div>
							<!--<?php echo $key?><br>-->
							<input class="form-check-input" type="radio" value="0" id="<?php echo $key?>" name="<?php echo $key?>" onClick="setPermission('<?php echo $key?>','<?php echo $i?>','<?php echo $userID?>','<?php echo $nRow?>')" <?php echo $txtCheck?> >
						</div>
					</td>
				 <?php }?>
				

				</tr>
<?php $nRow++;  } } ?>
				<tr>
				  <td align="right">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td class="txt-center">&nbsp;</td>
				  <td class="txt-center">&nbsp;</td>
				  <td class="txt-center">&nbsp;</td>
				  </tr>

			</tbody> 

		</table>

	</div>

</div>

<br>

<!--
<div class="center col-md-12" style="display: inline-block;">

	<button type="submit" class="btn btn-success">บันทึกข้อมูล</button>


	<button type="submit" class="btn btn-danger">ยกเลิก</button>

</div>-->


</div>

</div>

</div>

</div>

<!-- end Payment Details -->



</div>

</div>

<!-- end page content -->



</div>

<!-- end page container -->



<!-- start footer -->

<?php include("footer.php"); ?>

<!-- end footer -->




</body>



</html>