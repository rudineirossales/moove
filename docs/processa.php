<script type="text/javascript">
function saidasuccessfully()
{
	setTimeout("window.location='index_col.html'",1000);
	
	
}
</script> 



<?php 

include "conn.php"; 

session_start();



$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

date_default_timezone_set('America/Sao_Paulo');
$hoje = date('Y-m-d H:i:s');


if(!empty($dados['CadUsuario'])){

     foreach($dados['nome'] as $chave => $valor){

            

            $descricao = $dados['nome'][$chave];
            $quantidade = $dados['email'][$chave];
            $ba = $dados['ba'];

            $query = "INSERT INTO material (descricao,quantidade,ba,data)";
            $query.= "values ('$descricao', '$quantidade', '$ba', '$hoje')";
            $sql = mysql_query($query);

     }

     if($sql)
{
   $query2 = "update atividade set status = 'EM VALIDACAO' where ba = '$ba'";
   $sql2 = mysql_query($query2);
   
  $query4 = "insert into logs (ba,status,nome,id,data)";
  $query4.= "values ('$ba','EM VALIDACAO','".$_SESSION['nome']."','".$_SESSION['id']."','$hoje')";
  $sql4 = mysql_query($query4);
 
  
  echo "
  <script language='JavaScript'>
  window.alert('EM VALIDAÇÃO')
  
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