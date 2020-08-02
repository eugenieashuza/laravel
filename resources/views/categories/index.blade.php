@extends('templates.default_layout')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Categories</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Product categories</h1>
            <a href="{{url('categories/create')}}" class="btn btn-success">New</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category name</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->cat_name}}</td>
                        <td>
                            <a href="categories/edit/{{$category->id}}" class="btn btn-primary">Edit</a>
                            <form action="categories/destroy/{{$category->id}}" method="POST">
                            @csrf
                                <button type="submit" onclick="return confirm('Voulez vs vraiment supprimer cette categorie ?')" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/.row-->


    <div class="row">
        <div class="col-lg-12">
        </div><!-- /.panel-->
    </div><!-- /.col-->
    <div class="col-sm-12">
        <p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">Medialoot</a></p>
    </div>
</div><!-- /.row -->
@endsection()