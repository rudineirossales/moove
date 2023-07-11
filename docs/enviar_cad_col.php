<?php  include "conn.php";  ?>


<?php 


session_start();

if(!isset($_SESSION["login"]) &&  !isset($_SESSION["senha"]) )
{
  header("Location: index.html");
  exit;
  
  
}



 


?>





<?php

session_start();













	

	
//}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
<link href="css/style.css" rel="stylesheet">
<link rel="icon" href="img/icon.ico">

<script type="text/javascript">
function saidasuccessfully()
{
	setTimeout("window.location='cad_col.php'",1000);
	
	
}
</script> 


<link rel="icon" href="img/logo.png">

<link rel="stylesheet" href="estilopres.css"/>

<meta charset="UTF-8"/>

<title>Gerencia Estoque</title>


</head>



<body>








<?php



$id =$_POST['id'];
$nome =$_POST['nome']; 
$coord =$_POST['coord'];
$id_coord =$_POST['tec'];
$login =$_POST['login'];
$senha =$_POST['senha'];
$acesso =$_POST['acesso'];



$sql = mysql_query ("select * from usuario where id = '$id'");
$row = mysql_num_rows($sql);

if ($row > 0)
{

  echo "
  <script language='JavaScript'>
  window.alert('COLABORADOR JÁ CADASTRADO, VERIFIQUE!!')
  
  </script>";

  echo "<script>saidasuccessfully()</script>";
}


else

{



$query = "insert into usuario (id,nome,id_gestor,nome_gestor,login,senha,funcao,acesso)";

$query.= "values ('$id','$nome','$id_coord','$coord','$login','$senha','$funcao','$acesso')";























$sql = mysql_query($query);




if($sql)
{
  
 

  
  echo "
  <script language='JavaScript'>
  window.alert('CADASTRADO COM SUCESSO!')
  
  </script>";

  echo "<script>saidasuccessfully()</script>";
  

 ;
  

  
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


}





?>

<div style="display: flex; justify-content: center; align-items: center; padding: 17%;">
  <img src="img/logo.png">
</div>

</body>


</html>