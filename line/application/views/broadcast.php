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
        <pre id="output"></pre>
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
        fetch('uploads/month.txt?v=<?= rand() ?>') // Change to your file path
            .then(response => response.text())
            .then(text => {
                document.getElementById('output').textContent = text;
            })
            .catch(error => console.error('Error loading file:', error));
    </script>
</body>

</html>