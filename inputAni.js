var inputWdith = '350px';
var inputWdithReturn = '210px';
var w = $(window).width();



$('input').focus(function () {
        if (w > 769) {
            if ($(this).val() == 'Search pizza') {
                $(this).val('');
            }

            //animate the box
            $(this).animate({
                width: inputWdith
            }, 400)


    $('input').blur(function () {
            if ($(this).val() == '') {
                $(this).val('Search pizza');
            }

            $(this).animate({
                width: inputWdithReturn
            }, 500)
        });
        }
    });

