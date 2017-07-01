var w = $(window).width();

function navResize() {
    if (w > 767) {
        if ($('body').scrollTop() > 192) {
            $('#navSmall').slideDown(200);
        };

        if ($('#navSmall').css("display") === 'block' && $('body').scrollTop() < 190) {
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
    console.log($('body').scrollTop());
});
