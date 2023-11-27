<?php
// Conecta ao banco de dados (substitua com suas próprias credenciais)

$servername = "62.72.63.187"; // Altere para o endereço do seu servidor MySQL
$username = "remoteicomon"; // Altere para o nome de usuário do seu banco de dados
$password = "Rud!n3!@"; // Altere para a senha do seu banco de dados
$dbname = "icomon";


$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão com o banco de dados
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Área a ser filtrada (FTTH)
$area = "FTTH"; // Substitua pela área desejada

// Consulta SQL para obter todos os materiais da área FTTH
$sql = "SELECT descricao FROM material_ftth_bbk WHERE area = '$area'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $materiais = array();

    // Lê os resultados da consulta
    while ($row = $result->fetch_assoc()) {
        $materiais[] = $row['descricao'];
    }

    // Define o cabeçalho Content-Type
    header('Content-Type: application/json');

    // Retorna os materiais como JSON
    echo json_encode($materiais);
} else {
    // Não foram encontrados materiais para a área FTTH
    echo "Nenhum material encontrado para a área FTTH.";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
