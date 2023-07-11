<?php 
         include "conn.php"; 
      
         session_start();

         if(!isset($_SESSION["login"]) &&  !isset($_SESSION["senha"]))

            {
                 header("Location: index.html");
                  exit;
            }

            $id =$_GET['id_usu'];
            
            $sql = mysql_query ("select * from diario where re = '$id'" );

            $row = mysql_num_rows($sql);


                if (mysql_num_rows($sql) > 0)

                {
                    while ($dado = mysql_fetch_assoc($sql))
                    {
                        
                        $re = $dado["re"];
                        $equipe = $dado["equipe"];
                        $id_coord = $dado["id_coord"];
                        $nome_coord = $dado["nome_coord"];
                        $status = $dado["status"];
                        $atividade = $dado["atividade"];
                        $descricao = $dado["descricao"];
                        $data_atualizacao = $dado["data_atualizacao"];
                        
                        
                        
                        
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
              
             $.post("equipe.php",
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
          <h1><i class="fa fa-edit"></i> Atualização Equipes</h1>
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
                <form method="post"  action="enviar_atua_eqp.php ">

                <div class="form-group">
                    <label for="exampleInputEmail1">ID</label>
                    <input class="form-control"  id="ba" readonly name="id" value="<?php echo $id?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Equipe</label>
                    <input class="form-control"  id="ba" readonly name="equipe" value="<?php echo $equipe?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    
                    <input class="form-control"  id="ba" readonly name="id_coord"  value="<?php echo $id_coord?>" type="hidden" aria-describedby="emailHelp" >
                 
                    <div class="form-group">
                                 
                                  <label for="exampleSelect1">Coordenador </label>
                                  <select class="form-control" id="coord" name="coord" required  onchange="ativarInputDataContrato()" >
                                  

                                        <?php

                                          
                                        $sql = "SELECT * FROM diario  group by nome_coord order by equipe
                                        ";
                                        $qr = mysql_query($sql) or die(mysql_error());
                                           echo '<option value="'.$id_coord.'">'.$nome_coord.'</option>';
                                        while($ln = mysql_fetch_assoc($qr)) 
                                        {
                                            echo '<option value="'.$ln['id_coord'].'">'.$ln['nome_coord'].'</option>';

                                           
                                        }
                                        ?> 
                                  </select>

                                  
                    </div>
                    
                  
                    <div class="form-group">
                                          <label for="exampleSelect1">Técnico</label>
                                          <select class="form-control" id="tec" name="tec" required >
                                          <option value="<?php echo $nome_coord?>" ><?php echo $id_coord?></option>
                                          </select>
                    </div> 

                  <div class="form-group">
                            <label for="email">Status::</label>  
                        <select class="form-control " id="mySelect" name="status">
                            <option value="<?php echo $status?>">  <?php echo $status?> </option>
                            <option value="ATIVO">  ATIVO </option>
                            <option value="DSR">  DSR </option>
                            <option value="BANCO DE HORA">  BANCO DE HORA </option>
                            <option value="ATESTADO">  ATESTADO </option>
                            <option value="INTERJORNADA">  INTERJORNADA </option>
                            
                        
                        </select>
                  </div>
                  
                  <div class="form-group">
                  <label for="email">Descrição: </label>
                <textarea class="form-control" rows="5"  id="descricao" name="descricao" maxlength="20000" placeholder="Máximo 2000 caracteres"> <?php echo $descricao; ?> </textarea>
                  </div>
                
                    </div>
                    <button class="btn btn-primary" type="submit"> Atualizar</button>
                  </div>
                 
              

              
              </form>

              <body>

   
    
    </main>


    <?php


if (isset($_POST ['submit']) ) 
{
  

  $id  =$_POST['id'];
 
  
 
  
  
   
          $query = "update diario set status = '$status', descricao = '$descricao', data_atualizacao = NOW() where re = '$id'";
  
          $sql = mysql_query($query);
  
  
  
  
        if($sql)
        {
  
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


