<?php

include 'mpdf.php';


 include "conn.php";


 $protocolo =$_GET['protocolo'];
  

 $select = mysql_query ("select * from endereco WHERE protocolo ='$protocolo'");
 $linha = mysql_fetch_array($select);//atribui o array recebido a variavel $linha
	
	$row = mysql_num_rows($select);
  
  $html2 .= "<img src='../img/moove2.png' alt='' width='100' height='80'  > <br><br>
  <H3>Relatório de endereço ofensores - PROTOCOLO - $linha[protocolo]</H3> 
  	";
  do  
  {
    $html .= utf8_encode("

<span>UF:  $linha[uf]   </span><br>    
<span>CIDADE:  $linha[cidade]   </span><br>
<span>MÊS:  $linha[mes]   </span><br>
<span>ENDEREÇO:  $linha[endereco]   </span><br>
<span>VOLUME:  $linha[volume]   </span><br>
<span>ESTAÇÃO:  $linha[estacao]   </span><br>
<span>SETOR:  $linha[setor]   </span><br>
<span>COORDENADOR:  $linha[coordenador_campo]   </span><br>


<span>DESCRIÇÃO: <br> <fieldset style='border: 1px solid; padding: 12px;'>$linha[descricao]   </span></fieldset><br><br>


    
<img src='fotos_gestao/$linha[foto1]' style='width: 600px; border: 4px solid #000;><br> 
<img src='fotos_gestao/$linha[foto2]' style='width: 600px; border: 4px solid #000;><br>
<img src='fotos_gestao/$linha[foto3]' style='width: 600px; border: 4px solid #000;><br> 
<img src='fotos_gestao/$linha[foto4]'style='width: 600px; border: 4px solid #000;><br> 
   
  
    
    
   
   
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