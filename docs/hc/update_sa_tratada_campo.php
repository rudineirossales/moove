



<?php

include "conn.php";
$sql2 = mysql_query ("select * from logs_hc" );

$row = mysql_num_rows($sql2);


    if (mysql_num_rows($sql2) > 0)

    {

      while ($dado = mysql_fetch_assoc($sql2))
      {


      $sa = $dado["sa"];

      

      $sql = mysql_query ("select * from reparo_hc where sa = '$sa'" );
      $row2 = mysql_num_rows($sql);
      $dado2 = mysql_fetch_assoc($sql);
      

     

      $query = "update reparo_hc set tratada = 'S' where sa = '$sa'";
      $sql = mysql_query($query);
      

       }

    }

 

    ?>

    