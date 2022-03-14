@extends('layouts.app')

@section('content')
<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-12">
                <br><br><br><br><br>
                <main class="container-fluid w-100" role="main">
                    <div class="row">
                        <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center bg-white mnh-100vh">
                            <div class="u-login-form">
                                <form class="mb-3" method="POST" action="{{ route('register') }}">
                                    {{ csrf_field() }}
                                    <div class="mb-3">
                                        <br>
                                        <h1 class="h2">Create Account </h1>
                                        <p class="small">Fill in the following form with your data and press the Register button.</p>
                                        <p><font color="orange">(*)</font> Required fields</p>
                                    </div>

                                    <div class="form-group mb-4{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name"><font color="orange">*</font>Name</label>
                                        <input type="text" id="name" class="contact_input" name="name" placeholder="Your Name" value="{{ old('name') }}" required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4{{ $errors->has('telefono') ? ' has-error' : '' }}">
                                        <label for="phone"><font color="orange">*</font>Phone</label>
                                        <input type="text" id="telefono" class="contact_input" name="telefono" placeholder="Your Phone" value="{{ old('telefono') }}" required>
                                        @if ($errors->has('telefono'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('telefono') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4{{ $errors->has('address') ? ' has-error' : '' }}">
                                        <label for="address">Address</label>
                                        <input type="text" id="address" class="contact_input" name="address" placeholder="Your Address" value="{{ old('address') }}">
                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group mb-4{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email"><font color="orange">*</font>Email</label>
                                        <input type="text" id="email" class="contact_input" name="email" placeholder="Your Email" value="{{ old('email') }}" required>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                        
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-4{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password"><font color="orange">*</font>Password</label>
                                                <input type="password" id="password" class="contact_input" name="password" placeholder="Your password" value="{{ old('password') }}" required>
                                            </div>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <label for="confirmPassword"><font color="orange">*</font>Confirm password</label>
                                                <input type="password" id="password-confirm" class="contact_input" name="password_confirmation" placeholder="Confirm password" value="{{ old('password_confirmation') }}" required>
                                            </div>

                                            @if ($errors->has('password_confirmation'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!--Campos escondidos-->

                                    <button class="contact_button" type="submit"><span>Register</span><span class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                                </form>

                                <p class="small">
                                    Do you already have an account? <a href="{{ route('login') }}">Login</a>
                                </p>
                            </div>

                            <div class="u-login-form text-muted py-3 mt-auto">
                                <small> If you can't log in to your account <a href="{{ url('/vistas/vcontacto') }}">Contact us</a>.</small>
                            </div>
                        </div>

                        <div class="col-lg-6 d-none d-lg-flex flex-column align-items-center justify-content-center bg-light">
                            <img class="img-fluid position-relative u-z-index-3 mx-5" src="{{asset('assets/svg/mockups/mockup.svg')}}" alt="Image description">

                            <figure class="u-shape u-shape--top-right u-shape--position-5">
                                <img src="{{asset('assets/svg/shapes/shape-1.svg')}}" alt="Image description">
                            </figure>
                            <figure class="u-shape u-shape--center-left u-shape--position-6">
                                <img src="{{asset('assets/svg/shapes/shape-2.svg')}}" alt="Image description">
                            </figure>
                            <figure class="u-shape u-shape--center-right u-shape--position-7">
                                <img src="{{asset('assets/svg/shapes/shape-3.svg')}}" alt="Image description">
                            </figure>
                            <figure class="u-shape u-shape--bottom-left u-shape--position-8">
                                <img src="{{asset('assets/svg/shapes/shape-4.svg')}}" alt="Image description">
                            </figure>
                        </div>
                    </div>
                </main>

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
		format: "mm-dd-yyyy",
    	language: "en",
    	autoclose: true,
		todayHighlight: true,
		todayBtn: "linked",
	};

	$( '#birthday' ).datepicker( optSimple );

	$( '#birthday').datepicker( 'setDate', today );
</script>
                        
@endsection
