<?php session_start(); ?>

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
    <div class="container">
        <div class="row">
            <form id="searchBig" role="search" action="search.php" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search pizza" name="query">
                    <span class="input-group-btn">
                <button type="submit" class="btn btn-default" name="search">Search</button></span>
                </div>
            </form>
            <div id="searchFail">
                Uh oh! We can't find the pizza you're looking for<br><br>
                <a href="profile.php" target="">Back to profile</a><br>
                <img src="Assets/pizzamoji.png" alt="Pizza">
            </div>
            <div id="profileCol" class="col-lg-3">
                <div class="useCard">
                    <h2>Gruntasticus</h2>
                    <div class="userPic">
                        <img src="Assets/darthvader.jpg" alt="User">
                    </div>
                </div>
            </div>
            <div id="cardCol" class="col-lg-9">
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
                                    <i id="greasy" class="fa fa-circle-o" aria-hidden="true"></i>
                                    <p>Greasy</p>
                                </div>
                                <div class="rankItem">
                                    <i id="stringy" class="fa fa-circle-o" aria-hidden="true"></i>
                                    <p>Stringy</p>
                                </div>
                                <div class="rankItem">
                                    <i id="salty" class="fa fa-circle-o" aria-hidden="true"></i>
                                    <p>Salty</p>
                                </div>
                                <div class="rankItem">
                                    <i id="creamy" class="fa fa-circle" aria-hidden="true"></i>
                                    <p>Creamy</p>
                                </div>

                            </div>

                            <h4>Sauce</h4>
                            <div class="rankBox">
                                <div class="rankItem">
                                    <i id="ssweet" class="fa fa-circle-o" aria-hidden="true"></i>
                                    <p>Sweet</p>
                                </div>
                                <div class="rankItem">
                                    <i id="sthick" class="fa fa-circle" aria-hidden="true"></i>
                                    <p>Thick</p>
                                </div>
                                <div class="rankItem">
                                    <i id="ssalty" class="fa fa-circle-o" aria-hidden="true"></i>
                                    <p>Salty</p>
                                </div>
                                <div class="rankItem">
                                    <i id="ssavory" class="fa fa-circle" aria-hidden="true"></i>
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
        </div>
    </div>



    <?php require_once "footer.php"; ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="inputAni.js"></script>
    <script src="navAni.js"></script>
    <script src="mailerAni.js"></script>
    <script src="modalAni.js"></script>
    <script src="activeAni.js"></script>
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
    <script src="resultsajax.js"></script>
</body>

</html>
