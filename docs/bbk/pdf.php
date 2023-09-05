<?php

include '../mpdf/mpdf.php';


 include "conn.php";


 $ba =$_GET['ba'];
  

$select = mysql_query ("select * from atividade_bbk join usuario on atividade_bbk.id_usu = usuario.id 
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

<span>BA:  $linha[ba]   </span><br>    
<span>TÉCNICO:  $linha[nome]   </span><br>
<span>LOCALIDADE:  $linha[localidade]   </span><br>

<span>PONTA A:  $linha[estacao_a]   </span><br>
<span>PONTA B:  $linha[estacao_b]   </span><br>
<span>ENDEREÇO:  $linha[endereco]   </span><br>
<span>PRIORIDADE:  $linha[tipo]   </span><br>
<span>REDE:  $linha[tipo_rede]   </span><br>

<span>ABERTURA:  $linha[data_abertura]   </span><br>
<span>VENCIMENTO:  $linha[data_vencimento]   </span><br>
<span>DESPACHO:  $linha[data_despacho]   </span><br>
<span>NOME DO DESPACHO:  $linha[nome_despacho]   </span><br>
<span>DESPACHO PARA TÉCNICO:  $linha[data_desptec]   </span><br>
<span>ATRIBUIÇÃO:  $linha[data_atribuicao]   </span><br>
<span>VALIDAÇÃO:  $linha[data_validacao]   </span><br>
<span>NOME VALIDAÇÃO:  $linha[nome_validação]   </span><br>
<span>ENCERRAMENTO:  $linha[data_encerramento]   </span><br>

<span>COORDENADOR:  $linha[nome_gestor]   </span><br>

<span>CAUSA:  $linha[causa]   </span><br>
<span>SUB-CAUSA:  $linha[sub]   </span><br>
<span>RO:  $linha[ro]   </span><br>
<span>CIS:  $linha[cis]   </span><br>
<span>BARRAMENTO:  $linha[barramento]   </span><br>
<span>PRS:  $linha[prs]   </span><br>
<span>CIRCUITO:  $linha[ccto]   </span><br>
<span>CLIENTE:  $linha[cliente]   </span><br>

<span>DESCRIÇÃO TÉCNICO: <br> <fieldset style='border: 1px solid; padding: 12px;'>$linha[obs]   </span></fieldset><br><br>
<span>DESCRIÇÃO CL: <br> <fieldset style='border: 1px solid; padding: 12px;'>$linha[obs_cl]   </span></fieldset><br><br>

    <table border=1 >
    
    <tr>
    
    
    </tr>
    <tr>
     
      
    </tr>	
    <tr>
    <td> <img src='../Api/Backbone/backbone_foto/$linha[foto_antes]' width='300' height='300'><br> Evidência</td>
    <td> <img src='../Api/Backbone/backbone_foto/$linha[foto_depois]' width='300' height='300'><br> Evidência </td>
    
    
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