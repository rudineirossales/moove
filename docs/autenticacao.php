<?php
include "conn.php";

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>


    <!-- ///////PASTA BOOTSTRAP ////////////////////-->
   
		<link href="css/style.css" rel="stylesheet">


<script src="jquery-min.js"></script>
<script src="jquery-ui.js"></script>
<script src="jquery-ui.min.js"></script>
<script src="js/jquery.js"></script>
 <script src="js/bootstrap.min.js"></script>

	 <!-- ///////PASTA BOOTSTRAP ////////////////////-->

<script type="text/javascript">
function loginsuccessfully()
{
	setTimeout("window.location='paine.php'",4000);
	
	
}

function loginfailed()

{
	
	setTimeout("window.location='index.html'",3000);
	
}

</script>





  <link rel="icon" href="img/icomon.png">
<meta charset="UTF-8"/>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>



<body>





<?php

$senha=$_POST['senha'];
$login=$_POST['login'];
$autenticacao = $_POST['autenticacao'];


$sql = mysql_query("select * from usuario where senha  = '$senha' and login = '$login' ");




$row = mysql_num_rows($sql );

	
if($row > 0  )
{
	
	while ($linha =  mysql_fetch_assoc($sql) 	)
	{
	$nome = $linha['nome'];
	$id = $linha['id'];
    $login = $linha['login'];
    $senha = $linha['senha'];
    $acesso = $linha['acesso'];
    $nome_gestor = $linha['nome_gestor'];
	$id_gestor = $linha['id_gestor'];
	$funcao = $linha['funcao'];
	$gram = $linha['gram'];
	
 
    
    
	
	
	}
	
	session_start();
	
	$_SESSION['nome']=$nome;
	$_SESSION['id']=$id;
	$_SESSION['login'] =$login;
    $_SESSION['senha'] =$senha;
    $_SESSION['acesso'] =$acesso;
    $_SESSION['nome_gestor'] =$nome_gestor;
	$id_gestor['id_gestor'] =$ga;
	$_SESSION['funcao'] =$funcao;
	$_SESSION['autenticacao'] = $autenticacao;
	$_SESSION['gram'] = $gram;



	




	echo "<div style='background:rgba(52, 87, 139, 1); padding:3px; text-align:center;'><span style='font-size:20px;'>Oi $nome! Você foi logado (a) com sucesso!</span></div>";

	

	 echo "<script>loginsuccessfully()</script>";

	
}
else
{
	echo "<br> <div style='background:rgba(52, 87, 139, 1); padding:3px; text-align:center;'><span style='font-size:20px;'>Senha ou Login inválidos</span></div>";

	
	echo "<script>loginfailed()</script>";

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