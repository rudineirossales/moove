<?php 
         include "conn.php"; 
      
         session_start();

         if(!isset($_SESSION["login"]) &&  !isset($_SESSION["senha"])  || ($_SESSION["acesso"] != 'ADM' ) AND ($_SESSION["acesso"] != 'GA' ) )
            {
                 header("Location: index.html");
                  exit;
            }

            $connect = mysqli_connect("185.213.81.103", "u504529778_icomon_", "Rud!n3!@", "u504529778_icomon_");  

            
            $query ="SELECT * FROM atividade_bbk join usuario on id_usu = usuario.id and status <> 'ENCERRADO' order by data_vencimento desc;";   
           
             
            $result = mysqli_query($connect, $query); 

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
    <title>BA97</title>
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
    <header class="app-header"><a class="app-header__logo" href="dashboard_bbk.php">Icomon</a>
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
        <li><a class="app-menu__item active" href="dashboard_bbk.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        
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
          <h1><i class="fa fa-th-list"></i> Esteira de atividade com status em aberto</h1>
          
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
          
          <div class="table-responsive" >  
                     <table  id="myTable" class="table table-striped table-bordered" >  
                          <thead >  
                               <tr  > 
                                    <th>Ba</th>  
                                    <th>Uf</td>  
                                    <th>Localidade</td> 
                                    <th>Estação</th>  
                                    <th >Endereço</th>  
                                     
                                    <th>Tipo</th>  
                                    <th>Técnico</th>  
                                    <th>Status</th>  
                                    <th >Data abertura</th>  
                                    <th>Data vencimento</th> 
                                    <th>Despachado por</th>  
                                    <th>Data despacho</th> 
                                    <th>Atribuído:</th>
                                    <th>Validado por</th>  
                                    <th>Data Validação</th>  
                                     
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr > 
                               <td>'.$row["ba"].'</td> 
                               <td>'.$row["uf"].'</td>  
                               <td>'.$row["localidade"].'</td>
                               <td>'.$row["estacao_a"].'</td>  
                               <td>'.$row["endereco"].'</td>  
                              
                               <td>'.$row["tipo"].'</td>  
                               <td>'.$row["nome"].'</td> 
                               <td>'.$row["status"].'</td>  
                               <td style="min-width: 150px;" >'.$row["data_abertura"].'</td>  
                               <td style="min-width: 150px;">'.$row["data_vencimento"].'</td>  
                               <td style="min-width: 150px;">'.$row["nome_despacho"].'</td>  
                               <td style="min-width: 150px;">'.$row["data_despacho"].'</td>
                               <td style="min-width: 150px;">'.$row["data_atribuicao"].'</td> 
                               <td style="min-width: 150px;">'.$row["nome_validacao"].'</td>  
                               <td style="min-width: 150px;">'.$row["data_validacao"].'</td>
                                  
                                    
                               </tr>  
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
      $('#myTable').DataTable();  
 });  
 </script>  
 <script src="js/main.js"></script>