
<?php
include "conn.php";

  
  
session_start();

if(!isset($_SESSION["login"]) &&  !isset($_SESSION["senha"]) )
{
  header("Location: index.html");
  exit;
  
  
}

  
  
//}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>

<link rel="icon" href="img/icomon.jpg">

<script type="text/javascript">
function saidasuccessfully()
{
  setTimeout("window.location='dashboard.php'",3000);
  
  
}
</script> 


<link rel="icon" href="img/logo.png">

<link rel="stylesheet" href="estilopres.css"/>

<meta charset="UTF-8"/>

<title>ICOMON</title>

<link rel="icon" href="icomon.jpg">
</head>



<body>

<?php
date_default_timezone_set('America/Sao_Paulo');
$ba =$_POST['ba'];
$uf =$_POST['uf'];
$localidade =$_POST['localidade'];
$estacao =$_POST['estacao'];
$celula =$_POST['celula'];
$cdoe_cdoia =$_POST['cdoe_cdoia'];
$endereco =$_POST['endereco'];
$tipo =$_POST['tipo'];
$tipo_rede =$_POST['tipo_rede'];
$ba_comum =$_POST['ba_comum'];
$data_abertura =$_POST['data_abertura'];
$data_vencimento =$_POST['data_vencimento'];
$tec =$_POST['tec'];
$obs =$_POST['obs'];
$afetacao =$_POST['afetacao'];
$coord =$_POST['coord'];
$hoje = date('Y-m-d H:i:s');
$opc =$_POST['opc'];
$opc2 =$_POST['opc2'];
$opc3 =$_POST['opc3'];
$status ='DESPCOORD';



$sql3 = mysql_query ("select * from atividade where ba = '$ba'" );

$row = mysql_num_rows($sql3);


    if (mysql_num_rows($sql3) > 0)

    {


      echo "
      <script language='JavaScript'>
      window.alert('BA JÁ CADASTRADO!')
      
      </script>";

      echo "<script>saidasuccessfully()</script>";

      break;

    }


$sql2 = mysql_query ("select * from usuario where id = '$coord'" );

$row = mysql_num_rows($sql2);


    if (mysql_num_rows($sql2) > 0)

    {

      while ($dado = mysql_fetch_assoc($sql2))
      {

      $gestor = $dado["nome"];

      }

    }

    if($opc3 == 'TRIAGEM')
{

$status = 'TRIAGEM';
$gestor = 'TRIAGEM';
$coord = $_SESSION['id'];



}


$query = "insert into atividade (ba,ba_comum,uf,localidade,estacao,endereco,celula,cdoe,data_abertura,data_vencimento,tipo,tipo_rede,id_usu,status,nome_despacho,data_despacho,obs_cl,afetacao,nome_gestor,tipo_7048,escalonamento)";

$query.= "values ('$ba','$ba_comum','$uf','$localidade','$estacao','$endereco','$celula','$cdoe_cdoia','$data_abertura','$data_vencimento','$tipo','$tipo_rede','$coord','$status','".$_SESSION['nome']."','$hoje','$obs','$afetacao','$gestor','$opc','$opc2')";




$sql = mysql_query($query);


if($sql )
{
      include "telegram.php";
      $query4 = "insert into logs (ba,status,nome,id,data)";
      $query4.= "values ('$ba','DESPCOORD','".$_SESSION['nome']."','".$_SESSION['id']."','$hoje')";
      $sql4 = mysql_query($query4);
  
  echo "
  <script language='JavaScript'>
  window.alert('ENVIADA A CAMPO')
  
  </script>";
  
   echo "<script>saidasuccessfully()</script>";
  

  
}
else
{
  echo "
  <script language='JavaScript'>
  window.alert('ERRO NO CADASTRO.')
  
  </script>";
  echo "<script>saidasuccessfully()</script>";

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