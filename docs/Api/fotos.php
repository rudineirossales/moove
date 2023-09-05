<?php

// Assuming you have a folder named "evidencias" in your database
$uploadFolder = '/public_html/move/foto/';

// Check if the request contains the "fotoAntes" file
if (isset($_FILES['fotoAntes'])) {
    $fotoAntes = $_FILES['fotoAntes'];

    // Move the uploaded file to the desired folder
    $fotoAntesPath = $uploadFolder . basename($fotoAntes['name']);
    move_uploaded_file($fotoAntes['tmp_name'], $fotoAntesPath);

    // You can now save the $fotoAntesPath to your database or perform any other required actions
}

// Check if the request contains the "fotoDepois" file
if (isset($_FILES['fotoDepois'])) {
    $fotoDepois = $_FILES['fotoDepois'];

    // Move the uploaded file to the desired folder
    $fotoDepoisPath = $uploadFolder . basename($fotoDepois['name']);
    move_uploaded_file($fotoDepois['tmp_name'], $fotoDepoisPath);

    // You can now save the $fotoDepoisPath to your database or perform any other required actions
}

// You can return a response to your Flutter app if needed
$response = [
    'message' => 'Images uploaded successfully',
    'fotoAntesPath' => $fotoAntesPath ?? null,
    'fotoDepoisPath' => $fotoDepoisPath ?? null,
];
echo json_encode($response);
