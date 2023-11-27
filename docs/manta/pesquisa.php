<?php 
         include "../conn.php"; 
      
         session_start();

        

            $connect = mysqli_connect("62.72.63.187", "remoteicomon", "Rud!n3!@", "icomon");  
            
?>


<!DOCTYPE html>
<html lang="en">
  <head>
      
       <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
    <link rel="stylesheet" type="text/css" href="../css/main.css">
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
        <li><a class="app-menu__item active" <?php if ($_SESSION["acesso"] == "Tec"){ echo 'href="index_col.html"';} else {echo 'href="dashboard.php"'; } ?>><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        
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
          <h1><i class="fa fa-th-list"></i> Pesquisa de Mantas aplicadas</h1>
          
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
          <form class="form-inline" role="form"   method="POST" action="pesquisa.php" style="margin-left:10%;">
    <div class="form-group">
   

    </div>
     
    <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 

<!--Font Awesome (added because you use icons in your prepend/append)-->
<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;} </style>

<!-- HTML Form (wrapped in a .bootstrap-iso div) -->
<div style="float:left;" class="bootstrap-iso">
  
  <div class="row">
   <label  for="data">
      Período
      </label>
    
     <div class="form-group ">
      
      <div class="col-sm-4">
       <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
        <input class="form-control" id="date" name="date" placeholder="DE" type="text" autocomplete="off" />
        <input class="form-control" id="date2" name="date2" placeholder="ATÉ" type="text" autocomplete="off" />
       </div>
      </div>
      
    <button type="submit"  name="submit" id="submit" class="btn btn-primary">Busca</button> 
     </div>
    
  
   
  </div>

</div>


<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->


<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
 $(document).ready(function(){
  var date_input=$('input[name="date"]'); //our date input has the name "date"
  var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
  date_input.datepicker({
   format: 'yyyy-mm-dd',
   container: container,
   todayHighlight: true,
   autoclose: true,
  })
 })
</script>
<script>
 $(document).ready(function(){
  var date_input=$('input[name="date2"]'); //our date input has the name "date"
  var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
  date_input.datepicker({
   format: 'yyyy-mm-dd',
   container: container,
   todayHighlight: true,
   autoclose: true,
  })
 })
</script>

    <br>


  


    
  </form>
          
          <div class="table-responsive">  
          
                     <table id="myTable" class="table table-striped table-bordered">  
                          <thead>  
                               <tr> 
                                    <td>Protocolo</td>
                                    <td>Cidade</td>  
                                    <td>Estacao</td> 
                                    <td>Bairro</td> 
                                    <td>Endereco</td>  
                                    <td>data</td> 
                                    <td>Tipo</td> 
                                    <td>Cabo</td>
                                    <td>Rede</td>
                                    <td>Mantas</td>
                                    <td>Espiral</td>
                                    <td>Plaquetas</td>
                                    <td>Reserva Técnica</td>
                                    <td>Pdf</td>
                                    <td>Mapa</td>
                                    
                                        
                               </tr>  
                          </thead> 
                          
                          
                          <?php  

                            if (isset($_POST ['submit']) )
                            {
                            
                            $data= $_POST['date'];
                            $data2 = $_POST['date2'];
                            
                              ?>
                           <a target="_blank" href='pdf_geral.php?data=<?php echo $data ?>&data2=<?php echo $data2 ?>'><i class='icon fa fa-folder-open-o'></i> Download Pdf Geral </a><br><br>
                           <?php
                          
                       
                           
                            $query ="select *  from mantas  where data BETWEEN '$data' and '$data2'";
                           
                            $result = mysqli_query($connect, $query); 
                            
                          
                          while($row = mysqli_fetch_array($result))  
                          {     
                                    $id = $row["id"]; 
                                    $lat = $row["latitude"];
                                    $log = $row["longitude"];
                               echo '  
                               <tr> 
                               <td>'.utf8_encode($row["id"]).'</td>
                               <td>'.utf8_encode($row["cidade"]).'</td>
                               <td>'.utf8_encode($row["estacao"]).'</td> 
                               <td>'.utf8_encode($row["bairro"]).'</td>  
                               <td>'.utf8_encode($row["endereco"]).'</td>  
                               <td>'.utf8_encode($row["data"]).'</td> 
                               <td>'.utf8_encode($row["tipo"]).'</td> 
                               <td>'.utf8_encode($row["cabo"]).'</td> 
                               <td>'.utf8_encode($row["tipo_rede"]).'</td> 
                               <td>'.utf8_encode($row["mantas"]).'</td>
                               <td>'.utf8_encode($row["espiral"]).'</td> 
                               <td>'.utf8_encode($row["plaquetas"]).'</td>  
                              
                               <td>'.utf8_encode($row["reserva_tecnica"]).' ';?> </td> 
                               
                              
                               <td><a style='padding-left:25%;' target="_blank" href='pdf.php?protocolo=<?php echo $id; ?>'><i class='icon fa fa-folder-open-o'></i></a></td>
                               <td> <a href="https://www.google.com.br/maps/search/<?php echo $lat ?>,<?php echo  $log ?>/@<?php echo $lat ?>,<?php echo  $log  ?>" target="_blank"  role="button" aria-pressed="true"><i class='icon fa fa-map-marker'></i></a></td>
                               
                               
                                  
                                    
                                    
                               </tr>  
                               <?php
                          }  }
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