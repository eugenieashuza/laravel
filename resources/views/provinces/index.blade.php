@extends('templates.default_layout')
@section('content')


<div  class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

<ol class="breadcrumb">
    <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
    <li class="active">Provinces</li>
</ol>
    
  <div class="card-header row add-element-box bg-transparent">

    <div class=" alert-box success  bg_width "> 
          @if (Session::has('flash_message'))
          <h4 class="text-center  breadcrumb  bg_width"> 
            {{ Session::get('flash_message') }}  </h4>
           @endif
    </div> 
    

      <form method="post">
      <fieldset>
      <h3 class="text-white col-6 breadcrumb mb-0">Operations
      <a href="{{url('provinces/create')}}" class="  add-element-item" data-toggle="tooltip" data-placement="right" title="Ajouter une province">
          <i class="fa fa-plus"></i>
        </a>
        <!-- <button  id="impression" name="impression" type="submit" onclick="imprimer_page()" value="Exporter en pdf " class="add-element-item" data-toggle="tooltip" data-placement="right" title="Imprimer"> -->
        <!-- <button onclick="$('{{$provinces}}').printElement({printMode:'popup'})" >Imprimer</button> -->
        <a href="{{ URL::to('provinces/pdf') }}" class="  add-element-item" data-toggle="tooltip" data-placement="right" title="Exporter en PDF">
        <i class="fa fa-print"></i>
        </a>
        <a href="#formulaire" data-toggle="modal" data-target="#formulaire" class="add-element-item" data-toggle="tooltip" data-placement="right" title="Enregistrer une province">
        <i class="fa fa-user"></i>
        </a>
      

          
        <!-- </button> -->
      </h3>
       
        </fieldset>
        </form>  
    </div>
    <!-- <form action="{{route('provinces.search')}}" class="d-flex mr-3">
        <br><br>
             <div class="input-group custom-search-form navbar-right col-lg-2">
                   <input type="text" class="search_btn" name="q" placeholder="Search..." value="{{request()->q ?? '' }}">
                   <span class="input-group-btn">
                        <button class="btn bg-teal search_btn" type="submit">
                            <em class="fa fa-search"> </em>
                        </button>
                   </span>
            </div>
            <br><br>
    </form>   -->
     <div class="table-responsive">  
      <!-- <table class="table align-items-center table-sm table-dark table-flush" id="#dataTables-example" > -->
    <table  data-toggle="table" data-url=""  data-show-refresh="true" data-show-toggle="true"
                       data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true"
                       data-sort-name="name" data-sort-order="desc">
        <thead class="thead-dark ">
          <tr>
           
            <th >Numero</th>
            <th > nom </th> 
            <th >Date d'enregistrement</th> 
            <th >Action</th>          
          </tr>
        </thead>
        <tbody>
        <?php  $i=1 ?>
            @foreach($provinces as $province)           
            <tr>
                <td><?= $i ?></td>
                <td>{{$province->nom}}</td>
                <td>{{$province->created_at}}</td>

                <td>                 
                    <a href="provinces/edit/{{$province->id}}" class="btn btn-primary">Edit</a>                   
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
     
      </table>
        
    </div>


    <!-- Debut  formulaire reservation-->
<!-- 
 <div class="container"> -->
    <!-- div id="html">
      <button data-toggle="modal" data-target="#formulaire" class="btn btn-primary">Informations</button>
    </div> -->
    <div class="modal fade" id="formulaire">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Enregistrement  de la province</h4>           
            <button type="button" class="close" data-dismiss="modal">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body row">
          <form action="{{url('provinces')}}"  method="POST" enctype="multipart/form-data"> 
                  @csrf
                  
                  <div class="col col-lg-6">
                  <label class="alert alert-danger" id="erreur" style="width: 100%;display: none;"></label>
                      <div class="form-group  @if($errors->get('nom')) has-error @endif">
                        <label class="form-control-label" for="nom">nom</label>
                        <input type="text" class="form-control form-control-alternative" placeholder="nom" name="nom" size="30">
                        @if($errors->get('nom'))
                           @foreach($errors->get('nom') as $message)
                              <h5>{{$message}}</h5>
                            @endforeach
                        @endif
                      </div>
                    </div>
                    <!-- <div class="g-recaptcha" 
                     data-sitekey="6LeuNQITAAAAAPGRU7dkrCPIrrR64WPvzMc7pn6Z">
                    </div> -->
                <div class="col-lg-10">
                <button class="btn btn-primary" type="submit" onclick="hello()">Save</button>
                <button class="btn btn-default" type="reset">Reset</button>       
                </div>
                       
              </form>
          </div>
        </div>
      </div>
    </div>
<!-- </div> -->

 <!-- <div class="media align-items-center">
                  <a href="#" class="avatar rounded-circle mr-3">
                    <img alt="Profil"  class="img-design" src="./images/theme/encadreur/<?php // $Encad->avatarEncad ?>">
                  </a>
                  <div class="media-body">
                    <span><?php // //$Encad->NomEncad ?></span>
                  </div>
  </div> -->
  <script>
  function hello() {
  // var pseudo=$("#noms").val();
  // var motdepasse=$("#motdepasse").val();
  //  $.post({
  //   url:'connect.php',
  //   data:{pseudo:pseudo,motdepasse:motdepasse},
  //   success:function (dt) {
  //     var ver=dt.split('#');
  //     if (ver[1]=='erreur') {
  //       $("#erreur").css('display','block');
  //       $("#erreur").html(ver[0]);
  //     }else{
  //       window.open('TableauDeBord.php','_self');
  //     }
  //   }
  //  });

 }

</script>
   
@endsection()