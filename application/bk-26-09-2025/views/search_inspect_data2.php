<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php //print_r($resultSearch['sql'])?>
<table class="table table-striped table-bordered table-hover table-checkable order-column full-width" id="example4">
  <thead>
    <tr>
      <th style="text-align: center">ลำดับ</th>
      <th style="text-align: center">วันทำรายการ</th>
      <th style="text-align: center">ทะเบียนรถ</th>
      <th style="text-align: center">&nbsp;</th>
      <th style="text-align: center">ชื่อ - นามสกุล</th>
      <th style="text-align: center">ชื่อเล่น</th>
      <th style="text-align: center">โทรศัพท์</th>
	  <th style="text-align: center">ตรวจสภาพรถ</th>
      <th style="text-align: center">พ.ร.บ.</th>
      <th style="text-align: center">ภาษี</th>
      <th style="text-align: center">รายละเอียด</th>
    </tr>
  </thead>
  <tbody> 
<?php $n=1; foreach($resultSearch['resultData'] AS $key){  
	  		if($key->cust_telephone_1==0){ $key->cust_telephone_1='';}
	  		if($key->cust_telephone_2==0){ $key->cust_telephone_2='';}
			$CustID=$key->CustID; 
			$CarID=$key->CarID; 
			$workID=$key->workID; 
		//- b.act_paid='".$data['payment']."' OR d.tax_paid='".$data['payment']."' OR c.car_check_paid
	        if($key->act_paid=='1'){ $txtActPaid='(ชำระแล้ว)';}else{ $txtActPaid='(ค้างชำระ)'; }
	        if($key->tax_paid=='1'){ $txtTaxPaid='(ชำระแล้ว)';}else{ $txtTaxPaid='(ค้างชำระ)'; }
	        if($key->car_check_paid=='1'){ $txtCheckPaid='(ชำระแล้ว)';}else{ $txtCheckPaid='(ค้างชำระ)'; }
	  ?>  
    <tr class="odd gradeX">
      <td style="text-align: center"><?php echo $n?></td>
      <td style="text-align: center"><?php echo $this->insurance_model->translateDateToThai($key->date_add)?></td>
      <td><?php echo $key->vehicle_regis." ".$key->province_name?></td>
      <td><?php echo $key->type_name?></td>
      <td><?php echo $key->cust_name?></td> 
      <td><?php echo $key->cust_nickname?></td>
      <td style="text-align: center;">
		  <?php echo $key->cust_telephone_1."<br>".$key->cust_telephone_2?></td>
      <td align="center" title="ตรวจสภาพรถ" >
		  <?php if(($key->car_check_price!='0.00')&&($key->car_check_price!='')){ echo number_format($key->car_check_price,2); }?>
		</td>
      <td align="center" title="พ.ร.บ.">
		  <?php if(($key->act_price_total!='0.00')&&($key->act_price_total!='')){  echo number_format($key->act_price_total,2); }?>
		</td>
      <td align="center" title="ภาษี">
		  <?php //echo "tax_price>".$key->tax_price;
	         if(($key->tax_price!='0.00')&&($key->tax_price!='')){ echo number_format($key->tax_price,2); }?>
		</td>
      <td style="text-align: center">
        <button class="btn btn-success btn-sm m-b-10" onClick="
renewME('<?php echo  $key->CustID?>','<?php echo  $key->CarID?>','<?php echo $key->workID?>')" >ต่ออายุ</button>
      </td>
    </tr>
<?php $n++; } ?>  
  </tbody>
</table>
</body>
</html>

