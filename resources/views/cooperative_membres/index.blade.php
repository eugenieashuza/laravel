@extends('templates.default_layout')
@section('content')


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Cooperatives et Leurs Membres</li>
         </ol>
        </div>
        
    
     
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
              <a href="{{url('cooperative_membres/create')}}" class="  add-element-item" data-toggle="tooltip" data-placement="right" title="Assossier ">
                  <i class="fa fa-plus"></i>
                </a>
                <a href="{{ URL::to('cooperative_membres/pdf') }}" class=" add-element-item" data-toggle="tooltip" data-placement="right" title="Exporter en PDF">
                    <i class="fa fa-print"></i>
                 </a>
              </h3>
               
                </fieldset>
                </form>  
            </div>  
     <form action="#" class="d-flex mr-3">
        <br><br>
             <div class="input-group custom-search-form navbar-right col-lg-2">
                   <input type="text" class="search_btn" name="q" placeholder="Search..." value="{{ request()->q ?? '' }}">
                   <span class="input-group-btn  ">
                        <button class="btn bg-teal search_btn" type="submit">
                            <em class="fa fa-search"> </em>
                        </button>
                   </span>
            </div>
            <br><br>
    </form>  
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
                          
                            <form action="cooperative_membres/destroycooperative_membre/{{$cooperative_membre->id}}"" method="post">                
                            <a href="cooperative_membres/edit/{{$cooperative_membre->id}}"  title="Editer"><i class="fa fa-edit"></i></a>                        
                                    @csrf
                                    <button type="submit" onclick="return confirm('do you want to delete this associate ?')" class="btn btn-danger  btn-xs" title="Delete"><i class="fa  fa-trash-o"></i></button>
                                </form>  
                        </td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach
                </tbody>
             
              </table>
              <div class="text-center">{{$cooperative_membres->links()}}</div>
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