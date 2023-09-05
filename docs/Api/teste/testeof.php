
<?php
// Conexão com o banco de dados (substitua pelas suas próprias credenciais)
$servername = "185.213.81.103";
    $username = "u504529778_icomon_";
    $password = "Rud!n3!@";
    $dbname = "u504529778_icomon_";

// Criar a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verificar se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Receber os dados enviados pelo aplicativo Flutter
    $nome = $_POST["nome"];
    $tipo = $_POST["tipo"];
    $bairro = $_POST["bairro"];
    $rua = $_POST["rua"];
    $quantidade = $_POST["quantidade"];
    

    // Inserir os dados na tabela do banco de dados
    $sql = "INSERT INTO teste (nome, tipo, bairro, rua, quantidade) VALUES ('$nome', '$tipo', '$bairro', '$rua', '$quantidade')";

    if ($conn->query($sql) === TRUE) {
        // Dados inseridos com sucesso
        echo "Dados cadastrados com sucesso!";
    } else {
        // Erro ao inserir os dados
        echo "Erro ao cadastrar os dados: " . $conn->error;
    }
}

// Fechar a conexão
$conn->close();
?>

