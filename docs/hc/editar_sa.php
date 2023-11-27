
<?php 
         include "conn.php"; 
      
         session_start();
    
         if(!isset($_SESSION["login"]) &&  !isset($_SESSION["senha"])  || ($_SESSION["acesso"] != 'EDT_HC' ) )
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
    <header class="app-header"><a class="app-header__logo" href="#">Icomon</a><br>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a> <br>
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
        <li><a class="app-menu__item active" href="../logout.php"><i class="fa-regular fa-right-from-bracket"></i><span class="app-menu__label">Sair</span></a></li>
        
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
          <h1> Atualiza SA</h1>
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
                    <label for="email">BA:</label>
                <form class="form-inline" role="form"   method="POST" action="editar_sa.php">
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
      
      
      
                  <?php 
                      if (isset($_POST ['submit3']) )
                { 
                  
                  $sa = $_POST['sa'];

                  $sql = mysql_query ("select  * from reparo_hc  where sa = '$sa'" );
                }  


                $row = mysql_num_rows($sql);

 
 

                if (mysql_num_rows($sql) > 0)

                {

                  while ($dado = mysql_fetch_assoc($sql))
                  {
                   
                    $sa = $dado["sa"];
                    $uf = $dado["uf"];
                    $data_execucao = $dado["data_execucao"];
                    $companhia = $dado["companhia"];
                    $tecnico = $dado["tecnico"];
                    $cliente = $dado["cliente"];
                    $contato = $dado["contato"];
                    $contador = $dado["contador"];
                    $acesso_gpon = $dado["acesso_gpon"];
                    
                  }

                }
                
                                  
                  ?>
      <div class="row justify-content-md-center" >
        <div class="col-md-6">
        
          <div class="tile">
          <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                Click para digitar a SA
          </button></br>
          


         
          <div class="row" style="margin-bottom: 2rem;">
          <div class="col-lg-12">
            
            <div class="bs-component">
              <ul class="nav nav-tabs">
                <li class="nav-item" ><a class="nav-link active" data-toggle="tab" href="#home"></a></li>
                
                
                
                  <div class="dropdown-menu"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link.</a>
                  </div>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="home">
                     <form onSubmit="if(!confirm('Deseja repassar atividade??')){return false;}" method="post" enctype="multipart/form-data" action="enviar_edicao.php">
                     <div class="form-group">
                    <label for="exampleInputEmail1">Uf</label>
                    <input class="form-control"  id="sa" readonly name="uf" value="<?php echo $uf?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sa</label>
                    <input class="form-control"  id="ba" readonly name="sa" value="<?php echo $sa?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sa</label>
                    <input class="form-control"  id="ba" readonly name="acesso_gpon" value="<?php echo $acesso_gpon?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Execução</label>
                    <input class="form-control"  id="ba" readonly name="data_execucao"  value="<?php echo $data_execucao?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Companhia</label>
                    <input class="form-control"  id="ba" readonly name="data_execucao"  value="<?php echo $companhia?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Técnico</label>
                    <input class="form-control"  id="ba" readonly name="data_execucao"  value="<?php echo $tecnico?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Cliente</label>
                    <input class="form-control"  id="ba"  readonly required name="cliente"   value="<?php echo $cliente?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <input class="form-control"  id="ba"  readonly required name="contador"   value="<?php echo $contador?>" type="hidden" aria-describedby="emailHelp" >
                  <div class="form-group">
                    <label for="exampleInputEmail1">Contato</label>
                    <input class="form-control"    readonly required name="contato"   value="<?php echo $contato?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  
                  <div class="form-group">
                   
                  <div class="form-group">
                    <label for="email">Potência?</label>  
                        <select class="form-control"   name="potencia">
                          <option value="DENTRO DOS PARAMETROS">  Dentro dos paramêtros </option>
                          <option value="ATENUADO">  Atenuado </option>
                          <option value="DESLIGADO">  Desligado </option>
                          <option value="SEM PARAMETROS">  Sem paramêtros </option>
                          
                        </select>
                  </div>
                  
                  <div class="form-group" id="inputOculto1">
                    <label for="email">Enviar pendência para qual coordenador?</label>  
                    <select class="form-control" id="coord" name="coord" required   >
                    <option value="0" disabled="disabled"  >Escolha um coordenador</option>

                          <?php

                            
                          $sql = "select * from usuario where funcao = 'COORD_HC' and acesso = 'HC' order by nome";
                          $qr = mysql_query($sql) or die(mysql_error());
                          while($ln = mysql_fetch_assoc($qr)) 
                          {
                              echo '<option value="'.$ln['nome'].'">'.$ln['nome'].'</option>';
                          }
                          ?>
                    </select><br>
                        <div class="form-group">
                            <label for="pwd"> Data do agendamento:</label>
                            <input type="date" class="form-control"   name="data_ag" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Período:</label>  
                            <select class="form-control"  id="mySelect" name="periodo">
                              <option value="DURANTE O DIA" checked>  DURANTE O DIA </option>
                              <option value="MANHA">  MANHA </option>
                              <option value="TARDE">  TARDE </option>
                              
                            </select>
                        </div>
                  </div>
                  <div class="form-group">
                      <label for="email">Descrição: </label>
                     <textarea class="form-control" rows="5" id="obs" required name="obs"  placeholder="Informar o nome da pessoa que passou as informações do reteste."></textarea>
                  </div>
                  
                  </div>
                  </div>
                  <div class="tile-footer">
           

                  <button class="btn btn-primary"  name="submit" type="submit">Editar</button>

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
  
</div>










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

</div>

</div>
                
                </div>
              </div>
            </div>
            <div class="col-lg-6">
  </div>
        </div>
      </main>

   
      </body>
</html>



     















 
             
    <!-- Essential javascripts for application to work-->
    
    
      

    

 