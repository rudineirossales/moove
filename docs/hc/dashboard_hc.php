
<?php 
         include "conn.php"; 
    
      
         session_start();

         if(!isset($_SESSION["login"]) &&  !isset($_SESSION["senha"])  )
            {
                 header("Location: index.html");
                  exit;
            }

             
?>

<!DOCTYPE html>
<html lang="en">
  <head>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



  
    <link rel="icon" href="img/icomon.png">
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    
  


    

    
    </head>
  <body class="app sidebar-mini rtl" >

  <?php   

          $sql = mysql_query ("select *  from atividade where id_usu = '".$_SESSION['id']."' and status = 'DESPCOORD' OR id_usu = '".$_SESSION['id']."' and status = 'PARALIZADO'" );
          $row = mysql_num_rows($sql);
          if (mysql_num_rows($sql) > 0)

            {


                  echo "<script>
                  swal('Você tem atividades não atribuídas');
                      </script>'";

                  
            }

            $sql2 = mysql_query ("select *  from atividade where status = 'EM VALIDACAO'" );
            $contaValidacao = mysql_num_rows($sql2);

  ?>
  

    
  
  
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="dashboard_hc.php">ICOMON</a>
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
        <li><a class="app-menu__item active" href="dashboard_hc.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i> Bootstrap Elements</a></li>
            <li><a class="treeview-item" href="https://fontawesome.com/v4.7.0/icons/" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Font Icons</a></li>
            <li><a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a></li>
            <li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a></li>
          </ul>
        </li>
        
        
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Atividades</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
          
            <li><a class="treeview-item" href="pesq_contato1.php"><i class="icon fa fa-circle-o"></i> Contato 1</a></li>
            <li><a class="treeview-item" href="pesq_contato3.php"><i class="icon fa fa-circle-o"></i> Contato 3</a></li>
            <li><a class="treeview-item" href="pesq_contato5.php"><i class="icon fa fa-circle-o"></i> Contato 5</a></li>
            <li><a class="treeview-item" href="pesq_contato7.php"><i class="icon fa fa-circle-o"></i>Contato 7</a></li>
            <li><a class="treeview-item" href="pesq_per.php"><i class="icon fa fa-circle-o"></i>Pesquisa por período</a></li>
            <li><a class="treeview-item" href="esteira.php"><i class="icon fa fa-circle-o"></i>Reteste Não ok</a></li>
       
            <li><a class="treeview-item" href="import2.php"><i class="icon fa fa-circle-o"></i>Upload de Base</a></li>
            
          </ul>
        </li>
        
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Contato sem retorno</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
          
            <li><a class="treeview-item" href="pesq_semretorno1.php"><i class="icon fa fa-circle-o"></i> Contato SR 1</a></li>
            <li><a class="treeview-item" href="pesq_semretorno3.php"><i class="icon fa fa-circle-o"></i> Contato SR 3</a></li>
            <li><a class="treeview-item" href="pesq_semretorno5.php"><i class="icon fa fa-circle-o"></i> Contato SR 5</a></li>
            <li><a class="treeview-item" href="pesq_semretorno7.php"><i class="icon fa fa-circle-o"></i>Contato SR 7</a></li>
        
          </ul>
        </li>
        
        

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Coordenador</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
          
            <li><a class="treeview-item" href="caixa_coord.php"><i class="icon fa fa-circle-o"></i> Pós contato pendente </a></li>
             <li><a class="treeview-item" href="pesq_posreparo.php"><i class="icon fa fa-circle-o"></i> Pós contato encerrados</a></li>
            <li><a class="treeview-item" href="repetitivos.php"><i class="icon fa fa-circle-o"></i> Repetitivos pendentes </a></li>
            <li><a class="treeview-item" href="pesq_repetitivos.php"><i class="icon fa fa-circle-o"></i> Pesquisa repetitivos  </a></li>
            <li><a class="treeview-item" href="garantia.php"><i class="icon fa fa-circle-o"></i> Garantia pendentes </a></li>
            <li><a class="treeview-item" href="pesq_garantia.php"><i class="icon fa fa-circle-o"></i> Pesquisa garantia  </a></li>
            <li><a class="treeview-item" href="repetidas.php"><i class="icon fa fa-circle-o"></i> Repetida pendentes </a></li>
            <li><a class="treeview-item" href="pesq_repetidas.php"><i class="icon fa fa-circle-o"></i> Pesquisa repetidas  </a></li>
            <li><a class="treeview-item" href="blacklist.php"><i class="icon fa fa-circle-o"></i> Blacklist pendentes </a></li>
            <li><a class="treeview-item" href="pesq_blacklist.php"><i class="icon fa fa-circle-o"></i> Pesquisa blacklist  </a></li>
            <li><a class="treeview-item" href="feedback.php"><i class="icon fa fa-circle-o"></i> Feedback pendentes </a></li>
            <li><a class="treeview-item" href="pesq_feedback.php"><i class="icon fa fa-circle-o"></i> Pesquisa Feedback  </a></li>
            <li><a class="treeview-item" href="endereco.php"><i class="icon fa fa-circle-o"></i> Endereço pendentes </a></li>
            <li><a class="treeview-item" href="pesq_endereco.php"><i class="icon fa fa-circle-o"></i> Pesquisa endereços  </a></li>
           
           
          
          </ul>
          <!--
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Rat</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
          
            <li><a class="treeview-item" href="atua.php"><i class="icon fa fa-circle-o"></i> Validação escaneamento</a></li>
            <li><a class="treeview-item" href="pesq_rat.php"><i class="icon fa fa-circle-o"></i> Pesquisa escaneamento</a></li>
            
            
          </ul>
        </li>
         -->
        
        
            
    </aside>
    <main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-pie-chart"></i> </h1>
          
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">charts</a></li>
        </ul>
      </div>
      <div class="row">
        
        <iframe width="100%" height="2800" src="https://lookerstudio.google.com/embed/reporting/4aca2a16-b011-453c-8e12-eda3d3e587ba/page/t9HYD" frameborder="0" style="border:0" allowfullscreen></iframe>
     

      

</div>
</div>
</div>
</div>


       
        <div class="clearfix"></div>
        
      </div>


      <div class="clearfix"></div>
        
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/chart.js"></script>
   
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
    

    
  </body>
</html>