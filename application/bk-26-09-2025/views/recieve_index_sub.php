<?php //echo $resultData['sql'];
	  //echo "<br>";
	 // print_r($resultData['getDb']);
?>
<style>
	.alg-right{
		text-align: right;
	}
	.alg-left{
		text-align: left;
	}
</style>
<table class="table table-bordered" width="100%">
	<tr>
		<td>#</td>
		<td>วันที่</td>
		<td class="alg-left">ลูกค้า</td>
		<td class="alg-right">ประเภท</td>
		<td class="alg-right">ยอดเงิน</td>
		<td class="alg-right">การชำระเงิน</td>
		<td class="alg-right">บัญชีธนาคาร</td>
		<td class="alg-right">รายละเอียด</td>
	</tr>
	<?php $n=1; $sumRecieve = 0; foreach($resultData['getDb'] AS $data){ 
			
	        $link =""; $carRegister['regist']='';
	        // record_recipe/record_recipe_add/1
	        if($data->Type1=='1'){
				$link = base_url('record_recipe/record_recipe_add/').$data->id;
			}else{
				if($data->insurance_data_type==1){
					$link = base_url('Insurance_car/work_insurance_add/').$data->workID;
					$carRegister = $this->receive_model->getCarRegis($data->workID);
					
					
				}else if($data->insurance_data_type > 1){
					$getInsuranceOtherID = $this->insurance_other_model->getOtherID($data->insurance_data_type,$data->workID);
					$link = base_url('Insurance_other/work_insurance_other_add/').$data->insurance_data_type."/".$data->workID."/".$getInsuranceOtherID['insuranceOtherID'];
				}
			}
	
	?>
	<tr>
	  <td width="10"><?php echo $n?></td>
	  <td><?php echo $this->insurance_model->translateDateToThai($data->date_recieve);?></td>
	  <td class="alg-left">
		 <!--[<?php echo $data->Type1?>]-->
		  <?php if($data->Type1=='1'){ 
			   $getCust = $this->receive_model->getCustFromRevieve($data->id);
													   //print_r( $getCust);
		        $cust_name_list = implode("&nbsp;,&nbsp;&nbsp;",$getCust);
				echo  $cust_name_list;				
			}else if($data->Type1>='2'){ 
					echo  $data->cust_name."&nbsp;&nbsp;&nbsp;<span class='text-primary'>".$carRegister['regist']."</span>"; 
			} ?> 
		
		</td>
	  <td class="alg-right">
		    <?php //echo "insurance_data_type>".$data->insurance_data_type;
					switch($data->insurance_data_type){
						case "1" :
			  				echo "ประกันภาคสมัครใจ";
						break;
						case "2" :
							echo "ประกันท่องเที่ยว";
						break;
						case "3" :
							echo "ประกันขนส่ง";
						break;
						case "4" :
							echo "ประกันอุบัติเหตุ";
						break;
						case "5" :
							echo "ประกันบ้าน";
						break;	
						case "0" :
			                echo "ชำระรวม" ;
						break;	
			
					}
		  ?>
		</td>
	  <td class="alg-right"><?php echo number_format($data->amp_recieve,2); $sumRecieve=$sumRecieve+$data->amp_recieve?></td>
	  <td class="alg-right">
		  <?php
			  echo $data->PayType;
			  /*if($data->Type1<3){   // PayType
			  		echo $data->PayType; 
		  		}else if($data->Type1==3){
			  		 echo $data->Type1.'>>'.$data->PayType;  บัตรเครดิต 
		  		}*/
			  switch($data->Type1){
				  case "2" :
					  if(($data->PayType!='บัตรเครดิต')&&($data->PayType!='เช็ค')){ 
					  //	echo "&nbsp;&nbsp;<span class='text-danger'>(ผ่อน)</span>";
					  }
				  break;
				  case "3" :
					   if(($data->PayType!='บัตรเครดิต')&&($data->PayType!='เช็ค')){ 
					  // echo "&nbsp;&nbsp;<span class='text-success'>(สด)</span>";
					   }
				  break;
					  
					  
			  }
	//echo " |".$data->Type1;
		  ?>
		</td>
	  <td class="alg-right"><?php echo $data->bankName?></td>
	  <td class="alg-right" width="50"><?php //echo 'Type1>'.$data->Type1." insurance_data_type>".$data->insurance_data_type?>
		  <a href="<?php echo $link?>" target="_blank"  class="btn btn-info btn-sm">
			  รายละเอียด
		  </a>
	  </td>
  </tr>
	
  <?php $n++; } ?>
	<tr>
	  <td>&nbsp;</td>
	  <td class="alg-left">&nbsp;</td>
	  <td class="alg-left">&nbsp;</td>
	  <td class="alg-right">รวม</td>
	  <td class="alg-right"><?php echo number_format($sumRecieve,2)?></td>
	  <td class="alg-right">&nbsp;</td>
	  <td class="alg-right">&nbsp;</td>
	  <td class="alg-right">&nbsp;</td>
  </tr>
</table>
