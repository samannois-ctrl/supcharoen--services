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

		<div class="page-title">ตั้งค่าหัก % พ.ร.บ.</div>

	</div>

</div>

</div>



<!-- start Payment Details -->

<div class="row">

<div class="col-md-12 col-sm-12">

<div class="white-box border-gray">

<div class="card-head" style="padding-bottom: 20px">

<header>ข้อมูลประเภทรถยนต์</header>
	

 </div>
<div class="card-body ">
  <div class="row">

		 <div class="form-group row">
			 <div class="col-sm-3">ประเภทรถ
			   <select name="tbl_car_type_id" class="form-control form-control-sm" id="tbl_car_type_id">
			 		  <option value="x">--เลือกประเภท--</option>
						<?php foreach($listCartype['result'] AS $cartype){ ?>
				 		<option value="<?php echo $cartype->id?>"><?php echo $cartype->type_full_name?></option>
						<?php }?>
				   </select>
			 </div>
			 <div class="col-sm-3"> ขนาดเครื่องยนต์
			   <input name="cc" type="text"  class="form-control form-control-sm" id="cc"> 
			 </div>
			 <div class="col-sm-2">เบี้ยรวม
			 		<input name="total_premium" type="text"  class="form-control form-control-sm" id="total_premium"> 
			 </div>
			  <div class="col-sm-2">เบี้ยชำระ
			 		<input name="premium" type="text"  class="form-control form-control-sm" id="premium"> 
			 </div>
			   <div class="col-sm-2">
			 	  <button type="button" class="btn btn-info btn-sm" onClick="addPremium()">เพิ่มข้อมูล</button>
			 </div>
		 </div> 
	</div> 
	<div class="row">   
	   <div class="col-sm-12">
		   <?php //print_r($listCarPremium)?>
	<table class="table table-bordered" width="100%">
		<tr>
			<th width="43">ลำดับ</th>
			<th width="453">ปรเภทรถ</th>
			<th width="144"> หัก</th>
			<th width="17">&nbsp;</th>
			<th width="53">แก้ไข</th>
		</tr>
	<?php $n=1; $txtDedug = '';  foreach($listCartype['result'] AS $data){ 
	       		
			if($data->car_type_group=='1'){
				$txtDedug = '%';
			}else if($data->car_type_group=='2'){
				$txtDedug = 'บาท';
			}
			
		?>
		<tr>
		  <td valign="top"><?php echo $n?></td>
			<td>
			<div style="background-color:#81DBED; padding: 3px;">	<?php echo $data->type_full_name?>&nbsp;<small id="text<?php echo $data->id?>"></small></div>
				
			  <div id="carType<?php echo $data->id?>" style="padding-top: 5px;"></div>
			  
			  </td>
			<td valign="top"><input type="number" class="form-control form-control-sm" value="<?php echo $data->deduct_percent?>" onChange="updateCarDedug('<?php echo $data->id?>',this.value)" ></td>
		  <td width="17"><?php echo $txtDedug?></td>
		  <td valign="top"><button type="button" class="btn btn-sm btn-success">แก้ไข</button></td>
		 </tr>
	 <?php $n++; }?>
	</table>
		</div>  
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