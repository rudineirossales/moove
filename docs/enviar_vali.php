<script type="text/javascript">
function saidasuccessfully()
{
	setTimeout("window.location='validacao.php'");
	
	
}
</script>




<?php 
         include "conn.php"; 
      
         session_start();

         if(!isset($_SESSION["login"]) &&  !isset($_SESSION["senha"])  )
            {
                 header("Location: index.html");
                  exit;
            }

            




            $ba =$_GET['ba'];

            $sql = mysql_query ("select * from usuario join atividade on usuario.id = atividade.id_usu where atividade.ba = '$ba'" );

            $row = mysql_num_rows($sql);


                if (mysql_num_rows($sql) > 0)

                {
                    while ($dado = mysql_fetch_assoc($sql))
                    {
                        
                    
                        $nome = $dado["nome"];
                        $localidade = $dado["localidade"];
                        $estacao = $dado["estacao"];
                        $endereco = $dado["endereco"];
                        $celula = $dado["celula"];
                        $cdoe = $dado["cdoe"];
                        $tipo = $dado["tipo"];
                        $tipo_rede = $dado["tipo_rede"];
                        $data_despacho = $dado["data_despacho"];
                        $causa = $dado["causa"];
                        $sub = $dado["sub"];
                        $ro = $dado["ro"];
                        $cis = $dado["cis"];
                        $obs = $dado["obs"];
                        $obs_cl = $dado["obs_cl"];
                        $data_encerramento = $dado["data_encerramento"];
                        $data_despacho = $dado["data_despacho"];
                        $data_abertura = $dado["data_abertura"];
                        $data_vencimento = $dado["data_vencimento"];
                        $data_validacao = $dado["data_validacao"];
                        $data_paralizacao = $dado["data_paralizacao"];
                        $data_liberacao = $dado["data_liberacao"];
                        $data_atribuicao = $dado["data_atribuicao"];
                        $data_desptec = $dado["data_desptec"];
                        $afetacao = $dado["afetacao"];
                        $trava  = $dado["trava_ba"];
                        $trava_por  = $dado["trava_por"];
                        $escalonamento  = $dado["escalonamento"];
                        $tipo_7048  = $dado["tipo_7048"];
                        $evidencia3  = $dado["evidencia3"];
                        $evidencia4  = $dado["evidencia4"];
                        $foto_antes  = $dado["foto_antes"];
                        $foto_depois  = $dado["foto_depois"];
                        $latitude_final  = $dado["latitude_final"];
                        $longitude_final  = $dado["longitude_final"];
                        $capacidade_cabo  = $dado["capacidade_cabo"];
                    
                        
                       
                       
                        
                        
                        
                    }
                
                }

                if($trava == "S")
                {

                  echo "
                  <script language='JavaScript'>
                  window.alert('BA EM VALIDACAO POR $trava_por')
                  
                  </script>";

                  echo "<script>saidasuccessfully()</script>";

                  break;
                  
                }
                else
                {

                  $query = "update  atividade set trava_ba = 'S', trava_por = '".$_SESSION['nome']."' where ba = '$ba'";
                  $sql = mysql_query($query);


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
    <header class="app-header"><a class="app-header__logo" href="dashboard.php">Icomon</a>
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
        <li><a class="app-menu__item active" href="dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        
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
          <h1><i class="fa fa-edit"></i> Validação.</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item"><a href="#">Form Components</a></li>
        </ul>
      </div>
      <div class="row justify-content-md-center">
         <div class="col-md-8">
          <div class="tile">
            <div class="row">
              <div class="col-md-12">
                <form onSubmit="if(!confirm('Deseja mudar status da atividade??')){return false;}"  enctype="multipart/form-data" method="post"  action="enviar_vali2.php ">
                  <div class="form-group">
                <ul class="list-group">
                  <li class="list-group-item"><b> Ba: </b> <?php echo $ba;  ?></li>
                  <li class="list-group-item"><b> Técnico: </b> <?php echo $nome;  ?></li>
                  <li class="list-group-item"><b> Localidade: </b> <?php echo $localidade;  ?></li>
                  <li class="list-group-item"><b> Estação: </b> <?php echo $estacao;  ?></li>
                  <li class="list-group-item"><b> Endereço: </b> <?php echo $endereco;  ?></li>
                  <li class="list-group-item"><b> Afetação: </b> <?php echo $afetacao;  ?></li>
                  <li class="list-group-item"><b> Célula: </b> <?php echo $celula;  ?></li>
                  <li class="list-group-item"><b> Cdoe: </b> <?php echo $cdoe;  ?></li>
                  <li class="list-group-item"><b> Tipo Ba: </b> <?php echo $tipo;  ?></li>
                  <li class="list-group-item"><b> Rede: </b> <?php echo $tipo_rede;  ?></li>
                  <li class="list-group-item"><b> Abertura: </b> <?php echo $data_abertura;  ?></li>
                  <li class="list-group-item"><b> Vencimento: </b> <?php echo $data_vencimento;  ?></li>
                  <li class="list-group-item"><b> Hora despacho coordenador: </b> <?php echo $data_despacho;  ?></li>
                  <li class="list-group-item"><b> Hora despacho técnico: </b> <?php echo $data_desptec;  ?></li>
                  <li class="list-group-item"><b> Hora atribuição: </b> <?php echo $data_atribuicao;  ?></li>
                  <li class="list-group-item"><b> Hora encerramento: </b> <?php echo $data_encerramento;  ?></li>
                  <li class="list-group-item"><b> Hora paralização: </b> <?php echo $data_paralizacao;  ?></li>
                  <li class="list-group-item"><b> Hora liberação: </b> <?php echo $data_liberacao;  ?></li>
                  <li class="list-group-item"><b> Causa: </b> <?php echo $causa;  ?></li>
                  <li class="list-group-item"><b> Sub-causa: </b> <?php echo $sub;  ?></li>
                  <li class="list-group-item"><b> Ro: </b> <?php echo $ro;  ?></li>
                  <li class="list-group-item"><b> Cis: </b> <?php echo $cis;  ?></li>
                  <li class="list-group-item"><b> Latitude: </b> <?php echo $latitude_final;  ?></li>
                  <li class="list-group-item"><b> Longitude: </b> <?php echo $longitude_final;  ?></li>
                  <li class="list-group-item"><b> Escalonamento: </b> <?php echo $escalonamento;  ?></li>
                  <li class="list-group-item"><b> Tipo 7048: </b> <?php echo $tipo_7048;  ?></li>
                  <li class="list-group-item"><b> Capacidade do Cabo: </b> <?php echo $capacidade_cabo;  ?></li>
                  
                  <?php

                     $sql2 = mysql_query ("select * from material where ba = '$ba'" );

                     $dado2 = mysql_num_rows($sql2);


            if (mysql_num_rows($sql2) > 0)
               $m = 0;
            {  ?>
            <?php
              while ($dado2 = mysql_fetch_assoc($sql2))
            {  $descricao = $dado2["descricao"]; $quantidade = $dado2["quantidade"]; $m = $m + 1;?>
                 
            <tr>
            <li class="list-group-item"><b>[<?php echo $m;?>] Material: </b> <?php echo $descricao;  ?></li>
            <li class="list-group-item"><b> [<?php echo $m;?>] Quantidade: </b> <?php echo $quantidade;  ?></li>
            
            </tr>  
          <?php 
                }
          
          }
      ?>
                  
              </ul>
              </div>      
                    <input type="hidden" value="<?php echo $ba;  ?>" name="ba" checked>
                    <input type="hidden" value="<?php echo $tipo;  ?>" name="tipo">
                    <input type="hidden" value="<?php echo $nome;  ?>" name="nome">
                    <input type="hidden" value="<?php echo $estacao;  ?>" name="estacao">
                    <input type="hidden" value="<?php echo $celula;  ?>" name="celula">

                        
                  <div class="form-group">
                    <label for="exampleTextarea">Observação</label>
                    <textarea readonly  class="form-control"  id="exampleTextarea" name="obs" rows="6"> <?php echo '(' . $obs . ' )     ' . $obs_cl; ?> </textarea>
                  </div>
                  
                  <div class="text-center">
                      
                     
                    <img src="arquivo/<?php echo $evidencia3 ?>"   width="500" height="500" style="padding-top: 5%;"> <br>

                  </div> <br><br>
                   <div class="text-center">

                    <img src="arquivo/<?php echo $evidencia4 ?>"   width="500" height="500" style="padding-top: 5%;"> <br>

                  </div> <br><br>
                  <div class="text-center">

                    <img src="arquivo/<?php echo $foto_antes?>"   width="500" height="500" style="padding-top: 5%;"> <br>

                  </div> <br><br>
                   <div class="text-center">

                    <img src="arquivo/<?php echo $foto_depois?>"   width="500" height="500" style="padding-top: 5%;"> <br>

                  </div> <br><br>
                  
                  
              <fieldset class="col-md-6">
                  <div class="form-group">
                        <label for="formFile" class="form-label">Teste de validação </label>
                        <input class="form-control"  type="file" accept=".png,.jpg,.jpeg" id="teste1" name="teste1" >
                        <p  style="font-size: 10px; color:red;" > Obrigatório**</p>
                        <p id="output1"></p>
                        <script type="text/javascript">
                        $('#teste1').on('change', function() {
                  
                            const size = 
                              (this.files[0].size / 1024 / 1024).toFixed(2);
                  
                            if (size > 1 ) {
                                alert("Máximo 1 MB");
                                $("#teste1").val("");
                                
                            } else {
                                $("#output1").html('<b>' +
                                  'Tamanho: ' + size + " MB" + '</b>');
                            }
                        });
                    </script>

                  </div>
                  <div class="form-group">
                        
                        <input class="form-control"  accept=".png,.jpg,.jpeg" type="file" id="teste2" name="teste2" >
                        <p id="output2"></p>
                        <script type="text/javascript">
                        $('#teste2').on('change', function() {
                  
                            const size = 
                              (this.files[0].size / 1024 / 1024).toFixed(2);
                  
                            if (size > 1 ) {
                                alert("Máximo 1 MB");
                                $("#teste2").val(null);
                                
                            } else {
                                $("#output2").html('<b>' +
                                  'Tamanho: ' + size + " MB" + '</b>');
                            }
                        });
                    </script>
                  </div>
              </fieldset>
              
                  
                  
        </br><div class="form-check">
                        <input class="form-check-input" type="radio" name="opc" value="validar" id="flexRadioDefault1" checked >
                        <label class="form-check-label" for="flexRadioDefault1">
                          Aprovar
                        </label>
                </div>
                <div class="form-check">
                        <input class="form-check-input" type="radio" name="opc" value="Rejeitar" id="flexRadioDefault2" >
                        <label class="form-check-label" for="flexRadioDefault2" >
                          Rejeitar
                        </label>
                </div>

        </br> </br><div class="form-group">
                    <label for="exampleTextarea">Justificativa para reprovação</label>
                    <textarea  placeholder="Caso seja rejeitada a justificativa deve ser preenchida" class="form-control"  id="exampleTextarea" name="obs_rej" rows="6"> </textarea>
                  </div>

              

                 
                  <div class="tile-footer">
              <button class="btn btn-primary" type="submit">Enviar</button>
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









</script>