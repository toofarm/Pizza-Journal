<?php session_start();

    $_SESSION["em"] = $e = $_POST["newem"];
    $_SESSION["user"] = $u = $_POST["newun"];
    $p = $_POST["newpw"];
    $b = $_POST["bio"];

//    Create email
    $m = "Welcome to Pizza Journal! Here's the user info you entered:<br>Username:&nbsp;$u<br>Password:&nbsp;$p<br><br>We're looking forward to hearing about your pizza adventures.<br><br>Best,<br>Your pals at Pizza Journal<br>--<br>www.PizzaJournal.com";
        
    $s = "Congrats on registering for Pizza Journal";

    $t = "toofarm@gmail.com";

    $h = "From: ".$t."\r\n"."Reply-To: ".$t."\r\n".'X-Mailer: PHP/'.phpversion();

    mail($t, $s, $m, $h);

//    Create user file on server
    mkdir("Users/$u");

    $text = "$u\n$b";

    $f = fopen("Users/$u/profile.txt", "w");

    fwrite($f, $text);

    fclose($f);

//    Log image files to server
    
    
    if($_FILES) { 
        
    $file_size = filesize($_FILES["upic"]["tmp_name"]);

    if($file_size > 2097152) {

        $_SESSION['regerror'] = "block";
            
        header('location: landing.php');
        
        $exit();
    }
        
        
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
        
        header('location: profile.php');
        
    } 
    } else {
        
        $_SESSION['regerror'] = "block";
            
        header('location: landing.php');
        
    };

//    Put login info in database
//Put the name of the image into the database
$c = mysqli_connect("localhost", "root", "root", "pcUseBase");

$q = "INSERT into pcU(usename, pw, em, image) VALUES('$u', '$p', '$e', '$i');";

mysqli_query($c, $q);

?>
