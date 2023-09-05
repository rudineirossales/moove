
<?php
// Configurações do banco de dados
$servername = "185.213.81.103";
$username = "u504529778_icomon_";
$password = "Rud!n3!@";
$dbname = "u504529778_icomon_";

// Obtém o nome de usuário enviado pela requisição
$loggedInUser = $_GET['user'];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta na tabela atividade para o usuário específico
$sql = "SELECT * FROM atividade_bbk WHERE id_usu = '$loggedInUser' and status <> 'ENCERRADO' and status <> 'PARALIZADO' and status <> 'DESPTEC'";
$result = $conn->query($sql);

// Verifica se a consulta retornou dados
if ($result->num_rows > 0) {
    // Array para armazenar os resultados
    $atividade_bbk = array();

    // Percorre os resultados da consulta
    while ($row = $result->fetch_assoc()) {
        // Adiciona cada atividade ao array de resultados
        $atividade_bbk[] = $row;
    }

    // Retorna os dados em formato JSON
    echo json_encode($atividade_bbk);
} else {
    // Caso não haja dados na tabela atividade para o usuário específico
    echo "Nenhum registro encontrado para o usuário $loggedInUser.";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
