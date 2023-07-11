<?php
ini_set('display_errors', 0 );
error_reporting(0);
?>

<?php
include "coon.php";

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>







<meta charset="UTF-8"/>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">








<img src="img/logo.png"  >







</head>



<body>



<?php

session_start();
if(!isset($_SESSION["senha"]) && !isset($_SESSION["login"]))
{


	

	
	header("Location: index.html");
	
	
     exit;
	}
	
	
	


else
{

	if($_SESSION["acesso"] == 'ADM' ){
  

	header("Location: dashboard.php");

	}

	elseif($_SESSION["acesso"] == 'EDT' ){
  

		header("Location: atualiza_ba.php");
	
	
		}
		elseif($_SESSION["acesso"] == 'DEL' ){
  

			header("Location: encerra_ba.php");
		
			}

	else{

        header("Location: index_col.html");

	}

  
	
}









	

	
	




?>

 





















</body>

</html>