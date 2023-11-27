<?php
// Verifique se a solicitação é um POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupere os dados do POST
    $ba = $_POST['ba'];
    $latitude_final = $_POST['latitude_final'];
    $longitude_final = $_POST['longitude_final'];

    // Faça a conexão com o banco de dados (ajuste essas configurações conforme o seu banco)
    $servername = "62.72.63.187"; // Altere para o endereço do seu servidor MySQL
    $username = "remoteicomon"; // Altere para o nome de usuário do seu banco de dados
    $password = "Rud!n3!@"; // Altere para a senha do seu banco de dados
    $dbname = "icomon";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifique a conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Verifique se já existe um registro com o mesmo "ba"
    $checkQuery = "SELECT * FROM atividade_bbk WHERE ba = '$ba'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        // Atualize o registro existente com as novas coordenadas
        $updateQuery = "UPDATE atividade_bbk SET latitude_final = '$latitude_final', longitude_final = '$longitude_final' WHERE ba = '$ba'";
        if ($conn->query($updateQuery) === TRUE) {
            echo "Coordenadas atualizadas no banco de dados com sucesso!";
        } else {
            echo "Erro ao atualizar coordenadas no banco de dados: " . $conn->error;
        }
    } else {
        // Não existe registro com o "ba" fornecido, insira um novo registro
        $insertQuery = "INSERT INTO atividade_bbk (ba, latitude_final, longitude_final)
                        VALUES ('$ba', '$latitude_final', '$longitude_final')";
        if ($conn->query($insertQuery) === TRUE) {
            echo "Coordenadas inseridas no banco de dados com sucesso!";
        } else {
            echo "Erro ao inserir coordenadas no banco de dados: " . $conn->error;
        }
    }

    // Feche a conexão com o banco de dados
    $conn->close();
} else {
    echo "Método de requisição inválido.";
}
?>
