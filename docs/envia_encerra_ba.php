<?php  include "conn.php";  ?>


<?php 


session_start();

if(!isset($_SESSION["login"]) &&  !isset($_SESSION["senha"]) || ($_SESSION["acesso"] != 'DEL' ) )
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
	setTimeout("window.location='encerra_ba.php'",1000);
	
	
}
</script> 


<link rel="icon" href="img/logo.png">

<link rel="stylesheet" href="estilopres.css"/>

<meta charset="UTF-8"/>

<title>Icomon</title>


</head>



<body>



<?php
date_default_timezone_set('America/Sao_Paulo');
$ba  =$_POST['ba'];
$obs  =$_POST['obs'];
$hoje = date('Y-m-d H:i:s');




        $query = "update atividade set  status = 'ENCERRADO', obs_cl = '$obs', nome_validacao = '".$_SESSION['nome']."', data_validacao = '$hoje' where ba = '$ba'";

        $sql = mysql_query($query);

      if($sql)
      {

        $query4 = "insert into logs (ba,status,nome,id,data)";
        $query4.= "values ('$ba','ENCERRADO MANUAL CL','".$_SESSION['nome']."','".$_SESSION['id']."','$hoje')";
        
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