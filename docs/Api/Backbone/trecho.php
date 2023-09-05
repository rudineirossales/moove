
<?php
$host = "185.213.81.103";
$usuario = "u504529778_icomon_";
$senha = "Rud!n3!@";
$banco = "u504529778_icomon_";

// Conectando ao banco de dados
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verificando a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Recebendo o texto da pesquisa do parâmetro GET
$searchText = $_GET['texto'];

// Consulta SQL para buscar cabos relacionados ao texto
$sql = "SELECT * FROM cabo WHERE trecho LIKE '%$searchText%'";
$result = $conn->query($sql);

$cabosFiltrados = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cabosFiltrados[] = $row['trecho'];
    }
}

// Retornando os resultados como JSON
header('Content-Type: application/json');
echo json_encode($cabosFiltrados);

$conn->close();
?>

