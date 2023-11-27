
  // Verifica se o formulário foi enviado
<?
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conecta ao banco de dados (substitua as informações de conexão conforme suas configurações)
     $servername = "62.72.63.187";
    $username = "remoteicomon";
    $password = "Rud!n3!@";
    $dbname = "icomon";


    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão com o banco de dados
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }
date_default_timezone_set('America/Sao_Paulo');
    // Get the form data
    $ba = $_POST['ba']; // Assuming the identifier (ID) is being sent from the Flutter app
    $causa = $_POST['causa'];
    $sub = $_POST['sub'];
    $ro = $_POST['ro'];
    $cis = $_POST['cis'];
    $obs = $_POST['obs'];
    $hoje = date('Y-m-d H:i:s');

    $diretorioFotos = '../../arquivo/';

    // Verifica se o diretório existe, se não, cria o diretório
    if (!is_dir($diretorioFotos)) {
        mkdir($diretorioFotos, 0755, true);
    }

    // Prepare and bind the SQL statement
    if ($stmt = $conn->prepare("INSERT INTO atividade (ba, causa, sub, ro, cis, obs, foto_antes, foto_depois, data_encerramento) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE causa = VALUES(causa), sub = VALUES(sub), ro = VALUES(ro), cis = VALUES(cis), obs = VALUES(obs), foto_antes = VALUES(foto_antes), foto_depois = VALUES(foto_depois), data_encerramento = VALUES(data_encerramento)")) {
        // Upload and save the photo_before
        if ($_FILES['foto_antes']['error'] === UPLOAD_ERR_OK) {
            $tempFileBefore = $_FILES['foto_antes']['tmp_name'];
            $fileNameBefore = time() . '_' . $_FILES['foto_antes']['name'];
            $caminhoFotoAntes = $diretorioFotos . '/' . $fileNameBefore;

            if (move_uploaded_file($tempFileBefore, $caminhoFotoAntes)) {
                $_POST['foto_antes'] = $fileNameBefore;
            } else {
                $response['success'] = false; 
                $response['message'] = 'Error uploading photo_before';
                echo json_encode($response);
                exit;
            }
        } else {
            $_POST['foto_antes'] = ''; // Empty value if no photo was uploaded
        }

        // Upload and save the photo_after
        if ($_FILES['foto_depois']['error'] === UPLOAD_ERR_OK) {
            $tempFileAfter = $_FILES['foto_depois']['tmp_name'];
            $fileNameAfter = time() . '_' . $_FILES['foto_depois']['name'];
            $caminhoFotoDepois = $diretorioFotos . '/' . $fileNameAfter;

            if (move_uploaded_file($tempFileAfter, $caminhoFotoDepois)) {
                $_POST['foto_depois'] = $fileNameAfter;
            } else {
                $response['success'] = false;
                $response['message'] = 'Error uploading photo_after';
                echo json_encode($response);
                exit;
            }
        } else {
            $_POST['foto_depois'] = ''; // Empty value if no photo was uploaded
        }
        
        $sql_update_status = "UPDATE atividade SET status = 'EM VALIDACAO' WHERE ba = '$ba'";
    if ($conn->query($sql_update_status) === FALSE) {
        $response['success'] = false;
        $response['message'] = 'Error updating status in atividade table: ' . $conn->error;
        echo json_encode($response);
        $conn->close();
        exit;
    }

        // Bind the parameters
        $stmt->bind_param("issssssss", $ba, $causa, $sub, $ro, $cis, $obs, $_POST['foto_antes'], $_POST['foto_depois'], $hoje);

        $response = array(); // Initialize the response array

        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = 'Data saved successfully';
        } else {
            $response['success'] = false;
            $response['message'] = 'Error saving data: ' . $stmt->error;
        }

        $stmt->close();
    } else {
        $response['success'] = false;
        $response['message'] = 'Error preparing SQL statement: ' . $conn->error;
    }

    $conn->close();

    // Return the JSON response
    echo json_encode($response);
} else {
    echo 'Invalid request method';
}
