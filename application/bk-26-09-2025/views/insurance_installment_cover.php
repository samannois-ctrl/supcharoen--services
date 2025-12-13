<style>
#printCoverAreaOnly2 {
   display : none;
   
  
}

	.outBorder{
		font-size: 18px;
		border-top-style: solid;
		border-top-width: 1px;
		border-top-color: black;
		
	}	
@media print {
    #printAreaOnly {
       display : block;
	  
    }
	
	.outBorder{
		font-size: 18px;
		border-top-style: solid;
		border-top-width: 1px;
		border-top-color: black;
		
	}	
	.btBorderBlack{
		border-bottom-style: solid;
		border-bottom-color: black;
		border-bottom-width: 1px;
	
	}
}
.btBorderBlack {		border-bottom-style: solid;
		border-bottom-color: black;
		border-bottom-width: 1px;
}
</style>
<?php //print_r($insurancePayment) //echo  'act_price_total>'.$act_price_total;?>
<div id="printCoverAreaOnly">
	<table  class="outBorder" border="1" cellpadding="5" >
		<tr>
		  <td width="25%" nowrap="nowrap">ชื่อ กธ.</td>
		  <td colspan="2" nowrap="nowrap" class="btBorderBlack" ><?php echo $cust_name?> &nbsp;</td>
		</tr>		
			<tr>
		  <td width="25%" nowrap="nowrap">เบอร์โทร</td>
		  <td colspan="2" nowrap="nowrap" class="btBorderBlack" ><?php if($cust_telephone_2!=''){ $cust_telephone_2= ",".$cust_telephone_2;} echo $cust_telephone_1." ".$cust_telephone_2;?></td>
		</tr>
		<tr>
		  <td width="25%" nowrap="nowrap">ตัวแทน</td>
		  <td colspan="2" nowrap="nowrap" class="btBorderBlack" >
			 
			  <?php echo $agent_name?>
			  &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $cust_nickname?>
			</td>
		</tr>
		<tr>
		  <td nowrap="nowrap">ทะเบียน</td>
		  <td colspan="2" nowrap="nowrap"  class="btBorderBlack" ><?php echo $vehicle_regis." ".$province_name;?></td>
		</tr>
		<tr>
		  <td nowrap="nowrap">ประเภท</td>
		  <td colspan="2" nowrap="nowrap"  class="btBorderBlack" >
			  
			  <?php 
			  $txtType ='';
			  $totalAll = 0; $getFirstPayment = '';
			  //echo " ins_cas>".$ins_cash." act_cash>".$act_cash; tax_price
			 // echo " insurance_type_name>".$insurance_type_name." actTypeName>".$actTypeName." | ";
			  
			  if(($insurance_type_name!='')&&($actTypeName!='')){
				   $txtType = $insurance_type_name." ,".$actTypeName;
				   //$totalAll = $insurance_total+$act_price_total;
			  }else if(($insurance_type_name=='')&&($actTypeName!='')){
				   $txtType = $actTypeName;
				   //$totalAll =$act_price_total;
			  }else if(($insurance_type_name!='')&&($actTypeName=='')){
				   $txtType = $insurance_type_name;
				   //$totalAll = $insurance_total;
			  }
			  
			  $txtTax ='';
			  if($tax_price > 0){
				  $txtTax =' , ภาษี';
			  }
			  $txtCarchek ='';
			  if($amt_recieve_carcheck>0){
				  $txtCarchek =' ,ตรวจรถ';
			  }
			  
			  echo $txtType.$txtTax.$txtCarchek;
			  
			  $totalAll  = $totalPriceWork;
			  // act_cash ins_cash
			  
			  // insurance_total act_price_total
		/*	  
			$data['amt_recieve_carcheck']=$custDetail->amt_recieve_carcheck;
			$data['amt_recieve_tax']=$custDetail->amt_recieve_tax;
			$data['amt_recieve_act']=$custDetail->amt_recieve_act;
			$data['amt_recieve_ins']=$custDetail->amt_recieve_ins;
		*/	  
			//echo 'amt_recieve_carcheck>'.$amt_recieve_carcheck."<br>";
			//echo 'amt_recieve_tax>'.$amt_recieve_tax."<br>";
			//echo 'amt_recieve_act>'.$amt_recieve_act."<br>";
			//echo 'amt_recieve_ins>'.$amt_recieve_ins."<br>";
			  ?>
			
			</td>
		</tr>
		<tr>
		  <td nowrap="nowrap">วันคุ้มครอง</td>
		  <td colspan="2" nowrap="nowrap" class="btBorderBlack" >
		    <?php  echo $StartCover ?> 	
		  </td>
		</tr>
		<tr>
		  <td valign="top" nowrap="nowrap">ค่าประกัน</td>
		  <td colspan="2" nowrap="nowrap"  class="btBorderBlack" ><?php //echo number_format($totalAll,2)?>
			  
		      <small>
			   <?php $txtPAct =''; $txtPTax ="";  $txtPCheck =""; 
					  if($amt_recieve_act>0){ $txtPAct = " +"; }  
					  if($amt_recieve_tax>0){ $txtPTax = " +"; }  
					  if($amt_recieve_carcheck>0){ $txtPCheck = " +"; }  
				  
				?>
			   <?php if($amt_recieve_ins>0){ ?> <?php echo number_format($insurance_total,2);   }?>
			   <?php if($amt_recieve_act>0){ echo $txtPAct?> <?php echo number_format($amt_recieve_act,2);    }?>
			   <?php if($amt_recieve_tax>0){ echo $txtPTax?> <?php echo number_format($amt_recieve_tax,2);   }?>
			   <?php if($amt_recieve_carcheck>0){ echo $txtPCheck?> <?php echo number_format($amt_recieve_carcheck,2); }?>
			 </small> 
			  
		 </td>
		</tr>
		<tr>
		  <td nowrap="nowrap">ยอดชำระ</td>
		  <td colspan="2" nowrap="nowrap"  class="btBorderBlack" ><?php echo number_format($payment_amount,2)?></td>
      </tr>
		
		
	  <?php if(count($insurancePayment)>0){?>
		<tr class="text-danger">
		  <td nowrap="nowrap" class="text-danger">ผ่อน</td>
		  <td colspan="2" nowrap="nowrap"  class="btBorderBlack" ><?php echo count($insurancePayment)." งวด";?></td>
		</tr>
		<?php }?>
		<?php $n=1; foreach($insurancePayment AS $payment){?>
		<tr class="text-danger">
		  <td nowrap="nowrap" class="text-danger">
			  <?php echo "งวดที่ ".$payment->period?>
			</td>
		  <td nowrap="nowrap"  class="btBorderBlack" >
			  <?php 
				/*if($payment->period=='1'){
					if($act_price_total>0){
						$txtAct = " + พ.ร.บ.".number_format($act_price_total,2);
						$totalAll= " = ".number_format(($payment->amount+$act_price_total),2);
					}else{
						$txtAct='';$totalAll='';
					}
					$showAmoutTxt = number_format($payment->amount,2).$txtAct.$totalAll;	
				}else{   // $data['insurance_total']+$data['act_price_total']+$data['tax_price']+$data['tax_service']+$data['car_check_price']
					
				}*/
				if($payment->period=='1'){   // $act_price_total $tax_price $car_check_price
						$payment->amount = $payment->amount+$act_price_total+$tax_price+$car_check_price;
						$showAmoutTxt = number_format($payment->amount,2);	
					}else{
						$showAmoutTxt = number_format($payment->amount,2);	
					}
				
				$txtDiscount='';
													  
				if($payment->period==(count($insurancePayment))){
					if($payment->discount > 0){ 
						$txtDiscount = number_format($payment->amount,2)."-".number_format($payment->discount,2); 
						$showAmoutTxt = $txtDiscount." = ".number_format(($payment->amount-$payment->discount),2);	
					}else{
						$txtDiscount = number_format($payment->amount,2); 
						$showAmoutTxt = $txtDiscount;	
					}
					
					
				}	
														   
               
														   
				echo $showAmoutTxt; 
			  
			  ?> </td>
		  <td nowrap="nowrap"  class="btBorderBlack" align="right" ><?php if($n>1){ echo $this->insurance_model->translateDateToThai($payment->due_date); }else{ $getFirstPayment =  $this->insurance_model->translateDateToThai($payment->due_date); }?></td>
		</tr>
		<?php $showAmoutTxt=''; $n++; } ?>
	</table>
	<?php //print_r($insurancePayment )?>

	<?php if($cash_duedate!='x'){ ?>	
			<span class="text-danger"> ***ครบกำหนดชำระวันที่ <?php echo $cash_duedate;?>*** </span>
	<?php }  ?>
	<?php if($getFirstPayment!=''){?>
	<span class="text-danger"> ***งวดที่ 1 ชำระไม่เกินวันที่  <?php echo $getFirstPayment;?>*** </span>
	<?php }?>
</div>
<script>
function buildprintReservePrint(content)
{  
  
   var head='<!DOCTYPE html>'+
              '<html>'+
              '<head>'+
              '<meta charset="UTF-8">'+''+
              '<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />'+
              '<style>@media print {  @page     {    size:  auto;  margin: 5mm;  }  html, body {  height: auto;  font-size: 14pt;  } .btBorderBlack{ 		border-bottom-style: solid;		border-bottom-color: black;		border-bottom-width: 1px;		}} </style>'+
              '</head>'+
              '<body>';

  var foot=   '</body>'+
              '</html>';

  return  head+content+foot;      
}

function printDataInstallment(divName)
		{  
		   var divToPrint=document.getElementById(divName);
		   var newWin= window.open("");
			// newWin.print(); 
		   newWin.document.write(buildprintReservePrint(divToPrint.innerHTML));
		   setTimeout(function(){ newWin.print(); 

			newWin.close();
		   }, 1000);
		   //newWin.print();
		   //newWin.close();
		}
	$(document).ready(function(){
		printDataInstallment('printCoverAreaOnly')
	})
</script>