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
	setTimeout("window.location='validacao.php'");
	
	
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



$ba =$_GET['ba'];
$query = "update  atividade_bbk set trava_ba = '', trava_por = '' where ba = '$ba'";
$sql = mysql_query($query);




if($sql)
{
  

  $sql1 = mysql_query($query1);

 

    echo "
    <script language='JavaScript'>
    window.alert('BA LIBERADO')
    
    </script>";
  
    echo "<script>saidasuccessfully()</script>";

}
else
{
  
  echo "<script language='JavaScript'>
   window.alert('ERRO!!');
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