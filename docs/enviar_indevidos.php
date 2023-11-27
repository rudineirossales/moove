<?php  include "conn.php";  ?>


<?php 


session_start();


if(!isset($_SESSION["login"]) &&  !isset($_SESSION["senha"]) )
{
  header("Location: index.html");
  exit;
  
  
}


?>



<script type="text/javascript">
function saidasuccessfully()
{
	setTimeout("window.location='cadastro_de_indevidos.php'",3000);
	
	
}


</script> 

<?php session_start();?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
<link href="css/style.css" rel="stylesheet">
<link rel="icon" href="img/icon.ico">

<script type="text/javascript">
function saidasuccessfully()
{
	setTimeout("window.location='cadastro_de_indevidos.php'",3000);
	
	
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
$ba =$_POST['ba'];
$estacao =$_POST['estacao']; 
$data_abertura =$_POST['data_abertura'];
$teste1 =$_POST['teste1'];
$obs =$_POST['obs'];  
$tipo_7048 =$_POST['opc'];  
$sa =$_POST['sa'];  
$idgpon =$_POST['idgpon'];  
$tipo =$_POST['tipo']; 
$hoje = date('Y-m-d H:i:s');

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


  if(isset($_FILES['teste1'])) {
    
	
    $extensao = strtolower (substr($_FILES['teste1'] ['name'], -4));
    $novo_nome1  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
    $diretorio = "arquivo/";
  
  
  
  move_uploaded_file($_FILES['teste1'] ['tmp_name'], $diretorio.$novo_nome1 )	;
    }
   

    $query = "insert into indevido (ba,estacao,data_abertura,operador,data,evidencia,prioridade,obs,tipo_7048,sa,idgpon)";
    $query.= "values ('$ba','$estacao','$data_abertura','".$_SESSION['nome']."','$hoje','$novo_nome1','$tipo','$obs','$tipo_7048','$sa','$idgpon')";

    $sql = mysql_query($query);

 
if($sql)
{
  
    echo "
    <script language='JavaScript'>
    window.alert('CADASTRADA!')
    
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