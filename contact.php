<?php session_start(); ?>

<!DOCTYPE html>
<html>

    <head>
    <title>Contact | Pizza Journal</title>
<?php require_once "head.php" ?>
        </head>

<body>

    <?php require_once "nav.php"; ?>

    <?php require_once "pmodal.php"; ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-push-3" id="resumeBox">
                <div id="myPic">
                </div>
                <h1>Shane Danaher</h1>
                <div id="bodStyle">
                    <div id="bodyContent">
                        I am a web designer and developer who lives in New York City. I drink too much coffee.
                    </div>
                    <ul id="contacts">
                        <li class="icon" id="emTrigger"><i class="fa fa-envelope" aria-hidden="true"></i> </li>
                        <li class="icon"><a href="https://www.linkedin.com/in/shaners/" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                        <li class="icon"><a href="https://github.com/toofarm" target="_blank"><i class="fa fa-github-square" aria-hidden="true"></i></a></li>
                        <li id="em">toofarm (at) gmail.com</li>
                    </ul>
                    
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
</body>

</html>
