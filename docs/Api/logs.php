<?php
// Configurações do banco de dados
$host = '185.213.81.103'; // Endereço do servidor do banco de dados
$usuario = 'u504529778_icomon_'; // Usuário do banco de dados
$senha = 'Rud!n3!@'; // Senha do banco de dados
$bancoDados = 'u504529778_icomon_'; // Nome do banco de dados
$tabelaLogs = 'logs'; // Nome da tabela "logs"

date_default_timezone_set('America/Sao_Paulo');
// Conexão com o banco de dados
$conexao = new mysqli($host, $usuario, $senha, $bancoDados);

// Verificar se houve erro na conexão
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

// Verificar se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Receber os dados do formulário
    $ba = $_POST['ba'];
    $hoje = date('Y-m-d H:i:s');

    // Preparar a instrução SQL para pesquisar o "ba" na tabela "atividade"
    $sqlAtividade = "SELECT id_usu, status, data_encerramento FROM atividade WHERE ba = ?";

    // Preparar a declaração para evitar injeção de SQL
    $stmtAtividade = $conexao->prepare($sqlAtividade);

    // Verificar se a preparação foi bem sucedida
    if ($stmtAtividade) {
        // Bind do parâmetro e execução da declaração para pesquisar o "ba" na tabela "atividade"
        $stmtAtividade->bind_param("s", $ba);
        $stmtAtividade->execute();
        $stmtAtividade->store_result();

        // Verificar se a pesquisa encontrou resultados
        if ($stmtAtividade->num_rows > 0) {
            // Obtém os resultados da pesquisa
            $stmtAtividade->bind_result($id_usu, $status, $data_encerramento);
            $stmtAtividade->fetch();

            // Agora, vamos inserir os dados na tabela "logs"
            // Se o status for "Encerrado", usaremos a data_encerramento, caso contrário, usaremos a data atual

            // Preparar a instrução SQL para inserção dos dados na tabela "logs"
            $sqlLogs = "INSERT INTO $tabelaLogs (ba, id_usu, status, data_encerramento, data) VALUES (?, ?, ?, ?, ?)";

            // Preparar a declaração para evitar injeção de SQL
            $stmtLogs = $conexao->prepare($sqlLogs);

            // Verificar se a preparação foi bem sucedida
            if ($stmtLogs) {
                // Se o status for "Encerrado", usamos a data de encerramento, caso contrário, usamos a data atual
                $dataInsercao = ($status == "Encerrado") ? $data_encerramento : $hoje;

                // Bind dos parâmetros e execução da declaração para inserir na tabela "logs"
                $stmtLogs->bind_param("sssss", $ba, $id_usu, $status, $data_encerramento, $dataInsercao);
                if ($stmtLogs->execute()) {
                    // Inserção bem sucedida na tabela "logs"
                    echo json_encode(array("message" => "Dados cadastrados na tabela logs com sucesso!"));
                } else {
                    // Falha na inserção na tabela "logs"
                    echo json_encode(array("message" => "Erro ao inserir os dados na tabela logs: " . $stmtLogs->error));
                }

                // Fechar a declaração da tabela "logs"
                $stmtLogs->close();
            } else {
                // Falha na preparação da declaração da tabela "logs"
                echo json_encode(array("message" => "Erro ao preparar a declaração para inserir na tabela logs: " . $conexao->error));
            }
        } else {
            // Nenhum resultado encontrado para o "ba" na tabela "atividade"
            echo json_encode(array("message" => "Ba não encontrado na tabela atividade."));
        }

        // Fechar a declaração da tabela "atividade"
        $stmtAtividade->close();
    } else {
        // Falha na preparação da declaração da tabela "atividade"
        echo json_encode(array("message" => "Erro ao preparar a declaração para pesquisar o ba na tabela atividade: " . $conexao->error));
    }
} else {
    // Método de requisição inválido
    echo json_encode(array("message" => "Método de requisição inválido."));
}

// Fechar a conexão com o banco de dados
$conexao->close();
?>
