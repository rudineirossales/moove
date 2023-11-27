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
	
	setTimeout("window.location='endereco.php'");
	
}
</script> 


<link rel="icon" href="img/logo.png">

<link rel="stylesheet" href="estilopres.css"/>

<meta charset="UTF-8"/>

<title>ICOMON</title>


</head>



<body>








<?php
       
        $protocolo  =$_POST['protocolo'];
        $descricao =$_POST['descricao'];
        $foto1 =$_POST['foto1'];
        $foto2 =$_POST['foto2'];
        $foto3 =$_POST['foto3'];
        $foto4 =$_POST['foto4'];
       



        if(isset($_FILES['foto1'])) {
    
	
          $extensao = strtolower (substr($_FILES['foto1'] ['name'], -4));
          $novo_nome1  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
          $diretorio = "fotos_gestao/";
        
        
        
        move_uploaded_file($_FILES['foto1'] ['tmp_name'], $diretorio.$novo_nome1 )	;
          }

          if(isset($_FILES['foto2'])) {
    
	
            $extensao = strtolower (substr($_FILES['foto2'] ['name'], -4));
            $novo_nome2  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
            $diretorio = "fotos_gestao/";
          
          
          
          move_uploaded_file($_FILES['foto2'] ['tmp_name'], $diretorio.$novo_nome2 )	;
            }

            if(isset($_FILES['foto3'])) {
    
	
              $extensao = strtolower (substr($_FILES['foto3'] ['name'], -4));
              $novo_nome3  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
              $diretorio = "fotos_gestao/";
            
            
            
            move_uploaded_file($_FILES['foto3'] ['tmp_name'], $diretorio.$novo_nome3 )	;
              }

              if(isset($_FILES['foto4'])) {
    
	
                $extensao = strtolower (substr($_FILES['foto4'] ['name'], -4));
                $novo_nome4  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
                $diretorio = "fotos_gestao/";
              
              
              
              move_uploaded_file($_FILES['foto4'] ['tmp_name'], $diretorio.$novo_nome4 )	;
                }
        
        $connect = mysqli_connect("62.72.63.187", "remoteicomon", "Rud!n3!@", "hc");  
        $query ="update endereco set descricao = '$descricao', data_cadastro ='$hoje', foto1 = '$novo_nome1', foto2 = '$novo_nome2', foto3 = '$novo_nome3', foto4 = '$novo_nome4', status='JUSTIFICADO' where protocolo = '$protocolo'";
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