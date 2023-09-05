<?php
// Configurações do banco de dados
$servername = "185.213.81.103";
$username = "u504529778_icomon_";
$password = "Rud!n3!@";
$database = "u504529778_icomon_";

// Cria uma conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Obtém o valor do "BA" da URL
$ba = $_GET['ba'];

// Consulta SQL para buscar os dados na tabela "atividade_bbk" com base no "BA"
$sql = "SELECT * FROM atividade_bbk WHERE ba = '$ba'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Se encontrar resultados, converte os dados em um array associativo
    $row = $result->fetch_assoc();

    // Retorna os dados como JSON
    header('Content-Type: application/json');
    echo json_encode($row);
} else {
    // Se não encontrar resultados, retorna uma resposta vazia ou um erro
    echo "Nenhum resultado encontrado para o BA: $ba";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
