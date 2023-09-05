<?php

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the data sent from the Flutter app
    $nome = $_POST['nome'] ?? '';
    $tipo = $_POST['tipo'] ?? '';

    // Validate the data (you can add more validation as needed)
    if (empty($nome) || empty($tipo)) {
        http_response_code(400);
        echo 'Invalid data: Both nome and tipo are required.';
        exit;
    }

    // Replace these with your actual database credentials
    $dbHost = '185.213.81.103';
    $dbUsername = 'u504529778_icomon_';
    $dbPassword = 'Rud!n3!@';
    $dbName = 'u504529778_icomon_';

    // Connect to the database
    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    // Check the database connection
    if ($conn->connect_error) {
        http_response_code(500);
        echo 'Database connection failed: ' . $conn->connect_error;
        exit;
    }

    // Prepare the data for insertion (to prevent SQL injection)
    $nome = $conn->real_escape_string($nome);
    $tipo = $conn->real_escape_string($tipo);

    // Insert data into the 'mantas' table
    $sql = "INSERT INTO mantas (nome, tipo) VALUES ('$nome', '$tipo')";

    if ($conn->query($sql) === TRUE) {
        http_response_code(200);
        echo 'Data inserted successfully.';
        exit;
    } else {
        http_response_code(500);
        echo 'Error while inserting data: ' . $conn->error;
        exit;
    }

    // Close the database connection
    $conn->close();
} else {
    http_response_code(405);
    echo 'Method not allowed.';
    exit;
}
