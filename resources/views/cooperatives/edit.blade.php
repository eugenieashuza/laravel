@extends('templates.default_layout')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Modifier Cooperative</li>
        </ol>
    </div>
    <!--/.row-->
  <br><br>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">

        <div class="col-xl-8  edit-prifile order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                
              </div>
            </div>
            <div class="col-lg-1"></div>
          <div class="card-body col-lg-10 bg-teal">
            
                <h6 class="heading-small text-muted mb-4"> information</h6>
                <div class="pl-lg-4">
                  <div class="form-row">
                  <div class="form-group  @if($errors->get('actif')) has-error @endif">
                  <form action="/cooperatives/{{$cooperative->id}}"  method="POST" enctype="multipart/form-data"> 
                  @csrf
                   @method('PUT')
                  <div class=" col col-lg-6">
                      <div class="form-group  @if($errors->get('nom')) has-error @endif">
                        <label class="form-control-label" for="mail">nom</label>
                        <input type="text" class="form-control form-control-alternative" value="{{$cooperative->nom}}" name="nom">
                        @if($errors->get('nom'))
                           @foreach($errors->get('nom') as $message)
                              <h5>{{$message}}</h5>
                            @endforeach
                        @endif
                      </div>
                    </div>
                  <div class=" col col-lg-6">
                      <div class="form-group  @if($errors->get('statut')) has-error @endif">
                        <label class="form-control-label" for="statut">Statut</label>
                        <input type="file" name="statut" value="{{$cooperative->statut}}">
                        @if($errors->get('statut'))
                           @foreach($errors->get('statut') as $message)
                              <h5>{{$message}}</h5>
                            @endforeach
                        @endif
                      </div>
                    </div>
                    <div class="col col-lg-6">
                      <div class="form-group  @if($errors->get('mail')) has-error @endif">
                        <label class="form-control-label" for="mail">mail</label>
                        <input type="mail" class="form-control form-control-alternative" value="{{$cooperative->mail}}" name="mail">
                        @if($errors->get('mail'))
                           @foreach($errors->get('mail') as $message)
                              <h5>{{$message}}</h5>
                            @endforeach
                        @endif
                      </div>
                    </div>
                    <div class="col col-lg-6">
                      <div class="form-group ">
                        <label class="form-control-label" for="phone">id de l'enregistreur</label>
                        <input type="text" class="form-control form-control-alternative" readonly name="idutil" size="30" value="{{ Auth::user()->id }}" >
                      </div>
                    </div>
                    
                    <div class=" col col-lg-6">
                      <div class="form-group  @if($errors->get('telephone')) has-error @endif">
                        <label class="form-control-label" for="phone">telephone</label>
                        <input type="text" class="form-control form-control-alternative" value="{{$cooperative->telephone}}" name="phone">
                        @if($errors->get('telephone'))
                           @foreach($errors->get('telephone') as $message)
                              <h5>{{$message}}</h5>
                            @endforeach
                        @endif
                      </div>
                    </div>
                    
                    <div class=" col col-lg-6">
                       <div class="form-group  @if($errors->get('actif')) has-error @endif">
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
                          <a href="#" class="btn btn-primary">Ajouter une Commune</a>
                        </div>
                    </div>
                 </div>
                
                 <div class=" col col-lg-6">
                    <div class="form-group  @if($errors->get('actif')) has-error @endif">                  
                         <span class="input-group-text">Etat de la cooperative:&nbsp&nbsp</span>
                         @if($cooperative->etat_cooperative == 1)
                      <input type="radio" name="actif"  checked="true" value="1">
                          <label for="gender">Actif</label>
                          <input type="radio" name="actif" checked=""  value="0">
                          <label for="gender-f">Non Actif</label>
                          @else
                          <input type="radio" name="actif"  checked="" value="1">
                          <label for="gender">Actif</label>
                          <input type="radio" name="actif" checked="true"  value="0">
                          <label for="gender-f">Non Actif</label>
                          @endif 
                          @if($errors->get('actif'))
                           @foreach($errors->get('actif') as $message)
                              <h5>{{$message}}</h5>
                            @endforeach
                        @endif                
                      </div>
                    </div>
                </div>

                <div class=" col col-lg-9">
                <button class="btn btn-primary" type="submit">Modify</button>
                <button class="btn btn-default" type="reset">Reset</button> 
                </div>
                             
              </form>
            </div>
          </div>
        </div>
 </div>