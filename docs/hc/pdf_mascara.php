<?php

include 'mpdf.php';


 include "conn.php";


 $sa =$_GET['sa'];
  

  $select = mysql_query ("select * from reparo_hc where sa ='$sa'");
	$linha = mysql_fetch_array($select);//atribui o array recebido a variavel $linha
	$row = mysql_num_rows($select);

  $select2 = mysql_query ("select * from logs_hc where sa ='$sa'");
	$linha2 = mysql_fetch_array($select2);//atribui o array recebido a variavel $linha
	$row2 = mysql_num_rows($select2);
  
  $html2 .= "<img src='../img/moove2.png' alt='' width='100' height='80'  > <br><br>
  <H3>Relatório de atividade - SA - $linha[sa]</H3> 
  	";
  do  
  {
    $html .= "

<span>Sa:  $linha[sa]   </span><br>    
<span>Data fim da atividade:  $linha[data_execucao]   </span><br>
<span>Companhia:  $linha[companhia]   </span><br>
<span>Técnico:  $linha[tecnico]   </span><br>
<span>Macro:  $linha[macro]   </span><br>
<span>Uf:  $linha[uf]   </span><br>
<span>Cliente:  $linha[cliente]   </span><br>
<span>Endereço:  $linha[endereco]   </span><br>
<span>Acesso Gpon:  $linha[acesso_gpon]   </span><br>
<span>Coordenador:  $linha[coordenador]   </span><br>
<span>DESCRIÇÃO TÉCNICO: <br> <fieldset style='border: 1px solid; padding: 12px;'>$linha[obs_tec]   </span></fieldset><br><br>

<div>
     <img src='../Api/VPS/HC/FOTOS_HC//$linha2[foto_antes]' width='320' height='300'> 
     <img src='../Api/VPS/HC/FOTOS_HC//$linha2[foto_depois]' width='320' height='300'>
     <img src='../Api/VPS/HC/FOTOS_HC//$linha2[terceira_imagem]'  width='320' height='300'><br>  
</div>
    
    
    
   ";
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