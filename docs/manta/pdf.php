<?php

include 'mpdf/mpdf.php';


 include "conn.php";


 $protocolo =$_GET['protocolo'];
  

$select = mysql_query ("select * from mantas WHERE id ='$protocolo'");
	$linha = mysql_fetch_array($select);//atribui o array recebido a variavel $linha
	
	$row = mysql_num_rows($select);
  
  $html2 .= "<img src='img/icomon.png' alt='' width='80' height='80'  > <br><br>
  <H3>Relatório de atividade de instalação de mantas - PROTOCOLO - $linha[id]</H3> 
  	";
  do  
  {
    $html .= "

<span>UF:  $linha[uf]   </span><br>    
<span>CIDADE:  $linha[cidade]   </span><br>
<span>ESTAÇÃO:  $linha[estacao]   </span><br>
<span>BAIRRO:  $linha[bairro]   </span><br>
<span>ENDEREÇO:  $linha[endereco]   </span><br>

<span>DATA:  $linha[data]   </span><br>
<span>CONTATO:  $linha[contato]   </span><br>
<span>REDE:  $linha[tipo_rede]   </span><br>
<span>LATITUDE:  $linha[latitude]   </span><br>
<span>LOGITUDE:  $linha[logitude]   </span><br>
<span>QUANTIDADE DE MANTAS:  $linha[mantas]   </span><br>
<span>VENCIMENTO:  $linha[data_vencimento]   </span><br>
span>DESCRIÇÃO: <br> <fieldset style='border: 1px solid; padding: 12px;'>$linha[descricao]   </span></fieldset><br><br>


    <table border=1 >
    
    <tr>
    
    
    </tr>
    <tr>
     
      
    </tr>	
    <tr>
    <td> <img src='../Api/Evidencias_desligamento_copel/$linha[foto_antes]' width='300' height='300'><br> Foto antes CL</td>
    <td> <img src='../Api/Evidencias_desligamento_copel/$linha[foto_depois]' width='300' height='300'><br> Foto depois </td>
    
    
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