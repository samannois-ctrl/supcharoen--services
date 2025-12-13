<!-- Main modal -->
<div id="add-admin-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">
                    เพิ่มแอดมิน
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-toggle="add-admin-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form id="form-add-admin" class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2 sm:col-span-1">
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">ชื่อ</label>
                        <input type="text" name="first_name" id="first_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-600 focus:border-slate-600 block w-full p-2.5"
                            placeholder="กรอกชื่อ" required="">
                        <span id="first_name_error"></span>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">นามสกุล</label>
                        <input type="text" name="last_name" id="last_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-600 focus:border-slate-600 block w-full p-2.5"
                            placeholder="กรอกนามสกุล" required="">
                        <span id="last_name_error"></span>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900">ชื่อผู้ใช้</label>
                        <input type="text" name="username" id="username" minlength="4" maxlength="16"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-600 focus:border-slate-600 block w-full p-2.5"
                            placeholder="กรอกชื่อผู้ใช้" required="">
                        <span id="username_error"></span>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">รหัสผ่าน</label>
                        <input type="password" name="password" id="password" minlength="8" maxlength="16"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-600 focus:border-slate-600 block w-full p-2.5"
                            placeholder="กรอกรหัสผ่าน" required="">
                        <span id="password_error"></span>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="phone_number"
                            class="block mb-2 text-sm font-medium text-gray-900">เบอร์โทรศัพท์</label>
                        <input type="tel" name="phone_number" id="phone_number" minlength="10" maxlength="10"
                            class="bg-gray-50 border border-gray-300 allow-number-only text-gray-900 text-sm rounded-lg focus:ring-slate-600 focus:border-slate-600 block w-full p-2.5"
                            placeholder="กรอกเบอร์โทรศัพท์" required="">
                        <span id="phone_number_error"></span>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="type_id" class="block mb-2 text-sm font-medium text-gray-900">ประเภทแอดมิน</label>
                        <select id="type_id" name="type_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5">
                            <option selected="true" disabled="disabled">เลือกประเภทแอดมิน</option>
                            <option value="1">ผู้จัดการ</option>
                            <option value="2">พนักงาน</option>
                        </select>
                    </div>
                </div>
                <button type="submit"
                    class="text-white bg-green-700 hover:bg-green-800 cursor-pointer focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-none text-sm px-5 py-2.5 text-center">
                    <i class="fa-solid fa-plus"></i>&nbsp;
                    เพิ่มแอดมินใหม่
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Set Password modal -->
<div class="fixed top-0 hidden z-50 w-full" id="setPasswordAdminModal">
    <div class="flex space-x-2 justify-center items-center h-screen bg-[#1d1d1daa]">
        <div class="bg-white w-3/4 md:w-1/2">
            <h3 class="text-lg bg-slate-700 p-3 font-semibold text-slate-50">
                เปลี่ยนรหัสผ่าน
            </h3>
            <form class="space-y-4 p-4 md:p-5" id="form-reset-password">
                <div id="admin-info"></div>
                <hr>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">รหัสผ่าน</label>
                    <input type="password" name="reset_password" id="reset_password" minlength="8" maxlength="16"
                        placeholder="ป้อนรหัสผ่านใหม่"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required />
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">ยืนยันรหัสผ่าน</label>
                    <input type="password" name="re_password" id="re_password" minlength="8" maxlength="16"
                        placeholder="ป้อนรหัสผ่านอีกครั้ง"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required />
                </div>
                <hr>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">รหัสผ่านแอดมิน</label>
                    <input type="password" name="password_admin" id="password_admin" minlength="8" maxlength="16"
                        placeholder="รหัสผ่านแอดมิน"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required />
                </div>
                <div class="space-x-3">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                        <i class="fa-solid fa-square-plus"></i>
                        บันทึกข้อมูล
                    </button>
                    <button onclick="document.getElementById('setPasswordAdminModal').classList.add('hidden')"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer"
                        type="button"><i class="fa-solid fa-rectangle-xmark"></i> ปิด</button>
                </div>

            </form>
        </div>
    </div>
</div>