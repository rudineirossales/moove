<?php

// Configurações do banco de dados
$servername = "185.213.81.103";
$username = "u504529778_icomon_";
$password = "Rud!n3!@";
$dbname = "u504529778_icomon_";



$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}



require 'vendor/autoload.php';

use Telegram\Bot\Api;

// Substitua 'TOKEN' pelo token do seu bot no Telegram
$telegramToken = '6433723961:AAEhEN9RAKGI0yPqdTyT7-rUs2RTxAMrTnI';

// Crie uma instância da API do Telegram
$telegram = new Api($telegramToken);

// Função para verificar a coluna 'status' na tabela 'reparo_hc'
function verificarStatusReparo()
{
    while (true) {
        // Coloque aqui a lógica para se conectar ao banco de dados e verificar a coluna 'status'
        // por exemplo, você pode usar mysqli para se conectar ao MySQL e executar a consulta

        // Aqui, simularemos uma verificação para fins de exemplo
        $status = "EM ANDAMENTO";

        if ($status === "EM ANDAMENTO") {
            enviarMensagemTelegram();
        }

        // Aguarda 10 segundos antes de verificar novamente
        sleep(10);
    }
}

// Função para enviar uma mensagem ao grupo no Telegram
function enviarMensagemTelegram()
{
    // Substitua 'GRUPO_ID' pelo ID do grupo no Telegram para onde deseja enviar a mensagem
    $grupoId = '-1001613780681';
    $mensagem = "Atenção, temos reparo em andamento!";

    try {
        global $telegram;
        $telegram->sendMessage([
            'chat_id' => $grupoId,
            'text' => $mensagem
        ]);
        echo "Mensagem enviada com sucesso!";
    } catch (Exception $e) {
        echo "Erro ao enviar mensagem: " . $e->getMessage();
    }
}

// Inicia a verificação do status em loop
verificarStatusReparo();
