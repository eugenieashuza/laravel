@extends('templates.default_layout')
@section('content')


<div  class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

<ol class="breadcrumb">
    <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
    <li class="active">Provinces</li>
</ol>
    

<div class="card-header row add-element-box bg-transparent ">
    <div class="row alert-box success"> 
    @if (Session::has('flash_message'))
     <h4 class="text-center col-6 breadcrumb mb-0"> 
           {{ Session::get('flash_message') }}  </h4>
         @endif
        
    </div> 

      <form method="post">
      <fieldset>
      <h3 class="text-white col-6 breadcrumb mb-0">Operations
      <a href="{{url('provinces/create')}}" class="  add-element-item" data-toggle="tooltip" data-placement="right" title="Ajouter une province">
          <i class="fa fa-plus"></i>
        </a>
        <button  id="impression" name="impression" type="submit" onclick="imprimer_page()" value="Exporter en pdf " class="add-element-item" data-toggle="tooltip" data-placement="right" title="Imprimer">
        <!-- <button onclick="$('{{$provinces}}').printElement({printMode:'popup'})" >Imprimer</button> -->
        
       <script type="text/javascript">
            function imprimer_page(){
            window.print();
             }
        </script>
         <!-- <PHP header('Expires: 0');
          header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
          header('Pragma: public');
          ?> -->

          <i class="fa fa-print"></i>
        </button>
      </h3>
       
        </fieldset>
        </form>  
    </div>
    <form action="{{route('provinces.search')}}" class="d-flex mr-3">
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
            <th scope="col">Date d'enregistrement</th> 
            <th scope="col">Action</th>          
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
        <div class="text-center">{{$provinces->links()}}</div>
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