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

$(document).ready(function () {
    var url = window.location;
    $('ul.main_menu a[href="' + url + '"]').parent().addClass('sale-noti');
    $('ul.main_menu a').filter(function () {
        return this.href == url;
    }).parent().addClass('sale-noti');
});

$(document).ready(function () {
    var url = window.location;
    $('ul.main-menu a[href="' + url + '"]').parent().addClass('color-filter9');
    $('ul.main-menu a').filter(function () {
        return this.href == url;
    }).parent().addClass('color-filter9');
});

// $(document).ready(function () {
//     $('.custom-file-input').on('change', function () {
//         let fileName = $(this).val().split('\\').pop();
//         $(this).next('.custom-file-label').addClass("selected").html(fileName);
//     });
// });