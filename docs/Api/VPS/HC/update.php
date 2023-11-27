<?php
// Enable error reporting for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the 'sa' and 'obs_tec' fields are present in the request
    if (isset($_POST['sa']) && isset($_POST['obs_tec'])) {
        // Connect to your database server
        $servername = "62.72.63.187"; // Altere para o endereço do seu servidor MySQL
        $username = "remoteicomon"; // Altere para o nome de usuário do seu banco de dados
        $password = "Rud!n3!@";
        $dbname = "hc";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get the id_usu from the reparo_hc table based on the provided sa
        $sa = $conn->real_escape_string($_POST['sa']);
        $id_usu = "";
        $query = "SELECT id_usu FROM reparo_hc WHERE sa='$sa'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id_usu = $row['id_usu'];
        } else {
            echo json_encode(['error' => "SA not found in reparo_hc table."]);
            $conn->close();
            exit();
        }

        $hoje = date('Y-m-d H:i:s');

        // Escape special characters to avoid SQL injection
        $sa = $conn->real_escape_string($_POST['sa']);
        $obs_tec = $conn->real_escape_string($_POST['obs_tec']);
        $loggedInUserc = $conn->real_escape_string($id_usu);
        $tratada = 'S';

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("UPDATE reparo_hc SET obs_tec=?, data_execucao=?, status='', contador=null, tratada=? WHERE sa=?");
        $stmt->bind_param("sssssssssssss", $obs_tec, $hoje, $sa, $tratada);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                // Update was successful
                echo json_encode(['message' => "Observação técnico saved successfully!"]);

                // Insert data into logs table
                $sql_logs = "INSERT INTO logs_hc (sa, obs_tec, data_execucao, id_usu) VALUES ('$sa', '$obs_tec', '$hoje', '$loggedInUserc')";
                if ($conn->query($sql_logs) !== TRUE) {
                    echo json_encode(['error' => "Error inserting data into logs table: " . $conn->error]);
                }
            } else {
                // No rows were updated
                echo json_encode(['error' => "No rows were updated."]);
            }
        } else {
            // Error updating
            echo json_encode(['error' => "Error updating observation: " . $conn->error]);
        }

        $stmt->close();
        $conn->close();
    } else {
        echo json_encode(['error' => "Missing 'sa' or 'obs_tec' fields in the request."]);
    }
} else {
    echo json_encode(['error' => "Invalid request method. Only POST requests are allowed."]);
}
?>
