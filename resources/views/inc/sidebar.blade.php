<div id="sidebar-collapse " class="col-sm-3 col-lg-2 sidebar sidebar_menu ">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"> {{ Auth::user()->name }}</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>En ligne
				{{date(d-m-Y H:m:s)}} </div>
			</div>
			<div class="clear"></div>
		</div>
		<!-- <div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form> -->
		<ul class="nav menu">
			<li class="side_menu"><a href="{{url('')}}"><em class="fa fa-dashboard">&nbsp;</em> Acceuil</a></li>
			<li class="side_menu" ><a href="{{url('cooperatives')}}"><em class="fa fa-calendar">&nbsp;</em>Cooperatives</a></li>
			<li class="side_menu"><a href="{{url('membres')}}"><em class="fa fa-users">&nbsp;</em> Membres</a></li>
			<li class="side_menu"><a href="{{url('statistiques')}}"><em class="fa fa-bar-chart">&nbsp;</em> Statistiques</a></li>
			<li class="side_menu"><a href="{{url('cooperative_membres')}}"><em class="fa fa-clone">&nbsp;</em>Assosier</a></li>
			<li class="side_menu"><a href="{{url('provinces')}}"><em class="fa fa-book">&nbsp;</em>Provinces</a></li>
			<li class="side_menu"><a href="{{url('communes')}}"><em class="fa fa-book">&nbsp;</em>Communes</a></li>
			<!-- <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Configuration <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="{{url('categories')}}">
						<span class="fa fa-arrow-right">&nbsp;</span> chart
					</a></li>
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> User profile
					</a></li>
				</ul>
			</li> -->
			
		</ul>
	</div><!--/.sidebar-->