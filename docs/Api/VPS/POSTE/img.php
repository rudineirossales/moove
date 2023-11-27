<?php
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conecta ao banco de dados (substitua as informações de conexão conforme suas configurações)
    
$servername = "62.72.63.187"; // Altere para o endereço do seu servidor MySQL
$username = "remoteicomon"; // Altere para o nome de usuário do seu banco de dados
$password = "Rud!n3!@"; // Altere para a senha do seu banco de dados
$dbname = "icomon";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão com o banco de dados
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Obtém os dados do formulário
    $endereco = $_POST['endereco'];
    $data = $_POST['data'];
    $nome = $_POST['nome'];
    $tipo_poste = $_POST['tipo_poste'];
    $numero_cdoe = $_POST['numero_cdoe'];
    $uf = $_POST['uf'];
    $ocorrencia = $_POST['ocorrencia'];
    $tipo_rede = $_POST['tipo_rede'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $quantidade_poste = $_POST['quantidade_poste'];
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];
    $telefone = $_POST['telefone'];
    $cidade = $_POST['cidade'];

    $foto1 = $_FILES['foto1'];
    $foto2 = $_FILES['foto2'];

    // Define o diretório onde as fotos serão salvas (substitua pelo diretório correto em seu servidor)
    $diretorioFotos = 'D:\PROGRAMAS\icomon_poste\image';

    // Verifica se o diretório existe, se não, cria o diretório
    if (!is_dir($diretorioFotos)) {
        mkdir($diretorioFotos, 0755, true);
    }

    // Verifica o tamanho das fotos
    if ($foto1['size'] <= 2048000 && $foto2['size'] <= 2048000) {
        // Move a primeira foto para o diretório desejado
        $nomeFoto1 = time() . '_' . $foto1['name'];
        $caminhoFoto1 = $diretorioFotos . '/' . $nomeFoto1;
        if (move_uploaded_file($foto1['tmp_name'], $caminhoFoto1)) {
            // Move a segunda foto para o diretório desejado
            $nomeFoto2 = time() . '_' . $foto2['name'];
            $caminhoFoto2 = $diretorioFotos . '/' . $nomeFoto2;
            if (move_uploaded_file($foto2['tmp_name'], $caminhoFoto2)) {
                // Insere os dados no banco de dados
                $sql = "INSERT INTO teste (endereco, data, nome, telefone, tipo_poste, numero_cdoe, uf, ocorrencia, tipo_rede, latitude, longitude, quantidade_poste, descricao, status, cidade, foto1, foto2) VALUES ('$endereco', '$data', '$nome', '$telefone', '$tipo_poste', '$numero_cdoe', '$uf', '$ocorrencia', '$tipo_rede', '$latitude', '$longitude', '$quantidade_poste', '$descricao', '$status', '$cidade', '$nomeFoto1', '$nomeFoto2')";

                if ($conn->query($sql) === TRUE) {
                    echo "Dados inseridos com sucesso no banco de dados.";
                } else {
                    echo "Erro ao inserir os dados no banco de dados: " . $conn->error;
                }
            } else {
                echo "Erro ao mover a segunda foto para o diretório desejado.";
            }
        } else {
            echo "Erro ao mover a primeira foto para o diretório desejado.";
        }
    } else {
        echo "O tamanho das fotos deve ser de no máximo 2 MB.";
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>
