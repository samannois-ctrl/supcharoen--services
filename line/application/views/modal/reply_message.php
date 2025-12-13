<!-- Add Reply modal -->
<div id="add-reply-modal" data-modal-backdrop="static" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">
                    เพิ่มข้อความตอบกลับ
                </h3>
            </div>
            <!-- Modal body -->
            <form id="form-add-reply-message" class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="answer_title" class="block mb-2 text-sm font-medium text-gray-900">หัวข้อ</label>
                        <input type="text" name="answer_title" id="answer_title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="ป้อนหัวข้อ" required="">
                        <span id="answer_title_error"></span>
                    </div>
                    <div class="col-span-2">
                        <label for="answer_type"
                            class="block mb-2 text-sm font-medium text-gray-900">ประเภทข้อความ</label>
                        <select id="answer_type" name="answer_type" onchange="choose_answer_type(this.value)"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option selected="" value="1">ข้อความ</option>
                            <option value="2">รูปภาพ</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="question" class="block mb-2 text-sm font-medium text-gray-900">คีย์เวิร์ด</label>
                        <input type="text" name="question" id="question"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="ป้อนคีย์เวิร์ด" required="">
                        <small class="text-red-400">** ใช้เครื่องหมาย , คั่นในกรณีมีหลายคีย์เวิร์ด</small>
                        <span id="question_error"></span>
                    </div>
                    <div class="col-span-2" id="box-answer">
                        <label for="answer" class="block mb-2 text-sm font-medium text-gray-900">ข้อความตอบกลับ</label>
                        <textarea id="answer" rows="4" name="answer"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="เขียนข้อความตอบกลับ"></textarea>
                    </div>
                </div>
                <div class="space-x-3">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                        <i class="fa-solid fa-square-plus"></i>
                        บันทึกข้อมูล
                    </button>
                    <button data-modal-hide="add-reply-modal"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-2 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer"
                        type="button"><i class="fa-solid fa-rectangle-xmark"></i> ปิด</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Add Keyword modal -->
<div id="add-keyword-modal" data-modal-backdrop="static" tabindex="-1" 
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">
                    เพิ่มคีย์เวิร์ด
                </h3>
            </div>
            <!-- Modal body -->
            <form id="form-add-keyword" class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="keyword" class="block mb-2 text-sm font-medium text-gray-900">คีย์เวิร์ด</label>
                        <input type="text" name="keyword" id="keyword"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="ป้อนคีย์เวิร์ด" required="">
                        <span id="keyword_error"></span>
                    </div>
                </div>
                <input type="hidden" name="answer_key_id" id="answer-id-key">
                <div class="space-x-3">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                        <i class="fa-solid fa-plus"></i>
                        บันทึก
                    </button>
                    <button data-modal-hide="add-keyword-modal"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer"
                        type="button"><i class="fa-solid fa-xmark"></i> ปิด</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Edit Reply modal -->
<div class="fixed top-0 hidden z-50 w-full" id="edit-reply-modal">
    <div class="flex space-x-2 justify-center items-center h-screen bg-[#1d1d1daa]">
        <div class="bg-white w-3/4 md:w-1/2">
            <h3 class="text-lg bg-slate-700 p-3 font-semibold text-slate-50">
                แก้ไขข้อความตอบกลับ
            </h3>
            <form id="form-edit-reply-message" class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="answer_title_edit"
                            class="block mb-2 text-sm font-medium text-gray-900">หัวข้อ</label>
                        <input type="text" name="answer_title_edit" id="answer_title_edit"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="ป้อนหัวข้อ" required="">
                        <span id="answer_title_edit_error"></span>
                    </div>
                    <div id="box-answer-id"></div>
                    <div class="col-span-2">
                        <label for="answer_edit"
                            class="block mb-2 text-sm font-medium text-gray-900">ข้อความตอบกลับ</label>
                        <textarea id="answer_edit" rows="6" name="answer_edit"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="เขียนข้อความตอบกลับ"></textarea>
                    </div>
                </div>
                <div class="space-x-3">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                        <i class="fa-solid fa-square-plus"></i>
                        บันทึกข้อมูล
                    </button>
                    <button onclick="document.getElementById('edit-reply-modal').classList.add('hidden')"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer"
                        type="button"><i class="fa-solid fa-rectangle-xmark"></i> ปิด</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Img Reply modal -->
<div class="fixed top-0 hidden z-50 w-full" id="edit-img-reply-modal">
    <div class="flex space-x-2 justify-center items-center h-screen bg-[#1d1d1daa]">
        <div class="bg-white w-3/4 md:w-1/2">
            <h3 class="text-lg bg-slate-700 p-3 font-semibold text-slate-50">
                แก้ไขรูปภาพตอบกลับ
            </h3>
            <form id="form-edit-img-reply-message" class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-cols-2">

                    <div id="box-answer-id-img"></div>
                    <div class="col-span-2">
                        <img class="w-1/2 mx-auto" id="img-answer">
                    </div>
                    <div class="col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900"
                            for="fileSlipEdit">เลือกรูปภาพ</label>
                        <input
                            onchange="document.getElementById('img-answer').src = window.URL.createObjectURL(this.files[0])"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                            id="fileSlipEdit" name="fileSlipEdit" type="file">

                    </div>
                </div>
                <div class="space-x-3">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                        <i class="fa-solid fa-square-plus"></i>
                        บันทึกข้อมูล
                    </button>
                    <button type="reset" onclick="document.getElementById('edit-img-reply-modal').classList.add('hidden')"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer"
                        ><i class="fa-solid fa-rectangle-xmark"></i> ปิด</button>
                </div>
            </form>
        </div>
    </div>
</div>