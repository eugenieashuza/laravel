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
  <h3>Les membres</h3>
    <table class="table table-bordered " style="border:solid 2px black;">
    <thead>
      <tr class="table-danger">
           <td>Numero</td>
            <td> nom </td>           
            <td>prenom</td>
            <td> age </td>
            <td>commune</td>
            <td>province</td>
            <td>sexe</td> 
            <td>mail</td>
            <td>Date d'enregistrement</td>
            
          </tr>
        </thead>
        <tbody>
        <?php  $i=1 ?>
            @foreach($membre as $data)           
            <tr>
                <td><?= $i ?></td>
                <td>{{$data->nom}}</td>
                <td>{{$data->prenom}}</td>
                <td>{{$data->age}}</td>
                <td>{{$data->nomc}}</td>
                <td>{{$data->nomp}}</td>
                <td>{{$data->sexe}}</td> 
                <td>{{$data->mail}}</td> 
                <td>{{$data->created_at}}</td> 
            </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
    </table>
  </body>
</html>