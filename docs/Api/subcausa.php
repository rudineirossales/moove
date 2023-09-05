<?php

// Conexão com o banco de dados (substitua pelos seus dados de conexão)
$servername = "185.213.81.103";
$username = "u504529778_icomon_";
$password = "Rud!n3!@";
$dbname = "u504529778_icomon_";

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
