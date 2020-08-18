<nav class="navbar navbar-custom navbar-fixed-top navbar_position " role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="{{url('/')}}"><span>CONSERVE</span>STATUTS</a>
         <!-- <ul class="nav navbar-top-links navbar-right  ">  -->
            <ul class="nav align-items-center d-md-none navbar-right "> 
          <!-- <li class="nav-item dropdown-menu"> -->
          <li class="parent bg-white dropdown-menu "><a data-toggle="collapse" href="#sub-item-1">
				 Choix d'action <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>            
				<ul class="children collapse  nav menu" id="sub-item-1">
					<li class="side_menu"><a class="" href="#">
                    <em class="fa fa-user ">&nbsp</em>Profil
					 <li class="side_menu"> <!--<a class="" href="{{route('logout')}}"> -->
                    <a class="" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <em  class="fa fa-power-off">&nbsp</em>Deconnexion
                                        <!-- {{ __('Logout') }} -->
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                    
					</li>
				</ul>
              
			</li> <!-- <li><a href="login.html"><em class="fa fa-power-off">&nbsp;</em>Deconnexion</a></li> -->
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>