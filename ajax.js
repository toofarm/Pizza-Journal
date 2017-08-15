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
                    $("#pcHolder").append('<div class="pizzaCard" id="'+v.globeid+'"></div>');
                    
                    $("#p"+v.globeid"").append('<h2 class="pizzaTitle"> <span class="pizzaName">'+v.pizzaname+'</span><span class="pizzaScore">'+v.score+'/10</span></h2>');
                    
                    
                    $("#p"+v.globeid"").append('<div class="cardFlex"></div>');
                    
                    $(".cardFlex").append('<div><div class="pizzaPhoto"> <img src="'+$i+'" alt="Pizza!"></div><ul class="basics"><li class="restaurant"> '+v.restaurant+'</li><li class="date">'+v.date+'</li></ul></div>');
                    
                    
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