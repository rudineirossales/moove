<?php
// Conexão com o banco de dados (substitua pelas suas informações)
 $servername = "185.213.81.103";
    $username = "u504529778_icomon_";
    $password = "Rud!n3!@";
    $dbname = "u504529778_icomon_";

// Obtém o ID do gestor da URL
$idGestor =  $_GET['id'];


// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Query para buscar o nome do gestor com base no ID
$query = "SELECT nome, id_gestor FROM usuario WHERE id = $idGestor";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Retorna o resultado como um objeto JSON
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    // Caso o gestor não seja encontrado, retorne um JSON vazio ou uma mensagem de erro
    echo json_encode(array('message' => 'Gestor não encontrado'));
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
