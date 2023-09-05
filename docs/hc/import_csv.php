<?php

 $state_csv = false;

 class csv extends mysqli
 { 

 function __construct()
 {

    parent::__construct("185.213.81.103","u504529778_hc","Rud!n3!@","u504529778_hc");
    if($this->connect_error)
    {

          echo "Conexão falhou". $this->connect_error;

    }


 }
function import($file)
{
   $contador = 0;
   $contador2 = 0;
   $file = fopen($file, 'r');
   echo "<pre> <strong>LOGS:</strong><br></pre>";  
   while ($row = fgetcsv($file))
   {
      
      $value = "'". implode("';'", $row). "'";

      
      
      $value2 = preg_replace("';'","','", $value);


      $value2 =  utf8_decode($value2);

      





      
      
      $q = "insert  into reparo_hc (sa,data_execucao,companhia,tecnico,macro,uf,cliente,contato,endereco) values(". $value2 .")";

      




      if ( $this->query($q) ) 
      {

              $this->state_csv = true;


             


      } 

      else
      {

                $this->state_csv = false;

      }
             
    if ( $this->state_csv)
    {

           
           $contador = $contador + 1; 

    }

    else
    {

      
      $contador2 = $contador2 + 1; 

    }

   }
   echo "<pre style='color:green;'> Upload de $contador arquivos<br></pre>";
   echo "<pre style='color:red;'> Arquivos duplicados $contador2 <br></pre>";
}
}

?>