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
    $tipo_poste = $_POST['tipo_poste'];
    $numero_cdoe = $_POST['cdoe'];
    $uf = $_POST['uf'];
    $ocorrencia = $_POST['ocorrencia'];
    $fibra = $_POST['fibra'];
    $tipo_rede = $_POST['tipo_rede'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $qtd_poste = $_POST['qtd_poste'];
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];

    $foto_antes = $_FILES['foto_antes'];

    // Define o diretório onde as fotos serão salvas (substitua pelo diretório correto em seu servidor)
    $diretorioFotos = 'Evidencias_desligamento_copel';

    // Verifica se o diretório existe, se não, cria o diretório
    if (!is_dir($diretorioFotos)) {
        mkdir($diretorioFotos, 0755, true);
    }

    // Move a primeira foto para o diretório desejado
    $nomeFotoAntes = time() . '_' . $foto_antes['name'];
    $caminhoFotoAntes = $diretorioFotos . '/' . $nomeFotoAntes;
    if (move_uploaded_file($foto_antes['tmp_name'], $caminhoFotoAntes)) {
        // Insere os dados no banco de dados
        $sql = "INSERT INTO registros (endereco, data, contato, tipo_poste, cdoe, uf, ocorrencia, fibra, tipo_rede, latitude, longitude, qtd_poste, descricao, status, cidade, bairro, foto_antes) VALUES ('$endereco', '$data', '$contato', '$tipo_poste', '$numero_cdoe', '$uf', '$ocorrencia', '$fibra', '$tipo_rede', '$latitude', '$longitude', '$qtd_poste', '$descricao', '$status', '$cidade', '$bairro', '$nomeFotoAntes')";

        if ($conn->query($sql) === TRUE) {
            echo "Dados inseridos com sucesso no banco de dados.";
        } else {
            echo "Erro ao inserir os dados no banco de dados: " . $conn->error;
        }
    } else {
        echo "Erro ao mover a primeira foto para o diretório desejado.";
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>
