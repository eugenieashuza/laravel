@extends('templates.default_layout')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Update a product</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Products</h1>
            <form action="/products/{{$product->id}}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="cat_name">Category name</label>
                    <select name="category_id" id="" class="form-control">
                        <option value="">Select category</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->cat_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Product name</label>
                    <input type="text" name="product_name" id="" value="{{$product->product_name}}" class="form-control" class="@error('product_name') is-danger @enderror" placeholder="" aria-describedby="helpId">
                    @error('product_name')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Unit price</label>
                    <input type="text" name="unit_price" id="" value="{{$product->unit_price}}" class="form-control" class="@error('unit_price') is-danger @enderror" placeholder="" aria-describedby="helpId">
                    @error('unit_price')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
                <button class="btn btn-default" type="reset">Reset</button>
            </form>
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