<?php

include '../mpdf.php';


 include "conn.php";


 $sa =$_GET['sa'];
  

 $select = mysql_query ("select * from garantia WHERE sa_reparo ='$sa'");
 $linha = mysql_fetch_array($select);//atribui o array recebido a variavel $linha
	
	$row = mysql_num_rows($select);
  
  $html2 .= "<img src='../img/moove2.png' alt='' width='100' height='80'  > <br><br>
  <H3>Relatório de garantia repetitivos - SA - $linha[sa]</H3> 
  	";
  do  
  {
    $html .= utf8_encode("

<span>SA:  $linha[sa_reparo]   </span><br>    
<span>ID COMPANHIA:  $linha[id_companhia]   </span><br>
<span>MATRÍCULA TÉCNICO ANTERIOR:  $linha[matricula]   </span><br>
<span>NOME TÉCNICO ANTERIOR:  $linha[tec_anterior]   </span><br>
<span>ENDEREÇO:  $linha[endereco]   </span><br>
<span>NÚMERO:  $linha[numero]   </span><br>
<span>COMPLEMENTO:  $linha[complemento]   </span><br>
<span>COORDENADOR:  $linha[coordenador_campo]   </span><br>
<span>AGENDAMENTO:  $linha[ag_hoje]   </span><br>
<span>DIAS:  $linha[dias]   </span><br>
<span>TÉCNICO ATUAL:  $linha[tecnico_atual]   </span><br>
<span>MATRÍCULA ATUAL:  $linha[matricula_atual]   </span><br>

<span>CAUSA REPARO:  $linha[causa_reparo]   </span><br>
<span>DATA DO CADASTRO:  $linha[data_cadastro]   </span><br>






<span>AUDITORIA: <br> <fieldset style='border: 1px solid; padding: 12px;'>$linha[resultado_auditoria]   </span></fieldset><br><br>


    
    <img src='fotos_gestao/$linha[foto_potencia]' style='width: 600px; border: 4px solid #000;><br> 
    <img src='fotos_gestao/$linha[foto_ont]' style='width: 600px; border: 4px solid #000;><br> 
    <img src='fotos_gestao/$linha[foto_velocidade]' style='width: 600px; border: 4px solid #000;><br> 
    <img src='fotos_gestao/$linha[foto_rat]' style='width: 600px; border: 4px solid #000;><br> 
   
   
    
    
   
   
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