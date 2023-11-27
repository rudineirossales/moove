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
	setTimeout("window.location='validacao.php'",3000);
	
	
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
	setTimeout("window.location='validacao.php'",3000);
	
	
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
$hoje = date('Y-m-d H:i:s');
$ba =$_POST['ba'];
$obs_rej =$_POST['obs_rej']; 
$opc =$_POST['opc']; 
$teste1 =$_POST['teste1']; 
$teste2 =$_POST['teste2']; 
$tipo =$_POST['tipo']; 
$nome =$_POST['nome']; 
$cabo =$_POST['cabo']; 
$trecho =$_POST['entre_local']; 





if ($opc == 'validar')
{

  $status = 'ENCERRADO';

    if(isset($_FILES['teste1'])) {
    
	
    $extensao = strtolower (substr($_FILES['teste1'] ['name'], -4));
    $novo_nome1  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
    $diretorio = "../Api/Backbone/backbone_foto/";
  
  
  
  move_uploaded_file($_FILES['teste1'] ['tmp_name'], $diretorio.$novo_nome1 )	;
    }
 

    $query = "update  atividade_bbk set cabo = '$cabo', trecho = '$trecho', status = 'ENCERRADO', justificativa = '', nome_validacao = '".$_SESSION['nome']."', data_validacao = '$hoje', trava_ba = '', trava_por = '', evidencia3 = '$novo_nome1' where ba = '$ba'";
    
    $query4 = "insert into logs (ba,status,nome,id,data)";
    $query4.= "values ('$ba','ENCERRADO','".$_SESSION['nome']."','".$_SESSION['id']."','$hoje')";
    $query6 = "update  atividade set status = 'ENCERRADO', data_encerramento = '$hoje'  where ba_apoio = '$ba'";
    $sql4 = mysql_query($query4);
    $sql6 = mysql_query($query6);
    
    $por = $_SESSION['nome'];
    include "telegram.php";

}

else
{

    $status = 'REPROVADO';
    
    
    $query = "update  atividade_bbk set status = 'REPROVADO', justificativa = '$obs_rej', trava_ba = '', trava_por = '', data_rejeicao = '$hoje', nome_rejeicao = '".$_SESSION['nome']."', cabo = '$cabo', trecho = '$trecho' where ba = '$ba'";
    $query1 = "delete from material where ba = '$ba'";

    $query4 = "insert into logs (ba,status,nome,id,data)";
    $query4.= "values ('$ba','REPROVADO','".$_SESSION['nome']."','".$_SESSION['id']."','$hoje')";
    $sql4 = mysql_query($query4);
    $por = $_SESSION['nome'];
    include "telegram.php";
    
   
   


}




$sql = mysql_query($query);




if($sql)
{
  

  $sql1 = mysql_query($query1);

  if($opc == 'validar'){

    echo "
    <script language='JavaScript'>
    window.alert('VALIDADA')
    
    </script>";
  
    echo "<script>saidasuccessfully()</script>";

  }
  else{

  
  echo "
  <script language='JavaScript'>
  window.alert('REJEITADA')
  
  </script>";

  echo "<script>saidasuccessfully()</script>";
  

     }     
  

  
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