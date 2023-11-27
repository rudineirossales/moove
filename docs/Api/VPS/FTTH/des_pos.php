<?php

$servername = "62.72.63.187"; // Altere para o endereço do seu servidor MySQL
$username = "remoteicomon"; // Altere para o nome de usuário do seu banco de dados
$password = "Rud!n3!@"; // Altere para a senha do seu banco de dados
$dbname = "icomon";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$ba = $_POST['ba'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$novaDescricao = $_POST['descricao'];

$sqlInsert = "INSERT INTO pos_ba (ba, latitude, longitude, descricao)
              VALUES ('$ba', '$latitude', '$longitude', '$novaDescricao')";

if ($conn->query($sqlInsert) === TRUE) {
    echo "Cadastro realizado com sucesso.";
} else {
    echo "Erro ao cadastrar: " . $conn->error;
}

$conn->close();
?>
