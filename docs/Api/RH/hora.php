<?php
// Conexão com o banco de dados (substitua pelos seus próprios dados)
$servername = "185.213.81.103";
$username = "u504529778_icomon_";
$password = "Rud!n3!@";
$dbname = "u504529778_icomon_";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Função para gerar um número aleatório único
function gerarNumeroAleatorio($conn) {
    do {
        $numeroAleatorio = rand(100000, 999999); // Gere um número aleatório de 6 dígitos
        $sql = "SELECT COUNT(*) AS count FROM rh WHERE nu_solicitacao = '$numeroAleatorio'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    } while ($row['count'] > 0); // Verifica se o número já existe na tabela

    return $numeroAleatorio;
}

// Receber dados enviados do aplicativo
$motivo = $_POST['motivo'];
$descricao = $_POST['descricao'];
$tempo_extra = $_POST['tempo_extra'];
$numero_cdoe = $_POST['numero_cdoe'];
$numero_ba = $_POST['numero_ba'];
$nome = $_POST['nome']; // Nome do gestor
$id_usu = $_POST['id_usu'];
$id_gestor = $_POST['id_gestor'];
$status = 'PENDENTE';

// Gerar um número único para nu_solicitacao
$nu_solicitacao = gerarNumeroAleatorio($conn);

// Preparar e executar a consulta SQL para inserção
$sql = "INSERT INTO rh (motivo, descricao, tempo_extra, numero_cdoe, numero_ba, nome, id_usu, id_gestor, status, nu_solicitacao) 
        VALUES ('$motivo', '$descricao', '$tempo_extra', '$numero_cdoe', '$numero_ba', '$nome', '$id_usu', '$id_gestor', '$status', '$nu_solicitacao')";

if ($conn->query($sql) === TRUE) {
    echo "Solicitação de hora extra cadastrada com sucesso. Número de solicitação: $nu_solicitacao";
} else {
    echo "Erro ao cadastrar solicitação de hora extra: " . $conn->error;
}

$conn->close();


?>
