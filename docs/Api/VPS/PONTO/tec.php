
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

$matricula = $_POST['matricula'];
$obs = $_POST['obs'];

// Diretório para salvar as imagens (certifique-se de ter permissões de escrita)
$uploadDir = 'evidencias';

$foto1Path = '';
if (!empty($_FILES['foto1'])) {
    $foto1TempPath = $_FILES['foto1']['tmp_name'];
    $foto1FileName = basename($_FILES['foto1']['name']);
    $foto1Path = $uploadDir . $foto1FileName;

    move_uploaded_file($foto1TempPath, $foto1Path);
}

$foto2Path = '';
if (!empty($_FILES['foto2'])) {
    $foto2TempPath = $_FILES['foto2']['tmp_name'];
    $foto2FileName = basename($_FILES['foto2']['name']);
    $foto2Path = $uploadDir . $foto2FileName;

    move_uploaded_file($foto2TempPath, $foto2Path);
}

// Execute a consulta de atualização
$sql = "UPDATE principal1 SET obs = ?, foto1 = ?, foto2 = ? , status_final = 'ANALISE GESTOR' WHERE matricula = ?";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Erro na preparação da consulta: " . $conn->error);
}

$stmt->bind_param("ssss", $obs, $foto1Path, $foto2Path, $matricula);

if ($stmt->execute()) {
    // A atualização foi bem-sucedida
    echo "Dados e imagens atualizados com sucesso.";
} else {
    // A atualização falhou
    echo "Erro ao atualizar dados e imagens: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
