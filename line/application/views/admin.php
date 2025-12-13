<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ระบบจัดการข้อความอัตโนมัติ :: ตรอ. ทรัพย์เจริญเซอร์วิส (แยกโรงปูน) ระบบบริหารงานประกันภัยรถยนต์</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.0.0/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css?v=') . rand() ?>">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-50">
    <?php require_once APPPATH . 'views/components/loading.php'; ?>
    <?php require_once APPPATH . 'views/components/menu.php'; ?>
    <main class="max-w-screen-xl px-3 xl:px-0 mx-auto">
        <div class="bg-white drop-shadow-md p-4 rounded-none">
            <h1 class="text-xl font-semibold pb-3"><i class="fa-solid fa-users"></i>&emsp;จัดการพนักงาน</h1>

            <!-- Modal toggle -->
            <button data-modal-target="add-admin-modal" data-modal-toggle="add-admin-modal"
                class="block text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-none cursor-pointer text-sm px-5 py-2.5 text-center"
                type="button">
                <i class="fa-solid fa-user-plus"></i>&nbsp;เพิ่มแอดมิน
            </button>

            <div class="relative mt-2 overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs bg-slate-700 uppercase text-slate-50">
                        <tr class="whitespace-nowrap">
                            <th scope="col" class="px-4 py-3">ลำดับ</th>
                            <th scope="col" class="px-4 py-3">รหัสผู้ใช้</th>
                            <th scope="col" class="px-4 py-3">ชื่อผู้ใช้</th>
                            <th scope="col" class="px-4 py-3">ชื่อแอดมิน</th>
                            <th scope="col" class="px-4 py-3">เบอร์โทรศัพท์</th>
                            <th scope="col" class="px-4 py-3">เข้าสู่ระบบล่าสุด</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="rows-admin"></tbody>
                </table>
            </div>
        </div>
    </main>

    <?php require_once APPPATH . 'views/modal/admin.php'; ?>

    



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.0.0/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"
        integrity="sha512-b+nQTCdtTBIRIbraqNEwsjB6UvL3UEMkXnhzd8awtCYh0Kcsjl9uEgwVFVbhoj3uu1DO1ZMacNvLoyJJiNfcvg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?= base_url('assets/js/func.js?v=') . rand() ?>"></script>
    <script src="<?= base_url('assets/js/main.js?v=') . rand() ?>"></script>
    <script>
        $(document).ready(function () {
            fetchAdmin()
        });

        function fetchAdmin() {
            $('#loading').removeClass('hidden');
            $.getJSON("fetch-admin",
                function (res) {
                    $('#loading').addClass('hidden');
                    var el_data = [];
                    if (res.error) {
                        el_data += `<tr><th class="text-center py-4" colspan="6">${res.msg}</th></tr>`;
                    }

                    if (res.success) {

                        $.each(res.data, function (key, val) {
                            el_data += `<tr class="border-b whitespace-nowrap">
                        <td class="px-4 py-3">${key+1}</td>
                        <td class="px-4 py-3">${val.admin_code}</td>
                        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">${val.username}</th>
                        <td class="px-4 py-3">${val.first_name} ${val.last_name}</td>
                        <td class="px-4 py-3">${val.phone_number}</td>
                        <td class="px-4 py-3">${val.last_login}</td>
                        <td class="px-4 py-3">
                            <button type="button" onclick="set_password('${val.admin_code}')"
                                class="inline-flex items-center px-4 whitespace-nowrap py-1 text-sm font-medium text-white bg-blue-600 border border-blue-600 rounded-s-lg hover:bg-white hover:text-blue-600">
                                <i class="fa-solid fa-key"></i>
                                &nbsp;เปลี่ยนรหัสผ่าน
                            </button>`;

                            if (val.status == 'ACTIVE') {
                                el_data += `<button type="button" onclick="update_status('DISABLE','${val.admin_code}')"
                                class="inline-flex items-center px-4 whitespace-nowrap py-1 text-sm font-medium text-white bg-red-600 border border-red-600 rounded-e-lg hover:bg-white hover:text-red-600">
                                <i class="fa-solid fa-lock"></i>
                                &nbsp;ปิดใช้งาน
                            </button>`;
                            } else {
                                el_data += `<button type="button" onclick="update_status('ACTIVE','${val.admin_code}')" class="inline-flex items-center px-4 whitespace-nowrap py-1 text-sm font-medium text-white bg-green-600 border border-green-600 rounded-e-lg hover:bg-white hover:text-green-600"><i class="fa-solid fa-lock-open"></i>&nbsp;เปิดใช้งาน</button>`;
                            }


                            el_data += `</td></tr>`;
                        })

                    }
                    $('#rows-admin').html(el_data);
                }
            );
        }

        $('#form-add-admin').on('submit', function (e) {
            e.preventDefault();
            Swal.fire({
                title: "ยืนยันการเพิ่มแอดมิน",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "ยืนยัน",
                cancelButtonText: "ยกเลิก"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post('add-admin', $(this).serialize(), (res) => {
                        if (res.error) {
                            if (res.first_name_error != '') {
                                $('#first_name_error').html(res.first_name_error)
                            } else {
                                $('#first_name_error').html('')
                            }

                            if (res.last_name_error != '') {
                                $('#last_name_error').html(res.last_name_error)
                            } else {
                                $('#last_name_error').html('')
                            }

                            if (res.password_error != '') {
                                $('#password_error').html(res.password_error)
                            } else {
                                $('#password_error').html('')
                            }

                            if (res.phone_number_error != '') {
                                $('#phone_number_error').html(res.phone_number_error)
                            } else {
                                $('#phone_number_error').html('')
                            }

                            if (res.username_error != '') {
                                $('#username_error').html(res.username_error)
                            } else {
                                $('#username_error').html('')
                            }
                        }

                        if (res.success) {

                            AlertSuccess(res.msg)
                            setTimeout(() => {
                                window.location.reload();
                            }, 1500);
                        }
                    }, "json")
                }
            });
        })

        function set_password(code) {
            $('#loading').removeClass('hidden');
            $.post("get-admin", {
                'admin_code': code
            },
                function (res) {
                    $('#loading').addClass('hidden');
                    if (res.success) {
                        var el = `<p>ชื่อ : <strong>${res.data[0].first_name} ${res.data[0].last_name}</strong></p><p>เบอร์โทรศัพท์ : <strong>${res.data[0].phone_number}</strong></p><input type="hidden" name="admin_code_reset_password" value="${res.data[0].admin_code}">`;
                        $('#admin-info').html(el)
                        $('#setPasswordAdminModal').removeClass('hidden')
                        // show_modal('setPasswordAdminModal')
                    }
                    console.log(res);
                },
                "json"
            );

        }

        $('#form-reset-password').submit(function (e) {
            e.preventDefault();
            Swal.fire({
                title: "ยืนยันการทำรายการ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "ยืนยัน",
                cancelButtonText: "ยกเลิก"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#loading').removeClass('hidden');
                    $.post("reset-password-admin", $(this).serialize(),
                        function (res) {
                            $('#loading').addClass('hidden');
                            console.log(res);
                            if (res.error) {
                                AlertError(res.msg)
                            }

                            if (res.success) {
                                close_modal('setPasswordAdminModal')
                                AlertSuccess(res.msg)
                                setTimeout(() => {
                                    window.location.reload()
                                }, 1500);
                            }
                        },
                        "json"
                    );
                }
            });
        });

        function update_status(action, admin_code) {
            Swal.fire({
                title: "ยืนยันการทำรายการ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "ยืนยัน",
                cancelButtonText: "ยกเลิก"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#loading').removeClass('hidden');
                    $.post("update-status-admin", {
                        'action': action,
                        'admin_code': admin_code
                    },
                        function (res) {
                            $('#loading').addClass('hidden');
                            if (res.error) {
                                AlertError(res.msg)
                            }

                            if (res.success) {
                                AlertSuccess(res.msg)
                                setTimeout(() => {
                                    window.location.reload()
                                }, 1500);
                            }
                        },
                        "json"
                    );
                }
            });
        }
    </script>
</body>

</html>