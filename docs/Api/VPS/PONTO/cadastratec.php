<?php
// Certifique-se de configurar sua conexão com o banco de dados aqui
$servername = "62.72.63.187"; // Altere para o endereço do seu servidor MySQL
    $username = "remoteicomon"; // Altere para o nome de usuário do seu banco de dados
    $password = "Rud!n3!@"; // Altere para a senha do seu banco de dados
     Altere para a senha do seu banco de dados
$dbname = "Batimento_ponto";

// Crie uma conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifique a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Selecionar o banco de dados
if (!mysqli_select_db($conn, $dbname)) {
    die("Erro ao selecionar o banco de dados: " . mysqli_error($conn));
}

// Receba os dados do POST
$id_usu = $_POST['matricula'];
$obs = $_POST['obs'];

// Atualize a coluna 'obs' no banco de dados com a observação fornecida
$sql = "UPDATE principal1 SET obs = '$obs' WHERE matricula = '$id_usu'";

if ($conn->query($sql) === TRUE) {
    echo "Observação atualizada com sucesso!";
} else {
    echo "Erro ao atualizar a observação: " . $conn->error;
}

// Feche a conexão com o banco de dados
$conn->close();
?>
