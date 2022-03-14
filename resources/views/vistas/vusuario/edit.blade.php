@extends('layouts.app')
@section('content')
    <!-- Cabecera -->

	

	<div class="shop">
    <br><br><br><br><br><br><br>
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
                    <div class="card-body">
                        <h5 class="h4 card-title">Change the data that you want to edit:</h5>
                        <h6><font color="orange"> Required Fields *</font></h6>
                        @if (count($errors)>0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {!!Form::model($usuario,['method'=>'PATCH','route'=>['vusuario.update',$usuario->id]])!!}
                        {{Form::token()}}
                        <h3><strong><u>General Data: </u></strong></h3>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name"><font color="orange">*</font>Name</label>
                                <input id="name" type="text" class="contact_input" name="name" value="{{$cliente->name}}" >
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                            <strong>
                                                {{ $errors->first('name') }}
                                            </strong>
                                    </span>
                                @endif
                        </div>
                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">Email <font color="orange">*This field cannot be edited</font></label>
                                <input id="email" type="text" class="contact_input" name="email" value="{{$cliente->email}}" readonly>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                            <strong>
                                                {{ $errors->first('email') }}
                                            </strong>
                                    </span>
                                @endif
                        </div>
                        
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone">Phone</label>
                                <input id="phone" type="text" class="contact_input" name="phone" value="{{$cliente->phone}}">
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                            <strong>
                                                {{ $errors->first('phone') }}
                                            </strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address">Address</label>
                                <textarea id="address" type="text" class="contact_input" name="address">{{$cliente->address}}</textarea>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                            <strong>
                                                {{ $errors->first('address') }}
                                            </strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <footer class="card-footer">
                        <div class="form-group">
                                <button class="btn btn-danger" type="reset"><i class="fa fa-eraser"></i> Reset</button>
                                <button class="btn btn-info" type="submit"><i class="fa fa-pencil-square-o"></i> Save</button>
                        </div>

                        {!!Form::close()!!}
                    </footer>
                </div>
			</div>
		</div>
    </div>

    <script>
        var date = new Date();
        var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
        var tomorrow = new Date(today);
        tomorrow.setDate(tomorrow.getDate() + 1);
        var optSimple = {
            format: "dd-mm-yyyy",
            language: "es",
            autoclose: true,
            todayHighlight: true,
            todayBtn: "linked",
        };
        $( '#birthday' ).datepicker( optSimple );
        $( '#expiration_day' ).datepicker( optSimple );
    </script>
@endsection