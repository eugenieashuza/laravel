@extends('templates.default_layout')
@section('content')


  <div  class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Cooperatives</li>
        </ol>
    
     
      <div class="card-header row add-element-box bg-transparent ">
      <div class=" alert-box success  bg_width "> 
          @if (Session::has('flash_message'))
          <h4 class="text-center  breadcrumb  bg_width"> 
            {{ Session::get('flash_message') }}  </h4>
           @endif
    </div> 

              <form method="post">
              <fieldset>
              <h3 class="text-white col-6 breadcrumb mb-0">Options
              <a href="{{url('cooperatives/create')}}" class="  add-element-item" data-toggle="tooltip" data-placement="right" title="Ajouter une cooperative">
                  <i class="fa fa-plus"></i>
                </a>
                <a href="{{ URL::to('cooperatives/recherche/pdf') }}" class=" add-element-item" data-toggle="tooltip" data-placement="right" title="Exporter en PDF">
                   <i class="fa fa-print"></i>
                </a>
              </h3>
               
                </fieldset>
                </form>  
            </div>
          @include('cooperatives/recherche.search')
     
            <div class="table-responsive">
              <table class="table align-items-center table-sm table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Numero</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Mail</th>
                    <th scope="col">tel</th>
                    <th scope="col">Etat</th>
                    <th scope="col">Date d'enregistrement</th>
                    <th scope="col">commune</th>
                    <th scope="col">province</th>                  
                    <th scope="col">action</th>
                    
                  </tr>
                </thead>
                <tbody>
                <?php $i=1 ?>
                    @foreach($cooperatives as $cooperative )
                    
                    <tr>
                        <td><?= $i ?></td>
                        <td>{{$cooperative->nom}}</td>
                        <td>{{$cooperative->mail}}</td>
                        <td>{{$cooperative->telephone}}</td>
                        <td>
                        @if($cooperative->etat_cooperative == 1)
                       
                          Actif
                        @else
                           NonActif
                        @endif
                        </td>
                        <td>{{$cooperative->created_at}}</td>
                        <td>{{$cooperative->nomc}}</td>
                        <td>{{$cooperative->nomp}}</td>
                      
                       
                        <td>
    
                         <form action="communes/destroycooperative/{{$cooperative->id}}" method="post">  
                            <a href="cooperatives/{{$cooperative->id}}" class="btn btn-primary"title="Show statut"><i class="fa fa-eye"></i></a>
                            <a href="cooperatives/download/{{$cooperative->statut}}" class="btn btn-warning" title="Downloard statut"><i class="fa  fa-download"></i></a> 
                            <a href="cooperatives/edit/{{$cooperative->id}}" class="btn btn-primary"title="Edit statut"><i class="fa fa-edit"></i></a>             
                                        
                                    @csrf
                                    <button type="submit" onclick="return confirm('do you want to delete this cooperative ?')" class="btn btn-danger  btn-xs" title="Delete"><i class="fa  fa-trash-o"></i></button>
                                </form>  
                            
                        </td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach
                </tbody>
             
              </table>
              <div class="text-center">{{$cooperatives->links()}}</div>
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