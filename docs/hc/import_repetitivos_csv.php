<?php

 $state_csv = false;

 class csv extends mysqli
 { 

 function __construct()
 {

    parent::__construct("62.72.63.187","remoteicomon","Rud!n3!@","hc");
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
   $radio = $_POST['inlineRadioOptions'];
   echo "<pre> <strong>LOGS:</strong><br></pre>";  
   while ($row = fgetcsv($file))
   {
      
      $value = "'". implode("';'", $row). "'";

      
      
      $value2 = preg_replace("';'","','", $value);


      $value2 =  utf8_decode($value2);

      if($radio == 'repetitivos')
      {
         $q = "insert  into repetitivos (uf,sa,fim_execucao,matricula,nome,cod,fsloi_gpon,reparos_criticos,qtd_repeticoes,data_referencia,setor,hierarquia_coordenacao,hierarquia_gestor,cod_encerramento_macro,cod_desc_curta) values(". $value2 .")";
      }
      if($radio == 'garantia')
      {
         $q = "insert  into garantia (sa_anterior,id_companhia,matricula,tec_anterior,endereco,numero,complemento,coordenador_campo,coordenador_area,ag_hoje,sa_reparo,dias,matricula_atual,tecnico_atual,setor,data_referencia) values(". $value2 .")";
      }
      if($radio == 'repetida')
      {
         $q = "insert  into repetida (mes,cp,uf,num_documento,data_abertura,data_fechamento,cod_fechamento,macro_causa,descricao_curta,no_logradouro,nu_fachada,wfm,tecnico_anterior,gpon,sa,obs,posto,num_documento_anterior,matricula,nome,supervisor,gerente,setor,data_referencia) values(". $value2 .")";
      }
      if($radio == 'blacklist')
      {
         $q = "insert  into blacklist (gpon,no_logradouro,nu_fachada,sa,matricula,data,link_quality,optical_signal,dias,faixa_de_dias,tecnico,setor,coordenador_area,coordenador_campo,data_referencia) values(". $value2 .")";
      }
       if($radio == 'feedback')
      {
          
          
        $q = "insert  into feedback (coordenador_campo,coordenador_area,indicador,causa,matricula,nome,vol,data_referencia,chave) values(". $value2 .")";
      }
      
       if($radio == 'endereco')
      {
          
        $q = "insert into endereco (protocolo,uf,endereco,m3,m2,m1,m4,total_geral,data_ref,setor,coordenador_campo,coordenador_area) values(". $value2 .")";
      }

    

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