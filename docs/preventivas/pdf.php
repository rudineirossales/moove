<?php

include 'mpdf/mpdf.php';


 include "../conn.php";


 $protocolo =$_GET['protocolo'];
  

$select = mysql_query ("select * from preventivass WHERE id ='$protocolo'");
$linha = mysql_fetch_array($select);//atribui o array recebido a variavel $linha
	
	$row = mysql_num_rows($select);
  
  $html2 .= "<img src='../img/moove2.png' alt='' width='80' height='80'  > <br><br>
  <H3>Relatório de atividade - PROTOCOLO - $linha[id]</H3> 
  	";
  do  
  {
    $html .= "

<span>BA:  $linha[ba]   </span><br>
<span>UF:  $linha[uf]   </span><br>    
<span>CIDADE:  $linha[cidade]   </span><br>
<span>ESTAÇÃO:  $linha[estacao]   </span><br>
<span>ENDEREÇO:  $linha[endereco]   </span><br>
<span>CABO:  $linha[celula]   </span><br>
<span>COORDENADOR:  $linha[coordenador]   </span><br>
<span>CONTATO:  $linha[contato]   </span><br>
<span>REDE:  $linha[tipo_rede]   </span><br>
<span>LATITUDE:  $linha[latitude]   </span><br>
<span>LOGITUDE:  $linha[longitude]   </span><br>
<span>QUANTIDADE DE MANTAS:  $linha[mantas]   </span><br>
<span>QUANTIDADE DE ESPIRAL:  $linha[espiral]   </span><br>
<span>QUANTIDADE DE PLAQUETAS:  $linha[plaquetas]   </span><br>
<span>QUANTIDADE DE RESERVA:  $linha[reserva_tecnica]   </span><br>
<span>TRAVESSIA:  $linha[travessias_regularizadas]   </span><br>
<span>CDOE  $linha[cdoe_regularizada]   </span><br>
<span>CABO ESPINADO:  $linha[cabo_desespinado]   </span><br>
<span>HUBBOX:  $linha[hubbox]   </span><br>
<span>REDE REGULARIZADA:  $linha[rede_regularizada]   </span><br>
<span>LANÇAMENTO DE CABO:  $linha[lancamento_cabo]   </span><br>
<span>CAPACIDADE DO CABO:  $linha[capacidade_cabo]   </span><br>
<span>DUTO LATERAL:  $linha[duto_lateral]   </span><br>
<span>INSTALAÇÃO DE POSTE:  $linha[instalacao_poste]   </span><br>
<span>REMOÇÃO DE POSTE:  $linha[remocao_poste]   </span><br>
<span>DATA:  $linha[data]   </span><br>


    <table border=1 >
    
    <tr>
    
    
    </tr>
    <tr>
     
      
    </tr>	
    <tr>
    <td> <img src='../Api/VPS/PREVENTIVAS/Preventivas/$linha[foto_antes]' width='30%' height='30%'><br></td>
    <td> <img src='../Api/VPS/PREVENTIVAS/Preventivas/$linha[foto_depois]' width='30%' height='30%'><br></td>
    <td> <img src='../Api/VPS/PREVENTIVAS/Preventivas/$linha[foto1]' width='30%' height='30%'><br></td>
    <td> <img src='../Api/VPS/PREVENTIVAS/Preventivas/$linha[foto2]' width='30%' height='30%'><br></td>
    
    
    </tr>
    
    
   
   
</table>";
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