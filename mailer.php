<?php 
$m = $_POST["message"];
$e = $_POST["email"];

$t = "toofarm@gmail.com";

$s = "A friend thinks you should check out Pizza Journal";

$h = "From: ".$t."\r\n"."Reply-To: ".$t."\r\n"."X-Mailer: PHP/".phpversion();

mail($e, $s, $m, $h);

?>