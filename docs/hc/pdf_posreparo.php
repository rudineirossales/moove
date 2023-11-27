<?php

include '../mpdf.php';


 include "conn.php";


 $sa =$_GET['sa'];
  

  $select = mysql_query ("select * from reparo_hc WHERE sa ='$sa'");
  $linha = mysql_fetch_array($select);//atribui o array recebido a variavel $linha
	
	$row = mysql_num_rows($select);

  $sql2 = mysql_query ("select * from logs_hc where sa = '$sa'" );
  $dado2 = mysql_num_rows($sql2);
  
  while ($dado2 = mysql_fetch_assoc($sql2)){
    $foto_antes=$dado2["foto_depois"];
    $foto_depois=$dado2["foto_depois"];
    $terceira_imagem=$dado2["terceira_imagem"];
    
    }
  
  $html2 .= "<img src='../img/moove2.png' alt='' width='100' height='80'  > <br><br>
  <H3>Relatório de pós contato - SA - $linha[sa]</H3> 
  	";
  do  
  {
    $html .= "

<span>UF:  $linha[uf]   </span><br>    
<span>SA:  $linha[sa]   </span><br>
<span>GPON:  $linha[acesso_gpon]   </span><br>
<span>MACRO:  $linha[macro]   </span><br>
<span>CLIENTE:  $linha[cliente]   </span><br>

<span>ENDEREÇO:  $linha[endereco]   </span><br>
<span>DATA CONTATO 1º DIA:  $linha[data_contato1]   </span><br>
<span>OPERADOR CONTATO 1º DIA:  $linha[contato1]   </span><br>
<span>POTÊNCIA CONTATO 1º DIA:  $linha[potencia]   </span><br>
<span>DESCRIÇÃO CONTATO 1º DIA <br> <fieldset style='border: 1px solid; padding: 12px;'>$linha[obs_contato1]   </span></fieldset><br><br>
<span>DATA CONTATO 5º DIA:  $linha[data_contato3]   </span><br>
<span>POTÊNCIA CONTATO 5º DIA:  $linha[potencia_3]   </span><br>
<span>OPERADOR CONTATO 5º DIA:  $linha[contato3]   </span><br>
<span>DESCRIÇÃO CONTATO 5º DIA <br> <fieldset style='border: 1px solid; padding: 12px;'>$linha[obs_contato3]   </span></fieldset><br><br>
<span>OBSERVAÇÃO DO TÉCNICO<br> <fieldset style='border: 1px solid; padding: 12px;'>$linha[obs_tec]   </span></fieldset><br><br>


   
    
    <img src='../Api/VPS/HC/FOTOS_HC/$foto_antes' style='width: 600px; border: 4px solid #000;'><br>
    <img src='../Api/VPS/HC/FOTOS_HC/$foto_depois' style='width: 600px; border: 4px solid #000;'><br>
    <img src='../Api/VPS/HC/FOTOS_HC/$terceira_imagem' style='width: 600px; border: 4px solid #000;'><br>
    
    

    
   
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