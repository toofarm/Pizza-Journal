<?php session_start(); 

$c = mysqli_connect("localhost", "fssa", "Webdevfun1!", "fssa");

if (isset($_POST["ResetEmailForm"])) {
    
//   Gather info from reset form
    $email = $_POST["em"];
    $newem = $_POST["newem"];
    $confirmem = $_POST["confirmem"];
    $hash = $_POST["q"];
    
    $salt = "498#2D83B631%3800EBD!801600D*7E3DD27";
        
    $resetkey = hash('sha512', $salt.$email);
    
    if ($resetkey == $hash) {
        
        if ($newem == $confirmem) {
            
            if (mysqli_query($c, "SELECT * FROM pizzajournalUsers WHERE em='$newem'") != 0) {
                
                $_SESSION["emTaken"] = "block";
                
                header('location: email-reset.php');
            } else {
    
            $q = "select * from pcU where em='$email'";
    
            $l = mysqli_query($c, $q);
    
            $r = $l->num_rows;
            
            if($r === 1) {
                $a = mysqli_fetch_assoc($l);
                
                $id = $a["ID"];
                
                $sql = "UPDATE pizzajournalUsers SET em='$newem' WHERE ID='$id'";
                
                mysqli_query($c, $sql);
        
                mysqli_close($c);
                
                header('location: landing.php');
                
            } else {
                $_SESSION["emnoProfile"] = "block";
                
                $_SESSION["emTaken"] = "none";
                
                $_SESSION["emkeyInvalid"] = "none";
                
                header('location: email-reset.php');
            }
                
            }
            
        } else {
            $_SESSION["emNoMatch"] = "block";
            
            $_SESSION["emkeyInvalid"] = "none";
            
            $_SESSION["emTaken"] = "none";
            
            header('location: email-reset.php');
        }
        
    } else {
        $_SESSION["emkeyInvalid"] = "block";
        
        header('location: email-reset.php');
    }
}

?>
