    <!--            Footer-->
    <footer>
        <div class="container">
            <div class="row">
                <div id="footR" class="col-lg-4 col-lg-push-2 col-md-4 col-md-push-2">
                    <h4>Tell someone else about pizza journal</h4>
                    <p>Share the joy of pizza journal with friends, enemies, acquaintances, and lovers</p>
                    <form id="mailer" action="mailer.php" enctype="multipart/form-data" method="post">
                        <input class="emAdd" id="em" type="email" name="email" placeholder="Email address" required>
                        <textarea class="emMessage" name="message" method="post">Check out this website that lets you keep track of the delicious pizza you eat and share it with your friends. It's called Pizza Journal.
                            
www.http://citytechcedev.org/fssa/sdanaher/landing.php
                                
All the best,
Your pals at Pizza Journal
-----
                        </textarea>
                        <input id="send" type="submit" name="mail" value="Send" action="mailer.php">
                    </form>
                    <div id="sent">Message sent!</div>

                </div>
                <div id="footL" class="col-lg-4 col-lg-push-2 col-md-4 col-md-push-2">
                    <div class="footLink" id="priv">Privacy policy</div>
                    <div class="footLink"><a href="contact.php" target="">Contact the guy who made this</a></div>
                </div>

            </div>
        </div>

    </footer>