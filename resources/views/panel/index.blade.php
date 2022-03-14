@extends ('layouts.admin')
@section ('contenido')
<?php 
    $user = Auth::user(); 
?>
<div>
      <div class="card mb-4">
            <header class="card-header" align="center">
				<h2 class="h3 card-header-title"><strong>Control Panel: </h2>
				@if(Auth::user()->logo == null)
					<h1><u><strong><font color="orange">{{Auth::user()->empresa}}</font></strong></u></strong></h1>
				@else
					<img src="{{asset('imagenes/logos/'.Auth::user()->logo)}}"  width="100">
				@endif	
				<h5 class="h5 card-header-title"><strong>User: <font color="blue">{{Auth::user()->name}}</font></strong></h5>
            </header>
            <div class="card-body" >
				<h2><u><b>Modules</b></u></h2>
				<div id="accordion" >
					
						<div class="card">
							<div class="card">
							<div class="card-header">
								<a href="{{ url('home') }}">
									<i class="fas fa-store u-sidebar-nav-menu__item-icon" style="font-size:30px;color:lightblue;text-shadow:2px 2px 4px #000000;"></i>
									<span class="u-sidebar-nav-menu__item-title"><font color="orange"><b>Website </b></font></span>
								</a>
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-header">
							<a class="card-link" data-toggle="collapse" href="#collapse1">
								<i class="fas fa-cubes u-sidebar-nav-menu__item-icon" style="font-size:30px;color:lightblue;text-shadow:2px 2px 4px #000000;"></i>
								<span class="u-sidebar-nav-menu__item-title"><font color="orange"><b>Works</b></font></span>
								<i class="fa fa-angle-right u-sidebar-nav-menu__item-arrow"></i>
								<span class="u-sidebar-nav-menu__indicator"></span>
							</a>
						</div>
						<div id="collapse1" class="collapse" data-parent="#accordion">
							<div class="card-body">
								<ul>
									@if(Auth::user()->user_type == "ADMIN")
									<li class="u-sidebar-nav-menu__item">
										<a class="u-sidebar-nav-menu__link" href="{{url('works\vehicle')}}">
											<span class="u-sidebar-nav-menu__item-icon">V</span>
											<span class="u-sidebar-nav-menu__item-title">Vehicles</span>
										</a>
									</li>
									@endif
									<li class="u-sidebar-nav-menu__item">
										<a class="u-sidebar-nav-menu__link" href="{{url('works\work')}}">
											<span class="u-sidebar-nav-menu__item-icon">W</span>
											<span class="u-sidebar-nav-menu__item-title">Works</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>

					@if(Auth::user()->user_type == "ADMIN")
					<div class="card">
						<div class="card-header">
							<a class="card-link" data-toggle="collapse" href="#collapse2">
								<i class="fas fa-users u-sidebar-nav-menu__item-icon" style="font-size:30px;color:lightblue;text-shadow:2px 2px 4px #000000;"></i>
								<span class="u-sidebar-nav-menu__item-title"><font color="orange"><b>Security </b></font></span>
								<i class="fa fa-angle-right u-sidebar-nav-menu__item-arrow"></i>
								<span class="u-sidebar-nav-menu__indicator"></span>
							</a>
						</div>
						<div id="collapse2" class="collapse" data-parent="#accordion">
							<div class="card-body">
								<ul>
									<li class="u-sidebar-nav-menu__item">
										<a class="u-sidebar-nav-menu__link" href="{{url('seguridad\usuario')}}">
											<span class="u-sidebar-nav-menu__item-icon">A</span>
											<span class="u-sidebar-nav-menu__item-title">Administrators</span>
										</a>
									</li>
									<li class="u-sidebar-nav-menu__item">
										<a class="u-sidebar-nav-menu__link" href="{{url('seguridad\clients')}}">
											<span class="u-sidebar-nav-menu__item-icon">C</span>
											<span class="u-sidebar-nav-menu__item-title">Clients</span>
										</a>
									</li>
									<li class="u-sidebar-nav-menu__item">
										<a class="u-sidebar-nav-menu__link" href="{{url('seguridad\driver')}}">
											<span class="u-sidebar-nav-menu__item-icon">D</span>
											<span class="u-sidebar-nav-menu__item-title">Drivers</span>
										</a>
									</li>
									
								</ul>
							</div>
						</div>
					</div>
					@endif
					@if(Auth::user()->user_type == "ADMIN")
					<div class="card">
						<div class="card-header">
							<a class="collapsed card-link" data-toggle="collapse" href="#collapse5">
								<i class="fas fa-chart-bar u-sidebar-nav-menu__item-icon" style="font-size:30px;color:lightblue;text-shadow:2px 2px 4px #000000;"></i>
								<span class="u-sidebar-nav-menu__item-title"><font color="orange"><b>Reports</b></font></span>
								<i class="fa fa-angle-right u-sidebar-nav-menu__item-arrow"></i>
								<span class="u-sidebar-nav-menu__indicator"></span>
							</a>
						</div>
						<div id="collapse5" class="collapse" data-parent="#accordion">
							<div class="card-body">
								<ul>
									
									<li class="u-sidebar-nav-menu__item">
										<a class="u-sidebar-nav-menu__link" href="{{url('reports\bitacora')}}">
											<span class="u-sidebar-nav-menu__item-icon">L</span>
											<span class="u-sidebar-nav-menu__item-title">Logs</span>
										</a>
									</li>

								</ul>
								<ul>
									
									<li class="u-sidebar-nav-menu__item">
										<a class="u-sidebar-nav-menu__link" href="{{url('reports\works')}}">
											<span class="u-sidebar-nav-menu__item-icon">W</span>
											<span class="u-sidebar-nav-menu__item-title">Works</span>
										</a>
									</li>

								</ul>
							</div>
						</div>
					</div>
					@endif
					@if(Auth::user()->user_type == "ADMIN")
					<div class="card">
						<div class="card-header">
							<a href="{{URL::action('ConfiguracionController@edit',Auth::user()->id)}}">
								<i class="fas fa-cogs u-sidebar-nav-menu__item-icon" style="font-size:30px;color:lightblue;text-shadow:2px 2px 4px #000000;"></i>
								<span class="u-sidebar-nav-menu__item-title"><font color="orange"><b>Configuration </b></font></span>
							</a>
						</div>
						
					</div>
					@endif
					<div class="card">
						<div class="card-header">
							<a href="">
								<i class="far fa-question-circle u-sidebar-nav-menu__item-icon" style="font-size:30px;color:lightblue;text-shadow:2px 2px 4px #000000;"></i>
								<span class="u-sidebar-nav-menu__item-title"><font color="orange"><b>Help </b></font></span>
							</a>
						</div>
						
					</div>
				</div>
			</div>
            <footer class="card-footer">
                 
            </footer>
      </div>
</div>
@endsection