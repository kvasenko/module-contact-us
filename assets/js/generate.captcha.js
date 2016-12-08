define(['jquery'], function($) {
    $('body').on('click', '.generateCaptcha', function() {
        $.get($(this).attr('href'), function(html) {
            var captcha = $(html).find('.captcha').text();
            $('.captcha').text(captcha);
        }, 'html');
        return false;
    });
});