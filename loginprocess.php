<?php session_start();
    
    if ( isset($_POST['submit']) ) {
        $un = $_POST["un"];
        $p = $_POST["pw"];
        
        $c = mysqli_connect("localhost", "fssa", "Webdevfun1!", "fssa");
        
        //This is saying, "Select all the rows that meet these two conditions"
        $q = "select * from pizzajournalUsers where pw='$p' and usename='$un'";
        
        $l = mysqli_query($c, $q);
        
        $r = $l->num_rows;
        
        if($r === 1) {
            $a = mysqli_fetch_assoc($l);
            
            $_SESSION["user"] = $a["usename"];
            $_SESSION["em"] = $a["em"];
            $_SESSION["p"] = $a["pw"];
            $_SESSION["img"] = $a["image"];
            
            header('location: profile.php');
            
        } else {
            
//   If username is not found, check for email
            $q = "select * from pizzajournalUsers where pw='$p' and em='$un'";
        
            $l = mysqli_query($c, $q);
        
            $r = $l->num_rows;
            
            if($r === 1) {
            $a = mysqli_fetch_assoc($l);
            
            $_SESSION["user"] = $a["usename"];
            $_SESSION["em"] = $a["em"];
            $_SESSION["p"] = $a["pw"];
            $_SESSION["img"] = $a["image"];
            
            header('location: profile.php');
            } else {
            
            $_SESSION['error'] = "block";
            
            header('location: landing.php');
            
            }
        }
        
    
       mysqli_close($c);
    };
    
    ?>