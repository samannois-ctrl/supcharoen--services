	<table class="table display product-overview mb-30" id="support_table5">



	 <thead>

	 <tr>

	<th>#</th>

	 <th width="50%">ชื่อตัวแทน</th>

	 <th>โทรศัพท์</th>

	<th>ค่าคอม(%)</th>

	 <th>ภาษี(%)</th>

	 <th>สถานะ</th>

	<th>แก้ไข</th>

	</tr>

	 </thead>

	<tbody>

	<?php $n=1; foreach($listAgent AS $data){ 

			if($data->agent_status=='0'){

				$txtUse = "<pan class='text-danger'>ไม่ใช้งาน</span>";

			}else{

				$txtUse = "ใช้งาน";

			}

		?>

	<tr>



	<td><?php echo $n?></td>

	  <td><?php echo $data->agent_name?></td>

	  <td><?php echo $data->telephone?></td>

	  <td><?php echo $data->agent_com?></td>

	  <td><?php echo $data->agent_tax?></td>

	  <td><?php echo $txtUse?></td>

	  <td>

	  <a href="javascript:void(0)" onClick="setVal('<?php echo $data->id?>','<?php echo htmlspecialchars($data->agent_name)?>','<?php echo $data->telephone?>','<?php echo $data->agent_com?>','<?php echo $data->agent_tax?>','<?php echo $data->agent_status?>')" class="btn btn-tbl-edit btn-xs"><i class="fa fa-pencil"></i></a>

	 </td>

	 </tr>

	<?php $n++; }?>

	 </tbody>



	</table>

