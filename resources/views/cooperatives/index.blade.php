@extends('templates.default_layout')
@section('content')


  <div  class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Cooperatives</li>
        </ol>
    
     
      <div class="card-header row add-element-box bg-transparent ">

              <form method="post">
              <fieldset>
              <h3 class="text-white col-6 breadcrumb mb-0">Operations
              <a href="{{url('cooperatives/create')}}" class="  add-element-item" data-toggle="tooltip" data-placement="right" title="Ajouter une cooperative">
                  <i class="fa fa-plus"></i>
                </a>
                <a href="#" class=" add-element-item" data-toggle="tooltip" data-placement="right" title="Imprimer">
                  <i class="fa fa-print"></i>
                </a>
              </h3>
               
                </fieldset>
                </form>  
            </div>
      
            <div class="table-responsive">
              <table class="table align-items-center table-sm table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">telephone</th>
                    <th scope="col">Date d'enregistrement</th>
                    <!-- <th scope="col">Pseudo</th> -->
                    <th scope="col">commune</th>
                    <th scope="col">Mail</th>
                    <th scope="col">statut</th>
                    
                  </tr>
                </thead>
             
              </table>
          
            </div>
         <div class="media align-items-center">
                          <a href="#" class="avatar rounded-circle mr-3">
                            <img alt="Profil"  class="img-design" src="./images/theme/encadreur/<?php // $Encad->avatarEncad ?>">
                          </a>
                          <div class="media-body">
                            <span><?php // //$Encad->NomEncad ?></span>
                          </div>
          </div>
 

    <div class="row">
        <div class="col-lg-12">
        </div><!-- /.panel-->
    </div><!-- /.col-->
    <div class="col-sm-12">
        <p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">Medialoot</a></p>
    </div>
    </div> /.row -->
@endsection()