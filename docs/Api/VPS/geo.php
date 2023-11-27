

<?php

function conectarBancoDados() {
    
$servername = "62.72.63.187"; // Altere para o endereço do seu servidor MySQL
$username = "remoteicomon"; // Altere para o nome de usuário do seu banco de dados
$password = "Rud!n3!@"; // Altere para a senha do seu banco de dados
$dbname = "icomon";

    // Crie a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifique se ocorreu algum erro na conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    return $conn;
}

date_default_timezone_set('America/Sao_Paulo');

function inserirLog($conn, $ba, $status, $data, $loggedInUser) {
    // Obtém o id_usu da tabela atividade com base no valor de ba
    $sql_id_usu = "SELECT id_usu FROM atividade WHERE ba = '$ba'";
    $result = $conn->query($sql_id_usu);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id_usu = $row['id_usu'];

        // Insere um registro de log com o valor de id_usu na coluna id
        $sql_insert_log = "INSERT INTO logs (ba, status, data, id) VALUES ('$ba', '$status', '$data', '$id_usu')";

        if ($conn->query($sql_insert_log) === TRUE) {
            echo "Log inserido com sucesso!";
        } else {
            echo "Erro ao inserir log: " . $conn->error;
        }
    } else {
        echo "Erro ao obter id_usu da tabela atividade para ba: " . $ba;
    }
}

// Verifica se foi enviado algum dado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados enviados pelo Flutter
    $ba = $_POST['ba'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $checkBox = $_POST['checkBox'];
    $checkBox2 = $_POST['checkBox2'];
    $hoje = date('Y-m-d H:i:s');
    $loggedInUser = $_POST['loggedInUser']; // Obtendo loggedInUser dos dados POST

    // Faça a conexão com o banco de dados
    $conn = conectarBancoDados();

    // Execute a consulta para atualizar os dados
    $sql = "UPDATE atividade SET status = 'EM ANDAMENTO', latitude = '$latitude', longitude = '$longitude', checkBox = '$checkBox', checkBox2 = '$checkBox2', data_atribuicao = '$hoje' WHERE ba = '$ba'";

    if ($conn->query($sql) === TRUE) {
        echo "Latitude e longitude atualizadas no banco de dados com sucesso!";
        // Insere um registro de log com o valor de id_usu
        inserirLog($conn, $ba, 'EM ANDAMENTO', $hoje, $loggedInUser);

    } else {
        echo "Erro ao atualizar latitude e longitude no banco de dados: " . $conn->error;
    }

    // Feche a conexão com o banco de dados
    $conn->close();
} else {
    echo "Nenhum dado enviado.";
}
?>
