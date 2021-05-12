$(document).on("keydown", "#no_telp", function (e) {
    let keycode = e.keyCode || e.which;
    let teks = $(this).val();
    if (teks.length < 1) {
        if (keycode == 48) {
            return false;
        } else {
            return true;
        }
    } else {
        return true;
    }
});

// $(document).ready(function () {
//     $('.custom-file-input').on('change', function () {
//         let fileName = $(this).val().split('\\').pop();
//         $(this).next('.custom-file-label').addClass("selected").html(fileName);
//     });
// });