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
                                

                                <form class="mb-3" role="form" method="POST" action="{{ url('/password/reset') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <h1 class="h2">Reset Password</h1>
                                    <p class="small">Type your email account and the new password in the following fields</p>

                                    <div class="form-group mb-4">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="Your Email" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="password">New Password</label>
                                        <input id="password" type="password" class="contact_input" name="password" placeholder="New Password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="password-confirm">confirm New Password</label>
                                        <input id="password-confirm" type="password" class="contact_input" name="password_confirmation" placeholder="Confirm New Password" required>

                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <button class="contact_button" type="submit"><span>Reset Password</span><span class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                                </form>

                                <div>
                                    Don't have an Account? <a href="{{ route('register') }}">Register here</a>
                                </div>
                                <div>
                                    If you can't log in to your account <a href="#">Contact us</a>.
                                </div>
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
