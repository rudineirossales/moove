 <?php  

$token='6120225659:AAExp7HXFHF9QqyYGGyEBBpwhyO0nZWikxI';
$grupo='-1001776452894';


$parametros['chat_id']=$grupo;

if($status == 'DESPACHADA' and $tipo == '97'){
$parametros['text']='BA:'.$ba.'
ESTAÇÃO:'.$estacao.'
CELULA:'.$celula.'
CDOE:'.$cdoe_cdoia.'
ENDEREÇO:'.$endereco.'
PRIORIDADE:'.$tipo.'
REDE:'.$afetacao.'
REDE:'.$tipo_rede.'
ABERTURA:'.$data_abertura.'
VENC.:'.$data_vencimento.'
COORD:'.$gestor.'
STATUS:'.$status.'
OBS:'.$obs;
}
if($status == 'ENCERRADO' and $tipo == '97'){
	$parametros['text']='BA:'.$ba.'
	STATUS:'.$status.'
	POR:'.$por;
	


}
if($status == 'REPROVADO' and $tipo == '97'){
	$parametros['text']='BA:'.$ba.'
	STATUS:'.$status.'
	POR:'.$por.'
	TEC:'.$nome.'
	OBS:'.$obs_rej;


}

// PARA ACEITAR TAGS HTML
$parametros['parse_mode']='html'; 
// PARA NÃO MOSTRAR O PREVIW DE UM LINK
$parametros['disable_web_page_preview']=true; 

$options = array(
	'http' => array(
	'method'  => 'POST',
	'content' => json_encode($parametros),
	'header'=>  "Content-Type: application/json\r\n" .
				"Accept: application/json\r\n"
	)
);

$context  = stream_context_create( $options );
file_get_contents('https://api.telegram.org/bot'.$token.'/sendMessage', false, $context );


?>


