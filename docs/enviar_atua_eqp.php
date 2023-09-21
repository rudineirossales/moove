<?php  include "conn.php";  ?>


<?php 


session_start();

if(!isset($_SESSION["login"]) &&  !isset($_SESSION["senha"]) )
{
  header("Location: pesq_diario.php");
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
	setTimeout("window.location='pesq_diario.php'",1000);
	
	
}
</script> 


<link rel="icon" href="img/logo.png">

<link rel="stylesheet" href="estilopres.css"/>

<meta charset="UTF-8"/>

<title>Icomon</title>


</head>



<body>


<?php

$id  =$_POST['id'];
$status  =$_POST['status'];
$tec  =$_POST['tec'];
$coord  =$_POST['coord'];
$descricao  =$_POST['descricao'];

        $query = "update diario set status = '$status', descricao = '$descricao', id_coord = '$coord', nome_coord = '$tec', data_atualizacao = NOW() where re = '$id'";

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

        echo $tec;

        
        
      }


?>

<div style="display: flex; justify-content: center; align-items: center; padding: 17%;">
  <img src="img/logo.png">
</div>

</body>


</html>