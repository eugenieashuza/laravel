@extends('templates.default_layout')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Ajouter Commune</li>
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
                  <form action="{{url('communes')}}"  method="POST" enctype="multipart/form-data"> 
                  @csrf
                  <div class="col col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="mail">nom</label>
                        <input type="text" class="form-control form-control-alternative" placeholder="nom" name="nom" size="30">
                      </div>
                    </div>                  
                    <div class="col col-lg-6">
                       <div class="form-group">
                         <label for="provinces_nom">province</label>
                         <select name="id_province" id="" class="form-control" 
                               class="@error('provinces_id') is-danger @enderror">
                                <option value="">Select province</option>
                                   @foreach($provinces as $province)
                                <option value="{{$province->id}}">{{$province->nom}}</option>
                               @endforeach
                                @error('provinces_id')
                            <div class="alert alert-danger">{{$message}}</div>
                             @enderror
                          </select>                         
                          <a href="{{url('provinces/create')}}" class="btn btn-primary">Ajouter Province</a>
                        </div>
                    </div>
                 </div>

                <div class="col col-lg-9">
                <button class="btn btn-primary" type="submit">Save</button>
                <button class="btn btn-default" type="reset">Reset</button>   
                </div>
                          
              </form>
            </div>
          </div>
        </div>
 </div>
                    
                 

   
@endsection()