<?php //print_r($resultData['sql'])?>

<table width="100%" class="table table-bordered">
				<tr>
					<th width="17">ที่</th>
					<th width="112">ชื่อธนาคาร</th>
					<th width="139">สาขาธนาคาร</th>
					<th width="83">ชื่อบัญชี</th>
					<th width="175">เลขที่บัญชี</th>
					<th width="56">ต.ร.อ.</th>
					<th width="82">ประกันภัย</th>
					<th width="100">สถานะใช้งาน</th>
				</tr>
	<?php $n=1; foreach($resultData['result'] AS $data){ 
				$select0 = ""; $select1 = ""; $select2=''; $classTr ='';
	
				if($data->data_status=='0'){
					$select0 = "selected";
					$classTr ='style="background-color: #E8A8A9"';
				}
				if($data->data_status=='1'){
					$select1 = "selected";
				}
	
				$tickBranch1 ="";
				$tickBranch2 ="";
				if($data->branch_1=='1'){
					$tickBranch1 = 'checked';
				}	
				if($data->branch_2=='1'){
					$tickBranch2 = 'checked';
				}
				
	?>
				<tr id="row<?php echo $data->id?>"  <?php echo $classTr?> >
				  <th><?php echo $n?></th>
				  <th><?php echo $data->bank_name?></th>
				  <th><?php echo $data->bank_branch?></th>
				  <th><?php echo $data->bank_number?></th>
				  <th><?php echo $data->bank_acc_name?></th>
				  <th><input type="checkbox" <?php echo $tickBranch2?>  onclick="UpdateUseBranch(this,'branch_2','<?php echo $data->id?>')" ></th>
				  <th><input type="checkbox" <?php echo $tickBranch1?> onclick="UpdateUseBranch(this,'branch_1','<?php echo $data->id?>')"></th>
				  <th>
					  <select name="" id="" class="form-control form-control-sm  " onChange="updateStatus('<?php echo $data->id?>',this.value)">
						<option value="0" <?php echo $select2?> >ยกเลิกใช้งาน</option>
						<option value="1" <?php echo $select1?> >ใช้งาน</option>
					 </select>
				</th>
				  </tr>
	 <?php $n++; }?>
		
		</table>