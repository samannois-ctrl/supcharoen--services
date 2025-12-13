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
            <form id="form-search-renew" class="mx-auto">
                <div class="flex items-end justify-between">
                    <div class="flex items-center space-x-2">
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
                                    placeholder="xxx-xxx-xxxx" />
                            </div>
                        </div>
                        <div>
                            <label for="car-code-input"
                                class="block mb-2 text-sm font-medium text-gray-900">ทะเบียนรถ:</label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 start-0 top-0 flex items-center text-gray-500 ps-3.5 pointer-events-none">
                                    <i class="fa-solid fa-car"></i>
                                </div>
                                <input type="text" name="car_code" id="car-code-input" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                                    placeholder="xxx-xxxx" />
                            </div>
                        </div>
                        <div>
                            <label for="start-date-input"
                                class="block mb-2 text-sm font-medium text-gray-900">จากวันที่:</label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 start-0 top-0 flex items-center text-gray-500 ps-3.5 pointer-events-none">
                                    <i class="fa-solid fa-calendar-days"></i>
                                </div>
                                <input type="date" name="start_date" id="start-date-input" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                                    />
                            </div>
                        </div>
                        <div>
                            <label for="end-date-input"
                                class="block mb-2 text-sm font-medium text-gray-900">ถึงวันที่:</label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 start-0 top-0 flex items-center text-gray-500 ps-3.5 pointer-events-none">
                                    <i class="fa-solid fa-calendar-days"></i>
                                </div>
                                <input type="date" name="end_date" id="end-date-input" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                                    />
                            </div>
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
            <h1 class="text-xl font-semibold pb-3"><i class="fa-solid fa-bell"></i>&emsp;รายการแจ้งต่ออายุ</h1>
            <div class="relative mt-2 overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs bg-slate-700 uppercase text-slate-50">
                        <tr class="whitespace-nowrap">
                            <th scope="col" class="px-4 py-3"></th>
                            <th scope="col" class="px-4 py-3">ชื่อผู้แจ้ง</th>
                            <th scope="col" class="px-4 py-3">เบอร์โทรศัพท์</th>
                            <th scope="col" class="px-4 py-3">ทะเบียนรถ</th>
                            <th scope="col" class="px-4 py-3">วันที่แจ้ง</th>
                        </tr>
                    </thead>
                    <tbody id="rows-renew"></tbody>
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
            fetchRenew()
        });

        function fetchRenew() {
            $('#loading').removeClass('hidden');
            $.getJSON("fetch-renew",
                function (res) {
                    $('#loading').addClass('hidden');
                    console.log(res);

                    var el_data = [];
                    if (res.success) {
                        $.each(res.data, function (key, val) {
                            el_data += `<tr class="border-b whitespace-nowrap">
                            <td class="px-4 py-3">${key+1}</td>
                            <td class="px-4 py-3">${val.nick_name}</td>
                            <td class="px-4 py-3">${val.phone_number}</td>
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">${val.car_code} ${val.province}</th>
                            <td class="px-4 py-3">${val.create_at}</td>
                            </tr>`;
                        });
                    }
                    if (res.error) {
                        el_data += `<tr><th class="text-center py-4" colspan="4">${res.msg}</th></tr>`;
                    }

                    $('#rows-renew').html(el_data);

                }
            );
        }

        $('#form-search-renew').submit(function (e) {
            e.preventDefault();
            var data = $(this).serialize();
            $('#loading').removeClass('hidden');
            $.post("search-renew", data,
                function (res) {
                    $('#loading').addClass('hidden');

                    var el_data = [];
                    if (res.success) {
                        $.each(res.data, function (key, val) {
                            el_data += `<tr class="border-b whitespace-nowrap">
                            <td class="px-4 py-3">${key+1}</td>
                            <td class="px-4 py-3">${val.nick_name}</td>
                            <td class="px-4 py-3">${val.phone_number}</td>
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">${val.car_code} ${val.province}</th>
                            <td class="px-4 py-3">${val.create_at}</td>
                            </tr>`;
                        });
                    }
                    if (res.error) {
                        el_data += `<tr><th class="text-center py-4" colspan="4">${res.msg}</th></tr>`;
                    }

                    $('#rows-renew').html(el_data);

                }, "json"
            );
        });
    </script>
</body>

</html>