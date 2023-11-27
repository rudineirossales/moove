<?php 
         include "conn.php"; 
      
         session_start();

         if(!isset($_SESSION["login"]) &&  !isset($_SESSION["senha"]))

            {
                 header("Location: index.html");
                  exit;
            }

            $sa =$_GET['sa'];
            
            $sql = mysql_query ("select * from repetida where sa = '$sa'" );

            $row = mysql_num_rows($sql);


                if (mysql_num_rows($sql) > 0)

                {
                    while ($dado = mysql_fetch_assoc($sql))
                    {
                        
                        
                        $mes = $dado["mes"];
                        $nome = $dado["nome"];
                        $cp = $dado["cp"];
                        $uf = $dado["uf"];
                        $num_documento = $dado["num_documento"];
                        $data_abertura = $dado["data_abertura"];
                        $data_fechamento = $dado["data_fechamento"];
                        $cod_fechamento = $dado["cod_fechamento"];
                        $macro_causa = $dado["macro_causa"];
                        $descricao_curta = $dado["descricao_curta"];
                        $no_logradouro = $dado["no_logradouro"];
                        $nu_fachada = $dado["nu_fachada"];
                        $wfm = $dado["wfm"];
                        $tecnico_anterior = $dado["tecnico_anterior"];
                        $gpon = $dado["gpon"];
                        $sa = $dado["sa"];
                        $obs = $dado["obs"];
                        $posto = $dado["posto"];
                        $num_documento_anterior = $dado["num_documento_anterior"];
                        $macro_causa = $dado["macro_causa"];
                        $descricao_curta = $dado["descricao_curta"];
                        $no_logradouro = $dado["no_logradouro"];
                        $nu_fachada = $dado["nu_fachada"];
                    }
                    }
                
                
              


?>



<!DOCTYPE html>
<html lang="en">
  <head>
      
      <script type="text/javascript">
function getImagePreview(event)
  {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('preview');
    var newimg=document.createElement('img');
    imagediv.innerHTML='';
    newimg.src=image;
    newimg.width="300";
    imagediv.appendChild(newimg);
  }
</script>
<script type="text/javascript">
function getImagePreview2(event)
  {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('preview2');
    var newimg=document.createElement('img');
    imagediv.innerHTML='';
    newimg.src=image;
    newimg.width="300";
    imagediv.appendChild(newimg);
  }
</script>
<script type="text/javascript">
function getImagePreview3(event)
  {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('preview3');
    var newimg=document.createElement('img');
    imagediv.innerHTML='';
    newimg.src=image;
    newimg.width="300";
    imagediv.appendChild(newimg);
  }
</script>
<script type="text/javascript">
function getImagePreview4(event)
  {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('preview4');
    var newimg=document.createElement('img');
    imagediv.innerHTML='';
    newimg.src=image;
    newimg.width="300";
    imagediv.appendChild(newimg);
  }
</script>

  <script type="text/javascript">
function saidasuccessfully()
{
	setTimeout("window.location='pesq_posba.php'");
	
	
}
</script>

  

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
        <li><a class="app-menu__item active"  <?php if ($_SESSION["acesso"] == "Tec"){ echo 'href="index_col.html"';} else {echo 'href="dashboard_hc.php"'; } ?>><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        
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
          <h1><i class="fa fa-edit"></i> Justificativa </h1>
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
                <form method="post"  action="registra_repetidas.php" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="exampleInputEmail1">Sa</label>
                    <input class="form-control"  id="ba" readonly name="sa" value="<?php echo $sa?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Uf</label>
                    <input class="form-control"  id="ba" readonly name="ba_comun" value="<?php echo $uf?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Cp</label>
                    <input class="form-control"  id="ba" readonly name="uf"  value="<?php echo $cp?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nº Documento</label>
                    <input class="form-control"  id="ba" readonly name="localidade"  value="<?php echo $num_documento?>" type="text" aria-describedby="emailHelp" >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Data de abertura</label>
                    <input class="form-control"  id="ba" readonly name="estacao"  value="<?php echo $data_abertura?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Data fechamento</label>
                    <input class="form-control"  id="ba" readonly name="estacao"  value="<?php echo $data_fechamento?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Cód. fechamento</label>
                    <input class="form-control"  id="ba" readonly name="estacao"  value="<?php echo $cod_fechamento?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Macro causa</label>
                    <input class="form-control"  id="ba" readonly name="estacao"  value="<?php echo $macro_causa?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Logradouro</label>
                    <input class="form-control"  id="ba" readonly name="estacao"  value="<?php echo $no_logradouro?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Técnico anterior</label>
                    <input class="form-control"  id="ba" readonly name="estacao"  value="<?php echo $tecnico_anterior?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Técnico atual</label>
                    <input class="form-control"  id="ba" readonly name="estacao"  value="<?php echo $nome?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Gpon</label>
                    <input class="form-control"  id="ba" readonly name="estacao"  value="<?php echo $gpon?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  
                  <div class="form-group">
                  <label for="exampleSelect1">Causa reparo</label>
                     <select class="form-control" id="coord" name="causareparo" required>
                      <!--  onchange="ativarInputDataContrato()"  -->
                    <option value="0" disabled="disabled"  >Escolha um coordenador</option>

                          <?php

                            
                          $sql = "SELECT * FROM causareparo  order by descricao
                          ";
                          $qr = mysql_query($sql) or die(mysql_error());
                          while($ln = mysql_fetch_assoc($qr)) 
                          {
                            echo '<option value="'.$ln['descricao'].'">'.$ln['descricao'].'</option>';
                              
                              
                              
                          }
                          ?> 
                    </select>
                  </div>
                  <div class="form-group">
                      <label for="email">Descrição: </label>
                    <textarea class="form-control" rows="5"  id="obs" name="descricao"  ></textarea>
                  </div>

                  <fieldset class="col-md-9">
                  <div class="form-group">
                        <label for="formFile" class="form-label">Foto potência </label>
                        <input class="form-control" required type="file" accept=".png,.jpg,.jpeg" id="upload_file" onchange="getImagePreview(event)" name="foto_potencia" >
                        <div id="preview"> </div>
                        <label for="formFile" class="form-label" style="font-size:11px;color:red;">*Tamanho máximo da imagem 2MB* </label>
                        
                        <p id="output1"></p>
                        <script type="text/javascript">
                        $('#foto_potencia').on('change', function() {
                  
                            const size = 
                              (this.files[0].size / 1024 / 1024).toFixed(2);
                  
                            if (size > 2 ) {
                                alert("Máximo 2MB, Diminua a qualidade da foto.");
                                $("#foto_potencia").val("");
                                
                            } else {
                                $("#output1").html('<b>' +
                                  'Tamanho: ' + size + " MB" + '</b>');
                            }
                        });
                    </script>

                  </div>
                  <div class="form-group">
                        <label for="formFile" class="form-label">Foto Ont </label>
                        <input class="form-control" type="file" required accept=".png,.jpg,.jpeg" id="upload_file2" onchange="getImagePreview2(event)" name="foto_ont" >
                        <div id="preview2"> </div>
                        <label for="formFile" class="form-label" style="font-size:11px;color:red;">*Tamanho máximo da imagem 2MB* </label>
                        
                        <p id="output1"></p>
                        <script type="text/javascript">
                        $('#foto_ont').on('change', function() {
                  
                            const size = 
                              (this.files[0].size / 1024 / 1024).toFixed(2);
                  
                            if (size > 2 ) {
                                alert("Máximo 2MB, Diminua a qualidade da foto.");
                                $("#foto_ont").val("");
                                
                            } else {
                                $("#output1").html('<b>' +
                                  'Tamanho: ' + size + " MB" + '</b>');
                            }
                        });
                    </script>

                  </div>

                  <div class="form-group">
                        <label for="formFile" class="form-label">Foto Velocidade </label>
                        <input class="form-control" required type="file" accept=".png,.jpg,.jpeg" id="upload_file3" onchange="getImagePreview3(event)" name="foto_velocidade" >
                        <div id="preview3"> </div>
                        <label for="formFile" class="form-label" style="font-size:11px;color:red;">*Tamanho máximo da imagem 2MB* </label>
                        
                        <p id="output1"></p>
                        <script type="text/javascript">
                        $('#foto_velocidade').on('change', function() {
                  
                            const size = 
                              (this.files[0].size / 1024 / 1024).toFixed(2);
                  
                            if (size > 2 ) {
                                alert("Máximo 2MB, Diminua a qualidade da foto.");
                                $("#foto_velocidade").val("");
                                
                            } else {
                                $("#output1").html('<b>' +
                                  'Tamanho: ' + size + " MB" + '</b>');
                            }
                        });
                    </script>

                  </div>

                  <div class="form-group">
                        <label for="formFile" class="form-label">Foto Rat </label>
                        <input class="form-control" required type="file" accept=".png,.jpg,.jpeg" id="upload_file4" onchange="getImagePreview4(event)" name="foto_rat" >
                        <div id="preview4"> </div>
                        <label for="formFile" class="form-label" style="font-size:11px;color:red;">*Tamanho máximo da imagem 2MB* </label>
                        
                        <p id="output1"></p>
                        <script type="text/javascript">
                        $('#foto_rat').on('change', function() {
                  
                            const size = 
                              (this.files[0].size / 1024 / 1024).toFixed(2);
                  
                            if (size > 2 ) {
                                alert("Máximo 2MB, Diminua a qualidade da foto.");
                                $("#foto_rat").val("");
                                
                            } else {
                                $("#output1").html('<b>' +
                                  'Tamanho: ' + size + " MB" + '</b>');
                            }
                        });
                    </script>

                  </div>



                  
                    </div>
                  </div>
                  <div class="tile-footer">
         
                          <button class="btn btn-primary" type="submit"> Enviar</button>
                    </div>   
           
              </form>

              <body>

   
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </main>


    
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


