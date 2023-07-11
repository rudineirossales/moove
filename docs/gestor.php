<?php
 
  include "conn.php";
 
$coord = $_POST['coord'];
 
$sql = "SELECT * FROM gestor WHERE nome = '$coord'";
$qr = mysql_query($sql) or die(mysql_error());
 
if(mysql_num_rows($qr) == 0){
   echo  '<option value="0">'.htmlentities('Não há estacao').'</option>';
    
}else{

   
    while($ln = mysql_fetch_assoc($qr))
   {
      echo '<option value="'.$ln['id'].'">'.$ln['id'].'</option>';
   };
   
}
 


?>