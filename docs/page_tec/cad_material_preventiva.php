<?php 
         include "../conn.php"; 
      
         session_start();

         if(!isset($_SESSION["login"]) &&  !isset($_SESSION["senha"]))

            {
                 header("Location: index.html");
                  exit;
            }

            $ba =$_GET['ba'];
            
?>



<!DOCTYPE html>
<html lang="en">
  <head>

  <script src="//code.jquery.com/jquery-1.10.2.js"></script>




<link rel="icon" href="img/icomon.png">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

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
    <link rel="stylesheet" type="text/css" href="../css/main.css">
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
        <li><a class="app-menu__item active" href="index_col.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        
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
          <h1><i class="fa fa-edit"></i> Baixa de Materiais</h1>
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
              <div class="col-lg-6">
                <form onSubmit="if(!confirm('Deseja encerrar atividade??')){return false;}" method="post"  action="processa_preventiva.php" >

    

                    <div id="formulario">

                            <div class="form-group" >
                            <input  type="hidden" name="ba" id="ba" value="<?php echo $ba; ?>"> </br>
                            <fieldset class="form-group border p-3">
                            <label>Descrição</label>
                                <select class="form-control col-6" id="nome" name="nome[]"  required >
                                  <option value="SEM MATERIAL"  >SEM MATERIAL</option>
                                  <option value="CABO 12"  >CABO 12</option>
                                  <option value="CABO 36"  >CABO 36</option> 
                                  <option value="CABO 72"  >CABO 72</option>
                                  <option value="CABO 144"  >CABO 144</option>
                                  <option value="CABO 288"  >CABO 288</option>
                                  <option value="CDOE"  >CDOE</option>
                                  <option value="PRECON"  >PRECON</option>
                                  <option value="CAIXA MEIO 1/8"  >CAIXA MEIO 1/8</option>
                                  <option value="CAIXA MEIO 1/16"  >CAIXA MEIO 1/16</option>
                                  <option value="CAIXA FIM 1/8"  >CAIXA MEIO 1/8</option>
                                  <option value="CAIXA FIM 1/16"  >CAIXA MEIO 1/16</option>
                                  <option value="CAIXA EMENDA 36"  >CAIXA EMENDA 36</option>
                                  <option value="CAIXA EMENDA 72"  >CAIXA EMENDA 72</option>
                                  <option value="CEO">CEO</option>
                                  <option value="KIT DERIVACAO"  >KIT DERIVAÇÃO</option>
                                  <option value="CEOS">CEOS</option>
                                  <option value="PLAQUETA V.TAL"  >PLAQUETA V.TAL</option>
                                  <option value="ASPIRAL"  >ASPIRAL</option>
                                  <option value="CAPRE PRETA">CAPRE PRETA</option>
                                  <option value="CAPRE VERMELHA"  >CAPRE VERMELHA</option> 
                                  <option value="CAPRE AZUL"  >CAPRE AZUL</option>
                                  <option value="CAPRE LARANJA"  >CAPRE LARANJA</option>
                                  </option><option value="CORDOALHA"  >CORDOALHA</option>
                                  </option><option value="FIO ESPINAR"  >FIO ESPINAR</option>
                                  </option><option value="TAMPA CIRCULAR"  >TAMPA CIRCULAR</option>
                                  </option><option value="TAMPA RETANGULAR"  >TAMPA RETANGULAR</option>
                                  </option><option value="BAP"  >BAP</option>
                                  </option><option value="BANDEJA"  >BANDEJA</option>
                                  </option><option value="ESTICADOR"  >ESTICADOR</option>
                                </select></br> 
                                <label for="">Quantidade:</label>
                                <input class="form-control col-6" type="number" name="email[]" id="email"> </br><br>
                                </fieldset>
                                <button type="button"  class="btn btn-primary" onclick="adicionarCampo()" > + </button> 
                            </div></br>

                    </div>
                    <div class="form-group">

                                <input class="btn btn-primary" type="submit" value="Encerrar" name="CadUsuario">

                    </div>
</form>
<script src="../js/custom2.js"></script>
            
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
    <?php $connection ->close(); ?>
  </body>
</html>

      
    
        
    
    
                  
                  
                    

