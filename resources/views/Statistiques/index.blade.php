@extends('templates.default_layout')
@section('content')
<div  class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <ol class="breadcrumb">
      <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
      <li class="active">Statistiques</li>
    </ol>


   <!-- <div class="card-header row add-element-box bg-transparent "> -->

	<!--/.row-->

	   <div class="row">
			<div class="col-lg-12">
				<h2 class="page-header text-center text-teal">Nombre</h2>
			</div>
		</div>
		 
	
	<!--/.row-->

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
		<!-- <div class="container">
      <h1>Carrousel</h1>
      <div id="demo" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://www.pierre-giraud.com/bootstrap-carrousel-slide-1.jpg" alt="Carrousel slide 1" class="d-block w-100">
          </div>
          <div class="carousel-item">
            <img src="https://www.pierre-giraud.com/bootstrap-carrousel-slide-2.jpg" alt="Carrousel slide 2" class="d-block w-100">
          </div>
          <div class="carousel-item">
            <img src="https://www.pierre-giraud.com/bootstrap-carrousel-slide-3.jpg" alt="Carrousel slide 3" class="d-block w-100">
          </div>
        </div>
      </div>
    </div> -->

		<div class="row">
			<div class="col-lg-12">
				<h2 class="page-header text-center text-teal">Statistiques</h2>
			</div>
		</div>

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
		</div><!--/.row-->

		<div class="border-head">
              <h3>USER VISITS</h3>
            </div>
            <div class="custom-bar-chart">
              <ul class="y-axis">
                <li><span>10.000</span></li>
                <li><span>8.000</span></li>
                <li><span>6.000</span></li>
                <li><span>4.000</span></li>
                <li><span>2.00</span></li>
                <li><span>0</span></li>
              </ul>
			  <div class="bar">
                <div class="title">JAN</div>
                <div class=" value " data-original-title="8500" data-toggle="tooltip" data-placement="top">85%</div>
              </div>
              <div class="bar">
                <div class="title">FEB</div>
                <div class=" tooltips" data-original-title="5000" data-toggle="tooltip" data-placement="top">50%</div>
              </div>
              <div class="bar">
                <div class="title">MAR</div>
                <div class="value tooltips" data-original-title="6000" data-toggle="tooltip" data-placement="top">60%</div>
              </div>
              <div class="bar">
                <div class="title">APR</div>
                <div class="value tooltips" data-original-title="4500" data-toggle="tooltip" data-placement="top">45%</div>
              </div>
              <div class="bar">
                <div class="title">MAY</div>
                <div class="value tooltips" data-original-title="3200" data-toggle="tooltip" data-placement="top">32%</div>
              </div>
              <div class="bar">
                <div class="title">JUN</div>
                <div class=" tooltips" data-original-title="6200" data-toggle="tooltip" data-placement="top">62%</div>
              </div>
              <div class="bar">
                <div class="title">JUL</div>
                <div class=" tooltips" data-original-title="7500" data-toggle="tooltip" data-placement="top">25%</div>
              </div>
            </div>




            <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Bar Chart
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
							<canvas class="main-chart" id="bar-chart" height="200" width="600"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->		
     <div class="col-lg-4"></div>       
   <div class="col-lg-10">

   <div id="ca_graph"></div>
     @columnchart('Finances', 'ca_graph')
  </div>

  <script>
         //var url = "{{url('statistiques/chart')}}";
        // var Nom = new Array();
        // var Nbe = new Array();
        // var Prices = new Array();
        // $(document).ready(function(){
        //   $.get(url, function(response){
        //     response.forEach(function(data){
        //         Nom.push(data.communes.nom);
        //         Nbe.push(data.nbre);
        //         // Prices.push(data.);
        //     });



        //     var ctx = document.getElementById("canvas").getContext('2d');
        //         var myChart = new Chart(ctx, {
        //           type: 'bar',
        //           data: {
        //             labels: [jun.fev.mr] ,
                      
        //               datasets: [{
        //                   label: 'INfos Nbre de Cooperatives par commnunes',
        //                   data: [1,5,23],
        //                   borderWidth: 1
        //               }]
        //           },
        //           options: {
        //               scales: {
        //                   yAxes: [{
        //                       ticks: {
        //                           beginAtZero:true
        //                       }
        //                   }]
        //               }
        //           }
        //       });
        //   });
        // });
        </script>
  

  
<!--    
   <div class="col-lg-10 bg-blue">
        <canvas id="myChart"></canvas>
      </div>  -->
// <script>
//     var myContext = document.getElementById("myChart");
//     var myChartConfig = {
//       type: 'bar',
//       data: {
//         labels: "Féminin", "Masculin", "Animaux",
//         datasets: 
//            {
//            label: "Tous les voyageurs",
//            data: [227, 331, 11
//            },{
//            label: "1ère Classe",
//            data: 107, 115, 2
//            },{
//            label: "2ème Classe",
//            data: 120, 116, 9
//            }
//         ]
//       }
//     }
//   var myChart = new Chart(myContext, myChartConfig);
// </script> -->
  
  
  
<!-- //   <script>
//   var ctx = document.getElementByid('graph1').getContext('2d')
//   var options
//   var config = {
// 		type : 'line' ,
// 		data :data ,
// 		options :options
// 	}
//   var graph1 = new Chart(ctx,config)
//   </script> --> 
@endsection()