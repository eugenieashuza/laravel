@extends('templates.default_layout')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Ajouter Cooperative</li>
        </ol>
    </div>
    <!--/.row-->

    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">

        <div class="col-xl-8  edit-prifile order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                
              </div>
            </div>
          <div class="card-body">
            <form method="POST"> 
                <h6 class="heading-small text-muted mb-4"> information</h6>
                <div class="pl-lg-4">
                  <div class="form-row">
                    <div class="col">
                      <div class="form-group">
                        <label class="form-control-label" for="input-mail">mail</label>
                        <input type="mail" class="form-control form-control-alternative" placeholder="mail" name="mail" size="30">
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label class="form-control-label" for="input-phone">telephone</label>
                        <input type="text" class="form-control form-control-alternative" placeholder="Prenom" name="Prenom" size="30" >
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label class="form-control-label" for="input-statut">Statut</label>
                        <input type="text" class="form-control form-control-alternative"  placeholder="" name="statut" size="30">
                      </div>
                    </div>
                    <div class="col">
                       <div class="form-group">
                         <label for="cat_name">commune</label>
                          <select name="commune_id" id="" class="form-control">
                          <option value="">Select commune</option>
                      
                           </select>
                        </div>
                    </div>
                 </div>
                 <div class="col">
                    <div class="form-group">                  
                         <span class="input-group-text">Etat de la cooperative:&nbsp&nbsp</span>
                          <input type="radio" name="gender" id="actif" value="1">
                          <label for="gender">Actif</label>                      
                          <input type="radio" name="gender" id="nonactif" value="0">
                          <label for="gender-f">Non Actif</label>
                      </div>
                    </div>
                </div>

                <hr class="my-4" />
                <button class="btn btn-primary" type="submit">Save</button>
                <button class="btn btn-default" type="reset">Reset</button>              
              </form>
            </div>
          </div>
        </div>
 </div>
                    
                 
                 
          </div>
    <div class="row">
        <div class="col-lg-12">
        </div><!-- /.panel-->
    </div><!-- /.col-->
    <div class="col-sm-12">
        <p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">Medialoot</a></p>
    </div>
</div><!-- /.row -->
@endsection()