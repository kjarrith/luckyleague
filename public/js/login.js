$(document).on('focus', '.form-group :input', function() {
    $('.form-group').removeClass('focused');
    $(this).parents('.form-group').addClass('focused');
});

$(document).on('blur', '.form-group :input', function() {
    $(this).parents('.form-group').removeClass('focused');
});

$(document).on('click touchstart', '.login-nav.signup', function(e) {
    $('.login-nav').removeClass('selected');
    $(this).addClass('selected');
    $('.login-form').hide();
    $('.signup-form').show();
    $('.loginbody').css('min-height','950px');
});

$(document).on('click touchstart', '.login-nav.login', function(e) {
    $('.login-nav').removeClass('selected');
    $(this).addClass('selected');
    $('.signup-form').hide();
    $('.login-form').show();
    $('.loginbody').css('min-height','720px');
});