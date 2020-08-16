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
		<div class="container">
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
    </div>

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
                <li><span>2.000</span></li>
                <li><span>0</span></li>
              </ul>
			  <div class="bar">
                <div class="title">JAN</div>
                <div class="value tooltips" data-original-title="8500" data-toggle="tooltip" data-placement="top">85%</div>
              </div>
              <div class="bar">
                <div class="title">FEB</div>
                <div class="value tooltips" data-original-title="5000" data-toggle="tooltip" data-placement="top">50%</div>
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
                <div class="value tooltips" data-original-title="6200" data-toggle="tooltip" data-placement="top">62%</div>
              </div>
              <div class="bar">
                <div class="title">JUL</div>
                <div class="value tooltips" data-original-title="7500" data-toggle="tooltip" data-placement="top">25%</div>
              </div>
            </div>
              <!-- <div class="bar">
                <div class="title">-2jour</div>
                <div class="value tooltips" data-original-title="6.000" data-toggle="tooltip" data-placement="top">60%</div>
              </div>
              <div class="bar">
                <div class="title">-3jour</div>
                <div class="value tooltips" data-original-title="4.500" data-toggle="tooltip" data-placement="top">45%</div>
              </div>
              <div class="bar">
                <div class="title">-4jour</div>
                <div class="value tooltips" data-original-title="3.200" data-toggle="tooltip" data-placement="top">32%</div>
              </div>
              <div class="bar">
                <div class="title">-5jour</div>
                <div class="value tooltips" data-original-title="6.200" data-toggle="tooltip" data-placement="top">62%</div>
              </div>
              <div class="bar">
                <div class="title">-6jour</div>
                <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
              </div> -->
            <!-- </div> -->
		
   <div class="col-lg-10">

  <canvas id="myChart" width="400" height="400"></canvas>
  </div>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
  
   -->
   <!-- <div class="col-lg-10 bg-blue">
        <canvas id="myChart"></canvas>
      </div> 
<script>
    var myContext = document.getElementById("myChart");
    var myChartConfig = {
      type: 'bar',
      data: {
        labels: "Féminin", "Masculin", "Animaux",
        datasets: 
           {
           label: "Tous les voyageurs",
           data: [227, 331, 11
           },{
           label: "1ère Classe",
           data: 107, 115, 2
           },{
           label: "2ème Classe",
           data: 120, 116, 9
           }
        ]
      }
    }
  var myChart = new Chart(myContext, myChartConfig);
</script>
  
  
  
//   <script>
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