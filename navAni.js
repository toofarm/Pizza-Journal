var w = $(window).width();

function navResize() {
    if (w > 767) {
        if ($(document).scrollTop() > 192) {
            $('#navSmall').slideDown(200);
        };

        if ($('#navSmall').css("display") === 'block' && $(document).scrollTop() < 190) {
            $('#navSmall').slideUp();
            console.log('pizza pie');
        };

    }

};

navResize();

$(window).resize(function () {
    w = $(window).width();
    navResize();
});

$(window).scroll(function () {
    w = $(window).width();
    navResize();
    console.log($(document).scrollTop());
});

//Contact page animation
$('#emTrigger').click(function () {
    if ($('#em').css('display') == 'none') {
        $('#em').show(400);
    } else {
        $('#em').hide(400);
    }
});
