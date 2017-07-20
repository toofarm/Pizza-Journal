<?php session_start(); ?>

<?php 
    $u = $_SESSION["user"];
    $p = file("Users/$u/profile.txt");
    $b = $p[1];
     
    //Make sure to come back and fix this!!
    $scan = scandir("Users/$u/");
                
//    print_r($scan);
                
    foreach($scan as $file) {
        if($file == "image.jpg" || "image.jpeg" || "image.png" || "image.gif"){
            $file = $_SESSION["img"] = $i;
//            print_r($file);
        }
    }
         
    ?>

<!DOCTYPE html>
<html>

<head>
    <title><?php echo $u ?> | Pizza Journal</title>
    <?php require_once "head.php" ?>
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
                        <form id="pcForm">
                            <div class="form-group">
                                <label for="pizzaName" class="secLabel">Pizza name:</label>
                                <input type="text" name="pizzaName" class="form-control" method="post" required>
                            </div>
                            <div class="form-group">
                                <label class="secLabel">Restaurant:</label>
                                <input type="text" name="restaurant" class="form-control" method="post">
                            </div>
                            <div class="form-group">
                                <label class="secLabel">Date:</label>
                                <input type="date" name="date" class="form-control" method="post" required>
                            </div>
                            <div class="form-group">
                                <label class="secLabel">Pizza photo</label>
                                <input type="file" name="pic" class="form-control" accept="image/*" method="post">
                            </div>
                            <label class="secLabel">Pizza score:</label>
                            <select name="pizzaScore" required method="post"><option value="1/10">1</option>
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
                                    <label class="checkbox-inline"><input type="checkbox" value="greasy" method="post" >Greasy</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="stringy" method="post" >Stringy</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="salty" method="post" >Salty</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="creamy" method="post" >Creamy</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label class="secLabel">Sauce</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="thick" method="post" >Thick</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="thin" method="post" >Thin</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="salty" method="post" >Salty</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="savory" method="post" >Savory</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="secLabel">Crust</label>
                                <div class="radio">
                                    <label class="radio-inline"><input type="radio" name="thin" method="post" >Thin</label>
                                    <label class="radio-inline"><input type="radio" name="medium" method="post" >Medium</label>
                                    <label class="radio-inline"><input type="radio" name="thick" method="post" >Thick</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label class="secLabel">Toppings</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="pepperoni" method="post" >Pepperoni</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="olives" method="post" >Olives</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="mushrooms" method="post" >Mushrooms</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="peppers" method="post" >Bell peppers</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="ham" method="post" >Ham</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="Pineapple" method="post" >Pineapple</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="anchovies" method="post" >Anchovies</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="egg" method="post" >Egg</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="chicken" method="post" >Chicken</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="sausage" method="post" >Sausage</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="garlic" method="post" >Garlic</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="bpeppers" method="post" >Banana peppers</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="feta" method="post">Feta cheese</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="pine" method="post" >Pine nuts</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="artichoke" method="post" >Artichoke</label>
                                    <label class="chechecbox-inline">
                                        <input type="checkbox" value="other" method="post" ><input type="text" name="other-top" value="Other">
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="secLabel">Comments:</label><textarea name="comment" class="form-control" method="post">How was your pizza? Don't hold back...</textarea>
                            </div>
                            <div class="form-group">
                                <button id="pcFormSubmit" class="btn btn-default">Make Pizza Card</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <?php require_once "pmodal.php"; ?>

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
                        <div class="pizzaNum">17</div>
                    </div>
                </div>

                <div class="bioText">
                    <?php echo $b ?>
                </div>
                <button type="button" class="cardAddBtn" data-toggle="modal" data-target="#myModal">
                    <div class="addBtnTxt">
                        Create new pizza card
                    </div>
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </button>
            </div>



            <!--    Card stack-->
            <div class="col-lg-8 col-lg-push-1" id="cardCol">
                <div class="orderToggle">
                    <h2><span class="sortActive" id="date">Date</span> | <span id="tasty">Tastiness</span></h2>
                </div>

                <div id="pcHolder">
                    <div class="pizzaCard">
                        <h2 class="pizzaTitle"> <span class="pizzaName">Mushroom and Arugula</span> -
                            <span class="pizzaScore">8/10</span></h2>
                        <div class="cardFlex">
                            <!--                        This div contains photo, date and restaurant-->
                            <div>
                                <div class="pizzaPhoto"> <img src="Assets/pizzaPic.jpg" alt="Pizza!"></div>
                                <ul class="basics">
                                    <li class="restaurant"> Speedy Romeo's</li>
                                    <li class="date">June 17, '17</li>
                                </ul>
                            </div>


                            <div class="rankings">
                                <h4>Cheese</h4>
                                <div class="rankBox">
                                    <div class="rankItem">
                                        <i class="fa fa-circle-o" aria-hidden="true"></i>
                                        <p>Greasy</p>
                                    </div>
                                    <div class="rankItem">
                                        <i class="fa fa-circle-o" aria-hidden="true"></i>
                                        <p>Stringy</p>
                                    </div>
                                    <div class="rankItem">
                                        <i class="fa fa-circle-o" aria-hidden="true"></i>
                                        <p>Salty</p>
                                    </div>
                                    <div class="rankItem">
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <p>Creamy</p>
                                    </div>

                                </div>

                                <h4>Sauce</h4>
                                <div class="rankBox">
                                    <div class="rankItem">
                                        <i class="fa fa-circle-o" aria-hidden="true"></i>
                                        <p>Sweet</p>
                                    </div>
                                    <div class="rankItem">
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <p>Thick</p>
                                    </div>
                                    <div class="rankItem">
                                        <i class="fa fa-circle-o" aria-hidden="true"></i>
                                        <p>Salty</p>
                                    </div>
                                    <div class="rankItem">
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <p>Savory</p>
                                    </div>
                                </div>
                                <h4>Crust</h4>
                                <div class="thinCrust">
                                    Thin
                                </div>
                                <div class="medCrust">
                                    Medium
                                </div>
                                <div class="thickCrust">
                                    Thick
                                </div>

                            </div>

                            <div class="toppings">
                                <h4>Toppings</h4>
                                <ul class="toppingList">
                                    <li>Mushrooms</li>
                                    <li>Pepperoni</li>
                                    <li>Bell Peppers</li>
                                    <li>Olives</li>
                                    <li>Basil</li>
                                    <li>Red pepper flakes</li>
                                </ul>

                            </div>

                            <div class="useCom">
                                <h4>Comments</h4>
                                <div class="comment">It’s not the crime—it’s the cover up. But then again, maybe it's the bananas. Despite a surname that is practically synonymous with modern American cinema, Sofia Coppola didn't want to be a film director. She tells Marc about her early career ambitions and how they inevitably led her into the family business. The two of them also discuss Sofia's films, including The Virgin Suicides, Lost in Translation, Marie Antoinette, and her remake of a gritty 1970s Clint Eastwood movie, The Beguiled.</div>
                            </div>

                        </div>
                    </div>

                    <div class="pizzaCard">
                        <h2 class="pizzaTitle"> <span class="pizzaName">Mushroom and Arugula</span> -
                            <span class="pizzaScore">8/10</span></h2>
                        <div class="cardFlex">
                            <!--                        This div contains photo, date and restaurant-->
                            <div>
                                <div class="pizzaPhoto"> <img src="Assets/pizzaPic.jpg" alt="Pizza!"></div>
                                <ul class="basics">
                                    <li class="restaurant"> Speedy Romeo's</li>
                                    <li class="date">June 17, '17</li>
                                </ul>
                            </div>


                            <div class="rankings">
                                <h4>Cheese</h4>
                                <div class="rankBox">
                                    <div class="rankItem">
                                        <i class="fa fa-circle-o" aria-hidden="true"></i>
                                        <p>Greasy</p>
                                    </div>
                                    <div class="rankItem">
                                        <i class="fa fa-circle-o" aria-hidden="true"></i>
                                        <p>Stringy</p>
                                    </div>
                                    <div class="rankItem">
                                        <i class="fa fa-circle-o" aria-hidden="true"></i>
                                        <p>Salty</p>
                                    </div>
                                    <div class="rankItem">
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <p>Creamy</p>
                                    </div>

                                </div>

                                <h4>Sauce</h4>
                                <div class="rankBox">
                                    <div class="rankItem">
                                        <i class="fa fa-circle-o" aria-hidden="true"></i>
                                        <p>Sweet</p>
                                    </div>
                                    <div class="rankItem">
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <p>Thick</p>
                                    </div>
                                    <div class="rankItem">
                                        <i class="fa fa-circle-o" aria-hidden="true"></i>
                                        <p>Salty</p>
                                    </div>
                                    <div class="rankItem">
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <p>Savory</p>
                                    </div>
                                </div>
                                <h4>Crust</h4>
                                <div class="thinCrust">
                                    Thin
                                </div>
                                <div class="medCrust">
                                    Medium
                                </div>
                                <div class="thickCrust">
                                    Thick
                                </div>

                            </div>

                            <div class="toppings">
                                <h4>Toppings</h4>
                                <ul class="toppingList">
                                    <li>Mushrooms</li>
                                    <li>Pepperoni</li>
                                    <li>Bell Peppers</li>
                                    <li>Olives</li>
                                    <li>Basil</li>
                                    <li>Red pepper flakes</li>
                                </ul>

                            </div>

                            <div class="useCom">
                                <h4>Comments</h4>
                                <div class="comment">It’s not the crime—it’s the cover up. But then again, maybe it's the bananas. Despite a surname that is practically synonymous with modern American cinema, Sofia Coppola didn't want to be a film director. She tells Marc about her early career ambitions and how they inevitably led her into the family business. The two of them also discuss Sofia's films, including The Virgin Suicides, Lost in Translation, Marie Antoinette, and her remake of a gritty 1970s Clint Eastwood movie, The Beguiled.</div>
                            </div>

                        </div>
                    </div>
                </div>



                <div class="cardAdd">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    <h2>Add more pizza!</h2>
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
    <script src="pscoreAni.js"></script>
    <script src="modalAni.js"></script>
    <script src="cardAdd.js"></script>
    <script src="activeAni.js"></script>
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
</body>

</html>
