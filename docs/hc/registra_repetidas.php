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
	
	setTimeout("window.location='repetidas.php'");
	
}
</script> 


<link rel="icon" href="img/logo.png">

<link rel="stylesheet" href="estilopres.css"/>

<meta charset="UTF-8"/>

<title>ICOMON</title>


</head>



<body>








<?php
       
        $sa  =$_POST['sa'];
        $causareparo  =$_POST['causareparo'];
        $descricao  =$_POST['descricao'];
        $foto_potencia  =$_POST['foto_potencia'];
        $foto_ont  =$_POST['foto_ont'];
        $foto_velocidade  =$_POST['foto_velocidade'];
        $foto_rat  =$_POST['foto_rat'];



        if(isset($_FILES['foto_potencia'])) {
    
	
          $extensao = strtolower (substr($_FILES['foto_potencia'] ['name'], -4));
          $novo_nome1  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
          $diretorio = "fotos_gestao/";
        
        
        
        move_uploaded_file($_FILES['foto_potencia'] ['tmp_name'], $diretorio.$novo_nome1 )	;
          }

          if(isset($_FILES['foto_ont'])) {
    
	
            $extensao = strtolower (substr($_FILES['foto_ont'] ['name'], -4));
            $novo_nome2  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
            $diretorio = "fotos_gestao/";
          
          
          
          move_uploaded_file($_FILES['foto_ont'] ['tmp_name'], $diretorio.$novo_nome2 )	;
            }

            if(isset($_FILES['foto_velocidade'])) {
    
	
              $extensao = strtolower (substr($_FILES['foto_velocidade'] ['name'], -4));
              $novo_nome3  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
              $diretorio = "fotos_gestao/";
            
            
            
            move_uploaded_file($_FILES['foto_velocidade'] ['tmp_name'], $diretorio.$novo_nome3 )	;
              }

              if(isset($_FILES['foto_rat'])) {
    
	
                $extensao = strtolower (substr($_FILES['foto_rat'] ['name'], -4));
                $novo_nome4  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
                $diretorio = "fotos_gestao/";
              
              
              
              move_uploaded_file($_FILES['foto_rat'] ['tmp_name'], $diretorio.$novo_nome4 )	;
                }
        
        $connect = mysqli_connect("62.72.63.187", "remoteicomon", "Rud!n3!@", "hc");  
        $query ="update repetida set resultado_auditoria = '$descricao', causa_reparo = '$causareparo', data_cadastro ='$hoje', foto_potencia = '$novo_nome1', foto_ont = '$novo_nome2', foto_velocidade = '$novo_nome3', foto_rat = '$novo_nome4', status='JUSTIFICADO' where sa = '$sa'";
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