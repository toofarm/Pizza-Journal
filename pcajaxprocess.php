<?php 

$name = $_POST["pizzaName"];
$res = $_POST["restaurant"];
$d = $_POST["date"];
$s = $_POST["score"];
$c = $_POST["cheese"];
$sa = $_POST["sauce"];
$cr = $_POST["crust"];
$t = $_POST["toppings"];
$com = $_POST["comment"];
//Give each entry a user ID and a global ID. The user ID will tie the card to the user page and the global ID will allow it to enter the master JSON file
$idu = $_SESSION["user"];


//These two lines link the script to the JSON file
$jr = file_get_contents('pcards.json');
$j = json_decode($jr, true);

if (count($j) == 0) {
    $objcount = 1;
} else {
    $objcount = count($j) +1;
}

$k = "pcard$objcount";

$idg = $k;

$add = array(
    "pizzaname" => $name,
    "restaurant" => $res,
    "date" => $d,
    "score" => $s,
    "cheese" => $c,
    "sauce" => $sa,
    "crust" => $cr,
    "toppings" => $t,
    "comment" => $com,
    "user" => $idu;
    "globeid" => $idg;
);

$j[$k] = $add;

//This reseals the JSON file
$ju = json_encode($j);
file_put_contents('pcards.json', $ju);

$file_size = $_FILES["pic"]["size"];

    if($file_size > 2097152){
         $message = 'Image file too large. Your profile photo must be smaller than 2 megabytes.'; 
        echo '<script type="text/javascript">alert("'.$message.'");</script>'; 
    }
    
    if($_FILES) {
        
        switch($_FILES["pic"]["type"]) {
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
        //$t gets the temporary location of the photo, $f gives the destination, 'move_uploaded_file' moves it to the destination
        $t = $_FILES['pic']["tmp_name"];
        
        $f = "img/$objcount.$x";
        move_uploaded_file($t, $f);
    } 
    } else {
        $message = 'Please upload a JPG, PNG, or GIF that is smaller than 2MB.'; 
        echo '<script type="text/javascript">alert("'.$message.'");</script>';
        
    };




?>