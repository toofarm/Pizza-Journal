<?php session_start(); ?>

<!DOCTYPE html>
<html>

    <?php require_once "head.php" ?>
<body>
    
    <?php require_once "nav.php"; ?>

    <!--   Main container-->
    <div class="container-fluid" id="bigun">


        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add more pizza!</h4>
                    </div>
                    <div class="modal-body">
                        <form id="pcForm">
                            <div class="form-group">
                            <label for="pizzaName" class="secLabel">Pizza name:</label>
                            <input type="text" name="pizzaName" class="form-control" required>
                            </div>
                            <div class="form-group">
                            <label class="secLabel">Restaurant:</label>
                            <input type="text" name="restaurant" class="form-control">
                            </div>
                            <div class="form-group">
                            <label class="secLabel">Date:</label>
                            <input type="date" name="date" class="form-control" required>
                                </div>
                            <div class="form-group">
                            <label class="secLabel">Pizza photo</label>
                            <input type="file" name="pic" class="form-control" accept="image/*">
                            </div>
                            <label class="secLabel">Pizza score:</label>
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
                                <label class="checkbox-inline"><input type="checkbox" value="greasy">Greasy</label>
                                <label class="checkbox-inline"><input type="checkbox" value="stringy">Stringy</label>
                                <label class="checkbox-inline"><input type="checkbox" value="salty">Salty</label>
                                <label class="checkbox-inline"><input type="checkbox" value="creamy">Creamy</label>
                            </div>
                                </div>
                            <div class="form-group">
                            <div class="checkbox">
                                <label class="secLabel">Sauce</label>
                                <label class="checkbox-inline"><input type="checkbox" value="thick">Thick</label>
                                <label class="checkbox-inline"><input type="checkbox" value="thin">Thin</label>
                                <label class="checkbox-inline"><input type="checkbox" value="salty">Salty</label>
                                <label class="checkbox-inline"><input type="checkbox" value="savory">Savory</label>
                            </div>
                                </div>
                            <div class="form-group">
                            <label class="secLabel">Crust</label>
                            <div class="radio">
                                <label class="radio-inline"><input type="radio" name="thin">Thin</label>
                                <label class="radio-inline"><input type="radio" name="medium">Medium</label>
                                <label class="radio-inline"><input type="radio" name="thick">Thick</label>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="checkbox">
                                <label class="secLabel">Toppings</label>
                                <label class="checkbox-inline"><input type="checkbox" value="pepperoni">Pepperoni</label>
                                <label class="checkbox-inline"><input type="checkbox" value="olives">Olives</label>
                                <label class="checkbox-inline"><input type="checkbox" value="mushrooms">Mushrooms</label>
                                <label class="checkbox-inline"><input type="checkbox" value="peppers">Bell peppers</label>
                                <label class="checkbox-inline"><input type="checkbox" value="ham">Ham</label>
                                <label class="checkbox-inline"><input type="checkbox" value="Pineapple">Pineapple</label>
                                <label class="checkbox-inline"><input type="checkbox" value="anchovies">Anchovies</label>
                                <label class="checkbox-inline"><input type="checkbox" value="egg">Egg</label>
                                <label class="checkbox-inline"><input type="checkbox" value="chicken">Chicken</label>
                                <label class="checkbox-inline"><input type="checkbox" value="sausage">Sausage</label>
                                <label class="checkbox-inline"><input type="checkbox" value="garlic">Garlic</label>
                                <label class="checkbox-inline"><input type="checkbox" value="bpeppers">Banana peppers</label>
                                <label class="checkbox-inline"><input type="checkbox" value="feta">Feta cheese</label>
                                <label class="checkbox-inline"><input type="checkbox" value="pine">Pine nuts</label>
                                <label class="checkbox-inline"><input type="checkbox" value="artichoke">Artichoke</label>
                            </div>
                                </div>
                            <div class="form-group">
                                <label class="secLabel">Comments:</label><textarea name="comment" class="form-control">How was your pizza? Don't hold back...</textarea>
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
        
<!--        Privacy modal-->
        <div id="myModal1" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Keep it secret, keep it safe...</h4>
                    </div>
                    <div class="modal-body">
                        Pizza Journal uses its best efforts to respect and protect the privacy of our online visitors and donors. We will not share your e-mail address with third parties.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        
        
        <div class="row" id="mainContent">
            <!--    Profile bar-->
            <div class="col-lg-3 col-lg-push-1 profile">
                <h2>OdorousMaximus</h2>
                <div class="userPhoto"><img src="Assets/darthvader.jpg" alt="User">
                </div>
                <div id="pizzaScoreContainer">
                    <h3>Pizza Score:</h3>
                    <div class="pizzaCounter">
                        <div class="pizzaNum">17</div>
                    </div>
                </div>

                <div class="bioText">
                    Native to the swamps of rural Louisiana, I first experienced pizza when searching for new and exciting ways to deploy alligator meat across my daily cuisine. Since become quite fond of arugula. Moved to NYC to make it in the world of competitive dance.
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
</body>

</html>
