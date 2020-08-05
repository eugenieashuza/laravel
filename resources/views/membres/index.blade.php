@extends('templates.default_layout')
@section('content')


          <div class="card bg-default shadow table-box">
            <div class="card-header row add-element-box bg-transparent border-0">
              <h3 class="text-white col-9 mb-0">Cooperatives</h3>
              <div class="offset-1"></div>
              <div class="col add-element">
                <fieldset>
                  <form method="post">
                    <div class="form-design">
                      <label for="trie" >Trie&nbsp;:&nbsp;</label>
                      <select name="trie" id="trie" class="form-control trie form-control-sm">
                        <?php foreach ([20,50,100,500] as $limit): ?>
                          <option <?php if(isset($_POST['trie']) && $_POST['trie'] == $limit) echo "selected"; ?> value="<?= $limit ?>"><?= $limit ?></option>
                        <?php endforeach ?>  
                      </select>
                    </div>
                  </form>
                </fieldset> 
              </div>
            </div>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Products</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Products</h1>
            <a href="{{url('products/create')}}" class="btn btn-success">New</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category name</th>
                        <th>Product name</th>
                        <th>Unit price</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->cat_name}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->unit_price}}</td>
                        <td>
                            <a href="products/edit/{{$product->id}}" class="btn btn-primary">Edit</a>
                            <form action="products/destroy/{{$product->id}}" method="POST">
                            @csrf
                                <button type="submit" onclick="return confirm('Voulez vs vraiment supprimer ce produit ?')" class="btn btn-danger">Delete</button>
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