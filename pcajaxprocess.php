<?php session_start(); ?>

<?php 

//Give each entry a user ID and a global ID. The user ID will tie the card to the user page and the global ID will allow it to enter the master JSON file
$u = $_SESSION["user"];

$name = $_POST["pizzaName"];
$res = $_POST["restaurant"];
$d = $_POST["date"];
$s = $_POST["pizzaScore"];
$c = $_POST["cheese"];
$sa = $_POST["sauce"];
$cr = $_POST["crust"];
$t = $_POST["toppings"];
$com = $_POST["comment"];

//These two lines link the script to the JSON file
$jr = file_get_contents('pcards.json');
$j = json_decode($jr, true);
    
if (count($j) == 0) {
    $objcount = 1;
} else {
    $objcount = count($j) + 1;
};

$k = "pcard".$objcount;

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
        //$temp gets the temporary location of the photo, $f gives the destination, 'move_uploaded_file' moves it to the destination
        $temp = $_FILES["pic"]["tmp_name"];
        
        $f = "img/$k.$x";
        move_uploaded_file($temp, $f);
    } 
    } else {
//        $message = 'Please upload a JPG, PNG, or GIF that is smaller than 2MB.'; 
//        echo '<script type="text/javascript">alert("'.$message.'");</script>';
        
    };

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
    "user" => $u,
    "globeid" => $k,
    "img" => $f
);

//Append new array into JSON file
$j[$k] = $add;

//This reseals the JSON file
$ju = json_encode($j);
file_put_contents('pcards.json', $ju);

?>