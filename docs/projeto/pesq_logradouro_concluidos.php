<?php 
         include "conn.php"; 
      
         session_start();

         if(!isset($_SESSION["login"]) &&  !isset($_SESSION["senha"]) )
            {
                 header("Location: index.html");
                  exit;
            }

            $cod = $_GET["cod"];
            $protocolo = $_GET["protocolo"];

            $connect = mysqli_connect("62.72.63.187", "remoteicomon", "Rud!n3!@", "projeto");    
            $query ="select check_,cadastro_status,protocolo,logradouro,num_fachada,comp1,comp2,comp3,cod_survey from projeto where cod_logradouro = '$cod' and cadastro_status = 'CONCLUIDO'  order by num_fachada ";  
            $result = mysqli_query($connect, $query); 
?>


<!DOCTYPE html>

<html lang="en">
  <head>
  <title>Icomon</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> 
          
           <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
           
           
           
              
            
           
          
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
                          <thead>  
                               <tr> 
                                    <td>Check</td>
                                    <td>Código</td>
                                    <td>Status</td>
                                    <td>Rua</td> 
                                    <td>Nº fachada</td>
                                    <td>Quantidade UMS</td>
                                    <td>Cód.Survey</td>  
                                    <td>Complemento 1</td>
                                    <td>Complemento 2</td>  
                                    <td>Complemento 3</td>
                                    <td>Check</td> 
                                    
                                    
                                    
                                           
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                                          
                                           $protocolo = $row["protocolo"];
                                           $check = $row["check_"];

                                           if($check == "check")
                                           { 
                                            $mostrar = '<i class="fa fa-check" style="font-size:24px;color:green"></i>';
                                           }
                                           else
                                           { 
                                            $mostrar = '<i class="fa fa-close" style="font-size:24px;color:red"></i></i>';
                                           }
                              echo '  
                               <tr>  
                                    <td>'.$mostrar.'</i></td>  
                                    <td>'.$row["protocolo"].'</td>
                                    <td>'.$row["cadastro_status"].'</td>   
                                    <td>'.$row["logradouro"].'</td>
                                    <td>'.$row["num_fachada"].'</td>
                                    <td>'.$row["quantidade_ums"].'</td>
                                    <td>'.$row["cod_survey"].'</td>  
                                    <td>'.$row["comp1"].'</td>
                                    <td>'.$row["comp2"].'</td>
                                    <td>'.$row["comp3"].'</td>
                                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal'.$protocolo.'">
                                     Check
                                    </button></td>
                                
                               </tr>   

                               <!-- Modal -->
                              <div class="modal fade" id="exampleModal'.$protocolo.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Deseja validar?</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form  method="post"  action="pesq_logradouro_concluidos.php">

                                        <input class="form-control"  name="protocolo"  value="'.$protocolo.'" type="hidden" aria-describedby="emailHelp" >
                                        <input class="form-control"  name="cod"  value="'.$cod.'" type="hidden" aria-describedby="emailHelp" >

                                      
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
                                      <button type="submit" name="submit" class="btn btn-primary">OK</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                               ';  

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

<?php
if (isset($_POST ['submit']) )
{
  

  $protocolo  =$_POST['protocolo'];
  $cod  =$_POST['cod'];

          $query = "update projeto set check_ = 'check' where protocolo = '$protocolo'";
  
          $sql = mysql_query($query);
  
  
  
  
        if($sql)
        {
  
          echo "
          <script language='JavaScript'>
          window.alert('EDITADO SUCESSO!')
          
          </script>";

          echo "<script language='JavaScript'>
          window.location='pesq_logradouro_concluidos.php?cod=".$cod."'
          </script>";
  
         
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
