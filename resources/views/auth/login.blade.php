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
                                <form class="mb-6" method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}
                                    <div class="mb-6">
                                        <br>
                                        <h1 class="h2">Welcome!!</h1>
                                        <p class="small">Log in to your account</p>
                                    </div>

                                    <div class="form-group mb-6{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email">Email</label>
                                        <input id="email" class="contact_input" name="email" type="email" placeholder="Your Email..." value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group mb-6{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password">Password</label>
                                        <input id="password" class="contact_input" name="password" type="password" placeholder="Your Password..." required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                   <div class="form-group mb-6{{ $errors->has('password') ? ' has-error' : '' }}">
                                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remind me

                                        
                                    </div>
                                    <button class="contact_button" type="submit"><span>Login</span><span class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                                </form>
                                <div>
                                    <a class="link-muted small" href="{{ route('password.request') }}">Forgot your Password?</a>
                                </div>
                                <div>
                                    Don't have an Account? <a href="{{ route('register') }}">Register here</a>
                                </div>
                                <div class="u-login-form text-muted py-3 mt-auto">
                                    <small> If you can't log in to your account <a href="{{ url('/vistas/vcontacto') }}">Contact us</a>.</small>
                                </div>

                                <!--<p class="small">
                                    No tienes Cuenta? <a href="{{ route('register') }}">Registrate aqui</a>
                                    <i class="far fa-question-circle mr-1"></i><br>
                                    Si no puedes entrar a tu cuenta <a href="#">contactanos</a>.
                                </p>-->
                            </div>

                            <div class="u-login-form text-muted py-3 mt-auto">
                                
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
    
@endsection
