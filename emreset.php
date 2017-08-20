<?php session_start();

$c = mysqli_connect("localhost", "fssa", "Webdevfun1!", "fssa");

if (isset($_POST['emrecovemSubmit'])) {
    
//    Checks if email is valid email
    if (filter_var($_POST["emrecovem"], FILTER_VALIDATE_EMAIL)) { 
        $email = $_POST["emrecovem"];
    } else {
        
        $_SESSION["recovEmInvalid"] = "block";
        
        header('location: edit.php');
    }
    
//   Checks if email exists in database
    $q = "select * from pizzajournalUsers where em='$email'";
        
    $l = mysqli_query($c, $q);
        
    $r = $l->num_rows;
        
    if($r === 1) {
        
//      Creates hashed url for reset
        $salt = "498#2D83B631%3800EBD!801600D*7E3DD27";

        
        $password = hash('sha512', $salt.$email);
        
        $pwurl = "http://citytechcedev.org/fssa/sdanaher/emreset.php?q=".$password;
        
        $mailbody = 
        "Hi there. If this email does not apply to you, please ignore it.
        
        It appears that you have requested an email reset from Pizza Journal. To reset the email address for your Pizza Journal account, please follow the link below. DO NOT SHARE THIS LINK WITH ANYONE ELSE.
        
        If you feel that you have received this message in error, please email pizzajournal@gmail.com.
        
        $pwurl
        
        Best regards,
        Pizza Journal";
        
        $s = "Your email address reset request from Pizza Journal";

        $t = "pizzajournal@gmail.com";

        $h = "From: ".$t."\r\n"."Reply-To: ".$t."\r\n".'X-Mailer: PHP/'.phpversion();
        
//      Mails hashed url to user
        mail($email, $s, $mailbody, $h);
        
        $_SESSION["resetSent"] = "block";
        
        $_SESSION["recovEmInvalid"] = "none";
        
        header('location: edit.php');
    
    } else {
        
        $_SESSION["recovEmInvalid"] = "block";
        
        header('location: edit.php');
    
    }

}

?>