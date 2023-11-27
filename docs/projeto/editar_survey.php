



    <?php 
         include "conn.php"; 
         
      
         session_start();

         if(!isset($_SESSION["login"]) &&  !isset($_SESSION["senha"]))

            {
                 header("Location: index.html");
                  exit;
            }
           
           
          $cod =$_GET['cod'];
            
            
            $sql = mysql_query ("select * from projeto where protocolo = '$cod' " );

            $row = mysql_num_rows($sql);


                if (mysql_num_rows($sql) > 0)

                {
                    while ($dado = mysql_fetch_assoc($sql))
                    {
                        
                        $protocolo = $dado["protocolo"];
                        $num_fachada = $dado["num_fachada"];
                        $logradouro = $dado["logradouro"];
                        $data_execucao = $dado["data_execucao"];
                        $cod_survey = $dado["cod_survey"];
                        $cadastro_status = $dado["cadastro_status"];
                        $cadasrtro_nova_fachada = $dado["cadasrtro_nova_fachada"];
                        $trava = $dado["trava"];
                        $cod_logradouro = $dado["cod_logradouro"];
                        $trava_por = $dado["trava_por"];
                        $comp1 = $dado["comp1"];
                        $comp2 = $dado["comp2"];
                        $comp3 = $dado["comp3"];

                        
                        
                }
                
                }

                
?>
<script type="text/javascript">
                  function saidasuccessfully()
                  { 
                    setTimeout("window.location='pesq_survey.php?cod=<?php echo $cod_logradouro; ?>'");
                    
                    
                  }
</script>



<!DOCTYPE html>
<html lang="en">
  <head>

  


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  

  <link rel="icon" href="img/icomon.png">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>








  
<style>
  #loading
{
  
width:70px;
height:70px;  
  
  
  
  
}

</style>

<script type="text/javascript">
$(document).ready(function() {
  $('#inputOculto1').hide();
  $('#mySelect').change(function() {
    if ($('#mySelect').val() == 'NAO OK') {
      $('#inputOculto1').show();
    } else {
      $('#inputOculto1').hide();
    }
  });
});
</script>



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
    <header class="app-header"><a class="app-header__logo" href="#">Icomon</a>
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
          <p class="app-sidebar__user-designation"><?php echo $_SESSION['equipe'];?></p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active"  href="dashboard_pj.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        
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
          <h1><i class="fa fa-edit"></i> Edição de Survey</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item"><a href="#">Form Components</a></li>
        </ul>
      </div>
      <div class="row justify-content-md-center">
        <div class="col-md-6">
          <div class="tile">
            <div class="row">
              <div class="col-lg-12">
                <form method="post"  onSubmit="if(!confirm('Deseja modificar atividade?')){return false;}" action="editar_survey.php ">

                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Cód.Survey</label>
                    <input class="form-control"  id="ba" readonly name="cod_survey" value="<?php echo $cod_survey?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Rua</label>
                    <input class="form-control"  id="ba" readonly name="logradouro"  value="<?php echo $logradouro?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nº Fachada</label>
                    <input class="form-control"  id="ba" readonly name="num_fachada"  value="<?php echo $num_fachada?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Complemento 1</label>
                    <input class="form-control"  id="ba"  name="comp1"  value="<?php echo $comp1?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Complemento 2</label>
                    <input class="form-control"  id="ba"  name="comp2"  value="<?php echo $comp2?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <input class="form-control"  id="ba" readonly name="protocolo"  value="<?php echo $protocolo?>" type="hidden" aria-describedby="emailHelp" >
                  <input class="form-control"  id="ba" readonly name="cod_logradouro"  value="<?php echo $cod_logradouro?>" type="hidden" aria-describedby="emailHelp" >
                  <div class="form-group">
                    <label for="exampleInputEmail1">Complemento 3</label>
                    <input class="form-control"  id="ba"  name="comp3"  value="<?php echo $comp3?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <input class="form-control"  id="ba" readonly name="cadastro_status"  value="<?php echo $cadastro_status?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  
                  <div class="form-group">
                      <label for="email">Descrição: </label>
                     <textarea class="form-control" rows="5" id="obs"  name="obs"></textarea>
                  </div>

                  <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="CONCLUIDO">
                          <label class="form-check-label" for="inlineRadio1">Concluído</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="PENDENTE">
                          <label class="form-check-label" for="inlineRadio2">Pendente</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="EXCLUIDO">
                          <label class="form-check-label" for="inlineRadio2">Excluir</label>
                        </div>
                  
                  </div>
                  </div>
                  <div class="tile-footer">
           

                  <button class="btn btn-primary"  name="submit" type="submit">Enviar</button>
                

              
              </form>

              <body>

                

              </div>
            </div>
            
          </div>
        </div>    
      </div>
    </main>


    <?php 


if (isset($_POST ['submit']) )
{
  
  $protocolo  =$_POST['protocolo'];
  $inlineRadioOptions  =$_POST['inlineRadioOptions'];
  $nova_fachada  =$_POST['nova_fachada'];
  $cod_logradouro  =$_POST['cod_logradouro'];
  $obs  =$_POST['obs'];
  $comp1 = $_POST['comp1'];
  $comp2 = $_POST['comp2'];
  $comp3 = $_POST['comp3'];
  


 
    $query = "update projeto set cadastro_status = '$inlineRadioOptions',cadasrtro_nova_fachada = '$nova_fachada',cadastro_responsavel = '".$_SESSION['nome']."', cadastro_obs = '$obs', cadastro_data = NOW(), comp1 = '$comp1', comp2 = '$comp2', comp3 = '$comp3' where protocolo = '$protocolo'";
  

          
  
    $sql = mysql_query($query);
  
        if($sql)
        {
  
         

          echo "
          <script language='JavaScript'>
          window.alert('ENVIADO COM SUCESSO!')
          
          </script>";

          $query3 = "update  projeto set trava = 'S', trava_por = '".$_SESSION['nome']."' where protocolo = '$cod'";
          $sql3 = mysql_query($query3);

          echo "<script language='JavaScript'>
          window.location='pesq_survey.php?cod=".$cod_logradouro."&teste=s'
          </script>";

          
  
         
        }
        else
        {
          
          echo "<script language='JavaScript'>
          window.alert('ERRO NO ENVIO!');
          </script> " ;
  
          echo " 
          <div style='display: flex; justify-content: center; align-items: center; padding: 8%;'>
           <img src='img/404.jpg'>
          </div> 
          ";
  
          
          
        }






}







     ?>
    <!-- Essential javascripts for application. to work-->
  
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


