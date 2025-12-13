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
            <form id="form-search-interested" class="mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <div>
                        <label for="customer_number_phone"
                            class="block mb-2 text-sm font-medium text-gray-900">เบอร์โทรศัพท์:</label>
                        <div class="relative">
                            <div
                                class="absolute inset-y-0 start-0 top-0 flex items-center text-gray-500 ps-3.5 pointer-events-none">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <input type="tel" name="customer_number_phone" id="customer_number_phone" maxlength="10"
                                minlength="10"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 allow-number-only"
                                placeholder="xxx-xxx-xxxx" />
                        </div>
                    </div>
                    <div>
                        <label for="type_car" class="block mb-2 text-sm font-medium text-gray-900">ประเภทรถ</label>
                        <select id="type_car" name="type_car"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                            <option selected value="0">ทั้งหมด</option>
                            <option value="1">รถเก๋ง, รถกระบะ 4 ประตู</option>
                            <option value="2">รถตู้, รถ 2 แถว</option>
                            <option value="3">รถกระบะ</option>
                            <option value="4">รถจักรยานยนต์</option>
                            
                        </select>
                    </div>
                    <div>
                        <label for="type_insurance"
                            class="block mb-2 text-sm font-medium text-gray-900">ประเภทประกัน</label>
                        <select id="type_insurance" name="type_insurance"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                            <option selected value="0">ทั้งหมด</option>
                            <option value="ป.1">ป.1</option>
                            <option value="ป.2+">ป.2+</option>
                            <option value="ป.3">ป.3</option>
                            <option value="ป.3+">ป.3+</option>
                        </select>
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
                    <button type="submit"
                        class="inline-flex items-center justify-center px-6 py-2 text-sm font-medium text-white bg-blue-500 border border-transparent rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <i class="fa-solid fa-magnifying-glass"></i>&nbsp;&nbsp;ค้นหา
                    </button>
                </div>
            </form>
        </div>
        <div class="bg-white drop-shadow-md p-4 rounded-none mb-2">
            <h1 class="text-xl font-semibold pb-3"><i class="fa-solid fa-bell"></i>&emsp;รายการแจ้งสนใจประกัน</h1>
            <div class="relative mt-2 overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs bg-slate-700 uppercase text-slate-50">
                        <tr class="whitespace-nowrap">
                            <th scope="col" class="px-4 py-3"></th>
                            <th scope="col" class="px-4 py-3">ชื่อ-นามสกุล</th>
                            <th scope="col" class="px-4 py-3">เบอร์โทรศัพท์</th>
                            <th scope="col" class="px-4 py-3">ประเภทรถ</th>
                            <th scope="col" class="px-4 py-3">ยี่ห้อรถ</th>
                            <th scope="col" class="px-4 py-3">ปีจดทะเบียน</th>
                            <th scope="col" class="px-4 py-3">ประเภทประกัน</th>
                            <th scope="col" class="px-4 py-3">วันที่แจ้ง</th>
                        </tr>
                    </thead>
                    <tbody id="rows-interested"></tbody>
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
            fetchInterested()
        });

        function fetchInterested() {
            $('#loading').removeClass('hidden');
            $.getJSON("fetch-interested",
                function (res) {
                    $('#loading').addClass('hidden');
                    console.log(res);

                    var el_data = [];
                    if (res.success) {
                        $.each(res.data, function (key, val) {
                            var type_car = '';
                            if (val.type_car == '1') {
                                type_car = 'รถเก๋ง, รถกระบะ 4 ประตู';
                            } else if (val.type_car == '2') {
                                type_car = 'รถตู้, รถ 2 แถว';
                            } else if (val.type_car == '3') {
                                type_car = 'รถกระบะ';
                            } else if (val.type_car == '4') {
                                type_car = 'รถจักรยานยนต์';
                            }
                            el_data += `<tr class="border-b whitespace-nowrap">
                            <td class="px-4 py-3">${key + 1}</td>
                            <td class="px-4 py-3">${val.customer_name}</td>
                            <td class="px-4 py-3">${val.customer_number_phone}</td>
                            <td class="px-4 py-3">${type_car}</td>
                            <td class="px-4 py-3">${val.car_brand}</td>
                            <td class="px-4 py-3">${val.reg_year}</td>
                            <td class="px-4 py-3">${val.type_insurance}</td>
                            <td class="px-4 py-3">${val.transaction_date}</td>
                            </tr>`;
                        });
                    }
                    if (res.error) {
                        el_data += `<tr><th class="text-center py-4" colspan="4">${res.msg}</th></tr>`;
                    }

                    $('#rows-interested').html(el_data);

                }
            );
        }

        $('#form-search-interested').submit(function(e) {
            e.preventDefault()
            e.preventDefault();
            var data = $(this).serialize();
            $('#loading').removeClass('hidden');
            $.post("search-interested", data,
                function (res) {
                    $('#loading').addClass('hidden');
                    var el_data = [];
                    if (res.success) {
                        $.each(res.data, function (key, val) {
                            var type_car = '';
                            if (val.type_car == '1') {
                                type_car = 'รถเก๋ง, รถกระบะ 4 ประตู';
                            } else if (val.type_car == '2') {
                                type_car = 'รถตู้, รถ 2 แถว';
                            } else if (val.type_car == '3') {
                                type_car = 'รถกระบะ';
                            } else if (val.type_car == '4') {
                                type_car = 'รถจักรยานยนต์';
                            }
                            el_data += `<tr class="border-b whitespace-nowrap">
                            <td class="px-4 py-3">${key+1}</td>
                            <td class="px-4 py-3">${val.customer_name}</td>
                            <td class="px-4 py-3">${val.customer_number_phone}</td>
                            <td class="px-4 py-3">${type_car}</td>
                            <td class="px-4 py-3">${val.car_brand}</td>
                            <td class="px-4 py-3">${val.reg_year}</td>
                            <td class="px-4 py-3">${val.type_insurance}</td>
                            <td class="px-4 py-3">${val.transaction_date}</td>
                            </tr>`;
                        });
                    }
                    if (res.error) {
                        el_data += `<tr><th class="text-center py-4" colspan="4">${res.msg}</th></tr>`;
                    }

                    $('#rows-interested').html(el_data);
                },
                "json"
            );
        })
    </script>
</body>

</html>