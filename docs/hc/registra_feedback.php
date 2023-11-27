<?php  include "conn.php";  ?>


<?php 

date_default_timezone_set('America/Sao_Paulo');
$hoje = date('Y-m-d H:i:s');

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
	setTimeout("window.location='feedback.php'");
	
	
}
</script> 


<link rel="icon" href="img/logo.png">

<link rel="stylesheet" href="estilopres.css"/>

<meta charset="UTF-8"/>

<title>ICOMON</title>


</head>

<body>

<?php
       
$matricula  =$_POST['matricula'];
$descricao  =$_POST['descricao'];
$foto  =$_POST['foto'];
date_default_timezone_set('America/Sao_Paulo');
$hoje = date('Y-m-d H:i:s');
$chave  =$_POST['chave'];





        if(isset($_FILES['foto'])) {
    
	
          $extensao = strtolower (substr($_FILES['foto'] ['name'], -4));
          $novo_nome1  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
          $diretorio = "fotos_gestao/";
        
        
        
        move_uploaded_file($_FILES['foto'] ['tmp_name'], $diretorio.$novo_nome1 )	;
          }

        $connect = mysqli_connect("62.72.63.187", "remoteicomon", "Rud!n3!@", "hc");  
        $query ="update feedback set descricao = '$descricao',  foto = '$novo_nome1', status='JUSTIFICADO', data_cadastro = '$hoje' where chave = '$chave'";
        $result = mysqli_query($connect, $query); 
        $sql = mysql_query($query);

     
if($sql)
{
  
  echo "<script language='JavaScript'>
  window.alert('CADASTRADO COM SUCESSO');
  </script> " ; 

  

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

?>


</body>


</html>