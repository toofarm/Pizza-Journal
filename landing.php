<?php session_start(); ?>

<!DOCTYPE html>
<html>
    
    <head>
    <title>Login | Pizza Journal</title>
        <?php require_once "head.php" ?>
        <style>
            #loginBox #loginBiz {
                display: <?php echo($_SESSION['error']); ?>;
            }
            #loginBox #login #failure {
                display: <?php echo($_SESSION['error']); ?>;
            }
            #loginBox #register #regBiz #regForm #failure2 {
                display: <?php echo($_SESSION['regerror']); ?>;
            }
            #loginBox #register #regBiz {
                display: <?php echo($_SESSION['regerror']); ?>;
            }
            #loginBox #register #regBiz #unTaken {
                display: <?php echo($_SESSION['unTaken']); ?>;
            }
            #loginBox #register #regBiz #emTaken {
                display: <?php echo($_SESSION['emTaken']); ?>;
            }
            #loginBox #register #regBiz {
                display: <?php echo($_SESSION['unTaken']); ?>;
            }
            #loginBox #register #regBiz {
                display: <?php echo($_SESSION['emTaken']); ?>;
            }
        </style>
    </head>
<body>
    
    
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-push-3" id="loginBox">
                <div id="loginHead">
                    <div id="logoBackerL">
                        <img class="text-center" alt="Pizza Journal" src="Assets/PJlogo1.png">
                    </div>
                    <h3>Keeping track of the only memories that matter</h3>
                </div>
                <div id="register">
                    <h1>I'm new here</h1>
                    <div id="regBiz">
                        <div id="unTaken">
                        A user with that name already exists in our records. Try picking another name, or logging in
                        </div>
                        <div id="emTaken">
                        A user with that email address already exists in our records. Try registering with another address, or logging in
                        </div>
                        <form id="regForm" method="post" action="registerprocess.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" name="newem" id="newem"  required>
                            </div>
                            <div class="form-group">
                                <label>Choose a username</label>
                                <input class="form-control" type="text" name="newun" id="newun" maxlength="17" required>
                            </div>
                            <div class="form-group">
                                <label>Choose a password</label>
                                <input class="form-control" type="password" name="newpw" id="newpw"  required>
                            </div>
                            <div class="form-group">
                                <label>Tell us a little bit about yourself</label>
                                <textarea class="form-control" name="bio" id="bio" maxlength="250" required onfocus="this.select()">This short bio will display on your profile page. 250 characters or less, please!</textarea>
                            </div>
                            <div class="form-group">
                                <div id="failure2">Please upload a JPG, PNG, or GIF that is smaller than 2MB.</div>
                                <label>Upload a photo</label>
                                <input class="form-control" type="file" name="upic" id="upic" accept="image/*" required>
                            </div>
                            <button type="submit" class="btn btn-default">Sign me up for Pizza Journal</button>
                        </form>

                    </div>
                </div>
                <div id="login">
                    <h1>I've been here before</h1>
                    <div id="loginBiz">
                        <form id="logForm" action="loginprocess.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                               <div id="failure">
                                The username and password you entered don't appear to be in our records.
                                </div> <label>Email or Username</label>
                                <input class="form-control" type="text" name="un" id="un" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" name="pw" id="pw" required>
                            </div>
                            <button type="submit" name="submit" value="submit" class="btn btn-default">Sign in</button>
                        </form>
                    </div>
                </div>
                <div id="landingFoot">
                    <h4>Wait, what's this about?</h4>
                    <div id="footCopy">
                        Pizza Journal lets you keep track of the pizza you eat. You can upload photos of your pizza, describe what it tasted like, and share your pizza adventures. It's free, easy, and pretty cool.<br><br>Developed by Shane Danaher
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/ajax.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="inputAni.js"></script>
    <script src="navAni.js"></script>
    <script src="mailerAni.js"></script>
    <script src="pscoreAni.js"></script>
    <script src="modalAni.js"></script>
    <script src="loginAni.js"></script>
    <script src="activeAni.js"></script>
</body>

</html>
