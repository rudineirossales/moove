                <script type="text/javascript">
                  function saidasuccessfully()
                  {
                    setTimeout("window.location='pesq_contato1.php'");
                    
                    
                  }
                </script>

<?php 
         include "conn.php"; 
         date_default_timezone_set('America/Sao_Paulo');
         $hoje = date('Y-m-d H:i:s');
         session_start();

         if(!isset($_SESSION["login"]) &&  !isset($_SESSION["senha"]))

            {
                 header("Location: index.html");
                  exit;
            }

            $sa =$_GET['sa'];
            
            $sql = mysql_query ("select * from reparo_hc where sa = '$sa'" );

            $row = mysql_num_rows($sql);


                if (mysql_num_rows($sql) > 0)

                {
                    while ($dado = mysql_fetch_assoc($sql))
                    {
                        
                        $sa = $dado["sa"];
                        $contador = $dado["contador"];
                        $uf = $dado["uf"];
                        $data_execucao = $dado["data_execucao"];
                        $companhia = $dado["companhia"];
                        $tecnico = $dado["tecnico"];
                        $macro = $dado["macro"];
                        $cliente = $dado["cliente"];
                        $contato1 = $dado["contato1"];
                        $contato = $dado["contato"];
                        $trava = $dado["trava"];
                        $trava_por = $dado["trava_por"];
                        
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

                  $query = "update  reparo_hc set trava = 'S', trava_por = '".$_SESSION['nome']."' where sa = '$sa'";
                  $sql = mysql_query($query);


                }
              


?>



<!DOCTYPE html>
<html lang="en">
  <head>



  <script type="text/javascript">
function saidasuccessfully()
{
	setTimeout("window.location='dashboard_hc.php'");
	
	
}
</script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <script src="//code.jquery.com/jquery-1.10.2.js"></script>

  

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
          <h1><i class="fa fa-edit"></i> Reteste de reparos</h1>
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
                <form method="post"  onSubmit="if(!confirm('Deseja modificar atividade?')){return false;}" action="enviar_cadastro.php ">

                <div class="form-group">
                    <label for="exampleInputEmail1">Uf</label>
                    <input class="form-control"  id="sa" readonly name="uf" value="<?php echo $uf?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sa</label>
                    <input class="form-control"  id="ba" readonly name="sa" value="<?php echo $sa?>" type="text" aria-describedby="emailHelp" >
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
                    <label for="email">Atendeu?</label>  
                        <select class="form-control "  name="atendeu">
                          <option value="LIGACAO">  Ligação </option>
                          <option value="WHATSAPP">  Whatsapp </option>
                          <option value="NAO ATENDE">  Não atende </option>
                          <option value="Nº NAO EXISTE">  Nº não existe </option>
                          <option value="DESCONHECE CLIENTE">  Desconhece cliente </option>
                        </select>
                  </div>
                  <div class="form-group">
                    <label for="email">Potência?</label>  
                        <select class="form-control"   name="potencia">
                          <option value="DENTRO DOS PARAMETROS">  Dentro dos paramêtros </option>
                          <option value="ATENUADO">  Atenuado </option>
                          <option value="DESLIGADO">  Desligado </option>
                          <option value="SEM PARAMETROS">  Sem paramêtros </option>
                          
                        </select>
                  </div>
                  <div class="form-group">
                    <label for="email">Funcionalidade</label>  
                        <select class="form-control"  id="mySelect" name="funcionalidade">
                          <option value="OK">  Ok </option>
                          <option value="NAO OK">  Não ok </option>
                          <option value="SEM CONFIRMACAO">  Sem confirmação </option>
                          <option value="SEM RETORNO">  Sem retorno </option>
                          <option value="CANCELAMENTO">  Cancelamento </option>
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
                    </select> <br>
                        <div class="form-group">
                            <label for="pwd"> Data do agendamento:</label>
                            <input type="date" class="form-control"  name="data_ag" >
                        </div>
                        <div class="form-group">
                            <label for="email">Período:</label>  
                            <select class="form-control"  id="mySelect" name="periodo">
                              <option value="ND" checked>  ND </option>
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
/*

if (isset($_POST ['submit']) )
{
  
  $sa  =$_POST['sa'];
  $cliente  =$_POST['cliente'];
  $contato  =$_POST['contato'];
  $atendeu  =$_POST['atendeu'];
  $potencia  =$_POST['potencia'];
  $coordenador  =$_POST['coordenador'];
  $funcionalidade  =$_POST['funcionalidade'];
  $contador  = $_POST['contador'];
  $contador_aguardo  = $_POST['contador'];
  $obs  =$_POST['obs'];
  $quebra = 'OK';
  $status  ='';


  if($funcionalidade == 'NAO OK')
  {

    $status  ='NAO OK';
    
    if($contador == ''){
        
       $quebra = '1º dia'; 
    }
    elseif ($contador == '1'){
      
      $quebra = '3º dia';  
        
    }
    elseif ($contador == '2'){
      
      $quebra = '5º dia';  
        
    }
    elseif ($contador == '3'){
      
      $quebra = '7º dia';  
        
    }
    
    
    

  }

  if( $contador == '' )
  {
    $contador  = '1';
    if($funcionalidade == 'SEM RETORNO'){$contador  = $contador_aguardo;}
    $query = "update reparo_hc set coordenador = '$coordenador',status = '$status',contador = '$contador', contato = '$contato', cliente = '$cliente', contato1 = '".$_SESSION['nome']."', data_contato1 = '$hoje', atendeu = '$atendeu', potencia = '$potencia', funcionalidade = '$funcionalidade', obs_contato1 = '$obs', quebra = '$quebra', trava = '0', trava_por = '0'  where sa = '$sa'";

  }
  elseif ($contador == '1')
  {
    $contador  = '2';
    if($funcionalidade == 'SEM RETORNO'){$contador  = $contador_aguardo;}
    $query = "update reparo_hc set coordenador = '$coordenador',status = '$status',contador = '$contador', contato = '$contato', cliente = '$cliente', contato2 = '".$_SESSION['nome']."', data_contato2 = '$hoje', atendeu_2 = '$atendeu', potencia_2 = '$potencia', funcionalidade_2 = '$funcionalidade', obs_contato2 = '$obs', quebra = '$quebra', trava = '0', trava_por = '0'  where sa = '$sa'";
  }
  elseif ($contador == '2')
  {
    $contador  = '3';
    if($funcionalidade == 'SEM RETORNO'){$contador  = $contador_aguardo;}
    $query = "update reparo_hc set coordenador = '$coordenador',status = '$status',contador = '$contador', contato = '$contato', cliente = '$cliente', contato3 = '".$_SESSION['nome']."', data_contato3 = '$hoje', atendeu_3 = '$atendeu', potencia_3 = '$potencia', funcionalidade_3 = '$funcionalidade', obs_contato3 = '$obs', quebra = '$quebra', trava = '0', trava_por = '0'  where sa = '$sa'";
  }
  elseif ($contador == '3')
  {
    $status  = 'ENCERRADO';
    $contador  = '4';
    if($funcionalidade == 'SEM RETORNO'){$contador  = $contador_aguardo;}
    $query = "update reparo_hc set coordenador = '$coordenador',status = '$status',contador = '$contador', contato = '$contato', cliente = '$cliente', contato4 = '".$_SESSION['nome']."', data_contato4 = '$hoje', atendeu_4 = '$atendeu', potencia_4 = '$potencia', funcionalidade_4 = '$funcionalidade', obs_contato4 = '$obs', quebra = '$quebra', trava = '0', trava_por = '0'  where sa = '$sa'";
  }


          
  
    $sql = mysql_query($query);
  
        if($sql)
        {
  
         

          echo "
          <script language='JavaScript'>
          window.alert('ENVIADO COM SUCESSO!')
          
          </script>";

          echo "<script>saidasuccessfully()</script>";
  
         
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






*/
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


