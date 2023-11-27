<?php

include 'mpdf/mpdf.php';


 include "../conn.php";



 $data =$_GET['data'];
 $data2 =$_GET['data2'];
  

$select = mysql_query ("select * from mantas WHERE data between '$data' and '$data2' ");
$linha = mysql_fetch_array($select);//atribui o array recebido a variavel $linha
	
	$row = mysql_num_rows($select);
  
  $html2 .= "<img src='../img/icomon.png' alt='' width='80' height='80'  > <br><br>
   
  	";
  do  
  {
    $html .= utf8_encode("
<H3>Relatorio de atividade de instalacao de mantas - PROTOCOLO - $linha[id]</H3>
<span>UF:  $linha[uf]   </span><br>    
<span>CIDADE:  $linha[cidade]   </span><br>
<span>ESTACAO:  $linha[estacao]   </span><br>
<span>BAIRRO:  $linha[bairro]   </span><br>
<span>ENDERECO:  $linha[endereco]   </span><br>
<span>CABO:  $linha[cabo]   </span><br>
<span>COORDENADOR:  $linha[coordenador]   </span><br>
<span>CONTATO:  $linha[contato]   </span><br>
<span>REDE:  $linha[tipo]   </span><br>
<span>LATITUDE:  $linha[latitude]   </span><br>
<span>LOGITUDE:  $linha[longitude]   </span><br>
<span>QUANTIDADE DE MANTAS:  $linha[mantas]   </span><br>
<span>QUANTIDADE DE ESPIRAL:  $linha[espiral]   </span><br>
<span>QUANTIDADE DE PLAQUETAS:  $linha[plaquetas]   </span><br>
<span>QUANTIDADE DE RESERVA:  $linha[reserva_tecnica]   </span><br>
<span>DATA DE ENVIO:  $linha[data]   </span><br>
<span>DESCRICAO: <br> <fieldset style='border: 1px solid; padding: 12px;'>$linha[descricao]   </span></fieldset><br><br>


    <table border=1 >
    
    <tr>
    
    
    </tr>
    <tr>
     
      
    </tr>	
    <tr>
    
    <td> <img src='../Api/VPS/MATAS/Preventivas_mantas_fotos/$linha[foto_depois]' width='300' height='300'><br> </td>
    
    
    </tr>
    
    
   
   
</table>");
  } while ($linha = mysql_fetch_array($select));

	
//==============================================================
//==============================================================
//==============================================================

include("../mpdf/mpdf.php");

$mpdf=new mPDF(); 
$css = file_get_contents("../css/styleRelatotio.css");
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($html2.$html);
$mpdf->Output();
exit;

//==============================================================
//==============================================================
//==============================================================


?> 