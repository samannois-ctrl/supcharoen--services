<div class="row">

    <div class="col-md-12 col-sm-12">

        <div class="card card-box">

            <div class="card-head">

                <header>ข้อมูลใบคำขอประกันภัยรถยนต์</header>

            </div>

            <div class="card-body " id="applicatioArea">
                <form id="appForm" name="appForm" class="form-horizontal">

                    <div class="form-group row">

                        <label class="col-sm-2 control-label">ชื่อ-สกุล ผู้เอาประกันภัย</label>

                        <div class="col-sm-4">

                            <input name="insuranec_name" type="text" class="form-control" id="insuranec_name" placeholder="">

                        </div>



                        <label class="col-sm-2 control-label">เลขที่บัตรประชาชน</label>

                        <div class="col-sm-4">

                            <input name="id_card" type="text" class="form-control" id="id_card" placeholder="">

                        </div>

                    </div>



                    <div class="form-group row">

                        <label class="col-sm-2 control-label">ที่อยู่</label>

                        <div class="col-sm-4">

                            <input name="app_address" type="text" class="form-control" id="app_address" placeholder="">

                        </div>



                        <label class="col-sm-2 control-label">โทรศัพท์</label>

                        <div class="col-sm-4">

                            <input name="app_telephone" type="text" class="form-control" id="app_telephone" placeholder="">

                        </div>

                    </div>





                    <div style="height: 40px; background-color: #E7E7E7; text-align: center; padding: 10px; margin: 0px 0px 20px 0px; color:#000; font-size: 16px; font-weight: 500">

                        รายละเอียดประกันภัย

                    </div>



                    <div class="form-group row">

                        <label class="col-sm-2 control-label">ประเภทใบคำขอ</label>

                        <div class="col-sm-2" style="margin-top: 8px;">

                            <div class="radio p-0">

                                <input type="radio" name="application_type" id="app_telephone" value="1">

                                <label for="optionsRadios1">แจ้งใหม่</label>

                            </div>

                        </div>

                        <div class="col-sm-2" style="margin-top: 8px;">

                            <div class="radio p-0">

                                <input type="radio" name="application_type" id="app_telephone" value="2">

                                <label for="optionsRadios1">ต่ออายุกรมธรรม์</label>

                            </div>

                        </div>


                        <label class="col-sm-2 control-label">วันที่รับแจ้ง</label>

                        <div class="col-sm-4">

                            <input name="notification_date" type="text" class="form-control datepicker" id="notification_date" placeholder="" readonly="readonly">

                        </div>



                    </div>





                    <div class="form-group row">


                        <label class="col-sm-2 control-label">รหัสตัวแทน</label>

                        <div class="col-sm-4">

                            <input name="agent_code" type="text" class="form-control" id="agent_code" placeholder="">

                        </div>


                        <label class="col-sm-2 control-label">บริษัทประกัน</label>

                        <div class="col-sm-4">

                            <input name="ins_corp_id" type="text" class="form-control" id="ins_corp_id" placeholder="">

                        </div>

                    </div>





                    <div class="form-group row">

                        <label class="col-sm-2 control-label">ประเภทประกัน</label>

                        <div class="col-sm-4">

                            <input name="ins_type_id" type="text" class="form-control" id="ins_type_id" placeholder="">

                        </div>



                        <label class="col-sm-2 control-label">ซ่อม อู่/ห้าง</label>

                        <div class="col-sm-4">

                            <input name="car_fix_type" type="text" class="form-control" id="car_fix_type" placeholder="">

                        </div>

                    </div>



                    <div class="form-group row">

                        <label class="col-sm-2 control-label">ประเภทการประกันภัยที่ต้องการ</label>

                        <div class="col-sm-2" style="margin-top: 8px;">

                            <div class="radio p-0">

                                <input type="checkbox" name="ins_define_name" id="ins_define_name" value="0">

                                <label for="optionsRadios1">ไม่ระบุชื่อผู้ขับขี่</label>

                            </div>

                        </div>

                        <div class="col-sm-2" style="margin-top: 8px;">

                            <div class="radio p-0">

                                <input type="checkbox" name="ins_define_name" id="ins_define_name" value="1">

                                <label for="optionsRadios1">ระบุชื่อผู้ขับขี่</label>

                            </div>

                        </div>


                    </div>



                    <div class="form-group row">

                        <label class="col-sm-2 control-label">ชื่อ-สกุล ผู้ขับขี่ (1)</label>

                        <div class="col-sm-4">

                            <input name="driver_name_1" type="text" class="form-control" id="driver_name_1" placeholder="">

                        </div>



                        <label class="col-sm-2 control-label">วัน/เดือน/ปีเกิด</label>

                        <div class="col-sm-4">

                            <input name="birthday_driver_1" type="text" class="form-control datepicker" id="birthday_driver_1" placeholder="" readonly="readonly">

                        </div>

                    </div>



                    <div class="form-group row">

                        <label class="col-sm-2 control-label">อาชีพ</label>

                        <div class="col-sm-4">

                            <input name="occupation_1" type="text" class="form-control" id="occupation_1" placeholder="">

                        </div>

                    </div>


                    <div class="form-group row">

                        <label class="col-sm-2 control-label">ชื่อ-สกุล ผู้ขับขี่ (2)</label>

                        <div class="col-sm-4">

                            <input name="driver_name_2" type="text" class="form-control" id="driver_name_2" placeholder="">

                        </div>



                        <label class="col-sm-2 control-label">วัน/เดือน/ปีเกิด</label>

                        <div class="col-sm-4">

                            <input name="birthday_driver_2" type="text" class="form-control datepicker" id="birthday_driver_2" placeholder="" readonly="readonly">

                        </div>

                    </div>



                    <div class="form-group row">

                        <label class="col-sm-2 control-label">อาชีพ</label>

                        <div class="col-sm-4">

                            <input name="occupation_2" type="text" class="form-control" id="occupation_2" placeholder="">

                        </div>

                    </div>








                    <div style="height: 40px; background-color: #E7E7E7; text-align: center; padding: 10px; margin: 0px 0px 20px 0px; color:#000; font-size: 16px; font-weight: 500">

                        ระยะเวลาประกันภัย

                    </div>


                    <div class="form-group row">

                        <label class="col-sm-2 control-label">เริ่มต้นวันที่</label>

                        <div class="col-sm-4">

                            <input name="start_protect_date" type="text" class="form-control datepicker" id="start_protect_date" placeholder="" readonly="readonly">

                        </div>



                        <label class="col-sm-2 control-label">สิ้นสุดวันที่</label>

                        <div class="col-sm-4">

                            <input name="end_protect_date" type="text" class="form-control datepicker" id="end_protect_date" placeholder="" readonly="readonly">

                        </div>

                    </div>

                    <div class="form-group row">

                        <label class="col-sm-2 control-label">เวลา</label>

                        <div class="col-sm-4">

                            <input name="do_action_time" type="time" class="form-control" id="do_action_time" placeholder="">

                        </div>



                        <label class="col-sm-2 control-label">ให้กรมธรรม์มีผลบังคับตั้งแต่วันที่</label>

                        <div class="col-sm-4">

                            <input name="do_action_date" type="text" class="form-control datepicker" id="do_action_date" placeholder="" readonly="readonly">

                        </div>

                    </div>



               




                <br><br>





                <div class="form-group row">

                    <div class="col-sm-12">

                        <div class="card card-topline-aqua">

                            <div class="card-head">

                                <header>รายการรถยนต์ที่เอาประกันภัย</header>

                            </div>

                            <div class="card-body ">

                                <div class="table-scrollable">

                                    <table class="table center">

                                        <thead>

                                            <tr style="background-color: #E7E7E7;">

                                                <th>รหัสรถ</th>

                                                <th>ชื่อรถยนต์/รุ่น</th>

                                                <th>เลขทะเบียน</th>

                                                <th>เลขตัวถัง</th>

                                                <th>ปี/รุ่น</th>

                                                <th>แบบตัวถัง</th>

                                                <th>จำนวนที่นั่ง/ขนาด/น้ำหนัก</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                            <tr class="active">

                                                <td>xxx</td>

                                                <td>MAZDA/2</td>

                                                <td>กข-123 สข.</td>

                                                <td>xxxxxxxxxxxxxxxxx</td>

                                                <td>xxxx</td>

                                                <td>xxxx</td>

                                                <td>xxxx</td>

                                            </tr>


                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </div>

                    </div>



                </div>



                <br><br>




                <div class="form-group row">

                    <label class="col-sm-6 control-label">รายการตกแต่งเปลี่ยนแปลงรถยนต์เพิ่มเติม (โปรดระบุรายละเอียด) &ensp;คุ้มครองอุปกรณ์ตกแต่งเพิ่มเติม</label>

                    <div class="col-sm-2">

                        <input name="protect_accsories" type="text" class="form-control" id="protect_accsories" placeholder="">

                    </div>

                    <label class="col-sm-1 control-label">บาท</label>

                </div>


                <div class="form-group row">

                    <div class="col-sm-12">

                        <textarea name="protect_accsories_remark" rows="5" class="form-control" id="protect_accsories_remark" placeholder="ระบุรายการตกแต่ง"></textarea>

                    </div>

                </div>





                <br><br>



                <div class="row">

                    <div class="col-md-4 col-sm-4">

                        <div class="card card-box">

                            <div class="card-head">

                                <header>ความรับผิดต่อบุคคลภายนอก</header>

                            </div>

                            <div class="card-body " id="bar-parent1">

                              

                                    <div class="form-group row">

                                        <div> 1) ความเสียหายต่อชีวิต ร่างกาย หรืออนามัย </div> <br>

                                        <div> &emsp; 1.1) ความเสียหายต่อชีวิต ร่างกาย หรืออนามัย </div> <br>

                                        <div class="col-4"></div>

                                        <div class="col-sm-5" style="margin-top: 10px;">

                                            <input name="third_party_liability_person" type="text" class="form-control autonumber txt-right" id="third_party_liability_person" placeholder="">

                                        </div>

                                        <label class="col-sm-3" style="margin-top: 10px; text-align: left;">
                                            บาท/คน
                                        </label>



                                        <div class="col-4"></div>

                                        <div class="col-sm-5" style="margin-top: 10px;">

                                            <input name="third_party_liability_time" type="text" class="form-control autonumber txt-right" id="third_party_liability_time" placeholder="">

                                        </div>

                                        <label class="col-sm-3" style="margin-top: 10px; text-align: left;">
                                            บาท/ครั้ง
                                        </label>


                                    </div>

                                    <div class="form-group row">

                                        <div> &emsp; 1.2) ความเสียหายต่อทรัพย์สิน </div> <br>


                                        <div class="col-4"></div>

                                        <div class="col-sm-5" style="margin-top: 10px;">

                                            <input name="property_damage" type="text" class="form-control txt-right autonumber" id="property_damage" placeholder="">

                                        </div>

                                        <label class="col-sm-3" style="margin-top: 10px; text-align: left;">
                                            บาท/ครั้ง
                                        </label>


                                    </div>


                                    <div class="form-group row">

                                        <div> &emsp;&emsp; 1.2.1) ความเสียหายส่วนแรก </div> <br>


                                        <div class="col-4"></div>

                                        <div class="col-sm-5" style="margin-top: 10px;">

                                            <input name="first_damage" type="text" class="form-control txt-right autonumber" id="first_damage" placeholder="">

                                        </div>

                                        <label class="col-sm-3" style="margin-top: 10px; text-align: left;">
                                            บาท/ครั้ง
                                        </label>


                                    </div>






                                    <div class="form-group row" style="padding-top: 200px;">

                                        <label class="col-sm-4 control-label" style="margin-top: 10px; text-align: left;">
                                            เบี้ยประกันภัยสุทธิ
                                        </label>

                                        <div class="col-sm-5 " style="margin-top: 10px;">

                                            <input name="app_ins_price" type="text" class="form-control autonumber txt-right" id="app_ins_price" placeholder="0.00">

                                        </div>

                                        <label class="col-sm-3" style="margin-top: 10px; text-align: left;">
                                            บาท
                                        </label>


                                    </div>

                                

                            </div>

                        </div>

                    </div>





                    <div class="col-md-4 col-sm-4">

                        <div class="card card-box">

                            <div class="card-head">

                                <header>รถยนต์เสียหาย สูญหาย ไฟไหม้</header>

                            </div>

                            <div class="card-body " id="bar-parent1">

                             

                                    <div class="form-group row">

                                        <div> 1) ความเสียหายต่อรถยนต์ </div> <br>

                                        <div class="col-4"></div>

                                        <div class="col-sm-5" style="margin-top: 10px;">

                                            <input name="car_fire_damage" type="text" class="form-control autonumber txt-right" id="car_fire_damage" placeholder="0.00">

                                        </div>

                                        <label class="col-sm-3" style="margin-top: 10px; text-align: left;">
                                            บาท/ครั้ง
                                        </label>

                                    </div>


                                    <div class="form-group row">

                                        <div> &emsp; 1.1) ความเสียหายส่วนแรกกรณีเป็นฝ่ายผิด </div> <br>


                                        <div class="col-4"></div>

                                        <div class="col-sm-5" style="margin-top: 10px;">

                                            <input name="first_portion_of_damage" type="text" class="form-control autonumber txt-right" id="first_portion_of_damage" placeholder="">

                                        </div>

                                        <label class="col-sm-3" style="margin-top: 10px; text-align: left;">
                                            บาท/ครั้ง
                                        </label>

                                    </div>


                                    <div class="form-group row">

                                        <div> 2) รถยนต์สูญหาย/ไฟไหม้ </div> <br>

                                        <div class="col-4"></div>

                                        <div class="col-sm-5" style="margin-top: 10px;">

                                            <input name="car_loss_fire" type="text" class="form-control autonumber txt-right" id="car_loss_fire" placeholder="0.00">

                                        </div>

                                        <label class="col-sm-3" style="margin-top: 10px; text-align: left;">
                                            บาท/ครั้ง
                                        </label>


                                    </div>


                                    <div class="form-group row">

                                        <div> &emsp; 2.1) เนื่องจากภัยน้ำท่วม </div> <br>


                                        <div class="col-4"></div>

                                        <div class="col-sm-5" style="margin-top: 10px;">

                                            <input name="car_flood" type="text" class="form-control autonumber txt-right" id="car_flood" placeholder="">

                                        </div>

                                        <label class="col-sm-3" style="margin-top: 10px; text-align: left;">
                                            บาท/ครั้ง
                                        </label>

                                    </div>


                                    <div class="form-group row">

                                        <div> ราคา พรบ. </div> <br>

                                        <div class="col-4"></div>

                                        <div class="col-sm-5" style="margin-top: 10px;">

                                            <input name="app_act_price" type="text" class="form-control autonumber txt-right" id="app_act_price" placeholder="0.00">

                                        </div>

                                        <label class="col-sm-3" style="margin-top: 10px; text-align: left;">
                                            บาท
                                        </label>


                                    </div>

                                    <div class="form-group row" style="padding-top: 100px;">


                                        <label class="col-sm-4 control-label" style="margin-top: 10px; text-align: left;">
                                            เบี้ยประกันภัยรวม
                                        </label>

                                        <div class="col-sm-5" style="margin-top: 10px;">

                                            <input name="total_premium" type="text" class="form-control autonumber txt-right" id="total_premium" placeholder="0.00">

                                        </div>

                                        <label class="col-sm-3" style="margin-top: 10px; text-align: left;">
                                            บาท
                                        </label>


                                    </div>

                             

                            </div>

                        </div>

                    </div>




                    <div class="col-md-4 col-sm-4">

                        <div class="card card-box">

                            <div class="card-head">

                                <header>ความคุ้มครองตามเอกสารแนบท้าย</header>

                            </div>

                            <div class="card-body " id="bar-parent1">

                              
                                    <div class="form-group row">

                                        <div> 1) อุบัติเหตุส่วนบุคคล </div> <br>


                                        <div> &emsp; 1.1) เสียชีวิต สูญเสียอวัยวะ ทุพพลภาพถาวร </div> <br>


                                        <label class="col-sm-3" style="margin-top: 10px; text-align: left;">
                                            &emsp;&emsp; ก) ผู้ขับขี่
                                        </label>

                                        <div class="col-sm-2" style="margin-top: 10px;">
                                            <input name="dismemberment_driver_person" type="text" class="form-control" id="dismemberment_driver_person" placeholder="">
                                        </div>

                                        <label class="col-1" style="margin-top: 10px; text-align: left;">
                                            คน
                                        </label>

                                        <div class="col-sm-3" style="margin-top: 10px;">

                                            <input name="dismemberment_person_price" type="text" class="form-control txt-right" id="dismemberment_person_price" placeholder="">

                                        </div>

                                        <label class="col-sm-3" style="margin-top: 10px; text-align: left;">
                                            บาท/คน
                                        </label>




                                        <label class="col-sm-3" style="margin-top: 10px; text-align: left;">
                                            &emsp;&emsp;ข) ผู้โดยสาร
                                        </label>

                                        <div class="col-sm-2" style="margin-top: 10px;">
                                            <input name="dismemberment_passenger_person" type="text" class="form-control" id="dismemberment_passenger_person" placeholder="">
                                        </div>

                                        <label class="col-1" style="margin-top: 10px; text-align: left;">
                                            คน
                                        </label>

                                        <div class="col-sm-3" style="margin-top: 10px;">

                                            <input name="dismemberment_passenger_price" type="text" class="form-control txt-right" id="dismemberment_passenger_price" placeholder="">

                                        </div>

                                        <label class="col-sm-3" style="margin-top: 10px; text-align: left;">
                                            บาท/คน
                                        </label>


                                    </div>

                                    <div class="form-group row">

                                        <div> &emsp; 1.2) ทุพพลภาพชั่วคราว </div> <br>


                                        <label class="col-sm-3" style="margin-top: 10px; text-align: left;">
                                            &emsp;&emsp;ก) ผู้ขับขี่
                                        </label>

                                        <div class="col-sm-2" style="margin-top: 10px;">
                                            <input name="temporary_dirver_disability_person" type="text" class="form-control" id="temporary_dirver_disability_person" placeholder="">
                                        </div>

                                        <label class="col-1" style="margin-top: 10px; text-align: left;">
                                            คน
                                        </label>

                                        <div class="col-sm-3" style="margin-top: 10px;">

                                            <input name="temporary_dirver_disability_price" type="text" class="form-control txt-right" id="temporary_dirver_disability_price" placeholder="">

                                        </div>

                                        <label class="col-sm-3" style="margin-top: 10px; text-align: left;">
                                            บาท/สัปดาห์
                                        </label>




                                        <label class="col-sm-3" style="margin-top: 10px; text-align: left;">
                                            &emsp;&emsp; ข) ผู้โดยสาร
                                        </label>

                                        <div class="col-sm-2" style="margin-top: 10px;">
                                            <input name="temporary_passenger_disability_person" type="text" class="form-control" id="temporary_passenger_disability_person" placeholder="">
                                        </div>

                                        <label class="col-1" style="margin-top: 10px; text-align: left;">
                                            คน
                                        </label>

                                        <div class="col-sm-3" style="margin-top: 10px;">

                                            <input name="temporary_passenger_disability_price" type="text" class="form-control txt-right" id="temporary_passenger_disability_price" placeholder="">

                                        </div>

                                        <label class="col-sm-3" style="margin-top: 10px; text-align: left;">
                                            บาท/สัปดาห์
                                        </label>


                                    </div>


                                    <div class="form-group row">


                                        <label class="col-sm-3" style="margin-top: 10px; text-align: left;">
                                            2) ค่ารักษาพยาบาล
                                        </label>

                                        <div></div>

                                        <div class="col-sm-3"></div>

                                        <div class="col-sm-2" style="margin-top: 10px;">
                                            <input name="medical expenses_person" type="text" class="form-control" id="medical expenses_person" placeholder="">
                                        </div>

                                        <label class="col-1" style="margin-top: 10px; text-align: left;">
                                            คน
                                        </label>

                                        <div class="col-sm-3" style="margin-top: 10px;">

                                            <input name="expenses_person_price" type="text" class="form-control txt-right" id="expenses_person_price" placeholder="">

                                        </div>

                                        <label class="col-sm-3" style="margin-top: 10px; text-align: left;">
                                            บาท/คน
                                        </label>





                                    </div>






                                    <div class="form-group row" style="padding-top: 135px;">

                                        <label class="col-sm-4 control-label" style="margin-top: 10px; text-align: left;">
                                            เบี้ย พ.ร.บ.
                                        </label>

                                        <div class="col-sm-5 " style="margin-top: 10px;">

                                            <input type="text" class="form-control txt-right" id="" placeholder="0.00">

                                        </div>

                                        <label class="col-sm-3" style="margin-top: 10px; text-align: left;">
                                            บาท
                                        </label>


                                    </div>

                               
            </div>

                        </div>

                    </div>


                </div>


                <div class="form-group" style="padding-top: 50px;">

                    <div class="col-md-12" style="text-align: center">
						<button type="button" class="btn btn-success" onClick="reloadAppData()">เรียกข้อมูลใหม่</button>
						<input type="hidden" name="appWorkID" id="appWorkID" value="<?php echo $workID?>">
						<input type="hidden" name="appID" id="appID" value="">
                        <button type="button" class="btn btn-info" onClick="SaveCarApplication()">บันทึกข้อมูล</button>
						
						  <a href="<?php echo base_url('Insurance_car/work_car_application_print'); ?>" target="_blank">

                            <button type="button" class="btn btn-warning">
                                <i class="fa fa-print"></i> พิมพ์ใบคำขอประกัน
                            </button>

                        </a>

                    </div>

                </div>
			


 </form>

            </div>

        </div>

    </div>

</div>
	