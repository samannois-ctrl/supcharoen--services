<!DOCTYPE html>
<html lang="en">
<?php require_once APPPATH . 'views/liff/head.php'; ?>

<body class="bg-sky-100">
    <?php require_once APPPATH . 'views/components/loading.php'; ?>
    <section class="max-w-screen-xl px-4 xl:px-0 mx-auto my-8">
        <div class="flex items-center justify-center py-5 space-x-3">
            <img src="https://img.icons8.com/external-tal-revivo-solid-tal-revivo/100/external-motor-car-insurance-by-private-company-isolated-on-white-background-protection-solid-tal-revivo.png"
                class="h-10" alt="Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap">ตรอ. ทรัพย์เจริญเซอร์วิส</span>
        </div>
        <div onclick="Goto('info')"
            class="text-sky-50 flex items-center space-x-4 bg-linear-to-l from-sky-500 via-blue-700 to-blue-900 rounded-lg p-4">
            <img class="w-18 rounded-full bg-white p-[2px]" id="img_profile" />
            <p class="font-bold text-xl" id="display_name"></p>
        </div>

        <!-- ข้อมูลประกัน -->
        <div id="box-data-insurance" class="hidden"></div>

        <h1 class="my-3 text-sky-900 text-lg font-semibold">ผลิตภัณฑ์</h1>
        <div class="grid grid-cols-1 gap-3">
            <div onclick="window.location.href = '<?= base_url('product/insurance') ?>'"
                class="bg-orange-500 text-white rounded-xl font-semibold">
                <div class="flex justify-end">
                    <img src="https://img.icons8.com/wired/100/004681/car.png"
                        class="bg-white py-3 px-5 w-1/4 rounded-tr-xl rounded-bl-xl" alt="">
                </div>
                <p class="p-3 text-2xl">ประกันภัย</p>
            </div>
            <!-- <div class="bg-orange-500 text-white rounded-xl font-semibold">
                <div class="flex justify-end">
                    <img src="https://img.icons8.com/parakeet-line/100/004681/document.png"
                        class="bg-white py-3 px-5 w-1/2 rounded-tr-xl rounded-bl-xl" alt="">
                </div>
                <p class="p-3 text-xl">พรบ.</p>
            </div> -->
        </div>
        <div class="grid grid-cols-2 gap-3 mt-3">
            <!-- <div class="bg-orange-500 text-white rounded-xl font-semibold">
                <div class="flex justify-end">
                    <img src="https://img.icons8.com/sf-regular/100/004681/car-crash.png"
                        class="bg-white py-3 px-5 w-2/3 rounded-tr-xl rounded-bl-xl" alt="">
                </div>
                <p class="p-3 text-lg">อุบัติเหตุ</p>
            </div>
            <div class="bg-orange-500 text-white rounded-xl font-semibold">
                <div class="flex justify-end">
                    <img src="https://img.icons8.com/external-tal-revivo-regular-tal-revivo/100/004681/external-car-insurance-covered-under-insurance-policy-isolated-on-a-white-background-protection-regular-tal-revivo.png"
                        class="bg-white py-3 px-5 w-2/3 rounded-tr-xl rounded-bl-xl" alt="">
                </div>
                <p class="p-3 text-lg">อัคคีภัย</p>
            </div> -->
            <div onclick="window.location.href = '<?= base_url('product/act') ?>'"
                class="bg-orange-500 text-white rounded-xl font-semibold">
                <div class="flex justify-end">
                    <img src="https://img.icons8.com/parakeet-line/100/004681/document.png"
                        class="bg-white py-3 px-5 w-1/2 rounded-tr-xl rounded-bl-xl" alt="">
                </div>
                <p class="p-3 text-xl">พรบ.</p>
            </div>
            <div onclick="window.location.href = '<?= base_url('product/transportation') ?>'"
                class="bg-orange-500 text-white rounded-xl font-semibold">
                <div class="flex justify-end">
                    <img src="https://img.icons8.com/pulsar-line/100/004681/fast-delivery.png"
                        class="bg-white py-3 px-5 w-1/2 rounded-tr-xl rounded-bl-xl" alt="">
                </div>
                <p class="p-3 text-lg">ประกันขนส่ง</p>
            </div>
        </div>
        <button onclick="window.location.href = '<?= base_url('interested') ?>'" type="button"
            class="bg-[#ffffffc8] border-orange-500 rounded-xl text-xl font-semibold border-2 text-orange-500 my-5 w-full py-3 "><i
                class="fa-solid fa-circle-question"></i> สนใจประกัน</button>
        <h1 class="my-3 text-sky-900 text-lg font-semibold">รายงาน</h1>
        <div onclick="Goto('payment')" class="my-5 bg-[#ffffffc8] rounded-xl p-5 flex justify-between items-center">
            <p class="font-semibold text-sky-800 text-xl">รายงานชำระเงิน</p>
            <p class="font-semibold text-sky-800 text-xl"><i class="fa-solid fa-circle-right"></i></p>
        </div>
        <button onclick="Goto('renew')" type="button"
            class="text-white bg-blue-500 rounded-xl text-xl font-semibold my-5 w-full py-3 "><i
                class="fa-solid fa-triangle-exclamation"></i> แจ้งต่ออายุ</button>
    </section>


    <!-- Modal -->


    <script src="<?= base_url('assets/js/func.js?v=') . rand() ?>"></script>
    <script>
        const liffId = '2006839693-G89PWOjK';
        let userId = '';
        let displayName = '';
        $(document).ready(function () {
            $('#loading').removeClass('hidden')
            main()
        });

        function show_detail(id) {
            $('#detail-insurance-' + id).removeClass('hidden');
            $('#box-btn-open-' + id).addClass('hidden');
            $('#box-btn-hide-' + id).removeClass('hidden');
        }

        function hide_detail(id) {
            $('#detail-insurance-' + id).addClass('hidden');
            $('#box-btn-open-' + id).removeClass('hidden');
            $('#box-btn-hide-' + id).addClass('hidden');
        }

        function main() {
            liff.init({ liffId: liffId });
            liff.ready.then(() => {
                if (!liff.isLoggedIn()) {
                    liff.login();
                }
                liff.getProfile().then(profile => {
                    $('#display_name').html(profile.displayName);
                    $('#img_profile').prop('src', profile.pictureUrl)
                    $('#loading').addClass('hidden')
                    userId = profile.userId
                    displayName = profile.displayName
                    // getMemberInfo(userId)
                    // getInsuranceMember(userId)
                    checkMember(userId);
                })
            })
        }

        function checkMember($userId){
            $('#loading').removeClass('hidden');
            $.post("check-member", {'uid' : $userId},
                function (res) {
                    console.log(res);
                    if (res.success) {
                        getInsuranceMember(userId)
                    }

                    if (res.error) {
                        window.location.href = '<?= base_url('register') ?>';
                    }
                },
                "json"
            );
        }

        function getMemberInfo(userId) {
            $('#loading').removeClass('hidden');
            $.post("get-member-info-by-uid", { 'uid': userId }, function (res) {
                console.log(res);
                $('#loading').addClass('hidden');
                if (res.success) {
                    var el_data = [];
                    $.each(res.data, function (index, value) {
                        el_data += `
                        <div class="grid grid-cols-2 text-xl font-semibold py-3">
                <p>${value.car_model}</p>
                <div class="text-right">
                    <p>${value.vehicle_regis}</p>
                    <p>${value.province_name}</p>
                </div>
            </div>
                        `;
                    });
                    $('#info-car-member').html(el_data);
                    // $('#car-model').html(res.data[0].car_model)
                    // $('#vehicle_regis').html(res.data[0].vehicle_regis)
                    // $('#province_name').html(res.data[0].province_name)
                } else {
                    $('#info-car-member').html(`<p class="text-center text-xl font-semibold text-red-500">${res.msg}</p>`);
                }
            },
                "json"
            );
        }

        function getInsuranceMember(params) {
            $('#loading').removeClass('hidden');
            $.post("get-insurance-info-by-uid", { 'uid': userId }, function (res) {
                console.log(res);
                $('#loading').addClass('hidden');
                var el_data = [];
                el_data += `<h1 class="my-3 text-sky-900 text-lg font-semibold">ข้อมูลประกัน</h1>`;
                if (res.insurance.length > 0) {
                    $.each(res.insurance, function (index, value) { 
                        let elInsurance = '',
                        elDateProtect = '',
                        elAct = '',
                        elCall = '';
                        if(value.insurance_type_name != null){
                            elDateProtect = `
                            <p><strong>วันที่คุ้มครอง : </strong><span class="text-blue-900">${value.insurance_start_th}</span></p>
                            <p><strong>วันสิ้นสุด กธ. : </strong><span class="text-blue-900">${value.insurance_end_th}</span></p>
                            `;
                            elInsurance = `
                            <p><strong>เลขที่กรมธรรม์ : </strong><span class="text-blue-900">${value.insurance_no}</span></p>
                            <p><strong>บริษัทประกัน : </strong><span class="text-blue-900">${value.company_name}</span></p>
                            <p><strong>ประเภทประกัน : </strong><span class="text-blue-900">${value.insurance_type_name}</span></p>
                            <p><strong>ซ่อม อู่/ห้าง : </strong><span class="text-blue-900">${value.insurance_fix_garace}</span></p>
                            <!-- <p><strong>ทุนประกัน : </strong><span class="text-blue-900">${value.sum_insured}</span></p> -->
                            <!-- <p><strong>เบี้ยรวม : </strong><span class="text-blue-900">${value.insurance_price}</span></p> -->
                            `;
                            elCall = `
                            <button type="button" onclick="window.location.href='tel:${value.company_telephone}'"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2">
                                <i class="fa-solid fa-2xl fa-phone"></i>
                                <span class="sr-only">แจ้งเหตุ</span>
                            </button>
                            <p class="font-bold text-blue-800 py-1">แจ้งเหตุ </p>
                            `;
                        }
                        if(value.act_company_name != null){
                            elAct = `<p><strong>เลขที่ พ.ร.บ. : </strong><span class="text-blue-900">${value.act_no}</span></p>
                            <p><strong>บริษัท พ.ร.บ. : </strong><span class="text-blue-900">${value.act_company_name}</span></p>
                            <!-- <p><strong>เบี้ยรวม พ.ร.บ. : </strong><span class="text-blue-900">${value.act_price}</span></p> -->
                            <p><strong>วันที่คุ้มครอง : </strong><span class="text-blue-900">${value.act_date_start_th}</span></p>
                            <p><strong>วันสิ้นสุด กธ. : </strong><span class="text-blue-900">${value.act_date_end_th}</span></p>`;
                        }
                        el_data += `<div class="bg-linear-to-l from-gray-50 to-gray-100 rounded-lg shadow-md p-3 mb-2">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p><strong>ชื่อ-นามสกุล : </strong><span class="text-blue-900">${value.cust_name}</span></p>
                                    <p><strong>ทะเบียนรถ : </strong><span class="text-blue-900">${value.vehicle_regis} ${value.province_name}</span></p>
                                    <p><strong>ยี่ห้อรถ : </strong><span class="text-blue-900">${value.brand_car}</span></p>
                                    ${elDateProtect}
                                </div>
                                <div>
                                    ${elCall}
                                </div>
                            </div>

                            <div class="text-center py-1" id="box-btn-open-${index}">
                                <button onclick="show_detail(${index})" class="text-gray-600 text-sm underline">เพิ่มเติม</button>
                            </div>
                            <div id="detail-insurance-${index}" class="hidden mt-1">
                                ${elInsurance}
                                <hr class="my-3 text-gray-700">
                                ${elAct}
                                <!-- <p><strong>วันจดทะเบียน : </strong><span class="text-blue-900">${value.date_regis}</span></p> -->
                            </div>
                            <div class="text-center py-1 hidden" id="box-btn-hide-${index}">
                                <button onclick="hide_detail(${index})" class="text-gray-600 text-sm underline">ซ่อน</button>
                            </div>
                        </div>`;
                    });    
                }
                if(res.accident_insurance.length > 0){
                    $.each(res.accident_insurance, function (index, value) { 
                        el_data += `<div class="bg-linear-to-l from-gray-50 to-gray-100 rounded-lg shadow-md p-3 mb-2">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p><strong>ชื่อ-นามสกุล : </strong><span class="text-blue-900">${value.cust_name}</span></p>
                                    <p><strong>วันที่คุ้มครอง : </strong><span class="text-blue-900">${convertDateToBuddhistYear(value.insurance_start)} เวลา ${value.insurance_start_time}</span></p>
                                    <p><strong>วันสิ้นสุด กธ. : </strong><span class="text-blue-900">${convertDateToBuddhistYear(value.insurance_end)} เวลา ${value.insurance_end_time}</span></p>
                                    <p><strong>ประเภท : </strong><span class="text-blue-900"> อุบัติเหตุ</span></p>
                                </div>
                                <div>
                                    <button type="button" onclick="window.location.href='tel:${value.company_telephone}'"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2">
                                        <i class="fa-solid fa-2xl fa-phone"></i>
                                        <span class="sr-only">แจ้งเหตุ</span>
                                    </button>
                                    <p class="font-bold text-blue-800 py-1">แจ้งเหตุ </p>
                                </div>
                            </div>

                            <div class="text-center py-1" id="box-btn-open-${index+22}">
                                <button onclick="show_detail(${index+22})" class="text-gray-600 text-sm underline">เพิ่มเติม</button>
                            </div>
                            <div id="detail-insurance-${index+22}" class="hidden mt-1">
                                <p><strong>เลขที่กรมธรรม์ : </strong><span class="text-blue-900">${value.policy_number}</span></p>
                                <p><strong>บริษัทประกัน : </strong><span class="text-blue-900">${value.company_name}</span></p>
                                <!-- <p><strong>ทุนประกัน : </strong><span class="text-blue-900">${value.insurance_limit}</span></p> -->
                                <p><strong>ค่ารักษา : </strong><span class="text-blue-900">${value.treatment_costs}</span></p>
                                <p><strong>ค่าชดเชยวันละ : </strong><span class="text-blue-900">${value.daily_compensation}</span></p>
                                <p><strong>เบี้ยรวม : </strong><span class="text-blue-900">${value.total_price}</span></p>
                            </div>
                            <div class="text-center py-1 hidden" id="box-btn-hide-${index+22}">
                                <button onclick="hide_detail(${index+22})" class="text-gray-600 text-sm underline">ซ่อน</button>
                            </div>
                        </div>`;
                    });
                }
                if(res.home_insurance.length > 0){
                    $.each(res.home_insurance, function (index, value) { 
                        el_data += `<div class="bg-linear-to-l from-gray-50 to-gray-100 rounded-lg shadow-md p-3 mb-2">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p><strong>ชื่อ-นามสกุล : </strong><span class="text-blue-900">${value.cust_name}</span></p>
                                    <p><strong>ประเภท : </strong><span class="text-blue-900"> อัคคีภัย</span></p>
                                    <p><strong>สถานะที่ตั้ง : </strong><span class="text-blue-900"> ${value.location_insured}</span></p>
                                    <p><strong>วันที่คุ้มครอง : </strong><span class="text-blue-900">${convertDateToBuddhistYear(value.insurance_start)} เวลา ${value.insurance_start_time}</span></p>
                                    <p><strong>วันสิ้นสุด กธ. : </strong><span class="text-blue-900">${convertDateToBuddhistYear(value.insurance_end)} เวลา ${value.insurance_end_time}</span></p>
                                </div>
                                <div>
                                    <button type="button" onclick="window.location.href='tel:${value.company_telephone}'"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2">
                                        <i class="fa-solid fa-2xl fa-phone"></i>
                                        <span class="sr-only">แจ้งเหตุ</span>
                                    </button>
                                    <p class="font-bold text-blue-800 py-1">แจ้งเหตุ </p>
                                </div>
                            </div>

                            <div class="text-center py-1" id="box-btn-open-${index+33}">
                                <button onclick="show_detail(${index+33})" class="text-gray-600 text-sm underline">เพิ่มเติม</button>
                            </div>
                            <div id="detail-insurance-${index+33}" class="hidden mt-1">
                                <p><strong>เลขที่กรมธรรม์ : </strong><span class="text-blue-900">${value.policy_number}</span></p>
                                <p><strong>บริษัทประกัน : </strong><span class="text-blue-900">${value.company_name}</span></p>
                                <!-- <p><strong>ทุนประกัน : </strong><span class="text-blue-900">${value.insurance_limit}</span></p> -->
                                <!-- <p><strong>เบี้ยรวม : </strong><span class="text-blue-900">${value.total_price}</span></p> -->
                            </div>
                            <div class="text-center py-1 hidden" id="box-btn-hide-${index+33}">
                                <button onclick="hide_detail(${index+33})" class="text-gray-600 text-sm underline">ซ่อน</button>
                            </div>
                        </div>`;
                    });
                }
                if(res.transport_insurance.length > 0){
                    $.each(res.transport_insurance, function (index, value) { 
                        el_data += `<div class="bg-linear-to-l from-gray-50 to-gray-100 rounded-lg shadow-md p-3 mb-2">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p><strong>ชื่อ-นามสกุล : </strong><span class="text-blue-900">${value.cust_name}</span></p>
                                    <p><strong>ทะเบียนเลขที่ : </strong><span class="text-blue-900">${value.register}</span></p>
                                    <p><strong>ประเภท : </strong><span class="text-blue-900"> ขนส่ง</span></p>
                                    <p><strong>วันที่คุ้มครอง : </strong><span class="text-blue-900">${convertDateToBuddhistYear(value.insurance_start)} เวลา ${value.insurance_start_time}</span></p>
                                    <p><strong>วันสิ้นสุด กธ. : </strong><span class="text-blue-900">${convertDateToBuddhistYear(value.insurance_end)} เวลา ${value.insurance_end_time}</span></p>
                                </div>
                                <div>
                                    <button type="button" onclick="window.location.href='tel:${value.company_telephone}'"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2">
                                        <i class="fa-solid fa-2xl fa-phone"></i>
                                        <span class="sr-only">แจ้งเหตุ</span>
                                    </button>
                                    <p class="font-bold text-blue-800 py-1">แจ้งเหตุ </p>
                                </div>
                            </div>

                            <div class="text-center py-1" id="box-btn-open-${index+33}">
                                <button onclick="show_detail(${index+33})" class="text-gray-600 text-sm underline">เพิ่มเติม</button>
                            </div>
                            <div id="detail-insurance-${index+33}" class="hidden mt-1">
                                <p><strong>เลขที่กรมธรรม์ : </strong><span class="text-blue-900">${value.policy_number}</span></p>
                                <p><strong>บริษัทประกัน : </strong><span class="text-blue-900">${value.company_name}</span></p>
                                <!-- <p><strong>ทุนประกัน : </strong><span class="text-blue-900">${value.insurance_limit}</span></p> -->
                                <!-- <p><strong>เบี้ยรวม : </strong><span class="text-blue-900">${value.total_price}</span></p> -->
                            </div>
                            <div class="text-center py-1 hidden" id="box-btn-hide-${index+33}">
                                <button onclick="hide_detail(${index+33})" class="text-gray-600 text-sm underline">ซ่อน</button>
                            </div>
                        </div>`;
                    });
                }
                $('#box-data-insurance').html(el_data);
                $('#box-data-insurance').removeClass('hidden');
            },
                "json"
            );
        }
        function convertDateToBuddhistYear(date) {
            const dateObj = new Date(date);
            const day = String(dateObj.getDate()).padStart(2, '0');
            const month = String(dateObj.getMonth() + 1).padStart(2, '0');
            const year = dateObj.getFullYear() + 543;
            return `${day}/${month}/${year}`;
        }
        function numComma(num) {
            if (num == null || num == '' || !(/^[0-9]+$/).test(num)) {
                return '-';
            }
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>
</body>

</html>