
<?php
// Configurações do banco de dados
$servername = "185.213.81.103";
$username = "u504529778_icomon_";
$password = "Rud!n3!@";
$dbname = "u504529778_icomon_";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifique a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Receba o valor de loggedInUser por POST
$loggedInUser = $_POST['loggedInUser'];

// Consulta SQL para verificar o acesso do usuário
$sql = "SELECT acesso FROM usuario WHERE login = '$loggedInUser'";

$result = $conn->query($sql);

// Verifique se a consulta foi bem-sucedida
if ($result->num_rows > 0) {
    // Leitura dos dados da consulta
    $row = $result->fetch_assoc();
    $acesso = $row["acesso"];

    // Agora você tem o valor de acesso, que pode ser "ADM" ou outro valor
    echo json_encode(["acesso" => $acesso]);
} else {
    // Usuário não encontrado, retorne uma resposta apropriada
    echo json_encode(["error" => "Usuário não encontrado"]);
}

// Feche a conexão com o banco de dados
$conn->close();
?>
