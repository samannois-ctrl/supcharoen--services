<div class="row">
	<div class="form-group row">
		<div class="col-md-3">ข้อความ</div>
		<div class="col-md-9"><input type="text" id="dedug_text" name="dedug_text" class="form-control form-control-sm"></div>
	</div>
	<div class="form-group row">
		<div class="col-md-3">จำนวนเงิน</div>
		<div class="col-md-9"><input type="number" id="dedug_amount" name="dedug_amount" class="form-control form-control-sm"></div>
	</div>
	<div class="form-group row" style="text-align: center">
		<div style="width: 30%; margin: 0 auto">
		 <button type="button" class="btn btn-sm btn-success" onClick="addDedug('<?php echo $keygroup?>','<?php echo $billID?>','<?php echo $actType?>')">ตกลง</button>
	    </div>
	</div>
</div>