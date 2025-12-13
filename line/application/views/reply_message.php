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
        <div class="bg-white drop-shadow-md p-4 hidden rounded mb-5 relative" id="box-keyword">
            <span class="absolute top-0 right-0 px-3 py-1 text-sm cursor-pointer bg-red-600 text-white"
                onclick="close_box_keyword()">x ปิด</span>
            <h1 class="text-xl font-semibold pb-3">จัดการคีย์เวิร์ด</h1>
            <button type="button" data-modal-target="add-keyword-modal" data-modal-toggle="add-keyword-modal"
                id="btn-add-keyword"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded text-sm px-5 py-2.5 me-2 mb-2"><i
                    class="fa-solid fa-plus"></i> เพิ่มคีย์เวิร์ด</button>

            <ul class="space-y-2 text-slate-900 list-disc list-inside md:grid-cols-4 grid grid-cols-2"
                id="list-keyword"></ul>
        </div>

        <div class="bg-white drop-shadow-md p-4 rounded-none">
            <h1 class="text-xl font-semibold pb-3">จัดการข้อความตอบกลับ</h1>
            <button type="button" data-modal-target="add-reply-modal" data-modal-toggle="add-reply-modal"
                class="focus:outline-none text-white cursor-pointer bg-green-700 hover:bg-green-800 focus:ring-2 focus:ring-green-300 font-medium rounded-none text-sm px-5 py-2.5 me-2 mb-2"><i
                    class="fa-solid fa-plus"></i> เพิ่มข้อความตอบกลับ</button>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs bg-slate-700 uppercase text-slate-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ลำดับ
                            </th>
                            <th scope="col" class="px-6 py-3">
                                หัวข้อ
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ข้อความ
                            </th>
                            <th scope="col" class="px-6 py-3">
                                คีย์เวิร์ด
                            </th>
                            <th scope="col" class="px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody id="list-answer"></tbody>
                </table>
            </div>
        </div>
    </main>

    <?php require_once APPPATH . 'views/modal/reply_message.php'; ?>

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
            fetchReplyMessage()
        });

        function fetchReplyMessage() {
            $.getJSON("fetch-answer",
                function (res) {
                    console.log(res);

                    if (res.error) {
                        el = `<tr><th class="text-center py-4" colspan="5">${res.msg}</th></tr>`;
                        $('#list-answer').html(el);
                    }
                    if (res.success) {
                        var el = [];
                        $.each(res.data, function (key, val) {
                            if (val.answer_type === '1') {
                                var answer = val.answer;
                                var btn_edit = `onclick="edit_reply('${val.answer_id}')"`;
                            } else {
                                var src = `<?= base_url() ?>uploads/${val.answer}`;
                                var answer = `<img class="w-1/2" src="${src}" />`;
                                var btn_edit = `onclick="edit_img_reply('${val.answer_id}')"`;
                            }
                            el += `<tr class="bg-white border-b border-gray-200">
                                <td class="px-6 py-4 font-medium text-gray-900 max-w-64">${key+1}</td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                ${val.answer_title}
                            </th>
                            <td class="px-6 py-4 font-medium text-gray-900 max-w-64">${answer}</td>
                            <td class="px-6 py-4">
                                <span onclick="see_keyword('${val.answer_id}')" class="text-blue-600 cursor-pointer font-semibold underline">${val.count_question}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="#" onclick="del_reply('${val.answer_id}')" class="text-red-600 font-semibold hover:underline"><i class="fa-solid fa-trash-can"></i>
                                    ลบ</a> | <a href="#" ${btn_edit} class="text-yellow-600 font-semibold hover:underline"><i class="fa-solid fa-pen-to-square"></i> แก้ไข</a>
                            </td>
                        </tr>`;
                        })
                        $('#list-answer').html(el);
                    }

                }
            );
        }

        function see_keyword(answer_id) {
            $.post("get-question-answer", { 'answer_id': answer_id },
                function (res) {
                    $('#btn-add-keyword').attr('onclick', `addKeyword('${answer_id}')`)
                    var el = [];

                    $.each(res.data, function (key, val) {
                        el += `<li><span class="bg-slate-100 text-slate-800 font-medium me-2 px-2.5 py-0.5 rounded-sm">${val.question}</span> <a href="#" onclick="del_keyword('${val.question_id}','${answer_id}')" class="text-red-600"><i class="fa-solid fa-xmark"></i></a></li>`;
                    });
                    $('#list-keyword').html(el);
                    $('#box-keyword').removeClass('hidden')
                    window.scrollTo(0, 0);
                },
                "json"
            );
        }

        function addKeyword(answer_id) {
            $('#answer-id-key').val(answer_id)
        }

        function close_box_keyword() {
            $('#box-keyword').addClass('hidden')
        }

        $('#form-add-keyword').submit(function (e) {
            e.preventDefault();
            $('#loading').removeClass('hidden');
            $.post("add-keyword", $(this).serialize(),
                function (res) {
                    if (res.error_from) {
                        $('#keyword_error').html(res.keyword_error)
                    }

                    if (res.success) {
                        $('#form-add-keyword')[0].reset()
                        close_modal('add-keyword-modal')
                        see_keyword(res.answer_key_id)
                        $('#loading').addClass('hidden');
                    }
                },
                "json"
            );
        });

        function del_keyword(keyword_id, answer_id) {
            Swal.fire({
                title: "ยืนยันการลบคีย์เวิร์ด",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "ยืนยัน",
                cancelButtonText: "ยกเลิก"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#loading').removeClass('hidden');
                    $.post('del-keyword', { 'question_id': keyword_id }, (res) => {
                        if (res.success) {
                            $('#loading').addClass('hidden');
                            if (res.success) {
                                AlertSuccess(res.msg);
                                setTimeout(() => {
                                    see_keyword(answer_id)
                                }, 1000);
                            }

                            if (res.error) {
                                AlertError(res.msg);
                            }
                        }
                    }, "json");
                }
            });
        }

        $('#form-add-reply-message').on('submit', function (e) {
            e.preventDefault();
            var form = document.getElementById('form-add-reply-message');
            var formData = new FormData(form);
            Swal.fire({
                title: "ยืนยันการเพิ่มข้อความตอบกลับ",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "ยืนยัน",
                cancelButtonText: "ยกเลิก"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: 'add-reply-message',
                        data: new FormData(this),
                        dataType: 'json',
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function () {
                            $('#loading').removeClass('hidden');
                        },
                        success: function (res) {
                            $('#loading').addClass('hidden');
                            if (res.success) {
                                AlertSuccess(res.msg)
                                setTimeout(() => {
                                    window.location.reload()
                                }, 1500);
                            }
                            if (res.error) {
                                AlertError(res.msg)
                            }
                        }
                    });
                }
            });
        });

        function edit_reply(answer_id) {
            $.post("get-reply-message", { 'answer_id': answer_id },
                function (res) {
                    $('#answer_title_edit').val(res.data[0].answer_title)
                    $('#answer_edit').val(res.data[0].answer)
                    $('#box-answer-id').html(`<input type="hidden" name="answer_id_edit" value="${answer_id}">`)
                    $('#edit-reply-modal').removeClass('hidden')
                },
                "json"
            );
        }

        function edit_img_reply(answer_id) {
            $.post("get-reply-message", { 'answer_id': answer_id },
                function (res) {
                    $('#box-answer-id-img').html(`<input type="hidden" name="answer_id_edit" value="${answer_id}">`)
                    var src = '<?= base_url() ?>' + `uploads/${res.data[0].answer}`;
                    $('#img-answer').prop('src', src)
                    $('#edit-img-reply-modal').removeClass('hidden')
                },
                "json"
            );
        }

        $('#form-edit-reply-message').submit(function (e) {
            e.preventDefault();
            Swal.fire({
                title: "ยืนยันการแก้ไขข้อความตอบกลับ",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "ยืนยัน",
                cancelButtonText: "ยกเลิก"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#loading').removeClass('hidden');
                    $.post('update-reply-message', $(this).serialize(), (res) => {
                        if (res.success) {
                            $('#loading').addClass('hidden');
                            if (res.success) {
                                AlertSuccess(res.msg);
                                setTimeout(() => {
                                    window.location.reload()
                                }, 1500);
                            }

                            if (res.error) {
                                AlertError(res.msg);
                            }
                        }
                    }, "json");
                }
            });
        });

        $('#form-edit-img-reply-message').on('submit', function (e) {
            e.preventDefault();
            var form = document.getElementById('form-edit-img-reply-message');
            var formData = new FormData(form);
            Swal.fire({
                title: "ยืนยันการแก้ไขรูปภาพตอบกลับ",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "ยืนยัน",
                cancelButtonText: "ยกเลิก"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: 'update-img-reply-message',
                        data: new FormData(this),
                        dataType: 'json',
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function () {
                            $('#loading').removeClass('hidden');
                        },
                        success: function (res) {
                            $('#loading').addClass('hidden');
                            if (res.success) {
                                AlertSuccess(res.msg)
                                setTimeout(() => {
                                    window.location.reload()
                                }, 1500);
                            }
                            if (res.error) {
                                AlertError(res.msg)
                            }
                        }
                    });
                }
            });
        });

        function del_reply(answer_id) {
            Swal.fire({
                title: "ยืนยันการลบคีย์เวิร์ด",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "ยืนยัน",
                cancelButtonText: "ยกเลิก"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#loading').removeClass('hidden');
                    $.post('del-reply-message', { 'answer_id': answer_id }, (res) => {
                        if (res.success) {
                            $('#loading').addClass('hidden');
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

        function choose_answer_type(type) {
            var el = [];
            if (type === '1') {
                el += `<label for="answer"
                                class="block mb-2 text-sm font-medium text-gray-900">ข้อความตอบกลับ</label>
                            <textarea id="answer" rows="4" name="answer"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="เขียนข้อความตอบกลับ"></textarea>`;
            }

            if (type === '2') {

                el += `<label class="block mb-2 text-sm font-medium text-gray-900" for="fileSlip">เลือกรูปภาพ</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="fileSlip" name="fileSlip" type="file" onchange="document.getElementById('imgPreview').src = window.URL.createObjectURL(this.files[0])">
                <img class="mt-2 md:w-1/2" id="imgPreview">`;
            }

            $('#box-answer').html(el)
        }

    </script>
</body>

</html>