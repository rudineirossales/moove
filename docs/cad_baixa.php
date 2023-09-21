<?php 
         include "conn.php"; 
      
         session_start();

         if(!isset($_SESSION["login"]) &&  !isset($_SESSION["senha"]))

            {
                 header("Location: index.html");
                  exit;
            }

            $ba =$_GET['ba'];
            
            $sql = mysql_query ("select * from atividade where atividade.ba = '$ba'" );

            $row = mysql_num_rows($sql);


                if (mysql_num_rows($sql) > 0)

                {
                    while ($dado = mysql_fetch_assoc($sql))
                    {
                        
                        $ba2 = $dado["ba"];
                        $uf = $dado["uf"];
                        $localidade = $dado["localidade"];
                        $estacao = $dado["estacao"];
                        $endereco = $dado["endereco"];
                        $celula = $dado["celula"];
                        $cdoe = $dado["cdoe"];
                        $tipo = $dado["tipo"];
                        $id_usu = $dado["id_usu"];
                        $status = $dado["status"];
                        $nome_despacho = $dado["nome_despacho"];
                        $data_despacho = $dado["data_despacho"];
                        $obs_cl = $dado["obs_cl"];
                        $justificativa = $dado["justificativa"];
                        $data_despacho = $dado["data_despacho"];
                        $nome_despacho = $dado["nome_despacho"];
                        $ba_comum = $dado["ba_comum"];
                        $data_abertura = $dado["data_abertura"];
                        $data_vencimento= $dado["data_vencimento"];
                        
                        
                        
                    }
                
                }
              


?>



<!DOCTYPE html>
<html lang="en">
  <head>

  <script type="text/javascript">
function saidasuccessfully()
{
	setTimeout("window.location='dashboard.php'");
	
	
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
        <li><a class="app-menu__item active"  <?php if ($_SESSION["acesso"] == "Tec"){ echo 'href="index_col.html"';} else {echo 'href="dashboard.php"'; } ?>><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        
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
          <h1><i class="fa fa-edit"></i> Atividades;</h1>
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
                <form method="post"  action="enviar_cad_baixa.php ">

                <div class="form-group">
                    <label for="exampleInputEmail1">Ba</label>
                    <input class="form-control"  id="ba" readonly name="ba" value="<?php echo $ba?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ba comum</label>
                    <input class="form-control"  id="ba" readonly name="ba_comun" value="<?php echo $ba_comum?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Uf</label>
                    <input class="form-control"  id="ba" readonly name="uf"  value="<?php echo $uf?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Localidade</label>
                    <input class="form-control"  id="ba" readonly name="localidade"  value="<?php echo $localidade?>" type="text" aria-describedby="emailHelp" >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Estação</label>
                    <input class="form-control"  id="ba" readonly name="estacao"  value="<?php echo $estacao?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  
                  

                  <div class="form-group">
                    <label for="exampleInputEmail1">Célula</label>
                    <input class="form-control"  id="ba" readonly name="celula"  value="<?php echo $celula?>" type="text" aria-describedby="emailHelp" >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Cdoe</label>
                    <input class="form-control"  id="ba" readonly name="cdoe"  value="<?php echo $cdoe?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Data abertura</label>
                    <input class="form-control"  id="ba" readonly name="ba_abertura" value="<?php echo $data_abertura?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Data vencimento</label>
                    <input class="form-control"  id="ba" readonly name="ba_vencimento" value="<?php echo $data_vencimento?>" type="text" aria-describedby="emailHelp" >
                  </div>
    
    
                  <div class="form-group">
                    <label for="exampleInputEmail1">Endereço</label>
                    <input class="form-control"  id="endereco" value="<?php echo $endereco?>" readonly name="endereco"  type="text" aria-describedby="emailHelp" >
                  </div>
    
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tipo</label>
                    <input class="form-control"  id="ba" readonly name="tipo"  value="<?php echo $tipo?>" type="text" aria-describedby="emailHelp" >
                  </div>

      
                  <div class="form-group">
                    <label for="exampleInputEmail1">Téc</label>
                    <input class="form-control"  id="ba" readonly name="tec"  type="text" value="<?php echo $id_usu?>" aria-describedby="emailHelp" >
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Data despacho</label>
                    <input class="form-control"  id="ba" readonly name="data_desp"  type="text" value="<?php echo $data_despacho?>" aria-describedby="emailHelp" >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Despachada por:</label>
                    <input class="form-control"  id="ba" readonly name="desp_por"  type="text" value="<?php echo $nome_despacho?>" aria-describedby="emailHelp" >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <input class="form-control"  id="ba" readonly name="status"  type="text" value="<?php echo $status?>" aria-describedby="emailHelp" >
                  </div>

                  <div class="form-group">
                  <label for="email">Obs: </label>
                <textarea class="form-control" rows="5" readonly id="obs" name="obs" maxlength="20000" placeholder="Máximo 2000 caracteres"> <?php echo $obs_cl; ?> </textarea>
                  </div>
                  <div class="form-group">
                  <label for="email">Justificativa reprovação: </label>
                <textarea class="form-control" rows="5" readonly id="justificativa" name="obs"  placeholder="Aparecerá caso ba seja reprovador pelo COC"> <?php echo $justificativa; ?> </textarea>
                  </div>
      
    
        
    
    
                  
                  
                    </div>
                  </div>
                  <div class="tile-footer">
            <?php if ($_SESSION["acesso"] == 'Tec'){

                    if($status == 'EM ANDAMENTO' || $status == 'REPROVADO' ){?> 
                          <a class="btn btn-primary" href="cadastro_baixa.php?ba=<?php echo $ba ?>">Baixar</a>
                    </div>
                    <?php }if($status == 'DESPTEC'){ ?>
                          <button class="btn btn-primary" type="submit"> Atribuir</button>
                    </div>   
            <?php } ?>   

   
                  


            <?php } else { ?>

              

              
              </form>

              <body>

   
    <script>
    $(function(){
        //código para exibir os modais
    });
    </script>
      

<div class="modal fade" id="modal-mensagem">
   <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                
            </div>
            <div class="modal-body">
            <div class="form-group">
                  
                 <form class="form-group" role="form"   method="POST" action="cad_baixa.php">
                              <div class="form-group">
                                 <input type="hidden" class="form-control"  value= "<?php echo $ba; ?>" name="ba2" required>
                                  <label for="exampleSelect1">Coordenador </label>
                                  <select class="form-control" id="coord" name="coord" required  onchange="ativarInputDataContrato()" >
                                  <option value="0" disabled="disabled"  >Escolha um coordenador </option>

                                        <?php

                                          
                                        $sql = "SELECT * FROM usuario where funcao = 'COORD'  group by nome_gestor order by nome
                                        ";
                                        $qr = mysql_query($sql) or die(mysql_error());
                                        while($ln = mysql_fetch_assoc($qr)) 
                                        {
                                            echo '<option value="'.$ln['nome_gestor'].'">'.$ln['nome_gestor'].'</option>';

                                           
                                        }
                                        ?> 
                                  </select>

                                  
              </div>
                      <div class="form-group">
                                          <label for="exampleSelect1">Técnico</label>
                                          <select class="form-control" id="tec" name="tec" required >
                                          <option value="0" disabled="disabled" >Escolha um técnico</option>
                                          </select>
                      </div> 
                        </div> 
                        <?php if($status == "PARALIZADO") { ?> <span>BA PARALIZADO</span> <?php } else {  ?>
                        <button type="submit" class="btn btn-primary" name="submit2">Repassar</button> <?php }?>
                 </form>
            </div>        
                  
           
                
             <div class="modal-footer">
                
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>

</div>
              
              <button class="btn btn-primary" data-toggle="modal" data-target="#modal-mensagem">
                Repasse.
              </button>


            <?php } ?>
                
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </main>


    <?php


if (isset($_POST ['submit2']) )
{
  

  $ba2  =$_POST['ba2'];
  $tec  =$_POST['tec'];
  $gestor  =$_POST['coord'];
  
  $sql2 = mysql_query ("select * from usuario where id = '$gestor'" );

  $row = mysql_num_rows($sql2);


    if (mysql_num_rows($sql2) > 0)

    {

      while ($dado = mysql_fetch_assoc($sql2))
      {

      $gestor = $dado["nome"];
      $id_gestor = $dado["id"];

      }

    }
  
  
   
          $query = "update atividade set id_usu = '$tec', status = 'DESPTEC', data_desptec = NOW(), nome_gestor = '$gestor', id_gestor = '$id_gestor' where ba = '$ba2'";
  
          $sql = mysql_query($query);
  
  
  
  
        if($sql)
        {
  
          $query4 = "insert into logs (ba,status,nome,id,data)";
          $query4.= "values ('$ba2','DESPTEC','".$_SESSION['nome']."','".$_SESSION['id']."',NOW())";
          $sql4 = mysql_query($query4);

          echo "
          <script language='JavaScript'>
          window.alert('EDITADO SUCESSO!')
          
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


