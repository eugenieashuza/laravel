@extends('templates.default_layout')
@section('content')


<div  class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

<ol class="breadcrumb">
    <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
    <li class="active">Membres</li>
</ol>


<div class="card-header row add-element-box bg-transparent ">

      <form method="post">
      <fieldset>
      <h3 class="text-white col-6 breadcrumb mb-0">Operations
      <a href="{{url('membres/create')}}" class="  add-element-item" data-toggle="tooltip" data-placement="right" title="Ajouter un membre">
          <i class="fa fa-plus"></i>
        </a>
        <a href="#" class=" add-element-item" data-toggle="tooltip" data-placement="right" title="Imprimer">
          <i class="fa fa-print"></i>
        </a>
      </h3>
       
        </fieldset>
        </form>  
    </div>

    <div class="table-responsive">
      <table class="table align-items-center table-sm table-dark table-flush">
        <thead class="thead-dark">
          <tr>
           
            <th scope="col">Numero</th>
            <th scope="col"> nom </th>           
            <th scope="col">prenom</th>
            <th scope="col"> age </th>
            <th scope="col">commune</th>
            <th scope="col">province</th>
            <th scope="col">sexe</th> 
            <th scope="col">mail</th>
            <th scope="col">Date d'enregistrement</th>
            <th scope="col">Action</th>
            
          </tr>
        </thead>
        <tbody>
        <?php  $i=1 ?>
            @foreach($membres as $membre)           
            <tr>
                <td><?= $i ?></td>
                <td>{{$membre->nom}}</td>
                <td>{{$membre->prenom}}</td>
                <td>{{$membre->age}}</td>
                <td>{{$membre->nomc}}</td>
                <td>{{$membre->nomp}}</td>
                <td>{{$membre->sexe}}</td> 
                <td>{{$membre->mail}}</td> 
                <td>{{$membre->created_at}}</td> 
                <td>                 
                    <a href="membres/edit/{{$membre->id}}" class="btn btn-primary">Edit</a>                   
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
     
      </table>
  
    </div>
 <!-- <div class="media align-items-center">
                  <a href="#" class="avatar rounded-circle mr-3">
                    <img alt="Profil"  class="img-design" src="./images/theme/encadreur/<?php // $Encad->avatarEncad ?>">
                  </a>
                  <div class="media-body">
                    <span><?php // //$Encad->NomEncad ?></span>
                  </div>
  </div> -->



 
@endsection()