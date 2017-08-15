<?php session_start();
    

$u = $_SESSION["user"];
$img = $_SESSION["img"];

if ( isset($_POST["submit"]) ) {
    $un = $_POST["username"];
    $b = $_POST["bio"];

    mkdir("Users/$un");

    $text = "$un\n$b";

    $f = fopen("Users/$un/profile.txt", "w");

    fwrite($f, $text);

    fclose($f);
    
    $jr = file_get_contents('pcards.json');
    $pcards = json_decode($jr, true);
    
    foreach($pcards as $key=>$index) {
        
        if ($index["user"] == $u) {
            $pcards[$key]["user"] = $un;
        }
    }
    
    $ju = json_encode($pcards);
    file_put_contents('pcards.json', $ju);
        
    if($_FILES) { 
        
//If no picture uploaded, rename current picture to fit new file path
        if ($_FILES["picInput"]["name"] == null) {
        
            $imgArray = explode("/", $img);
            
            rename("$img", "Users/$un/$imgArray[2]");
        
            $img = "Users/$un/$imgArray[2]";
        
        }
        
        $file_size = filesize($_FILES["picInput"]["tmp_name"]);

        if($file_size > 2097152) {

            $_SESSION['editerror'] = "block";
            
            header('location: edit.php');
        }
        
        
        switch($_FILES["picInput"]["type"]) {
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
            $j = $_FILES["picInput"]["tmp_name"];
             $_SESSION["img"] = $img = "Users/$un/image.$x";

             move_uploaded_file($j, $img);

        } 
        };
    
    if ($u != $un) {
// This deletes the old user profile on server
    array_map('unlink', glob("Users/$u/*.*"));
    
    rmdir("Users/$u");
    }
        
//   Change user data in database
    $c = mysqli_connect("localhost", "fssa", "Webdevfun1!", "fssa");
    
    $q = "select * from pizzajournalUsers where usename='$u'";
    
    $l = mysqli_query($c, $q);
    
    $r = $l->num_rows;
    
    if($r === 1) {
        $a = mysqli_fetch_assoc($l);
        
        $id = $a["ID"];
        
        $sql = "UPDATE pizzajournalUsers SET usename='$un', image='$img' WHERE ID='$id'";
        
        mysqli_query($c, $sql);
        
        mysqli_close($c);
        
        $_SESSION["user"] = $un;
        $_SESSION["img"] = $img;
        
        header('location: profile.php');
    }
    
    }

?>
