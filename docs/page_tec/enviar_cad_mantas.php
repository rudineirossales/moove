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
	setTimeout("window.location='cad_manta.php'");
	
	
}
</script> 


<link rel="icon" href="img/logo.png">

<link rel="stylesheet" href="estilopres.css"/>

<meta charset="UTF-8"/>

<title>ICOMON</title>


</head>



<body>








<?php



        
        $uf =$_POST['uf'];
        $cidade =$_POST['cidade'];
        $endereco =$_POST['endereco'];
        $bairro =$_POST['bairro'];
        $tipo_aplicacao =$_POST['tipo_aplicacao'];
        $estacao =$_POST['estacao'];
        $rede =$_POST['rede'];
        $capacidade_cabo =$_POST['capacidade_cabo'];
        $qtd_mantas =$_POST['qtd_mantas'];
        $qtd_plaquetas =$_POST['qtd_plaquetas'];
        $qtd_espiral =$_POST['qtd_espiral'];
        $reserva_tecnica =$_POST['reserva_tecnica'];
        $coordenador =$_POST['coordenador'];
        $descricao =$_POST['descricao'];
        $teste1 =$_POST['teste1'];
        $teste2 =$_POST['teste2'];
        $latitude =$_POST['latitude'];
        $longitude =$_POST['longitude'];
       
        
        if(isset($_FILES['teste1'])) {
    
	
          $extensao = strtolower (substr($_FILES['teste1'] ['name'], -4));
          $novo_nome1  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
          $diretorio = "../Api/VPS/MATAS/Preventivas_mantas_fotos/";
        
        
        
        move_uploaded_file($_FILES['teste1'] ['tmp_name'], $diretorio.$novo_nome1 )	;
          }
          if(isset($_FILES['teste2'])) {
    
	
            $extensao = strtolower (substr($_FILES['teste2'] ['name'], -4));
            $novo_nome2  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
            $diretorio = "../Api/VPS/MATAS/Preventivas_mantas_fotos/";
          }
          
       
            $query2 = "INSERT INTO mantas (uf,cidade,endereco,bairro,tipo,estacao,tipo_rede,cabo,mantas,plaquetas,espiral,reserva_tecnica,coordenador,descricao,foto_antes,foto_depois,contato,data,latitude,longitude)";
            $query2.= "values ('$uf','$cidade','$endereco','$bairro','$tipo_aplicacao','$estacao','$rede','$capacidade_cabo','$qtd_mantas','$qtd_plaquetas','$qtd_espiral','$reserva_tecnica','$coordenador','$descricao','$novo_nome1','$novo_nome2','".$_SESSION["nome"]."','$hoje','$latitude','$longitude')";
            $sql2 = mysql_query($query2);


if($sql2)
{

  echo "<script language='JavaScript'>
   window.alert('Cadastrada com sucesso');
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