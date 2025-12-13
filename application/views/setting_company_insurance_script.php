<script>
	
		function updateCorpBranch(dataID,cprpName,iam){
			var changeValue = iam.value;
			if(confirm('ต้องการเปลียนสาขา '+cprpName+' ?')){
				 $.post('<?php echo base_url('setting/updateCorpBranch')?>',{ dataID:dataID , changeValue:changeValue },function(data){ 
					 var obj = JSON.parse(data);
					 console.log(data);
                            if(obj.DoUpdate=='1'){ 
							
							}else{
								alert('ไม่สามารถเปลียนข้อมูลได้')
							}
				 })
			}else{
				return false;
			}
		}
	
        function UpdatePopUp(){
            var form = new FormData($('#pop_upForm')[0]);
                var result='';
                $.ajax({
                    url: '<?php echo base_url('setting/updateAddrCorp')?>',
                    type: 'POST' ,  
                    data: form ,
                    success: function (data) {
                          //console.log('data->'+data);
                           var obj = JSON.parse(data);
                            if(obj.DoUpdate=='1'){
                            $('#showNotice').html('<H3 align="center"  class="text-success"><i class="tick"></i> แก้ไขข้อมูลสำเร็จแล้ว</H3>');
                            setTimeout(function(){ $('#showNotice').empty(); }, 5000);

                            var img =   '<img src="'+obj.upload_path+'/'+obj.img_logo+'" class="img-responsive" style="width:300px;height:auto " >';

                            $('#HiddenlogoFile').val(obj.img_logo);   
                            if(obj.img_logo!=''){
                                $('#showLogo').html(img);
                            }else{ 
                                $('#showLogo').html('No Logo');
                            }
                            $('#logoFile').val('')
                        }else{
                            $('#showNotice').html('<p align="center class="bg-danger">ไม่สามารถแก้ไขข้อมูล</p>');
                        }
                    },
                    //add error handler for when a error occurs if you want!   uploadfile[]
                    //error: errorfunction,

                    // this is the important stuf you need to overide the usual post behavior
                    cache: false,
                    contentType: false,
                    processData: false

                });
        }

        function previewImg(){

        }

        function openEditForm(corpID,corpName){
            $.post('<?php echo base_url('setting/getCompayData')?>',{ dataID:corpID },function(data){ 
                var obj = JSON.parse(data);     
                //console.log(data) ; 
                $('#update_company_name').val('');
                $('#update_company_full_name').val('');
                $('#company_addr').val('');
                $('#company_telephone').val('');  
                $('#company_tax_no').val('');  
                $('#UpdateDataID').val(0);     
                $('#HiddenlogoFile').val('');    

                $('#update_company_name').val(obj.company_name);
                $('#update_company_full_name').val(obj.company_full_name);
                $('#company_addr').val(obj.company_addr);
                $('#company_telephone').val(obj.company_telephone);  
                $('#company_tax_no').val(obj.company_tax_no);  
                $('#bank_name').val(obj.bank_name);  
                $('#bank_acc_branch').val(obj.bank_acc_branch);  
                $('#bank_acc_no').val(obj.bank_acc_no);  
                $('#bank_acc_name').val(obj.bank_acc_name);  
                $('#UpdateDataID').val(obj.id);                                            
                $('#HiddenlogoFile').val(obj.company_logo);    
                $('#showNotice').empty();

                var img =   '<img src="<?php echo base_url('uploadfile/logo/')?>'+obj.company_logo+'" class="img-responsive" style="width:300px;height:auto " >';
                if(obj.company_logo!=''){
                                $('#showLogo').html(img)
                            }else{ 
                                $('#showLogo').html('No Logo');
                            }

                $('#exampleModalCenter').modal('show');  
            })
        }



        function UpdateOrder(dataID,chageValue){
            $.post('<?php echo base_url('setting/UpdateCompanyOrder')?>',{ dataID:dataID,chageValue:chageValue },function(data){
                    //console.log(data);
                    var obj = JSON.parse(data);
                    if(obj.DoUpdate=='1'){
                        listCompany()
                   }
            })
        }

        function  ChangeStatus(dataID,chageValue){
            $.post('<?php echo base_url('setting/ChangeCompanyStatus')?>',{ dataID:dataID,chageValue:chageValue },function(data){
                   // console.log(data);
                   var obj = JSON.parse(data);
                   if(obj.DoUpdate=='1'){
                    alert('แก้ไขสถานะเรียบร้อยแล้ว');
                    if(chageValue=='1'){
                        $('#com_name'+dataID).removeClass('text-danger');
                    }else if(chageValue=='0'){
                        $('#com_name'+dataID).addClass('text-danger');
                    }
                   }

                   // 
                   
            })
        }

        function listCompany(){
                 $.post('<?php echo base_url('setting/listCompany')?>',{ },function(data){
                 $('#showCompanylist').empty();
                 $('#showCompanylist').html(data);
            })
        }


        function AddCompany(){
          var company_name=  $('#company_name').val();
          var company_status=  $('#company_status option:selected').val();
          var use_branch=  $('#use_branch option:selected').val();
          
          if(company_name==''){
            alert('กรุณาใส่ชื่อบริษัท');
            return false;
          }else{
            $.post('<?php echo base_url('setting/addCompany')?>',{ company_name:company_name , company_status:company_status,use_branch},function(data){
                    var obj = JSON.parse(data);
                    if(obj.DoInsert=='1'){
                        resetForm();
                        listCompany();
                    }else{
                        alert('ไม่สามารถเพิ่มข้อมูลได้');
                    }
                   
            })
          }
        }


        function resetForm(){
            // company_name company_status
            $('#company_name').val('');
            $("#company_status").val(1);
        }


        $(document).ready(function(){

            <?php if($page=='addCompany'){ ?>
            listCompany();
            <?php } ?>

        })
</script>