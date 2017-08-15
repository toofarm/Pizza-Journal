<?php session_start(); 

$c = mysqli_connect("localhost", "fssa", "Webdevfun1!", "fssa");

if (isset($_POST["ResetPasswordForm"])) {
    
//   Gather info from reset form
    $email = $_POST["em"];
    $pw = $_POST["pw"];
    $confirmpw = $_POST["confirmpw"];
    $hash = $_POST["q"];
    
    $salt = "498#2D83B631%3800EBD!801600D*7E3DD27";
        
    $resetkey = hash('sha512', $salt.$email);
    
    if ($resetkey == $hash) {
        
        if ($pw == $confirmpw) {
    
            $q = "select * from pizzajournalUsers where em='$email'";
    
            $l = mysqli_query($c, $q);
    
            $r = $l->num_rows;
            
            if($r === 1) {
                $a = mysqli_fetch_assoc($l);
                
                $id = $a["ID"];
                
                $sql = "UPDATE pizzajournalUsers SET pw='$pw' WHERE ID='$id'";
                
                mysqli_query($c, $sql);
        
                mysqli_close($c);
                
                header('location: landing.php');
                
            } else {
                echo "User profile not found";
            }
            
        } else {
            echo "Your passwords do not match";
        }
        
    } else {
        echo "Your password reset key is invalid";
    }
}

?>

