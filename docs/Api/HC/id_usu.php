<?php
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conecta ao banco de dados (substitua as informações de conexão conforme suas configurações)
    $servername = "185.213.81.103";
    $username = "u504529778_hc";
    $password = "Rud!n3!@";
    $dbname = "u504529778_hc";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão com o banco de dados
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Define o diretório onde as fotos serão salvas (substitua pelo diretório correto em seu servidor)
    $diretorioFotos = 'FOTOS_HC';

    // Verifica se o diretório existe, se não, cria o diretório
    if (!is_dir($diretorioFotos)) {
        mkdir($diretorioFotos, 0755, true);
    }

    // Verifica se a foto antes foi enviada
    if (isset($_FILES['foto_antes']) && $_FILES['foto_antes']['error'] === UPLOAD_ERR_OK) {
        $foto_antes = $_FILES['foto_antes'];
        $nomeFotoAntes = time() . '_' . $foto_antes['name'];
        $caminhoFotoAntes = $diretorioFotos . '/' . $nomeFotoAntes;

        // Move a foto antes para o diretório desejado
        if (move_uploaded_file($foto_antes['tmp_name'], $caminhoFotoAntes)) {
            // Verifica se a foto depois foi enviada
            if (isset($_FILES['foto_depois']) && $_FILES['foto_depois']['error'] === UPLOAD_ERR_OK) {
                $foto_depois = $_FILES['foto_depois'];
                $nomeFotoDepois = time() . '_' . $foto_depois['name'];
                $caminhoFotoDepois = $diretorioFotos . '/' . $nomeFotoDepois;

                // Move a foto depois para o diretório desejado
                if (move_uploaded_file($foto_depois['tmp_name'], $caminhoFotoDepois)) {
                    // Verifica se a terceira imagem foi enviada
                    if (isset($_FILES['terceira_imagem']) && $_FILES['terceira_imagem']['error'] === UPLOAD_ERR_OK) {
                        $terceira_imagem = $_FILES['terceira_imagem'];
                        $nomeTerceiraImagem = time() . '_' . $terceira_imagem['name'];
                        $caminhoTerceiraImagem = $diretorioFotos . '/' . $nomeTerceiraImagem;

                        // Move a terceira imagem para o diretório desejado
                        if (move_uploaded_file($terceira_imagem['tmp_name'], $caminhoTerceiraImagem)) {
                            // Insere os dados no banco de dados com as três fotos e os nomes das imagens
                            $sa = $_POST['sa'];

                            // Aqui você pode adicionar outros campos do banco de dados conforme necessário
                            // E criar a query SQL para inserção dos dados, incluindo os nomes das imagens
                            // $sql = " INTO logs_hc (sa, foto_antes, foto_depois, terceira_imagem) VALUES ('$sa', '$nomeFotoAntes', '$nomeFotoDepois', '$nomeTerceiraImagem')";
                             $sql = " UPDATE logs_hc SET foto_antes = '$nomeFotoAntes', foto_depois = '$nomeFotoDepois', terceira_imagem =  '$nomeTerceiraImagem' WHERE sa ='$sa'";
                            

                            if ($conn->query($sql) === TRUE) {
                                echo "Dados inseridos com sucesso no banco de dados.";
                            } else {
                                echo "Erro ao inserir os dados no banco de dados: " . $conn->error;
                            }
                        } else {
                            echo "Erro ao mover a terceira imagem para o diretório desejado.";
                        }
                    } else {
                        echo "Erro no envio da terceira imagem.";
                    }
                } else {
                    echo "Erro ao mover a foto depois para o diretório desejado.";
                }
            } else {
                echo "Erro no envio da foto depois.";
            }
        } else {
            echo "Erro ao mover a foto antes para o diretório desejado.";
        }
    } else {
        echo "Erro no envio da foto antes.";
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>
