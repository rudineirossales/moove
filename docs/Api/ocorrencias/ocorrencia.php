<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifique se os campos necessários foram enviados
    if (
        isset($_POST['endereco']) && isset($_POST['cidade']) && 
        isset($_POST['data']) && isset($_POST['uf']) && 
        isset($_POST['tipo']) && isset($_POST['latitude']) && 
        isset($_POST['longitude']) && isset($_POST['obs']) && 
        isset($_POST['bairro']) && isset($_POST['estacao']) &&
        isset($_POST['coordenador']) 
    ) {
        // Conectar ao banco de dados (substitua com suas credenciais)
        $servername = "185.213.81.103";
        $username = "u504529778_icomon_";
        $password = "Rud!n3!@";
        $dbname = "u504529778_icomon_";
        
        // Crie uma conexão
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifique a conexão
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Prepare e insira os dados na tabela "ocorrencia"
        $stmt = $conn->prepare("INSERT INTO ocorrencia (ba, endereco, cidade, data, uf, tipo, latitude, longitude, obs, bairro, estacao, coordenador) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $ba = "800" . substr(uniqid() . mt_rand(), -6);
        $stmt->bind_param("ssssssssssss", 
            $ba, $_POST['endereco'], $_POST['cidade'], 
            $_POST['data'], $_POST['uf'], 
            $_POST['tipo'], $_POST['latitude'], 
            $_POST['longitude'], $_POST['obs'], 
            $_POST['bairro'], $_POST['estacao'],
            $_POST['coordenador']
        );

        // Inserindo dados na tabela "ocorrencia"
        if ($stmt->execute()) {
            $ocorrencia_id = $conn->insert_id;

            // Consultar o ID do coordenador na tabela "usuario"
            $coordenador = $_POST['coordenador'];
            $query = "SELECT id_gestor FROM usuario WHERE nome = ?";
            $stmt_gestor = $conn->prepare($query);
            $stmt_gestor->bind_param("s", $coordenador);
            $stmt_gestor->execute();
            $stmt_gestor->bind_result($id_gestor);
            $stmt_gestor->fetch();
            $stmt_gestor->close();

            // Atualizar a tabela "ocorrencia" com informações do coordenador
            // $update_query = "UPDATE ocorrencia SET id_usu = ?, ba = ?, uf = ?, endereco = ?, obs = ? WHERE id = ?";
            // $stmt_update = $conn->prepare($update_query);
            // $stmt_update->bind_param("issssi", $id_gestor, $ba, $_POST['uf'], $_POST['endereco'], $_POST['obs'], $ocorrencia_id);
            // $stmt_update->execute();
            // $stmt_update->close();

            // Inserir os dados na tabela "atividade"
            $stmt_atividade = $conn->prepare("INSERT INTO atividade (ba, uf, id_usu, endereco, obs, status, tipo) VALUES (?, ?, ?, ?, ?, 'DESPCOORD', 'OC')");
            $stmt_atividade->bind_param("ssiss", $ba, $_POST['uf'], $id_gestor, $_POST['endereco'], $_POST['obs']);
            if ($stmt_atividade->execute()) {
                echo "Registro inserido com sucesso.";
            } else {
                echo "Erro ao inserir registro na tabela atividade: " . $stmt_atividade->error;
            }
            $stmt_atividade->close();
            
            // Criar diretório para as fotos
            $fotos_dir = 'fotos/' . $ocorrencia_id;
            if (!is_dir($fotos_dir)) {
                if (!mkdir($fotos_dir, 0755, true)) {
                    echo "Erro ao criar o diretório para as fotos.";
                }
            }

            // Processar e salvar fotos
            if (!empty($_FILES['foto_antes']['tmp_name'])) {
                $foto_antes_path = $fotos_dir . '/foto_antes.jpg';
                if (move_uploaded_file($_FILES['foto_antes']['tmp_name'], $foto_antes_path)) {
                    // Salvar o caminho da foto_antes no banco de dados
                    $stmt_foto_antes = $conn->prepare("UPDATE ocorrencia SET foto_antes = ? WHERE id = ?");
                    $stmt_foto_antes->bind_param("si", $foto_antes_path, $ocorrencia_id);
                    $stmt_foto_antes->execute();
                } else {
                    echo "Erro ao salvar foto_antes.";
                }
            }

            if (!empty($_FILES['foto_depois']['tmp_name'])) {
                $foto_depois_path = $fotos_dir . '/foto_depois.jpg';
                if (move_uploaded_file($_FILES['foto_depois']['tmp_name'], $foto_depois_path)) {
                    // Salvar o caminho da foto_depois no banco de dados
                    $stmt_foto_depois = $conn->prepare("UPDATE ocorrencia SET foto_depois = ? WHERE id = ?");
                    $stmt_foto_depois->bind_param("si", $foto_depois_path, $ocorrencia_id);
                    $stmt_foto_depois->execute();
                } else {
                    echo "Erro ao salvar foto_depois.";
                }
            }
        } else {
            echo "Erro ao inserir registro: " . $stmt->error;
        }

        // Feche a conexão
        $stmt->close();
        $conn->close();
    } else {
        echo "Campos obrigatórios não foram fornecidos.";
    }
} else {
    echo "Requisição inválida.";
}
?>
