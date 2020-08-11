@extends('templates.default_layout')
@section('content')


  <div  class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Cooperatives et Leurs Membres</li>
        </ol>
    
     
      <div class="card-header row add-element-box bg-transparent ">

              <form method="post">
              <fieldset>
              <h3 class="text-white col-6 breadcrumb mb-0">Operations
              <a href="{{url('cooperative_membres/create')}}" class="  add-element-item" data-toggle="tooltip" data-placement="right" title="Assossier ">
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
                    <th scope="col">Nom cooperative</th>
                    <th scope="col">Nom Membre</th>
                    <!-- <th scope="col">Pseudo</th> -->
                    <th scope="col">Devis en $</th>
                    <th scope="col">Date d'adesion</th>
                    <th scope="col">Etat Membre</th>
                    <th scope="col">Categorie Membre</th>
                    <th scope="col">Action</th>                                
                  </tr>
                </thead>
                <tbody>
                <?php $i=1 ?>
                    @foreach($cooperative_membres as $cooperative_membre )

                    <tr>
                        <td><?= $i ?></td>
                        <td>{{$cooperative_membre->nomc}}</td>
                        <td>{{$cooperative_membre->nom}}</td>
                        <td>{{$cooperative_membre->montant}}</td>
                        <td>{{$cooperative_membre->date_adesion}}</td>
                        <td>
                        @if($cooperative_membre->etat_membre == 1)
                       
                          Actif
                        @else
                           NonActif
                        @endif
                        </td>
                        
                        <td>{{$cooperative_membre->categorie_membre}}</td>
                     
                      
                       
                        <td>     
                            <a href="cooperative_membres/edit/{{$cooperative_membre->id}}" class="btn btn-primary">Edit</a>
                            
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