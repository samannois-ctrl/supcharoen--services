<section class="sticky top-0 z-10">
    <nav class="bg-white border-gray-200 drop-shadow-md">
        <div class="max-w-screen-xl px-3 xl:px-0 flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center space-x-3">
                <img src="https://img.icons8.com/external-tal-revivo-solid-tal-revivo/100/external-motor-car-insurance-by-private-company-isolated-on-white-background-protection-solid-tal-revivo.png"
                    class="h-10" alt="Logo" />
                <span class="self-center text-3xl font-semibold whitespace-nowrap">ตรอ. ทรัพย์เจริญเซอร์วิส</span>
            </a>
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0">
                <button type="button"
                    class="flex text-sm cursor-pointer md:space-x-3 items-center rounded-full md:me-0 md:pr-3 pr-0 focus:ring-2 focus:ring-slate-300"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-10 h-10 rounded-full" src="https://i.pravatar.cc/300?img=15" alt="user photo">
                    <span
                        class="md:block text-gray-900 hidden font-semibold truncate"><?= $this->session->admin_info->username ?></span>
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-none shadow-sm"
                    id="user-dropdown">
                    <ul class="py-2" aria-labelledby="user-menu-button">

                        <li>
                            <a href="#" class="block px-6 py-2 text-sm text-gray-700 hover:bg-gray-100"><i
                                    class="fa-solid fa-pen-to-square"></i>&emsp;แก้ไขข้อมูลส่วนตัว</a>
                        </li>
                        <li>
                            <a href="#" onclick="logout_admin()"
                                class="block px-6 py-2 text-sm text-gray-700 hover:bg-gray-100"><i
                                    class="fa-solid fa-power-off"></i>&emsp;ออกจากระบบ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Menu Bar -->
    <div class="flex space-x-3 max-w-screen-xl px-3 xl:px-0 overflow-x-auto mx-auto bg-gray-50 py-4">
        <!-- Class Active :: text-white bg-slate-700 hover:bg-slate-800  -->
        <!-- Class Base :: text-slate-700 border-slate-700 border hover:text-white hover:bg-slate-800 -->
        <div>
            <a href="<?= base_url('reply-message') ?>"
                class="whitespace-nowrap rounded-none <?= $this->session->page_name == 'REPLY' ? 'text-white bg-slate-700 hover:bg-slate-800' : 'text-slate-700 border-slate-700 border hover:text-white hover:bg-slate-800' ?> focus:ring-2 focus:outline-none focus:ring-slate-300 font-medium text-sm px-5 py-2.5 text-center inline-flex items-center"><i class="fa-solid fa-comments"></i>&emsp;จัดการข้อความตอบกลับ</a>
        </div>
        <div>
            <a href="<?= base_url('manage-renew') ?>"
                class="whitespace-nowrap rounded-none <?= $this->session->page_name == 'RENEW' ? 'text-white bg-slate-700 hover:bg-slate-800' : 'text-slate-700 border-slate-700 border hover:text-white hover:bg-slate-800' ?> focus:ring-2 focus:outline-none focus:ring-slate-300 font-medium text-sm px-5 py-2.5 text-center inline-flex items-center"><i class="fa-solid fa-bell"></i>&emsp;รายการแจ้งต่ออายุ</a>
        </div>
        <div>
            <a href="<?= base_url('manage-interested') ?>"
                class="whitespace-nowrap rounded-none <?= $this->session->page_name == 'INTERESTED' ? 'text-white bg-slate-700 hover:bg-slate-800' : 'text-slate-700 border-slate-700 border hover:text-white hover:bg-slate-800' ?> focus:ring-2 focus:outline-none focus:ring-slate-300 font-medium text-sm px-5 py-2.5 text-center inline-flex items-center"><i class="fa-solid fa-car-on"></i>&emsp;รายการแจ้งสนใจประกัน</a>
        </div>
        <div>
            <a href="<?= base_url('manage-member') ?>"
                class="whitespace-nowrap rounded-none <?= $this->session->page_name == 'MEMBER' ? 'text-white bg-slate-700 hover:bg-slate-800' : 'text-slate-700 border-slate-700 border hover:text-white hover:bg-slate-800' ?> focus:ring-2 focus:outline-none focus:ring-slate-300 font-medium text-sm px-5 py-2.5 text-center inline-flex items-center"><i class="fa-solid fa-user-group"></i>&emsp;จัดการสมาชิก</a>
        </div>
        <?php if ($this->session->admin_info->type_id != 2): ?>
            <div>
                <a href="<?= base_url('manage-admin') ?>"
                    class="whitespace-nowrap rounded-none <?= $this->session->page_name == 'ADMIN' ? 'text-white bg-slate-700 hover:bg-slate-800' : 'text-slate-700 border-slate-700 border hover:text-white hover:bg-slate-800' ?> focus:ring-2 focus:outline-none focus:ring-slate-300 font-medium text-sm px-5 py-2.5 text-center inline-flex items-center"><i class="fa-solid fa-user-shield"></i>&emsp;จัดการพนักงาน</a>
            </div>
        <?php endif; ?>
        <div>
            <a href="<?= base_url('manual') ?>" target="_blank" class="whitespace-nowrap rounded-none text-slate-700 border-slate-700 border hover:text-white hover:bg-slate-800 focus:ring-2 focus:outline-none focus:ring-slate-300 font-medium text-sm px-5 py-2.5 text-center inline-flex items-center"><i class="fa-solid fa-book"></i>&emsp;คู่มือการใช้งาน</a>
        </div>





    </div>
</section>