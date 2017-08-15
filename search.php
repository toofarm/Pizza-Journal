<?php session_start();

if (isset($_POST['search'])) {
    $_SESSION["q"] = $q = $_POST["query"];
//    print_r($q);
}

$jr = file_get_contents('pcards.json');
$j = json_decode($jr, true);
$hits = array();

foreach ($j as $item) {
    
    $nlower = strtolower($item["pizzaname"]);
    $rlower = strtolower($item["restaurant"]);
    $uselower = strtolower($item["user"]);

    $nameA = explode(" ", $nlower);
    $resA = explode(" ", $rlower);
    
    if ($q == $item["pizzaname"] || 
        $q == $nlower || 
        $q == $nameA[0] ||
        $q == $nameA[1] ||
        $q == $nameA[2] ||
        $q == $item["restaurant"] || 
        $q == $rlower || 
        $q == $resA[0] || 
        $q == $resA[1] || 
        $q == $resA[2] || 
        $q == $item["crust"] || 
        $q == $item["score"] || 
        $q == $item["user"] ||
        $q == $uselower) {
        
        if (in_array($item, $hits) == false) {
        
        array_push($hits, $item);
            
        }
    
    }
    
    foreach ($item["toppings"] as $top) {
        $topL = strtolower($top);
    if ($q == $top || $q == $topL) {
        
        if (in_array($item, $hits) == false) {
        
        array_push($hits, $item);
            
        }
    }
    }
    
    foreach ($item["cheese"] as $ch) {
    if ($q == $ch) {
        
        if (in_array($item, $hits) == false) {
        
        array_push($hits, $item);
            
        }
    }
    }
    
    foreach ($item["sauce"] as $sc) {
    if ($q == $sc) {
        
        if (in_array($item, $hits) == false) {
        
        array_push($hits, $item);
            
        }
    }
    }
}

$users = array();

foreach ($hits as $item) {
    $x = array_search($item["user"], $users);
//    print_r($item["user"]);
//    print_r($users);
//    print_r($x);
    if ($x === false) {
    array_push($users, $item["user"]);
        }
}

//Database connection
$c = mysqli_connect("localhost", "fssa", "Webdevfun1!", "fssa");
        
$useLoad = array();

foreach($users as $name) {
    $r = "select * from pizzajournalUsers where usename = '$name'";
    

    $l = mysqli_query($c, $r);
        
    $row = $l->num_rows;
        
    if($row === 1) {
            $a = mysqli_fetch_assoc($l);
            
            $u = $a["usename"];
            $i = $a["image"];
        
            array_push($useLoad, array($u, $i));
        }
    
}

$usehits = json_encode($useLoad);
$cardload = json_encode($hits);

$pcards = file_get_contents('pcards.json');
//$cards = json_encode($pcards));

?>


<!DOCTYPE html>
<html>

<head>
    <title>
        Search results | Pizza Journal</title>
    <?php require_once "head.php" ?>
    <meta http-equiv="Cache-Control" content="no-store" />
</head>

<body>

    <?php require_once "nav.php"; ?>
    <?php require_once "pmodal.php"; ?>
<!--    Begin main content-->
    <div class="container">
        <div id="resultsContent" class="row">
            <form id="searchBig" role="search" action="search.php" method="post">
                <div class="input-group ui-widget">
                    <input type="text" class="form-control autoComplete query" placeholder="Search again" name="query">
                    <span class="input-group-btn">
                    <button type="submit" class="btn btn-default" name="search">Search</button></span>
                </div>
            </form>
            <div id="searchFail">
                Uh oh! We can't find the pizza you're looking for<br><br>
                <a href="profile.php" target="">Back to profile</a><br>
                <img src="Assets/pizzamoji.png" alt="Pizza">
            </div>
        </div>
    </div>



    <?php require_once "footer.php"; ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="inputAni.js"></script>
    <script src="navAni.js"></script>
    <script src="mailerAni.js"></script>
    <script src="modalAni.js"></script>
    <script src="cardSort.js"></script>
<!--    Autofill search-->
  <script>

//    $( ".query" ).autocomplete({
//    source: function( request, response ) {
//    $.ajax({
//        url: "pcards.json",
//        data: {term: request.term},
//        dataType: "json",
//        success: function( data ) {
//            response( $.map( data.myData, function( item ) {
//                return {
//                    label: item.title,
//                    value: item.turninId
//                }
//            }));
//        }
//    });
//}
//    minLength: 2,
//    delay: 100
//    });
      
  </script>
<!--    Append search results-->
    <script>
        var users = <?php echo $usehits ?>;
        var cards = <?php echo $cardload ?>;
        
        //        Loop through users
    $.each(users, function (i, v) {
            
        $("#resultsContent").append('<div class="searchResults" id="' + v[0] + '"><div class="col-lg-3 profileCol"><div class="useCard"><h2>' + v[0] + '</h2><div class="userPic"><img src="' + v[1] + '" alt="User"></div></div></div></div>');
                
            
        });
        
//        Loop through cards
        $.each(cards, function (i, v) {

            if ($('#' + v.user + '')) {
                    $('#' + v.user + '').append('<div class="col-lg-9 col-lg-offset-3 cardCol"><div class="pizzaCard" id="' + v.globeid + '" data-score="' + v.score + '" data-date="' + v.date + '"></div></div>');
                    

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
    
    </script>
<!--    'No results' notification-->
    <script>
    
noResults = function () {
    var results = $(".searchResults").length;
            
        if (results == 0) {
                $("#searchFail").css("display", "block");
            } else {
                $("#searchFail").css("display", "none");
            }
        };
        
        noResults();
        
    </script>
</body>

</html>