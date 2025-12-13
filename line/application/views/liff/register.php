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
            <form class="space-y-4 md:space-y-6" id="form-register">
                <div class="grid grid-cols-2 gap-2 items-center">
                    <img id="img_profile" />
                    <p class="font-semibold text-center text-lg" id="display_name"></p>
                </div>
                <div>
                    <label for="telephone" class="block mb-2 tracking-wide font-medium text-gray-900"><i
                            class="fa-solid fa-square-phone"></i> หมายเลขโทรศัพท์</label>
                    <input type="tel" name="telephone" id="telephone" maxlength="10" minlength="10"
                        class="bg-gray-50 border allow-number-only border-gray-300 text-gray-900 rounded focus:ring-slate-600 focus:border-slate-600 block w-full p-2.5"
                        placeholder="กรอกหมายเลขโทรศัพท์" required="">
                    <span id="telephone_error"></span>
                </div>
                <!-- <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">ชื่อ</label>
                        <input type="text" name="first_name" id="first_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-600 focus:border-slate-600 block w-full p-2.5"
                            placeholder="กรอกชื่อ" required="">
                        <span id="first_name_error"></span>
                    </div>
                    <div>
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">นามสกุล</label>
                        <input type="text" name="last_name" id="last_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-600 focus:border-slate-600 block w-full p-2.5"
                            placeholder="กรอกนามสกุล" required="">
                        <span id="last_name_error"></span>
                    </div> -->
                <button type="submit"
                    class="w-full cursor-pointer text-white bg-slate-600 hover:bg-slate-700 focus:ring-4 focus:outline-none focus:ring-slate-300 font-semibold rounded px-5 tracking-wider text-lg py-2.5 text-center"><i
                        class="fa-solid fa-user-plus"></i> ลงทะเบียน</button>
            </form>
        </div>
    </section>
    <script src="<?= base_url('assets/js/func.js?v=') . rand() ?>"></script>
    <script>
    const liffId = '2006839693-G53MVED0';
    let userId = '';
    let displayName = '';
    $(document).ready(function() {
        $('#loading').removeClass('hidden')
        main()
    });

    function main() {
        liff.init({
            liffId: liffId
        });
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
            })
        })

    }

    $('#form-register').submit(function(e) {
        e.preventDefault();
        // Swal.fire({
        //     title: "ยืนยันการลงทะเบียน",
        //     icon: "warning",
        //     showCancelButton: true,
        //     confirmButtonColor: "#3085d6",
        //     cancelButtonColor: "#d33",
        //     confirmButtonText: "ยืนยัน",
        //     cancelButtonText: "ยกเลิก"
        // }).then((result) => {
        //     if (result.isConfirmed) {
        //         $('#loading').removeClass('hidden');
        //         $.post('add-member', $(this).serialize() + '&uid=' + userId + '&displayName=' + displayName, (res) => {
        //             if (res.success) {
        //                 $('#loading').addClass('hidden');
        //                 AlertSuccess(res.msg);
        //                 const { userAgent } = navigator
        //                 if (userAgent.includes('Line')) {
        //                     setTimeout(() => {
        //                         liff.closeWindow()
        //                     }, 1500);
        //                 } else {
        //                     setTimeout(() => {
        //                         window.location.reload();
        //                     }, 1500);
        //                 }
        //             }
        //         }, "json");
        //     }
        // });
        $('#loading').removeClass('hidden');
        $.post('add-member', $(this).serialize() + '&uid=' + userId + '&displayName=' + displayName, (res) => {
            if (res.success) {
                $('#loading').addClass('hidden');
                AlertSuccess(res.msg);
                const {
                    userAgent
                } = navigator
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
    });
    </script>
</body>

</html>