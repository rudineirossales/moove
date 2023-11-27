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
    $contato = $_POST['contato'];
    $tipo = $_POST['tipo'];
    $mantas = $_POST['mantas'];
    $uf = $_POST['uf'];
    $cabo = $_POST['cabo'];
    $estacao = $_POST['estacao'];
    $tipo_rede = $_POST['tipo_rede'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $descricao = $_POST['descricao'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $coordenador = $_POST['coordenador'];
    $plaquetas = $_POST['plaquetas'];
    $espiral = $_POST['espiral'];
    $reserva_tecnica = $_POST['reserva_tecnica'];
    

    // Define o diretório onde as fotos serão salvas (substitua pelo diretório correto em seu servidor)
    $diretorioFotos = 'Preventivas_mantas_fotos';

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
                    // Insere os dados no banco de dados com as duas fotos
                    $sql = "INSERT INTO mantas (endereco, data, contato, tipo, mantas, uf, estacao, cabo, tipo_rede, latitude, longitude, descricao, cidade, bairro,coordenador, foto_antes, foto_depois, plaquetas, espiral, reserva_tecnica) 
                            VALUES ('$endereco', '$data', '$contato', '$tipo', '$mantas', '$uf', '$estacao', '$cabo', '$tipo_rede', 
                            '$latitude', '$longitude', '$descricao', '$cidade', '$bairro', '$coordenador',
                            '$nomeFotoAntes', '$nomeFotoDepois', '$plaquetas', '$espiral', '$reserva_tecnica')";

                    if ($conn->query($sql) === TRUE) {
                        echo "Dados inseridos com sucesso no banco de dados.";
                    } else {
                        echo "Erro ao inserir os dados no banco de dados: " . $conn->error;
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
