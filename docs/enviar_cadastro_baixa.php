<?php  include "conn.php";  ?>


<?php 
$ba =$_POST['ba'];

session_start();

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
<link href="css/style.css" rel="stylesheet">
<link rel="icon" href="img/icon.ico">

<script type="text/javascript">
function saidasuccessfully()
{
	setTimeout("window.location='cad_material.php?ba=<?php echo $ba ?>'");
	
	
}
</script> 


<link rel="icon" href="img/logo.png">

<link rel="stylesheet" href="estilopres.css"/>

<meta charset="UTF-8"/>

<title>ICOMON</title>


</head>



<body>








<?php



        
        $ro =$_POST['ro'];
        $cis =$_POST['cis'];
        $causa =$_POST['causa'];
        $sub =$_POST['sub'];
        $cabo =$_POST['cabo'];
        $qtd_cabo =$_POST['qtd_cabo'];
        $caixa =$_POST['caixa'];
        $qtd_cx =$_POST['qtd_cx'];
        $cdoe =$_POST['cdoe'];
        $qtd_cdoe =$_POST['qtd_cdoe'];
        $obs =$_POST['obs'];
        $teste1 =$_POST['teste1'];
        $teste2 =$_POST['teste2'];

        
    
	

      
    
        if(isset($_FILES['teste1'])) {
    
	
          $extensao = strtolower (substr($_FILES['teste1'] ['name'], -4));
          $novo_nome1  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
          $diretorio = "arquivo/";
        
        
        
        move_uploaded_file($_FILES['teste1'] ['tmp_name'], $diretorio.$novo_nome1 )	;
          }

          if(isset($_FILES['teste2'])) {
    
	
            $extensao = strtolower (substr($_FILES['teste2'] ['name'], -4));
            $novo_nome2  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
            $diretorio = "arquivo/";
          
          
          
          move_uploaded_file($_FILES['teste2'] ['tmp_name'], $diretorio.$novo_nome2 )	;
            }
          
    
        $connect = mysqli_connect("localhost", "root", "", "icomom_");  
        $query ="select * from atividade where ba = '$ba'";
        $result = mysqli_query($connect, $query); 
                          
        while($row = mysqli_fetch_array($result))  
        {

          $status = $row["status"];


        }  

      
      
        

     
    $query = "update atividade set causa = '$causa', sub = '$sub', ro = '$ro', cis = '$cis', obs = '$obs', ba = '$ba', data_encerramento = NOW(), evidencia3 = '$novo_nome1', evidencia4 = '$novo_nome2'  where ba = '$ba'";
    
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