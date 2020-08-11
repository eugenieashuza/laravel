@extends('templates.default_layout')
@section('content')
<div  class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <ol class="breadcrumb">
      <li><a href="#">
            <!-- <em class="fa fa-home"></em> -->
        </a></li>
      <li class="active">Acceuil</li>
    </ol>


   <!-- <div class="card-header row add-element-box bg-transparent "> -->

	<!--/.row-->

	  <!-- <div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Acceuil</h1>
			</div>
		</div>
		 -->
	
	<!--/.row-->
	<div class="row">
	<div class="col-md-12">
	<h1 class="page-header text-center text-primary">Acceuil</h1>
	</div>
	</div>
	<div class="panel panel-container">
		<div class="row">
			<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
				<div class="panel panel-teal panel-widget border-right">
					<div class="row no-padding"><em class="fa fa-xl fa-calendar color-blue"></em>
						<div class="large">{{$totalcoop}}</div>
						<div class="text-muted">Nombre de Cooperatives</div>
						<div class=""><a href="{{url('cooperatives')}}"><em class="fa fa-xl"></em>Plus</a></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
				<div class="panel panel-blue panel-widget border-right">
					<div class="row no-padding"><em class="fa  
					fa-xl fa-users color-orange"></em>
						<div class="large">{{$totalmembre}}</div>
						<div class="text-muted">Nombre de Membres</div>
						<div class=""><a href="{{url('membres')}}"><em class="fa fa-xl "></em>Plus</a></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
				<div class="panel panel-orange panel-widget border-right">
					<div class="row no-padding"><em class="fa fa-xl fa-book color-teal"></em>
						<div class="large">{{$totalprov}}</div>
						<div class="text-muted">Nombre de Provinces</div>
						<div class=""><a href="{{url('provinces')}}"><em class="fa fa-xl "></em>Plus</a></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
				<div class="panel panel-red panel-widget ">
					<div class="row no-padding"><em class="fa fa-xl fa-book color-red"></em>
						<div class="large">{{$totalcom}}</div>
						<div class="text-muted">Nombre de Communes</div>
						<div class=""><a href="{{url('communes')}}"><em class="fa fa-xl fa-add "></em>Plus</a></div>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>

    </div>   
		 <!-- <div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Site Traffic Overview
						<ul class="pull-right panel-settings panel-button-tab-right">
							<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
								<em class="fa fa-cogs"></em>
							</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 1
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 2
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 3
											</a></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div> -->


		<div class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Cooperatives Actifs </h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="{{$actifs}}" ><span class="percent">{{$actifs}}%</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Cooperatives Non Actifs</h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="{{$nonactifs}}" ><span class="percent">{{$nonactifs}}%</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Membres Actifs</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="{{$actif_membres}}" ><span class="percent">{{$actif_membres}}%</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Membres Non Actifs</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="{{$nonactif_membres}}" ><span class="percent">{{$nonactif_membres}}%</span></div>
					</div>
				</div>
			</div>
		</div>


		<!-- <div class="col-md-4 col-sm-4 mb">
          <div class="grey-panel pn donut-chart">
            <div class="grey-header">
              <h5>PANNES REUSSIS</h5>
            </div>
            <canvas id="serverstatus01" height="120" width="120"></canvas>
            <script>
              var doughnutData = [{
                  value: 40,
                  color: "#FF6B6B"
                },
                {
                  value: 60,
                  color: "#fdfdfd"
                }
              ];
              var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
            </script>
            <div class="row">
              <div class="col-sm-6 col-xs-6 goleft">
                <p>valeur<br/> en pourcentage:</p>
              </div>
              <div class="col-sm-6 col-xs-6">
                <h2>21%</h2>
              </div>
            </div>
          </div>
        </div> -->
		
	<!-- </div>  -->
	
<!-- </div>  -->
<!--/.main-->
@endsection()