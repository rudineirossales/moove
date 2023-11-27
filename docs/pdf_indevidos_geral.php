<?php

include 'mpdf.php';


 include "conn.php";


 $data =$_GET['data'];
 $data2 =$_GET['data2'];
 $tipo =$_GET['tipo'];
 
  if($tipo == 'TUDO')
  {
    $select = mysql_query ("select * from indevido WHERE data between '$data' and '$data2'");  
  }
  else
  {
   $select = mysql_query ("select * from indevido WHERE data between '$data' and '$data2' and prioridade = '$tipo'");   
  }
  
                            
  


 $linha = mysql_fetch_array($select);//atribui o array recebido a variavel $linha
	
	$row = mysql_num_rows($select);
  
  $html2 .= "<img src='img/moove2.png' alt='' width='100' height='80'  > <br><br>
  
  	";
  do  
  {
    $html .= "
    <H3>Relatório de atividades indevidas - BA - $linha[ba]</H3> 
<span>BA:  $linha[ba]   </span><br>    
<span>ESTAÇÃO:  $linha[estacao]   </span><br>
<span>PRIORIDADE:  $linha[prioridade]   </span><br>
<span>TIPO:  $linha[tipo_7048]   </span><br>
<span>SA:  $linha[sa]   </span><br>
<span>ID GPON:  $linha[id_gpon]   </span><br>
<span>ESTAÇÃO:  $linha[estacao]   </span><br>
<span>DATA DE ABERTURA:  $linha[data_abertura]   </span><br>
<span>OPERADOR:  $linha[operador]   </span><br>
<span>DATA DO CADASTRO:  $linha[data]   </span><br>

<span>DESCRIÇÃO: <br> <fieldset style='border: 1px solid; padding: 12px;'>$linha[obs]   </span></fieldset><br><br>


    <table border=1 >
    
    <tr>
    
    
    </tr>
    <tr>
     
      
    </tr>	
    <tr>
    <td> <img src='arquivo/$linha[evidencia]' ></td>
   
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