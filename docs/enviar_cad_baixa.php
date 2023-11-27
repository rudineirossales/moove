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

<script type="text/javascript">
function saidasuccessfully()
{

  
	setTimeout("window.location='index_col.html'",1000);
	
	
}
</script> 


<link rel="icon" href="img/logo.png">

<link rel="stylesheet" href="estilopres.css"/>

<meta charset="UTF-8"/>

<title>ICOMON</title>


</head>



<body>








<?php

date_default_timezone_set('America/Sao_Paulo');

$ba =$_POST['ba'];
$status =$_POST['status'];
$hoje = date('Y-m-d H:i:s');


if($status == 'DESPTEC'){




$query = "update atividade set status = 'EM ANDAMENTO', data_atribuicao = '$hoje' where ba = '$ba'";
$sql = mysql_query($query);




if($sql)
{
    
      $query4 = "insert into logs (ba,status,nome,id,data)";
      $query4.= "values ('$ba','EM ANDAMENTO','".$_SESSION['nome']."','".$_SESSION['id']."','$hoje')";
      $sql4 = mysql_query($query4);
      mysql_close($connection);
  
  
  echo "
  <script language='JavaScript'>
  window.alert('EM ANDAMENTO')
  
  </script>";

  echo "<script>saidasuccessfully()</script>";
  
}
else
{
  
  echo "<script language='JavaScript'>
   window.alert('ERRO NA ATUALIZAÇÃO!');
   </script> " ;

   echo " 
        <div style='display: flex; justify-content: center; align-items: center; padding: 8%;'>
         <img src='img/404.jpg'>
        </div> 
        ";
  
}
}
else{





echo 'Nd';




}
?>

























</body>


</html>