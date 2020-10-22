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
  <h3>Les Cooperatives</h3>
    <table class="table table-bordered ">
    <thead>
      <tr class="table-danger ">
                    <td>Numero</td>
                    <td>Nom</td>
                    <td>Mail</td>
                    <td>tel</td>
                    <td>Etat</td>
                    <td>Date d'enregistrement</td>
                    <td>commune</td>
                    <td>province</td>                   
                  </tr>
                </thead>
                <tbody>
                <?php $i=1 ?>
                    @foreach($cooperative as $data )
                    
                    <tr class="">
                        <td><?= $i ?></td>
                        <td>{{$data->nom}}</td>
                        <td>{{$data->mail}}</td>
                        <td>{{$data->telephone}}</td>
                        <td>
                        @if($data->etat_cooperative == 1)
                       
                          Actif
                        @else
                           NonActif
                        @endif
                        </td>
                        <td>{{$data->created_at}}</td>
                        <td>{{$data->nomc}}</td>
                        <td>{{$data->nomp}}</td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach
                </tbody>
    </table>
  </body>
</html>