<?php  include "../conn.php";  ?>


<?php 
$sa =$_POST['ba'];

session_start();
date_default_timezone_set('America/Sao_Paulo');
$hoje = date('Y-m-d H:i:s');



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
<link href="../css/style.css" rel="stylesheet">
<link rel="icon" href="../img/icon.ico">

<script type="text/javascript">
function saidasuccessfully()
{
	setTimeout("window.location='caixa_col_posba.php'");
	
	
}
</script> 


<link rel="icon" href="img/logo.png">

<link rel="stylesheet" href="estilopres.css"/>

<meta charset="UTF-8"/>

<title>ICOMON</title>


</head>



<body>








<?php



        
        $descricao =$_POST['descricao'];
        $ba =$_POST['ba'];
        $teste1 =$_POST['teste1'];
       
       
        
        if(isset($_FILES['teste1'])) {
    
	
          $extensao = strtolower (substr($_FILES['teste1'] ['name'], -4));
          $novo_nome1  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
          $diretorio = "../Api/FTTH/photos/";
        
        
        
        move_uploaded_file($_FILES['teste1'] ['tmp_name'], $diretorio.$novo_nome1 )	;
          }
          
       
    $query = "UPDATE pos_ba SET status ='$descricao', data = '$hoje', foto = '$novo_nome1', status = 'VISTORIADO' WHERE ba ='$ba'";
    $sql = mysql_query($query);


if($sql)
{

    echo "<script language='JavaScript'>
    window.alert('CADASTRADO!');
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