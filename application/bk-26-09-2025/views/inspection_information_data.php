<style>
	.tableInfomation  td{
		border-width: 1px !important; 
		border-color: black !important;
		border-collapse: separate;
	}
</style>
<div id="printArea">
<div class="printOnly" style="text-align: center; border-bottom: 0px !important">
                                    <p style="font-size: 16px; font-weight: bold">แบบรายงานการตรวจสภาพรถผ่านระบบสารสนเทศ (ระบบใหม่)<br>
                                   		สถานตรวจสภาพรถชื่อ ทรัพย์เจริญเซอร์วิส &emsp;เลขที่ใบอนุญาต สข.002/2549 &emsp;จังหวัด สงขลา<br>
										ประจำเดือน <?php echo $select_month_name?> พ.ศ. <?php echo $select_year_name?>
									</p>
</div>
	<?php //echo $getData['sql'] class="table table-hover  table-bordered order-column full-width"?>
<table  class="tableInfomation " width="99%" id="example1">
	<thead>
		<tr>
			<td style="text-align: center"><strong>ลำดับ</strong></td>
			<td style="text-align: center"><strong>หมายเลขทะเบียนรถ</strong></td>
			<td style="text-align: center"><strong>ประเภทรถ<br>
		    (รย.1, รย.2, รย.3, รย.12)</strong></td>
			<td style="text-align: center"><strong>วันที่ตรวจสภาพรถ</strong></td>
			<td style="text-align: center"><strong>เวลาที่ตรวจสภาพรถ</strong></td>
			<td style="text-align: center"><strong>พนักงานบันทึกเวลา</strong></td>
		</tr>
	</thead>
	<tbody>	
	<?php $n=1; $tabIndex=0; foreach($getData['resultData']->result() AS $data){ 
				$checkTimeArray = explode(":",$data->car_check_time);
		?>		
		<tr>
			<td align="center" ><?php echo $n?></td>
			<td align="center" style="text-align: center"><?php echo $data->vehicle_regis." ".$data->province_name?></td>
			<td align="center" style="text-align: center"><?php echo $data->initials_name?></td>
			<td align="center" style="text-align: center"><?php echo $this->insurance_model->translateDateToThai($data->car_check_date)?></td>
			<td align="center" style="text-align: center"><?php //echo $data->car_check_time?>
			<?php /*echo $tabIndex?>>>| <?php echo $tabIndex+$n?> |  <?php echo $tabIndex+1+$n?> | <?php echo $tabIndex+2+$n*/?> 
			      <input type="text" id="hr<?php echo $data->id?>" maxlength="2" style="width: 30px" tabindex="<?php echo $tabIndex+$n?>" value="<?php echo $checkTimeArray[0]?>" onClick="this.select()" onChange="updateCarcheckTime('<?php echo $data->id?>','hr',this.value)"> 
				: <input type="text" id="min<?php echo $data->id?>" maxlength="2" style="width: 30px" tabindex="<?php echo $tabIndex+1+$n?>"  value="<?php echo $checkTimeArray[1]?>"  onClick="this.select()"  onChange="updateCarcheckTime('<?php echo $data->id?>','min',this.value)"> 
				: <input type="text" id="sec<?php echo $data->id?>" maxlength="2" style="width: 30px" tabindex="<?php echo $tabIndex+2+$n?>"  value="<?php echo $checkTimeArray[2]?>"  onClick="this.select()"  onChange="updateCarcheckTime('<?php echo $data->id?>','sec',this.value)">
				<?php $tabIndex = $tabIndex+2?>
			</td>
			<td align="center" style="text-align: center"><div id="emp<?php echo $data->id?>"><?php echo $data->name_sname?></div></td>
			
		</tr>
  <?php  $n++;  }?>
	</tbody> 
</table>

	<div class="page-break">&nbsp;</div>
	
	<div class="row printOnly">
        <div class="col-md-12" align="center">
			<!--<table style="width: 70%; text-align: center; border: 2px solid;">
				<tr>
					<td style="font-size: 26px; font-weight: bold; text-align: center; padding: 25px; background-color: #77C14E;">สถานตรวจสภาพรถทรัพย์เจริญเซอร์วิส</td>
				</tr>
				<tr>				  
				  <td style="font-size: 26px; font-weight: bold; text-align: center; padding: 25px; border-top: 2px solid;">รถที่ตรวจสภาพ</td>
			  	</tr>
				<tr>				  
				 <td style="font-size: 26px; font-weight: bold; text-align: center; padding: 25px; border-top: 2px solid;">วันที่ 1 - <?php /*echo $lastDate?> <?php echo $select_month_name?> <?php echo $select_year_name?></td>
			  	</tr>
				<tr>				  
				  <td style="font-size: 40px; font-weight: bold; text-align: center; padding: 25px; border-top: 2px solid;">จำนวน <?php echo $n-1*/?> คัน</td>
			  	</tr>
			</table>-->
        </div>
   </div>	
</div>
<script>
 $('#example1').DataTable( {
          "paging": false,
	 	  "ordering": false,
	      "oLanguage": {
		   "sSearch": "ค้นหา"
		 }
    } );
</script>