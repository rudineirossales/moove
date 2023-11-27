<?php  include "conn.php";  ?>


<?php 


session_start();

if(!isset($_SESSION["login"]) &&  !isset($_SESSION["senha"]) )
{
  header("Location: index.html");
  exit;
  
  
}
?>

<?php session_start(); ?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
<link href="css/style.css" rel="stylesheet">
<link rel="icon" href="img/icon.ico">




<link rel="icon" href="img/logo.png">

<link rel="stylesheet" href="estilopres.css"/>

<meta charset="UTF-8"/>

<title>ICOMON</title>


</head>



<body>


<?php

date_default_timezone_set('America/Sao_Paulo');
$hoje = date('Y-m-d H:i:s');
$cod =$_POST['cod'];
$logradouro =$_POST['logradouro'];
$cod_survey =$_POST['cod_survey'];
$cod_logradouro =$_POST['cod_logradouro'];
$comp1 =$_POST['comp1'];
$comp2 =$_POST['comp2'];
$comp3 =$_POST['comp3'];
$localidade =$_POST['localidade'];
$cod_survey =$_POST['cod_survey'];
$num_fachada =$_POST['num_fachada'];
$qtd_ums =$_POST['qtd_ums'];


  $query4 = "insert into projeto (quantidade_ums,num_fachada,localidade,logradouro,cod_survey,comp1,comp2,comp3,cadastro_status,cadastro_responsavel,cadastro_data,cod_logradouro)";
  $query4.= "values ('$qtd_ums','$num_fachada','$localidade','$logradouro','$cod_survey','$comp1','$comp2','$comp3','NAO INICIADO','".$_SESSION['nome']."','$hoje','$cod_logradouro')";
  $sql4 = mysql_query($query4);

  if($sql4)
  {

  
  echo "
  <script language='JavaScript'>
  window.alert('CADASTRADO COM SUCESSO')
  
  </script>";

  echo "<script language='JavaScript'>
  window.location='pesq_survey.php?localidade=".$localidade."&logradouro=".$logradouro."&cod2=".$cod_logradouro."'
  </script>";
  
  }
  else {

 

  
  echo "<script language='JavaScript'>
   window.alert('ERRO NA ATUALIZAÇÃO!');
   </script> " ;

   echo " 
        <div style='display: flex; justify-content: center; align-items: center; padding: 8%;'>
         <img src='img/404.jpg'>
        </div> 
        ";
  
    }

?>

























</body>


</html>