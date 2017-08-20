<?php session_start(); 

    $u = $_SESSION["user"];
    $i = $_SESSION["img"];
    $p = file("Users/$u/profile.txt");
    $b = $p[1];

?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Reset password | Pizza Journal</title>
    <?php require_once "head.php" ?>
    <style>
        #useEditR #editBoxReset #emkeyInvalid {
            display: <?php echo($_SESSION["emkeyInvalid"]); ?>;
        }
        
        #useEditR #editBoxReset #emNoMatch {
            display: <?php echo($_SESSION["pwNoMatch"]); ?>;
        }
        
         #useEditR #editBoxReset #noProfile {
            display: <?php echo($_SESSION["emnoProfile"]); ?>;
        }
        
        #useEditR #editBoxReset #emTaken {
            display: <?php echo($_SESSION["emTaken"]); ?>;
        }

    </style>
</head>

<body>
    <?php require_once "nav.php"; ?>
    <?php require_once "pmodal.php"; ?>
    <!--    Begin page content-->

    <div class="container">
        <div class="row">
            <div id="useEditR" class="col-lg-10 col-lg-push-1">
                <h1>Reset email</h1>
                <div id="editBoxReset" class="form-group">
                    <div id="emkeyInvalid">
                    You do not have a valid email reset key. Request one by visiting the 'Edit profile' tab. 
                    </div>
                    <div id="emNoMatch">
                    Your emails do not match.
                    </div>
                    <div id="emnoProfile">
                    Your user profile was not found.
                    </div>
                    <div id="emTaken">
                    The email address you entered is already in our system.
                    </div>
                    <form method="post" enctype="multipart/form-data" action="emchange.php">
                        <label>
                        Current email address:
                        </label>
                        <input type="email" name="em">
                        <label>
                        New email address:
                        </label>
                        <input type="email" name="newem">
                        <label>
                        Confirm new email:
                        </label>
                        <input type="email" name="confirmem">
                        <input type="hidden" name="q" value="<?php
if (isset($_GET["q"])) {

    echo $_GET["q"];

}

echo '" /><br><input class="btn btn-default" type="submit" name="ResetEmailForm" value="Reset Email" /></form></div></div></div></div>'; ?>


    <?php require_once "footer.php"; ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="inputAni.js"></script>
    <script src="navAni.js"></script>
    <script src="mailerAni.js"></script>
    <script src="modalAni.js"></script>
    <script src="imageChange.js"></script>
</body>

</html>
