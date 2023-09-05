<?php  
include "conn.php"; 

date_default_timezone_set('America/Sao_Paulo');
$hoje = date('Y-m-d H:i:s');

// MARCIO
                            
$sql2 = mysql_query ("select causa,estacao, data_validacao,ba,tipo,endereco,data_encerramento,status,vistoria,nome_gestor from atividade where status = 'ENCERRADO' and vistoria = '' and tipo= '97' and nome_gestor = 'marcio alves'  and MONTH(data_encerramento) = MONTH(NOW()) -1 order by ba asc limit 30;" );
$row = mysql_num_rows($sql2); 


while($dado = mysql_fetch_assoc($sql2))  
{ 

   $endereco = $dado["endereco"];
   $estacao = $dado["estacao"];
   $ba = $dado["ba"];
   $data_validacao = $dado["data_validacao"];
   $causa = $dado["causa"];
   
   
   $nome_gestor = $dado["nome_gestor"];

   $query = "insert into pos_ba (ba,estacao,endereco,status,nome_gestor,id_gestor,data_escolha,data_validacao,causa)";
   $query.= "values ('$ba','$estacao','$endereco','PENDENTE','$nome_gestor','44921','$hoje','$data_validacao','$causa')";
  
   $sql = mysql_query($query);
   
   $query3 = "update atividade set vistoria = 'S' where ba = '$ba'";
   $sql3 = mysql_query($query3);
  
    


}   

// MARLOS

$sql2 = mysql_query ("select causa,estacao, data_validacao,ba,tipo,endereco,data_encerramento,status,vistoria,nome_gestor from atividade where status = 'ENCERRADO' and vistoria = '' and tipo= '97' and nome_gestor = 'Marlos Ueldes'  and MONTH(data_encerramento) = MONTH(NOW()) -1 order by ba asc limit 30;" );
$row = mysql_num_rows($sql2); 


while($dado = mysql_fetch_assoc($sql2))  
{ 

   $endereco = $dado["endereco"];
   $estacao = $dado["estacao"];
   $ba = $dado["ba"];
   $data_validacao = $dado["data_validacao"];
   $causa = $dado["causa"];
   
   
   $nome_gestor = $dado["nome_gestor"];

   $query = "insert into pos_ba (ba,estacao,endereco,status,nome_gestor,id_gestor,data_escolha,data_validacao,causa)";
   $query.= "values ('$ba','$estacao','$endereco','PENDENTE','$nome_gestor','45041','$hoje','$data_validacao','$causa')";
  
   $sql = mysql_query($query);
   
   $query3 = "update atividade set vistoria = 'S' where ba = '$ba'";
   $sql3 = mysql_query($query3);
  
    


}    


// RODRIGO

$sql2 = mysql_query ("select causa,estacao, data_validacao,ba,tipo,endereco,data_encerramento,status,vistoria,nome_gestor from atividade where status = 'ENCERRADO' and vistoria = '' and tipo= '97' and nome_gestor = 'Rodrigo Jorge'  and MONTH(data_encerramento) = MONTH(NOW()) -1 order by ba asc limit 30;" );
$row = mysql_num_rows($sql2); 


while($dado = mysql_fetch_assoc($sql2))  
{ 

   $endereco = $dado["endereco"];
   $estacao = $dado["estacao"];
   $ba = $dado["ba"];
   $data_validacao = $dado["data_validacao"];
   $causa = $dado["causa"];
   
   
   $nome_gestor = $dado["nome_gestor"];

   $query = "insert into pos_ba (ba,estacao,endereco,status,nome_gestor,id_gestor,data_escolha,data_validacao,causa)";
   $query.= "values ('$ba','$estacao','$endereco','PENDENTE','$nome_gestor','44968','$hoje','$data_validacao','$causa')";
  
   $sql = mysql_query($query);
   
   $query3 = "update atividade set vistoria = 'S' where ba = '$ba'";
   $sql3 = mysql_query($query3);
  
    


}    


// BESSA

$sql2 = mysql_query ("select causa,estacao, data_validacao,ba,tipo,endereco,data_encerramento,status,vistoria,nome_gestor from atividade where status = 'ENCERRADO' and vistoria = '' and tipo= '97' and nome_gestor = 'Wesley Bessa'  and MONTH(data_encerramento) = MONTH(NOW()) -1 order by ba asc limit 30;" );
$row = mysql_num_rows($sql2); 


while($dado = mysql_fetch_assoc($sql2))  
{ 

   $endereco = $dado["endereco"];
   $estacao = $dado["estacao"];
   $ba = $dado["ba"];
   $ba = $dado["causa"];
   $data_validacao = $dado["data_validacao"];
   
   
   $nome_gestor = $dado["nome_gestor"];

   $query = "insert into pos_ba (ba,estacao,endereco,status,nome_gestor,id_gestor,data_escolha,data_validacao,causa)";
   $query.= "values ('$ba','$estacao','$endereco','PENDENTE','$nome_gestor','46077','$hoje','$data_validacao','$causa')";
  
   $sql = mysql_query($query);
   
   $query3 = "update atividade set vistoria = 'S' where ba = '$ba'";
   $sql3 = mysql_query($query3);
  
    


}    


// WAGNER

$sql2 = mysql_query ("select causa,estacao, data_validacao,ba,tipo,endereco,data_encerramento,status,vistoria,nome_gestor from atividade where status = 'ENCERRADO' and vistoria = '' and tipo= '97' and nome_gestor = 'WAGNER MONTEIRO'  and MONTH(data_encerramento) = MONTH(NOW()) -1 order by ba asc limit 30;" );
$row = mysql_num_rows($sql2); 


while($dado = mysql_fetch_assoc($sql2))  
{ 

   $endereco = $dado["endereco"];
   $estacao = $dado["estacao"];
   $ba = $dado["ba"];
   $causa = $dado["causa"];
   $data_validacao = $dado["data_validacao"];
   
   
   $nome_gestor = $dado["nome_gestor"];

   $query = "insert into pos_ba (ba,estacao,endereco,status,nome_gestor,id_gestor,data_escolha,data_validacao,causa)";
   $query.= "values ('$ba','$estacao','$endereco','PENDENTE','$nome_gestor','45186','$hoje','$data_validacao','$causa')";
  
   $sql = mysql_query($query);
   
   $query3 = "update atividade set vistoria = 'S' where ba = '$ba'";
   $sql3 = mysql_query($query3);
  
    


}    
?>  