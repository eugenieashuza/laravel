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
        <a href="{{ URL::to('membres/pdf') }}" class="  add-element-item" data-toggle="tooltip" data-placement="right" title="Exporter en PDF">
        <i class="fa fa-print"></i>
        </a>
        <a href="#formulaire" data-toggle="modal" data-target="#formulaire" class="add-element-item" data-toggle="tooltip" data-placement="right" title="Enregistrer une province">
        <i class="fa fa-user"></i>
        </a>
      </h3>
       
        </fieldset>
        </form>  
    </div>
    <form action="{{route('membres.search')}}" class="d-flex mr-3">
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
      <div class="text-center">{{$membres->links()}}</div>
    </div>

 
    <div class="modal fade" id="formulaire">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Enregistrement  du membre</h4>           
            <button type="button" class="close" data-dismiss="modal">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body row">
          <form action="{{url('membres')}}"  method="POST" enctype="multipart/form-data"> 
                  @csrf
                  <div class="col col-lg-6">
                      <div class="form-group  @if($errors->get('nom')) has-error @endif">
                        <label class="form-control-label" for="mail">nom</label>
                        <input type="text" class="form-control form-control-alternative" placeholder="nom" name="nom" size="30">
                        @if($errors->get('nom'))
                           @foreach($errors->get('nom') as $message)
                              <h5>{{$message}}</h5>
                            @endforeach
                        @endif
                      </div>
                    </div>
                    <div class="col col-lg-6">
                      <div class="form-group  @if($errors->get('prenom')) has-error @endif">
                        <label class="form-control-label" for="mail">prenom</label>
                        <input type="text" class="form-control form-control-alternative" placeholder="prenom" name="prenom" size="30">
                        @if($errors->get('prenom'))
                           @foreach($errors->get('prenom') as $message)
                              <h5>{{$message}}</h5>
                            @endforeach
                        @endif
                      </div>
                    </div>
                    <div class="col col-lg-6">
                      <div class="form-group  @if($errors->get('mail')) has-error @endif">
                        <label class="form-control-label" for="mail">mail</label>
                        <input type="mail" class="form-control form-control-alternative" placeholder="mail" name="mail" size="30">
                        @if($errors->get('mail'))
                           @foreach($errors->get('mail') as $message)
                              <h5>{{$message}}</h5>
                            @endforeach
                        @endif
                      </div>
                    </div>
                    <div class="col col-lg-6">
                      <div class="form-group  @if($errors->get('age')) has-error @endif">
                        <label class="form-control-label" for="phone">age</label>
                        <input type="text" class="form-control form-control-alternative" placeholder="age" name="age" size="30" >
                        @if($errors->get('age'))
                           @foreach($errors->get('age') as $message)
                              <h5>{{$message}}</h5>
                            @endforeach
                        @endif
                      </div>
                    </div>
                    <div class="col col-lg-6">
                      <div class="form-group ">
                        <label class="form-control-label" for="phone">nom de l'enregistreur</label>
                        <input type="text" class="form-control form-control-alternative" placeholder="{{ Auth::user()->name }}" readonly name="idutil" size="30" value="{{ Auth::user()->id }}" >
                      </div>
                    </div>
                    
                    <div class="col col-lg-6">
                       <div class="form-group  @if($errors->get('commune')) has-error @endif">
                         <label for="communes_nom">commune</label>
                         <select name="communes_id" id="" class="form-control" 
                               class="@error('communes_id') is-danger @enderror">
                                <option value="">Select commune</option>
                                   @foreach($communes as $commune)
                                <option value="{{$commune->id}}">{{$commune->nom}}</option>
                               @endforeach
                                @error('communes_id')
                            <div class="alert alert-danger">{{$message}}</div>
                             @enderror
                          </select>                         
                          <a href="{{url('communes/create')}}" class="btn btn-primary">Ajouter une Commune</a>
                        </div>
                     </div>
 
                 <div class="col col-lg-6">
                    <div class="form-group  @if($errors->get('gender')) has-error @endif">                                    
                         <span class="input-group-text">Sexe</span>
                          <input type="radio" name="gender" value="Feminin">
                          <label for="gender">Feminin</label>                      
                          <input type="radio" name="gender" value="Masculin">
                          <label for="gender-f">Masculin</label>
                          @if($errors->get('gender'))
                           @foreach($errors->get('gender') as $message)
                              <h5>{{$message}}</h5>
                            @endforeach
                        @endif
                      </div>

                   <button class="btn btn-primary" type="submit">Save</button>
                  <button class="btn btn-default" type="reset">Reset</button>      
                </div>
                    <br>   
              </form>
          </div>
        </div>
      </div>
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