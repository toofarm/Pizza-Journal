<?php 

if ( isset($_POST['submit']) ) {
    $u = $_POST["un"];
    $p = $_POST["pw"];
    
    $c = mysqli_connect('localhost', "root", "root", "pcUseBase");
    
    $q = "select * from pcU where pw='$p' and usename='$u'";
    
    $l = mysqli_query($c, $q);
    
    $r = $l->num_rows;
    
    if($r === 1) {
        $a = mysqli_fetch_assoc($l);
        
        $_SESSION["i"] = $a["ID"];
        $_SESSION["u"] = $a["usename"];
        $_SESSION["e"] = $a["em"];
        $_SESSION["p"] = $a["pw"];
    }
    
    mysqli_close($c);
    
    header('location: profile.php');
};

?>