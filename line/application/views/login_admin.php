<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ลงชื่อเข้าใช้งาน :: ตรอ. ทรัพย์เจริญเซอร์วิส (แยกโรงปูน) ระบบบริหารงานประกันภัยรถยนต์</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.0.0/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css?v=') . rand() ?>">

</head>

<body>
    <section class="bg-gray-50">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-3xl tracking-wide font-bold text-gray-900">
                <img class="w-16 h-16 mr-2" src="https://img.icons8.com/3d-fluency/100/chatbot.png" alt="logo">
                ระบบจัดการข้อความอัตโนมัติ

            </a>
            <div class="w-full bg-white rounded hover:drop-shadow-lg shadow md:mt-0 sm:max-w-lg xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-wider text-gray-900 md:text-2xl text-center">
                        <i class="fa-solid fa-door-open"></i> ลงชื่อเข้าใช้งาน
                    </h1>
                    <form class="space-y-4 md:space-y-6" id="form-login">
                        <div>
                            <label for="username"
                                class="block mb-2 text-sm tracking-wide font-medium text-gray-900">ชื่อผู้ใช้</label>
                            <input type="email" name="username" id="username"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded focus:ring-slate-600 focus:border-slate-600 block w-full p-2.5"
                                placeholder="ป้อนชื่อผู้ใช้" required="">
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium tracking-wide text-gray-900 ">รหัสผ่าน</label>
                            <input type="password" name="password" id="password" placeholder="ป้อนรหัสผ่าน"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded focus:ring-slate-600 focus:border-slate-600 block w-full p-2.5"
                                required="">
                            <span id="password_error"></span>
                        </div>
                        <button type="submit"
                            class="w-full cursor-pointer text-white bg-slate-600 hover:bg-slate-700 focus:ring-4 focus:outline-none focus:ring-slate-300 font-semibold rounded px-5 tracking-wider text-lg py-2.5 text-center"><i
                                class="fa-solid fa-arrow-right-to-bracket"></i> เข้าสู่ระบบ</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.0.0/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"
        integrity="sha512-b+nQTCdtTBIRIbraqNEwsjB6UvL3UEMkXnhzd8awtCYh0Kcsjl9uEgwVFVbhoj3uu1DO1ZMacNvLoyJJiNfcvg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?= base_url('assets/js/func.js?v=') . rand() ?>"></script>
    <script>
        $('#form-login').submit(function (e) {
            e.preventDefault();
            $.post('<?= base_url('login-admin'); ?>', $(this).serialize(), (data) => {
                // console.log(data);
                if (data.error) {

                    if (data.password_error != '') {
                        $('#password_error').html(data.password_error);
                    } else {
                        $('#password_error').html('');
                    }

                    if (!data.error_from) {
                        AlertError(data.msg);
                    }
                }
                if (data.success) {

                    AlertSuccess(data.message);
                    setTimeout(() => {
                        Goto('reply-message')
                        // Goto('dashboard')
                        
                    }, 1500);
                }
            }, "json");
        });
    </script>
</body>

</html>