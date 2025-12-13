<!DOCTYPE html>

<html lang="en">

<!-- BEGIN HEAD -->



<head>

<?php include("header.php"); ?>

</head>

<!-- END HEAD 

xxx<?php echo $this->session->userdata('user_id')?>-->

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md page-full-width header-white dark-sidebar-color logo-dark">

<div class="page-wrapper">

<!-- start header -->

<?php include("menu.php"); ?>

<!-- end sidebar menu -->

<!-- start page content -->

<div class="page-content-wrapper">

<div class="page-content">	


<div class="row">

	<div class="col-md-12">

		<div class="card card-topline-red">

			<div class="card-head">

				<header>บันทึกรับเงิน <input type="hidden" name="isSeCret" id="isSeCret" value="<?php echo $audit['canCheckPayment']?>">
				
				&nbsp;&nbsp;&nbsp;
			  </header>                                    
				<div class="pull-right">
					<a href="<?php echo base_url('record_recipe/record_recipe_add/')?>" class="btn btn-sm btn-success">เพิ่มบันทึกรับเงิน</a>&nbsp;&nbsp;
					<a href="<?php echo base_url('record_recipe/')?>" class="btn btn-sm btn-info">รายการบันทึกรับเงิน</a>&nbsp;</div>
			</div>

			<div class="card-body ">
                <table class="table table-bordered">
					<tr>
						<td nowrap="nowrap">วันที่รับเงิน</td>
						<td nowrap="nowrap">ชื่อผุ้จ่ายเงิน</td>
						<td nowrap="nowrap" width="150">ยอดเงิน</td>
						<td nowrap="nowrap">การชำระเงิน</td>
						<td nowrap="nowrap" width="290">บัญชี</td>
						<td nowrap="nowrap" style="min-width: 150px;">ค่าอื่นๆ</td>
						<td nowrap="nowrap"><button type="button" class="btn btn-sm btn-primary" onClick="printThis()">พิมพ์</button></td>
						
					</tr>
					<tr>
						<td nowrap="nowrap"><input name="date_recieve" type="text" class="form-control form-control-sm datepicker" id="date_recieve" value="<?php echo $date_transfer?>" onChange="updateRecieveData(this.value,'date_transfer')" autocomplete="off"></td>
						<td nowrap="nowrap"><input name="payment_by" type="text" class="form-control form-control-sm " id="payment_by" value="<?php echo $payment_by?>" onChange="updateRecieveData(this.value,'payment_by')" autocomplete="off"></td>
					  <td nowrap="nowrap">
						  <input name="amp_recieve" type="text" class="form-control form-control-sm autonumber" id="transfer_amt"  value="<?php echo $transfer_amt?>" onChange="updateRecieveData(this.value,'transfer_amt')" autocomplete="off"></td>
					  <td nowrap="nowrap">
					
					<select name="paytype" class="form-select form-control-sm" id="paytype"  aria-label="" onChange="updateRecieveData(this.value,'pay_type')">
						<option value="0" <?php if($pay_type=='0'){ echo "selected"; }?> >เลือกการชำระเงิน</option>
						<option value="1" <?php if($pay_type=='1'){ echo "selected"; }?> >เงินสด</option>
						<option value="2" <?php if($pay_type=='2'){ echo "selected"; }?> >เงินโอน</option>
						<option value="3" <?php if($pay_type=='3'){ echo "selected"; }?> >บัตรเครดิต</option>
				 		<option value="4" <?php if($pay_type=='4'){ echo "selected"; }?> >เช็ค</option>
					  </select>
						
						</td>
						<td>
							<select name="bank_transfer_id" class="form-select" id="bank_transfer_id" onChange="updateRecieveData(this.value,'bank_id')">
										  <option value="x">-เลือกธนาคาร-</option>
										 <?php foreach($bookbankList['result'] AS $bookbank){?>
						  <option value="<?php echo $bookbank->id?>" <?php if($bank_id==$bookbank->id){ echo "selected"; }?> ><?php echo $bookbank->bank_name." ".$bookbank->bank_acc_name." ".$bookbank->bank_number?></option>
										 <?php }?>

				      </select> </td>
						<td><input type="text" name="other_payment" id="other_payment"  class="form-control form-control-sm autonumber" value="<?php echo $other_payment?>" onChange="updateRecieveData(this.value,'other_payment')" autocomplete="off"></td>
					  <td><button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#largeModelSearch" onClick="clearSearchForm()" >ค้นหาลูกค้า</button>
						
					  </td>
								
					</tr>
					<tr>
					  <td nowrap="nowrap"> หมายเหตุ </td>
					  <td nowrap="nowrap"> <input type="text" id="remark" name="remark" class="form-control form-control-sm" value="<?php echo $remark?>"  onChange="updateRecieveData(this.value,'remark')">
                        <input type="hidden" name="RecieveID" id="RecieveID" value="<?php echo $RecieveID?>">
                       
					  </td>
					  <td nowrap="nowrap"> <input type="checkbox" id="recieve_normal" name="recieve_normal" value="1" onClick="setRemark(this,'รับทั่วไป')" <?php if($recieve_normal=='1'){ echo "checked";}?> > รับทั่วไป</td>
					  <td nowrap="nowrap"><span id="showMainUpdate"></span></td>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
					  <td>
						  <button type="button" class="btn btn-success btn-sm"  onClick="addCustOv()" >เพิ่มลูกค้านอก</button>
						</td>
				  </tr>
				</table>
                <?php /*?><div class="form-group row">
					
					
						<div class="col-md-1">ค้นหาลูกค้า</div>
							<div class="col-md-2">
								<input type="text" id="searchName" class="form-control form-control-sm" placeholder="ชื่อลูกค้า">
							</div>
						<div class="col-md-2">
								<input type="text"  id="searchVregis" class="form-control form-control-sm" placeholder="ป้ายทะเบียน">
						</div>
						
						<div class="col-md-2">
							<button type="button" class="btn btn-success btn-sm" onClick="showCustSearch()">ค้นหา</button>
							&nbsp;&nbsp;
							<button type="reset" class="btn btn-danger btn-sm" onClick="clearSearchForm()" >ยกเลิก</button>
						</div>
					
				</div><?php */?>
			    
			  <div class="row" id="paymentArea"></div>
			
		      <div align="center"><br><br><br>
			 <?php if($audit['canCheckPayment']=='1'){?> 
			  <button type="button" class="btn btn-danger btn-sm" onClick="deleteAllRecieve();">ลบรายการบันทึกรับเงิน</button>
			<?php }?>
			</div>
			<!---->
			   <div class="row" id="showPrint"></div>
			
			</div> 

		</div>

	</div>

</div>

</div>

	
	<div class="modal fade" id="largeModelSearch" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="exampleModalLabel">ค้นหาลูกค้า</h4>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
	<div class="modal-body">
					
			<div class="row">
			 
					<div class="col-md-2">ค้นหาลูกค้า</div>
					<div class="col-md-3">
								<input type="text" id="searchName" class="form-control form-control-sm" placeholder="ชื่อลูกค้า">
					</div>
					<div class="col-md-3">
								<input type="text"  id="searchVregis" class="form-control form-control-sm" placeholder="ป้ายทะเบียน">
					</div>
						
					<div class="col-md-2">
							<button type="button" class="btn btn-success btn-sm" onClick="showCustSearch()">ค้นหา</button>
							&nbsp;&nbsp;
							
						</div>
									
				</div>
									
				<div class="form-group row" id="showCustSearch"></div>
		     </div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">ปิด</button>
									
								</div>
							</div>
						</div>
					</div>
</div>

<!-- end page content -->



<!-- start footer -->	 

<?php include("footer.php"); ?>

<!-- end footer -->



</body>



</html>