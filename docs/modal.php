<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> 
           <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
           
    <meta charset="UTF-8">
    <title>Document</title>

</head>
<body>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                <h4 class="modal-title">Materiais declarados</h4>
            </div>
            <div class="modal-body">
            <table class="table">
  <thead>
    <tr>
      <th scope="col">Descrição</th>
      <th scope="col">Quantidade</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      
      <td>Caixa </td>
      <td>2</td>
    
    </tr>
    <tr>
      
      <td>Caixa</td>
      <td>2</td>
     
    </tr>
    <tr>
      
      <td>Caixa</td>
      <td>2</td>
      
    </tr>
  </tbody>
</table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<button class="btn btn-primary" data-toggle="modal" data-target="#modal-mensagem">
Exibir mensagem
</button>
</body>
</html>