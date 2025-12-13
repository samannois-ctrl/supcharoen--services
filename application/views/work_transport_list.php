<div class="table-scrollable">
			<table class="table">
				<thead>
					<tr>
						<th style="text-align: center">#</th>
						<th style="text-align: center">วันที่ทำรายการ</th>
						<th style="text-align: center">ประเภทงาน</th>
						<th style="text-align: center">ค่าบริการ</th>
						<th style="text-align: center">ส่วนลด</th>
						<th style="text-align: center">ราคาสุทธิ</th>
						<th style="text-align: center">การชำระเงิน</th>
						<th style="text-align: center">หมายเหตุ</th>
						<th style="text-align: center">แก้ไข / ลบ</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($transportList AS $data){
						$data->date_transport=$this->insurance_model->translateDateToThai($data->date_transport);
					?>
					<tr class="active">
						<th scope="row" style="text-align: center">1</th>
						<td><?php echo $data->date_transport?></td>
						<td><?php echo $data->work_type_name?></td>
						<td><?php echo number_format($data->transport_price,2)?></td>
						<td><?php echo number_format($data->transport_discount_price,2)?></td>
						<td><?php echo number_format($data->transport_discount_total,2)?></td>
						<td><?php echo $data->paymentName?></td>
						<td><?php echo $data->transport_remark?></td>		
						<td style="text-align: center">
							<button type="button" class="btn btn-primary btn-xs" onClick="SetTransportVal('<?php echo $data->date_transport?>','<?php echo $data->work_type_id?>','<?php echo number_format($data->transport_price,2)?>','<?php echo number_format($data->transport_discount_price,2)?>','<?php echo number_format($data->transport_discount_total,2)?>','<?php echo $data->transport_payment?>','<?php echo $data->transport_remark?>','<?php echo $data->id?>')">
								<i class="fa fa-pencil"></i>
							</button>
							<button type="button"  class="btn btn-danger btn-xs" onClick="removeTransport('<?php echo $data->id?>','<?php echo $data->work_type_name?>')">
								<i class="fa fa-trash-o "></i>
							</button>
						</td> 
					</tr>
					<?php }?>

				</tbody>
			</table>
		</div>