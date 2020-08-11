@extends('templates.default_layout')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Modifier Membre</li>
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
                  <form action="/membres/{{$membre->id}}"  method="POST" enctype="multipart/form-data"> 
                  @csrf
                  @method('PUT')
                  
                  <div class="col col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="mail">nom</label>
                        <input type="text" class="form-control form-control-alternative" value="{{$membre->nom}}" name="nom" >
                      </div>
                    </div>
                    <div class="col col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="mail">prenom</label>
                        <input type="text" class="form-control form-control-alternative" value="{{$membre->prenom}}" name="prenom" >
                      </div>
                    </div>
                    <div class="col col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="mail">mail</label>
                        <input type="mail" class="form-control form-control-alternative" value="{{$membre->mail}}" name="mail" >
                      </div>
                    </div>
                    <div class="col col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="phone">age</label>
                        <input type="text" class="form-control form-control-alternative" value="{{$membre->age}}" name="age"  >
                      </div>
                    </div>
                    
                    <div class="col col-lg-6">
                       <div class="form-group">
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
                
                 <div class="col col-lg-6">
                    <div class="form-group">                  
                         <span class="input-group-text">Sexe</span>
                          <input type="radio" name="gender" value="Feminin">
                          <label for="gender">Feminin</label>                      
                          <input type="radio" name="gender" value="Masculin">
                          <label for="gender-f">Masculin</label>
                      </div>
                    </div>
                </div>
                <div class="col- col-lg-9">
                <button class="btn btn-primary" type="submit">Modify</button>
                <button class="btn btn-default" type="reset">Reset</button>  
                </div>
                            
              </form>
            </div>
          </div>
        </div>
 </div>
                    
                 

@endsection()