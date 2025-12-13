<!DOCTYPE html>
<html lang="en">

<?php require_once APPPATH . 'views/liff/head.php'; ?>

<body class="bg-sky-100">
    <?php require_once APPPATH . 'views/components/loading.php'; ?>

    <!-- <section class="max-w-screen-xl px-3 xl:px-0 mx-auto my-8">
        <div class="flex items-center justify-center py-5 space-x-3">
            <img src="https://img.icons8.com/external-tal-revivo-solid-tal-revivo/100/external-motor-car-insurance-by-private-company-isolated-on-white-background-protection-solid-tal-revivo.png"
                class="h-10" alt="Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap">ตรอ. ทรัพย์เจริญเซอร์วิส</span>
        </div>
        <div class="bg-white px-4 py-5 rounded drop-shadow">
            <form class="space-y-4 md:space-y-6" id="form-renew">
                <h1 class="text-xl text-center font-semibold">---: แจ้งต่ออายุ :---</h1>
                <div class="grid grid-cols-2 gap-2 items-center">
                    <img id="img_profile" />
                    <p class="font-semibold text-center text-lg" id="display_name"></p>
                </div>
                <div>
                    <label for="car_code" class="block mb-2 tracking-wide font-medium text-gray-900"><i
                            class="fa-solid fa-rug"></i> เลขทะเบียนรถ</label>
                    <input type="text" name="car_code" id="car_code"
                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded focus:ring-slate-600 focus:border-slate-600 block w-full p-2.5"
                        placeholder="กรอกเลขทะเบียนรถ" required="">
                    <span id="car_code_error"></span>
                </div>
                <div>
                    <label for="province" class="block mb-2 text-sm font-medium text-gray-900">เลือกจังหวัด</label>
                    <select id="province" name="province" required=""
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="" selected>--------- เลือกจังหวัด ---------</option>
                        <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                        <option value="กระบี่">กระบี่ </option>
                        <option value="กาญจนบุรี">กาญจนบุรี </option>
                        <option value="กาฬสินธุ์">กาฬสินธุ์ </option>
                        <option value="กำแพงเพชร">กำแพงเพชร </option>
                        <option value="ขอนแก่น">ขอนแก่น</option>
                        <option value="จันทบุรี">จันทบุรี</option>
                        <option value="ฉะเชิงเทรา">ฉะเชิงเทรา </option>
                        <option value="ชัยนาท">ชัยนาท </option>
                        <option value="ชัยภูมิ">ชัยภูมิ </option>
                        <option value="ชุมพร">ชุมพร </option>
                        <option value="ชลบุรี">ชลบุรี </option>
                        <option value="เชียงใหม่">เชียงใหม่ </option>
                        <option value="เชียงราย">เชียงราย </option>
                        <option value="ตรัง">ตรัง </option>
                        <option value="ตราด">ตราด </option>
                        <option value="ตาก">ตาก </option>
                        <option value="นครนายก">นครนายก </option>
                        <option value="นครปฐม">นครปฐม </option>
                        <option value="นครพนม">นครพนม </option>
                        <option value="นครราชสีมา">นครราชสีมา </option>
                        <option value="นครศรีธรรมราช">นครศรีธรรมราช </option>
                        <option value="นครสวรรค์">นครสวรรค์ </option>
                        <option value="นราธิวาส">นราธิวาส </option>
                        <option value="น่าน">น่าน </option>
                        <option value="นนทบุรี">นนทบุรี </option>
                        <option value="บึงกาฬ">บึงกาฬ</option>
                        <option value="บุรีรัมย์">บุรีรัมย์</option>
                        <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>
                        <option value="ปทุมธานี">ปทุมธานี </option>
                        <option value="ปราจีนบุรี">ปราจีนบุรี </option>
                        <option value="ปัตตานี">ปัตตานี </option>
                        <option value="พะเยา">พะเยา </option>
                        <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>
                        <option value="พังงา">พังงา </option>
                        <option value="พิจิตร">พิจิตร </option>
                        <option value="พิษณุโลก">พิษณุโลก </option>
                        <option value="เพชรบุรี">เพชรบุรี </option>
                        <option value="เพชรบูรณ์">เพชรบูรณ์ </option>
                        <option value="แพร่">แพร่ </option>
                        <option value="พัทลุง">พัทลุง </option>
                        <option value="ภูเก็ต">ภูเก็ต </option>
                        <option value="มหาสารคาม">มหาสารคาม </option>
                        <option value="มุกดาหาร">มุกดาหาร </option>
                        <option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>
                        <option value="ยโสธร">ยโสธร </option>
                        <option value="ยะลา">ยะลา </option>
                        <option value="ร้อยเอ็ด">ร้อยเอ็ด </option>
                        <option value="ระนอง">ระนอง </option>
                        <option value="ระยอง">ระยอง </option>
                        <option value="ราชบุรี">ราชบุรี</option>
                        <option value="ลพบุรี">ลพบุรี </option>
                        <option value="ลำปาง">ลำปาง </option>
                        <option value="ลำพูน">ลำพูน </option>
                        <option value="เลย">เลย </option>
                        <option value="ศรีสะเกษ">ศรีสะเกษ</option>
                        <option value="สกลนคร">สกลนคร</option>
                        <option value="สงขลา">สงขลา </option>
                        <option value="สมุทรสาคร">สมุทรสาคร </option>
                        <option value="สมุทรปราการ">สมุทรปราการ </option>
                        <option value="สมุทรสงคราม">สมุทรสงคราม </option>
                        <option value="สระแก้ว">สระแก้ว </option>
                        <option value="สระบุรี">สระบุรี </option>
                        <option value="สิงห์บุรี">สิงห์บุรี </option>
                        <option value="สุโขทัย">สุโขทัย </option>
                        <option value="สุพรรณบุรี">สุพรรณบุรี </option>
                        <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
                        <option value="สุรินทร์">สุรินทร์ </option>
                        <option value="สตูล">สตูล </option>
                        <option value="หนองคาย">หนองคาย </option>
                        <option value="หนองบัวลำภู">หนองบัวลำภู </option>
                        <option value="อำนาจเจริญ">อำนาจเจริญ </option>
                        <option value="อุดรธานี">อุดรธานี </option>
                        <option value="อุตรดิตถ์">อุตรดิตถ์ </option>
                        <option value="อุทัยธานี">อุทัยธานี </option>
                        <option value="อุบลราชธานี">อุบลราชธานี</option>
                        <option value="อ่างทอง">อ่างทอง </option>
                    </select>
                </div>
                <button type="submit"
                    class="w-full cursor-pointer text-white bg-slate-600 hover:bg-slate-700 focus:ring-4 focus:outline-none focus:ring-slate-300 font-semibold rounded px-5 tracking-wider text-lg py-2.5 text-center"><i
                        class="fa-solid fa-paper-plane"></i> ส่งข้อมูล</button>
            </form>
        </div>
        <button onclick="Goto('profile')" type="button"
            class="bg-[#ffffffc8] bg-slate-500 rounded-xl text-xl font-semibold text-slate-50 my-5 w-full py-3 "><i
                class="fa-solid fa-house-user"></i> ข้อมูลส่วนตัว</button>
    </section> -->
    <script src="<?= base_url('assets/js/func.js?v=') . rand() ?>"></script>
    <script>
        const liffId = '2006839693-nxy1B56w';
        const urlParams = new URLSearchParams(window.location.search);
        let userId = '';
        $(document).ready(function () {
            $('#loading').removeClass('hidden')
            main()
        });

        function safeBase64Decode(str) {
            // Fix URL-safe Base64 (if needed)
            str = str.replace(/-/g, '+').replace(/_/g, '/');

            // Add padding if missing
            while (str.length % 4 !== 0) {
                str += '=';
            }

            try {
                return atob(str);
            } catch (e) {
                console.error("Invalid base64:", e.message);
                return null;
            }
        }

        function main() {
            console.log('Test');
            const getInfo = urlParams.get('carinfo');
            // alert(getInfo)
            // return;
            // const getInfo = urlParams.get('liff.state'),
            const setText = decodeURIComponent(getInfo).replace("?carinfo=","");
            let base64Decoded = atob(setText),
            newText = decodeURIComponent(base64Decoded).replace(/[+]/g, ' ');
            // alert(getInfo)
            // console.log(newText);
            // alert(newText)
            
            // newText = window.atob(decodeURIComponent(setText)).replace(/[+]/g, ' ');
            
            // return;
            $.post("notify-message-interested", { 'message': newText }, function (res) {
                $('#loading').addClass('hidden');
                console.log(res);
                if (res.success) {
                    console.log('Completed');
                    alert('รับทราบต่ออายุ\nถ้าหากกรมธรรม์เรียบร้อยแล้วแจ้งให้ทราบค่ะ');
                    liff.closeWindow();
                }
            }, "json");
            // setTimeout(() => {
            //     alert('ส่งคำขอสนใจต่ออายุสำเร็จ');
            //     liff.closeWindow();
            // }, 3000);
            return;
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
                    const urlParams = new URLSearchParams(window.location.search);
                    const carinfo = urlParams.get('carinfo');
                    if (carinfo == null) {
                        getCarInfo(userId);
                    }else{
                        const parts = carinfo.split("+");
                        const plateNumber = parts[0]; // "ab111"
                        const province = parts.slice(1).join("+"); // "สงขลา"
                        $('#car_code').val(plateNumber);
                        $('#province').val(province);
                    }
                    
                    // displayName = profile.displayName
                })
                
            })
        }

        function getCarInfo(userId) {
            $('#loading').removeClass('hidden');
            $.post("get-member-info-by-uid", { 'uid': userId }, function (res) {
                $('#loading').addClass('hidden');
                console.log(res);
                if (res.success) {
                    $('#car_code').val(res.data[0].vehicle_regis);
                    $('#province').val(res.data[0].province_name);
                } else {
                    // AlertError('ไม่พบข้อมูลรถ');
                }
                
            }, "json");
        }

        $('#form-renew').submit(function (e) {
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
                    $.post('add-renew', $(this).serialize() + '&uid=' + userId, (res) => {
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