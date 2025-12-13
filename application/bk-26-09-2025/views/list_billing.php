<table class="table table-bordered" width="100%">
						<thead>
							<tr>
								<td colspan="4">รายการ/Description</td>
								<td width="10%">จำนวนเงิน/Amount</td>
								<td width="10%" align="center">ลบ</td>
							</tr>
						</thead>
						<tbody>
						<?php $n=1; $checkIns=0; foreach($data['resultData'] AS $data){ 
							        if($checkIns!=$data->id){
										$showBtnDelete = '1';
									}else{
										$showBtnDelete = '0';
									}
							?>	
							<?php if($data->insurance_total>0){?>
							<tr>
								<td width="19%"><?php echo $data->insurance_no?> </td>
								<td width="27%"><?php echo $data->cust_name?></td>
								<td width="18%"><?php echo $data->vehicle_regis?>
									<div class="pull-right">
									<span id="boxIns<?php echo $data->id?>" style="display: none"><i class="fa  fa-check-circle-o text-success"></i></span>
									</div>
								</td>
								<td width="16%">
									
									<input type="text"  class="form-control autonumber amt"  value="<?php echo $data->insurane_amount?>" onChange="updateAmt('<?php echo $data->id?>','insurane_amount',this.value)">
								
								</td>
								<td align="right"><div id="nRow<?php echo $n?>"></div></td>
								<td><?php if($showBtnDelete=='1'){?>
									<button type="button" class="btn btn-danger btn-sm" onClick="DeleteFromBill('<?php echo $data->id?>','<?php echo $data->cust_name?>')">ลบ</button> <?php $showBtnDelete=0; }?></td>
							</tr>
							<?php }?>
							<?php if($data->act_price_total>0){?>
							<tr>
								<td width="19%"><?php echo $data->act_no?> </td>
								<td width="27%"><?php echo $data->cust_name?></td>
								<td width="18%"><?php echo $data->vehicle_regis?>
									<div class="pull-right">
									<span id="boxAct<?php echo $data->id?>"  style="display: none"><i class="fa  fa-check-circle-o text-success"></i></span></div>
								</td>
								<td width="16%">
									
									<input type="text" class="form-control autonumber amt" value="<?php echo $data->act_amount?>" onChange="updateAmt('<?php echo $data->id?>','act_amount',this.value)"></td>
								<td>&nbsp;</td>
								<td><?php if($showBtnDelete=='1'){?>
									<button type="button" class="btn btn-danger btn-sm" onClick="DeleteFromBill('<?php echo $data->id?>','<?php echo $data->cust_name?>')">ลบ</button> <?php $showBtnDelete=0; }?></td>
							</tr>
							<?php }?>
							<?php $n++; $checkIns=$data->id; }?>
						</tbody>
					
					</table> 
<script>
	$(document).ready(function(){
		getSumAllAmt();
	})
</script>