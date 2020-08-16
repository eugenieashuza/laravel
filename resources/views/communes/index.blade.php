@extends('templates.default_layout')
@section('content')


<div  class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <ol class="breadcrumb">
      <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
      <li class="active">Communes</li>
    </ol>
    <!-- <div class="row">
    @include('flash-message')
    </div> -->
      

   <div class="card-header row add-element-box bg-transparent ">

      <form method="post">
      <fieldset>
      <h3 class="text-white col-6 breadcrumb mb-0">Operations
      <a href="{{url('communes/create')}}" class="  add-element-item" data-toggle="tooltip" data-placement="right" title="Ajouter une commune">
          <i class="fa fa-plus"></i>
        </a>
        <a href="#" class=" add-element-item" data-toggle="tooltip" data-placement="right" title="Imprimer">
          <i class="fa fa-print"></i>
        </a>
      </h3>
       
        </fieldset>
        </form>  
    </div>  
    <form action="{{route('communes.search')}}" class="d-flex mr-3">
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
            <th scope="col"> Nom </th>           
            <th scope="col">Date d'enregistrement</th> 
            <th scope="col">Province</th> 
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php  $i=1 ?>
            @foreach($communes as $commune)           
            <tr>
                <td><?= $i ?></td>
                <td>{{$commune->nom}}</td>
                <td>{{$commune->created_at}}</td>
                <td>{{$commune->province}}</td>          
                <td>                 
                    <a href="communes/edit/{{$commune->id}}" class="btn btn-primary">Edit</a>                   
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
     
      </table>
  
    </div>
    <br><br>

    <div class="accordion_container">
										<div class="accordion d-flex flex-row align-items-center"><div>Curabitur mauris urna, sodales sed imperdiet in?</div></div>
										<div class="accordion_panel">
											<div>
												<p>Curabitur venenatis efficitur lorem sed tempor. Integer aliquet tempor cursus. Nullam vestibulum convallis risus vel condimentum. Nullam auctor lorem in libero luctus, vel volutpat quam tincidunt. Nullam vestibulum convallis risus.</p>
											</div>
									<div class="buttons">
						                 <div class="buttons_container d-flex flex-row align-items-start justify-content-start flex-wrap">
						              <div class="button button_1"><a href="#">Vrai</a></div>
						              <div class="button button_2"><a href="#">Faux</a></div>
						                </div>
					               </div>
										</div>
    <br>

    <div class="col-lg-12 bg-red align-items-center ">
   <li class="parent bg-red dropdown-menu col-lg-3 "><a data-toggle="collapse" href="#sub-item-1">
				 Enregistrement <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>            
				<!-- <ul class="children collapse  nav menu" id="sub-item-1"> -->
<div class="row children collapse">

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
            
         </div>

        <div class="col col-lg-9">
        <button class="btn btn-primary" type="submit">Save</button>
        <button class="btn btn-default" type="reset">Reset</button>   
        </div>
                  
      </form>
    </div>
  </div>
</div>
					<!-- <li class="side_menu"><a class="" href="#">
                    <em class="fa fa-user ">&nbsp</em>Profil
					<li class="side_menu"><a class="" href="#">
                    <em  class="fa fa-power-off">&nbsp</em>Deconnexion
					</a></li>
				</ul> -->
              
      </li>
</div>
    <!-- <div class="media align-items-center">
                  <a href="#" class="avatar rounded-circle mr-3">
                    <img alt="Profil"  class="img-design" src="./images/theme/encadreur/<?php // $Encad->avatarEncad ?>">
                  </a>
                  <div class="media-body">
                    <span><?php // //$Encad->NomEncad ?></span>
                  </div>
  </div> 



   
@endsection()