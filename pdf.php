<?php

include 'mpdf/mpdf.php';


 include "conn.php";


 $ba =$_GET['ba'];
  

$select = mysql_query ("select * from atividade join usuario on atividade.id_usu = usuario.id 
							WHERE ba ='$ba'
			");
	$linha = mysql_fetch_array($select);//atribui o array recebido a variavel $linha
	
	$row = mysql_num_rows($select);
  
  $html2 .= "<img src='img/icomon.png' alt='' width='80' height='80'  > <br><br>
  <H3>Relatório de atividade - BA - $linha[ba]</H3> 
  	";
  do  
  {
    $html .= "

<span>BA PAI:  $linha[ba_apoio]   </span>
<span>UF:  $linha[uf]   </span><br>
<span>CIDADE:  $linha[localidade]   </span><br>
<span>ESTAÇÃO:  $linha[estacao]   </span><br>
<span>ENDEREÇO:  $linha[endereco]   </span><br>
<span>CÉLULA:  $linha[celula]   </span><br>
<span>CDOE:  $linha[cdoe]   </span><br>
<span>PRIORIDADE:  $linha[tipo]   </span><br>
<span>REDE:  $linha[tipo_rede]   </span><br>
<span>AFETAÇÃO:  $linha[afetacao]   </span><br>
<span>ABERTURA:  $linha[data_abertura]   </span><br>
<span>VENCIMENTO:  $linha[data_vencimento]   </span><br>
<span>DESPACHO:  $linha[data_despacho]   </span><br>
<span>NOME DO DESPACHO:  $linha[nome_despacho]   </span><br>
<span>DESPACHO PARA TÉCNICO:  $linha[data_desptec]   </span><br>
<span>ATRIBUIÇÃO:  $linha[data_atribuicao]   </span><br>
<span>VALIDAÇÃO:  $linha[data_validacao]   </span><br>
<span>NOME VALIDAÇÃO:  $linha[nome_validação]   </span><br>
<span>ENCERRAMENTO:  $linha[data_encerramento]   </span><br>
<span>TÉCNICO:  $linha[nome]   </span><br>
<span>COORDENADOR:  $linha[nome_gestor]   </span><br>
<span>REDE:  $linha[tipo_rede]   </span><br>
<span>CAUSA:  $linha[causa]   </span><br>
<span>SUB-CAUSA:  $linha[sub]   </span><br>
<span>RO:  $linha[ro]   </span><br>
<span>CIS:  $linha[cis]   </span><br>
<span>DESCRIÇÃO TÉCNICO: <br> <fieldset style='border: 1px solid; padding: 12px;'>$linha[obs]   </span></fieldset><br><br>
<span>DESCRIÇÃO CL: <br> <fieldset style='border: 1px solid; padding: 12px;'>$linha[obs_cl]   </span></fieldset><br><br>




    
    <table border=1 >
    
    <tr>
    
    
    </tr>
    <tr>
     
      
    </tr>	
    <tr>
    <td> <img src='arquivo/$linha[evidencia1]' width='300' height='300'><br> Evidência CL</td>
    <td> <img src='arquivo/$linha[evidencia2]' width='300' height='300'><br> Evidência CL </td>
    <td> <img src='arquivo/$linha[evidencia3]' width='300' height='300'><br> Evidência Técnica</td>
    <td> <img src='arquivo/$linha[evidencia4]' width='300' height='300'><br> FOTO Técnica </td>
    
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