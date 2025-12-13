<style>
#printCoverAreaOnly {
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
</style>
<?php //print_r($insurancePayment) //echo  'act_price_total>'.$act_price_total;?>
<div id="printCoverAreaOnly">
	<table  class="outBorder" border="1" cellpadding="5" >
		
		<tr>
		  <td width="25%" nowrap="nowrap">ผู้เอาประกัน.</td>
		  <td colspan="2" class="btBorderBlack" ><?php echo $cust_name?></td>
		</tr>
		<!--<tr>
		  <td nowrap="nowrap">กรมธรรม์เลขที่</td>
		  <td colspan="2" nowrap="nowrap" class="btBorderBlack" ><?php echo $policy_number?></td>
      </tr>-->
		<tr>
		  <td nowrap="nowrap">ตัวแทน</td>
		  <td colspan="2" class="btBorderBlack" ><?php echo $agent_name?>&nbsp;&nbsp;&nbsp;<?php echo $cust_nickname?></td>
      </tr>
<?php if($selectType=='3'){?>
		<tr>
		  <td nowrap="nowrap">ทะเบียนเลขที่</td>
		  <td colspan="2" class="btBorderBlack" ><?php echo $register?></td>
      </tr>	
<?php }?>		
		<tr>
		  <td nowrap="nowrap">ตัวแทน/เบอร์โทร</td>
		  <td colspan="2"  class="btBorderBlack" ><?php echo $tel1?></td>
		</tr>
		<tr>
		  <td nowrap="nowrap">ประเภท</td>
		  <td colspan="2"  class="btBorderBlack" >
			  
			  <?php 
			  $txtType ='';
			  $totalAll = 0;
			  
			  switch($selectType){
				case "2" :
					  echo "ประกันท่องเที่ยว" ;
				  break;
				  case "3" :
					  echo "ประกันขนส่ง" ;
				  break;
				  case "4" :
					  echo "ประกันอุบัติเหตุ" ;
				  break;
				  case "5" :
					  echo "ประกันบ้าน";
				  break;
			  }
			  
			  echo '<br>'.$location_insured;
			  ?>
			
			
			</td>
		</tr>
		<tr>
		  <td nowrap="nowrap">วันคุ้มครอง</td>
		  <td colspan="2" class="btBorderBlack" >
		    <?php $xx = explode(" ",$StartCover);  echo $xx[0] ?> 	
		  </td>
		</tr>
		<tr>
		  <td nowrap="nowrap">ค่าประกัน</td>
		  <td colspan="2"  class="btBorderBlack" ><?php echo number_format($total_price,2)?></td>
		</tr>
		<tr>
		  <td nowrap="nowrap">ยอดชำระ</td>
		  <td colspan="2"  class="btBorderBlack" >
			  
			  <?php  //echo number_format($payment_amount,2);
			  		if($is_installment=='1'){
						echo number_format($amount_installment,2);
					}else{
						if($cash_payment_amount > 0){
							echo number_format($cash_payment_amount,2);
						}else{
							echo number_format($payment_amount,2);
						}
					}
			  ?>
			
			</td>
      </tr>
		
		
	  <?php if(count($insurancePayment)>0){ ?>
		<tr class="text-danger">
		  <td nowrap="nowrap" class="text-danger">ผ่อน</td>
		  <td colspan="2"  class="btBorderBlack" ><?php echo count($insurancePayment)." งวด";?></td>
		</tr>
		<?php }?>
		<?php $n=1; $textDueDate=0; foreach($insurancePayment AS $payment){ 
							if($n=='2'){ $cash_duedate=$this->insurance_model->translateDateToThai($payment->due_date); }?>
		<tr class="text-danger">
		  <td nowrap="nowrap" class="text-danger">
			  <?php echo "งวดที่ ".$payment->period?>
			</td>
		  <td  class="btBorderBlack" >
			  <?php 
				if($payment->period=='1'){
					//if($act_price_total>0){
						//$txtAct = " + พ.ร.บ.".number_format($act_price_total,2);
						//$totalAll= " = ".number_format(($payment->amount+$act_price_total),2);
					//}else{
					//	$txtAct='';$totalAll='';
					//}
					$showAmoutTxt = number_format($payment->amount,2).$totalAll;	
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
		  <td  class="btBorderBlack" align="right" ><?php if($n>1){ echo $this->insurance_model->translateDateToThai($payment->due_date); }?></td>
		</tr>
		<?php $showAmoutTxt=''; $n++; } ?>
	</table>
	<?php //print_r($insurancePayment )?>
<?php if($cash_duedate!=''){ ?>	
<span class="text-danger"> ***ครบกำหนดชำระวันที่ <?php echo $cash_duedate; //if($textDueDate!=''){ echo $this->insurance_model->translateDateToThai($textDueDate); }else{ echo "10";}?>*** </span>
<?php } ?>
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