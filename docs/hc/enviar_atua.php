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

<title>Gerencia de Estoque</title>


</head>



<body>








<?php

$sa  =$_POST['sa'];
$opc  =$_POST['opc'];
date_default_timezone_set('America/Sao_Paulo');
$hoje = date('Y-m-d H:i:s');


$sql3 = mysql_query ("select * from rat where sa = '$sa' and escaneado = 'S'" );

$row = mysql_num_rows($sql3);


    if (mysql_num_rows($sql3) > 0)

    {


      echo "
      <script language='JavaScript'>
      window.alert('RAT JÁ ESCANEADA, VERIFIQUE!!')
      
      </script>";

      echo "<script>saidasuccessfully()</script>";

      break;

    }



if($opc == 'OK')
{

    $escolha = 'S';

}
else
{

    $escolha = 'N';

}

$row = mysql_num_rows($sql2);

        $query = "update rat set escaneado = '$escolha', usuario = '".$_SESSION['nome']."', data_sc = '$hoje' where sa = '$sa'";

        $sql = mysql_query($query);




      if($sql)
      {
      
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

        echo " 
        <div style='display: flex; justify-content: center; align-items: center; padding: 8%;'>
         <img src='img/404.jpg'>
        </div> 
        ";

        
        
      }








?>

<div style="display: flex; justify-content: center; align-items: center; padding: 17%;">
  <img src="img/logo.png">
</div>

</body>


</html>