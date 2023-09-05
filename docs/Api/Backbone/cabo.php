<?php

// Conexão com o banco de dados (substitua pelos seus dados de conexão)
$servername = "185.213.81.103";
$username = "u504529778_icomon_";
$password = "Rud!n3!@";
$dbname = "u504529778_icomon_";


// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta para buscar as causas no banco de dados
$sql = "SELECT cabo FROM cabo group by cabo ";

$result = $conn->query($sql);

$causas = array();

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $causas[] = $row["cabo"];
        }
    }
    // Retornar os dados em formato JSON
    header('Content-Type: application/json');
    echo json_encode($causas);
} else {
    // Retornar mensagem de erro em JSON
    header('Content-Type: application/json');
    echo json_encode(array('error' => 'Erro na consulta ao banco de dados.'));
}

// Fechar conexão
$conn->close();