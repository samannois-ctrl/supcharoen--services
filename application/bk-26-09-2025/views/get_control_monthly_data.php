
<?php //echo $getData['sql']."<br>";
       //print_r($getData['resultData'])?>
<div class="formgroup row">
	 
		<div class="col-md-2">
		<?php echo $monthName." ".$selectYearName?>
		</div>
		<div class="col-md-4">
		<select name="insurance_corp_id" class="form-select"  id="insurance_corp_id" aria-label="" style="padding-right: 50px;" >
		<option value="x">ทุกบริษัท</option>
			<?php foreach($listInsCorp AS $corp){?>
			<option value="<?php echo $corp->id?>"><?php echo $corp->company_name?></option>
			<?php }?>
		</select>
 		</div>
 		
</div>

<div class="table-responsive">
<table width="100%" id="controlTable" class="table table-bordered">
	<thead>		
	<tr style="background-color: #FFFAD2">
						<td>เลขที่ กธ. </td>  
						<td>ชื่อ - นามสกุล</td>  
						<td>บริษัท</td>  
						<td>ประเภท</td>  
						<td>ยอดสุทธิ</td>  
						<td>ยอดรวม</td>  
						<td>ยอดเก็บตัวแทน</td>  
						<td>วันที่รับเงิน</td>  
						<td>เบี้ยนำส่ง</td>  
						<td>วันจ่ายเช็ค</td>  
						<td>ตัวแทน</td>  
						
		</tr>
	</thead>
	<tbody>
	<?php $txtRenew=''; $n=0;   $sumAgent = 0; $sumDelivery = 0; $keygroupCheck = ""; $showBtn = 0;
		foreach($getData['resultData'] AS $data){ 
	                $countPayment = $this->insurance_model->countPayment($data->workID);
					if($countPayment<=0){ $txtPayment =  "สด";}else { $txtPayment = "ผ่อน-".$countPayment;}
	               
				    if(($data->insurance_renew=='0')&&($data->insurance_data_type==1)){ $txtRenew ='ต่ออายุ'; }
	                if(($data->insurance_renew=='1')&&($data->insurance_data_type==1)){ $txtRenew ='งานใหม่'; }
	                if(($data->insurance_renew=='2')&&($data->insurance_data_type==1)){ $txtRenew ='ต่อ ย้าย'; }
					
					if(($data->insurance_renew=='1')&&($data->insurance_data_type==4)){ $txtRenew ='งานใหม่'; }
					if(($data->insurance_renew=='2')&&($data->insurance_data_type==4)){ $txtRenew ='ต่ออายุ'; }
					if(($data->insurance_renew=='0')&&($data->insurance_data_type==4)){ $txtRenew =''; }
			
					//$sumAgent = $sumAgent+$data->amt_recieve_ins+$data->amt_recieve_act;
					//$sumDelivery = $sumDelivery+$data->delivery_allowance+$data->act_delivery_allowance;
	
			
	if(($keygroupCheck!=$data->keygroup)){ $showBtn=1; ?>
	<tr  style="height: 1px;background-color: #DCDCDC; color: red">
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<?php }
			
			
		
		if(($data->insurance_total>=0)&&($data->select_ins_bill=='1')){
				  
				   //---------link to add page
				    if($data->insurance_data_type=='1'){
						$linkUrl = "Insurance_car/work_insurance_add/".$data->workID;
					}else if($data->insurance_data_type > '1'){
						$getOtherData = $this->insurance_model->getOtherInsID($data->insurance_data_type,$data->workID); 
						$linkUrl = "Insurance_other/work_insurance_other_add/".$data->insurance_data_type."/".$data->workID."/".$getOtherData['ins_id'];
					}
				  
?>

	
	<tr>
	  <td><?php echo $data->insurance_no?> 
		  
		  <?php //echo 'showBtn>'.$showBtn?>
		 <?php /*if($keygroupCheck!=$data->keygroup){  ?>
					  <br> <a class="btn btn-success btn-sm" href="<?php echo base_url('Insurance_car/insurance_billing/').$data->keygroup."/".$data->control_month."/".$data->control_year?>">รายละเอียด</a>
					   <?php $keygroupCheck=$data->keygroup; } */
		  
		     if($showBtn==1){ ?>
				<br><a class="btn btn-success btn-sm" href="<?php echo base_url('Insurance_car/insurance_billing/').$data->keygroup."/".$data->control_month."/".$data->control_year?>">รายละเอียด</a> 
		 <?php	 $showBtn = 0; }  ?>
		  
		  
		  
				 
		 </td>
								  <td>
									  
									  <a href="<?php echo base_url($linkUrl)?>" target="_blank">
									  <?php echo $data->cust_name?>
									  
									  </a>
									  <br>ทะเบียน : <?php echo $data->vehicle_regis." ".$data->province_name?></td>
								  <td><?php echo $data->company_name?></td>
								  <td><?php //echo $data->insurance_type_name?>
								<?php switch($data->insurance_data_type){
											  case "1" :
					  								echo $data->insurance_type_name;
											  break;
			                                    case "4" :
				  									echo "ประกันอุบัติเหตุ";
				                                break;
				                                case "3" :
				  									echo "ประกันขนส่ง";
				                                break;
				   								case "2" :
				  									echo "ประกันท่องเที่ยว";
				                                break;
				  								case "5" :
				  									echo "ประกันบ้าน";
				                                break;
		  									}
									  ?>
		
							</td>
								  <td align="right"><?php echo number_format($data->insurance_total_net,2)?></td>
								  <td align="right"><?php echo number_format($data->insurance_total,2)?></td>
								  <td align="right"><?php echo number_format($data->amt_recieve_ins,2);$sumAgent=$sumAgent+$data->amt_recieve_ins?></td>
								  <td><?php //echo $data->CtrlID?><?php echo $data->revieve_date?></td>
								  <td align="right"><?php echo number_format($data->delivery_allowance,2); $sumDelivery=$sumDelivery+$data->delivery_allowance?></td>
								  <td align="center"><?php echo $data->check_payment_date?></td>
								  <td><?php echo $data->agent_name?></td>
								
	</tr>
<?php   } 
	if(($data->act_price_total>0)&&($data->select_act_bill=='1')){  //$keygroupCheck=$data->keygroup; // actTypeName , f.company_name  AS actCorpName 
	//	if($keygroupCheck!=$data->keygroup){ $keygroupCheck=$data->keygroup;
?>
								<tr>
								 <td><?php echo $data->act_no?> 
									<?php /*if($keygroupCheck!=$data->keygroup){  $keygroupCheck=$data->keygroup;?> 
									 <br><a class="btn btn-success btn-sm" href="<?php echo base_url('Insurance_car/insurance_billing/').$data->keygroup."/".$data->control_month."/".$data->control_year?>">รายละเอียด</a>
									 <?php } */?>
									<?php  if($showBtn==1){ ?>
				<a class="btn btn-success btn-sm" href="<?php echo base_url('Insurance_car/insurance_billing/').$data->keygroup."/".$data->control_month."/".$data->control_year?>">รายละเอียด</a> 
		 <?php	 $showBtn = 0; }  ?>
									</td>
								  <td><a href="<?php echo base_url('Insurance_car/work_insurance_add/').$data->workID?>" target="_blank"><?php echo $data->cust_name?></a><br>
									ทะเบียน : <?php echo $data->vehicle_regis." ".$data->province_name?>
									</td>
								  <td><?php echo $data->actCorpName?> </td>
								  <td><?php echo $data->actTypeName?> </td>
								  <td align="right"><?php echo number_format($data->act_price_net,2)?></td>
								  <td align="right"><?php echo number_format($data->act_price_total,2)?></td>
								  <td align="right"><?php echo number_format($data->amt_recieve_act,2);$sumAgent=$sumAgent+$data->amt_recieve_act?></td>
								  <td><?php echo $data->act_revieve_date?></td>
								  <td align="right"><?php echo  number_format($data->act_delivery_allowance,2); $sumDelivery=$sumDelivery+$data->act_delivery_allowance?></td>
								  <td align="center"><?php echo $data->act_check_payment_date?></td>
								  <td><?php echo $data->agent_name?></td>
								 
							    </tr>
	
	
	
   <?php  }  ?>

	<?php $n++;	$keygroupCheck=$data->keygroup; }?>
	
	
	<tfoot>
	<tr id="totalRow" style="background-color: #FFF0C5">
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
	  <td>&nbsp;</td>
								  <td align="right">&nbsp;</td>
								  <td align="right">&nbsp;</td>
	  <td align="right"><strong id="sumAgentCollect"><?php echo number_format($sumAgent,2)?></strong></td>
								  <td align="right">&nbsp;</td>
								  <td align="right" > <strong id="sumDelivery"><?php echo number_format($sumDelivery,2)?></strong></td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								 
  </tr>
	</tfoot>	
</tbody>

	 </table>
</div>
<script>
 
	$(document).ready(function(){
	  $('#controlTable').DataTable( {
          "paging": false,
	 	  "ordering": false,
		  "info": false, 
	      "oLanguage": {
		   "sSearch": "ค้นหา"
		 }
    } );
		
	   
            const AGENT_COLLECT_COL_INDEX = 6; // ยอดเก็บตัวแทน
            const DELIVERY_COL_INDEX = 8;     // เบี้ยนำส่ง

             
            function calculateAndDisplayTotals() {
                let totalAgentCollect = 0;
                let totalDelivery = 0;

                
                $('#controlTable tbody tr:not(.hidden-row)').each(function() {
                    
                    let agentCollectText = $(this).find('td').eq(AGENT_COLLECT_COL_INDEX).text().trim().replace(/,/g, '');
                    let agentCollect = parseFloat(agentCollectText) || 0; // ใช้ || 0 เพื่อจัดการกรณีแปลงเป็นตัวเลขไม่ได้

                   
                    let deliveryText = $(this).find('td').eq(DELIVERY_COL_INDEX).text().trim().replace(/,/g, '');
                    let delivery = parseFloat(deliveryText) || 0;

                    totalAgentCollect += agentCollect;
                    totalDelivery += delivery;
                });

               
                $('#sumAgentCollect').text(totalAgentCollect.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ','));
                $('#sumDelivery').text(totalDelivery.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ','));
            }

             
            $('#insurance_corp_id').val('x');
            $('#controlTable tbody tr').removeClass('hidden-row');
            calculateAndDisplayTotals();  

             
            $('#insurance_corp_id').on('change', function() {
                const selectedText = $(this).find('option:selected').text().trim();
                
                $('#controlTable tbody tr').each(function() {
                    const companyName = $(this).find('td').eq(2).text().trim(); 

                    if (selectedText === 'ทุกบริษัท') {
                        $(this).removeClass('hidden-row');
                    } else if (companyName === selectedText) {
                        $(this).removeClass('hidden-row');
                    } else {
                        $(this).addClass('hidden-row');
                    }
                });
                calculateAndDisplayTotals(); // เรียกฟังก์ชันคำนวณผลรวมใหม่ทุกครั้งที่ฟิลเตอร์
            });

 })	
</script>
