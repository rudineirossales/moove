<?php 
         include "conn.php"; 
      
         session_start();

         if(!isset($_SESSION["login"]) &&  !isset($_SESSION["senha"])   )
            {
                 header("Location: index.html");
                  exit;
            }
            date_default_timezone_set('America/Sao_Paulo');
            $hoje = date('Y-m-d');     

?>



<!DOCTYPE html>
<html lang="en">
  <head>

  <link rel="icon" href="img/icomon.png">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <script src="//code.jquery.com/jquery-1.10.2.js"></script>

  <script type="text/javascript">
        function completar_campos(){
        document.getElementById("loading").style.display = "block";
        var con_consulta;
        if (window.XMLHttpRequest){

        con_consulta = new XMLHttpRequest();

        }else{


        con_consulta  = new ActiveXObject("Microsoft.XMLHTTP");



        }

        con_consulta.onreadystatechange = function(){

        if(con_consulta.readyState ==  4 && con_consulta.status == 200){

        document.getElementById("principal").innerHTML = con_consulta.responseText;
        document.getElementById("loading").style.display = "none";

        }

        }

        var cabo = document.getElementById("cabo").value;

        con_consulta.open("GET","processar_cabo.php?cabo="+cabo,true);
        con_consulta.send(null);





 
} 
</script>
 
 <script type="text/javascript">
        
       $(document).ready(function(){
 
           
          $("select[name=localidade]").change(function(){
             $("select[name=estacao]").html('<option value="0">Carregando...</option>');
              
             $.post("localidade.php",
                   {localidade:$(this).val()},
                   function(valor){
                      $("select[name=estacao]").html(valor);
                   }
                   )
     })
                  
              
          
        })
        
 </script>
 
 <script type="text/javascript">
        
       $(document).ready(function(){
 
           
          $("select[name=coord]").change(function(){
             $("select[name=tec]").html('<option value="0">Carregando...</option>');
              
             $.post("coordenador.php",
                   {coord:$(this).val()},
                   function(valor){
                      $("select[name=tec]").html(valor);
                   }
                   )
     })
                  
              
          
        })
        
 </script>
 <script type="text/javascript">
$(document).ready(function() {
  $('#inputBa97').hide();
  $('#mySelect').change(function() {
    if ($('#mySelect').val() == '97') {
      $('#inputBa97').show();
    } else {
      $('#inputBa97').hide();
    }
  });
});
</script>



</script>




 <script type="text/javascript">
$(document).ready(function() {
  $('#inputBa94').hide();
  $('#mySelect').change(function() {
    if ($('#mySelect').val() == '94') {
      $('#inputBa94').show();
    } else {
      $('#inputBa94').hide();
    }
  });
});
</script>

</script>
 <script type="text/javascript">
$(document).ready(function() {
  $('#inputBa94').hide();
  $('#mySelect').change(function() {
    if ($('#mySelect').val() == '94' || $('#mySelect').val() == '75' || $('#mySelect').val() == '93') {
      $('#inputBa94').show();
    } else {
      $('#inputBa94').hide();
    }
  });
});
</script>

<script type="text/javascript">
$(document).ready(function() {
  $('#inputBa60').hide();
  $('#mySelect').change(function() {
    if ($('#mySelect').val() == '60') {
      $('#inputBa60').show();
    } else {
      $('#inputBa60').hide();
    }
  });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
  $('#inputBa21').hide();
  $('#mySelect').change(function() {
    if ($('#mySelect').val() == '21') {
      $('#inputBa21').show();
    } else {
      $('#inputBa21').hide();
    }
  });
});
</script>
  
<style>
  #loading
{
  
width:70px;
height:70px;  
  
  
  
  
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
    <header class="app-header"><a class="app-header__logo" href="dashboard_bbk.php">Icomon</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
       
        <!--Notification Menu-->
       
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            
            <li><a class="dropdown-item" href="../logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
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
          <p class="app-sidebar__user-designation"><?php echo $_SESSION['equipe'];?></p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="dashboard_bbk.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i> Bootstrap Elements</a></li>
            <li><a class="treeview-item" href="https://fontawesome.com/v4.7.0/icons/" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Font Icons</a></li>
            <li><a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a></li>
            <li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a></li>
          </ul>
        </li>
       
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Cadastro de atividades</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item"><a href="#">Form Components</a></li>
        </ul>
      </div>
      <div class="row justify-content-md-center" >
        <div  class="col-md-6">
          <div class="tile">
            <div class="row">
              <div class="col-lg-12">
                <form onSubmit="if(!confirm('Deseja enviar para campo a atividade??')){return false;}" method="post" enctype="multipart/form-data" action="enviar_map_bbk.php ">
              <div class="form-group">
                <label for="email">TIPO DE BA:</label>  
                  <select class="form-control " id="mySelect" name="tipo">
                      <option value="97">  97 </option>
                      <option value="94">  94 </option>
                      <option value="93">  93 </option>
                      <option value="75">  75 </option>
                      <option value="60">  60 </option>
                      <option value="21">  21 </option>
                      <option value="10">  10 </option>
                    
                  </select>
              </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">BA</label>
                    <input class="form-control"  id="ba" required name="ba"  type="number" aria-describedby="emailHelp" >
                    
                </div>

                <div class="form-group">
                  <label for="email">UF:</label>  
                    <select class="form-control "  name="uf">
                      <option value="PR">  PR </option>
                      <option value="AM">  AM </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">LOCALIDADE:</label>
                    <input class="form-control"  id="ba" required name="localidade"  type="text" aria-describedby="emailHelp" >
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">ENDEREÇO:</label>
                    <input class="form-control"  id="ba" required name="endereco"  type="text" aria-describedby="emailHelp" >
                    
                </div>

    <div class="form-group" id="inputBa97">

              <div class="form-group">
                    <label for="exampleInputEmail1">EQUIPAMENTO PONTA A</label>
                    <input class="form-control"  id="pontaA"  name="pontaA"  type="text" aria-describedby="emailHelp" >
                    
              </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">EQUIPAMENTO PONTA B</label>
                  <input class="form-control"  id="pontaB"  name="pontaB"  type="text" aria-describedby="emailHelp" >
                
              </div>
      
    </div>

    <div class="form-group" id="inputBa94">
    

              <div class="form-group">
                    <label for="exampleInputEmail1">NOME CLIENTE</label>
                    <input class="form-control"  id="pontaA"  name="cliente"  type="text" aria-describedby="emailHelp" >
                    
              </div>
              <div class="form-group">
                    <label for="exampleInputEmail1">CIRCUITO</label>
                    <input class="form-control"  id="ctto"  name="ccto"  type="text" aria-describedby="emailHelp" >
                    
              </div>

    </div>       
    <div class="form-group" id="inputBa60">

            <div class="form-group">
                            <label for="exampleInputEmail1">PRS</label>
                            <input class="form-control"  id="pontaA"  name="prs"  type="text" aria-describedby="emailHelp" >
                            
            </div>
            <div class="form-group">
                            <label for="exampleInputEmail1">ROTA</label>
                            <input class="form-control"  id="rota"  name="rota"  type="text" aria-describedby="emailHelp" >
                            
            </div>

    </div> 


    <div class="form-group" id="inputBa21">

            <div class="form-group">
                            <label for="exampleInputEmail1">BARRAMENTO</label>
                            <input class="form-control"  id="barramento"  name="barramento"  type="text" aria-describedby="emailHelp" >
                            
            </div> 

    </div> 
                <div class="form-group">
                    <label for="exampleSelect1">ESTAÇÃO A</label>
                    <select class="form-control" id="estacaoA" name="estacaoA"   onchange="ativarInputDataContrato()" >
                    <option value="0" disabled="disabled"  >Escolha uma Localidade</option>

                          <?php

                            
                          $sql = "SELECT * FROM estacoes  order by localidade
                          ";
                          $qr = mysql_query($sql) or die(mysql_error());
                          while($ln = mysql_fetch_assoc($qr)) 
                          {
                              echo '<option value="'.$ln['sigla'].'">'.$ln['sigla'].'</option>';
                          }
                          ?>
                    </select>
                </div>

              

                <div class="form-group">
                    <label for="exampleSelect1">ESTAÇÃO B</label>
                    <select class="form-control" id="estacaoB" name="estacaoB"   onchange="ativarInputDataContrato()" >
                    <option value="0" disabled="disabled"  >Escolha uma Localidade</option>

                          <?php

                            
                          $sql = "SELECT * FROM estacoes order by sigla
                          ";
                          $qr = mysql_query($sql) or die(mysql_error());
                          while($ln = mysql_fetch_assoc($qr)) 
                          {
                              echo '<option value="'.$ln['sigla'].'">'.$ln['sigla'].'</option>';
                          }
                          ?>
                    </select>
                </div>

    

    <div class="form-group">
     <label for="pwd"> DATA DE ABERTURA:</label>
      <input type="datetime-local" class="form-control" max="<?php echo $hoje; ?>" name="data_abertura" required>
    </div>

    <div class="form-group">
     <label for="pwd"> DATA DE VENCIMENTO:</label>
      <input type="datetime-local" class="form-control"  name="data_vencimento" required>
    </div>
  
        <div class="form-group">
                    <label for="exampleSelect1">Coordenador</label>
                     <select class="form-control" id="coord" name="coord" required>
                      <!--  onchange="ativarInputDataContrato()"  -->
                    <option value="0" disabled="disabled"  >Escolha um coordenador</option>

                          <?php

                            
                          $sql = "SELECT * FROM usuario  where funcao = 'COORD_BBK' or funcao = 'COORD_BBK_FTTH' group by nome_gestor order by nome
                          ";
                          $qr = mysql_query($sql) or die(mysql_error());
                          while($ln = mysql_fetch_assoc($qr)) 
                          {
                            echo '<option value="'.$ln['id_gestor'].'">'.$ln['nome_gestor'].'</option>';
                             
                          }
                          ?> 
                          
                    </select>

                    
        </div>

    <div class="form-group">
    <label for="email">Obs: </label>
  <textarea class="form-control" rows="5" id="obs" name="obs" maxlength="20000" placeholder="Máximo 2000 caracteres"></textarea>
    </div>
    
                    </div>
                  </div>
                  <button class="btn btn-primary" type="submit">Enviar</button>
                  <div class="tile-footer">
             
            </div>
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


