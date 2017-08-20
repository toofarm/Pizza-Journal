function resultsAdd() {
    $.ajax({
        url: "search.php",
        type: "get",
        dataType: "json",
        cache: false,
        error: function (data) {
            console.log(data);
        },
        success: function (data) {
            console.log("success!");
            $.each(data, function (i, v) {

                if (v.user == "<?php echo $u ?>") {
                    $("#pcHolder").prepend('<div class="pizzaCard" id="' + v.globeid + '" data-score="' + v.score + '" data-date="' + v.date + '"></div>');

                    $("#" + v.globeid + "").append('<h2 class="pizzaTitle"> <span class="pizzaName">' + v.pizzaname + '</span> - <span class="pizzaScore">' + v.score + '</span></h2>');


                    $("#" + v.globeid + "").append('<div class="cardFlex"></div>');

                    $("#" + v.globeid + " > .cardFlex").append('<div><div class="pizzaPhoto"> <img src="' + v.img + '" alt="Pizza!"></div><ul class="basics"><li class="restaurant"> ' + v.restaurant + '</li><li class="date">' + v.date + '</li></ul></div><div class="rankings"></div>');


                    //Cheese
                    $("#" + v.globeid + " > .cardFlex > .rankings").append("<h4>Cheese</h4><div class='rankBox'><div class='rankItem'><i id='greasy' class='fa fa-circle-o' aria-hidden='true'></i><p>Greasy</p></div><div class='rankItem'><i id='stringy' class='fa fa-circle-o' aria-hidden='true'></i><p>Stringy</p></div><div class='rankItem'><i id='salty' class='fa fa-circle-o' aria-hidden='true'></i><p>Salty</p></div><div class='rankItem'><i id='creamy' class='fa fa-circle-o' aria-hidden='true'></i><p>Creamy</p></div></div>");

                    if (v.cheese.indexOf("greasy") > -1) {
                        $("#" + v.globeid + " " + "#greasy").removeClass("fa-circle-o").addClass("fa-circle");
                    } else if (v.cheese.indexOf("stringy") > -1) {
                        $("#" + v.globeid + " " + "#stringy").removeClass("fa-circle-o").addClass("fa-circle");
                    } else if (v.cheese.indexOf("salty") > -1) {
                        $("#" + v.globeid + " " + "#salty").removeClass("fa-circle-o").addClass("fa-circle");
                    } else if (v.cheese.indexOf("creamy") > -1) {
                        $("#" + v.globeid + " " + "#creamy").removeClass("fa-circle-o").addClass("fa-circle");
                    }

                    //Sauce
                    $("#" + v.globeid + " > .cardFlex > .rankings").append("<h4>Sauce</h4><div class='rankBox'><div class='rankItem'><i id='sthick' class='fa fa-circle-o' aria-hidden='true'></i><p>Thick</p></div><div class='rankItem'><i id='sthin' class='fa fa-circle-o' aria-hidden='true'></i><p>Thin</p></div><div class='rankItem'><i id='ssalty' class='fa fa-circle-o' aria-hidden='true'></i><p>Salty</p></div><div class='rankItem'><i id='ssavory' class='fa fa-circle-o' aria-hidden='true'></i><p>Savory</p></div></div>");

                    for (i = 0; i < v.sauce.length; ++i) {
                        if (v.sauce.indexOf("thick") > -1) {
                            $("#" + v.globeid + " " + "#sthick").removeClass("fa-circle-o").addClass("fa-circle");
                        } else if (v.sauce.indexOf("thin") > -1) {
                            $("#" + v.globeid + " " + "#sthin").removeClass("fa-circle-o").addClass("fa-circle");
                        } else if (v.sauce.indexOf("salty") > -1) {
                            $("#" + v.globeid + " " + "#ssalty").removeClass("fa-circle-o").addClass("fa-circle");
                        } else if (v.sauce.indexOf("savory") > -1) {
                            $("#" + v.globeid + " " + "#ssavory").removeClass("fa-circle-o").addClass("fa-circle");
                        }
                    }

                    //Crust
                    $("#" + v.globeid + " > .cardFlex > .rankings").append("<h4>Crust</h4><div class='thinCrust'>Thin</div><div class='medCrust'>Medium</div><div class='thickCrust'>Thick</div>");

                    if (v.crust.indexOf("thin") > -1) {
                        $("#" + v.globeid + " " + ".thinCrust").css("background-color", "#666");
                    } else if (v.crust.indexOf("medium") > -1) {
                        $("#" + v.globeid + " " + ".medCrust").css("background-color", "#666");
                    } else if (v.crust.indexOf("thick") > -1) {
                        $("#" + v.globeid + " " + ".thickCrust").css("background-color", "#666");
                    }

                    //Toppings
                    $("#" + v.globeid + " > .cardFlex").append(
                        "<div class='toppings'><h4>Toppings</h4><ul class='toppingList'></ul></div>");

                    for (i = 0; i < v.toppings.length; ++i) {
                        $("#" + v.globeid + " > .cardFlex > .toppings > .toppingList").append('<li>' + v.toppings[i] + '</li>');
                    }

                    //Comment
                    $("#" + v.globeid + " > .cardFlex").append("<div class='useCom'><h4>Comments</h4><div class='comment'>" + v.comment + "</div></div>");

                }
            });


            if (pCount == 0) {
                $("#welcome").css("display", "block");

                $(".orderToggle").css("display", "none");
            } else {
                $("#welcome").css("display", "none");

                $(".orderToggle").css("display", "block");
            }
        },


    });
};


resultsAdd();

$("#pcForm").submit(function (e) {
    $(".pizzaCard").remove();
    var fd = new FormData($(this)[0]);
    $.ajax({
        url: "pcajaxprocess.php",
        type: "post",
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        success: function () {
            resultsAdd();
            console.log('data sent');
        }
    });
    e.preventDefault();
});



//var pull = new XMLHttpRequest();
//pull.onload = function() {
////    Here is where you do your work with the data
//    console.log(this.responseText);
//    $.each(this.responseText, function (i, v) {
//        $("#profileCol").prepend("<div class='useCard><h2>'" + v.usename + "'</h2>");
//    });
//}
//pull.open("get", "search.php", true);
//
//pull.send();
