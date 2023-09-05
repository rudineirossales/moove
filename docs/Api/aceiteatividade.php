<?php
// Configurações do banco de dados
$servername = "185.213.81.103"; // Altere para o endereço do seu servidor MySQL
$username = "u504529778_icomon_"; // Altere para o nome de usuário do seu banco de dados
$password = "Rud!n3!@"; // Altere para a senha do seu banco de dados
$dbname = "u504529778_icomon_";     // Nome do banco de dados

// Conectando ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Número de BA a ser pesquisado
$ba = $_GET['ba'];  // Supondo que você esteja passando o número de BA como um parâmetro GET na URL

// Pesquisando na tabela de atividades
$sql = "SELECT * FROM atividade WHERE ba = $ba";
$result = $conn->query($sql);

// Verificando se algum resultado foi retornado
if ($result->num_rows > 0) {
    // Atualizando os dados existentes no formulário
    $longitude = $_POST['longitude'];  // Supondo que você esteja enviando a longitude do formulário usando o método POST
    $latitude = $_POST['latitude'];    // Supondo que você esteja enviando a latitude do formulário usando o método POST

    // Executando a atualização na tabela
    $updateSql = "UPDATE atividade SET longitude = '$longitude', latitude = '$latitude' WHERE ba = $ba";
    if ($conn->query($updateSql) === TRUE) {
        echo "Dados de longitude e latitude atualizados com sucesso.";
    } else {
        echo "Erro ao atualizar os dados: " . $conn->error;
    }
} else {
    echo "Nenhum resultado encontrado para o número de BA fornecido.";
}

// Fechando a conexão com o banco de dados
$conn->close();
?>
