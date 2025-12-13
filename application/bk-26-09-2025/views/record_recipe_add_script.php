<script>
	//----------------------------------
	function calculateSums() {
		let totalSumAllRows = 0;
		$('table.table-bordered tbody tr:not(:first):not(:last)').each(function() {
			let rowSum = 0;
			const $row = $(this);
			$row.find('input.autosum').each(function() {
				let value = parseFloat($(this).val().replace(/,/g, '')) || 0; // แปลงค่าเป็นตัวเลข, ลบ , ออกก่อน
				rowSum += value;
			});
			const firstAutosumId = $row.find('input.autosum[id]').first().attr('id');
			if (firstAutosumId) {
				const rowNumberMatch = firstAutosumId.match(/\d+$/);
				if (rowNumberMatch) {
					const rowNumber = rowNumberMatch[0];
					$(`#resultRow${rowNumber}`).text(rowSum.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
				}
			}
			totalSumAllRows += rowSum;
			console.log('totalSumAllRows>' + totalSumAllRows.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
		});
		$('#showTotal').empty();
		$('#showTotal').text(totalSumAllRows.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
	}
	//----------------------------------remark
	function setRemark(iam, text) {
		if (iam.checked == true) {
			$('#remark').val(text)
			var changeValue = 1;
		} else {
			$('#remark').val('');
			var changeValue = 0;
		}
		var RecieveID = $('#RecieveID').val();
		console.log('RecieveID>>' + RecieveID);
		if (RecieveID != '0') {
			updateRecieveData(changeValue, 'recieve_normal');
			var remarkValue = $('#remark').val();
			updateRecieveData(remarkValue, 'remark');
		}
	}
	//---------------------------------- 
	function printThis() {
		var RecieveID = $('#RecieveID').val();
		$.post('<?php echo base_url('Record_recipe/printRevieve') ?>', {
			RecieveID: RecieveID
		}, function(data) {
			$('#showPrint').empty();
			$('#showPrint').html(data);
		})
	}
	//-----------------------------------
	//-----------------------------------
	function updateRecieveData(changeValue, field) {
		var RecieveID = $('#RecieveID').val();
		$.post('<?php echo base_url('Record_recipe/updateRecieveData') ?>', {
			changeValue: changeValue,
			field: field,
			RecieveID: RecieveID
		}, function(data) {
			console.log(data);
			var obj = JSON.parse(data);
			$('#RecieveID').val(obj.RecieveID);
			var new_url = "<?php echo base_url('record_recipe/record_recipe_add/') ?>" + obj.RecieveID;
			window.history.pushState("data", "ตรอ. ทรัพย์เจริญเซอร์วิส (แยกโรงปูน) ระบบบริหารงานประกันภัยรถยนต์.", new_url);
		})
	}
	//---------------------------------- carcheck_amt tax_amt tax_service_amt act_amt insurance_amt   installment_period  installment_amt 
	function updateRecieveDetail(reCieveDetailID, insurance_id, ins_data_type) {
		var RecieveID = $('#RecieveID').val();
		var carcheck_amt = $('#carcheck_amt' + reCieveDetailID).val();
		var tax_amt = $('#tax_amt' + reCieveDetailID).val();
		var tax_service_amt = $('#tax_service_amt' + reCieveDetailID).val();
		var act_amt = $('#act_amt' + reCieveDetailID).val();
		var insurance_amt = $('#insurance_amt' + reCieveDetailID).val();
		var installment_amt = $('#installment_amt' + reCieveDetailID).val();
		var installment_period = $('#installment_period' + reCieveDetailID + ' option:selected').val();
		var date_recieve = $('#date_recieve').val();
		var pay_type = $('#paytype option:selected').val();
		var bank_id = $('#bank_transfer_id option:selected').val();
		if (ins_data_type == '') {
			var ins_data_type = '-1';
		}
		if ((installment_period == '0') && (installment_amt != '')) {
			alert('กรุณาเลือกงวดผ่อน');
			return false;
		} else if ((installment_period != '0') && (installment_amt == '')) {
			alert('กรุณาใส่จำนวนเงินผ่อน');
			return false;
		} else {
			var inputArray = [carcheck_amt, tax_amt, tax_service_amt, act_amt, insurance_amt, installment_period, installment_amt, RecieveID, date_recieve, insurance_id, pay_type, bank_id, reCieveDetailID, ins_data_type];
			inputArray = $.map(inputArray, function(value) {
				return value === '' ? 0 : value;
			});
			$.post('<?php echo base_url('Record_recipe/updateRecieveDetail') ?>', {
				inputData: inputArray
			}, function(data) {
				var obj = JSON.parse(data);
				console.log(data);
				$('#showResult').removeClass('text-danger');
				$('#showResult').removeClass('text-success');
				if (obj.doDb == '1') {
					$('#showResult').empty();
					$('#showResult').addClass('text-success');
					$('#showResult').html('อัพเดทสำเร็จแล้ว');
					setTimeout(function() {
						$('#showResult').empty();
					}, 3000);
				} else {
					$('#showResult').empty();
					$('#showResult').addClass('text-danger');
					$('#showResult').html('ไม่สามารถอัพเดทได้');
					setTimeout(function() {
						$('#showResult').empty();
					}, 3000);
				}
			})
		}
	}
	//----------------------------------  
	function getValue(gettype, txt, dataID, iam, insID, insType) {
		if ($('#recieve_normal').is(':checked')) {
			var recieve_normal = '1';
		} else {
			var recieve_normal = '0';
		}
		if (iam.checked == false) {
			$('#' + txt).val('');
			var updateValue = 0;
			var isCheck = 0;
			calculateSums();
		} else {
			if (insID == '-1') { //CUST OV
				var getValue = $('#transfer_amt').val();
				$('#' + txt).val(getValue);
				calculateSums();
			} else {
				var updateValue = $('#' + txt).val();
				var isCheck = 1;
				var checkInstallment = $('#installment_amt' + dataID).val();
				var inputArray = [insID, insType, dataID, gettype];
				$.post('<?php echo base_url('Record_recipe/getValue') ?>', {
					inputData: inputArray
				}, function(data) {
					var obj = JSON.parse(data);
					console.log(data);
					if (checkInstallment == '') {
						$('#' + txt).val(obj.value);
						calculateSums();
					} else {
						$('#' + txt).val(checkInstallment);
					}
					calculateSums();
				})
			}
		}
		console.log(updateValue + '  ' + iam.checked + ' ' + gettype + ' ' + insID);
	}
	//---------------------------------- 
	function getInstallment(period, insurance_id, txt, recieveInsID) {
		if (period == '0') {
			$('#' + txt).val('');
		} else {
			var inputArray = [insurance_id, period];
			$.post('<?php echo base_url('Record_recipe/getInstallmentOne') ?>', {
				inputData: inputArray
			}, function(data) {
				var obj = JSON.parse(data);
				console.log(data);
				$('#' + txt).val(obj.value);
				$('#insurance_amt' + recieveInsID).val(obj.value);
				//calculateInsurancePrice(recieveInsID);
				calculateSums();
			})
		}
	}
	//---------------------------------- 
	function calculateInsurancePrice(insurance_id) {
		var insurance_amt = parseFloat($('#insurance_amt' + insurance_id).val().replace(/,/g, ''));
		var installment_amt = parseFloat($('#installment_amt' + insurance_id).val().replace(/,/g, ''));
		console.log('insurance_id>' + insurance_id + 'insurance_amt>' + insurance_amt + ' installment_amt>' + installment_amt);
		var total = insurance_amt + installment_amt;
		console.log(total)
	}
	//--------------------------------  
	function clearSearchForm() {
		$('#searchName').val('');
		$('#searchVregis').val('');
		$('#showCustSearch').empty();
	}
	//-------------------------------- 
	function DeleteMe(recieveInsID, custName, data_type, countInstallment, work_id, recieve_id) {
		if (confirm('ต้องการลบ ' + custName + ' ?')) {
			var RecieveID = $('#RecieveID').val();
			$.post('<?php echo base_url('Record_recipe/DeleteRecieveIns') ?>', {
				recieveInsID: recieveInsID,
				data_type: data_type,
				countInstallment: countInstallment,
				work_id: work_id,
				recieve_id: recieve_id
			}, function(data) {
				var obj = JSON.parse(data);
				console.log(data);
				if (obj.doDb == '1') {
					listPaymentArea(RecieveID, 'all');
					// $('.row'+recieveInsID).remove();
				} else {
					alert('ไม่สามารถลบข้อมูลได้');
				}
			})
		} else {
			return false;
		}
	}
	//--------------------------------
	//--------------------------------
	function listPaymentArea(RecieveID, recieve_ins_id) {
		console.log('recieve_ins_id->' + recieve_ins_id);
		$.post('<?php echo base_url('Record_recipe/listRecievePaymentArea') ?>', {
			RecieveID: RecieveID,
			recieve_ins_id: recieve_ins_id
		}, function(data) {
			//$('#paymentArea').prepend(data);
			$('#paymentArea').empty();
			$('#paymentArea').html(data);
			calculateSums();
			$(document).on('input', 'input.autosum', function() {
				calculateSums();
			});
		})
	}
	//--------------------------------insurance_id 
	function addCustOv() {
		var date_recieve = $('#date_recieve').val();
		var transfer_amt = $('#transfer_amt').val();
		var remark = $('#remark').val();
		var paytype = $('#paytype option:selected').val();
		var bank_transfer_id = $('#bank_transfer_id option:selected').val();
		var RecieveID = $('#RecieveID').val();
		var payment_by = $('#payment_by').val();
		var other_payment = $('#other_payment').val();
		var workID = '-1'; // ตรอ.
		var insType = '-1'; // ตรอ.
		if ($('#recieve_normal').is(":checked")) {
			var recieve_normal = 1;
		} else {
			var recieve_normal = 0;
		}
		var inputArray = [date_recieve, transfer_amt, remark, paytype, bank_transfer_id, RecieveID, workID, insType, payment_by, other_payment, recieve_normal];
		if (date_recieve == '') {
			alert('กรุณาใส่วันที่รับเงิน');
			return false;
		} else if (transfer_amt == '') {
			alert('กรุณาใส่ยอดเงิน');
			return false;
		} else if (paytype == '0') {
			alert('กรุณาเลือกวิธีชำระเงิน');
			return false;
		} else if ((paytype == '2') && (bank_transfer_id == 'x')) {
			alert('กรุณาเลือกธนาคาร');
			return false;
		} else {
			var inputArray = [date_recieve, transfer_amt, remark, paytype, bank_transfer_id, RecieveID, workID, insType, payment_by, other_payment, recieve_normal];
			console.log('input data' + inputArray)
			$.post('<?php echo base_url('Record_recipe/addRecieveChild') ?>', {
				inputData: inputArray
			}, function(data) {
				console.log(data);
				var obj = JSON.parse(data);
				//-----config RecieveID value 
				if (obj.doDb == '1') {
					$('#RecieveID').val(obj.RecieveID);
					var new_url = "<?php echo base_url('record_recipe/record_recipe_add/') ?>" + obj.RecieveID;
					window.history.pushState("data", "ตรอ. ทรัพย์เจริญเซอร์วิส (แยกโรงปูน) ระบบบริหารงานประกันภัยรถยนต์.", new_url);
					console.log('obj.RecieveID>' + obj.RecieveID);
					listPaymentArea(obj.RecieveID, obj.recieve_ins_id);
				} else {
					alert('ผิดพลาดไม่สามารถทำรายการได้');
				}
			})
		}
	}
	//-------------------------------- 
	function addRecieveChild(workID, insType) {
		//--check main--//
		var date_recieve = $('#date_recieve').val();
		var transfer_amt = $('#transfer_amt').val();
		var remark = $('#remark').val();
		var paytype = $('#paytype option:selected').val();
		var bank_transfer_id = $('#bank_transfer_id option:selected').val();
		var RecieveID = $('#RecieveID').val();
		var payment_by = $('#payment_by').val();
		var other_payment = $('#other_payment').val();
		if ($('#recieve_normal').is(":checked")) {
			var recieve_normal = 1;
		} else {
			var recieve_normal = 0;
		}
		if (date_recieve == '') {
			alert('กรุณาใส่วันที่รับเงิน');
			return false;
		} else if (transfer_amt == '') {
			alert('กรุณาใส่ยอดเงิน');
			return false;
		} else if (paytype == '0') {
			alert('กรุณาเลือกวิธีชำระเงิน');
			return false;
		} else if ((paytype == '2') && (bank_transfer_id == 'x')) {
			alert('กรุณาเลือกธนาคาร');
			return false;
		} else {
			var inputArray = [date_recieve, transfer_amt, remark, paytype, bank_transfer_id, RecieveID, workID, insType, payment_by, other_payment, recieve_normal];
			console.log('input data' + inputArray)
			$.post('<?php echo base_url('Record_recipe/addRecieveChild') ?>', {
				inputData: inputArray
			}, function(data) {
				console.log(data);
				var obj = JSON.parse(data);
				//-----config RecieveID value 
				if (obj.doDb == '1') {
					$('#RecieveID').val(obj.RecieveID);
					var new_url = "<?php echo base_url('record_recipe/record_recipe_add/') ?>" + obj.RecieveID;
					window.history.pushState("data", "ตรอ. ทรัพย์เจริญเซอร์วิส (แยกโรงปูน) ระบบบริหารงานประกันภัยรถยนต์.", new_url);
					listPaymentArea(obj.RecieveID, obj.recieve_ins_id);
				} else {
					alert('ผิดพลาดไม่สามารถทำรายการได้');
				}
			})
		}
	}
	//--------------------------------
	function deleteReciveList(register, dataID) {
		if (confirm('ต้องการลบ ' + register + ' ?')) {
			$.post('<?php echo base_url('Record_recipe/deleteReciveList') ?>', {
				dataID: dataID
			}, function(data) {
				var obj = JSON.parse(data);
				if (obj.doDb == '1') {
					var RecieveID = $('#RecieveID').val();
					listPaymentArea(RecieveID, 'all');
				} else {
					alert('ไม่สามารถลบได้');
				}
			})
		} else {
			return false;
		}
	}
	//--------------------------------
	function showCustSearch() {
		//searchName searchVregis
		var searchName = $('#searchName').val();
		var searchVregis = $('#searchVregis').val();
		console.log('searchName>' + searchName + ' searchVregis>' + searchVregis)
		if ((searchName == '') && (searchVregis == '')) {
			alert('กรุณาระบุคำค้นหา');
			return false;
		} else {
			$.post('<?php echo base_url('Record_recipe/showCustSearch') ?>', {
				searchName: searchName,
				searchVregis: searchVregis
			}, function(data) {
				$('#showCustSearch').empty();
				$('#showCustSearch').html(data);
			})
		}
	}
	//------------------------------------------
	function deleteAllRecieve() {
		var RecieveID = $('#RecieveID').val();
		if (confirm('ต้องการลบรายการทั้งหมด ? ')) {
			$.post('<?php echo base_url('Record_recipe/deleteAllRecieve') ?>', {
				RecieveID: RecieveID
			}, function(data) {
				var obj = JSON.parse(data);
				if (obj.doDb == '1') {
					alert('ลบข้อมูลเรียบร้อยแล้ว');
					window.location.href = '<?php echo base_url('record_recipe') ?>';
				} else {
					alert('ไม่สามารถลบข้อมูลได้')
				}
			})
		} else {
			return false;
		}
	}
	//------------------------------------------
	$(document).ready(function() {
		$(".datepicker").datepicker({
			language: 'th-th',
			format: 'dd/mm/yyyy',
			autoclose: true
		});
		var RecieveID = $('#RecieveID').val();
		if (RecieveID != '0') {
			listPaymentArea(RecieveID, 'all');
		}
	})
</script>