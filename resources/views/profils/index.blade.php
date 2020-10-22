@extends('templates.default_layout')
@section('content')



<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Profil</li>
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
                  <form action="{{url('profil')}}"  method="POST" enctype="multipart/form-data"> 
                  @csrf

                  <div class="col col-lg-6">
                      <div class="form-group @if($errors->get('adresse')) has-error @endif ">
                        <label class="form-control-label" for="mail">Donner votre adresse</label>
                        <input type="text" class="form-control form-control-alternative" placeholder="nom" name="nom">
                        @if($errors->get('nom'))
                           @foreach($errors->get('nom') as $message)
                              <h5>{{$message}}</h5>
                            @endforeach
                        @endif
                      </div>
                    </div>
                    <div class="col col-lg-6">
                      <div class="form-group @if($errors->get('image')) has-error @endif">
                        <label class="form-control-label" for="image">choisir une image</label>
                        <input type="file" name="image" value="Submit">
                        @if($errors->get('image'))
                           @foreach($errors->get('image') as $message)
                              <h5>{{$message}}</h5>
                            @endforeach
                        @endif
                      </div>
                    </div>
                  <div class="col col-lg-6">
                      <div class="form-group @if($errors->get('adresse')) has-error @endif ">
                        <label class="form-control-label" for="mail">Donner votre adresse</label>
                        <input type="text" class="form-control form-control-alternative" placeholder="nom" name="nom">
                        @if($errors->get('nom'))
                           @foreach($errors->get('nom') as $message)
                              <h5>{{$message}}</h5>
                            @endforeach
                        @endif
                      </div>
                    </div>
                 
                
                 <div class="col col-lg-6">
                    <div class="form-group @if($errors->get('gender')) has-error @endif">                  
                         <span class="input-group-text">sexe:&nbsp&nbsp</span>
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
                <div class="col col-lg-6">
                      <div class="form-group ">
                        <label class="form-control-label" for="phone">Votre id</label>
                        <input type="text" class="form-control form-control-alternative" readonly name="idutil" size="30" value="{{ Auth::user()->id }}" >
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