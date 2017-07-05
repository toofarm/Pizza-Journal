var w = $(window).width();
var str = 'Email address';

$('#em').focus(function () {
    if (w > 1025 && $('textarea').css('display') == 'none') {
        $('textarea').slideDown(1000);
    

    $('.emMessage').blur(function () {
        if ($('#em').val() == '') { $('textarea').slideUp(1000);
        }
    });
        }
});




$('#send').click(function () {
    if ($('#em').is(':valid')) {
        $('#sent').css("display", "block");
        console.log('Sent!');
    }
});
