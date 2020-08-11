@extends('templates.default_layout')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Assossier un membre à une cooperative</li>
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
                  <div class="form-group">
                  <form action="{{url('cooperative_membres')}}"  method="POST" enctype="multipart/form-data"> 
                  @csrf
                  <div class="col col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="mail">Date d'adesion</label>
                        <input type="date" class="form-control form-control-alternative"  name="date_adesion">
                      </div>
                    </div>
                  <div class="col col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="statut">montant versé</label>
                        <input type="text" class="form-control form-control-alternative" placeholder="montant" name="montant">
                      </div>
                    </div>
                    <div class="col col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="mail">categorie Membre</label>
                        <input type="mail" class="form-control form-control-alternative" placeholder="categorie" name="categorie">
                      </div>
                    </div>
                    <div class="col col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="phone">Date de sortie</label>
                        <input type="date" class="form-control form-control-alternative" placeholder="Numero" name="sortie">
                      </div>
                    </div>
                    <div class="col col-lg-6">
                       <div class="form-group">
                         <label for="membre_id">Membre</label>
                         <select name="membre" id="" class="form-control" 
                               class="@error('membre') is-danger @enderror">
                                <option value="">Select membre</option>
                                   @foreach($membres as $membre)
                                <option value="{{$membre->id}}">{{$membre->nom}}</option>
                               @endforeach
                                @error('membre')
                            <div class="alert alert-danger">{{$message}}</div>
                             @enderror
                          </select>                         
                          <a href="{{url('membres/create')}}" class="btn btn-primary">Ajouter un membre</a>
                        </div>
                    </div>
                 </div>
                    
                    <div class="col col-lg-6">
                       <div class="form-group">
                         <label for="cooperative">cooperative</label>
                         <select name="cooperative" id="" class="form-control" 
                               class="@error('cooperative') is-danger @enderror">
                                <option value="">Select cooperative</option>
                                   @foreach($cooperatives as $cooperative)
                                <option value="{{$cooperative->id}}">{{$cooperative->nom}}</option>
                               @endforeach
                                @error('cooperative')
                            <div class="alert alert-danger">{{$message}}</div>
                             @enderror
                          </select>                         
                          <a href="{{url('cooperatives/create')}}" class="btn btn-primary">Ajouter une cooperative</a>
                        </div>
                    </div>
                 </div>
                
                 <div class="col col-lg-6">
                    <div class="form-group">                  
                         <span class="input-group-text">Etat du membre:&nbsp&nbsp</span>
                          <input type="radio" name="etat" value="1">
                          <label for="">Actif</label>                      
                          <input type="radio" name="etat" value="0">
                          <label for="">Non Actif</label>
                      </div>
                    </div>
                </div>

                <div class="col-lg-9">
                <button class="btn btn-primary" type="submit">Save</button>
                <button class="btn btn-default" type="reset">Reset</button>
                </div>
                             
              </form>
            </div>
          </div>
        </div>
 </div>
                    
                 
                 
          </div>
  
@endsection()