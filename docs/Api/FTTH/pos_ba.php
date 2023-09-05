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
$hoje = date('Y-m-d H:i:s');

date_default_timezone_set('America/Sao_Paulo');

// Novo status que você deseja definir
$novoStatus = "VISTORIADO";

$sqlUpdate = "UPDATE pos_ba SET descricao = ?, latitude = ?, longitude = ?, status = ?, data = '$hoje' WHERE ba = ?";
$stmt = $conn->prepare($sqlUpdate);
$stmt->bind_param("sssss", $novaDescricao, $latitude, $longitude, $novoStatus, $ba);

if ($stmt->execute()) {
    $photoDirectory = "photos"; // Pasta única para todas as fotos
    if (!file_exists($photoDirectory)) {
        mkdir($photoDirectory, 0777, true);
    }

    $targetFilePath = $photoDirectory . "/" . basename($_FILES["photo"]["name"]);
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath)) {
        $photoFilename = basename($_FILES["photo"]["name"]);

        $sqlUpdatePhoto = "UPDATE pos_ba SET foto = ? WHERE ba = ?";
        $stmtPhoto = $conn->prepare($sqlUpdatePhoto);
        $stmtPhoto->bind_param("ss", $photoFilename, $ba);

        if ($stmtPhoto->execute()) {
            echo "Foto enviada e descrição atualizada com sucesso.";
        } else {
            echo "Erro ao atualizar o campo de foto: " . $stmtPhoto->error;
        }

        $stmtPhoto->close();
    } else {
        echo "Erro ao enviar a foto.";
    }
} else {
    echo "Erro ao atualizar a descrição, coordenadas e status: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
