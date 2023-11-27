<?php  include "conn.php";  ?>


<?php 


session_start();

if(!isset($_SESSION["login"]) &&  !isset($_SESSION["senha"]) )
{
  header("Location: atua.php");
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
	setTimeout("window.location='pesq_contato1.php'",1000);
	
	
}
</script> 


<link rel="icon" href="img/logo.png">

<link rel="stylesheet" href="estilopres.css"/>

<meta charset="UTF-8"/>

<title>Icomon</title>


</head>



<body>








<?php

$sa  =$_POST['sa'];
$cliente  =$_POST['cliente'];
$contato  =$_POST['contato'];
$atendeu  =$_POST['atendeu'];
$potencia  =$_POST['potencia'];
$coordenador  =$_POST['coord'];
$funcionalidade  =$_POST['funcionalidade'];
$contador  = $_POST['contador'];
$contador_aguardo  = $_POST['contador'];
$obs  =$_POST['obs'];
$quebra = 'OK';
$status  ='';

$data_ag = $_POST['data_ag'];
$periodo = $_POST['periodo']; 


if($funcionalidade == 'NAO OK')
{

  $status  ='NAO OK';
  
  if($contador == ''){
      
     $quebra = '1º dia'; 
  }
  elseif ($contador == '1'){
    
    $quebra = '3º dia';  
      
  }
  elseif ($contador == '2'){
    
    $quebra = '5º dia';  
      
  }
  elseif ($contador == '3'){
    
    $quebra = '7º dia';  
      
  }
  
  if($trava == "S")
  {

    echo "
    <script language='JavaScript'>
    window.alert('BA EM VALIDACAO POR $trava_por')
    
    </script>";

    echo "<script>saidasuccessfully()</script>";

    break;
    
  }
  else
  {

    $query = "update  reparo_hc set trava = 'S', trava_por = '".$_SESSION['nome']."' where sa = '$sa'";
    $sql = mysql_query($query);


  }
  

}

date_default_timezone_set('America/Sao_Paulo');
$hoje = date('Y-m-d H:i:s');

if( $contador == '' )

{
  $contador  = '1';
  if($funcionalidade == 'SEM RETORNO'){$contador  = $contador_aguardo;}
  $query = "update reparo_hc set coordenador = '$coordenador',status = '$status',contador = '$contador', contato = '$contato', cliente = '$cliente', contato1 = '".$_SESSION['nome']."', data_contato1 = '$hoje', atendeu = '$atendeu', potencia = '$potencia', funcionalidade = '$funcionalidade', obs_contato1 = '$obs', quebra = '$quebra', trava = '0', trava_por = '0', data_ag = '$data_ag', periodo = '$periodo', data_despacho_coord = '$hoje'  where sa = '$sa'";

}
elseif ($contador == '1')
{
  $contador  = '2';
  if($funcionalidade == 'SEM RETORNO'){$contador  = $contador_aguardo;}
  $query = "update reparo_hc set coordenador = '$coordenador',status = '$status',contador = '$contador', contato = '$contato', cliente = '$cliente', contato2 = '".$_SESSION['nome']."', data_contato2 = '$hoje', atendeu_2 = '$atendeu', potencia_2 = '$potencia', funcionalidade_2 = '$funcionalidade', obs_contato2 = '$obs', quebra = '$quebra', trava = '', trava_por = '', data_ag = '$data_ag', periodo = '$periodo', data_despacho_coord = '$hoje'  where sa = '$sa'";
}
elseif ($contador == '2')
{
  $contador  = '3';
  if($funcionalidade == 'SEM RETORNO'){$contador  = $contador_aguardo;}
  $query = "update reparo_hc set coordenador = '$coordenador',status = '$status',contador = '$contador', contato = '$contato', cliente = '$cliente', contato3 = '".$_SESSION['nome']."', data_contato3 = '$hoje', atendeu_3 = '$atendeu', potencia_3 = '$potencia', funcionalidade_3 = '$funcionalidade', obs_contato3 = '$obs', quebra = '$quebra', trava = '', trava_por = '', data_ag = '$data_ag', periodo = '$periodo', data_despacho_coord = '$hoje'  where sa = '$sa'";
}
elseif ($contador == '3')
{
  $status  = 'ENCERRADO';
  $contador  = '4';
  if($funcionalidade == 'SEM RETORNO'){$contador  = $contador_aguardo;}
  $query = "update reparo_hc set coordenador = '$coordenador',status = '$status',contador = '$contador', contato = '$contato', cliente = '$cliente', contato4 = '".$_SESSION['nome']."', data_contato4 = '$hoje', atendeu_4 = '$atendeu', potencia_4 = '$potencia', funcionalidade_4 = '$funcionalidade', obs_contato4 = '$obs', quebra = '$quebra', trava = '', trava_por = '', data_ag = '$data_ag', periodo = '$periodo', data_despacho_coord = '$hoje'  where sa = '$sa'";
}


        

  $sql = mysql_query($query);

      if($sql)
      {

       

        echo "
        <script language='JavaScript'>
        window.alert('ENVIADO COM SUCESSO!')
        
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