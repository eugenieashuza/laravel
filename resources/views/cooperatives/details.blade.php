@extends('templates.default_layout')
@section('content')

<div  class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
	   <div class="col-md-12">
       
	     <h1 class="page-header text-center text-primary">Statut de la cooperative {{$cooperatives->nom}}</h1>
        <a href="{{url('cooperatives')}}" class="btn-primary">Retour</a> 
	   </div>
	</div>
   <div class="clear"></div>
   <p>
   <iframe src="{{url('storage/'.$cooperatives->statut)}}" frameborder="0"></iframe>
    
   </p>     
    
   
@endsection()