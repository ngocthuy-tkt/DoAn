$(document).ready(function () {
    $('.dropdown-submenu').hover(function (e) {
        $(this).children('.menu-child').toggle();
    });
});
$('.update-qty').click(function () {
    var id = $(this).data('id');
    var qty = $('.qty-' + id).val();
    window.location = '/cart/update/' + id + '/' + qty;
});