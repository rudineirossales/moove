<?php

// Verifica se foi enviado algum dado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados enviados pelo Flutter
    $ba = $_POST['ba'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $descricao = $_POST['descricao'];
    $hoje = date('Y-m-d H:i:s');
    

    // Faça a conexão com o banco de dados e execute a consulta para atualizar os dados
    $servername = "185.213.81.103"; // Altere para o endereço do seu servidor MySQL
    $username = "u504529778_icomon_"; // Altere para o nome de usuário do seu banco de dados
    $password = "Rud!n3!@"; // Altere para a senha do seu banco de dados
    $dbname = "u504529778_icomon_"; // substitua pelo nome do seu banco de dados

    // Crie a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifique se ocorreu algum erro na conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Execute a consulta para atualizar os dados
    $sql = "UPDATE pos_ba SET latitude = '$latitude', longitude = '$longitude', descricao = '$descricao', data_atribuicao = '$hoje' WHERE ba = '$ba'";


    if ($conn->query($sql) === TRUE) {
        echo "Latitude e longitude atualizadas no banco de dados com sucesso!";
    } else {
        echo "Erro ao atualizar latitude e longitude no banco de dados: " . $conn->error;
    }

    // Feche a conexão com o banco de dados
    $conn->close();
} else {
    echo "Nenhum dado enviado.";
}
?>
