<?php
$targetDir = "public_html/uploads/";
$targetFile = $targetDir . basename($_FILES["photo"]["name"]);
$uploadOk = true;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Verifica se o arquivo é uma imagem real ou um arquivo falso
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if ($check !== false) {
        echo "O arquivo é uma imagem - " . $check["mime"] . ".";
        $uploadOk = true;
    } else {
        echo "O arquivo não é uma imagem.";
        $uploadOk = false;
    }
}

// Verifica se o arquivo já existe
if (file_exists($targetFile)) {
    echo "Desculpe, o arquivo já existe.";
    $uploadOk = false;
}

// Limita o tamanho do arquivo
if ($_FILES["photo"]["size"] > 500000) {
    echo "Desculpe, o arquivo é muito grande.";
    $uploadOk = false;
}

// Permite apenas determinados formatos de imagem
if (
    $imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png"
    && $imageFileType != "gif"
) {
    echo "Desculpe, apenas arquivos JPG, JPEG, PNG e GIF são permitidos.";
    $uploadOk = false;
}

// Verifica se $uploadOk está definido como falso por algum erro
if ($uploadOk == false) {
    echo "Desculpe, seu arquivo não foi enviado.";
} else {
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
        echo "O arquivo " . basename($_FILES["photo"]["name"]) . " foi enviado.";
    } else {
        echo "Desculpe, ocorreu um erro ao enviar seu arquivo.";
    }
}
?>
