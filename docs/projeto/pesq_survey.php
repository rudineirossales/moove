<?php 
         include "conn.php"; 
      
         session_start();

         if(!isset($_SESSION["login"]) &&  !isset($_SESSION["senha"]) )
            {
                 header("Location: index.html");
                  exit;
            }

            $localidade = $_GET["localidade"];
            $logradouro = $_GET["logradouro"];
            $protocolo = $_GET["cod"];
            $teste = $_GET["teste"];
            $cod2 = $_GET["cod2"];
            

           $connect = mysqli_connect("62.72.63.187", "remoteicomon", "Rud!n3!@", "projeto");    
            
            $sql2 = mysql_query ("select count(DISTINCT(cod_survey)) from projeto where localidade = '$localidade' and logradouro = '$logradouro'   group by cod_survey" );
            $ContaSurveyDistintos = mysql_num_rows($sql2);

            $query3 ="select SUM(quantidade_ums) as soma from projeto where localidade = '$localidade' and logradouro = '$logradouro'  ";  
            $SomaSurvey = mysqli_query($connect, $query3); 
            
             while($row = mysqli_fetch_array($SomaSurvey))  
             {
            
                        $SomaUms= $row["soma"];
            
             } 
            
            $query ="select quantidade_ums,trava,trava_por,cadastro_status,protocolo,logradouro,num_fachada,comp1,comp2,comp3,cod_survey from projeto where localidade = '$localidade' and logradouro = '$logradouro' and cadastro_status = 'NAO INICIADO' or localidade = '$localidade' and logradouro = '$logradouro' and cadastro_status = 'PENDENTE' or localidade = '$localidade' and logradouro = '$logradouro' and cadastro_status = 'CONCLUIDO' order by num_fachada ";   
            $result = mysqli_query($connect, $query); 

            $sql = mysql_query ("select * from projeto where cod_logradouro = '$cod2' " );

            $row = mysql_num_rows($sql);


                if (mysql_num_rows($sql) > 0)

                {
                    while ($dado = mysql_fetch_assoc($sql))
                    {
                        
                        $protocolo = $dado["protocolo"];
                        $trava = $dado["trava"];
                        $trava_por = $dado["trava_por"];
                        $cod_logradouro = $dado["cod_logradouro"];
                     
                    }
                
                }
                
                if($teste != 's')
              {
                if($trava == "S")
                {

                  echo "
                  <script language='JavaScript'>
                  window.alert('EM TRATATIVA POR $trava_por')
                  
                  </script>";

                  echo "<script language='JavaScript'>
                  window.location='pesq_logradouro.php'
                  </script>";

                  break;
                  
                }
                else
                {

                  $query = "update  projeto set trava = 'S', trava_por = '".$_SESSION['nome']."' where cod_logradouro = '$cod2'";
                  $sql = mysql_query($query);


                }
              }
       

?>


<!DOCTYPE html>

<html lang="en">
  <head>
  <title>Icomon</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> 
           
           
              
            
           
          
    <link rel="icon" href="img/icomon.png">

    <script type="text/javascript">
function fnExcelReport() {
    var tab_text = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
    tab_text = tab_text + '<head><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>';

    tab_text = tab_text + '<x:Name>Relatorio Caixa Fechada</x:Name>';

    tab_text = tab_text + '<x:WorksheetOptions><x:Panes></x:Panes></x:WorksheetOptions></x:ExcelWorksheet>';
    tab_text = tab_text + '</x:ExcelWorksheets></x:ExcelWorkbook></xml></head><body>';

    tab_text = tab_text + "<table border='1px'>";
    tab_text = tab_text + $('#myTable').html();
    tab_text = tab_text + '</table></body></html>';

    var data_type = 'data:application/vnd.ms-excel';
    
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");
    
    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
        if (window.navigator.msSaveBlob) {
            var blob = new Blob([tab_text], {
                type: "application/csv;charset=utf-8;"
            });
            navigator.msSaveBlob(blob, 'Test file.xls');
        }
    } else {
        $('#test').attr('href', data_type + ', ' + encodeURIComponent(tab_text));
        $('#test').attr('download', 'relatorio.xls');
    }

}





</script> 
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
    <title>Gerencia de Materiais</title>
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
          <p class="app-sidebar__user-designation"><?php echo $_SESSION['area'];?></p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="dashboard_pj.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i> Bootstrap Elements</a></li>
            <li><a class="treeview-item" href="https://fontawesome.com/v4.7.0/icons/" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Font Icons</a></li>
            <li><a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a></li>
            <li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a></li>
          </ul>
        </li>
         
        
        <li><a class="treeview-item" href="incluir_survey.php?cod=<?php echo $protocolo;?>"><i class="icon fa fa-circle-o"></i>Incluir Survey</a></li>
        <li><a class="app-menu__item " href="#" id="test" onClick="javascript:fnExcelReport();">  <i class="app-menu__icon fa fa-table"></i> </i><span class="app-menu__label"> Gerar Excel </span> </a> </li>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Logradouros</h1>
          
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tabelas</li>
          <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">

        
          <div class="tile">
          
          <div class="table-responsive">  
          
                     <table id="myTable" class="table table-striped table-bordered">  
                      
                      
                      <h6>Soma UM's:  <span class="badge badge-secondary"><?php echo $SomaUms;?></span></h6>
                      <h6>Survey Distintos:  <span class="badge badge-secondary"><?php echo $ContaSurveyDistintos;?></span></h6>
                          <thead>  
                               <tr>  
                                    <td>Código</td>
                                    <td>Status</td>
                                    <td>Rua</td> 
                                    <td>Nº fachada</td>
                                    <td>Quantidade de UMS</td>
                                    <td>Cód.Survey</td>  
                                    <td>Complemento 1</td>
                                    <td>Complemento 2</td>  
                                    <td>Complemento 3</td>
                                   
                                    
                                    
                                      
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  

                            $cadatro_status = $row["cadastro_status"];

                            if($cadatro_status == 'CONCLUIDO')
                            {
                              echo '  
                               <tr>  
                                    <td>'.$row["protocolo"].'</td>
                                    <td>'.$row["cadastro_status"].'</td>   
                                    <td>'.$row["logradouro"].'</td>
                                    <td>'.$row["num_fachada"].'</td>
                                    <td>'.$row["quantidade_ums"].'</td>
                                    <td>'.$row["cod_survey"].'</td>  
                                    <td>'.$row["comp1"].'</td>
                                    <td>'.$row["comp1"].'</td>
                                    <td>'.$row["comp3"].'</td>
                                 
                               </tr>  
                               ';  


                            }
                            else
                            {
                               echo '  
                               <tr>  
                                    <td><a href="editar_survey.php?cod='.$row["protocolo"].'"> '.$row["protocolo"].' </span></a></td>
                                    <td>'.$row["cadastro_status"].'</td>   
                                    <td>'.$row["logradouro"].'</td>
                                    <td>'.$row["num_fachada"].'</td>
                                    <td>'.$row["quantidade_ums"].'</td>
                                    <td>'.$row["cod_survey"].'</td>  
                                    <td>'.$row["comp1"].'</td>
                                    <td>'.$row["comp1"].'</td>
                                    <td>'.$row["comp3"].'</td>
                                   
                                    
                                    
                               </tr>  
                               ';  
                            }
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#myTable').DataTable(
        {
                   
          "scrollX": false,
    "ordering": true,
    "lengthMenu": [ [ -1, 10, 30, 50, 100], ["Todos", "10","30", "50", "100"] ],
    "scrollCollapse": true,
    
                    
                }



      );  
 });  
 </script>   