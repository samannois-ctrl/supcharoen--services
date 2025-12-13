<div class="page-content">



                <div class="page-bar">



                    <div class="page-title-breadcrumb">



                        <div class=" pull-left">



                            <div class="page-title">ตั้งค่ายี่ห้อรถ</div>



                        </div>

                        



                    </div>



                </div>







                <!-- start Payment Details -->



                <div class="row">



                    <div class="col-md-12 col-sm-12">



                        <div class="white-box border-gray">

			<form method="post">

                            <div class="card-head" style="padding-bottom: 20px">



                                <!-- <header>Booking Details</header> -->





                                <label style="margin-right: 10px;">ชื่อยี่ห้อรถ</label>





                                <div class="col-3">

                                    <input name="car_brand_name" type="text" class="form-control" id="car_brand_name" placeholder="">

                                </div>



                                <div class="col-1">

                                </div>



                                <label style="margin-right: 10px;">การใช้งาน</label>

                              <div class="col-1" style="margin-right: 30px;">

                                    <select name="car_brand_status" class="form-select" id="car_brand_status" aria-label="Default select example">

                                     

                                        <option value="1">ใช้งาน</option>

                                        <option value="0">ไม่ใช้งาน</option>

                                    </select>

                                </div>


								<input type="hidden" name="dataID" id="dataID" value="x">	
                                <button type="button" class="btn btn-round btn-success" style="margin-bottom: 5px; margin-right: 5px;" onClick="AddCarBrand()">บันทึกข้อมูล</button>

                                <button type="reset" class="btn btn-round btn-danger" style="margin-bottom: 5px;"  onClick="setDataID()">ยกเลิก</button>

                            </div>

			</form>

                            <div class="card-body ">



                                <div class="table-wrap">



                                    <div id="showBrand" class="table-responsive tblHeightSet"></div>



                                </div>



                            </div>



                        </div>



                    </div>



                </div>



                <!-- end Payment Details -->







            </div>