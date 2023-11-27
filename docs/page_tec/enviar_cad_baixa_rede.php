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


$sql3 = mysql_query ("select * from preventivass where ba = '$ba'" );

$row = mysql_num_rows($sql3);


    if (mysql_num_rows($sql3) > 0)

    {


      echo "
      <script language='JavaScript'>
      window.alert('BA JÁ CADASTRADO!')
      
      </script>";

      echo "<script>saidasuccessfully()</script>";

      break;

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
	setTimeout("window.location='cad_melhorias_rede.php'");
	
	
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
        $celula =$_POST['celula'];
        $endereco =$_POST['endereco'];
        $estacao =$_POST['estacao'];
        $rede =$_POST['rede'];
        $qtd_plaquetas =$_POST['qtd_plaquetas'];
        $reserva_tecnica =$_POST['reserva_tecnica'];
        $cabo_desespinado =$_POST['cabo_desespinado'];
        $travessia =$_POST['travessia'];
        $cdoe =$_POST['cdoe'];
        $hubbox =$_POST['hubbox'];
        $rede_metros =$_POST['rede_metros'];
        $lancamento_cabo =$_POST['lancamento_cabo'];
        $capacidade_cabo =$_POST['capacidade_cabo'];
        $duto_lateral =$_POST['duto_lateral'];
        $poste =$_POST['poste'];
        $poste_remocao =$_POST['poste_remocao'];
        $coordenador =$_POST['coordenador'];
        $descricao =$_POST['descricao'];
        $teste1 =$_POST['teste1'];
        $teste2 =$_POST['teste2'];
        $teste3 =$_POST['teste3'];
        $teste4 =$_POST['teste4'];
        
        if(isset($_FILES['teste1'])) {
    
	
          $extensao = strtolower (substr($_FILES['teste1'] ['name'], -4));
          $novo_nome1  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
          $diretorio = "../Api/VPS/PREVENTIVAS/Preventivas/";
        
        
        
        move_uploaded_file($_FILES['teste1'] ['tmp_name'], $diretorio.$novo_nome1 )	;
          }
          if(isset($_FILES['teste2'])) {
    
	
            $extensao = strtolower (substr($_FILES['teste2'] ['name'], -4));
            $novo_nome2  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
            $diretorio = "../Api/VPS/PREVENTIVAS/Preventivas/";
          
          
          
          move_uploaded_file($_FILES['teste2'] ['tmp_name'], $diretorio.$novo_nome2 )	;
            }

            if(isset($_FILES['teste3'])) {
    
	
              $extensao = strtolower (substr($_FILES['teste3'] ['name'], -4));
              $novo_nome3  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
              $diretorio = "../Api/VPS/PREVENTIVAS/Preventivas/";
            
            
            
            move_uploaded_file($_FILES['teste3'] ['tmp_name'], $diretorio.$novo_nome3 )	;
              }

              if(isset($_FILES['teste4'])) {
    
	
                $extensao = strtolower (substr($_FILES['teste4'] ['name'], -4));
                $novo_nome4  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
                $diretorio = "../Api/VPS/PREVENTIVAS/Preventivas/";
              
              
              
              move_uploaded_file($_FILES['teste4'] ['tmp_name'], $diretorio.$novo_nome4 )	;
                }
       
                $query2 = "INSERT INTO preventivass (ba,uf,cidade,celula,endereco,estacao,tipo_rede,plaquetas,reserva_tecnica,cabo_desespinado,travessias_regularizadas,cdoe_regularizada,hubbox,rede_regularizada,lancamento_cabo,capacidade_cabo,duto_lateral,instalacao_poste,remocao_poste,foto1,foto2,foto_antes,foto_depois,coordenador,descricao,data,contato)";
                $query2.= "values ('$ba','$uf','$cidade','$celula','$endereco','$estacao','$rede','$qtd_plaquetas','$reserva_tecnica','$cabo_desespinado','$travessia','$cdoe','$hubbox','$rede_metros','$lancamento_cabo','$capacidade_cabo','$duto_lateral','$poste','$poste_remocao','$novo_nome1','$novo_nome2','$novo_nome3','$novo_nome4','$coordenador','$descricao','$hoje','".$_SESSION["id"]."')";
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