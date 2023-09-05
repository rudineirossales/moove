<?php
// Enable error reporting for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the 'sa' and 'obs_tec' fields are present in the request
    if (isset($_POST['sa']) && isset($_POST['obs_tec'])) {
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

        // Get the id_usu from the reparo_hc table based on the provided sa
        $sa = $conn->real_escape_string($_POST['sa']);
        $id_usu = "";
        $query = "SELECT id_usu FROM reparo_hc WHERE sa='$sa'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id_usu = $row['id_usu'];
        } else {
            echo "SA not found in reparo_hc table.";
            $conn->close();
            exit();
        }

        $hoje = date('Y-m-d H:i:s');

        // Escape special characters to avoid SQL injection
        $sa = $conn->real_escape_string($_POST['sa']);
        $obs_tec = $conn->real_escape_string($_POST['obs_tec']);
        $loggedInUserc = $conn->real_escape_string($id_usu);

        $sql = "UPDATE reparo_hc SET obs_tec='$obs_tec', data_execucao = '$hoje', status = '', contador = null WHERE sa='$sa' ";

        if ($conn->query($sql) === TRUE) {
            echo "Observação técnico saved successfully!";

            $sql_logs = "INSERT INTO logs_hc (sa, obs_tec, data_execucao, id_usu) VALUES ('$sa', '$obs_tec', '$hoje', '$loggedInUserc')";
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
        echo "Missing 'sa' or 'obs_tec' fields in the request.";
    }
} else {
    echo "Invalid request method. Only POST requests are allowed.";
}
?>
