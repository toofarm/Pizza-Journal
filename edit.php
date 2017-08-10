<?php session_start(); 

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
        Edit profile | Pizza Journal</title>
    <?php require_once "head.php" ?>
    <style>
        #editError {
            display: <?php echo($_SESSION['editerror']);
            ?>;
        }

    </style>
</head>

<body>
    <?php require_once "nav.php"; ?>
    <?php require_once "pmodal.php"; ?>
<!--    Begin page content-->
    <div class="container">
        <div class="row">
            <div id="useEdit" class="col-lg-10 col-lg-push-1">
                <h1>Edit public profile</h1>
                <div id="editBox" class="form-group">
                    <div id="editError">Please upload JPG, PNG, or GIF that is smaller than 2MB.</div>
                    <form method="post" action="editprocess.php" enctype="multipart/form-data">
                        <div id="formBigFlex">
                            <div id="picBox">
                                <label for="picInput">
                            <img src="<?php echo $i ?>" alt="User photo" id="uppy">
                            <input id="picInput" name="picInput" type="file">
                            <div class="overlay">
                                <div class="text">Change profile picture</div>
                            </div>
                            </label>
                            </div>
                            <div id="editFlex">
                                <input name="username" id="un" value="<?php echo $u ?>" maxlength="17" onclick="this.select()">
                                <textarea name="bio" id="bioEdit" onclick="this.select()" maxlength="250"><?php echo $b ?></textarea>
                            </div>
                        </div>
                        <div id="pwResetHolder">
                            <h2>Edit private info</h2>
                            <h3>Reset password</h3>
                            <h3>Change email</h3>
                        </div>
                        <div id="btnHolder">
                            <a href="profile.php" target=""><button type="button" class="btn btn-default">Back to profile</button></a>
                            <button type="submit" name="submit" class="btn btn-default">Submit changes</button>
                        </div>
                    </form>
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
    <script src="imageChange.js"></script>
</body>

</html>
