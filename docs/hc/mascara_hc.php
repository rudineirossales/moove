<?php 
         include "conn.php"; 
      
         session_start();

         if(!isset($_SESSION["login"]) &&  !isset($_SESSION["senha"])  )
            {
                 header("Location: index.html");
                  exit;
            }


          

            $sql = mysql_query ("select * from reparo_hc where sa = '$ba'" );

            $row = mysql_num_rows($sql);


                if (mysql_num_rows($sql) > 0)

                {
                    while ($dado = mysql_fetch_assoc($sql))
                    {
                        
                        $sa = $dado["sa"];
                        $data_execucao = $dado["data_execucao"];
                        $companhia = $dado["companhia"];
                        $tecnico = $dado["tecnico"];
                        $macro = $dado["macro"];
                        $uf = $dado["uf"];
                        $cliente = $dado["cliente"];
                        $contato = $dado["contato"];
                        $endereco = $dado["endereco"];
                        $funcionalidade = $dado["funcionalidade"];
                        $contato1 = $dado["contato1"];
                        $data_contato1 = $dado["data_contato1"];
                        $obs_contato1 = $dado["obs_contato1"];

                        $funcionalidade_2 = $dado["funcionalidade_2"];
                        $contato2 = $dado["contato2"];
                        $data_contato2 = $dado["data_contato2"];
                        $obs_contato2 = $dado["obs_contato2"];
                        
                        $funcionalidade_3 = $dado["funcionalidade_3"];
                        $contato3 = $dado["contato3"];
                        $data_contato3 = $dado["data_contato3"];
                        $obs_contato3 = $dado["obs_contato3"];
                        
                        $funcionalidade_4 = $dado["funcionalidade_4"];
                        $contato4 = $dado["contato4"];
                        $data_contato4 = $dado["data_contato4"];
                        $obs_contato = $dado["obs_contato4"];

                        $coordenador = $dado["coordenador"];
                        $obs_tec = $dado["obs_tec"];
                       
                    }
                
                }

            

?>



<!DOCTYPE html>
<html lang="en">
  <head>

  <link rel="icon" href="img/icomon.png">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>







  
<style>
  #loading
{
  
width:70px;
height:70px;  
}


fieldset 
	{
		border: 1px solid #ddd !important;
		margin: 0;
		
		padding: 10px;       
		
		border-radius:4px;
		
		padding-left:10px!important;
	}
</style>



<link rel="stylesheet"  href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet"  href="/resources/demos/style.css">



<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.maskedinput.js"></script>
<script type="text/javascript" src="validacaoid.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>




    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Icomon</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="dashboard_hc.php">Icomon</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
       
        <!--Notification Menu-->
       
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            
            <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" style="width:38px; height:40px;" src="img/icomon.png" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?php echo $_SESSION['nome'];?> </p>
          <p class="app-sidebar__user-designation"><?php echo $_SESSION['area'];?></p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="dashboard_hc.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i> Bootstrap Elements</a></li>
            <li><a class="treeview-item" href="https://fontawesome.com/v4.7.0/icons/" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Font Icons</a></li>
            <li><a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a></li>
            <li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a></li>
          </ul>
        </li>
        
  

  <div class="table-responsive">
  

   
        
        
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Máscara do Reteste</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item"><a href="#">Form Components</a></li>
        </ul>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-10">

               
               <form class="form-inline" role="form"   method="POST" action="mascara_hc.php" style="margin-left:10%;">
                    <div class="form-group ">
                        
                        
                     
                        <input type="text" class="form-control"  name="ba" placeholder="Digite SA referente" >
                    
                      </div>
                      
                      <button type="submit"  name="submit" id="submit" class="btn btn-default">Busca</button> <br><br><br><br>
                </form>

                <?php

                $ba = $_POST['ba'];
                if (isset($_POST ['submit']) )
              {  $sql = mysql_query ("select * from reparo_hc where sa = '$ba'
                " );

                $row = mysql_num_rows($sql);
    
    
                    if (mysql_num_rows($sql) > 0)
    
                    {
                        while ($dado = mysql_fetch_assoc($sql))
                        {
                            
                        
                          $sa = $dado["sa"];
                          $data_execucao = $dado["data_execucao"];
                          $companhia = $dado["companhia"];
                          $tecnico = $dado["tecnico"];
                          $macro = $dado["macro"];
                          $uf = $dado["uf"];
                          $cliente = $dado["cliente"];
                          $contato = $dado["contato"];
                          $endereco = $dado["endereco"];
                          $potencia = $dado["potencia"];
                          $funcionalidade = $dado["funcionalidade"];
                          $contato1 = $dado["contato1"];
                          $data_contato1 = $dado["data_contato1"];
                          $obs_contato1 = $dado["obs_contato1"];
                          
                          $potencia_2 = $dado["potencia_2"];
                          $funcionalidade_2 = $dado["funcionalidade_2"];
                          $contato2 = $dado["contato2"];
                          $data_contato2 = $dado["data_contato2"];
                          $obs_contato2 = $dado["obs_contato2"];
                          
                          $potencia_3 = $dado["potencia_3"];
                          $funcionalidade_3 = $dado["funcionalidade_3"];
                          $contato3 = $dado["contato3"];
                          $data_contato3 = $dado["data_contato3"];
                          $obs_contato3 = $dado["obs_contato3"];
                          
                          $potencia_4 = $dado["potencia_4"];
                          $funcionalidade_4 = $dado["funcionalidade_4"];
                          $contato4 = $dado["contato4"];
                          $data_contato4 = $dado["data_contato4"];
                          $obs_contato = $dado["obs_contato4"];
  
                          $coordenador = $dado["coordenador"];
                          $obs_tec = $dado["obs_tec"];
                            
                           
                           
                            
                            
                            
                        }
                    
                    }
    
               
                ?>

                <form onSubmit="if(!confirm('Deseja mudar status da atividade??')){return false;}"  enctype="multipart/form-data" method="post"  action="enviar_vali2.php ">
                  <div class="form-group">
                <ul class="list-group">
                  <li class="list-group-item"><b> SA: </b> <?php echo $ba;  ?></li>
                  <li class="list-group-item"><b> Data fim da atividade: </b> <?php echo $data_execucao;  ?></li>
                  <li class="list-group-item"><b> Companhia: </b> <?php echo $companhia;  ?></li>
                  <li class="list-group-item"><b> Técnico: </b> <?php echo $tecnico;  ?></li>
                  <li class="list-group-item"><b> Macro: </b> <?php echo $macro;  ?></li>
                  <li class="list-group-item"><b> Uf: </b> <?php echo $uf;  ?></li>
                  <li class="list-group-item"><b> Cliente: </b> <?php echo $cliente;  ?></li>
                  <li class="list-group-item"><b> Endereço: </b> <?php echo $endereco;  ?></li>
                  <li class="list-group-item"><b> Contato: </b> <?php echo $contato;  ?></li>
                  <li class="list-group-item"><b> Potência 1º contato: </b> <?php echo $potencia;  ?></li>
                  <li class="list-group-item"><b> Funcionalidade 1º contato: </b> <?php echo $funcionalidade;  ?></li>
                  <li class="list-group-item"><b> Data 1º contato: </b> <?php echo $data_contato1;  ?></li>
                  <li class="list-group-item"><b> Operador 1ª contato: </b> <?php echo $contato1;  ?></li>

                  <li class="list-group-item"><b> Potência 2º contato: </b> <?php echo $potencia_2;  ?></li>
                  <li class="list-group-item"><b> Funcionalidade 2º contato: </b> <?php echo $funcionalidade_2;  ?></li>
                  <li class="list-group-item"><b> data 2º contato: </b> <?php echo $data_contato2;  ?></li>
                  <li class="list-group-item"><b> Operador 2ª contato: </b> <?php echo $contato2;  ?></li>
                   
                  <li class="list-group-item"><b> Potência 3º contato: </b> <?php echo $potencia_3;  ?></li>
                  <li class="list-group-item"><b> Funcionalidade 3º contato: </b> <?php echo $funcionalidade_3;  ?></li>
                  <li class="list-group-item"><b> data 3º contato: </b> <?php echo $data_contato3;  ?></li>
                  <li class="list-group-item"><b> Operador 3ª contato: </b> <?php echo $contato3;  ?></li>
                  
                  <li class="list-group-item"><b> Potência 4º contato: </b> <?php echo $potencia_4;  ?></li>
                  <li class="list-group-item"><b> Funcionalidade 4º contato: </b> <?php echo $funcionalidade_4;  ?></li>
                  <li class="list-group-item"><b> data 4º contato: </b> <?php echo $data_contato4;  ?></li>
                  <li class="list-group-item"><b> Operador 4ª contato: </b> <?php echo $contato4;  ?></li>

                  <li class="list-group-item"><b> Coordenador: </b> <?php echo $coordenador;  ?></li>

                  <div class="form-group">
                    <label for="exampleTextarea">Descrição 1º contato: </label>
                    <textarea readonly  class="form-control"  id="exampleTextarea" name="obs" rows="6"> <?php echo $obs_contato1; ?> </textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea">Descrição 2º contato: </label>
                    <textarea readonly  class="form-control"  id="exampleTextarea" name="obs" rows="6"> <?php echo $obs_contato2; ?> </textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea">Descrição 3º contato: </label>
                    <textarea readonly  class="form-control"  id="exampleTextarea" name="obs" rows="6"> <?php echo $obs_contato3; ?> </textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea">Descrição 4º contato: </label>
                    <textarea readonly  class="form-control"  id="exampleTextarea" name="obs" rows="6"> <?php echo $obs_contato4; ?> </textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea">Descrição técnica: </label>
                    <textarea readonly  class="form-control"  id="exampleTextarea" name="obs" rows="6"> <?php echo $obs_tec; ?> </textarea>
                  </div>
                  
                  
                  
                  
             <?php
                     $sql2 = mysql_query ("select * from logs_hc where sa = '$ba'" );

                     $dado2 = mysql_num_rows($sql2);


            if (mysql_num_rows($sql2) > 0)
               
            {  ?>
            <?php
              while ($dado2 = mysql_fetch_assoc($sql2))
            {  ?>
                 
            <tr>
            
                  <div class="text-center">
                  <img width='500' height='500' src="../Api/VPS/HC/FOTOS_HC/<?php echo $dado2["foto_antes"]; ?>"  style="padding-top: 5%;"> <br>
                  
                </div>
                <div class="text-center">
                  <img width='500' height='500' src="../Api/VPS/HC/FOTOS_HC/<?php $dado2["foto_depois"] ?>"  style="padding-top: 5%;"> 
                </div>
                <div class="text-center">
                  <img width='500' height='500' src="../Api/VPS/HC/FOTOS_HC/<?php echo $dado2["terceira_imagem"] ?>"  style="padding-top: 5%;"> 
                </div>
                <a href="pdf_mascara.php?sa=<?php echo $sa; ?>" target="_blank"  role="button" aria-pressed="true">Gerar Pdf</a>
            
            </tr>  

            
          <?php 
                }
          
          }
      ?>
                  
              </ul>
              </div>      
                    <input type="hidden" value="<?php echo $ba;  ?>" name="ba" checked>
                        
                 

                  <?php } ?>
             
                </form>

                
                
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
  
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
  </body>
</html>


<script>
$(function() {

/*var  availableTags = [

"ajskkdp",
"iiisosoa",
"ooiismsm",
"aassdddd",
"ooedmmmd",
"iisoosoos"
];

$( "#cabo" ).autocomplete({
  source: availableTags

  });
*/

$.getJSON("listar_cabos.php", function(data){
//console.log(data);
var retorno = [];


$(data).each( function (key, value){

 // console.log(value.cabo);

 retorno.push(value.cabo);


});
$("#cabo").autocomplete({
  source: retorno ,

 

  });




  });
});






</script>