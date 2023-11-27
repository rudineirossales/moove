<?php

include 'mpdf.php';


 include "conn.php";


 $ba =$_GET['ba'];
  

$select = mysql_query ("select * from atividade join usuario on atividade.id_usu = usuario.id 
							WHERE ba ='$ba'
			");
	$linha = mysql_fetch_array($select);//atribui o array recebido a variavel $linha
	
	$row = mysql_num_rows($select);
  
  $html2 .= "<img src='img/moove2.png' alt='' width='100' height='80'  > <br><br>
  <H3>Relatório de atividade - BA - $linha[ba]</H3> 
  	";
  do  
  {
    $html .= utf8_encode("

    

<span>BA PAI:  $linha[ba_apoio]   </span><br>    
<span>DATA:  $linha[data]   </span><br>
<span>UF:  $linha[uf]   </span><br>
<span>CIDADE:  $linha[localidade]   </span><br>
<span>ESTACAO:  $linha[estacao]   </span><br>
<span>ENDERECO:  $linha[endereco]   </span><br>
<span>CELULA:  $linha[celula]   </span><br>
<span>CDOE:  $linha[cdoe]   </span><br>
<span>CAPACIDADE CABO:  $linha[capacidade_cabo]   </span><br>
<span>PRIORIDADE:  $linha[tipo]   </span><br>
<span>REDE:  $linha[tipo_rede]   </span><br>
<span>AFETACAO:  $linha[afetacao]   </span><br>
<span>ABERTURA:  $linha[data_abertura]   </span><br>
<span>VENCIMENTO:  $linha[data_vencimento]   </span><br>
<span>DESPACHO:  $linha[data_despacho]   </span><br>
<span>NOME DO DESPACHO:  $linha[nome_despacho]   </span><br>
<span>DESPACHO PARA TECNICO:  $linha[data_desptec]   </span><br>
<span>ATRIBUICAO:  $linha[data_atribuicao]   </span><br>
<span>VALIDACAO:  $linha[data_validacao]   </span><br>
<span>NOME VALIDACAO:  $linha[nome_validação]   </span><br>
<span>ENCERRAMENTO:  $linha[data_encerramento]   </span><br>
<span>TECNICO:  $linha[nome]   </span><br>
<span>COORDENADOR:  $linha[nome_gestor]   </span><br>
<span>REDE:  $linha[tipo_rede]   </span><br>
<span>CAUSA:  $linha[causa]   </span><br>
<span>SUB-CAUSA:  $linha[sub]   </span><br>
<span>RO:  $linha[ro]   </span><br>
<span>CIS:  $linha[cis]   </span><br>
<span>LATITUDE:  $linha[latitude]   </span><br>
<span>LONGITUDE:  $linha[longitude]   </span><br><br>

<span>DESCRICAO TECNICO: <br> <fieldset style='border: 1px solid; padding: 12px;'>$linha[obs]   </span></fieldset><br><br>
<span>DESCRICAO CL: <br> <fieldset style='border: 1px solid; padding: 12px;'>$linha[obs_cl]   </span></fieldset><br><br>
<div>
     <img src='arquivo/$linha[evidencia1]' width='320' height='300'> 
     <img src='arquivo/$linha[evidencia2]' width='320' height='300'><br> 
     </div>
     <br> <br> <br> 
     <img src='arquivo/$linha[foto_antes]'  width='320' height='300'> 
     <img src='arquivo/$linha[foto_depois]' width='320' height='300'><br> <br> <br> <br> 
     
     <H3>MATERIAIS UTILIZADOS:</H3>
     <span>DESCRICAO QUANTIDADE   </span><br>
   ");
  } while ($linha = mysql_fetch_array($select));


  $select2 = mysql_query ("select * from material where ba = '$ba'");
							
			
	$linha = mysql_fetch_array($select);//atribui o array recebido a variavel $linha
	
	$row = mysql_num_rows($select2);
  
  
  do  
  {
    $html .= utf8_encode("

<table >
     <tr>
       <th></th>
       <th></th>
       <th></th>
     </tr>
    
    <tr>
    
    <td>$linha[descricao] --------- </td>
    <td>$linha[quantidade]  </td>
  </tr>
  
</table>


   
    ");
  } while ($linha = mysql_fetch_array($select2));


	
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