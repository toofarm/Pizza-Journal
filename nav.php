<nav>
    <!--        Small nav-->
    <div id="navSmall" class="container navbar navbar-default">
        <div class="navbar-header">
            <a class="navbar-brand text-center" href="#"><img alt="Pizza Journal" src="Assets/PJlogo1.png"></a>
        </div>
        <form class="navbar-form navbar-left" role="search" action="search.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search all pizza" name="query" onclick="this.select()">
            </div>
            <button id="mainSearch" type="submit" class="btn btn-default" name="search">Search</button>
        </form>


        <ul class="nav navbar-nav">
            <?php 
            if(isset($_SESSION["user"])) {
		echo '<li><a href="profile.php">Profile</a></li>';
		echo '<li role="presentation" class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
     <i class="fa fa-caret-down" aria-hidden="true"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-right">
      <li><a href="logout.php">Log out</a></li>
      <li><a href="edit.php">Edit profile</a></li>
    </ul>
    </li>'; } else {
		echo '<li><a href="landing.php">Sign in</a></li>';
            }
            ?>
        </ul>
    </div>

    <!--        Large nav-->
    <div id="navLarge" class="container navbar navbar-default">
        <div class="container">
            <form class="navbar-form navbar-left" role="search" action="search.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search all pizza" name="query" onclick="this.select()">
                </div>
                <button id="mainSearch" type="submit" class="btn btn-default" name="search">Search</button>
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
//    $url = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    if(isset($_SESSION["user"])) {
//		if (strpos($url, 'profile') > -1) {
//            echo '<th class="myActive"><a href="profile.php">Profile</a></th>';
//            } else {
                echo '<th><a href="profile.php">Profile</a></th>';
//            }
		echo '<th role="presentation" class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
      <i class="fa fa-caret-down" aria-hidden="true"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-right" role="menu">
      <li><a href="logout.php">Log out</a></li>
      <li><a href="edit.php">Edit profile</a></li>
    </ul>
    </th>'; } else {
		echo '<th><a href="landing.php">Sign in</a></th>';
            }
            ?>
            </tr>
        </table> 
        <div id="navMobile">
            <i id="#barsIcon" class="fa fa-bars" aria-hidden="true"></i>
             <?php 
            if(isset($_SESSION["user"])) {
		echo '<ul id="mob-nav-dropdown"><li><a href="profile.php">Profile</a></li><li><a href="logout.php">Log out</a></li>
      <li><a href="edit.php">Edit profile</a></li>
    </ul>'; } else {
		echo '<li><a href="landing.php">Sign in</a></li>';
            }
            ?>
        </div>
    </div>


</nav>
