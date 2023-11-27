<?php
// Configurações do banco de dados

$servername = "62.72.63.187"; // Altere para o endereço do seu servidor MySQL
$username = "remoteicomon"; // Altere para o nome de usuário do seu banco de dados
$password = "Rud!n3!@"; // Altere para a senha do seu banco de dados
$dbname = "icomon";



$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Recupera o parâmetro "ba" da URL
$ba = $_GET['ba'];

// Consulta os dados do ba no banco de dados
$sql = "SELECT * FROM atividade_bbk WHERE ba = '$ba'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Retorna os dados do ba como JSON
    header('Content-Type: application/json');
    echo json_encode($row);
} else {
    // Retorna uma resposta de erro caso o ba não seja encontrado
    header('HTTP/1.0 404 Not Found');
    echo "Ba não encontrado";
}

$conn->close();
?>
