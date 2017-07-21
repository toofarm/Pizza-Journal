//This all has to be on your profile page because you'll have to populate the id portion with a PHP variable

$('document').ready(function () {
    
    function cardAdd() {
        $.ajax({
            url: "pcards.json",
            type: "get",
            dataType: "json",
            cache: false,
            error: function(data){
                console.log(data);
            },
            success: function(data){
                $.each(data, function(i, v) {
                    $("#pcHolder").append('<div class="pizzaCard" id='+v.globeid+'></div>');
                });
            },
        });
    };
    
});

    cardAdd();

    $("#pcForm").submit(function(e) {
        $(".pizzaCard").remove();
        var fd = new FormData($(this)[0]);
        $.ajax({
            url: "pcajaxprocess.php",
            type: "post",
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            success: function() {
                console.log('data sent');
            }
        });
        e.preventDefault();
    });