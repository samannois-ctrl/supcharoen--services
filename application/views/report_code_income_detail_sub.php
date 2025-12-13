<?php print_r($getCodeDetail)?>

<table class="table table-striped table-bordered table-hover table-checkable order-column full-width">
	<thead>
		<tr>
			<th style="text-align: center">ลำดับ</th>
			<th style="text-align: center">ตัวแทน</th>
			<th style="text-align: center">ลูกค้า</th>
			<th style="text-align: center">ประเภท</th>
			<th style="text-align: center">เบี้ยสุทธิ</th>
		</tr>
	</thead>
	<tbody>
		<?php $n=1; $sumTotal=0; foreach($getCodeDetail['Data0'] AS $data){ 
					if($data->insurance_data_type=='1'){
						$link = "<a href='".base_url('Insurance_car/work_insurance_add/').$data->id."' target='_blank'>";
					}else{
						$otherID = $this->insurance_model->getOtherInsID($data->insurance_data_type,$data->id);
						
						$link = "<a href='".base_url('Insurance_other/work_insurance_other_add/').$data->insurance_data_type."/".$data->id."/".$otherID['ins_id']."' target='_blank'>";
					}
				?>
			<tr>
				<td style="text-align: center"><?php echo $n?></td>
				<td>
					<?php echo $data->conde_name?>
				</td>
				<td>
				  <?php echo $link.$data->cust_name."</a>";?>
				</td>
				<td>
				  <?php //echo $data->insurance_data_type." | ";
						switch($data->insurance_data_type){
							case "1":
								 //echo "ประกันภาคสมัครใจ";
								 echo "พรบ.";
							break;
							case "2":
								echo "ประกันท่องเทียว";
							break;
							case "3":
								echo "ประกันขนส่ง";
							break;
							case "4":
								echo "ประกันอุบัติเหตุ";
							break;
							case "5":
								echo "ประกันบ้าน";
							break;
						}
					?>
				</td>
				<td align="right"><?php echo number_format($data->total_price,2);  $sumTotal = $sumTotal+$data->total_price;?></td>
			</tr>
		
		<?php $n++; } ?>
			<?php    foreach($getCodeDetail['Data1'] AS $data){ 
					if($data->insurance_data_type=='1'){
						$link = "<a href='".base_url('Insurance_car/work_insurance_add/').$data->id."' target='_blank'>";
					}else{
						$otherID = $this->insurance_model->getOtherInsID($data->insurance_data_type,$data->id);
						
						$link = "<a href='".base_url('Insurance_other/work_insurance_other_add/').$data->insurance_data_type."/".$data->id."/".$otherID['ins_id']."' target='_blank'>";
					}
				?>
			<tr>
				<td style="text-align: center"><?php echo $n?></td>
				<td>
					<?php echo $data->conde_name?>
				</td>
				<td>
				  <?php echo $link.$data->cust_name."</a>";?>
				</td>
				<td>
				  <?php //echo $data->insurance_data_type." | ";
						switch($data->insurance_data_type){
							case "1":
								 echo "ประกันภาคสมัครใจ";
								 //echo "พรบ.";
							break;
							case "2":
								echo "ประกันท่องเทียว";
							break;
							case "3":
								echo "ประกันขนส่ง";
							break;
							case "4":
								echo "ประกันอุบัติเหตุ";
							break;
							case "5":
								echo "ประกันบ้าน";
							break;
						}
					?>
				</td>
				<td align="right"><?php echo number_format($data->total_price,2);  $sumTotal = $sumTotal+$data->total_price;?></td>
			</tr>
		
		<?php $n++; } ?>
				<?php    foreach($getCodeDetail['Data2'] AS $data){ 
					if($data->insurance_data_type=='1'){
						$link = "<a href='".base_url('Insurance_car/work_insurance_add/').$data->id."' target='_blank'>";
					}else{
						$otherID = $this->insurance_model->getOtherInsID($data->insurance_data_type,$data->id);
						
						$link = "<a href='".base_url('Insurance_other/work_insurance_other_add/').$data->insurance_data_type."/".$data->id."/".$otherID['ins_id']."' target='_blank'>";
					}
				?>
			<tr>
				<td style="text-align: center"><?php echo $n?></td>
				<td>
					<?php echo $data->conde_name?>
				</td>
				<td>
				  <?php echo $link.$data->cust_name."</a>";?>
				</td>
				<td>
				  <?php //echo $data->insurance_data_type." | ";
						switch($data->insurance_data_type){
							case "1":
								 echo "ประกันภาคสมัครใจ";
								 //echo "พรบ.";
							break;
							case "2":
								echo "ประกันท่องเทียว";
							break;
							case "3":
								echo "ประกันขนส่ง";
							break;
							case "4":
								echo "ประกันอุบัติเหตุ";
							break;
							case "5":
								echo "ประกันบ้าน";
							break;
						}
					?>
				</td>
				<td align="right"><?php echo number_format($data->total_price,2);  $sumTotal = $sumTotal+$data->total_price;?></td>
			</tr>
		
		<?php $n++; } ?>
				<?php    foreach($getCodeDetail['Data3'] AS $data){ 
					if($data->insurance_data_type=='1'){
						$link = "<a href='".base_url('Insurance_car/work_insurance_add/').$data->id."' target='_blank'>";
					}else{
						$otherID = $this->insurance_model->getOtherInsID($data->insurance_data_type,$data->id);
						
						$link = "<a href='".base_url('Insurance_other/work_insurance_other_add/').$data->insurance_data_type."/".$data->id."/".$otherID['ins_id']."' target='_blank'>";
					}
				?>
			<tr>
				<td style="text-align: center"><?php echo $n?></td>
				<td>
					<?php echo $data->conde_name?>
				</td>
				<td>
				  <?php echo $link.$data->cust_name."</a>";?>
				</td>
				<td>
				  <?php //echo $data->insurance_data_type." | ";
						switch($data->insurance_data_type){
							case "1":
								 echo "ประกันภาคสมัครใจ";
								 //echo "พรบ.";
							break;
							case "2":
								echo "ประกันท่องเทียว";
							break;
							case "3":
								echo "ประกันขนส่ง";
							break;
							case "4":
								echo "ประกันอุบัติเหตุ";
							break;
							case "5":
								echo "ประกันบ้าน";
							break;
						}
					?>
				</td>
				<td align="right"><?php echo number_format($data->total_price,2);  $sumTotal = $sumTotal+$data->total_price;?></td>
			</tr>
		
		<?php $n++; } ?>
		<?php    foreach($getCodeDetail['Data4'] AS $data){ 
					if($data->insurance_data_type=='1'){
						$link = "<a href='".base_url('Insurance_car/work_insurance_add/').$data->id."' target='_blank'>";
					}else{
						$otherID = $this->insurance_model->getOtherInsID($data->insurance_data_type,$data->id);
						
						$link = "<a href='".base_url('Insurance_other/work_insurance_other_add/').$data->insurance_data_type."/".$data->id."/".$otherID['ins_id']."' target='_blank'>";
					}
				?>
			<tr>
				<td style="text-align: center"><?php echo $n?></td>
				<td>
					<?php echo $data->conde_name?>
				</td>
				<td>
				  <?php echo $link.$data->cust_name."</a>";?>
				</td>
				<td>
				  <?php //echo $data->insurance_data_type." | ";
						switch($data->insurance_data_type){
							case "1":
								 echo "ประกันภาคสมัครใจ";
								 //echo "พรบ.";
							break;
							case "2":
								echo "ประกันท่องเทียว";
							break;
							case "3":
								echo "ประกันขนส่ง";
							break;
							case "4":
								echo "ประกันอุบัติเหตุ";
							break;
							case "5":
								echo "ประกันบ้าน";
							break;
						}
					?>
				</td>
				<td align="right"><?php echo number_format($data->total_price,2);  $sumTotal = $sumTotal+$data->total_price;?></td>
			</tr>
		
		<?php $n++; } ?>		
			<?php    foreach($getCodeDetail['Data5'] AS $data){ 
					if($data->insurance_data_type=='1'){
						$link = "<a href='".base_url('Insurance_car/work_insurance_add/').$data->id."' target='_blank'>";
					}else{
						$otherID = $this->insurance_model->getOtherInsID($data->insurance_data_type,$data->id);
						
						$link = "<a href='".base_url('Insurance_other/work_insurance_other_add/').$data->insurance_data_type."/".$data->id."/".$otherID['ins_id']."' target='_blank'>";
					}
				?>
			<tr>
				<td style="text-align: center"><?php echo $n?></td>
				<td>
					<?php echo $data->conde_name?>
				</td>
				<td>
				  <?php echo $link.$data->cust_name."</a>";?>
				</td>
				<td>
				  <?php //echo $data->insurance_data_type." | ";
						switch($data->insurance_data_type){
							case "1":
								 echo "ประกันภาคสมัครใจ";
								 //echo "พรบ.";
							break;
							case "2":
								echo "ประกันท่องเทียว";
							break;
							case "3":
								echo "ประกันขนส่ง";
							break;
							case "4":
								echo "ประกันอุบัติเหตุ";
							break;
							case "5":
								echo "ประกันบ้าน";
							break;
						}
					?>
				</td>
				<td align="right"><?php echo number_format($data->total_price,2);  $sumTotal = $sumTotal+$data->total_price;?></td>
			</tr>
		
		<?php $n++; } ?>	
		
	<tr >
	  <td style="text-align: center">&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td align="right">รวม</td>
	  <td align="right"><?php echo number_format($sumTotal,2);?></td>
	  </tr>
	</tbody>
</table> 