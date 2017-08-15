//Previews uploaded image on edit page
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#uppy').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#picInput").change(function () {
    readURL(this);
});

//Shows pw and em reset fields on click
$("#pwShow").click(function () {
    
    if ($("#pwreset").css("display") == "none") {
        $("#pwreset").slideDown(300);
    } else {
        $("#pwreset").slideUp(300);
    }

});

$("#emShow").click(function () {
    
    if ($("#emreset").css("display") == "none") {
        $("#emreset").slideDown(300);
    } else {
        $("#emreset").slideUp(300);
    }

});
