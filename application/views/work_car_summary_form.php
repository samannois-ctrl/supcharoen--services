<div class="row">

    <div class="col-md-12 col-sm-12">

        <div class="card card-box">

            <div class="card-head">

                <header>สรุปยอดรายการทั้งหมด</header>

            </div>

            <div class="card-body">
                <div class="table-scrollable" id="summary_data"></div>

                <br>

                <div class="form-group row">

                    <div class="col-md-12 txt-center">

                        

                    </div>



                </div>



              <div class="form-group" style="padding-top: 50px;">

                    <div class="col-md-12 txt-center">

                        <button type="button" class="btn btn-info" onClick="callSummaryData()">
                            เรียกข้อมูลใหม่
                        </button>
						
					  <a href="<?php echo base_url('Insurance_car/work_car_summary_print'); ?>" target="_blank"></a>

                            <!--<button type="button" class="btn btn-warning" onClick="printData1()">-->
                          <button type="button" class="btn btn-warning" onClick="printSummary()">
                                <i class="fa fa-print"></i> พิมพ์ใบแจ้งงาน
                            </button>

                        

                    </div>

              </div>

            </div>

        </div>

    </div>







</div>