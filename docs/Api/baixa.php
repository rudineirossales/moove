<?php

// Configurações do banco de dados
$host = '185.213.81.103'; // Endereço do servidor do banco de dados
$usuario = 'u504529778_icomon_'; // Usuário do banco de dados
$senha = 'Rud!n3!@'; // Senha do banco de dados
$bancoDados = 'u504529778_icomon_'; // Nome do banco de dados
$tabelaMaterial = 'material'; // Nome da tabela "material"
$tabelaAtividade = 'atividade'; // Nome da tabela "atividade"
$tabelaLogs = 'logs'; // Nome da tabela "logs"

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
    $descricao = $_POST['descricao'];
    $quantidade = $_POST['quantidade'];

    // Preparar a instrução SQL para inserção dos dados na tabela "material"
    $sqlMaterial = "INSERT INTO $tabelaMaterial (ba, descricao, quantidade) VALUES (?, ?, ?)";

    // Preparar a declaração para evitar injeção de SQL
    $stmtMaterial = $conexao->prepare($sqlMaterial);

    // Verificar se a preparação foi bem sucedida
    if ($stmtMaterial) {
        // Bind dos parâmetros e execução da declaração para inserir na tabela "material"
        $stmtMaterial->bind_param("ssi", $ba, $descricao, $quantidade);
        $stmtMaterial->execute();

        // Verificar se a inserção foi bem sucedida
        if ($stmtMaterial->affected_rows > 0) {
            // Inserção bem sucedida na tabela "material"

            // Agora, vamos pesquisar o "ba" na tabela "atividade" para obter o "id_usu" e "status"

            // Preparar a instrução SQL para pesquisar o "ba" na tabela "atividade"
            $sqlAtividade = "SELECT id_usu, status FROM $tabelaAtividade WHERE ba = ?";

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
                    $stmtAtividade->bind_result($id_usu, $status);
                    $stmtAtividade->fetch();

                    // Obter a data e hora atual
                    date_default_timezone_set('America/Sao_Paulo');
                    $dataHoraAtual = date('Y-m-d H:i:s');

                    // Agora, vamos inserir os dados na tabela "logs"

                    // Preparar a instrução SQL para inserção dos dados na tabela "logs"
                    $sqlLogs = "INSERT INTO $tabelaLogs (ba, status, id, data) VALUES (?, ?, ?, ?)";

                    // Preparar a declaração para evitar injeção de SQL
                    $stmtLogs = $conexao->prepare($sqlLogs);

                    // Verificar se a preparação foi bem sucedida
                    if ($stmtLogs) {
                        // Bind dos parâmetros e execução da declaração para inserir na tabela "logs"
                        $stmtLogs->bind_param("ssis", $ba, $status, $id_usu, $dataHoraAtual);
                        $stmtLogs->execute();

                        // Verificar se a inserção foi bem sucedida
                        if ($stmtLogs->affected_rows > 0) {
                            // Inserção bem sucedida na tabela "logs"
                            echo json_encode(array("message" => "Dados cadastrados e status atualizado. Registro de log inserido com sucesso!"));
                        } else {
                            // Falha na inserção na tabela "logs"
                            echo json_encode(array("message" => "Erro ao inserir o registro de log na tabela logs."));
                        }

                        // Fechar a declaração da tabela "logs"
                        $stmtLogs->close();
                    } else {
                        // Falha na preparação da declaração da tabela "logs"
                        echo json_encode(array("message" => "Erro ao preparar a declaração para inserir na tabela logs."));
                    }
                } else {
                    // Nenhum resultado encontrado para o "ba" na tabela "atividade"
                    echo json_encode(array("message" => "Ba não encontrado na tabela atividade."));
                }

                // Fechar a declaração da tabela "atividade"
                $stmtAtividade->close();
            } else {
                // Falha na preparação da declaração da tabela "atividade"
                echo json_encode(array("message" => "Erro ao preparar a declaração para pesquisar o ba na tabela atividade."));
            }
        } else {
            // Falha na inserção na tabela "material"
            echo json_encode(array("message" => "Erro ao cadastrar os dados na tabela material."));
        }

        // Fechar a declaração da tabela "material"
        $stmtMaterial->close();
    } else {
        // Falha na preparação da declaração da tabela "material"
        echo json_encode(array("message" => "Erro ao preparar a declaração para inserir na tabela material."));
    }
} else {
    // Método de requisição inválido
    echo json_encode(array("message" => "Método de requisição inválido."));
}

// Fechar a conexão com o banco de dados
$conexao->close();
?>
