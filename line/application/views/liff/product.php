<!DOCTYPE html>
<html lang="en">
<?php require_once APPPATH . 'views/liff/head.php'; ?>

<body class="bg-sky-100">
    <?php require_once APPPATH . 'views/components/loading.php'; ?>
    <section class="max-w-screen-xl px-4 xl:px-0 mx-auto my-8">
        <div class="flex items-center justify-center py-5 space-x-3">
            <img src="https://img.icons8.com/external-tal-revivo-solid-tal-revivo/100/external-motor-car-insurance-by-private-company-isolated-on-white-background-protection-solid-tal-revivo.png"
                class="h-10" alt="Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap">ตรอ. ทรัพย์เจริญเซอร์วิส</span>
        </div>
        <h1
            class="my-3 text-sky-900 text-center text-xl font-semibold bg-white border-2 rounded-lg py-3 border-sky-900">
            <?= $title ?>
        </h1>
        <ul class="w-full font-medium text-sky-900 bg-white border border-gray-200 rounded-lg">
        <!-- <li class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg">Profile</li> -->
            <?php
            // print_r($data_insurance);
            
            foreach ($data_insurance as $insurance) : ?>
                
                <li class="w-full px-4 py-2 border-b border-gray-200"><?=$insurance->company_name?></li>
            <?php endforeach;?>
            <!-- <li class="w-full px-4 py-2 rounded-b-lg">Download</li> -->
        </ul>
        <div>
        <button onclick="window.location.href = '<?=base_url('interested')?>'" type="button"
            class="bg-[#ffffffc8] border-orange-500 rounded-xl text-xl font-semibold border-2 text-orange-500 my-5 w-full py-3 "><i class="fa-solid fa-circle-question"></i> สนใจประกัน</button>
            <button onclick="window.location.href = '<?=base_url('profile')?>'"
                class="w-full bg-sky-900 text-white rounded-lg p-3"><i class="fa-solid fa-circle-left"></i> กลับ</button>
        </div>
    </section>
    

</body>

</html>