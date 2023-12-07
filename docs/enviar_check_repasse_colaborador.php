<?php  include "conn.php";  ?>



<!DOCTYPE html>
<html lang="pt-br">

<head> 
<link href="css/style.css" rel="stylesheet">
<link rel="icon" href="img/icon.ico">

<script type="text/javascript">
function saidasuccessfully()

{
	setTimeout("window.location='pesq_cx_col_adm.php'",1000);
	
	
}
</script> 


<link rel="icon" href="img/logo.png">

<link rel="stylesheet" href="estilopres.css"/>

<meta charset="UTF-8"/>

<title>Icomon</title>


</head>



<body>


<?php

//Declaramos a variável que vai receber o conteúdo da lista
$ba = null;

//Verificamos se o índice existe
if (isset($_POST['ba']))

    //Atribuimos a variável todo conteúdo do índice
    $ba = $_POST['ba'];
    $tec = $_POST['tec'];

    $sql2 = "SELECT * FROM usuario  where  id = '$tec' ";
      $qr = mysql_query($sql2) or die(mysql_error());
      while($ln = mysql_fetch_assoc($qr)) 
      {
        $funcao = $ln['funcao'];
      }                                
                                        

//Verificamos se a variável não é nula
if ($ba !== null)

    //Percorremos todos os conteúdos do array
    for ($i = 0; $i < count($ba); $i++) 
    {
    
        //exibimos o valor atual na tela
        echo "<p>{$ba[$i]}</p>";
        echo "<p>{$tec}</p>";

        if($funcao == 'COORD')
        {
          $query = "update atividade set id_usu = '$tec', status = 'DESPCOORD' where ba = '$ba[$i]'";
        }
        else
        {
          $query = "update atividade set id_usu = '$tec', status = 'DESPTEC' where ba = '$ba[$i]'";
        }
        
       
        $sql = mysql_query($query);
    }
        


/**
 * Recebe um parâmetro e exibe o seu conteúdo
 *
 * @param  mixed $param
 * @return void
 */

 if($sql)
      {
          
            
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


