

<?php
// Conexão com o banco de dados (substitua as informações de conexão)
    
$servername = "62.72.63.187"; // Altere para o endereço do seu servidor MySQL
$username = "remoteicomon"; // Altere para o nome de usuário do seu banco de dados
$password = "Rud!n3!@"; // Altere para a senha do seu banco de dados
$dbname = "Batimento_ponto";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Receba os dados do POST
$id_usu = $_POST['id_usu'];
$observacao = $_POST['obs'];

// Consulta SQL para atualizar o campo 'obs' do usuário
$sql = "UPDATE principal SET obs = '$observacao' WHERE id_usu = '$id_usu'";

if ($conn->query($sql) === TRUE) {
    echo "Observação cadastrada com sucesso";
} else {
    echo "Erro ao cadastrar a observação: " . $conn->error;
}

$conn->close();
?>
