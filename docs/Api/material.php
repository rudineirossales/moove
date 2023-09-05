<?php

// Configurações do banco de dados
$servername = "185.213.81.103";
$username = "u504529778_icomon_";
$password = "Rud!n3!@";
$dbname = "u504529778_icomon_";

// Receber os dados enviados pelo aplicativo Flutter

$descricao = $_POST['descricao'];
$quantidade = $_POST['quantidade'];
$ba = $_POST['ba'];

// Criar conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Inserir os dados na tabela "material"
$sql = "INSERT INTO material (ba, descricao, quantidade) VALUES ('$ba','$descricao', $quantidade)";

if ($conn->query($sql) === TRUE) {
    echo "Dados inseridos com sucesso!";
} else {
    echo "Erro ao inserir os dados: " . $conn->error;
}

// Fechar a conexão com o banco de dados
$conn->close();

?>
