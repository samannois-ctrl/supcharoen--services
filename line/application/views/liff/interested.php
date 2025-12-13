<!DOCTYPE html>
<html lang="en">
<?php require_once APPPATH . 'views/liff/head.php'; ?>

<body class="bg-sky-100">
    <?php require_once APPPATH . 'views/components/loading.php'; ?>
    <section class="max-w-screen-xl px-3 xl:px-0 mx-auto my-8">
        <div class="flex items-center justify-center py-5 space-x-3">
            <img src="https://img.icons8.com/external-tal-revivo-solid-tal-revivo/100/external-motor-car-insurance-by-private-company-isolated-on-white-background-protection-solid-tal-revivo.png"
                class="h-10" alt="Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap">ตรอ. ทรัพย์เจริญเซอร์วิส</span>
        </div>
        <div class="bg-white px-4 py-5 rounded drop-shadow">
            <form class="space-y-4 md:space-y-6" id="form-interested">
                <h1 class="text-xl text-center font-semibold">สนใจประกัน</h1>
                <div>
                    <label for="customer_name" class="block mb-2 text-sm font-medium text-gray-900">ชื่อ -
                        นามสกุล</label>
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 start-0 text-gray-500 top-0 flex items-center ps-3.5 pointer-events-none">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <input type="text" id="customer_name" name="customer_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                            placeholder="กรอกชื่อ - นามสกุล" required />
                    </div>
                </div>
                <div>
                    <label for="customer_number_phone"
                        class="block mb-2 text-sm font-medium text-gray-900">เบอร์โทรศัพท์</label>
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 start-0 text-gray-500 top-0 flex items-center ps-3.5 pointer-events-none">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <input type="tel" id="customer_number_phone" name="customer_number_phone" maxlength="10" minlength="10"
                            class="bg-gray-50 border border-gray-300 allow-number-only text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                            placeholder="กรอกเบอร์โทรศัพท์" required />
                    </div>
                </div>
                <div>
                    <label for="type_car" class="block mb-2 text-sm font-medium text-gray-900">ประเภทรถ</label>
                    <select id="type_car" name="type_car"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                        <option disabled selected value="">เลือกประเภทรถ</option>
                        <option value="1">รถเก๋ง, รถกระบะ 4 ประตู</option>
                        <option value="2">รถตู้, รถ 2 แถว</option>
                        <option value="3">รถกระบะ</option>
                        <option value="4">รถจักรยานยนต์</option>
                        <!-- <option value="5">รถบรรทุก</option>
                        <option value="6">รถบรรทุกน้ำมันเชื้อเพลิงแก๊ส</option>
                        <option value="7">รถพลังงานไฟฟ้า</option> -->
                    </select>
                </div>
                <div>
                    <label for="car_brand" class="block mb-2 text-sm font-medium text-gray-900">ยี่ห้อรถ</label>
                    <select name="car_brand" id="car_brand"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                        <option value="" disabled selected>เลือกยี่ห้อรถ</option>
                        <option value="Toyota">Toyota</option>
                        <option value="Honda">Honda</option>
                        <option value="Nissan">Nissan</option>
                        <option value="Mitsubishi">Mitsubishi</option>
                        <option value="Isuzu">Isuzu</option>
                        <option value="Ford">Ford</option>
                        <option value="Chevrolet">Chevrolet</option>
                        <option value="Mazda">Mazda</option>
                        <option value="Suzuki">Suzuki</option>
                        <option value="MG">MG</option>
                        <option value="BMW">BMW</option>
                        <option value="Mercedes-Benz">Mercedes-Benz</option>
                        <option value="Audi">Audi</option>
                        <option value="Volvo">Volvo</option>
                        <option value="Peugeot">Peugeot</option>
                        <option value="Mini">Mini</option>
                        <option value="Porsche">Porsche</option>
                        <option value="Lexus">Lexus</option>
                        <option value="Jeep">Jeep</option>
                        <option value="Land Rover">Land Rover</option>
                        <option value="Jaguar">Jaguar</option>
                        <option value="Subaru">Subaru</option>
                        <option value="Kia">Kia</option>
                        <option value="Hyundai">Hyundai</option>
                        <option value="VolksWagen">VolksWagen</option>
                        <option value="Peugeot">Peugeot</option>
                        <option value="Ferrari">Ferrari</option>
                        <option value="Lamborghini">Lamborghini</option>
                        <option value="Bentley">Bentley</option>
                        <option value="Rolls-Royce">Rolls-Royce</option>
                        <option value="Maserati">Maserati</option>
                        <option value="McLaren">McLaren</option>
                        <option value="Lotus">Lotus</option>
                        <option value="Aston Martin">Aston Martin</option>
                        <option value="Bugatti">Bugatti</option>
                        <option value="Alfa Romeo">Alfa Romeo</option>
                        <option value="Fiat">Fiat</option>
                        <option value="Tata">Tata</option>
                        <option value="Proton">Proton</option>
                        <option value="Perodua">Perodua</option>
                        <option value="Chery">Chery</option>
                        <option value="Great Wall">Great Wall</option>
                        <option value="Geely">Geely</option>
                        <option value="BYD">BYD</option>
                        <option value="Changan">Changan</option>
                        <option value="Haval">Haval</option>
                        <option value="อื่นๆ">อื่นๆ</option>
                    </select>
                </div>
                <div>
                    <label for="reg_year" class="block mb-2 text-sm font-medium text-gray-900">ปีจดทะเบียน</label>
                    <select id="reg_year" name="reg_year"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                        <option disabled selected value="">เลือกปีจดทะเบียน</option>
                        <option value="2024">2024 (2567)</option>
                        <option value="2023">2023 (2566)</option>
                        <option value="2022">2022 (2565)</option>
                        <option value="2021">2021 (2564)</option>
                        <option value="2020">2020 (2563)</option>
                        <option value="2019">2019 (2562)</option>
                        <option value="2018">2018 (2561)</option>
                        <option value="2017">2017 (2560)</option>
                        <option value="2016">2016 (2559)</option>
                        <option value="2015">2015 (2558)</option>
                        <option value="2014">2014 (2557)</option>
                        <option value="2013">2013 (2556)</option>
                        <option value="2012">2012 (2555)</option>
                        <option value="2011">2011 (2554)</option>
                        <option value="2010">2010 (2553)</option>
                        <option value="2009">2009 (2552)</option>
                        <option value="2008">2008 (2551)</option>
                        <option value="2007">2007 (2550)</option>
                        <option value="2006">2006 (2549)</option>
                        <option value="2005">2005 (2548)</option>
                        <option value="2004">2004 (2547)</option>
                        <option value="2003">2003 (2546)</option>
                        <option value="2002">2002 (2545)</option>
                        <option value="2001">2001 (2544)</option>
                        <option value="2000">2000 (2543)</option>
                    </select>
                </div>
                <div>
                    <label for="type_insurance"
                        class="block mb-2 text-sm font-medium text-gray-900">ประเภทประกัน</label>
                    <select id="type_insurance" name="type_insurance"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                        <option disabled selected value="">เลือกประเภทประกัน</option>
                        <option value="ป.1">ป.1</option>
                        <option value="ป.2+">ป.2+</option>
                        <option value="ป.3">ป.3</option>
                        <option value="ป.3+">ป.3+</option>
                    </select>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"><i
                        class="fa-solid fa-floppy-disk"></i> บันทึกข้อมูล</button>
            </form>
        </div>
    </section>
    <script src="<?= base_url('assets/js/func.js?v=') . rand() ?>"></script>
    <script>
        const liffId = '2006839693-YlaKG5w2';
        let userId = '';
        $(document).ready(function () {
            $('#loading').removeClass('hidden')
            main()
        });

        function main() {
            liff.init({ liffId: liffId });
            liff.ready.then(() => {
                if (!liff.isLoggedIn()) {
                    liff.login();
                }
                liff.getProfile().then(profile => {
                    $('#loading').addClass('hidden')
                    userId = profile.userId
                })
                
            })
        }

        $('#form-interested').submit(function (e) {
            e.preventDefault();
            Swal.fire({
                title: "ยืนยันการทำรายการ",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "ยืนยัน",
                cancelButtonText: "ยกเลิก"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#loading').removeClass('hidden');
                    $.post('add-interested', $(this).serialize()+ '&uid=' + userId, (res) => {
                        console.log(res);
                        $('#loading').addClass('hidden');
                        if (res.success) {
                            AlertSuccess('รับข้อมูลเรียบร้อยแล้ว');
                            const { userAgent } = navigator
                            if (userAgent.includes('Line')) {
                                setTimeout(() => {
                                    liff.closeWindow()
                                }, 1500);
                            } else {
                                setTimeout(() => {
                                    window.location.reload();
                                }, 1500);
                            }
                        }
                    }, "json");
                }
            });
        });
    </script>
</body>

</html>