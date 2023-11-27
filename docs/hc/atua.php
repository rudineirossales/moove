
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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

    
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="dashboard.php">Icomon</a><br>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a> <br>
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
        <li><a class="app-menu__item active" href="dashboard_hc.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        
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
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <p></p>
        </div>
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Busca</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
                    <label for="email">SA:</label>
                <form class="form-inline" role="form"   method="POST" action="atua.php">
                    <input type="text" class="form-control"  name="sa"   required >
        </div> 

                    <button type="submit" name="submit3" class="btn btn-primary mb-2">Buscar</button>
                </form>




                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                  
                </div>
              </div>
            </div>
      </div>

        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      
      
      <!-- 
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>TESTE</h4>
              <p><b>5</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
            <div class="info">
              <h4>TESTE</h4>
              <p><b>25</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>TESTE</h4>
              <p><b>10</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h4>TESTE</h4>
              <p><b>500</b></p>
            </div>
          </div>
        </div>
      </div>
      -->

                  <?php 
                      if (isset($_POST ['submit3']) )
                { 
                  
                  $sa = $_POST['sa'];

                  $sql = mysql_query ("select  * from rat where sa = '$sa'" );
                }  


               
                     
 

                if (mysql_num_rows($sql) > 0)

                {

                  while ($dado = mysql_fetch_assoc($sql))
                  {
                   
                    $ba = $dado["ba"];
                    $estado = $dado["estado"];
                    $fim_execucao = $dado["fim_execucao"];
                    $wfm = $dado["wfm"];
                    $macro = $dado["macro"];
                    $scaneado = $dado["scaneado"];
                    $usuario = $dado["usuario"];
                    $data_sc = $dado["data_sc"];
                   
                  }

                }
                
                                  
                  ?>
      <div class="row justify-content-md-center" >
        <div class="col-md-6">
        
          <div class="tile">
          <h3 class="tile-title"></h3>
          


         
          <div class="row" style="margin-bottom: 2rem;">
          <div class="col-lg-12">
            
            <div class="bs-component">
              <ul class="nav nav-tabs">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                      Click para digitar a SA
                </button>
                
                
                
                  <div class="dropdown-menu"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                  </div>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="home">
                     <form onSubmit="if(!confirm('Deseja repassar atividade??')){return false;}" method="post"  action="enviar_atua.php">
                  <div class="form-group">
                    <label for="exampleInputEmail1">SA</label><br>
                    <input class="form-control"  id="ba" required readonly name="sa" value="<?php echo $sa?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">ESTADO</label>
                    <input class="form-control"  id="ba" readonly   value="<?php echo $estado?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">FIM DA EXECUÇÃO</label>
                    <input class="form-control"  id="ba" readonly   value="<?php echo $fim_execucao?>" type="text" aria-describedby="emailHelp" >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">MATRÍCULA</label>
                    <input class="form-control"  id="ba" readonly   value="<?php echo $wfm?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  
                  

                  <div class="form-group">
                    <label for="exampleInputEmail1">MACRO ATIVIDADE</label>
                    <input class="form-control"  id="ba" readonly   value="<?php echo $macro?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="opc" value="OK" id="teste"  >
                        <label class="form-check-label" style="font-size: 11px; color:red;" for="flexRadioDefault2" >
                         ESCANEADO
                        </label>
                    </div>
                  </div>
                              
</div>
</div><br><br>

<button class="btn btn-primary"  name="submit" type="submit">Enviar</button>
 
    </form>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="js/plugins/select2.min.js"></script>
    <script type="text/javascript" src="js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
    $('#sl').click(function(){
        $('#tl').loadingBtn();
        $('#tb').loadingBtn({ text : "Signing In"});
    });
    
    $('#el').click(function(){
        $('#tl').loadingBtnComplete();
        $('#tb').loadingBtnComplete({ html : "Sign In"});
    });
    
    $('#data_baixa').datepicker({
        format: "yyyy-m-d",
        autoclose: true,
        todayHighlight: true
    });

    $('#data_final').datepicker({
        format: "yyyy-m-d",
        autoclose: true,
        todayHighlight: true
    });
    
    $('#demoSelect').select2();
    </script>
    <!-- Google analytics script-->
    
    
                    
                </div>
                
            </div>
          </div>
          
   


    
    
    
      

    

    
  </body>
</html>