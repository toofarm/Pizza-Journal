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
    
    $file_size = $_FILES["upic"]["size"];

    if($file_size > 2097152){
         $message = 'Image file too large. Your profile photo must be smaller than 2 megabytes.'; 
        echo '<script type="text/javascript">alert("'.$message.'");</script>'; 
    }
    
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
        $message = 'Please upload a JPG, PNG, or GIF that is smaller than 2MB.'; 
        echo '<script type="text/javascript">alert("'.$message.'");</script>';
        
    };

//    Put login info in database
$c = mysqli_connect("localhost", "root", "root", "pcUseBase");

$q = "INSERT into pcU(usename, pw, em) VALUES('$u', '$p', '$e');";

header('location: profile.php');

mysqli_query($c, $q);

?>