<?php

// Conexão com o banco de dados (substitua pelos seus dados de conexão)
$servername = "62.72.63.187"; // Altere para o endereço do seu servidor MySQL
$username = "remoteicomon"; // Altere para o nome de usuário do seu banco de dados
$password = "Rud!n3!@"; // Altere para a senha do seu banco de dados
$dbname = "icomon";
// Verifica se foi recebido o parâmetro 'causa' na requisição
if (isset($_GET['causa'])) {
    $causaSelecionada = $_GET['causa'];

    // Criar conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Consulta para buscar as subcausas da causa selecionada no banco de dados
    $sql = "SELECT sub FROM causasub WHERE causa = '$causaSelecionada' GROUP BY sub";

    $result = $conn->query($sql);

    $subs = array();

    if ($result) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $subs[] = $row["sub"];
            }
        }
        // Retornar os dados em formato JSON
        header('Content-Type: application/json');
        echo json_encode($subs);
    } else {
        // Retornar mensagem de erro em JSON
        header('Content-Type: application/json');
        echo json_encode(array('error' => 'Erro na consulta ao banco de dados.'));
    }

    // Fechar conexão
    $conn->close();
} else {
    // Se o parâmetro 'causa' não foi recebido na requisição, retorna uma mensagem de erro
    header('Content-Type: application/json');
    echo json_encode(array('error' => 'Parâmetro "causa" não informado na requisição.'));
}
