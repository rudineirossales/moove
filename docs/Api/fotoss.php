<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Verifica se o arquivo foi enviado
  if (isset($_FILES['teste2'])) {
    $extensao = strtolower(substr($_FILES['teste2']['name'], -4));
    $novo_nome2 = md5(mt_rand(1, 1000) . microtime()) . $extensao;
    $diretorio = "move/foto/";

    if (move_uploaded_file($_FILES['teste2']['tmp_name'], $diretorio . $novo_nome2)) {
      echo "Foto enviada com sucesso!";
    } else {
      echo "Erro ao enviar a foto.";
    }
  } else {
    echo "Nenhuma foto foi enviada.";
  }
}

?>
