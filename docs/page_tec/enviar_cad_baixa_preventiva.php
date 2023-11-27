<?php  include "../conn.php";  ?>


<?php 
$ba =$_POST['ba'];

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
	
    // setTimeout("window.location='cad_material_preventiva.php?ba=<?php // echo $ba ?>'");
    setTimeout("window.location='page_preventivas.php'",1000);
	
	
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
        $teste3 =$_POST['teste3'];
        
        if(isset($_FILES['teste1'])) {
    
	
          $extensao = strtolower (substr($_FILES['teste1'] ['name'], -4));
          $novo_nome1  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
          $diretorio = "../Api/VPS/preventiva_contratual/";
        
        
        
        move_uploaded_file($_FILES['teste1'] ['tmp_name'], $diretorio.$novo_nome1 )	;
          }
          if(isset($_FILES['teste2'])) {
    
	
            $extensao = strtolower (substr($_FILES['teste2'] ['name'], -4));
            $novo_nome2  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
            $diretorio = "../Api/VPS/preventiva_contratual/";
          
          
          
          move_uploaded_file($_FILES['teste2'] ['tmp_name'], $diretorio.$novo_nome2 )	;
            }

            if(isset($_FILES['teste3'])) {
    
	
              $extensao = strtolower (substr($_FILES['teste3'] ['name'], -4));
              $novo_nome3  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
              $diretorio = "../Api/VPS/preventiva_contratual/";
            
            
            
            move_uploaded_file($_FILES['teste3'] ['tmp_name'], $diretorio.$novo_nome3 )	;
              }


              if(isset($_FILES['teste4'])) {
    
	
                $extensao = strtolower (substr($_FILES['teste4'] ['name'], -4));
                $novo_nome4  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
                $diretorio = "../Api/VPS/preventiva_contratual/";
              
              
              
              move_uploaded_file($_FILES['teste4'] ['tmp_name'], $diretorio.$novo_nome4 )	;
                }

              
       
    $query = "UPDATE preventiva_contratual SET descricao='$descricao', tecnico='".$_SESSION["nome"]."',data = '$hoje', foto1  ='$novo_nome1', foto2  ='$novo_nome2', foto3  ='$novo_nome3', foto4  ='$novo_nome4' WHERE ba='$ba'";
    $sql = mysql_query($query);

 
if($sql)
{
 

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