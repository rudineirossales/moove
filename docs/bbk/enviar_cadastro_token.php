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
	setTimeout("window.location='cadastro_ba_token.php'",1000);
	
	
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
$uf =$_POST['uf'];
$localidade =$_POST['localidade'];
$estacao  =$_POST['estacao'];
$celula  =$_POST['celula'];
$cdoe  =$_POST['cdoe'];
$endereco  =$_POST['endereco'];
$tipo  =$_POST['tipo'];
$status  =$_POST['status'];
$coordenador  =$_POST['coordenador'];
$obs  = 'BA DE APOIO GERADO PELO BA PAI: '.$ba.'//  '.$_POST['obs'];
$id_tec  =$_POST['tec'];
$hoje = date('Y-m-d H:i:s');
$token = '88'.rand(100000,400000);






        $query = "insert into atividade_bbk (ba,uf,localidade,estacao_a,endereco,tipo,obs_cl,ba_apoio,id_usu,status,nome_despacho,data_despacho)";
        $query.= "values ('$token','$uf','$localidade','$estacao_a','$endereco','$tipo','$obs','$ba','$id_tec','BA APOIO','".$_SESSION['nome']."','$hoje')";

        $sql = mysql_query($query);




      if($sql)
      {

        $query4 = "insert into logs (ba,status,nome,id,data)";
        $query4.= "values ('$token','BA DE APOIO','".$_SESSION['nome']."','".$_SESSION['id']."','$hoje')";
        $sql4 = mysql_query($query4);

        echo "
        <script language='JavaScript'>
        window.alert('ENVIADO COM SUCESSO!')
        
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