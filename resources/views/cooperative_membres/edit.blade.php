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
              <div class="form-group">
              <form action="/cooperative_membres/{{$cooperative_membre->id}}"  method="POST" enctype="multipart/form-data"> 
              @csrf
              @method('PUT')

              <div class="col col-lg-6">
                  <div class="form-group  @if($errors->get('date_adesion')) has-error @endif ">
                    <label class="form-control-label" for="mail">Date d'adesion</label>
                    <input type="date" class="form-control form-control-alternative"  name="date_adesion" value="{{$cooperative_membre->date_adesion}}">
                    @if($errors->get('date_adesion'))
                           @foreach($errors->get('date_adesion') as $message)
                              <h5>{{$message}}</h5>
                            @endforeach
                        @endif 
                  </div>
                </div>
              <div class="col col-lg-6">
                  <div class="form-group  @if($errors->get('montant')) has-error @endif">
                    <label class="form-control-label" for="statut">montant versé</label>
                    <input type="text" class="form-control form-control-alternative" placeholder="montant" name="montant" value="{{$cooperative_membre->montant}}">
                    @if($errors->get('montant'))
                           @foreach($errors->get('montant') as $message)
                              <h5>{{$message}}</h5>
                            @endforeach
                        @endif 
                  </div>
                </div>
                <div class="col col-lg-6">
                  <div class="form-group  @if($errors->get('categorie')) has-error @endif">
                    <label class="form-control-label" for="mail">categorie Membre</label>
                    <input type="mail" class="form-control form-control-alternative" placeholder="categorie" name="categorie" value="{{$cooperative_membre->categorie_membre}}">
                    @if($errors->get('categorie'))
                           @foreach($errors->get('categorie') as $message)
                              <h5>{{$message}}</h5>
                            @endforeach
                        @endif
                  </div>
                </div>
                <div class="col col-lg-6">
                  <div class="form-group  ">
                    <label class="form-control-label" for="phone">Date de sortie</label>
                    <input type="date" class="form-control form-control-alternative" placeholder="Numero" name="sortie" value="{{$cooperative_membre->date_de_sortie}}">
                   
                  </div>
                </div>
                <div class="col col-lg-6">
                   <div class="form-group  @if($errors->get('membre')) has-error @endif">
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
                   <div class="form-group  @if($errors->get('cooperative')) has-error @endif">
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
                <div class="form-group  @if($errors->get('etat')) has-error @endif">                  
                     <span class="input-group-text">Etat du membre:&nbsp&nbsp</span>
                      <input type="radio" name="etat" value="1">
                      <label for="">Actif</label>                      
                      <input type="radio" name="etat" value="0">
                      <label for="">Non Actif</label>
                      @if($errors->get('etat'))
                           @foreach($errors->get('etat') as $message)
                              <h5>{{$message}}</h5>
                            @endforeach
                        @endif
                  </div>
                </div>
            </div>

            <div class="col-lg-9">
            <button class="btn btn-primary" type="submit">Modify</button>
            <button class="btn btn-default" type="reset">Reset</button>
            </div>
                         
          </form>
        </div>
      </div>
    </div>
  </div>
                
             
             
</div>
@endsection()