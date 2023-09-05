<?php

include 'mpdf/mpdf.php';


 include "conn.php";


 $ba =$_GET['ba'];
  

$select = mysql_query ("select * from pos_ba WHERE ba ='$ba'");
 $linha = mysql_fetch_array($select);//atribui o array recebido a variavel $linha
	
	$row = mysql_num_rows($select);
  
  $html2 .= "<img src='img/icomon.png' alt='' width='80' height='80'  > <br><br>
  <H3>Relatório de Vistoria Pós ba - BA - $linha[ba]</H3> 
  	";
  do  
  {
    $html .= "

<span>BA:  $linha[ba]   </span><br>    
<span>TÉCNICO:  $linha[nome]   </span><br>
<span>COORDENADOR:  $linha[nome_gestor]   </span><br>
<span>ESTAÇÃO:  $linha[estacao]   </span><br>
<span>DATA DE ENCERRAMENTO:  $linha[data_validacao]   </span><br>
<span>DATA DA VISTORIA:  $linha[data]   </span><br>
<span>ENDEREÇO:  $linha[endereco]   </span><br>

<span>DESCRIÇÃO: <br> <fieldset style='border: 1px solid; padding: 12px;'>$linha[descricao]   </span></fieldset><br><br>


    <table border=1 >
    
    <tr>
    
    
    </tr>
    <tr>
     
      
    </tr>	
    <tr>
    <td> <img src='Api/FTTH/photos/$linha[foto]' width='300' height='300'><br> Evidência CL</td>
   
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