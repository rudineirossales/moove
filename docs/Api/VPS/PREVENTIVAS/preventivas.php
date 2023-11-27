<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servername = "62.72.63.187";
    $username = "remoteicomon";
    $password = "Rud!n3!@";
    $dbname = "icomon";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Function to handle file uploads securely
    function handleFileUpload($fieldName, $uploadDirectory)
    {
        if (isset($_FILES[$fieldName]) && $_FILES[$fieldName]['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES[$fieldName];
            $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $uniqueFilename = uniqid() . '.' . $fileExtension;
            $targetPath = $uploadDirectory . '/' . $uniqueFilename;

            if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                return $uniqueFilename;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
date_default_timezone_set('America/Sao_Paulo');

    $diretorioFotos = 'Preventivas';

    if (!is_dir($diretorioFotos)) {
        mkdir($diretorioFotos, 0755, true);
    }
    
    $loggedInUser = $_GET['user'];

    $fotoAntes = handleFileUpload('foto_antes', $diretorioFotos);
    $fotoDepois = handleFileUpload('foto_depois', $diretorioFotos);
    $foto1 = handleFileUpload('foto1', $diretorioFotos);
    $foto2 = handleFileUpload('foto2', $diretorioFotos);

    $endereco = $_POST['endereco'];
    // $contato = $_POST['contato'];
    $mantas = $_POST['mantas'];
    $uf = $_POST['uf'];
    $estacao = $_POST['estacao'];
    $tipo_rede = $_POST['tipo_rede'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $celula = $_POST['celula'];
    $cidade = $_POST['cidade'];
    // $bairro = $_POST['bairro'];
    $coordenador = $_POST['coordenador'];
    $plaquetas = $_POST['plaquetas'];
    $espiral = $_POST['espiral'];
    $reserva_tecnica = $_POST['reserva_tecnica'];
    $travessias_regularizadas = $_POST['travessias_regularizadas'];
    $cdoe_regularizada = $_POST['cdoe_regularizada'];
    $cabo_desespinado = $_POST['cabo_desespinado'];
    $hubbox = $_POST['hubbox'];
    $rede_regularizada = $_POST['rede_regularizada'];
    $lancamento_cabo = $_POST['lancamento_cabo'];
    $capacidade_cabo = $_POST['capacidade_cabo'];
    $duto_lateral = $_POST['duto_lateral'];
    $instalacao_poste = $_POST['instalacao_poste'];
    $remocao_poste = $_POST['remocao_poste'];
    $ba = $_POST['ba'];
    $hoje = date('Y-m-d H:i:s');


    $sql = "INSERT INTO preventivass (endereco, contato, uf, estacao, tipo_rede, latitude, longitude, celula, cidade, coordenador, foto_antes, foto_depois, plaquetas, espiral, reserva_tecnica, travessias_regularizadas, cdoe_regularizada, cabo_desespinado, hubbox, rede_regularizada, lancamento_cabo, capacidade_cabo, duto_lateral, instalacao_poste, remocao_poste, ba, data, foto1, foto2) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssssssssssssssssssssss", $endereco, $loggedInUser, $uf, $estacao, $tipo_rede, $latitude, $longitude, $celula, $cidade, $coordenador, $fotoAntes, $fotoDepois, $plaquetas, $espiral, $reserva_tecnica, $travessias_regularizadas, $cdoe_regularizada, $cabo_desespinado, $hubbox, $rede_regularizada, $lancamento_cabo, $capacidade_cabo, $duto_lateral, $instalacao_poste,$remocao_poste,$ba,$hoje, $foto1, $foto2);

    if ($stmt->execute()) {
        echo "Dados inseridos com sucesso no banco de dados.";
    } else {
        echo "Erro ao inserir os dados no banco de dados: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
