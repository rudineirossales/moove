<?php 
         include "conn.php"; 
      
         session_start();

         if(!isset($_SESSION["login"]) &&  !isset($_SESSION["senha"]) )
            {
                 header("Location: index.html");
                  exit;
            }

           $connect = mysqli_connect("62.72.63.187", "remoteicomon", "Rud!n3!@", "hc"); 
            $query ="SELECT * FROM reparo_hc where status = '' and contador = ''  and funcionalidade <> 'SEM RETORNO'  ";  
            $result = mysqli_query($connect, $query); 
            
            $hoje = date('Y-m-d');
            
            $sql = mysql_query ("SELECT * FROM reparo_hc where status = '' and contador = ''  and funcionalidade <> 'SEM RETORNO'");
            $contaValidacao = mysql_num_rows($sql);
            mysql_close($connection);
           
        
?>


<!DOCTYPE html>
<html lang="en">
  <head>
  <title>BA's em triagem</title>  
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
        <li><a class="app-menu__item active" href="dashboard_hc.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        
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
          <h1><i class="fa fa-th-list"></i> Caixa de atividades.</h1>
          
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
          <span class="badge badge-pill badge-success">  <?php echo $contaValidacao;?>  </span>
                     <table id="myTable" class="table table-striped table-bordered">  
                          <thead>  
                               <tr> 
                                    <th>Uf</th>
                                    <th>Sa</th> 
                                    <th>Data Execução</th>  
                                    <th>Companhia</th>  
                                    <th>Cliente</th>
                                    <th>Contato</th>
                                    <th>Técnico</th> 
                                    <th>Macro</th> 
                                    
                                    <th>Liberar SA</th> 
                                       
                               </tr>  
                          </thead> 
                          
                          <?php  
                          $tr = '';
                          while($row = mysqli_fetch_array($result))  
                          {    
                                $contador = $row["contador"];
                                $funcionalidade = $row["funcionalidade"];
                                $data = $row["data_execucao"];
                                $qtdDias = 1;
                                $cliente = $row["cliente"];
                                $primeiroNome = explode(" ", $cliente);
                     
                                $reteste = date('Y-m-d', strtotime("+{$qtdDias} days",strtotime($data)));
                                
                                
                               
                                if($reteste == $hoje or $reteste < $hoje and $contador == ''){
                                    
                               echo ' 
                               
                               <tr >  
                                    <td >'.$row["uf"].'</td> 
                                    <td><a href="cadastro_hc.php?sa='.$row["sa"].'"> '.$row["sa"].' </span></a></td>   
                                    <td>'.$row["data_execucao"].'</td>
                                    <td>'.$row["companhia"].'</td> 
                                    <td>'.$primeiroNome[0].'</td>
                                    <td>'.$row["contato"].'</td>
                                    <td>'.$row["tecnico"].'</td> 
                                    <td>'.$row["macro"].'</td> 
                                    
                                    <td> <a style="color:black;" href="liberar_sa.php?sa='.$row["sa"].'"   role="button" aria-pressed="true"><i style="padding-left:40%;" class="fa fa-solid fa-key   fa-lg"></i></a></td>
                                  
                               </tr>  
                               
                               
                               ';  
                          } } 
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
 
 <script src="js/main.js"></script>