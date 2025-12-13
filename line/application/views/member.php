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
        <div class="bg-white drop-shadow-md p-4 rounded-none mb-2">
            <form id="form-search-member" class="mx-auto">
                <div class="flex items-end justify-between">
                    <div>
                        <label for="phone-input"
                            class="block mb-2 text-sm font-medium text-gray-900">เบอร์โทรศัพท์:</label>
                        <div class="relative">
                            <div
                                class="absolute inset-y-0 start-0 top-0 flex items-center text-gray-500 ps-3.5 pointer-events-none">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <input type="tel" name="phone_number" id="phone-input" maxlength="10" minlength="10"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 allow-number-only"
                                placeholder="กรอกเบอร์โทรศัพท์" />
                        </div>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center justify-center px-6 py-2 text-sm font-medium text-white bg-blue-500 border border-transparent rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <i class="fa-solid fa-magnifying-glass"></i>&nbsp;&nbsp;ค้นหา
                    </button>
                </div>
            </form>
        </div>
        <div class="bg-white drop-shadow-md p-4 rounded-none">
            <h1 class="text-xl font-semibold pb-3"><i class="fa-solid fa-user-group"></i>&emsp;จัดการลูกค้า</h1>
            <div class="relative mt-2 overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs bg-slate-700 uppercase text-slate-50">
                        <tr class="whitespace-nowrap">

                            <th scope="col" class="px-4 py-3">ลำดับ</th>
                            <th scope="col" class="px-4 py-3">เบอร์โทรศัพท์</th>
                            <!-- <th scope="col" class="px-4 py-3">ชื่อลูกค้า</th> -->
                            <th scope="col" class="px-4 py-3">ชื่อ ( Line ) ลูกค้า</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="rows-member"></tbody>
                </table>
            </div>
        </div>
    </main>
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
            fetchMember()
        });

        function fetchMember() {
            $('#loading').removeClass('hidden');
            $.getJSON("fetch-member",
                function (res) {
                    $('#loading').addClass('hidden');
                    var el_data = [];
                    if (res.error) {
                        el_data += `<tr><th class="text-center py-4" colspan="4">${res.msg}</th></tr>`;
                    }

                    if (res.success) {
                        $.each(res.data, function (key, val) {
                            if (val.first_name == null && val.last_name == null) {
                                var fullname = 'ว่าง';
                                
                            } else {
                                var fullname = val.first_name + ' ' + val.last_name;
                            }
                            el_data += `<tr class="border-b whitespace-nowrap">
                                <td class="px-4 py-3">${key+1}</td>
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">${val.phone_number}</th>
                                
                                <td class="px-4 py-3">${val.nick_name}</td>
                                <td class="px-4 py-3">
                                <button type="button" onclick="delete_member('${val.uid}')" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5"><i class="fa-solid fa-trash-can"></i> ลบสมาชิก</button>
                                </td>
                            </tr>`;
                        })
                    }
                    $('#rows-member').html(el_data);
                }
            );
        }

        $('#form-search-member').submit(function (e) {
            e.preventDefault();
            var data = $(this).serialize();
            $('#loading').removeClass('hidden');
            $.post("search-member", data,
                function (res) {
                    $('#loading').addClass('hidden');
                    var el_data = [];
                    if (res.error) {
                        el_data += `<tr><th class="text-center py-4" colspan="3">${res.msg}</th></tr>`;
                        
                    }
                    if (res.success) {
                        $.each(res.data, function (key, val) {
                            el_data += `<tr class="border-b whitespace-nowrap">
                             <td class="px-4 py-3">${key+1}</td>
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">${val.phone_number}</th>
                                <td class="px-4 py-3">${val.nick_name}</td>
                                <td class="px-4 py-3">
                                    
                                </td>
                            </tr>`;
                        });
                        
                    }
                    $('#rows-member').html(el_data);
                }, "json"
            );
        });

        function delete_member(uid) {
            Swal.fire({
                title: "ยืนยันการลบข้อมูลลูกค้า",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "ยืนยัน",
                cancelButtonText: "ยกเลิก"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#loading').removeClass('hidden');
                    $.post('del-member', {'member_id' : uid}, (res) => {
                        if (res.success) {
                            $('#loading').addClass('hidden');
                            // AlertSuccess(res.msg);
                            // const { userAgent } = navigator
                            // if (userAgent.includes('Line')) {
                            //     setTimeout(() => {
                            //         liff.closeWindow()
                            //     }, 1500);
                            // } else {
                            //     setTimeout(() => {
                            //         window.location.reload();
                            //     }, 1500);
                            // }
                            if (res.success) {
                                AlertSuccess(res.msg);
                                setTimeout(() => {
                                    window.location.reload();
                                }, 1500);
                                
                            }

                            if (res.error) {
                                AlertError(res.msg);
                            }
                        }
                    }, "json");
                }
            });
        }
    </script>
</body>

</html>