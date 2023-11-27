<?php  
include "conn.php"; 

date_default_timezone_set('America/Sao_Paulo');
$hoje = date('Y-m-d H:i:s');

// BESSA
                            
$sql2 = mysql_query ("select causa,estacao, data_validacao,ba,tipo,endereco,data_encerramento,status,vistoria,nome_gestor from atividade where status = 'ENCERRADO' and vistoria = '' and tipo= '97' and nome_gestor = 'Wesley Bessa'  and MONTH(data_encerramento) = MONTH(NOW()) -1 and causa = 'VANDALISMO' or 
status = 'ENCERRADO' and vistoria = '' and tipo= '97' and nome_gestor = 'Wesley Bessa'  and MONTH(data_encerramento) = MONTH(NOW()) -1 and causa = 'ACAO DE TERCEIROS' or
status = 'ENCERRADO' and vistoria = '' and tipo= '97' and nome_gestor = 'Wesley Bessa'  and MONTH(data_encerramento) = MONTH(NOW()) -1 and causa = 'CARGA ALTA/CABO BAIXO'
order by ba asc limit 20;" );
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





?>