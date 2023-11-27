
<?php
// Configurações do banco de dados
$servername = "62.72.63.187"; // Altere para o endereço do seu servidor MySQL
$username = "remoteicomon"; // Altere para o nome de usuário do seu banco de dados
$password = "Rud!n3!@"; // Altere para a senha do seu banco de dados
$dbname = "icomon";

// Obtém o nome de usuário enviado pela requisição
$loggedInUser = $_GET['user'];
$nomecoordenador = $_GET['nomecoordenador'];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta na tabela atividade para o usuário específico
$sql = "SELECT * FROM atividade join usuario on atividade.id_usu = usuario.id WHERE usuario.id_gestor = '$loggedInUser' and status = 'EM ANDAMENTO' and tipo = '97'";
$result = $conn->query($sql);

// Verifica se a consulta retornou dados
if ($result->num_rows > 0) {
    // Array para armazenar os resultados
    $atividades = array();

                            

    while ($row = $result->fetch_assoc()) {
        // Adiciona cada atividade ao array de resultados
        $atividades[] = $row;
    }

    // Retorna os dados em formato JSON
    echo json_encode($atividades);
} else {
    // Caso não haja dados na tabela atividade para o usuário específico
    echo "Nenhum registro encontrado para o usuário $loggedInUser.";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
