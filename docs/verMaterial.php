<?php include "conn.php"; 


session_start();
if(!isset($_SESSION["login"]) &&  !isset($_SESSION["senha"]) )
{
  header("Location: index.html");
  exit;
  
  
}

$ba =$_GET['ba'];  ?>











<!DOCTYPE html>
<html lang="pt-br">
<head>
  
<!-- ///////PASTA BOOTSTRAP ////////////////////-->
   <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">


 <script src="jquery-min.js"></script>
 <script src="jquery-ui.js"></script>
 <script src="jquery-ui.min.js"></script>
<script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>

    <!-- ///////PASTA BOOTSTRAP ////////////////////-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="icon" href="img/icon.ico">






<script type="text/javascript">
function loginsuccessfully()
{
  setTimeout("window.location='cad_mat.php'",3000);
  
  
}



</script>


  

<link rel="icon" href="img/icomon.png">
  <title>Icomon </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    
    <div class="table-responsive">  
                     <table id="myTable" class="table table-striped table-bordered">  
                          <thead>  
                               <tr> 
                                    <td>Ba</td>
                                    <td>Descrição</td>  
                                    <td>Quantidade</td> 
                                    
                               </tr>  
                          </thead> 

<?php

            $sql = mysql_query ("select * from material where ba = '$ba'" );

            $row = mysql_num_rows($sql);


    if (mysql_num_rows($sql) > 0)

    {  ?>




                          <?php

      
         while ($dado = mysql_fetch_assoc($sql))
         {  ?>
            
         
          <tr>
          <td> <?php echo $dado["ba"]; ?></td> 
          <td> <?php echo $dado["descricao"]; ?></td>
          <td> <?php echo $dado["quantidade"]; ?></td> 
          
          </tr>  
         
            
            <?php 
          }
    
    }


?>

        
           

</body>
</html>



