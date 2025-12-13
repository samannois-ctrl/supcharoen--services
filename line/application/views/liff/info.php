<!DOCTYPE html>
<html lang="en">
<?php require_once APPPATH . 'views/liff/head.php'; ?>

<body class="bg-sky-100">
    <?php require_once APPPATH . 'views/components/loading.php'; ?>
    <section class="max-w-screen-xl px-4 xl:px-0 mx-auto my-8">
        <div>
            <p onclick="window.location.href = '<?= base_url('profile') ?>'" class="text-xl"><i class="fa-solid fa-chevron-left"></i></p>
            <p class="text-center text-lg font-semibold">โปรไฟล์ของคุณ</p>
        </div>
        <div>
            <div class="my-5">
                <img class="w-24 mx-auto rounded-full bg-white p-[2px]" id="img_profile" />
                <p class="font-bold text-center text-xl" id="display_name"></p>
            </div>
            <div class="space-y-4 rounded-lg border border-gray-100 bg-gray-50 p-6">
                <div class="space-y-2">
                    <p>ชื่อ-นามสกุล</p>
                    <dl class="flex items-center justify-between gap-4">
                        <dd class="text-base font-medium text-gray-900" id="name-member"></dd>
                        <dt class="text-base font-normal text-gray-500"><i class="fa-solid fa-pen-to-square"></i></dt>
                    </dl>
                    <br>
                    <dl class="flex items-center justify-between gap-4">
                        <dt class="text-base font-normal text-gray-500">เบอร์โทรศัพท์</dt>
                        <dd class="text-base font-medium text-gray-900" id="phone_number"></dd>
                    </dl>
                </div>
            </div>
        </div>
    </section>
    <script src="<?= base_url('assets/js/func.js?v=') . rand() ?>"></script>
    <script>
        const liffId = '2006839693-G89PWOjK';
        let userId = '';
        let displayName = '';
        $(document).ready(function () {
            $('#loading').removeClass('hidden')
            main()
        });

        function main() {
            liff.init({ liffId: liffId });
            liff.ready.then(() => {
                if (!liff.isLoggedIn()) {
                    liff.login();
                }
                liff.getProfile().then(profile => {
                    $('#display_name').html(profile.displayName);
                    $('#img_profile').prop('src', profile.pictureUrl)
                    $('#loading').addClass('hidden')
                    userId = profile.userId
                    displayName = profile.displayName
                    getMemberInfo(userId)
                })
            })
        }

        function getMemberInfo(userId) {
            $('#loading').removeClass('hidden');
            $.post("get-member-info", { 'uid': userId }, function (res) {
                $('#loading').addClass('hidden');
                var name_member = (res.first_name ? res.first_name : '') + ' ' + (res.last_name ? res.last_name : '');
                $('#name-member').html(name_member)
                $('#phone_number').html(res.phone_number)
            },
                "json"
            );
        }
    </script>
</body>

</html>