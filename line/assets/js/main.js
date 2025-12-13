function logout_admin() {
    Swal.fire({
        title: "ยืนยันการออกจากระบบ?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "ยืนยัน",
        cancelButtonText: "ยกเลิก"
    }).then((result) => {
        if (result.isConfirmed) {
            $.post('logout-admin', (res) => {
                if (res.success) {
                    AlertSuccess(res.msg);
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                }
            }, "json");
        }
    });
}