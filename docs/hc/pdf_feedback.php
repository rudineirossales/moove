<?php

include '../mpdf.php';


 include "conn.php";


 $matricula =$_GET['matricula'];
  

 $select = mysql_query ("select * from feedback WHERE matricula ='$matricula'");
 $linha = mysql_fetch_array($select);//atribui o array recebido a variavel $linha
	
	$row = mysql_num_rows($select);
  
  $html2 .= "<img src='img/moove2.png' alt='' width='100' height='80'  > <br><br>
  <H3>Relatório de garantia Feedback - Matrícula - $linha[matricula]</H3> 
  	";
  do  
  {
    $html .= utf8_encode("

<span>UF:  $linha[uf]   </span><br>    
<span>TÉCNICO:  $linha[nome]   </span><br>
<span>MATRÍCULA TÉCNICO ANTERIOR:  $linha[matricula]   </span><br>
<span>COORDENADOR:  $linha[coordenador_campo]   </span><br>
<span>FEEDBACK 1:  $linha[feedback1]   </span><br>
<span>FEEDBACK 2:  $linha[feedback2]   </span><br>
<span>FEEDBACK 3:  $linha[feedback3]   </span><br>
<span>FEEDBACK 4:  $linha[feedback4]   </span><br>







<span>DESCRIÇÃO: <br> <fieldset style='border: 1px solid; padding: 12px;'>$linha[descricao]   </span></fieldset><br><br>


   
    <img src='fotos_gestao/$linha[foto]' style='width: 600px; border: 4px solid #000;>
    
   
    
    
    
   
   
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