<?php
// Dados de conexão com o banco de dados
$servername = "62.72.63.187"; // Altere para o endereço do seu servidor MySQL
$username = "remoteicomon"; // Altere para o nome de usuário do seu banco de dados
$password = "Rud!n3!@"; // Altere para a senha do seu banco de dados
$dbname = "icomon"; // Altere para o nome do seu banco de dados

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se houve um erro na conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $senha = $_POST["senha"];


    $sql = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha'";
    $result = $conn->query($sql);

    // Verifica se encontrou algum registro correspondente
    if ($result->num_rows == 1) {
        // Usuário autenticado com sucesso
        $row = $result->fetch_assoc();
        $name = $row["name"]; 

        // Retorna a resposta com o nome do usuário
        echo json_encode(array("success" => true, "login" => $login, "name" => $name));
    } else {
        // Usuário ou senha incorretos
        echo json_encode(array("success" => false));
    }
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
