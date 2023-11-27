



<?php

include "conn.php";
$sql2 = mysql_query ("select * from diario" );

$row = mysql_num_rows($sql2);


    if (mysql_num_rows($sql2) > 0)

    {

      while ($dado = mysql_fetch_assoc($sql2))
      {


      $re = $dado["re"];

      

      $sql = mysql_query ("select COUNT(*) as soma from atividade where id_usu = '$re' and status <> 'ENCERRADO' and status <> 'PARALISADO'" );
      $row2 = mysql_num_rows($sql);
      $dado2 = mysql_fetch_assoc($sql);
      $conta = $dado2["soma"];
      

     

      $query = "update diario set atividade = '$conta' where re = '$re'";
      $sql = mysql_query($query);
      

       }

    }

 

    ?>

    