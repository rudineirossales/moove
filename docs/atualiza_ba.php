
<?php 
         include "conn.php"; 
      
         session_start();

         if(!isset($_SESSION["login"]) &&  !isset($_SESSION["senha"])  || ($_SESSION["acesso"] != 'EDT' ) )
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
        <li><a class="app-menu__item active" href="logout.php"><i class="fa-regular fa-right-from-bracket"></i><span class="app-menu__label">Sair</span></a></li>
        
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
          <h1> Atualiza B.a</h1>
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
                <form class="form-inline" role="form"   method="POST" action="atualiza_ba.php">
                    <input type="text" class="form-control"  name="ba"   required >
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
                  
                  $ba = $_POST['ba'];

                  $sql = mysql_query ("select  * from atividade  where ba = '$ba'" );
                }  


                $row = mysql_num_rows($sql);

 
 

                if (mysql_num_rows($sql) > 0)

                {

                  while ($dado = mysql_fetch_assoc($sql))
                  {
                   
                    $ba = $dado["ba"];
                    $uf = $dado["uf"];
                    $localidade = $dado["localidade"];
                    $estacao = $dado["estacao"];
                    $endereco = $dado["endereco"];
                    $celula = $dado["celula"];
                    $cdoe = $dado["cdoe"];
                    $tipo = $dado["tipo"];
                    $id_usu = $dado["id_usu"];
                    $status = $dado["status"];
                    $data_vencimento = $dado["data_vencimento"];
                    $data_abertura = $dado["data_abertura"];
                    $status = $dado["status"];
                    $obs_cl = $dado["obs_cl"];
                    $afetacao = $dado["afetacao"];
                    $tipo_rede = $dado["tipo_rede"];
                   
                   
                   
                  }

                }
                
                                  
                  ?>
      <div class="row justify-content-md-center" >
        <div class="col-md-6">
        
          <div class="tile">
          <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                Click para digitar o ba
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
                     <form onSubmit="if(!confirm('Deseja repassar atividade??')){return false;}" method="post" enctype="multipart/form-data" action="envia_atua_ba.php">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ba </label>
                    <input class="form-control"  id="ba" required readonly name="ba" value="<?php echo $ba?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                            <label for="email">UF:</label>  
                        <select class="form-control " id="uf" name="uf">
                            <option value="<?php echo $uf?>">  <?php echo $uf?> </option>
                            <option value="ATIVO"> PR </option>
                            
                            
                        
                        </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleSelect1">LOCALIDADE</label>
                    <select class="form-control" id="localidade" name="localidade" required  onchange="ativarInputDataContrato()" >
                    <option value="<?php echo $localidade?>">  <?php echo $localidade?> </option>

                          <?php

                            
                          $sql = "SELECT * FROM estacoes  group by localidade order by localidade
                          ";
                          $qr = mysql_query($sql) or die(mysql_error());
                          while($ln = mysql_fetch_assoc($qr)) 
                          {
                              echo '<option value="'.$ln['localidade'].'">'.$ln['localidade'].'</option>';
                          }
                          ?>
                    </select>
    </div>

    <div class="form-group">
                    <label for="exampleSelect1">ESTAÇÃO</label>
                    <select class="form-control" id="exampleSelect1" name="estacao" required >
                    <option value="<?php echo $estacao?>">  <?php echo $estacao?> </option>
                    </select>
    </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Célula</label>
                    <input class="form-control"  id="ba"   name="celula" value="<?php echo $celula?>" type="text" aria-describedby="emailHelp" >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Cdoe</label>
                    <input class="form-control"  id="ba"   name="cdoe" value="<?php echo $cdoe?>" type="text" aria-describedby="emailHelp" >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Afetação</label>
                    <input class="form-control"  id="ba"  name="afetacao" value="<?php echo $afetacao?>" type="text" aria-describedby="emailHelp" >
                  </div>
    
    
                  <div class="form-group">
                    <label for="exampleInputEmail1">Endereço</label>
                    <input class="form-control"  id="endereco"  value="<?php echo $endereco?>"  name="endereco"  type="text" aria-describedby="emailHelp" >
                  </div>

                  <div class="form-group">
                    <label for="pwd"> DATA DE ABERTURA:</label>
                    <input type="datetime-local"  class="form-control"  value="<?php echo $data_abertura?>" name="data_abertura" required>
                  </div>

                  <div class="form-group">
                    <label for="pwd"> DATA DE VENCIMENTO:</label>
                      <input type="datetime-local" value="<?php echo $data_vencimento?>" class="form-control"  name="data_vencimento" required>
                  </div>
                  
                  <div class="form-group">
                            <label for="email">Prioridade:</label>  
                        <select class="form-control " id="prioridade" name="prioridade">
                            <option value="<?php echo $tipo?>">  <?php echo $tipo?> </option>
                            <option value="97"> 97 </option>
                            <option value="7048"> 7048 </option>
                            <option value="TIM"> TIM </option>
                            <option value="10"> 10 </option>
                            <option value="89"> 89 </option>
                            <option value="ESCALONAMENTO"> ESCALONAMENTO </option>
                        </select>
                  </div>

                  <div class="form-group">
                            <label for="email">Tipo:</label>  
                        <select class="form-control " id="tipo_rede" name="tipo_rede">
                            <option value="<?php echo $tipo_rede?>">  <?php echo $tipo_rede?> </option>
                            <option value="SECUNDARIO"> SECUNDARIO </option>
                            <option value="PRIMARIO"> PRIMARIO </option>
                          
                        </select>
                  </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <input class="form-control"  id="ba" readonly   name="status" value="<?php echo $status?>" type="text" aria-describedby="emailHelp" >
                  </div>
                

                <div class="form-group">
                     <label for="email">Obs: </label>
                     <textarea class="form-control" rows="5"  id="obs" name="obs" maxlength="20000" placeholder="Máximo 2000 caracteres"> <?php echo $obs_cl; ?> </textarea>
                </div>
                                
                               
                                
</div>
</div><br><br>



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
    
    
      

    

 