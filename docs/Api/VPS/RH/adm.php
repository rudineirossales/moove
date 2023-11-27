<?php
// Conexão com o banco de dados (substitua pelas suas informações)
$servername = "62.72.63.187"; // Altere para o endereço do seu servidor MySQL
$username = "remoteicomon"; // Altere para o nome de usuário do seu banco de dados
$password = "Rud!n3!@"; // Altere para a senha do seu banco de dados
$dbname = "icomon";

// Obtém o ID do gestor da URL
$idGestor =  $_GET['id'];


// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Query para buscar o nome do gestor com base no ID
$query = "SELECT acesso, nome_gestor FROM usuario WHERE id = $idGestor";

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
