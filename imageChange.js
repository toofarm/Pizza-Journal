function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#uppy').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#picInput").change(function(){
    readURL(this);
});

