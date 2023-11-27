<?php  include "conn_hc.php";  ?>


<?php 
$sa =$_POST['sa'];

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
	setTimeout("window.location='caixa_col_hc.php'");
	
	
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
        $descricao =$_POST['descricao'];
        $teste1 =$_POST['teste1'];
        $teste2 =$_POST['teste2'];
        $teste3 =$_POST['teste3'];
        
        if(isset($_FILES['teste1'])) {
    
	
          $extensao = strtolower (substr($_FILES['teste1'] ['name'], -4));
          $novo_nome1  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
          $diretorio = "../Api/VPS/HC/FOTOS_HC/";
        
        
        
        move_uploaded_file($_FILES['teste1'] ['tmp_name'], $diretorio.$novo_nome1 )	;
          }
          if(isset($_FILES['teste2'])) {
    
	
            $extensao = strtolower (substr($_FILES['teste2'] ['name'], -4));
            $novo_nome2  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
            $diretorio = "../Api/VPS/HC/FOTOS_HC/";
          
          
          
          move_uploaded_file($_FILES['teste2'] ['tmp_name'], $diretorio.$novo_nome2 )	;
            }

            if(isset($_FILES['teste3'])) {
    
	
              $extensao = strtolower (substr($_FILES['teste3'] ['name'], -4));
              $novo_nome3  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
              $diretorio = "../Api/VPS/HC/FOTOS_HC/";
            
            
            
            move_uploaded_file($_FILES['teste3'] ['tmp_name'], $diretorio.$novo_nome3 )	;
              }
       
    $query = "UPDATE reparo_hc SET obs_tec='$descricao', data_execucao = '$hoje', status = '', contador = null, tratada = 'S' WHERE sa='$sa'";
    $sql = mysql_query($query);


if($sql)
{
  $query2 = "INSERT INTO logs_hc (sa,id_usu,data_execucao,foto_antes,foto_depois,terceira_imagem)";
  $query2.= "values ('$sa', '".$_SESSION["id"]."','$hoje','$novo_nome1','$novo_nome2','$novo_nome3')";
  $sql2 = mysql_query($query2);

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