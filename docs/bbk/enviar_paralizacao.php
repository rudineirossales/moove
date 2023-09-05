<?php  include "conn.php";  ?>


<?php 


session_start();

if(!isset($_SESSION["login"]) &&  !isset($_SESSION["senha"]) )
{
  header("Location: dashboard_bbk.php");
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
	setTimeout("window.location='dashboard_bbk.php'",1000);
	
	
}
</script> 


<link rel="icon" href="img/logo.png">

<link rel="stylesheet" href="estilopres.css"/>

<meta charset="UTF-8"/>

<title>Icomon</title>


</head>



<body>

<?php

$ba  =$_POST['ba'];
$status  =$_POST['status'];
$motivo  =$_POST['motivo'];
$just  =$_POST['just'];





        if($status  <> 'PARALIZADO')
        {

          $log = "PARALIZADO";
 
        $query = "update atividade_bbk set status = 'PARALIZADO', just_paralizacao = '$just', data_paralizacao = NOW(), data_liberacao = '', motivo_paralizacao = '$motivo', nome_paralizacao = '".$_SESSION['nome']."' where ba = '$ba'";

        }
        if($status ==  'PARALIZADO')
        {

          $log = "LIBERADO";

        $query = "update atividade_bbk set status = 'EM ANDAMENTO', data_liberacao = NOW(), nome_liberacao = '".$_SESSION['nome']."' where ba = '$ba'";

        }

        

        $sql = mysql_query($query);




      if($sql)
      {
        $query4 = "insert into logs (ba,status,nome,id,data)";
        $query4.= "values ('$ba','$log','".$_SESSION['nome']."','".$_SESSION['id']."',NOW())";
        $sql4 = mysql_query($query4);


        echo "
        <script language='JavaScript'>
        window.alert('EDITADO SUCESSO!')
        
        </script>";

        echo "<script>saidasuccessfully()</script>";
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