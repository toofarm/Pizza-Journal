<nav>
    <!--        Small nav-->
    <div id="navSmall" class="container navbar navbar-default">
        <div class="navbar-header">
            <a class="navbar-brand text-center" href="#"><img alt="Pizza Journal" src="Assets/PJlogo1.png"></a>
        </div>
        <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search pizza">
            </div>
            <button id="mainSearch" type="submit" class="btn btn-default">Search</button>
        </form>


        <ul class="nav navbar-nav">
            <?php 
            if(isset($_SESSION["user"])) {
		echo '<li class="myActive"><a href="profile.php">Profile</a></li>';
		echo '<li><a href="logout.php">Log out</a></li>'; } else {
		echo '<li><a href="landing.php">Sign in</a></li>';
            }
            ?>
        </ul>
    </div>

    <!--        Large nav-->
    <div id="navLarge" class="container navbar navbar-default">
        <div class="container">
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search pizza">
                </div>
                <button id="mainSearch" type="submit" class="btn btn-default">Search</button>
            </form>
        </div>

        <div class="navbar-header">
            <div id="logoBacker">
                <a class="navbar-brand text-center" href="profile.php"><img alt="Pizza Journal" src="Assets/PJlogo1.png"></a>
            </div>
        </div>

        <table class="nav navbar-nav">
            <tr>
                <?php 
            if(isset($_SESSION["user"])) {
		echo '<th class="myActive"><a href="profile.php">Profile</a></th>';
		echo '<th><a href="logout.php">Log out</a></th>'; } else {
		echo '<th><a href="landing.php">Sign in</a></th>';
            }
            ?>
            </tr>
        </table>
    </div>
</nav>
