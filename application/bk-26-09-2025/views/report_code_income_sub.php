<?php //print_r($getData['sql'])?>
<?php //print_r($getData['ResultOther'])?>

<h4 class="text-primary"><?php //echo $ins_code_id_text?></h4>

<?php if($isDetail=='0'){ 
	    
		
?>
<?php if($currentPage!='Mainpage'){  ?>
<div class="pull-right">
	 	 <button type="button" class="btn btn-primary btn-sm" onClick="backToMain()"><i class="fa fa-mail-reply"></i> กลับ</button>
</div>
<?php }?>
<table class="table table-striped table-bordered table-hover table-checkable order-column full-width">
	<thead>
		<tr>
			<th style="text-align: center;width: 10px;">ลำดับ</th>
			<th style="text-align: left; width:auto">โค้ด</th>
			<?php if($currentPage!='Mainpage'){  ?><th style="text-align: left">บริษัท</th><?php }?>
			<th style="text-align: right;width: 150px;">เบี้ยสุทธิ</th>
		</tr>
	</thead>
	<tbody>
		<?php $n=1; $sumTotal=0; foreach($getData['Data'] AS $data){ 
			
			  if(isset($data->company_name)){
			  $sumTotal = $sumTotal+$data->total_price;
			
			 $link='';$linkClose='';	  
			  if($currentPage=='Mainpage'){ 
				  $link="<a href='javascript:void(0)' onclick=\"ShowCorpIncode('".$data->code_id."','incomePage')\">"; 
				  $linkClose='</a>';
			  }
		?>
		<tr>
			<td><?php echo $n?></td>
			<td>
			<?php echo $link.$data->conde_name.$linkClose?>
			</td>
			<?php if($currentPage!='Mainpage'){ ?><td><a href="javascript:void(0)" onClick="GetCodeIncomeDetail('<?php echo $data->code_id?>','<?php echo $data->company_id?>','<?php echo htmlspecialchars($data->company_name)?>')"><?php echo $data->company_name?></a></td>
			<?php }?>
			<td align="right"><?php echo number_format($data->total_price,2);?></td>
		</tr>
	   <?php $n++; } }?>
		<tr style="background-color: #FFBBBC">
			<td></td>
			<?php if($currentPage!='Mainpage'){ ?><td></td><?php }?>
			<td align="right">รวม</td>
			<td align="right"><?php echo number_format($sumTotal,2);?></td>
		</td>
	</tbody>
</table>
<?php }else{ ?>
 <div class="pull-right">
	 <input type="hidden" id="company_id" name="company_id" value="<?php echo $company_id?>">
	 <button type="button" class="btn btn-primary btn-sm" onClick="GetCodeIncome()"><i class="fa fa-mail-reply"></i> กลับ</button></div>
<table width="100%" class="table table-striped table-bordered table-hover table-checkable order-column full-width">
	<thead>
		<tr>
			<th width="20" >ลำดับ</th>
			<th>โค้ด</th>
			<th>ชื่อลูกค้า</th>
			
			<th>บริษัท</th>
			<th>เบี้ยสุทธิ</th>
		</tr>
	</thead>
	<tbody>
		<?php $n=1; $sumTotal=0; foreach($getData['Data'] AS $data){ 
			  if(isset($data->company_name)){
			  $sumTotal = $sumTotal+$data->total_price;
				
			$link =''; $insDataType = 0;
				  
			if(isset($data->insurance_type)){  
				
			    $insDataType = $data->insurance_type;
				
			  if(($data->insurance_type > 1)&&($data->insurance_type < 6)){
				///echo "x1";
				$OtherInsID = $this->insurance_model->getOtherInsID($data->insurance_type,$data->workID);
				$link = base_url('Insurance_other/work_insurance_other_add/'.$data->insurance_type."/".$data->workID."/".$OtherInsID['ins_id']);
			  }else{
				  //echo "x2";
				$link = base_url('Insurance_car/work_insurance_add/'.$data->workID);
			  }
				
			}
			 $showEdit =0;
				  
				$total_price =  number_format($data->total_price,2);
		?>
		<tr>
			<td><?php echo $n?></td>
			<td><?php echo $data->conde_name?></td>
			<td><!--[<?php echo $insDataType?>]-->
				<?php if($insDataType < 6){ ?>
				<a href="<?php echo $link?>" target="_blank">
				 <?php echo $data->cust_name?>
				</a>
				<?php }else{  
					  $showEdit =1; 
			          echo $data->cust_name; 
		             }?>
				
			</td>
			
			<td><?php echo $data->company_name?></td>
			<td align="right">
				<?php if($showEdit=='1'){ 
					/*-edit-*/
			 //echo "[".$data->workID."] >";
					  echo "<div class='pull-left'><a href='javascript:void(0)' onclick='removeOtherIncome(".$data->workID.",\"".$total_price."\")'>"
						  ."<i class='material-icons f-left text-danger' title='ลบ'>remove_circle</i>"
						  ."</a></div>";
					  /*-edit-*/
						}
				?>
				<?php echo $total_price;//number_format($data->total_price,2);?>
			
			</td>
		</tr>
	   <?php $n++; } }?>
		<tr style="background-color: #FFBBBC">
			<td></td>
			<td></td>
			<td></td>
			<td align="right">รวม</td>
			<td align="right"><?php echo number_format($sumTotal,2);?></td>
    </tbody>
</table>



<?php }?>