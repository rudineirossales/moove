<?php
// Conexão com o banco de dados
$servername = "62.72.63.187"; // Altere para o endereço do seu servidor MySQL
$username = "remoteicomon"; // Altere para o nome de usuário do seu banco de dados
$password = "Rud!n3!@"; // Altere para a senha do seu banco de dados
$dbname = "icomon";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifique a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Número de BA recebido da solicitação
$ba = $_GET['ba']; // Certifique-se de validar e escapar esta entrada para evitar injeção de SQL

// Consulta SQL para obter o material utilizado e a quantidade associada ao BA
$sql = "SELECT descricao FROM material WHERE ba = '$ba'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $response = array();
    while ($row = $result->fetch_assoc()) {
        $response[] = array(
            'descricao' => $row['descricao'],
            // 'quantidade' => $row['quantidade']
        );
    }
    echo json_encode($response);
} else {
    echo json_encode(array('message' => 'Nenhum resultado encontrado para o BA fornecido.'));
}

$conn->close();
?>
