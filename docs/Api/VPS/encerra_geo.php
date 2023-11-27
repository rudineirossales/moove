
<?php
// Configurações do banco de dados
$host = "62.72.63.187";
$usuario = "remoteicomon";
$senha = "Rud!n3!@";
$banco = "icomon";

// Dados da solicitação POST
$ba = $_POST['ba'];
$causa = $_POST['causa'];
$sub = $_POST['sub'];
$ro = $_POST['ro'];
$cis = $_POST['cis'];
$obs = $_POST['obs'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

// Conexão com o banco de dados
$mysqli = new mysqli($host, $usuario, $senha, $banco);

// Verificar a conexão
if ($mysqli->connect_error) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

// Consulta SQL para inserir os dados na tabela "atividade"
$sql = "INSERT INTO atividade (ba, causa, sub, ro, cis, obs, latitude_final, longitude_final) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

// Preparar a declaração SQL
$stmt = $mysqli->prepare($sql);

if ($stmt === false) {
    die("Erro na preparação da consulta: " . $mysqli->error);
}

// Vincular os parâmetros
$stmt->bind_param("ssssssdd", $ba, $causa, $sub, $ro, $cis, $obs, $latitude, $longitude);

// Executar a consulta
if ($stmt->execute()) {
    // Inserção bem-sucedida
    echo "Dados inseridos com sucesso!";
} else {
    // Erro na execução da consulta
    echo "Erro na inserção de dados: " . $stmt->error;
}

// Fechar a declaração e a conexão
$stmt->close();
$mysqli->close();
?>
