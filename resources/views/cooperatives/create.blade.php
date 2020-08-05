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

    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">

        <div class="col-xl-8  edit-prifile order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Inscription</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="POST"> 
                <h6 class="heading-small text-muted mb-4"> information</h6>
                <div class="pl-lg-4">
                  <div class="form-row">
                    <div class="col">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">telephone</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Nom" name="Nom">
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Prenom</label>
                        <input type="text" id="input-email" class="form-control form-control-alternative" placeholder="Prenom" name="Prenom" >
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Sexe : </span>
                      </div>
                      <div class="gender-decale">
                        <div class="gender-design">
                          <input type="radio" name="gender" id="gender" value="M">
                          <label for="gender">M</label>
                        </div>

                        <div class="gender-design gender-design-2">
                          <input type="radio" name="gender" id="gender-f" value="F">
                          <label for="gender-f">F</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col">
                      <label class="form-control-label" for="input-first-name">Date de naissance</label>
                      <input type="date" id="input-first-name" class="form-control form-control-alternative" name="datenaiss">
                    </div>
                    <div class="form-group col"></div>
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