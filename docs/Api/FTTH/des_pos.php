<?php
$servername = "185.213.81.103";
$username = "u504529778_icomon_";
$password = "Rud!n3!@";
$dbname = "u504529778_icomon_";

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
