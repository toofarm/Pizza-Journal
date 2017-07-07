var inputWdith = '350px';
var inputWdithReturn = '210px';
var w = $(window).width();



$('.navbar-form > .form-group > input').focus(function () {
        if (w > 769) {
            if ($(this).val() == 'Search pizza') {
                $(this).val('');
            }

            //animate the box
            $(this).animate({
                width: inputWdith
            }, 400)


    $('.navbar-form > .form-group > input').blur(function () {
            if ($(this).val() == '') {
                $(this).val('Search pizza');
            }

            $(this).animate({
                width: inputWdithReturn
            }, 500)
        });
        }
    });

