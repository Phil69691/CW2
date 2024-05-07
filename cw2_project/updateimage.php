<?php



include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");


$image = "C:/xampp/htdocs/bnu-php-web/img/pic2.jpg";
 

$imagedata = addslashes(file_get_contents($image));


$sql ="UPDATE student SET picture = '$imagedata' WHERE studentid = '20000000';"; 



$result = mysqli_query($conn, $sql);


mysqli_close($conn);

?>


