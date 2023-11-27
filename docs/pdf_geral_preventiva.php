<?php

include 'mpdf.php';
include "conn.php";


 $data =$_GET['data'];
 $data2 =$_GET['data2'];
  

$select = mysql_query ("select * from preventiva_contratual WHERE data_referencia between '$data' and '$data2' and status='CONCLUIDO'");
 $linha = mysql_fetch_array($select);//atribui o array recebido a variavel $linha
	
	$row = mysql_num_rows($select);
  
  $html2 .= "<img src='img/moove2.png' alt='' width='100' height='80'  > <br><br>
   
  	";
  do  
  {
    $html .= "
    <H3>Relatório geral de preventiva contratual - BA - $linha[ba]</H3> 
    <span>BA:  $linha[ba]   </span><br>    
    <span>GRAM:  $linha[gram]   </span><br>
    <span>ESTAÇÃO:  $linha[estacao]   </span><br>
    <span>KM:  $linha[cabo_km]   </span><br>
    <span>CABO:  $linha[cabo]   </span><br>
    <span>ENLACE:  $linha[enlace]   </span><br>
    <span>TÉCNICO:  $linha[tecnico]   </span><br> 
    <span>DATA REFERÊNCIA:  $linha[data_referencia]   </span><br>
    <span>DATA BAIXA:  $linha[data]   </span><br><span>DATA DO CADASTRO:  $linha[data_cadastro]   </span><br>

    <span>DESCRIÇÃO: <br> <fieldset style='border: 1px solid; padding: 12px;'>$linha[descricao]   </span></fieldset><br><br>


    <table border=1 >
    
    <tr>
    
    
    </tr>
    <tr>
     
      
    </tr>	
    <tr>
    <td> <img src='Api/VPS/preventiva_contratual/$linha[foto1]' width='400' height='400'><br> Evidência</td>
    <td> <img src='Api/VPS/preventiva_contratual/$linha[foto2]' width='400' height='400'><br> Evidência</td>
    <td> <img src='Api/VPS/preventiva_contratual/$linha[foto3]' width='400' height='400'><br> Evidência</td>
    <td> <img src='Api/VPS/preventiva_contratual/$linha[foto4]' width='400' height='400'><br> Evidência</td>
    </tr> 
    
    
   
   
</table> <br><br><br>";
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