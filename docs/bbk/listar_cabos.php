<?php  

require_once "conn.php";

$dados_banco  = $con->query("SELECT *  FROM  cabo");
echo json_encode($dados_banco->fetchALL(PDO::FETCH_ASSOC));


?> 