<?php   $postData = $this->insurance_model->getPostData($PostworkID);
//print_r($postData);
       if(isset($postData->id)){ 
	   		$postID=$postData->id;
	   		$post_name=$postData->post_name;
	   		$telephone=$postData->telephone;
	   		$corp_name=$postData->corp_name;
	   		$house_number=$postData->house_number;
	   		$home_group=$postData->home_group;
	   		$alley=$postData->alley;
	   		$road=$postData->road;
	   		$subdistric=$postData->subdistric;
	   		$distric=$postData->distric;
	   		$province=$postData->province;
	   		$post_code=$postData->post_code;
	   		$delivery_of_documents=$postData->delivery_of_documents;
	   		$use_address=$postData->use_address;
	   		$date_of_submission= $this->insurance_model->translateDateToThai($postData->date_of_submission);
	   		$remark=$postData->remark;
	   }else{
		    $postID = "";
		    $post_name="";
	   		$telephone="";
	   		$corp_name="";
	   		$house_number="";
	   		$home_group="";
	   		$alley="";
	   		$road="";
	   		$subdistric="";
	   		$distric="";
	   		$province="";
	   		$post_code="";
	   		$delivery_of_documents="";
	   		$use_address="";
	   		$date_of_submission= "";
	   		$remark="";
	   }
?>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card card-box">
            <div class="card-head">
                <header>ข้อมูลที่อยู่จัดส่งเอกสาร</header>
            </div>
            <div class="card-body " id="bar-parent1">
                <form method="post" id="postFormAddr" name="postFormAddr" class="form-horizontal">
                    <div class="form-group row">
                        <label class="col-sm-2 control-label">ที่อยู่ไปรษณีย์</label>
                        <div class="col-sm-3">
                            <input name="post_name" type="text" class="form-control" id="post_name" placeholder="ชื่อ-นามสกุล" value="<?php echo $post_name?>">
                        </div>
                        <div class="col-sm-3">
                            <input name="telephone" type="text" class="form-control" id="telephone" placeholder="โทรศัพท์" value="<?php echo $telephone?>">
                        </div>
                        <div class="col-sm-3">
                            <input name="corp_name" type="text" class="form-control" id="corp_name" placeholder="บริษัท/หน่วยงาน/ร้าน" value="<?php echo $corp_name?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-3">
                            <input name="house_number" type="text" class="form-control" id="house_number" placeholder="บ้านเลขที่" value="<?php echo $house_number?>">
                        </div>
                        <div class="col-sm-3">
                            <input name="home_group" type="text" class="form-control" id="home_group" placeholder="หมู่ที่" value="<?php echo $home_group?>">
                        </div>
                        <div class="col-sm-3">
                            <input name="alley" type="text" class="form-control" id="alley" placeholder="ตรอก/ซอย" value="<?php echo $alley?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-3">
                            <input name="road" type="text" class="form-control" id="road" placeholder="ถนน" value="<?php echo $road?>">
                        </div>
                        <div class="col-sm-3">
                            <input name="subdistric" type="text" class="form-control" id="subdistric" placeholder="ตำบล/แขวง" value="<?php echo $subdistric?>">
                        </div>
                        <div class="col-sm-3">
                            <input name="distric" type="text" class="form-control" id="distric" placeholder="อำเภอ/เขต" value="<?php echo $subdistric?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-3">
                            <input name="province" type="text" class="form-control" id="province" placeholder="จังหวัด" value="<?php echo $province?>">
                        </div>
                        <div class="col-sm-3">
                            <input name="post_code" type="text" class="form-control" id="post_code" placeholder="รหัสไปรษณีย์" value="<?php echo $post_code?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 control-label">การจัดส่งเอกสาร</label>
                        <div class="col-sm-2" style="margin-top: 10px;">
                            <div class="radio p-0">
                                <input type="radio" name="delivery_of_documents" id="delivery_of_documents" value="1" <?php if($delivery_of_documents=='1'){ echo "checked";}?> >
                                <label for="optionsRadios1">
                                    โทรแจ้งลูกค้ารับหน้าร้าน
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-2" style="margin-top: 10px;">
                            <div class="radio p-0">
                                <input type="radio" name="delivery_of_documents" id="delivery_of_documents" value="2"  <?php if($delivery_of_documents=='2'){ echo "checked";}?>>
                                <label for="optionsRadios1">
                                    จัดส่งไปรษณีย์แบบลงทะเบียน
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-2" style="margin-top: 10px;">
                            <div class="radio p-0">
                                <input type="radio" name="delivery_of_documents" id="delivery_of_documents" value="3"  <?php if($delivery_of_documents=='3'){ echo "checked";}?>>
                                <label for="optionsRadios1">
                                    จัดส่งไปรษณีย์แบบ EMS
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 control-label">ใช้ที่อยู่</label>
                        <div class="col-sm-2" style="margin-top: 10px;">
                            <div class="radio p-0">
                                <input type="radio" name="use_address" id="use_address" value="1"  <?php if($use_address=='1'){ echo "checked";}?> >
                                <label for="optionsRadios1">
                                    ตามกรมธรรม์
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-2" style="margin-top: 10px;">
                            <div class="radio p-0">
                                <input type="radio" name="use_address" id="use_address" value="2"  <?php if($use_address=='2'){ echo "checked";}?>>
                                <label for="optionsRadios1">
                                    ตามรายการจดทะเบียน
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-2" style="margin-top: 10px;">
                            <div class="radio p-0">
                                <input type="radio" name="use_address" id="use_address" value="3"  <?php if($use_address=='3'){ echo "checked";}?>>
                                <label for="optionsRadios1">
                                    ตามบัตรประชาชน
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-2" style="margin-top: 10px;">
                            <div class="radio p-0">
                                <input name="use_address" type="radio" id="use_address"   value="4"  <?php if($use_address=='4'){ echo "checked";}?>>
                                <label for="optionsRadios1">
                                    โทรถามที่อยู่ลูกค้า
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 control-label">วันที่ส่งเอกสาร</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control datepicker" id="date_of_submission" name="date_of_submission" placeholder="" readonly value="<?php echo $date_of_submission?>">
                        </div>
                    </div>
                  <div class="form-group row">
                        <label class="col-sm-2 control-label">หมายเหตุ</label>
                        <div class="col-sm-9">
                            <textarea name="remark" rows="3" class="form-control" id="remark" style="height: 58px;" placeholder=""><?php echo $remark?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 control-label">พิมพ์ที่อยู่เอกสาร</label>
                        <div class="col-sm-1" style="margin-top: 10px;">
                         <!--   <div class="radio p-0">
                                <input type="radio" name="a4size" id="a4size" value="1" checked>
                                <label for="optionsRadios1">
                                    เต็ม A4
                                </label>
                            </div>
-->
                        </div>
                        <div class="col-sm-1" style="margin-top: 10px;">
                          <!--  <div class="radio p-0">
                                <input type="radio" name="a4size" id="a4size" value="2">
                                <label for="optionsRadios1">
                                    ครึ่ง A4
                                </label>
                            </div>-->
                        </div>
                        <div class="col-sm-1">
                           <!-- <a href="<?php //echo base_url('Insurance_car/work_car_address_print'); ?>" target="_blank">-->
                           <!-- </a>-->
                        </div>
                    </div>
                    <div class="form-group" style="padding-top: 50px;">
                        <div class="col-md-12 txt-center">
							<input type="hidden" name="postID" id="postID" value="<?php echo $postID?>">
							<input type="hidden" name="postWorkID" id="postWorkID" value="<?php echo $PostworkID?>">
							<input type="hidden" name="postCustID" id="postCustID" >
                            <button type="button" class="btn btn-info btn-sm m-b-10" onClick="SavePostAddr('save')">บันทึกข้อมูลที่ส่งเอกสาร</button> &nbsp; &nbsp;  
							 <button type="button" class="btn btn-round btn-warning btn-sm m-b-10" onClick="SavePostAddr('print');printAddr();">
                                    <i class="fa fa-print"></i> พิมพ์ที่อยู่เอกสาร
                             </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
   <div id="printAddr" style="display: none"></div>
</div>