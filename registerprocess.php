<?php session_start();

    $e = $_POST["newem"];
    $p = $_POST["newpw"];
    $b = $_POST["bio"];

    $_SESSION["user"] = $u = $_POST["newun"];

//    Create email
    $m = "Welcome to Pizza Journal! Here's the user info you entered:<br>Username:&nbsp;$u<br>Password:&nbsp;$p<br><br>We're looking forward to hearing about your pizza adventures.<br><br>Best,<br>Your pals at Pizza Journal<br>--<br>www.PizzaJournal.com";
        
    $s = "Congrats on registering for Pizza Journal";

    $t = "toofarm@gmail.com";

    $h = "From: ".$t."\r\n"."Reply-To: ".$t."\r\n".'X-Mailer: PHP/'.phpversion();

    mail($t, $s, $m, $h);
    print_r($m);

//    Create user file on server
    mkdir("Users/$u");

    $text = "$u\n$b";

    $f = fopen("Users/$u/profile.txt", "w");

    fwrite($f, $text);

    fclose($f);

    print_r($_FILES);

//    Log image files to server
    if($_FILES) {
        
        switch($_FILES["upic"]["type"]) {
        case "image/jpeg": 
            $x = "jpg";
            break;
                
            
        case "image/png": 
            $x = "png";
            break;
            
        case "image/gif": 
            $x = "gif";
            break;
            
        default:
            $x = "";
            break;
    }
    
    if ($x) {
        $j = $_FILES["upic"]["tmp_name"];
         $_SESSION["img"] = $i = "users/$u/image.$x";
        
        

         move_uploaded_file($j, $i);
    } 
    } else {
        echo "No photo";
        
    };

//    Put login info in database
$c = msqli_connect("localhost", "root", "root", "pcUseBase");

$q = "INSERT into PCU(usename, pw, em) VALUES($u, $p, $e);";

mysqli_query($c, $q);

?>