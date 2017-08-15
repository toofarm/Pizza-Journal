<?php session_start();

$c = mysqli_connect("localhost", "fssa", "Webdevfun1!", "fssa");

if (isset($_POST['emrecovSubmit'])) {
    
//    Checks if email is valid email
    if (filter_var($_POST["emrecovpw"], FILTER_VALIDATE_EMAIL)) { 
        $email = $_POST["emrecovpw"];
        print_r($email);
    } else {
        
        header('location: edit.php');
        echo "The email address you entered is not valid";
    }
    
//   Checks if email exists in database
    $q = "select * from pizzajournalUsers where em='$email'";
        
    $l = mysqli_query($c, $q);
        
    $r = $l->num_rows;
        
    if($r === 1) {
        
//      Creates hashed url for reset
        $salt = "498#2D83B631%3800EBD!801600D*7E3DD27";

        
        $password = hash('sha512', $salt.$email);
        
        $pwurl = "http://citytechcedev.org/fssa/sdanaher/reset.php?q=".$password;
        
        $mailbody = 
        "Hi there. If this email does not apply to you, please ignore it.
        
        It appears that you have requested a password reset from Pizza Journal. To reset your password, please follow the link below. DO NOT SHARE THIS LINK WITH ANYONE ELSE.
        
        If you feel that you have received this message in error, please email pizzajournal@gmail.com.
        
        $pwurl
        
        Best regards,
        Pizza Journal";
        
        $s = "Your password reset request from Pizza Journal";

        $t = "pizzajournal@gmail.com";

        $h = "From: ".$t."\r\n"."Reply-To: ".$t."\r\n".'X-Mailer: PHP/'.phpversion();
        
//      Mails hashed url to user
        mail($email, $s, $mailbody, $h);
        
        print_r("Mail sent...?");
    
    } else {
        
        echo "We were unable to find the email address you entered";
    
    }

}

?>