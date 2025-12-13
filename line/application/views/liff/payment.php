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
            <i class="fa-solid fa-money-bill"></i> ข้อมูลชำระเงิน
        </h1>
        <div class="py-3 text-lg"><i class="fa-solid fa-business-time"></i> วันเวลาทำรายการ : <span class="font-semibold" id="create_at"></span></div>
        <div class="space-y-4 rounded-lg border border-gray-100 bg-gray-50 p-6">
            <div class="space-y-2">
                <dl class="flex items-center justify-between gap-4">
                    <dt class="text-base font-normal text-gray-500">ตรวจสภาพรถ</dt>
                    <dd class="text-base font-medium text-gray-900" id="car_check_price">0.00</dd>
                </dl>

                <dl class="flex items-center justify-between gap-4">
                    <dt class="text-base font-normal text-gray-500">ภาษี</dt>
                    <dd class="text-base font-medium text-gray-900" id="tax_price">0.00</dd>
                </dl>

                <dl class="flex items-center justify-between gap-4">
                    <dt class="text-base font-normal text-gray-500">พ.ร.บ.</dt>
                    <dd class="text-base font-medium text-gray-900" id="act_price">0.00</dd>
                </dl>

                <dl class="flex items-center justify-between gap-4">
                    <dt class="text-base font-normal text-gray-500">ประกันภัย</dt>
                    <dd class="text-base font-medium text-gray-900" id="insurance_total">0.00</dd>
                </dl>
            </div>

            <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2">
                <dt class="text-base font-bold text-gray-900">รวม</dt>
                <dd class="text-base font-bold text-gray-900" id="amount_installment">0.00</dd>
            </dl>
        </div>
        <div>
            <button onclick="window.location.href = '<?=base_url('profile')?>'"
                class="w-full bg-sky-900 text-white rounded-lg p-3 mt-3"><i class="fa-solid fa-circle-left"></i> กลับ</button>
        </div>
    </section>
    <script src="<?= base_url('assets/js/func.js?v=') . rand() ?>"></script>
    <script>
        const liffId = '2006839693-AqbyWmkK';
        let userId = '';
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
                    $('#loading').addClass('hidden')
                    userId = profile.userId
                    getMemberInfo(userId)
                })
            })
        }

        function getMemberInfo(userId) {
            $('#loading').removeClass('hidden');
            $.post("get-member-info-by-uid", { 'uid': userId }, function (res) {
                console.log(res);
                $('#loading').addClass('hidden');
                if (res.success) {
                    $('#amount_installment').html(formatToThaiBaht(res.data[0].amount_installment))
                    $('#car_check_price').html(formatToThaiBaht(res.data[0].car_check_price))
                    $('#tax_price').html(formatToThaiBaht(res.data[0].tax_price))
                    $('#act_price').html(formatToThaiBaht(res.data[0].act_price))
                    $('#insurance_total').html(formatToThaiBaht(res.data[0].insurance_total))
                    $('#create_at').html(res.data[0].create_at)
                }else{

                }
            },
                "json"
            );
        }
    </script>
</body>

</html>