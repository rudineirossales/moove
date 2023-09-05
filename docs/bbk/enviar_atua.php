<?php  include "conn.php";  ?>


<?php 


session_start();

if(!isset($_SESSION["login"]) &&  !isset($_SESSION["senha"]) )
{
  header("Location: atua.php");
  exit;
  
  
}

?>


<?php

session_start();


	
//}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
<link href="css/style.css" rel="stylesheet">
<link rel="icon" href="img/icon.ico">

<script type="text/javascript">
function saidasuccessfully()
{
	setTimeout("window.location='atua.php'",1000);
	
	
}
</script> 


<link rel="icon" href="img/logo.png">

<link rel="stylesheet" href="estilopres.css"/>

<meta charset="UTF-8"/>

<title>Icomon</title>


</head>



<body>



<?php

$ba  =$_POST['ba'];
$tec  =$_POST['tec'];
$coord  =$_POST['coord'];

$sql2 = mysql_query ("select * from usuario where id = '$coord'" );

$row = mysql_num_rows($sql2);


    if (mysql_num_rows($sql2) > 0)

    {

      while ($dado = mysql_fetch_assoc($sql2))
      {

      $gestor = $dado["nome"];

      }

    }

        $query = "update atividade_bbk set id_usu = '$coord', nome_gestor = '$gestor', status = 'DESPCOORD' where ba = '$ba'";

        $sql = mysql_query($query);


      if($sql)
      {

        $query4 = "insert into logs (ba,status,nome,id,data)";
        $query4.= "values ('$ba','DESPCOORD_REPASSE','".$_SESSION['nome']."','".$_SESSION['id']."',NOW())";
        $sql4 = mysql_query($query4);

        echo "
        <script language='JavaScript'>
        window.alert('EDITADO SUCESSO!')
        
        </script>";

        echo "<script>saidasuccessfully()</script>";
      }
      else
      {
        
        echo "<script language='JavaScript'>
        window.alert('ERRO NO ENVIO!');
        </script> " ;

        echo $tec;

        
        
      }

?>

<div style="display: flex; justify-content: center; align-items: center; padding: 17%;">
  <img src="img/logo.png">
</div>

</body>


</html>