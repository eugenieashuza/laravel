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
    <h3>Les cooperatives et leurs membres</h3>
    <table class="table table-bordered">
    <thead>
      <tr class="table-danger">
                    <td>Numero</td>
                    <td>Nom cooperative</td>
                    <td>Nom Membre</td>            
                    <td>Devis en $</td>
                    <td>Date d'adesion</td>
                    <td>Etat Membre</td>
                    <td>Categorie Membre</td>
      </tr>
      </thead>
      <tbody>
                <?php $i=1 ?>
                    @foreach($cooperative_membre as $data)

                    <tr>
                        <td><?= $i ?></td>
                        <td>{{$data->nomc}}</td>
                        <td>{{$data->nom}}</td>
                        <td>{{$data->montant}}</td>
                        <td>{{$data->date_adesion}}</td>
                        <td>
                        @if($data->etat_membre == 1)
                       
                          Actif
                        @else
                           NonActif
                        @endif
                        </td>
                        
                        <td>{{$data->categorie_membre}}</td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach
                </tbody>
    </table>
  </body>
</html>