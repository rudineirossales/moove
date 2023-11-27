<?php
// Conexão com o banco de dados (substitua as informações de conexão)
$servername = "62.72.63.187"; // Altere para o endereço do seu servidor MySQL
$username = "remoteicomon"; // Altere para o nome de usuário do seu banco de dados
$password = "Rud!n3!@"; // Altere para a senha do seu banco de dados
$database = "Batimento_ponto";

$conn = new mysqli($servername, $username, $password, $database);

// Verifique a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Use POST seguro em vez de GET para atualizações
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $matricula = $_POST['id_coordenador'];
    $justificativa = $_POST['justificativa'];

    // Evite SQL Injection usando declarações preparadas
    $sql = "UPDATE principal1 SET justificativa = ?, status_final = 'ANALISADO' WHERE id_coordenador = ?";
    
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Erro na preparação da consulta: " . $conn->error);
    }

    $stmt->bind_param("ss", $justificativa, $matricula);

    if ($stmt->execute()) {
        // A atualização foi bem-sucedida
        echo "Dados e imagens atualizados com sucesso.";
    } else {
        // A atualização falhou
        echo "Erro ao atualizar dados e imagens: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Método HTTP não suportado. Use POST para enviar dados.";
}

$conn->close();
?>
