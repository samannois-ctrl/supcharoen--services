<?php
$Permission=$this->setting_model->employeeDetail($this->session->userdata('user_id'));
foreach($Permission AS $permission);

if(($this->session->userdata('user_branch')=='1')||($this->session->userdata('user_branch')=='0')){
?>
<table class="table table-striped table-bordered table-hover table-checkable order-column full-width"  id="example4">

	<thead>

		<tr>

				<th style="text-align: center">ลำดับ</th>

				<th style="text-align: center">วันทำรายการ</th>

				<th style="text-align: center">ทะเบียนรถ</th>

				<th style="text-align: center">เลขกรมธรรม์</th>

				<th style="text-align: center">เลข พ.ร.บ.</th>													

				<th style="text-align: center">ชื่อ - นามสกุล</th>

				<th style="text-align: center">ชื่อเล่น</th>

				<th style="text-align: center">การชำระเงิน</th>

				<th style="text-align: center">ยอดที่ต้องชำระ</th>

				<th style="text-align: center">คงค้าง</th>

				<th style="text-align: center">หมายเหตุ</th>

				<th style="text-align: center">รายละเอียด</th>

		</tr>

	</thead>

	<tbody>
		<?php $n=1; foreach($resultData AS $data){?>
			<tr>

				<td style="text-align: center"><?php echo $n?></td>

				<td style="text-align: center"><?php echo $this->insurance_model->translateDateToThai($data->date_add);?></td>

				<td><?php echo $data->vehicle_regis." ".$data->province_name?></td>

				<td><?php echo $data->insurance_no?></td>

				<td><?php echo $data->insurance_no?></td>													

				<td><?php echo $data->cust_name?></td>

				<td><?php echo $data->cust_nickname?></td>

				<td style="text-align: center;"><!--<span class="label label-danger label-mini">ตามเงิน</span><br><span style="padding-top: 15px; font-size:12px; color: #FF0004">กำหนดชำระ : 28/09/2565</span>--></td>

				<td style="text-align: right"><!--12,516.88--></td>

				<td style="text-align: right"><!--12,516.88--></td>

				<td style="font-size: 12px;"><!--ตามเงินตั้งแต่วันที่ 25 ก.ย. 65--></td>

				<td style="text-align: center">

					<a href="<?php echo base_url('Insurance_car/work_car_all/'.$data->custID."/".$data->CarID."/".$data->workID); ?>">

						<button class="btn btn-circle btn-success"><i class="fa fa-file-text"></i></button>

					</a>

				</td>

			</tr>
		<?php $n++; }?>
				

	</tbody>

</table>

<?php }else if($this->session->userdata('user_branch')=='2'){?>

<table id="carchek_table" class="table table-striped table-bordered table-hover  full-width">

	<thead>

		<tr>

				<th style="text-align: center">ลำดับ</th>

				<th style="text-align: center">วันทำรายการ</th>

				<th style="text-align: center">ทะเบียนรถ</th>
				<th style="text-align: center">วันจดทะเบียน</th>
				<th style="text-align: center">ประเภทรถ</th>
				<th style="text-align: center">ตรวจสภาพรถ</th>
				<th style="text-align: center">พ.ร.บ.</th>
				<th style="text-align: center">ภาษี</th>

				<th style="text-align: center">ชื่อ - นามสกุล</th>
				<th style="text-align: center">Line</th>

				<th style="text-align: center">รายละเอียด</th>
			<?php if($permission->act_dashboard=='2'){?>
			   <th style="text-align: center">ลบ</th>
            <?php }?>
		</tr>

	</thead>

	<tbody>
		<?php $n=1; foreach($resultData AS $data){  
						$txtDateRegis = '';
	                    $dayArray = explode("-",$data->date_regist);
	                    if($dayArray[1]=='x'){
							 $dayArray[1]=''; 
						}
						if(!isset($dayArray[0])){ $dayArray[0]=''; }
						if(!isset($dayArray[2])){ $dayArray[2]=''; }else if($dayArray[2]!=''){ $dayArray[2]=$dayArray[2]."/"; }
						if(!isset($dayArray[1])){ $dayArray[1]=''; }else if($dayArray[1]!=''){ $dayArray[1]=$dayArray[1]."/"; }
	                    
						$txtDateRegis = $dayArray[2].$dayArray[1].$dayArray[0];
							
					?>
			<tr>

				<td style="text-align: center"><?php echo $n?></td>

				<td style="text-align: center"><?php echo $this->insurance_model->translateDateToThai($data->date_add);?></td>

				<td><?php echo $data->vehicle_regis." ".$data->province_name?>
				   <br>
				
				
				</td>
				<td align="center">
				    <?php 
							//echo $dayArray[2]." ".$dayArray[1]." ".$dayArray[0]."<Br>";
						?>
					<?php echo $txtDateRegis;?>
				
				</td>
				<td><?php echo $data->type_name?></td>
				<td align="center">
					<?php if($data->car_check_price > 0){ ?><i class="fa  fa-check-square-o 2x"></i><?php }?>
				</td>
				<td align="center">
				  <?php if($data->act_price_total > 0){ ?>
					<i class="fa  fa-check-square-o 2x"></i>
				  <?php }?>
				</td>
				<td align="center">
				  <?php if($data->tax_price > 0){ ?>
					<i class="fa  fa-check-square-o 2x"></i>
				  <?php }?>
				</td>
				<td><?php echo $data->cust_name?></td>
				<td><?php if($data->cust_telephone_1!=''){ echo $data->cust_telephone_1;} ?></td>

			  <td style="text-align: center">

					<a href="<?php echo base_url('Insurance_car/work_car_all/'.$data->custID."/".$data->CarID."/".$data->workID); ?>">

						<button class="btn btn-circle btn-success"><i class="fa fa-file-text"></i></button>
						

					</a>

				</td>
				<?php if($permission->act_dashboard=='2'){?>
				<td style="text-align: center"><button class="btn btn-circle btn-danger" onClick="deleteWork('<?php echo $data->workID?>','<?php echo htmlspecialchars($data->cust_name)?>')">ลบ</button></td>
				<?php }?>

			</tr>
		<?php $n++; }?>
				

	</tbody>

</table>
<script>
	$(document).ready(function(){
	  $('#carchek_table').DataTable( {
          "paging": false,
	 	  "ordering": false,
	      "oLanguage": {
		   "sSearch": "ค้นหา"
		 }
    } );
 })	

</script>
<?php } ?>
