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
                <li class="pr"><a href="#">Profile</a></li>
<!--                <li><a href="#">Log out</a></li>-->
                <li><a href="landing.php">Sign in</a></li>
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
                    <th class="pr"><a href="#">Profile</a></th>
<!--                    <th><a href="#">Log out</a></th>-->
                    <th><a href="landing.php">Sign in</a></th>
                </tr>
            </table>
        </div>
    </nav>