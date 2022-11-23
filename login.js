function open_popup() {
    $(".popup").addClass('open');
    $(".popup-box").slideDown();
}

function close_popup() {
    $('.popup-box').slideUp();
    $(".popup").delay(0.5);
    $(".popup").removeClass('open');
}
$("#login-signup").on('click', open_popup);
$(".close-popup").on('click', close_popup);
