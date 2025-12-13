<table class="table display product-overview mb-30" id="support_table5">
     <thead>
		<tr>
			<th width="10%">#</th>
			<th>ชื่อโค้ด</th>
			<th width="15%">สถานะ</th>
			<th width="5%">แก้ไข</th>
		</tr>
	</thead>
	<tbody>
<?php $n=1;  foreach($listCode AS $data){ 
		$txtCheck1 = ''; $txtCheck2 = '';$NameClass='';
			if($data->code_status==1){
				$txtCheck1 = "checked";
			}
			if($data->code_status==0){
				$txtCheck2 = "checked";
				$NameClass='text-danger';     
			}
?>		
		<tr>
			<td><?php echo $n?></td>
			<td><span id="com_name<?php echo $data->id?>" class="<?php echo $NameClass?>"><?php echo $data->conde_name?></span></td>
			<td>
				<input type="radio" name="status<?php echo $data->id?>" value="1" <?php echo $txtCheck1?> onclick="ChangeStatus('<?php echo $data->id?>',this.value)" > ใช้งาน <br>
               <input type="radio" name="status<?php echo $data->id?>" value="0" <?php echo $txtCheck2?>  onclick="ChangeStatus('<?php echo $data->id?>',this.value)"> ไม่ใช้งาน</td>
			<td><span id="editArea<?php echo $data->code_status?>">
				<a href="javascript:void(0)" class="btn btn-tbl-edit btn-xs" onclick="SetValue('<?php echo $data->id?>','<?php echo htmlspecialchars($data->conde_name)?>','<?php echo $data->code_status?>')">
					<i class="fa fa-pencil"></i>
                </a>
				</span>
			</td>
		</tr>
<?php $n++; }?>		
	</tbody>
</table>