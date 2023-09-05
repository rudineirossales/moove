<?php
// Configurações do banco de dados
$host = '185.213.81.103';
$dbName = 'u504529778_icomon_';
$username = 'u504529778_icomon';
$password = 'Rud!n3!@';

try {
    // Conexão com o banco de dados usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica se o formulário foi submetido
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verifica se o atributo "id" foi enviado no formulário
        if (isset($_POST['ba'])) {
            $ba = $_POST['ba'];

            // Consulta para buscar a atividade com o ID fornecido
            $sql = "SELECT * FROM atividade WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $ba);
            $stmt->execute();
            $atividade = $stmt->fetch();

            // Verifica se a atividade foi encontrada
            if ($atividade) {
                // Atualiza o status para "andamento" e define a data de atribuição como a data e hora atual
                $status = 'andamento';
                $dataAtribuicao = date('Y-m-d H:i:s');

                // Executa a consulta de atualização
                $sql = "UPDATE atividade SET status = :status, data_atribuicao = :data_atribuicao WHERE ba = :ba";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':status', $status);
                $stmt->bindParam(':data_atribuicao', $dataAtribuicao);
                $stmt->bindParam(':id', $id);
                $stmt->execute();

                echo "Atribuição realizada com sucesso!";
            } else {
                echo "Atividade não encontrada.";
            }
        } else {
            echo "ba não fornecido.";
        }
    }
} catch (PDOException $e) {
    // Em caso de erro na conexão ou consulta, exibe a mensagem de erro
    echo "Erro: " . $e->getMessage();
}
?>
