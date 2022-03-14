@extends('layouts.app')
@section('content')
    <!-- Cabecera -->

	<div>
        <br><br><br><br><br><br><br>
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
             @endif
         @endforeach
		
	</div>
    <!-- Cliente Menu -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-2">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Account</div>
							<ul class="sidebar_categories">
								<li style="background-color: gray;"><a href="{{URL::action('VistaUsuarioController@show',Auth::user()->id)}}">Profile</a></li>
								<li><a href="{{ url('/vistas/vorden') }}">Orders</a></li>
								<li><a href="{{ url('/logout') }}">Logout</a></li>
							</ul>
						</div>
					</div>

				</div>

				<div class="col-lg-10">
					
					<!-- Contenido -->
                    <div class="card mb-4">
                        <header class="card-header">
                            <h2 class="h3 card-header-title"><strong>User: {{$cliente->name}}</strong></h2>      
                        </header>
                                     
                        <div class="card-body">
                            <div align="right">
                                <a href="{{URL::action('VistaUsuarioController@edit',$usuario->id)}}">
                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Edit User">
                                        <button class="btn btn-sm btn-info" style="pointer-events: none;" type="button"><i class="fa fa-pencil-square-o"></i> Edit</button>
                                    </span>
                                </a>
                            </div>
                            <div class="row">
                                <br>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="name"><strong>Name</strong></label>
                                        <p>{{$cliente->name}}</p>
                                    </div>
                                </div>
                                <?php
                                    $birthday = date("m-d-Y", strtotime($usuario->birthday));

                                    $birth = new DateTime($usuario->birthday);
                                    $today = new DateTime();
                                    $years = $today->diff($birth);
                                    $age = $years->y;
                                ?>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="birthday"><strong>Start Date</strong></label>
                                        <p>{{$birthday}} ({{$age}} Years)</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="email"><strong>Email</strong></label>
                                        <p>{{$cliente->email}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="telefono"><strong>Phone</strong></label>
                                        <p>{{$cliente->phone}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                                    <div class="form-group">
                                        <label for="address"><strong>Address </strong></label>
                                        <p>{{$cliente->address}}</p>
                                    </div>
                                </div>
                            
                                
                                        
                            </div>
                        </div>                         
                        <footer class="card-footer">
                            
                        </footer>
                    </div>
				</div>
			</div>
		</div>
    </div>
@endsection