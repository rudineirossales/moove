<?php  include "conn.php";  ?>


<?php 

date_default_timezone_set('America/Sao_Paulo');
$hoje = date('Y-m-d H:i:s');


$ba =$_POST['ba'];

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
	setTimeout("window.location='pesq_posba.php'");
	
	
}
</script> 


<link rel="icon" href="img/logo.png">

<link rel="stylesheet" href="estilopres.css"/>

<meta charset="UTF-8"/>

<title>ICOMON</title>


</head>



<body>








<?php
       
$ba  =$_POST['ba'];
$descricao  =$_POST['descricao'];
$gestor  =$_POST['coord'];
$teste1  =$_POST['teste1'];

        if(isset($_FILES['teste1'])) {
    
	
          $extensao = strtolower (substr($_FILES['teste1'] ['name'], -4));
          $novo_nome1  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
          $diretorio = "Api/FTTH/photos/";
        
        
        
        move_uploaded_file($_FILES['teste1'] ['tmp_name'], $diretorio.$novo_nome1 )	;
          }

          if(isset($_FILES['teste2'])) {
    
	
            $extensao = strtolower (substr($_FILES['teste2'] ['name'], -4));
            $novo_nome2  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
            $diretorio = "Api/FTTH/photos/";
          
          
          
          move_uploaded_file($_FILES['teste2'] ['tmp_name'], $diretorio.$novo_nome2 )	;
            }
        
        $connect = mysqli_connect("mysql.hostinger.com.br", "u504529778_icomon_", "Rud!n3!@", "u504529778_icomon_");  
        $query ="update pos_ba set descricao = '$descricao', status = 'VISTORIADO', data ='$hoje', foto = '$novo_nome1' where ba = '$ba'";
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