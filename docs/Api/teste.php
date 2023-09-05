<?php
// Conexão com o banco de dados
$host = '185.213.81.103';
$username = 'u504529778_Luiz';
$password = 'Luiz@icomon10';
$dbname = 'u504529778_Sys02';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Obter o BA da requisição
if (isset($_GET['ba'])) {
    $ba = $_GET['ba'];

    // Pesquisar o BA no banco de dados
    $sql = "SELECT ba FROM atividades WHERE ba = '$ba'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $longitude = $row['longitude'];
        $latitude = $row['latitude'];

        // Se as coordenadas de latitude e longitude não estiverem vazias
        if (!empty($longitude) && !empty($latitude)) {
            // Retornar as coordenadas de latitude e longitude
            $response = array(
                'success' => true,
                'longitude' => $longitude,
                'latitude' => $latitude
            );
        } else {
            $response = array(
                'success' => false,
                'message' => 'Coordenadas de latitude e longitude não encontradas.'
            );
        }
    } else {
        $response = array(
            'success' => false,
            'message' => 'BA não encontrado.'
        );
    }
} else {
    $response = array(
        'success' => false,
        'message' => 'Parâmetro "ba" ausente na requisição.'
    );
}

// Retornar a resposta como JSON
header('Content-Type: application/json');
echo json_encode($response);

// Fechar a conexão com o banco de dados
$conn->close();
?>
