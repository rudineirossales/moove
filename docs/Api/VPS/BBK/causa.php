<?php

$servername = "62.72.63.187"; // Altere para o endereço do seu servidor MySQL
$username = "remoteicomon"; // Altere para o nome de usuário do seu banco de dados
$password = "Rud!n3!@"; // Altere para a senha do seu banco de dados
$dbname = "icomon";


// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta para buscar as causas no banco de dados
$sql = "SELECT causa FROM causasub  where area = 'BBK' group by causa  ";

$result = $conn->query($sql);

$causas = array();

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $causas[] = $row["causa"];
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