<script type="text/javascript">
function saidasuccessfully()
{
	setTimeout("window.location='page_preventivas.php'",1000);
	
	
}
</script> 



<?php 

include "../conn.php"; 

session_start();



$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

date_default_timezone_set('America/Sao_Paulo');
$hoje = date('Y-m-d H:i:s');


if(!empty($dados['CadUsuario'])){

     foreach($dados['nome'] as $chave => $valor){

            

            $descricao = $dados['nome'][$chave];
            $quantidade = $dados['email'][$chave];
            $ba = $dados['ba'];

            $query = "INSERT INTO material_preventiva_contratual (descricao,quantidade,ba)";
            $query.= "values ('$descricao', '$quantidade', '$ba')";
            $sql = mysql_query($query);

     }

     if($sql)
{
   $query2 = "update preventiva_contratual set status = 'CONCLUIDO' where ba = '$ba'";
   $sql2 = mysql_query($query2);
   
 
  
  echo "
  <script language='JavaScript'>
  window.alert('CONCLUIDO')
  
  </script>";

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

}
else{

   echo $ba;

}








?>