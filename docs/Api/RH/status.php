<?php
// Conexão com o banco de dados (substitua pelas suas configurações)
$servername = "185.213.81.103";
$username = "u504529778_icomon_";
$password = "Rud!n3!@";
$dbname = "u504529778_icomon_";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Recebe os dados da solicitação POST
$id = $_POST['id'];
$novo_status = $_POST['novo_status'];

// Atualiza o status no banco de dados apenas para o registro com o ID correspondente
$sql = "UPDATE rh SET status = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $novo_status, $id);

if ($stmt->execute()) {
    echo "Status atualizado com sucesso!";
} else {
    echo "Erro ao atualizar o status: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
