<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$host = "127.0.0.1";
$user = "root";
$pass = "";
$database ="u504529778_projeto";
$connection = mysql_connect($host,$user,$pass,$database) or die (mysql_error());
mysql_select_db($database)or die (mysql_error());


$con = new PDO ("mysql:host=$host;port=3306;dbname=$database",$user,$pass);


$con->exec("SET CHARACTER SET utf8");



?>



<?php
ini_set('display_errors', 0 );
error_reporting(0);
?>




