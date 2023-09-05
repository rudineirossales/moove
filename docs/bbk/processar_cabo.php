
<?php  

include "conn.php"; 

?>




<?php

$cabo = $_GET['cabo'];
$seleciona_dados = mysql_query("select * from cabo where cabo = '".$_GET['cabo']."'");
$linha_recupera_dados = mysql_num_rows($seleciona_dados);
$lin_dado_cli = mysql_fetch_array($seleciona_dados);
if($linha_recupera_dados == 0 ){ 
echo
'
       
       <div id="principal" >
    <br>
    
    <div class="form-group" name="teste" id="teste" >
     <label for="pwd">ENTRE LOCALIDADES:</label>
      <input type="text" class="form-control" id="entre_local" name="entre_local"  required  >
      
  </div>
   </div>


    
 
';
}


else  {
	echo

	'

	
    
<div id="principal" >
    <br>
    <div class="form-group" name="teste" id="teste" >
     <label for="pwd">ENTRE LOCALIDADES:</label>
      <input type="text" class="form-control" id="entre_local" name="entre_local" value="'.$lin_dado_cli['trecho'].'" required readonly >

    </div>
       </div>

	';}
	
	
?>








