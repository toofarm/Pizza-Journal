<?php 
    session_start();
    $u = $_SESSION["user"];
    $i = $_SESSION["img"];
    $p = file("Users/$u/profile.txt");
    $b = $p[1];

        if ($u == null) {
        header('location: landing.php');
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo $u ?> | Pizza Journal</title>
    <?php require_once "head.php" ?>
    <meta http-equiv="Cache-Control" content="no-store" />
</head>

<body>

    <?php require_once "nav.php"; ?>

    <!--   Main container-->
    <div class="container" id="bigun">

        <!-- Pizza Card Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add more pizza!</h4>
                    </div>
                    <div class="modal-body">
                        <form id="pcForm" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <label for="pizzaName" class="secLabel">Pizza name:</label>
                                <h5>The type of pizza you ate</h5>
                                <input type="text" name="pizzaName" class="form-control" method="post" required>
                            </div>
                            <div class="form-group">
                                <label class="secLabel">Restaurant:</label>
                                <h5>The restaurant where you ate it</h5>
                                <input type="text" name="restaurant" class="form-control" method="post">
                            </div>
                            <div class="form-group">
                                <label class="secLabel">Date:</label>
                                <h5>The date when it happened</h5>
                                <input type="date" name="date" class="form-control" method="post" required>
                            </div>
                            <div class="form-group">
                                <label class="secLabel">Pizza photo</label>
                                <h5>A photo of your delicious pizza - smaller than 2MB, please</h5>
                                <div id="picFail">Pizza pics must be smaller than 2.5MB</div>
                                <input type="file" name="pic" class="form-control" accept="image/*" method="post" id="pic" required>
                            </div>
                            <label class="secLabel">Pizza score:</label>
                            <h5>Score your pizza from 1 to 10, 1 being disgusting and 10 being heaven itself</h5>
                            <select name="pizzaScore" required><option value="1/10">1</option>
                            <option value="2/10">2</option>
  <option value="3/10">3</option>
  <option value="4/10">4</option>
  <option value="5/10">5</option>
  <option value="6/10">6</option>
  <option value="7/10">7</option>
  <option value="8/10">8</option>
  <option value="9/10">9</option>
  <option value="10/10">10</option>
</select>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label class="secLabel">Cheese</label>
                                    <h5>How was the cheese?</h5>
                                    <label class="checkbox-inline"><input type="checkbox" value="greasy" name="cheese[]" >Greasy</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="stringy" name="cheese[]">Stringy</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="salty" name="cheese[]">Salty</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="creamy" name="cheese[]">Creamy</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label class="secLabel">Sauce</label>
                                    <h5>How was the sauce?</h5>
                                    <label class="checkbox-inline"><input type="checkbox" value="thick" name="sauce[]" >Thick</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="thin" name="sauce[]" >Thin</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="salty" name="sauce[]"  >Salty</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="savory" name="sauce[]" >Savory</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="secLabel">Crust</label>
                                <h5>How was the crust?</h5>
                                <div class="radio">
                                    <label class="radio-inline"><input type="radio" value="thin" name="crust">Thin</label>
                                    <label class="radio-inline"><input type="radio" value="medium" name="crust" >Medium</label>
                                    <label class="radio-inline"><input type="radio" value="thick" name="crust">Thick</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label class="secLabel">Toppings</label>
                                    <h5>Which toppings did it have?</h5>
                                    <label class="checkbox-inline"><input type="checkbox" value="Anchovies" name="toppings[]">Anchovies</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="Artichoke" name="toppings[]">Artichoke</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="Banana Peppers" name="toppings[]">Banana peppers</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="Peppers" name="toppings[]">Bell peppers</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="Chicken" name="toppings[]">Chicken</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="Egg" name="toppings[]">Egg</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="Feta Cheese" name="toppings[]">Feta cheese</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="Garlic" name="toppings[]">Garlic</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="Ham"  name="toppings[]">Ham</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="Mushrooms" name="toppings[]">Mushrooms</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="Olives" name="toppings[]">Olives</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="Onions" name="toppings[]">Onions</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="Pepperoni" name="toppings[]">Pepperoni</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="Pineapple"  name="toppings[]">Pineapple</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="Pine Nuts" name="toppings[]">Pine nuts</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="Sausage" name="toppings[]">Sausage</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="Tomato" name="toppings[]">Tomato</label>
                                    <label class="chechecbox-inline">
                                        <input type="checkbox"  id="otherTop" value="other" name="toppings[]" ><input type="text" id="other" value="Other">
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="secLabel">Comments:</label><textarea name="comment" class="form-control" method="post" onfocus="this.select()">How was your pizza? Don't hold back...</textarea>
                            </div>
                            <div class="form-group">
                                <button id="pcFormSubmit" class="btn btn-default" type="submit" name="submit">Make Pizza Card</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="closeModal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <?php require_once "pmodal.php"; ?>

        <!--        Main content-->
        <div class="row" id="mainContent">

            <!--    Profile bar-->
            <div class="col-lg-3 col-lg-push-1 profile">
                <h2>
                    <?php echo $u ?>
                </h2>
                <div class="userPhoto"><img src="<?php echo $i ?>" alt="User">
                </div>
                <div id="pizzaScoreContainer">
                    <h3>Pizza Count:</h3>
                    <div class="pizzaCounter">
                        <div class="pizzaNum"></div>
                    </div>
                </div>

                <div class="bioText">
                    <?php echo $b ?>
                </div>
                <button type="button" class="cardAddBtn" data-toggle="modal" data-target="#myModal">
                    <div class="addBtnTxt">
                        Add more pizza
                    </div>
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </button>
            </div>



            <!--    Card stack-->
            <div class="col-lg-8 col-lg-push-1 cardCol">
                <div class="orderToggle">
                    <h2><span id="date">Date</span> | <span id="tasty">Tastiness</span> <i id="clear" class="fa fa-times" aria-hidden="true"></i></h2>
                </div>

                <div id="welcome">
                    <h3>Howdy</h3>
                    <div id="welcomeList">
                        <h4>Welcome to Pizza Journal, where you can...</h4>
                        <ul>
                            <li>Keep track of and compare the pizza you eat</li>
                            <li>Upload pictures of your pizza</li>
                            <li>Check out pizza that your friends are eating</li>
                        </ul>
                        <h6>Click "Add more pizza" to start your pizza journey</h6>
                        <img src="Assets/pizzamoji.png" alt="Pizza">
                    </div>
                </div>

                <div id="pcHolder">
                </div>

                <div class="cardAdd">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    <h2>Add more pizza</h2>
                </div>

            </div>

        </div>
    </div>

    <?php require_once "footer.php"; ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="inputAni.js"></script>
    <script src="navAni.js"></script>
    <script src="mailerAni.js"></script>
    <script src="modalAni.js"></script>
    <script src="cardSort.js"></script>
    <!-- For calendar display in Firefox -->
    <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
    <script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
    <script>
        webshims.setOptions('waitReady', false);
        webshims.setOptions('forms-ext', {
            types: 'date'
        });
        webshims.polyfill('forms forms-ext');

    </script>
    <!--    Replace values in "other" checkbox-->
    <script>
        //Script to replace 'other' topping value in checkbox
        $("#pcForm").submit(function() {

            $("#otherTop").val($("#other").val());

            //            var file = input.files[0];
            //            console.log(file);
            //
            //            if (file.size < 2621440) {
            //                //Submit form
            //                console.log("worked");
            //            } else {
            //                //Prevent default and display error
            //                evt.preventDefault();
            //                
            //                $("#picFail").css("display", "block");
            //            }

            $("#closeModal").trigger("click");

        });

    </script>
    <!--Ajax call-->
    <script>
        //This all has to be on your profile page because you'll have to populate the id portion with a PHP variable


        function cardAdd() {
            $.ajax({
                url: "pcards.json",
                type: "get",
                dataType: "json",
                cache: false,
                error: function(data) {
                    console.log(data);
                },
                success: function(data) {
                    $.each(data, function(i, v) {

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

                            for (i = 0; i <= v.sauce.length; ++i) {
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

                    //Sets the pizza count value
                    var pCount = $('#pcHolder > .pizzaCard').length;

                    $('.pizzaNum').html(pCount);
                    
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
                    cardAdd();
                    console.log('data sent');
                }
            });
            e.preventDefault();
        });

    </script>
</body>

</html>
