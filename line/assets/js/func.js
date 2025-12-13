$(".allow-number-only").on("keypress keyup blur", function (event) {
    $(this).val($(this).val().replace(/[^\d].+/, ""));
    if ((event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }
});

function AlertSuccess(msg) {
    Swal.fire({
        position: "top-end",
        icon: "success",
        title: msg,
        showConfirmButton: false,
        timer: 1500
    });
}

function AlertError(msg) {
    Swal.fire({
        position: "center",
        icon: "error",
        title: msg,
        showConfirmButton: false,
        timer: 1500
    });
}

function Goto(route) {
    window.location.href = route;
}

function show_modal(idModal) {
    const modal = new Modal(document.getElementById(idModal))
    modal.show()
}

function close_modal(idModal) {
    const modal = new Modal(document.getElementById(idModal))
    modal.hide()
}

function Alert(msg,action) {
    Swal.fire({
        title: msg,
        icon: action
    });
}


function formatToThaiBaht(amount) {
    return parseFloat(amount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') ;
}