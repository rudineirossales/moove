<?php
// Make sure the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the 'sa', 'obs_tec', and 'loggedInUser' fields are present in the request
    if (isset($_POST['sa']) && isset($_POST['obs_tec']) && isset($_POST['loggedInUser'])) {
        // Connect to your database server
        $servername = "185.213.81.103";
        $username = "u504529778_hc";
        $password = "Rud!n3!@";
        $dbname = "u504529778_hc";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Escape special characters to avoid SQL injection
        $sa = $conn->real_escape_string($_POST['sa']);
        $obs_tec = $conn->real_escape_string($_POST['obs_tec']);
        $loggedInUser = $conn->real_escape_string($_POST['loggedInUser']);

        // Resto do código para manipular os dados recebidos da API
        // Aqui você pode realizar qualquer processamento ou inserção necessários no seu banco de dados ou realizar outras ações com os dados enviados pelo aplicativo Flutter.

        // Atualização do reparo_hc
        $hoje = date('Y-m-d H:i:s');
        $sql = "UPDATE reparo_hc SET obs_tec='$obs_tec', data_execucao='$hoje', status='', contador=null WHERE sa='$sa' ";

        if ($conn->query($sql) === TRUE) {
            echo "Observação técnico saved successfully!";

            // Inserção dos dados na tabela logs_hc, incluindo o loggedInUser
            $sql_logs = "INSERT INTO logs_hc (sa, obs_tec, data_execucao, id_usu) VALUES ('$sa', '$obs_tec', '$hoje', '$loggedInUser')";
            if ($conn->query($sql_logs) === TRUE) {
                echo "Data inserted into logs table successfully!";
            } else {
                echo "Error inserting data into logs table: " . $conn->error;
            }
            
        } else {
            echo "Error updating observation: " . $conn->error;
        }

        $conn->close();
    } else {
        // Caso algum dos campos esteja faltando na requisição
        http_response_code(400);
        echo "Missing 'sa', 'obs_tec', or 'loggedInUser' fields in the request.";
    }
} else {
    // Caso a requisição não seja do tipo POST
    http_response_code(405);
    echo "Invalid request method. Only POST requests are allowed.";
}
?>
