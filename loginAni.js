$('#login > h1').click(function () {
    if ($("#loginBiz").css("display") == "none") {
        $('#loginBiz').slideDown(1000);
    } else {
        $('#loginBiz').slideUp(1000);
    }
});

$('#register > h1').click(function () {
    if ($("#regBiz").css("display") == "none") {
        $('#regBiz').slideDown(1000);
    } else {
        $('#regBiz').slideUp(1000);
    }
});

$('#landingFoot > h4').click(function () {
    if ($("#footCopy").css("display") == "none") {
        $('#footCopy').slideDown(1000);
    } else {
        $('#footCopy').slideUp(1000);
    }
});

