<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$host = "185.213.81.103";
$user = "u504529778_hc";
$pass = "Rud!n3!@";
$database ="u504529778_hc";
$connection = mysql_connect($host,$user,$pass,$database) or die (mysql_error());
mysql_select_db($database)or die (mysql_error());


$con = new PDO ("mysql:host=$host;port=3306;dbname=$database",$user,$pass);


$con->exec("SET CHARACTER SET utf8");



?>



<?php
ini_set('display_errors', 0 );
error_reporting(0);
?>




