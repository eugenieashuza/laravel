@extends('templates.default_layout')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Ajouter Membre</li>
        </ol>
    </div>
    <!--/.row-->
   <br><br>
   <div class="container-fluid mt--7">
      <div class="row">

        <div class="col-xl-8  edit-prifile order-xl-1">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                
              </div>
            </div>
            <div class="col-lg-1"></div> 
          <div class="card-body col-lg-10 bg-teal ">
            
                <h6 class="heading-small text-muted mb-4"> information</h6>
                <div class="pl-lg-4"> 
                  <div class="form-row">
                  <div class="form-group">
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
                        <label class="form-control-label" for="phone">id de l'enregistreur</label>
                        <input type="text" class="form-control form-control-alternative" readonly name="idutil" size="30" value="{{ Auth::user()->id }}" >
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
                 </div>
                
                 <div class="col col-lg-6">
                    <div class="form-group  @if($errors->get('gender')) has-error @endif">  
                    <br>                
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
                    </div>
                </div>
                <br>
                <div class="col-lg-10">
                
                   <button class="btn btn-primary" type="submit">Save</button>
                  <button class="btn btn-default" type="reset">Reset</button>      
                </div>
                    <br>   
              </form>
            </div>
          </div>
        </div>
 </div>
                    
                 

    
@endsection()