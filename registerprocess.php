<?php session_start();

    $_SESSION["unTaken"] = "none";
    $_SESSION["emTaken"] = "none";
    
    $_SESSION["em"] = $e = $_POST["newem"];
    $_SESSION["user"] = $u = $_POST["newun"];
    $p = $_POST["newpw"];
    $b = $_POST["bio"];

    $c = mysqli_connect("localhost", "fssa", "Webdevfun1!", "fssa");

    $unquery = mysqli_query($c, "SELECT * FROM pizzajournalUsers WHERE usename='$u'");

  if (mysqli_num_rows($unquery) != 0)
  {
      $_SESSION["unTaken"] = "block";
      
      header('location: landing.php');
      
      exit();
      
  }

    $emquery = mysqli_query($c, "SELECT * FROM pizzajournalUsers WHERE em='$e'");

    if (mysqli_num_rows($emquery) != 0)
  {
      $_SESSION["emTaken"] = "block";
      
      header('location: landing.php');
        
      exit();
        
  }

//    Create email
    $m = "
    Welcome to Pizza Journal! Here's the user info you entered:
    
    Your name: $u

    Your passcode: $p
    
    We're looking forward to hearing about your pizza adventures.
    
    Best,
    Your pals at Pizza Journal
    --
    citytechcedev.org/fssa/sdanaher/landing.php
    ";
        
    $s = "Congrats on registering for Pizza Journal!";

    $t = "pizzajournal@gmail.com";

    $h = "From: ".$t."\r\n"."Reply-To: ".$t."\r\n".'X-Mailer: PHP/'.phpversion();

    mail($e, $s, $m, $h);

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
         $_SESSION["img"] = $i = "Users/$u/image.$x";
        
         move_uploaded_file($j, $i);
        
        header('location: profile.php');
        
    } 
    } else {
        
        $_SESSION['regerror'] = "block";
            
        header('location: landing.php');
        
    };

//    Put login info in database
//Put the name of the image into the database

$q = "INSERT into pizzajournalUsers(usename, pw, em, image) VALUES('$u', '$p', '$e', '$i');";

mysqli_query($c, $q);

?>
