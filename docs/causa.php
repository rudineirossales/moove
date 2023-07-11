<?php
 
  include "conn.php";
 
$causa = $_POST['causa'];
 
$sql = "SELECT * FROM causasub WHERE causa = '$causa'";
$qr = mysql_query($sql) or die(mysql_error());
 
if(mysql_num_rows($qr) == 0){
   echo  '<option value="0">'.htmlentities('Não há estacao').'</option>';
    
}else{

   
    while($ln = mysql_fetch_assoc($qr))
   {
      echo '<option value="'.$ln['sub'].'">'.$ln['sub'].'</option>';
   };
   
}
 


?>