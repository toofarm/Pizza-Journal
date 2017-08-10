var w = $(window).width();
var scrollBottom = $(document).height() - ($(window).height() + $('body').scrollTop());
var pCount = $('#pcHolder > .pizzaCard').length;

function navResize() {
    if (w > 767) {
        if ($(document).scrollTop() > 192) {
            $('#navSmall').slideDown(200);
        };

        if ($('#navSmall').css("display") === 'block' && $(document).scrollTop() < 190) {
            $('#navSmall').slideUp();
        };

    }

    //This bit makes the profile bar sticky on scroll
    if (w > 1230 && $("#welcome").css("display") == "none") {

        if ($(window).scrollTop() > 176) {
            $(".profile").css("position", "fixed").animate({
                top: "75px"
            });
            $(".cardCol").removeClass("col-lg-push-1").addClass("col-lg-push-4");
        }

        if ($(".profile").css("position") == "fixed" && $(window).scrollTop() < 176) {

            $(".profile").stop(true, true).animate({
                top: "0px"
            }).css("position", "relative");

            $(".cardCol").removeClass("col-lg-push-4").addClass("col-lg-push-1");
        }


        if ($(".profile").css("position") == "fixed" && scrollBottom < 190) {
            $(".profile").stop(true, true).animate({
                top: "-175px"
            });

        }

        if ($('.emMessage').css('display') == "inline-block") {
            if (scrollBottom < 100) {
                $(".profile").stop(true, true).animate({
                    top: "-375px"
                });
            }
        }

    }

};

navResize();

$(window).resize(function () {
    w = $(window).width();
    navResize();
});

$(window).scroll(function () {
    w = $(window).width();
    scrollBottom = $(document).height() - ($(window).height() + $('body').scrollTop());
    navResize();
});

//Contact page animation
$('#emTrigger').click(function () {
    if ($('#em').css('display') == 'none') {
        $('#em').show(400);
    } else {
        $('#em').hide(400);
    }
});

//    Mobile nav slidedown

$("#navMobile").click(function () {
    
    console.log("what is happening here?");

    //        if (w < 480) {
        if ($("#mob-nav-dropdown").css("display") == "none") {
            $("#navLarge").animate({height: "340px"}, 400);
                
            $("#navMobile > i").css("color", "#ddd");
                
            $("#mob-nav-dropdown").slideDown(400);
 
        } else {
            $("#navLarge").animate({height: "200px"}, 400);
                
            $("#mob-nav-dropdown").slideUp(400);
                
            $("#navMobile > i").css("color", "white");
        }
//        }
});
