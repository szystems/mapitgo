<?php 
    if (Auth::user() != null) {
        $user = Auth::user(); 

        
        
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>MapitGO</title>
<link rel="icon" href="{{asset('favicon.ico')}}">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="MapitGO">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
	$datosConfig=DB::table('users')->first();

    //obtener ruta y accion para cargar Stylesheets
	$action = app('request')->route()->getAction();
	if(isset($action['controller']))
	{
		$pagina = class_basename($action['controller']);
		
	}
	else
	{
		$pagina = 'home';
	}
	echo $pagina;
?>
@if($pagina == "home" || $pagina == "InicioController@index" || $pagina == "HomeController@index" || $pagina == "LoginController@showLoginForm" || $pagina == "RegisterController@showRegistrationForm" || $pagina == "ForgotPasswordController@showLinkRequestForm" || $pagina == "ResetPasswordController@showResetForm" || $pagina == "ResetPasswordController@showResetForm" || $pagina == "VistaUsuarioController@update" || $pagina == "VistaUsuarioController@show"|| $pagina == "VistaUsuarioController@show" || $pagina == "VistaOrderController@index" || $pagina == "VistaOrderController@create" || $pagina == "VistaOrderController@edit" || $pagina == "VistaOrderController@update" || $pagina == "VistaOrderController@show")
<link rel="stylesheet" type="text/css" href="{{asset('mapitgo/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{asset('mapitgo/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('mapitgo/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('mapitgo/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('mapitgo/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link href="{{asset('mapitgo/plugins/video-js/video-js.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('mapitgo/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('mapitgo/styles/responsive.css')}}">
@endif
@if($pagina=="ContactoController@index"  || $pagina == "LoginController@showLoginForm" || $pagina == "RegisterController@showRegistrationForm" || $pagina == "ForgotPasswordController@showLinkRequestForm" || $pagina == "ResetPasswordController@showResetForm" || $pagina == "ContactoController@store" || $pagina == "VistaUsuarioController@edit")
<link rel="stylesheet" type="text/css" href="{{asset('mapitgo/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{asset('mapitgo/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('mapitgo/plugins/video-js/video-js.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('mapitgo/styles/contact.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('mapitgo/styles/contact_responsive.css')}}">
@endif
@if($pagina=="")
<link rel="stylesheet" type="text/css" href="{{asset('mapitgo/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{asset('mapitgo/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('mapitgo/plugins/video-js/video-js.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('mapitgo/styles/about.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('mapitgo/styles/about_responsive.css')}}">
@endif
@if($pagina == "OurHistoryController@index" || $pagina=="WhyShouldChooseUsController@index" || $pagina=="WhatWeDoController@index")
<link rel="stylesheet" type="text/css" href="{{asset('mapitgo/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{asset('mapitgo/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('mapitgo/plugins/video-js/video-js.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('mapitgo/styles/courses.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('mapitgo/styles/courses_responsive.css')}}">
@endif
@if($pagina=="")
<link rel="stylesheet" type="text/css" href="{{asset('mapitgo/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{asset('mapitgo/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('mapitgo/plugins/video-js/video-js.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('mapitgo/styles/elements.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('mapitgo/styles/elements_responsive.css')}}">
@endif
@if($pagina=="")
<link rel="stylesheet" type="text/css" href="{{asset('mapitgo/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{asset('mapitgo/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('mapitgo/plugins/video-js/video-js.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('mapitgo/styles/courses.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('mapitgo/styles/courses_responsive.css')}}">
@endif
@if($pagina == "")
<link rel="stylesheet" type="text/css" href="{{asset('mapitgo/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{asset('mapitgo/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('mapitgo/plugins/video-js/video-js.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('mapitgo/styles/news.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('mapitgo/styles/news_responsive.css')}}">
@endif
			<!-- datepicker  https://styde.net/formulario-con-datepicker-en-laravel/   https://uxsolutions.github.io/bootstrap-datepicker/?markup=range&format=&weekStart=&startDate=&endDate=&startView=0&minViewMode=0&maxViewMode=4&todayBtn=true&clearBtn=false&language=es&orientation=auto&multidate=&multidateSeparator=&autoclose=on&keyboardNavigation=on&forceParse=on#sandbox-->
				<!-- Jquery -->
				<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
				<!-- Datepicker Files -->
				<link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.css')}}">
				<link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-standalone.css')}}">
				<script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
				<!-- Languaje -->
				<script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>
			<!-- datepicker end -->
</head>
<body>

<!-- whatsappt -->
<style>
    .btn-whatsapp {
           display:block;
           width:70px;
           height:70px;
           color:#fff;
           position: fixed;
           right:50px;
           bottom:25px;
           border-radius:50%;
           line-height:80px;
           text-align:center;
           z-index:999;
    }
    </style>

    <div class="btn-whatsapp">
      <a href="http://wpp-redirect.herokuapp.com/go/?p=3605130877&m=" target="_blank" >
        <img src="{{asset('img/logow.png')}}" alt="" style="width: 90px;" title="">
      </a>
    </div>

    <!-- Fin whatsappt -->
    <!-- telefono -->
    <style>
    .btn-telefono {
           display:block;
           width:70px;
           height:70px;
           color:#fff;
           position: fixed;
           right:125px;
           bottom:25px;
           border-radius:50%;
           line-height:80px;
           text-align:center;
           z-index:999;
    }
    </style>

    <div class="btn-telefono">
      <a  href="tel:+3605130877">
        <img src="{{asset('img/tel.png')}}" alt="" style="width: 90px;">
      </a>
    </div>

    <!-- Fin telefono -->

<div class="super_container">

	<!-- Header -->

	<header class="header">
			
		<!-- Top Bar -->
		<div class="top_bar">
			<div class="top_bar_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
								<ul class="top_bar_contact_list">
									<li><div class="question">Questions?</div></li>
									<li>
                                        <a  href="tel:+3605130877">
										    <div>(+360) 513-0877</div>
                                        </a>
									</li>
									<li>
                                        <a  href="{{ url('/vistas/vcontacto') }}">
										    <div>info@mapitgo.com</div>
                                        </a>
									</li>
								</ul>
								<!--<div class="top_bar_login ml-auto">
									
									@if (Auth::guest())
										<ul>
											<div class="dropdown">
												<a class="dropdown-toggle" href="#" id="navbarDropdown4" role="button"
													data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<i class="	fa fa-user-o"> </i><font color="white"> Entrar / Registrarse</font>
												</a>
												<div class="dropdown-menu" aria-labelledby="navbarDropdown">
													<a class="dropdown-item" href="{{ route('login') }}"> Entrar</a>
													<a class="dropdown-item" href="{{ route('register') }}">Registrarse</a>
													<a class="dropdown-item" href="{{ route('password.request') }}">Olvidaste tu Contraseña?</a>
												</div> 
																	
											</div>
										</ul>
									@elseif(Auth::user()->tipo_usuario == 'Administrador')
										<?php
											$usuario = Auth::user()->name; $nombre = explode(' ',trim($usuario));
										?>
										<div class="dropdown">
											<a class="dropdown-toggle" href="#" id="navbarDropdown4" role="button"
												data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="	fa fa-user-o"> </i><font color="white"><b> Hola {{ ucwords($nombre[0]) }}!</b></font>
											</a>
											<div class="dropdown-menu" aria-labelledby="navbarDropdown">
												<a class="dropdown-item" href="{{URL::action('UsuarioController@show',Auth::user()->id)}}">Perfil</a>
												<a class="dropdown-item" href="{{ url('/panel') }}">Administración</a>
												<a class="dropdown-item" href="{{ url('/logout') }}">Cerrar Sesion</a>
											</div> 
									
										</div>
									@elseif(Auth::user()->tipo_usuario == 'Catedratico')

									@elseif(Auth::user()->tipo_usuario == 'Alumno')

									@endif
								</div>-->
							</div>
						</div>
					</div>
				</div>
			</div>				
		</div>

		<!-- Header Content -->
		<div class="header_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<div class="logo_container">
								<a href="{{ url('/') }}">
									<div class="logo_content d-flex flex-row align-items-end justify-content-start">
										<div class="logo_img"><img src="{{asset('mapitgo/images/logomapitgo.png')}}" alt=""></div>
										<!--<div class="logo_text">Map It Go!!!</div>-->
									</div>
								</a>
							</div>
							<nav class="main_nav_contaner ml-auto">
								<ul class="main_nav">
									<li><a href="{{ url('/') }}">Home</a></li>
									<li><a href="{{ url('/vistas/ourhistory') }}">Our History</a></li>
									<li><a href="{{ url('/vistas/whatwedo') }}">What We Do</a></li>
									<li><a href="{{ url('/vistas/whyshouldchooseus') }}">Why should choose us?</a></li>
									<li><a href="{{ url('/vistas/vcontacto') }}">Contact</a></li>
									<li class="active">
										@if (Auth::guest())
											<div class="dropdown">
												<a class="dropdown-toggle" href="#" id="navbarDropdown4" role="button"
													data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<b><i class="	fa fa-user-o"> </i></b> Login 
												</a>
												<div class="dropdown-menu" aria-labelledby="navbarDropdown">
													<a class="dropdown-item" href="{{ route('login') }}"> Login</a>
													<a class="dropdown-item" href="{{ route('register') }}">Register</a>
													<a class="dropdown-item" href="{{ route('password.request') }}">forgot password?</a>
												</div> 
																	
											</div>
										@elseif(Auth::user()->user_type == 'ADMIN')
											<?php
												$usuario = Auth::user()->name; $nombre = explode(' ',trim($usuario));
											?>
											<div class="dropdown">
												<a class="dropdown-toggle" href="#" id="navbarDropdown4" role="button"
													data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<i class="	fa fa-user-o"> </i><font color="orange"> Hi {{ ucwords($nombre[0]) }}!</font>
												</a>
												<div class="dropdown-menu" aria-labelledby="navbarDropdown">
													<a class="dropdown-item" href="{{URL::action('UsuarioController@show',Auth::user()->id)}}">Profile</a>
													<a class="dropdown-item" href="{{ url('/panel') }}">Control Panel</a>
													<a class="dropdown-item" href="{{URL::action('ConfiguracionController@edit',Auth::user()->id)}}">Configuration</a>
													<a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
												</div> 
																	
											</div>
										@elseif(Auth::user()->user_type == 'DRIVER')
											<?php
												$usuario = Auth::user()->name; $nombre = explode(' ',trim($usuario));
											?>
											<div class="dropdown">
												<a class="dropdown-toggle" href="#" id="navbarDropdown4" role="button"
													data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<i class="	fa fa-user-o"> </i><font color="orange"> Hi {{ ucwords($nombre[0]) }}!</font>
												</a>
												<div class="dropdown-menu" aria-labelledby="navbarDropdown">
													<a class="dropdown-item" href="{{URL::action('UsuarioController@show',Auth::user()->id)}}">Profile</a>
													<a class="dropdown-item" href="{{ url('/panel') }}">Control Panel</a>
													<a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
												</div> 
																	
											</div>
										@elseif(Auth::user()->user_type == 'CLIENT')
											<?php
												$usuario = Auth::user()->name; $nombre = explode(' ',trim($usuario));
											?>
											<div class="dropdown">
												<a class="dropdown-toggle" href="#" id="navbarDropdown4" role="button"
													data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<i class="	fa fa-user-o"> </i><font color="orange"> Hi {{ ucwords($nombre[0]) }}!</font>
												</a>
												<div class="dropdown-menu" aria-labelledby="navbarDropdown">
													<a class="dropdown-item" href="{{URL::action('VistaUsuarioController@show',Auth::user()->id)}}">Profile</a>
													<a class="dropdown-item" href="{{ url('/vistas/vorden') }}">Orders</a>
													<a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
												</div> 
																	
											</div>
										@endif
									</li>
								</ul>
								<!--<div class="search_button"><i class="fa fa-search" aria-hidden="true"></i></div>-->

								<!-- Hamburger -->

								<div class="hamburger menu_mm">
									<i class="fa fa-bars menu_mm" aria-hidden="true"></i>
								</div>
							</nav>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Search Panel -->
		<div class="header_search_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_search_content d-flex flex-row align-items-center justify-content-end">
							<form action="#" class="header_search_form">
								<input type="search" class="search_input" placeholder="Search" required="required">
								<button class="header_search_button d-flex flex-column align-items-center justify-content-center">
									<i class="fa fa-search" aria-hidden="true"></i>
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>			
		</div>			
	</header>

	<!-- Menu -->

	<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<!--<div class="search">
			<form action="#" class="header_search_form menu_mm">
				<input type="search" class="search_input menu_mm" placeholder="Search" required="required">
				<button class="header_search_button d-flex flex-column align-items-center text-center menu_mm">
					<i class="fa fa-search menu_mm" aria-hidden="true"></i>
				</button>
			</form>
		</div>-->
		<nav class="menu_nav">
			@if (Auth::guest())

			@elseif(Auth::user()->user_type == 'ADMIN')
				<?php
					$usuario = Auth::user()->name; $nombre = explode(' ',trim($usuario));
				?>
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" id="navbarDropdown4" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<font color="Black"><b><i class="	fa fa-user-o"> </i> Hi {{ ucwords($nombre[0]) }}!</b></font>
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{URL::action('UsuarioController@show',Auth::user()->id)}}">Profile</a>
						<a class="dropdown-item" href="{{ url('/panel') }}">Control Panel</a>
						<a class="dropdown-item" href="{{URL::action('ConfiguracionController@edit',Auth::user()->id)}}">Configuration</a>
						<a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
					</div> 
										
				</div>
				<br>
			@elseif(Auth::user()->user_type == 'DRIVER')
				<?php
					$usuario = Auth::user()->name; $nombre = explode(' ',trim($usuario));
				?>
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" id="navbarDropdown4" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<font color="Black"><b><i class="	fa fa-user-o"> </i> Hi {{ ucwords($nombre[0]) }}!</b></font>
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{URL::action('UsuarioController@show',Auth::user()->id)}}">Profile</a>
						<a class="dropdown-item" href="{{ url('/panel') }}">Control Panel</a>
						<a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
					</div> 
										
				</div>
				<br>
			@elseif(Auth::user()->user_type == 'CLIENT')
				<?php
					$usuario = Auth::user()->name; $nombre = explode(' ',trim($usuario));
				?>
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" id="navbarDropdown4" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<font color="Black"><b><i class="	fa fa-user-o"> </i> Hi {{ ucwords($nombre[0]) }}!</b></font>
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{URL::action('VistaUsuarioController@show',Auth::user()->id)}}">Profile</a>
						<a class="dropdown-item" href="{{ url('/vistas/vorden') }}">Orders</a>
						<a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
					</div> 
										
				</div>
				<br>
			@endif
			@if (Auth::guest())
			<ul class="menu_mm">
				<li class="menu_mm"><a href="{{ url('/') }}">Home</a></li>
				<li class="menu_mm"><a href="{{ url('/vistas/ourhistory') }}">Our History</a></li>
				<li class="menu_mm"><a href="{{ url('/vistas/whatwedo') }}">What We Do</a></li>
				<li class="menu_mm"><a href="{{ url('/vistas/whyshouldchooseus') }}">Why should choose us?</a></li>
                <li class="menu_mm"><a href="{{ route('register') }}">Register</a></li>
                <li class="menu_mm"><a href="{{ route('login') }}">Login</a></li>
                <li class="menu_mm"><a href="{{ route('password.request') }}">forgot password?</a></li>
                <li class="menu_mm"><a href="{{ url('/vistas/vcontacto') }}">Contact</a></li>
									
			</ul>
			@else
			<ul class="menu_mm">
				<li class="menu_mm"><a href="{{ url('/') }}">Home</a></li>
                <li class="menu_mm"><a href="{{ url('/vistas/vcontacto') }}">Contact</a></li>					
			</ul>
			@endif
		</nav>
		<div class="menu_extra">
			<div class="menu_phone"><span class="menu_title">Teléfono:</span><a  href="tel:+50242153288">(+001) 000000000</a></div>
			<div class="menu_social">
				<span class="menu_title">Follow</span>
				<ul>
					<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
	
	@yield('content')

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">

				<!-- About -->
				<div class="col-lg-4 footer_col">
					<div class="footer_about">
						<div class="logo_container">
							<a href="#">
								<div class="logo_content d-flex flex-row align-items-end justify-content-start">
									<div class="logo_img"><img src="{{asset('mapitgo/images/logomapitgo.png')}}" alt=""></div>
									<!--<div class="logo_text">Map It Go!</div>-->
								</div>
							</a>
						</div>
						<div class="footer_about_text">
							<!--<p>Maecenas rutrum viverra sapien sed fermentum. Morbi tempor odio eget lacus tempus pulvinar.</p>-->
						</div>
						<div class="footer_social">
							<ul>
								<!--<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>-->
								<!--<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>-->
								<li><a href="https://www.facebook.com/mapit.go"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<!--<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>-->
								<li><a href="https://www.instagram.com/mapitgo/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							</ul>
						</div>
						<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://szystems.com" target="_blank">Szystems.</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
					</div>
				</div>

				<div class="col-lg-4 footer_col">
					<div class="footer_links">
						<div class="footer_title">Menu</div>
						<ul class="footer_list">
							<li><a href="{{ url('/') }}">Home</a></li>
							<li><a href="{{ url('/vistas/ourhistory') }}">Our History</a></li>
							<li><a href="{{ url('/vistas/whatwedo') }}">What We Do</a></li>
							<li><a href="{{ url('/vistas/whyshouldchooseus') }}">Why should choose us?</a></li>
							<li><a href="{{ url('/vistas/vcontacto') }}">Contact</a></li>
							
						</ul>
					</div>
				</div>

				<!--<div class="col-lg-3 footer_col">
					<div class="footer_links">
						<div class="footer_title">Links</div>
						<ul class="footer_list">
							<li><a href="courses.html">Courses</a></li>
							<li><a href="#">Events</a></li>
							<li><a href="news.html">News</a></li>
							<li><a href="#">Teachers</a></li>
							<li><a href="#">Links</a></li>
							<li><a href="#">FAQ</a></li>
						</ul>
					</div>
				</div>-->

				<div class="col-lg-4 footer_col">
					<div class="footer_contact">
						<div class="footer_title">Contact us</div>
						<div class="footer_contact_info">
							<div class="footer_contact_item">
								<div class="footer_contact_title">Address :</div>
								<div class="footer_contact_line">4610 NE 77th Ave. Suite 126 Vancouver, WA 98662</div>
							</div>
							<div class="footer_contact_item">
								<div class="footer_contact_title">Phone:</div>
								<div class="footer_contact_line"><a  href="tel:+3605130877">(+360) 513-0877</a></div>
							</div>
							<div class="footer_contact_item">
								<div class="footer_contact_title">Email:</div>
								<div class="footer_contact_line"><a href="info@mapitgo.com">info@mapitgo.com</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>
@if($pagina == "home" || $pagina == "InicioController@index" || $pagina == "HomeController@index" || $pagina == "LoginController@showLoginForm" || $pagina == "RegisterController@showRegistrationForm" || $pagina == "ForgotPasswordController@showLinkRequestForm" || $pagina == "ResetPasswordController@showResetForm" || $pagina == "ResetPasswordController@showResetForm" || $pagina == "VistaUsuarioController@update" || $pagina == "VistaUsuarioController@show"|| $pagina == "VistaUsuarioController@show" || $pagina == "VistaOrderController@index" || $pagina == "VistaOrderController@create" || $pagina == "VistaOrderController@edit" || $pagina == "VistaOrderController@update" || $pagina == "VistaOrderController@show" || $pagina == "OurHistoryController@index")
<script src="{{asset('mapitgo/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('mapitgo/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('mapitgo/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('mapitgo/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{asset('mapitgo/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{asset('mapitgo/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{asset('mapitgo/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{asset('mapitgo/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{asset('mapitgo/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('mapitgo/plugins/easing/easing.js')}}"></script>
<script src="{{asset('mapitgo/plugins/video-js/video.min.js')}}"></script>
<script src="{{asset('mapitgo/plugins/video-js/Youtube.min.js')}}"></script>
<script src="{{asset('mapitgo/plugins/parallax-js-master/parallax.min.js')}}"></script>
<script src="{{asset('mapitgo/js/custom.js')}}"></script>
@endif
@if($pagina=="ContactoController@index"  || $pagina == "LoginController@showLoginForm" || $pagina == "RegisterController@showRegistrationForm" || $pagina == "ForgotPasswordController@showLinkRequestForm" || $pagina == "ResetPasswordController@showResetForm" || $pagina == "ContactoController@store" || $pagina == "VistaUsuarioController@edit")
<script src="{{asset('mapitgo/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('mapitgo/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('mapitgo/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('mapitgo/plugins/easing/easing.js')}}"></script>
<script src="{{asset('mapitgo/plugins/parallax-js-master/parallax.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="{{asset('mapitgo/js/contact.js')}}"></script>
@endif
@if($pagina=="")
<script src="{{asset('mapitgo/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('mapitgo/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('mapitgo/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('mapitgo/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{asset('mapitgo/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{asset('mapitgo/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{asset('mapitgo/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{asset('mapitgo/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{asset('mapitgo/plugins/easing/easing.js')}}"></script>
<script src="{{asset('mapitgo/plugins/video-js/video.min.js')}}"></script>
<script src="{{asset('mapitgo/plugins/video-js/Youtube.min.js')}}"></script>
<script src="{{asset('mapitgo/plugins/parallax-js-master/parallax.min.js')}}"></script>
<script src="{{asset('mapitgo/js/about.js')}}"></script>
@endif
@if($pagina=="WhyShouldChooseUsController@index" || $pagina == "OurHistoryController@index" || $pagina=="WhatWeDoController@index")
<script src="{{asset('mapitgo/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('mapitgo/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('mapitgo/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('mapitgo/plugins/easing/easing.js')}}"></script>
<script src="{{asset('mapitgo/plugins/parallax-js-master/parallax.min.js')}}"></script>
<script src="{{asset('mapitgo/js/courses.js')}}"></script>
@endif
@if($pagina=="VistaAcademicoController@index")
<script src="{{asset('mapitgo/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('mapitgo/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('mapitgo/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('mapitgo/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{asset('mapitgo/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{asset('mapitgo/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{asset('mapitgo/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{asset('mapitgo/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{asset('mapitgo/plugins/progressbar/progressbar.min.js')}}"></script>
<script src="{{asset('mapitgo/plugins/easing/easing.js')}}"></script>
<script src="{{asset('mapitgo/plugins/parallax-js-master/parallax.min.js')}}"></script>
<script src="{{asset('mapitgo/js/elements.js')}}"></script>
@endif
@if($pagina=="VistaNoticiasController@index")
<script src="{{asset('mapitgo/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('mapitgo/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('mapitgo/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('mapitgo/plugins/easing/easing.js')}}"></script>
<script src="{{asset('mapitgo/plugins/parallax-js-master/parallax.min.js')}}"></script>
<script src="{{asset('mapitgo/js/news.js')}}"></script>
@endif
</body>
</html>