<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Demo in Laravel 7</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>
   <h3>Les Communes</h3>
    <table class="table table-bordered">
    <thead>
      <tr class="table-danger">
        <td>Numero</td>
        <td>Nom Commune</td>
        <td>Nom Province</td>
      </tr>
      </thead>
      <?php  $i=1 ?>
            @foreach($commune as $data)           
            <tr>
                <td><?= $i ?></td>
                <td>{{$data->nom}}</td>
                <td>{{$data->province}}</td>          
            </tr>
            <?php $i++ ?>
            @endforeach
    </table>
  </body>
</html>