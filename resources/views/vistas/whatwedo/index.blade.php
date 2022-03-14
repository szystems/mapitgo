@extends('layouts.app')
@section('content')
    <!-- Home -->

	<div class="home">
		<div class="home_background parallax_background parallax-window" data-parallax="scroll" data-image-src="{{asset('mapitgo/images/contact2.jpg')}}" data-speed="0.8"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content text-center">
							<div class="home_title">What We Do</div>
							<div class="breadcrumbs">
								<ul>
									<li><a href="{{ url('/') }}">Home</a></li>
									<li>What we do</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Why -->

	<div class="about">
		<div class="container">
			<!-- Featured Course -->
			<div class="row featured_row">
				<div class="col-lg-12 featured_col">
					<div class="featured_content">
						<div class="featured_title"><h3>What we do</h3></div>
						<div class="featured_text"><strong>MapItGO </strong>MapItGO freight is a business-to-business entity specializing in the dry van and power only sectors. We strive to be top in the industry in safety, performance, and reliability. If its across town or across the country, you Pin it, we Map it, and GO. </div>
					</div>
				</div>
				<div class="col-lg-12 ">
					<div class="featured_content">
						<div class="embed-responsive embed-responsive-16by9">
							<!--<iframe class="embed-responsive-item" src="{{asset('Videos/Whatwedo.mp4')}}"></iframe>-->
							<div class="embed-responsive-item">
                                <video height='100%' class="embed-responsive-item" src="{{asset('Videos/Whatwedo.mp4')}}" allowfullscreen controls muted></video>
                            </div>
						</div>
						<br>
						<form align="center" action="{{ route('register') }}" class="course_search_form d-flex flex-md-row flex-column align-items-start justify-content-between">
							<button class="course_button"><span>Register</span><span class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	
@endsection