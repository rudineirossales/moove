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
	setTimeout("window.location='atualiza_ba.php'",1000);
	
	
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
$uf  =$_POST['uf'];
$localidade  =$_POST['localidade'];
$estacao  =$_POST['estacao'];
$celula  =$_POST['celula'];
$cdoe  =$_POST['cdoe'];
$afetacao  =$_POST['afetacao'];
$endereco  =$_POST['endereco'];
$data_abertura  =$_POST['data_abertura'];
$data_vencimento  =$_POST['data_vencimento'];
$prioridade  =$_POST['prioridade'];
$status  =$_POST['status'];
$obs  =$_POST['obs'];
$tipo_rede  =$_POST['tipo_rede'];



        $query = "update atividade set localidade = '$localidade', tipo_rede = '$tipo_rede', estacao = '$estacao', celula = '$celula', cdoe = '$cdoe', afetacao = '$afetacao', endereco = '$endereco', data_abertura = '$data_abertura',data_vencimento = '$data_vencimento',tipo = '$prioridade', status = '$status', obs = '$obs' where ba = '$ba'";

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