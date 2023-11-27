<?php

include 'mpdf.php';


 include "conn.php";


 $sa =$_GET['sa'];
  

 $select = mysql_query ("select * from repetitivos WHERE sa ='$sa'");
 $linha = mysql_fetch_array($select);//atribui o array recebido a variavel $linha
	
	$row = mysql_num_rows($select);
  
  $html2 .= "<img src='../img/moove2.png' alt='' width='100' height='80'  > <br><br>
  <H3>Relatório de justificativa repetitivos - SA - $linha[sa]</H3> 
  	";
  do  
  {
    $html .= utf8_encode("

<span>UF:  $linha[uf]   </span><br>    
<span>SA:  $linha[sa]   </span><br>
<span>FIM DA EXECUÇÃO:  $linha[fim_execucao]   </span><br>
<span>MATRÍCULA:  $linha[matricula]   </span><br>
<span>NOME:  $linha[nome]   </span><br>
<span>CÓD:  $linha[cod]   </span><br>
<span>CÓD. ENCERRAMENTO:  $linha[cod_encerramento]   </span><br>
<span>CÓD. DESCRIÇÃO CURTA:  $linha[ccod_desc_curta]   </span><br>
<span>GESTOR:  $linha[hierarquia_gestor]   </span><br>
<span>GPON:  $linha[fsloi_gpon]   </span><br>
<span>REPAROS CRÍTICOS:  $linha[reparos_criticos]   </span><br>
<span>QTD. DE REPETIÇÕES:  $linha[qtd_repeticoes]   </span><br>
<span>SETOR:  $linha[setor]   </span><br>
<span>CAUSA REPARO:  $linha[causa_reparo]   </span><br>
<span>DATA DO CADASTRO:  $linha[data_cadastro]   </span><br>






<span>AUDITORIA: <br> <fieldset style='border: 1px solid; padding: 12px;'>$linha[resultado_auditoria]   </span></fieldset><br><br>


   
    
 <img src='fotos_gestao/$linha[foto_potencia]' style='width: 600px; border: 4px solid #000; ' ><br> 
 <img src='fotos_gestao/$linha[foto_ont]' style='width: 600px; border: 4px solid #000;' ><br>
 <img src='fotos_gestao/$linha[foto_velocidade]' style='width: 600px; border: 4px solid #000;' ><br> 
 <img src='fotos_gestao/$linha[foto_rat]' style='width: 600px; border: 4px solid #000;' ><br> 
   

    
    
   
   
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