<?php
// Conexão com o banco de dados (substitua com suas credenciais)
$servername = "62.72.63.187";
$username = "remoteicomon";
$password = "Rud!n3!@";
$dbname = "icomon";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

date_default_timezone_set('America/Sao_Paulo');

// Recupera os dados do aplicativo Flutter
$loggedInUser = isset($_GET['user']) ? $_GET['user'] : ''; // Ensure user is set
$uniqueIdentifier = $conn->real_escape_string($_POST['uniqueIdentifier']);
$name = $conn->real_escape_string($_POST['name']);
$checked = $conn->real_escape_string($_POST['checked']);
$observations = $conn->real_escape_string($_POST['observations']);
$station = $conn->real_escape_string($_POST['estacao']); // Recupere a estação
$hoje = date('Y-m-d H:i:s');

// Cria o diretório para as imagens
$uploadDirectory = "handover_fotos" . DIRECTORY_SEPARATOR;
if (!file_exists($uploadDirectory)) {
    mkdir($uploadDirectory, 0777, true);
}

// Inicializa a variável $foto
$foto = '';

// Verifique se foram enviadas imagens
if (isset($_FILES['image']) && is_array($_FILES['image'])) {
    // Loop through the images to find the first one and use its name
    foreach ($_FILES['image']['name'] as $key => $fileName) {
        $foto = $uploadDirectory . $fileName;
        break; // Use the first filename and exit the loop
    }
}

// Prepara a consulta SQL com instrução preparada
$sql = "INSERT INTO handover (identificador, name, checked, observations, estacao, foto, tec, data) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ssssssss", $uniqueIdentifier, $name, $checked, $observations, $station, $foto, $loggedInUser, $hoje);
    
    if ($stmt->execute()) {
        echo "Dados inseridos com sucesso. Identificador: $uniqueIdentifier";
    } else {
        echo "Erro ao inserir dados: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Erro na preparação da declaração: " . $conn->error;
}

// Move the rest of your code related to image upload here

// Fecha a conexão com o banco de dados
$conn->close();
?>
