var pCount = $('#pcHolder > .pizzaCard').length;

$(document).ready(function () {
    if (pCount == 0) {
        $("#welcome").css("display", "block");
        
        $(".orderToggle").css("display", "none");
    }
});